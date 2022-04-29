<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������Ⱥ����ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityCommentDeleteConfirm extends Tv_Form_UserCommunityCommentDeleteDo
{
}
/**
 * �桼�����ߥ�˥ƥ������Ⱥ����ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityCommentDeleteConfirm extends Tv_ActionUserOnly
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
		$comment =& new Tv_CommunityComment( &$this->backend, 'community_comment_id', $this->af->get('community_comment_id') );
		
		if( !$comment->isValid() || $comment->get('community_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		$this->af->setApp( 'comment', $comment->getNameObject() );

		
		return 'user_community_comment_delete_confirm';
	}
}

?>
