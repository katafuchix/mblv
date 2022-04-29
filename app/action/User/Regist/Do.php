<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserRegistDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'user_hash' => array(
//			'required'	=> true,
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
			'required'	=> true,
		),
		'user_birth_date_month' => array(
			'required'	=> true,
		),
		'user_birth_date_day' => array(
			'required'	=> true,
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
		'zipcode_search' => array(
			'name'			=> '͹���ֹ渡��',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		'user_zipcode' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * �桼����Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// user_hash��¸�߳�ǧ
		if(!$this->af->get('user_hash')){
			$this->ae->add(null, '', E_USER_REGIST_NO_USER_HASH);
			return 'user_regist';
		}
		
		// ͹���ֹ渡��
		if($this->af->get('zipcode_search')){
			$um = $this->backend->getManager('Util');
			// ͹���ֹ椫�齻�������������  0:͹���ֹ� 1:��ƻ�ܸ�̾ 2:�Զ� 3:Į¼
			$address = $um->getAddressByZip($this->af->get('user_zipcode'));
			// ��ƻ�ܸ���ʸ����ǵ��äƤ���Τǳ�������prefecture_id���Ѵ�����
			$pref_array = $um->getAttrList(prefecture_id);
			foreach($pref_array as $k=>$v){
				if($v[name] == $address[1]){
					$this->af->set('prefecture_id',$k);
					break;
				}
			}
			// �Զ�Į¼̾�򥻥åȤ���
			$this->af->set('user_address',$address[2].$address[3]);
			// �������򥻥åȤ����Խ����̤��᤹
			return 'user_regist';
		}
		
		// �����Ͽ���Υץ�ե�����ɬ�ܹ��ܤγ�ǧ
		$profile_regist_required = $this->config->get('profile_regist_required');
		foreach($profile_regist_required as $k => $v){
			// �ץ�ե�����Ȥ��Ƹ����оݤȤʤäƤ�����
			if($k == 'user_birth_date'){
				$this->af->form[$k.'_year']['required'] = $v;
				$this->af->form[$k.'_month']['required'] = $v;
				$this->af->form[$k.'_day']['required'] = $v;
			}else{
				$this->af->form[$k]['required'] = $v;
			}
		}
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_regist';
		
		// �˥å��͡���γ�ʸ������
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add(null,'',E_USER_NICKNAME_EMOJI);
			return 'user_regist';
		}
		// �˥å��͡����ʸ��������
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add(null,'',E_USER_NICKNAME_LENGTH);
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
				$this->ae->add(null, '', E_USER_BIRTHDAY_ERROR);
				return 'user_regist';
			}
		}else{
			$this->ae->add(null, '', E_USER_BIRTHDAY_ERROR);
			return 'user_regist';
		}
		
		// ǯ��γ�ǧ�����꤬������Τ߼¹ԡ�
		if($this->config->get('user_age_min')){
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
			'sql_where'		=> 'user_nickname = ?',
			'sql_values'	=> array($this->af->get('user_nickname')),
		);
		
		if(count($r) > 0){
			$this->ae->add(null, '', E_USER_NICKNAME_ALREADY_USED);
			return 'user_regist';
		}
		
		//����ü��UID�����
		$user_uid = $um->getXuid();
		if(!$user_uid) $user_uid = '';
		if($this->config->get('mobile_only') && !$user_uid){
			$this->ae->add(null, '', E_USER_XUID);
			return 'user_regist';
		}
		
		// Ʊ��XUID���̲����Ͽ������Ƥ������쥳���ɤ�������
		if($user_uid){
			$user = new Tv_User($this->backend, 'user_uid', $user_uid);
			if($user->isValid()){
				if($user->get('user_id') != $user_id){
					$user->remove();
				}
			}
		}
		// �����Ͽ����
		$user = new Tv_User($this->backend, 'user_id', $user_id);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$user->set('user_status', 2);
		//$user->set('user_uid', $user_uid);
		// �ǥХå���pc�Τ���
		$user->set('user_uid', $user_uid ? $user_uid : $um->getRandomStr());
		// test data
//		$user->set('user_uid' , 'juw284kbm5guw2mc');
		
		// ���ӵ���̾
		$user->set('user_device', $um->getModel());
		
		// ��ǯ����
		$user->set('user_birth_date',
			sprintf(
				"%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			)
		);
		// �ץ�ե�����°���ˤ�äƸ�������򹹿�����
		$profile_regist_public = $this->config->get('profile_regist_public');
		foreach($profile_regist_public as $k => $v){
			// �ץ�ե�����Ȥ��Ƹ����оݤȤʤäƤ�����
			if($v){
				// ������˥����å�������Хѥ�᥿�ϡ�0��
				// ������˥����å����ʤ���Хѥ�᥿�Ϥʤ��Τǡ�1�פ��䤦
				if($this->af->get("{$k}_public") == ''){
					$user->set("{$k}_public", 1);
				}
			}
		}
		// ����
		$r = $user->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_REGIST_20);
 			return 'user_regist';
		}
		
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
						// �ݥ������Ϳ���ʤ� �ΤΥǡ�����������ϥݥ������Ϳ�Ϥ��ʤ�
						$no_point = true;
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
				'point'			=> intval($sns_info['site_regist_point']),
				'point_type'	=> $point_type_search['regist'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
			);
			$pm->addPoint($param);
		}
		
		/* =============================================
		// ������Ͽ�ξ��ν���
		 ============================================= */
		if($invite_id){
			$im = $this->backend->getManager('Invite');
			$im->inviteRegist($invite_id, $no_point);
			
			// ���Ծ�����������
			$in = & new Tv_Invite($this->backend,'invite_id',$invite_id);
			// �ǡ����������
			if($in->isValid()){
				/* =============================================
				// ͧã�������ײ��Ͻ���
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// ���������INSERT 0:mail 1:access 2:reg
				$sm->addStats('invite', $in->get('from_user_id'), 0, 2);
			}
		}
		
		/* =============================================
		// �����ϩ��ͳ�ξ��ν���
		 ============================================= */
		if($media_access_hash){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($media_access_hash, $no_point);
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
		
		/* =============================================
		// �桼���������Ͽ
		 ============================================= */
		$timestamp = date('Y-m-d H:i:s');
		$uh = new Tv_UserHist($this->backend);
		$uh->set('user_id', $user_id);
		$uh->set('user_mailaddress', $user->get('user_mailaddress'));
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
		 * ���󥭥塼�᡼������
		 */
		$m = new Tv_Mail($this->backend);
		$value = array ();
		$m->sendOne($user->get('user_mailaddress'), 'user_regist_finish', $value );
		 
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
			// �㤤ʪ��������˾��ʤ�������ϥ��åȤ���
			if($user_uid){
				$param = array(
					'sql_select'	=> '*',
					'sql_from'		=> 'cart',
					'sql_where'		=> 'user_uid = ?',
					'sql_values'	=> array($user_uid),
					'sql_order'		=> 'cart_created_time DESC',
				);
				$r = $um->dataQuery($param);
				if(!Ethna::isError($r)){
					// �ǿ��Υ����ȥϥå������Ѥ���
					$cart_hash = $r[0]['cart_hash'];
					if($cart_hash){
						// ���å����˳�Ǽ����
						$this->session->set('cart_hash', $cart_hash);
					}
				}
			}
			return 'user_regist_done';
		}
		//��������� end
	}
}
?>