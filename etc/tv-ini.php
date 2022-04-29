<?php
/**
 * tv-ini.php
 * ���ץꥱ�����������
 * 
 * @author Technovarth
 * @package MBLV
 */

/* =============================================
// FTP�����
============================================= */
$ftp = array(
	'1'  => array(
		'host' => 'varth.jp',
		'user' => 'mblv_contents',
		'pass' => 'HTk3JU3pwn9V1',
	),
);

/* =============================================
// ������������
============================================= */
$config = array(
	/* =============================================
	// �ǥХå�����
	// (to enable ethna_info and ethna_unittest, turn this true)
	============================================= */
	'debug' => false,
	
	/* =============================================
	// DB����
	============================================= */
	// main DSN
	'dsn'		=> DSN,
	// stats DSN
	'dsn_stats'	=> DSN_STATS,
	
	/* =============================================
	// sample-2: mulitple facility
	============================================= */
	'log' => array(
		//����ɽ��
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
		//�ե��������¸
		'file'  => array(
			'level'         => 'warning',
			'file'          => BASE . '/log/ethna.log',//��0777�Ǻ������Ƥ���ɬ�פ�����ޤ�
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
	// ήư���ι⤤�������
	============================================= */
	// �ޥ��������Х���ͭ������
	'mi_enable'			=> false,
	// mobile�Τ���Ͽ���᡼�������ǽ����
	'mobile_only'		=> false,
	
	/* =============================================
	// [url]
	============================================= */
	// �桼������URL
	'user_url'			=> USER_URL,
	// ��������URL
	'admin_url'			=> ADMIN_URL,
	// �桼�����������URL
	'login_url'			=> USER_URL . '?action_user_login=true',
	// �桼����Ͽ����URL
	'regist_url'		=> USER_URL . '?action_user_regist=true',
	// �ե�����URL
	'file_url'			=> FILE_URL,
	// ��ʸ��URL
	'emoji_url'			=> EMOJI_URL,
	// ������쥯��URL
	'redirect_url'		=> 'fp.php?code=system_regist',
	
	/* =============================================
	// ��ѥ���������
	============================================= */
	// ��ѥ����Хۥ���
	'payment_host'				=> PAYMENT_HOST,
	// ��ѥ����Хѥ�
	'payment_path'				=> PAYMENT_PATH,
	// ��ѥ����Х�����ץȡ�AUTH��
	'payment_script_auth'		=> PAYMENT_SCRIPT_AUTH,
	// ��ѥ����Х�����ץȡ�CONVORDER��
	'payment_script_convorder'	=> PAYMENT_SCRIPT_CONVORDER,
	// ��ѥ����Х������AUTH��
	'payment_query_auth'		=> PAYMENT_QUERY_AUTH,
	// ��ѥ����Х������CONVORDER��
	'payment_query_convorder'	=> PAYMENT_QUERY_CONVORDER,
	
	/* =============================================
	// [tag]
	============================================= */
	// ��ư�Ѵ����륿��
	'tag' => array(
		'login_url' => array(
			'name' => '������URL',
		),
		'support_mailaddress' => array(
			'name' => '���ݡ��ȥ᡼�륢�ɥ쥹',
		),
		'regist_url' => array(
			'name' => '�����ϿURL',
		),
		'user_password' => array(
			'name' => '���ᤵ�줿�ѥ����',
		),
		'from_user_nickname' => array(
			'name' => '���Ը��桼���˥å��͡���',
		),
		'to_user_nickname' => array(
			'name' => '�᡼��������桼���˥å��͡���',
		),
		'to_user_mailaddress' => array(
			'name' => '�᡼��������᡼�륢�ɥ쥹',
		),
		'invite_message' => array(
			'name' => '���ԥ�å�����',
		),
	),
	// �������ѥ졼��
	'tag_cut' => '##',
	
	/* =============================================
	// [mail]
	============================================= */
	// �᡼��ɥᥤ��
	'mail_domain' => MAIL_DOMAIN,
	// ���顼�᡼���ۿ���߿�(���顼�᡼�뤬1��ȯ�������桼���ؤϰ��������᡼����������ʤ�)
	'mail_error_count' => 1,
	// smtp�ѥѥ�᥿
	'mail_smtp' => array(
		'host'		=> '202.210.130.91',
		'port'		=> 10025,
		'auth'		=> false,
	),
	// �᡼���������᡼�륢�ɥ쥹
	'from_mailaddress' => 'mblv@'. MAIL_DOMAIN,
	// �᡼��ޥ������ѥ᡼�륢�ɥ쥹
	'magazine_mailaddress' => 'mblv@' . MAIL_DOMAIN,
	// ���ݡ����ѥ᡼�륢�ɥ쥹
	'support_mailaddress' => 'mblv@ml.technovarth.jp',
	// �����ԥ᡼�륢�ɥ쥹
	'admin_mailaddress' => 'mblv@ml.technovarth.jp',
	
	// �߸˴����᡼����from���������
	'stock_alert_from_mailaccount' => 'mblv@ml.technovarth.jp',
	// �߸˴����᡼����to���������
	'stock_alert_to_mailaccount' => 'mblv@ml.technovarth.jp',
	// ���ʹ�����ǧ�᡼��Υ��ԡ�������
	'user_order_copy_mailaddress' => 'mblv@ml.technovarth.jp',
	// ethna���顼���顼�������襢�ɥ쥹
	'log_alertmail_mailaddress' => 'mblv@ml.technovarth.jp',
	// ���ʤˤĤ��ƤΤ��䤤��碌��᡼�륢�ɥ쥹
	'item_info_mailaddress' => 'mblv@ml.technovarth.jp',
	
	//�߸˴����᡼�� 1:1���ڤ�ȥ��顼��
	'stock_alert_num'	=> '1',
	// �����ƥ�ǻ��Ѥ���᡼��ƥ�ץ졼��
	'mail_template' => array(
		'user_regist' => array(
			'name'	=> '�����Ͽ�᡼��',
		),
		'user_regist_done' => array(
			'name' => '�����Ͽ��λ�᡼��',
		),
		'user_already_member_error' => array(
			'name' => '�����Ͽ�����˲�����顼�᡼��',
		),
		'user_forbidden_member_error' => array(
			'name' => '�����Ͽ��������񥨥顼�᡼��',
		),
		'user_change_mailaddress_done' => array(
			'name' => '�᡼�륢�ɥ쥹�ѹ���λ�᡼��',
		),
		'user_change_mailaddress_error' => array(
			'name' => '�᡼�륢�ɥ쥹�ѹ����顼�᡼��',
		),
		'user_remind' => array(
			'name' => '�ѥ��������᡼��',
		),
		'user_invite' => array(
			'name' => 'ͧã���ԥ᡼��',
		),
		'user_got_message' => array(
			'name' => '��å������������Υ᡼��',
		),
		'user_friend_apply' => array(
			'name' => 'ͧã�����᡼��',
		),
		'user_bbs' => array(
			'name' => '�����Ľ񤭹������Υ᡼��',
		),
		'user_image_success' => array(
			'name' => '������ƴ�λ�᡼��',
		),
		'user_image_error' => array(
			'name' => '������Ƽ��ԥ᡼��',
		),
		'user_community_join' => array(
			'name'	=> '���ߥ�˥ƥ����ÿ����᡼��',
		),
		'alert' => array(
			'name'	=> '���顼��',
		),
		'user_order'  => array(
			'name' =>'��ʸ��ǧ�᡼�� �ƥ����ѥǡ���',
		),
		'user_order1' => array(
			'name' => '��ʸ��ǧ�᡼�� ���쥸�å�',
		),
		'user_order2' => array(
			'name' => '��ʸ��ǧ�᡼�� ����ӥ�',
		),
		'user_order3' => array(
			'name' => '��ʸ��ǧ�᡼�� �����',
		),
		'user_order4' => array(
			'name' => '��ʸ��ǧ�᡼�� ��Կ���',
		),
		'stock_alert' => array(
			'name' => '���ʴ���᡼��' ,
		),
		'user_review' => array(
			'name' => '���ʥ�ӥ塼����᡼��' ,
		),
		'user_regist_finish' => array(
			'name' => '�����Ͽ��λ' ,
		),
		'user_community_join_ok' => array(
			'name'	=> '���ߥ�˥ƥ����þ�ǧ�᡼��',
		),
		'user_community_join_ng' => array(
			'name'	=> '���ߥ�˥ƥ����õ��ݥ᡼��',
		),
		'item_sent1' => array(
			'name'	=> '����ȯ���᡼��1(ľ�ܽв�)',
		),
		'item_sent2' => array(
			'name'	=> '����ȯ���᡼��2(Ǽ�ʸ�в�)',
		),
		'stock_alert' => array(
			'name'	=> '���䥢�顼�ȥ᡼��',
		),
		'user_movie_success' => array(
			'name' => 'ư����ƴ�λ�᡼��',
		),
		'user_movie_error' => array(
			'name' => 'ư����Ƽ��ԥ᡼��',
		),
	),
	// �����ƥ�ǻ��Ѥ���᡼�륢�������
	'mail_account' => array(
		// �������顼�ѥ᡼�륢�������
		'error' => array(
			'account' => MAIL_PREFIX.'-error',
			'subject' => '',
			'body' => '',
		),
		// �����Ͽ�ѥ᡼�륢�������
		'regist' => array(
			'account' => MAIL_PREFIX.'-reg',
			'subject' => '�����Ͽ',
			'body' => '���ΤޤގҎ��٤��������Ƥ�������',
		),
		// �᡼�륢�ɥ쥹�ѹ����������
		'change' => array(
			'account' => MAIL_PREFIX.'-cm',
			'subject' => '�Ҏ��َ��Ďގڎ��ѹ�',
			'body' => '���ΤޤގҎ��٤��������Ƥ�������',
		),
		// �����ϩ�����ѥ��������
		'media' => array(
			'account' => MAIL_PREFIX.'-mn',
			'subject' => '�����ϩ����',
			'body' => '���ΤޤގҎ��٤��������Ƥ�������',
		),
		// ������
		// ��ʬ�β����ѥ᡼�륢�������
		'my_image' => array(
			'account' => MAIL_PREFIX.'-myi',
			'subject' => '�����ѹ�',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// �����β����ѥ᡼�륢�������
		'blog_article_image' => array(
			'account' => MAIL_PREFIX.'-bai',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���������Ȳ����ѥ᡼�륢�������
		'blog_comment_image' => array(
			'account' => MAIL_PREFIX.'-bci',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���ߥ�˥ƥ��β����ѥ᡼�륢�������
		'community_image' => array(
			'account' => MAIL_PREFIX.'-ci',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���ߥ�˥ƥ������β����ѥ᡼�륢�������
		'community_article_image' => array(
			'account' => MAIL_PREFIX.'-cai',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���ߥ�˥ƥ����������Ȥβ����ѥ᡼�륢�������
		'community_comment_image' => array(
			'account' => MAIL_PREFIX.'-cci',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ��å������β����ѥ᡼�륢�������
		'message_image' => array(
			'account' => MAIL_PREFIX.'-mei',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// �����β����ѥ᡼�륢�������
		'bbs_image' => array(
			'account' => MAIL_PREFIX.'-bi',
			'subject' => '�������',
			'body' => '���Τޤ޲�����ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ư���
		// ������ư���ѥ᡼�륢�������
		'blog_article_movie' => array(
			'account' => MAIL_PREFIX.'-bam',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ����������ư���ѥ᡼�륢�������
		'blog_comment_movie' => array(
			'account' => MAIL_PREFIX.'-bcm',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���ߥ�˥ƥ�������ư���ѥ᡼�륢�������
		'community_article_movie' => array(
			'account' => MAIL_PREFIX.'-cam',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ���ߥ�˥ƥ����������Ȥ�ư���ѥ᡼�륢�������
		'community_comment_movie' => array(
			'account' => MAIL_PREFIX.'-ccm',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ��å�������ư���ѥ᡼�륢�������
		'message_movie' => array(
			'account' => MAIL_PREFIX.'-mem',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
		// ������ư���ѥ᡼�륢�������
		'bbs_movie' => array(
			'account' => MAIL_PREFIX.'-bm',
			'subject' => 'ư�����',
			'body' => '���Τޤ�ư���ź�դ��ƎҎ��٤��������Ƥ�������',
		),
	),
	
	/* =============================================
	// [file path]
	============================================= */
	// �������̥ե�����ѥ�
	'admin_file_path'		=> BASE . '/public_admin/',
	// ���̥ե�����ѥ�
	'file_path'				=> BASE . '/public_file/',
	// �����ե�����ѥ�
	'image_path'			=> BASE . '/public_file/image/',
	// ư��ե�����ѥ�
	'movie_path'			=> BASE . '/public_file/movie/',
	// perl �ѥ�
	'perl_path'				=> PERL_PATH,
	// imagemagick �ѥ�
	'imagemagick_path'		=> IMAGEMAGICK_PATH,
	// ffmpeg �ѥ�
	'ffmpeg_path'			=> '/usr/local/bin/ffmpeg',
	// flvtool2 �ѥ�
	'flvtool2_path'			=> '/usr/local/bin/flvtool2',
	// ��ʸ���ѥ�
	'emoji_path'			=> BASE . '/data/emoji/',
	
	/* =============================================
	// �����̲���
	============================================= */
	// ��������
	'image_a_width' => 240,
	// �ĥ�����
	'image_a_height' => 320,
	
	/* =============================================
	// ���⡼���̲���
	============================================= */
	// ��������
	'image_s_width' => 120,
	// �ĥ�����
	'image_s_height' => 160,
	
	/* =============================================
	// ����ͥ����̲���
	============================================= */
	// ��������
	'image_t_width' => 100,
	// �ĥ�����
	'image_t_height' => 120,
	
	/* =============================================
	// ���������̲���
	============================================= */
	// ��������
	'image_i_width' => 40,
	// �ĥ�����
	'image_i_height' => 40,
	// �����������ͭ��
	'image_i_enable' => true,
	
	/* =============================================
	// ���Х�������
	============================================= */
	// ���⡼���̲���������
	'avatar_s_width' => 100,
	'avatar_s_height' => 160,
	'avatar_s_base_x' => 0,
	'avatar_s_base_y' => 0,
	'avatar_s_base_w' => 100,
	'avatar_s_base_h' => 160,
	// ����ͥ����̲���������
	'avatar_t_width' => 60,
	'avatar_t_height' => 80,
	'avatar_t_base_x' => 40,
	'avatar_t_base_y' => 20,
	'avatar_t_base_w' => 120,
	'avatar_t_base_h' => 160,
	// ���������̲���������
	'avatar_i_width' => 32,
	'avatar_i_height' => 32,
	'avatar_i_base_x' => 36,
	'avatar_i_base_y' => 32,
	'avatar_i_base_w' => 128,
	'avatar_i_base_h' => 128,
	
	/* =============================================
	// �ե���������
	============================================= */
	// NOIMAGE�����ѥ�
	'noimage'			=> 'noimage_%attr%.jpg',
	// �桼�������åץ��ɲ�ǽ�����̤κ��祵����
	'file_max_size'		=> 10000000,//10000000�Х��ȡ�1000K��1M
	//'file_max_size'	=> 0,//0�����¤ʤ�
	// MIME������
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
	// stats������
	'stats_type' => array(
		'access'			=> array('name' => '��������'),
		'blog'				=> array('name' => '�桼������'),
		'blog_article'		=> array('name' => '����'),
		'community'			=> array('name' => '���ߥ�˥ƥ�'),
		'community_article'	=> array('name' => '���ߥ�˥ƥ��ȥԥå�'),
		'ad'				=> array('name' => '����'),
		'banner'			=> array('name' => '�Хʡ�'),
		'media'				=> array('name' => '�����ϩ'),
		'avatar'			=> array('name' => '���Х���'),
		'decomail'			=> array('name' => '�ǥ��᡼��'),
		'game'				=> array('name' => '������'),
		'sound'				=> array('name' => '�������'),
//		'image'				=> array('name' => '����'),
//		'movie'				=> array('name' => 'ư��'),
		'contents'			=> array('name' => '�ե꡼�ڡ���'),
		'invite'			=> array('name' => 'ͧã����'),
		'item'				=> array('name' => '����'),
	),
	// stats������
	'stats_score' => array(
		'view'		=> array('name' => '����',			'bar' => '#7fffbf'),
		'dl'		=> array('name' => 'DL',			'bar' => '#7fffbf'),
		'uu'		=> array('name' => '��ˡ���',		'bar' => '#ffbf7f'),
		'regist'	=> array('name' => '��Ͽ',			'bar' => '#ffff7f'),
		'mail'		=> array('name' => '�᡼��',		'bar' => '#bf7fff'),
		'access'	=> array('name' => '��������',		'bar' => '#7fffff'),
		'click'		=> array('name' => '����å�',		'bar' => '#7fff7f'),
		'send'		=> array('name' => '����',			'bar' => '#ff7fbf'),
		'resign'	=> array('name' => '���',			'bar' => '#A9A9A9'),
		'buy'		=> array('name' => '����',			'bar' => '#bdb76b'),
	),
	
	/* =============================================
	// ��ǽ����
	============================================= */
	// option
	'option' => array(
		// ���Х����ѥå�����
		'avatar'			=> true,
		// �ݥ���ȥѥå�����
		'point'				=> true,
		// �ݥ���ȸ򴹥��ץ����
		'point_exchange'	=> true,
		// �ǥ��᡼��ѥå�����
		'decomail'			=> true,
		// ������ѥå�����
		'game'				=> true,
		// ������ɥѥå�����
		'sound'				=> true,
		// ���Ӿ���ѥå�����
		'novel'				=> false,
		// ���ߥå��ѥå�����
		'comic'				=> false,
		// ư��ѥå�����
		'movie'				=> true,
		// NG��ɥ��ץ����
		'ngword'			=> true,
		// ��ǧ��ƥ��ץ����
		'precheck'			=> false,
		// ��������
		'guest'				=> true,
		// DOCOMO����
		'official_d'		=> true,
		// AU����
		'official_a'		=> true,
		// SOFTBANK����
		'official_s'		=> true,
		// ư���ۿ�
		'video'				=> true,
	),
	
	/* =============================================
	// �ե��������ʤʤɤ�ɽ������
	============================================= */
	// ��ƻ�ܸ�����
	'prefecture_id' => array(
		'' => array('name' => '̤����'),
		'1' => array('name' => '�̳�ƻ'),
		'2' => array('name' => '�Ŀ���'),
		'3' => array('name' => '��긩'),
		'4' => array('name' => '���ĸ�'),
		'5' => array('name' => '�ܾ븩'),
		'6' => array('name' => '������'),
		'7' => array('name' => 'ʡ�縩'),
		'8' => array('name' => '��븩'),
		'9' => array('name' => '���ڸ�'),
		'10' => array('name' => '���ϸ�'),
		'11' => array('name' => '��̸�'),
		'12' => array('name' => '���ո�'),
		'13' => array('name' => '�����'),
		'14' => array('name' => '�����'),
		'15' => array('name' => '���㸩'),
		'16' => array('name' => '�ٻ���'),
		'17' => array('name' => '���'),
		'18' => array('name' => 'ʡ�温'),
		'19' => array('name' => 'Ĺ�'),
		'20' => array('name' => '������'),
		'21' => array('name' => '�Ų���'),
		'22' => array('name' => '���θ�'),
		'23' => array('name' => '���츩'),
		'24' => array('name' => '���Ÿ�'),
		'25' => array('name' => '���츩'),
		'26' => array('name' => '������'),
		'27' => array('name' => '�����'),
		'28' => array('name' => 'ʼ�˸�'),
		'29' => array('name' => '���ɸ�'),
		'30' => array('name' => '�²λ���'),
		'31' => array('name' => 'Ļ�踩'),
		'32' => array('name' => '�纬��'),
		'33' => array('name' => '������'),
		'34' => array('name' => '���縩'),
		'35' => array('name' => '������'),
		'36' => array('name' => '���'),
		'37' => array('name' => '���縩'),
		'38' => array('name' => '��ɲ��'),
		'39' => array('name' => '���θ�'),
		'40' => array('name' => 'ʡ����'),
		'41' => array('name' => '��ʬ��'),
		'42' => array('name' => '���츩'),
		'43' => array('name' => 'Ĺ�긩'),
		'44' => array('name' => '�ܺ긩'),
		'45' => array('name' => '���ܸ�'),
		'46' => array('name' => '�����縩'),
		'47' => array('name' => '���츩'),
		'48' => array('name' => '����'),
	),
	
	// �������
	'job_family_id' => array(
		'1' => array('name' => '��Ұ�'),
		'2' => array('name' => '��̳��'),
		'3' => array('name' => '���Ķ�'),
		'4' => array('name' => '��ͳ��'),
		'5' => array('name' => '�ɸ��Ұ�'),
		'6' => array('name' => '�ʎߎ��Ď����َʎގ���'),
		'7' => array('name' => '����'),
		'8' => array('name' => '�Ȼ�������'),
		'9' => array('name' => '��ȼ���'),
		'10' => array('name' => '̵��'),
	),
	
	// �ȼ����
	'business_category_id' => array(
		'1' => array('name' => '���ѷ�'),
		'2' => array('name' => '���؎����Î��̎޷�'),
		'3' => array('name' => '�����ˎގ��������'),
		'4' => array('name' => '���翦��'),
		'5' => array('name' => '��������̳��'),
		'6' => array('name' => '�����ˎގ���'),
		'7' => array('name' => '�����������'),
		'8' => array('name' => '����ع���'),
//		'9' => array('name' => '�⹻���������'),
//		'10' => array('name' => '������'),
		'11' => array('name' => '���ӿ建'),
		'12' => array('name' => '����'),
		'13' => array('name' => '̵��'),
		'14' => array('name' => '����¾'),
	),
	
	// ��շ�����
	'user_blood_type' => array(
		'1' => array('name' => 'A��'),
		'2' => array('name' => 'B��'),
		'3' => array('name' => 'O��'),
		'4' => array('name' => 'AB��'),
	),
	
	// �뺧
	'user_is_married' => array(
		'1' => array('name' => '����'),
		'0' => array('name' => '̤��'),
	),
	
	// �Ҷ�
	'user_has_children' => array(
		'1' => array('name' => '����'),
		'0' => array('name' => '���ʤ�'),
	),
	
	// ����
	'user_sex' => array(
		'1' => array('name' => '����'),
		'2' => array('name' => '����'),
	),
	
	// HTML�ƥ�ץ졼���Խ����ơ�����
	'html_template_edit' => array(
		'0' => array('name' => '�Խ���Ǥʤ�'),
		'1' => array('name' => '�Խ���'),
	),
	
	// �Хʡ�������
	'banner_type' => array(
		'txt'	=> array("name" => '�ƥ�����'),
		'jpg'	=> array("name" => 'JPEG'),
		'gif'	=> array("name" => 'GIF'),
		'png'	=> array("name" => 'PNG'),
	),
	
	// avatar
	// ���Х������̼���
	'avatar_sex_type' => array(
		'' => array('name' => '������'),
		'1' => array('name' => '������'),
		'2' => array('name' => '������'),
	),
	
	'avatar_system' => array(
		1 => array('name' => '��'),
		2 => array('name' => '��'),
		3 => array('name' => 'ȱ'),
		4 => array('name' => '���ȥåץ�'),
		5 => array('name' => '���ܥȥॹ'),
		6 => array('name' => '�����ԡ���'),
		7 => array('name' => '������ʡ�'),
		8 => array('name' => '��ʪ'),
		9 => array('name' => '������'),
		10 => array('name' => '����������'),
		11 => array('name' => '��ƻ��'),
		12 => array('name' => '�ڥå�'),
		13 => array('name' => '�ط�'),
		14 => array('name' => '��Х����ƥ�'),
		15 => array('name' => '�����'),
		16 => array('name' => '�ʰ���'),
		17 => array('name' => '�ü쥢���ƥ�'),
		18 => array('name' => '����������'),
		19 => array('name' => '���̤����'),
		20 => array('name' => '�����륤����'),
	),
	
	// blog_article
	'blog_article_public' => array(
		1 => array('name' => '����'),
		0 => array('name' => '�����'),
		2 => array('name' => 'ͧã�ޤǸ���'),
	),
	
	// [ad]
	// ���𥿥���
	'ad_type' => array(
		1 => array('name' => '��󥯥�å�'),
		2 => array('name' => '��Ͽ'),
		3 => array('name' => '����'),
	),
	// ����ɽ��������
	'ad_display_type' => array(
		1 => array('name' => 'WEB'),
		2 => array('name' => 'MAIL'),
	),
	
	// �ݥ���ȥ����׸���������
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
	
	// �ݥ���ȥ��ơ�����
	'point_status' => array(
		0 => array('name' => '�Ѳ�'),
		1 => array('name' => '̤��ǧ'),
		2 => array('name' => '��ǧ�Ѥ�'),
	),
	
	// cms
	'cms_type' => array(
		1 => array('type' => 'ad',			'name' => '����'),
		2 => array('type' => 'avatar',		'name' => '���Х���'),
		3 => array('type' => 'decomail',	'name' => '�ǥ��᡼��'),
		4 => array('type' => 'game',		'name' => '������'),
		5 => array('type' => 'sound',		'name' => '�������'),
	),
	// config
	'site_type' => array(
		'config' 	=> array('type' => 'config',	'name' => '����'),
		'ad' 		=> array('type' => 'ad',		'name' => '����'),
		'avatar' 	=> array('type' => 'avatar',	'name' => '���Х���'),
		'decomail' 	=> array('type' => 'decomail',	'name' => '�ǥ��᡼��'),
		'game' 		=> array('type' => 'game',		'name' => '������'),
		'sound' 	=> array('type' => 'sound',		'name' => '�������'),
		'mall' 		=> array('type' => 'sound',		'name' => 'EC'),
	),
	
	// user_status
	'user_status' => array(
		1 => array('name' =>'����Ͽ'),
		2 => array('name' => '����Ͽ'),
		3 => array('name' => '���'),
		4 => array('name' => '�������'),
	),
	
	// user_guest_status
	'user_guest_status' => array(
		0 => array('name' => '������'),
		1 => array('name' => '�Ϥ�'),
	),
	
	// user_carrier
	'user_carrier' => array(
		1 => array('name' => 'DOCOMO'),
		2 => array('name' => 'AU'),
		3 => array('name' => 'SOFTBANK'),
	),
	
	// image_status
	'image_status' => array(
		0 => array('name' => '�ѹ����ʤ�'),
		1 => array('name' => '�ѹ�����'),
		2 => array('name' => '�������'),
	),
	
	// file_status
	'file_status' => array(
		1 => array('name' => 'ͭ��'),
		0 => array('name' => '����Ѥ�'),
		2 => array('name' => '�����ͤˤ�äƺ���Ѥ�'),
	),
	
	// friend_status
	'friend_status' => array(
		1 => array('name' => '������'),
		2 => array('name' => 'ͧã'),
		3 => array('name' => 'ͧã�ǤϤʤ�'),
	),
	
	// data_status
	'data_status' => array(
		1 => array('name' => 'ɽ��'),
		0 => array('name' => '��ɽ��'),
	),
	
	// regist_status
	'regist_status' => array(
		1 => array('name' => 'ͭ��'),
		0 => array('name' => '̵��'),
	),
	
	// item_start_status
	'item_start_status' => array(
		1 => array('name' => 'ͭ��'),
		2 => array('name' => '̵��'),
	),
	
	// admin_status
	'admin_status' => array(
		1 => array('name' => '�̾������'),
		2 => array('name' => '�ø�������'),
	),
	
	// receive_status
	'receive_status' => array(
		1 => array('name' => '��������'),
		0 => array('name' => '�������ʤ�')
	),
	
	// data_checked
	'data_checked' => array(
		0 => array('name' => '̤'),
		1 => array('name' => '��'),
	),
	
	// public_status
	'public_status' => array(
		0 => array('name' => '�����'),
		1 => array('name' => '����'),
		"" => array('name' => '����'),
	),
	
	// community_join_condition
	'community_join_condition' => array(
		1 => array('name' => 'ï�Ǥ⻲�äǤ���ʸ�����'),
		2 => array('name' => '�����ͤξ�ǧ��ɬ�סʸ�����'),
		3 => array('name' => '�����ͤξ�ǧ��ɬ�ס��������'),
	),
	
	// community_member_status
	'community_member_status' => array(
		0 => array('name' => '���С�������'),
		1 => array('name' => '���С�'),
		2 => array('name' => '������'),
		3 => array('name' => '�����;�ǧ�Ԥ�'),
	),
	
	// community_topic_permission
	'community_topic_permission' => array(
		1 => array('name' => '���üԤ������Ǥ���'),
		2 => array('name' => '�����ͤΤߺ����Ǥ���'),
	),
	
	// news
	'news_type' => array(
		6 => array('name' => '�ȥå�'),
		1 => array('name' => '����'),
		2 => array('name' => '���Х���'),
		3 => array('name' => '�ǥ��᡼��'),
		4 => array('name' => '������'),
		5 => array('name' => '�������'),
	),
	// user_mail_ok
	'user_mail_ok' => array(
		0 => array('name' => '�������ʤ�'),
		1 => array('name' => '�������'),
	),
	// image_status
	'image_status' => array(
		'0'	=> array('name' => "�ѹ����ʤ�"),
		'1'	=> array('name' => "�ѹ�����"),
		'2'	=> array('name' => "�������"),
	),
	// ��������������
	'user_order_type' => array(
		'' => array('name' => "���ꤷ�ʤ�"),
		'1' => array('name' => "���쥸�å�"),
		'2' => array('name' => "����ӥ�"),
		'3' => array('name' => "�����"),
		'4' => array('name' => "��Կ���"),
	),
	// ����ӥ˷��Ź��
	'user_order_conveni_type' => array(
		'seveneleven' 	=> array('name' => "���֥󥤥�֥�"),
		'famima' 		=> array('name' => "�ե��ߥ꡼�ޡ���"),
		'lawson' 		=> array('name' => "������"),
		'seicomart' 	=> array('name' => "���������ޡ���"),
	),
	// ����ӥ˻���
	'user_order_conveni_type_user' => array(
		'seveneleven' 	=> array('name' => "���̎ގݎڎ̎ގ�"),
		'famima' 		=> array('name' => "�̎��Ў؎��ώ���"),
		'lawson' 		=> array('name' => "�ێ�����"),
		'seicomart' 	=> array('name' => "���������ώ���"),
	),
	// �����ȥ��ơ�����
	'cart_status' => array(
		'' => array('name' => "���ꤷ�ʤ�"),
		'0' => array('name' => "̤���"),
		'1' => array('name' => "��ʸ�Ѥ�"),
		'2' => array('name' => "��ѺѤ�"),
		'3' => array('name' => "ȯ���Ѥ�"),
		'4' => array('name' => "���ʺѤ�"),
		'5' => array('name' => "����󥻥�"),
	),
	// post_unit_sent_status
	'post_unit_sent_status' => array(
		'0' => array('name' => "̤ȯ��"),
		'1' => array('name' => "ȯ���Ѥ�"),
	),
	// review_status
	'review_status' => array(
		0 => array('name' => '���'),
		1 => array('name' => '�ۿ��Ԥ�'),
		2 => array('name' => '����Ԥ�'),
		3 => array('name' => 'ͭ��'),
	),
	
	// ���쥸�åȥ����ɼ���
	'card_type' => array(
		'1' =>array( 'name' => "VISA"),
		'2' =>array( 'name' => "JCB"),
		'3' =>array( 'name' => "AMEX"),
		'4' =>array( 'name' => "MASTER"),
		//'5' =>array( 'name' => "DINERS"),
	),
	
	// ��ã������
	'delivery_date' => array(
		'0' => array('name' => "���ꤷ�ʤ�"),
		'1' => array('name' => "������"),
		'2' => array('name' => "11-14��"),
		'3' => array('name' => "14-16��"),
		'4' => array('name' => "16-18��"),
		'5' => array('name' => "18-21��"),
	),
	
	// ȯ��������
	'delivery_type' => array(
		'1' =>array( 'name' => "��Ͽ�������������"),
		'2' =>array( 'name' => "��Ͽ�����ʳ��ν��������"),
	),
	
	// �����ϰ�
	'region_id' => array(
		'' => array('name' => '��ƻ�ܸ�'),
		'1' => array('name' => '�̳�ƻ'),
		'2' => array('name' => '�Ŀ���'),
		'3' => array('name' => '��긩'),
		'4' => array('name' => '���ĸ�'),
		'5' => array('name' => '�ܾ븩'),
		'6' => array('name' => '������'),
		'7' => array('name' => 'ʡ�縩'),
		'8' => array('name' => '��븩'),
		'9' => array('name' => '���ڸ�'),
		'10' => array('name' => '���ϸ�'),
		'11' => array('name' => '��̸�'),
		'12' => array('name' => '���ո�'),
		'13' => array('name' => '�����'),
		'14' => array('name' => '�����'),
		'15' => array('name' => '���㸩������'),
		'16' => array('name' => '���㸩'),
		'17' => array('name' => '�ٻ���'),
		'18' => array('name' => '���'),
		'19' => array('name' => 'ʡ�温'),
		'20' => array('name' => 'Ĺ�'),
		'21' => array('name' => '������'),
		'22' => array('name' => '�Ų���'),
		'23' => array('name' => '���θ�'),
		'24' => array('name' => '���츩'),
		'25' => array('name' => '���Ÿ�'),
		'26' => array('name' => '���츩'),
		'27' => array('name' => '������'),
		'28' => array('name' => '�����'),
		'29' => array('name' => 'ʼ�˸�'),
		'30' => array('name' => '���ɸ�'),
		'31' => array('name' => '�²λ���'),
		'32' => array('name' => 'Ļ�踩'),
		'33' => array('name' => '�纬��'),
		'34' => array('name' => '������'),
		'35' => array('name' => '���縩'),
		'36' => array('name' => '������'),
		'37' => array('name' => '���'),
		'38' => array('name' => '���縩'),
		'39' => array('name' => '��ɲ��'),
		'40' => array('name' => '���θ�'),
		'41' => array('name' => 'ʡ����'),
		'42' => array('name' => '��ʬ��'),
		'43' => array('name' => '���츩'),
		'44' => array('name' => 'Ĺ�긩'),
		'45' => array('name' => '�ܺ긩'),
		'46' => array('name' => '���ܸ�'),
		'47' => array('name' => '�����縩'),
		'48' => array('name' => '���츩'),
		'49' => array('name' => '���츩Υ��'),
	),
	
	// ����ꥢ̾
	'user_carrier' => array(
		1 => array('name' => 'docomo'),
		2 => array('name' => 'au'),
		3 => array('name' => 'SoftBank'),
	),
	
	/* =============================================
	// �������¥�������󥫥ƥ�������
	============================================= */
	'admin_action_category' => array(
		account => array(
			'name'		=> '�����ԥ�������ȴ���',
			'contents'	=> array(
				'admin_account_add_do'		=> array('name' => '���������ԥ����������Ͽ�¹Խ���'),
				'admin_account_add'			=> array('name' => '���������ԥ����������Ͽ'),
				'admin_account_delete_do'	=> array('name' => '���������ԥ�������Ⱥ���¹Խ���'),
				'admin_account_edit_do'		=> array('name' => '���������ԥ���������Խ��¹Խ���'),
				'admin_account_edit'		=> array('name' => '���������ԥ���������Խ�'),
				'admin_account_list'		=> array('name' => '���������ԥ�������Ȱ����¹Խ���'),
			),
		),
		ad => array(
			'name'		=> '�������',
			'contents'	=> array(
				'admin_ad_add_do'		=> array('name' => '����������Ͽ����'),
				'admin_ad_add'			=> array('name' => '�������𿷵���Ͽ'),
				'admin_ad_day'			=> array('name' => '�������𽸷�'),
				'admin_ad_delete_do'	=> array('name' => '����������'),
				'admin_ad_edit_do'		=> array('name' => '���������Խ�'),
				'admin_ad_edit'			=> array('name' => '���������Խ�'),
				'admin_ad_list'			=> array('name' => '�����������'),
				'admin_adcategory_add_do'		=> array('name' => '�������𥫥ƥ�����Ͽ'),
				'admin_adcategory_add'			=> array('name' => '�������𥫥ƥ�����Ͽ�¹Խ���'),
				'admin_adcategory_delete_do'	=> array('name' => '�������𥫥ƥ�����'),
				'admin_adcategory_edit_do'		=> array('name' => '�������𥫥ƥ����Խ��¹Խ���'),
				'admin_adcategory_edit'			=> array('name' => '�������𥫥ƥ����Խ�'),
				'admin_adcategory_list'			=> array('name' => '�������𥫥ƥ������'),
				'admin_adcategory_priority_do'	=> array('name' => '�������𥫥ƥ���ͥ���ٹ���'),
				'admin_adcode_add_do'		=> array('name' => '�������𥳡�����Ͽ'),
				'admin_adcode_add'			=> array('name' => '�������𥳡�����Ͽ'),
				'admin_adcode_delete_do'	=> array('name' => '�������𥳡��ɺ��'),
				'admin_adcode_edit_do'		=> array('name' => '�������𥳡����Խ�'),
				'admin_adcode_edit'			=> array('name' => '�������𥳡����Խ�'),
				'admin_adcode_list'			=> array('name' => '�������𥳡��ɰ���'),
				'admin_admenu_edit_do'	=> array('name' => '���������˥塼�Խ��¹Խ���'),
				'admin_admenu_edit'		=> array('name' => '���������˥塼�Խ�'),
			),
		),
		analytics => array(
			'name'		=> '�����ݡ��ȴ���',
			'contents'	=> array(
				'admin_analytics_day'	=> array('name' => '���������ݡ��Ƚ���'),
			),
		),
		avatar => array(
			'name'		=> '���Х�������',
			'contents'	=> array(
				'admin_avatar_add_do'		=> array('name' => '�������Х�����Ͽ�¹Խ���'),
				'admin_avatar_add'			=> array('name' => '�������Х�����Ͽ'),
				'admin_avatar_delete_do'	=> array('name' => '�������Х�������¹Խ���'),
				'admin_avatar_edit_do'		=> array('name' => '�������Х����Խ��¹Խ���'),
				'admin_avatar_edit'			=> array('name' => '�������Х����Խ�'),
				'admin_avatar_list'			=> array('name' => '�������Х�������'),
				'admin_avatarcategory_add_do'		=> array('name' => '�������Х������ƥ�����Ͽ�¹Խ���'),
				'admin_avatarcategory_add'			=> array('name' => '�������Х������ƥ��꡼��Ͽ'),
				'admin_avatarcategory_delete_do'	=> array('name' => '�������Х������ƥ������¹Խ���'),
				'admin_avatarcategory_edit_do'		=> array('name' => '�������Х������ƥ����Խ��¹Խ���'),
				'admin_avatarcategory_edit'			=> array('name' => '�������Х������ƥ����Խ�'),
				'admin_avatarcategory_list'			=> array('name' => '�������Х������ƥ������'),
				'admin_avatarcategory_priority_do'	=> array('name' => '�������Х������ƥ���ͥ���ٹ����¹Խ���'),
				'admin_avatarstand_add_do'		=> array('name' => '�������Х��������Ͽ�¹Խ���'),
				'admin_avatarstand_add'			=> array('name' => '�������Х�����¡���Ͽ'),
				'admin_avatarstand_delete_do'	=> array('name' => '�������Х�����º���¹Խ���'),
				'admin_avatarstand_edit_do'		=> array('name' => '�������Х�������Խ��¹Խ���'),
				'admin_avatarstand_edit'		=> array('name' => '�������Х�������Խ�'),
				'admin_avatarstand_list'		=> array('name' => '�������Х�����°���'),
			),
		),
		banner => array(
			'name'		=> '�Хʡ�����',
			'contents'	=> array(
				'admin_banner_add_do'		=> array('name' => '�����Хʡ���Ͽ�¹Խ���'),
				'admin_banner_add'			=> array('name' => '�����Хʡ���Ͽ'),
				'admin_banner_day'			=> array('name' => '�����Хʡ�����'),
				'admin_banner_delete_do'	=> array('name' => '�����Хʡ�����¹Խ���'),
				'admin_banner_edit_do'		=> array('name' => '�����Хʡ��Խ��¹Խ���'),
				'admin_banner_edit'			=> array('name' => '�����Хʡ��Խ�'),
				'admin_banner_list'			=> array('name' => '�����Хʡ�����'),
			),
		),
		bbs => array(
			'name'		=> '��������',
			'contents'	=> array(
				'admin_bbs_delete_do'	=> array('name' => '������������¹Խ���'),
				'admin_bbs_list'		=> array('name' => '���������İ����¹Խ���'),
			),
		),
		blacklist => array(
			'name'		=> '�֥�å��ꥹ�ȴ���',
			'contents'	=> array(
				'admin_blacklist_delete_do'	=> array('name' => '�����֥�å��ꥹ�Ⱥ���¹Խ���'),
				'admin_blacklist_list'		=> array('name' => '�����֥�å��ꥹ�Ȱ����¹Խ���'),
			),
		),
		blog => array(
			'name'		=> '��������',
			'contents'	=> array(
				'admin_blog_article_delete_do'	=> array('name' => '������������¹Խ���'),
				'admin_blog_article_edit_do'	=> array('name' => '���������Խ��¹Խ���'),
				'admin_blog_article_edit'		=> array('name' => '���������Խ�'),
				'admin_blog_article_list'		=> array('name' => '�������������¹Խ���'),
				'admin_blog_comment_delete_do'	=> array('name' => '�������������Ⱥ���¹Խ���'),
				'admin_blog_comment_edit_do'	=> array('name' => '���������������Խ��¹Խ���'),
				'admin_blog_comment_edit'		=> array('name' => '���������������Խ�'),
				'admin_blog_comment_list'		=> array('name' => '�������������Ȱ����¹Խ���'),
			),
		),
		comment => array(
			'name'		=> '�����ȴ���',
			'contents'	=> array(
				'admin_comment_delete_do'	=> array('name' => '���������Ⱥ���¹Խ���'),
				'admin_comment_edit_do'		=> array('name' => '�����������Խ��¹Խ���'),
				'admin_comment_edit'		=> array('name' => '�����������Խ�'),
				'admin_comment_list'		=> array('name' => '���������Ȱ����¹Խ���'),
			),
		),
		community => array(
			'name'		=> '���ߥ�˥ƥ�����',
			'contents'	=> array(
				'admin_community_add_do'	=> array('name' => '�������ߥ�˥ƥ���Ͽ�¹Խ���'),
				'admin_community_add'		=> array('name' => '�������ߥ�˥ƥ���Ͽ'),
				'admin_community_delete_do'	=> array('name' => '�������ߥ�˥ƥ�����¹Խ���'),
				'admin_community_edit_do'	=> array('name' => '�������ߥ�˥ƥ��Խ��¹Խ���'),
				'admin_community_edit'		=> array('name' => '�������ߥ�˥ƥ��Խ�'),
				'admin_community_list'		=> array('name' => '�������ߥ�˥ƥ������¹Խ���'),
				'admin_community_article_delete_do'	=> array('name' => '�������ߥ�˥ƥ��ȥԥå�����¹Խ���'),
				'admin_community_article_edit_do'	=> array('name' => '�������ߥ�˥ƥ��ȥԥå��Խ��¹Խ���'),
				'admin_community_article_edit'		=> array('name' => '�������ߥ�˥ƥ��ȥԥå��Խ�'),
				'admin_community_article_list'		=> array('name' => '�������ߥ�˥ƥ��ȥԥå������¹Խ���'),
				'admin_community_comment_delete_do'	=> array('name' => '�������ߥ�˥ƥ������Ⱥ���¹Խ���'),
				'admin_community_comment_edit_do'	=> array('name' => '�������ߥ�˥ƥ��������Խ��¹Խ���'),
				'admin_community_comment_edit'		=> array('name' => '�������ߥ�˥ƥ��������Խ�'),
				'admin_community_comment_list'		=> array('name' => '�������ߥ�˥ƥ������Ȱ����¹Խ���'),
			),
		),
		config => array(
			'name'		=> '�����������',
			'contents'	=> array(
				'admin_config_community_category_add_do'	=> array('name' => '�������ߥ�˥ƥ����ƥ�����Ͽ'),
				'admin_config_community_category_delete_do'	=> array('name' => '�������ߥ�˥ƥ����ƥ������¹Խ���'),
				'admin_config_community_category_edit_do'	=> array('name' => '�������ߥ�˥ƥ����ƥ����Խ��¹Խ���'),
				'admin_config_community_category_edit'		=> array('name' => '�������ߥ�˥ƥ����ƥ����Խ�'),
				'admin_config_community_category'			=> array('name' => '�������ߥ�˥ƥ����ƥ����ѹ�'),
				'admin_config_edit_do'	=> array('name' => '�������ܾ����Խ��¹Խ���'),
				'admin_config_edit'		=> array('name' => '�������ܾ����Խ�'),
				'admin_config_user_prof_add_do'		=> array('name' => '�����ץ�ե����������Ͽ�¹Խ���'),
				'admin_config_user_prof_delete_do'	=> array('name' => '�����ץ�ե�������ܺ���¹Խ���'),
				'admin_config_user_prof_edit_do'	=> array('name' => '�����ץ�ե���������Խ��¹Խ���'),
				'admin_config_user_prof_edit'		=> array('name' => '�����ץ�ե���������Խ�'),
				'admin_config_user_prof_move_do'	=> array('name' => '�����ץ�ե��������ͥ���ٹ����¹Խ���'),
				'admin_config_user_prof'			=> array('name' => '�����ץ�ե�������ܴ���'),
				'admin_config_user_prof_option_add_do'		=> array('name' => '�����ץ�ե���������������Ͽ�¹Խ���'),
				'admin_config_user_prof_option_delete_do'	=> array('name' => '�����ץ�ե�������ܺ���¹Խ���'),
				'admin_config_user_prof_option_edit_do'		=> array('name' => '�����ץ�ե��������������Խ��¹Խ���'),
				'admin_config_user_prof_option_edit'		=> array('name' => '�����ץ�ե��������������Խ�'),
				'admin_config_user_prof_option_move_do'		=> array('name' => '�����ץ�ե�������������ͥ���ٹ����¹Խ���'),
			),
		),
		contents => array(
			'name'		=> '�ե꡼�ڡ�������',
			'contents'	=> array(
				'admin_contents_add_do'		=> array('name' => '�����ե꡼�ڡ�����Ͽ�¹Խ���'),
				'admin_contents_add'		=> array('name' => '��������ƥ����Ͽ'),
				'admin_contents_delete_do'	=> array('name' => '�����ե꡼�ڡ�������¹Խ���'),
				'admin_contents_edit_do'	=> array('name' => '�����ե꡼�ڡ����Խ��¹Խ���'),
				'admin_contents_edit'		=> array('name' => '�����ե꡼�ڡ����Խ�'),
				'admin_contents_list'		=> array('name' => '�����ե꡼�ڡ����ꥹ��'),
			),
		),
		decomail => array(
			'name'		=> '�ǥ��᡼�����',
			'contents'	=> array(
				'admin_decomail_add_do'		=> array('name' => '�����ǥ��᡼����Ͽ�¹Խ���'),
				'admin_decomail_add'		=> array('name' => '�����ǥ��᡼����Ͽ'),
				'admin_decomail_delete_do'	=> array('name' => '�����ǥ��᡼�����¹Խ���'),
				'admin_decomail_edit_do'	=> array('name' => '�����ǥ��᡼���Խ��¹Խ���'),
				'admin_decomail_edit'		=> array('name' => '�����ǥ��᡼���Խ�'),
				'admin_decomail_list'		=> array('name' => '�����ǥ��᡼�����'),
				'admin_import_decomail'		=> array('name' => '�����ǥ��᡼�륤��ݡ��ȼ¹Խ���'),
				'admin_decomailcategory_add_do'			=> array('name' => '�����ǥ��᡼�륫�ƥ�����Ͽ�¹Խ���'),
				'admin_decomailcategory_add'			=> array('name' => '�����ǥ��᡼�륫�ƥ�����Ͽ'),
				'admin_decomailcategory_delete_do'		=> array('name' => '�����ǥ��᡼�륫�ƥ������¹Խ���'),
				'admin_decomailcategory_edit_do'		=> array('name' => '�����ǥ��᡼�륫�ƥ����Խ��¹Խ���'),
				'admin_decomailcategory_edit'			=> array('name' => '�����ǥ��᡼�륫�ƥ����Խ�'),
				'admin_decomailcategory_list'			=> array('name' => '�����ǥ��᡼�륫�ƥ������'),
				'admin_decomailcategory_priority_do'	=> array('name' => '�����ǥ��᡼�륫�ƥ���ͥ���ٹ����¹Խ���'),
			),
		),
		ec => array(
			'name'		=> 'EC����',
			'contents'	=> array(
				'admin_ec_config_edit_confirm'	=> array('name' => '����EC���ܾ����Խ���ǧ'),
				'admin_ec_config_edit_do'		=> array('name' => '����EC���ܾ����Խ��¹�'),
				'admin_ec_config_edit'			=> array('name' => '����EC���ܾ����Խ�'),
				'admin_ec_exchange_add_do'		=> array('name' => '���������������ɲü¹�'),
				'admin_ec_exchange_add'			=> array('name' => '����������������Ͽ'),
				'admin_ec_exchange_delete_do'	=> array('name' => '������������������¹�'),
				'admin_ec_exchange_edit_do'		=> array('name' => '���������������Խ��¹�'),
				'admin_ec_exchange_edit'		=> array('name' => '���������������Խ�'),
				'admin_ec_exchange_list'		=> array('name' => '���������������ꥹ��'),
				'admin_ec_image'	=> array('name' => '��������'),
				'admin_ec_item_add_confirm'		=> array('name' => '���������ɲó�ǧ'),
				'admin_ec_item_add_do'			=> array('name' => '����������Ͽ�¹�'),
				'admin_ec_item_add'				=> array('name' => '����������Ͽ'),
				'admin_ec_item_delete_do'		=> array('name' => '������������������¹�'),
				'admin_ec_item_edit_confirm'	=> array('name' => '���������Խ���ǧ'),
				'admin_ec_item_edit_do'			=> array('name' => '���������������Խ��¹�'),
				'admin_ec_item_edit'			=> array('name' => '���������Խ�'),
				'admin_ec_item_list'			=> array('name' => '�������ʥꥹ��'),
				'admin_ec_item_priority_do'		=> array('name' => '��������ͥ���ٹ����¹Խ���'),
				'admin_ec_itemcategory_add_confirm'		=> array('name' => '�������ƥ����ɲó�ǧ'),
				'admin_ec_itemcategory_add_do'			=> array('name' => '�������ƥ����ɲü¹�'),
				'admin_ec_itemcategory_add'				=> array('name' => '�������ƥ����ɲ�'),
				'admin_ec_itemcategory_delete_do'		=> array('name' => '�������ƥ������¹�'),
				'admin_ec_itemcategory_edit_confirm'	=> array('name' => '�������ƥ����Խ���ǧ'),
				'admin_ec_itemcategory_edit_do'			=> array('name' => '�������ƥ����Խ��¹�'),
				'admin_ec_itemcategory_edit'			=> array('name' => '�������ƥ����Խ�'),
				'admin_ec_itemcategory_list'			=> array('name' => '�������ƥ���ꥹ��'),
				'admin_ec_itemcategory_priority_do'		=> array('name' => '�������ʥ��ƥ���ͥ���ٹ����¹Խ���'),
				'admin_ec_postage_add_do'		=> array('name' => '����������Ͽ�¹�'),
				'admin_ec_postage_add'			=> array('name' => '����������Ͽ'),
				'admin_ec_postage_delete_do'	=> array('name' => '������������¹�'),
				'admin_ec_postage_edit_do'		=> array('name' => '���������Խ��¹�'),
				'admin_ec_postage_edit'			=> array('name' => '���������Խ�'),
				'admin_ec_postage_list'			=> array('name' => '���������ꥹ��'),
				'admin_ec_review_delete_do'		=> array('name' => '������ӥ塼����¹Խ���'),
				'admin_ec_review_edit_do'		=> array('name' => '������ӥ塼�Խ��¹Խ���'),
				'admin_ec_review_edit'			=> array('name' => '������ӥ塼�Խ�'),
				'admin_ec_review_list'			=> array('name' => '��ӥ塼����'),
				'admin_ec_shop_add_confirm'		=> array('name' => '��������å��ɲó�ǧ'),
				'admin_ec_shop_add_do'			=> array('name' => '��������å���Ͽ�¹�'),
				'admin_ec_shop_add'				=> array('name' => '��������å���Ͽ'),
				'admin_ec_shop_delete_do'		=> array('name' => '��������å׺���¹�'),
				'admin_ec_shop_edit_confirm'	=> array('name' => '��������å��Խ���ǧ'),
				'admin_ec_shop_edit_do'			=> array('name' => '��������å��Խ��¹�'),
				'admin_ec_shop_edit'			=> array('name' => '��������å��Խ�'),
				'admin_ec_shop_list'			=> array('name' => '��������åץꥹ��'),
				'admin_ec_shop_priority_do'		=> array('name' => '��������å�ͥ���ٹ����¹Խ���'),
				'admin_ec_supplier_add_do'		=> array('name' => '������������Ͽ�¹�'),
				'admin_ec_supplier_add'			=> array('name' => '������������Ͽ'),
				'admin_ec_supplier_delete_do'	=> array('name' => '�������������¹�'),
				'admin_ec_supplier_detail'		=> array('name' => '����������ܺ�'),
				'admin_ec_supplier_edit_do'		=> array('name' => '�����������Խ��¹�'),
				'admin_ec_supplier_edit'		=> array('name' => '�����������Խ�'),
				'admin_ec_supplier_list'		=> array('name' => '����������ꥹ��'),
				'admin_ec_userorder_detail'		=> array('name' => '�������������ܺ�'),
				'admin_ec_userorder_edit_do'	=> array('name' => '�������������ܺ��Խ��¹�'),
				'admin_ec_userorder_edit'		=> array('name' => '�������������ܺ��Խ�'),
				'admin_ec_userorder_list'		=> array('name' => '�������������ꥹ��'),
			),
		),
		emoji => array(
			'name'		=> '��ʸ������',
			'contents'	=> array(
				'admin_emoji'	=> array('name' => '������ʸ��'),
				'admin_emojip'	=> array('name' => '������ʸ��'),
			),
		),
		file => array(
			'name'		=> '�ե��������',
			'contents'	=> array(
				'admin_file_get'			=> array('name' => '�����ե��������'),
				'admin_file_list'			=> array('name' => '�����ե���������¹Խ���'),
				'admin_file_remove_confirm'	=> array('name' => '�����ե���������ǧ'),
				'admin_file_remove_do'		=> array('name' => '�����ե��������¹Խ���'),
				'admin_file'				=> array('name' => '�����ե������������'),
			),
		),
		game => array(
			'name'		=> '���������',
			'contents'	=> array(
				'admin_game_add_do'		=> array('name' => '������������Ͽ�¹Խ���'),
				'admin_game_add'		=> array('name' => '������������Ͽ'),
				'admin_game_delete_do'	=> array('name' => '�������������¹Խ���'),
				'admin_game_edit_do'	=> array('name' => '�����������Խ��¹Խ���'),
				'admin_game_edit'		=> array('name' => '�����������Խ�'),
				'admin_game_list'		=> array('name' => '�������������'),
				'admin_game_score_list'	=> array('name' => '���������ॹ��������'),
				'admin_gamecategory_add_do'			=> array('name' => '���������५�ƥ�����Ͽ�¹Խ���'),
				'admin_gamecategory_add'			=> array('name' => '���������५�ƥ�����Ͽ'),
				'admin_gamecategory_delete_do'		=> array('name' => '���������५�ƥ������¹Խ���'),
				'admin_gamecategory_edit_do'		=> array('name' => '���������५�ƥ����Խ��¹Խ���'),
				'admin_gamecategory_edit'			=> array('name' => '���������५�ƥ����Խ�'),
				'admin_gamecategory_list'			=> array('name' => '���������५�ƥ������'),
				'admin_gamecategory_priority_do'	=> array('name' => '���������५�ƥ���ͥ���ٹ����¹Խ���'),
			),
		),
		htmlltemplate => array(
			'name'		=> 'HTML�ƥ�ץ졼�ȴ���',
			'contents'	=> array(
				'admin_htmltemplate_edit_do'	=> array('name' => '����HTML�ƥ�ץ졼���Խ��¹�'),
				'admin_htmltemplate_edit'		=> array('name' => '����HTML�ƥ�ץ졼���Խ�'),
				'admin_htmltemplate_list'		=> array('name' => '����HTML�ƥ�ץ졼�Ȱ���'),
				'admin_htmltemplate_log'		=> array('name' => '����HTML�ƥ�ץ졼�ȥ�'),
			),
		),
		image => array(
			'name'		=> '��������',
			'contents'	=> array(
				'admin_image_list'	=> array('name' => '�������������¹Խ���'),
			),
		),
		movie => array(
			'name'		=> 'ư�����',
			'contents'	=> array(
				'admin_movie_list'	=> array('name' => '����ư������¹Խ���'),
			),
		),
		magazine => array(
			'name'		=> '���ޥ�����',
			'contents'	=> array(
				'admin_magazine_add_do'		=> array('name' => '�������ޥ���Ͽ�¹Խ���'),
				'admin_magazine_add'		=> array('name' => '�������ޥ���Ͽ'),
				'admin_magazine_delete_do'	=> array('name' => '�������ޥ�����¹Խ���'),
				'admin_magazine_edit_do'	=> array('name' => '�������ޥ��Խ��¹Խ���'),
				'admin_magazine_edit'		=> array('name' => '�������ޥ��Խ�'),
				'admin_magazine_list'		=> array('name' => '�������ޥ�����'),
				'admin_magazine_stop_do'	=> array('name' => '�������ޥ�������λ�¹Խ���'),
			),
		),
		mailtemplate => array(
			'name'		=> '�᡼��ƥ�ץ졼�ȴ���',
			'contents'	=> array(
				'admin_mailtemplate_add_do'		=> array('name' => '�����᡼��ƥ�ץ졼����Ͽ'),
				'admin_mailtemplate_add'		=> array('name' => '�����᡼��ƥ�ץ졼����Ͽ'),
				'admin_mailtemplate_delete_do'	=> array('name' => '�����᡼��ƥ�ץ졼�Ⱥ��'),
				'admin_mailtemplate_edit_do'	=> array('name' => '�����᡼��ƥ�ץ졼���Խ�'),
				'admin_mailtemplate_edit'		=> array('name' => '�����᡼��ƥ�ץ졼���Խ�'),
				'admin_mailtemplate_list'		=> array('name' => '�����᡼��ƥ�ץ졼�Ȱ���'),
			),
		),
		media => array(
			'name'		=> '��ǥ�������',
			'contents'	=> array(
				'admin_media_add_do'	=> array('name' => '������ǥ�����Ͽ�¹Խ���'),
				'admin_media_add'		=> array('name' => '������ǥ�����Ͽ'),
				'admin_media_day'		=> array('name' => '������ǥ�������'),
				'admin_media_delete_do'	=> array('name' => '������ǥ�������¹Խ���'),
				'admin_media_edit_do'	=> array('name' => '������ǥ����Խ��¹Խ���'),
				'admin_media_edit'		=> array('name' => '������ǥ����Խ�'),
				'admin_media_list'		=> array('name' => '������ǥ�������'),
			),
		),
		message => array(
			'name'		=> '��å���������',
			'contents'	=> array(
				'admin_message_delete_do'	=> array('name' => '������å���������¹Խ���'),
				'admin_message_list'		=> array('name' => '������å����������¹Խ���'),
			),
		),
		news => array(
			'name'		=> '�˥塼������',
			'contents'	=> array(
				'admin_news_add_do'		=> array('name' => '�����˥塼����Ͽ�¹Խ���'),
				'admin_news_add'		=> array('name' => '�����˥塼����Ͽ'),
				'admin_news_edit_do'	=> array('name' => '�����˥塼���Խ��¹Խ���'),
				'admin_news_edit'		=> array('name' => '�����˥塼���Խ�'),
				'admin_news_list'		=> array('name' => '�����˥塼������'),
				'admin_news_delete_do'	=> array('name' => '�����˥塼�����'),
			),
		),
		ngword => array(
			'name'		=> 'NG��ɴ���',
			'contents'	=> array(
				'admin_ngword_edit_do'	=> array('name' => '����NG����Խ��¹Խ���'),
				'admin_ngword_edit'		=> array('name' => '����NG����Խ�'),
			),
		),
		point => array(
			'name'		=> '�ݥ���ȴ���',
			'contents'	=> array(
				'admin_point_back'			=> array('name' => '�ݥ���ȥХå�'),
				'admin_point_csv'			=> array('name' => '�����ݥ���Ⱦ�ǧCSV���åץ���'),
				'admin_point_exchange_list'	=> array('name' => '�����ݥ���ȸ򴹰���'),
				'admin_point_home'			=> array('name' => '�����ݥ������Ģ'),
				'admin_point_list'			=> array('name' => '�����ݥ���Ȱ���'),
			),
		),
		ranking => array(
			'name'		=> '��󥭥󥰴���',
			'contents'	=> array(
				'admin_ranking_list'	=> array('name' => '������󥭥����ײ��ϰ����¹Խ���'),
			),
		),
		report => array(
			'name'		=> '�������',
			'contents'	=> array(
				'admin_report_delete_do'	=> array('name' => '�����������¹Խ���'),
				'admin_report_list'			=> array('name' => '������������¹Խ���'),
			),
		),
		segment => array(
			'name'		=> '�������ȴ���',
			'contents'	=> array(
				'admin_segment_add_do'		=> array('name' => '��������������Ͽ�¹Խ���'),
				'admin_segment_add'			=> array('name' => '��������������Ͽ'),
				'admin_segment_delete_do'	=> array('name' => '�����������Ⱥ���¹Խ���'),
				'admin_segment_edit_do'		=> array('name' => '�������������Խ��¹Խ���'),
				'admin_segment_edit'		=> array('name' => '�������������Խ�'),
				'admin_segment_list'		=> array('name' => '�����������Ȱ���'),
			),
		),
		sound => array(
			'name'		=> '������ɴ���',
			'contents'	=> array(
				'admin_sound_add_do'	=> array('name' => '�������������Ͽ�¹Խ���'),
				'admin_sound_add'		=> array('name' => '�������������Ͽ'),
				'admin_sound_delete_do'	=> array('name' => '����������ɺ���¹Խ���'),
				'admin_sound_edit_do'	=> array('name' => '������������Խ��¹Խ���'),
				'admin_sound_edit'		=> array('name' => '������������Խ�'),
				'admin_sound_list'		=> array('name' => '����������ɰ���'),
				'admin_soundcategory_add_do'		=> array('name' => '����������ɥ��ƥ�����Ͽ�¹Խ���'),
				'admin_soundcategory_add'			=> array('name' => '����������ɥ��ƥ�����Ͽ'),
				'admin_soundcategory_delete_do'		=> array('name' => '����������ɥ��ƥ������¹Խ���'),
				'admin_soundcategory_edit_do'		=> array('name' => '����������ɥ��ƥ����Խ��¹Խ���'),
				'admin_soundcategory_edit'			=> array('name' => '����������ɥ��ƥ����Խ�'),
				'admin_soundcategory_list'			=> array('name' => '����������ɥ��ƥ������'),
				'admin_soundcategory_priority_do'	=> array('name' => '����������ɥ��ƥ���ͥ���ٹ����¹Խ���'),
			),
		),
		video => array(
			'name'		=> '�ӥǥ�����',
			'contents'	=> array(
				'admin_video_add_do'	=> array('name' => '�����ӥǥ���Ͽ�¹Խ���'),
				'admin_video_add'		=> array('name' => '�����ӥǥ���Ͽ'),
				'admin_video_delete_do'	=> array('name' => '�����ӥǥ�����¹Խ���'),
				'admin_video_edit_do'	=> array('name' => '�����ӥǥ��Խ��¹Խ���'),
				'admin_video_edit'		=> array('name' => '�����ӥǥ��Խ�'),
				'admin_video_list'		=> array('name' => '�����ӥǥ�����'),
				'admin_videocategory_add_do'		=> array('name' => '�����ӥǥ����ƥ�����Ͽ�¹Խ���'),
				'admin_videocategory_add'			=> array('name' => '�����ӥǥ����ƥ�����Ͽ'),
				'admin_videocategory_delete_do'		=> array('name' => '�����ӥǥ����ƥ������¹Խ���'),
				'admin_videocategory_edit_do'		=> array('name' => '�����ӥǥ����ƥ����Խ��¹Խ���'),
				'admin_videocategory_edit'			=> array('name' => '�����ӥǥ����ƥ����Խ�'),
				'admin_videocategory_list'			=> array('name' => '�����ӥǥ����ƥ������'),
				'admin_videocategory_priority_do'	=> array('name' => '�����ӥǥ����ƥ���ͥ���ٹ����¹Խ���'),
			),
		),
		stats => array(
			'name'		=> '���ײ��ϴ���',
			'contents'	=> array(
				'admin_stats_list'	=> array('name' => '�������ײ��ϰ����¹Խ���'),
			),
		),
		user => array(
			'name'		=> '�桼������',
			'contents'	=> array(
				'admin_user_community_edit_do'	=> array('name' => '�����桼�����å��ߥ�˥ƥ����С������Խ�'),
				'admin_user_community_list'		=> array('name' => '�����桼�����å��ߥ�˥ƥ�����'),
				'admin_user_edit_do'	=> array('name' => '�����桼�������Խ��¹Խ���'),
				'admin_user_edit'		=> array('name' => '�����桼���Խ�'),
				'admin_user_list'		=> array('name' => '�����桼�������¹Խ���'),
				'admin_user_resign_do'	=> array('name' => '�����桼���������¹Խ���'),
				'admin_user_transition'	=> array('name' => '�����桼�������ɽ��'),
				'admin_user_friend_edit_do'					=> array('name' => '�����桼��ͧã�����Խ�'),
				'admin_user_friend_introduction_edit_do'	=> array('name' => '����ͧã�Ҳ�ʸ�Խ��¹�'),
				'admin_user_friend_introduction_edit'		=> array('name' => '����ͧã�Ҳ�ʸ�Խ�'),
				'admin_user_friend_introduction_list'		=> array('name' => '����ͧã�Ҳ�ʸ�����¹Խ���'),
				'admin_user_friend_list'					=> array('name' => '�����桼��ͧã����'),
			),
		),
		util => array(
			'name'		=> '�桼�ƥ���ƥ�����',
			'contents'	=> array(
				'admin_util'	=> array('name' => '�����桼�ƥ���ƥ�'),
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

// ����������ܤ˳�ĥ������ܤ�ޡ�������
require_once BASE . '/etc/profile-ini.php';
$config = array_merge_recursive($config, $profile);
require_once BASE . '/etc/point-ini.php';
$config = array_merge_recursive($config, $point);

?>