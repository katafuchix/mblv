<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����᡼��ƥ�ץ졼���Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'mail_template_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '�᡼��ƥ�ץ졼��ID',
		),
		'mail_template_code' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '�᡼��ƥ�ץ졼��̾',
			'option'		=> 'Util, mail_template',
		),
		'mail_template_title' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '�᡼��ƥ�ץ졼�ȥ����ȥ�',
		),
		'mail_template_body' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�᡼��ƥ�ץ졼����ʸ',
		),
	);
}

/**
 * �����᡼��ƥ�ץ졼���Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_mailtemplate_edit';
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
		// �ѥ�᥿��ʣ��ǧ
		$o =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		// ���μ�ʬ�Υѥ�᥿�Ⱥ���μ�ʬ�Υѥ�᥿���ۤʤ���Τ߳�ǧ������Ԥ�
		if($this->af->get('mail_template_code') != $o->get('mail_template_code')){
			$o =& new Tv_MailTemplate($this->backend);
			$result = $o->searchProp(
				array('mail_template_id'),
				array('mail_template_status' => 1, 'mail_template_code' => new Ethna_AppSearchObject($this->af->get('mail_template_code'), OBJECT_CONDITION_EQ)),
				array('mail_template_id' => OBJECT_SORT_DESC)
			);
			if($result[0] > 0){
//				$this->ae->add(null, '', E_ADMIN_MAIL_TEMPLATE_CODE_DUPLICATE);
				$this->ae->add(null, '�᡼��ƥ�ץ졼��̾����ʣ���Ƥ��ޤ���');
				return 'admin_mailtemplate_edit';
			}
		}
		// mail_template_id����᡼��ƥ�ץ졼���Խ�
		$o =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_mailtemplate_edit';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
		$this->ae->add(null, '�᡼��ƥ�ץ졼�Ȥ��Խ�����λ���ޤ�����');
		return 'admin_mailtemplate_list';
	}
}
?>