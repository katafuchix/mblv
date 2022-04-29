<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'ad_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'ad_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'ad_url_d' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_url_a' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_url_s' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_code_id' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'name'		=> '����ASP������',
			'option'		=> 'Util, ad_code',
		),
		'ad_image' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'ad_image_file' => array(
			'form_type' 	=> FORM_TYPE_FILE,
			'type'		=> VAR_TYPE_FILE,
			'name'		=> '��������ե�����',
		),
		'ad_image_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '����������ơ�����',
			'option'		=> 'Util,image_status',
		),
		'ad_point_type' => array(
			'form_type' 	=> FORM_TYPE_RADIO,
			'required'	=> true,
		),
		'ad_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_item_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_point_percent' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_item_point_percent' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,ad_category',
		),
		'ad_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_start_status' => array(
			'name'		=> '�����ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_start_year' => array(
			'name'		=> '�����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_year' => array(
			'name'		=> '�����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_month' => array(
			'name'		=> '�����ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_start_day' => array(
			'name'		=> '�����ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_start_hour' => array(
			'name'		=> '�����ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'ad_start_min' => array(
			'name'		=> '�����ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'ad_end_status' => array(
			'name'		=> '�����ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_end_year' => array(
			'name'		=> '�����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_year' => array(
			'name'		=> '�����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_month' => array(
			'name'		=> '�����ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_end_day' => array(
			'name'		=> '�����ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_end_hour' => array(
			'name'		=> '�����ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'ad_end_min' => array(
			'name'		=> '�����ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'ad_type' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, ad_type',
		),
		'ad_display_type' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, ad_display_type',
		),
		'ad_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * ���������Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ad_edit';
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
		// ad_id���鹭���Խ�
		$timestamp = date('Y-m-d H:i:s');
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$a->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$a->set('ad_updated_time', $timestamp);
		// �����ۿ���λ������
		if(!$this->af->get('ad_stock_status')){
			$a->set('ad_stock_status', 0);
			$a->set('ad_stock_num', '');
		}
		// �����ۿ�������������
		if(!$this->af->get('ad_start_status')){
			$a->set('ad_start_status', 0);
			$a->set('ad_start_time', '');
		}else{
			$a->set('ad_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('ad_start_year' ),
					$this->af->get('ad_start_month'),
					$this->af->get('ad_start_day'),
					$this->af->get('ad_start_hour'),
					$this->af->get('ad_start_min')
				)
			);
		}
		// �����ۿ���λ��������
		if(!$this->af->get('ad_end_status')){
			$a->set('ad_end_status', 0);
			$a->set('ad_end_time', '');
		}else{
			$a->set('ad_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('ad_end_year' ),
					$this->af->get('ad_end_month'),
					$this->af->get('ad_end_day'),
					$this->af->get('ad_end_hour'),
					$this->af->get('ad_end_min')
				)
			);
		}
		// ��������Υ��åץ���(1=�Խ�)
		if($this->af->get('ad_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$a->set('ad_image', $um->uploadFile($this->af->get('ad_image_file'), 'ad'));
		}
		// ��������κ��(2=���)
		elseif($this->af->get('ad_image_status') == 2){
			$a->set('ad_image', '');
		}
		// ����
		$r = $a->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_ad_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_AD_EDIT_DONE);
		return 'admin_ad_list';
	}
}
?>