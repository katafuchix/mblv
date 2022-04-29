<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����NG����Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNgwordEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'site_ngword' => array(
			'name'			=> 'NG���',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * ����NG����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNgwordEditDo extends Tv_ActionAdminOnly
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
		if($this->af->Validate() > 0) return 'admin_ngword_edit';
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
		//$o =& new Tv_Config($this->backend,'config_id',1);
		$o =& new Tv_Config($this->backend,'config_type','config');
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// ����
 		$r = $o->update();
 		// �������顼�ξ��
 		if(Ethna::isError($r))return 'admin_ngword_edit';
		
		$this->ae->add(null, '', E_ADMIN_NGWORD_EDIT_DONE);
		
		return 'admin_ngword_edit';
	}
}
?>