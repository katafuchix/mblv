<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserRegistDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
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
			'required_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
			'min_error'			=> '{form}を半角英数字4文字以上で正しく入力してください',
			'regexp_error'		=> '{form}を半角英数字4文字以上で正しく入力してください',
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
		'zipcode_search' => array(
			'name'			=> '郵便番号検索',
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
 * ユーザ登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// user_hashの存在確認
		if(!$this->af->get('user_hash')){
			$this->ae->add(null, '', E_USER_REGIST_NO_USER_HASH);
			return 'user_regist';
		}
		
		// 郵便番号検索
		if($this->af->get('zipcode_search')){
			$um = $this->backend->getManager('Util');
			// 郵便番号から住所情報を取得する  0:郵便番号 1:都道府県名 2:市区 3:町村
			$address = $um->getAddressByZip($this->af->get('user_zipcode'));
			// 都道府県が文字列で帰ってくるので該当するprefecture_idに変換する
			$pref_array = $um->getAttrList(prefecture_id);
			foreach($pref_array as $k=>$v){
				if($v[name] == $address[1]){
					$this->af->set('prefecture_id',$k);
					break;
				}
			}
			// 市区町村名をセットする
			$this->af->set('user_address',$address[2].$address[3]);
			// 住所情報をセットして編集画面へ戻す
			return 'user_regist';
		}
		
		// 会員登録時のプロフィール必須項目の確認
		$profile_regist_required = $this->config->get('profile_regist_required');
		foreach($profile_regist_required as $k => $v){
			// プロフィールとして検証対象となっている場合
			if($k == 'user_birth_date'){
				$this->af->form[$k.'_year']['required'] = $v;
				$this->af->form[$k.'_month']['required'] = $v;
				$this->af->form[$k.'_day']['required'] = $v;
			}else{
				$this->af->form[$k]['required'] = $v;
			}
		}
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_regist';
		
		// ニックネームの絵文字制限
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add(null,'',E_USER_NICKNAME_EMOJI);
			return 'user_regist';
		}
		// ニックネームの文字数制限
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add(null,'',E_USER_NICKNAME_LENGTH);
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
				$this->ae->add(null, '', E_USER_BIRTHDAY_ERROR);
				return 'user_regist';
			}
		}else{
			$this->ae->add(null, '', E_USER_BIRTHDAY_ERROR);
			return 'user_regist';
		}
		
		// 年齢の確認（設定がある場合のみ実行）
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
						'歳未満の方は会員登録することができません。'
				);
				return 'user_regist';
			}
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
			'sql_where'		=> 'user_nickname = ?',
			'sql_values'	=> array($this->af->get('user_nickname')),
		);
		
		if(count($r) > 0){
			$this->ae->add(null, '', E_USER_NICKNAME_ALREADY_USED);
			return 'user_regist';
		}
		
		//携帯端末UIDを取得
		$user_uid = $um->getXuid();
		if(!$user_uid) $user_uid = '';
		if($this->config->get('mobile_only') && !$user_uid){
			$this->ae->add(null, '', E_USER_XUID);
			return 'user_regist';
		}
		
		// 同一XUIDで別会員登録がされていた場合レコードを削除する
		if($user_uid){
			$user = new Tv_User($this->backend, 'user_uid', $user_uid);
			if($user->isValid()){
				if($user->get('user_id') != $user_id){
					$user->remove();
				}
			}
		}
		// 会員登録処理
		$user = new Tv_User($this->backend, 'user_id', $user_id);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$user->set('user_status', 2);
		//$user->set('user_uid', $user_uid);
		// デバッグ用pcのため
		$user->set('user_uid', $user_uid ? $user_uid : $um->getRandomStr());
		// test data
//		$user->set('user_uid' , 'juw284kbm5guw2mc');
		
		// 携帯機種名
		$user->set('user_device', $um->getModel());
		
		// 生年月日
		$user->set('user_birth_date',
			sprintf(
				"%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			)
		);
		// プロフィール属性によって公開設定を更新する
		$profile_regist_public = $this->config->get('profile_regist_public');
		foreach($profile_regist_public as $k => $v){
			// プロフィールとして検証対象となっている場合
			if($v){
				// 非公開にチェックがあればパラメタは「0」
				// 非公開にチェックがなければパラメタはないので「1」で補う
				if($this->af->get("{$k}_public") == ''){
					$user->set("{$k}_public", 1);
				}
			}
		}
		// 更新
		$r = $user->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_REGIST_20);
 			return 'user_regist';
		}
		
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
						// ポイント付与しない 昔のデータがある場合はポイント付与はしない
						$no_point = true;
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
				'point'			=> intval($sns_info['site_regist_point']),
				'point_type'	=> $point_type_search['regist'],
				'point_status'	=> 2,// 承認済み
			);
			$pm->addPoint($param);
		}
		
		/* =============================================
		// 招待登録の場合の処理
		 ============================================= */
		if($invite_id){
			$im = $this->backend->getManager('Invite');
			$im->inviteRegist($invite_id, $no_point);
			
			// 招待情報を取得する
			$in = & new Tv_Invite($this->backend,'invite_id',$invite_id);
			// データがあれば
			if($in->isValid()){
				/* =============================================
				// 友達招待統計解析処理
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// 入会履歴をINSERT 0:mail 1:access 2:reg
				$sm->addStats('invite', $in->get('from_user_id'), 0, 2);
			}
		}
		
		/* =============================================
		// 入会経路経由の場合の処理
		 ============================================= */
		if($media_access_hash){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($media_access_hash, $no_point);
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
		
		/* =============================================
		// ユーザ履歴に登録
		 ============================================= */
		$timestamp = date('Y-m-d H:i:s');
		$uh = new Tv_UserHist($this->backend);
		$uh->set('user_id', $user_id);
		$uh->set('user_mailaddress', $user->get('user_mailaddress'));
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
		 * サンキューメール送信
		 */
		$m = new Tv_Mail($this->backend);
		$value = array ();
		$m->sendOne($user->get('user_mailaddress'), 'user_regist_finish', $value );
		 
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
			// 買い物かごの中に商品がある場合はセットする
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
					// 最新のカートハッシュを使用する
					$cart_hash = $r[0]['cart_hash'];
					if($cart_hash){
						// セッションに格納する
						$this->session->set('cart_hash', $cart_hash);
					}
				}
			}
			return 'user_regist_done';
		}
		//ログイン処理 end
	}
}
?>