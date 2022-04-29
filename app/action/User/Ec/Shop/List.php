<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * Ź�޸����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcShopList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'shop_name' => array(
			'type' 			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'search' => array(//���ʸ���
			'type' 		=> VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
		'start' => array(
			'type' 		=> VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
	);
}

/**
 * Ź�޸����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcShopList extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ec_item_search';
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
		return 'user_ec_shop_list';
	}
}
?>