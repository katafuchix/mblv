<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������ॹ������Ͽ���������ե�����
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
 * �桼�������ॹ������Ͽ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameScoreAdd extends Tv_ActionUser
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
		$user_uid = $um->getXuid();
		
		//UID�����Ǥ��ʤ���Х�������̤˥�����쥯��
		if(!$user_uid){
			$this->ae->add(null, '', E_USER_IDENTIFY);//UID�򥯥饤����Ȥ�������Ǥ��ʤ��ä�
			return 'user_error';
		}
		
		//��������UID�ǡ����ơ�����ͭ���Υ桼��������table:user�ˤ��뤫��ǧ
		$user =& new Tv_User(
			$this->backend,
			array('user_uid', 'user_status'),
			array($user_uid, 2)
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
			$this->af->get('game_code')
		);
		
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
