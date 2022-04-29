<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ブラックリスト解除確認画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistDeleteConfirm extends Tv_ViewClass
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
			$this->af->get('black_list_deny_user_id')
			);
		$this->af->setApp('deny_user', $to_user->getNameObject());
	}
}
?>