<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ץ�ե������ѹ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserProfileEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
		// napatown�Ǥ�nickname���ѹ��Ϥ��ʤ�
		'user_nickname' => array(
			'form_type' => FORM_TYPE_HIDDEN,
			'required' => false,
			'ngword' => true,
		),
		
		'user_birth_date_year' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 4,
			'max'				=> 4,
			'min_error'			=> '{form}�����4ʸ�������Ϥ��Ƥ�������',
			'max_error'			=> '{form}�����4ʸ�������Ϥ��Ƥ�������',
		),
		'user_birth_date_month' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}�����1��2ʸ�������Ϥ��Ƥ�������',
			'max_error'			=> '{form}�����1��2ʸ�������Ϥ��Ƥ�������',
		),
		'user_birth_date_day' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}�����1��2ʸ�������Ϥ��Ƥ�������',
			'max_error'			=> '{form}�����1��2ʸ�������Ϥ��Ƥ�������',
		),
		'user_birth_date_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		
		'user_sex' => array(
			'form_type' => FORM_TYPE_HIDDEN,
			'required' => false,// ���̤��ѹ��Բ�
		),
		'user_sex_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'prefecture_id' => array(
		),
		'user_address' => array(
		),
		'user_address_building' => array(
		),
		'user_address_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_blood_type' => array(
		),
		'user_blood_type_public' => array(
			'name'		=> '��շ�����',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'job_family_id' => array(
		),
		'job_family_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'business_category_id' => array(
		),
		'business_category_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_is_married' => array(
		),
		'user_is_married_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_has_children' => array(
		),
		'user_has_children_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'work_location_prefecture_id' => array(
		),
		'work_location_prefecture_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_hobby' => array(
		),
		'user_hobby_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_url' => array(
		),
		'user_url_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_introduction' => array(
		),
		'user_introduction_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '�����'),
		),
		'user_prof_text' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_prof_textarea' => array(
			'type'		=> array(VAR_TYPE_STRING),
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
	);
}

