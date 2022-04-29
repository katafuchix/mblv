<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������������Ͽ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
			'required'  => true,
		),
		'blog_article_id' => array(
			'required'  => true,
		),
		'blog_comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
		),
		'twitter_status' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼��������������Ͽ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */class Tv_Action_UserBlogCommentAddDo extends Tv_ActionUserOnly
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
		
		// ���ܥ��󡢸��ڥ��顼
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			return 'user_blog_article_view';
		}
		
		// �����ƥ��顼
		if (Ethna_Util::isDuplicatePost()) {
			// �ʥѥܡ��ɤΥ����
			if($this->af->get('twitter_status')){
				$this->af->set('blog_comment_body','');
			}else{
				$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			}
			return 'user_blog_article_view';
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
		$timestamp = date('Y-m-d H:i:s');
		// �����������֥������Ȥ��������
		$article =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		// ������¸�ߤ��ʤ����ϥ��顼
		if( !$article->isValid() || $article->get('blog_article_status') == 0 ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
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
		
		// ���������ȥ��֥������Ȥ��ɲ�
		$comment =& new Tv_BlogComment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ̤�ɥե饰
		$comment->set('blog_comment_notice', 1);
		// �����С��饤��
		$r = $comment->add();
		if(Ethna::isError($r)) return 'user_blog_article_view';
		
		// ���������ȼ��̻Ҥ򥻥å�
		$this->af->setApp('blog_comment_hash',$comment->get('blog_comment_hash'));
		
		// �������֥������Ȥ򹹿�
		$article->set('blog_article_comment_num', $article->get('blog_article_comment_num') + 1);
		$article->set('blog_article_comment_time', $timestamp);
		// ��ʬ�������ǤϤʤ����Τ�����������̤�ɥե饰�򹹿�
		if( $user_session['user_id'] != $article->get('user_id') ){
			$article->set('blog_article_notice', 1);
		}
		$article->update();
		
		// �ʥѥܡ���
		if($article->get('twitter_status')){
			$this->af->set('blog_comment_body','');
			return 'user_blog_article_view';
		}
		
		return 'user_blog_comment_add_done';
	}
}
?>
