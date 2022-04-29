<?php
/**
 * Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザあしあと画面アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFootprint extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'page'	=> array(
			'type'	=> VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザあしあと画面アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFootprint extends Tv_ActionUserOnly
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
		return 'user_footprint';
	}
}
?>