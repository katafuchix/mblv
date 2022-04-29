<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������Խ���ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('Do.php');
class Tv_Form_UserBlogArticleEditConfirm extends Tv_Form_UserBlogArticleEditDo
{
}

/**
 * �桼�������Խ���ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleEditConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ʥѥܡ��ɤξ��ϥ����ȥ��ɬ�ܤȤ��ʤ�
		if($this->af->get('twitter_status')){
			$this->af->form['blog_article_body']['required'] = false;
			$this->af->form['blog_article_title']['max'] = 140;
			$this->af->form['blog_article_title']['name'] = '���';
			$this->af->form['blog_article_public']['required'] = false;
		}
		
		// ���ܥ���
		if($this->af->get('back')) return 'user_blog_article_view';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_blog_article_edit';
		
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
		// HIDDEN�ե������������View�ǹԤ�
		return 'user_blog_article_edit_confirm';
	}
}
?>
