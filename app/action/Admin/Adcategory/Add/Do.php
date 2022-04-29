<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������𥫥ƥ�����Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdcategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'ad_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '���𥫥ƥ���̾',
		),
		'ad_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '���𥫥ƥ�������',
		),
	);
}

/**
 * �������𥫥ƥ�����Ͽ���������¹ԥ��饹
 * 
 * ���𥫥ƥ������Ͽ���ޤ�
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_adcategory_add';
		
		// 2��POST�б�
		if (Ethna_Util::isDuplicatePost()) return 'admin_adcategory_list';
		
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
		// ���𥫥ƥ�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_AdCategory($this->backend);
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$ac->set('ad_category_status', 1);

		// ��Ͽ
		$r = $ac->add();
		//��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_adcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_ADD_DONE);
		return 'admin_adcategory_list';
	}
}
?>