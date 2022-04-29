<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������å��Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_news' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'shop_bgcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_textcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_linkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_alinkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_vlinkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_new_arrivals' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_ranking' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_image1' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_image1_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'shop_image2' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_image2_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'shop_body' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'file_id' => array(
			'name'		=> '����åץե꡼���ڡ����ѥե�����',
			'type'		=> VAR_TYPE_STRNG,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_category_print_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array('1' => 'ɽ������' , '0' => 'ɽ�����ʤ�',),
		),
		'shop_image1_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
//			'option'			=> 'Util, image_status',
			'option'	=> array('0' => '�ѹ����ʤ�' , '1' => '�ѹ�����',),
		),
		'shop_image2_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
//			'option'			=> 'Util, image_status',
			'option'	=> array('0' => '�ѹ����ʤ�' , '1' => '�ѹ�����',),
		),
		'edit' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * ��������å��Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_shop_edit';
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
		
		// ����å׾��󹹿�����
		$shopObject =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		$shopObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		if($this->af->get('shop_image1_status') == 2){
			// �����������
			$shopObject->set('shop_image1',"");
		}elseif($this->af->get('shop_image1_status') == 1 && $this->af->get('shop_image1_file')){
			// �����Υ��åץ���
			$shop_id = $this->af->get('shop_id');
			$shop_image1 = $um->uploadThumbImage($this->config->get('file_path') . 'shop/PRE_', $this->af->get('shop_image1_file'),$shop_id . '_1');
			if(!$shop_image1){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			//�����Υ���ͥ���
			$um->makeThumbImage($this->config->get('file_path') . 'shop/' ,$this->config->get('file_path') . 'shop/thumb/' ,'PRE_'.$shop_image1, 53);
			
			// �����Υ�͡���
			$before = $this->config->get('file_path') . 'shop/PRE_' . $shop_image1;
			$after  = $this->config->get('file_path') . 'shop/'     . $shop_image1;
			$res = $um->renameFile($before, $after);
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			$shopObject->set('shop_image1', $shop_image1);
			//�����Υ���ͥ���
			$before = $this->config->get('file_path') . 'shop/thumb/PRE_' . $shop_image1;
			$after  = $this->config->get('file_path') . 'shop/thumb/'     . $shop_image1;
			$res = $um->renameFile($before, $after);
		}
		
		if($this->af->get('shop_image2_status') == 2){
			// �����������
			$shopObject->set('shop_image2',"");
		}elseif($this->af->get('shop_image2_status') == 1 && $this->af->get('shop_image2_file')){
			// �����Υ��åץ���
			$shop_id = $this->af->get('shop_id');
			$shop_image2 = $um->uploadThumbImage($this->config->get('file_path') . 'shop/PRE_', $this->af->get('shop_image2_file'),$shop_id . '_2');
			if(!$shop_image2){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			//�����Υ���ͥ���
			$um->makeThumbImage($this->config->get('file_path') . 'shop/' ,$this->config->get('file_path') . 'shop/thumb/' ,'PRE_'.$shop_image2, 230);
			
			// �����Υ�͡���
			$before = $this->config->get('file_path') . 'shop/PRE_' . $shop_image2;
			$after  = $this->config->get('file_path') . 'shop/'     . $shop_image2;
			$res = $um->renameFile($before, $after);
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			$shopObject->set('shop_image2', $shop_image2);
			//�����Υ���ͥ���
			$before = $this->config->get('file_path') . 'shop/thumb/PRE_' . $shop_image2;
			$after  = $this->config->get('file_path') . 'shop/thumb/'     . $shop_image2;
			$res = $um->renameFile($before, $after);
		}
		
		// ����å׾��󹹿�
		$timestamp = date("Y-m-d H:i:s");
		$shopObject->set('shop_updated_time', $timestamp);
		$r = $shopObject->update();
		if(Ethna::isError($r)) return 'admin_ec_shop_edit';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SHOP_EDIT_DONE);
		
		return 'admin_ec_shop_list';
	}
}
?>