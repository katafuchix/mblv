<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ登録実行アクションフォーム
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
			'required_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
			'min_error'			=> '{form}を半角英数字4文字以上で正しく入力してください',
			'regexp_error'		=> '{form}を半角英数字4文字以上で正しく入力してください',
		),
		'user_birth_date_year' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 4,
			'max'				=> 4,
			'min_error'			=> '{form}を数字4文字で入力してください',
			'max_error'			=> '{form}を数字4文字で入力してください',
		),
		'user_birth_date_month' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}を数字1〜2文字で入力してください',
			'max_error'			=> '{form}を数字1〜2文字で入力してください',
		),
		'user_birth_date_day' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}を数字1〜2文字で入力してください',
			'max_error'			=> '{form}を数字1〜2文字で入力してください',
		),
		'user_birth_date_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_sex' => array(
			'required'		=> true,
		),
		'user_sex_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'prefecture_id' => array(
		),
		'user_address' => array(
		),
		'user_address_building' => array(
		),
		'user_address_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_blood_type' => array(
		),
		'user_blood_type_public' => array(
			'name'		=> '血液型公開',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'job_family_id' => array(
		),
		'job_family_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'business_category_id' => array(
		),
		'business_category_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_is_married' => array(
		),
		'user_is_married_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_has_children' => array(
		),
		'user_has_children_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'work_location_prefecture_id' => array(
		),
		'work_location_prefecture_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_hobby' => array(
		),
		'user_hobby_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_url' => array(
		),
		'user_url_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_introduction' => array(
		),
		'user_introduction_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
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
 * ユーザ登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRegistDo extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
