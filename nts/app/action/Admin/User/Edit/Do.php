<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����桼�������Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserEditDo extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'name'		=> '�桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_nickname' => array(
			'name'		=> '�˥å��͡���',
		),
		'user_mailaddress' => array(
			'name'		=> '�᡼�륢�ɥ쥹',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_password' => array(
			'name'		=> '�ѥ����',
		),
		'user_point' => array(
			'name'		=> '�桼���ݥ����',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_birth_date_year' => array(
			'required'	=> true,
		),
		'user_birth_date_month' => array(
			'required'	=> true,
		),
		'user_birth_date_day' => array(
			'required'	=> true,
		),
		'user_sex' => array(),
		'prefecture_id' => array(),
		'user_address' => array(),
		'user_address_building' => array(),
		'user_blood_type' => array(),
		'job_family_id' => array(),
		'business_category_id' => array(),
		'user_is_married' => array(),
		'user_has_children' => array(),
		'work_location_prefecture_id' => array(),
		'user_hobby' => array(),
		'user_url' => array(),
		'user_introduction' => array(),
		'user_prof_text' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_prof_textarea' => array(
			'type'		=> array(VAR_TYPE_TEXT),
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'user_prof_select' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_SELECT,
		),
		'user_prof_checkbox' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_prof_radio' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_RADIO,
		),
		'user_guest_status'	=> array(
			'required'	=> true,
		),
		'user_status'	=> array(
			'required'	=> true,
		),
	);
}

/**
 * �����桼�������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_user_edit';
		
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
		// �桼��ID�򥻥å�
		$user_id = $this->af->get('user_id');
		// �᡼�륢�ɥ쥹��ʣ��Ͽ��ǧ����
		$check_user =& new Tv_User(
			$this->backend
		);
		$userList = $check_user->searchProp(
			array('user_id'),
			array('user_mailaddress' => new Ethna_AppSearchObject($this->af->get('user_mailaddress'), OBJECT_CONDITION_EQ))
		);
		
		// ���˽�ʣ����᡼�륢�ɥ쥹��¸�ߤ�����
		if($userList[0] > 0){
			$hit = false;
			foreach($userList[1] as $v){
				// ��ʬ�Υ᡼�륢�ɥ쥹�ξ���OK
				if($user_id == $v['user_id']) $hit = true;
			}
			// ��ʬ�Υ᡼�륢�ɥ쥹�Ǥʤ��᡼�륢�ɥ쥹��DB����Ͽ����Ƥ������NG
			if(!$hit){
				$this->ae->add(null, '', E_ADMIN_USER_DUPLICATE);
				return 'admin_user_edit';
			}
		}
		
		/* �ץ�ե�������ܹ��ܤ�DB����¸ */
		$userObj =& new Tv_User(
			$this->backend,
			'user_id',
			$user_id
		);
		
		// �������Υ桼�����ơ��������ݻ�
		$_user_status = $userObj->get('user_status');
		
		// ��˥ݥ�����ѹ���Ԥ�
		$point_balance = $userObj->get('user_point');
		// �ݥ���Ȥ��Խ����줿�Τ��ɤ�����ǧ����
		if($this->af->get('user_point') != $point_balance){
			//�ݥ���Ȥ��Խ����줿�Τ�������������
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $this->af->get('user_id'),
				'point'			=> $this->af->get('user_point') - $point_balance,
				'point_type'	=> $point_type_search['admin'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
//				'user_sub_id'	=> $uaid,
//				'point_sub_id'	=> $avatar_id,
//				'point_memo'	=> $a->get('avatar_name'),
			);
			$pm->addPoint($param);
			
		}
		//�桼���ݥ���Ȥ��Խ�����Ƥ������point�ơ��֥��������� end
		
		// ���ޤ��϶������ξ��������������
		if(in_array($this->af->get('user_status'), array(3, 4))){
			$userObj->set('user_deleted_time', date('Y-m-d H:i:s'));
		}
		
		// �ݥ���Ȥ���Ź������ɤ�ɬ�פϤʤ��ʷ�ɷ׻���Ʊ���Ȥʤ뤿���
