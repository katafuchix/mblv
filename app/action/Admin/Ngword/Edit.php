<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����NG����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNgwordEdit extends Tv_ActionForm
{
}

/**
 * ����NG����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNgwordEdit extends Tv_ActionAdminOnly
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
		// ����ե������֥������ȼ���
		$o =& new Tv_Config($this->backend,'config_type','config');
		$o ->exportform();
		
		return 'admin_ngword_edit';
	}
}
?>