
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL auto_increment COMMENT '����ID',
  `ad_name` text NOT NULL COMMENT '����̾',
  `ad_desc` text NOT NULL COMMENT '��������',
  `ad_url_d` text NOT NULL COMMENT 'DOCOMO����URL',
  `ad_url_a` text NOT NULL COMMENT 'AU����URL',
  `ad_url_s` text NOT NULL COMMENT 'SOFTBANK����URL',
  `ad_code_id` int(11) NOT NULL COMMENT '���𥳡���ID',
  `ad_image` varchar(255) NOT NULL COMMENT '�������',
  `ad_type` int(11) NOT NULL default '0',
  `ad_point_type` tinyint(1) unsigned NOT NULL default '0',
  `ad_point` int(11) NOT NULL default '0',
  `ad_item_point` int(11) NOT NULL default '0' COMMENT '���ʸ��ݥ����',
  `ad_point_percent` int(11) NOT NULL default '0',
  `ad_item_point_percent` int(11) NOT NULL default '0' COMMENT '���ʸ��ݥ���ȥѡ������',
  `ad_status` int(11) NOT NULL default '0',
  `ad_display_type` tinyint(1) unsigned NOT NULL default '1',
  `ad_category_id` int(11) NOT NULL default '0',
  `ad_stock_num` int(11) NOT NULL default '0' COMMENT '�����ۿ���',
  `ad_stock_status` tinyint(1) NOT NULL default '0' COMMENT '�����ۿ������ơ�����(0:̵��,1:ͭ��)',
  `ad_memo` text NOT NULL COMMENT '��������',
  `ad_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `ad_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `ad_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `ad_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�����ۿ���������',
  `ad_start_status` tinyint(1) unsigned NOT NULL COMMENT '�����ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `ad_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�����ۿ���λ����',
  `ad_end_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '�����ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  PRIMARY KEY  (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='����ơ��֥�';

--
-- Table structure for table `ad_access`
--

DROP TABLE IF EXISTS `ad_access`;
CREATE TABLE `ad_access` (
  `ad_access_id` int(11) NOT NULL auto_increment COMMENT '���𥢥�����ID',
  `ad_id` int(11) NOT NULL COMMENT '����ID',
  `ad_access_date` date NOT NULL COMMENT '����',
  `ad_view` int(11) NOT NULL COMMENT '������',
  `ad_click` int(11) NOT NULL COMMENT '����å���',
  `ad_regist` int(11) NOT NULL COMMENT '��Ͽ��',
  PRIMARY KEY  (`ad_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���𥢥������ơ��֥�';

--
-- Table structure for table `ad_category`
--

