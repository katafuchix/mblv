<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������ԥ���������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAccountEdit extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var array   �ե���������� */
	var $form = array(
		'admin_id' => array(
			'name'		=> '������ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ���������ԥ���������Խ����������¹ԥ��饹
 * 
 * �����Ծ����Խ����̤ν��Ͻ���
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAccountEdit extends Tv_ActionAdminOnly
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
		// ���֥������Ȥ����
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->exportForm();
		
		$admin_action_category = explode(",", $o->get('admin_action_category_id'));
		$this->af->set('admin_action_category_id', $admin_action_category);
		
		$admin_shop = explode(",", $o->get('admin_shop_id'));
		$this->af->set('admin_shop_id', $admin_shop);

		return 'admin_account_edit';
	}
}
?>