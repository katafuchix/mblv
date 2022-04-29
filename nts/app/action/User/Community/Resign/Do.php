<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ����¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityResignDo extends Tv_ActionUserOnly
{
	/**
	 * ǧ��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		parent::authenticate();
		
		if($this->af->get('back')) return 'user_community_view';
		
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array(
				$this->af->get('community_id'),
				$user['user_id'],
			)
		);
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
			case 1:	// ���С�
				return null;
				
			case 2:	// �����ʡ�
				$this->ae->add(null, '', E_USER_COMMUNITY_RESIGN_ADMIN);
				return 'user_error';
			}
		}
		
		$this->ae->add(null, '', E_USER_ACCESS_DENIED);
		return 'user_error';
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_community_resign_confirm';
		if($this->af->get('back')) return 'user_community_view';
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
		
		/*$communityManager =& $this->backend->getManager('User');

		if($communityManager->resign())
			return 'user_community_resign_done';
		else
			return 'user_community_resign_confirm';	// �׽���:���顼ȯ������������*/
			
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		if($communityMember->isValid())
		{
			$communityMember->set('community_member_status', 0);
			$communityMember->update();
			
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