//		$this->af->set('user_point', null);
//		$userObj->set('user_point', null);
		// ����
		$userObj->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$userObj->set('user_birth_date',sprintf("%04d-%02d-%02d",$this->af->get('user_birth_date_year'),$this->af->get('user_birth_date_month'),$this->af->get('user_birth_date_day')));
		$userObj->update();
		
		/* �ץ�ե����륪�ץ������ܤ�DB����¸�����Ƥ����ʤ�DB�������� */
		$formTypeList = array('text', 'textarea', 'select', 'radio');	// �ե����ॿ���װ���(�����å��ܥå����ϼ������ü�ʤΤǽ���)
		// �ե������������������¸
		foreach($formTypeList as $formType){
			$formUserProf = $this->af->get('user_prof_' . $formType);
			if(!is_array($formUserProf)) continue;
			foreach($formUserProf as $configUserProfId => $userProfValue){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id'),
					array($user_id, $configUserProfId)
				);
				if($userProfValue != ''){
					if($userProf->isValid()){
						$userProf->set('user_prof_value', $userProfValue);
						$userProf->update();
					}else{
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $user_id);
						$userProf->set('config_user_prof_id', $configUserProfId);
						$userProf->set('user_prof_value', $userProfValue);
						$userProf->add();
					}
				}else{
					if($userProf->isValid()) $userProf->remove();
				}
			}
		}
		// �����å��ܥå���(Ethna�ǥե������ͤ�2��������˽���ʤ��Τǡ���������ü�ʼ���)
		$db = $this->backend->getDB();
		$sql = 'SELECT o.config_user_prof_option_id, o.config_user_prof_id 
			FROM config_user_prof_option as o left join config_user_prof as p 
				on o.config_user_prof_id = p.config_user_prof_id 
			WHERE p.config_user_prof_type = 5';
		$options = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
		
		$checkbox_values = $this->af->get('user_prof_checkbox');
		if(is_array($options)){
			foreach($options as $option){
				if(is_array($checkbox_values) && in_array($option['config_user_prof_option_id'], $checkbox_values)){
					// �����å�����Ƥ������
					$user_prof =& new Tv_UserProf(
						$this->backend,
						array('user_id', 'config_user_prof_id', 'user_prof_value'),
						array(
							$user_id,
							$option['config_user_prof_id'],
							$option['config_user_prof_option_id'],
						)
					);
					if(!$user_prof->isValid()){
						$user_prof =& new Tv_UserProf($this->backend);
						$user_prof->set('user_id', $user_id);
						$user_prof->set(
							'config_user_prof_id',
							$option['config_user_prof_id']
						);
						$user_prof->set(
							'user_prof_value',
							$option['config_user_prof_option_id']
						);
						$user_prof->add();
					}
				}else{
					// �����å�����Ƥ��ʤ�����
					$user_prof =& new Tv_UserProf(
						$this->backend,
						array('user_id', 'config_user_prof_id', 'user_prof_value'),
						array(
							$user_id,
							$option['config_user_prof_id'],
							$option['config_user_prof_option_id'],
						)
					);
					if($user_prof->isValid()){
						$user_prof->remove();
					}
				}
			}
		}
		/*
		$formUserProfCheckbox = $this->af->get('user_prof_checkbox');
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		// �ե���������������å��ܥå����ι��ܰ��������
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id'),
			array('config_user_prof_type' => 5)
		);
		
		$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
		foreach($configUserProfList[1] as $configUserProf){
			$configUserProfOptionList = $configUserProfOption->searchProp(
				array('config_user_prof_option_id'),
				array('config_user_prof_id' => $configUserProf['config_user_prof_id'])
			);
			foreach($configUserProfOptionList[1] as $configUserProfOption){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id', 'user_prof_value'),
					array($user_id, $configUserProf['config_user_prof_id'], $configUserProfOption['config_user_prof_option_id'])
				);
				if(is_array($formUserProfCheckbox) && !(array_search($configUserProfOption['config_user_prof_option_id'], $formUserProfCheckbox) === false)){
					// �����å��ܥå��������򤵤�Ƥ���
					if(!$userProf->isValid()){
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $user_id);
						$userProf->set('config_user_prof_id', $configUserProf['config_user_prof_id']);
						$userProf->set('user_prof_value', $configUserProfOption['config_user_prof_option_id']);
						$userProf->add();
					}
				}else{
					// �����å��ܥå��������򤵤�Ƥ��ʤ�
					if($userProf->isValid())
					{
						$userProf->remove();
					}
				}
			}
		}
		*/
		// ���ξ��
		if($this->af->get('user_status') == 3){
			/* =============================================
			// �桼���������Ͽ
			 ============================================= */
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $userObj->get('user_id'));
			$uh->set('user_mailaddress', $userObj->get('user_mailaddress'));
			$uh->set('spgv_user_id', $userObj->get('spgv_user_id'));
			$uh->set('user_status', 3);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			$this->ae->add('errors', "�桼��ID:" . $this->af->get('user_id') . "����񤵤��ޤ�����");
			
			/* =============================================
			// �桼�����
			 ============================================= */
			$userManager =& $this->backend->getManager('User');
			$userManager->forcedResign($this->af->get('user_id'), 3);
		}
		// �������ξ��
		elseif($this->af->get('user_status') == 4){
			/* =============================================
			// �桼���������Ͽ
			 ============================================= */
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $userObj->get('user_id'));
			$uh->set('user_mailaddress', $userObj->get('user_mailaddress'));
			$uh->set('spgv_user_id', $userObj->get('spgv_user_id'));
			$uh->set('user_status', 4);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			$this->ae->add('errors', "�桼��ID:" . $this->af->get('user_id') . "������񤵤��ޤ�����");
			
			/* =============================================
			// �桼�����
			 ============================================= */
			$userManager =& $this->backend->getManager('User');
			$userManager->forcedResign($this->af->get('user_id'), 4);
		}
		
		/* =============================================
		// �����������ݡ���
		 ============================================= */
		// ��񡢶������ξ��
		if($this->af->get('user_status') == 3){
			$an = $this->backend->getManager('Analytics');
			$param = array(
				'pre_regist'	=> false,
				'regist'		=> false,
				'invite'		=> false,
				'media'			=> false,
				'resign'		=> true,
			);
			$an->addAnalytics($param);
		}
		
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_USER_EDIT_DONE);
		return 'admin_user_list';
//		return 'admin_user_edit_done';
	}
}
?>