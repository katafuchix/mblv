<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ѥ�������ᥢ�������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserRemindDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_mailaddress' => array(
			'name'		=> '�Ҏ��َ��Ďގڎ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'custom'	=> 'checkMailaddress',
		),
	);
}

/**
 * �桼���ѥ�������ᥢ�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRemindDo extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_remind';
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
		// �ѥ��������
		$o =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('user_mailaddress'));
		if($o->get('user_status') == 2){
			// �᡼������
			$m = new Tv_Mail($this->backend);
			$value = array (
				'user_hash'	=> $o->get('user_hash'),
				'user_password'	=> $o->get('user_password'),
			);
			$m->sendOne($this->af->get('user_mailaddress'), 'user_remind', $value );
		}
		// �᡼�륢�ɥ쥹����Ͽ����Ƥ��뤫�ɤ�����ʬ���äƤ��ޤ��Τǡ�
		// �桼������Ͽ����Ƥ��ʤ����Ǥ�Ʊ����å�������ɽ������
		$this->ae->add(null, '', I_USER_REMIND_DONE);
		
		return 'user_remind_done';
	}
}

?>
