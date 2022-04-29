<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ���Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBannerAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
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
	);
}

/**
 * �����Хʡ���Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBannerAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_banner_add_index';
		
		// 2��POST�б�
		if (Ethna_Util::isDuplicatePost()) return 'admin_banner_list';
		
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
		// �Хʡ��ɲ�
		$db = $this->backend->getDB();
		$values = array(
			'banner_client' => $this->af->get('banner_client'),
			'banner_url' => $this->af->get('banner_url'),
			'banner_type' => $this->af->get('banner_type'),
			'banner_body' => $this->af->get('banner_body'),
		);
		if($this->af->get('banner_type') != "text"){
			$um =& $this->backend->getManager('Util');
			$values['banner_image'] = $um->copyImage($this->config->get('file_path') . "banner/",$this->af->get('banner_image'));
		}
		// ��Ͽ
		$res = $db->db->autoExecute('banner', $values, DB_AUTOQUERY_INSERT);
		// ��Ͽ���顼�ξ��
		if (PEAR::isError($res)) return 'admin_banner_add_index';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_ADD_DONE);
		return 'admin_banner_list';
	}
}
?>