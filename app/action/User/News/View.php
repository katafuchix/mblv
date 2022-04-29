<?php
/**
 * View.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼���˥塼���������������ե�����
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Form_UserNewsView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'news_id' => array(
			'required'	=> true,
		),
		'return' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}
/**
 * �桼���˥塼���������������
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserNewsView extends Tv_ActionUser
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
		return 'user_news_view';
	}
}
?>