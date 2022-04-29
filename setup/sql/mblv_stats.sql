-- MySQL dump 10.11
--
-- Host: localhost    Database: mblv_stats
-- ------------------------------------------------------
-- Server version	5.0.33-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES ujis */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `stats_access`
--

DROP TABLE IF EXISTS `stats_access`;
CREATE TABLE `stats_access` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` varchar(255) NOT NULL default '0' COMMENT 'アクセスID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3613177 DEFAULT CHARSET=ujis COMMENT='アクセス解析';

--
-- Table structure for table `stats_access_month`
--

DROP TABLE IF EXISTS `stats_access_month`;
CREATE TABLE `stats_access_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` varchar(255) NOT NULL,
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=926 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_ad`
--

DROP TABLE IF EXISTS `stats_ad`;
CREATE TABLE `stats_ad` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT '広告ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT '0:,1:,2:',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=337485 DEFAULT CHARSET=ujis COMMENT='広告解析';

--
-- Table structure for table `stats_ad_month`
--

DROP TABLE IF EXISTS `stats_ad_month`;
CREATE TABLE `stats_ad_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `view` int(11) NOT NULL default '0',
  `click` int(11) NOT NULL default '0',
  `regist` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_avatar`
--

DROP TABLE IF EXISTS `stats_avatar`;
CREATE TABLE `stats_avatar` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'アバターID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55267 DEFAULT CHARSET=ujis COMMENT='アバター解析';

--
-- Table structure for table `stats_avatar_month`
--

DROP TABLE IF EXISTS `stats_avatar_month`;
CREATE TABLE `stats_avatar_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1630 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_banner`
--

DROP TABLE IF EXISTS `stats_banner`;
CREATE TABLE `stats_banner` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` varchar(255) NOT NULL default '0' COMMENT 'バナーID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT '0:,1:,2:',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=ujis COMMENT='バナー解析';

--
-- Table structure for table `stats_banner_month`
--

DROP TABLE IF EXISTS `stats_banner_month`;
CREATE TABLE `stats_banner_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `view` int(11) NOT NULL default '0',
  `click` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_blog`
--

DROP TABLE IF EXISTS `stats_blog`;
CREATE TABLE `stats_blog` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'ブログID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9087 DEFAULT CHARSET=ujis COMMENT='ブログ解析';

--
-- Table structure for table `stats_blog_article`
--

DROP TABLE IF EXISTS `stats_blog_article`;
CREATE TABLE `stats_blog_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'ブログ記事ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3321 DEFAULT CHARSET=ujis COMMENT='ブログ記事解析';

--
-- Table structure for table `stats_blog_article_month`
--

DROP TABLE IF EXISTS `stats_blog_article_month`;
CREATE TABLE `stats_blog_article_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=598 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_blog_month`
--

DROP TABLE IF EXISTS `stats_blog_month`;
CREATE TABLE `stats_blog_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=574 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_community`
--

DROP TABLE IF EXISTS `stats_community`;
CREATE TABLE `stats_community` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'コミュニティID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11182 DEFAULT CHARSET=ujis COMMENT='コミュニティ解析';

--
-- Table structure for table `stats_community_article`
--

DROP TABLE IF EXISTS `stats_community_article`;
CREATE TABLE `stats_community_article` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'コミュニティ記事ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2316 DEFAULT CHARSET=ujis COMMENT='コミュニティ記事解析';

--
-- Table structure for table `stats_community_article_month`
--

DROP TABLE IF EXISTS `stats_community_article_month`;
CREATE TABLE `stats_community_article_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_community_month`
--

DROP TABLE IF EXISTS `stats_community_month`;
CREATE TABLE `stats_community_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_contents`
--

DROP TABLE IF EXISTS `stats_contents`;
CREATE TABLE `stats_contents` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'コンテンツID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16204 DEFAULT CHARSET=ujis COMMENT='コンテンツ解析';

--
-- Table structure for table `stats_contents_month`
--

