<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminSoundEdit extends Tv_Form_AdminSoundEditDo
{
}

/**
 * �������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundEdit extends Tv_ActionAdminOnly
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
		// ������ɾ������
		$o =& new Tv_Sound($this->backend, 'sound_id', $this->af->get('sound_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('sound_start_time'), 'sound_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $o->get('sound_end_time'), 'sound_end');
		
		return 'admin_sound_edit';
	}
}
?>