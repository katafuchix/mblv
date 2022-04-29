<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������ԥ���������Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccountEditDo extends Tv_ActionForm
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
		'admin_name' => array(
			'name'		=> '������̾',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'login_id' => array(
			'name'		=> '������ID',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'login_password' => array(
			'name'		=> '������ѥ����',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'admin_status' => array(
			'name'		=> '�����Ը���',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, admin_status',
		),
	);
}

/**
 * ���������ԥ���������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccountEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_account_edit';
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
		// �����Ծ����ʣ��ǧ
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'admin',
			'sql_where'	=> 'login_id = ? AND admin_id <> ?',
			'sql_values'	=> array($this->af->get('login_id'), $this->af->get('admin_id')),
		);
		$um = $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '' ,E_ADMIN_ACCOUNT_DUPLICATE);
			return 'admin_account_edit';
		}
		
		// ���֥������Ȥ����
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_admin_edit';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ACCOUNT_EDIT_DONE);
		
		return 'admin_account_list';
	}
}
?>