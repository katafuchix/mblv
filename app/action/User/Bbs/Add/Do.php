<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBbsAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'send' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼��������Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ��󡢸��ڥ��顼
		if($this->af->get('back') != '' || $this->af->validate() > 0) return 'user_bbs_add';
		
		// �����ƥ��顼
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_bbs_add';
		}
		
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
		// �������֥������Ȥ��ɲä���
		$message =& new Tv_Bbs($this->backend);
		$message->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��ʬ�ʳ��ν񤭹��ߤǤϿ���ե饰��Ĥ���
		if($user['user_id'] != $this->af->get('to_user_id')){
			$message->set('bbs_notice',1);
		}
		// �����С��饤��
		$message->add();
		
		//���������뤳�Ȥ�桼������E�᡼��Ǥ��Τ餻 start
		$user = $this->session->get('user');
		// ��ʬ���Ȥν񤭹��ߤξ�������ʤ�
		if($user['user_id'] != $this->af->get('to_user_id')){
			$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
			// �᡼�����������ǧ
			if($to_user->get('user_message_1_status')){
				$ms = new Tv_Mail($this->backend);
				// �ѥ�᥿������
				$to_user_nickname = $to_user->get('user_nickname');
				$to_user_mailaddress = $to_user->get('user_mailaddress');
				$to_user_hash = $to_user->get('user_hash');
				$value = array (
					'user_hash'		=> $to_user_hash,
					'from_user_nickname'	=> $user['user_nickname'],
					'to_user_nickname'	=> $to_user_nickname,
				);
				$ms->sendOne($to_user_mailaddress , 'user_bbs' , $value );
			}
		}
		// ���������뤳�Ȥ�桼������E�᡼��Ǥ��Τ餻 end
		
		// View���ֵѤ������
		$this->af->setApp('bbs_hash', $message->get('bbs_hash'));
		
		return 'user_bbs_add_done';
	}
}
?>