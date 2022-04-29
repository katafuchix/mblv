<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_type' => array(
//			'name' => '�������꥿����',
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option' 		=> array(
								'1' => '�����Χ����',
								'2' => '�ϰ��������',
								'3' => '��׶�ۤ�����',
								'4' => '��׸Ŀ�������',
								),
		),
		'postage_add' => array(
		),
	);
}

/**
 * ����������Ͽ���������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageAdd extends Tv_ActionAdminOnly
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
		return 'admin_ec_postage_add';
	}
}
?>