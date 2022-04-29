<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理APIユーザ情報編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminApiUserEditDo extends Tv_ActionForm
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
class Tv_Action_AdminApiUserEditDo extends Tv_ActionAdmin
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
		// ユーザIDをセット
		$user_id = $this->af->get('user_id');
		// メールアドレス重複登録確認開始
		$check_user =& new Tv_User(
			$this->backend
		);
		$userList = $check_user->searchProp(
			array('user_id'),
			array('user_mailaddress' => new Ethna_AppSearchObject($this->af->get('user_mailaddress'), OBJECT_CONDITION_EQ))
		);
		
		// 既に重複するメールアドレスが存在する場合
		if($userList[0] > 0){
			$hit = false;
			foreach($userList[1] as $v){
				// 自分のメールアドレスの場合はOK
				if($user_id == $v['user_id']) $hit = true;
			}
			// 自分のメールアドレスでないメールアドレスがDBに登録されている場合はNG
			if(!$hit){
				$this->ae->add(null, '', E_ADMIN_USER_DUPLICATE);
				return 'admin_user_edit';
			}
		}
		
		/* プロフィール基本項目をDBに保存 */
		$userObj =& new Tv_User(
			$this->backend,
			'user_id',
			$user_id
		);
		
		// 退会または強制退会の場合は日時を入れる
		if(in_array($this->af->get('user_status'), array(3, 4))){
			$userObj->set('user_deleted_time', date('Y-m-d H:i:s'));
		}
		
		// 更新
		$userObj->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$userObj->set('user_birth_date',sprintf("%04d-%02d-%02d",$this->af->get('user_birth_date_year'),$this->af->get('user_birth_date_month'),$this->af->get('user_birth_date_day')));
		$userObj->update();
		
		// メッセージ出力
		echo 'OK';
	}
}
?>