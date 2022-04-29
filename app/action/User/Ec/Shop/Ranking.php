<?php
/**
 * Ranking.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ショップ商品ランキングアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcShopRanking extends Tv_ActionForm
{
	var $form = array(
		'shop_id' => array(
			'type' 		=> VAR_TYPE_INT,
			'required' 	=> true,
		),
	);
}
/**
 * ショップ商品ランキングアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcShopRanking extends Tv_ActionUser
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
		return 'user_ec_shop_ranking';
	}
}
?>