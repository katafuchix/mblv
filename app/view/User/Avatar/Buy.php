<?php
/**
 * Buy.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバター購入画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarBuy extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// アバター情報取得
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		$a->exportForm();
	}
}
?>