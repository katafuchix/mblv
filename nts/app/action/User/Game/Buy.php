<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザゲーム購入アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameBuy extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * ユーザゲーム購入アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameBuy extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_game';
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
		return 'user_game_buy';
	}
}

?>