/**
 * �桼���ץ�ե������ѹ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserProfileEditDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ץ�ե�����°���ˤ�ä�Validate����ɬ�פ����뤫�ɤ�����ǧ����
		$profile_required = $this->config->get('profile_required');
		foreach($profile_required as $k => $v){
			// �ץ�ե�����Ȥ��Ƹ����оݤȤʤäƤ�����
			if($v){
				if($k == 'user_birth_date'){
					$this->af->form[$k.'_year']['required'] = true;
					$this->af->form[$k.'_month']['required'] = true;
					$this->af->form[$k.'_day']['required'] = true;
				}else{
					$this->af->form[$k]['required'] = true;
				}
			}
		}
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_profile_edit';
		
		/*
		// napatown�Ǥϥ˥å��͡�����ѹ����ԲĤȤʤä��ΤǤ��ν���������
		// �˥å��͡���γ�ʸ������
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add("errors","�Ǝ����Ȏ��Ѥ˳�ʸ���ϻ��ѤǤ��ޤ���");
			return 'user_profile_edit';
		}
		// �˥å��͡����ʸ��������
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add("errors","�Ǝ����Ȏ��Ѥ�128ʸ���ʲ������Ϥ��Ƥ�������");
			return 'user_profile_edit';
		}
		*/
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
		// ���å�����������
		$sess = $this->session->get('user');
		
		// �˥å��͡���ν�ʣ��ǧ
		if($sess['user_nickname'] != $this->af->get('user_nickname')){
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'user',
				'sql_where'		=> 'user_nickname = ?',
				'sql_values'	=> array($this->af->get('user_nickname')),
			);
			$um = $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			if(count($r) > 0){
				$this->ae->add(null, '', E_USER_NICKNAME_ALREADY_USED);
				return 'user_profile_edit';
			}
		}
		
		// �ץ�ե�������ܹ��ܤ�DB����¸
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// ��ǯ����
		if(
			($this->af->get('user_birth_date_year' ) != '') && 
			($this->af->get('user_birth_date_month') != '') &&
			($this->af->get('user_birth_date_day'  ) != '') &&
			checkdate(
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day'  ),
				$this->af->get('user_birth_date_year' )
			)
		) {
			// ǯ��γ�ǧ
			$um = $this->backend->getManager('Util');
			$birth_date = sprintf("%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			);
			if($um->getAge($birth_date) < $this->config->get('user_age_min')){
				$this->ae->add(
					'errors',
					$this->config->get('user_age_min') .
						'��̤���������������ӥ������Ѥ��뤳�Ȥ��Ǥ��ޤ���'
				);
				return 'user_profile_edit';
			}
			$user->set('user_birth_date',
				sprintf(
					"%04d-%02d-%02d",
					$this->af->get('user_birth_date_year' ),
					$this->af->get('user_birth_date_month'),
					$this->af->get('user_birth_date_day'  )
				)
			);
		}else{
			$this->ae->add('errors','¸�ߤ��ʤ������Ǥ���');
			return 'user_profile';
		}
		// �ץ�ե�����°���ˤ�äƸ�������򹹿�����
		$profile_public = $this->config->get('profile_public');
		foreach($profile_public as $k => $v){
			// �ץ�ե�����Ȥ��Ƹ����оݤȤʤäƤ�����
			if($v){
				// ������˥����å�������Хѥ�᥿�ϡ�0��
				// ������˥����å����ʤ���Хѥ�᥿�Ϥʤ��Τǡ�1�פ��䤦
				if($this->af->get("{$k}_public") == ''){
					$user->set("{$k}_public", 1);
				}
			}
		}
		// �����С��饤��
		$user->update();
		
		/* �ץ�ե����륪�ץ������ܤ�DB����¸�����Ƥ����ʤ�DB�������� */
		$formTypeList = array('text', 'textarea', 'select', 'radio');   // �ե����ॿ���װ���(�����å��ܥå����ϼ������ü�ʤΤǽ���)
		// �ե������������������¸
		foreach($formTypeList as $formType){
			$formUserProf = $this->af->get('user_prof_' . $formType);
			if(!is_array($formUserProf)) continue;
			foreach($formUserProf as $configUserProfId => $userProfValue){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id'),
					array($sess['user_id'], $configUserProfId)
				);
				if($userProfValue != ''){
					if($userProf->isValid()){
						$userProf->set('user_prof_value', $userProfValue);
						$userProf->update();
					}else{
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $sess['user_id']);
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
		$user_id = $sess['user_id'];
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
			array('config_user_prof_type' => new Ethna_AppSearchObject(5, OBJECT_CONDITION_EQ))
		);
		
		$cupo =& new Tv_ConfigUserProfOption($this->backend);
		foreach($configUserProfList[1] as $configUserProf){
			$configUserProfOptionList = $cupo->searchProp(
				array('config_user_prof_option_id'),
				array('config_user_prof_id' => new Ethna_AppSearchObject($configUserProf['config_user_prof_id'], OBJECT_CONDITION_EQ))
			);
			foreach($configUserProfOptionList[1] as $configUserProfOption){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id', 'user_prof_value'),
					array($sess['user_id'], $configUserProf['config_user_prof_id'], $configUserProfOption['config_user_prof_option_id'])
				);
				if(is_array($formUserProfCheckbox) && !(array_search($configUserProfOption['config_user_prof_option_id'], $formUserProfCheckbox) === false)){
					// �����å��ܥå��������򤵤�Ƥ���
					if(!$userProf->isValid()){
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $sess['user_id']);
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
		
		//user_nickname ���å���󹹿�
		unset($_SESSION['user']['user_nickname']);
		//$_SESSION['user']['user_nickname'] = $this->af->get('user_nickname');
		
		// form�����nickname���ʤ��Τ�AppObject�������������������
		$_SESSION['user']['user_nickname'] = $user->get('user_nickname');
		$this->ae->add(null, '', I_USER_PROFILE_EDIT_DONE);
		return 'user_home';
	}
}

?>
