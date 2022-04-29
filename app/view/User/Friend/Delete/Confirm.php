<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 友達リンク解除確認画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// リンク先ユーザの情報出力
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$this->af->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>