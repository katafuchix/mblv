<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザブラックリスト追加確認画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistAddConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$toUser =& new Tv_User(
			$this->backend,
			array('user_id'),
			$this->af->get('black_list_deny_user_id')
		);
		$this->af->setApp('toUser', $toUser->getNameObject());
	}
}
?>