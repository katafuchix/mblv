<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理NGワード編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNgwordEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'site_ngword' => array(
			'name'			=> 'NGワード',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * 管理NGワード編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNgwordEditDo extends Tv_ActionAdminOnly
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
		if($this->af->Validate() > 0) return 'admin_ngword_edit';
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
		// SNS情報更新
		//$o =& new Tv_Config($this->backend,'config_id',1);
		$o =& new Tv_Config($this->backend,'config_type','config');
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// 更新
 		$r = $o->update();
 		// 更新エラーの場合
 		if(Ethna::isError($r))return 'admin_ngword_edit';
		
		$this->ae->add(null, '', E_ADMIN_NGWORD_EDIT_DONE);
		
		return 'admin_ngword_edit';
	}
}
?>