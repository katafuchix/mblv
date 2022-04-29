<?php
/**
 * Day.php
 * 
 * @author	Technovarth 
 * @package	SNSV
 */

/**
 * ���������ݡ��Ƚ��ץ��������ե����९�饹
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Form_AdminAnalyticsDay extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'year' => array(
			'name'		=> 'ǯ',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'month' => array(
			'name'		=> '��',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
	);
}

/**
 * ���������ݡ��Ƚ��ץ��������¹ԥ��饹
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminAnalyticsDay extends Tv_ActionAdminOnly
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
		return 'admin_analytics_day';
	}
}
?>