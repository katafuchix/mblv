<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����Хʡ��Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBannerEditDo extends TV_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'banner_id' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
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
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'banner_image_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'banner_image_status' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, image_status',
		),
	);
}

/**
 * �����Хʡ��Խ��¹Խ�����������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		if ($this->af->validate() > 0) return 'admin_banner_edit';
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
		
		// �Хʡ��Խ�
		$o = & new Tv_Banner($this->backend,'banner_id', $this->af->get('banner_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �Хʡ������Խ�(1=�Խ�)
		if($this->af->get('banner_type') != 'text' && $this->af->get('banner_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('banner_image', $um->uploadFile($this->af->get('banner_image_file'), 'banner'));
		}
		// �Хʡ��������(2=���)
		elseif($this->af->get('banner_image_status') == 2){
			$o->set('banner_image', '');
		}
		
		// ��������
		$o->set('banner_updated_time', $timestamp);
		
		// ����
		$r = $o->update();
		
		// �������顼�ξ��
		if (Ethna::isError($res)) return 'admin_banner_edit';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_EDIT_DONE);
		return 'admin_banner_list';
	}
}
?>