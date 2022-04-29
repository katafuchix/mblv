<?php
/**
 * .php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����CMS�Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminCmsEdit extends Tv_Form_AdminCmsEditDo
{
}

/**
 * ����CMS�Խ����������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCmsEdit extends Tv_ActionAdminOnly
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
		// CMS�������
		$o =& new Tv_Cms($this->backend, 'cms_type', $this->af->get('cms_type'));
		$o->exportForm();
		return 'admin_cms_edit';
	}
}
?>