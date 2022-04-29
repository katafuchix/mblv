<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����������ȱ������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'blog_article_id' => array(
			'required'	=> true,
		),
		'user_id'	=> array(
			'type'		=> VAR_TYPE_INT,
		),
		'page' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �桼�����������ȱ������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentView extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
		
		$user_session = $this->session->get('user');
		
		// ������¸�ߤ��ʤ����ϥ��顼��Ф� start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $this->af->get('blog_article_id'), 1 )
		);
		if( !$article->isValid() ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		// ������¸�ߤ��ʤ����ϥ��顼��Ф� end
		switch((integer)$article->get('blog_article_public'))
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
		return 'user_blog_comment_view';
	}
}
?>