<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������Ͽ��ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserBlogArticleAddConfirm extends Tv_Form_UserBlogArticleAddDo
{
}

/**
 * �桼��������Ͽ��ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleAddConfirm extends Tv_ActionUserOnly
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
		if ($this->af->validate() > 0) return 'user_blog_article_add';
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
		// HIDDEN�ե�����������View�ǹԤ�
		return 'user_blog_article_add_confirm';
	}
}
?>