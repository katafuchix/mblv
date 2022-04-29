<?php
/**
 * Tv_BlackList.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �֥�å��ꥹ�ȥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlackListManager extends Ethna_AppManager
{
	/**
	 * �֥�å��ꥹ�ȥ����å�
	 * 
	 * @access public
	 * @param 
	 * 	���������ػߤˤ������
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����ΣԣϣХڡ����ϱ����Ǥ��롣
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����������Ĥν񤭤��ߤ��Բ�ǽ�ˤ��롣
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����ξҲ�ʸ���/�Խ��Ǥ��ʤ��褦�ˤ��롣
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����ؤ�ͧã�������Բ�ǽ�ˤ��롣 
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����ؤΥߥ˥᡼���������Բ�ǽ�ˤ��롣 
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����������α�������ӽ񤭤��ߤ��Բ�ǽ�ˤ��롣 
	 * ���֥�å��ꥹ�Ȥ���Ͽ���줿�桼������  �֥�å��ꥹ�Ȥ���Ͽ�����桼�����μ�ť��ߥ�˥ƥ��ؤλ��ä��Բ�ǽ�ˤ��롣 
	 */
	 function check(){
		// ���������̾�������ơ����Υ��������ϥ֥�å��ꥹ�ȥ����å�����Τ�Ƚ��
		foreach($this->backend->controller->action as $key => $value) {
			$action_class_name = $this->backend->controller->action[$key]['class_name'];
		}
		// �֥�å��ꥹ�ȼԤ���Υ���������ػߤ��륢������󥯥饹̾����
		$prohibition_action_class_name_array = array(
			'Tv_Action_UserFriendApply',// ͧã����
			'Tv_Action_UserMessageSend',// ��å���������
			'Tv_Action_UserBlogCommentAddConfirm',// ������������Ƴ�ǧ
			'Tv_Action_UserCommunityJoinDo',// ���ߥ�˥ƥ�����
			//'Tv_Action_UserProfileView',// �ץ�ե��������
			'Tv_Action_UserBbsAddConfirm',// ��������Ƴ�ǧ
			'Tv_Action_UserBbsEditConfirm',// �������Խ���ǧ
			'Tv_Action_UserBlogArticleView',// ��������
			'Tv_Form_UserFriendIntroductionEditConfirm',//�Ҳ�ʸ�Խ���ǧ
		);
		// �֥�å��ꥹ�Ȥ��оݤΥ��������ξ��ʲ�������¹Ԥ���
		if(in_array ( $action_class_name, $prohibition_action_class_name_array)){
			// ���ʥ������������¦�ˤ�user_id�����ʥ��������ˤ�äƼ�������key���㤦
			foreach($_REQUEST as $k => $v){
				// ������������Ƴ�ǧ
				if($action_class_name == 'Tv_Action_UserBlogCommentAddConfirm'){
					if($k == 'user_id') $other_user_id = $v;
				}
				// ���ߥ�˥ƥ�����
				// �оݼԤ������ͤΥ��ߥ�˥ƥ��ؤλ���
				elseif($action_class_name == 'Tv_Action_UserCommunityJoinDo'){
					if($k == 'community_id') $community_id = $v;
				}
				// ��������
				elseif($action_class_name == 'Tv_Action_UserBlogArticleView'){
					if($k == 'blog_article_id') $blog_article_id = $v;
				}
				// ����¾
				else{
					if($k == 'to_user_id') $other_user_id = $v;
				}
			}
			//�оݼԤ������ͤΥ��ߥ�˥ƥ��ؤλ���
			// ���ʥ������������¦�ˤ�user_id�����ʾ�Ǽ�������community_id�����Ǥ�user_id�������ʤΤǤ�����user_id����
			if($action_class_name == 'Tv_Action_UserCommunityJoinDo'){
				$sql = 	'select user_id from community_member where community_id = ' . $community_id . 
						' and community_member_status = 2 ';
				$db = $this->backend->getDB();
				$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
				// ���顼�Ǥʤ����
				if(!Ethna::isError($rows)){
					if($rows[0]['user_id']){
						$other_user_id = $rows[0]['user_id'];
					}
				}
			}
			//�оݼԤ����������
			// ���ʥ������������¦�ˤ�user_id�����ʾ�Ǽ�������blog_article_id�����Ǥ�user_id�������ʤΤǤ�����user_id����
			if($action_class_name == 'Tv_Action_UserBlogArticleView'){
				$sql = 	'select user_id from blog_article where blog_article_id = ' . $blog_article_id ; 
				$db = $this->backend->getDB();
				$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
				// ���顼�Ǥʤ����
				if(!Ethna::isError($rows)){
					if($rows[0]['user_id']){
						$other_user_id = $rows[0]['user_id'];
					}
				}
			}
			// ���ʥ������������¦�ˤ�user_id����
			if($action_class_name == 'Tv_Action_UserProfileView'){//���Υץ�ե��������
				$other_user_id = $_REQUEST['user_id'];
			}
			// ��ʬ�ʥ�����������¦�ˤ�user_id����
			$u = $this->session->get('user');
			$my_user_id = $u['user_id'];
			// ���ʥ������������¦�ˤ�����ʬ�ʥ�����������¦�ˤ򡢥֥�å��ꥹ����Ͽ���Ƥ��뤫Ƚ��
			$db = $this->backend->getDB();
			$sql = 	'select count(black_list_id)as cnt from black_list where black_list_user_id = '.$other_user_id.
					' and black_list_deny_user_id = '.$my_user_id.' and black_list_status = 1 ';
			$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
			// ���顼�Ǥʤ����
			if(!Ethna::isError($rows)){
				// �֥�å��ꥹ����Ͽ����Ƥ�����
				if($rows[0]['cnt'] > 0){
					return true;
				}
			}
		}
		return false;
	 }
}

/**
 * �֥�å��ꥹ�ȥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlackList extends Ethna_AppObject
{
}
?>