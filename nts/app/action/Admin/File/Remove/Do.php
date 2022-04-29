<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե��������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminFileRemoveDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'file_id' => array(
			'name'	  => '�ե�����',
			'required'  => true,
			'form_type' => FORM_TYPE_CHECKBOX,
			'type'	  => array(VAR_TYPE_INT),
		),
		'confirm' => array(
			'name'	  => '���򤷤��ե��������',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'back' => array(
			'name'	  => '������',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'remove' => array(
			'name'	  => '�Ϥ�',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		// ���ܸ��ӥ塼̾(�����ǧ���̤ǡ֤������פ������)
		'prev_view_name' => array(
			'name'	  => '���ܸ��ӥ塼̾',
			'form_type' => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
		// �����Խ����̤�����褦��
		'blog_article_id' => array( 
			'form_type' => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_INT,
		),
		// �ʲ��ե����븡���ѹ���
		'user_id' => array(
			'name'	  => '��ͭ�桼��ID',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_mime_type' => array(
			'name'	  => 'MIME������',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_size_max' => array(
			'name'	  => '�ե����륵����(����)',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_size_min' => array(
			'name'	  => '�ե����륵����(�Ǿ�)',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_year' => array(
			'name'	  => '���åץ���������ǯ��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_month' => array(
			'name'	  => '���åץ��������ʷ��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_day' => array(
			'name'	  => '���åץ�������������',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_year' => array(
			'name'	  => '���åץ���������ǯ��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_month' => array(
			'name'	  => '���åץ��������ʷ��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_day' => array(
			'name'	  => '���åץ�������������',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_status' => array(
			'name'	  => '����',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array(
				1 => 'ͭ��',
				0 => '����Ѥ�',
				2 => '�����ͤˤ�äƺ���Ѥ�',
			)
		),
		'sort_key' => array(
			'name'	  => '�����Ȥ˻��Ѥ��륭��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('��ͭ�桼��ID', 'MIME������', '�ե����륵����', '���åץ�������', '����'),
		),
		'sort_order' => array(
			'name'	  => '�����Ƚ�',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('����', '�߽�'),
		),
	);
}

/**
 * �����ե��������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFileRemoveDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// back�⤷���ϡ����ڥ��顼�ξ��
		if($this->af->get('back') != '' || $this->af->validate() > 0) {
			// prev_view_name�ξ��
			if($this->af->get('prev_view_name') != ''){
				return $this->af->get('prev_view_name');
			}else{
				return 'admin_file_search_result';
			}
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
		//�ե�������
		$im =& $this->backend->getManager('Image');
		foreach($this->af->get('file_id') as $fileId) {
			$im->remove($fileId, 2);
		}
		return 'admin_file_remove_done';
	}
}
?>