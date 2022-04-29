<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х�������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_avatar_id_list' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'type'			=> array(VAR_TYPE_INT),
			'name'			=> '�Վ����ގ��ʎގ���ID',
		),
	);
}

/**
 * �桼�����Х����¹Լ¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar_home';
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
		// �����ॹ���������
		$timestamp = date('Y-m-d H:i:s');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// �桼�����Х���ID���������
		$user_avatar_id_list = $this->af->get('user_avatar_id_list');
		
		// ���Х���ID�����򤵤�Ƥ��ʤ����
		if(!is_array($user_avatar_id_list)){
			$this->ae->add('errors', "���ʎގ��������򤷤Ƥ���������");
			return 'user_avatar_home';
		}
		
		foreach($user_avatar_id_list as $v){
			/* =============================================
			// �桼�����Х������
			 ============================================= */
			$ua = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v);
			// ͭ���ʥ쥳���ɤˤξ��
			if($ua->isValid()){
				$ua->set('user_avatar_status', 0);
				$ua->set('user_avatar_deleted_time', $timestamp);
				$r = $ua->update();
				if(Ethna::isError($r)) return 'user_avatar_home';
			}
		}
		
		// �ե������ͤ򥯥ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_USER_AVATAR_DELETE_DONE);
		return 'user_avatar_home';
	}
}

?>
