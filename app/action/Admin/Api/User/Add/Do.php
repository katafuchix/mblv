<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����API�桼����Ͽ�Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminApiUserAddDo extends Tv_ActionForm
{
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_nickname' => array(
			'max'				=> 128,
			'required'	=> true,
		),
		'user_mailaddress' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
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
		'user_point' => array(
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
		'user_mail_ok' => array(
			'form_type'	=> FORM_TYPE_RADIO,
			'option'	=> 'Util, user_mail_ok',
		),
		'user_name' => array(),
		'user_name_kana' => array(),
		'region_id' => array(),
		'user_zipcode' => array(),
		'user_address' => array(),
		'user_address_building' => array(),
		'user_phone' => array(),
	);
}

/**
 * �����桼�������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminApiUserAddDo extends Tv_ActionAdmin
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
		
		// �᡼�륢�ɥ쥹�η���������å�
		$um = $this->backend->getManager('Util');
		if(!$um->checkMailAddress($this->af->get('user_mailaddress'))){
			$this->ae->add(null, '', E_ADMIN_USER_MAILADDRESS_ERROR);
			return 'admin_user_edit';
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
		
		// ���ޤ��϶������ξ��������������
		if(in_array($this->af->get('user_status'), array(3, 4))){
			$userObj->set('user_deleted_time', date('Y-m-d H:i:s'));
		}
		
		// ����
		$userObj->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$userObj->set('user_birth_date',sprintf("%04d-%02d-%02d",$this->af->get('user_birth_date_year'),$this->af->get('user_birth_date_month'),$this->af->get('user_birth_date_day')));
		$userObj->update();
		
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
		
		// ��å���������
		echo 'OK';
	}
}
?>