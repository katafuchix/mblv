<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームスコア一覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserGameScoreList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'required'	=> true,
		),
		'user_id' => array(
		),
		'term' => array(
		),
	);
}

/**
 * ユーザゲームスコア一覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserGameScoreList extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
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
		if($this->af->get('user_id')){
			// 特定のゲームにおける、特定のユーザのスコアランキング
			return 'user_game_score_list_user';
		}else{
			// 特定のゲームにおける、全ユーザのスコアランキング
			return 'user_game_score_list_game';
		}
	}
}
?>