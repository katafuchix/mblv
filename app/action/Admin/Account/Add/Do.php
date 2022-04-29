<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������ԥ����������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAccountAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'admin_name' => array(
			'name'		=> '������̾',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'login_id' => array(
			'required'		=> true,
			'name'				=> '������ID',
			'type'				=> VAR_TYPE_STRING,
			'form_type'			=> FORM_TYPE_TEXT,
			'regexp'			=> '/^[a-zA-Z0-9]+$/',
			'max'				=> 10,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
			'min_error'			=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
			'regexp_error'		=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
		),
		'login_password' => array(
			'required'			=> true,
			'name'				=> '������ѥ����',
			'type'				=> VAR_TYPE_STRING,
			'form_type'			=> FORM_TYPE_TEXT,
			'regexp'			=> '/^[a-zA-Z0-9]+$/',
			'max'				=> 10,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
			'min_error'			=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
			'regexp_error'		=> '{form}��Ⱦ�ѱѿ���10ʸ���ʲ������������Ϥ��Ƥ�������',
		),
		'admin_status' => array(
			'required'		=> true,
			'name'		=> '�����Ը���',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, admin_status',
		),
		'admin_action_category_id' => array(
			'name'		=> '���½�ͭ��ǽ',
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'	=> 'Util,admin_action_category',
		),
		'admin_shop_id' => array(
			'name'		=> '���½�ͭ����å�',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'	=> 'Util,shop',
		),
	);
}

/**
 * ���������ԥ����������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAccountAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_account_add';
		// 2��POST�ξ��
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'admin_account_list';
		}
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
		// �����Ծ���Ž�ʣ��ǧ
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'admin',
			'sql_where'	=> 'login_id = ?',
			'sql_values'	=> array($this->af->get('login_id')),
		);
		$um = $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '' ,E_ADMIN_ACCOUNT_DUPLICATE);
			return 'admin_account_add';
		}
		
		// �ɲ�
		$o =& new Tv_Admin($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		$admin_action_category_list = $this->config->get('admin_action_category');
		
		// ��������󥫥ƥ���Υ��å�
		$admin_action_category_id = $this->af->get('admin_action_category_id');
		if($admin_action_category_id && is_array($admin_action_category_id)){
			$admin_action_category = "";
			foreach($admin_action_category_id as $v){
				if($admin_action_category == ""){
					$admin_action_category .= $v;
				}else{
					$admin_action_category .= "," . $v;
				}
			}
			
			$o->set('admin_action_category_id', $admin_action_category);
		}else{
			$o->set('admin_action_category_id', '');
		}
		
		// ���½�ͭ����å�ID�Υ��å�
		$admin_shop_id = $this->af->get('admin_shop_id');
		if($admin_shop_id && is_array($admin_shop_id)){
			$admin_shop = "";
			foreach($admin_shop_id as $v){
				if($admin_shop == ""){
					$admin_shop .= $v;
				}else{
					$admin_shop .= "," . $v;
				}
			}
			
			$o->set('admin_shop_id', $admin_shop);
		}else{
			$o->set('admin_shop_id', '');
		}
		
		$r = $o->add();
		// �ɲå��顼�ξ��
		if(Ethna::isError($r)) return 'admin_account_add';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ACCOUNT_ADD_DONE);
		
		return 'admin_account_list';
	}
}
?>