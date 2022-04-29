<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����API�桼���������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminApiUserDeleteDo extends Tv_ActionForm
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
class Tv_Action_AdminApiUserDeleteDo extends Tv_ActionAdmin
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
		// ���ξ��
		if($this->af->get('user_status') == 3){
			/* =============================================
			// �桼���������Ͽ
			 ============================================= */
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $userObj->get('user_id'));
			$uh->set('user_mailaddress', $userObj->get('user_mailaddress'));
//			$uh->set('spgv_user_id', $userObj->get('spgv_user_id'));
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
		
		// ��å���������
		echo 'OK';
	}
}
?>