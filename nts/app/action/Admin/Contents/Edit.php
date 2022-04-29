<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理フリーページ編集アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminContentsEdit extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'contents_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * 管理フリーページ編集アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsEdit extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		//情報の取得 
		$o =& new Tv_Contents($this->backend,'contents_id',$this->af->get('contents_id'));
		$o->exportForm();
		
		return 'admin_contents_edit';
	}
}
?>