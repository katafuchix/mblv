<?php
/**
 * Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������Ȳ��̥��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFootprint extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'page'	=> array(
			'type'	=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼���������Ȳ��̥��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFootprint extends Tv_ActionUserOnly
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
		return 'user_footprint';
	}
}
?>