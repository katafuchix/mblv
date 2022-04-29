<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������å�ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopPriorityDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'shop_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'shop_priority_edit' => array(
		),
	);
}

/**
 * ��������å�ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ec_shop_list';
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
		$shop_priority_id = $this->af->get('shop_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($shop_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_Shop($this->backend, 'shop_id', $k);
				$dc->set('shop_priority_id', $v);
				$dc->set('shop_updated_time', $timestamp);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_ec_shop_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_SHOP_PRIORITY_EDIT_DONE);
		return 'admin_ec_shop_list';
	}
}
?>