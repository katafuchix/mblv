<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ��Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBannerEditDo extends TV_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'banner_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required' => true,
		),
		'banner_client' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required' => true,
		),
		'banner_url' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required' => true,
		),
		'banner_type' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'required' => true,
		),
		'banner_body' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'banner_image' => array(
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'banner_image_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
		),
	);
}

/**
 * �����Хʡ��Խ��¹Խ�����������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class TV_Action_AdminBannerEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_banner_edit_index';
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
		// �Хʡ��Խ�
		$db = $this->backend->getDB();
		$values = array(
			'banner_client' => $this->af->get('banner_client'),
			'banner_url' => $this->af->get('banner_url'),
			'banner_type' => $this->af->get('banner_type'),
			'banner_body' => $this->af->get('banner_body'),
		);
		if($this->af->get('banner_type') != "text" && $this->af->get('banner_image_status') == "edit"){
			$um =& $this->backend->getManager('Util');
			$values['banner_image'] = $um->copyImage($this->config->get('file_path') . "banner/",$this->af->get('banner_image'));
		}
		if($this->af->get('banner_image_status') == "delete"){
			$values['banner_image'] = "";
		}
		// �Խ�
		$res = $db->db->autoExecute('banner', $values, DB_AUTOQUERY_UPDATE,"banner_id = " . $this->af->get('banner_id'));
		// �Խ����顼�ξ��
		if (PEAR::isError($res)) return 'admin_banner_edit_index';
		$this->ae->add(null, '', I_ADMIN_BANNER_EDIT_DONE);
		return 'admin_banner_list';
	}
}
?>