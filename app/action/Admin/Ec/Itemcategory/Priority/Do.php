<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ʥ��ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'item_category_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_category_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'item_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_HIDDEN,
//			'required'	=> true,
		),
		'item_category_priority_edit' => array(
		),
	);
}

/**
 * �������ʥ��ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryPriorityDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_ec_itemcategory_list';
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
		// �ǥ��᡼�륫�ƥ����Խ�
		$itemcategory_priority_id = $this->af->get('item_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($itemcategory_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_Itemcategory($this->backend, 'item_category_id', $k);
				$dc->set('item_category_priority_id', $v);
				$dc->set('item_category_updated_time', $timestamp);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_ec_itemcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT_DONE);
		return 'admin_ec_itemcategory_list';
	}
}
?>