/*
		// プロフィール属性によってValidateする必要があるかどうか確認する
		$profile_required = $this->config->get('profile_required');
		foreach($profile_required as $k => $v){
			// プロフィールとして検証対象となっている場合
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
		// 検証エラー
		if($this->af->validate() > 0) return 'user_regist';
		
		// ニックネームの絵文字制限
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add("errors","ﾆｯｸﾈｰﾑに絵文字は使用できません");
			return 'user_regist';
		}
		// ニックネームの文字数制限
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add("errors","ﾆｯｸﾈｰﾑは128文字以下で入力してください");
			return 'user_regist';
		}
		
		// 生年月日の日付確認
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
				$this->ae->add('errors', "不正な生年月日です。");
				return 'user_regist';
			}
		}else{
			$this->ae->add('errors', "不正な生年月日です。");
			return 'user_regist';
		}
		// 年齢の確認
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
					'歳未満の方は会員登録することができません。'
			);
			return 'user_regist';
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
		$um =& $this->backend->getManager('Util');
		$pm =& $this->backend->getManager('Point');
		
		/*
		 * 会員情報更新処理
		 */ 
		// ユーザ情報取得
		$user_hash = $this->af->get('user_hash');
		$user =& new Tv_User($this->backend,'user_hash',$user_hash);
		
		//受け取ったuser_hashのユーザーが、user_status:1でDBにいない場合は以下の会員登録系処理を行わない
		if($user->get('user_status') != 1){
			$this->ae->add(null, '', E_USER_REGIST_10);
			return 'user_regist';
		}else{
			$user_id = $user->get('user_id');
			$user_mailaddress = $user->get('user_mailaddress');
			$invite_id = $user->get('invite_id');
			$media_access_hash = $user->get('media_access_hash');
		}
		
		// ニックネームの重複確認
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
		
		//携帯端末UIDを取得
		$user_uid = $um->getXuid();
		// 開発系
		//if(!$user_uid) $user_uid = $um->getRandamCode();
		if(!$user_uid) $user_uid = '';
		if($this->config->get('mobile_only') && !$user_uid){
			$this->ae->add('errors', "携帯電話の個体識別情報を送信する設定として下さい。");
			return 'user_regist';
		}
		
		// 携帯機種名
		$user->set('user_device', $um->getModel());
		
		// 会員登録処理
		$user = new Tv_User($this->backend, 'user_id', $user_id);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		if(!$this->af->get('prefecture_id')) $user->set('prefecture_id', '');
		if(!$this->af->get('job_family_id')) $user->set('job_family_id', '');
		if(!$this->af->get('business_category_id')) $user->set('business_category_id', '');
		if(!$this->af->get('work_location_prefecture_id')) $user->set('work_location_prefecture_id', '');
		
		// アバター設定ありの入会経路の場合はここで本登録にしない
		if($user->get('media_id')){
			// 入会経路情報の取得
			$m = & new Tv_Media($this->backend, 'media_id', $user->get('media_id'));
			// アバター設定がない場合のみここで本登録にする
			if(!$m->get('media_avatar'))$user->set('user_status', 2);
		}else{
			$user->set('user_status', 2);
		}
		$user->set('user_uid', $user_uid);
		
		// 生年月日
		$user->set('user_birth_date',
			sprintf(
				"%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			)
		);
/*
		// プロフィール属性によって公開設定を更新する
		$profile_public = $this->config->get('profile_public');
		foreach($profile_public as $k => $v){
			// プロフィールとして検証対象となっている場合
			if($v){
				// 非公開にチェックがあればパラメタは「0」
				// 非公開にチェックがなければパラメタはないので「1」で補う
				if($this->af->get("{$k}_public") == ''){
					$user->set("{$k}_public", 1);
				}
			}
		}
*/
		// 更新
		$r = $user->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_REGIST_20);
 			return 'user_regist';
		}
		
		/* =============================================
		// 招待登録の場合の処理
		 ============================================= */
		if($invite_id){
			$im = $this->backend->getManager('Invite');
			$im->inviteRegist($invite_id, $no_point);
		}
		
		/* =============================================
		// アバターオプションのある場合
		 ============================================= */
		$option = $this->config->get('option');
		if($option['avatar']){
			/* =============================================
			// プリセットアバターを取得
			 ============================================= */
			$sqlWhere = 'a.avatar_status = 1 AND a.preset_avatar = 1';
			$sqlValues = array();
			// 性別情報を追加する
			// 「男性」ならば「女性用」以外を表示
			if($this->af->get('user_sex')==1){
				$exclude_sex = 2;
			}
			// 「女性」ならば「男性用」以外を表示
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
					// アバター購入（無料）
					 ============================================= */
					$ua = new Tv_UserAvatar($this->backend);
					$ua->set('user_id', $user_id);
					$ua->set('avatar_id', $avatar_id);
					$ua->set('user_avatar_status', 1);
					$ua->set('user_avatar_wear', 1);// 着る
					$ua->set('user_avatar_created_time', $timestamp);
					$ua->set('user_avatar_updated_time', $timestamp);
					$r = $ua->add();
					// エラー制御は行わない
//					if(Ethna::isError($r)) return 'user_avatar_preview';
					// ユーザアバターID
					$uaid = $ua->getId();
					
					/* =============================================
					// アバター配信終了数設定がされていれば、-1
					 ============================================= */
					$a = new Tv_Avatar($this->backend, 'avatar_id', $avatar_id);
					$avatar_category_id = $a->get('avatar_category_id');
					if($a->get('avatar_stock_status')){
						$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
						$r = $a->update();
						// エラー制御は行わない
//						if(Ethna::isError($r)) return 'user_avatar_preview';
					}
					
					/* =============================================
					// ポイント追加系処理
					 ============================================= */
					$point_type_search = $this->config->get('point_type_search');
					$param = array(
						'user_id'		=> $user_id,
//						'point'			=> 0 - $a->get('avatar_point'),
						'point'			=> 0,// 無料
						'point_type'	=> $point_type_search['avatar'],
						'point_status'	=> 2,// 承認済み
						'user_sub_id'	=> $uaid,
						'point_sub_id'	=> $avatar_id,
						'point_memo'	=> $a->get('avatar_name'),
					);
					$pm->addPoint($param);
					
					/* =============================================
					// ログ追加処理
					 ============================================= */
					$s = & $this->backend->getManager('Stats');
					$s->addStats('avatar',$avatar_id, $avatar_category_id);
				}
			}
		}
		
		// アバター設定ありの入会経路の場合はアバター設定後に本登録にするため暫定的にログインととし、アバター初期設定画面へ飛ばす
		if($user->get('user_status')==1){
			// セッションにユーザ情報を保存
			$this->session->start(0);
			$this->session->set('user', $user->getNameObject()); 
			// セッションIDをDBに保存
			$user->set('user_sessid', session_id());
			$user->set('user_device', $um->getModel());
			$user->update();
			// アバター初期設定画面へ
			return 'user_avatar_config_first';
		}
		
		// 以下、本登録処理の続き
		// 登録完了のメッセージ
		$this->ae->add(null, '', I_USER_REGIST_DONE);
		
		/* =============================================
		// ユーザ履歴の登録履歴を検索
		 ============================================= */
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user_hist',
			'sql_where'		=> 'user_mailaddress = ? AND user_status = 2',
			'sql_values'	=> array($user->get('user_mailaddress')),
		);
		$uh_list = $um->dataQuery($param);
		// デフォルトはポイント付与を行う
		$no_point = false;
		if(count($uh_list) > 0){
			// SPGVユーザ存在確認
			if($user->get('spgv_user_id')){
				$su = new Tv_SpgvUser($this->backend, 'user_id', $user->get('spgv_user_id'));
				// 有効なレコードの場合
				if($su->isValid()){
					// 有効会員の場合
					if($su->get('user_status') == 2){
						// ポイント付与しない
						$no_point = true;
					}
				}
			}
		}
		
		/* =============================================
		// ポイント追加系処理
		 ============================================= */
		// ポイント付与のある場合
		if(!$no_point){
			$sns_info = $this->config->get('sns_info');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $user_id,
				'point'			=> intval($sns_info['sns_regist_point']),
				'point_type'	=> $point_type_search['regist'],
				'point_status'	=> 2,// 承認済み
			);
			$pm->addPoint($param);
		}
		
		/* =============================================
		// 入会経路経由の場合の処理
		 ============================================= */
		if($media_access_hash){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($media_access_hash, $no_point);
		}
		
		/* =============================================
		// ユーザ履歴に登録
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
		 * 会員数増減レポート処理
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
		 * ログイン処理
		 */
		$userManager =& $this->backend->getManager('User');
		$r = $userManager->login( $user->get('user_mailaddress'), $user->get('user_password') );
		// ログイン失敗
		if(!$r){
			$this->ae->add(null, '', E_USER_LOGIN);
			return 'user_index';
		}
		// ログイン成功
		else{
			return 'user_regist_done';
//			return 'user_home';
		}
		//ログイン処理 end
	}
}
?>