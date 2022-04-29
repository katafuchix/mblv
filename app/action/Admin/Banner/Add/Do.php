<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����Хʡ���Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBannerAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'banner_client' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'banner_url' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'banner_type' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'		=> 'Util, banner_type',
		),
		'banner_body' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'banner_image' => array(
			'form_type'		=> FORM_TYPE_FILE,
		),
	);
}

/**
 * �����Хʡ���Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		$timestamp = date("Y-m-d H:i:s");
		
		// �Хʡ���Ͽ
		$o = & new Tv_Banner($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������åץ���
		if($this->af->get('banner_type') != 'text'){
			$um =& $this->backend->getManager('Util');
			$o->set('banner_image', $um->uploadFile($this->af->get('banner_image'), 'banner'));
		}
		// ���ơ�������ͭ���ˤ���
		$o->set('banner_status', 1);
		// ��������
		$o->set('banner_created_time', $timestamp);
		// ��������
		$o->set('banner_updated_time', $timestamp);
		// ��Ͽ
		$r = $o->add();
		
		// ��Ͽ���顼�ξ��
		if (PEAR::isError($r)) return 'admin_banner_add_index';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_ADD_DONE);
		return 'admin_banner_list';
	}
}
?>