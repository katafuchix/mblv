<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե꡼�ڡ�����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminContentsAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'contents_code' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'contents_title' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'contents_body' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * �����ե꡼�ڡ�����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_contents_add';
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
		// Ʊ�����̥����ɤ��ʤ����ɤ�����ǧ
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> 'contents_id',
			'sql_from'	=> 'contents',
			'sql_where'	=> 'contents_code = ?',
			'sql_values'	=> array($this->af->get('contents_code')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_CONTENTS_CODE_DUPLICATE);
			return 'admin_contents_add';
		}
		
		// �ե꡼�ڡ�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$c =& new Tv_Contents($this->backend);
		$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$c->set('contents_status', 1);
		$c->set('contents_created_time', $timestamp);
		$c->set('contents_updated_time', $timestamp);
		
		// ��Ͽ
		$r = $c->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_contents_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_ADD_DONE);
		return 'admin_contents_list';
	}
}
?>