<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������Ը��¾��ϼ¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');
class Tv_Form_UserCommunityAdminPowerGiveDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'new_admin_user_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'give' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'		=> '����������',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ������Ը��¾��ϼ¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAdminPowerGiveDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->get('back')) return 'user_community_admin_member';
		if($this->af->validate() > 0)
			return 'user_home';
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
		
		//�桼������򥻥å���󤫤����
		$userSession = $this->session->get('user');
		$admin_user_id = $userSession['user_id'];
		
		
		//���Ύ��Ў��ƎÎ��δ������¤�
		$community_id = $this->af->get('community_id');
		
		
		//���Υ桼�������顢
		//echo $admin_user_id;
		
		
		//���Υ桼�����ˤ錄��
		$new_admin_user_id = $this->af->get('new_admin_user_id');
		
		
		//��ʬ���鼫ʬ�ؤϣ�
		if($admin_user_id == $new_admin_user_id){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_GIVE_SELF);
			return 'user_community_admin_member';
		}
		
		
		//����community_id�δ����Ԥ�admin_user_id����
		$cm =& $this->backend->getManager('CommunityMember');
		$cm_res = $cm->getUserStatus($community_id,$admin_user_id);
		//var_dump($cm_res);
		//array(4) { ["is_member"]=>  bool(true) ["is_admin"]=>  bool(true) ["can_add_topic"]=>  bool(true) ["can_read_article"]=>  bool(true) }
		if( ($cm_res['is_member'] === true) && ($cm_res['is_admin'] === true) ){
			//������
		}else{
			//�����ԤǤϤʤ�
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN);
			return 'user_community_admin_member';
		}
		
		
		//������admin_user��community_member key�����
		$c =& new Tv_CommunityMember($this->backend);
		$r = $c->searchProp(
			array('community_member_id'),
			array(
				'community_id' => $community_id,
				'user_id' => $admin_user_id,
				'community_member_status' => 2,
				'community_status' => 1,
			)
		);
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_FORMER_GET);
			return 'user_community_admin_member';
		}
		$community_member_id = $r[1][0]['community_member_id'];
		
		
		//��������new_admin_user��community_member key�����
		$c =& new Tv_CommunityMember($this->backend);
		$r = $c->searchProp(
			array('community_member_id'),
			array(
				'community_id' => $community_id,
				'user_id' => $new_admin_user_id,
				'community_member_status' => 1,
				'community_status' => 1,
			)
		);
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_LATER_GET);
			return 'user_community_admin_member';
		}
		$new_community_member_id = $r[1][0]['community_member_id'];
		
		
		//�����Ԥ���С���admin update
		$c =& new Tv_CommunityMember($this->backend,'community_member_id',$community_member_id);
		$c->set('community_member_status',1);
		$r = $c->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_FORMER_SET);
			return 'user_community_admin_member';
		}
		
		
		//�������Ԥ�����new admin update
		$c =& new Tv_CommunityMember($this->backend,'community_member_id',$new_community_member_id);
		$c->set('community_member_status',2);
		$r = $c->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_LATER_SET);
			return 'user_community_admin_member';
		}
		
		
		//���ߥ�˥ƥ�̾���åȡ����å�
		$c =& new Tv_Community($this->backend,'community_id',$community_id);
		$this->af->setApp('community_title',$c->get('community_title'));
		
		$this->ae->add(null, '', I_USER_COMMUNITY_ADMIN_GIVE_DONE);
		return 'user_community_admin_power_give_done';
		
	}
}
?>