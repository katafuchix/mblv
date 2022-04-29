<?php
/**
 * base-ini.php
 * ベース設定
 * 
 * @author Technovarth
 * @package SNSV
 */
// napatown.jp
if(dirname(__FILE__) == '/var/www/napatown.jp/htdocs/snsv/etc'){
	define('TEMPLATE','napa');
	define('MAIL_PREFIX','nts');
	define('BASE_URL', 'http://napatown.jp/');
	define('USER_URL', 'http://napatown.jp/');
	define('ADMIN_URL', 'http://admin.napatown.jp/');
	define('EMOJI_URL', 'http://napatown.jp/img_emoji/');
	define('FILE_URL', 'http://napatown.jp/file/');
	define('SPGV_URL', 'http://m.napatown.jp/?guid=ON&autologin=true');
/*
	define('DB_SNSV', 'napatownsns');
	define('DSN', 'mysql://snsv:snsvpasu80@varth.jp/'.DB_SNSV);
	define('DB_SNSV_STATS', 'napatownsns_stats');
	define('DSN_STATS', 'mysql://snsv:snsvpasu80@varth.jp/'.DB_SNSV_STATS);
	define('DB_SPGV', 'so');
	define('DSN_SPGV', 'mysql://so:sopasu80@varth.jp/'.DB_SPGV);
*/
	define('DB_SNSV', 'napatownsns');
	define('DSN', 'mysql://napatownsns:pqu45mysm8@192.168.0.10/'.DB_SNSV);
	define('DB_SNSV_STATS', 'napatownsns_stats');
	define('DSN_STATS', 'mysql://napatownsns:pqu45mysm8@192.168.0.10/'.DB_SNSV_STATS);
	define('DB_SPGV', 'napatownec');
	define('DSN_SPGV', 'mysql://napatownec:vnoieqwe75@192.168.0.10/'.DB_SPGV);

	define('MAIL_DOMAIN', 'napatown.jp');
	define('PERL_PATH', '/usr/bin/perl');
	define('IMAGEMAGICK_PATH', '/usr/bin/convert');
//	define('TMP_PATH', '/home/technovarth/tmp_snsv');
	define('TMP_PATH', '/var/tmp/snsv');
//	define('MEDIA_LOG_PATH', '/home/technovarth/log_snsv/media/');
	define('MEDIA_LOG_PATH', '/var/tmp/snsv_log/media/');
//	define('POINTBACK_LOG_PATH', '/home/technovarth/log_snsv/pb/');
	define('POINTBACK_LOG_PATH', '/var/tmp/snsv_log/pb/');
	
//	ini_set('session.save_path', 'varth.jp');
	ini_set('session.save_path', 'vega.spaceout-inc.jp');
//	ini_set('session.save_path', '203.191.117.161');
	
	ini_set('session.gc_maxlifetime', 28800);
}
// napa
if(__FILE__ == '/home/htdocs/napatownsns/etc/base-ini.php'){
	define('TEMPLATE','napa');
	define('MAIL_PREFIX','nts');
	define('BASE_URL', 'http://napatownsns-user.varth.jp/');
	define('USER_URL', 'http://napatownsns-user.varth.jp/');
	define('ADMIN_URL', 'http://napatownsns-admin.varth.jp/');
	define('EMOJI_URL', 'http://napatownsns-emoji.varth.jp/');
	define('FILE_URL', 'http://varth.jp/napatownsns/contents/');
	define('SPGV_URL', 'http://napatownec-mall.varth.jp/?guid=ON');
	define('DB_SNSV', 'napatownsns');
	define('DSN', 'mysql://snsv:snsvpasu80@localhost/'.DB_SNSV);
	define('DB_SNSV_STATS', 'napatownsns_stats');
	define('DSN_STATS', 'mysql://snsv:snsvpasu80@localhost/'.DB_SNSV_STATS);
	define('DB_SPGV', 'so');
	define('DSN_SPGV', 'mysql://so:sopasu80@localhost/'.DB_SPGV);
	define('MAIL_DOMAIN', 'varth.jp');
	define('PERL_PATH', '/usr/local/bin/perl');
	define('TMP_PATH', 'tmp');
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	define('MEDIA_LOG_PATH', BASE . '/log/media/');
	define('POINTBACK_LOG_PATH', BASE . '/log/pb/');
	
	ini_set('session.gc_maxlifetime', 28800);
}
// デフォルト
else{
//	define('TEMPLATE','default');
	define('TEMPLATE','napa');
	define('MAIL_PREFIX','snsv');
	define('BASE_URL', 'http://snsvuser.varth.jp/');
	define('USER_URL', 'http://snsvuser.varth.jp/');
	define('ADMIN_URL', 'http://snsvadmin.varth.jp/');
	define('EMOJI_URL', 'http://snsvemoji.varth.jp/');
	define('FILE_URL', 'http://varth.jp/snsv/contents/');
	define('SPGV_URL', 'http://napatownec-mall.varth.jp/?guid=ON');
	define('DB_SNSV', 'snsv');
	define('DSN', 'mysql://snsv:snsvpasu80@localhost/'.DB_SNSV);
	define('DB_SNSV_STATS', 'snsv_stats');
	define('DSN_STATS', 'mysql://snsv:snsvpasu80@localhost/'.DB_SNSV_STATS);
	define('DB_SPGV', 'so');
	define('DSN_SPGV', 'mysql://so:sopasu80@localhost/'.DB_SPGV);
	define('MAIL_DOMAIN', 'varth.jp');
	define('PERL_PATH', '/usr/local/bin/perl');
	define('TMP_PATH', 'tmp');
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	define('MEDIA_LOG_PATH', BASE . '/log/media/');
	define('POINTBACK_LOG_PATH', BASE . '/log/pb/');
	
	ini_set('session.gc_maxlifetime', 28800);
}
?>
