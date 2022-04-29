<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言編集画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBbsEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$comment =& new Tv_Bbs(
			$this->backend,
			'bbs_id',
			$this->af->get('bbs_id')
		);
		
		// 送信先ユーザ情報取得
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$comment->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>