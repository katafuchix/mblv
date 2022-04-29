<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������������Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcExchangeAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'exchange_type' => array(
//			'name' => '�������������꥿����',
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
							'1' => '��Χ����',
							'2' => '����ϰ��������',
							'3' => '��׶�ۤ�����',
							'4' => '��׸Ŀ�������',
							),
		),
		'exchange_add' => array(
		),
	);
}

/**
 * ����������������Ͽ���������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcExchangeAdd extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
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
		return 'admin_ec_exchange_add';
	}
}
?>