<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����桼�����å��ߥ�˥ƥ����С������Խ����������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminUserCommunityEditDo extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'required'	=> true,
		),
		'check' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'type'		=> array(VAR_TYPE_INT),
		),
		'community_member_status' => array(
			'name'		=> '���С�����',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'option'	=> array(
				0 => '���С�������',
				1 => '���С�',
				// 2 => '������',
				3 => '�����;�ǧ�Ԥ�',
			),
		),
		'update' => array(),
	);
}

/**
 * �����桼�����å��ߥ�˥ƥ����С������Խ��¹ԥ��饹
 * 
 * �桼���������Խ����̤ν��Ͻ���
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminUserCommunityEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'admin_user_community_list';
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
		// ID�������å����줿���ɤ�����ǧ��Ԥ�
		if(!is_array($this->af->get('check'))){
			$this->ae->add(null, '���ߥ�˥ƥ������򤷤Ʋ�����');
			return 'admin_user_community_list';
		}
		
		foreach($this->af->get('check') as $communityId)
		{
			$communityMember =& new Tv_CommunityMember(
				$this->backend,
				array('user_id', 'community_id'),
				array($this->af->get('user_id'), $communityId)
			);
			
			if(!$communityMember->isValid()){
				$this->ae->add(null, '���ߥ�˥ƥ�ID������������ޤ���');
				continue;
			}
			if($communityMember->get('community_member_status') == 2){
				$this->ae->add(null, '', E_ADMIN_USER_COMMUNITY_EDIT_ADMIN);
				continue;
			}
			$communityMember->set(
				'community_member_status',
				$this->af->get('community_member_status')
			);
			$r = $communityMember->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
		}
		//$this->ae->add(null, '', I_ADMIN_USER_COMMUNITY_EDIT_DONE);
		return 'admin_user_community_list';
	}
}
?>