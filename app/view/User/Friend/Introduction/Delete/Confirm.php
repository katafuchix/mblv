<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達紹介文削除確認画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendIntroductionDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$friend =& new Tv_Friend(
			$this->backend,
			array('to_user_id', 'from_user_id'),
			array($this->af->get('to_user_id'), $this->af->get('from_user_id'))
		);
		$this->af->setApp('friend', $friend->getNameObject());
		
		$hidden_vars = $this->af->getHiddenVars(null, array('back', 'delete_confirm', 'delete'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>