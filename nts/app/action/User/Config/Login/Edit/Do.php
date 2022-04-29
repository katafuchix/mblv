<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����󤿤�����������ѹ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigLoginEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_password' => array(
			'name'		=> '�ʎߎ��܎��Ď�',
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 4,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'register' => array(
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'edit' => array(
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'delete' => array(
			'name'		=> '��������롡',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}
/**
 * �桼�����󤿤�����������ѹ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigLoginEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_config_login_edit';
		
		// ���å���󤫤�桼��������������
		$sess = $this->session->get('user');
		
		// DB����桼��������������
		$this->user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		//���Ϥ��줿�ѥ���ɤ�DB������������ѥ���ɤ�Ʊ������ǧ���㤦�ʤ��᤹
		if($this->user->get('user_password') != $this->af->get('user_password')){
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_config_login_edit';
		}
		
		return null;
	}
	
	function perform()
	{
		//��Ͽor�ѹ��ΤФ���
		if( $this->af->get('edit') || $this->af->get('register') ){
			//����ü��UID�����
			$um =& $this->backend->getManager('Util');
			$term = $um->getTermInfo();
			
			//UID�����Ǥ��ʤ���Ўێ��ގ��ݲ��̤˥�����쥯��
			if(!$term[5]){
				$this->ae->add(null, '', E_USER_IDENTIFY);//UID�򥯥饤����Ȥ�������Ǥ��ʤ��ä�
				return 'user_config_login_edit';
			}
			
			//uid�򥢥åץǡ��Ȥ���
			$this->user->set('user_uid',$term[5]);
			$res = $this->user->update();
			return 'user_config_login_edit_done';
		}
		//����ξ��
		elseif($this->af->get('delete')){
			//uid��null�ǹ�������
			$this->user->set('user_uid',NULL);
			$r = $this->user->update();
			return 'user_config_login_edit_done';
		}
	}
}

?>
