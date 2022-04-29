<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������ɽ�����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileImageView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'image_id' => array(
			'type'  => VAR_TYPE_INT,
			'required'  => true,
		),
		// �����
		'community_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'community_article_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'blog_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'blog_article_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'message_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'message_type' => array(
			'type'  => VAR_TYPE_STRING,
		),
		//������å�������
		'bbs_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		//������å������ѥץ�ե�����������
		'to_user_id' => array(
			'type'  => VAR_TYPE_INT,
		),
	);
}

/**
 * �桼������ɽ�����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileImageView extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) 'user_error';
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
		return 'user_file_image_view';
	}
}

?>
