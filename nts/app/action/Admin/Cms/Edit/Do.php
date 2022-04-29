<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����CMS�Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCmsEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'cms_type' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '������',
		),
		'cms_html1' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
		'cms_html2' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
		'cms_html3' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
		'low_term_d' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'DOCOMO����ü��(����̾)',
		),
		'low_term_a' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'AU����ü��(�ǥХ���ID)',
		),
		'low_term_s' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'SOFTBANK����ü��(����̾)',
		),
	);
}

/**
 * �������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCmsEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_cms_edit';
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
		// CMS�Խ�
		$cms_type = $this->af->get('cms_type');
		$o =& new Tv_Cms($this->backend, 'cms_type', $cms_type);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_cms_edit';
		
		$this->ae->add(null, '', I_ADMIN_CMS_EDIT_DONE);
		$cms_type_list = $this->config->get('cms_type');
		return 'admin_' . $cms_type_list[$cms_type]['type'] . '_list';
	}
}
?>