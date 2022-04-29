<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ե꡼�ڡ����Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminContentsEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'contents_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util,admin_shop_id',
		),
		'contents_code' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'contents_title' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'contents_body' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
	);
}

/**
 * �����ե꡼�ڡ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminContentsEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_contents_list';
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
		// ���֥��������Խ�
		$o =& new Tv_Contents($this->backend,'contents_id',$this->af->get('contents_id'));
		
		// Ʊ�����̥����ɤ��ʤ����ɤ�����ǧ
		if($this->af->get('contents_code') != $o->get('contents_code')){
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
				return 'admin_contents_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$timestamp = date('Y-m-d H:i:s');
		$o->set('contents_updated_time', $timestamp);
		
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_contents_edit';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_EDIT_DONE);
		return 'admin_contents_list';
	}
}
?>