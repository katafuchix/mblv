<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������ǥ�����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMediaAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'media_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 1,
			'max'		=> 32,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'max_error'	=> '{form}��Ⱦ�ѱѿ���32ʸ����������������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'media_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'community_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_point' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param1' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param2' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param3' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_res_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * ������ǥ�����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMediaAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_media_add';
		// 2��POST�ξ��
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'admin_media_list';
		}
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
		// Ʊ�����̥����ɤ��ʤ����ɤ�����ǧ
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> 'media_id',
			'sql_from'		=> 'media',
			'sql_where'		=> 'media_code = ?',
			'sql_values'	=> array($this->af->get('media_code')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_MEDIA_CODE_DUPLICATE);
			return 'admin_media_add';
		}
		
		// ��ǥ�����Ͽ
		$o =& new Tv_Media($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('media_status', 1);
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_media_add';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_ADD_DONE);
		return 'admin_media_list';
	}
}
?>