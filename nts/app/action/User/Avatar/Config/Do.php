<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター設定実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarConfigDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'first_avatar_id' => array(
			'name'		=> '1番目のｱﾊﾞﾀｰID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'second_avatar_id' => array(
			'name'		=> '2番目のｱﾊﾞﾀｰID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
	);
}
/**
 * ユーザアバター設定実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// 戻る
		if($this->af->get('back')) return 'user_avatar_config_first';
		// 検証エラー
		if($this->af->validate()>0) return 'user_avatar_config_first';
		return null;
	}
	
	function perform()
	{
		// アバター設定
		// セッション情報取得
		$sess = $this->session->get('user');
		
		// ユーザ情報を取得
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定履歴があるかどうか確認
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "既にｱﾊﾞﾀｰ初期設定が完了しています。");
			return 'user_error';
		}
		
		$timestamp = date("Y-m-d H:i:s");
		// 初回なので購入ポイント履歴は作成しない
		
		// 第1アバター購入
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('first_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// 着ている状態
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// 第1アバター配信終了数設定がされていれば、-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('first_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		// 第2アバター購入
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('second_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// 着ている状態
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// 第2アバター配信終了数設定がされていれば、-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('second_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		
		// セッション中のアバター買い物かご情報を消去
		$this->session->set('cart_avatar', '');
		
		// ユーザ情報を更新
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定履歴を更新
		$u->set('avatar_config_first', 1);
		
		$r = $u->update();
		// セッション情報を更新
		$this->session->set('user', $u->getNameObject());
		
		// アバター設定ありの入会経路の場合はここで本登録にする
		if($u->get('media_id')){
			// 入会経路情報の取得
			$m = & new Tv_Media($this->backend, 'media_id', $u->get('media_id'));
			// アバター設定がある場合はステータスを本登録にする
			if($m->get('media_avatar')){
				// ステータスを本登録へ
				$u->set('user_status', 2);
				$u->update();
				
				// 登録完了のメッセージ
				$this->ae->add(null, '', I_USER_REGIST_DONE);
				
				$um = $this->backend->getManager('Util');
				$pm =& $this->backend->getManager('Point');
				$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
				$user_id = $user->get('user_id');
				$user_mailaddress = $user->get('user_mailaddress');
				$invite_id = $user->get('invite_id');
				$media_access_hash = $user->get('media_access_hash');
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
				 * ログイン処理 ユーザー情報を更新しているので再度ログイン処理を行う
				 */
				$userManager =& $this->backend->getManager('User');
				$r = $userManager->login( $user->get('user_mailaddress'), $user->get('user_password') );
				// ログイン失敗
				if(!$r){
					$this->ae->add(null, '', E_USER_LOGIN);
					return 'user_index';
				}
			}
		} // 本登録処理終わり
		
		return 'user_avatar_config_done';
	}
}

?>
