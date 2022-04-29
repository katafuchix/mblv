<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAdList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'ad_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'keyword' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����������������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAdList extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ad';
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
		return 'user_ad_list';
	}
}

?>
