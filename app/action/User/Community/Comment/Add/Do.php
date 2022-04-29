<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ���������Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'community_comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ���������Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'user_community_article_view';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_community_article_view';
		
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
		// ���ߥ�˥ƥ��������ɲ�
		$comment =& new Tv_CommunityComment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$comment->add();
		
		// ���ߥ�˥ƥ�������ID�򥻥å�
		$this->af->set('community_comment_id', $comment->getId());
		
		// ���ߥ�˥ƥ����̻Ҥ򥻥å�
		$this->af->setApp('community_comment_hash', $comment->get('community_comment_hash'));
		
		// ���ߥ�˥ƥ��ȥԥå�����
		$article =& new Tv_CommunityArticle($this->backend, 'community_article_id', $comment->get('community_article_id'));
		$article->set('community_article_comment_num', $article->get('community_article_comment_num') + 1);
		$timestamp = date('Y-m-d H:i:s');
		$article->set('community_article_comment_time', $timestamp);
		$article->update();
		
		return 'user_community_comment_add_done';
	}
}
?>