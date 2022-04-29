<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����������Ⱥ���¹Խ������������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'segment_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����������Ⱥ���¹Խ������������¹ԥ��饹
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentDeleteDo extends Tv_ActionAdminOnly
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
		// ���
		$o =& new Tv_Segment($this->backend,'segment_id',$this->af->get('segment_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		$o->set('segment_status',0);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_segment_list';
		
		$this->ae->add("errors","�������Ⱦ���κ������λ���ޤ�����");
		return 'admin_segment_list';
	}
}
?>