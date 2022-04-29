<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������˥塼�Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdmenuEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'index' => array(
			'name'			=> '�ȥåץڡ���',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'home' => array(
			'name'			=> '�ޥ��ڡ���',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_add_done' => array(
			'name'			=> '������ƴ�λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_edit_done' => array(
			'name'			=> '�����Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_delete_done' => array(
			'name'			=> '���������λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_add_done' => array(
			'name'			=> '������������ƴ�λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_edit_done' => array(
			'name'			=> '�����������Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_delete_done' => array(
			'name'			=> '���������Ⱥ����λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_add_done' => array(
			'name'			=> '���ߥ�˥ƥ�������λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_edit_done' => array(
			'name'			=> '���ߥ�˥ƥ��Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_delete_done' => array(
			'name'			=> '���ߥ�˥ƥ������λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_add_done' => array(
			'name'			=> '���ߥ�˥ƥ��ȥԥå���ƴ�λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_edit_done' => array(
			'name'			=> '���ߥ�˥ƥ��ȥԥå��Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_delete_done' => array(
			'name'			=> '���ߥ�˥ƥ��ȥԥå������λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_add_done' => array(
			'name'			=> '���ߥ�˥ƥ���������ƴ�λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_edit_done' => array(
			'name'			=> '���ߥ�˥ƥ��������Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_delete_done' => array(
			'name'			=> '���ߥ�˥ƥ������Ⱥ����λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_add_done' => array(
			'name'			=> '�����ĺ�����λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_edit_done' => array(
			'name'			=> '�������Խ���λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_delete_done' => array(
			'name'			=> '�����ĺ����λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'message_send_done' => array(
			'name'			=> '�ߥ˥᡼��������λ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'decomail' => array(
			'name'			=> '�ǥ��᡼��TOP',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * ���������˥塼�Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdmenuEditDo extends Tv_ActionAdminOnly
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
		if($this->af->Validate() > 0) return 'admin_admenu_edit';
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
		// ���֥������ȹ���
		$o =& new Tv_Admenu($this->backend,'ad_menu_id',1);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// ����
 		$r = $o->update();
 		// �������顼�ξ��
 		if(Ethna::isError($r))return 'admin_admenu_edit';
		
		$this->ae->add("errors","�����˥塼�Խ�����λ���ޤ���");
		return 'admin_admenu_edit';
	}
}
?>