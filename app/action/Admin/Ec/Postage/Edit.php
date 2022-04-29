<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理送料編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageEdit extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_id' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'postage_name' => array(
			'required'  => true,
			'type'      => VAR_TYPE_STRING,
		),
	);
}
/**
 * 管理送料編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageEdit extends Tv_ActionAdminOnly
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
		// 情報の取得
		$o =& new Tv_Postage($this->backend,'postage_id',$this->af->get('postage_id'));
		$o->exportform();
		return 'admin_ec_postage_edit';
	}
}
?>