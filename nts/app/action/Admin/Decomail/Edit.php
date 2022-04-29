<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼���Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminDecomailEdit extends Tv_Form_AdminDecomailEditDo
{
}

/**
 * �������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailEdit extends Tv_ActionAdminOnly
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
		// �ǥ��᡼��������
		$o =& new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('decomail_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('decomail_start_time'), 'decomail_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('decomail_end_time'), 'decomail_end');
		
		return 'admin_decomail_edit';
	}
}
?>