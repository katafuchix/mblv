<?php
/**
 * tv-ini.php
 * アプリケーション設定
 * 
 * @author Technovarth
 * @package MBLV
 */

/* =============================================
// FTPの定義
============================================= */
$ftp = array(
	'1'  => array(
		'host' => 'varth.jp',
		'user' => 'mblv_contents',
		'pass' => 'HTk3JU3pwn9V1',
	),
);

/* =============================================
// 基本設定の定義
============================================= */
$config = array(
	/* =============================================
	// デバッグ設定
	// (to enable ethna_info and ethna_unittest, turn this true)
	============================================= */
	'debug' => false,
	
	/* =============================================
	// DB設定
	============================================= */
	// main DSN
	'dsn'		=> DSN,
	// stats DSN
	'dsn_stats'	=> DSN_STATS,
	
	/* =============================================
	// sample-2: mulitple facility
	============================================= */
	'log' => array(
		//画面表示
		'echo'  => array(
			//'level'         => 'emerg',
			//'level'         => 'alert',
			//'level'         => 'crit',
			//'level'         => 'err',
			'level'         => 'warning',
			//'level'         => 'notice',
			//'level'         => 'info',
			//'level'         => 'debug',
		),
		//ファイルで保存
		'file'  => array(
			'level'         => 'warning',
			'file'          => BASE . '/log/ethna.log',//※0777で作成しておく必要があります
			'mode'          => 0666,
		),
		/*
		'alertmail'  => array(
			'level'         => 'warning',
			'mailaddress'   => 'mblv@ml.technovarth.jp',
		),
		*/
	),
	
	// 'log_option'		=> 'pid,function,pos',
	// 'log_filter_do'		=> '',
	// 'log_filter_ignore'	=> 'Undefined index.*%%.*tpl',
	
	// [memcache]
	// sample-1: single (or default) memcache
	// 'memcache_host' => MEMCHACHE_HOST,
	// 'memcache_port' => 11211,
	// 'memcache_use_connect' => false,
	// 'memcache_retry' => 3,
	// 'memcache_timeout' => 3,
	//
	// sample-2: multiple memcache servers (distributing w/ namespace and ids)
	// 'memcache' => array(
	//	 'namespace1' => array(
	//		 0 => array(
	//			 'memcache_host' => 'cache1.example.com',
	//			 'memcache_port' => 11211,
	//		 ),
	//		 1 => array(
	//			 'memcache_host' => 'cache2.example.com',
	//			 'memcache_port' => 11211,
	//		 ),
	//	 ),
	// ),
	
	/* =============================================
	// [csrf]
	============================================= */
	'csrf' => 'Session',
	
	/* =============================================
	// 流動性の高い設定項目
	============================================= */
	// マイ画像アバター有効設定
	'mi_enable'			=> false,
	// mobileのみ登録、メール受信可能設定
	'mobile_only'		=> false,
	
	/* =============================================
	// [url]
	============================================= */
	// ユーザ画面URL
	'user_url'			=> USER_URL,
	// 管理画面URL
	'admin_url'			=> ADMIN_URL,
	// ユーザログイン画面URL
	'login_url'			=> USER_URL . '?action_user_login=true',
	// ユーザ登録画面URL
	'regist_url'		=> USER_URL . '?action_user_regist=true',
	// ファイルURL
	'file_url'			=> FILE_URL,
	// 絵文字URL
	'emoji_url'			=> EMOJI_URL,
	// リダイレクトURL
	'redirect_url'		=> 'fp.php?code=system_regist',
	
	/* =============================================
	// 決済サーバ設定
	============================================= */
	// 決済サーバホスト
	'payment_host'				=> PAYMENT_HOST,
	// 決済サーバパス
	'payment_path'				=> PAYMENT_PATH,
	// 決済サーバスクリプト（AUTH）
	'payment_script_auth'		=> PAYMENT_SCRIPT_AUTH,
	// 決済サーバスクリプト（CONVORDER）
	'payment_script_convorder'	=> PAYMENT_SCRIPT_CONVORDER,
	// 決済サーバクエリ（AUTH）
	'payment_query_auth'		=> PAYMENT_QUERY_AUTH,
	// 決済サーバクエリ（CONVORDER）
	'payment_query_convorder'	=> PAYMENT_QUERY_CONVORDER,
	
	/* =============================================
	// [tag]
	============================================= */
	// 自動変換するタグ
	'tag' => array(
		'login_url' => array(
			'name' => 'ログインURL',
		),
		'support_mailaddress' => array(
			'name' => 'サポートメールアドレス',
		),
		'regist_url' => array(
			'name' => '会員登録URL',
		),
		'user_password' => array(
			'name' => '請求されたパスワード',
		),
		'from_user_nickname' => array(
			'name' => '招待元ユーザニックネーム',
		),
		'to_user_nickname' => array(
			'name' => 'メール送信先ユーザニックネーム',
		),
		'to_user_mailaddress' => array(
			'name' => 'メール送信先メールアドレス',
		),
		'invite_message' => array(
			'name' => '招待メッセージ',
		),
	),
	// タグセパレータ
	'tag_cut' => '##',
	
	/* =============================================
	// [mail]
	============================================= */
	// メールドメイン
	'mail_domain' => MAIL_DOMAIN,
	// エラーメール配信停止数(エラーメールが1通発生したユーザへは一斉配送メールを送信しない)
	'mail_error_count' => 1,
	// smtp用パラメタ
	'mail_smtp' => array(
		'host'		=> '202.210.130.91',
		'port'		=> 10025,
		'auth'		=> false,
	),
	// メール送信元メールアドレス
	'from_mailaddress' => 'mblv@'. MAIL_DOMAIN,
	// メールマガジン用メールアドレス
	'magazine_mailaddress' => 'mblv@' . MAIL_DOMAIN,
	// サポート用メールアドレス
	'support_mailaddress' => 'mblv@ml.technovarth.jp',
	// 管理者メールアドレス
	'admin_mailaddress' => 'mblv@ml.technovarth.jp',
	
	// 在庫管理メール用fromアカウント
	'stock_alert_from_mailaccount' => 'mblv@ml.technovarth.jp',
	// 在庫管理メール用toアカウント
	'stock_alert_to_mailaccount' => 'mblv@ml.technovarth.jp',
	// 商品購入確認メールのコピー送信先
	'user_order_copy_mailaddress' => 'mblv@ml.technovarth.jp',
	// ethnaエラーアラート送信先アドレス
	'log_alertmail_mailaddress' => 'mblv@ml.technovarth.jp',
	// 商品についてのお問い合わせ先メールアドレス
	'item_info_mailaddress' => 'mblv@ml.technovarth.jp',
	
	//在庫管理メール 1:1を切るとアラート
	'stock_alert_num'	=> '1',
	// システムで使用するメールテンプレート
	'mail_template' => array(
		'user_regist' => array(
			'name'	=> '会員登録メール',
		),
		'user_regist_done' => array(
			'name' => '会員登録完了メール',
		),
		'user_already_member_error' => array(
			'name' => '会員登録時既に会員エラーメール',
		),
		'user_forbidden_member_error' => array(
			'name' => '会員登録時強制退会エラーメール',
		),
		'user_change_mailaddress_done' => array(
			'name' => 'メールアドレス変更完了メール',
		),
		'user_change_mailaddress_error' => array(
			'name' => 'メールアドレス変更エラーメール',
		),
		'user_remind' => array(
			'name' => 'パスワード請求メール',
		),
		'user_invite' => array(
			'name' => '友達招待メール',
		),
		'user_got_message' => array(
			'name' => 'メッセージ受信通知メール',
		),
		'user_friend_apply' => array(
			'name' => '友達申請メール',
		),
		'user_bbs' => array(
			'name' => '伝言板書き込み通知メール',
		),
		'user_image_success' => array(
			'name' => '画像投稿完了メール',
		),
		'user_image_error' => array(
			'name' => '画像投稿失敗メール',
		),
		'user_community_join' => array(
			'name'	=> 'コミュニティ参加申請メール',
		),
		'alert' => array(
			'name'	=> 'アラート',
		),
		'user_order'  => array(
			'name' =>'注文確認メール テスト用データ',
		),
		'user_order1' => array(
			'name' => '注文確認メール クレジット',
		),
		'user_order2' => array(
			'name' => '注文確認メール コンビニ',
		),
		'user_order3' => array(
			'name' => '注文確認メール 代引き',
		),
		'user_order4' => array(
			'name' => '注文確認メール 銀行振込',
		),
		'stock_alert' => array(
			'name' => '商品完売メール' ,
		),
		'user_review' => array(
			'name' => '商品レビュー依頼メール' ,
		),
		'user_regist_finish' => array(
			'name' => '会員登録完了' ,
		),
		'user_community_join_ok' => array(
			'name'	=> 'コミュニティ参加承認メール',
		),
		'user_community_join_ng' => array(
			'name'	=> 'コミュニティ参加拒否メール',
		),
		'item_sent1' => array(
			'name'	=> '商品発送メール1(直接出荷)',
		),
		'item_sent2' => array(
			'name'	=> '商品発送メール2(納品後出荷)',
		),
		'stock_alert' => array(
			'name'	=> '完売アラートメール',
		),
		'user_movie_success' => array(
			'name' => '動画投稿完了メール',
		),
		'user_movie_error' => array(
			'name' => '動画投稿失敗メール',
		),
	),
	// システムで使用するメールアカウント
	'mail_account' => array(
		// 配送エラー用メールアカウント
		'error' => array(
			'account' => MAIL_PREFIX.'-error',
			'subject' => '',
			'body' => '',
		),
		// 会員登録用メールアカウント
		'regist' => array(
			'account' => MAIL_PREFIX.'-reg',
			'subject' => '会員登録',
			'body' => 'このままﾒｰﾙを送信してください',
		),
		// メールアドレス変更アカウント
		'change' => array(
			'account' => MAIL_PREFIX.'-cm',
			'subject' => 'ﾒｰﾙｱﾄﾞﾚｽ変更',
			'body' => 'このままﾒｰﾙを送信してください',
		),
		// 入会経路通知用アカウント
		'media' => array(
			'account' => MAIL_PREFIX.'-mn',
			'subject' => '入会経路通知',
			'body' => 'このままﾒｰﾙを送信してください',
		),
		// 画像系
		// 自分の画像用メールアカウント
		'my_image' => array(
			'account' => MAIL_PREFIX.'-myi',
			'subject' => '画像変更',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// 日記の画像用メールアカウント
		'blog_article_image' => array(
			'account' => MAIL_PREFIX.'-bai',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// 日記コメント画像用メールアカウント
		'blog_comment_image' => array(
			'account' => MAIL_PREFIX.'-bci',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// コミュニティの画像用メールアカウント
		'community_image' => array(
			'account' => MAIL_PREFIX.'-ci',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// コミュニティ記事の画像用メールアカウント
		'community_article_image' => array(
			'account' => MAIL_PREFIX.'-cai',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// コミュニティ記事コメントの画像用メールアカウント
		'community_comment_image' => array(
			'account' => MAIL_PREFIX.'-cci',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// メッセージの画像用メールアカウント
		'message_image' => array(
			'account' => MAIL_PREFIX.'-mei',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// 伝言の画像用メールアカウント
		'bbs_image' => array(
			'account' => MAIL_PREFIX.'-bi',
			'subject' => '画像投稿',
			'body' => 'このまま画像を添付してﾒｰﾙを送信してください',
		),
		// 動画系
		// 日記の動画用メールアカウント
		'blog_article_movie' => array(
			'account' => MAIL_PREFIX.'-bam',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
		// 日記コメント動画用メールアカウント
		'blog_comment_movie' => array(
			'account' => MAIL_PREFIX.'-bcm',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
		// コミュニティ記事の動画用メールアカウント
		'community_article_movie' => array(
			'account' => MAIL_PREFIX.'-cam',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
		// コミュニティ記事コメントの動画用メールアカウント
		'community_comment_movie' => array(
			'account' => MAIL_PREFIX.'-ccm',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
		// メッセージの動画用メールアカウント
		'message_movie' => array(
			'account' => MAIL_PREFIX.'-mem',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
		// 伝言の動画用メールアカウント
		'bbs_movie' => array(
			'account' => MAIL_PREFIX.'-bm',
			'subject' => '動画投稿',
			'body' => 'このまま動画を添付してﾒｰﾙを送信してください',
		),
	),
	
	/* =============================================
	// [file path]
	============================================= */
	// 管理画面ファイルパス
	'admin_file_path'		=> BASE . '/public_admin/',
	// 共通ファイルパス
	'file_path'				=> BASE . '/public_file/',
	// 画像ファイルパス
	'image_path'			=> BASE . '/public_file/image/',
	// 動画ファイルパス
	'movie_path'			=> BASE . '/public_file/movie/',
	// perl パス
	'perl_path'				=> PERL_PATH,
	// imagemagick パス
	'imagemagick_path'		=> IMAGEMAGICK_PATH,
	// ffmpeg パス
	'ffmpeg_path'			=> '/usr/local/bin/ffmpeg',
	// flvtool2 パス
	'flvtool2_path'			=> '/usr/local/bin/flvtool2',
	// 絵文字パス
	'emoji_path'			=> BASE . '/data/emoji/',
	
	/* =============================================
	// 全画面画像
	============================================= */
	// 横サイズ
	'image_a_width' => 240,
	// 縦サイズ
	'image_a_height' => 320,
	
	/* =============================================
	// スモール面画像
	============================================= */
	// 横サイズ
	'image_s_width' => 120,
	// 縦サイズ
	'image_s_height' => 160,
	
	/* =============================================
	// サムネイル面画像
	============================================= */
	// 横サイズ
	'image_t_width' => 100,
	// 縦サイズ
	'image_t_height' => 120,
	
	/* =============================================
	// アイコン面画像
	============================================= */
	// 横サイズ
	'image_i_width' => 40,
	// 縦サイズ
	'image_i_height' => 40,
	// アイコン画像有効
	'image_i_enable' => true,
	
	/* =============================================
	// アバター画像
	============================================= */
	// スモール面画像サイズ
	'avatar_s_width' => 100,
	'avatar_s_height' => 160,
	'avatar_s_base_x' => 0,
	'avatar_s_base_y' => 0,
	'avatar_s_base_w' => 100,
	'avatar_s_base_h' => 160,
	// サムネイル面画像サイズ
	'avatar_t_width' => 60,
	'avatar_t_height' => 80,
	'avatar_t_base_x' => 40,
	'avatar_t_base_y' => 20,
	'avatar_t_base_w' => 120,
	'avatar_t_base_h' => 160,
	// アイコン面画像サイズ
	'avatar_i_width' => 32,
	'avatar_i_height' => 32,
	'avatar_i_base_x' => 36,
	'avatar_i_base_y' => 32,
	'avatar_i_base_w' => 128,
	'avatar_i_base_h' => 128,
	
	/* =============================================
	// ファイル設定
	============================================= */
	// NOIMAGE画像パス
	'noimage'			=> 'noimage_%attr%.jpg',
	// ユーザがアップロード可能な容量の最大サイズ
	'file_max_size'		=> 10000000,//10000000バイト＝1000K＝1M
	//'file_max_size'	=> 0,//0＝制限なし
	// MIMEタイプ
	'mime_types' => array(
		'gif' => 'image/gif',
		'jpg' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'png' => 'image/png',
		'bmp' => 'image/bmp',
		'3g2' => 'audio/3gpp2',
		'3gp' => 'video/3gpp',
		'amc' => 'application/x-mpeg',
		'swf' => 'application/x-shockwave-flash',
		'pdf' => 'application/pdf',
		'dmt' => 'application/x-decomail-template',
		'khm' => 'application/x-kddi-htmlmail',
		'hmt' => 'application/x-htmlmail-template',
		'mmf' => 'application/x-smaf',
	),
	
	/* =============================================
	// [stats]
	============================================= */
	'stats_rotate' => 21,
	// statsタイプ
	'stats_type' => array(
		'access'			=> array('name' => 'アクセス'),
		'blog'				=> array('name' => 'ユーザ日記'),
		'blog_article'		=> array('name' => '日記'),
		'community'			=> array('name' => 'コミュニティ'),
		'community_article'	=> array('name' => 'コミュニティトピック'),
		'ad'				=> array('name' => '広告'),
		'banner'			=> array('name' => 'バナー'),
		'media'				=> array('name' => '入会経路'),
		'avatar'			=> array('name' => 'アバター'),
		'decomail'			=> array('name' => 'デコメール'),
		'game'				=> array('name' => 'ゲーム'),
		'sound'				=> array('name' => 'サウンド'),
//		'image'				=> array('name' => '画像'),
//		'movie'				=> array('name' => '動画'),
		'contents'			=> array('name' => 'フリーページ'),
		'invite'			=> array('name' => '友達招待'),
		'item'				=> array('name' => '商品'),
	),
	// statsスコア
	'stats_score' => array(
		'view'		=> array('name' => '閲覧',			'bar' => '#7fffbf'),
		'dl'		=> array('name' => 'DL',			'bar' => '#7fffbf'),
		'uu'		=> array('name' => 'ユニーク',		'bar' => '#ffbf7f'),
		'regist'	=> array('name' => '登録',			'bar' => '#ffff7f'),
		'mail'		=> array('name' => 'メール',		'bar' => '#bf7fff'),
		'access'	=> array('name' => 'アクセス',		'bar' => '#7fffff'),
		'click'		=> array('name' => 'クリック',		'bar' => '#7fff7f'),
		'send'		=> array('name' => '成果',			'bar' => '#ff7fbf'),
		'resign'	=> array('name' => '退会',			'bar' => '#A9A9A9'),
		'buy'		=> array('name' => '購入',			'bar' => '#bdb76b'),
	),
	
	/* =============================================
	// 機能設定
	============================================= */
	// option
	'option' => array(
		// アバターパッケージ
		'avatar'			=> true,
		// ポイントパッケージ
		'point'				=> true,
		// ポイント交換オプション
		'point_exchange'	=> true,
		// デコメールパッケージ
		'decomail'			=> true,
		// ゲームパッケージ
		'game'				=> true,
		// サウンドパッケージ
		'sound'				=> true,
		// 携帯小説パッケージ
		'novel'				=> false,
		// コミックパッケージ
		'comic'				=> false,
		// 動画パッケージ
		'movie'				=> true,
		// NGワードオプション
		'ngword'			=> true,
		// 承認投稿オプション
		'precheck'			=> false,
		// ゲスト制
		'guest'				=> true,
		// DOCOMO公式
		'official_d'		=> true,
		// AU公式
		'official_a'		=> true,
		// SOFTBANK公式
		'official_s'		=> true,
		// 動画配信
		'video'				=> true,
	),
	
	/* =============================================
	// フォーム部品などの表示設定
	============================================= */
	// 都道府県一覧
	'prefecture_id' => array(
		'' => array('name' => '未設定'),
		'1' => array('name' => '北海道'),
		'2' => array('name' => '青森県'),
		'3' => array('name' => '岩手県'),
		'4' => array('name' => '秋田県'),
		'5' => array('name' => '宮城県'),
		'6' => array('name' => '山形県'),
		'7' => array('name' => '福島県'),
		'8' => array('name' => '茨城県'),
		'9' => array('name' => '栃木県'),
		'10' => array('name' => '群馬県'),
		'11' => array('name' => '埼玉県'),
		'12' => array('name' => '千葉県'),
		'13' => array('name' => '東京都'),
		'14' => array('name' => '神奈川県'),
		'15' => array('name' => '新潟県'),
		'16' => array('name' => '富山県'),
		'17' => array('name' => '石川県'),
		'18' => array('name' => '福井県'),
		'19' => array('name' => '長野県'),
		'20' => array('name' => '山梨県'),
		'21' => array('name' => '静岡県'),
		'22' => array('name' => '愛知県'),
		'23' => array('name' => '岐阜県'),
		'24' => array('name' => '三重県'),
		'25' => array('name' => '滋賀県'),
		'26' => array('name' => '京都府'),
		'27' => array('name' => '大阪府'),
		'28' => array('name' => '兵庫県'),
		'29' => array('name' => '奈良県'),
		'30' => array('name' => '和歌山県'),
		'31' => array('name' => '鳥取県'),
		'32' => array('name' => '島根県'),
		'33' => array('name' => '岡山県'),
		'34' => array('name' => '広島県'),
		'35' => array('name' => '山口県'),
		'36' => array('name' => '香川県'),
		'37' => array('name' => '徳島県'),
		'38' => array('name' => '愛媛県'),
		'39' => array('name' => '高知県'),
		'40' => array('name' => '福岡県'),
		'41' => array('name' => '大分県'),
		'42' => array('name' => '佐賀県'),
		'43' => array('name' => '長崎県'),
		'44' => array('name' => '宮崎県'),
		'45' => array('name' => '熊本県'),
		'46' => array('name' => '鹿児島県'),
		'47' => array('name' => '沖縄県'),
		'48' => array('name' => '海外'),
	),
	
	// 職種一覧
	'job_family_id' => array(
		'1' => array('name' => '会社員'),
		'2' => array('name' => '公務員'),
		'3' => array('name' => '自営業'),
		'4' => array('name' => '自由業'),
		'5' => array('name' => '派遣社員'),
		'6' => array('name' => 'ﾊﾟｰﾄ･ｱﾙﾊﾞｲﾄ'),
		'7' => array('name' => '学生'),
		'8' => array('name' => '家事手伝い'),
		'9' => array('name' => '専業主婦'),
		'10' => array('name' => '無職'),
	),
	
	// 業種一覧
	'business_category_id' => array(
		'1' => array('name' => '技術系'),
		'2' => array('name' => 'ｸﾘｴｲﾃｨﾌﾞ系'),
		'3' => array('name' => 'ｻｰﾋﾞｽ･販売系'),
		'4' => array('name' => '専門職系'),
		'5' => array('name' => '教員・公務員'),
		'6' => array('name' => 'ｻｰﾋﾞｽ系'),
		'7' => array('name' => '院生・大学生'),
		'8' => array('name' => '専門学校生'),
//		'9' => array('name' => '高校生・中学生'),
//		'10' => array('name' => '小学生'),
		'11' => array('name' => '農林水産'),
		'12' => array('name' => '主婦'),
		'13' => array('name' => '無職'),
		'14' => array('name' => 'その他'),
	),
	
	// 血液型一覧
	'user_blood_type' => array(
		'1' => array('name' => 'A型'),
		'2' => array('name' => 'B型'),
		'3' => array('name' => 'O型'),
		'4' => array('name' => 'AB型'),
	),
	
	// 結婚
	'user_is_married' => array(
		'1' => array('name' => '既婚'),
		'0' => array('name' => '未婚'),
	),
	
	// 子供
	'user_has_children' => array(
		'1' => array('name' => 'いる'),
		'0' => array('name' => 'いない'),
	),
	
	// 性別
	'user_sex' => array(
		'1' => array('name' => '男性'),
		'2' => array('name' => '女性'),
	),
	
	// HTMLテンプレート編集ステータス
	'html_template_edit' => array(
		'0' => array('name' => '編集中でない'),
		'1' => array('name' => '編集中'),
	),
	
	// バナータイプ
	'banner_type' => array(
		'txt'	=> array("name" => 'テキスト'),
		'jpg'	=> array("name" => 'JPEG'),
		'gif'	=> array("name" => 'GIF'),
		'png'	=> array("name" => 'PNG'),
	),
	
	// avatar
	// アバター性別種別
	'avatar_sex_type' => array(
		'' => array('name' => '共通用'),
		'1' => array('name' => '男性用'),
		'2' => array('name' => '女性用'),
	),
	
	'avatar_system' => array(
		1 => array('name' => '顔'),
		2 => array('name' => '体'),
		3 => array('name' => '髪'),
		4 => array('name' => '服トップス'),
		5 => array('name' => '服ボトムス'),
		6 => array('name' => '服ワンピース'),
		7 => array('name' => '服インナー'),
		8 => array('name' => '履物'),
		9 => array('name' => '顔装飾'),
		10 => array('name' => 'アクセサリ'),
		11 => array('name' => '小道具'),
		12 => array('name' => 'ペット'),
		13 => array('name' => '背景'),
		14 => array('name' => '演出アイテム'),
		15 => array('name' => '高級品'),
		16 => array('name' => '格安品'),
		17 => array('name' => '特殊アイテム'),
		18 => array('name' => 'ゲスト専用'),
		19 => array('name' => '初期未設定'),
		20 => array('name' => 'オールインワン'),
	),
	
	// blog_article
	'blog_article_public' => array(
		1 => array('name' => '公開'),
		0 => array('name' => '非公開'),
		2 => array('name' => '友達まで公開'),
	),
	
	// [ad]
	// 広告タイプ
	'ad_type' => array(
		1 => array('name' => 'ワンクリック'),
		2 => array('name' => '登録'),
		3 => array('name' => '購買'),
	),
	// 広告表示タイプ
	'ad_display_type' => array(
		1 => array('name' => 'WEB'),
		2 => array('name' => 'MAIL'),
	),
	
	// ポイントタイプ検索用配列
	'point_type_search' => array(
		'admin'			=> 1,
		'ad_click'		=> 2,
		'ad_regist'		=> 3,
		'ad_buy'		=> 4,
		'avatar'		=> 5,
		'decomail'		=> 6,
		'game'			=> 7,
		'sound'			=> 8,
		'media_regist'	=> 9,
		'regist'		=> 10,
		'invite_from'	=> 11,
		'invite_to'		=> 12,
		'order'			=> 13,
	),
	
	// ポイントステータス
	'point_status' => array(
		0 => array('name' => '却下'),
		1 => array('name' => '未承認'),
		2 => array('name' => '承認済み'),
	),
	
	// cms
	'cms_type' => array(
		1 => array('type' => 'ad',			'name' => '広告'),
		2 => array('type' => 'avatar',		'name' => 'アバター'),
		3 => array('type' => 'decomail',	'name' => 'デコメール'),
		4 => array('type' => 'game',		'name' => 'ゲーム'),
		5 => array('type' => 'sound',		'name' => 'サウンド'),
	),
	// config
	'site_type' => array(
		'config' 	=> array('type' => 'config',	'name' => '基本'),
		'ad' 		=> array('type' => 'ad',		'name' => '広告'),
		'avatar' 	=> array('type' => 'avatar',	'name' => 'アバター'),
		'decomail' 	=> array('type' => 'decomail',	'name' => 'デコメール'),
		'game' 		=> array('type' => 'game',		'name' => 'ゲーム'),
		'sound' 	=> array('type' => 'sound',		'name' => 'サウンド'),
		'mall' 		=> array('type' => 'sound',		'name' => 'EC'),
	),
	
	// user_status
	'user_status' => array(
		1 => array('name' =>'仮登録'),
		2 => array('name' => '本登録'),
		3 => array('name' => '退会'),
		4 => array('name' => '強制退会'),
	),
	
	// user_guest_status
	'user_guest_status' => array(
		0 => array('name' => 'いいえ'),
		1 => array('name' => 'はい'),
	),
	
	// user_carrier
	'user_carrier' => array(
		1 => array('name' => 'DOCOMO'),
		2 => array('name' => 'AU'),
		3 => array('name' => 'SOFTBANK'),
	),
	
	// image_status
	'image_status' => array(
		0 => array('name' => '変更しない'),
		1 => array('name' => '変更する'),
		2 => array('name' => '削除する'),
	),
	
	// file_status
	'file_status' => array(
		1 => array('name' => '有効'),
		0 => array('name' => '削除済み'),
		2 => array('name' => '管理人によって削除済み'),
	),
	
	// friend_status
	'friend_status' => array(
		1 => array('name' => '申請中'),
		2 => array('name' => '友達'),
		3 => array('name' => '友達ではない'),
	),
	
	// data_status
	'data_status' => array(
		1 => array('name' => '表示'),
		0 => array('name' => '非表示'),
	),
	
	// regist_status
	'regist_status' => array(
		1 => array('name' => '有効'),
		0 => array('name' => '無効'),
	),
	
	// item_start_status
	'item_start_status' => array(
		1 => array('name' => '有効'),
		2 => array('name' => '無効'),
	),
	
	// admin_status
	'admin_status' => array(
		1 => array('name' => '通常管理者'),
		2 => array('name' => '特権管理者'),
	),
	
	// receive_status
	'receive_status' => array(
		1 => array('name' => '受信する'),
		0 => array('name' => '受信しない')
	),
	
	// data_checked
	'data_checked' => array(
		0 => array('name' => '未'),
		1 => array('name' => '済'),
	),
	
	// public_status
	'public_status' => array(
		0 => array('name' => '非公開'),
		1 => array('name' => '公開'),
		"" => array('name' => '公開'),
	),
	
	// community_join_condition
	'community_join_condition' => array(
		1 => array('name' => '誰でも参加できる（公開）'),
		2 => array('name' => '管理人の承認が必要（公開）'),
		3 => array('name' => '管理人の承認が必要（非公開）'),
	),
	
	// community_member_status
	'community_member_status' => array(
		0 => array('name' => 'メンバーから削除'),
		1 => array('name' => 'メンバー'),
		2 => array('name' => '管理人'),
		3 => array('name' => '管理人承認待ち'),
	),
	
	// community_topic_permission
	'community_topic_permission' => array(
		1 => array('name' => '参加者が作成できる'),
		2 => array('name' => '管理人のみ作成できる'),
	),
	
	// news
	'news_type' => array(
		6 => array('name' => 'トップ'),
		1 => array('name' => '広告'),
		2 => array('name' => 'アバター'),
		3 => array('name' => 'デコメール'),
		4 => array('name' => 'ゲーム'),
		5 => array('name' => 'サウンド'),
	),
	// user_mail_ok
	'user_mail_ok' => array(
		0 => array('name' => '受け取らない'),
		1 => array('name' => '受け取る'),
	),
	// image_status
	'image_status' => array(
		'0'	=> array('name' => "変更しない"),
		'1'	=> array('name' => "変更する"),
		'2'	=> array('name' => "削除する"),
	),
	// オーダータイプ
	'user_order_type' => array(
		'' => array('name' => "指定しない"),
		'1' => array('name' => "クレジット"),
		'2' => array('name' => "コンビニ"),
		'3' => array('name' => "代引き"),
		'4' => array('name' => "銀行振込"),
	),
	// コンビニ決済店舗
	'user_order_conveni_type' => array(
		'seveneleven' 	=> array('name' => "セブンイレブン"),
		'famima' 		=> array('name' => "ファミリーマート"),
		'lawson' 		=> array('name' => "ローソン"),
		'seicomart' 	=> array('name' => "セイコーマート"),
	),
	// コンビニ指定
	'user_order_conveni_type_user' => array(
		'seveneleven' 	=> array('name' => "ｾﾌﾞﾝﾚﾌﾞﾝ"),
		'famima' 		=> array('name' => "ﾌｧﾐﾘｰﾏｰﾄ"),
		'lawson' 		=> array('name' => "ﾛｰｿﾝ"),
		'seicomart' 	=> array('name' => "ｾｲｺｰﾏｰﾄ"),
	),
	// カートステータス
	'cart_status' => array(
		'' => array('name' => "指定しない"),
		'0' => array('name' => "未決済"),
		'1' => array('name' => "注文済み"),
		'2' => array('name' => "決済済み"),
		'3' => array('name' => "発送済み"),
		'4' => array('name' => "返品済み"),
		'5' => array('name' => "キャンセル"),
	),
	// post_unit_sent_status
	'post_unit_sent_status' => array(
		'0' => array('name' => "未発送"),
		'1' => array('name' => "発送済み"),
	),
	// review_status
	'review_status' => array(
		0 => array('name' => '削除'),
		1 => array('name' => '配信待ち'),
		2 => array('name' => '投稿待ち'),
		3 => array('name' => '有効'),
	),
	
	// クレジットカード種別
	'card_type' => array(
		'1' =>array( 'name' => "VISA"),
		'2' =>array( 'name' => "JCB"),
		'3' =>array( 'name' => "AMEX"),
		'4' =>array( 'name' => "MASTER"),
		//'5' =>array( 'name' => "DINERS"),
	),
	
	// 配達時間帯
	'delivery_date' => array(
		'0' => array('name' => "指定しない"),
		'1' => array('name' => "午前中"),
		'2' => array('name' => "11-14時"),
		'3' => array('name' => "14-16時"),
		'4' => array('name' => "16-18時"),
		'5' => array('name' => "18-21時"),
	),
	
	// 発送タイプ
	'delivery_type' => array(
		'1' =>array( 'name' => "登録した住所に送る"),
		'2' =>array( 'name' => "登録した以外の住所に送る"),
	),
	
	// 配送地域
	'region_id' => array(
		'' => array('name' => '都道府県'),
		'1' => array('name' => '北海道'),
		'2' => array('name' => '青森県'),
		'3' => array('name' => '岩手県'),
		'4' => array('name' => '秋田県'),
		'5' => array('name' => '宮城県'),
		'6' => array('name' => '山形県'),
		'7' => array('name' => '福島県'),
		'8' => array('name' => '茨城県'),
		'9' => array('name' => '栃木県'),
		'10' => array('name' => '群馬県'),
		'11' => array('name' => '埼玉県'),
		'12' => array('name' => '千葉県'),
		'13' => array('name' => '東京都'),
		'14' => array('name' => '神奈川県'),
		'15' => array('name' => '新潟県佐渡島'),
		'16' => array('name' => '新潟県'),
		'17' => array('name' => '富山県'),
		'18' => array('name' => '石川県'),
		'19' => array('name' => '福井県'),
		'20' => array('name' => '長野県'),
		'21' => array('name' => '山梨県'),
		'22' => array('name' => '静岡県'),
		'23' => array('name' => '愛知県'),
		'24' => array('name' => '岐阜県'),
		'25' => array('name' => '三重県'),
		'26' => array('name' => '滋賀県'),
		'27' => array('name' => '京都府'),
		'28' => array('name' => '大阪府'),
		'29' => array('name' => '兵庫県'),
		'30' => array('name' => '奈良県'),
		'31' => array('name' => '和歌山県'),
		'32' => array('name' => '鳥取県'),
		'33' => array('name' => '島根県'),
		'34' => array('name' => '岡山県'),
		'35' => array('name' => '広島県'),
		'36' => array('name' => '山口県'),
		'37' => array('name' => '香川県'),
		'38' => array('name' => '徳島県'),
		'39' => array('name' => '愛媛県'),
		'40' => array('name' => '高知県'),
		'41' => array('name' => '福岡県'),
		'42' => array('name' => '大分県'),
		'43' => array('name' => '佐賀県'),
		'44' => array('name' => '長崎県'),
		'45' => array('name' => '宮崎県'),
		'46' => array('name' => '熊本県'),
		'47' => array('name' => '鹿児島県'),
		'48' => array('name' => '沖縄県'),
		'49' => array('name' => '沖縄県離島'),
	),
	
	// キャリア名
	'user_carrier' => array(
		1 => array('name' => 'docomo'),
		2 => array('name' => 'au'),
		3 => array('name' => 'SoftBank'),
	),
	
	/* =============================================
	// 管理権限アクションカテゴリ設定
	============================================= */
	'admin_action_category' => array(
		account => array(
			'name'		=> '管理者アカウント管理',
			'contents'	=> array(
				'admin_account_add_do'		=> array('name' => '管理管理者アカウント登録実行処理'),
				'admin_account_add'			=> array('name' => '管理管理者アカウント登録'),
				'admin_account_delete_do'	=> array('name' => '管理管理者アカウント削除実行処理'),
				'admin_account_edit_do'		=> array('name' => '管理管理者アカウント編集実行処理'),
				'admin_account_edit'		=> array('name' => '管理管理者アカウント編集'),
				'admin_account_list'		=> array('name' => '管理管理者アカウント一覧実行処理'),
			),
		),
		ad => array(
			'name'		=> '広告管理',
			'contents'	=> array(
				'admin_ad_add_do'		=> array('name' => '管理広告登録処理'),
				'admin_ad_add'			=> array('name' => '管理広告新規登録'),
				'admin_ad_day'			=> array('name' => '管理広告集計'),
				'admin_ad_delete_do'	=> array('name' => '管理広告削除'),
				'admin_ad_edit_do'		=> array('name' => '管理広告編集'),
				'admin_ad_edit'			=> array('name' => '管理広告編集'),
				'admin_ad_list'			=> array('name' => '管理広告一覧'),
				'admin_adcategory_add_do'		=> array('name' => '管理広告カテゴリ登録'),
				'admin_adcategory_add'			=> array('name' => '管理広告カテゴリ登録実行処理'),
				'admin_adcategory_delete_do'	=> array('name' => '管理広告カテゴリ削除'),
				'admin_adcategory_edit_do'		=> array('name' => '管理広告カテゴリ編集実行処理'),
				'admin_adcategory_edit'			=> array('name' => '管理広告カテゴリ編集'),
				'admin_adcategory_list'			=> array('name' => '管理広告カテゴリ一覧'),
				'admin_adcategory_priority_do'	=> array('name' => '管理広告カテゴリ優先度更新'),
				'admin_adcode_add_do'		=> array('name' => '管理広告コード登録'),
				'admin_adcode_add'			=> array('name' => '管理広告コード登録'),
				'admin_adcode_delete_do'	=> array('name' => '管理広告コード削除'),
				'admin_adcode_edit_do'		=> array('name' => '管理広告コード編集'),
				'admin_adcode_edit'			=> array('name' => '管理広告コード編集'),
				'admin_adcode_list'			=> array('name' => '管理広告コード一覧'),
				'admin_admenu_edit_do'	=> array('name' => '管理広告メニュー編集実行処理'),
				'admin_admenu_edit'		=> array('name' => '管理広告メニュー編集'),
			),
		),
		analytics => array(
			'name'		=> '会員レポート管理',
			'contents'	=> array(
				'admin_analytics_day'	=> array('name' => '管理会員レポート集計'),
			),
		),
		avatar => array(
			'name'		=> 'アバター管理',
			'contents'	=> array(
				'admin_avatar_add_do'		=> array('name' => '管理アバター登録実行処理'),
				'admin_avatar_add'			=> array('name' => '管理アバター登録'),
				'admin_avatar_delete_do'	=> array('name' => '管理アバター削除実行処理'),
				'admin_avatar_edit_do'		=> array('name' => '管理アバター編集実行処理'),
				'admin_avatar_edit'			=> array('name' => '管理アバター編集'),
				'admin_avatar_list'			=> array('name' => '管理アバター一覧'),
				'admin_avatarcategory_add_do'		=> array('name' => '管理アバターカテゴリ登録実行処理'),
				'admin_avatarcategory_add'			=> array('name' => '管理アバターカテゴリー登録'),
				'admin_avatarcategory_delete_do'	=> array('name' => '管理アバターカテゴリ削除実行処理'),
				'admin_avatarcategory_edit_do'		=> array('name' => '管理アバターカテゴリ編集実行処理'),
				'admin_avatarcategory_edit'			=> array('name' => '管理アバターカテゴリ編集'),
				'admin_avatarcategory_list'			=> array('name' => '管理アバターカテゴリ一覧'),
				'admin_avatarcategory_priority_do'	=> array('name' => '管理アバターカテゴリ優先度更新実行処理'),
				'admin_avatarstand_add_do'		=> array('name' => '管理アバター台座登録実行処理'),
				'admin_avatarstand_add'			=> array('name' => '管理アバター台座ー登録'),
				'admin_avatarstand_delete_do'	=> array('name' => '管理アバター台座削除実行処理'),
				'admin_avatarstand_edit_do'		=> array('name' => '管理アバター台座編集実行処理'),
				'admin_avatarstand_edit'		=> array('name' => '管理アバター台座編集'),
				'admin_avatarstand_list'		=> array('name' => '管理アバター台座一覧'),
			),
		),
		banner => array(
			'name'		=> 'バナー管理',
			'contents'	=> array(
				'admin_banner_add_do'		=> array('name' => '管理バナー登録実行処理'),
				'admin_banner_add'			=> array('name' => '管理バナー登録'),
				'admin_banner_day'			=> array('name' => '管理バナー集計'),
				'admin_banner_delete_do'	=> array('name' => '管理バナー削除実行処理'),
				'admin_banner_edit_do'		=> array('name' => '管理バナー編集実行処理'),
				'admin_banner_edit'			=> array('name' => '管理バナー編集'),
				'admin_banner_list'			=> array('name' => '管理バナー一覧'),
			),
		),
		bbs => array(
			'name'		=> '伝言管理',
			'contents'	=> array(
				'admin_bbs_delete_do'	=> array('name' => '管理伝言削除実行処理'),
				'admin_bbs_list'		=> array('name' => '管理伝言板一覧実行処理'),
			),
		),
		blacklist => array(
			'name'		=> 'ブラックリスト管理',
			'contents'	=> array(
				'admin_blacklist_delete_do'	=> array('name' => '管理ブラックリスト削除実行処理'),
				'admin_blacklist_list'		=> array('name' => '管理ブラックリスト一覧実行処理'),
			),
		),
		blog => array(
			'name'		=> '日記管理',
			'contents'	=> array(
				'admin_blog_article_delete_do'	=> array('name' => '管理日記削除実行処理'),
				'admin_blog_article_edit_do'	=> array('name' => '管理日記編集実行処理'),
				'admin_blog_article_edit'		=> array('name' => '管理日記編集'),
				'admin_blog_article_list'		=> array('name' => '管理日記一覧実行処理'),
				'admin_blog_comment_delete_do'	=> array('name' => '管理日記コメント削除実行処理'),
				'admin_blog_comment_edit_do'	=> array('name' => '管理日記コメント編集実行処理'),
				'admin_blog_comment_edit'		=> array('name' => '管理日記コメント編集'),
				'admin_blog_comment_list'		=> array('name' => '管理日記コメント一覧実行処理'),
			),
		),
		comment => array(
			'name'		=> 'コメント管理',
			'contents'	=> array(
				'admin_comment_delete_do'	=> array('name' => '管理コメント削除実行処理'),
				'admin_comment_edit_do'		=> array('name' => '管理コメント編集実行処理'),
				'admin_comment_edit'		=> array('name' => '管理コメント編集'),
				'admin_comment_list'		=> array('name' => '管理コメント一覧実行処理'),
			),
		),
		community => array(
			'name'		=> 'コミュニティ管理',
			'contents'	=> array(
				'admin_community_add_do'	=> array('name' => '管理コミュニティ登録実行処理'),
				'admin_community_add'		=> array('name' => '管理コミュニティ登録'),
				'admin_community_delete_do'	=> array('name' => '管理コミュニティ削除実行処理'),
				'admin_community_edit_do'	=> array('name' => '管理コミュニティ編集実行処理'),
				'admin_community_edit'		=> array('name' => '管理コミュニティ編集'),
				'admin_community_list'		=> array('name' => '管理コミュニティ一覧実行処理'),
				'admin_community_article_delete_do'	=> array('name' => '管理コミュニティトピック削除実行処理'),
				'admin_community_article_edit_do'	=> array('name' => '管理コミュニティトピック編集実行処理'),
				'admin_community_article_edit'		=> array('name' => '管理コミュニティトピック編集'),
				'admin_community_article_list'		=> array('name' => '管理コミュニティトピック一覧実行処理'),
				'admin_community_comment_delete_do'	=> array('name' => '管理コミュニティコメント削除実行処理'),
				'admin_community_comment_edit_do'	=> array('name' => '管理コミュニティコメント編集実行処理'),
				'admin_community_comment_edit'		=> array('name' => '管理コミュニティコメント編集'),
				'admin_community_comment_list'		=> array('name' => '管理コミュニティコメント一覧実行処理'),
			),
		),
		config => array(
			'name'		=> '基本設定管理',
			'contents'	=> array(
				'admin_config_community_category_add_do'	=> array('name' => '管理コミュニティカテゴリ登録'),
				'admin_config_community_category_delete_do'	=> array('name' => '管理コミュニティカテゴリ削除実行処理'),
				'admin_config_community_category_edit_do'	=> array('name' => '管理コミュニティカテゴリ編集実行処理'),
				'admin_config_community_category_edit'		=> array('name' => '管理コミュニティカテゴリ編集'),
				'admin_config_community_category'			=> array('name' => '管理コミュニティカテゴリ変更'),
				'admin_config_edit_do'	=> array('name' => '管理基本情報編集実行処理'),
				'admin_config_edit'		=> array('name' => '管理基本情報編集'),
				'admin_config_user_prof_add_do'		=> array('name' => '管理プロフィール項目登録実行処理'),
				'admin_config_user_prof_delete_do'	=> array('name' => '管理プロフィール項目削除実行処理'),
				'admin_config_user_prof_edit_do'	=> array('name' => '管理プロフィール項目編集実行処理'),
				'admin_config_user_prof_edit'		=> array('name' => '管理プロフィール項目編集'),
				'admin_config_user_prof_move_do'	=> array('name' => '管理プロフィール項目優先度更新実行処理'),
				'admin_config_user_prof'			=> array('name' => '管理プロフィール項目管理'),
				'admin_config_user_prof_option_add_do'		=> array('name' => '管理プロフィール項目選択肢登録実行処理'),
				'admin_config_user_prof_option_delete_do'	=> array('name' => '管理プロフィール項目削除実行処理'),
				'admin_config_user_prof_option_edit_do'		=> array('name' => '管理プロフィール項目選択肢編集実行処理'),
				'admin_config_user_prof_option_edit'		=> array('name' => '管理プロフィール項目選択肢編集'),
				'admin_config_user_prof_option_move_do'		=> array('name' => '管理プロフィール項目選択肢優先度更新実行処理'),
			),
		),
		contents => array(
			'name'		=> 'フリーページ管理',
			'contents'	=> array(
				'admin_contents_add_do'		=> array('name' => '管理フリーページ登録実行処理'),
				'admin_contents_add'		=> array('name' => '管理コンテンツ登録'),
				'admin_contents_delete_do'	=> array('name' => '管理フリーページ削除実行処理'),
				'admin_contents_edit_do'	=> array('name' => '管理フリーページ編集実行処理'),
				'admin_contents_edit'		=> array('name' => '管理フリーページ編集'),
				'admin_contents_list'		=> array('name' => '管理フリーページリスト'),
			),
		),
		decomail => array(
			'name'		=> 'デコメール管理',
			'contents'	=> array(
				'admin_decomail_add_do'		=> array('name' => '管理デコメール登録実行処理'),
				'admin_decomail_add'		=> array('name' => '管理デコメール登録'),
				'admin_decomail_delete_do'	=> array('name' => '管理デコメール削除実行処理'),
				'admin_decomail_edit_do'	=> array('name' => '管理デコメール編集実行処理'),
				'admin_decomail_edit'		=> array('name' => '管理デコメール編集'),
				'admin_decomail_list'		=> array('name' => '管理デコメール一覧'),
				'admin_import_decomail'		=> array('name' => '管理デコメールインポート実行処理'),
				'admin_decomailcategory_add_do'			=> array('name' => '管理デコメールカテゴリ登録実行処理'),
				'admin_decomailcategory_add'			=> array('name' => '管理デコメールカテゴリ登録'),
				'admin_decomailcategory_delete_do'		=> array('name' => '管理デコメールカテゴリ削除実行処理'),
				'admin_decomailcategory_edit_do'		=> array('name' => '管理デコメールカテゴリ編集実行処理'),
				'admin_decomailcategory_edit'			=> array('name' => '管理デコメールカテゴリ編集'),
				'admin_decomailcategory_list'			=> array('name' => '管理デコメールカテゴリ一覧'),
				'admin_decomailcategory_priority_do'	=> array('name' => '管理デコメールカテゴリ優先度更新実行処理'),
			),
		),
		ec => array(
			'name'		=> 'EC管理',
			'contents'	=> array(
				'admin_ec_config_edit_confirm'	=> array('name' => '管理EC基本情報編集確認'),
				'admin_ec_config_edit_do'		=> array('name' => '管理EC基本情報編集実行'),
				'admin_ec_config_edit'			=> array('name' => '管理EC基本情報編集'),
				'admin_ec_exchange_add_do'		=> array('name' => '管理代引き手数料追加実行'),
				'admin_ec_exchange_add'			=> array('name' => '管理代引き手数料登録'),
				'admin_ec_exchange_delete_do'	=> array('name' => '管理代引き手数料削除実行'),
				'admin_ec_exchange_edit_do'		=> array('name' => '管理代引き手数料編集実行'),
				'admin_ec_exchange_edit'		=> array('name' => '管理代引き手数料編集'),
				'admin_ec_exchange_list'		=> array('name' => '管理代引き手数料リスト'),
				'admin_ec_image'	=> array('name' => '画像出力'),
				'admin_ec_item_add_confirm'		=> array('name' => '管理商品追加確認'),
				'admin_ec_item_add_do'			=> array('name' => '管理商品登録実行'),
				'admin_ec_item_add'				=> array('name' => '管理商品登録'),
				'admin_ec_item_delete_do'		=> array('name' => '管理代引き手数料削除実行'),
				'admin_ec_item_edit_confirm'	=> array('name' => '管理商品編集確認'),
				'admin_ec_item_edit_do'			=> array('name' => '管理代引き手数料編集実行'),
				'admin_ec_item_edit'			=> array('name' => '管理商品編集'),
				'admin_ec_item_list'			=> array('name' => '管理商品リスト'),
				'admin_ec_item_priority_do'		=> array('name' => '管理商品優先度更新実行処理'),
				'admin_ec_itemcategory_add_confirm'		=> array('name' => '管理カテゴリ追加確認'),
				'admin_ec_itemcategory_add_do'			=> array('name' => '管理カテゴリ追加実行'),
				'admin_ec_itemcategory_add'				=> array('name' => '管理カテゴリ追加'),
				'admin_ec_itemcategory_delete_do'		=> array('name' => '管理カテゴリ削除実行'),
				'admin_ec_itemcategory_edit_confirm'	=> array('name' => '管理カテゴリ編集確認'),
				'admin_ec_itemcategory_edit_do'			=> array('name' => '管理カテゴリ編集実行'),
				'admin_ec_itemcategory_edit'			=> array('name' => '管理カテゴリ編集'),
				'admin_ec_itemcategory_list'			=> array('name' => '管理カテゴリリスト'),
				'admin_ec_itemcategory_priority_do'		=> array('name' => '管理商品カテゴリ優先度更新実行処理'),
				'admin_ec_postage_add_do'		=> array('name' => '管理送料登録実行'),
				'admin_ec_postage_add'			=> array('name' => '管理送料登録'),
				'admin_ec_postage_delete_do'	=> array('name' => '管理送料削除実行'),
				'admin_ec_postage_edit_do'		=> array('name' => '管理送料編集実行'),
				'admin_ec_postage_edit'			=> array('name' => '管理送料編集'),
				'admin_ec_postage_list'			=> array('name' => '管理送料リスト'),
				'admin_ec_review_delete_do'		=> array('name' => '管理レビュー削除実行処理'),
				'admin_ec_review_edit_do'		=> array('name' => '管理レビュー編集実行処理'),
				'admin_ec_review_edit'			=> array('name' => '管理レビュー編集'),
				'admin_ec_review_list'			=> array('name' => 'レビュー検索'),
				'admin_ec_shop_add_confirm'		=> array('name' => '管理ショップ追加確認'),
				'admin_ec_shop_add_do'			=> array('name' => '管理ショップ登録実行'),
				'admin_ec_shop_add'				=> array('name' => '管理ショップ登録'),
				'admin_ec_shop_delete_do'		=> array('name' => '管理ショップ削除実行'),
				'admin_ec_shop_edit_confirm'	=> array('name' => '管理ショップ編集確認'),
				'admin_ec_shop_edit_do'			=> array('name' => '管理ショップ編集実行'),
				'admin_ec_shop_edit'			=> array('name' => '管理ショップ編集'),
				'admin_ec_shop_list'			=> array('name' => '管理ショップリスト'),
				'admin_ec_shop_priority_do'		=> array('name' => '管理ショップ優先度更新実行処理'),
				'admin_ec_supplier_add_do'		=> array('name' => '管理仕入先登録実行'),
				'admin_ec_supplier_add'			=> array('name' => '管理仕入先登録'),
				'admin_ec_supplier_delete_do'	=> array('name' => '管理仕入先削除実行'),
				'admin_ec_supplier_detail'		=> array('name' => '管理仕入先詳細'),
				'admin_ec_supplier_edit_do'		=> array('name' => '管理仕入先編集実行'),
				'admin_ec_supplier_edit'		=> array('name' => '管理仕入先編集'),
				'admin_ec_supplier_list'		=> array('name' => '管理仕入先リスト'),
				'admin_ec_userorder_detail'		=> array('name' => '管理オーダー詳細'),
				'admin_ec_userorder_edit_do'	=> array('name' => '管理オーダー詳細編集実行'),
				'admin_ec_userorder_edit'		=> array('name' => '管理オーダー詳細編集'),
				'admin_ec_userorder_list'		=> array('name' => '管理オーダーリスト'),
			),
		),
		emoji => array(
			'name'		=> '絵文字管理',
			'contents'	=> array(
				'admin_emoji'	=> array('name' => '管理絵文字'),
				'admin_emojip'	=> array('name' => '管理絵文字'),
			),
		),
		file => array(
			'name'		=> 'ファイル管理',
			'contents'	=> array(
				'admin_file_get'			=> array('name' => '管理ファイル取得'),
				'admin_file_list'			=> array('name' => '管理ファイル一覧実行処理'),
				'admin_file_remove_confirm'	=> array('name' => '管理ファイル削除確認'),
				'admin_file_remove_do'		=> array('name' => '管理ファイル削除実行処理'),
				'admin_file'				=> array('name' => '管理ファイル管理画面'),
			),
		),
		game => array(
			'name'		=> 'ゲーム管理',
			'contents'	=> array(
				'admin_game_add_do'		=> array('name' => '管理ゲーム登録実行処理'),
				'admin_game_add'		=> array('name' => '管理ゲーム登録'),
				'admin_game_delete_do'	=> array('name' => '管理ゲーム削除実行処理'),
				'admin_game_edit_do'	=> array('name' => '管理ゲーム編集実行処理'),
				'admin_game_edit'		=> array('name' => '管理ゲーム編集'),
				'admin_game_list'		=> array('name' => '管理ゲーム一覧'),
				'admin_game_score_list'	=> array('name' => '管理ゲームスコア一覧'),
				'admin_gamecategory_add_do'			=> array('name' => '管理ゲームカテゴリ登録実行処理'),
				'admin_gamecategory_add'			=> array('name' => '管理ゲームカテゴリ登録'),
				'admin_gamecategory_delete_do'		=> array('name' => '管理ゲームカテゴリ削除実行処理'),
				'admin_gamecategory_edit_do'		=> array('name' => '管理ゲームカテゴリ編集実行処理'),
				'admin_gamecategory_edit'			=> array('name' => '管理ゲームカテゴリ編集'),
				'admin_gamecategory_list'			=> array('name' => '管理ゲームカテゴリ一覧'),
				'admin_gamecategory_priority_do'	=> array('name' => '管理ゲームカテゴリ優先度更新実行処理'),
			),
		),
		htmlltemplate => array(
			'name'		=> 'HTMLテンプレート管理',
			'contents'	=> array(
				'admin_htmltemplate_edit_do'	=> array('name' => '管理HTMLテンプレート編集実行'),
				'admin_htmltemplate_edit'		=> array('name' => '管理HTMLテンプレート編集'),
				'admin_htmltemplate_list'		=> array('name' => '管理HTMLテンプレート一覧'),
				'admin_htmltemplate_log'		=> array('name' => '管理HTMLテンプレートログ'),
			),
		),
		image => array(
			'name'		=> '画像管理',
			'contents'	=> array(
				'admin_image_list'	=> array('name' => '管理画像一覧実行処理'),
			),
		),
		movie => array(
			'name'		=> '動画管理',
			'contents'	=> array(
				'admin_movie_list'	=> array('name' => '管理動画一覧実行処理'),
			),
		),
		magazine => array(
			'name'		=> 'メルマガ管理',
			'contents'	=> array(
				'admin_magazine_add_do'		=> array('name' => '管理メルマガ登録実行処理'),
				'admin_magazine_add'		=> array('name' => '管理メルマガ登録'),
				'admin_magazine_delete_do'	=> array('name' => '管理メルマガ削除実行処理'),
				'admin_magazine_edit_do'	=> array('name' => '管理メルマガ編集実行処理'),
				'admin_magazine_edit'		=> array('name' => '管理メルマガ編集'),
				'admin_magazine_list'		=> array('name' => '管理メルマガ一覧'),
				'admin_magazine_stop_do'	=> array('name' => '管理メルマガ強制終了実行処理'),
			),
		),
		mailtemplate => array(
			'name'		=> 'メールテンプレート管理',
			'contents'	=> array(
				'admin_mailtemplate_add_do'		=> array('name' => '管理メールテンプレート登録'),
				'admin_mailtemplate_add'		=> array('name' => '管理メールテンプレート登録'),
				'admin_mailtemplate_delete_do'	=> array('name' => '管理メールテンプレート削除'),
				'admin_mailtemplate_edit_do'	=> array('name' => '管理メールテンプレート編集'),
				'admin_mailtemplate_edit'		=> array('name' => '管理メールテンプレート編集'),
				'admin_mailtemplate_list'		=> array('name' => '管理メールテンプレート一覧'),
			),
		),
		media => array(
			'name'		=> 'メディア管理',
			'contents'	=> array(
				'admin_media_add_do'	=> array('name' => '管理メディア登録実行処理'),
				'admin_media_add'		=> array('name' => '管理メディア登録'),
				'admin_media_day'		=> array('name' => '管理メディア集計'),
				'admin_media_delete_do'	=> array('name' => '管理メディア削除実行処理'),
				'admin_media_edit_do'	=> array('name' => '管理メディア編集実行処理'),
				'admin_media_edit'		=> array('name' => '管理メディア編集'),
				'admin_media_list'		=> array('name' => '管理メディア一覧'),
			),
		),
		message => array(
			'name'		=> 'メッセージ管理',
			'contents'	=> array(
				'admin_message_delete_do'	=> array('name' => '管理メッセージ削除実行処理'),
				'admin_message_list'		=> array('name' => '管理メッセージ一覧実行処理'),
			),
		),
		news => array(
			'name'		=> 'ニュース管理',
			'contents'	=> array(
				'admin_news_add_do'		=> array('name' => '管理ニュース登録実行処理'),
				'admin_news_add'		=> array('name' => '管理ニュース登録'),
				'admin_news_edit_do'	=> array('name' => '管理ニュース編集実行処理'),
				'admin_news_edit'		=> array('name' => '管理ニュース編集'),
				'admin_news_list'		=> array('name' => '管理ニュース一覧'),
				'admin_news_delete_do'	=> array('name' => '管理ニュース削除'),
			),
		),
		ngword => array(
			'name'		=> 'NGワード管理',
			'contents'	=> array(
				'admin_ngword_edit_do'	=> array('name' => '管理NGワード編集実行処理'),
				'admin_ngword_edit'		=> array('name' => '管理NGワード編集'),
			),
		),
		point => array(
			'name'		=> 'ポイント管理',
			'contents'	=> array(
				'admin_point_back'			=> array('name' => 'ポイントバック'),
				'admin_point_csv'			=> array('name' => '管理ポイント承認CSVアップロード'),
				'admin_point_exchange_list'	=> array('name' => '管理ポイント交換一覧'),
				'admin_point_home'			=> array('name' => '管理ポイント通帳'),
				'admin_point_list'			=> array('name' => '管理ポイント一覧'),
			),
		),
		ranking => array(
			'name'		=> 'ランキング管理',
			'contents'	=> array(
				'admin_ranking_list'	=> array('name' => '管理ランキング統計解析一覧実行処理'),
			),
		),
		report => array(
			'name'		=> '通報管理',
			'contents'	=> array(
				'admin_report_delete_do'	=> array('name' => '管理通報削除実行処理'),
				'admin_report_list'			=> array('name' => '管理通報一覧実行処理'),
			),
		),
		segment => array(
			'name'		=> 'セグメント管理',
			'contents'	=> array(
				'admin_segment_add_do'		=> array('name' => '管理セグメント登録実行処理'),
				'admin_segment_add'			=> array('name' => '管理セグメント登録'),
				'admin_segment_delete_do'	=> array('name' => '管理セグメント削除実行処理'),
				'admin_segment_edit_do'		=> array('name' => '管理セグメント編集実行処理'),
				'admin_segment_edit'		=> array('name' => '管理セグメント編集'),
				'admin_segment_list'		=> array('name' => '管理セグメント一覧'),
			),
		),
		sound => array(
			'name'		=> 'サウンド管理',
			'contents'	=> array(
				'admin_sound_add_do'	=> array('name' => '管理サウンド登録実行処理'),
				'admin_sound_add'		=> array('name' => '管理サウンド登録'),
				'admin_sound_delete_do'	=> array('name' => '管理サウンド削除実行処理'),
				'admin_sound_edit_do'	=> array('name' => '管理サウンド編集実行処理'),
				'admin_sound_edit'		=> array('name' => '管理サウンド編集'),
				'admin_sound_list'		=> array('name' => '管理サウンド一覧'),
				'admin_soundcategory_add_do'		=> array('name' => '管理サウンドカテゴリ登録実行処理'),
				'admin_soundcategory_add'			=> array('name' => '管理サウンドカテゴリ登録'),
				'admin_soundcategory_delete_do'		=> array('name' => '管理サウンドカテゴリ削除実行処理'),
				'admin_soundcategory_edit_do'		=> array('name' => '管理サウンドカテゴリ編集実行処理'),
				'admin_soundcategory_edit'			=> array('name' => '管理サウンドカテゴリ編集'),
				'admin_soundcategory_list'			=> array('name' => '管理サウンドカテゴリ一覧'),
				'admin_soundcategory_priority_do'	=> array('name' => '管理サウンドカテゴリ優先度更新実行処理'),
			),
		),
		video => array(
			'name'		=> 'ビデオ管理',
			'contents'	=> array(
				'admin_video_add_do'	=> array('name' => '管理ビデオ登録実行処理'),
				'admin_video_add'		=> array('name' => '管理ビデオ登録'),
				'admin_video_delete_do'	=> array('name' => '管理ビデオ削除実行処理'),
				'admin_video_edit_do'	=> array('name' => '管理ビデオ編集実行処理'),
				'admin_video_edit'		=> array('name' => '管理ビデオ編集'),
				'admin_video_list'		=> array('name' => '管理ビデオ一覧'),
				'admin_videocategory_add_do'		=> array('name' => '管理ビデオカテゴリ登録実行処理'),
				'admin_videocategory_add'			=> array('name' => '管理ビデオカテゴリ登録'),
				'admin_videocategory_delete_do'		=> array('name' => '管理ビデオカテゴリ削除実行処理'),
				'admin_videocategory_edit_do'		=> array('name' => '管理ビデオカテゴリ編集実行処理'),
				'admin_videocategory_edit'			=> array('name' => '管理ビデオカテゴリ編集'),
				'admin_videocategory_list'			=> array('name' => '管理ビデオカテゴリ一覧'),
				'admin_videocategory_priority_do'	=> array('name' => '管理ビデオカテゴリ優先度更新実行処理'),
			),
		),
		stats => array(
			'name'		=> '統計解析管理',
			'contents'	=> array(
				'admin_stats_list'	=> array('name' => '管理統計解析一覧実行処理'),
			),
		),
		user => array(
			'name'		=> 'ユーザ管理',
			'contents'	=> array(
				'admin_user_community_edit_do'	=> array('name' => '管理ユーザ参加コミュニティメンバー状態編集'),
				'admin_user_community_list'		=> array('name' => '管理ユーザ参加コミュニティ一覧'),
				'admin_user_edit_do'	=> array('name' => '管理ユーザ情報編集実行処理'),
				'admin_user_edit'		=> array('name' => '管理ユーザ編集'),
				'admin_user_list'		=> array('name' => '管理ユーザ一覧実行処理'),
				'admin_user_resign_do'	=> array('name' => '管理ユーザ強制退会実行処理'),
				'admin_user_transition'	=> array('name' => '管理ユーザ数推移表示'),
				'admin_user_friend_edit_do'					=> array('name' => '管理ユーザ友達状態編集'),
				'admin_user_friend_introduction_edit_do'	=> array('name' => '管理友達紹介文編集実行'),
				'admin_user_friend_introduction_edit'		=> array('name' => '管理友達紹介文編集'),
				'admin_user_friend_introduction_list'		=> array('name' => '管理友達紹介文一覧実行処理'),
				'admin_user_friend_list'					=> array('name' => '管理ユーザ友達一覧'),
			),
		),
		util => array(
			'name'		=> 'ユーティリティ管理',
			'contents'	=> array(
				'admin_util'	=> array('name' => '管理ユーティリティ'),
			),
		),
	),	
	/* =============================================
	// IP Address
	============================================= */
	'ip_au' => array(
		'210.169.40.0/24',
		'210.196.3.192/26',
		'210.196.5.192/26',
		'210.230.128.0/24',
		'210.230.141.192/26',
		'210.234.105.32/29',
		'210.234.108.64/26',
		'210.251.1.192/26',
		'210.251.2.0/27',
		'211.5.1.0/24',
		'211.5.2.128/25',
		'211.5.7.0/24',
		'218.222.1.0/24',
		'61.117.0.0/24',
		'61.117.1.0/24',
		'61.117.2.0/26',
		'61.202.3.0/24',
		'219.108.158.0/26',
		'219.125.148.0/24',
		'222.5.63.0/24',
		'222.7.56.0/24',
		'222.5.62.128/25',
		'222.7.57.0/24',
		'59.135.38.128/25',
		'219.108.157.0/25',
		'219.125.151.128/25',
		'219.125.145.0/25',
		'121.111.231.0/25',
		'121.111.231.160/27',
		),
		
	'ip_docomo' => array(
		'210.153.84.0/24',
		'210.136.161.0/24',
		'210.153.86.0/24',
		),
		
	'ip_softbank' => array(
		'210.172.116.0/24',	// Debug
		'123.108.236.0/24',
		'123.108.237.0/27',
		'202.179.204.0/24',
		'202.253.96.224/27',
		'210.146.7.192/26',
		'210.146.60.192/26',
		'210.151.9.128/26',
		'210.169.130.112/28',
		'210.175.1.128/25',
		'210.228.189.0/24',
		'211.8.159.128/25',
		),
		
	'ip_willcom' => array(
		'61.198.142.0/24',
		'61.198.161.0/24',
		'61.198.249.0/24',
		'61.198.250.0/24',
		'61.198.253.0/24',
		'61.198.254.0/24',
		'61.198.255.0/24',
		'61.204.3.0/25',
		'61.204.4.0/24',
		'61.204.6.0/25',
		'125.28.4.0/24',
		'125.28.5.0/24',
		'125.28.6.0/24',
		'125.28.7.0/24',
		'125.28.8.0/24',
		'211.18.235.0/24',
		'211.18.238.0/24',
		'211.18.239.0/24',
		'125.28.11.0/24',
		'125.28.12.0/24',
		'125.28.2.0/24',
		'211.18.232.0/24',
		'211.18.236.0/24',
		'125.28.0.0/24',
		'61.204.0.0/24',
		'210.168.247.0/24',
		'61.204.2.0/24',
		'61.198.129.0/24',
		'61.198.141.0/24',
		'61.198.165.0/24',
		'61.198.168.0/24',
		'61.198.170.0/24',
		'125.28.16.0/24',
		'211.18.234.0/24',
		'219.108.9.0/24',
		'61.198.138.100/32',
		'61.198.138.102/32',
		'61.198.139.128/27',
		'61.198.139.0/29',
		'219.108.14.0/24',
		'219.108.0.0/24',
		'219.108.1.0/24',
		'219.108.2.0/24',
		'219.108.3.0/24',
		'219.108.4.0/24',
		'219.108.5.0/24',
		'219.108.6.0/24',
		'221.119.0.0/24',
		'221.119.1.0/24',
		'221.119.2.0/24',
		'221.119.3.0/24',
		'221.119.4.0/24',
		'221.119.5.0/24',
		'221.119.6.0/24',
		'221.119.7.0/24',
		'221.119.8.0/24',
		'221.119.9.0/24',
		'125.28.13.0/24',
		'125.28.14.0/24',
		'125.28.3.0/24',
		'211.18.233.0/24',
		'211.18.237.0/24',
		'125.28.1.0/24',
		'210.168.246.0/24',
		'219.108.7.0/24',
		'61.204.5.0/24',
		'61.198.140.0/24',
		'125.28.15.0/24',
		'61.198.166.0/24',
		'61.198.169.0/24',
		'61.198.248.0/24',
		'125.28.17.0/24',
		'219.108.8.0/24',
		'219.108.10.0/24',
		'61.198.138.101/32',
		'61.198.139.160/28',
		'61.198.138.103/32',
		'219.108.15.0/24',
		'61.198.130.0/24',
		'61.198.163.0/24',
		),
);

// 基本設定項目に拡張設定項目をマージする
require_once BASE . '/etc/profile-ini.php';
$config = array_merge_recursive($config, $profile);
require_once BASE . '/etc/point-ini.php';
$config = array_merge_recursive($config, $point);

?>