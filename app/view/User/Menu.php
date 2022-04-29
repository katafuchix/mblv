<?php
/**
 * Menu.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * メニュー画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserMenu extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$db	=& $this->backend->getDB();
		$um = $this->backend->getManager('Util');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
	}
}
?>