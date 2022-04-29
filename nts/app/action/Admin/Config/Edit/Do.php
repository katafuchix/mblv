<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����SNS���ܾ����Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		// ���ܾ���
		'sns_name' => array(
			'name'			=> 'SNS̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_html_title' => array(
			'name'			=> 'HTML�����ȥ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_information' => array(
			'name'			=> '���Τ餻',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_public_status' => array(
			'name'			=> '��������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> array(1 => '������', 0 => '�������'),
		),
		'sns_maintenance_status' => array(
			'name'			=> '���ƥʥ�����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> array(0 => '������', 1 => '���ƥʥ���'),
		),
		'sns_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_navi_template' => array(
			'name'			=> '�ʥӥ��������ƥ�ץ졼��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		// �ݥ���Ⱦ���
		'sns_regist_point' => array(
			'name'			=> '�������Ϳ�ݥ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_invite_from_point' => array(
			'name'			=> 'ͧã�����������Ϳ�ݥ���ȡʾ��Լԡ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_invite_to_point' => array(
			'name'			=> 'ͧã�����������Ϳ�ݥ���ȡ��ﾷ�Լԡ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// �ۿ�����
		'sns_bg_color'  => array(
			'name'			=> '�طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_text_color' => array(
			'name'			=> 'ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_link_color' => array(
			'name'			=> '��󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_alink_color' => array(
			'name'			=> '�����ƥ��֥�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_vlink_color' => array(
			'name'			=> 'ˬ��Ѥߥ�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_title_bg_color' => array(
			'name'			=> '�����ȥ��طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_title_font_color' => array(
			'name'			=> '�����ȥ�ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_menu_color' => array(
			'name'			=> '��˥塼��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_time_color' => array(
			'name'			=> '���￧',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_form_name_color' => array(
			'name'			=> '�ե�����̾��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_hr_color' => array(
			'name'			=> '��ʿ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_pager_text_color' => array(
			'name'			=> '�ڡ�����ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_pager_bg_color' => array(
			'name'			=> '�ڡ������طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_error_color' => array(
			'name'			=> '���顼ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// ü������
		'sns_low_term_d' => array(
			'name'			=> 'DOCOMO����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_low_term_a' => array(
			'name'			=> 'AU����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_low_term_s' => array(
			'name'			=> 'SOFTBANK����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
	);
}
/**
 * ����SNS���ܾ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigEditDo extends Tv_ActionAdminOnly
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
		if($this->af->Validate() > 0) return 'admin_config_edit';
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
		// SNS���󹹿�
		$snsNews =& new Tv_Config($this->backend,'config_id',1);
		$snsNews->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// ����
 		$r = $snsNews->update();
 		// �������顼�ξ��
 		if(Ethna::isError($r))return 'admin_config_edit';
		
		$this->ae->add("errors","���ܾ����Խ�����λ���ޤ���");
		return 'admin_config_edit';
	}
}
?>