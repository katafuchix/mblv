<?php
require_once 'Net/IPv4.php';

class Tv_UtilManager extends Ethna_AppManager
{
	/**
	 * オプション選択
	 */
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
			// 年
			case 'year': 
				for($i = 2007;$i <= date('Y')+1;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 月
			case 'month': 
				for($i = 1;$i <= 12;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 日
			case 'day': 
				for($i = 1;$i <= 31;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 時
			case 'hour': 
				for($i = 0;$i <= 23;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 10分間隔
			case '10min': 
				for($i = 0;$i <= 50;$i=$i+10){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 性別
			case 'sex_type':
				$data = array(
					'0' => array('name' => '男女'),
					'1' => array('name' => '男のみ'),
					'2' => array('name' => '女のみ'),
				);
				return $data;
				break;
			// コミュニティカテゴリ
			case 'community_category':
				$cca = new Tv_CommunityCategory($this->backend);
				$result = $cca->searchProp(
					array('community_category_id', 'community_category_name'),
					array('community_category_status' => 1),
					array('community_category_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['community_category_id']] = array(
						'name' => $item['community_category_name'],
					);
				}
				$data = $data;
				break;
			// アバターカテゴリ
			case 'avatar_category':
				$a = new Tv_AvatarCategory($this->backend);
				$result = $a->searchProp(
					array('avatar_category_id', 'avatar_category_name'),
					array('avatar_category_status' => 1),
					array('avatar_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['avatar_category_id']] = array(
						'name' => $item['avatar_category_name'],
					);
				}
				break;
			// アバター台座
			case 'avatar_stand':
				$a = new Tv_AvatarStand($this->backend);
				$result = $a->searchProp(
					array('avatar_stand_id', 'avatar_stand_name'),
					array('avatar_stand_status' => 1),
					array('avatar_stand_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['avatar_stand_id']] = array(
						'name' => $item['avatar_stand_name'],
					);
				}
				return $data;
				break;
			// デコメールカテゴリ
			case 'decomail_category':
				$a = new Tv_DecomailCategory($this->backend);
				$result = $a->searchProp(
					array('decomail_category_id', 'decomail_category_name'),
					array('decomail_category_status' => 1),
					array('decomail_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['decomail_category_id']] = array(
						'name' => $item['decomail_category_name'],
					);
				}
				$data = $data;
				break;
			// ゲームカテゴリ
			case 'game_category':
				$a = new Tv_GameCategory($this->backend);
				$result = $a->searchProp(
					array('game_category_id', 'game_category_name'),
					array('game_category_status' => 1),
					array('game_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['game_category_id']] = array(
						'name' => $item['game_category_name'],
					);
				}
				break;
			// サウンドカテゴリ
			case 'sound_category':
				$a = new Tv_SoundCategory($this->backend);
				$result = $a->searchProp(
					array('sound_category_id', 'sound_category_name','sound_category_file1','sound_category_color'),
					array('sound_category_status' => 1),
					array('sound_category_priority_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['sound_category_id']] = array(
						'name' => $item['sound_category_name'],
						'sound_category_file1' => $item['sound_category_file1'],
						'sound_category_color' => $item['sound_category_color'],
						'sound_category_id' => $item['sound_category_id'],
					);
				}
				break;
			// 広告カテゴリ
			case 'ad_category':
				$ac =& new Tv_AdCategory($this->backend);
				$result = $ac->searchProp(
					array('ad_category_id', 'ad_category_name'),
					array('ad_category_status' => 1),
					array('ad_category_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['ad_category_id']] = array(
						'name' => $item['ad_category_name'],
					);
				}
				break;
			// 広告コード
			case 'ad_code':
				$o =& new Tv_AdCode($this->backend);
				$result = $o->searchProp(
					array('ad_code_id', 'ad_code_name'),
					array('ad_code_status' => 1),
					array('ad_code_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['ad_code_id']] = array(
						'name' => $item['ad_code_name'],
					);
				}
				break;
			// セグメント
			case 'segment':
				$o =& new Tv_Segment($this->backend);
				$result = $o->searchProp(
					array('segment_id', 'segment_name'),
					array('segment_status' => 1),
					array('segment_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['segment_id']] = array(
						'name' => $item['segment_name'],
					);
				}
				break;
			// メディア
			case 'media':
				$o =& new Tv_Media($this->backend);
				$result = $o->searchProp(
					array('media_id', 'media_name'),
					null,//array('media_status' => 1),
					array('media_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['media_id']] = array(
						'name' => $item['media_name'],
					);
				}
				break;
			// twitterカテゴリ
			case 'twitter_thema_category':
				$c =& new Tv_TwitterThemaCategory($this->backend);
				$result = $c->searchProp(
					array('twitter_thema_category_id', 'twitter_thema_category_name'),
					array('twitter_thema_category_status' => 1),
					array('twitter_thema_category_priority_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['twitter_thema_category_id']] = array(
						'name' => $item['twitter_thema_category_name'],
					);
				}
				break;
			// デフォルト
			default:
				$data = $this->config->get($attr_name);
		}
		if(count($data) > 0) return $data;
		return array(array('name' =>''));
	}
	
	/**
	* 設定ファイルに記述されたサーバの数だけ、指定したファイルをFTPアップロードする
	* @param
		dst_file
			アップロード先（ＦＴＰサーバ上）でのファイル名
			アップロードするローカルのファイル名と別名を指定可能
			絶対パスでも相対パスでも指定可能
			かならずFTPユーザの規定パスを確認すること
		src_file
			アップロードするローカルのファイル名
			絶対パスでも相対パスでも指定可能
	* @return 成功した場合に TRUE を、失敗した場合に FALSE を返します。 
	*/
	function ftpUpload($dst_file, $src_file)
	{
		// FTP接続情報取得
		if(!$ftp = $this->config->get('ftp')) return false;
		
		// サーバ数繰り返し
		foreach($ftp as $k => $server){
			// 自サーバにはアップしない
			$ip = $_SERVER['SERVER_ADDR'];
			$host = gethostbyaddr($ip);
			if(!$server['host'] || $ip == $server['host'] || $host == $server['host']){
				continue;
			}
			
			// 接続を確立する
			$conn_id = ftp_connect($server['host']); 
			
			// ユーザ名とパスワードでログインする
			$login_result = ftp_login($conn_id, $server['user'], $server['pass']); 
			
			// 接続できたか確認する
			if ((!$conn_id) || (!$login_result)) return false;
			// ファイルをアップロードする
			
			if(!ftp_put($conn_id, $dst_file, $src_file, FTP_BINARY)) return false;
			
			// パーミッションを設定する
			$chmod_cmd = "CHMOD 0777 {$dst_file}";
			ftp_site($conn_id, $chmod_cmd);
			
			// 接続を切る
			if(!ftp_close($conn_id)) return false;
		}
		
		// 正常終了
		return true;
	}
	
	/**
	 * 指定時間前の日時を返却する
	 * @param
		$type
			year,month,day,hour
		$pre 
			数字で指定する -1など
		date("Y-m-d H",$this->getPreDate('day',-1)) // 昨日の日付
		date("Y-m-d H",$this->getPreDate('hour',-1)); // 1時間前の日付
	*/
	function getPreDate($term,$pre)
	{
		$now = time();
		$preDate = "";
		switch($term)
		{
			case 'year':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
			case 'month':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now)+$pre,date("d",$now),date("Y",$now));
				break;
			case 'day':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now)+$pre,date("Y",$now));
				break;
			case 'hour':
				$preDate = mktime(date("H",$now)+$pre,date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now));
				break;
			default:
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
		}		
	    return $preDate;
	}
	
	/**
	 * 指定年月週の開始日と終了日を取得する
	 */
	function getDayOfWeekRange($year, $month, $weekno)
	{
		// 指定月1日の曜日（0:日曜日,6:土曜日）
		$one_w = date("w", mktime(0, 0, 0, $month , 1, $year ));
		// 1週目の日数
		if($one_w == 0){
			$one_week_count = 1;
		}else{
			$one_week_count = 8 - $one_w;
		}
		// 1週目以外の場合、1週目の日数を加算する
		if($weekno > 1){
			$start_day = $one_week_count;
			$end_day = $one_week_count;
			// 集計開始日の決定
			$start_day += 7 * ($weekno-2) +1;
			// 集計終了日の決定
			$end_day += 7 * ($weekno-1);
			// 月末にまたがる場合の計算
			$last_day = date("d", mktime(0, 0, 0, $month + 1 , 0, $year ) );
			// 集計終了日が翌月になる場合は月末日に差し替える
			if($end_day > $last_day ) $end_day = $last_day;
		}
		// 1週目の場合、1週目の最終日は、1日から適宜7日間より短くなる可能性がある
		else{
			// 集計開始日の決定
			$start_day = 1;
			// 集計終了日の決定
			$end_day = $one_week_count;
		}
		
		return array($start_day, $end_day);
	}
	
	/**
	 * URLにパラメタを付与する
	 */
	function addUrlParam($url, $key, $value)
	{
		// URLが「?」を含む場合は「&」を付与する
		if(strstr($url, '?')){
			$url .= "&{$key}={$value}";
		}else{
			$url .= "?{$key}={$value}";
		}
		return $url;
	}
	
	/**
	 * 日時形式を分解して所定の形式でアクションフォームにアサインする
	 */
	function setSepTime($af, $time, $key)
	{
		// 日時を前半と後半に分割
		$t = explode(" ", $time);
		// 前半を分割
		$d1 = explode("-", $t[0]);
		// 年
		$af->set($key . '_year', sprintf("%04d", $d1[0]));
		// 月
		$af->set($key . '_month', sprintf("%01d", $d1[1]));
		// 日
		$af->set($key . '_day', sprintf("%01d", $d1[2]));
		// 後半を分割
		$d2 = explode(":", $t[1]);
		// 時
		$af->set($key . '_hour', sprintf("%01d", $d2[0]));
		// 分
		$af->set($key . '_min', sprintf("%01d", $d2[1]));
		// 秒
		$af->set($key . '_sec', sprintf("%01d", $d2[2]));
		
		return $af;
	}
	
	/**
	 * 基本変換タグ情報を返す
	 */
	function getBaseTags()
	{
		$sns_info = $this->config->get('sns_info');
		return array(
			'login_url'		=> $this->config->get('login_url'),
			'sns_name'		=> $sns_info['sns_name'],
			'support_mailaddress'	=> $this->config->get('support_mailaddress'),
		);
	}
	
	/*
	 * 広告タグを変換する
	 *
	 */
	function replaceAdTag($body, $user_hash)
	{
		// [cut]ad:\d[cut]を探して広告URLを生成して、最後にuser_hashを追加する
		$cut = $this->config->get('tag_cut');
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = $this->config->get('user_url') . "ad.php?ad_id=\\1&user_hash=" . $user_hash;
		$body = preg_replace($search, $replace, $body);
		return $body;
	}
	
	/**
	 * コンテンツ本文変換
	 * 
	 */
	function convertHtml($html)
	{
		$cut = $this->config->get('tag_cut');
		
		// ファイルURLタグ変換
		$search = "/{$cut}file(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'f.php?type=file&id=\' . $id[1] . \'\';'), $html);
		
		// アバターURLタグ変換
		$search = "/{$cut}avatar(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_avatar_buy=true&avatar_id=\' . $id[1] . \'\';'), $html);
		
		// デコメールURLタグ変換
		$search = "/{$cut}decomail(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// デコメールダウンロードタグ変換
		$search = "/{$cut}decomail_dl(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy_do=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// ゲームURLタグ変換
		$search = "/{$cut}game(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_game_buy=true&game_id=\' . $id[1] . \'\';'), $html);
		
		// サウンドURLタグ変換
		$search = "/{$cut}sound(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_sound_buy=true&sound_id=\' . $id[1] . \'\';'), $html);
		
		// [id]フリーページURLタグ変換
		$search = "/{$cut}fp(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&contents_id=\' . $id[1] . \'\';'), $html);
		
		// [code]フリーページURLタグ変換
		$search = "/{$cut}fp\[(.*)\]{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&code=\' . $id[1] . \'\';'), $html);
		
		// コミュニティURLタグ変換
		$search = "/{$cut}community(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_community_view=true&community_id=\' . $id[1] . \'\';'), $html);
		
		// TOPURLタグ変換
		$search = "/{$cut}top{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_top=true\';'), $html);
		
		// マイページURLタグ変換
		$search = "/{$cut}home{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_home=true\';'), $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = "ad.php?ad_id=\\1";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAd($id);'), $html);
//		$html = preg_replace($search, $replace, $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad_banner(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad_banner\((.*?)\){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// 会員登録メールアドレスタグ変換
		$search = "/{$cut}regist_mailaddress{$cut}/";
		$mail_account = $this->config->get('mail_account');
		$media_access_hash = $this->session->get('media_access_hash');
		$replace = $mail_account['regist']['account'] . "_" . $media_access_hash . "@" . $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// メールドメインタグ変換
		$search = "/{$cut}mail_domain{$cut}/";
		$replace = $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// ニュースタイトルタグ変換
		$search = "/{$cut}news(\d+)_title{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'title\', $id);'), $html);
		
		// ニュースURLタグ変換
		$search = "/{$cut}news(\d+)_url{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'url\', $id);'), $html);
		
		// point_ad変換
		$search = "/{$cut}point_ad(.*){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdPoint($id);'), $html);
		
		return $html;
	}
	
	/**
	 * ニュースタグ置換用内部関数
	 */
	function _callbackNews($type, $id)
	{
		if(!$id[1]) return ;
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$um = $backend->getManager('Util');
		// 取得件数位置計算
		$sqlLimit = $id[1] -1 . ',1';
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
//			'sql_order'		=> "news_id DESC LIMIT {$sqlLimit}",
			'sql_order'		=> "news_start_time DESC LIMIT {$sqlLimit}",
		);
		$r = $um->dataQuery($param);
		if(count($r) == 1){
			// タイトルの場合
			if($type=='title'){
				return $r[0]['news_title'];
			}
			// URLの場合
			elseif($type=='url'){
				return "?action_user_news_view=true&news_id={$r[0]['news_id']}";
			}
		}
		return '';
	}
	
	/**
	 * 広告タグ置換用内部関数
	 */
	function _callbackAd($id)
	{
		if(!$id[1]) return ;
		$ad_id = $id[1];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$html = "ad.php?ad_id={$ad_id}";
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// 閲覧履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * 広告バナータグ置換用内部関数
	 */
	function _callbackAdBanner($id)
	{
		if(!$id[1]) return ;
		// 今回表示する広告を取得する
		$b = explode(',', $id[1]);
		srand((float) microtime() * 10000000);
		$rand_key = array_rand($b);
		$ad_id = $b[$rand_key];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$a = new Tv_Ad($backend, 'ad_id', $ad_id);
		if(!$a->isValid()) return '';
		$html = "<a href=\"ad.php?ad_id={$ad_id}\">";
		// 画像があれば画像バナー
		if($a->get('ad_image')){
			
			$html .= "<img src=\"f.php?file=ad/{$a->get('ad_image')}\">";
		}else{
			$html .= $a->get('ad_desc');
		}
		$html .= "</a>";
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// 閲覧履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * 広告ポイント追加関数
	 */
	function _callbackAdPoint($id)
	{
		if(!$id[1]) return ;
		
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
		$ids = explode('_',$id[1]);
		$ad_id = $ids[0];
		$message = $ids[1];
		
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
		if($ua_list[0] == 0 || $term_flag ){
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
			
			return $message;
		}
		
	}
	
	/**
	 * 開始と終了の間にあるものを取得する
	 */
	function between($beg, $end, $str)
	{
		$ret_array = array();
		$array = explode($beg,$str);
		foreach($array as $item) {
			$pos = strpos($item,$end);
			if( false !== $pos ) {
				$ret_array[] = substr($item,0,$pos);
			}
		}
		return( $ret_array );
	}
	
	/**
	 * ページング処理用条件生成
	 * SQL実行時の条件設定
	 * ListViewClassのgetCondition ト同じ
	 */
	 function getDataCondition($condition)
	 {
	 	 // 初期化
	 	 $sqlWhere = "";
	 	 $sqlValues = array();
	 	// 処理
	 	foreach($condition as $key => $value){
	 		// 種別がない場合はイコール扱いで処理
			if(!array_key_exists('type', $value)){
				$type = 'EQ';
			}else{
				$type = $value['type'];
			}
			// カラム省略
			if(!array_key_exists('column', $value)){
				$column = $key;
			}else{
				$column = $value['column'];
			}
		 	// 条件種別を特定
		 	switch($type){
		 		// イコールの場合
		 		case 'EQ':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' = ?';
						$sqlValues[] = $this->af->get($key);
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ライクの場合
		 		case 'LIKE':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' LIKE ?';
						$sqlValues[] = "%%" . $this->af->get($key) . "%%";
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 期間の場合
		 		case 'PERIOD':
		 			// 開始
					if($this->af->get($key . '_year_start') != '' && $this->af->get($key . '_month_start') != '' && $this->af->get($key . '_day_start') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_start = sprintf("%04d-%02d-%02d 00:00:00", $this->af->get($key . '_year_start'), $this->af->get($key . '_month_start'), $this->af->get($key . '_day_start'));
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $date_start;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 終了
					if($this->af->get($key . '_year_end') != '' && $this->af->get($key . '_month_end') != '' && $this->af->get($key . '_day_end') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_end = sprintf("%04d-%02d-%02d 23:59:59", $this->af->get($key . '_year_end'),$this->af->get($key . '_month_end'), $this->af->get($key . '_day_end'));
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $date_end;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		/**
		 		 * 範囲の場合
		 		 * @param [キー]_min, [キー]_minに対応するフォーム値を元にSQLを生成
		 		 */
		 		case 'RANGE':
					// 最小
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $this->af->get($key . '_min');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 最大
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $this->af->get($key . '_max');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 年齢の場合
				case 'AGE':
					$today = getdate(); // 日付取得
					// 年齢（最小）
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$maxBirthDate = sprintf(
							"%04d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_min'),
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $maxBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 年齢（最大）
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$minBirthDate = sprintf(
							"%d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_max') - 1,
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $minBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 正規表現の場合
		 		case 'REGEXP':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' (' .$column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?)';
						
						$sqlValues[] = $this->af->get($key);
						$sqlValues[] = '^' . $this->af->get($key) . ',';
						$sqlValues[] = ',' . $this->af->get($key) . '$';
						$sqlValues[] = ',' . $this->af->get($key) . ',';
						
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 複合選択の場合
		 		case 'IN':
		 			
		 			
		 		break;
		 	}
		}
		return array($sqlWhere, $sqlValues);
	 }
	
	/**
	 * SQLラッパー関数
	 @param
	 	db_key				dsnの種別
		sql_select			クエリで指定するselectブロック
		sql_from			クエリで指定するfromブロック
		sql_where			クエリで指定するwhereブロック
		sql_values			クエリで指定するプレース値
		sql_order			クエリで指定するorderブロック
		sql_group			クエリで指定するgroupブロック
		sql_num			１ページに何件のデータを表示させるか
	@return
		pageData 結果配列
	 */
	function dataQuery($listview)
	{
		// 最低限必要な条件
		if(is_array($listview) && array_key_exists('sql_select',$listview ) && array_key_exists('sql_from', $listview)){
			// パラメタを取得する
			// 必須でないパラメタ
			$db_key = "";
			$sqlOrder = "";
			$sqlGroup = "";
			$sqlWhere = "";
			$sqlValues = array();
			if(array_key_exists('db_key', $listview)) $db_key = $listview['db_key'];
			if(array_key_exists('sql_order', $listview)) $sqlOrder = $listview['sql_order'];
			if(array_key_exists('sql_group', $listview)) $sqlGroup = $listview['sql_group'];
			if(array_key_exists('sql_where', $listview)) $sqlWhere = $listview['sql_where'];
			if(array_key_exists('sql_values', $listview)) $sqlValues = $listview['sql_values'];
			if(array_key_exists('sql_num', $listview)) $sqlNum = $listview['sql_num'];
			// 必須のパラメタ
			$sqlSelect		= $listview['sql_select'];
			$sqlFrom		= $listview['sql_from'];
			
			// ベースクエリの生成
			$dataQuery = "SELECT {$sqlSelect} FROM {$sqlFrom}";
			// whereブロックの指定
			if($sqlWhere){
				$dataQuery .= " WHERE {$sqlWhere}";
			}
			// groupブロックの指定
			if($sqlGroup){
				$dataQuery .=  " GROUP by {$sqlGroup}";
			}
			// orderブロックの指定
			if($sqlOrder){
				$dataQuery .=  " ORDER by {$sqlOrder}";
			}
			// 取得件数ブロックの指定
			if($sqlNum) $dataQuery .= " LIMIT {$sqlNum}";
			
			// 表示データを取得
			$db	=& $this->backend->getDB($db_key);
			//$db	=& $this->backend->getDB();
			$pageData = $db->db->getAll($dataQuery, $sqlValues, DB_FETCHMODE_ASSOC);
//echo $dataQuery.'<br>';
//print_r($sqlValues);
//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//	foreach($this->backend->db_list as $a) $this->trace($a->db->last_query);
//echo "\n";
//print $dataQuery;
//if(Ethna::isError($pageData)) print $pageData->getDebugInfo();
			
			return $pageData;
		}else{
 			return array();
 		}
	}
	
	/**
	 * 文字列をキャメライズする
	 * 
	 */
	function camelize ($str)
	{
		return str_replace(' ','',ucwords(str_replace('_',' ',$str)));
	}
	
	/**
	 * ポイントオンへのID認証リクエスト
	 */
	function ponIdRequest()
	{
		// ユーザ情報の取得
		$sess = $this->session->get('user');
		
		// penparamの生成
		return ID_Request_MAKE('New', $this->config->get('pon_siteid'), $sess['user_hash'], $this->config->get('pon_return_url'), $this->config->get('pon_regist_key'));
	}
	
	/**
	 * ポイントオンからのID認証受信
	 */
	function ponIdReceive()
	{
		$RegistKey = $this->config->get('pon_regist_key');
		$PENParam = $_POST['penparam'];
		$FreeParam1 = $_POST['p1'];
		$FreeParam2 = $_POST['p2'];
		$FreeParam3 = $_POST['p3'];
		$ReturnArray = ID_Response_GET($PENParam, $RegistKey);
		$RegisterType = $ReturnArray['RegisterType'];
		$SiteID = $ReturnArray['SiteID'];
		$Account = $ReturnArray['Account'];
		$PENAccount = $ReturnArray['PENAccount'];
		$State = $ReturnArray['State'];
		$LocalState = $ReturnArray['LocalState'];
		//$LocalState のチェック （電文が改ざんされていないか）
		if (strtoupper($LocalState) == 'SUCCESS') {
			//$Stateの値からポイントオンの処理結果をチェック
			if (strtoupper($State) == 'SUCCESS') {
				//ID認証完了の処理を実装
				$timestamp = date("Y-m-d H:i:s");
				$p = new Tv_PonId($this->backend);
				$p->set('user_hash', $Account);
				$p->set('pon_user_hash', $PENAccount);
				$p->set('pon_id_status', 3);
				$p->set('pon_id_result', $State);
				$p->set('pon_id_regist_time', $timestamp);
				$p->set('pon_id_update_time', $timestamp);
				$r = $p->add();
			}else{
				//エラー処理 (戻り値: reject もしくは system_internal_error)
				return false;
			}
		}else{
			//エラー処理 (戻り値: cert_fail)
			return false;
		}
		return true;
	}
	
	/**
	 * ポイントオンへのポイント交換リクエスト
	 */
	function ponPointRequest()
	{
		// ユーザ情報の取得
		$sess = $this->session->get('user');
		$Account = $sess['user_hash'];
		
		$SiteID = $this->config->get('pon_siteid');
		$trn_id = $this->af->get('pon_point_id');
		$point = $this->af->get('pon_point');
		$RegistKey = $this->config->get('pon_regist_key');
		$ProcessID = 1;
		$PostURL = $this->config->get('pon_point_url');
		# ポイントの凍結をここに記載（重要）
		#既に凍結済み
		
		# ポイント交換リクエスト電文の作成
		$PENParam = Point_Trans_Request_MAKE($trn_id, $ProcessID, $SiteID, $Account, $point, $RegistKey);
		# ポイント交換リクエスト電文をPOST／戻り値の取得
		$ReturnArray = Point_Request_POST($PENParam, $PostURL, $RegistKey);
		# ポイントオンから返送された戻り値の連想配列→変数へ代入
		$MessageType = $ReturnArray["MessageType"];
		$TransactionID = $ReturnArray["TransactionID"];
		$ProcessID = $ReturnArray["ProcessID"];
		$SiteID = $ReturnArray["SiteID"];
		$ResponseDate = $ReturnArray["Date"];
		$State = $ReturnArray["State"];
		$LocalState = $ReturnArray['LocalState'];
		if ( strtoupper($LocalState) == 'ACCEPT') {
			if (strtoupper($State) == 'ACCEPT') {
				# 正常終了のため凍結ポイントの交換完了処理実施
				return array($TransactionID, $ProcessID);
			} else {
				# ポイントオンにて受理できなかったためポイントを差し戻す
				return false;
			}
		} else if (strtoupper($LocalState) == 'SOCKET_TIMEOUT') {
			# ポイントオンにてソケットタイムアウト発生のため、ポイント交換確認リクエストを送信する
			return false;
		} else if (strtoupper($LocalState) == 'SOCKET_ERROR') {
			# ソケットコネクション不良のためポイントを差し戻す
			return false;
		} else {
			# その他のエラーのため凍結ポイントはそのまま凍結状態とする
			return false;
		}
		return false;
	}
	
	/**
	 * 年齢から誕生日を生成する
	 */
	function getBirthday($age)
	{
		$ty = date("Y");
		$tm = date("m");
		$td = date("d");
		$by = $ty - $age;
		$birth['under'] = date("Y-m-d",mktime(0,0,0,$tm,$td+1,$by-1));
		$birth['over'] = date("Y-m-d",mktime(0,0,0,$tm,$td,$by));
		return $birth;
	}
	
	/**
	 *  年齢を取得する
	 *
	 *  @access	private
	 *  @param	birth_date	string	生年月日
	 */
	function getAge($birth_date)
	{
		$ty = date('Y');
		$tm = date('m');
		$td = date('d');
		list($by, $bm, $bd) = explode('-', $birth_date);
		$age = $ty - $by;
		if($tm * 100 + $td < $bm * 100 + $bd){
			$age--;
		}
		return $age;
	}
	
	/**
	 *  星座を取得する
	 *
	 *  @access	private
	 *  @param	birth_date	string	生年月日
	 */
	function _getZodiacSign($birth_date)
	{
		list($y, $m, $d) = explode('-', $birth_date);
		$birthday = $m * 100 + $d;
		if(120 <= $birthday && $birthday <= 218){
			return '水瓶座';
		} elseif(219 <= $birthday && $birthday <= 320){
			return '魚座';
		} elseif(321 <= $birthday && $birthday <= 419){
			return '牡羊座';
		} elseif(420 <= $birthday && $birthday <= 520){
			return '牡牛座';
		} elseif(521 <= $birthday && $birthday <= 621){
			return '双子座';
		} elseif(622 <= $birthday && $birthday <= 722){
			return '蟹座';
		} elseif(723 <= $birthday && $birthday <= 822){
			return '獅子座';
		} elseif(823 <= $birthday && $birthday <= 922){
			return '乙女座';
		} elseif(923 <= $birthday && $birthday <= 1023){
			return '天秤座';
		} elseif(1024 <= $birthday && $birthday <= 1121){
			return '蠍座';
		} elseif(1122 <= $birthday && $birthday <= 1221){
			return '射手座';
		} else {
			return '山羊座';
		}
	}
	
	/**
	 * ファイルをアップロード
	 * 
	 * @access public 
	 * @param string $f ファイルデータ
	 * @param string $dir 別途指定したいアップロードディレクトリ
	 * @return integer true/false
	 */
	function uploadFile($f, $dir="")
	{
		// ファイルが届いていない場合エラー
		if($f['error'] == UPLOAD_ERR_NO_FILE || $f == null){
			return false;
		}
		
		// ファイル名生成
		list($prev, $ext) = $this->extractName($f['name']);
		// 重複しないようなファイル名を生成
		$token = time() . substr(md5(microtime()), 0, rand(5, 12));
		$filename = $token . '.' . strtolower($ext);
		// オリジナルファイルをアップロード
		$path = $filename;
		if($dir) $path = "{$dir}/{$filename}";
		$original_file_path = $this->config->get('file_path') . $path;
		$r = copy($f['tmp_name'], $original_file_path);
		chmod($original_file_path, 0755);
		// 画像のアップロードに失敗した場合
		if(!$r) return false;
		
		// 負荷分散対応で複数サーバにアップロード
		$this->ftpUpload($path, $original_file_path);
		
		return $filename;
	}
	
	/**
	 * 画像サムネイルをアップロードする
	 * 
	 * @access private 
	 * @param string $imagePath ,$article_id,$article_image_id
	 * @param string $file 
	 * @return $filename
	 */
	function uploadSumImage($imagePath, $file, $article_id, $article_image_id)
	{
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = null;
		}else{ 
			// ファイル名作成
			$filename = sprintf("%06d_s%01d", $article_id, $article_image_id) . ".jpg"; 
			// サイズを所得
			list($size_x, $size_y) = getimagesize($file['tmp_name']);
			if($size_x > 120){ 
				// サムネールサイズを決定
				$sam_x = 120;
				$sam_y = ($sam_x * $size_y) / $size_x; 
				// サムネールサイズ用に作成
				$main_img = @imagecreatefromjpeg($file['tmp_name']); 
				// サムネールサイズに縮小
				$sub_img = imagecreatetruecolor($sam_x, $sam_y);
				imagecopyresized($sub_img, $main_img, 0, 0, 0, 0, $sam_x, $sam_y, $size_x, $size_y);
				imagejpeg($sub_img, "$imagePath$filename", 100);
				imagedestroy($sub_img);
				imagedestroy($main_img);
			}else{
				$ret = copy($file['tmp_name'], "$imagePath$filename");
			}
		}
		return $filename;
	}

	/**
	 * ファイルフォームでアップロードした画像を正式な場所へコピーする
	 * 
	 * @access private 
	 * @param string $imagePath 
	 * @param string $file 
	 * @return $filename
	 */
	function copyImage($imagePath, $file)
	{
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = null;
		}else{
			list($prev, $ext) = $this->extractName($file['name']);
			$num = 0;
			while(file_exists($imagePath . $prev . $num . "." . $ext)){
				$num++;
			}
			$filename = $prev . $num . "." . $ext;
			$ret = copy($file['tmp_name'], "$imagePath$filename");
		}
		return $filename;
	}

	/**
	 * カラーリストを取得する
	 * 
	 * @access public 
	 * @return string $colorList
	 */
	function getColorList()
	{
		$colorList = array('' => array('name' => '▼未選択'),
			'#0000FF' => array('name' => '青色'),
			'#66CCFF' => array('name' => '濃い水色'),
			'#00FFFF' => array('name' => '水色'),
			'#6600CC' => array('name' => '紺色'),
			'#666699' => array('name' => '青紫色'),
			'#993399' => array('name' => '紫色'),
			'#DA70D6' => array('name' => '薄紫色'),
			'#CC0099' => array('name' => '赤紫色'),
			'#FFEEEE' => array('name' => '薄ﾋﾟﾝｸ色'),
			'#FFC0E0' => array('name' => 'ﾋﾟﾝｸ色'),
			'#FF60B0' => array('name' => 'ﾎｯﾄﾋﾟﾝｸ'),
			'#FF0000' => array('name' => '赤色'),
			'#EE0000' => array('name' => '赤茶色'),
			'#996600' => array('name' => '茶色'),
			'#990000' => array('name' => 'こげ茶色'),
			'#FFD700' => array('name' => '黄茶色'),
			'#AAAA00' => array('name' => 'ｵﾚﾝｼﾞ色'),
			'#66CCFF' => array('name' => 'ｶｰｷ色'),
			'#F5F5DC' => array('name' => 'ﾍﾞｰｼﾞｭ色'),
			'#FFFF00' => array('name' => '黄色'),
			'#FFFFBB' => array('name' => '薄黄色'),
			'#00FF00' => array('name' => '黄緑色'),
			'#66CC00' => array('name' => '緑色'),
			'#808000' => array('name' => 'ｵﾘｰﾌﾞ色'),
			'#669900' => array('name' => '深緑色'),
			'#999999' => array('name' => '灰色'),
			'#CCCCCC' => array('name' => '銀色'),
			'#3388BB' => array('name' => '青灰色'),
			'#777777' => array('name' => '黒灰色'),
			'#000000' => array('name' => '黒色'),
			'#FFFFFF' => array('name' => '白'),
			);
		return $colorList;
	}

	/**
	 * 乱数を発生させる
	 * 
	 * @access public 
	 * @param string $codeLength 乱数の長さ
	 * @param string $codeType 乱数の文字型
	 * @return string $checkCode	   乱数
	 */
	function getRandamCode($codeLength = 8, $codeType = "alphanum")
	{
		$codeData = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
			'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
			'U', 'V', 'W', 'X', 'Y', 'Z',
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
			'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
			'u', 'v', 'w', 'x', 'y', 'z'
			); 
		// 確認用コードをランダムで生成
		if (!is_numeric($codeLength) || $codeLength < 1){
			$codeLength = 8;
		}
		mt_srand();
		$checkCode = "";
		for ($i = 0; $i < $codeLength; $i++){
			$cnt = mt_rand(0, count($codeData) - 1);
			$checkCode .= $codeData[$cnt];
		}
		if ($codeType == "smallal"){
			$checkCode = strtolower($checkCode);
		}elseif ($codeType == "biglal"){
			$checkCode = strtoupper($checkCode);
		}
		return $checkCode;
	}
	
	/**
	 * ユニークなIDを発行する
	 *
	 */
	function getUniqId()
	{
		// サーバごとにユニークなIDにする必要はない場合
		return uniqid();
	}
	
	/**
	 * UserAgent の値からキャリア情報を判別する
	 * return a[au],d[docomo],s[softbank],o[その他]
	 */
	function getMobileType()
	{
		$ua = $_SERVER['HTTP_USER_AGENT'];
		$type = "o"; 
		// DoCoMo
		if (!strncmp($ua, 'DoCoMo', 6)){
			$type = "d";
		} 
		// Vodafone(PDC)
		elseif (!strncmp($ua, 'J-PHONE', 7)){
			$type = "s";
		} 
		// Vodafone(3G)
		// * Up.Browser を搭載しているものがある(auより先に評価)
		elseif (!strncmp($ua, 'Vodafone', 8) || !strncmp($ua, 'MOT', 3)){
			$type = "s";
		} 
		// SoftBank
		elseif (!strncmp($ua, 'SoftBank', 8)){
			$type = "s";
		} 
		// au
		elseif (!strncmp($ua, 'KDDI', 4) || !strncasecmp($ua, 'up.browser', 10)){
			$type = "a";
		} 
		// WILLCOM / DDIPOCKET
		elseif (strpos($ua, 'WILLCOM') !== false || strpos($ua, 'SHARP/WS') !== false || strpos($ua, 'DDIPOCKET') !== false){
			$type = "o";
		}else{
			$type = "o";
		}

		return $type;
	}

	/**
	 * sendRequest
	 * アフィリエイトの成果を送信
	 */
	function sendRequest($session_id, $user_info)
	{
		$advertisement_id = 'kc51716';
		$host = 'smart-c.jp';
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$port = 80;
		$path = '/gateway/action.cgi';
		return @join('', @file("http://$host:$port$path?i=$advertisement_id&s=$session_id&u=$user_info"));
	}

	/**
	 * ファイル名を拡張子に分解
	 * 
	 * @access private 
	 * @param string $filename 
	 * @return $string $file
	 * @return $string $ext
	 */
	function extractName($filename)
	{
		$pos = strrpos($filename, ".");
		if(!$pos){
			return array($filename, "");
		}
		$file = substr($filename, 0, $pos);
		$ext = substr($filename, $pos + 1);
		return array($file, $ext);
	}

	/**
	 * 記事画像をアップロードする
	 * 
	 * @access private 
	 * @param string $imagePath ,$article_id,$article_image_id
	 * @param string $file 
	 * @return $filename
	 */
	function uploadArticleImage($imagePath, $file, $article_id, $article_image_id)
	{
		$filename = "";
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = "";
		}else{
			list($prev, $ext) = $this->extractName($file['name']);
			// $num = 0;
			// while(file_exists($imagePath . $prev . $num .  "." . $ext)){
			// $num++;
			// }
			// $filename = $prev . $num . "." . $ext;
			$filename = sprintf("%06d_%01d", $article_id, $article_image_id) . ".jpg";
			$ret = copy($file['tmp_name'], "$imagePath$filename");
		}
		return $filename;
	}
	
	/**
	 * 処理 指定年・月の最終日を返す。
	 * 
	 * @param int $year 
	 * @param int $month 
	 * @return 指定年・月の最終日
	 */
	function getDayCount($year, $month)
	{
		for ($day = 31; $day >= 28; $day--){
			if (checkdate($month, $day, $year)){
				break;
			}
		}
		return $day;
	}
	
	/**
	 * IPアドレスによってauかどうかを判別
	 * 
	 * @return au ならtrue
	 */
	function isAu()
	{
		$ipList = $this->config->get('ip_au');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IPアドレスによってDoCoMoかどうかを判別
	 * 
	 * @return DoCoMo ならtrue
	 */
	function isDocomo()
	{
		$ipList = $this->config->get('ip_docomo');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IPアドレスによってSoftBankかどうかを判別
	 * 
	 * @return SoftBank ならtrue
	 */
	function isSoftbank()
	{
		$ipList = $this->config->get('ip_softbank');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IPアドレスによってWillcomかどうかを判別
	 * 
	 * @return Willcom ならtrue
	 */
	function isWillcom()
	{
		$ipList = $this->config->get('ip_willcom');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * 端末のXUIDを返す
	 * 
	 * @return XUID
	 */
	function getXuid()
	{
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		// DOCOMO
		if ($user_agent[0] == 'DoCoMo'){
			$uid = $_SERVER['HTTP_X_DCMGUID'];
		}
		// AU
		elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){
			$uid = $_SERVER['HTTP_X_UP_SUBNO'];
		}
		// SOFTBANK
		elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){
			$uid = $_SERVER['HTTP_X_JPHONE_UID'];
		}
		return $uid;
	}
	
	/**
	 * 端末のデバイス情報を返す
	 * 
	 * @return MODEL
	 */
	function getModel()
	{
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		// DOCOMO
		if ($user_agent[0] == 'DoCoMo'){
				$pattern = "/^DoCoMo\/[0-9\.]*[ \/]([0-9a-zA-Z\+]+)/i";
				$key = 1;
		}
		// AU
		elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){ 
			$pattern = "/^(KDDI-|UP\.Browser\/[0-9\.]+-)([0-9a-zA-Z\+]+)/i";
			$key = 2;
		}
		// SOFTBANK
		elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){ 
			$pattern = "/^(MOT-|Vodafone\/[0-9\.]+\/V|J-PHONE\/[0-9\.]+\/|Vodafone\/[0-9\.]+\/|SoftBank\/[0-9\.]+\/)([0-9a-zA-Z\+]+)/i";
			$key = 2;
		}else{
			return '';
		}
		// 端末情報を取得
		if(preg_match($pattern, $_SERVER['HTTP_USER_AGENT'], $matches)){
			$model = $matches[$key];
		}
		return $model;
	}
	
	/**
	 * アクセスしているクライアントの端末情報を返す。
	 * 
	 * @return キャリア
	 */
	function getTermInfo()
	{
		$cary = '';
		$model = '';
		$devid = '';
		$ser = '';
		$icc = '';
		$uid = '';
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		if ($user_agent[0] == 'DoCoMo'){ 
			// DoCoMo
			if (preg_match('/^1\..$/', $user_agent[1])){ 
				// ﾌﾞﾗｳｻﾞﾊﾞｰｼﾞｮﾝ 1.0
				$model = $user_agent[2];
//				if($this->isDocomo()){
					$devid = '';
					$ser = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
					$icc = '';
//					$uid = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
//				}
			}elseif (preg_match('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', $user_agent[1])){ 
				// ﾌﾞﾗｳｻﾞﾊﾞｰｼﾞｮﾝ 2.0(FOMA)
				$model = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\1', $user_agent[1]);
//				if($this->isDocomo()){
					$ser = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\2', $user_agent[1]);
					$icc = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\3', $user_agent[1]);
//					$uid = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\3', $user_agent[1]);
//				}
			}
			$uid = $_SERVER['HTTP_X_DCMGUID'];
			$cary = 'DoCoMo';
		}elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){ 
			// au(旧機種)
			$model = $user_agent[0]; //KDDI-SN37 UP.Browser 
			// $model = $user_agent[1];//6.2.0.11.1.2(GUI) MMP
			// $model = $user_agent[2];//2.0
			// $model = $_SERVER['HTTP_USER_AGENT'];
			if ($user_agent[0] == 'UP.Browser'){
				$devid = preg_replace('/(.+?)-(.+)/', '\\2', $user_agent[1]);
			}elseif (preg_match("/KDDI/", $user_agent[1])){
				$devid = preg_replace('/^KDDI-(.+?)\sUP(.+)/', '\\1', $user_agent[0]);
			}
//			if($this->isAu()){
				$ser = preg_replace('/^(.+?)_t.+/', '\\1', $_SERVER['HTTP_X_UP_SUBNO']);
				$icc = $_SERVER['HTTP_X_UP_SUBNO'];
				$uid = $_SERVER['HTTP_X_UP_SUBNO'];
//			}
			$cary = 'au';
		}elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){ 
			// Vodafone,SoftBank
			$model = preg_replace('/^(.+?)[\s_]*/', '\\1', $_SERVER['HTTP_X_JPHONE_MSNAME']);
			if ($model == ''){
				if (preg_match("/SoftBank/", $user_agent[0])){
					$model = $user_agent[2];
				}else{
					$model = preg_replace('/^(.+?)\s*/', '\\1', $user_agent[2]);
				}
			}
//			if($this->isSoftbank()){
				if (preg_match("/J-PHONE/", $user_agent[0])){ 
					// 'J-PHONE'ﾕｰｻﾞｰｴｰｼﾞｪﾝﾄ
					$ser = preg_replace('/^SN(.+?)\s.+$/', '\\1', $user_agent[3]);
				}elseif (preg_match("/Vodafone/", $user_agent[0]) or preg_match("/SoftBank/", $user_agent[0])){ 
					// 'Vodafone','SoftBank'ﾕｰｻﾞｰｴｰｼﾞｪﾝﾄ
					$ser = preg_replace('/^SN(.+?)\s.+$/', '\\1', $user_agent[4]);
				}elseif (preg_match("/MOT/", $user_agent[0])){
					$ser = '';
				}
				$devid = '';
				$icc = $_SERVER['HTTP_X_JPHONE_UID'];
				$uid = $_SERVER['HTTP_X_JPHONE_UID'];
//			}
			$cary = 'Vodafone';
		}else{
			$cary = 'PC';
			$model = $user_agent[0] . ' ' . $user_agent[1];
			$devid = '';
			$ser = '';
			$icc = '';
			$uid = '';
		}
		return array($cary, $model, $ser, $icc, $devid, $uid);
	}
	
	/**
	 * CSVファイルを出力する
	 * 
	 * @param タイトル用配列、出力用配列
	 * 
	 * @return  null
	 */	
	 function outputCsv($titleArray, $lineArray)
	 {
	 	// 文字コードをSJISに変換する
		$csv_title_array = array();
		$csv_line_array  = array();
		foreach($titleArray as $k=>$v){
			$csv_title_array[] = mb_convert_encoding($v, "SJIS", "EUC-JP");
		}
		// 配列で来るので各要素の文字コード変換を行う
		foreach($lineArray as $k => $v){
			$_line_array = array();
			foreach($v as $k2 => $v2){
				$_line_array[] = mb_convert_encoding($v2, "SJIS", "EUC-JP");
			}
			$csv_line_array[] = $_line_array;
		}
		
		// ＣＳＶファイル名
		$file_name = $this->config->get('master_csv_dir').date("YmdHis",time()) . '.csv';
		
		// 書き込み
		$fp = fopen( $file_name, "w" );
		fputs($fp, implode( ",", $csv_title_array ) . "\n");
		foreach($csv_line_array as $k => $v){
			fputs($fp, "\"".implode( "\",\"", $v ) . "\"\n");
		}
		$file = $file_name;
		$dl_name = date("YmdHis",time()) . '.csv';
		
		//ヘッダー
		header('Content-Type: text/csv');
		header("Content-Disposition: attachment; filename=".$dl_name );
		header('Content-Length: '.filesize($file));
		//出力
		readfile($file);
		///tmp/ファイル削除
		unlink($file);
		
	 }
	 
	/**
	 * デバッグログ出力メソッド 
	 *  出力先：プロジェクト/log/日付.log
	 * 
	 * @param  出力したい文字列
	 * @return true
	 */
	function trace($str)
	{
		
		$log_file = dirname(dirname(__FILE__)) .'/log/'.date('Y-m-d') .'.log';
		// ファイル存在＆書き込み権限の確認
		if(!is_writable($log_file)){
			if(!is_file($log_file)){
				if(touch($log_file)){
					chmod($log_file,0777);
				}else{
					return false;
				}
			}
		}else{
			$fp = @fopen($log_file, "a+");
			if($str){
				if (!(empty($fp))) {
					flock($fp, LOCK_EX);
					fputs($fp, date('H:i:s').' : ');
					fputs($fp, $str);
					fputs($fp, "\n");
					flock($fp, LOCK_UN);
					fclose($fp);
				}
			}
			return true;
		}
	}
}

?>
