<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Ժ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserInviteDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'invite_id' => array(
			'form'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'  => true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����Ժ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserInviteDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_invite';
		
		// �֤������פ������줿�ʤ�����
		if( $this->af->get('back') ) {
			return 'user_invite';
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
		// ���ԥ��֥������Ȥ��������
		$o =& new Tv_Invite($this->backend,'invite_id',$this->af->get('invite_id'));
		
		// ���Ԥ�¸�ߤ��ʤ����ϥ��顼��Ф�
		if( !$o->isValid() ) {
			$this->ae->add(null, '', E_USER_INVITE_NAME_NOT_FOUND);
			return 'user_error';
		}
		
		// �桼����ID���������
		$user_id = $o->get('to_user_id');
		
		// ʪ�����
		$o->remove();
		
		return 'user_invite_delete_done';
	}
}
?>