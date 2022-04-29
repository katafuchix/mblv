<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ǥ��᡼�륫�ƥ�����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminDecomailcategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'decomail_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '�ǥ��᡼�륫�ƥ���̾',
		),
		'decomail_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�ǥ��᡼�륫�ƥ�������',
		),
	);
}

/**
 * �����ǥ��᡼�륫�ƥ�����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminDecomailcategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomailcategory_add';
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
		// �ǥ��᡼�륫�ƥ�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_DecomailCategory($this->backend);
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$ac->set('decomail_category_status', 1);
		// ��Ͽ
		$r = $ac->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_decomailcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_ADD_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>