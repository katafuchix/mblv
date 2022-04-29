<?php
/**
 * Do.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ����¹ԥ��������ե�����
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Form_UserCommunityResignDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'back' => array(
			'name'		=> '����������',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'resign' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		
	);
}

/**
 * �桼�����ߥ�˥ƥ����¹ԥ��������
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunityResignDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �֤������ץܥ��󤬲����줿�Ȥ��ϥ��ߥ�˥ƥ������
		if($this->af->get('back'))
		{
			return 'user_community_view';
		}
		
		// �Х�ǡ���
		if($this->af->validate() > 0)
		{
			return 'user_community_resign_confirm';
		}
		
		// Session����桼����������
		$user = $this->session->get('user');
		
		// �桼�������ߥ�˥ƥ��˻��ä��Ƥ��뤫��Ĵ�٤�
		$community_member =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array(
				$this->af->get('community_id'),
				$user['user_id'],
			)
		);
		if($community_member->isValid())
		{
			switch($community_member->get('community_member_status'))
			{
			case 1:	// ���С�
				// ���Ǥ���
				return null;
				
			case 2:	// �����ʡ�
				// �������¤���Ϥ��ʤ������Ǥ��ʤ�
				$this->ae->add(null, '', E_USER_COMMUNITY_RESIGN_ADMIN);
				return 'user_community_resign_error';
			}
		}
		
		// ���ߥ�˥ƥ��˻��ä��Ƥ��ʤ����ϥ��顼
		$this->ae->add(null, '', E_USER_ACCESS_DENIED);
		return 'user_error';
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// Session����桼����������
		$user = $this->session->get('user');
		
		// ���ߥ�˥ƥ����Ф����
		$community_member =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		if($community_member->isValid())
		{
			// ���ߥ�˥ƥ����Фξ��֤��0:���С��������פˤ��ƹ�������
			$community_member->set('community_member_status', 0);
			$community_member->update();
			
			// ���ߥ�˥ƥ��Υ��п��򸺤餹
			$community =& new Tv_Community(
				$this->backend,
				'community_id',
				$this->af->get('community_id')
			);
			if($community->isValid())
			{
				$community->set(
					'community_member_num',
					$community->get('community_member_num') - 1
				);
				$community->update();
			}
		}
		
		return 'user_community_resign_done';
	}
}
?>