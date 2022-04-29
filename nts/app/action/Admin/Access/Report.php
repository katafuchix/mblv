<?php
/**
 * Report.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ���������������Ͻ��ץ��������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccessReport extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'access_key' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'year' => array(
			'type'		=> VAR_TYPE_INT,
			'required' => true,
			'name' => 'ǯ',
		),
		'month' => array(
			'type'		=> VAR_TYPE_INT,
			'required' => true,
			'name' => '��',
		),
	);
}

/**
 * ���������������Ͻ��ץ��������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccessReport extends Tv_ActionAdminOnly
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
		return 'admin_access_report';
	}
}
?>