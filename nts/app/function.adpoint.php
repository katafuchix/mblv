<?php
function smarty_function_adpoint($params, &$smarty)
{
	// オブジェクトを取得
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	
	/* =============================================
	// セッションからユーザ情報を取得する
	 ============================================= */
	$user = $backend->session->get('user');
	$user_id = $user['user_id'];
	
	/* =============================================
	// もしユーザIDがない場合
	 ============================================= */
	if(!$user_id) return '';
	
	$um = $backend->getManager('Util');
	$pm = $backend->getManager('Point');
	
	// 広告ID取得 [id_メッセージ]で来る
	//$ids = explode('_',$id[1]);
	$ad_id = $params['id'];
	$message = $params['message'];
	
	// タイムスタンプ生成
	$timestamp = date('Y-m-d H:i:s');
	
	/* =============================================
	// 広告データ取得
	 ============================================= */
	$a =& new Tv_Ad($backend, 'ad_id', $ad_id);
	$ad_name = $a->get('ad_name');
	$ad_point = $a->get('ad_point');
	$ad_code_id = $a->get('ad_code_id');
	
	/* =============================================
	// 広告配信終了数確認
	 ============================================= */
	if( $a->get('ad_stock_status') == 1 ){
		// 配信終了数がに達した場合
		if( $a->get('ad_stock_num') == 0 ){
			return '';
		}
	}
	
	/* =============================================
	// 広告配信開始日時確認
	// 配信開始日時が来ていない場合
	 ============================================= */
	if ( $a->get('ad_start_status') == 1 ) {
		if ( $a->get('ad_start_time') >= date('Y-m-d H:i:s') ) {
			return '';
		}
	}
	
	/* =============================================
	// 広告配信終了日時確認
	// 配信終了日時を超えているの場合
	 ============================================= */
	if ( $a->get('ad_end_status') == 1 ) {
		if ( $a->get('ad_end_time') <= date('Y-m-d H:i:s') ) {
			return '';
		}
	}
	
	/* =============================================
	// ポイント付与日設定をチェック
	 ============================================= */
	if ( $a->get('ad_point_give_day_status') == 1 ) {
		// 今日の日にちがポイント付与日に入っているか？
		// カンマ区切りの配列にしてその中に今日があるか
		$g_array = explode(",", $a->get('ad_point_give_day'));
		if(array_search(intval(date('d')), $g_array)!==false){ // 先頭0番目キーの時対策
			// OKなので何もしない
		}else{
			return '';
		}
	}
	
	/* =============================================
	// 重複広告確認
	 ============================================= */
	$ua =& new Tv_UserAd($backend);
	$ua_list =& $ua->searchProp(
		array('user_ad_id','user_ad_created_time'),
		array(
			'user_id'			=> $user_id,
			'ad_id'				=> $ad_id,
			'user_ad_status'	=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
		),
		array('user_ad_created_time' => OBJECT_SORT_DESC)
	);
	
	/* =============================================
	// ポイント重複付与制限設定をチェック
	 ============================================= */
	$term_flag = true;
	if ( $a->get('ad_point_give_term_status') == 1 && $ua_list[0]>0) {
		if( $ua_list[1][0]['user_ad_created_time']){
			// 本日日付から重複制限期間を引いた日付
			$period = mktime (0,0,0, date('m'), date('d') - $a->get('ad_point_give_term'), date('Y')  );
			// 上記で作成した日付と最後のポイント追加日を比較する
			if(date('Y-m-d 23:59:59',$period) < $ua_list[1][0]['user_ad_created_time']) {
				$term_flag = false;
			}
		}
	}
	
	// 重複がない場合 or 重複があっても設定期間外の場合
	if($ua_list[0] == 0 || $term_flag){
		/* =============================================
		// 広告配信終了数設定がされていれば、-1
		 ============================================= */
		$a = new Tv_Ad($backend, 'ad_id', $ad_id);
		if($a->get('ad_stock_status')){
			$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_ad_buy';
		}
		
		/* =============================================
		// 広告ログ追加
		 ============================================= */
		$ua->set('user_id', $user_id);
		$ua->set('ad_id', $ad_id);
		$ua->set('user_ad_status', 2); // 承認済み
		$ua->set('user_ad_created_time', $timestamp);
		$ua->set('user_ad_updated_time', $timestamp);
		$r = $ua->add();
		// ユーザ広告ID
		$uaid = $ua->getId();
		
		/* =============================================
		// ポイント追加系処理
		 ============================================= */
		$point_type_search = $backend->config->get('point_type_search');
		$param = array(
			'user_id'	=> $user_id,
			'point'		=> $ad_point,
			'point_type'	=> $point_type_search['site_access'],
			'point_status'	=> 2,// 承認済み
			'user_sub_id'	=> $uaid,
			'point_sub_id'	=> $ad_id,
			'point_memo'	=> $ad_name,
		);
		$pm->addPoint($param);
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// クリック履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		// ポイント追加がなされた場合のみメッセージを出力する
		$smarty->assign('message', $message);
		$smarty->display('user/ad-point.tpl');
	}
	
}

?>
