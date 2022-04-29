<?php
/**
 * Category.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ƥ���������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcCategory extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'item_category_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'page' => array(
			'type'        => VAR_TYPE_INT,
		),
		'start' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}
/**
 * ���ƥ���������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcCategory extends Tv_ActionUser
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
		return 'user_ec_category';
	}
}
?>