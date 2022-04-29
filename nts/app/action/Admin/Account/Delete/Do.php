<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������ԥ�������Ⱥ���¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccountDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'admin_id' => array(
			'name'		=> '������ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ���������ԥ�������Ⱥ���¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccountDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'admin_admin_edit';
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
		// ���֥������Ȥ����
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		$o->set('admin_status', 0);
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_account_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ACCOUNT_DELETE_DONE);
		
		return 'admin_account_list';
	}
}
?>