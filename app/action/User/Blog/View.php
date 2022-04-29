<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'blog_article' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�������������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogView extends Tv_ActionUserOnly
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
		return 'user_blog_view';
	}
}
?>