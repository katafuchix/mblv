<?php
/**
 * Onreturn.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザポイントオン換金リターンアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointOnreturn extends Tv_ActionForm
{
}

/**
 * ユーザポイントオン換金リターンアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
//非会員領域
class Tv_Action_UserPointOnreturn extends Tv_ActionUser
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
		// ポイントオンからのパラメタを受信する
		$um = $this->backend->getManager('Util');
		$um->ponIdReceive();
		
		return 'user_point_onreturn';
	}
}

?>
