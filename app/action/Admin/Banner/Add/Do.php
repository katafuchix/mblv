<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理バナー登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBannerAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'banner_client' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'banner_url' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'banner_type' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'		=> 'Util, banner_type',
		),
		'banner_body' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'banner_image' => array(
			'form_type'		=> FORM_TYPE_FILE,
		),
	);
}

/**
 * 管理バナー登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminBannerAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if ($this->af->validate() > 0) return 'admin_banner_add_index';
		
		// 2重POST対応
		if (Ethna_Util::isDuplicatePost()) return 'admin_banner_list';
		
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		$timestamp = date("Y-m-d H:i:s");
		
		// バナー登録
		$o = & new Tv_Banner($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像アップロード
		if($this->af->get('banner_type') != 'text'){
			$um =& $this->backend->getManager('Util');
			$o->set('banner_image', $um->uploadFile($this->af->get('banner_image'), 'banner'));
		}
		// ステータスを有効にする
		$o->set('banner_status', 1);
		// 作成日時
		$o->set('banner_created_time', $timestamp);
		// 更新日時
		$o->set('banner_updated_time', $timestamp);
		// 登録
		$r = $o->add();
		
		// 登録エラーの場合
		if (PEAR::isError($r)) return 'admin_banner_add_index';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_ADD_DONE);
		return 'admin_banner_list';
	}
}
?>