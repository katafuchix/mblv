<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ユーザ情報編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserEditDo extends Tv_ActionForm
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
class Tv_Action_AdminUserEditDo extends Tv_ActionAdminOnly
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
		
		// 先にポイント変更を行う
		$point_balance = $userObj->get('user_point');
		// ポイントが編集されたのかどうか確認する
		if($this->af->get('user_point') != $point_balance){
			//ポイントが編集されたので履歴を作成する
			/* =============================================
			// ポイント追加系処理
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $this->af->get('user_id'),
				'point'			=> $this->af->get('user_point') - $point_balance,
				'point_type'	=> $point_type_search['admin'],
				'point_status'	=> 2,// 承認済み
//				'user_sub_id'	=> $uaid,
//				'point_sub_id'	=> $avatar_id,
//				'point_memo'	=> $a->get('avatar_name'),
			);
			$pm->addPoint($param);
			
		}
		//ユーザポイントが編集されている場合はpointテーブルに履歴作成 end
		
		// 退会または強制退会の場合は日時を入れる
		if(in_array($this->af->get('user_status'), array(3, 4))){
			$userObj->set('user_deleted_time', date('Y-m-d H:i:s'));
		}
		
		// 更新
		$userObj->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$userObj->set('user_birth_date',sprintf("%04d-%02d-%02d",$this->af->get('user_birth_date_year'),$this->af->get('user_birth_date_month'),$this->af->get('user_birth_date_day')));
		$userObj->update();
		
		/* プロフィールオプション項目をDBに保存（内容が空ならDBから削除） */
		$formTypeList = array('text', 'textarea', 'select', 'radio');	// フォームタイプ一覧(チェックボックスは実装が特殊なので除く)
		// フォーム情報を取得して保存
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
		// チェックボックス(Ethnaでフォーム値が2次元配列に出来ないので、これだけ特殊な実装)
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
					// チェックされている項目
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
					// チェックされていない項目
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
		// フォーム形式がチェックボックスの項目一覧を取得
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
					// チェックボックスが選択されている
					if(!$userProf->isValid()){
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $user_id);
						$userProf->set('config_user_prof_id', $configUserProf['config_user_prof_id']);
						$userProf->set('user_prof_value', $configUserProfOption['config_user_prof_option_id']);
						$userProf->add();
					}
				}else{
					// チェックボックスが選択されていない
					if($userProf->isValid())
					{
						$userProf->remove();
					}
				}
			}
		}
		*/
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
		
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_USER_EDIT_DONE);
		return 'admin_user_list';
	}
}
?>