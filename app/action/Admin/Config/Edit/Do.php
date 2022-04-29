<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ܾ����Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		// ���ܾ���
		'site_name' => array(
			'name'			=> '������̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_company_name' => array(
			'name'			=> '�����ȱ��Ĳ��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_phone' => array(
			'name'			=> '�����ȱ��Ĳ�������ֹ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_type' => array(
			'name'			=> '������',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'site_html_title' => array(
			'name'			=> 'HTML�����ȥ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_information' => array(
			'name'			=> '���Τ餻',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_public_status' => array(
			'name'			=> '��������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'			=> array(1 => '������', 0 => '�������'),
		),
		'site_maintenance_status' => array(
			'name'			=> '���ƥʥ�����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'			=> array(0 => '������', 1 => '���ƥʥ���'),
		),
		'site_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_navi_template' => array(
			'name'			=> '�ʥӥ��������ƥ�ץ졼��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		// �ݥ���Ⱦ���
		'site_regist_point' => array(
			'name'			=> '�������Ϳ�ݥ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'site_invite_from_point' => array(
			'name'			=> 'ͧã�����������Ϳ�ݥ���ȡʾ��Լԡ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'site_invite_to_point' => array(
			'name'			=> 'ͧã�����������Ϳ�ݥ���ȡ��ﾷ�Լԡ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// �ۿ�����
		'site_bg_color'  => array(
			'name'			=> '�طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_text_color' => array(
			'name'			=> 'ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_link_color' => array(
			'name'			=> '��󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_alink_color' => array(
			'name'			=> '�����ƥ��֥�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_vlink_color' => array(
			'name'			=> 'ˬ��Ѥߥ�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_title_bg_color' => array(
			'name'			=> '�����ȥ��طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_title_font_color' => array(
			'name'			=> '�����ȥ�ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_menu_color' => array(
			'name'			=> '��˥塼��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_time_color' => array(
			'name'			=> '���￧',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_form_name_color' => array(
			'name'			=> '�ե�����̾��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_hr_color' => array(
			'name'			=> '��ʿ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_pager_text_color' => array(
			'name'			=> '�ڡ�����ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_pager_bg_color' => array(
			'name'			=> '�ڡ������طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_error_color' => array(
			'name'			=> '���顼ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		// ü������
		'site_low_term_d' => array(
			'name'			=> 'DOCOMO����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_low_term_a' => array(
			'name'			=> 'AU����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_low_term_s' => array(
			'name'			=> 'SOFTBANK����ü��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_cms_html1' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
		'site_cms_html2' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
		'site_cms_html3' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����HTML',
		),
	);
}

/**
 * ����SNS���ܾ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// site_type��config�Ǥʤ����
		if($this->af->get('site_type') != 'config'){
			// ����ɬ�����¤򳰤�
			$required = array(
				'site_name',
				'site_company_name',
				'site_phone',
				'site_type',
				'site_html_title',
				'site_information',
				'site_public_status',
				'site_maintenance_status',
				'site_meta_description',
				'site_meta_keywords',
				'site_meta_robots',
				'site_meta_author',
				'site_navi_template',
				'site_invite_from_point',
				'site_invite_to_point',
			);
			foreach($required as $v){
				if($v) $this->af->form[$v]['required'] = false;
			}
		}
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
		// ���ܾ��󹹿�
		$o =& new Tv_Config($this->backend,'config_type',$this->af->get('site_type'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// ����
 		$r = $o->update();
 		// �������顼�ξ��
 		if(Ethna::isError($r))return 'admin_config_edit';
		
		$site_type = $this->config->get('site_type');
		$this->ae->add(null, '', I_ADMIN_CONFIG_EDIT_DONE);
		return 'admin_config_edit';
	}
}
?>