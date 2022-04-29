<?php
/**
 * Exchange.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ポイント交換申請画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointExchange extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access	public
	 */
	function preforward()
	{ 
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user'); 
		// 現在のポイントを取得
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$this->af->setApp('user', $o->getNameObject());
	}
}

?>
