<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserResignDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_password' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'back' => array(
			'name'		=> '���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'resign' => array(
			'name'		=> '���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �桼�����¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserResignDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->get('back')) return 'user_home';
		if($this->af->validate() > 0) return  'user_resign_confirm';
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
		//��񤹤�桼���������ߥ�˥ƥ������ͤ��ݤ��ǽ����ѹ� start
		//session����桼�����������
		$sess = $this->session->get('user');
		
		//�ơ��֥� community_member
		$communityMember =& new Tv_CommunityMember($this->backend);
		
		//sql where
		$filter = array(
			'user_id'					=> $sess['user_id'],// ��ʬ
			'community_member_status'	=> 2 ,// ������
			//'community_status' => 1			//ͭ���ʥ��ߥ�˥ƥ�
		);
		
		//������community_id�����
		$communityList = $communityMember->searchProp(
			array('community_id'),
			$filter
		);
		
		// �������Ƥ��륳�ߥ�˥ƥ��ο����Ǽ�����ѿ�
		$myCommunityCount = 0;
		
		//���ʬ�������꤫����
		foreach($communityList[1] as $key => $item)
		{
			//��������community_id���顢����˥��ߥ�˥ƥ�̾�ȥ��ơ����������
			$community =& new Tv_Community(
				$this->backend,
				'community_id',
				$item['community_id']
			);
			if( $community->get('community_status') == 1 ) $myCommunityCount++;
		}
		
		//��̷��������ʤ���񤵤��ʤ��ǡ����ߥ�˥ƥ�������
		if( $myCommunityCount > 0){
			$this->ae->add(null, '', E_USER_RESIGN_COMMUNITY);
			return 'user_community_list';
		}
		//��񤹤�桼���������ߥ�˥ƥ������ͤ��ݤ��ǽ����ѹ� end
		
		// �桼����������
		$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		/* =============================================
		// �桼���������Ͽ
		 ============================================= */
		$timestamp = date('Y-m-d H:i:s');
		$uh = new Tv_UserHist($this->backend);
		$uh->set('user_id', $user->get('user_id'));
		$uh->set('user_mailaddress', $user->get('user_mailaddress'));
		$uh->set('spgv_user_id', $user->get('spgv_user_id'));
		$uh->set('user_status', 3);
		$uh->set('user_hist_created_time', $timestamp);
		$uh->add();
		
		// adna�����б��Τ���user���ѿ��������
		$this->af->setApp('user',$user->getNameObject());
		
		// �����������ݡ���
		$an = $this->backend->getManager('Analytics');
		$param = array(
			'pre_regist'	=> false,
			'regist'		=> false,
			'invite'		=> false,
			'media'			=> false,
			'resign'		=> true,
		);
		$an->addAnalytics($param);
		
		//�桼������������
		$userManager =& $this->backend->getManager('User');
		if($userManager->resign($this->af->get('user_password')))
			return 'user_resign_done';
		else
			return 'user_resign_confirm';	// �׽���:���顼ȯ������������
	}
}

?>
