<?php
/**
 * Tv_CommunityMember.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ߥ�˥ƥ����С��ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CommunityMemberManager extends Ethna_AppManager
{
	/**
	 * ���ߥ�˥ƥ����С��ɲ�
	 * @param user_id �桼��ID
	 * @param community_id ���ߥ�˥ƥ�ID
	 */
	function addCommunityMember($param)
	{
		// �ѥ�᥿���������
		if(array_key_exists('user_id', $param))			$user_id		= $param['user_id'];
		if(array_key_exists('community_id', $param))	$community_id	= $param['community_id'];
		
		// ɬ�׹��ܤ��ʤ����Ͻ�����λ����
		if(!$user_id || !$community_id) return false;
		
		// �����������ߥ�˥ƥ��˻��ä��Ƥ��ʤ�����ǧ����
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($community_id, $user_id)
		);
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
				// ���
				case 0:
					// ��ǡ�����õ�
					$communityMember->remove();
				// ���С�
				case 1:
				// �����ʡ�
				case 2:
					return false;
				// �����Ѥ�
				case 3:
					return false;
				}
		}
		
		// ���ߥ�˥ƥ��������
		$community =& new Tv_Community($this->backend,'community_id',$community_id);
		
		// ���ߥ�˥ƥ����С��ɲ�
		$communityMember =& new Tv_CommunityMember($this->backend);
		$communityMember->set('community_id', $community_id);
		$communityMember->set('user_id', $user_id);
		
		// ï�Ǥ⻲�äǤ���
		if($community->get('community_join_condition') == 1){
			// ���С�����
			$communityMember->set('community_member_status', 1);
			$communityMember->add();
			// ���ߥ�˥ƥ����󹹿�
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
		}
		// �����ͤε��Ĥ�ɬ��
		else{
			// ���С�����
			$communityMember->set('community_member_status', 3);
			// [�׸�Ƥ]��å���������������
			$communityMember->add();
		}
		return true;
	}
	
	// ���ߥ�˥ƥ����Υ��Ф���񤵤�������������
	function delete($communityMemberId)
	{
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$communityMemberId
		);
		$communityMember->set('community_member_status', 0);
		$communityMember->update();
	}
	
	// ���ߥ�˥ƥ���ǤΥ桼���ξ��󡢸����������
	function getUserStatus($communityId, $userId)
	{
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
		);
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('user_id', 'community_id'),
			array($userId, $communityId)
		);
		
		if($communityMember->isValid()
			&& $communityMember->get('community_member_status') > 0
			&& $communityMember->get('community_member_status') < 3
		)
		{
			// ���С�
			$isMember = true;
			$isAdmin = ($communityMember->get('community_member_status') == 2);
			$canAddTopic = ($community->get('community_topic_permission') != 2
								|| $communityMember->get('community_member_status') == 2
			);
			$canReadArticle = true;
		}else{
			// ���С��ǤϤʤ�
			$isMember = false;
			$isAdmin = false;
			$canAddTopic = false;
			$canReadArticle = ($community->get('community_join_condition') != 3);
		}
		
		$result = array(
			'is_member'			=> $isMember,
			'is_admin'			=> $isAdmin,
			'can_add_topic'		=> $canAddTopic,
			'can_read_article'	=> $canReadArticle,
		);
		
		return $result;
	}
	
	// ���ߥ�˥ƥ����Υ��ơ����������ˤ���
	// ���������ޤ���community_member_status:0�ϥ��С��������Ǥ���2007/09/13
	function statusOff($communityMemberId)
	{
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$communityMemberId
		);
		$communityMember->set('community_member_status', 0);
		$communityMember->update();
	}
}

/**
 * ���ߥ�˥ƥ����С����֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CommunityMember extends Ethna_AppObject
{
}
?>