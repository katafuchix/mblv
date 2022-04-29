<?php
/**
 * Add.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �������ޥ���Ͽ���������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminMagazineAdd extends Tv_ActionForm
{
	/** @var bool   �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var array   �ե���������� */
	var $form = array(
		'year' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'month' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'day' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �������ޥ���Ͽ���������¹ԥ��饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminMagazineAdd extends Tv_ActionAdminOnly
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
		return 'admin_magazine_add';
	}
}
?>