<?php
/**
 * base-ini.php
 * ベース設定
 * 
 * @author Technovarth
 * @package MBLV
 */

//開発環境
if(dirname(__FILE__) == '/home/htdocs/mblv/etc'){
	// テンプレート種別
	define('TEMPLATE','default');
	// メールアカウントのプレフィックス
	define('MAIL_PREFIX','mblv');
	// ユーザ画面URL
	define('USER_URL', 'http://mblv.varth.jp/');
	// 管理画面
	define('ADMIN_URL', 'http://mblv.varth.jp/admin/');
	// ファイルURL
	define('FILE_URL', 'http://mblv.varth.jp/contents/');
	// 絵文字画像URL
	define('EMOJI_URL', 'http://mblv.varth.jp/img_emoji/');
	// メインDB
	define('DB_SNSV', 'mblv');
	// メインDNS
	define('DSN', 'mysql://mblv:pcicgi@localhost/'.DB_SNSV);
	// 統計解析DB
	define('DB_SNSV_STATS', 'mblv_stats');
	// 統計解析DNS
	define('DSN_STATS', 'mysql://mblv:pcicgi@localhost/'.DB_SNSV_STATS);
	// メールドメイン
	define('MAIL_DOMAIN', 'varth.jp');
	// PERLコマンドパス
	define('PERL_PATH', '/usr/local/bin/perl');
	// テンポラリディレクトリパス
	define('TMP_PATH', 'tmp');
	// イメージマジックパス
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	// ECモールトップURL
	define('MALL_URL', 'http://mblv.varth.jp/?action_user_ec=true');
	// SSL領域URL
	define('SSL_URL', 'http://mblv.varth.jp/');
	// 決済サーバホスト
	define('PAYMENT_HOST', 'http://varth.jp');//	define('PAYMENT_HOST', 'https://ssl.f-regi.com');
	// 決済サーバパス
	define('PAYMENT_PATH', '/payment/');//	define('PAYMENT_PATH', '/connect/');//	define('PAYMENT_PATH', '/connecttest/');
	// 決済サーバスクリプト（AUTH）
	define('PAYMENT_SCRIPT_AUTH', 'auth.php');//	define('PAYMENT_SCRIPT_AUTH', 'auth.cgi');
	// 決済サーバスクリプト（CONVORDER）
	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.php');//	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.cgi');
	// 決済サーバクエリ（AUTH）
	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');//	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');
	// 決済サーバクエリ（CONVORDER）
	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');//	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');
	
	// セッション格納パス（ディレクトリ：ファイルセッション、IP/ドメイン：memcachedセッション）
	ini_set('session.save_path', 'localhost');
	// セッション生存時間
	ini_set('session.gc_maxlifetime', 28800);
}

//mazblv開発環境
elseif(dirname(__FILE__) == '/home/htdocs/mazblv.biew.jp/etc'){
	// テンプレート種別
	define('TEMPLATE','default');
	// メールアカウントのプレフィックス
	define('MAIL_PREFIX','mazblv');
	// ユーザ画面URL
	define('USER_URL', 'http://mazblv.biew.jp/');
	// 管理画面
	define('ADMIN_URL', 'http://mazblv.biew.jp/admin/');
	// ファイルURL
	define('FILE_URL', 'http://mazblv.biew.jp/contents/');
	// 絵文字画像URL
	define('EMOJI_URL', 'http://mazblv.biew.jp/img_emoji/');
	// メインDB
	define('DB_SNSV', 'mazblv');
	// メインDNS
	define('DSN', 'mysql://mazblv:mazblvmaccoda@localhost/'.DB_SNSV);
	// 統計解析DB
	define('DB_SNSV_STATS', 'mazblv_stats');
	// 統計解析DNS
	define('DSN_STATS', 'mysql://mazblv:mazblvmaccoda@localhost/'.DB_SNSV_STATS);
	// メールドメイン
	define('MAIL_DOMAIN', 'biew.jp');
	// PERLコマンドパス
	define('PERL_PATH', '/usr/local/bin/perl');
	// テンポラリディレクトリパス
	define('TMP_PATH', 'tmp');
	// イメージマジックパス
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	// ECモールトップURL
	define('MALL_URL', 'http://mazblv.biew.jp/?action_user_ec=true');
	// SSL領域URL
	define('SSL_URL', 'http://mazblv.biew.jp/');
	// 決済サーバホスト
	define('PAYMENT_HOST', 'http://biew.jp');//	define('PAYMENT_HOST', 'https://ssl.f-regi.com');
	// 決済サーバパス
	define('PAYMENT_PATH', '/payment/');//	define('PAYMENT_PATH', '/connect/');//	define('PAYMENT_PATH', '/connecttest/');
	// 決済サーバスクリプト（AUTH）
	define('PAYMENT_SCRIPT_AUTH', 'auth.php');//	define('PAYMENT_SCRIPT_AUTH', 'auth.cgi');
	// 決済サーバスクリプト（CONVORDER）
	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.php');//	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.cgi');
	// 決済サーバクエリ（AUTH）
	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');//	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');
	// 決済サーバクエリ（CONVORDER）
	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');//	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');
	
	// セッション格納パス（ディレクトリ：ファイルセッション、IP/ドメイン：memcachedセッション）
	ini_set('session.save_path', 'localhost');
	// セッション生存時間
	ini_set('session.gc_maxlifetime', 28800);
}

// 設定が存在しない場合
else{
	echo 'UNKNOWNFILE';
	@error_log(__FILE__.__LINE__, 1, 'mblv@ml.technovarth.jp');
	exit;
}
?>