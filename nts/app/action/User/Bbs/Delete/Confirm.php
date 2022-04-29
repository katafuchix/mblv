<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����������ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'action/User/Bbs/Delete/Do.php';
class Tv_Form_UserBbsDeleteConfirm extends Tv_Form_UserBbsDeleteDo
{
}

/**
 * �桼�����������ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		
		// �������Τϼ�ʬ���񤭹������Τ���
		$userSession = $this->session->get('user');
		// �񤭹������  $message->get('from_user_id')
		// �񤭹��ޤ줿�� $message->get('to_user_id')
		if($userSession['user_id'] != $message->get('from_user_id') && $userSession['user_id'] != $message->get('to_user_id')){
			$this->ae->add(null, '', E_USER_BBS_MESSAGE_NOT_FOUND);
			return 'user_error';
		}
		
		if( !$message->isValid() ) {
			$this->ae->add(null, '', E_USER_BBS_MESSAGE_NOT_FOUND);
			return 'user_error';
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
		return 'user_bbs_delete_confirm';
	}
}
?>