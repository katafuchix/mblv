<?php
/**
 * Finish.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������ཪλ���������ե�����
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
 * �桼�������ཪλ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameFinish extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// ��ñ������start
		//����ü��UID�����
		$um =& $this->backend->getManager('Util');
		$xuid = $um->getXuid();
		
		//UID�����Ǥ��ʤ���Х�������̤˥�����쥯��
		if(!$xuid){
			$this->ae->add(null, '', E_USER_IDENTIFY);//UID�򥯥饤����Ȥ�������Ǥ��ʤ��ä�
			return 'user_error';
		}
		
		//��������UID�ǡ����ơ�����ͭ���Υ桼��������table:user�ˤ��뤫��ǧ
		$user =& new Tv_User(
			$this->backend,
			array('user_uid', 'user_status'),
			array($xuid, 2)
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_IDENTIFY);//DB�ˤʤ��ä�
			return 'user_error';
		}
		// ������
		$userManager =& $this->backend->getManager('User');
		if(!$userManager->login($user->get('user_mailaddress'),$user->get('user_password'))){
			$this->ae->add(null, '', E_USER_IDENTIFY);//DB�ˤʤ��ä�
			return 'user_error';
		}
		// ��ñ������end
		
		// ���������
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
		
		// �桼�����������������Ƥ��뤫��ǧ
		$userGame =& new Tv_UserGame(
			$this->backend,
			array('user_id', 'game_id'),
			array($user->get('user_id'), $game->get('game_id'))
		);
		if(!$userGame->isValid()){
			$this->ae->add(null, '', E_USER_GAME_ACCESS_DENIED);
			return 'user_error';
		}
		
		// ���ʥ٥���Ƚ��
		$db	=& $this->backend->getDB();
		$user_id = $user->get('user_id');
		$game_id = $game->get('game_id');
		$query = "SELECT user_game_score_score FROM user_game_score WHERE user_id={$user_id} AND game_id={$game_id} ORDER BY user_game_score_score LIMIT 0,1";
		$best = $db->db->getOne($query);
		if(!$best){
			$best = 0;
		}
		if($this->af->get('scr') > $best){
			// ���ʥ٥��ȹ���
			$this->af->setApp('is_best', true);
		}else{
			$this->af->setApp('is_best', false);
		}
		
		// ��������Ͽ
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
			// ��󥭥�ͭ��
			$score = $this->af->get('scr');
			$query = "SELECT (SELECT count(user_game_score_id) FROM user_game_score WHERE user_game_score_score>{$score})+1 as rank";
			$rank = $db->db->getOne($query);
			$this->af->setApp('rank', $rank);
		}
		
		return 'user_game_finish';
	}
}

?>
