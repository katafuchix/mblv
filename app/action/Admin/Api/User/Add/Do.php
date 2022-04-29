<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理APIユーザ登録編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminApiUserAddDo extends Tv_ActionForm
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
class Tv_Action_AdminApiUserAddDo extends Tv_ActionAdmin
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
		
		// メッセージ出力
		echo 'OK';
	}
}
?>