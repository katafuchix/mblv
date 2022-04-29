
--
-- Table structure for table `stats_access`
--

DROP TABLE IF EXISTS `stats_access`;
CREATE TABLE `stats_access` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ID',
  `id` varchar(255) NOT NULL default '0' COMMENT 'アクション名',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アクセスログテーブル';

--
-- Table structure for table `stats_ad`
--

DROP TABLE IF EXISTS `stats_ad`;
CREATE TABLE `stats_ad` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT '広告ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT '広告カテゴリID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT '種別',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告ログテーブル';

--
-- Table structure for table `stats_avatar`
--

DROP TABLE IF EXISTS `stats_avatar`;
CREATE TABLE `stats_avatar` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'アバターID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'アバターカテゴリID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アバターログテーブル';

--
-- Table structure for table `stats_banner`
--

DROP TABLE IF EXISTS `stats_banner`;
CREATE TABLE `stats_banner` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` varchar(255) NOT NULL default '0' COMMENT 'バナーID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'バナーカテゴリID',
  `status` int(11) NOT NULL default '0' COMMENT '種別',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='バナーログテーブル';

--
-- Table structure for table `stats_blog`
--

DROP TABLE IF EXISTS `stats_blog`;
CREATE TABLE `stats_blog` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='日記ログテーブル';

--
-- Table structure for table `stats_blog_article`
--

DROP TABLE IF EXISTS `stats_blog_article`;
CREATE TABLE `stats_blog_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT '日記記事ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ブログ記事ログテーブル';

--
-- Table structure for table `stats_community`
--

DROP TABLE IF EXISTS `stats_community`;
CREATE TABLE `stats_community` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'コミュニティID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティログテーブル';

--
-- Table structure for table `stats_community_article`
--

DROP TABLE IF EXISTS `stats_community_article`;
CREATE TABLE `stats_community_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'コミュニティトピックID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティトピックログテーブル';

--
-- Table structure for table `stats_decomail`
--

DROP TABLE IF EXISTS `stats_decomail`;
CREATE TABLE `stats_decomail` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'デコメールID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'デコメールカテゴリID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='デコメールログテーブル';

--
-- Table structure for table `stats_game`
--

DROP TABLE IF EXISTS `stats_game`;
CREATE TABLE `stats_game` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'ゲームID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'ゲームカテゴリID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ゲームログID';

--
-- Table structure for table `stats_image`
--

DROP TABLE IF EXISTS `stats_image`;
CREATE TABLE `stats_image` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT '画像ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='画像ログテーブル';

--
-- Table structure for table `stats_movie`
--

DROP TABLE IF EXISTS `stats_movie`;
CREATE TABLE `stats_movie` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT '動画ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='動画ログテーブル';

--
-- Table structure for table `stats_sound`
--

DROP TABLE IF EXISTS `stats_sound`;
CREATE TABLE `stats_sound` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `id` int(11) NOT NULL default '0' COMMENT 'サウンドID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サウンドカテゴリID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='サウンドログテーブル';
