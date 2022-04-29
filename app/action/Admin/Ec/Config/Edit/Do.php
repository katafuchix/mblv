<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����⡼����ܾ����Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcConfigEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'mall_name' => array(
			'name'			=> '�⡼��̾',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_html_title' => array(
			'name'			=> 'HTML�����ȥ�',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_information' => array(
			'name'			=> '���Τ餻',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
/*		'mall_public_flg' => array(
			'name'			=> '��������',
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_RADIO,
			'option'		=> array(1 => '����', 0 => '�����'),
		),
*/
		'mall_shop_ranking' => array(
			'name'			=> '����åץ�󥭥�',
			'type'			=> VAR_TYPE_STRING,
			//'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			//'option'		=> array(1 => '����', 0 => '�����'),
		),
		'mall_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_contents_body' => array(
			'name'			=> '�⡼���ѥե꡼���ڡ���',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
  'mall_bg_color' => array(
			'name'			=> '�⡼���طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),     
  'mall_text_color' => array(
			'name'			=> '�⡼��ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
  'mall_link_color' => array(
			'name'			=> '�⡼���󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_alink_color' => array(
			'name'			=> '�⡼�륢���ƥ��֥�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_vlink_color' => array(
			'name'			=> '�⡼��ˬ��Ѥߥ�󥯿�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_title_bg_color' => array(
			'name'			=> '�⡼�륿���ȥ��طʿ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_title_font_color' => array(
			'name'			=> '�⡼�륿���ȥ�ʸ����',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_menu_color' => array(
			'name'			=> '�⡼���˥塼��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_hr_color' => array(
			'name'			=> '�⡼��HR��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 

	);
}

/**
 * �����⡼����ܾ����Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */

class Tv_Action_AdminEcConfigEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->Validate() > 0) return 'master_config_edit';
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
		// �⡼����󹹿�
		$o =& new Tv_Config($this->backend,'config_id',1);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// ����
 		$r = $o->update();
 		
 		// �������顼�ξ��
 		if(Ethna::isError($r)) return 'admin_ec_config_edit';
		
		$this->ae->add("errors","�⡼����ܾ����Խ���λ���ޤ�����");
		return 'admin_ec_config_edit';
	}
}
?>