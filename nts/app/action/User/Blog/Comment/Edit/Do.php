<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������������Խ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_comment_id' => array(
			'required'	=> true,
		),
		'blog_comment_body' => array(
			'required'	=> true,
		),
		'blog_comment_hash' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'submit' => array(
		),
		'back' => array(
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
		'twitter_status' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�������������Խ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogCommentEditDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ʥѥܡ��ɤξ��ϥ����Ȥ�max������500ʸ���ˤ���
		if($this->af->get('twitter_status')){
			$this->af->form['blog_comment_body']['max'] = 1024;
		}
		
		// ��������
		if($this->af->get('delete_image')){
			$comment =& new Tv_BlogComment(
				$this->backend,
				'blog_comment_id',
				$this->af->get('blog_comment_id')
			);
			if($comment->isValid()) $comment->deleteImage();
			return 'user_blog_comment_edit';
		}
		if( $this->af->validate() > 0 ) {
			return 'user_blog_comment_edit';
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
		// ���������ȥ��֥������Ȥμ���
		$comment =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		
		// ���֥������Ȥ�̵���Ǥ��뤫�����Ȥ��������Ƥ���Ȥ�
		if( !$comment->isValid() || $comment->get('blog_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// ���Υ����������Ϥ�����
		$this->af->set( 'blog_article_id', $comment->get('blog_article_id') );
		
		// �֤������פ򲡤����ʤ����������
		if( $this->af->get('back') ) {
			return 'user_blog_comment_edit';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		// ������¸�ߤ��ʤ����ϥ��顼��Ф� start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $comment->get('blog_article_id'), 1 )
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
		
		// ���������Ȥ��Խ�
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$comment->update();
		if(Ethna::isError($r)) return 'user_blog_article_view';
		
		$this->af->setApp('blog_comment_hash', $comment->get('blog_comment_hash'));
		
		// �ʥѥܡ���
		if($article->get('twitter_status')){
			$this->af->set('blog_comment_body','');
			return 'user_blog_article_view';
		}
		
		return 'user_blog_comment_edit_done';
	}
}

?>
