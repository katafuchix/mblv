<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理バナー編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBannerEditDo extends TV_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'banner_id' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
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
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'banner_image_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'banner_image_status' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, image_status',
		),
	);
}

/**
 * 管理バナー編集実行処理アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class TV_Action_AdminBannerEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_banner_edit';
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
		
		// バナー編集
		$o = & new Tv_Banner($this->backend,'banner_id', $this->af->get('banner_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// バナー画像編集(1=編集)
		if($this->af->get('banner_type') != 'text' && $this->af->get('banner_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('banner_image', $um->uploadFile($this->af->get('banner_image_file'), 'banner'));
		}
		// バナー画像削除(2=削除)
		elseif($this->af->get('banner_image_status') == 2){
			$o->set('banner_image', '');
		}
		
		// 更新日時
		$o->set('banner_updated_time', $timestamp);
		
		// 更新
		$r = $o->update();
		
		// 更新エラーの場合
		if (Ethna::isError($res)) return 'admin_banner_edit';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_EDIT_DONE);
		return 'admin_banner_list';
	}
}
?>