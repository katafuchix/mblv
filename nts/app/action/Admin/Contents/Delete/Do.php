<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե꡼�ڡ�������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminContentsDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'contents_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����ե꡼�ڡ�������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsDeleteDo extends Tv_ActionAdminOnly
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
		$timestamp = date('Y-m-d H:i:s');
		// �ե꡼�ڡ��������ʪ��������ʤ�
		$c =& new Tv_Contents($this->backend, 'contents_id', $this->af->get('contents_id'));
		$c->set('contents_status', 0);
		$c->set('contents_updated_time',$timestamp);
		$c->set('contents_deleted_time',$timestamp);
		// ����
		$r = $c->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_contents_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_DELETE_DONE);
		return 'admin_contents_list';
	}
}
?>