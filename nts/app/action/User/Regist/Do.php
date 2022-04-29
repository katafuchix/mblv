<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼����Ͽ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserRegistDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_hash' => array(
			'required'	=> true,
		),
		'user_nickname' => array(
			'required'	=> true,
		),
		'user_password' => array(
			'required'			=> true,
			'form_type'			=> FORM_TYPE_TEXT,
			'regexp'			=> '/^[a-zA-Z0-9]+$/',
			'min'				=> 4,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'			=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'regexp_error'		=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
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
			'required'		=> true,
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
 * �桼����Ͽ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRegistDo extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
/*
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
*/		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_regist';
		
		// �˥å��͡���γ�ʸ������
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add("errors","�Ǝ����Ȏ��Ѥ˳�ʸ���ϻ��ѤǤ��ޤ���");
			return 'user_regist';
		}
		// �˥å��͡����ʸ��������
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add("errors","�Ǝ����Ȏ��Ѥ�128ʸ���ʲ������Ϥ��Ƥ�������");
			return 'user_regist';
		}
		
		// ��ǯ���������ճ�ǧ
		if(
			$this->af->get('user_birth_date_month')&&
			$this->af->get('user_birth_date_day'  )&&
			$this->af->get('user_birth_date_year' )
		){
			if(!checkdate(
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day'  ),
				$this->af->get('user_birth_date_year' )
			)){
				$this->ae->add('errors', "��������ǯ�����Ǥ���");
				return 'user_regist';
			}
		}else{
			$this->ae->add('errors', "��������ǯ�����Ǥ���");
			return 'user_regist';
		}
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
					'��̤�������ϲ����Ͽ���뤳�Ȥ��Ǥ��ޤ���'
			);
			return 'user_regist';
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
		$um =& $this->backend->getManager('Util');
		$pm =& $this->backend->getManager('Point');
		
		/*
		 * ������󹹿�����
		 */ 
		// �桼���������
		$user_hash = $this->af->get('user_hash');
		$user =& new Tv_User($this->backend,'user_hash',$user_hash);
		
		//������ä�user_hash�Υ桼��������user_status:1��DB�ˤ��ʤ����ϰʲ��β����Ͽ�Ͻ�����Ԥ�ʤ�
		if($user->get('user_status') != 1){
			$this->ae->add(null, '', E_USER_REGIST_10);
			return 'user_regist';
		}else{
			$user_id = $user->get('user_id');
			$user_mailaddress = $user->get('user_mailaddress');
			$invite_id = $user->get('invite_id');
			$media_access_hash = $user->get('media_access_hash');
		}
		
		// �˥å��͡���ν�ʣ��ǧ
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user',
			'sql_where'		=> 'user_nickname = ? and user_status = ? ',
			'sql_values'	=> array($this->af->get('user_nickname'),2),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_USER_NICKNAME_ALREADY_USED);
			return 'user_regist';
		}
		
		//����ü��UID�����
		$user_uid = $um->getXuid();
		// ��ȯ��
		//if(!$user_uid) $user_uid = $um->getRandamCode();
		if(!$user_uid) $user_uid = '';
		if($this->config->get('mobile_only') && !$user_uid){
			$this->ae->add('errors', "�������äθ��μ��̾����������������Ȥ��Ʋ�������");
			return 'user_regist';
		}
		
		// ���ӵ���̾
		$user->set('user_device', $um->getModel());
		
		// �����Ͽ����
		$user = new Tv_User($this->backend, 'user_id', $user_id);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		if(!$this->af->get('prefecture_id')) $user->set('prefecture_id', '');
		if(!$this->af->get('job_family_id')) $user->set('job_family_id', '');
		if(!$this->af->get('business_category_id')) $user->set('business_category_id', '');
		if(!$this->af->get('work_location_prefecture_id')) $user->set('work_location_prefecture_id', '');
		
		// ���Х������ꤢ��������ϩ�ξ��Ϥ���������Ͽ�ˤ��ʤ�
		if($user->get('media_id')){
			// �����ϩ����μ���
			$m = & new Tv_Media($this->backend, 'media_id', $user->get('media_id'));
			// ���Х������꤬�ʤ����Τߤ���������Ͽ�ˤ���
			if(!$m->get('media_avatar'))$user->set('user_status', 2);
		}else{
			$user->set('user_status', 2);
		}
		$user->set('user_uid', $user_uid);
		
		// ��ǯ����
		$user->set('user_birth_date',
			sprintf(
				"%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			)
		);
/*
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
*/
		// ����
		$r = $user->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_REGIST_20);
 			return 'user_regist';
		}
		
		/* =============================================
		// ������Ͽ�ξ��ν���
		 ============================================= */
		if($invite_id){
			$im = $this->backend->getManager('Invite');
			$im->inviteRegist($invite_id, $no_point);
		}
		
		/* =============================================
		// ���Х������ץ����Τ�����
		 ============================================= */
		$option = $this->config->get('option');
		if($option['avatar']){
			/* =============================================
			// �ץꥻ�åȥ��Х��������
			 ============================================= */
			$sqlWhere = 'a.avatar_status = 1 AND a.preset_avatar = 1';
			$sqlValues = array();
			// ���̾�����ɲä���
			// �������פʤ�Сֽ����ѡװʳ���ɽ��
			if($this->af->get('user_sex')==1){
				$exclude_sex = 2;
			}
			// �ֽ����פʤ�С������ѡװʳ���ɽ��
			elseif($this->af->get('user_sex')==2){
				$exclude_sex = 1;
			}
			$sqlWhere .= " AND a.avatar_sex_type <> ?";
			$sqlValues[] = $exclude_sex;
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'avatar as a',
				'sql_where'		=> $sqlWhere,
				'sql_values'	=> $sqlValues,
			);
			$r = $um->dataQuery($param);
			if(count($r) > 0){
				$timestamp = date("Y-m-d H:i:s");
				foreach($r as $k => $v){
					$avatar_id = $v['avatar_id'];
					/* =============================================
					// ���Х���������̵����
					 ============================================= */
					$ua = new Tv_UserAvatar($this->backend);
					$ua->set('user_id', $user_id);
					$ua->set('avatar_id', $avatar_id);
					$ua->set('user_avatar_status', 1);
					$ua->set('user_avatar_wear', 1);// ���
					$ua->set('user_avatar_created_time', $timestamp);
					$ua->set('user_avatar_updated_time', $timestamp);
					$r = $ua->add();
					// ���顼����ϹԤ�ʤ�
//					if(Ethna::isError($r)) return 'user_avatar_preview';
					// �桼�����Х���ID
					$uaid = $ua->getId();
					
					/* =============================================
					// ���Х����ۿ���λ�����꤬����Ƥ���С�-1
					 ============================================= */
					$a = new Tv_Avatar($this->backend, 'avatar_id', $avatar_id);
					$avatar_category_id = $a->get('avatar_category_id');
					if($a->get('avatar_stock_status')){
						$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
						$r = $a->update();
						// ���顼����ϹԤ�ʤ�
//						if(Ethna::isError($r)) return 'user_avatar_preview';
					}
					
					/* =============================================
					// �ݥ�����ɲ÷Ͻ���
					 ============================================= */
					$point_type_search = $this->config->get('point_type_search');
					$param = array(
						'user_id'		=> $user_id,
//						'point'			=> 0 - $a->get('avatar_point'),
						'point'			=> 0,// ̵��
						'point_type'	=> $point_type_search['avatar'],
						'point_status'	=> 2,// ��ǧ�Ѥ�
						'user_sub_id'	=> $uaid,
						'point_sub_id'	=> $avatar_id,
						'point_memo'	=> $a->get('avatar_name'),
					);
					$pm->addPoint($param);
					
					/* =============================================
					// ���ɲý���
					 ============================================= */
					$s = & $this->backend->getManager('Stats');
					$s->addStats('avatar',$avatar_id, $avatar_category_id);
				}
			}
		}
		
		// ���Х������ꤢ��������ϩ�ξ��ϥ��Х�������������Ͽ�ˤ��뤿�����Ū�˥�����ȤȤ������Х������������̤����Ф�
		if($user->get('user_status')==1){
			// ���å����˥桼���������¸
			$this->session->start(0);
			$this->session->set('user', $user->getNameObject()); 
			// ���å����ID��DB����¸
			$user->set('user_sessid', session_id());
			$user->set('user_device', $um->getModel());
			$user->update();
			// ���Х������������̤�
			return 'user_avatar_config_first';
		}
		
		// �ʲ�������Ͽ������³��
		// ��Ͽ��λ�Υ�å�����
		$this->ae->add(null, '', I_USER_REGIST_DONE);
		
		/* =============================================
		// �桼���������Ͽ����򸡺�
		 ============================================= */
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user_hist',
			'sql_where'		=> 'user_mailaddress = ? AND user_status = 2',
			'sql_values'	=> array($user->get('user_mailaddress')),
		);
		$uh_list = $um->dataQuery($param);
		// �ǥե���Ȥϥݥ������Ϳ��Ԥ�
		$no_point = false;
		if(count($uh_list) > 0){
			// SPGV�桼��¸�߳�ǧ
			if($user->get('spgv_user_id')){
				$su = new Tv_SpgvUser($this->backend, 'user_id', $user->get('spgv_user_id'));
				// ͭ���ʥ쥳���ɤξ��
				if($su->isValid()){
					// ͭ������ξ��
					if($su->get('user_status') == 2){
						// �ݥ������Ϳ���ʤ�
						$no_point = true;
					}
				}
			}
		}
		
		/* =============================================
		// �ݥ�����ɲ÷Ͻ���
		 ============================================= */
		// �ݥ������Ϳ�Τ�����
		if(!$no_point){
			$sns_info = $this->config->get('sns_info');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $user_id,
				'point'			=> intval($sns_info['sns_regist_point']),
				'point_type'	=> $point_type_search['regist'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
			);
			$pm->addPoint($param);
		}
		
		/* =============================================
		// �����ϩ��ͳ�ξ��ν���
		 ============================================= */
		if($media_access_hash){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($media_access_hash, $no_point);
		}
		
		/* =============================================
		// �桼���������Ͽ
		 ============================================= */
		$timestamp = date('Y-m-d H:i:s');
		$uh = new Tv_UserHist($this->backend);
		$uh->set('user_id', $user_id);
		$uh->set('user_mailaddress', $user->get('user_mailaddress'));
		$uh->set('spgv_user_id', $user->get('spgv_user_id'));
		$uh->set('user_status', 2);
		$uh->set('user_hist_created_time', $timestamp);
		$uh->add();
		/*
		 * �����������ݡ��Ƚ���
		 */
		$an = $this->backend->getManager('Analytics');
		$param = array(
			'pre_regist'	=> false,
			'regist'		=> true,
			'invite'		=> $invite_id,
			'media'			=> $media_hash,
			'resign'		=> false,
		);
		$an->addAnalytics($param);
		
		/*
		 * ���������
		 */
		$userManager =& $this->backend->getManager('User');
		$r = $userManager->login( $user->get('user_mailaddress'), $user->get('user_password') );
		// ��������
		if(!$r){
			$this->ae->add(null, '', E_USER_LOGIN);
			return 'user_index';
		}
		// ����������
		else{
			return 'user_regist_done';
//			return 'user_home';
		}
		//��������� end
	}
}
?>