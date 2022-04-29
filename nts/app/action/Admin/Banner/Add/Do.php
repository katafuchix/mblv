<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理バナー登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBannerAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'banner_client' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required' => true,
		),
		'banner_url' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required' => true,
		),
		'banner_type' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'required' => true,
		),
		'banner_body' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'banner_image' => array(
			'form_type' 	=> FORM_TYPE_FILE,
		),
	);
}

/**
 * 管理バナー登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		// バナー追加
		$db = $this->backend->getDB();
		$values = array(
			'banner_client' => $this->af->get('banner_client'),
			'banner_url' => $this->af->get('banner_url'),
			'banner_type' => $this->af->get('banner_type'),
			'banner_body' => $this->af->get('banner_body'),
		);
		if($this->af->get('banner_type') != "text"){
			$um =& $this->backend->getManager('Util');
			$values['banner_image'] = $um->copyImage($this->config->get('file_path') . "banner/",$this->af->get('banner_image'));
		}
		// 登録
		$res = $db->db->autoExecute('banner', $values, DB_AUTOQUERY_INSERT);
		// 登録エラーの場合
		if (PEAR::isError($res)) return 'admin_banner_add_index';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_ADD_DONE);
		return 'admin_banner_list';
	}
}
?>