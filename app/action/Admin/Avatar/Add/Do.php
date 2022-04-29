<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х�����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarAddDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'avatar_image1' => array(
			'name'		=> '[1����]������ɽ���������',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_desc' => array(
			'name'		=> '[1����]�ºݤ˻��Ѥ������',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_x' => array(
			'name'		=> '[1����]������X��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image1_y' => array(
			'name'		=> '[1����]������Y��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image1_z' => array(
			'name'		=> '[1����]������Z��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2' => array(
			'name'		=> '[2����]������ɽ���������',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_desc' => array(
			'name'		=> '[2����]�ºݤ˻��Ѥ������',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_x' => array(
			'name'		=> '[2����]������X��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2_y' => array(
			'name'		=> '[2����]������Y��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2_z' => array(
			'name'		=> '[2����]������Z��ɸ',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_stand',
		),
		'avatar_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,avatar_category',
		),
		'avatar_sex_type' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_sex_type',
		),
		'preset_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'default_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'first_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// �ۿ�����
		'avatar_start_status' => array(
			'name'		=> '���Х����ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_start_time' => array(
			'name'		=> '���Х����ۿ���������',
		),
		'avatar_start_year' => array(
			'name'		=> '���Х����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_year' => array(
			'name'		=> '���Х����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month' => array(
			'name'		=> '���Х����ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day' => array(
			'name'		=> '���Х����ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_start_hour' => array(
			'name'		=> '���Х����ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'avatar_start_min' => array(
			'name'		=> '���Х����ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'avatar_end_status' => array(
			'name'		=> '���Х����ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_end_time' => array(
			'name'		=> '���Х����ۿ���λ����',
		),
		'avatar_end_year' => array(
			'name'		=> '���Х����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_year' => array(
			'name'		=> '���Х����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month' => array(
			'name'		=> '���Х����ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day' => array(
			'name'		=> '���Х����ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_end_hour' => array(
			'name'		=> '���Х����ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'avatar_end_min' => array(
			'name'		=> '���Х����ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �������Х�����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * ���Х�������Ͽ���ޤ�
 *
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatar_add';
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
		$um =& $this->backend->getManager('Util');
		// ���Х�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Avatar($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('avatar_status', 1);
		$o->set('avatar_created_time', $timestamp);
		$o->set('avatar_updated_time', $timestamp);
		// �ץꥻ�åȥ��Х�������
		if(!$this->af->get('preset_avatar')){
			$o->set('preset_avatar', 0);
		}
		// �ǥե���ȥ��Х�������
		if(!$this->af->get('default_avatar')){
			$o->set('default_avatar', 0);
		}
		// ������ꥢ�Х�������
		if(!$this->af->get('first_avatar')){
			$o->set('first_avatar', 0);
		}
		// ���Х����ۿ���λ������
		if(!$this->af->get('avatar_stock_status')){
			$o->set('avatar_stock_status', 0);
			$o->set('avatar_stock_num', '');
		}
		// ���Х����ۿ�������������
		if(!$this->af->get('avatar_start_status')){
			$o->set('avatar_start_status', 0);
			$o->set('avatar_start_time', '');
		}else{
			$o->set('avatar_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('avatar_start_year' ),
					$this->af->get('avatar_start_month'),
					$this->af->get('avatar_start_day'),
					$this->af->get('avatar_start_hour'),
					$this->af->get('avatar_start_min')
				)
			);
		}
		// ���Х����ۿ���λ��������
		if(!$this->af->get('avatar_end_status')){
			$o->set('avatar_end_status', 0);
			$o->set('avatar_end_time', '');
		}else{
			$o->set('avatar_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('avatar_end_year' ),
					$this->af->get('avatar_end_month'),
					$this->af->get('avatar_end_day'),
					$this->af->get('avatar_end_hour'),
					$this->af->get('avatar_end_min')
				)
			);
		}
		// ���Х�������1�Υ��åץ�����
		if($this->af->get('avatar_image1')){
			$o->set('avatar_image1', $um->uploadFile($this->af->get('avatar_image1'), 'avatar'));
		}
		// �ºݤ˻��Ѥ��륢�Х�������1�Υ��åץ�����
		if($this->af->get('avatar_image1_desc')){
			$o->set('avatar_image1_desc', $um->uploadFile($this->af->get('avatar_image1_desc'), 'avatar'));
		}
		// ���Х�������2�Υ��åץ�����
		if($this->af->get('avatar_image2')){
			$o->set('avatar_image2', $um->uploadFile($this->af->get('avatar_image2'), 'avatar'));
		}
		// �ºݤ˻��Ѥ��륢�Х�������2�Υ��åץ�����
		if($this->af->get('avatar_image2_desc')){
			$o->set('avatar_image2_desc', $um->uploadFile($this->af->get('avatar_image2_desc'), 'avatar'));
		}
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatar_list';
		
		// ���Х������ƥ���ID���ݻ�
		$acid = $this->af->get('avatar_category_id');
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		// ���Х������ƥ���ID�Υ��å�
		$this->af->set('avatar_category_id', $acid);
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_ADD_DONE);
		return 'admin_avatar_list';
	}
}
?>