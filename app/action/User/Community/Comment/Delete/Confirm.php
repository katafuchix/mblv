<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������Ⱥ����ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityCommentDeleteConfirm extends Tv_Form_UserCommunityCommentDeleteDo
{
}
/**
 * �桼�����ߥ�˥ƥ������Ⱥ����ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// ���֥������Ȥ����
		$o =& new Tv_CommunityComment($this->backend, 'community_comment_id', $this->af->get('community_comment_id') );
		// ���֥������Ȥ�̵���ʾ��
		if(!$o->isValid() || $o->get('community_comment_status') != 1){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		// ���֥������Ȥ򥻥åȤ���
		$this->af->setApp('comment', $o->getNameObject());
		return 'user_community_comment_delete_confirm';
	}
}
?>