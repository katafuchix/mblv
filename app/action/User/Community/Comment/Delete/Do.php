<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������Ⱥ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_comment_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ������Ⱥ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)return 'user_community_comment_delete_confirm';
		if($this->af->get('back'))
		{
			$comment =& new Tv_CommunityComment(
				$this->backend,
				'community_comment_id',
				$this->af->get('community_comment_id')
			);
			$this->af->set('community_article_id', $comment->get('community_article_id'));
			return 'user_community_article_view';
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
		// ���ߥ�˥ƥ������ȥ��֥������Ȥ��������
		$comment =& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$this->af->get('community_comment_id')
		);
		
		// �������
		$comment->delete();
		
		// ���ߥ�˥ƥ�����ID�򥻥å�
		$this->af->set('community_article_id', $comment->get('community_article_id'));
		
		return 'user_community_comment_delete_done';
	}
}
?>