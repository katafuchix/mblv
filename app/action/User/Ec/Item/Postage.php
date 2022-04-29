<?php
/**
 * Postage.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * 送料説明表示アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemPostage extends Tv_ActionForm
{
	var $form = array(
		'item_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
		),
	);
}
/**
 * 送料説明表示アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemPostage extends Tv_ActionClass
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		//検証エラーの場合
		if($this->af->validate() > 0) return 'user_ec_item';
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
		return 'user_ec_item_postage';
	}
}
?>