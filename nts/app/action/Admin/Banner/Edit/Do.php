<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理バナー編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBannerEditDo extends TV_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'banner_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required' => true,
		),
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
		'banner_image_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
		),
	);
}

/**
 * 管理バナー編集実行処理アクションクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		if ($this->af->validate() > 0) return 'admin_banner_edit_index';
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
		// バナー編集
		$db = $this->backend->getDB();
		$values = array(
			'banner_client' => $this->af->get('banner_client'),
			'banner_url' => $this->af->get('banner_url'),
			'banner_type' => $this->af->get('banner_type'),
			'banner_body' => $this->af->get('banner_body'),
		);
		if($this->af->get('banner_type') != "text" && $this->af->get('banner_image_status') == "edit"){
			$um =& $this->backend->getManager('Util');
			$values['banner_image'] = $um->copyImage($this->config->get('file_path') . "banner/",$this->af->get('banner_image'));
		}
		if($this->af->get('banner_image_status') == "delete"){
			$values['banner_image'] = "";
		}
		// 編集
		$res = $db->db->autoExecute('banner', $values, DB_AUTOQUERY_UPDATE,"banner_id = " . $this->af->get('banner_id'));
		// 編集エラーの場合
		if (PEAR::isError($res)) return 'admin_banner_edit_index';
		$this->ae->add(null, '', I_ADMIN_BANNER_EDIT_DONE);
		return 'admin_banner_list';
	}
}
?>