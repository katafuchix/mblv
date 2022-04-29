
--
-- Table structure for table `stats_access`
--

DROP TABLE IF EXISTS `stats_access`;
CREATE TABLE `stats_access` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ID',
  `id` varchar(255) NOT NULL default '0' COMMENT '���������̾',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����������ơ��֥�';

--
-- Table structure for table `stats_ad`
--

DROP TABLE IF EXISTS `stats_ad`;
CREATE TABLE `stats_ad` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '����ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '���𥫥ƥ���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  `status` int(11) NOT NULL default '0' COMMENT '����',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������ơ��֥�';

--
-- Table structure for table `stats_avatar`
--

DROP TABLE IF EXISTS `stats_avatar`;
CREATE TABLE `stats_avatar` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '���Х���ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '���Х������ƥ���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���Х������ơ��֥�';

--
-- Table structure for table `stats_banner`
--

DROP TABLE IF EXISTS `stats_banner`;
CREATE TABLE `stats_banner` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` varchar(255) NOT NULL default '0' COMMENT '�Хʡ�ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�Хʡ����ƥ���ID',
  `status` int(11) NOT NULL default '0' COMMENT '����',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�Хʡ����ơ��֥�';

--
-- Table structure for table `stats_blog`
--

DROP TABLE IF EXISTS `stats_blog`;
CREATE TABLE `stats_blog` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ơ��֥�';

--
-- Table structure for table `stats_blog_article`
--

DROP TABLE IF EXISTS `stats_blog_article`;
CREATE TABLE `stats_blog_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '��������ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�֥��������ơ��֥�';

--
-- Table structure for table `stats_community`
--

DROP TABLE IF EXISTS `stats_community`;
CREATE TABLE `stats_community` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '���ߥ�˥ƥ�ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ����ơ��֥�';

--
-- Table structure for table `stats_community_article`
--

DROP TABLE IF EXISTS `stats_community_article`;
CREATE TABLE `stats_community_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '���ߥ�˥ƥ��ȥԥå�ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ߥ�˥ƥ��ȥԥå����ơ��֥�';

--
-- Table structure for table `stats_decomail`
--

DROP TABLE IF EXISTS `stats_decomail`;
CREATE TABLE `stats_decomail` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼��ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '�ǥ��᡼�륫�ƥ���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ǥ��᡼����ơ��֥�';

--
-- Table structure for table `stats_game`
--

DROP TABLE IF EXISTS `stats_game`;
CREATE TABLE `stats_game` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '������ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '�����५�ƥ���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ID';

--
-- Table structure for table `stats_image`
--

DROP TABLE IF EXISTS `stats_image`;
CREATE TABLE `stats_image` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '����ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ơ��֥�';

--
-- Table structure for table `stats_movie`
--

DROP TABLE IF EXISTS `stats_movie`;
CREATE TABLE `stats_movie` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT 'ư��ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ư����ơ��֥�';

--
-- Table structure for table `stats_sound`
--

DROP TABLE IF EXISTS `stats_sound`;
CREATE TABLE `stats_sound` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '������������',
  `id` int(11) NOT NULL default '0' COMMENT '�������ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '������ɥ��ƥ���ID',
  `user_id` int(11) NOT NULL default '0' COMMENT '�桼��ID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='������ɥ��ơ��֥�';
