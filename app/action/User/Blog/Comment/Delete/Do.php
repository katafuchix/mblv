<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����������Ⱥ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_comment_id' => array(
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
		'delete_confirm' => array(
		),
	);
}
/**
 * �桼�����������Ⱥ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if( $this->af->validate() > 0 ) return 'user_home';
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
		// ���������ȥ��֥������Ȥμ���
		$comment =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		
		// �����Ȥ�¸�ߤ��ʤ����ϥ��顼��Ф�
		if( !$comment->isValid() || $comment->get('blog_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// �ե�������ͤ��Ϥ�
		$this->af->set( 'blog_article_id', $comment->get('blog_article_id') );
		
		// �֤������פ������줿�ʤ�����
		if( $this->af->get('back') ) {
			return 'user_blog_article_view';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		// ������¸�ߤ��ʤ����ϥ��顼��Ф� start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $comment->get('blog_article_id'), 1)
		);
		if( !$article->isValid() ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		// ������¸�ߤ��ʤ����ϥ��顼��Ф� end
		switch($article->get('blog_article_public'))
		{
		case 0:	// �����
			if($article->get('user_id') != $user_session['user_id']){
				$this->ae->add(null, '', E_USER_BLOG_ARTICLE_ACCESS_DENIED);
				return 'user_error';
			}
			break;
		case 2: // ͧã�ޤǸ���
			if(!$um->getUserRelation($article->get('user_id'), $user_session['user_id']))
			{
				$this->ae->add(null, '', E_USER_BLOG_ARTICLE_ACCESS_DENIED);
				return 'user_error';
			}
			break;
		}
		
		// �����Ȥ��������
		$comment->set('comment_status', 0);
		$comment->set('comment_deleted_time', date('YmdHis'));
		$comment->update();

		// ���������Ȥ��������
		// �����С��饤��
		// �������֥������ȤΥ����ȿ��⼫ư����
		$comment->delete();
		
		return 'user_blog_comment_delete_done';
	}
}
?>