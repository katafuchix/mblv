<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserResignConfirm extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼������ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserResignConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		$user = $this->session->get('user');
		
		//�ơ��֥� community_member
		$communityMember =& new Tv_CommunityMember($this->backend);
		
		//sql where
		$filter = array(
			'user_id' => $user['user_id'],	//��ʬ
			'community_member_status' => 2 ,//������
			//'community_status' => 1			//ͭ���ʥ��ߥ�˥ƥ�
		);
		
		//������community_id�����
		$communityList = $communityMember->searchProp(
			array('community_id'),
			$filter
		);
		
		// �������Ƥ��뎺�Ў��ƎÎ��ο����Ǽ�����ѿ�
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
		
		//��̷��������ʤ���񤵤��ʤ��ǡ����Ў��ƎÎ�������
		if( $myCommunityCount > 0){
			$this->ae->add(null, '', E_USER_RESIGN_COMMUNITY);
			return 'user_community_list';
		}
		//��񤹤�桼���������ߥ�˥ƥ������ͤ��ݤ��ǽ����ѹ� end
		
		
		//��������
		return 'user_resign_confirm';
	}
}
?>