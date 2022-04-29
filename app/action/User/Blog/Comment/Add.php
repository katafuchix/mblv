<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������ɲå��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_id' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'blog_article_id' => array(
			'required'	=> true,
		),
	);
}
/**
 * �桼�������������ɲå��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentAdd extends Tv_ActionUserOnly
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
		return 'user_blog_article_comment_add';
	}
}
?>