DROP TABLE IF EXISTS `stats_contents_month`;
CREATE TABLE `stats_contents_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `view` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_decomail`
--

DROP TABLE IF EXISTS `stats_decomail`;
CREATE TABLE `stats_decomail` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'デコメールID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2387 DEFAULT CHARSET=ujis COMMENT='デコメール解析';

--
-- Table structure for table `stats_decomail_month`
--

DROP TABLE IF EXISTS `stats_decomail_month`;
CREATE TABLE `stats_decomail_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=330 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_game`
--

DROP TABLE IF EXISTS `stats_game`;
CREATE TABLE `stats_game` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'ゲームID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1496 DEFAULT CHARSET=ujis COMMENT='ゲーム解析';

--
-- Table structure for table `stats_game_month`
--

DROP TABLE IF EXISTS `stats_game_month`;
CREATE TABLE `stats_game_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_image`
--

DROP TABLE IF EXISTS `stats_image`;
CREATE TABLE `stats_image` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT '画像ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis COMMENT='画像解析';

--
-- Table structure for table `stats_image_month`
--

DROP TABLE IF EXISTS `stats_image_month`;
CREATE TABLE `stats_image_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_invite`
--

DROP TABLE IF EXISTS `stats_invite`;
CREATE TABLE `stats_invite` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT '友達紹介ID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT '0:mail 1:access 2:reg',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=ujis COMMENT='友達紹介解析';

--
-- Table structure for table `stats_invite_month`
--

DROP TABLE IF EXISTS `stats_invite_month`;
CREATE TABLE `stats_invite_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `mail` int(11) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `regist` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_item`
--

DROP TABLE IF EXISTS `stats_item`;
CREATE TABLE `stats_item` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT '商品ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT '0:,1:,2:',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=468 DEFAULT CHARSET=ujis COMMENT='商品解析';

--
-- Table structure for table `stats_item_month`
--

DROP TABLE IF EXISTS `stats_item_month`;
CREATE TABLE `stats_item_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `access` int(11) NOT NULL default '0',
  `buy` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_media`
--

DROP TABLE IF EXISTS `stats_media`;
CREATE TABLE `stats_media` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'メディアID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `status` int(11) NOT NULL default '0' COMMENT 'access:0, mail:1, regist:2, send:3, resign:4, buy:5',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=ujis COMMENT='メディア解析';

--
-- Table structure for table `stats_media_month`
--

DROP TABLE IF EXISTS `stats_media_month`;
CREATE TABLE `stats_media_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `access` int(11) NOT NULL default '0',
  `mail` int(11) NOT NULL default '0',
  `regist` int(11) NOT NULL default '0',
  `send` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_movie`
--

DROP TABLE IF EXISTS `stats_movie`;
CREATE TABLE `stats_movie` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT '動画ID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis COMMENT='動画解析';

--
-- Table structure for table `stats_movie_month`
--

DROP TABLE IF EXISTS `stats_movie_month`;
CREATE TABLE `stats_movie_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

--
-- Table structure for table `stats_sound`
--

DROP TABLE IF EXISTS `stats_sound`;
CREATE TABLE `stats_sound` (
  `stats_id` int(11) NOT NULL auto_increment COMMENT '解析ID',
  `datetime` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '解析日時',
  `id` int(11) NOT NULL default '0' COMMENT 'サウンドID',
  `sub_id` int(11) NOT NULL default '0' COMMENT 'サブID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=835 DEFAULT CHARSET=ujis COMMENT='サウンド解析';

--
-- Table structure for table `stats_sound_month`
--

DROP TABLE IF EXISTS `stats_sound_month`;
CREATE TABLE `stats_sound_month` (
  `stats_id` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `sub_id` int(11) NOT NULL default '0',
  `datetime` datetime NOT NULL,
  `uu` int(11) NOT NULL default '0',
  `dl` int(11) NOT NULL default '0',
  `created_time` datetime NOT NULL,
  PRIMARY KEY  (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=ujis;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-09-24  3:10:53
