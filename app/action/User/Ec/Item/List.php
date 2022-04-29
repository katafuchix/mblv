<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʸ����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'keyword' => array(
			'type' 			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'shop' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> 'Util, shop',
		),
		'item_category' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'			=> 'Util, item_category',
		),
		'item_category_id' => array(
				'type' 		=> VAR_TYPE_INT,
				'form_type' => FORM_TYPE_HIDDEN,
		),
		'sort_order' 	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
				1 => '�͵���',
				2 => '���ʤ��¤�',
				3 => '���ʤ��⤤'
			),
		),
		'price_start' => array(
			'type' 			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'price_end' => array(
			'type' 			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'item_order_type' 	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
				1 => '���ڎ��ގ���',
				2 => '���ݎˎގ�',
				3 => '������',
				4 => '��Կ���'
			),
		),
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
 * ���ʸ����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemList extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
/*
		if($this->af->get('price_start') > $this->af->get('price_end')){
			$this->ae->add(null, '', E_USER_ITEM_BUDGET);
		}
*/
		if($this->af->validate() > 0) return 'user_ec_item_list';
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
		return 'user_ec_item_list';
	}
}
?>