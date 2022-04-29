<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����HTML�ƥ�ץ졼���Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminHtmltemplateEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'html_template_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'HTML�ƥ�ץ졼��ID',
		),
		'html_template_code' => array(
			'form_type' => FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'HTML�ƥ�ץ졼�ȥ�����',
		),
		'html_template_body' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'HTML�ƥ�ץ졼����ʸ',
		),
		'edit' => array(
		),
	);
}

/**
 * ����HTML�ƥ�ץ졼���Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminHtmltemplateEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_htmltemplate_edit';
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
		$timestamp = date("Y-m-d H:i:s");
		
		// ��¸���ʤ����
		if(!$this->af->get('edit')){
			// html_template_id����HTML�ƥ�ץ졼���Խ�
			$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
			$o->set('html_template_edit', 0);
			$o->set('html_template_edit_end_time', $timestamp);
			// ����
			$r = $o->update();
			// �������顼�ξ��
			if(Ethna::isError($r)) return 'admin_htmltemplate_edit';
			
			// �ե������ͤΥ��ꥢ
			$this->af->clearFormVars();
			
//			$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
			$this->ae->add(null, 'HTML�ƥ�ץ졼�Ȥ��Խ�����ߤ��ޤ�����');
			return 'admin_htmltemplate_list';
		}
		
		// html_template_id����HTML�ƥ�ץ졼���Խ�
		$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('html_template_edit', 0);
		$o->set('html_template_edit_end_time', $timestamp);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_htmltemplate_edit';
		
		// HTML�ƥ�ץ졼�ȥ�����
		$html_template_code = $o->get('html_template_code');
		// HTML�ƥ�ץ졼��
		$template = $o->get('html_template_body');
		
		// HTML�ƥ�ץ졼�ȥ��ɲ�
		$o = new Tv_HtmlTemplateLog($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('html_template_id', $this->af->get('html_template_id'));
		$o->set('html_template_code', $html_template_code);
		$o->set('html_template_updated_time', $timestamp);
		$r = $o->add();
		
/*
		// ������˥ե��������¸
		$_template = BASE . '/template/' . TEMPLATE . '/user/' . $html_template_code . '.tpl';
		$fp = fopen($_template, "w");
		$size = fwrite($fp, $template);
		fclose($fp);
		chmod($file, 0644);
		
		// FTP��³�ǥƥ�ץ졼�ȥե�����򥢥åץ���
		$um = $this->backend->getManager('Util');
		$um->ftpUpload($_template, $_template);
*/
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
		$this->ae->add(null, 'HTML�ƥ�ץ졼�Ȥ��Խ�����λ���ޤ�����');
		return 'admin_htmltemplate_list';
	}
}
?>