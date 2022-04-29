<?php
/**
 * tv-ini.php
 * アプリケーション設定
 * 
 * @author Technovarth
 * @package SNSV
 */

// ftpの定義
$ftp = array();
if(dirname(__FILE__) == '/var/www/napatown.jp/htdocs/snsv/etc'){
	$ftp = array(
		'1'  => array(
			'host' => '203.191.227.161',
			'user' => 'ntcont',
			'pass' => '7wtVTke2',
		),
		'2'  => array(
			'host' => '203.191.227.162',
			'user' => 'ntcont',
			'pass' => '7wtVTke2',
		),
		'3'  => array(
			'host' => '203.191.227.163',
			'user' => 'ntcont',
			'pass' => '7wtVTke2',
		),
	);
}

$config = array(
	// [debug]
	// (to enable ethna_info and ethna_unittest, turn this true)
	'debug' => false,
	
	// [db]
	'dsn'		=> DSN,
	'dsn_stats'	=> DSN_STATS,
	'dsn_spgv'	=> DSN_SPGV,
	
	// [log]
 	// sample-1: sigile facility
//	'log_facility'		=> 'echo',
//	'log_level'		=> 'notice',
//	'log_level'		=> 'warning',
//	'log_option'		=> 'pid,function,pos',
//	'log_filter_do'		=> '',
//	'log_filter_ignore'	=> 'Undefined index.*%%.*tpl',
	'log_option'		=> 'pid,function,pos',
	'log_filter_do'		=> '',
	'log_filter_ignore'	=> 'Undefined index.*%%.*tpl',
	
	// sample-2: mulitple facility
	'log' => array(
		//画面表示
		'echo'  => array(
//			'level'         => 'emerg',
			//'level'         => 'alert',
			//'level'         => 'crit',
			//'level'         => 'err',
			'level'         => 'warning',
			//'level'         => 'notice',
			//'level'         => 'info',
			//'level'         => 'debug',
		),
		//ファイルで保存
//		'file'  => array(
//			'level'         => 'notice',
//			'file'          => '/var/log/snsv.log',//※0777で作成しておく必要があります
//			'mode'          => 0666,
//		),
//		'alertmail'  => array(
//			'level'         => 'warning',
//			'mailaddress'   => 'snsvml@technovarth.co.jp',
//			),
//		),
	),
	
	'log_option'		=> 'pid,function,pos',
	'log_filter_do'		=> '',
	'log_filter_ignore'	=> 'Undefined index.*%%.*tpl',
	
	// [memcache]
	// sample-1: single (or default) memcache
	// 'memcache_host' => 'localhost',
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
	
	// [csrf]
	'csrf' => 'Session',
	
	// [url]
	'base_url'		=> BASE_URL,
	'user_url'		=> USER_URL,
	'admin_url'		=> ADMIN_URL,
	'login_url'		=> USER_URL . '?action_user_login=true',
	'regist_url'	=> USER_URL . '?action_user_regist=true',
	'spgv_url'		=> SPGV_URL,
	'file_url'		=> FILE_URL,
	'redirect_url'	=> 'fp.php?code=guide_mail',
	'master_csv_dir'		=> TMP_PATH.'/',
		
	// [ftp]
	'ftp' => $ftp,
	
	// [tag]システムで自動変換するタグ
	'tag' => array(
		'login_url' => array(
			'name' => 'ログインURL',
		),
		'sns_name' => array(
			'name' => 'SNS名',
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
	'tag_cut' => '##',
	
	// [mail]
	// メールドメイン
	'mail_domain' => MAIL_DOMAIN,
	// エラーメール配信停止数
	'mail_error_count' => 1,// エラーメールが1通発生したユーザへは一斉配送メールを送信しない
	// smtp用パラメタ
	'mail_smtp' => array(
		'host'		=> '202.210.130.91',
		'port'		=> 10025,
		'auth'		=> false,
//		'username'	=> "xxx@xxx.xxx.xx",
//		'password'	=> "xxxxx"
	),
	// メール送信元メールアドレス
	'from_mailaddress' => 'napatown-mag@'. MAIL_DOMAIN,
	// メールマガジン用メールアドレス
	'magazine_mailaddress' => 'napatown-mag@' . MAIL_DOMAIN,
	// サポート用メールアドレス
	'support_mailaddress' => 'napatown@spaceout.jp',
	// 管理者メールアドレス
	'admin_mailaddress' => 'fujimori@technovarth.co.jp',
	// エラーメール送信先
	'snsvml_mailaddress' => 'snsvml@technovarth.co.jp',
	// システムで使用するメールテンプレート
	'mail_template' => array(
		'user_regist'				=> array(
			'name'	=> '会員登録メール',
		),
		'user_regist_done'			=> array(
			'name' => '会員登録完了メール',
		),
		'user_already_member_error'		=> array(
			'name' => '会員登録時既に会員エラーメール',
		),
		'user_forbidden_member_error'		=> array(
			'name' => '会員登録時強制退会エラーメール',
		),
		'user_change_mailaddress_done'	=> array(
			'name' => 'メールアドレス変更完了メール',
		),
		'user_change_mailaddress_error'	=> array(
			'name' => 'メールアドレス変更エラーメール',
		),
		'user_remind'				=> array(
			'name' => 'パスワード請求メール',
		),
		'user_invite'				=> array(
			'name' => '友達招待メール',
		),
		'user_got_message'			=> array(
			'name' => 'メッセージ受信通知メール',
		),
		'user_friend_apply'			=> array(
			'name' => '友達申請メール',
		),
		'user_bbs'				=> array(
			'name' => '伝言板書き込み通知メール',
		),
		'user_image_success'				=> array(
			'name' => '画像投稿完了メール',
		),
		'user_image_error'				=> array(
			'name' => '画像投稿失敗メール',
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
	
	// [login]
	'master_id' => 'mobile',
	'master_password' => 'sns',
	
	
	// [emoji]
	'emoji_path' => BASE . '/data/emoji/',
	'emoji_url' => EMOJI_URL,
	
	// [file]
	'admin_file_path' => BASE . '/public_admin/',
	'file_path' => BASE . '/contents/',
	'image_path' => BASE . '/contents/image/',
	// 全画面画像サイズ
	'image_a_width' => 240,
	'image_a_height' => 320,
	// スモール面画像サイズ
	'image_s_width' => 120,
	'image_s_height' => 160,
	// サムネイル面画像サイズ
	'image_t_width' => 100,
	'image_t_height' => 120,
	// アイコン面画像サイズ
	'image_i_width' => 40,
	'image_i_height' => 40,
	// アイコン画像有効
	'image_i_enable' => true,
	// NOIMAGE画像
	'noimage' => 'img/image001.jpg',
	// マイ画像アバター有効
	'mi_enable' => false,
	// perl
	'perl_path' => PERL_PATH,
	// imagemagick
	'imagemagick_path' => IMAGEMAGICK_PATH,
	// ffmpeg
	'ffmpeg_path' => '/usr/local/bin/ffmpeg',
	// flvtool2
	'flvtool2_path' => '/usr/local/bin/flvtool2',
	// ユーザがアップロード可能な容量
	'file_max_size' => 10000000,//10000000バイト＝1000K＝1M
	//'file_max_size' => 0,//0＝制限なし
	
	// media経由アクセスのログ保存ディレクトリ
	'media_log_path' => MEDIA_LOG_PATH,
	// pointbackのログ保存ディレクトリ
	'pointback_log_path' => POINTBACK_LOG_PATH,
	
	// mobileのみ登録、メール受信可能設定
	'mobile_only' => false,
	
	'mime_types' => array(
		'gif' => 'image/gif',
		'jpg' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'png' => 'image/png',
		'bmp' => 'image/bmp',
//		'3g2' => 'video/3gpp2',
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
	
	// 年齢制限
	'user_age_min' => 20,
	
	// ユーザプロフィール設定項目
	'profile' => array(
		// 性別
		'user_sex'						=> true,
		// 誕生日
		'user_birth_date'				=> true,
		// 地域（都道府県）
		'prefecture_id'					=> true,
		// 地域（住所）
		'user_address'					=> false,
		// 地域（建物名）
		'user_address_building'			=> false,
		// 血液型
		'user_blood_type'				=> true,
		// 職種
		'job_family_id'					=> true,
		// 業種
		'business_category_id'			=> true,
		// 結婚
		'user_is_married'				=> true,
		// 子供
		'user_has_children'				=> true,
		// 勤務地
		'work_location_prefecture_id'	=> true,
		// 趣味
		'user_hobby'					=> false,
		// URL
		'user_url'						=> false,
		// 自己紹介
		'user_introduction'				=> true,
	),
	// ユーザプロフィール設定項目
	'profile_required' => array(
		// 性別
		'user_sex'						=> true,
		// 誕生日
		'user_birth_date'				=> true,
		// 地域（都道府県）
		'prefecture_id'					=> true,
		// 地域（住所）
		'user_address'					=> false,
		// 地域（建物名）
		'user_address_building'			=> false,
		// 血液型
		'user_blood_type'				=> true,
		// 職種
		'job_family_id'					=> false,
		// 業種
		'business_category_id'			=> false,
		// 結婚
		'user_is_married'				=> false,
		// 子供
		'user_has_children'				=> false,
		// 勤務地
		'work_location_prefecture_id'	=> false,
		// 趣味
		'user_hobby'					=> false,
		// URL
		'user_url'						=> false,
		// 自己紹介
		'user_introduction'				=> true,
	),
	// ユーザプロフィール公開項目
	'profile_public' => array(
		// 性別
		'user_sex'						=> true,
		// 誕生日
		'user_birth_date'				=> true,
		// 地域
		'user_address'					=> true,
		// 血液型
		'user_blood_type'				=> true,
		// 職種
		'job_family_id'					=> true,
		// 業種
		'business_category_id'			=> true,
		// 結婚
		'user_is_married'				=> true,
		// 子供
		'user_has_children'				=> true,
		// 勤務地
		'work_location_prefecture_id'	=> true,
		// 趣味
		'user_hobby'					=> true,
		// URL
		'user_url'						=> true,
		// 自己紹介
		'user_introduction'				=> true,
	),
	
	// [stats]
	'stats_rotate' => 21,
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
		'image'				=> array('name' => '画像'),
		'movie'				=> array('name' => '動画'),
		'contents'			=> array('name' => 'フリーページ'),
		'login'				=> array('name' => 'ログイン'),
	),
	'stats_score' => array(
		'view'		=> array('name' => '閲覧',			'bar' => '#7fffbf'),
		'uu'		=> array('name' => 'ユニーク',		'bar' => '#ffbf7f'),
		'regist'	=> array('name' => '登録',			'bar' => '#ffff7f'),
		'mail'		=> array('name' => 'メール',		'bar' => '#bf7fff'),
		'access'	=> array('name' => 'アクセス',		'bar' => '#7fffff'),
		'click'		=> array('name' => 'クリック',		'bar' => '#7fff7f'),
		'send'		=> array('name' => '成果',			'bar' => '#ff7fbf'),
		'resign'	=> array('name' => '退会',			'bar' => '#A9A9A9'),
		'login'		=> array('name' => 'ログイン',		'bar' => '#ffccff'),
	),
	
	// 都道府県一覧
	'prefecture_id' => array(
		'0' => array('name' => '未設定'),
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
		'0' => array('name' => '未設定'),
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
		'0' => array('name' => '未設定'),
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
	
	// option
	'option' => array(
		'avatar'		=> true,
		'point'		=> true,
		'decomail'	=> true,
		'game'		=> true,
		'sound'		=> true,
		'novel'		=> false,
		'comic'		=> false,
		'movie'		=> false,
		'ngword'	=> true,
		'precheck'	=> false,
		'guest'		=> true,
	),
	
	// avatar
	// アバター性別種別
	'avatar_sex_type' => array(
		'' => array('name' => '共通用'),
		'1' => array('name' => '男性用'),
		'2' => array('name' => '女性用'),
	),
	// 全画面画像サイズ
//	'avatar_a_width' => 240,
//	'avatar_a_height' => 320,
	// スモール面画像サイズ
	'avatar_s_width' => 100,
	'avatar_s_height' => 160,
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
	'avatar_system' => array(
/*		1 => array('name' => '基本パーツ'),
		2 => array('name' => '表情'),
		3 => array('name' => '背景'),
		4 => array('name' => 'ヘアー'),
		5 => array('name' => 'ワンピース'),
		6 => array('name' => 'トップファッション'),
		7 => array('name' => 'ボトムファッション'),
		8 => array('name' => 'アクセサリー'),
		9 => array('name' => '背景アクセサリー'),
		10 => array('name' => '前景アクセサリー'),
		11 => array('name' => 'ペット'),
*/
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
	
	// twitter / blog
	'twitter_status' => array(
		0 => array('name' => '通常日記'),
		1 => array('name' => 'ナパボード'),
	),
		
	// twitter_title
	'twitter_title' => '【ﾅﾊﾟﾎﾞｰﾄﾞ】',
	// [point]
	// ポイント最大値
	'point_max' => 500000,
	// ポイント<=>円の換金レート
	'point_price_rates' => 1,
	// ポイントタイプ
	'point_type' => array(
		// SNS
		1 => array('name' => 'SNS管理調整'),
		2 => array('name' => 'クリック広告'),// ad.ad_type=1
		3 => array('name' => '登録広告'),// ad.ad_type=2
		4 => array('name' => '料率広告'),// ad.ad_type=3
		5 => array('name' => 'アバター'),
		6 => array('name' => 'デコメール'),
		7 => array('name' => 'ゲーム'),
		8 => array('name' => 'サウンド'),
		9 => array('name' => '入会経路'),
		10 => array('name' => 'SNS会員登録'),
		11 => array('name' => 'SNS友達招待(招待)'),
		12 => array('name' => 'SNS友達招待(被招待)'),
		13 => array('name' => 'サイトアクセス'),
		// EC
		101 => array('name' => 'EC管理調整'),
		102 => array('name' => 'EC会員登録'),
		103 => array('name' => 'EC購買'),
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
		'site_access'	=> 13,
	),
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
	
	// user_status
	'user_status' => array(
		1 => array('name' =>'仮登録'),
		2 => array('name' => '本登録'),
		3 => array('name' => '退会'),
		4 => array('name' => '強制退会'),
	),
	
	'user_guest_status' => array(
		0 => array('name' => 'いいえ'),
		1 => array('name' => 'はい'),
		2 => array('name' => 'スタッフ'),
	),
	
	'user_carrier' => array(
		1 => array('name' => 'docomo'),
		2 => array('name' => 'au'),
		3 => array('name' => 'SoftBank'),
	),
		
	// image_status
	'image_status' => array(
		'' => array('name' => '変更しない'),
		'edit' => array('name' => '変更する'),
		'delete' => array('name' => '削除する'),
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
		0 => array('name' => '非表示'),
		1 => array('name' => '表示'),
	),
	
	// regist_status
	'regist_status' => array(
		0 => array('name' => '無効'),
		1 => array('name' => '有効'),
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
		1 => array('name' => 'トップ'),
		2 => array('name' => 'アバター'),
		3 => array('name' => 'デコメール'),
		4 => array('name' => 'ゲーム'),
		5 => array('name' => 'サウンド'),
	),
	
	// media
	// アバター設定別
	'media_avatar' => array(
		'0' => array('name' => 'アバター設定無し'),
		'1' => array('name' => 'アバター設定有り'),
	),
	
	// IP Address
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
?>