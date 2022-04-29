<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemPriorityDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'item_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'item_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'item_priority_edit' => array(
		),
	);
}

/**
 * ��������ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ec_item_list';
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
		// ����ͥ�����Խ�
		$item_priority_id = $this->af->get('item_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($item_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_Item($this->backend, 'item_id', $k);
				$dc->set('item_priority_id', $v);
				$dc->set('item_updated_time', $timestamp);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_ec_item_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_ITEM_PRIORITY_EDIT_DONE);
		return 'admin_ec_item_list';
	}
}
?>