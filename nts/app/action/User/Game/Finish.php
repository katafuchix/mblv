<?php
/**
 * Finish.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザゲーム終了アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameFinish extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'scr' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}

/**
 * ユーザゲーム終了アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameFinish extends Tv_ActionUser
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
		$xuid = $um->getXuid();
		
		//UID取得できなければログイン画面にリダイレクト
		if(!$xuid){
			$this->ae->add(null, '', E_USER_IDENTIFY);//UIDをクライアントから取得できなかった
			return 'user_error';
		}
		
		//取得したUIDで、ステータス有効のユーザーが、table:userにいるか確認
		$user =& new Tv_User(
			$this->backend,
			array('user_uid', 'user_status'),
			array($xuid, 2)
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
			$this->af->get('code')
		);
		if(!$game->isValid()){
			$this->ae->add(null, '', E_USER_GAME_ACCESS_DENIED);
			return 'user_error';
		}
		$game->exportform();
		$this->af->setApp('game', $game->getNameObject());
		
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
		
		// 自己ベスト判定
		$db	=& $this->backend->getDB();
		$user_id = $user->get('user_id');
		$game_id = $game->get('game_id');
		$query = "SELECT user_game_score_score FROM user_game_score WHERE user_id={$user_id} AND game_id={$game_id} ORDER BY user_game_score_score LIMIT 0,1";
		$best = $db->db->getOne($query);
		if(!$best){
			$best = 0;
		}
		if($this->af->get('scr') > $best){
			// 自己ベスト更新
			$this->af->setApp('is_best', true);
		}else{
			$this->af->setApp('is_best', false);
		}
		
		// スコア登録
		$userGameScore =& new Tv_UserGameScore($this->backend);
		$userGameScore->set('user_id', $user->get('user_id'));
		$userGameScore->set('game_id', $game->get('game_id'));
		$userGameScore->set('user_game_score_score', $this->af->get('scr'));
		$userGameScore->set('user_game_score_created_time', date('Y-m-d H:i:s'));
		$r = $userGameScore->add();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_DB);
			return 'user_error';
		}
		
		if($game->get('game_ranking')){
			// ランキング有効
			$score = $this->af->get('scr');
			$query = "SELECT (SELECT count(user_game_score_id) FROM user_game_score WHERE user_game_score_score>{$score})+1 as rank";
			$rank = $db->db->getOne($query);
			$this->af->setApp('rank', $rank);
		}
		
		return 'user_game_finish';
	}
}

?>
