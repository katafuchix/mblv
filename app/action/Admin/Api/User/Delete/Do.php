<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理APIユーザ情報削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminApiUserDeleteDo extends Tv_ActionForm
{
	/** @var array   フォーム値定義 */
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
			'required_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
			'min_error'			=> '{form}を半角英数字4文字以上で正しく入力してください',
			'regexp_error'		=> '{form}を半角英数字4文字以上で正しく入力してください',
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
 * 管理ユーザ情報編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminApiUserDeleteDo extends Tv_ActionAdmin
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->validate() > 0) return 'admin_user_edit';
		
		// メールアドレスの形式をチェック
		$um = $this->backend->getManager('Util');
		if(!$um->checkMailAddress($this->af->get('user_mailaddress'))){
			$this->ae->add(null, '', E_ADMIN_USER_MAILADDRESS_ERROR);
			return 'admin_user_edit';
		}
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// 退会の場合
		if($this->af->get('user_status') == 3){
			/* =============================================
			// ユーザ履歴に登録
			 ============================================= */
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $userObj->get('user_id'));
			$uh->set('user_mailaddress', $userObj->get('user_mailaddress'));
//			$uh->set('spgv_user_id', $userObj->get('spgv_user_id'));
			$uh->set('user_status', 3);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			$this->ae->add('errors', "ユーザID:" . $this->af->get('user_id') . "を退会させました。");
			
			/* =============================================
			// ユーザ退会
			 ============================================= */
			$userManager =& $this->backend->getManager('User');
			$userManager->forcedResign($this->af->get('user_id'), 3);
		}
		// 強制退会の場合
		elseif($this->af->get('user_status') == 4){
			/* =============================================
			// ユーザ履歴に登録
			 ============================================= */
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $userObj->get('user_id'));
			$uh->set('user_mailaddress', $userObj->get('user_mailaddress'));
			$uh->set('user_status', 4);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			$this->ae->add('errors', "ユーザID:" . $this->af->get('user_id') . "を強制退会させました。");
			
			/* =============================================
			// ユーザ退会
			 ============================================= */
			$userManager =& $this->backend->getManager('User');
			$userManager->forcedResign($this->af->get('user_id'), 4);
		}
		
		/* =============================================
		// 会員数増減レポート
		 ============================================= */
		// 退会、強制退会の場合
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
		
		// メッセージ出力
		echo 'OK';
	}
}
?>