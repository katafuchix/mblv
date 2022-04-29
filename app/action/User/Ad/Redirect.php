<?php
/**
 * Redirect.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ広告リダイレクトアクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAdRedirect extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
		'user_hash' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'no_check' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ広告リダイレクトアクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
// 今回は外部からもアクセスが来るためセッションでの認証は解除する
//class Tv_Action_UserAdRedirect extends Tv_ActionUserOnly
class Tv_Action_UserAdRedirect extends Tv_ActionUser
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
		if($this->af->validate() > 0) return 'user_ad_list';
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
		$um = $this->backend->getManager('Util');
		$pm = $this->backend->getManager('Point');
		
		// 広告ID取得
		$ad_id = $this->af->get('ad_id');
		
		// タイムスタンプ生成
		$timestamp = date('Y-m-d H:i:s');
		
		/* =============================================
		// user_hashがある場合はここで認証
		 ============================================= */
		if($user_hash = $this->af->get('user_hash')){
			// ユーザ情報を取得する
			$o =& new Tv_User($this->backend,'user_hash',$user_hash);
			if($o->get('user_status') == 2){
				$user_id = $o->get('user_id');
			}
		}else{
			/* =============================================
			// セッションからユーザ情報を取得する
			 ============================================= */
			$user = $this->session->get('user');
			$user_id = $user['user_id'];
			$user_hash = $user['user_hash'];
			
//			/* =============================================
//			// もしユーザIDがない場合はログインするかそのまま進むか選択させる
//			 ============================================= */
//			if(!$user_id && !$this->af->get('no_check')){
//				return 'user_util_about-login';
//			}
			/* =============================================
			// 会員のみ処理
			 ============================================= */
//			if(!$this->af->get('no_check')){
			if($user_id){
				// ユーザ情報を取得する
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				$user_hash = $o->get('user_hash');
			}
		}
		
		/* =============================================
		// 広告データ取得
		 ============================================= */
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$ad_name = $a->get('ad_name');
		$ad_point = $a->get('ad_point');
		$ad_code_id = $a->get('ad_code_id');
		
		/* =============================================
		// アクセスキャリア別にURLを生成する
		 ============================================= */
		if($GLOBALS['EMOJIOBJ']->carrier=='AU'){
			$ad_url = $a->get('ad_url_a');
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='DOCOMO'){
			$ad_url = $a->get('ad_url_d');
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='SOFTBANK'){
			$ad_url = $a->get('ad_url_s');
		}else{
			$this->ae->add(null, '', E_USER_AD_PC);
			return 'user_error';
		}
		// 広告URLが空の場合
		if(!$ad_url){
			$this->ae->add(null, '', E_USER_AD_MOBILE);
			return 'user_error';
		}
		
		/* =============================================
		// 広告配信終了数確認
		 ============================================= */
		if( $a->get('ad_stock_status') == 1 ){
			// 配信終了数がに達した場合
			if( $a->get('ad_stock_num') == 0 ){
				$this->ae->add(null, '', E_ADMIN_AD_STOCK_OVER);
				return 'user_error';
			}
		}
		
		/* =============================================
		// 広告配信開始日時確認
		// 配信開始日時が来ていない場合
		 ============================================= */
		if ( $a->get('ad_start_status') == 1 ) {
			if ( $a->get('ad_start_time') >= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_AD_NOT_START);
				return 'user_error';
			}
		}
		
		/* =============================================
		// 広告配信終了日時確認
		// 配信終了日時を超えているの場合
		 ============================================= */
		if ( $a->get('ad_end_status') == 1 ) {
			if ( $a->get('ad_end_time') <= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_AD_OUT_OF_DATE);
				return 'user_error';
			}
		}
		
		/* =============================================
		// 会員のみ処理
		 ============================================= */
		if(!$this->af->get('no_check') && $user_id){
			/* =============================================
			// クリック広告の場合
			 ============================================= */
			if($a->get('ad_type') == 1){
				/* =============================================
				// 重複広告確認
				 ============================================= */
				$param = array(
					'sql_select'	=> ' user_ad_id ',
					'sql_from'		=> ' user_ad ',
					'sql_where'		=> 'user_id = ? AND ad_id  = ? AND user_ad_status <> ?',
					'sql_values'	=> array( $user_id, $ad_id, 0 ),
				);
				$ua_list = $um->dataQuery($param);
				
				/* =============================================
				// 広告ログ追加
				 ============================================= */
				$ua =& new Tv_UserAd($this->backend);
				$ua->set('user_id', $user_id);
				$ua->set('ad_id', $ad_id);
				$ua->set('user_ad_status', 2); // 承認済み
				$ua->set('user_ad_created_time', $timestamp);
				$ua->set('user_ad_updated_time', $timestamp);
				$r = $ua->add();
				// ユーザ広告ID
				$uaid = $ua->getId();
				
				// 重複がない場合
				if(count($ua_list) == 0){
					/* =============================================
					// 広告配信終了数設定がされていれば、-1
					 ============================================= */
					$a = new Tv_Ad($this->backend, 'ad_id', $ad_id);
					if($a->get('ad_stock_status')){
						$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
						$r = $a->update();
						if(Ethna::isError($r)) return 'user_ad_buy';
					}
					
					/* =============================================
					// ポイント追加系処理
					 ============================================= */
					$point_type_search = $this->config->get('point_type_search');
					$param = array(
						'user_id'	=> $user_id,
						'point'		=> $ad_point,
						'point_type'	=> $point_type_search['ad_click'],
						'point_status'	=> 2,// 承認済み
						'user_sub_id'	=> $uaid,
						'point_sub_id'	=> $ad_id,
						'point_memo'	=> $ad_name,
					);
					$pm->addPoint($param);
				}
			}
			// その他広告（登録、料率）の場合
			else{
				/* =============================================
				// 広告ログ追加
				 ============================================= */
				$ua =& new Tv_UserAd($this->backend);
				$ua->set('user_id', $user_id);
				$ua->set('ad_id', $ad_id);
				$ua->set('user_ad_status', 1); // 未承認
				$ua->set('user_ad_created_time', $timestamp);
				$ua->set('user_ad_updated_time', $timestamp);
				$r = $ua->add();
				// ユーザ広告ID
				$uaid = $ua->getId();
				
				// この次点では配信数カウントダウンは行わない
				
				/* =============================================
				// ポイント追加系処理
				 ============================================= */
				$point_type_search = $this->config->get('point_type_search');
				// ポイントタイプの決定
				if($a->get('ad_type') == 2){
					$point_type = $point_type_search['ad_regist'];
				}elseif($a->get('ad_type') == 3){
					$point_type = $point_type_search['ad_buy'];
				}
				$param = array(
					'user_id'	=> $user_id,
					'point'		=> 0,// この時点では0ポイント
					'point_type'	=> $point_type,// 登録広告または購買広告
					'point_status'	=> 1,// 未承認
					'user_sub_id'	=> $uaid,
					'point_sub_id'	=> $ad_id,
					'point_memo'	=> $ad_name,
				);
				$pm->addPoint($param);
			}
		}
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// クリック履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 2);
		
		/* =============================================
		// ASPごとにリダイレクト用のURLを生成する
		 ============================================= */
		$ac = new Tv_AdCode($this->backend, 'ad_code_id', $ad_code_id);
//		$ad_url = $um->addUrlParam($ad_url, $ac->get('ad_code_send_param'), $user_hash);
		$ad_url = $um->addUrlParam($ad_url, $ac->get('ad_code_send_param'), $uaid);
		
		// 広告先リダイレクト
		header('Location: ' . $ad_url);
		exit;
	}
}
?>