<?php
/**
 * Tv_ActionUser.php
 * 
 * @author Technovarth
 * @package SNSV
 */

require_once 'Tv_ActionClass.php';

/**
 * �桼���Τߤ����������Ǥ��륢�������δ��쥯�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionUser extends Tv_ActionClass
{
	/**
	 * ǧ��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// ���ܾ�����������
		parent::setSnsInfo();
		
		// �������ײ��Ϥ�����
		$s = & $this->backend->getManager('Stats');
		$s->addStats('access');
		
		//���ƥʥ󥹥ե饰��ON(������
		$sns_info = $this->config->get('sns_info');
		if($sns_info['sns_maintenance_status'] == 1){
			return 'user_maintenance';
		}
		
		// �֥�å��ꥹ�ȥ����å�
		$b = & $this->backend->getManager('BlackList');
		// �֥�å��ꥹ�Ȥ���Ͽ����Ƥ�����ϥ��顼���̤�
		if($b->check()){
			$this->ae->add(null, '', E_USER_BLACKLIST_HOME);
			return 'user_error';
		}
		
		// ͧã��󥯿����ʤ��user_friend_apply�ء�
		$friend_apply_request = '';
		if(array_key_exists('action_user_friend_apply',$_REQUEST)){ $friend_apply_request = true; }
		if($friend_apply_request && $_REQUEST['to_user_id'] && $_REQUEST['user_hash']){
			return 'user_friend_apply';
		}
		
		return parent::authenticate();
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return parent::prepare();
	} 
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return parent::perform();
	}
} 
?>