<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ������ǥ����Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminMediaEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'media_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'name'		=> '���̥�����',
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 1,
			'max'		=> 32,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'max_error'	=> '{form}��Ⱦ�ѱѿ���32ʸ����������������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'media_name' => array(
			'name'		=> '�����ϩ̾',
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
		'community_id' => array(
			'name'		=> '��������å��ߥ�˥ƥ�ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_point' => array(
			'name'		=> '�������Ϳ�ݥ����',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param1' => array(
			'name'		=> '�ѥ�᡼��1',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_param2' => array(
			'name'		=> '�ѥ�᡼��2',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_param3' => array(
			'name'		=> '�ѥ�᡼��3',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_res_url' => array(
			'name'		=> '����������ֵ���URL',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_mail_title' => array(
			'name'		=> '�����ϩ���Υ᡼�륿���ȥ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_body' => array(
			'name'		=> '�����ϩ���Υ᡼����ʸ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'media_avatar' => array(
			'name'		=> '���Х�������',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, media_avatar',
		),
	);
}

/**
 * ������ǥ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminMediaEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_media_edit';
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
		// ��ǥ����Խ�
		$o =& new Tv_Media($this->backend,'media_id',$this->af->get('media_id'));
		
		// Ʊ�����̥����ɤ��ʤ����ɤ�����ǧ
		if($this->af->get('media_code') != $o->get('media_code')){
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
				return 'admin_media_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_media_edit';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_EDIT_DONE);
		return 'admin_media_list';
	}
}
?>