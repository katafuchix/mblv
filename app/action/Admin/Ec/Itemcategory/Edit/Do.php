<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ƥ����Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_category_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'item_category_text' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'item_category_image1' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_image1_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
			'required'		=> false,
		),
		'item_category_contents_body' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'file_id' => array(
			'name'		=> '���ƥ���ե꡼���ڡ����ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
		'item_category_image1_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, image_status',
		),
		'edit' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * �������ƥ����Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'admin_ec_itemcategory_edit';
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
		$um = $this->backend->getManager('Util');
		
		// ���ƥ�����󹹿�
		$o =& new Tv_ItemCategory($this->backend,'item_category_id',$this->af->get('item_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// ��������ν�������
		$item_category_id = $this->af->get('item_category_id');
		
		$item_category_image1_file = $this->af->get('item_category_image1_file');
		
		// ������롡�����򤵤줿���
		if($this->af->get('item_category_image1_status') == 2){
			// �����������
			$o->set('item_category_image1',"");
		}
		// �ѹ����롡�����򤵤줿���ǡ�file��������
		elseif($this->af->get('item_category_image1_status') == 1 && is_array($item_category_image1_file) && $item_category_image1_file['name'])
		{
			// �����Υ��åץ���
			$item_category_image1 = $um->uploadThumbImage($this->config->get('file_path') . 'item_category/PRE_', $item_category_image1_file, $item_category_id . '_1');
			if(!$item_category_image1){
				$this->ae->add(null, '', E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD);
				return 'admin_ec_itemcategory_edit';
			}
			//�����Υ���ͥ���
			$um->makeThumbImage($this->config->get('file_path') . 'item_category/' ,$this->config->get('file_path') . 'item_category/thumb/' ,'PRE_'.$item_category_image1,95);
			
			// �����Υ�͡���
			$before = $this->config->get('file_path') . 'item_category/PRE_' . $item_category_image1;
			$after  = $this->config->get('file_path') . 'item_category/'     . $item_category_image1;
			$res = $um->renameFile($before, $after);
			
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD);
				return 'admin_ec_itemcategory_edit';
			}
			$o->set('item_category_image1', $item_category_image1);
			//�����Υ���ͥ���
			$before = $this->config->get('file_path') . 'item_category/thumb/PRE_' . $item_category_image1;
			$after  = $this->config->get('file_path') . 'item_category/thumb/'     . $item_category_image1;
			$res = $um->renameFile($before, $after);
		}
		$timestamp = date('Y-m-d H:i:s');
		$o->set('item_category_updated_time', $timestamp);
		
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_itemcategory_edit';
		// ���ƥ������򥨥����ݡ��ȡʡ�shop_id�פ��ߤ�����
		$o->exportForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_CATEGORY_EDIT_DONE);
		return 'admin_ec_itemcategory_list';
	}
}
?>