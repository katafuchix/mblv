<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ȥ����å����������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminThemaDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'thema_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����ȥ����å����������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminThemaDeleteDo extends Tv_ActionAdminOnly
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
		// �����५�ƥ�������ʪ��������ʤ�
		$o =& new Tv_Thema($this->backend, 'thema_id', $this->af->get('thema_id'));
		$o->set('thema_status', 0);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_thema_list';
		
		$this->ae->add(null, '', I_ADMIN_THEMA_DELETE_DONE);
		return 'admin_thema_list';
	}
}
?>
