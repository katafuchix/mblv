<?php
/**
 * Edit.php
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
require_once 'Edit/Do.php';
class Tv_Form_AdminHtmltemplateEdit extends Tv_Form_AdminHtmltemplateEditDo
{
}

/**
 * ����HTML�ƥ�ץ졼���Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminHtmltemplateEdit extends Tv_ActionAdminOnly
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
		// html_template_id����������
		$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
		$o->exportForm();
		
		// �Խ�����
		$timestamp = date("Y-m-d H:i:s");
		$o->set('html_template_edit_start_time', $timestamp);
		$o->set('html_template_edit', 1);
		$r = $o->update();
		
		// �ƥ�ץ졼�����Τϥե�������Υ���ƥ�Ĥ����
		$_template = BASE . '/template/' . TEMPLATE . '/user/' . $o->get('html_template_code') . '.tpl';
		$template = file_get_contents($_template);
		$this->af->set('html_template_body', $template);
		
		return 'admin_htmltemplate_edit';
	}
}
?>