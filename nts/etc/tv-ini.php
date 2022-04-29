<?php
/**
 * tv-ini.php
 * ���ץꥱ�����������
 * 
 * @author Technovarth
 * @package SNSV
 */

// ftp�����
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
		//����ɽ��
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
		//�ե��������¸
//		'file'  => array(
//			'level'         => 'notice',
//			'file'          => '/var/log/snsv.log',//��0777�Ǻ������Ƥ���ɬ�פ�����ޤ�
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
	
	// [tag]�����ƥ�Ǽ�ư�Ѵ����륿��
	'tag' => array(
		'login_url' => array(
			'name' => '������URL',
		),
		'sns_name' => array(
			'name' => 'SNS̾',
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
	'tag_cut' => '##',
	
	// [mail]
	// �᡼��ɥᥤ��
	'mail_domain' => MAIL_DOMAIN,
	// ���顼�᡼���ۿ���߿�
	'mail_error_count' => 1,// ���顼�᡼�뤬1��ȯ�������桼���ؤϰ��������᡼����������ʤ�
	// smtp�ѥѥ�᥿
	'mail_smtp' => array(
		'host'		=> '202.210.130.91',
		'port'		=> 10025,
		'auth'		=> false,
//		'username'	=> "xxx@xxx.xxx.xx",
//		'password'	=> "xxxxx"
	),
	// �᡼���������᡼�륢�ɥ쥹
	'from_mailaddress' => 'napatown-mag@'. MAIL_DOMAIN,
	// �᡼��ޥ������ѥ᡼�륢�ɥ쥹
	'magazine_mailaddress' => 'napatown-mag@' . MAIL_DOMAIN,
	// ���ݡ����ѥ᡼�륢�ɥ쥹
	'support_mailaddress' => 'napatown@spaceout.jp',
	// �����ԥ᡼�륢�ɥ쥹
	'admin_mailaddress' => 'fujimori@technovarth.co.jp',
	// ���顼�᡼��������
	'snsvml_mailaddress' => 'snsvml@technovarth.co.jp',
	// �����ƥ�ǻ��Ѥ���᡼��ƥ�ץ졼��
	'mail_template' => array(
		'user_regist'				=> array(
			'name'	=> '�����Ͽ�᡼��',
		),
		'user_regist_done'			=> array(
			'name' => '�����Ͽ��λ�᡼��',
		),
		'user_already_member_error'		=> array(
			'name' => '�����Ͽ�����˲�����顼�᡼��',
		),
		'user_forbidden_member_error'		=> array(
			'name' => '�����Ͽ��������񥨥顼�᡼��',
		),
		'user_change_mailaddress_done'	=> array(
			'name' => '�᡼�륢�ɥ쥹�ѹ���λ�᡼��',
		),
		'user_change_mailaddress_error'	=> array(
			'name' => '�᡼�륢�ɥ쥹�ѹ����顼�᡼��',
		),
		'user_remind'				=> array(
			'name' => '�ѥ��������᡼��',
		),
		'user_invite'				=> array(
			'name' => 'ͧã���ԥ᡼��',
		),
		'user_got_message'			=> array(
			'name' => '��å������������Υ᡼��',
		),
		'user_friend_apply'			=> array(
			'name' => 'ͧã�����᡼��',
		),
		'user_bbs'				=> array(
			'name' => '�����Ľ񤭹������Υ᡼��',
		),
		'user_image_success'				=> array(
			'name' => '������ƴ�λ�᡼��',
		),
		'user_image_error'				=> array(
			'name' => '������Ƽ��ԥ᡼��',
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
	// �����̲���������
	'image_a_width' => 240,
	'image_a_height' => 320,
	// ���⡼���̲���������
	'image_s_width' => 120,
	'image_s_height' => 160,
	// ����ͥ����̲���������
	'image_t_width' => 100,
	'image_t_height' => 120,
	// ���������̲���������
	'image_i_width' => 40,
	'image_i_height' => 40,
	// �����������ͭ��
	'image_i_enable' => true,
	// NOIMAGE����
	'noimage' => 'img/image001.jpg',
	// �ޥ��������Х���ͭ��
	'mi_enable' => false,
	// perl
	'perl_path' => PERL_PATH,
	// imagemagick
	'imagemagick_path' => IMAGEMAGICK_PATH,
	// ffmpeg
	'ffmpeg_path' => '/usr/local/bin/ffmpeg',
	// flvtool2
	'flvtool2_path' => '/usr/local/bin/flvtool2',
	// �桼�������åץ��ɲ�ǽ������
	'file_max_size' => 10000000,//10000000�Х��ȡ�1000K��1M
	//'file_max_size' => 0,//0�����¤ʤ�
	
	// media��ͳ���������Υ���¸�ǥ��쥯�ȥ�
	'media_log_path' => MEDIA_LOG_PATH,
	// pointback�Υ���¸�ǥ��쥯�ȥ�
	'pointback_log_path' => POINTBACK_LOG_PATH,
	
	// mobile�Τ���Ͽ���᡼�������ǽ����
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
	
	// ǯ������
	'user_age_min' => 20,
	
	// �桼���ץ�ե������������
	'profile' => array(
		// ����
		'user_sex'						=> true,
		// ������
		'user_birth_date'				=> true,
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,
		// �ϰ�ʽ����
		'user_address'					=> false,
		// �ϰ�ʷ�ʪ̾��
		'user_address_building'			=> false,
		// ��շ�
		'user_blood_type'				=> true,
		// ����
		'job_family_id'					=> true,
		// �ȼ�
		'business_category_id'			=> true,
		// �뺧
		'user_is_married'				=> true,
		// �Ҷ�
		'user_has_children'				=> true,
		// ��̳��
		'work_location_prefecture_id'	=> true,
		// ��̣
		'user_hobby'					=> false,
		// URL
		'user_url'						=> false,
		// ���ʾҲ�
		'user_introduction'				=> true,
	),
	// �桼���ץ�ե������������
	'profile_required' => array(
		// ����
		'user_sex'						=> true,
		// ������
		'user_birth_date'				=> true,
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,
		// �ϰ�ʽ����
		'user_address'					=> false,
		// �ϰ�ʷ�ʪ̾��
		'user_address_building'			=> false,
		// ��շ�
		'user_blood_type'				=> true,
		// ����
		'job_family_id'					=> false,
		// �ȼ�
		'business_category_id'			=> false,
		// �뺧
		'user_is_married'				=> false,
		// �Ҷ�
		'user_has_children'				=> false,
		// ��̳��
		'work_location_prefecture_id'	=> false,
		// ��̣
		'user_hobby'					=> false,
		// URL
		'user_url'						=> false,
		// ���ʾҲ�
		'user_introduction'				=> true,
	),
	// �桼���ץ�ե������������
	'profile_public' => array(
		// ����
		'user_sex'						=> true,
		// ������
		'user_birth_date'				=> true,
		// �ϰ�
		'user_address'					=> true,
		// ��շ�
		'user_blood_type'				=> true,
		// ����
		'job_family_id'					=> true,
		// �ȼ�
		'business_category_id'			=> true,
		// �뺧
		'user_is_married'				=> true,
		// �Ҷ�
		'user_has_children'				=> true,
		// ��̳��
		'work_location_prefecture_id'	=> true,
		// ��̣
		'user_hobby'					=> true,
		// URL
		'user_url'						=> true,
		// ���ʾҲ�
		'user_introduction'				=> true,
	),
	
	// [stats]
	'stats_rotate' => 21,
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
		'image'				=> array('name' => '����'),
		'movie'				=> array('name' => 'ư��'),
		'contents'			=> array('name' => '�ե꡼�ڡ���'),
		'login'				=> array('name' => '������'),
	),
	'stats_score' => array(
		'view'		=> array('name' => '����',			'bar' => '#7fffbf'),
		'uu'		=> array('name' => '��ˡ���',		'bar' => '#ffbf7f'),
		'regist'	=> array('name' => '��Ͽ',			'bar' => '#ffff7f'),
		'mail'		=> array('name' => '�᡼��',		'bar' => '#bf7fff'),
		'access'	=> array('name' => '��������',		'bar' => '#7fffff'),
		'click'		=> array('name' => '����å�',		'bar' => '#7fff7f'),
		'send'		=> array('name' => '����',			'bar' => '#ff7fbf'),
		'resign'	=> array('name' => '���',			'bar' => '#A9A9A9'),
		'login'		=> array('name' => '������',		'bar' => '#ffccff'),
	),
	
	// ��ƻ�ܸ�����
	'prefecture_id' => array(
		'0' => array('name' => '̤����'),
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
		'0' => array('name' => '̤����'),
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
		'0' => array('name' => '̤����'),
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
	// ���Х������̼���
	'avatar_sex_type' => array(
		'' => array('name' => '������'),
		'1' => array('name' => '������'),
		'2' => array('name' => '������'),
	),
	// �����̲���������
//	'avatar_a_width' => 240,
//	'avatar_a_height' => 320,
	// ���⡼���̲���������
	'avatar_s_width' => 100,
	'avatar_s_height' => 160,
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
	'avatar_system' => array(
/*		1 => array('name' => '���ܥѡ���'),
		2 => array('name' => 'ɽ��'),
		3 => array('name' => '�ط�'),
		4 => array('name' => '�إ���'),
		5 => array('name' => '���ԡ���'),
		6 => array('name' => '�ȥåץե��å����'),
		7 => array('name' => '�ܥȥ�ե��å����'),
		8 => array('name' => '���������꡼'),
		9 => array('name' => '�طʥ��������꡼'),
		10 => array('name' => '���ʥ��������꡼'),
		11 => array('name' => '�ڥå�'),
*/
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
	
	// twitter / blog
	'twitter_status' => array(
		0 => array('name' => '�̾�����'),
		1 => array('name' => '�ʥѥܡ���'),
	),
		
	// twitter_title
	'twitter_title' => '�ڎŎʎߎΎގ��Ďޡ�',
	// [point]
	// �ݥ���Ⱥ�����
	'point_max' => 500000,
	// �ݥ����<=>�ߤδ���졼��
	'point_price_rates' => 1,
	// �ݥ���ȥ�����
	'point_type' => array(
		// SNS
		1 => array('name' => 'SNS����Ĵ��'),
		2 => array('name' => '����å�����'),// ad.ad_type=1
		3 => array('name' => '��Ͽ����'),// ad.ad_type=2
		4 => array('name' => '��Ψ����'),// ad.ad_type=3
		5 => array('name' => '���Х���'),
		6 => array('name' => '�ǥ��᡼��'),
		7 => array('name' => '������'),
		8 => array('name' => '�������'),
		9 => array('name' => '�����ϩ'),
		10 => array('name' => 'SNS�����Ͽ'),
		11 => array('name' => 'SNSͧã����(����)'),
		12 => array('name' => 'SNSͧã����(�ﾷ��)'),
		13 => array('name' => '�����ȥ�������'),
		// EC
		101 => array('name' => 'EC����Ĵ��'),
		102 => array('name' => 'EC�����Ͽ'),
		103 => array('name' => 'EC����'),
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
		'site_access'	=> 13,
	),
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
	
	// user_status
	'user_status' => array(
		1 => array('name' =>'����Ͽ'),
		2 => array('name' => '����Ͽ'),
		3 => array('name' => '���'),
		4 => array('name' => '�������'),
	),
	
	'user_guest_status' => array(
		0 => array('name' => '������'),
		1 => array('name' => '�Ϥ�'),
		2 => array('name' => '�����å�'),
	),
	
	'user_carrier' => array(
		1 => array('name' => 'docomo'),
		2 => array('name' => 'au'),
		3 => array('name' => 'SoftBank'),
	),
		
	// image_status
	'image_status' => array(
		'' => array('name' => '�ѹ����ʤ�'),
		'edit' => array('name' => '�ѹ�����'),
		'delete' => array('name' => '�������'),
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
		0 => array('name' => '��ɽ��'),
		1 => array('name' => 'ɽ��'),
	),
	
	// regist_status
	'regist_status' => array(
		0 => array('name' => '̵��'),
		1 => array('name' => 'ͭ��'),
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
		1 => array('name' => '�ȥå�'),
		2 => array('name' => '���Х���'),
		3 => array('name' => '�ǥ��᡼��'),
		4 => array('name' => '������'),
		5 => array('name' => '�������'),
	),
	
	// media
	// ���Х���������
	'media_avatar' => array(
		'0' => array('name' => '���Х�������̵��'),
		'1' => array('name' => '���Х�������ͭ��'),
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