DROP TABLE IF EXISTS `ad_category`;
CREATE TABLE `ad_category` (
  `ad_category_id` int(11) NOT NULL auto_increment COMMENT '���𥫥ƥ���ID',
  `ad_category_name` text NOT NULL COMMENT '���𥫥ƥ���̾',
  `ad_category_desc` text NOT NULL COMMENT '���𥫥ƥ�������',
  `ad_category_status` tinyint(1) unsigned NOT NULL COMMENT '���𥫥ƥ��ꥹ�ơ�����(0:̵��,1:ͭ��)',
  `ad_category_priority_id` int(11) NOT NULL COMMENT '���ƥ���ͥ����ID',
  PRIMARY KEY  (`ad_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���𥫥ƥ���ơ��֥�';

--
-- Table structure for table `ad_code`
--

DROP TABLE IF EXISTS `ad_code`;
CREATE TABLE `ad_code` (
  `ad_code_id` int(11) NOT NULL auto_increment COMMENT '���𥳡���ID',
  `ad_code_name` text NOT NULL COMMENT '���𥳡���̾',
  `ad_code_param` varchar(255) NOT NULL COMMENT '���𥳡��ɥѥ�᥿',
  `ad_code_send_param` varchar(255) NOT NULL COMMENT '���������쥯�Ȼ�����Ϳ����ѥ�᥿',
  `ad_code_uaid_param` varchar(255) NOT NULL COMMENT '���𥳡��ɥ桼�����̥ѥ�᥿',
  `ad_code_status_param` varchar(255) NOT NULL COMMENT '���𥳡��ɥ��ơ��������̥ѥ�᥿',
  `ad_code_status_param_receive` varchar(255) NOT NULL COMMENT '���𥳡��ɥ��ơ����������ѥ�᥿',
  `ad_code_price_param` varchar(255) NOT NULL COMMENT '�������̼���������������ʬ�ѥ�᥿',
  `ad_code_status` tinyint(1) unsigned NOT NULL COMMENT '���𥳡��ɥ��ơ�����(0:̵��,1:ͭ��)',
  PRIMARY KEY  (`ad_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���𥳡��ɥơ��֥�';

--
-- Table structure for table `ad_menu`
--

DROP TABLE IF EXISTS `ad_menu`;
CREATE TABLE `ad_menu` (
  `ad_menu_id` int(11) NOT NULL auto_increment COMMENT '�����˥塼ID',
  `index` text NOT NULL COMMENT '�ȥåץڡ���',
  `home` text NOT NULL COMMENT '�ޥ��ڡ���',
  `blog_article_add_done` text NOT NULL COMMENT '������ƴ�λ����',
  `blog_article_edit_done` text NOT NULL COMMENT '�����Խ���λ����',
  `blog_article_delete_done` text NOT NULL COMMENT '���������λ����',
  `blog_comment_add_done` text NOT NULL COMMENT '������������ƴ�λ����',
  `blog_comment_edit_done` text NOT NULL COMMENT '�����������Խ���λ����',
  `blog_comment_delete_done` text NOT NULL COMMENT '���������Ⱥ����λ����',
  `community_add_done` text NOT NULL COMMENT '���ߥ�˥ƥ�������λ����',
  `community_edit_done` text NOT NULL COMMENT '���ߥ�˥ƥ��Խ���λ����',
  `community_delete_done` text NOT NULL COMMENT '���ߥ�˥ƥ������λ���� ',
  `community_article_add_done` text NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå���ƴ�λ����',
  `community_article_edit_done` text NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå��Խ���λ���� ',
  `community_article_delete_done` text NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå������λ���� ',
  `community_comment_add_done` text NOT NULL COMMENT '���ߥ�˥ƥ���������ƴ�λ����',
  `community_comment_edit_done` text NOT NULL COMMENT '���ߥ�˥ƥ��������Խ���λ����',
  `community_comment_delete_done` text NOT NULL COMMENT '���ߥ�˥ƥ������Ⱥ����λ����',
  `bbs_add_done` text NOT NULL COMMENT '�����ĺ�����λ����',
  `bbs_edit_done` text NOT NULL COMMENT '�������Խ���λ����',
  `bbs_delete_done` text NOT NULL COMMENT '�����ĺ����λ����',
  `message_send_done` text NOT NULL COMMENT '�ߥ˥᡼��������λ���� ',
  PRIMARY KEY  (`ad_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����˥塼�ơ��֥�';

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment COMMENT '������ID',
  `admin_name` text NOT NULL COMMENT '������̾',
  `login_id` varchar(255) NOT NULL COMMENT '������ID',
  `login_password` varchar(255) NOT NULL COMMENT '������ѥ����',
  `admin_action_category_id` text NOT NULL COMMENT '�����������¤���ĥ�������󥫥ƥ���ID',
  `admin_action_id` text COMMENT '�����������¤���ĥ�������󥫥ƥ���ID',
  `admin_shop_id` varchar(255) NOT NULL COMMENT '�����������¤���ĥ���å�ID',
  `admin_status` tinyint(1) unsigned NOT NULL COMMENT '�����ԥ��ơ�����(0:̵��,1:ͭ��)',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ԥơ��֥�';

--
-- Table structure for table `analytics`
--

DROP TABLE IF EXISTS `analytics`;
CREATE TABLE `analytics` (
  `analytics_id` int(11) NOT NULL auto_increment COMMENT '���ײ���ID',
  `analytics_date` date NOT NULL default '0000-00-00' COMMENT '���ײ�����',
  `pre_regist_num` int(11) NOT NULL COMMENT '����Ͽ�Կ�',
  `regist_num` int(11) NOT NULL COMMENT '����Ͽ�Կ�',
  `friend_num` int(11) NOT NULL COMMENT 'ͧã���Կ�',
  `resign_num` int(11) NOT NULL COMMENT '���Կ�',
  `natural_num` int(11) NOT NULL COMMENT '����ή���Կ�',
  PRIMARY KEY  (`analytics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE `avatar` (
  `avatar_id` int(11) NOT NULL auto_increment COMMENT '���Х���ID',
  `avatar_name` text NOT NULL COMMENT '���Х���̾',
  `avatar_desc` text NOT NULL COMMENT '���Х�������',
  `avatar_image1` varchar(255) default NULL COMMENT '���Х�������1',
  `avatar_image1_desc` varchar(255) default NULL COMMENT '���Х�������1����',
  `avatar_image1_x` int(11) NOT NULL default '0' COMMENT '���Х�������x��ɸ',
  `avatar_image1_y` int(11) NOT NULL default '0' COMMENT '���Х�������y��ɸ',
  `avatar_image1_z` int(11) NOT NULL default '0' COMMENT '���Х�������z��ɸ',
  `avatar_image2` varchar(255) default NULL COMMENT '���Х�������2',
  `avatar_image2_desc` varchar(255) default NULL COMMENT '���Х�������2����',
  `avatar_image2_x` int(11) NOT NULL default '0' COMMENT '���Х�������2x��ɸ',
  `avatar_image2_y` int(11) NOT NULL default '0' COMMENT '���Х�������2y��ɸ',
  `avatar_image2_z` int(11) NOT NULL default '0' COMMENT '���Х�������2z��ɸ',
  `avatar_point` int(11) NOT NULL default '0' COMMENT '���Х�������ݥ����',
  `avatar_status` int(11) NOT NULL default '0' COMMENT '���Х������ơ�������1:ͭ��, 0:̵����',
  `avatar_sex_type` int(11) NOT NULL default '0' COMMENT '���Х������̡���0:�˽�, 1:�ˤΤ�, 2:���Τߡ�',
  `avatar_category_id` int(11) NOT NULL default '0' COMMENT '���Х������ƥ��꡼ID',
  `preset_avatar` tinyint(1) NOT NULL default '0' COMMENT '�ץꥻ�åȥ��Х����ʤ��餫����桼�����Х����Ȥ�����Ͽ������(0:̵��,1:ͭ��)',
  `default_avatar` tinyint(1) NOT NULL default '0' COMMENT '�ǥե���ȥ��Х��� (0:̵��,1:ͭ��)',
  `first_avatar` tinyint(1) NOT NULL default '0' COMMENT '������򥢥Х���(�����Ͽ������򤹤륢�Х���)(0:̵��,1:ͭ��)',
  `avatar_stock_num` int(11) NOT NULL default '0' COMMENT '���Х����ۿ���λ��',
  `avatar_stock_status` int(11) NOT NULL default '0' COMMENT '���Х����ۿ���λ�����ꡡ��1:ͭ��,0:̵����',
  `avater_priority_id` int(11) NOT NULL default '0' COMMENT '���Х���ͥ����ID',
  `avatar_stand_id` int(11) NOT NULL default '0' COMMENT '���Х������ID',
  `avatar_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `avatar_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `avatar_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `avatar_start_time` datetime default '0000-00-00 00:00:00' COMMENT '���Х����ۿ���������',
  `avatar_start_status` tinyint(1) NOT NULL default '0' COMMENT '���Х����ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `avatar_end_time` datetime default '0000-00-00 00:00:00' COMMENT '���Х����ۿ���λ����',
  `avatar_end_status` tinyint(1) NOT NULL default '0' COMMENT '���Х����ۿ���λ���ơ�����(0:̵��,1:ͭ��)',
  PRIMARY KEY  (`avatar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���Х����ơ��֥�';

--
-- Table structure for table `avatar_category`
--

DROP TABLE IF EXISTS `avatar_category`;
CREATE TABLE `avatar_category` (
  `avatar_category_id` int(11) NOT NULL auto_increment COMMENT '���Х������ƥ���ID',
  `avatar_system_category_id` int(11) NOT NULL default '0' COMMENT '���Х����ƥ��ꥷ���ƥ�ID',
  `avatar_category_name` text NOT NULL COMMENT '���Х����ƥ���̾',
  `avatar_category_desc` text NOT NULL COMMENT '���Х����ƥ�������',
  `avatar_category_status` int(11) NOT NULL default '0' COMMENT '���Х����ƥ��ꥹ�ơ�����(0:̵��,1:ͭ��)',
  `avatar_category_priority_id` int(11) NOT NULL default '0' COMMENT '���Х����ƥ���ͥ����ID(�����ȥ桼��ɽ�����ϡ�-1��)',
  `avatar_stand_id` int(11) NOT NULL default '0' COMMENT '���Х������ID',
  `avatar_category_file1` varchar(255) default NULL COMMENT '���Х������ƥ���ե�����1',
  PRIMARY KEY  (`avatar_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���Х������ƥ���ơ��֥�';

--
-- Table structure for table `avatar_stand`
--

DROP TABLE IF EXISTS `avatar_stand`;
CREATE TABLE `avatar_stand` (
  `avatar_stand_id` int(11) NOT NULL auto_increment COMMENT '���Х������ID',
  `avatar_stand_name` text NOT NULL COMMENT '���Х������̾',
  `avatar_stand_image` text NOT NULL COMMENT '���Х�����²���',
  `avatar_stand_base_x` int(11) NOT NULL COMMENT '���Х�������ڤ��곫��X��ɸ',
  `avatar_stand_base_y` int(11) NOT NULL COMMENT '���Х�������ڤ��곫��Y��ɸ',
  `avatar_stand_base_w` int(11) NOT NULL COMMENT '���Х�������ڤ�����',
  `avatar_stand_base_h` int(11) NOT NULL COMMENT '���Х�������ڤ���⤵',
  `avatar_stand_w` int(11) NOT NULL COMMENT '���Х�����ɽ����',
  `avatar_stand_h` int(11) NOT NULL COMMENT '���Х������ɽ���⤵',
  `avatar_stand_status` tinyint(1) NOT NULL COMMENT '���Х�����¥��ơ�����(0:̵��,1:ͭ��)',
  PRIMARY KEY  (`avatar_stand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���Х�����¥ơ��֥�';

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL auto_increment COMMENT '�Хʡ�ID',
  `banner_body` text COMMENT '�����ʸ',
  `banner_url` text COMMENT '�����URL',
  `banner_client` varchar(255) NOT NULL COMMENT '���饤�����̾',
  `banner_image` varchar(255) default NULL COMMENT '��󥯲���',
  `banner_type` varchar(255) NOT NULL COMMENT '�Хʡ������ס�txt,jpg,gif,ping��',
  PRIMARY KEY  (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�Хʡ��ơ��֥�';

--
-- Table structure for table `banner_access`
--

DROP TABLE IF EXISTS `banner_access`;
CREATE TABLE `banner_access` (
  `banner_access_id` int(11) NOT NULL auto_increment COMMENT '�Хʡ���������ID',
  `banner_id` int(11) NOT NULL COMMENT '�Хʡ�ID',
  `banner_access_date` date NOT NULL default '0000-00-00' COMMENT '����',
  `banner_view` int(11) NOT NULL default '0' COMMENT '����ץ�å����ʷǺܲ����',
  `banner_click` int(11) NOT NULL COMMENT '����å���',
  PRIMARY KEY  (`banner_access_id`),
  KEY `banner_id` (`banner_id`,`banner_access_date`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�Хʡ����������ơ��֥�';

--
-- Table structure for table `bbs`
--

DROP TABLE IF EXISTS `bbs`;
CREATE TABLE `bbs` (
  `bbs_id` int(11) unsigned NOT NULL auto_increment COMMENT '����ID',
  `from_user_id` int(11) unsigned NOT NULL COMMENT '�������桼��ID',
  `to_user_id` int(11) unsigned NOT NULL COMMENT '������桼��ID',
  `bbs_body` text NOT NULL COMMENT '������å�����',
  `bbs_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '�����ĥ��ơ�����(0:���,1:ɽ��)',
  `bbs_checked` tinyint(1) unsigned NOT NULL COMMENT '�����ƻ륹�ơ�����(0:̤,1:��)',
  `bbs_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `bbs_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `bbs_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `bbs_hash` varchar(32) default NULL COMMENT '�������̻�',
  `image_id` int(11) unsigned default '0' COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  `bbs_notice` int(11) NOT NULL default '0' COMMENT '������ƥե饰 0:���ɡ�1:�������',
  PRIMARY KEY  (`bbs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ĥơ��֥�';

--
-- Table structure for table `black_list`
--

DROP TABLE IF EXISTS `black_list`;
CREATE TABLE `black_list` (
  `black_list_id` int(11) unsigned NOT NULL auto_increment COMMENT '�֥�å��ꥹ��ID',
  `black_list_user_id` int(11) unsigned NOT NULL COMMENT '�֥�å��ꥹ����Ͽ������Ԥä��桼��ID',
  `black_list_deny_user_id` int(11) unsigned NOT NULL COMMENT '�֥�å��ꥹ�Ȥ���Ͽ���줿�桼��ID',
  `black_list_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '�֥�å��ꥹ�ȥ��ơ����� ��1:ɽ��,0:��ɽ����',
  `black_list_checked` tinyint(1) unsigned NOT NULL COMMENT '�֥�å��ꥹ�ȴƻ륹�ơ�����(0:̤,1:��)',
  `black_list_regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `black_list_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `black_list_delete_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`black_list_id`),
  KEY `user_id` (`black_list_user_id`,`black_list_deny_user_id`,`black_list_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�֥�å��ꥹ�ȥơ��֥�';

--
-- Table structure for table `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `blog_article_id` int(11) NOT NULL auto_increment COMMENT '����ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `blog_article_status` tinyint(1) unsigned default '0' COMMENT '�������ơ����� ��1:ɽ��,0:��ɽ����',
  `blog_article_public` tinyint(1) NOT NULL default '0' COMMENT '�����������ơ�����(0:�����,1:����,2:ͧã�ޤǸ���)',
  `blog_article_checked` tinyint(1) unsigned default '0' COMMENT '�����ƻ�  ��1:��,0:̤��',
  `blog_article_title` text NOT NULL COMMENT '���������ȥ�',
  `blog_article_body` text NOT NULL COMMENT '������ʸ',
  `blog_article_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `blog_article_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `blog_article_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `blog_article_comment_num` int(11) NOT NULL default '0' COMMENT '���������ȿ�',
  `blog_article_comment_time` datetime default '0000-00-00 00:00:00' COMMENT '�ǿ�����������',
  `blog_article_hash` varchar(32) default NULL COMMENT '�������̻�',
  `image_id` int(11) default '0' COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  `blog_article_notice` int(11) default '0' COMMENT '�֥�������̤�ɥե饰 0:���ɡ�1:̤��',
  PRIMARY KEY  (`blog_article_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`blog_article_status`,`blog_article_created_time`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ơ��֥�';

--
-- Table structure for table `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `blog_comment_id` int(11) NOT NULL auto_increment COMMENT '����������ID',
  `blog_article_id` int(11) NOT NULL COMMENT '����ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `blog_comment_status` tinyint(1) unsigned NOT NULL COMMENT '���������ȥ��ơ����� ��1:ɽ��,0:��ɽ����',
  `blog_comment_checked` tinyint(1) unsigned NOT NULL COMMENT '���������ȴƻ� ��1:��,0:̤��',
  `blog_comment_body` text NOT NULL COMMENT '������������ʸ',
  `blog_comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `blog_comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `blog_comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `blog_comment_hash` varchar(32) default NULL COMMENT '���������ȼ��̻�',
  `image_id` int(11) default '0' COMMENT '����ID',
  `blog_comment_notice` int(11) NOT NULL default '0' COMMENT '������ƥե饰 0:���ɡ�1:�������',
  PRIMARY KEY  (`blog_comment_id`),
  KEY `blog_article_id` (`blog_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���������ȥơ��֥�';

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL auto_increment COMMENT '������ID',
  `cart_no` varchar(255) default NULL COMMENT '���� + cart_id�ʼ����ֹ��',
  `cart_hash` varchar(255) NOT NULL COMMENT '�����ȥϥå���',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `item_id` int(11) NOT NULL default '0' COMMENT '����ID',
  `stock_id` int(11) NOT NULL default '0' COMMENT '�߸�ID',
  `cart_status` int(11) NOT NULL default '0' COMMENT '0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�',
  `cart_item_num` int(11) NOT NULL default '0' COMMENT '���ʸĿ�',
  `cart_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `cart_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `cart_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ȡ��㤤ʪ�������ѥơ��֥�';

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL auto_increment COMMENT 'CMSID',
  `cms_type` int(11) NOT NULL COMMENT 'CMS������',
  `cms_html1` text NOT NULL COMMENT '����HTML',
  `cms_html2` text NOT NULL COMMENT '����HTML',
  `cms_html3` text NOT NULL COMMENT '����HTML',
  `low_term_d` text COMMENT 'DOCOMO����ü��',
  `low_term_a` text COMMENT 'AU����ü��',
  `low_term_s` text COMMENT 'SOFTBANK����ü��',
  `cms_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`cms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='CMS�ơ��֥���ѻ�ͽ���';

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL auto_increment COMMENT '������ID',
  `comment_type` int(11) NOT NULL COMMENT '�����ȥ����ס�2: game',
  `comment_subid` int(11) NOT NULL COMMENT '�����ȥ��ƥ���ID',
  `comment_title` text COMMENT '�����ȥ����ȥ�',
  `comment_body` text NOT NULL COMMENT '��������ʸ',
  `comment_status` int(11) NOT NULL default '1' COMMENT '�����ȥ��ơ�������0: ��ɽ��, 1:ɽ��',
  `comment_checked` tinyint(1) NOT NULL default '0' COMMENT '������̤�ɥ��ơ�������0:̤, 1:��',
  `comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  PRIMARY KEY  (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ȥơ��֥�ʥ������ѡ�';

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE `community` (
  `community_id` int(11) NOT NULL auto_increment COMMENT '���ߥ�˥ƥ�ID',
  `community_title` text NOT NULL COMMENT '���ߥ�˥ƥ�̾',
  `community_description` text NOT NULL COMMENT '���ߥ�˥ƥ�����',
  `community_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `community_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `community_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `community_status` tinyint(1) unsigned NOT NULL COMMENT '���ߥ�˥ƥ����ơ����� ��0:���,��������� 1:ͭ����',
  `community_checked` tinyint(1) unsigned NOT NULL COMMENT '���ߥ�˥ƥ��ƻ��1:��,0:̤��',
  `community_member_num` int(11) NOT NULL default '1' COMMENT '���ߥ�˥ƥ����С���',
  `community_category_id` int(11) NOT NULL default '1' COMMENT '���ߥ�˥ƥ����ƥ���ID',
  `community_join_condition` int(11) NOT NULL default '1' COMMENT '���þ��ȸ�����٥��1:ï�Ǥ⻲�äǤ���ʸ�����,2:�����ͤξ�ǧ��ɬ�סʸ�����,3:�����ͤξ�ǧ��ɬ�ס�������ˡ�',
  `community_topic_permission` int(11) NOT NULL default '1' COMMENT '�ȥԥå������θ��¡�1:���üԤ������Ǥ���,2:�����ͤΤߺ����Ǥ����',
  `community_hash` varchar(32) default NULL COMMENT '���ߥ�˥ƥ����̻�',
  `image_id` int(11) unsigned default NULL COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  PRIMARY KEY  (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ��ơ��֥�';

--
-- Table structure for table `community_article`
--

DROP TABLE IF EXISTS `community_article`;
CREATE TABLE `community_article` (
  `community_article_id` int(11) NOT NULL auto_increment COMMENT '���ߥ�˥ƥ��ȥԥå�ID',
  `community_id` int(11) NOT NULL COMMENT '���ߥ�˥ƥ�ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `community_article_status` tinyint(1) unsigned default '0' COMMENT '���ߥ�˥ƥ��ȥԥå����ơ����� ��0:���, 1:ͭ����',
  `community_article_checked` tinyint(1) unsigned default '0' COMMENT '���ߥ�˥ƥ��ȥԥå��ƻ� ��1:��,0:̤',
  `community_article_title` text NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå������ȥ�',
  `community_article_body` text NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå���ʸ',
  `community_article_comment_num` int(11) NOT NULL default '0' COMMENT '���ߥ�˥ƥ��ȥԥå������ȿ�',
  `community_article_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `community_article_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `community_article_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `community_article_comment_time` datetime default '0000-00-00 00:00:00' COMMENT '���ߥ�˥ƥ��ȥԥå��ǿ������Ⱥ�������',
  `community_article_hash` varchar(32) default NULL COMMENT '���ߥ�˥ƥ��ȥԥå����̻�',
  `image_id` int(11) unsigned default '0' COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  PRIMARY KEY  (`community_article_id`),
  KEY `community_id` (`community_id`,`community_article_status`,`community_article_comment_time`),
  KEY `community_article_status` (`community_article_status`),
  KEY `community_article_post_time` (`community_article_created_time`),
  KEY `user_id` (`user_id`),
  KEY `community_article_user` (`community_article_id`,`community_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ��ȥԥå��ơ��֥�';

--
-- Table structure for table `community_category`
--

DROP TABLE IF EXISTS `community_category`;
CREATE TABLE `community_category` (
  `community_category_id` int(11) NOT NULL auto_increment COMMENT '���ߥ�˥ƥ����ƥ���ID',
  `community_category_name` text NOT NULL COMMENT '���ߥ�˥ƥ����ƥ���̾',
  `community_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '���ߥ�˥ƥ����ƥ��ꥹ�ơ�����(0:�����1:ͭ��)',
  `community_category_priority_id` int(11) NOT NULL default '0' COMMENT '���ߥ�˥ƥ����ƥ���ͥ����',
  PRIMARY KEY  (`community_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ����ƥ���ơ��֥�';

--
-- Table structure for table `community_comment`
--

DROP TABLE IF EXISTS `community_comment`;
CREATE TABLE `community_comment` (
  `community_comment_id` int(11) NOT NULL auto_increment COMMENT '���ߥ�˥ƥ�������ID',
  `community_article_id` int(11) NOT NULL COMMENT '���ߥ�˥ƥ��ȥԥå�ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `community_comment_status` tinyint(1) unsigned NOT NULL COMMENT '���ߥ�˥ƥ������ȥ��ơ����� ��0:���, 1:ͭ����',
  `community_comment_checked` tinyint(1) unsigned NOT NULL COMMENT '���ߥ�˥ƥ������ȴƻ� ��1:��,0:̤��',
  `community_comment_body` text NOT NULL COMMENT '���ߥ�˥ƥ���������ʸ',
  `community_comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `community_comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `community_comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `community_comment_hash` varchar(32) default NULL COMMENT '���ߥ�˥ƥ������ȼ��̻�',
  `image_id` int(11) unsigned default '0' COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  PRIMARY KEY  (`community_comment_id`),
  KEY `community_comment_article_user` (`community_comment_id`,`community_article_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ������ȥơ��֥�';

--
-- Table structure for table `community_member`
--

DROP TABLE IF EXISTS `community_member`;
CREATE TABLE `community_member` (
  `community_member_id` int(10) unsigned NOT NULL auto_increment COMMENT '���ߥ�˥ƥ����С�ID',
  `community_id` int(10) unsigned NOT NULL COMMENT '���ߥ�˥ƥ�ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '�桼��ID',
  `community_member_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '���ߥ�˥ƥ����С����ơ�������0:���С�������, 1:���С�, 2:������, 3:�����;�ǧ�Ԥ�,',
  `community_status` tinyint(1) unsigned default '1' COMMENT '���ߥ�˥ƥ����ơ�������0:���ߥ�˥ƥ�����, 1:��ư��',
  PRIMARY KEY  (`community_member_id`),
  KEY `community_id` (`community_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ����С��ơ��֥�';

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` tinyint(1) unsigned NOT NULL auto_increment COMMENT '����ե���ID',
  `config_type` varchar(16) NOT NULL COMMENT '�ɤΥ����פ�config��',
  `site_name` varchar(128) default NULL COMMENT '������̾',
  `site_url` varchar(255) default NULL COMMENT '������URL',
  `site_company_name` text COMMENT '�����ȱ��Ĳ��',
  `site_phone` varchar(255) default NULL COMMENT '���ĸ������ֹ�',
  `site_html_title` text COMMENT 'HTML̾',
  `site_information` text COMMENT '���Τ餻',
  `site_public_status` tinyint(1) unsigned default '1' COMMENT '�������ơ�����(0:�������,1:������)',
  `site_maintenance_status` tinyint(1) unsigned default '0' COMMENT '���ƥʥ󥹥��ơ�����(0:������,1:���ƥʥ���)',
  `site_meta_description` text COMMENT '�᥿�ǥ�������ץ����',
  `site_meta_keywords` text COMMENT '�᥿�������',
  `site_meta_robots` text COMMENT '�᥿��ܥå�',
  `site_meta_author` text COMMENT '�᥿��������',
  `site_bg_color` varchar(255) default NULL COMMENT '�طʿ�',
  `site_text_color` varchar(255) default NULL COMMENT 'ʸ����',
  `site_link_color` varchar(255) default NULL COMMENT '��󥯿�',
  `site_alink_color` varchar(255) default NULL COMMENT '�����ƥ��֥�󥯿�',
  `site_vlink_color` varchar(255) default NULL COMMENT 'ˬ��Ѥߥ�󥯿�',
  `site_title_bg_color` varchar(255) default NULL COMMENT '�����ȥ뿧',
  `site_title_font_color` varchar(255) default NULL COMMENT '�����ȥ��طʿ�',
  `site_menu_color` varchar(255) default NULL COMMENT '��˥塼��',
  `site_hr_color` varchar(255) default NULL COMMENT '��ʿ����',
  `site_time_color` varchar(255) default NULL COMMENT '���￧',
  `site_pager_text_color` varchar(255) default NULL COMMENT '�ڡ�����ʸ����',
  `site_pager_bg_color` varchar(255) default NULL COMMENT '�ڡ������طʿ�',
  `site_form_name_color` varchar(255) default NULL COMMENT '�ե����࿧',
  `site_error_color` varchar(255) default NULL COMMENT '���顼��',
  `site_ngword` text COMMENT 'NG��ɿ�',
  `site_regist_point` int(11) default '0' COMMENT '�������Ϳ�ݥ����',
  `site_invite_from_point` int(11) default '0' COMMENT 'ͧã�����������Ϳ�ݥ���ȡʾ��Լԡ�',
  `site_invite_to_point` int(11) default '0' COMMENT 'ͧã�����������Ϳ�ݥ���ȡ��ﾷ�Լԡ�',
  `site_navi_template` text COMMENT '�ʥӥ��������ƥ�ץ졼��',
  `site_low_term_d` text COMMENT 'DOCOMO����ü��',
  `site_low_term_a` text COMMENT 'AU����ü��',
  `site_low_term_s` text COMMENT 'SOFTBANK����ü��',
  `site_cms_html1` text COMMENT '����HTML',
  `site_cms_html2` text COMMENT '����HTML',
  `site_cms_html3` text COMMENT '����HTML',
  PRIMARY KEY  (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='����ե����ơ��֥�';

--
-- Table structure for table `config_user_prof`
--

DROP TABLE IF EXISTS `config_user_prof`;
CREATE TABLE `config_user_prof` (
  `config_user_prof_id` int(11) NOT NULL auto_increment COMMENT '�桼���ץ�ե��������ID',
  `config_user_prof_name` varchar(255) NOT NULL COMMENT '�桼���ץ�ե��������̾',
  `config_user_prof_type` int(11) NOT NULL COMMENT '�ե��������',
  `config_user_prof_order` int(11) NOT NULL COMMENT '�桼���ץ�ե��������ɽ����',
  PRIMARY KEY  (`config_user_prof_id`),
  KEY `config_user_prof_type` (`config_user_prof_type`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼���ץ�ե�����ơ��֥�';

--
-- Table structure for table `config_user_prof_option`
--

DROP TABLE IF EXISTS `config_user_prof_option`;
CREATE TABLE `config_user_prof_option` (
  `config_user_prof_option_id` int(11) NOT NULL auto_increment COMMENT '�桼���ץ�ե���������������ID',
  `config_user_prof_id` int(11) NOT NULL COMMENT '�桼�����ץ�ե��������ID',
  `config_user_prof_option_name` text NOT NULL COMMENT '�桼���ץ�ե���������������̾',
  `config_user_prof_option_order` int(11) NOT NULL COMMENT '�桼���ץ�ե���������������ɽ����',
  PRIMARY KEY  (`config_user_prof_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼���ץ�ե�������ܥơ��֥�';

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL auto_increment COMMENT '�ե꡼�ڡ���ID',
  `contents_code` varchar(255) NOT NULL COMMENT '�ե꡼�ڡ���������',
  `contents_title` text NOT NULL COMMENT '�ե꡼�ڡ��������ȥ�',
  `contents_body` text NOT NULL COMMENT '�ե꡼�ڡ�������ƥ��',
  `contents_status` tinyint(11) NOT NULL COMMENT '�ե꡼�ڡ������ơ����� ��1��ͭ��,0��̵����',
  `contents_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `contents_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `contents_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ե꡼�ڡ����ơ��֥�';

--
-- Table structure for table `decomail`
--

DROP TABLE IF EXISTS `decomail`;
CREATE TABLE `decomail` (
  `decomail_id` int(11) NOT NULL auto_increment COMMENT '�ǥ��᡼��ID',
  `decomail_name` text NOT NULL COMMENT '�ǥ��᡼��̾',
  `decomail_desc` text NOT NULL COMMENT '�ǥ��᡼������',
  `decomail_file1` varchar(255) default NULL COMMENT '�ǥ��᡼��ե�����1',
  `decomail_file2` varchar(255) default NULL COMMENT '�ǥ��᡼��ե�����2',
  `decomail_file_d` varchar(255) default NULL COMMENT 'DOCOMO�ѥǥ��᡼��ե�����',
  `decomail_file_a` varchar(255) default NULL COMMENT 'AU�ѥǥ��᡼��ե�����',
  `decomail_file_s` varchar(255) default NULL COMMENT 'SOFTBANK�ѥǥ��᡼��ե�����',
  `decomail_point` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼�����ݥ����',
  `decomail_status` tinyint(1) NOT NULL default '0' COMMENT '�ǥ��᡼�륹�ơ����� ��1��ͭ��, 0��̵����',
  `decomail_category_id` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼�륫�ƥ���ID',
  `decomail_stock_num` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼���ۿ���λ��',
  `decomail_stock_status` tinyint(1) NOT NULL default '0' COMMENT '�ǥ��᡼���ۿ���λ�����ơ����� ��1��ͭ��, 0��̵����',
  `decomail_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `decomail_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `decomail_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `decomail_start_time` datetime default '0000-00-00 00:00:00' COMMENT '�ǥ��᡼���ۿ���������',
  `decomail_start_status` tinyint(1) NOT NULL default '0' COMMENT '�ǥ��᡼���ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `decomail_end_time` datetime default '0000-00-00 00:00:00' COMMENT '�ǥ��᡼���ۿ���λ����',
  `decomail_end_status` tinyint(1) NOT NULL default '0' COMMENT '�ǥ��᡼���ۿ���λ�������ơ����� ��1��ͭ��, 0��̵����',
  PRIMARY KEY  (`decomail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ǥ��᡼��ơ��֥�';

--
-- Table structure for table `decomail_category`
--

DROP TABLE IF EXISTS `decomail_category`;
CREATE TABLE `decomail_category` (
  `decomail_category_id` int(11) NOT NULL auto_increment COMMENT '�ǥ��᡼�륫�ƥ���ID',
  `decomail_category_name` text NOT NULL COMMENT '�ǥ��᡼�륫�ƥ���̾',
  `decomail_category_desc` text NOT NULL COMMENT '�ǥ��᡼�륫�ƥ�������',
  `decomail_category_status` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼�륫�ƥ��ꥹ�ơ����� ��1��ͭ��,0��̵����',
  `decomail_category_priority_id` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼�륫�ƥ���ͥ����ID',
  `decomail_category_file1` varchar(255) default NULL COMMENT '�ǥ��᡼�륫�ƥ���ե�����1',
  PRIMARY KEY  (`decomail_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ǥ��᡼�륫�ƥ���ơ��֥�';

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
CREATE TABLE `exchange` (
  `exchange_id` int(11) unsigned NOT NULL auto_increment COMMENT '��������ID',
  `exchange_name` varchar(255) NOT NULL COMMENT '������������̾',
  `exchange_type` tinyint(1) unsigned NOT NULL COMMENT '1:��Χ,2:����ϰ�,3:��׶��,4:��׸Ŀ�',
  `exchange_same_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:��Χ������������',
  `exchange_same_price` int(11) unsigned default NULL COMMENT '��Χ������������',
  `exchange_total_price_set` int(11) unsigned default NULL COMMENT '��׶��������',
  `exchange_total_price_set_under` int(11) default NULL COMMENT '��׶��̤��������������',
  `exchange_total_price_value` int(11) unsigned default '0' COMMENT '��׶�������Ͱʾ������������',
  `exchange_total_piece_set` int(11) unsigned default NULL COMMENT '��׸Ŀ�������',
  `exchange_total_piece_set_under` int(11) default NULL COMMENT '��׸Ŀ�̤��������������',
  `exchange_total_piece_value` int(11) unsigned default '0' COMMENT '��׸Ŀ������Ͱʾ������������',
  `exchange_created_time` datetime NOT NULL COMMENT '��������',
  `exchange_updated_time` datetime default NULL COMMENT '��������',
  `exchange_deleted_time` datetime default NULL COMMENT '�������',
  `exchange_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`exchange_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������������ѥơ��֥�';

--
-- Table structure for table `exchange_range`
--

DROP TABLE IF EXISTS `exchange_range`;
CREATE TABLE `exchange_range` (
  `exchange_range_id` int(11) unsigned NOT NULL auto_increment COMMENT '������������ϰ�����ID',
  `exchange_id` int(11) unsigned NOT NULL COMMENT '��������ID',
  `exchange_range_start` int(11) unsigned default NULL COMMENT '�ϰϳ��϶��',
  `exchange_range_end` int(11) unsigned default NULL COMMENT '�ϰϽ�λ���',
  `exchange_range_price` int(11) unsigned default NULL COMMENT '�ϰ���������',
  `exchange_range_created_time` datetime NOT NULL COMMENT '��������',
  `exchange_range_updated_time` datetime default NULL COMMENT '��������',
  `exchange_range_deleted_time` datetime default NULL COMMENT '�������',
  `exchange_range_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`exchange_range_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������������ϰ������ѥơ��֥�';

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL auto_increment COMMENT '�ե�����ID',
  `file_name` text NOT NULL COMMENT '�ե�����̾',
  `file_name_o` text NOT NULL COMMENT '���ꥸ�ʥ�ե�����̾',
  `file_status` tinyint(1) NOT NULL COMMENT '�ե����륹�ơ�������0:̵�� 1:ͭ��',
  `file_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `file_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `file_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ե�����ơ��֥�';

--
-- Table structure for table `footprint`
--

DROP TABLE IF EXISTS `footprint`;
CREATE TABLE `footprint` (
  `footprint_id` int(11) NOT NULL auto_increment COMMENT '��������ID',
  `from_user_id` int(11) NOT NULL COMMENT '�������ȸ��桼��ID',
  `to_user_id` int(11) NOT NULL COMMENT '����������桼��ID',
  `footprint_regist_time` timestamp NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `footprint_status` int(11) NOT NULL default '0' COMMENT '���ơ�������0:̵�� 1:ͭ��',
  PRIMARY KEY  (`footprint_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ȥơ��֥�';

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL auto_increment COMMENT '�ե���ID',
  `from_user_id` int(11) NOT NULL COMMENT '�������桼��ID',
  `to_user_id` int(11) NOT NULL COMMENT '������桼��ID',
  `friend_status` int(11) NOT NULL COMMENT '�ե��ɥ��ơ����� ��1:������, 2:ͧã��, 3:ͧã�ǤϤʤ���',
  `friend_message` text COMMENT '�ե��ɥ�å�������ʸ',
  `friend_introduction` text COMMENT '�ե��ɾҲ�ʸ',
  PRIMARY KEY  (`friend_id`),
  UNIQUE KEY `unique_key_friend` (`from_user_id`,`to_user_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ե��ɥơ��֥�';

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `game_id` int(11) NOT NULL auto_increment COMMENT '������ID',
  `game_code` text NOT NULL,
  `game_name` text NOT NULL COMMENT '������̾',
  `game_desc` text NOT NULL COMMENT '����������',
  `game_explain` text NOT NULL COMMENT '���ގ����������',
  `game_file1` varchar(255) default NULL COMMENT '������ե�����1�ʰ���ɽ���ѥե������',
  `game_file2` varchar(255) default NULL COMMENT '������ե�����2�ʾܺ�ɽ���ѥե������',
  `game_file3` varchar(255) default NULL COMMENT '������ե�����3�ʥץ쥤�ѥե������',
  `game_point` int(11) NOT NULL default '0' COMMENT '���������ݥ����',
  `game_status` tinyint(1) NOT NULL default '0' COMMENT '�����ॹ�ơ����� ��1��ͭ��, 0��̵����',
  `game_category_id` int(11) NOT NULL default '0' COMMENT '�����५�ƥ���ID',
  `game_stock_num` int(11) NOT NULL default '0' COMMENT '�������ۿ���λ��',
  `game_stock_status` tinyint(1) NOT NULL default '0' COMMENT '�������ۿ���λ�����ơ����� ��1��ͭ��, 0��̵����',
  `game_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `game_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `game_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `game_start_time` datetime default '0000-00-00 00:00:00' COMMENT '�������ۿ���������',
  `game_start_status` tinyint(1) NOT NULL default '0' COMMENT '�������ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `game_end_time` datetime default '0000-00-00 00:00:00' COMMENT '�������ۿ���λ����',
  `game_end_status` tinyint(1) NOT NULL default '0' COMMENT '�������ۿ���λ�������ơ����� ��1��ͭ��, 0��̵����',
  `game_ranking` int(11) NOT NULL default '0' COMMENT '0:̵�� 1:ͭ��',
  PRIMARY KEY  (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������ơ��֥�';

--
-- Table structure for table `game_category`
--

DROP TABLE IF EXISTS `game_category`;
CREATE TABLE `game_category` (
  `game_category_id` int(11) NOT NULL auto_increment COMMENT '�����५�ƥ���ID',
  `game_category_name` text NOT NULL COMMENT '�����५�ƥ���̾',
  `game_category_desc` text NOT NULL COMMENT '�����५�ƥ�������',
  `game_category_status` int(11) NOT NULL default '0' COMMENT '�����५�ƥ��ꥹ�ơ����� ��1��ͭ��, 0��̵����',
  `game_category_priority_id` int(11) NOT NULL default '0' COMMENT '�����५�ƥ���ͥ����ID',
  `game_category_file1` varchar(255) default NULL COMMENT '�����५�ƥ���ե�����1',
  PRIMARY KEY  (`game_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����५�ƥ���ơ��֥�';

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) unsigned NOT NULL auto_increment COMMENT '����ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '�桼��ID',
  `image_o` varchar(255) default NULL COMMENT '���ꥸ�ʥ�����ѥ�',
  `image_a` varchar(255) default NULL COMMENT '�����̲����ѥ�',
  `image_s` varchar(255) default NULL COMMENT '�����������ѥ�',
  `image_t` varchar(255) default NULL COMMENT '����ͥ�������ѥ�',
  `image_i` varchar(255) default NULL COMMENT '������������ѥ�',
  `image_mime_type` varchar(255) default NULL COMMENT '����MIME������',
  `image_size` int(11) unsigned default NULL COMMENT '����������',
  `image_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `image_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `image_status` tinyint(1) unsigned default '0' COMMENT '�������ơ����� ��1:ͭ��, 0:����Ѥ�, 2:�����ͤˤ�äƺ���Ѥߡ�',
  `image_checked` tinyint(1) unsigned default '0' COMMENT '�����ƻ륹�ơ�����',
  PRIMARY KEY  (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ơ��֥�';

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE `invite` (
  `invite_id` int(11) unsigned NOT NULL auto_increment COMMENT '����ID',
  `from_user_id` int(11) unsigned NOT NULL COMMENT '���Ը��桼��ID',
  `to_user_id` int(11) unsigned NOT NULL COMMENT '������桼��ID',
  `to_user_mailaddress` varchar(64) NOT NULL COMMENT '������桼���᡼�륢�ɥ쥹',
  `invite_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '���ԥ��ơ����� ��0:mail 1:access 2:reg��',
  `mail_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `access_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ͽ����',
  PRIMARY KEY  (`invite_id`),
  UNIQUE KEY `from_id` (`from_user_id`,`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ԥơ��֥�';

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL auto_increment COMMENT '����ID',
  `shop_id` int(11) NOT NULL default '0' COMMENT '����å�ID',
  `item_category_id` text NOT NULL COMMENT '���ƥ���ID1',
  `item_distinction_id` varchar(64) default NULL COMMENT '���ʼ���ID',
  `item_name` varchar(255) NOT NULL default '' COMMENT '����̾',
  `item_price` int(11) unsigned default '0' COMMENT '���ʲ���',
  `item_text1` text NOT NULL COMMENT '�����ڡ�����ɽ�����뾦�ʾ���',
  `item_text2` text NOT NULL COMMENT '�ܺ٥ڡ�����ɽ�����뾦�ʾ���',
  `item_detail` text COMMENT '��������',
  `item_spec` text COMMENT '���ʥ��ڥå�',
  `item_label_front` varchar(255) default NULL COMMENT '���ʥ�٥���',
  `item_label_back` varchar(255) default NULL COMMENT '���ʥ�٥��',
  `item_priority_id` int(11) NOT NULL default '0' COMMENT '����ɽ��ͥ����',
  `item_image` varchar(255) default NULL COMMENT '���ʲ���',
  `supplier_id` int(11) default '0' COMMENT '������ID',
  `postage_id` int(11) default '0' COMMENT '����ID',
  `exchange_id` int(11) default '0' COMMENT '��������ID',
  `item_use_credit_status` tinyint(1) unsigned default '0' COMMENT '1:���쥸�åȲ�ǽ',
  `item_use_conveni_status` tinyint(1) unsigned default '0' COMMENT '1:����ӥ˲�ǽ',
  `item_use_daibiki_status` tinyint(1) unsigned default '0' COMMENT '1:�����ǽ',
  `item_use_furikomi_status` tinyint(1) unsigned default '0' COMMENT '1:��Կ�����ǽ',
  `item_point` int(11) unsigned default '0' COMMENT '�����ݥ����',
  `item_start_status` int(11) NOT NULL COMMENT '1:�����������ͭ��,2:�����������̵��',
  `item_start_time` datetime default NULL COMMENT '������ֳ���',
  `item_end_time` datetime default NULL COMMENT '������ֽ�λ',
  `item_contents_body` text COMMENT '���ʥե꡼�ڡ���',
  `file_id` text COMMENT '�ե꡼�ڡ����ե�����',
  `item_doukon_deny` tinyint(1) unsigned default '0' COMMENT '1:Ʊ���Բ�,0:Ʊ����',
  `item_created_time` datetime NOT NULL COMMENT '��������',
  `item_updated_time` datetime default NULL COMMENT '��������',
  `item_deleted_time` datetime default NULL COMMENT '�������',
  `item_status` tinyint(1) unsigned default '1' COMMENT '0:���,1:ɽ��,2:��ɽ��',
  PRIMARY KEY  (`item_id`),
  KEY `category_id` (`shop_id`,`item_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ѥơ��֥�';

--
-- Table structure for table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE `item_category` (
  `item_category_id` int(11) NOT NULL auto_increment COMMENT '���ƥ���ID',
  `shop_id` int(11) NOT NULL default '0' COMMENT '����å�ID',
  `item_category_name` varchar(255) NOT NULL default '' COMMENT '���ƥ���̾',
  `item_category_priority_id` int(11) NOT NULL default '0' COMMENT '���ƥ���ɽ��ͥ����',
  `item_category_text` text NOT NULL COMMENT '���ƥ�������ʸ',
  `item_category_image1` varchar(255) default NULL COMMENT '���ƥ������',
  `item_category_contents_body` text COMMENT '���ƥ���ե꡼�ڡ���',
  `file_id` text COMMENT '�ե꡼�ڡ����ե�����',
  `item_category_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `item_category_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `item_category_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `item_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:ͭ��',
  PRIMARY KEY  (`item_category_id`),
  KEY `item_category_status` (`item_category_status`,`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ʥ��ƥ����ѥơ��֥�';

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
CREATE TABLE `magazine` (
  `magazine_id` int(11) NOT NULL auto_increment COMMENT '���ޥ�ID',
  `magazine_title` text COMMENT '���ޥ������ȥ�',
  `magazine_signature` text COMMENT '��̾',
  `magazine_body_text` text COMMENT '���ޥ���ʸ�ƥ�����',
  `magazine_body_html_status` tinyint(1) default NULL COMMENT '���ޥ���ʸHTML���ơ�������0:̵��,1:ͭ����',
  `magazine_body_html` text COMMENT '���ޥ���ʸHTML',
  `magazine_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `magazine_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `magazine_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `magazine_reserve_time` datetime default '0000-00-00 00:00:00' COMMENT '�ۿ�ͽ������',
  `magazine_start_time` datetime default '0000-00-00 00:00:00' COMMENT '�ۿ���������',
  `magazine_end_time` datetime default '0000-00-00 00:00:00' COMMENT '�ۿ���λ����',
  `magazine_user_num` int(11) default NULL COMMENT '���ޥ��ۿ��оݥ桼����',
  `magazine_sent_num` int(11) default '0' COMMENT '���ޥ�������',
  `magazine_error_num` int(11) default '0' COMMENT '���ޥ����顼��',
  `magazine_status` int(11) default '0' COMMENT '���ޥ����ơ����� ��0:̵��,1:ͭ��,2:�ۿ���,3:�ۿ��Ѥ�,4:������λ��',
  `segment_id` int(11) default '0' COMMENT '��������ID',
  PRIMARY KEY  (`magazine_id`),
  KEY `magazine_reserve_time` (`magazine_reserve_time`,`magazine_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ޥ��ơ��֥�';

--
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE `mail_template` (
  `mail_template_id` int(11) NOT NULL auto_increment COMMENT '�Ҏ��٥ƥ�ץ졼��ID',
  `mail_template_code` varchar(255) NOT NULL COMMENT '�Ҏ��٥ƥ�ץ졼�ȥ�����',
  `mail_template_name` text NOT NULL COMMENT '�Ҏ��٥ƥ�ץ졼��̾',
  `mail_template_title` text NOT NULL COMMENT '�Ҏ��٥ƥ�ץ졼�ȥ����ȥ�',
  `mail_template_body` text NOT NULL COMMENT '�Ҏ��٥ƥ�ץ졼����ʸ',
  `mail_template_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '�Ҏ��٥ƥ�ץ졼�ȥ��ơ�������0:���,1:ͭ����',
  PRIMARY KEY  (`mail_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�᡼��ƥ�ץ졼�ȥơ��֥�';

--
-- Table structure for table `mailchange_session`
--

DROP TABLE IF EXISTS `mailchange_session`;
CREATE TABLE `mailchange_session` (
  `mailchange_session_id` int(11) NOT NULL auto_increment COMMENT '���ɥ쥹�ѹ����å����ID',
  `mailchange_session_random_id` varchar(10) default NULL COMMENT '���ɥ쥹�ѹ�������ID',
  `user_hash` varchar(255) NOT NULL COMMENT '�桼�����̻�',
  `mailchange_session_created_time` datetime NOT NULL COMMENT '��������',
  `mailchange_session_updated_time` datetime default NULL COMMENT '��������',
  `mailchange_session_deleted_time` datetime default NULL COMMENT '�������',
  `mailchange_session_status` tinyint(1) unsigned NOT NULL COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`mailchange_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ɥ쥹�ѹ����å�����ѥơ��֥�';

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL auto_increment COMMENT '�����ϩID',
  `media_code` char(32) NOT NULL COMMENT '�����ϩ������',
  `media_name` text NOT NULL COMMENT '�����ϩ̾',
  `media_param1` varchar(64) default NULL COMMENT '�ѥ�᡼��1',
  `media_param2` varchar(64) default NULL COMMENT '�ѥ�᡼��2',
  `media_param3` varchar(64) default NULL COMMENT '�ѥ�᡼��3',
  `media_res_url` text COMMENT '����������ֵ���',
  `media_point` int(11) NOT NULL default '0' COMMENT '������ɲ���Ϳ�ݥ����',
  `community_id` int(11) NOT NULL default '0' COMMENT '������ǥե���Ȼ��å��ߥ�˥ƥ�ID',
  `media_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '����ե饰 ��1��ͭ�� ,0��̵����',
  `media_mail_title` text COMMENT '�����ϩ���Υ᡼�륿���ȥ�',
  `media_mail_body` text COMMENT '�����ϩ���Υ᡼����ʸ',
  PRIMARY KEY  (`media_id`),
  UNIQUE KEY `media_code` (`media_code`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ϩ�ơ��֥�';

--
-- Table structure for table `media_access`
--

DROP TABLE IF EXISTS `media_access`;
CREATE TABLE `media_access` (
  `media_access_id` int(11) NOT NULL auto_increment COMMENT '�����ϩ��������ID',
  `media_access_hash` varchar(32) NOT NULL COMMENT '�����ϩ���̻�',
  `media_id` int(11) default '0' COMMENT '�����ϩID',
  `media_access_param1` varchar(64) default NULL COMMENT '�����ϩ�ѿ�1',
  `media_access_param2` varchar(64) default NULL COMMENT '�����ϩ�ѿ�2',
  `media_access_param3` varchar(64) default NULL COMMENT '�����ϩ�ѿ�3',
  `media_access_status` tinyint(1) unsigned default '0' COMMENT '�����ϩ���ơ����� ��0:access 1:mail 2:reg 3:send��',
  `user_id` int(11) unsigned default NULL COMMENT '�桼��ID',
  `access_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `mail_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�᡼������',
  `regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��Ͽ����',
  `send_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`media_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ϩ���������ơ��֥�';

--
-- Table structure for table `media_access_count`
--

DROP TABLE IF EXISTS `media_access_count`;
CREATE TABLE `media_access_count` (
  `media_access_count_id` int(11) unsigned NOT NULL auto_increment COMMENT '�����ϩ�������ID',
  `media_access_count_date` date NOT NULL default '0000-00-00' COMMENT '�����ϩ�����������',
  `media_access_count_code` varchar(64) NOT NULL COMMENT '�����ϩ������ȥ�����',
  `media_access_count_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '�����ϩ������ȥ��ơ����� ��0:access 1:mail 2:reg 3:send��',
  `media_access_count_count` int(11) unsigned NOT NULL default '0' COMMENT '�����ϩ����������',
  `media_access_count_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`media_access_count_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ϩ������ȥơ��֥�';

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL auto_increment COMMENT '��å�����ID',
  `from_user_id` int(11) NOT NULL COMMENT '�������桼��ID',
  `to_user_id` int(11) NOT NULL COMMENT '������桼��ID',
  `message_title` text NOT NULL COMMENT '��å����������ȥ�',
  `message_body` text NOT NULL COMMENT '��å�������ʸ',
  `message_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `message_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `message_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `message_status_from` int(11) NOT NULL default '2' COMMENT '��å��������ơ����������� ��1:̤��, 2:����, 3:�����',
  `message_status_to` int(11) NOT NULL default '1' COMMENT '��å��������ơ����������� ��1:̤��, 2:����, 3:���, 4:�ֿ��Ѥߡ�',
  `message_hash` varchar(32) default NULL COMMENT '��å��������̻�',
  `image_id` int(11) default '0' COMMENT '����ID',
  `movie_id` int(11) unsigned default '0' COMMENT 'ư��ID',
  `message_status` tinyint(1) unsigned default '0' COMMENT '��å��������ơ����� ��1��ɽ��, 0����ɽ����',
  `message_checked` tinyint(1) unsigned default '0' COMMENT '��å������ƻ� ��1��, 0��̤��',
  PRIMARY KEY  (`message_id`),
  KEY `to_user_id` (`to_user_id`,`message_status_to`),
  KEY `message_user` (`message_id`,`from_user_id`,`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='��å������ơ��֥�';

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL auto_increment COMMENT 'ư��ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `movie_o` varchar(255) NOT NULL COMMENT '���ꥸ�ʥ�ư��ѥ�',
  `movie_3gp` varchar(255) NOT NULL COMMENT '3gpư��ѥ�',
  `movie_3g2` varchar(255) NOT NULL COMMENT '3g2ư��ѥ�',
  `movie_flv` varchar(255) NOT NULL COMMENT 'flvư��ѥ�',
  `movie_image1_t` varchar(255) NOT NULL COMMENT '����ͥ���������ѥ�',
  `movie_mime_type` varchar(255) NOT NULL COMMENT 'ư��ޥ��ॿ����',
  `movie_created_time` datetime NOT NULL COMMENT '��������',
  `movie_deleted_time` datetime NOT NULL COMMENT '�������',
  `movie_status` tinyint(1) unsigned NOT NULL COMMENT 'ư�襹�ơ����� ��1:ͭ��, 0:����Ѥ�, 2:�����ͤˤ�äƺ���Ѥߡ�',
  `movie_checked` tinyint(1) unsigned NOT NULL COMMENT 'ư��ƻ륹�ơ�����',
  PRIMARY KEY  (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ư��ơ��֥�';

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_type` int(11) NOT NULL COMMENT '1:all, 2:game, 3:avatar',
  `news_title` text NOT NULL,
  `news_body` text NOT NULL,
  `news_time` text,
  `news_status` tinyint(1) NOT NULL COMMENT '0:��ɽ��, 1:ɽ��',
  `news_start_status` tinyint(1) NOT NULL default '0' COMMENT '�˥塼���ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `news_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�˥塼���ۿ���������',
  `news_end_status` tinyint(1) NOT NULL default '0' COMMENT '�˥塼���ۿ���λ���ơ�����(0:̵��,1:ͭ��)',
  `news_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�˥塼���ۿ���λ����',
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�˥塼���ơ��֥�';

--
-- Table structure for table `point`
--

DROP TABLE IF EXISTS `point`;
CREATE TABLE `point` (
  `point_id` int(11) NOT NULL auto_increment COMMENT '�ݥ����ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  `point` int(11) NOT NULL default '0' COMMENT '�����ݥ���ȿ�',
  `point_type` tinyint(1) NOT NULL default '0' COMMENT '1:����,2:���؎���,3:��Ͽ,4:��Ψ,5:���ʎގ���,6:�Îގ���,7:���ގ���,8:�����ݎĎ�',
  `point_sub_id` int(11) NOT NULL default '0' COMMENT '�ݥ���ȥ���ID(�ݥ���Ȥ˴ؤ��륵��ID������:ad_id�ʤ�)',
  `user_sub_id` int(11) NOT NULL default '0' COMMENT '�桼������ID(�桼���˴�Ϣ����ID������:user_ad_id�ʤ�)',
  `point_memo` text COMMENT '�ݥ��������(����̾�ʤɤ�����)',
  `point_status` int(11) NOT NULL default '0' COMMENT '�ݥ���ȥ��ơ����� ��1��ͭ�� ,0��̵����',
  `point_balance` int(11) default '0' COMMENT '���ߥݥ���ȻĹ�',
  `point_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `point_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `point_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`point_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ݥ���ȥơ��֥�';

--
-- Table structure for table `point_exchange`
--

DROP TABLE IF EXISTS `point_exchange`;
CREATE TABLE `point_exchange` (
  `point_exchange_id` int(11) unsigned NOT NULL auto_increment COMMENT '�ݥ���ȸ�ID',
  `point_id` int(11) unsigned NOT NULL COMMENT '�ݥ����ID',
  `price` int(11) NOT NULL COMMENT '���',
  `fee` int(11) NOT NULL COMMENT '�����',
  `ebank_branch` int(11) NOT NULL COMMENT '�����Х󥯻�Ź�ֹ�',
  `ebank_account_number` varchar(255) NOT NULL COMMENT '�����Х󥯸����ֹ�',
  `ebank_account_name` varchar(255) NOT NULL COMMENT '�����Х󥯸���̾��',
  `edy_number` varchar(255) NOT NULL COMMENT 'edy�ֹ�',
  `point_exchange_created_time` datetime default NULL COMMENT '��������',
  `point_exchange_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `point_exchange_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `point_exchange_status` tinyint(1) NOT NULL default '1' COMMENT '�ݥ���ȸ򴹥��ơ�����',
  PRIMARY KEY  (`point_exchange_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

--
-- Table structure for table `post_unit`
--

DROP TABLE IF EXISTS `post_unit`;
CREATE TABLE `post_unit` (
  `post_unit_id` int(11) NOT NULL auto_increment COMMENT 'ȯ��ñ��ID',
  `cart_hash` varchar(255) NOT NULL COMMENT '�����ȥϥå���',
  `cart_id` int(11) NOT NULL COMMENT '������ID',
  `item_id` int(11) NOT NULL default '0' COMMENT '����ID',
  `stock_id` int(11) NOT NULL COMMENT '���ȥå��ʥ����ס�ID',
  `post_unit_item_num` int(11) NOT NULL COMMENT 'ȯ���Ŀ�',
  `post_unit_group_id` int(11) NOT NULL default '1' COMMENT '���롼��ID',
  `post_unit_group_postage_fee` int(11) default '0' COMMENT '����',
  `post_unit_group_exchange_fee` int(11) default '0' COMMENT '��������',
  `sagawa_code` varchar(255) default NULL COMMENT '������ɼ������',
  `post_unit_sent_status` tinyint(1) unsigned default '0' COMMENT '0:����̤ȯ��,1:����ȯ���Ѥ�',
  `post_unit_mail_sent_status` int(11) default '0' COMMENT '1:ȯ���᡼�������Ѥ�,0:ȯ���᡼��̤����',
  `post_unit_sent_date` datetime default NULL COMMENT '�в���',
  `post_unit_created_time` datetime NOT NULL COMMENT '��������',
  `post_unit_updated_time` datetime default NULL COMMENT '��������',
  `post_unit_status` int(11) NOT NULL default '1' COMMENT '���ơ����� 1:ͭ�� 0:̵��',
  PRIMARY KEY  (`post_unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ȯ��ñ���ѥơ��֥�';

--
-- Table structure for table `postage`
--

DROP TABLE IF EXISTS `postage`;
CREATE TABLE `postage` (
  `postage_id` int(11) unsigned NOT NULL auto_increment COMMENT '����ID',
  `postage_name` varchar(255) NOT NULL COMMENT '��������̾',
  `postage_status` tinyint(1) NOT NULL default '1' COMMENT '0:̵��,1:ͭ��',
  `postage_type` tinyint(1) NOT NULL COMMENT '1:����,2:�ϰ�,3:��׶��,4:��׸Ŀ�',
  `postage_total_price_set` int(11) default NULL COMMENT '��׶��������',
  `postage_total_price_set_under` int(11) default NULL COMMENT '��׶��������̤����������',
  `postage_total_price_value` int(11) default NULL COMMENT '��׶�������Ͱʾ��������',
  `postage_total_piece_set` int(11) default NULL COMMENT '��׸Ŀ�������',
  `postage_total_piece_set_under` int(11) default NULL COMMENT '��׸Ŀ�������̤����������',
  `postage_total_piece_value` int(11) default NULL COMMENT '��׸Ŀ������Ͱʾ��������',
  `postage_same_status` tinyint(1) NOT NULL default '0' COMMENT '1:��������',
  `postage_same_price` int(11) default NULL COMMENT '���������������',
  `postage_created_time` datetime NOT NULL COMMENT '��������',
  `postage_updated_time` datetime default NULL COMMENT '��������',
  `postage_deleted_time` datetime default NULL COMMENT '�������',
  `postage_pref_1` int(11) unsigned NOT NULL default '0' COMMENT '�̳�ƻ������',
  `postage_pref_2` int(11) unsigned NOT NULL default '0' COMMENT '�Ŀ���������',
  `postage_pref_3` int(11) unsigned NOT NULL default '0' COMMENT '��긩������',
  `postage_pref_4` int(11) unsigned NOT NULL default '0' COMMENT '���ĸ�������',
  `postage_pref_5` int(11) unsigned NOT NULL default '0' COMMENT '�ܾ븩������',
  `postage_pref_6` int(11) unsigned NOT NULL default '0' COMMENT '������������',
  `postage_pref_7` int(11) unsigned NOT NULL default '0' COMMENT 'ʡ�縩������',
  `postage_pref_8` int(11) unsigned NOT NULL default '0' COMMENT '��븩������',
  `postage_pref_9` int(11) unsigned NOT NULL default '0' COMMENT '���ڸ�������',
  `postage_pref_10` int(11) unsigned NOT NULL default '0' COMMENT '���ϸ�������',
  `postage_pref_11` int(11) unsigned NOT NULL default '0' COMMENT '��̸�������',
  `postage_pref_12` int(11) unsigned NOT NULL default '0' COMMENT '���ո�������',
  `postage_pref_13` int(11) unsigned NOT NULL default '0' COMMENT '����Ԥ�����',
  `postage_pref_14` int(11) unsigned NOT NULL default '0' COMMENT '�����������',
  `postage_pref_15` int(11) unsigned NOT NULL default '0' COMMENT '���㸩�����������',
  `postage_pref_16` int(11) unsigned NOT NULL default '0' COMMENT '���㸩������',
  `postage_pref_17` int(11) unsigned NOT NULL default '0' COMMENT '�ٻ���������',
  `postage_pref_18` int(11) unsigned NOT NULL default '0' COMMENT '���������',
  `postage_pref_19` int(11) unsigned NOT NULL default '0' COMMENT 'ʡ�温������',
  `postage_pref_20` int(11) unsigned NOT NULL default '0' COMMENT 'Ĺ�������',
  `postage_pref_21` int(11) unsigned NOT NULL default '0' COMMENT '������������',
  `postage_pref_22` int(11) unsigned NOT NULL default '0' COMMENT '�Ų���������',
  `postage_pref_23` int(11) unsigned NOT NULL default '0' COMMENT '���θ�������',
  `postage_pref_24` int(11) unsigned NOT NULL default '0' COMMENT '���츩������',
  `postage_pref_25` int(11) unsigned NOT NULL default '0' COMMENT '���Ÿ�������',
  `postage_pref_26` int(11) unsigned NOT NULL default '0' COMMENT '���츩������',
  `postage_pref_27` int(11) unsigned NOT NULL default '0' COMMENT '�����ܤ�����',
  `postage_pref_28` int(11) unsigned NOT NULL default '0' COMMENT '����ܤ�����',
  `postage_pref_29` int(11) unsigned NOT NULL default '0' COMMENT 'ʼ�˸�������',
  `postage_pref_30` int(11) unsigned NOT NULL default '0' COMMENT '���ɸ�������',
  `postage_pref_31` int(11) unsigned NOT NULL default '0' COMMENT '�²λ���������',
  `postage_pref_32` int(11) unsigned NOT NULL default '0' COMMENT 'Ļ�踩������',
  `postage_pref_33` int(11) unsigned NOT NULL default '0' COMMENT '�纬��������',
  `postage_pref_34` int(11) unsigned NOT NULL default '0' COMMENT '������������',
  `postage_pref_35` int(11) unsigned NOT NULL default '0' COMMENT '���縩������',
  `postage_pref_36` int(11) unsigned NOT NULL default '0' COMMENT '������������',
  `postage_pref_37` int(11) unsigned NOT NULL default '0' COMMENT '���������',
  `postage_pref_38` int(11) unsigned NOT NULL default '0' COMMENT '���縩������',
  `postage_pref_39` int(11) unsigned NOT NULL default '0' COMMENT '��ɲ��������',
  `postage_pref_40` int(11) unsigned NOT NULL default '0' COMMENT '���θ�������',
  `postage_pref_41` int(11) unsigned NOT NULL default '0' COMMENT 'ʡ����������',
  `postage_pref_42` int(11) unsigned NOT NULL default '0' COMMENT '��ʬ��������',
  `postage_pref_43` int(11) unsigned NOT NULL default '0' COMMENT '���츩������',
  `postage_pref_44` int(11) unsigned NOT NULL default '0' COMMENT 'Ĺ�긩������',
  `postage_pref_45` int(11) unsigned NOT NULL default '0' COMMENT '�ܺ긩������',
  `postage_pref_46` int(11) unsigned NOT NULL default '0' COMMENT '���ܸ�������',
  `postage_pref_47` int(11) unsigned NOT NULL default '0' COMMENT '�����縩������',
  `postage_pref_48` int(11) unsigned NOT NULL default '0' COMMENT '���츩������',
  `postage_pref_49` int(11) unsigned NOT NULL default '0' COMMENT '���츩Υ�������',
  PRIMARY KEY  (`postage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���������ѥơ��֥�';

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking` (
  `ranking_id` int(11) NOT NULL auto_increment COMMENT '��󥭥�ID',
  `type` varchar(32) NOT NULL COMMENT '��󥭥󥰥����ס�access, decomail �ʤ�',
  `id` int(11) NOT NULL default '0' COMMENT '��󥭥��о�ID',
  `sub_id` int(11) default '0' COMMENT '��󥭥��оݥ��ƥ���ID',
  `ranking_order` int(11) NOT NULL default '0' COMMENT '��󥭥󥰽��',
  `ranking_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`ranking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='��󥭥󥰥ơ��֥�';

--
-- Table structure for table `ranking_access`
--

DROP TABLE IF EXISTS `ranking_access`;
CREATE TABLE `ranking_access` (
  `ranking_access_id` int(11) unsigned NOT NULL auto_increment COMMENT '�͵����ʥ�������ID',
  `item_id` int(11) unsigned NOT NULL COMMENT '����ID',
  `ranking_access_created_time` datetime NOT NULL COMMENT '��������',
  `ranking_access_updated_time` datetime default NULL COMMENT '��������',
  `ranking_access_deleted_time` datetime default NULL COMMENT '�������',
  `ranking_access_status` tinyint(1) unsigned NOT NULL COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`ranking_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�͵����ʥ������������ѥơ��֥�';

--
-- Table structure for table `ranking_count`
--

DROP TABLE IF EXISTS `ranking_count`;
CREATE TABLE `ranking_count` (
  `ranking_count_id` int(11) unsigned NOT NULL auto_increment COMMENT '�͵����ʽ���ID',
  `ranking_count_rank` tinyint(1) unsigned default NULL COMMENT '�͵����ʽ��',
  `item_id` int(11) unsigned default NULL COMMENT '����ID',
  `stock_id` int(11) unsigned default NULL COMMENT '�߸�ID',
  `ranking_count_num` int(11) unsigned default NULL COMMENT '�͵����׿�',
  `ranking_count_start_date` date NOT NULL COMMENT '�����ϰϳ���',
  `ranking_count_end_date` date NOT NULL COMMENT '�����ϰϽ�λ',
  `ranking_count_created_time` datetime NOT NULL COMMENT '��������',
  `ranking_count_updated_time` datetime default NULL COMMENT '��������',
  `ranking_count_deleted_time` datetime default NULL COMMENT '�������',
  `ranking_count_status` tinyint(1) unsigned NOT NULL COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`ranking_count_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�͵����ʽ����ѥơ��֥�';

--
-- Table structure for table `ranking_order`
--

DROP TABLE IF EXISTS `ranking_order`;
CREATE TABLE `ranking_order` (
  `ranking_order_id` int(11) unsigned NOT NULL auto_increment COMMENT '�͵����ʹ���ID',
  `item_id` int(11) unsigned NOT NULL COMMENT '����ID',
  `stock_id` int(11) unsigned NOT NULL COMMENT '�߸�ID',
  `ranking_order_item_num` int(11) unsigned NOT NULL COMMENT '�����Ŀ�',
  `ranking_order_created_time` datetime NOT NULL COMMENT '��������',
  `ranking_order_updated_time` datetime default NULL COMMENT '��������',
  `ranking_order_deleted_time` datetime default NULL COMMENT '�������',
  `ranking_order_status` tinyint(1) unsigned NOT NULL COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`ranking_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�͵����ʹ��������ѥơ��֥�';

--
-- Table structure for table `register_session`
--

DROP TABLE IF EXISTS `register_session`;
CREATE TABLE `register_session` (
  `register_session_id` int(11) unsigned NOT NULL auto_increment COMMENT '��Ͽ���å����ID',
  `register_session_random_id` varchar(10) default NULL COMMENT '��Ͽ������ID',
  `register_session_session_id` varchar(64) default NULL COMMENT '��Ͽ���å����',
  `register_session_created_time` datetime NOT NULL COMMENT '��������',
  `register_session_updated_time` datetime default NULL COMMENT '��������',
  `register_session_deleted_time` datetime default NULL COMMENT '�������',
  `register_session_status` tinyint(1) unsigned NOT NULL COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`register_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='��Ͽ���å�����ѥơ��֥�';

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) unsigned NOT NULL auto_increment COMMENT '����ID',
  `report_user_id` int(11) unsigned NOT NULL COMMENT '����ԥ桼��ID',
  `report_fail_user_id` int(11) unsigned NOT NULL COMMENT '���󤵤줿�桼��ID',
  `report_message` text NOT NULL COMMENT '�����å�����',
  `report_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '���󥹥ơ����� ��1��ɽ�� ,0����ɽ����',
  `report_checked` tinyint(1) unsigned NOT NULL COMMENT '����ƻ륹�ơ�����(0:̤,1:��)',
  `report_regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `report_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `report_delete_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`report_id`),
  KEY `user_id` (`report_user_id`,`report_fail_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='����ơ��֥�';

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL auto_increment COMMENT '���ʥ�ӥ塼ID',
  `cart_id` int(11) NOT NULL COMMENT '������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `item_id` int(11) NOT NULL COMMENT '����ID',
  `review_title` text NOT NULL COMMENT '���ʥ�ӥ塼�����ȥ�',
  `review_body` text NOT NULL COMMENT '���ʥ�ӥ塼��ʸ',
  `review_hash` varchar(32) NOT NULL COMMENT '���ʥ�ӥ塼�ϥå���',
  `review_created_time` datetime NOT NULL COMMENT '��������',
  `review_updated_time` datetime default NULL COMMENT '��������',
  `review_deleted_time` datetime default NULL COMMENT '�������',
  `review_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:cron�Ԥ�,2:����Ԥ�,3:ͭ��',
  PRIMARY KEY  (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ʥ�ӥ塼�ѥơ��֥�';

--
-- Table structure for table `sample`
--

DROP TABLE IF EXISTS `sample`;
CREATE TABLE `sample` (
  `sample_id` int(11) NOT NULL auto_increment COMMENT '���ʥ���ץ�ID',
  `item_id` int(11) NOT NULL default '0' COMMENT '����ID',
  `sample_name` varchar(255) NOT NULL default '' COMMENT '����ץ�̾',
  `sample_image` varchar(255) NOT NULL default '' COMMENT '����ץ����',
  `sample_priority_id` int(11) NOT NULL default '0' COMMENT '����ץ�ɽ��ͥ����',
  `sample_created_time` datetime default NULL COMMENT '��������',
  `sample_updated_time` datetime default NULL COMMENT '��������',
  `sample_deleted_time` datetime default NULL COMMENT '�������',
  `sample_status` int(11) NOT NULL default '1' COMMENT '1:ͭ��,0:���',
  PRIMARY KEY  (`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ʥ���ץ��ѥơ��֥�';

--
-- Table structure for table `segment`
--

DROP TABLE IF EXISTS `segment`;
CREATE TABLE `segment` (
  `segment_id` int(11) NOT NULL auto_increment COMMENT '��������ID',
  `segment_name` text NOT NULL COMMENT '��������̾',
  `segment_status` tinyint(1) NOT NULL COMMENT '�������ȥ��ơ�������0:̵��,1:ͭ����',
  `segment_user_num` int(11) NOT NULL default '0' COMMENT '���������оݿͿ�',
  `user_carrier` varchar(255) default NULL COMMENT '����ꥢ',
  `user_point_min` int(11) default NULL COMMENT '�Ǿ��ݥ����',
  `user_point_max` int(11) default NULL COMMENT '����ݥ����',
  `user_age_min` int(11) default NULL COMMENT '�Ǿ�ǯ��',
  `user_age_max` int(11) default NULL COMMENT '����ǯ��',
  `user_sex` varchar(255) default NULL COMMENT '����',
  `prefecture_id` varchar(255) default NULL COMMENT '����',
  `job_family_id` varchar(255) default NULL COMMENT '����',
  `business_category_id` varchar(255) default NULL COMMENT '�ȼ�',
  `user_is_married` varchar(255) default NULL COMMENT '�뺧',
  `user_has_children` varchar(255) default NULL COMMENT '�Ҷ�',
  `user_blood_type` varchar(255) default NULL COMMENT '��շ�',
  `work_location_prefecture_id` varchar(255) default NULL COMMENT '��̳��',
  `user_created_date_start` datetime default NULL COMMENT '��Ͽ������',
  `user_created_date_end` datetime default NULL COMMENT '��Ͽ����λ',
  `user_carrier_status` tinyint(1) unsigned default NULL COMMENT '����ꥢ���ơ�������0:̵��,1:ͭ����',
  `user_point_status` tinyint(1) unsigned default NULL COMMENT '�ݥ���ȥ��ơ�������0:̵��,1:ͭ����',
  `user_age_status` tinyint(1) unsigned default NULL COMMENT 'ǯ�𥹥ơ�������0:̵��,1:ͭ����',
  `user_sex_status` tinyint(1) unsigned default NULL COMMENT '���̥��ơ�������0:̵��,1:ͭ����',
  `prefecture_id_status` tinyint(1) unsigned default NULL COMMENT '���ꥹ�ơ�������0:̵��,1:ͭ����',
  `job_family_id_status` tinyint(1) unsigned default NULL COMMENT '���ȥ��ơ�������0:̵��,1:ͭ����',
  `business_category_id_status` tinyint(1) unsigned default NULL COMMENT '�ȼ凉�ơ�������0:̵��,1:ͭ����',
  `user_is_married_status` tinyint(1) unsigned default NULL COMMENT '�뺧���ơ�������0:̵��,1:ͭ����',
  `user_has_children_status` tinyint(1) unsigned default NULL COMMENT '�Ҷ����ơ�������0:̵��,1:ͭ����',
  `user_blood_type_status` tinyint(1) unsigned default NULL COMMENT '��շ����ơ�������0:̵��,1:ͭ����',
  `work_location_prefecture_id_status` tinyint(1) unsigned default NULL COMMENT '��̳�ϥ��ơ�������0:̵��,1:ͭ����',
  `user_created_status` tinyint(1) unsigned default NULL COMMENT '��Ͽ�����ơ�������0:̵��,1:ͭ����',
  `item_id` varchar(255) default NULL COMMENT '�����������ʤ�ID',
  `item_id_status` tinyint(4) default NULL COMMENT '�������ʥ��ơ�������0:̵��,1:ͭ����',
  PRIMARY KEY  (`segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ȥơ��֥�';

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL auto_increment COMMENT '����å�ID',
  `shop_name` varchar(255) NOT NULL default '' COMMENT '����å�̾',
  `shop_ranking` varchar(255) NOT NULL default '' COMMENT '�͵���󥭥� item_id(csv)',
  `shop_news` text NOT NULL COMMENT '����åץ˥塼��',
  `shop_new_arrivals` varchar(255) NOT NULL default '' COMMENT '���������󥭥� item_id(csv)',
  `shop_image1` varchar(255) default NULL COMMENT '����å��Ѳ���1',
  `shop_image2` varchar(255) default NULL COMMENT '����å��Ѳ���2',
  `shop_priority_id` int(11) NOT NULL default '0' COMMENT '����å�ɽ��ͥ����',
  `shop_bgcolor` varchar(255) NOT NULL COMMENT '����å��طʿ�',
  `shop_textcolor` varchar(255) NOT NULL COMMENT '����å�ʸ����',
  `shop_linkcolor` varchar(255) NOT NULL COMMENT '����åץ�󥯿�',
  `shop_alinkcolor` varchar(255) NOT NULL COMMENT '����åץ����ƥ��֥�󥯿�',
  `shop_vlinkcolor` varchar(255) NOT NULL COMMENT '����å�ˬ��ѥ�󥯿�',
  `shop_body` text COMMENT '����åץե꡼�ڡ���',
  `file_id` text COMMENT '�ե꡼�ڡ����ե�����',
  `shop_category_print_status` int(11) default NULL COMMENT '1:���ƥ��������ɽ��',
  `shop_created_time` datetime NOT NULL COMMENT '��������',
  `shop_updated_time` datetime default NULL COMMENT '��������',
  `shop_deleted_time` datetime default NULL COMMENT '�������',
  `shop_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:ͭ��',
  PRIMARY KEY  (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='����å��ѥơ��֥�';

--
-- Table structure for table `shop_contents`
--

DROP TABLE IF EXISTS `shop_contents`;
CREATE TABLE `shop_contents` (
  `shop_contents_id` int(11) unsigned NOT NULL auto_increment COMMENT '�ե꡼�ڡ���ID',
  `shop_contents_category_id` text NOT NULL COMMENT '�ե꡼�ڡ������ƥ���ID',
  `shop_contents_title` text NOT NULL COMMENT '�ե꡼�ڡ��������ȥ�',
  `shop_contents_body` text NOT NULL COMMENT '�ե꡼�ڡ�����ʸ',
  `file_id` text COMMENT '�ե꡼�ڡ����ե�����',
  `shop_contents_link_shop_id` int(11) default NULL COMMENT '�ե꡼�ڡ����եå����������(����å�ID)',
  `shop_contents_link_shop_status` int(11) default NULL COMMENT '�ե꡼�ڡ����եå���������ꥹ�ơ�����(1:ͭ��)',
  `shop_contents_created_time` datetime NOT NULL COMMENT '��������',
  `shop_contents_updated_time` datetime default NULL COMMENT '��������',
  `shop_contents_deleted_time` datetime default NULL COMMENT '�������',
  `shop_contents_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '1:�����,2:����,0:���',
  PRIMARY KEY  (`shop_contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�⡼��ե꡼�ڡ����ѥơ��֥�';

--
-- Table structure for table `shop_contents_category`
--

DROP TABLE IF EXISTS `shop_contents_category`;
CREATE TABLE `shop_contents_category` (
  `shop_contents_category_id` int(11) unsigned NOT NULL auto_increment COMMENT '�ե꡼�ڡ������ƥ���ID',
  `shop_contents_category_name` text NOT NULL COMMENT '�ե꡼�ڡ������ƥ���̾',
  `shop_contents_category_priority_id` int(11) NOT NULL default '0' COMMENT '����åץ���ƥ�ĥ��ƥ���ͥ����',
  `shop_contents_category_created_time` datetime default NULL COMMENT '��������',
  `shop_contents_category_updated_time` datetime default NULL COMMENT '��������',
  `shop_contents_category_deleted_time` datetime default NULL COMMENT '�������',
  `shop_contents_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:ͭ��',
  PRIMARY KEY  (`shop_contents_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�⡼��ե꡼�ڡ������ƥ����ѥơ��֥�';

--
-- Table structure for table `sound`
--

DROP TABLE IF EXISTS `sound`;
CREATE TABLE `sound` (
  `sound_id` int(11) NOT NULL auto_increment COMMENT '�������ID',
  `sound_name` text NOT NULL COMMENT '�������̾',
  `sound_desc` text NOT NULL COMMENT '�����������',
  `sound_file1` varchar(255) default NULL COMMENT '������ɥե�����1(����ɽ���ѥե�����)',
  `sound_file2` varchar(255) default NULL COMMENT '������ɥե�����2(�ܺ�ɽ���ѥե�����)',
  `sound_file_d` varchar(255) default NULL COMMENT 'DOCOMO�ѥ�����ɥե�����',
  `sound_file_a` varchar(255) default NULL COMMENT 'AU�ѥ�����ɥե�����',
  `sound_file_s` varchar(255) default NULL COMMENT 'SOFTBANK�ѥ�����ɥե�����',
  `sound_point` int(11) NOT NULL default '0' COMMENT '������ɾ���ݥ����',
  `sound_status` tinyint(1) NOT NULL default '0' COMMENT '������ɥ��ơ����� ��1��ͭ��, 0��̵����',
  `sound_category_id` int(11) NOT NULL default '0' COMMENT '������ɥ��ƥ���ID',
  `sound_stock_num` int(11) NOT NULL default '0' COMMENT '��������ۿ���λ��',
  `sound_stock_status` tinyint(1) NOT NULL default '0' COMMENT '��������ۿ���λ�����ơ����� ��1��ͭ��, 0��̵����',
  `sound_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `sound_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `sound_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `sound_start_time` datetime default '0000-00-00 00:00:00' COMMENT '��������ۿ���������',
  `sound_start_status` tinyint(1) NOT NULL default '0' COMMENT '��������ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `sound_end_time` datetime default '0000-00-00 00:00:00' COMMENT '��������ۿ���λ����',
  `sound_end_status` tinyint(1) NOT NULL default '0' COMMENT '��������ۿ���λ�������ơ����� ��1��ͭ��, 0��̵����',
  PRIMARY KEY  (`sound_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������ɥơ��֥�';

--
-- Table structure for table `sound_category`
--

DROP TABLE IF EXISTS `sound_category`;
CREATE TABLE `sound_category` (
  `sound_category_id` int(11) NOT NULL auto_increment COMMENT '������ɥ��ƥ���ID',
  `sound_category_name` text NOT NULL COMMENT '������ɥ��ƥ���̾',
  `sound_category_desc` text NOT NULL COMMENT '������ɥ��ƥ�������',
  `sound_category_status` int(11) NOT NULL default '0' COMMENT '������ɥ��ƥ��ꥹ�ơ����� ��1��ͭ��, 0��̵����',
  `sound_category_priority_id` int(11) NOT NULL default '0' COMMENT '������ɥ��ƥ���ͥ����ID',
  `sound_category_file1` varchar(255) default NULL COMMENT '������ɥ��ƥ���ե�����1',
  `sound_category_color` varchar(255) default NULL COMMENT '������ɥ��ƥ��꿧',
  PRIMARY KEY  (`sound_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������ɥ��ƥ���ơ��֥�';

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL auto_increment COMMENT '�߸�ID',
  `item_id` int(11) NOT NULL default '0' COMMENT '����ID',
  `item_type` varchar(255) NOT NULL default '' COMMENT '���ʥ�����',
  `stock_num` int(11) NOT NULL default '0' COMMENT '�߸˸Ŀ�',
  `stock_priority_id` int(11) NOT NULL default '0' COMMENT '������ɽ��ͥ����',
  `stock_one_type_status` tinyint(1) unsigned default '0' COMMENT '1:ñ�쥿���פξ���',
  `stock_created_time` datetime NOT NULL COMMENT '��������',
  `stock_updated_time` datetime default NULL COMMENT '��������',
  `stock_deleted_time` datetime default NULL COMMENT '�������',
  `stock_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:ͭ��',
  PRIMARY KEY  (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�߸��ѥơ��֥�';

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(11) unsigned NOT NULL auto_increment COMMENT '������ID',
  `supplier_name` varchar(255) NOT NULL COMMENT '����������̾',
  `supplier_shipping_type` tinyint(1) unsigned NOT NULL COMMENT '1:ľ�ܽв�,2:Ǽ�ʸ�в�',
  `postage_id` int(11) unsigned NOT NULL COMMENT '����ID',
  `exchange_id` int(11) unsigned NOT NULL COMMENT '��������ID',
  `supplier_use_credit_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:���쥸�åȲ�ǽ',
  `supplier_use_conveni_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:����ӥ˲�ǽ',
  `supplier_use_daibiki_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:�����ǽ',
  `supplier_use_furikomi_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:��Կ�����ǽ',
  `supplier_doukon_allow_id` text COMMENT 'Ʊ����ǽ����(��������ID:���ڤ�)',
  `supplier_created_time` datetime NOT NULL COMMENT '��������',
  `supplier_updated_time` datetime default NULL COMMENT '��������',
  `supplier_deleted_time` datetime default NULL COMMENT '�������',
  `supplier_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:���,1:ͭ��',
  PRIMARY KEY  (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ѥơ��֥�';

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL auto_increment COMMENT '�桼��ID',
  `user_status` tinyint(1) unsigned NOT NULL COMMENT '�桼�������ơ����� ��1:����Ͽ, 2:����Ͽ, 3:���, 4:��������',
  `user_checked` tinyint(1) unsigned NOT NULL COMMENT '�桼�����ƻ� ��1���� ,0��̤��',
  `user_carrier` tinyint(1) unsigned NOT NULL default '0' COMMENT '�桼������ꥢ(1:DOCOMO,2:AU,3:SOFTBANK)',
  `user_mailaddress` char(255) NOT NULL COMMENT '�᡼�륢�ɥ쥹',
  `user_birth_date` date default NULL COMMENT '������',
  `user_birth_date_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '��ǯ�������������1������, 0���������',
  `user_age_public` tinyint(4) NOT NULL default '1' COMMENT 'ǯ����������1������, 0���������',
  `user_sex` tinyint(1) unsigned default NULL COMMENT '���� ��1:����, 2:������',
  `user_sex_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '���̸��������1������, 0���������',
  `user_hash` varchar(32) default NULL COMMENT '�桼�����̻�',
  `user_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  `user_nickname` varchar(128) default NULL COMMENT '�˥å��͡���',
  `user_password` varchar(32) default NULL COMMENT '�ѥ����',
  `user_uid` varchar(32) default NULL COMMENT '����ü�����̻�',
  `user_sessid` varchar(64) default NULL COMMENT '�桼�������å�����̻�',
  `user_magazine_error_num` int(10) default '0' COMMENT '���ޥ��ۿ����Կ�',
  `user_point` int(11) default '0' COMMENT '�ݥ����',
  `user_message_1_status` tinyint(1) unsigned default '1',
  `user_message_2_status` tinyint(1) unsigned default '1',
  `user_message_3_status` tinyint(1) unsigned default '1',
  `user_message_4_status` tinyint(1) unsigned default '1',
  `user_public_1_status` tinyint(1) unsigned default '1',
  `user_name` varchar(255) NOT NULL default '' COMMENT '�桼��̾',
  `prefecture_id` int(11) default NULL COMMENT '����(��ƻ�ܸ�)',
  `prefecture_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '������ƻ�ܸ����������1������, 0���������',
  `user_address` text COMMENT '����(�Զ�Į¼����)',
  `user_address_building` text COMMENT '����(��ʪ̾)',
  `user_address_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '����Զ�Į¼���������1������, 0���������',
  `user_blood_type` int(11) default NULL COMMENT '��շ�',
  `user_blood_type_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '��շ����������1������, 0���������',
  `user_is_married` int(11) default NULL COMMENT '�뺧',
  `user_is_married_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '����̤�����������1������, 0���������',
  `user_has_children` tinyint(1) unsigned default NULL COMMENT '�Ҷ�',
  `user_has_children_public` tinyint(1) unsigned default '1' COMMENT '�Ҷ�����',
  `work_location_prefecture_id` int(11) default NULL COMMENT '��̳��',
  `work_location_prefecture_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '��̳�ϸ��������1������, 0���������',
  `job_family_id` int(11) default NULL COMMENT '����',
  `job_family_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '�ȼ���������1������, 0���������',
  `business_category_id` int(11) default NULL COMMENT '�ȼ�',
  `business_category_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '������������1������, 0���������',
  `user_hobby` text COMMENT '��̣',
  `user_hobby_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '��̣���������1������, 0���������',
  `user_url` text COMMENT 'URL',
  `user_url_public` tinyint(3) unsigned NOT NULL default '1' COMMENT 'URL���������1������, 0���������',
  `user_introduction` text COMMENT '���ʾҲ�ʸ',
  `user_introduction_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '���ʾҲ�ʸ���������1������, 0���������',
  `image_id` int(11) unsigned default NULL COMMENT '����ID',
  `invite_id` int(11) unsigned default '0' COMMENT '����ID',
  `media_id` int(11) unsigned default '0' COMMENT '�����ϩID',
  `media_access_hash` varchar(32) default NULL COMMENT '�����ϩ���̻�',
  `user_guest_status` tinyint(1) unsigned default '0' COMMENT '�桼�������ȥ��ơ�����(0:̵��,1:ͭ��)',
  `avatar_config_first` tinyint(1) NOT NULL default '0' COMMENT '���Х����������¹�����(0:̤����,1:����Ѥ�)',
  `spgv_user_id` int(11) default '0' COMMENT 'SPGV�桼��ID',
  `user_mail_ok` int(11) NOT NULL default '1' COMMENT '���ޥ��ۿ�OK  1:ok 0:reject',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT '�桼��̾����',
  `user_zipcode` varchar(8) default NULL COMMENT '͹���ֹ�',
  `user_pref` tinyint(1) unsigned NOT NULL COMMENT '������ƻ�ܸ��ֹ�',
  `user_phone` varchar(255) NOT NULL default '' COMMENT '�����ֹ�',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�ǽ���������',
  `mm_only_flag` int(11) default NULL COMMENT '1:���ޥ��Τ���Ͽ�桼��',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_uid` (`user_uid`),
  KEY `user_status` (`user_status`,`user_magazine_error_num`),
  KEY `user_mailaddress` (`user_mailaddress`,`user_password`,`user_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼�����ơ��֥�';

--
-- Table structure for table `user_ad`
--

DROP TABLE IF EXISTS `user_ad`;
CREATE TABLE `user_ad` (
  `user_ad_id` int(11) NOT NULL auto_increment COMMENT '�桼������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `ad_id` int(11) NOT NULL COMMENT '����ID',
  `user_ad_status` tinyint(1) NOT NULL COMMENT '�桼�����𥹥ơ����� ��1��ͭ�� ,0��̵����',
  `user_ad_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_ad_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_ad_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`user_ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼������ơ��֥�';

--
-- Table structure for table `user_avatar`
--

DROP TABLE IF EXISTS `user_avatar`;
CREATE TABLE `user_avatar` (
  `user_avatar_id` int(11) NOT NULL auto_increment COMMENT '�桼�����Х���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  `avatar_id` int(11) NOT NULL default '0' COMMENT '���Х���ID',
  `user_avatar_status` tinyint(1) NOT NULL default '0' COMMENT '�桼�����Х������ơ����� ��1��ͭ�� ,0��̵����',
  `user_avatar_wear` tinyint(1) NOT NULL default '0' COMMENT '�桼�����Х�����᥹�ơ�����(0:̵��,1:ͭ��)',
  `user_avatar_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_avatar_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_avatar_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`user_avatar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼�����Х����ơ��֥�';

--
-- Table structure for table `user_decomail`
--

DROP TABLE IF EXISTS `user_decomail`;
CREATE TABLE `user_decomail` (
  `user_decomail_id` int(11) NOT NULL auto_increment COMMENT '�桼���ǥ��᡼��ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `decomail_id` int(11) NOT NULL COMMENT '�ǥ��᡼��ID',
  `user_decomail_status` tinyint(1) NOT NULL COMMENT '�桼���ǥ��᡼�륹�ơ����� ��1��ͭ�� ,0��̵����',
  `user_decomail_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_decomail_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_decomail_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`user_decomail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼���ǥ��᡼��ơ��֥�';

--
-- Table structure for table `user_game`
--

DROP TABLE IF EXISTS `user_game`;
CREATE TABLE `user_game` (
  `user_game_id` int(11) NOT NULL auto_increment COMMENT '�桼��������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `game_id` int(11) NOT NULL COMMENT '������ID',
  `user_game_status` tinyint(1) NOT NULL COMMENT '�桼�������ॹ�ơ����� ��1��ͭ�� ,0��̵����',
  `user_game_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_game_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_game_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`user_game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼��������ơ��֥�';

--
-- Table structure for table `user_game_score`
--

DROP TABLE IF EXISTS `user_game_score`;
CREATE TABLE `user_game_score` (
  `user_game_score_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_game_score_score` int(11) NOT NULL,
  `user_game_score_created_time` datetime NOT NULL,
  PRIMARY KEY  (`user_game_score_id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼�������ॹ�����ơ��֥�';

--
-- Table structure for table `user_hist`
--

DROP TABLE IF EXISTS `user_hist`;
CREATE TABLE `user_hist` (
  `user_hist_id` int(11) NOT NULL auto_increment COMMENT '�桼������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `user_mailaddress` varchar(255) NOT NULL COMMENT '�桼���᡼�륢�ɥ쥹',
  `spgv_user_id` int(11) NOT NULL COMMENT 'SPGV�桼��ID',
  `user_status` tinyint(1) NOT NULL COMMENT '�桼�����ơ�����',
  `user_hist_created_time` datetime NOT NULL COMMENT '��������',
  PRIMARY KEY  (`user_hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼������ơ��֥�';

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
CREATE TABLE `user_order` (
  `user_order_id` int(11) NOT NULL auto_increment COMMENT '��������ID',
  `user_order_no` varchar(255) default NULL COMMENT '����+order_id����ʸ�ֹ��',
  `cart_id` int(11) unsigned default NULL COMMENT '������ID',
  `cart_hash` varchar(255) NOT NULL COMMENT '�����ȥϥå���',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `user_order_type` int(11) NOT NULL default '0' COMMENT '1:���쥸�å�,2:����ӥ�,3:���,4:��Կ���',
  `user_order_use_point_status` tinyint(1) unsigned default '0' COMMENT '1:�ݥ���Ȼ��Ѥ���',
  `user_order_use_point` int(11) unsigned default '0' COMMENT '���Ѥ���ݥ������',
  `user_order_get_point` int(11) unsigned NOT NULL default '0' COMMENT '��������ݥ������',
  `user_order_get_point_date` datetime default NULL COMMENT '�ݥ������Ϳ������',
  `user_order_point_added_status` int(11) default NULL COMMENT '1:�ݥ������Ϳ��λ',
  `user_order_card_type` int(11) default '0' COMMENT '1:VISA,2:JCB,3:AMEX,4:MASTER,5:DINERS',
  `user_order_card_number` varchar(255) default NULL COMMENT '���쥸�åȥ������ֹ�',
  `user_order_card_name` varchar(255) default NULL COMMENT '���쥸�åȥ�����̾��',
  `user_order_card_expiration` varchar(255) default NULL COMMENT '���쥸�åȥ����ɴ���',
  `user_order_card_revo_status` int(10) unsigned default '0' COMMENT '1:���ʧ��,0:1��ʧ��',
  `user_order_credit_auth_code` varchar(255) default NULL COMMENT '���쥸�åȥ����ɷ�ѥ������ꥳ����',
  `user_order_credit_exchange_code` varchar(255) default NULL COMMENT '���쥸�åȥ����ɷ�ѥ�����',
  `user_order_conveni_type` varchar(16) default NULL COMMENT 'seveneleven,lawson,famima,seicomart',
  `user_order_conveni_sale_code` varchar(255) default NULL COMMENT '����ӥ˷�ѥ�����',
  `user_order_conveni_exchange_code` varchar(255) default NULL COMMENT '����ӥ˷�ѥ�����',
  `user_order_conveni_pay_url` text COMMENT '����ӥ�ʧ��ɼURL',
  `user_order_delivery_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:��Ͽ�ѽ��������,2:������ꤹ��',
  `user_order_delivery_day` int(11) default NULL COMMENT '1:������,2:12-14��,3:14-16��,4:16-18��,5:18-21��',
  `user_order_delivery_note` varchar(255) default NULL COMMENT '��ã����',
  `user_order_delivery_name` varchar(255) default NULL COMMENT '��ã�褪̾��',
  `user_order_delivery_name_kana` varchar(255) default NULL COMMENT '��ã�褪̾������',
  `user_order_delivery_zipcode` varchar(8) default NULL COMMENT '��ã��͹���ֹ�',
  `user_order_delivery_pref` int(1) unsigned default NULL COMMENT '��ã�轻����ƻ�ܸ��ֹ�',
  `user_order_delivery_address` text COMMENT '��ã�轻��',
  `user_order_delivery_address_building` text COMMENT '��ã���ʪ̾',
  `user_order_delivery_phone` varchar(255) default NULL COMMENT '��ã�������ֹ�',
  `user_order_total_price1` int(11) NOT NULL default '0' COMMENT '�����������ޤޤʤ�����',
  `user_order_total_price2` int(11) NOT NULL default '0' COMMENT '�����������ޤ���',
  `user_order_tax` int(11) NOT NULL default '0' COMMENT '������',
  `user_order_postage` int(11) NOT NULL default '0' COMMENT '����',
  `user_order_exchange_fee` int(11) NOT NULL default '0' COMMENT '��������',
  `user_order_comment` text COMMENT '������',
  `user_order_created_time` datetime NOT NULL COMMENT '��������',
  `user_order_updated_time` datetime NOT NULL COMMENT '��������',
  `user_order_deleted_time` datetime NOT NULL COMMENT '��������',
  `user_order_status` int(11) NOT NULL default '1' COMMENT '0:̵��,1:ͭ��',
  PRIMARY KEY  (`user_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���������ѥơ��֥�';

--
-- Table structure for table `user_order_copy`
--

DROP TABLE IF EXISTS `user_order_copy`;
CREATE TABLE `user_order_copy` (
  `user_order_copy_id` int(11) NOT NULL auto_increment COMMENT '��ʸ���桼������ID',
  `user_order_id` int(11) default NULL COMMENT '��������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `user_name` varchar(255) NOT NULL default '' COMMENT '�桼��̾',
  `user_nickname` varchar(128) default NULL COMMENT '�˥å��͡���',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT '�桼��̾����',
  `user_zipcode` varchar(8) default NULL COMMENT '͹���ֹ�',
  `user_pref` tinyint(1) unsigned NOT NULL COMMENT '������ƻ�ܸ��ֹ�',
  `user_address` text NOT NULL COMMENT '����',
  `user_address_building` text COMMENT '�����ʪ̾',
  `user_phone` varchar(255) NOT NULL default '' COMMENT '�����ֹ�',
  `user_birth_date` date default NULL COMMENT '����ǯ����',
  `user_sex` tinyint(1) default NULL COMMENT '����',
  `user_mailaddress` varchar(255) NOT NULL default '' COMMENT '�᡼�륢�ɥ쥹',
  `user_password` varchar(32) default NULL COMMENT '�ѥ����',
  `user_point` int(11) unsigned default NULL COMMENT '��ͭ�ݥ����',
  `user_hash` varchar(32) default NULL COMMENT '�桼���ϥå���',
  `user_status` tinyint(1) unsigned NOT NULL COMMENT '1:����Ͽ,2:����Ͽ,3:���,4:�������',
  `user_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `user_updated_time` datetime NOT NULL COMMENT '��������',
  `user_deleted_time` datetime default NULL COMMENT '�������',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�ǽ���������',
  `user_uid` varchar(32) default NULL COMMENT '����ü�����̻�',
  `user_magazine_error_num` int(10) default '0' COMMENT '���ޥ��ۿ����Կ�',
  `mm_only_flag` int(11) default NULL COMMENT '1:���ޥ��Τ���Ͽ�桼��',
  `user_sessid` varchar(64) default NULL COMMENT '�桼�����å�����̻�',
  PRIMARY KEY  (`user_order_copy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����������ԡ��ѥơ��֥�';

--
-- Table structure for table `user_order_hist`
--

DROP TABLE IF EXISTS `user_order_hist`;
CREATE TABLE `user_order_hist` (
  `user_order_hist_id` int(11) NOT NULL auto_increment COMMENT '�ѹ�����ID',
  `user_order_id` int(11) NOT NULL COMMENT '��ʸID',
  `cart_id` int(11) NOT NULL COMMENT '������ID',
  `cart_item_num` int(11) NOT NULL COMMENT '���ʸĿ�',
  `cart_status` int(11) default NULL COMMENT '0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�',
  `user_order_hist_user` varchar(255) default NULL COMMENT '�ѹ�������',
  `user_order_hist_created_time` datetime NOT NULL COMMENT '��������',
  `user_order_hist_updated_time` datetime default NULL COMMENT '��������',
  `user_order_hist_deleted_time` datetime default NULL COMMENT '�������',
  `user_order_hist_status` int(11) NOT NULL default '1' COMMENT '���ơ����� 1:ͭ�� 0:̵��',
  PRIMARY KEY  (`user_order_hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����ѹ�����ơ��֥�';

--
-- Table structure for table `user_prof`
--

DROP TABLE IF EXISTS `user_prof`;
CREATE TABLE `user_prof` (
  `user_prof_id` int(11) NOT NULL auto_increment COMMENT '�桼���ץ��ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `config_user_prof_id` int(11) NOT NULL COMMENT '�桼���ץ�ե��������ID',
  `user_prof_value` text NOT NULL COMMENT '�桼���ץ�ե������������',
  PRIMARY KEY  (`user_prof_id`),
  KEY `config_user_prof_id` (`config_user_prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼���ץ�եơ��֥�';

--
-- Table structure for table `user_sound`
--

DROP TABLE IF EXISTS `user_sound`;
CREATE TABLE `user_sound` (
  `user_sound_id` int(11) NOT NULL auto_increment COMMENT '�桼���������ID',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `sound_id` int(11) NOT NULL COMMENT '�������ID',
  `user_sound_status` tinyint(1) NOT NULL COMMENT '�桼��������ɥ��ơ����� ��1��ͭ�� ,0��̵����',
  `user_sound_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_sound_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_sound_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`user_sound_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�桼��������ɥơ��֥�';



INSERT INTO `admin` (`admin_id`, `admin_name`, `login_id`, `login_password`, `admin_action_category_id`, `admin_action_id`, `admin_shop_id`, `admin_status`) VALUES
(1, 'root', 'mobile', 'sns', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295', '', 1);

