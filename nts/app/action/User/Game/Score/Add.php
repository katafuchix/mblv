<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザゲームスコア登録アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameScoreAdd extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'score' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザゲームスコア登録アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameScoreAdd extends Tv_ActionUser
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
		// 簡単ログインstart
		//携帯端末UIDを取得
		$um =& $this->backend->getManager('Util');
		$user_uid = $um->getXuid();
		
		//UID取得できなければログイン画面にリダイレクト
		if(!$user_uid){
			$this->ae->add(null, '', E_USER_IDENTIFY);//UIDをクライアントから取得できなかった
			return 'user_error';
		}
		
		//取得したUIDで、ステータス有効のユーザーが、table:userにいるか確認
		$user =& new Tv_User(
			$this->backend,
			array('user_uid', 'user_status'),
			array($user_uid, 2)
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_IDENTIFY);//DBになかった
			return 'user_error';
		}
		// ログイン
		$userManager =& $this->backend->getManager('User');
		if(!$userManager->login($user->get('user_mailaddress'),$user->get('user_password'))){
			$this->ae->add(null, '', E_USER_IDENTIFY);//DBになかった
			return 'user_error';
		}
		// 簡単ログインend
		
		// ゲーム取得
		$game =& new Tv_Game(
			$this->backend,
			'game_code',
			$this->af->get('game_code')
		);
		
		// ユーザがゲームを購入しているか確認
		$userGame =& new Tv_UserGame(
			$this->backend,
			array('user_id', 'game_id'),
			array($user->get('user_id'), $game->get('game_id'))
		);
		if(!$userGame->isValid()){
			$this->ae->add(null, '', E_USER_GAME_ACCESS_DENIED);
			return 'user_error';
		}
		
		$userGameScore =& new Tv_UserGameScore($this->backend);
		$userGameScore->set('user_id', $user->get('user_id'));
		$userGameScore->set('game_id', $game->get('game_id'));
		$userGameScore->set('user_game_score_score', $this->af->get('score'));
		$userGameScore->set('user_game_score_created_time', date('Y-m-d H:i:s'));
		$r = $userGameScore->add();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_DB);
			return 'user_error';
		}
		
		$db	=& $this->backend->getDB();
		$score = $this->af->get('score');
		$query = "SELECT (SELECT count(user_game_score_id) FROM user_game_score WHERE user_game_score_score>{$score})+1 as rank";
		$rank = $db->db->getOne($query);
		$this->af->setApp('rank', $rank);
		
		return 'user_game_score_add_done';
	}
}

?>
