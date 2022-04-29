<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ȥ����å��������Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminThemaEdit extends Tv_Form_AdminThemaEditDo
{
}

/**
 * �����ȥ����å��������Խ����������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminThemaEdit extends Tv_ActionAdminOnly
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
		// �ȥ����å�������������
		$o =& new Tv_Thema($this->backend, 'thema_id', 1);
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('thema_start_time'), 'thema_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('thema_end_time'), 'thema_end');
		
		return 'admin_thema_edit';
	}
}
?>
