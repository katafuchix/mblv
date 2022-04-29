<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ��Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminVideoEdit extends Tv_Form_AdminVideoEditDo
{
}

/**
 * �������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideoEdit extends Tv_ActionAdminOnly
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
		// �ӥǥ��������
		$o =& new Tv_Video($this->backend, 'video_id', $this->af->get('video_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('video_start_time'), 'video_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('video_end_time'), 'video_end');
		
		return 'admin_video_edit';
	}
}
?>