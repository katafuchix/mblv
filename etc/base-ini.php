<?php
/**
 * base-ini.php
 * �١�������
 * 
 * @author Technovarth
 * @package MBLV
 */

//��ȯ�Ķ�
if(dirname(__FILE__) == '/home/htdocs/mblv/etc'){
	// �ƥ�ץ졼�ȼ���
	define('TEMPLATE','default');
	// �᡼�륢������ȤΥץ�ե��å���
	define('MAIL_PREFIX','mblv');
	// �桼������URL
	define('USER_URL', 'http://mblv.varth.jp/');
	// ��������
	define('ADMIN_URL', 'http://mblv.varth.jp/admin/');
	// �ե�����URL
	define('FILE_URL', 'http://mblv.varth.jp/contents/');
	// ��ʸ������URL
	define('EMOJI_URL', 'http://mblv.varth.jp/img_emoji/');
	// �ᥤ��DB
	define('DB_SNSV', 'mblv');
	// �ᥤ��DNS
	define('DSN', 'mysql://mblv:pcicgi@localhost/'.DB_SNSV);
	// ���ײ���DB
	define('DB_SNSV_STATS', 'mblv_stats');
	// ���ײ���DNS
	define('DSN_STATS', 'mysql://mblv:pcicgi@localhost/'.DB_SNSV_STATS);
	// �᡼��ɥᥤ��
	define('MAIL_DOMAIN', 'varth.jp');
	// PERL���ޥ�ɥѥ�
	define('PERL_PATH', '/usr/local/bin/perl');
	// �ƥ�ݥ��ǥ��쥯�ȥ�ѥ�
	define('TMP_PATH', 'tmp');
	// ���᡼���ޥ��å��ѥ�
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	// EC�⡼��ȥå�URL
	define('MALL_URL', 'http://mblv.varth.jp/?action_user_ec=true');
	// SSL�ΰ�URL
	define('SSL_URL', 'http://mblv.varth.jp/');
	// ��ѥ����Хۥ���
	define('PAYMENT_HOST', 'http://varth.jp');//	define('PAYMENT_HOST', 'https://ssl.f-regi.com');
	// ��ѥ����Хѥ�
	define('PAYMENT_PATH', '/payment/');//	define('PAYMENT_PATH', '/connect/');//	define('PAYMENT_PATH', '/connecttest/');
	// ��ѥ����Х�����ץȡ�AUTH��
	define('PAYMENT_SCRIPT_AUTH', 'auth.php');//	define('PAYMENT_SCRIPT_AUTH', 'auth.cgi');
	// ��ѥ����Х�����ץȡ�CONVORDER��
	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.php');//	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.cgi');
	// ��ѥ����Х������AUTH��
	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');//	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');
	// ��ѥ����Х������CONVORDER��
	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');//	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');
	
	// ���å�����Ǽ�ѥ��ʥǥ��쥯�ȥꡧ�ե����륻�å����IP/�ɥᥤ��memcached���å�����
	ini_set('session.save_path', 'localhost');
	// ���å������¸����
	ini_set('session.gc_maxlifetime', 28800);
}

//mazblv��ȯ�Ķ�
elseif(dirname(__FILE__) == '/home/htdocs/mazblv.biew.jp/etc'){
	// �ƥ�ץ졼�ȼ���
	define('TEMPLATE','default');
	// �᡼�륢������ȤΥץ�ե��å���
	define('MAIL_PREFIX','mazblv');
	// �桼������URL
	define('USER_URL', 'http://mazblv.biew.jp/');
	// ��������
	define('ADMIN_URL', 'http://mazblv.biew.jp/admin/');
	// �ե�����URL
	define('FILE_URL', 'http://mazblv.biew.jp/contents/');
	// ��ʸ������URL
	define('EMOJI_URL', 'http://mazblv.biew.jp/img_emoji/');
	// �ᥤ��DB
	define('DB_SNSV', 'mazblv');
	// �ᥤ��DNS
	define('DSN', 'mysql://mazblv:mazblvmaccoda@localhost/'.DB_SNSV);
	// ���ײ���DB
	define('DB_SNSV_STATS', 'mazblv_stats');
	// ���ײ���DNS
	define('DSN_STATS', 'mysql://mazblv:mazblvmaccoda@localhost/'.DB_SNSV_STATS);
	// �᡼��ɥᥤ��
	define('MAIL_DOMAIN', 'biew.jp');
	// PERL���ޥ�ɥѥ�
	define('PERL_PATH', '/usr/local/bin/perl');
	// �ƥ�ݥ��ǥ��쥯�ȥ�ѥ�
	define('TMP_PATH', 'tmp');
	// ���᡼���ޥ��å��ѥ�
	define('IMAGEMAGICK_PATH', '/usr/local/bin/convert');
	// EC�⡼��ȥå�URL
	define('MALL_URL', 'http://mazblv.biew.jp/?action_user_ec=true');
	// SSL�ΰ�URL
	define('SSL_URL', 'http://mazblv.biew.jp/');
	// ��ѥ����Хۥ���
	define('PAYMENT_HOST', 'http://biew.jp');//	define('PAYMENT_HOST', 'https://ssl.f-regi.com');
	// ��ѥ����Хѥ�
	define('PAYMENT_PATH', '/payment/');//	define('PAYMENT_PATH', '/connect/');//	define('PAYMENT_PATH', '/connecttest/');
	// ��ѥ����Х�����ץȡ�AUTH��
	define('PAYMENT_SCRIPT_AUTH', 'auth.php');//	define('PAYMENT_SCRIPT_AUTH', 'auth.cgi');
	// ��ѥ����Х�����ץȡ�CONVORDER��
	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.php');//	define('PAYMENT_SCRIPT_CONVORDER', 'convorder.cgi');
	// ��ѥ����Х������AUTH��
	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');//	define('PAYMENT_QUERY_AUTH', 'SHOPID=10497');
	// ��ѥ����Х������CONVORDER��
	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');//	define('PAYMENT_QUERY_CONVORDER', 'SHOPID=10498');
	
	// ���å�����Ǽ�ѥ��ʥǥ��쥯�ȥꡧ�ե����륻�å����IP/�ɥᥤ��memcached���å�����
	ini_set('session.save_path', 'localhost');
	// ���å������¸����
	ini_set('session.gc_maxlifetime', 28800);
}

// ���꤬¸�ߤ��ʤ����
else{
	echo 'UNKNOWNFILE';
	@error_log(__FILE__.__LINE__, 1, 'mblv@ml.technovarth.jp');
	exit;
}
?>