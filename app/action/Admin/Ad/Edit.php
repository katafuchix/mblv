<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAdEdit extends Tv_Form_AdminAdEditDo
{
}

/**
 * ���������Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdEdit extends Tv_ActionAdminOnly
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
		// ad_id���鹭��������
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$a->exportForm();
		
		$um = $this->backend->getManager('Util');
		// �ۿ�����������ʬ������å�
		$this->af = $um->setSepTime($this->af, $a->get('ad_start_time'), 'ad_start');
		// �ۿ���λ������ʬ������å�
		$this->af = $um->setSepTime($this->af, $a->get('ad_end_time'), 'ad_end');
		
		return 'admin_ad_edit';
	}
}
?>