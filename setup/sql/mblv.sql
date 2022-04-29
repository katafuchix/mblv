-- MySQL dump 10.11
--
-- Host: localhost    Database: mblv
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


DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment COMMENT '管理者ID',
  `admin_name` text NOT NULL COMMENT '管理者名',
  `login_id` varchar(255) NOT NULL COMMENT 'ログインID',
  `login_password` varchar(255) NOT NULL COMMENT 'ログインパスワード',
  `admin_action_category_id` text NOT NULL COMMENT 'アクセス権限を持つアクションカテゴリID',
  `admin_action_id` text COMMENT 'アクセス権限を持つアクションカテゴリID',
  `admin_shop_id` varchar(255) NOT NULL COMMENT 'アクセス権限を持つショップID',
  `admin_status` tinyint(1) unsigned NOT NULL COMMENT '管理者ステータス(0:無効,1:有効)',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='管理者テーブル';
INSERT INTO `admin` VALUES (1,'root','mobile','ZEKNn2e5','account,ad,analytics,avatar,banner,bbs,blacklist,blog,comment,community,config,contents,decomail,ec,emoji,file,game,htmlltemplate,image,movie,magazine,mailtemplate,media,message,news,ngword,point,ranking,report,segment,sound,video,stats,user,util','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295','16,19,20',2),(2,'管理人','mobile1','sns1','','','',1),(3,'!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','1,40,59,61','','',1),(10,'ショップ1,2管理者','id','id','29,42,43,55,56','','1,2',1),(11,'tesutop','tesu','top','','','',0),(12,'tesutop','tesu4','top','','','',0),(13,'tesutop','tesu3','top','','','',1),(14,'tesutop','tesu2','top','','','',1),(15,'tesutop','tesu1','top','','','',1),(16,'スーパー管理人','root','adgj','account,ad,analytics,avatar,banner,bbs,blacklist,blog,comment,community,config,contents,decomail,ec,emoji,file,game,htmlltemplate,image,magazine,mailtemplate,media,message,news,ngword,point,ranking,report,segment,sound,stats,user,util','','16,19,20',2),(17,'テスト管理者','testadmin','testadmin','1,2,3,4,5,6,26,32,33,34,38,39,42,44,49,56,57,60,61','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,114,115,116,117,118,119,222,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163160,161,162,163,188,189,190,191,192,193,194,195,196,197,198,206,207,208,209,210,211,212,221,248,249,250,251,252,275,276,277,278,279,280,281,275,287,288,289,290,291,util','',0),(18,'権限テスト用','authtest','authtest','38,61',NULL,'',1),(19,'ショップ管理者','shop1xxxxx','shop1','ec,point,user',NULL,'16',1),(20,'ショップ管理者２','shop2','adgj','ec,point,user',NULL,'19',1);

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` tinyint(1) unsigned NOT NULL auto_increment COMMENT 'コンフィグID',
  `config_type` varchar(16) NOT NULL COMMENT 'コンフィグタイプ',
  `site_name` varchar(128) default NULL COMMENT 'サイト名',
  `site_url` varchar(255) default NULL COMMENT 'サイトURL',
  `site_company_name` text COMMENT 'サイト運営会社',
  `site_phone` varchar(255) default NULL COMMENT '運営元電話番号',
  `site_html_title` text COMMENT 'HTMLサイト名',
  `site_information` text COMMENT 'お知らせ',
  `site_public_status` tinyint(1) unsigned default '1' COMMENT '公開ステータス(0:非公開制,1:公開制)',
  `site_maintenance_status` tinyint(1) unsigned default '0' COMMENT 'メンテナンスステータス(0:運営中,1:メンテナンス中)',
  `site_meta_description` text COMMENT 'メタディスクリプション',
  `site_meta_keywords` text COMMENT 'メタキーワード',
  `site_meta_robots` text COMMENT 'メタロボッツ',
  `site_meta_author` text COMMENT 'メタオウサー',
  `site_bg_color` varchar(255) default NULL COMMENT '背景色',
  `site_text_color` varchar(255) default NULL COMMENT '文字色',
  `site_link_color` varchar(255) default NULL COMMENT 'リンク色',
  `site_alink_color` varchar(255) default NULL COMMENT 'アクティブリンク色',
  `site_vlink_color` varchar(255) default NULL COMMENT '訪問済みリンク色',
  `site_title_bg_color` varchar(255) default NULL COMMENT 'タイトル色',
  `site_title_font_color` varchar(255) default NULL COMMENT 'タイトル背景色',
  `site_menu_color` varchar(255) default NULL COMMENT 'メニュー色',
  `site_hr_color` varchar(255) default NULL COMMENT '水平線色',
  `site_time_color` varchar(255) default NULL COMMENT '時刻色',
  `site_pager_text_color` varchar(255) default NULL COMMENT 'ページャ文字色',
  `site_pager_bg_color` varchar(255) default NULL COMMENT 'ページャ背景色',
  `site_form_name_color` varchar(255) default NULL COMMENT 'フォーム色',
  `site_error_color` varchar(255) default NULL COMMENT 'エラー色',
  `site_ngword` text COMMENT 'NGワード',
  `site_regist_point` int(11) default '0' COMMENT '入会時付与ポイント',
  `site_invite_from_point` int(11) default '0' COMMENT '友達招待入会時付与ポイント（招待者）',
  `site_invite_to_point` int(11) default '0' COMMENT '友達招待入会時付与ポイント（被招待者）',
  `site_navi_template` text COMMENT 'ナビゲーションテンプレート',
  `site_low_term_d` text COMMENT 'DOCOMO下位端末',
  `site_low_term_a` text COMMENT 'AU下位端末',
  `site_low_term_s` text COMMENT 'SOFTBANK下位端末',
  `site_cms_html1` text COMMENT '上部HTML',
  `site_cms_html2` text COMMENT '下部HTML',
  `site_cms_html3` text COMMENT '中部HTML',
  PRIMARY KEY  (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コンフィグテーブル';
INSERT INTO `config` VALUES (1,'config','テクノバ','http://mblv.varth.jp/','株式会社ABCDEFG','03-0000-0000','テクノバ','[x:0001]運営事務局からのお知らせ[x:0001]\r\n[x:0138]桜の季節そろそろ終わりですね[x:0138]',1,0,'携帯サイト構築プラットフォーム','携帯サイト構築プラットフォーム','noindex,nofollow','携帯サイト構築プラットフォーム','#FFFFFF','#595959','#004A7F','#0099CC','#004A7F','#FF9933','#F8F8FF','#6AD500','#FF9933','#009900','#000000','#E9E9E9','#BF6000','#FF0000','アイヌ系\r\n青姦\r\n明盲\r\n足切り\r\nアメ公\r\nあらめん\r\n按摩\r\n躄\r\n伊勢乞食\r\nイタ公\r\n淫売\r\n穢多\r\n沖仲仕\r\n唖\r\nおわい屋\r\n隠坊\r\nがちゃ目\r\n上方の贅六\r\n姦通\r\nキ印\r\n気違い\r\n給仕\r\n狂気\r\n狂女\r\n漁夫\r\n苦力\r\n黒んぼ\r\n毛唐\r\n強姦\r\n後進国\r\n鉱夫\r\n工夫\r\n坑夫\r\n紅毛人\r\n小使い\r\n魚屋\r\n三助\r\n色盲\r\n士農工商\r\n自閉症児\r\nジュー\r\n周旋屋\r\n女給\r\nしらっこ\r\n心障児\r\n心障者\r\n精神異常\r\n精薄\r\n傴僂\r\n鮮人\r\n潜水夫\r\n千摺り\r\n線路工夫\r\n掃除婦\r\n掃除夫\r\n雑役夫\r\n育ちより氏\r\n第三国\r\n蛸部屋\r\nダッチマン\r\n知恵遅れ\r\n近目\r\nチャンコロ\r\n中共\r\n朝鮮征伐\r\n跛\r\n聾\r\n聾桟敷\r\n低開発国\r\n低脳\r\n低脳児\r\n丁稚\r\n手ん棒\r\n土方\r\n特殊学級\r\n特殊学校\r\nどや街\r\n屠殺\r\n屠殺場\r\n屠殺人\r\nどさ回り\r\n土人\r\nドヤ\r\nドヤ街\r\nトルコ嬢\r\nトルコ風呂\r\nどん百姓\r\nナオン\r\n南鮮\r\nニガー\r\nニグロ\r\n人足\r\n人非人\r\n人夫\r\n農夫\r\n脳膜炎\r\n馬鹿でもチョンでも\r\n白痴\r\n馬喰\r\n馬丁\r\n半島人\r\n引かれ者\r\n跛\r\n部落\r\n浮浪児\r\n北鮮\r\nポコペン\r\n保線工夫\r\n満州\r\n未開人\r\n未開発国\r\n蒙古症\r\n盲人\r\n盲目\r\n文盲\r\n癩病\r\n露助\r\nロン・パリ\r\nロンパリ\r\nチンコ\r\nちんこ\r\nオチンコ\r\nおちんこ\r\nおちんぽ\r\nオチンポ\r\n包茎\r\nホウケイ\r\nほうけい\r\nセックス\r\nせっくす\r\nSEX\r\nマンコ\r\nまんこ\r\nオマンコ\r\nおまんこ\r\nオメコ\r\nおめこ\r\nクリトリス\r\nくりとりす\r\n恥部\r\n愛液\r\n殺す\r\nころす\r\nコロス\r\nぶっ殺す\r\nブッコロス\r\n死ね\r\nシネ\r\n死\r\n自殺\r\nジサツ\r\nじさつ\r\nリストカット\r\nりすとかっと\r\nリスカ\r\nりすか\r\n@docomo.ne.jp\r\n@ezweb.ne.jp\r\n@softbank.ne.jp\r\npdx.ne.jp\r\n090\r\n080\r\n070\r\n援助交際\r\n援交\r\n逆援助\r\n逆援助交際\r\n集団自殺\r\nしゅうだんじさつ\r\nシュウダンジサツ\r\nきちがい\r\nびっこ\r\nめくら\r\n!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\\r\n自殺\r\n襲撃',100,20,30,'','||\\\\,#$%&\'()=~','','','','',''),(2,'mall','ﾓﾊﾞｲﾙﾊﾞｰｽEC','http://mblv-user.varth.jp/index.php?action_user_ec=true','株式会社テクノバース','03-5842-1366','なんでもそろうﾓﾊﾞｲﾙﾊﾞｰｽEC','[x:0001]運営事務局からのお知らせ[x:0001]\r\n[x:0138]桜の季節そろそろ終わりですね[x:0138]',1,0,'みんな集まるﾓﾊﾞｲﾙﾊﾞｰｽEC','デコメ,アバター,ショッピングモール,SNS','noindex,nofollow,noarchive','technovarth.co.jp','#FFFFFF','#66333','#ff00FF','#0099CC','#CC66FF','#FF99AA','#FFFFFF','#00AA2B','#f57af4','#009900','#000000','#E9E9E9','#BF6000','#FF0000',NULL,110,120,130,'ナビゲーションテンプレート?','','','','上）<b>モバイルバース</b>がＯＰＥＮしました。\r\nよろしくﾄﾞｰｿﾞ','下）<b>モバイルバース</b>は現在ベータテスト中です・・・','中）なにをすればいいかわからない？\r\n→<b>プロフィール</b>を充実させて\r\n→お友達をつくろう'),(3,'decomail','デコメール構築パッケージ',NULL,'株式会社テクノバース','','デコメール用','',1,0,'','','','','','','','','','','','','','','','','','',NULL,0,0,0,'','D503i\r\nD503iS\r\nF503i\r\nF503iS\r\nN503i\r\nN503iS\r\nP503i\r\nP503iS\r\nSO503i\r\nSO503iS\r\nD504i\r\nF504i\r\nF504iS\r\nN504i\r\nN504iS\r\nP504i\r\nP504iS\r\nSO504i\r\nD505i\r\nF505i\r\nF505iGPS\r\nN505i\r\nP505i\r\nSH505i\r\nSH505i2\r\nSO505i\r\nD505iS\r\nN505iS\r\nP505iS\r\nSH505iS\r\nSO505iS\r\nD506i\r\nF506i\r\nN506i\r\nN506iS\r\nN506iS2\r\nP506iC\r\nSH506iC\r\nSO506i\r\nSO506iC\r\nSO506iS\r\nD2101V\r\nN2001\r\nN2002\r\nP2002\r\nP2101V\r\nSH2101V\r\nT2101V\r\nF2051\r\nF2102V\r\nN2051\r\nN2102V\r\nN2701\r\nN2701m\r\nP2102V\r\nF700i\r\nF700iS\r\nN700i\r\nP700i\r\nSA700iS\r\nSH700i\r\nSH700iS\r\nD701i\r\nD701iWM\r\nD702i\r\nD702iF\r\nF702iD\r\nM702iG\r\nM702iS\r\nN701i\r\nN701iECO\r\nN702iD\r\nN702iS\r\nP701iD\r\nP702i\r\nP702iD\r\nP851i_prosolid2\r\nSA702i\r\nSA800i\r\nSH702iD\r\nSH702iS\r\nSO702i\r\n','ST13\r\nKC14\r\nKC15\r\nST14\r\nSN22\r\nSN23\r\nSA24\r\nSA25\r\nTS25\r\nSA28\r\nKC23\r\nSN26\r\nSN27\r\nSN28\r\nKC26\r\nSN29\r\nPT21\r\nSA21\r\nCA21\r\nTS22\r\nSN21\r\nSA22\r\nTS23\r\nCA22\r\nHI23\r\nHI24\r\nTS24\r\nKC22\r\nST21\r\nCA23\r\nSN24\r\nCA24\r\nSN25\r\nST23\r\nCA25\r\nCA26\r\nTS26\r\nKC24\r\nKC25\r\nSA26\r\nTS27\r\nSA27\r\nTS28\r\nST24\r\nSY15\r\nSN17\r\nHI01\r\nHI02\r\nDN01\r\nHI21\r\nKC21\r\nMA21\r\nTS11\r\nHI11\r\nCA11\r\nSY11\r\nSN11\r\nKC11\r\nMA11\r\nMA12\r\nHI12\r\nTS12\r\nCA12\r\nKC12\r\nSY12\r\nDN11\r\nST11\r\nSN12\r\nSN14\r\nSY13\r\nSN13\r\nHI13\r\nMA13\r\nCA13\r\nTS13\r\nST12\r\nSY14\r\nSN15\r\nSN16\r\nKC13\r\nTS14\r\nHI14\r\nCA14\r\nTS21\r\nST22\r\nMIT1\r\nKCT1\r\nKCT2\r\nKCT4\r\nKCT5\r\nKCT6\r\nKCT3\r\nKCT7\r\nKCT8\r\nKCT9\r\nKCTA\r\nKCTB\r\nKCTC\r\nKCTD\r\nKCU1\r\nMAT1\r\nMAT2\r\nMAT3\r\nSYT1\r\nSYT2\r\nSYT3\r\nSYT4\r\nSYT5\r\nTST1\r\nTST2\r\nTST3\r\nTST4\r\nTST5\r\nTST6\r\nTST7\r\nTST8\r\nTST9\r\nHI31\r\nST25','703N\r\n705N\r\n705NK\r\n705P\r\n705SC\r\n705T\r\n706N\r\n706P\r\n706SC\r\n707SC\r\n707SC2\r\n708SC\r\n709SC\r\n802N\r\n803T\r\n804N\r\n804NK\r\n804SS\r\n805SC\r\n810T\r\n821P\r\n821SH\r\n902T\r\n903T\r\n904T\r\nJ-D08\r\nJ-N05\r\nJ-N51\r\nJ-NM02\r\nJ-P51\r\nJ-SA04\r\nJ-SA05\r\nJ-SA06\r\nJ-SA51\r\nJ-SH05\r\nJ-SH07\r\nJ-SH08\r\nJ-SH09\r\nJ-SH10\r\nJ-SH51\r\nJ-SH52\r\nJ-SH53\r\nJ-T06\r\nJ-T07\r\nJ-T08\r\nJ-T09\r\nJ-T10\r\nJ-T51\r\nV301D\r\nV301SH\r\nV301T\r\nV302SH\r\nV302T\r\nV303T\r\nV401D\r\nV401SA\r\nV401SH\r\nV401T\r\nV402SH\r\nV403SH\r\nV501SH\r\nV501T\r\nV502T\r\nV601N\r\nV601SH\r\nV601T\r\nV603T\r\nV604SH\r\nV702MO\r\nV702NK\r\nV702NK2\r\nV702sMO\r\nV703N\r\nV705T\r\nV801SA\r\nV801SH\r\nV802N\r\nV802SE\r\nV803T\r\nV804N\r\nV804NK\r\nV804SS\r\nV902SH\r\nV902T\r\nV903T\r\nV904T','<hr color=\"#ffe4e1\">\r\n<!--メニュー-->\r\n上部HTML領域<br />\r\n<div style=\"background-color:#ffe4e1; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#ffff00\">[x:0761]</span><span style=\"color:#800000\">メニュー</span><span style=\"color:#ffff00\">[x:0112]</span><br />\r\n<a href=\"?action_user_decomail_list=true&decomail_category_id=1\"><span style=\"font-size:small; color:#dc143c\">新着</span></a>\r\n[x:0761]&nbsp;<a href=\"?action_user_decomail_ranking=true\"><span style=\"font-size:xx-small; color:#ffa500\">ﾗﾝｷﾝｸﾞ</span></a>\r\n[x:0112]&nbsp;<a href=\"#d_tokusyu\"><span style=\"font-size:xx-small; color:#0000cd\">特集</span></a>\r\n[x:0761]<br />\r\n<a href=\"#d_chara\"><span style=\"font-size:xx-small; color:#9370db\">ｷｬﾗ</span></a>[x:0761]&nbsp;\r\n<a href=\"#d_category\"><span style=\"font-size:xx-small; color:#9370db\">ｶﾃｺﾞﾘ</span></a>[x:0112]<br />\r\n</div>\r\n','','中部HTML領域'),(4,'avatar','アバターサイト構築パッケージ',NULL,'株式会社テクノバース','','','',1,0,'','','','','','','','','','','','','','','','','','',NULL,0,0,0,'','','','','','下部HTML','中部HTML'),(5,'game',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'sound',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'ad',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL auto_increment COMMENT 'フリーページID',
  `shop_id` int(11) NOT NULL default '0',
  `contents_code` varchar(255) NOT NULL COMMENT 'フリーページタイプ',
  `contents_title` text NOT NULL COMMENT 'フリーページタイトル',
  `contents_body` text NOT NULL COMMENT 'フリーページコンテンツ',
  `contents_status` tinyint(11) NOT NULL COMMENT 'フリーページステータス （1：有効,0：無効）',
  `contents_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `contents_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `contents_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='フリーページテーブル';
INSERT INTO `contents` VALUES (1,0,'test','フリーページタイトル1','フリーページ本文',1,'0000-00-00 00:00:00','2008-04-03 16:30:59','0000-00-00 00:00:00'),(2,0,'test1','2','3',0,'2008-04-03 15:09:32','2008-04-03 16:39:41','2008-04-03 15:40:18'),(3,0,'fortune_index','トップページ','<html>\r\n<head>\r\n<title>ﾅﾊﾟﾀｳﾝ 診断･占い</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n</head>\r\n\r\n<body bgcolor=\"#FFFFFF\" text=\"#666666\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n<div align=\"center\"><img src=\"##file13##\" width=\"240\" height=\"40\" alt=\"診断･占いﾄｯﾌﾟ\"></div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"告知ﾊﾞﾅｰ\"><br>\r\n</div>\r\n<br>\r\n<div style=\"background-color:#336633\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">ﾅﾊﾟﾀｳﾝ新着情報</font></div>\r\n</div>\r\n<div style=\"background-color:#ECFFE8\" >4/20 ｹﾞｰﾑ｢ﾒﾀﾎﾞ君｣登場<br>\r\n      4/15 ｱﾊﾞﾀｰ｢春の特集｣ｽﾀｰﾄ<br>\r\n      4/10 診断・占い｢ｵﾘｼﾞﾅﾙ診断｣追加</div>\r\n<div style=\"background-color:#CC3333\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">新着診断･占い</font> </div>\r\n</div>\r\n<div style=\"background-color:#FFECEC\" >\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"特集ﾊﾞﾅｰ\">なんでも星座ﾗﾝｷﾝｸﾞ｢<a href=\"ranking/q001.html\">異性にﾓﾃる星座</a>｣<br>\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"特集ﾊﾞﾅｰ\">ｵﾘｼﾞﾅﾙ診断｢<a href=\"original/q001/index.html\">あなたが恋愛に失敗する理由</a>｣ \r\n<br>\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"特集ﾊﾞﾅｰ\">血液型占い｢<a href=\"blood/q001/index.html\">血液型別基本性格</a>｣\r\n</div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"特集ﾊﾞﾅｰ\"></div>\r\n<font size=\"1\">愛を取り戻せ!特集<br>\r\nこんな男､こんな女に気をつけろ!!<br>\r\n</font> \r\n<div align=\"right\">⇒<a href=\"##fp1##\">特集を見る</a></div>\r\n<br>\r\n<div style=\"background-color:#FF6600\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">ﾅﾊﾟﾀｳﾝ診断</font></div>\r\n</div>\r\n<div style=\"background-color:#FFECCE\" ><a href=\"situation/index.html\">ｼﾁｭｴｰｼｮﾝ診断</a><br>\r\n  <a href=\"woman/index.html\">女の幸せ力検定</a><br>\r\n  <a href=\"original/index.html\">ｵﾘｼﾞﾅﾙ診断</a></div>\r\n<div style=\"background-color:#6666CC\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">ﾅﾊﾟﾀｳﾝ占い</font></div>\r\n</div>\r\n<div style=\"background-color:#E8E8FF\" ><a href=\"ranking/index.html\">なんでも星座ﾗﾝｷﾝｸﾞ</a><br>\r\n      <a href=\"blood/index.html\">血液型占い</a></div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"告知ﾊﾞﾅｰ\"></div>\r\n<br>\r\n関連ｺﾐｭﾆﾃｨ<br>\r\n<a href=\"\">占い総合</a><br>\r\n<a href=\"\">桜倉ｹﾝ</a><br>\r\n<a href=\"\">水谷奏音</a><br>\r\n<a href=\"\">瑛理奈</a><br>\r\n<br>\r\nﾊﾟﾜｰｽﾄｰﾝ･開運ｸﾞｯｽﾞなら<br>\r\n<a href=\"\">ﾅﾊﾟﾀｳﾝﾏｰｹｯﾄ</a><br>\r\n<br>\r\n<div align=\"center\"><a href=\"uranai.html\">ｹﾞｰﾑ</a>/<a href=\"abatar.html\">ｱﾊﾞﾀｰ</a>/<a href=\"deco.html\">ﾃﾞｺﾒ</a>/<a href=\"sound.html\">ｻｳﾝﾄﾞ</a><br>\r\n</div>\r\n<br>\r\n<div style=\"background-color:#660000\"> \r\n  <div align=\"center\"><font color=\"#FFFFFF\">MENU</font></div>\r\n</div>\r\n<a href=\"\">対応機種</a><br>\r\n<a href=\"\">ﾅﾊﾟﾎﾟの集め方</a><br>\r\n<a href=\"\">Q&A</a><br>\r\n<a href=\"\">ﾏｲﾍﾟｰｼﾞ</a><br>\r\n&#59115;<a href=\"\">ﾅﾊﾟﾀｳﾝ総合TOPへ</a> \r\n<hr>\r\n<div align=\"center\">(C)ｽﾍﾟｰｽｱｳﾄ</div>\r\n</body>\r\n</html>\r\n',0,'2008-04-03 17:09:46','2008-08-09 00:11:41','2008-08-09 00:11:41'),(4,0,'decomail_new','今日の新着デコメール','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメ新着</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ffe4e1; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#00ff00\">NEW</span><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#00ff00\">今日の新着はこちら</span><br />\r\n</div>\r\n<!--新着-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#ff6699\">4/12NEW</span><br />\r\n<img src=\"##file16##\"  width=\"70\" height=\"80\"><br />\r\n<a href=\"xxxx\"><span style=\"font-size:xx-small;\">行ってきま〜す<br />（ﾗﾋﾟｽ&ｽﾋﾟｶ）<br />【5pt】<br /></span></a><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#ff6699\">今週の新着</span><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:small;\">\r\n<a href=\"xxxx\"><span style=\"color:#ff6699\">4/11(土)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/10(金)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/9(木)</span></a><br />\r\n<a href=\"xxxx\"><span style=\"color:#ff6699\">4/8(水)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/7(火)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/6(月)</span></a><br />\r\n</div>\r\n\r\n\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--カテゴリ-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\nカテゴリ</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">着うた</span></a>：<span style=\"font-size:xx-small; color:#808080\">流行のｻｳﾝﾄﾞでｹｰﾀｲをｶｽﾀﾏｲｽﾞ</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">ｱﾊﾞﾀｰ</span></a>：<span style=\"font-size:xx-small; color:#ff69b4\">ﾓﾃ色おしゃれ服に着替えよう</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">ｹﾞｰﾑ</span></a>：<span style=\"font-size:xx-small; color:#6aacee\">おもしろｹﾞｰﾑのｵﾝﾊﾟﾚｰﾄﾞ</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">ｼｮｯﾋﾟﾝｸﾞ</span></a>：<span style=\"font-size:xx-small; color:#e6b422\">必見！お買い得情報</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">占い</span></a>：<span style=\"font-size:xx-small; color:#9d5b8b\">ﾀﾛｯﾄであなたの内側を鑑定</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\"></span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 10:59:10','2008-08-09 00:11:27','2008-08-09 00:11:27'),(5,0,'decomail_puchi','ぷちふる紹介','	<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメぷちふる紹介</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#808000\">ぷち&#59203;ふるDECOに入会すると&#59125;<br />もっと&#59178;ｶﾜｲｲﾃﾞｺﾒがいっぱい&#59163;</span><br />\r\n<span style=\"color:#ff6699; font-size:small\">更に??ナパポﾌﾟﾚｾﾞﾝﾄ&#59013;</span>\r\n</div>\r\n<div style=\"background-color:#ff6699; text-align:center; font-size:xx-small;\">\r\nぷち&#59203;ふるDECOって?<br />\r\n</div>\r\n<div style=\"background-color:#ffffff; font-size:xx-small;\">\r\n<span style=\"color:#ff6699; font-size:x-small\">ぷち&#59203;ふるDECO</span>だけにしかない人気ｷｬﾗｸﾀｰのﾃﾞｺﾒがとり放題&#59175;ぷち&#59203;ふるDECOだけの<span style=\"color:#ff6699; font-size:x-small\">独占配信</span>だから<br />\r\n</div>\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\n<span style=\"color:#fa8072; font-size:x-small\">ﾃﾞｺﾒで差を付けたいﾄｷ&#59159;</span><br />\r\n<span style=\"color:#7cfc00; font-size:x-small\">いつものﾃﾞｺﾒに飽きたﾄｷ&#59143;</span><br />\r\n<span style=\"color:#00bfff; font-size:x-small\">かわいいﾃﾞｺﾒだけを送りたいﾄｷ&#59021;</span><br />\r\n<span style=\"color:#dda0dd; font-size:x-small\">ﾃﾞｺﾒで気持ちを伝えたいﾄｷ&#59169;</span><br />\r\nにｵｽｽﾒです<br />\r\n</div>\r\n<br />\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\n<span style=\"color:#ffff00 ; font-size:xx-small\">&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;</span><br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">ぷち&#59203;ふるDECOに登録</a><br />\r\n<span style=\"color:#ffff00 ; font-size:xx-small\">&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;</span><br />\r\n</div>\r\n<br />\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\nこんなにかわいいﾃﾞｺﾒがとり放題<br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">人気No.1もちまる</a><br />\r\n<img src=\"##file18##\" /><br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">まだまだｷｬﾗｸﾀｰいっぱい</a><br />\r\n<img src=\"##file19##\" /><br />\r\n</div>\r\n\r\n\r\n\r\n\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 10:59:41','2008-08-09 00:11:38','2008-08-09 00:11:38'),(6,0,'decomail_chara_alice','キャラ/アリス','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメありす</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#f14e69; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file20##\" /><br />\r\n<a href=\"xxxx\">万華鏡の国のありす</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#f14e69; font-size:xx-small;\">\r\n有莉子(ありす)と宮璃子(くりす)の目の前に現れた不思議な黒猫｡｢それが知りたかったらついて来なさい｣黒猫にそう誘われ二人が訪れた場所はまるで万華鏡｡｡｡鮮やかな色彩と雅が融合する不思議な亜空間だった｡甘美な夢の空間に魅入られる儚げな12歳の少女たちは､いつしか出口を彷徨う事\r\n</div>\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--カテゴリ-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\nカテゴリ</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">着うた</span></a>：<span style=\"font-size:xx-small; color:#808080\">流行のｻｳﾝﾄﾞでｹｰﾀｲをｶｽﾀﾏｲｽﾞ</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">ｱﾊﾞﾀｰ</span></a>：<span style=\"font-size:xx-small; color:#ff69b4\">ﾓﾃ色おしゃれ服に着替えよう</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">ｹﾞｰﾑ</span></a>：<span style=\"font-size:xx-small; color:#6aacee\">おもしろｹﾞｰﾑのｵﾝﾊﾟﾚｰﾄﾞ</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">ｼｮｯﾋﾟﾝｸﾞ</span></a>：<span style=\"font-size:xx-small; color:#e6b422\">必見！お買い得情報</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">占い</span></a>：<span style=\"font-size:xx-small; color:#9d5b8b\">ﾀﾛｯﾄであなたの内側を鑑定</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:07:21','2008-08-09 00:11:36','2008-08-09 00:11:36'),(7,0,'decomail_chara_busane','キャラ/ぶさね','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメぶさね日和</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ffff9a; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file21##\" /><br />\r\n<a href=\"xxxx\">ぶさね日和</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#ffff9a; font-size:xx-small;\">\r\nまだ昭和の香りが漂う下町の北里家の主:三毛猫あかね｡その風貌からぶさねと呼ばれ､北里家のみならずご近所でもちょっとした有名人(猫?)｡でっぶりとしたﾎﾞﾃﾞｨと険しい目｡しかし意外と姉御肌｡拾い猫のこまろやご近所のｾﾚﾌﾞ猫ｴﾘｻﾞﾍﾞｰﾀたちと日なたでのんびりまったり…その愛すべき猫ﾜｰﾙﾄﾞをお届けします｡\r\n</div>\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--カテゴリ-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\nカテゴリ</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">着うた</span></a>：<span style=\"font-size:xx-small; color:#808080\">流行のｻｳﾝﾄﾞでｹｰﾀｲをｶｽﾀﾏｲｽﾞ</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">ｱﾊﾞﾀｰ</span></a>：<span style=\"font-size:xx-small; color:#ff69b4\">ﾓﾃ色おしゃれ服に着替えよう</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">ｹﾞｰﾑ</span></a>：<span style=\"font-size:xx-small; color:#6aacee\">おもしろｹﾞｰﾑのｵﾝﾊﾟﾚｰﾄﾞ</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">ｼｮｯﾋﾟﾝｸﾞ</span></a>：<span style=\"font-size:xx-small; color:#e6b422\">必見！お買い得情報</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">占い</span></a>：<span style=\"font-size:xx-small; color:#9d5b8b\">ﾀﾛｯﾄであなたの内側を鑑定</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:07:55','2008-08-09 00:11:33','2008-08-09 00:11:33'),(8,0,'decomail_chara','キャラ','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメキャラ一覧</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#e0ffff; text-align:center; font-size:xx-small;\">\r\nキャラクター一覧\r\n\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<a href=\"mochi_index.html\"><img src=\"##file32##\" /></a><a href=\"busane_index.html\"><img src=\"##file23##\" /></a><a href=\"alice_index.html\"><img src=\"##file22##\" /></a><br />\r\n<a href=\"../puchi_info.html\">\r\n<img src=\"##file24##\" /><img src=\"##file25##\" /><img src=\"##file26##\" /><br />\r\n<img src=\"##file27##\" /><img src=\"##file39##\" /><img src=\"##file29##\" /><br />\r\n<img src=\"##file30##\" /><img src=\"##file33##\" /><img src=\"##file34##\" /><br />\r\n<img src=\"##file35##\" /><img src=\"##file37##\" /><img src=\"##file38##\" /></a><br />\r\n<br />\r\n</div>\r\n\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"../puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--カテゴリ-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\nカテゴリ</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">着うた</span></a>：<span style=\"font-size:xx-small; color:#808080\">流行のｻｳﾝﾄﾞでｹｰﾀｲをｶｽﾀﾏｲｽﾞ</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">ｱﾊﾞﾀｰ</span></a>：<span style=\"font-size:xx-small; color:#ff69b4\">ﾓﾃ色おしゃれ服に着替えよう</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">ｹﾞｰﾑ</span></a>：<span style=\"font-size:xx-small; color:#6aacee\">おもしろｹﾞｰﾑのｵﾝﾊﾟﾚｰﾄﾞ</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">ｼｮｯﾋﾟﾝｸﾞ</span></a>：<span style=\"font-size:xx-small; color:#e6b422\">必見！お買い得情報</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">占い</span></a>：<span style=\"font-size:xx-small; color:#9d5b8b\">ﾀﾛｯﾄであなたの内側を鑑定</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:08:19','2008-08-09 00:11:31','2008-08-09 00:11:31'),(9,0,'decomail_chara_mochi','キャラ/もち','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンデコメもちまる</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ecd9b0; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file31##\" /><br />\r\n<a href=\"xxxx\">もちまる</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#ecd9b0; font-size:xx-small;\">\r\nしちりんのおうちに住んでいる不思議な生き物『もちまる』!『もち』から生まれた『もちまる』たちは､湯飲み茶碗や鍋の中､そしてみかん箱のみかんたちにまぎれ､こっそり生息中…｡お家のいたるところで毎日ほんわか過ごしてます｡もしあなたのお家のお菓子の箱の中に『もちまる』が潜んでいたら､こっそり観察してみてﾈ｡\r\n</div>\r\n<!--ぷちふるDECOへ誘導リンク-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--カテゴリ-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\nカテゴリ</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">着うた</span></a>：<span style=\"font-size:xx-small; color:#808080\">流行のｻｳﾝﾄﾞでｹｰﾀｲをｶｽﾀﾏｲｽﾞ</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">ｱﾊﾞﾀｰ</span></a>：<span style=\"font-size:xx-small; color:#ff69b4\">ﾓﾃ色おしゃれ服に着替えよう</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">ｹﾞｰﾑ</span></a>：<span style=\"font-size:xx-small; color:#6aacee\">おもしろｹﾞｰﾑのｵﾝﾊﾟﾚｰﾄﾞ</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">ｼｮｯﾋﾟﾝｸﾞ</span></a>：<span style=\"font-size:xx-small; color:#e6b422\">必見！お買い得情報</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">占い</span></a>：<span style=\"font-size:xx-small; color:#9d5b8b\">ﾀﾛｯﾄであなたの内側を鑑定</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">対応機種一覧</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾅﾊﾟﾎﾟの集め方</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">ﾃﾞｺﾒの虎</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">ﾏｲﾍﾟｰｼﾞ</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">ﾃﾞｺﾒTOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">ﾅﾊﾟﾀｳﾝ総合TOPﾍﾟｰｼﾞへ</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)ｽﾍﾟｰｽｱｳﾄ\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:08:47','2008-08-09 00:11:25','2008-08-09 00:11:25'),(10,0,'system_game_device','システム/ゲーム/対応機種','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ゲーム対応機種</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここにゲーム対応機種を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-04-08 15:31:37','2008-08-09 00:41:43','0000-00-00 00:00:00'),(11,0,'media_fuji','入会経路別ページ/fuji','<!--ヘッダー-->\r\n<html>\r\n<head>\r\n<title>携帯SNSパッケージ</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\"></meta>\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\"></meta>\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\"></meta>\r\n<meta http-equiv=\"Expires\" content=\"0\"></meta>\r\n<meta name=\"description\" content=\"携帯SNSパッケージ\">\r\n<meta name=\"keywords\" content=\"携帯 SNS パッケ-ジ\">\r\n<meta name=\"robots\" content=\"noindex,nofollow\">\r\n<meta name=\"author\" content=\"携帯 SNS パッケ-ジ\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\"/>\r\n</head>\r\n<body style=\"color:#595959; background-color:#FFF6D9\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:#004A7F}\r\na:visited{color:#004A7F}\r\n]]>\r\n\r\n</style>\r\n\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n<a href=\"top\"></a>\r\n<div align=\"center\" style=\"color:#F8F8FF;font-size:small;background:#FF9933;text-align:center;\">\r\n	<span style=\"display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite\">\r\n		<span style=\"font-size:small;color:#FFFF33;text-decoration: blink;\">★☆★</span>\r\n		人気沸騰中\r\n		<span style=\"font-size:small;color:#FFFF33;text-decoration: blink;\">★☆★</span>\r\n	</span>\r\n\r\n</div>\r\n<!--エラーメッセージ表示開始-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;background:#ffffff;\">\r\n	</div>\r\n<!--エラーメッセージ表示終了-->\r\n<!--ロゴ画像開始-->\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">\r\n	<img src=\"img/logo.gif\" align=\"center\" style=\"text-align:center\"><br />\r\n</div>\r\n<!--ロゴ画像終了-->\r\n\r\n<!--タイトル-->\r\n<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\"><img src=\"http://snsvemoji.varth.jp/docomo/1.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">みんなあつまるSNS<img src=\"http://snsvemoji.varth.jp/docomo/1.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span></div>\r\n<!--ログイン開始-->\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:medium;\">\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<a href=\"mailto:##media_mailaddress[fuji]##?subject=会員登録&body=このままﾒｰﾙを送信してください\">\r\n<span style=\"color:#6AD500;\">無料会員登録</span></a>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<a href=\"mailto:##media_mailaddress[fuji]##?subject=会員登録&body=このままﾒｰﾙを送信してください\">\r\n<span style=\"color:#6AD500;\">無料会員登録</span></a>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n	<span style=\"font-size:small;text-decoration: blink;\"><img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span>\r\n	<a href=\"mailto:##media_mailaddress[fuji]##?subject=会員登録&body=このままﾒｰﾙを送信してください\"><span style=\"color:#6AD500;\">無料会員登録</span></a>\r\n	<span style=\"font-size:small;text-decoration: blink;\"><img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span>\r\n</div>\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">\r\n	[<a href=\"?action_user_login_do=true&easy_login=true&guid=ON\">会員ログイン<img src=\"http://snsvemoji.varth.jp/docomo/150.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></a>]<br />\r\n	ﾛｸﾞｲﾝできない方は<a href=\"?action_user_login=true\">ｺﾁﾗ</a>\r\n\r\n</div>\r\n<!--ログイン終了-->\r\n\r\n<!--コンテンツ開始-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n		<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">ｱﾊﾞﾀｰ</span></div>\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/a1.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">ｱﾊﾞﾀｰ</a><br />\r\n\r\n			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />\r\n			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/a2.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n\r\n			<a href=\"?action_user_util=true&page=about-regist\">ｱﾊﾞﾀｰ</a><br />\r\n			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />\r\n			ｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰｱﾊﾞﾀｰ<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">ﾃﾞｺﾒ</span></div>\r\n\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/d1.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">ﾃﾞｺﾒ</a><br />\r\n			ﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒ<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/d2.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">ﾃﾞｺﾒ</a><br />\r\n			ﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒﾃﾞｺﾒ<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n\r\n	\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">ｹﾞｰﾑ</span></div>\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/g1.jpg\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">ｹﾞｰﾑ</a><br />\r\n			ｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑ<br />\r\n		</span>\r\n\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/g2.jpg\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">ｹﾞｰﾑ</a><br />\r\n			ｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑｹﾞｰﾑ<br />\r\n		</span>\r\n\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n</div>\r\n<!--コンテンツ終了-->\r\n\r\n<!--タイトル-->\r\n<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">ｻﾎﾟｰﾄﾒﾆｭｰ</span></div>\r\n<!--サポートメニュー開始-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=about-sns\">SNSパッケージについて</a><br />\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=about-regist\">新規登録について</a><br />\r\n\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=caution\">注意事項</a><br />\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=support\">問い合わせ</a><br />\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=about-device\">対応機種</a><br />\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=privacy\">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a><br />\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=terms\">利用規約</a><br />\r\n\r\n	<span style=\"color:#6AD500\">◆</span><a href=\"?action_user_util=true&page=company\">会社概要</a>\r\n</div>\r\n<!--サポートメニュー終了-->\r\n\r\n<!--フッター-->\r\n<br />\r\n<hr color=\"#FF9933\" style=\"border:solid 1px #FF9933;\">\r\n	<!--未ログイン時フッター開始-->\r\n	<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n		<img src=\"http://snsvemoji.varth.jp/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"?action_user_index=true&ma_hash=\" accesskey=\"0\">ﾄｯﾌﾟ</a>\r\n\r\n	</div>\r\n	<!--未ログイン時フッター終了-->\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">(c)SNSパッケージ</span></div>\r\n</div>\r\n<!--コンテナ終了-->\r\n</body>\r\n</html>',1,'2008-04-13 16:05:53','2008-06-02 15:30:31','0000-00-00 00:00:00'),(12,0,'sound_device','サウンド/対応機種','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>ナパタウンサウンド</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#666666\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<table width=\"100%\">\r\n<tr bgcolor=\"blue\" align=\"center\"><td><font color=\"#ffffff\">対応機種</font></td></tr>\r\n</table>\r\n\r\n<hr color=\"#ffffff\">\r\n\r\nここに対応機種を記載してください。\r\n\r\n\r\n<hr color=\"blue\">\r\n\r\n<hr color=\"blue\">\r\n<div align=\"center\">(c)SPACEOUT</div>\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-16 01:56:48','2008-06-02 15:29:51','2008-06-02 14:57:34'),(13,0,'system_regist','システム/入会案内','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ようこそ</span>\r\n</div>\r\n<div style=\"text-align:right;font-size:small;\">\r\n[x:0109]<a href=\"?action_user_login_do=true&easy_login=true&guid=ON\">会員の方はｺﾁﾗ</a>\r\n</div>\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n[x:0107]<a href=\"mailto:##regist_mailaddress##?subject=会員登録&body=このままﾒｰﾙを送信してください\">無料会員登録</a>[x:0107]\r\n</div>\r\n<br />\r\n<div style=\"text-aling:left;font-size:small;\">\r\n##site_name##では気の合うお友達や仲間を見つける事ができます。<br />\r\n日記やﾒｰﾙ、ｺﾐｭﾆﾃｨを使ってお友達の輪を広げてくださいね。<br />\r\nその他、ｹﾞｰﾑ、着うた、診断･占い、ﾃﾞｺﾒ、ｱﾊﾞﾀｰ等！楽しめる機能がｲｯﾊﾟｲです。<br />\r\n全て無料で遊べるのでとってもお得です！<br />\r\n</div>\r\n<br />\r\n<div style=\"text-align:center;font-size:small;\">\r\n[x:0107]<a href=\"mailto:##regist_mailaddress##?subject=会員登録&body=このままﾒｰﾙを送信してください\">無料会員登録</a>[x:0107]<br />\r\n<br />\r\n[x:0068]<a href=\"fp.php?code=system_terms\">利用規約</a><br />\r\n[x:0204]<a href=\"fp.php?code=system_policy\">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a>\r\n</div>\r\n<br />\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;\">迷惑ﾒｰﾙ対策をされている方</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n迷惑ﾒｰﾙ対策をされている方は〔##mail_domain##〕を受信できるように下記をｺﾋﾟｰして設定してください。\r\n<div style=\"text-align:center;font-size:small;\">\r\n<form action=\"index.php\">\r\n<input type=\"text\" id=\"address\" size=\"20\" value=\"##mail_domain##\" />\r\n</form>\r\n</div>\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n\r\n\r\n\r\n\r\n',1,'0000-00-00 00:00:00','2008-08-17 13:27:16','0000-00-00 00:00:00'),(14,0,'system_ec_return','システム/返品について','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">返品について</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n・初期不良を除き、商品の特性上、返品はお受けすることができません。予めご了承ください。<br />\r\n<br />\r\n■[商品のお届け時期]<br />\r\n弊社では原則、入金確認後10日前後にて発送いたします。それ以上となる場合は予めご連絡いたします。<br />\r\n先行販売の場合、画面に明記されている発送日以降の発送となりますので、予めご了承ください。<br />\r\n<br />\r\n■[注文ｷｬﾝｾﾙについて]<br />\r\n金額確定ﾒｰﾙを送付後１週間過ぎても入金が確定されない場合は、自動的にｷｬﾝｾﾙとさせていただきますので、予めご了承ください。<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 18:24:11','2008-08-09 00:43:06','0000-00-00 00:00:00'),(15,0,'system_ec_guide','システム/ECご利用ガイド','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ご利用ｶﾞｲﾄﾞ</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n■<a href=\"index.php?action_user_ec_util=true&page=first\">初めての方</a><br />\r\n<br />\r\n■<a href=\"index.php?action_user_ec_util=true&page=register\">会員登録について</a><br />\r\n\r\n<br />\r\n■<a href=\"index.php?action_user_ec_util=true&page=first#try\">購入について</a><br />\r\n<br />\r\n■<a href=\"fp.php?code=system_terms\">ご利用規約</a><br />\r\n<br />\r\n■<a href=\"fp.php?code=system_policy\">ﾌﾟﾗｲﾊﾞｼｰ保護方針</a><br />\r\n<br />\r\n■<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n<br />\r\n\r\n■<a href=\"fp.php?code=system_ec_opinion\">ご意見はｺﾁﾗ</a><br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n■お買物の手順<br />\r\n<span style=\"color:#ff0000\">商品を探そう</span><br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n▼特集で探す｡<br />\r\n｢季節の特集｣や｢ﾗﾝｷﾝｸﾞ｣などの特集を見て商品を探します｡<br />\r\n<br />\r\n▼ｶﾃｺﾞﾘで探す｡<br />\r\n欲しい商品がありそうなｶﾃｺﾞﾘを見つけて商品を探します｡<br />\r\n\r\n同じような商品が多数表示されますので､比較できて便利です｡<br />\r\n<br />\r\n▼ｷｰﾜｰﾄﾞで探す｡<br />\r\n欲しい商品の名前や型番などがわかっている場合､そのｷｰﾜｰﾄﾞを入力して探す方法です｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">商品の内容を見よう</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n欲しい商品を見つけたら商品ﾍﾟｰｼﾞで内容を確認しましょう｡<br />\r\n商品ﾍﾟｰｼﾞでは､商品の画像､商品の説明を見ることができます｡<br />\r\n支払方法や送料も忘れずに確認しましょう｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">購入しよう</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n欲しい商品を購入するには､まず商品ﾍﾟｰｼﾞの｢かごへ入れる｣を押して金額を確認します｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">購入ｷｬﾝｾﾙについて</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\nご注文後のｷｬﾝｾﾙにつきましてはお受けできません｡<br />\r\n<br />\r\n\r\n※お客様都合による一方的なｷｬﾝｾﾙは固くお断りしております｡<br />\r\n万が一無理なｷｬﾝｾﾙをなさいますと､ｷｬﾝｾﾙ料債権問題やお客様の社会的な信用に関わる問題が生じますので､くれぐれもご注意くださいませ｡<br />\r\n<br />\r\n\r\n※下記の場合､ご連絡無しにｷｬﾝｾﾙさせて頂くことがございます｡<br />\r\n1)過去の取引においてｷｬﾝｾﾙされた経歴がある場合｡<br />\r\n2)ご登録情報に著しい誤りがある場合｡<br />\r\n3)ご連絡が取れなくなってしまった場合｡<br />\r\n4)常識的に逸脱したお申し込みがあった場合｡<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 18:39:27','2008-08-09 00:42:41','0000-00-00 00:00:00'),(16,0,'system_ec_contact','ECお問い合わせ','<html>\r\n<head>\r\n<title>ﾓﾊﾞｲﾙﾊﾞｰｽEC</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\" />\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\" />\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\r\n<meta http-equiv=\"Expires\" content=\"Thu, 01 Dec 1994 16:00:00 GMT\" />\r\n<meta name=\"description\" content=\"携帯サイト構築プラットフォーム\" />\r\n<meta name=\"keywords\" content=\"携帯サイト構築プラットフォーム\" />\r\n<meta name=\"robots\" content=\"noindex,nofollow\" />\r\n<meta name=\"author\" content=\"携帯サイト構築プラットフォーム\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"#FFFFFF\" text=\"#66333\" link=\"#ff00FF\" vlink=\"#CC66FF\" alink=\"#0099CC\">\r\n\r\n<div id=\"container\">\r\n<a name=\"top\"></a>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">お問い合わせ</span></div>\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n\r\n■<a href=\"?action_user_ec_util=true&page=first\">初めての方</a><br>\r\n<br>\r\n■<a href=\"?action_user_ec_util=true&page=register\">会員登録Q&A</a><br>\r\n\r\n<br>\r\n■<a href=\"fp.php?code=system_ec_order\">購入についてQ&A</a><br>\r\n<br>\r\n※お問い合わせの前に｢Q&A｣を確認しましょう｡\r\n<br>\r\n<a href=\"mailto:mblv@ml.technovarth.jp\">お問い合わせする</a>\r\n\r\n</div>\r\n\r\n<hr color=\"#f57af4\" style=\"border:solid 1px #f57af4;\">\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<img src=\"http://mblv.varth.jp/img_emoji/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"index.php?action_user_index=true\" accesskey=\"0\">ﾄｯﾌﾟ</a>\r\n</div>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">(c)テクノバ</span></div>\r\n\r\n</div>\r\n\r\n</body>\r\n</html>',0,'2008-08-07 19:18:45','2008-08-09 00:16:09','2008-08-09 00:16:09'),(17,0,'system_ec_opinion','システム/ECご意見・ご要望','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ご意見・ご要望</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\nみなさまの意見を送って下さいね｡どんなに小さなことでもOK!<br />\r\nなお､頂いたご意見に対しての個別の回答はしておりませんので､予めご了承下さい｡<br />\r\n<br />\r\n◆現在募集中のﾃｰﾏ<br />\r\nこんな商品が欲しい!<br />\r\n･買いたい商品があったら教えて下さい｡<br />\r\n<br />\r\n<a href=\"fp.php?code=system_support\">ご意見･ご要望を送る</a>\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 19:23:20','2008-08-09 00:43:17','0000-00-00 00:00:00'),(18,0,'system_ec_dealings','システム/特定商取引に基づく表示','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">特定商取引法に基づく表示</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n■ｼｮｯﾌﾟ名<br />\r\n##site_name##<br />\r\n■運営会社<br />\r\n##site_company_name##<br />\r\n■責任者<br />\r\n山田太郎<br />\r\n■所在地<br />\r\n東京都●●区●●1-2-3 10F<br />\r\n■電話番号<br />\r\n##site_phone##<br />\r\n<span style=\"color:#666666\">(10:00〜18:00 土日祝日を除く)</span><br />\r\n■お問い合わせ先<br />\r\n[x:0161]<a href=\"fp.php?code=support\">お問い合わせ</a><br />\r\n■商品代金以外の必要料金<br />\r\n消費税､代引手数料､送料がかかります｡<br />\r\n■商品の販売価格<br />\r\n個別商品ﾍﾟｰｼﾞに記載<br />\r\n■商品引渡時期<br />\r\n商品ご注文から10日前後でお届けいたします｡ <br />\r\nまた､注文が集中した場合お届けが遅れる事があります｡<br />\r\n■支払い方法<br />\r\n･ｸﾚｼﾞｯﾄｶｰﾄﾞ決済<br />\r\n･ｺﾝﾋﾞﾆ決済<br />\r\n･代金引換決済<br />\r\n･銀行振込<br />\r\n※但し､法人様･業者様からのご注文につきましては､ｾﾌﾞﾝｲﾚﾌﾞﾝでのｺﾝﾋﾞﾆ決済ができかねますので､あらかじめご了承下さいませ｡ <br />\r\n※また､電話､FAX､ﾒｰﾙからのご注文に関しましても､ｾﾌﾞﾝｲﾚﾌﾞﾝでのｺﾝﾋﾞﾆ決済がご利用になれません｡ご容赦下さいますようお願い申し上げます｡<br />\r\n■不良品<br />\r\n良品と交換させていただきます｡但しお客様のご都合によるものはご遠慮下さい｡<br />\r\n■運送時の破損 不良品･梱包ﾐｽ<br />\r\n良品と交換をさせていただきます｡<br />\r\n■返品<br />\r\n購入間違え､個数変更等お客様都合によるもの､ご使用されてからの破損等の 返品は不可とさせていただきます｡ <br />\r\n■ｷｬﾝｾﾙ<br />\r\n基本的に購入申込み後のｷｬﾝｾﾙは受付けておりません｡<br />\r\n予めご了承の上､お買い求めください｡ <br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 19:46:29','2008-08-09 00:44:09','0000-00-00 00:00:00'),(19,0,'system_ec_rule','システム/EC利用規約','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">EC利用規約</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n「##site_name##」EC利用規約<br />\r\n<br />\r\n##site_company_name##(以下｢当社｣といいます)は､当社が運営するｼｮｯﾋﾟﾝｸﾞｻｲﾄ｢##site_name##｣(以下｢本ｻｰﾋﾞｽ｣といいます)の利用について､以下のとおり規約(以下｢本規約｣といいます)を定めます｡<br />\r\n<br />\r\n第1条 本規約の適用範囲及び変更について<br />\r\n\r\n1 本規約は本ｻｰﾋﾞｽの提供及びその利用に関し､当社及び利用者(本ｻｰﾋﾞｽを閲覧､購入､お問合せなどの利用を行った方をいいます)に適用されるものとします｡<br />\r\n2 当社は､利用者の事前の承諾を得ることなく､本規約を変更出来るものとします｡利用者は本ｻｰﾋﾞｽの利用により､変更に同意したものとみなします｡変更した条項は､特に定めない限り､遡及して適用されるものとします｡<br />\r\n<br />\r\n第2条 本ｻｰﾋﾞｽの利用について<br />\r\n1 利用者は､本規約及び当社が別途定めるご利用方法などに従い､本ｻｰﾋﾞｽを利用するものとします｡<br />\r\n2 当社は､いつでも本ｻｰﾋﾞｽの内容を事前の告知なく､変更しまたは廃止することができるものとします｡当社は本ｻｰﾋﾞｽの内容の変更､廃止による利用者の損害について一切の責任を負いません｡<br /><br />\r\n第3条 会員資格<br />\r\n1 会員とは､本規約を承認の上､ｲﾝﾀｰﾈｯﾄを使って本ｻｰﾋﾞｽ利用のために入会を申し込み､当社が会員として入会を認め､許可された個人､法人をいいます｡<br />\r\n2 会員は､本規約に基づき､本ｻｰﾋﾞｽにおいての商品購入をすることができます｡<br />\r\n\r\n3 会員は､会員資格を第三者に利用させたり､貸与､譲渡､売買､質入等をすることはできないものとします｡<br />\r\n<br />\r\n第4条 会員申込<br />\r\n1 入会を希望する者(以下｢入会希望者｣という)は､当社が定める手続に従って､入会を申し込むものとします｡入会希望者が未成年者である場合､親権者の同意を得たうえで入会を申し込むものとします｡<br />\r\n2 会員登録手続は､前項の申込に対する当社の承諾をもって完了するものとします｡ただし､当社は､入会希望者が以下に定める事由のいずれかに該当することが判明した場合､入会希望者の入会を認めないことがあり､入会を認めた後でも､入会を取り消すことがあります｡<br />\r\n(1) 入会希望者が未成年者で親権者の同意を得ていない場合<br />\r\n(2) 入会希望者が日本国外に居住する場合<br />\r\n(3) 入会希望者が過去に本規約違反等により会員資格を抹消された場合<br />\r\n(4) 入会希望者が申込の際に当社に届け出た事項に虚偽､誤記又は記入もれがあった場合<br />\r\n\r\n(5) 入会希望者が当社に対する債務の支払を怠ったことがある場合<br />\r\n(6) その他当社が不適当と判断した場合<br />\r\n<br />\r\n第5条 ﾊﾟｽﾜｰﾄﾞの管理<br />\r\n1 会員は､会員登録後に当社が会員のﾊﾟｽﾜｰﾄﾞの管理責任を負うものとします｡<br />\r\n2 会員は､ﾊﾟｽﾜｰﾄﾞを第三者に利用させたり､貸与､譲渡､売買､質入等をすることはできないものとします｡<br />\r\n3 ﾊﾟｽﾜｰﾄﾞの管理不十分､使用上の過誤､第三者の使用等による損害について当社は一切責任を負いません｡ﾊﾟｽﾜｰﾄﾞが不正に利用されたことにより当社に損害が生じた場合､会員は､当社に対し､その損害を賠償するものとします｡<br />\r\n4 会員は､ﾊﾟｽﾜｰﾄﾞを第三者に知られた場合､またはﾊﾟｽﾜｰﾄﾞが第三者に使用されている疑いのある場合には､直ちに当社にその旨連絡するとともに､当社の指示がある場合にはこれに従うにものとします｡<br />\r\n5 会員は､定期的にﾊﾟｽﾜｰﾄﾞを変更する義務があるものとし､その義務を怠ったことにより損害が生じても当社は一切責任を負いません｡<br />\r\n\r\n<br />\r\n第6条 会員資格の停止･抹消<br />\r\n当社は､以下の事由がある場合､会員に何ら事前の通知または催告をすることなく､会員資格を一時停止し､または抹消することができるものとします｡この場合､当社のとった措置により会員に損害が生じたとしても､当社は一切の責任を負いません｡<br />\r\n(1) ｱｶｳﾝﾄおよびﾊﾟｽﾜｰﾄﾞを不正に使用しまたは使用させた場合｡<br />\r\n(2) 会員が代金を定められた時期までに支払わなかった場合｡<br />\r\n(3) 会員に対し､差押､仮差押､仮処分､強制執行､破産､民事再生､会社整理､特別清算､会社更生の申し立てがなされた場合､及び会員がまたは､申し立てをした場合｡<br />\r\n(4) その他､会員が本規約のいずれかの条項に違反した場合｡<br />\r\n(5) その他､会員として不適格と当社が判断した場合｡<br />\r\n<br />\r\n第7条 退会<br />\r\n\r\n1 会員は､当社所定の手続きにより退会することができます｡<br />\r\n2 会員が死亡または解散した場合､当社は､当該会員がその時点で退会したものとみなし､ｱｶｳﾝﾄおよびﾊﾟｽﾜｰﾄﾞを利用できなくするものとします｡<br />\r\n<br />\r\n第8条 商品の購入<br />\r\n1 会員は､当社の定める方法により商品等の購入を申し込むものとします｡<br />\r\n2 前項の申し込みに対して､当社より承諾する旨のeﾒｰﾙを会員宛に発信した時点で会員との間に当該商品などに関する売買契約が成立するものとします｡<br />\r\n<br />\r\n第9条 商品の返品､売買契約の解除<br />\r\n1 商品の返品は､配送中の破損､商品の瑕疵､品違い､その他当社が認める場合を除きできないものとします｡また､商品の返品､瑕疵ある商品の交換､交換できない場合の契約の解除は､会員が商品を受領した後､1週間内に､当社に対し返品等の申請をした場合に限り､可能なものとします｡<br />\r\n2 会員が下記のいずれかにあてはまる場合､当社は事前の連絡無しに会員との間の売買契約を解除することができるものとします｡<br />\r\n\r\n(1)過去の取引において当社から売買契約を解除された経歴がある場合<br />\r\n(2)ご登録情報に著しい誤りがある場合<br />\r\n(3)ご連絡が取れなくなってしまった場合<br />\r\n(4)常識に逸脱したお申し込みがあった場合<br />\r\n(5)その他､当社が不適当と判断した場合<br />\r\n<br />\r\n第10条 ｶｽﾀﾑｵｰﾀﾞｰ<br />\r\n1 ｶｽﾀﾑｵｰﾀﾞｰの商品は､会員の都合やｻｲｽﾞ違いによるご注文のｷｬﾝｾﾙ､交換は一切出来ません｡<br />\r\n2 商品の仕様変更については､当社の判断を優先することがあります｡また､変更作業の進行によって事前にお伝えした期日からさらに日数が掛かることがあります｡<br />\r\n\r\n3 会員の要望によっては追加料金を請求させていただく場合があります｡<br />\r\n<br />\r\n第11条 ﾎﾟｲﾝﾄの利用<br />\r\n1##site_name##ﾎﾟｲﾝﾄ(以下｢ﾎﾟｲﾝﾄ｣といいます)は､##site_name##内において付与され､##site_name##内でのみ利用可能なﾎﾟｲﾝﾄを指します｡会員は､当社が定める方法により保有するﾎﾟｲﾝﾄを､当社が定める換算率で､決済代金(消費税を除く商品代金とします)の全部または一部の支払いに利用することができます｡但し､消費税､送料および手数料については現金により支払うものとします｡<br />\r\n2会員が決済代金全額の支払いにﾎﾟｲﾝﾄを利用し､その後決済代金が何らかの事情で減額された場合には､ﾎﾟｲﾝﾄまたは現金の返還が行われます｡<br />\r\n3会員が決済代金の支払いにﾎﾟｲﾝﾄを利用した後､何らかの事情により決済代金が増額された場合は､会員は増額分をﾎﾟｲﾝﾄまたは現金により支払うものとします｡<br />\r\n<br />\r\n<br />\r\n第12条 ﾎﾟｲﾝﾄ譲渡などの禁止<br />\r\n1 ﾎﾟｲﾝﾄの利用は､会員本人が行うものとします｡当該会員以外の第三者が利用することはできません｡会員は､保有するﾎﾟｲﾝﾄを他の会員その他第三者に移転､譲渡すること､質入れすること､または他の会員とﾎﾟｲﾝﾄを共有することはできません｡<br />\r\n\r\n2 会員は､いかなる場合でもﾎﾟｲﾝﾄを現金等に交換することはできません｡<br />\r\n3 一人の会員が複数の会員登録をしている場合､会員はそれぞれの会員登録において保有するﾎﾟｲﾝﾄを合算することはできません｡<br />\r\n<br />\r\n第13条 ﾎﾟｲﾝﾄの取り消し､失効<br />\r\n1 本利用規約への違反その他当社が不正･不当と判断する行為があった場合には､当社は､会員へのﾎﾟｲﾝﾄの付与もしくは会員が保有するﾎﾟｲﾝﾄの利用を停止し､または､会員が保有するﾎﾟｲﾝﾄの一部もしくは全部を取り消すことができるものとします｡<br />\r\n2 決済を取り消した場合､当該決済に利用されたﾎﾟｲﾝﾄが返還されるものとし､現金による返還は行われません｡<br />\r\n3 会員が退会などにより会員資格を喪失した場合は､当該会員が保有するﾎﾟｲﾝﾄは直ちに失効するものとします｡<br />\r\n4 会員が当社が定める期間を超えてﾎﾟｲﾝﾄによる取引を行わなかった場合､ﾎﾟｲﾝﾄは自動的に消滅します｡<br />\r\n5 当社は､取消または消滅したﾎﾟｲﾝﾄについて何らの補償も行わず､一切の責任を負いません｡<br />\r\n\r\n<br />\r\n第14条 届出事項の変更等<br />\r\n1 会員は､入会申込の際に当社に届け出した事項に変更のあった場合は､当社あてに遅滞なく連絡するものとします｡<br />\r\n2 当社からの通知は当社に登録された届出事項に基づく連絡先に発信することにより､会員に通常到達すべきときに到達したとみなされるものとします｡<br />\r\n<br />\r\n第15条 著作権その他の権利の尊重<br />\r\n1 利用者は､権利者の許諾を得ないで､本ｻｰﾋﾞｽを通じて提供されるいかなる情報についても､利用者個人の私的複製など著作権法で認められる範囲を超えての使用をすることはできません｡<br />\r\n2 本条の規定に違反して権利者あるいは第三者との間で問題が生じた場合､利用者は自己の責任と費用においてその問題を解決するとともに､当社に何の迷惑または損害を与えないものとします｡<br /><br />\r\n\r\n第16条 ##site_name##の中断､停止<br />\r\n\r\n1 当社は､以下のいずれかの事由に該当する場合､会員に事前に通知することなく本ｻｰﾋﾞｽの一部もしくは全部を一時中断､または停止することがあります｡<br />\r\n(1)本ｻｰﾋﾞｽの提供のための装置､ｼｽﾃﾑの保守点検､更新を行う場合｡<br />\r\n(2) 火災､停電､天災などにより､本ｻｰﾋﾞｽの提供が困難な場合｡<br />\r\n(3) 必要な電気通信事業者の役務が提供されない場合｡<br />\r\n(4) その他､当社が本ｻｰﾋﾞｽの一時中断もしくは停止が必要であると判断した場合｡<br />\r\n2 当社は､##site_name##の提供の一時中断､停止等の発生により､利用者が被ったいかなる損害についても一切の責任を負わないものとします｡<br />\r\n<br />\r\n第17条 協議･準拠法･管轄裁判所<br />\r\n1 当社と利用者との連絡方法は､eﾒｰﾙ及び電話によるものとします｡<br />\r\n\r\n2 本ｻｰﾋﾞｽのご利用に関して､本規約により解決できない問題が生じた場合には､##site_name##ﾏｰｹｯﾄと利用者との間で双方誠意をもって話し合い､これを解決するものとします｡<br />\r\n3 本規約の準拠法は日本法とし､当社と利用者の間で生じた紛争については東京地方裁判所を第一審専属管裁判所とします｡<br />\r\n4 利用者の売買代金不払いその他本規約違反行為によって､損害賠償義務が発生し､その請求回収のために､##site_name##が弁護士を用いた場合には､当社が支払った弁護士費用についても利用者の負担とします｡<br />\r\n<br />\r\n以上<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"?action_user_top=true\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',0,'2008-08-08 11:02:35','2008-08-09 00:18:51','2008-08-09 00:18:51'),(20,0,'system_ec_privacy','システム/ECプライバシー保護方針','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ﾌﾟﾗｲﾊﾞｼｰ保護方針</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\nﾌﾟﾗｲﾊﾞｼｰ保護方針<br />\r\n<br />\r\n##site_company_name##(以下｢当社｣といいます)は､利用者の個人情報は非常に大切なものと考えており､法令等に基づいて利用者の個人情報を適切に管理･保護するとともに､利用者が安心できるｻｰﾋﾞｽを提供することを目的として､以下の方針に基づき個人情報の保護に努めます｡この｢ﾌﾟﾗｲﾊﾞｼｰ保護方針｣(以下｢本方針｣といいます)は､に適用され､利用者がを利用するに際して当社が取得することとなった利用者の個人情報は､本方針に基づいて管理されます｡<br />\r\n<br />\r\n1 法令等の遵守について<br />\r\n\r\n当社は､個人情報の取り扱いに関して､個人情報保護法をはじめとする個人情報に関する法令を遵守します｡<br />\r\n<br />\r\n2 個人情報の定義<br />\r\nを利用していただくために登録いただいた氏名､郵便番号､住所､電話番号､ﾒｰﾙｱﾄﾞﾚｽ､性別､生年月日､ｸﾚｼﾞｯﾄｶｰﾄﾞ情報(番号､ｶｰﾄﾞ種別､ｸﾚｼﾞｯﾄｶｰﾄﾞ有効期限)､購入情報､商品の送付に必要な送付先の情報などの登録情報を｢個人情報｣として取り扱います｡<br />\r\n<br />\r\n3 個人情報の利用目的について<br />\r\nでは､個人情報を利用して､以下のことを行っております｡<br />\r\n<br />\r\n･ 注文商品の発送<br />\r\n･ 利用者への連絡<br />\r\n\r\n･ ﾒｰﾙﾏｶﾞｼﾞﾝ配信<br />\r\n･ お知らせ･ご意見ｱﾝｹｰﾄﾒｰﾙの送信<br />\r\n･ ﾏｰｹﾃｨﾝｸﾞﾃﾞｰﾀの分析<br />\r\n<br />\r\n個人情報は主に､注文商品の発送､利用者への連絡とﾒｰﾙﾏｶﾞｼﾞﾝの配信に使用しています｡また､現在および将来的に提供を検討しているｻｰﾋﾞｽについて利用者の意見を調査するために､ｱﾝｹｰﾄ形式で連絡することもあります｡ﾏｰｹﾃｨﾝｸﾞﾃﾞｰﾀの分析は､どの商品､どのｺﾝﾃﾝﾂの人気が高いかを確認し､これらのﾃﾞｰﾀから､特定の分野に興味を示した利用者に､その興味に合わせたｺﾝﾃﾝﾂや広告を提供するなど､利用者に対してより高いｻｰﾋﾞｽを行うことを目的として利用します｡<br />\r\n<br />\r\n4 個人情報の訂正･削除など<br />\r\n当社は､利用者が個人情報の開示･訂正･削除等を希望する場合､当社までご連絡いただければ､本人であることを確認の上､合理的な範囲ですみやかに対応いたします｡また本人のﾃﾞｰﾀが存在しないときにも､すみやかにその旨を通知します｡なお､これら個人情報の訂正等に当たっては､実費を勘案した合理的な範囲での手数料を申し受ける場合があります｡<br />\r\n<br />\r\n5 個人情報の第三者提供･共同使用について<br />\r\n\r\n当社では､配送の手配､ｸﾚｼﾞｯﾄｶｰﾄﾞ決済などについて他社に代行を依頼しています｡これらの会社は､利用者の個人情報の秘密を保持する為に書面にて機密保持契約を結び､配送の手配､ｸﾚｼﾞｯﾄｶｰﾄﾞ決済など機密保持契約で定められた利用目的の範囲外で利用者の個人情報使用することはありません｡当社は法令に別段の定めがある場合を除き､利用者の個人情報を､事前に利用者本人の同意を得ることなく第三者に提供しません｡<br />\r\n<br />\r\n6 個人情報の管理について<br />\r\n当社は､個人情報の利用を業務上必要な社員だけに制限し､個人情報が含まれる媒体などの保管･管理などに関する規則を作り､個人情報保護のための予防措置を講じます｡ｼｽﾃﾑに保存されている個人情報については､業務上必要な社員だけが利用できるようｱｶｳﾝﾄとﾊﾟｽﾜｰﾄﾞを用意し､ｱｸｾｽ権限管理を実施します｡なお､ｱｶｳﾝﾄとﾊﾟｽﾜｰﾄﾞは漏えい､滅失のないよう厳重に管理します｡個人情報にかかわるﾃﾞｰﾀ伝送時のｾｷｭﾘﾃｨのため､必要なWEBﾍﾟｰｼﾞに業界標準の暗号化通信であるSSLを使用します｡<br />\r\n<br />\r\n7 20歳未満の個人情報について<br />\r\nでは､20歳未満の登録を規制し､登録時に20歳未満であることが判明した場合には､個人情報の収集および使用は行いません｡子供を介して家族の情報を取得するような行為は行っていません｡<br />\r\n<br />\r\n8 ﾛｸﾞﾌｧｲﾙについて<br />\r\n当社は､利用者の動向を調査する為にｱｸｾｽﾛｸﾞ･ﾌｧｲﾙを使用します｡これにより､当社は､統計的なｻｲﾄ利用情報を得ることができますが､個人情報の収集･解析のために利用することはありません｡<br />\r\n\r\n<br />\r\n9 本方針の改定<br />\r\n会社や利用者のﾌｨｰﾄﾞﾊﾞｯｸを反映するために､この｢ﾌﾟﾗｲﾊﾞｼｰ保護方針｣を随時更新していく予定です｡当社が利用者の情報をどのように保護しているかを確認していただくためにも､本方針を定期的に確認することをお勧めします｡<br />\r\n<br />\r\n10 お問い合わせ<br />\r\n個人情報に関するお問い合わせ､および当社が本方針を遵守していないとお考えの場合は､以下の宛先にご連絡ください｡<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n<br />\r\n以上<br />\r\n<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"?action_user_top=true\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',0,'2008-08-08 11:05:57','2008-08-09 00:17:34','2008-08-09 00:17:34'),(21,0,'system_ec_order','システム/EC購入について','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">購入について</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n■購入について\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.お店に質問したい｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.商品について不明な点､詳しく聞きたいことがあるときには､商品ﾍﾟｰｼﾞの｢店長に質問!｣からお店に質問することができます｡<br />\r\n\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.購入ｷｬﾝｾﾙしたい｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.ご注文後のｷｬﾝｾﾙにつきましてはお受けできません｡<br />\r\n\r\n※お客様都合による一方的なｷｬﾝｾﾙは固くお断りしております｡<br />\r\n万が一無理なｷｬﾝｾﾙをなさいますと､ｷｬﾝｾﾙ料債権問題やお客様の社会的な信用に関わる問題が生じますので､くれぐれもご注意くださいませ｡<br />\r\n<br />\r\n※下記の場合､ご連絡無しにｷｬﾝｾﾙさせて頂くことがございます｡<br />\r\n1)過去の取引においてｷｬﾝｾﾙされた経歴がある場合｡<br />\r\n\r\n2)ご登録情報に著しい誤りがある場合｡<br />\r\n3)ご連絡が取れなくなってしまった場合｡<br />\r\n4)常識的に逸脱したお申し込みがあった場合｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.買おうと思っていた商品の在庫がなく､購入できません｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.期間限定にて商品を販売いたしております｡<br />\r\n詳しくは<a href=\"fp.php?code=system_support\">お問い合わせ</a>下さい｡\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">Q.商品を購入した後の流れを教えて下さい｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.WEB上での購入手続きが完了すると､お客様の情報が直接お店に送信されます｡<br />\r\n購入のお知らせのﾒｰﾙが到着します｡<br />\r\n<br />\r\nお店から連絡がない場合には､お店に連絡しましょう｡<br />\r\n※ご注文が完了していない場合がございます｡<br />\r\n<br />\r\n代金を支払います｡決済に関しては<a href=\"index.php?action_user_ec_util=true&page=first#try\">ｺﾁﾗ</a>をご確認下さい｡<br />\r\n\r\n<br />\r\n商品が送られてきます｡<br />\r\n<br />\r\nお店によっては､梱包手数料等が発生することがあるので､事前に商品ﾍﾟｰｼﾞで確認しましょう｡<br />\r\n代金引換便での取引を選択した人は､商品を受け取るときに､配達員の人に商品代金+送料等を支払います｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.買い物かごとは何ですか｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.買おうと思った商品はまず｢かごへ入れる｣ﾎﾞﾀﾝで買い物かごに入れましょう｡<br />\r\n買い物かごに入れた時点では､まだ購入は確定しません｡<br />\r\n\r\nさらに他の商品を選んで買い物を続けることができます｡<br />\r\n買い物を終えたら､買い物かごの中の商品をまとめて注文手続きをします｡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.商品が届かない｡</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.商品の発送状況は､お店に直接お問い合わせ下さい｡<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:19:06','2008-08-09 00:44:20','0000-00-00 00:00:00'),(22,0,'ECご意見・ご要望','ec_opinion','<html>\r\n<head>\r\n<title>ﾓﾊﾞｲﾙﾊﾞｰｽEC</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\" />\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\" />\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\r\n<meta http-equiv=\"Expires\" content=\"Thu, 01 Dec 1994 16:00:00 GMT\" />\r\n<meta name=\"description\" content=\"携帯サイト構築プラットフォーム\" />\r\n<meta name=\"keywords\" content=\"携帯サイト構築プラットフォーム\" />\r\n<meta name=\"robots\" content=\"noindex,nofollow\" />\r\n<meta name=\"author\" content=\"携帯サイト構築プラットフォーム\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"#FFFFFF\" text=\"#66333\" link=\"#ff00FF\" vlink=\"#CC66FF\" alink=\"#0099CC\">\r\n\r\n<div id=\"container\">\r\n<a name=\"top\"></a>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">ご意見・ご要望</span></div>\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n\r\n<div style=\"background-color:#ffffff; text-align:left; font-size:small; align:center;\">\r\nみなさまの意見を送って下さいね｡どんなに小さなことでもOK!<br />\r\nなお､頂いたご意見に対しての個別の回答はしておりませんので､予めご了承下さい｡<br />\r\n<br />\r\n<font color=\"blue\">◆</font>現在募集中のﾃｰﾏ<br />\r\n\r\nこんな商品が欲しい!<br />\r\n･買いたい商品があったら教えて下さい｡<br />\r\n<br />\r\n</div>\r\n\r\n<div style=\"background-color:#ffffff; text-align:center; align:center;\"><a href=\"mailto:mblv@ml.technovarth.jp?subject=ご意見･ご要望&body=ここにご意見･ご要望をご記入ください｡\">ご意見･ご要望を送る</a></div>\r\n	\r\n</div>\r\n\r\n<hr color=\"#f57af4\" style=\"border:solid 1px #f57af4;\">\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<img src=\"http://mblv.varth.jp/img_emoji/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"index.php?action_user_index=true\" accesskey=\"0\">ﾄｯﾌﾟ</a>\r\n</div>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">(c)テクノバ</span></div>\r\n</div>\r\n\r\n</body>\r\n</html>',0,'2008-08-08 11:25:21','2008-08-08 12:10:10','2008-08-08 12:10:10'),(23,0,'system_ec_paycredit','システム/ECクレジット決済','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ｸﾚｼﾞｯﾄ決済</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n※支払方法の選択<br /><br />\r\n｢ｸﾚｼﾞｯﾄｶｰﾄﾞ決済｣を選択→使用するｸﾚｼﾞｯﾄｶｰﾄﾞを選択→ｸﾚｼﾞｯﾄｶｰﾄﾞ情報を入力→｢支払回数｣をﾌﾟﾙﾀﾞｳﾝから選択します｡<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:37:17','2008-08-09 00:44:28','0000-00-00 00:00:00'),(24,0,'system_ec_payconveni','システム/ECコンビニ決済','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ｺﾝﾋﾞﾆ決済</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n<span style=\"color:#FF5B00\">◆ｾﾌﾞﾝｲﾚﾌﾞﾝ</span><hr color=\"#FF5B00\" style=\"border:solid 1px #FF5B00\">\r\n商品注文の手続きが完了すると｢ご注文内容確認｣ﾒｰﾙが送られてきます｡<br />\r\n\r\nそのﾒｰﾙをﾌﾟﾘﾝﾄｱｳﾄし(もしくは記載されている｢払込票番号｣をﾒﾓして)､お近くのｾﾌﾞﾝｲﾚﾌﾞﾝのﾚｼﾞにて｢現金｣でお支払いください｡<br /><br />\r\n\r\n<span style=\"color:#FF0000\">※</span>ｺﾝﾋﾞﾆ店頭での変更･払戻しはできませんので､予めご了承ください｡<br />\r\n<span style=\"color:#FF0000\">※</span>支払の払戻し･変更をされる場合は､直接お店側にご連絡ください｡<br />\r\n<span style=\"color:#FF0000\">※</span>お支払い後､｢受領書｣をお渡しいたします｡<br />\r\n実際に代金をお支払いされたことを証明する書類ですので､大切に保管してください｡<br /><br />\r\n\r\n<a name=\"lawson\"></a>\r\n<span style=\"color:#315BFF\">◆ﾛｰｿﾝ</span><hr style=\"border:solid 1px #315BFF\">\r\n\r\n商品注文の手続きが完了すると｢ご注文内容確認｣ﾒｰﾙが送られてきます｡<br />\r\nそのﾒｰﾙに記載されている｢支払い番号｣をﾒﾓし､お近くのﾛｰｿﾝにて以下の方法でお支払いください｡<br /><br />\r\n\r\n[x:0115]ﾛｰｿﾝのLoppi端末から『ｲﾝﾀｰﾈｯﾄ受付』を選択<br />\r\n[x:0116]お支払受付番号に支払い番号を入力<br />\r\n[x:0117]電話番号を入力<br />\r\n[x:0118]画面に従い､端末より発行される申し込み券をﾚｼﾞでご提示下さい｡<br /><br />\r\n\r\n<span style=\"color:#FF0000\">※</span>ｺﾝﾋﾞﾆ店頭での変更･払戻しはできませんので､予めご了承ください｡<br />\r\n\r\n<span style=\"color:#FF0000\">※</span>支払の払戻し･変更をされる場合は､直接お店側にご連絡ください｡<br />\r\n<span style=\"color:#FF0000\">※</span>お支払い後､｢領収書｣をお渡しいたします｡実際に代金をお支払いされたことを証明する書類ですので､大切に保管してください｡ <br /><br />\r\n\r\n<a name=\"famima\"></a>\r\n<span style=\"color:#46FF71\">◆ﾌｧﾐﾘｰﾏｰﾄ</span><hr style=\"border:solid 1px #46FF71\">\r\n商品注文の手続きが完了すると｢ご注文内容確認｣ﾒｰﾙが送られてきます｡<br />\r\nそのﾒｰﾙに記載されている｢企業ｺｰﾄﾞ｣と｢支払い番号｣をﾒﾓし､お近くのﾌｧﾐﾘｰﾏｰﾄにて以下の方法でお支払いください｡<br /><br />\r\n\r\n[x:0115]店頭のFamiﾎﾟｰﾄ/ﾌｧﾐﾈｯﾄの各画面から選択<br />\r\n\r\n→ﾌｧﾐﾎﾟｰﾄの場合:『代金支払い･ﾁｬｰｼﾞ』=>『収納表発行』<br />\r\n→ﾌｧﾐﾈｯﾄの場合:『収納表発行』<br />\r\n[x:0116]企業ｺｰﾄﾞを入力<br />\r\n[x:0117]注文番号に支払い番号を入力<br />\r\n[x:0118]画面に従い､Famiﾎﾟｰﾄ/ﾌｧﾐﾈｯﾄより発行される申し込み券をﾚｼﾞへご提示下さい｡<br /><br />\r\n\r\n<span style=\"color:#FF0000\">※</span>ｺﾝﾋﾞﾆ店頭での変更･払戻しはできませんので､予めご了承ください｡<br />\r\n<span style=\"color:#FF0000\">※</span>支払の払戻し･変更をされる場合は､直接お店側にご連絡ください｡<br />\r\n\r\n<span style=\"color:#FF0000\">※</span>お支払い後､｢領収書｣をお渡しいたします｡<br />\r\n実際に代金をお支払いされたことを証明する書類ですので､大切に保管してください｡ <br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:39:38','2008-08-09 00:45:57','0000-00-00 00:00:00'),(25,0,'system_ec_paycollect','システム/EC代金引換','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">代金引換</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n【代引手数料】<br />\r\n･\\1以上〜\\10,000以下／\\315<br />\r\n\r\n･\\10,001以上〜\\30,000以下／\\420<br />\r\n･\\30,001以上〜\\100,000以下／\\630<br />\r\n･\\100,001以上〜\\300,000以下／\\1,050<br />\r\n･\\300,001以上〜\\500,000以下／\\2,100<br />\r\n･\\500,001以上〜\\999,999以下／\\3,150<br />\r\n･\\1,000,000以上〜／\\4,200<br /><br />\r\n\r\n■代引手数料込み商品の扱い<br />\r\n代引手数料は料金表の適用外となります。<br /><br />\r\n\r\n■代引手数料にかかる消費税について<br />\r\n代引手数料は消費税を含んでいます。<br />\r\n<span style=\"color:#FF0000\">※</span>詳細は店舗にお問い合わせください。<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:43:20','2008-08-09 00:46:07','0000-00-00 00:00:00'),(26,0,'system_ec_paybank','システム/EC銀行振込','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">銀行振り込み</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n・注文確認のメールにて、振込先、振り込み金額をお知らせいたします。<br />\r\n・入金確認後の発送になります。予めご了承ください。 <br />\r\n・振込手数料はお客様のご負担にてお願いいたします。 <br />\r\n<span style=\"color:#FF0000\">※</span>詳細は店舗にお問い合わせください。<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:45:04','2008-08-09 00:46:17','0000-00-00 00:00:00'),(27,0,'system_terms','システム/利用規約','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">利用規約</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n「##site_name##」利用規約<br />\r\n<br />\r\n##site_company_name##(以下｢当社｣といいます)は､当社が運営するｻｲﾄ｢##site_name##｣(以下｢本ｻｰﾋﾞｽ｣といいます)の利用について､以下のとおり規約(以下｢本規約｣といいます)を定めます｡<br />\r\n<br />\r\n第1条 本規約の適用範囲及び変更について<br />\r\n\r\n1 本規約は本ｻｰﾋﾞｽの提供及びその利用に関し､当社及び利用者(本ｻｰﾋﾞｽを閲覧､購入､お問合せなどの利用を行った方をいいます)に適用されるものとします｡<br />\r\n2 当社は､利用者の事前の承諾を得ることなく､本規約を変更出来るものとします｡利用者は本ｻｰﾋﾞｽの利用により､変更に同意したものとみなします｡変更した条項は､特に定めない限り､遡及して適用されるものとします｡<br />\r\n<br />\r\n第2条 本ｻｰﾋﾞｽの利用について<br />\r\n1 利用者は､本規約及び当社が別途定めるご利用方法などに従い､本ｻｰﾋﾞｽを利用するものとします｡<br />\r\n2 当社は､いつでも本ｻｰﾋﾞｽの内容を事前の告知なく､変更しまたは廃止することができるものとします｡当社は本ｻｰﾋﾞｽの内容の変更､廃止による利用者の損害について一切の責任を負いません｡<br /><br />\r\n第3条 会員資格<br />\r\n1 会員とは､本規約を承認の上､ｲﾝﾀｰﾈｯﾄを使って本ｻｰﾋﾞｽ利用のために入会を申し込み､当社が会員として入会を認め､許可された個人､法人をいいます｡<br />\r\n2 会員は､本規約に基づき､本ｻｰﾋﾞｽにおいての商品購入をすることができます｡<br />\r\n\r\n3 会員は､会員資格を第三者に利用させたり､貸与､譲渡､売買､質入等をすることはできないものとします｡<br />\r\n<br />\r\n第4条 会員申込<br />\r\n1 入会を希望する者(以下｢入会希望者｣という)は､当社が定める手続に従って､入会を申し込むものとします｡入会希望者が未成年者である場合､親権者の同意を得たうえで入会を申し込むものとします｡<br />\r\n2 会員登録手続は､前項の申込に対する当社の承諾をもって完了するものとします｡ただし､当社は､入会希望者が以下に定める事由のいずれかに該当することが判明した場合､入会希望者の入会を認めないことがあり､入会を認めた後でも､入会を取り消すことがあります｡<br />\r\n(1) 入会希望者が未成年者で親権者の同意を得ていない場合<br />\r\n(2) 入会希望者が日本国外に居住する場合<br />\r\n(3) 入会希望者が過去に本規約違反等により会員資格を抹消された場合<br />\r\n(4) 入会希望者が申込の際に当社に届け出た事項に虚偽､誤記又は記入もれがあった場合<br />\r\n\r\n(5) 入会希望者が当社に対する債務の支払を怠ったことがある場合<br />\r\n(6) その他当社が不適当と判断した場合<br />\r\n<br />\r\n第5条 ﾊﾟｽﾜｰﾄﾞの管理<br />\r\n1 会員は､会員登録後に当社が会員のﾊﾟｽﾜｰﾄﾞの管理責任を負うものとします｡<br />\r\n2 会員は､ﾊﾟｽﾜｰﾄﾞを第三者に利用させたり､貸与､譲渡､売買､質入等をすることはできないものとします｡<br />\r\n3 ﾊﾟｽﾜｰﾄﾞの管理不十分､使用上の過誤､第三者の使用等による損害について当社は一切責任を負いません｡ﾊﾟｽﾜｰﾄﾞが不正に利用されたことにより当社に損害が生じた場合､会員は､当社に対し､その損害を賠償するものとします｡<br />\r\n4 会員は､ﾊﾟｽﾜｰﾄﾞを第三者に知られた場合､またはﾊﾟｽﾜｰﾄﾞが第三者に使用されている疑いのある場合には､直ちに当社にその旨連絡するとともに､当社の指示がある場合にはこれに従うにものとします｡<br />\r\n5 会員は､定期的にﾊﾟｽﾜｰﾄﾞを変更する義務があるものとし､その義務を怠ったことにより損害が生じても当社は一切責任を負いません｡<br />\r\n\r\n<br />\r\n第6条 会員資格の停止･抹消<br />\r\n当社は､以下の事由がある場合､会員に何ら事前の通知または催告をすることなく､会員資格を一時停止し､または抹消することができるものとします｡この場合､当社のとった措置により会員に損害が生じたとしても､当社は一切の責任を負いません｡<br />\r\n(1) ｱｶｳﾝﾄおよびﾊﾟｽﾜｰﾄﾞを不正に使用しまたは使用させた場合｡<br />\r\n(2) 会員が代金を定められた時期までに支払わなかった場合｡<br />\r\n(3) 会員に対し､差押､仮差押､仮処分､強制執行､破産､民事再生､会社整理､特別清算､会社更生の申し立てがなされた場合､及び会員がまたは､申し立てをした場合｡<br />\r\n(4) その他､会員が本規約のいずれかの条項に違反した場合｡<br />\r\n(5) その他､会員として不適格と当社が判断した場合｡<br />\r\n<br />\r\n第7条 退会<br />\r\n\r\n1 会員は､当社所定の手続きにより退会することができます｡<br />\r\n2 会員が死亡または解散した場合､当社は､当該会員がその時点で退会したものとみなし､ｱｶｳﾝﾄおよびﾊﾟｽﾜｰﾄﾞを利用できなくするものとします｡<br />\r\n<br />\r\n第8条 商品の購入<br />\r\n1 会員は､当社の定める方法により商品等の購入を申し込むものとします｡<br />\r\n2 前項の申し込みに対して､当社より承諾する旨のeﾒｰﾙを会員宛に発信した時点で会員との間に当該商品などに関する売買契約が成立するものとします｡<br />\r\n<br />\r\n第9条 商品の返品､売買契約の解除<br />\r\n1 商品の返品は､配送中の破損､商品の瑕疵､品違い､その他当社が認める場合を除きできないものとします｡また､商品の返品､瑕疵ある商品の交換､交換できない場合の契約の解除は､会員が商品を受領した後､1週間内に､当社に対し返品等の申請をした場合に限り､可能なものとします｡<br />\r\n2 会員が下記のいずれかにあてはまる場合､当社は事前の連絡無しに会員との間の売買契約を解除することができるものとします｡<br />\r\n\r\n(1)過去の取引において当社から売買契約を解除された経歴がある場合<br />\r\n(2)ご登録情報に著しい誤りがある場合<br />\r\n(3)ご連絡が取れなくなってしまった場合<br />\r\n(4)常識に逸脱したお申し込みがあった場合<br />\r\n(5)その他､当社が不適当と判断した場合<br />\r\n<br />\r\n第10条 ｶｽﾀﾑｵｰﾀﾞｰ<br />\r\n1 ｶｽﾀﾑｵｰﾀﾞｰの商品は､会員の都合やｻｲｽﾞ違いによるご注文のｷｬﾝｾﾙ､交換は一切出来ません｡<br />\r\n2 商品の仕様変更については､当社の判断を優先することがあります｡また､変更作業の進行によって事前にお伝えした期日からさらに日数が掛かることがあります｡<br />\r\n\r\n3 会員の要望によっては追加料金を請求させていただく場合があります｡<br />\r\n<br />\r\n第11条 ﾎﾟｲﾝﾄの利用<br />\r\n1##site_name##ﾎﾟｲﾝﾄ(以下｢ﾎﾟｲﾝﾄ｣といいます)は､##site_name##内において付与され､##site_name##内でのみ利用可能なﾎﾟｲﾝﾄを指します｡会員は､当社が定める方法により保有するﾎﾟｲﾝﾄを､当社が定める換算率で､決済代金(消費税を除く商品代金とします)の全部または一部の支払いに利用することができます｡但し､消費税､送料および手数料については現金により支払うものとします｡<br />\r\n2会員が決済代金全額の支払いにﾎﾟｲﾝﾄを利用し､その後決済代金が何らかの事情で減額された場合には､ﾎﾟｲﾝﾄまたは現金の返還が行われます｡<br />\r\n3会員が決済代金の支払いにﾎﾟｲﾝﾄを利用した後､何らかの事情により決済代金が増額された場合は､会員は増額分をﾎﾟｲﾝﾄまたは現金により支払うものとします｡<br />\r\n<br />\r\n<br />\r\n第12条 ﾎﾟｲﾝﾄ譲渡などの禁止<br />\r\n1 ﾎﾟｲﾝﾄの利用は､会員本人が行うものとします｡当該会員以外の第三者が利用することはできません｡会員は､保有するﾎﾟｲﾝﾄを他の会員その他第三者に移転､譲渡すること､質入れすること､または他の会員とﾎﾟｲﾝﾄを共有することはできません｡<br />\r\n\r\n2 会員は､いかなる場合でもﾎﾟｲﾝﾄを現金等に交換することはできません｡<br />\r\n3 一人の会員が複数の会員登録をしている場合､会員はそれぞれの会員登録において保有するﾎﾟｲﾝﾄを合算することはできません｡<br />\r\n<br />\r\n第13条 ﾎﾟｲﾝﾄの取り消し､失効<br />\r\n1 本利用規約への違反その他当社が不正･不当と判断する行為があった場合には､当社は､会員へのﾎﾟｲﾝﾄの付与もしくは会員が保有するﾎﾟｲﾝﾄの利用を停止し､または､会員が保有するﾎﾟｲﾝﾄの一部もしくは全部を取り消すことができるものとします｡<br />\r\n2 決済を取り消した場合､当該決済に利用されたﾎﾟｲﾝﾄが返還されるものとし､現金による返還は行われません｡<br />\r\n3 会員が退会などにより会員資格を喪失した場合は､当該会員が保有するﾎﾟｲﾝﾄは直ちに失効するものとします｡<br />\r\n4 会員が当社が定める期間を超えてﾎﾟｲﾝﾄによる取引を行わなかった場合､ﾎﾟｲﾝﾄは自動的に消滅します｡<br />\r\n5 当社は､取消または消滅したﾎﾟｲﾝﾄについて何らの補償も行わず､一切の責任を負いません｡<br />\r\n\r\n<br />\r\n第14条 届出事項の変更等<br />\r\n1 会員は､入会申込の際に当社に届け出した事項に変更のあった場合は､当社あてに遅滞なく連絡するものとします｡<br />\r\n2 当社からの通知は当社に登録された届出事項に基づく連絡先に発信することにより､会員に通常到達すべきときに到達したとみなされるものとします｡<br />\r\n<br />\r\n第15条 著作権その他の権利の尊重<br />\r\n1 利用者は､権利者の許諾を得ないで､本ｻｰﾋﾞｽを通じて提供されるいかなる情報についても､利用者個人の私的複製など著作権法で認められる範囲を超えての使用をすることはできません｡<br />\r\n2 本条の規定に違反して権利者あるいは第三者との間で問題が生じた場合､利用者は自己の責任と費用においてその問題を解決するとともに､当社に何の迷惑または損害を与えないものとします｡<br /><br />\r\n\r\n第16条 ##site_name##の中断､停止<br />\r\n\r\n1 当社は､以下のいずれかの事由に該当する場合､会員に事前に通知することなく本ｻｰﾋﾞｽの一部もしくは全部を一時中断､または停止することがあります｡<br />\r\n(1)本ｻｰﾋﾞｽの提供のための装置､ｼｽﾃﾑの保守点検､更新を行う場合｡<br />\r\n(2) 火災､停電､天災などにより､本ｻｰﾋﾞｽの提供が困難な場合｡<br />\r\n(3) 必要な電気通信事業者の役務が提供されない場合｡<br />\r\n(4) その他､当社が本ｻｰﾋﾞｽの一時中断もしくは停止が必要であると判断した場合｡<br />\r\n2 当社は､##site_name##の提供の一時中断､停止等の発生により､利用者が被ったいかなる損害についても一切の責任を負わないものとします｡<br />\r\n<br />\r\n第17条 協議･準拠法･管轄裁判所<br />\r\n1 当社と利用者との連絡方法は､eﾒｰﾙ及び電話によるものとします｡<br />\r\n\r\n2 本ｻｰﾋﾞｽのご利用に関して､本規約により解決できない問題が生じた場合には､##site_name##ﾏｰｹｯﾄと利用者との間で双方誠意をもって話し合い､これを解決するものとします｡<br />\r\n3 本規約の準拠法は日本法とし､当社と利用者の間で生じた紛争については東京地方裁判所を第一審専属管裁判所とします｡<br />\r\n4 利用者の売買代金不払いその他本規約違反行為によって､損害賠償義務が発生し､その請求回収のために､##site_name##が弁護士を用いた場合には､当社が支払った弁護士費用についても利用者の負担とします｡<br />\r\n<br />\r\n以上<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:06:44','2008-08-16 16:28:09','0000-00-00 00:00:00'),(28,0,'system_policy','システム/プライバシーポリシー','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">ﾌﾟﾗｲﾊﾞｼｰ保護方針</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\nﾌﾟﾗｲﾊﾞｼｰ保護方針<br />\r\n<br />\r\n##site_company_name##(以下｢当社｣といいます)は､利用者の個人情報は非常に大切なものと考えており､法令等に基づいて利用者の個人情報を適切に管理･保護するとともに､利用者が安心できるｻｰﾋﾞｽを提供することを目的として､以下の方針に基づき個人情報の保護に努めます｡この｢ﾌﾟﾗｲﾊﾞｼｰ保護方針｣(以下｢本方針｣といいます)は､に適用され､利用者がを利用するに際して当社が取得することとなった利用者の個人情報は､本方針に基づいて管理されます｡<br />\r\n<br />\r\n1 法令等の遵守について<br />\r\n\r\n当社は､個人情報の取り扱いに関して､個人情報保護法をはじめとする個人情報に関する法令を遵守します｡<br />\r\n<br />\r\n2 個人情報の定義<br />\r\nを利用していただくために登録いただいた氏名､郵便番号､住所､電話番号､ﾒｰﾙｱﾄﾞﾚｽ､性別､生年月日､ｸﾚｼﾞｯﾄｶｰﾄﾞ情報(番号､ｶｰﾄﾞ種別､ｸﾚｼﾞｯﾄｶｰﾄﾞ有効期限)､購入情報､商品の送付に必要な送付先の情報などの登録情報を｢個人情報｣として取り扱います｡<br />\r\n<br />\r\n3 個人情報の利用目的について<br />\r\nでは､個人情報を利用して､以下のことを行っております｡<br />\r\n<br />\r\n･ 注文商品の発送<br />\r\n･ 利用者への連絡<br />\r\n\r\n･ ﾒｰﾙﾏｶﾞｼﾞﾝ配信<br />\r\n･ お知らせ･ご意見ｱﾝｹｰﾄﾒｰﾙの送信<br />\r\n･ ﾏｰｹﾃｨﾝｸﾞﾃﾞｰﾀの分析<br />\r\n<br />\r\n個人情報は主に､注文商品の発送､利用者への連絡とﾒｰﾙﾏｶﾞｼﾞﾝの配信に使用しています｡また､現在および将来的に提供を検討しているｻｰﾋﾞｽについて利用者の意見を調査するために､ｱﾝｹｰﾄ形式で連絡することもあります｡ﾏｰｹﾃｨﾝｸﾞﾃﾞｰﾀの分析は､どの商品､どのｺﾝﾃﾝﾂの人気が高いかを確認し､これらのﾃﾞｰﾀから､特定の分野に興味を示した利用者に､その興味に合わせたｺﾝﾃﾝﾂや広告を提供するなど､利用者に対してより高いｻｰﾋﾞｽを行うことを目的として利用します｡<br />\r\n<br />\r\n4 個人情報の訂正･削除など<br />\r\n当社は､利用者が個人情報の開示･訂正･削除等を希望する場合､当社までご連絡いただければ､本人であることを確認の上､合理的な範囲ですみやかに対応いたします｡また本人のﾃﾞｰﾀが存在しないときにも､すみやかにその旨を通知します｡なお､これら個人情報の訂正等に当たっては､実費を勘案した合理的な範囲での手数料を申し受ける場合があります｡<br />\r\n<br />\r\n5 個人情報の第三者提供･共同使用について<br />\r\n\r\n当社では､配送の手配､ｸﾚｼﾞｯﾄｶｰﾄﾞ決済などについて他社に代行を依頼しています｡これらの会社は､利用者の個人情報の秘密を保持する為に書面にて機密保持契約を結び､配送の手配､ｸﾚｼﾞｯﾄｶｰﾄﾞ決済など機密保持契約で定められた利用目的の範囲外で利用者の個人情報使用することはありません｡当社は法令に別段の定めがある場合を除き､利用者の個人情報を､事前に利用者本人の同意を得ることなく第三者に提供しません｡<br />\r\n<br />\r\n6 個人情報の管理について<br />\r\n当社は､個人情報の利用を業務上必要な社員だけに制限し､個人情報が含まれる媒体などの保管･管理などに関する規則を作り､個人情報保護のための予防措置を講じます｡ｼｽﾃﾑに保存されている個人情報については､業務上必要な社員だけが利用できるようｱｶｳﾝﾄとﾊﾟｽﾜｰﾄﾞを用意し､ｱｸｾｽ権限管理を実施します｡なお､ｱｶｳﾝﾄとﾊﾟｽﾜｰﾄﾞは漏えい､滅失のないよう厳重に管理します｡個人情報にかかわるﾃﾞｰﾀ伝送時のｾｷｭﾘﾃｨのため､必要なWEBﾍﾟｰｼﾞに業界標準の暗号化通信であるSSLを使用します｡<br />\r\n<br />\r\n7 20歳未満の個人情報について<br />\r\nでは､20歳未満の登録を規制し､登録時に20歳未満であることが判明した場合には､個人情報の収集および使用は行いません｡子供を介して家族の情報を取得するような行為は行っていません｡<br />\r\n<br />\r\n8 ﾛｸﾞﾌｧｲﾙについて<br />\r\n当社は､利用者の動向を調査する為にｱｸｾｽﾛｸﾞ･ﾌｧｲﾙを使用します｡これにより､当社は､統計的なｻｲﾄ利用情報を得ることができますが､個人情報の収集･解析のために利用することはありません｡<br />\r\n\r\n<br />\r\n9 本方針の改定<br />\r\n会社や利用者のﾌｨｰﾄﾞﾊﾞｯｸを反映するために､この｢ﾌﾟﾗｲﾊﾞｼｰ保護方針｣を随時更新していく予定です｡当社が利用者の情報をどのように保護しているかを確認していただくためにも､本方針を定期的に確認することをお勧めします｡<br />\r\n<br />\r\n10 お問い合わせ<br />\r\n個人情報に関するお問い合わせ､および当社が本方針を遵守していないとお考えの場合は､以下の宛先にご連絡ください｡<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">お問い合わせ</a><br />\r\n<br />\r\n以上<br />\r\n<br />\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:08:52','2008-08-09 00:42:58','0000-00-00 00:00:00'),(29,0,'system_caution','システム/注意事項','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">注意事項</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここに注意事項を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:32:09','2008-08-09 00:45:06','0000-00-00 00:00:00'),(30,0,'system_support','システム/お問い合わせ','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">お問い合わせ</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここに問い合わせ先情報を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:32:54','2008-08-09 00:44:56','0000-00-00 00:00:00'),(31,0,'system_company','システム/会社概要','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">会社概要</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここに会社概要を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:33:35','2008-08-09 00:44:48','0000-00-00 00:00:00'),(32,0,'system_device','システム/対応機種','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">対応機種</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここに対応機種を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:35:04','2008-08-09 00:44:38','0000-00-00 00:00:00'),(33,0,'system_decomail_device','システム/デコメール/対応機種','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">デコメール対応機種</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここにデコメール対応機種を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-09 00:22:26','2008-08-09 00:41:26','0000-00-00 00:00:00'),(34,0,'system_sound_device','システム/サウンド/対応機種','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">サウンド対応機種</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\nここにサウンド対応機種を記載して下さい。<br />\r\n-------------------------</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-09 00:23:04','2008-08-09 00:41:13','0000-00-00 00:00:00'),(35,0,'system_ec_first','システム/EC/初めての方','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">初めての方</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n<a name=\"TOP\"></a>\r\n<span style=\"color:#FF0000\">※</span>ご利用の前に必ずお読み下さい。<br />\r\n<span style=\"color:#0035D5\">┣</span><a href=\"#mall\">##site_name##とは?</a><br />\r\n\r\n<span style=\"color:#0035D5\">┣</span><a href=\"#search\">欲しい商品を探してみよう!</a><br />\r\n<span style=\"color:#0035D5\">┣</span><a href=\"#try\">買ってみよう!</a><br />\r\n<span style=\"color:#0035D5\">┣</span><a href=\"#register\">会員登録!</a><br />\r\n<span style=\"color:#0035D5\">┗</span><a href=\"#mail\">ﾒﾙﾏｶﾞでもっとお得!</a>\r\n\r\n<br /><br />\r\n<div align=\"center\">\r\n------------------\r\n</div>\r\n\r\n<a name=\"mall\" id=\"mall\"></a><br />\r\n[x:0068]<span style=\"color:#CC0000\">##site_name##とは?</span> \r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\nはじめての方でも安心して楽しめるｻｰﾋﾞｽがいっぱいのｼｮｯﾋﾟﾝｸﾞｻｲﾄです。<br />\r\n\r\n<a name=\"search\" id=\"search\"></a><br />\r\n[x:0111]欲しい商品を探してみよう!\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n[x:0115]ｼｮｯﾌﾟから探す<br />\r\nﾊﾟﾜｰｽﾄｰﾝ､ﾌｧｯｼｮﾝ､家電･･･興味があるｼｮｯﾌﾟをｸﾘｯｸして､商品を絞り込むことができます｡\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink>\r\n<a href=\"?action_user_ec=true\" accesskey=\"0\">##site_name##からｼｮｯﾌﾟを探す</a>\r\n<blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink> \r\n</div>\r\n<br />\r\n\r\n[x:0116]検索して探す<br />\r\n気になるﾜｰﾄﾞを検索BOXに入れて検索ﾎﾞﾀﾝを押すだけで､商品の中から関連する商品を探すことができます｡<br />\r\n<br />\r\n\r\n<!--検索窓-->\r\n<div align=\"center\">\r\n<span style=\"color:#FFBF00\"><blink>↓</blink> 早速探してみる <blink>↓</blink></span>\r\n\r\n<form action=\"index.php\" method=\"post\"><input type=\"hidden\" name=\"action_user_ec_item_list\" value=\"true\">\r\n<input type=\"text\" name=\"keyword\" size=\"14\">\r\n<input type=\"submit\" name=\"submit\" value=\"検索\">\r\n</form>\r\n</div>\r\n\r\n[x:0117]特集から探す<br />\r\n##site_name##では､お得な商品や今話題の商品を集めた特集ｺｰﾅｰがたくさん!!<br />\r\nお得に商品をGETしたいならｺｺ!!\r\n\r\n\r\n<div align=\"right\">\r\n<a href=\"#TOP\">▲ﾍﾟｰｼﾞTOPへ</a>\r\n\r\n</div>\r\n\r\n\r\n<a name=\"try\" id=\"try\"></a><br />\r\n[x:0086]<span style=\"color:#CC0000\">買ってみよう!</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n[x:0162]送料･お支払方法<br />\r\n送料は商品によって異なります｡<br />\r\n中には､送料無料の商品もありますのでお見逃しなく!!<br />\r\n決済方法は以下の中から選択することができます｡<br />\r\n<br />\r\n\r\n・<a href=\"fp.php?code=system_ec_paycredit\">ｸﾚｼﾞｯﾄｶｰﾄﾞ決済</a><br />\r\n・ｺﾝﾋﾞﾆ決済<br />\r\n　┣<a href=\"fp.php?code=system_ec_payconveni#seven\">ｾﾌﾞﾝｲﾚﾌﾞﾝ</a><br />\r\n　┣<a href=\"fp.php?code=system_ec_payconveni#lawson\">ﾛｰｿﾝ</a><br />\r\n\r\n　┗<a href=\"fp.php?code=system_ec_payconveni#famima\">ﾌｧﾐﾘｰﾏｰﾄ</a><br />\r\n\r\n・<a href=\"fp.php?code=system_ec_paycollect\">代金引換</a><br />\r\n・<a href=\"fp.php?code=system_ec_paybank\">銀行振込</a><br /><br />\r\n\r\n[x:0162]買い物かごって？<br />\r\n気に入った商品を見つけたら…<br />\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">「かごに入れる」</div>\r\n\r\nボタンを押して、買い物かごに商品を入れましょう♪<br /><br />\r\n	\r\n[x:0162]かごの商品を購入\r\n買い物かごに入れただけでは購入は完了しません。<br />\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">「注文画面に進む」</div>\r\nボタンを押して、購入を完了しましょう。<br /><br />\r\n\r\n\r\n<a name=\"register\" id=\"register\"></a>\r\n[x:0109]お買い物されたことのない方は、会員登録をしましょう。<br />\r\nログインしてお買物すると、ﾎﾟｲﾝﾄがたまったり、住所入力を省略したり出来ます。<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。\">無料会員登録はｺﾁﾗ</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n</div>\r\n\r\n<br />\r\n##site_name##会員登録すると…\r\n\r\nお買物がますます楽しくなる特典がいっぱい\r\n<br /><br />\r\n[x:0085]面倒な住所入力が不要!<br />\r\n┗事前にﾛｸﾞｲﾝして入力しておくことで､お買物時の手間が省けます｡<br /><br />\r\n[x:0085]ﾎﾟｲﾝﾄがたまります♪<br />\r\n┗購入額に応じてﾎﾟｲﾝﾄがたまる!<br />\r\n\r\n    ﾎﾟｲﾝﾄはお買物額の割引にご利用できたり、のｱﾊﾞﾀｰやｺﾝﾃﾝﾂなどにも利用可能。<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。\">無料会員登録はｺﾁﾗ</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div><br />\r\n\r\n[x:0046]ﾎﾟｲﾝﾄって??<br />\r\n\r\n┗会員なら､ﾛｸﾞｲﾝをしてそのままお買物するだけﾎﾟｲﾝﾄが貯まります｡<br />\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"?action_user_ec=true\" accesskey=\"0\">お買物はｺﾁﾗから</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div>\r\n<br />\r\n\r\n[x:0161]ﾎﾟｲﾝﾄを使う<br />\r\n┗お買物で発生したﾎﾟｲﾝﾄは､確定後､お買物で発生したﾎﾟｲﾝﾄを使うことができます｡ <br /><br />\r\n\r\n    <span style=\"color:#FF0000\">※</span>お店で使う お買物にﾎﾟｲﾝﾄを使う場合は､買い物かごに商品を入れ､そのまま進み､ﾎﾟｲﾝﾄを使うを選択してください｡ \r\n    ﾎﾟｲﾝﾄは【100ﾎﾟｲﾝﾄ】から使用可能です｡<br />\r\n    <span style=\"color:#FF0000\">※</span>さらにﾎﾟｲﾝﾄをためる!! ﾎﾟｲﾝﾄｱｯﾌﾟｷｬﾝﾍﾟｰﾝなど各種ｷｬﾝﾍﾟｰﾝを実施しています!! \r\n    お得なﾀｲﾐﾝｸﾞを見のがさず､かしこくﾎﾟｲﾝﾄをためてﾈ♪<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"?action_user_ec=true\" accesskey=\"0\">さっそくお買物</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n</div>\r\n<div align=\"right\">\r\n<a href=\"#TOP\">▲ﾍﾟｰｼﾞTOPへ</a>\r\n</div><br />\r\n\r\n<a name=\"mail\" id=\"mail\"></a>\r\n[x:0105]<span style=\"color:#CC0000\">ﾒﾙﾏｶﾞでもっとお得! \r\n</span> \r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\nお得な情報を無料でお届けするﾒｰﾙｻｰﾋﾞｽ｡<br />\r\nｲﾍﾞﾝﾄ､新着商品など､知っておくと｢ﾗｯｷｰ!｣な情報がいっぱい! ﾒｰﾙでいちはやく見のがせない情報をGET<span style=\"color:#FF9933\">☆</span><br />\r\n読み物としても楽しめます｡\r\nまずは会員登録してﾈ♪<br />\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。\">無料会員登録はｺﾁﾗ</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div>\r\n<div align=\"right\">\r\n<a href=\"#TOP\">▲ﾍﾟｰｼﾞTOPへ</a>\r\n</div>\r\n<br />\r\n[x:0186]<span style=\"color:#CC0000\">退会方法</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n退会手続きは以下の手順で申請ﾍﾟｰｼﾞまでｱｸｾｽし､退会手続きをお願いいたします｡<br />\r\n<br />\r\n会員ﾛｸﾞｲﾝ→｢会員情報変更｣→｢退会はこちらから｣→｢退会手続き｣\r\n\r\n<div align=\"right\">\r\n<a href=\"#TOP\">▲ﾍﾟｰｼﾞTOPへ</a>\r\n</div>\r\n</div>\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-10 12:21:41','2008-08-10 15:28:32','0000-00-00 00:00:00'),(36,19,'shop_fp_sample01','ショップフリーページサンプル０１','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--コンテナ開始-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">■ようこそ生活雑貨店へ!■</span>\r\n</div>\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n</div>\r\n<br />\r\n<div style=\"text-aling:left;font-size:small;\">\r\ntest test test test test test test test test test test test test test test test test test test test test test test test test test</div>\r\n<br />\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n</div>\r\n<br />\r\n\r\n<!--フッター-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">ﾄｯﾌﾟへ</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n\r\n\r\n\r\n\r\n',1,'2008-08-11 12:48:33','2008-08-11 18:44:58','0000-00-00 00:00:00'),(37,19,'shop_fp_sample02','生活雑貨屋のフリーページ２','フリーページ２です。',1,'2008-08-11 18:05:37','2008-08-11 18:05:37','0000-00-00 00:00:00');

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL auto_increment COMMENT 'ファイルID',
  `file_name` text NOT NULL COMMENT 'ファイル名',
  `file_name_o` text NOT NULL COMMENT 'オリジナルファイル名',
  `file_memo` text COMMENT 'ファイルメモ',
  `file_status` tinyint(1) NOT NULL COMMENT 'ファイルステータス　0:無効 1:有効',
  `file_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `file_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `file_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ファイルテーブル';
INSERT INTO `file` VALUES (1,'','',NULL,0,'2008-04-03 18:47:03','2008-04-03 19:08:59','2008-04-03 19:08:59'),(2,'','',NULL,0,'2008-04-03 18:47:53','2008-04-03 19:08:54','2008-04-03 19:08:54'),(3,'12072162991710942a779.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:39','2008-04-03 18:51:39','0000-00-00 00:00:00'),(4,'12072163067b7d17fda18.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:46','2008-04-03 18:51:46','0000-00-00 00:00:00'),(5,'1207216309e79c07f94.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:49','2008-04-03 19:39:44','2008-04-03 19:39:44'),(6,'120721642183d24d846c64.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:53:41','2008-04-03 18:53:41','0000-00-00 00:00:00'),(7,'12072167812f1ead7db.gif','rapi_leave06_s1.gif',NULL,0,'2008-04-03 18:59:41','2008-04-03 18:59:41','0000-00-00 00:00:00'),(8,'1207216927670add1b1.gif','rapi_congra03b_s1.gif',NULL,0,'2008-04-03 19:02:07','2008-04-03 19:02:07','0000-00-00 00:00:00'),(9,'12072173512cc79b2.gif','dou_thanks08_s1.gif',NULL,0,'2008-04-03 19:09:11','2008-04-03 19:09:11','0000-00-00 00:00:00'),(10,'120721740242d2a1.gif','dou_thanks08_s1.gif',NULL,0,'2008-04-03 19:10:02','2008-04-03 19:10:02','0000-00-00 00:00:00'),(11,'1207217430dec17e.gif','niji_notice11_s1.gif',NULL,0,'2008-04-03 19:10:30','2008-04-03 19:10:30','0000-00-00 00:00:00'),(12,'120721743781f12ba18.gif','mochi_say02_s1.gif',NULL,0,'2008-04-03 19:10:37','2008-04-03 19:10:37','0000-00-00 00:00:00'),(13,'120721744801a5048.gif','dl_leave06_s1.gif',NULL,0,'2008-04-03 19:10:48','2008-04-03 19:10:48','0000-00-00 00:00:00'),(14,'120721745977588326207.gif','mochi_word02_s2.gif',NULL,0,'2008-04-03 19:10:59','2008-04-03 19:10:59','0000-00-00 00:00:00'),(15,'1207219116659cb123504b.gif','dl_leave06_s2.gif',NULL,0,'2008-04-03 19:38:36','2008-04-03 19:38:36','0000-00-00 00:00:00'),(16,'1207620603c85f3.gif','test1.gif',NULL,0,'2008-04-08 11:10:03','2008-04-08 11:10:03','0000-00-00 00:00:00'),(17,'120762064161d567760440.gif','banner.gif',NULL,0,'2008-04-08 11:10:41','2008-04-08 11:10:41','0000-00-00 00:00:00'),(18,'1207620712b9a900f846df.gif','no_mochi.gif',NULL,0,'2008-04-08 11:11:52','2008-04-08 11:11:52','0000-00-00 00:00:00'),(19,'1207620746e8185b4.gif','no_soy_donatu.gif',NULL,0,'2008-04-08 11:12:26','2008-04-08 11:12:26','0000-00-00 00:00:00'),(20,'1207620865860706.jpg','alice.jpg',NULL,0,'2008-04-08 11:14:25','2008-04-08 11:14:25','0000-00-00 00:00:00'),(21,'12076209394620a5938fa.gif','busane.gif',NULL,0,'2008-04-08 11:15:39','2008-04-08 11:19:16','2008-04-08 11:19:16'),(22,'1207621016fa2798d8eb33.gif','alice_s.gif',NULL,0,'2008-04-08 11:16:56','2008-04-08 11:16:56','0000-00-00 00:00:00'),(23,'1207621022c685d72c.gif','busane_s.gif',NULL,0,'2008-04-08 11:17:02','2008-04-08 11:17:02','0000-00-00 00:00:00'),(24,'1207621026c4fcd.gif','cn_s.gif',NULL,0,'2008-04-08 11:17:06','2008-04-08 11:17:06','0000-00-00 00:00:00'),(25,'12076210319a73f11d0ff3.gif','dls_s.gif',NULL,0,'2008-04-08 11:17:11','2008-04-08 11:17:11','0000-00-00 00:00:00'),(26,'1207621036f7b018669558.gif','donatu_s.gif',NULL,0,'2008-04-08 11:17:16','2008-04-08 11:17:16','0000-00-00 00:00:00'),(27,'1207621041746986704f82.gif','hood_s.gif',NULL,0,'2008-04-08 11:17:21','2008-04-08 11:17:21','0000-00-00 00:00:00'),(28,'12076210456ee9ff8.gif','hood_s.gif',NULL,0,'2008-04-08 11:17:25','2008-04-08 11:17:25','0000-00-00 00:00:00'),(29,'12076210499de33a7c.gif','kc_s.gif',NULL,0,'2008-04-08 11:17:29','2008-04-08 11:17:29','0000-00-00 00:00:00'),(30,'1207621054877648.gif','lapi_s.gif',NULL,0,'2008-04-08 11:17:34','2008-04-08 11:17:34','0000-00-00 00:00:00'),(31,'12076210596838868eecc7.gif','mochi.gif',NULL,0,'2008-04-08 11:17:39','2008-04-08 11:17:39','0000-00-00 00:00:00'),(32,'120762106306c847d7.gif','mochi_s.gif',NULL,0,'2008-04-08 11:17:43','2008-04-08 11:17:43','0000-00-00 00:00:00'),(33,'12076210685a9ecdf43.gif','napa_s.gif',NULL,0,'2008-04-08 11:17:48','2008-04-08 11:17:48','0000-00-00 00:00:00'),(34,'1207621074b6064b67c5c1.gif','nijiusa_s.gif',NULL,0,'2008-04-08 11:17:54','2008-04-08 11:17:54','0000-00-00 00:00:00'),(35,'1207621081b9716b0abb33.gif','pp_s.gif',NULL,0,'2008-04-08 11:18:01','2008-04-08 11:18:01','0000-00-00 00:00:00'),(36,'1207621092e8dc3f5e.gif','pp_s.gif',NULL,0,'2008-04-08 11:18:12','2008-04-08 11:18:12','0000-00-00 00:00:00'),(37,'1207621101d24635ad56ab.gif','sc_s.gif',NULL,0,'2008-04-08 11:18:21','2008-04-08 11:18:21','0000-00-00 00:00:00'),(38,'12076211063e9cf8ab188.gif','st_s.gif',NULL,0,'2008-04-08 11:18:26','2008-04-08 11:18:26','0000-00-00 00:00:00'),(39,'12076211168fb52aa7.gif','tuco_s.gif',NULL,0,'2008-04-08 11:18:36','2008-04-08 11:18:36','0000-00-00 00:00:00'),(40,'1207621124e0ed392c.gif','wa_s.gif',NULL,0,'2008-04-08 11:18:44','2008-04-08 11:18:44','0000-00-00 00:00:00'),(41,'12154896227bd7fbc5af7.jpg','ba_1615.jpg',NULL,0,'2008-04-10 19:42:28','2008-07-08 13:00:29','2008-07-08 13:00:29'),(42,'1207824160506280519.jpg','20070729-00000112-reu-bus_all-view-000.jpg',NULL,0,'2008-04-10 19:42:40','2008-04-10 19:42:49','2008-04-10 19:42:49'),(43,'1207824187cda0c0.jpg','15jmd13sops.jpg',NULL,0,'2008-04-10 19:43:07','2008-04-10 19:43:14','2008-04-10 19:43:14'),(44,'','',NULL,0,'2008-05-16 20:29:43','2008-05-16 20:29:47','2008-05-16 20:29:47'),(45,'1215481625360797740d.jpg','080424_hefti_100x100.jpg',NULL,1,'2008-05-16 20:32:29','2008-07-08 10:47:05','0000-00-00 00:00:00'),(46,'1210937760e2e9fe18a.jpg','1.jpg',NULL,0,'2008-05-16 20:36:00','2008-05-16 20:37:36','2008-05-16 20:37:36'),(47,'1210937866f58b6e.jpg','1d.jpg',NULL,0,'2008-05-16 20:37:46','2008-05-16 20:40:38','2008-05-16 20:40:38'),(48,'','',NULL,0,'2008-06-06 21:33:41','2008-06-06 21:33:41','0000-00-00 00:00:00'),(49,'12127556420861d.gif','1_1.gif',NULL,1,'2008-06-06 21:34:02','2008-06-06 21:34:02','0000-00-00 00:00:00'),(50,'121543371565265626f.jpg','1d.jpg',NULL,0,'2008-07-07 21:28:35','2008-07-07 21:29:17','2008-07-07 21:29:17'),(51,'1217217824aef36d.jpg','13_2.jpg',NULL,1,'2008-07-28 13:03:44','2008-07-28 13:03:44','0000-00-00 00:00:00'),(52,'1217217865a33d5c722e4.gif','1002_2.gif',NULL,1,'2008-07-28 13:04:25','2008-07-28 13:04:25','0000-00-00 00:00:00'),(53,'1219225420c59572.jpg','','',1,'2008-07-28 19:14:23','2008-08-20 18:43:40','0000-00-00 00:00:00'),(54,'12173198495e5f4319d97.jpg','1.jpg',NULL,0,'2008-07-29 17:24:09','2008-07-29 17:32:12','2008-07-29 17:32:12'),(55,'1217386822c9dfb5.jpg','1.jpg',NULL,1,'2008-07-30 12:00:21','2008-07-30 12:00:21','0000-00-00 00:00:00'),(56,'12173868431ff0adf69.jpg','2.jpg',NULL,1,'2008-07-30 12:00:43','2008-07-30 12:00:43','0000-00-00 00:00:00'),(57,'12173868533e99270ce426.jpg','3.jpg','サクラ',1,'2008-07-30 12:00:53','2008-08-20 18:38:09','0000-00-00 00:00:00'),(58,'1219225069f75810a.jpg','080424_hefti_100x100.jpg','youtube1',1,'2008-08-05 18:02:45','2008-08-20 18:38:56','0000-00-00 00:00:00'),(59,'12192253151d28796a15bf.jpg','ck.jpg','ケーキ1',1,'2008-08-20 18:41:55','2008-08-20 19:42:31','0000-00-00 00:00:00'),(60,'12217203975211bf3.jpg','1.jpg','',1,'2008-09-18 15:46:36','2008-09-18 15:46:36','0000-00-00 00:00:00'),(61,'122172407078f37ab3ee7e.jpg','ba_046_s.jpg','',1,'2008-09-18 16:47:50','2008-09-18 16:47:50','0000-00-00 00:00:00');

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE `mail_template` (
  `mail_template_id` int(11) NOT NULL auto_increment COMMENT 'メールテンプレートID',
  `mail_template_code` varchar(255) NOT NULL COMMENT 'メールテンプレートコード',
  `mail_template_name` text NOT NULL COMMENT 'メールテンプレート名',
  `mail_template_title` text NOT NULL COMMENT 'メールテンプレートタイトル',
  `mail_template_body` text NOT NULL COMMENT 'メールテンプレート本文',
  `mail_template_status` tinyint(1) unsigned NOT NULL default '0' COMMENT 'メールテンプレートステータス（0:削除,1:有効）',
  PRIMARY KEY  (`mail_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='メールテンプレートテーブル';
INSERT INTO `mail_template` VALUES (1,'user_regist','','[##site_name##]会員登録','この度は[##site_name##]に登録申請して頂き、ありがとうございました。 \r\n下記URLより本登録を完了させてください。\r\n##regist_url####user_hash##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(2,'user_already_member_error','','[##site_name##]会員登録エラー','この度は[##site_name##]に登録申請して頂き、ありがとうございました。 \r\nあなたは既に会員のため登録することが出来ません。\r\n下記URLよりログインしてください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(3,'user_change_mailaddress_done','','[##site_name##]メールアドレス変更','メールアドレスの変更が完了しました。\r\n下記URLよりログインしてください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(4,'user_change_mailaddress_error','','[##site_name##]メールアドレス変更エラー','このメールアドレスは既に使われています。別のメールアドレスを指定して下さい。\r\n会員の方は下記URLよりログインしてください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(5,'user_regist_done','','[##site_name##]会員登録完了','この度は[##site_name##]に登録して頂き、ありがとうございました。 \r\n下記URLよりログインして下さい。\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(6,'user_remind','','[##site_name##]パスワード請求','[##site_name##]をご利用頂き、ありがとうございます。 \r\nあなたのパスワードになります。\r\n##user_password##\r\n会員の方は下記URLよりログインしてください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(7,'user_invite','','[##site_name##]招待状をお送りします','##to_user_mailaddress##さん\r\n\r\n##from_user_nickname##さんより、あなたへ、「##site_name##」への招待状が届いています。\r\n\r\n◆##from_user_nickname##さんからのメッセージ\r\n##invite_message##\r\n\r\n◆下記のURLより会員登録(無料)を行えば、\r\nあなたも##site_name##に参加できます。\r\n##regist_url####user_hash##\r\n\r\n※すでに##site_name##に登録済みの場合は、\r\n友達リンク申請が届いていますのでご確認ください。\r\n##login_url##\r\n\r\n※招待状の送信者に覚えがない場合\r\nメールアドレスを誤って送信されている可能性があります。\r\n大変お手数ではございますが、\r\n以下のお問い合わせ先までご連絡ください。\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート##support_mailaddress##\r\n',1),(8,'user_got_message','','[##site_name##]メッセージが届いています','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\n受信箱に ##from_user_nickname## さんからのメッセージが届いています。\r\nメッセージの内容を確認するには以下のURLをクリックしてログインしください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(9,'user_friend_apply','','[##site_name##]友達リンク申請が届いています','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\n##from_user_nickname##さんから友達リンク申請が届いています\r\n内容を確認するには以下のURLをクリックしてログインしください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(10,'user_bbs','','[##site_name##]伝言板に書き込みがありました','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\n伝言板に ##from_user_nickname## さんから伝言が届いています。\r\n伝言内容を確認するには以下のURLをクリックしてログインしください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(11,'alert','','[##site_name##]##alert_subject##','[日　　時]##alert_date##\r\n[ファイル]##alert_file##\r\n[概　　要]##alert_body##\r\n',1),(12,'user_image_success','','[##site_name##]画像投稿完了','[##site_name##]をご利用頂き、ありがとうございます。 \r\n画像の投稿が完了しました。\r\n会員の方は下記URLよりログインして下さい。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(13,'user_image_error','','[##site_name##]画像投稿エラー','この度は[##site_name##]をご利用頂き、ありがとうございます。 \r\n大変お手数ですが、アップロードされた画像がエラーのためご利用になれません。\r\n##error##\r\n\r\nこちらのメールアドレス宛に再度画像を添付してお送り下さい。\r\n##image_mailaddress##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(14,'user_community_join','','[##site_name##]コミュニティ参加申請','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\nあなたのコミュニティに参加希望の人がいます。上記URLからアクセスして認証して下さい。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##',1),(15,'user_review','','[##site_name##]評価をお願いします。','##user_name##様\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n\r\nご購入いただきました商品「##item_name##」の評価をお願いいたします。\r\n\r\n##user_url##?action_user_ec_review_add=true&review_id=##review_id##&review_hash=##review_hash##\r\n商品の評価にご協力頂きました方から　抽選で【1,000##point_name##】プレゼント！！\r\n\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##\r\n',1),(16,'user_order','注文確認メール　テスト用データ','[##site_name##]ご注文内容確認','??????????\r\n本メールは、当サイトにてご注文いただいたお客様へ【ご注文内容】の確認をいただくための、自動配信メールとなっております。\r\n当商品を購入した覚えがなくこのメールが届いた場合は、お手数ですがこちら ##admin_mailaddress## までご連絡ください。\r\n★★★…………★★★\r\n　ご注文手続き完了\r\n★★………………★★\r\n\r\n##user_name##　様\r\n\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n以下の内容で商品ご注文手続きを行いましたのでご確認ください。\r\n\r\n＝＝【ご注文情報】＝＝\r\n\r\n注文日時：##user_order_created_time##\r\n注文番号：##user_order_no##\r\n支払方法：代金引換\r\n※価格はすべて税込表示となっております。\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\nタイプ　：##item_type##\r\n商品番号：##item_id##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##item_price##円\r\n##/foreach[cart_list]##\r\n……………………………\r\n小　　計　：　##user_order_total_price1##円\r\n(内消費税)：　##user_order_tax##円\r\n送　　料　：　##user_order_postage##円\r\n代引手数料：　##user_order_exchange_fee##円\r\n##if[user_order_expend_point]##\r\nポイント利用分　：　-##user_order_expend_point##円\r\n##/if[user_order_expend_point]##\r\n……………………………\r\n総　合　計：　##user_order_total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n\r\n\r\n■ポイントについて\r\n買い物カゴ計上されているポイントは、商品決済時には加算されません。\r\n商品の出荷確定後の加算となります。予めご了承ください。\r\n\r\n■商品の発送について\r\n商品のお届けは、ご注文日から10日程となります。\r\n発送が完了いたしましたら、商品発送のお知らせメールが届きます。\r\n商品によっては1ヶ月前後かかる場合もございますが、大幅に遅れる場合は別途お知らせいたします\r\n2週間以上たっても商品が届かない場合は、お問い合わせください。\r\n\r\n■キャンセルに関して\r\n当ショップでは、数量限定ならびに期間限定の形での販売を行っているため、購入申込み後のキャンセルは受け付けておりません。\r\n\r\n■不良品に関して\r\n商品の品質には万全の注意を払っておりますが、下記の場合のみ送料弊社負担でお取替えさせていただきます。\r\n\r\n・配送中の事故等で破損、汚損が発生した場合\r\n・梱包ミスにより注文された商品と異なる場合\r\n・商品添付の契約書に定められた事由による場合\r\n\r\nその際は、商品到着後土日祝祭日を除く2日以内に、##admin_mailaddress##までご連絡ください。\r\n\r\n以上ご理解の上、商品のご到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##\r\n',1),(17,'user_order1','注文確認メール クレジット','[##site_name##]ご注文内容確認','??????????\r\n本メールは、当サイトにてご注文いただいたお客様へ【ご注文内容】の確認をいただくための、自動配信メールとなっております。\r\n当商品を購入した覚えがなくこのメールが届いた場合は、お手数ですがこちら ##admin_mailaddress## までご連絡ください。\r\n★★★…………★★★\r\n　ご注文手続き完了\r\n★★………………★★\r\n\r\n##user_name##　様\r\n\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n以下の内容で商品ご注文手続きを行いましたのでご確認ください。\r\n\r\n＝＝【ご注文情報】＝＝\r\n\r\n注文日時：##user_order_created_time##\r\n注文番号：##user_order_no##\r\n支払方法：クレジットカード\r\n※価格はすべて税込表示となっております。\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\nタイプ　：##item_type##\r\n商品番号：##item_id##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n……………………………\r\n小　　計　：　##user_order_total_price1##円\r\n(内消費税)：　##user_order_tax##円\r\n送　　料　：　##user_order_postage##円\r\n代引手数料：　##user_order_exchange_fee##円\r\n##if[user_order_expend_point]##\r\nポイント利用分　：　-##user_order_expend_point##円\r\n##/if[user_order_expend_point]##\r\n……………………………\r\n総　合　計：　##user_order_total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n\r\n\r\n■ポイントについて\r\n買い物カゴ計上されているポイントは、商品決済時には加算されません。\r\n商品の出荷確定後の加算となります。予めご了承ください。\r\n\r\n■商品の発送について\r\n商品のお届けは、ご注文日から10日程となります。\r\n発送が完了いたしましたら、商品発送のお知らせメールが届きます。\r\n商品によっては1ヶ月前後かかる場合もございますが、大幅に遅れる場合は別途お知らせいたします\r\n2週間以上たっても商品が届かない場合は、お問い合わせください。\r\n\r\n■キャンセルに関して\r\n当ショップでは、数量限定ならびに期間限定の形での販売を行っているため、購入申込み後のキャンセルは受け付けておりません。\r\n\r\n■不良品に関して\r\n商品の品質には万全の注意を払っておりますが、下記の場合のみ送料弊社負担でお取替えさせていただきます。\r\n\r\n・配送中の事故等で破損、汚損が発生した場合\r\n・梱包ミスにより注文された商品と異なる場合\r\n・商品添付の契約書に定められた事由による場合\r\n\r\nその際は、商品到着後土日祝祭日を除く2日以内に、##admin_mailaddress##までご連絡ください。\r\n\r\n以上ご理解の上、商品のご到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##',1),(18,'user_order2','注文確認メール　コンビニ','[##site_name##]ご注文内容確認','??????????\r\n本メールは、当サイトにてご注文いただいたお客様へ【ご注文内容】の確認をいただくための、自動配信メールとなっております。\r\n当商品を購入した覚えがなくこのメールが届いた場合は、お手数ですがこちら ##admin_mailaddress## までご連絡ください。\r\n★★★…………★★★\r\n　ご注文手続き完了\r\n★★………………★★\r\n\r\n##user_name##　様\r\n\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n以下の内容で商品ご注文手続きを行いましたのでご確認ください。\r\n\r\n＝＝【ご注文情報】＝＝\r\n\r\n注文日時：##user_order_created_time##\r\n注文番号：##user_order_no##\r\n支払方法：コンビニ決済 ##user_order_conveni_type##\r\n※価格はすべて税込表示となっております。\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\nタイプ　：##item_type##\r\n商品番号：##item_id##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n……………………………\r\n小　　計　：　##user_order_total_price1##円\r\n(内消費税)：　##user_order_tax##円\r\n送　　料　：　##user_order_postage##円\r\n代引手数料：　##user_order_exchange_fee##円\r\n##if[user_order_expend_point]##\r\nポイント利用分　：　-##user_order_expend_point##円\r\n##/if[user_order_expend_point]##\r\n……………………………\r\n総　合　計：　##user_order_total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n\r\n■お支払い方法\r\n##if[seveneleven]##\r\n**********************\r\nセブンイレブンでのお支払い\r\n**********************\r\n##user_order_conveni_pay_url##\r\n上記の払込票を印刷して、お支払いいただく際にレジにお渡しください。\r\n印刷できない場合は、『インターネットでのお支払い』とレジにてお申し出の上、『##user_order_conveni_sale_code##』をお伝えください。\r\n##/if[seveneleven]##\r\n##if[famima]##\r\n**********************\r\nファミリーマートでのお支払い\r\n**********************\r\n1.店頭のFamiポートの画面から選択\r\n　『代金支払い』=>『収納表発行』\r\n2.企業コードに『10020』を入力\r\n3.注文番号に支払い番号『##user_order_conveni_sale_code##』を入力\r\n4.画面に従い、Famiポートより発行される申し込み券をレジへご提示下さい。\r\n##/if[famima]##\r\n##if[lawson]##\r\n**********************\r\nローソンでのお支払い\r\n**********************\r\n1.ローソンのLoppi端末から『インターネット受付』を選択\r\n2.お支払受付番号に支払い番号『##user_order_conveni_sale_code##』を入力\r\n3.電話番号『{$user_phone}』を入力\r\n4.画面に従い、端末より発行される申し込み券をレジでご提示下さい。\r\n##/if[lawson]##\r\n##if[seicomart]##\r\n**********************\r\nセイコーマートでのお支払い\r\n**********************\r\n1.セイコーマートのクラブステーション端末から『インターネット受付』を選択\r\n2.お支払受付番号に支払い番号『##user_order_conveni_sale_code##』を入力\r\n3.電話番号『##user_phone##』を入力\r\n4.画面に従い、端末より発行される申し込み券をレジでご提示下さい。\r\n##/if[seicomart]##\r\n\r\n※ご注意※\r\n受領書の振込み先名には、決済代行会社名称『エフレジ』と記載されます。\r\n支払い後のご不明点などは受領書に記載の電話番号へお問い合わせ下さい。\r\n\r\n■ポイントについて\r\n買い物カゴ計上されているポイントは、商品決済時には加算されません。\r\n商品の出荷確定後の加算となります。予めご了承ください。\r\n\r\n■商品の発送について\r\n商品のお届けは、ご注文日から10日程となります。\r\n発送が完了いたしましたら、商品発送のお知らせメールが届きます。\r\n商品によっては1ヶ月前後かかる場合もございますが、大幅に遅れる場合は別途お知らせいたします\r\n2週間以上たっても商品が届かない場合は、お問い合わせください。\r\n\r\n■キャンセルに関して\r\n当ショップでは、数量限定ならびに期間限定の形での販売を行っているため、購入申込み後のキャンセルは受け付けておりません。\r\n\r\n■不良品に関して\r\n商品の品質には万全の注意を払っておりますが、下記の場合のみ送料弊社負担でお取替えさせていただきます。\r\n\r\n・配送中の事故等で破損、汚損が発生した場合\r\n・梱包ミスにより注文された商品と異なる場合\r\n・商品添付の契約書に定められた事由による場合\r\n\r\nその際は、商品到着後土日祝祭日を除く2日以内に、##admin_mailaddress##までご連絡ください。\r\n\r\n以上ご理解の上、商品のご到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##site_url##\r\n[運営会社]\r\n##site_company_name##',1),(19,'user_order3','注文確認メール　代引き','[##site_name##]ご注文内容確認','??????????\r\n本メールは、当サイトにてご注文いただいたお客様へ【ご注文内容】の確認をいただくための、自動配信メールとなっております。\r\n当商品を購入した覚えがなくこのメールが届いた場合は、お手数ですがこちら ##admin_mailaddress## までご連絡ください。\r\n★★★…………★★★\r\n　ご注文手続き完了\r\n★★………………★★\r\n\r\n##user_name##　様\r\n\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n以下の内容で商品ご注文手続きを行いましたのでご確認ください。\r\n\r\n＝＝【ご注文情報】＝＝\r\n\r\n注文日時：##user_order_created_time##\r\n注文番号：##user_order_no##\r\n支払方法：代金引換\r\n※価格はすべて税込表示となっております。\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\nタイプ　：##item_type##\r\n商品番号：##item_id##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n……………………………\r\n小　　計　：　##user_order_total_price1##円\r\n(内消費税)：　##user_order_tax##円\r\n送　　料　：　##user_order_postage##円\r\n代引手数料：　##user_order_exchange_fee##円\r\n##if[user_order_expend_point]##\r\nポイント利用分　：　-##user_order_expend_point##円\r\n##/if[user_order_expend_point]##\r\n……………………………\r\n総　合　計：　##user_order_total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n\r\n\r\n■ポイントについて\r\n買い物カゴ計上されているポイントは、商品決済時には加算されません。\r\n商品の出荷確定後の加算となります。予めご了承ください。\r\n\r\n■商品の発送について\r\n商品のお届けは、ご注文日から10日程となります。\r\n発送が完了いたしましたら、商品発送のお知らせメールが届きます。\r\n商品によっては1ヶ月前後かかる場合もございますが、大幅に遅れる場合は別途お知らせいたします\r\n2週間以上たっても商品が届かない場合は、お問い合わせください。\r\n\r\n■キャンセルに関して\r\n当ショップでは、数量限定ならびに期間限定の形での販売を行っているため、購入申込み後のキャンセルは受け付けておりません。\r\n\r\n■不良品に関して\r\n商品の品質には万全の注意を払っておりますが、下記の場合のみ送料弊社負担でお取替えさせていただきます。\r\n\r\n・配送中の事故等で破損、汚損が発生した場合\r\n・梱包ミスにより注文された商品と異なる場合\r\n・商品添付の契約書に定められた事由による場合\r\n\r\nその際は、商品到着後土日祝祭日を除く2日以内に、##admin_mailaddress##までご連絡ください。\r\n\r\n以上ご理解の上、商品のご到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##\r\n',1),(20,'user_order4','注文確認メール　銀行振込','[##site_name##]ご注文内容確認','??????????\r\n本メールは、当サイトにてご注文いただいたお客様へ【ご注文内容】の確認をいただくための、自動配信メールとなっております。\r\n当商品を購入した覚えがなくこのメールが届いた場合は、お手数ですがこちら ##admin_mailaddress## までご連絡ください。\r\n★★★…………★★★\r\n　ご注文手続き完了\r\n★★………………★★\r\n\r\n##user_name##　様\r\n\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n以下の内容で商品ご注文手続きを行いましたのでご確認ください。\r\n\r\n＝＝【ご注文情報】＝＝\r\n\r\n注文日時：##user_order_created_time##\r\n注文番号：##user_order_no##\r\n支払方法：銀行振込後、商品発送\r\n※価格はすべて税込表示となっております。\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\nタイプ　：##item_type##\r\n商品番号：##item_id##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n……………………………\r\n小　　計　：　##user_order_total_price1##円\r\n(内消費税)：　##user_order_tax##円\r\n送　　料　：　##user_order_postage##円\r\n代引手数料：　##user_order_exchange_fee##円\r\n##if[user_order_expend_point]##\r\nポイント利用分　：　-##user_order_expend_point##円\r\n##/if[user_order_expend_point]##\r\n……………………………\r\n総　合　計：　##user_order_total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n■お支払い方法\r\n１週間以内に指定の銀行口座にお振込みください。お振込み確認後商品発送となります。上記の総合計を下記の口座までお振込みください。\r\n\r\n■■■■■■■■■■■■■■\r\n■　xxx銀行　yyy支店　　　■\r\n■　普通　zzzzzz　　　　　■\r\n■　##site_company_name## ■\r\n■■■■■■■■■■■■■■\r\n\r\n※振込手数料はお客様負担でお願い致します。 \r\nなお、お手数ですが、お振込みが済みましたらこのメールの返信にてご連絡ください。\r\n\r\n\r\n■ポイントについて\r\n買い物カゴ計上されているポイントは、商品決済時には加算されません。\r\n商品の出荷確定後の加算となります。予めご了承ください。\r\n\r\n■商品の発送について\r\n商品のお届けは、ご注文日から10日程となります。\r\n発送が完了いたしましたら、商品発送のお知らせメールが届きます。\r\n商品によっては1ヶ月前後かかる場合もございますが、大幅に遅れる場合は別途お知らせいたします\r\n2週間以上たっても商品が届かない場合は、お問い合わせください。\r\n\r\n■キャンセルに関して\r\n当ショップでは、数量限定ならびに期間限定の形での販売を行っているため、購入申込み後のキャンセルは受け付けておりません。\r\n\r\n■不良品に関して\r\n商品の品質には万全の注意を払っておりますが、下記の場合のみ送料弊社負担でお取替えさせていただきます。\r\n\r\n・配送中の事故等で破損、汚損が発生した場合\r\n・梱包ミスにより注文された商品と異なる場合\r\n・商品添付の契約書に定められた事由による場合\r\n\r\nその際は、商品到着後土日祝祭日を除く2日以内に、##admin_mailaddress##までご連絡ください。\r\n\r\n以上ご理解の上、商品のご到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##site_url##\r\n[運営会社]\r\n##site_company_name##\r\n',1),(21,'stock_alert','商品完売メール','[##site_name##　完売アラート]「##$item_name##」が完売しました。','[商品情報]\r\n商品ID：##item_id##\r\n商品識別ID：##item_distinction_id##\r\n商品名：##item_name##\r\nタイプ：##item_type##\r\n販売総数：##item_sum##\r\n終了日時：##now_date##\r\n\r\n\r\n',1),(22,'user_regist_finish','会員登録完了','[##site_name##]会員登録完了','この度は[##site_name##]に登録して頂き、ありがとうございました。 \r\n下記URLよりログインしてお楽しみください。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##',1),(23,'user_community_join_ok','コミュニティ参加許可','[##site_name##]コミュニティ参加承認','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\nコミュニティ[##community_title##]に参加申請が承認されました。\r\n以下のURLよりアクセスして確認して下さい。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##',1),(24,'user_community_join_ng','コミュニティ参加拒否','[##site_name##]コミュニティ参加拒否','##to_user_nickname##さん、こんにちは。\r\n##site_name##からのお知らせです。\r\n\r\nコミュニティ[##community_title##]に参加申請が拒否されました。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##',1),(25,'item_sent1','商品発送(1:直接出荷)','[##site_name##]商品発送のお知らせ','##user_name##　様\r\n\r\nこのたびは、「##site_name##」をご利用いただきましてありがとうございました。\r\n本日、ご注文いただきました商品を発送いたしました。\r\n\r\n##if[sagawa_code_list]##\r\n[佐川急便の荷物お問い合わせシステムのご案内]\r\n商品の配送状況を下記ページよりご確認することができます。\r\nhttp://k2k.sagawa-exp.co.jp/ezservice1.hdml\r\n##foreach[sagawa_code_list]##\r\nお問い合わせ送り状NO：##sagawa_code##\r\n##/foreach[sagawa_code_list]##\r\n##/if[sagawa_code_list]##\r\n\r\n＝＝【出荷明細】＝＝\r\n\r\n出荷日：##sent_date##\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##item_name##\r\n##if[one_type_only_flag]##\r\nタイプ　：##item_type##\r\n##/if[one_type_only_flag]##\r\n\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n…………………………\r\n小　　計　：##total_price1##円\r\n送　　料　：##postage##円\r\n代引手数料：##exchange_fee##円\r\n内　消費税：##tax##円\r\nポイント利用　：-##expend_point##円\r\n…………………………\r\n総　合　計：　##total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n商品の到着を楽しみにお待ちください。\r\n☆商品は（##supplier_name##）より直送されますので、宜しくお願いいたします☆\r\nまたのご利用、心よりお待ちしております。\r\n\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##',1),(26,'item_sent2','商品発送のお知らせ(2:納品後出荷)','[##site_name##]商品発送のお知らせ','##user_name##　様\r\n\r\nこのたびは、「##mall_name##」をご利用いただきましてありがとうございました。\r\n本日、ご注文いただきました商品を発送いたしました。\r\n\r\n[佐川急便の荷物お問い合わせシステムのご案内]\r\n商品の配送状況を下記ページよりご確認することができます。\r\nhttp://k2k.sagawa-exp.co.jp/ezservice1.hdml\r\n##foreach[sagawa_code_list]##\r\nお問い合わせ送り状NO：##sagawa_code##\r\n##/foreach[sagawa_code_list]##\r\n\r\n＝＝【出荷明細】＝＝\r\n\r\n出荷日：##sent_date##\r\n\r\n##foreach[cart_list]##\r\n商 品 名：##tem_name##\r\n##if[one_type_only_flag]##\r\nタイプ　：##item_type##\r\n##/if[one_type_only_flag]##\r\n金　　額：##item_price##円　×　##cart_item_num##個＝##subtotal##円\r\n##/foreach[cart_list]##\r\n…………………………\r\n小　　計　：##total_price1##円\r\n送　　料　：##postage##円\r\n代引手数料：##exchange_fee##円\r\n内　消費税：##tax##円\r\nポイント利用　：-##expend_point##円\r\n…………………………\r\n総　合　計：　##total_price2##円\r\n\r\n＝＝＝＝＝＝＝＝＝＝\r\n商品の到着を楽しみにお待ちください。\r\n\r\n今後とも『##site_name##』をよろしくお願いいたします。\r\n\r\n??????????\r\n「##site_name##」の商品と販売に関するご質問はこちら\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00（土日、祝日を除く）\r\nURL： ##user_url##\r\n[運営会社]\r\n##site_company_name##',1),(28,'user_movie_success','','[##site_name##]動画投稿完了','[##site_name##]をご利用頂き、ありがとうございます。 \r\n動画の投稿が完了しました。\r\n会員の方は下記URLよりログインして下さい。\r\n\r\n◆##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1),(29,'user_movie_error','','[##site_name##]動画投稿エラー','この度は[##site_name##]をご利用頂き、ありがとうございます。 \r\n大変お手数ですが、アップロードされた動画がエラーのためご利用になれません。\r\n##error##\r\n\r\nこちらのメールアドレス宛に再度動画を添付してお送り下さい。\r\n##image_mailaddress##\r\n\r\n----------------------\r\n(c)##site_name##\r\nサポート：##support_mailaddress##\r\n',1);


--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL auto_increment COMMENT '広告ID',
  `ad_name` text NOT NULL COMMENT '広告名',
  `ad_desc` text NOT NULL COMMENT '広告説明',
  `ad_url_d` text NOT NULL COMMENT 'DOCOMO広告URL',
  `ad_url_a` text NOT NULL COMMENT 'AU広告URL',
  `ad_url_s` text NOT NULL COMMENT 'SOFTBANK広告URL',
  `ad_code_id` int(11) NOT NULL COMMENT '広告コードID',
  `ad_image` varchar(255) NOT NULL COMMENT '広告画像',
  `ad_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '広告タイプ（1:ワンクリック、2:登録、3:購買）',
  `ad_point_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '広告ポイントタイプ(1:固定,2:料率)',
  `ad_point` int(11) NOT NULL default '0' COMMENT '広告ポイント',
  `ad_item_point` int(11) NOT NULL default '0' COMMENT '商品元ポイント',
  `ad_point_percent` int(11) NOT NULL default '0' COMMENT '広告ポイントパーセンテージ',
  `ad_item_point_percent` int(11) NOT NULL default '0' COMMENT '商品元ポイントパーセント',
  `ad_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '広告ステータス(0:無効,1:有効)',
  `ad_display_type` tinyint(1) unsigned NOT NULL default '1' COMMENT '広告表示タイプ(1:WEB,2:MAIL)',
  `ad_category_id` int(11) NOT NULL default '0' COMMENT '広告カテゴリID',
  `ad_stock_num` int(11) NOT NULL default '0' COMMENT '広告配信数',
  `ad_stock_status` tinyint(1) NOT NULL default '0' COMMENT '広告配信数ステータス(0:無効,1:有効)',
  `ad_memo` text NOT NULL COMMENT '広告備考',
  `ad_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `ad_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `ad_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `ad_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '広告配信開始日時',
  `ad_start_status` tinyint(1) unsigned NOT NULL COMMENT '広告配信開始ステータス(0:無効,1:有効)',
  `ad_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '広告配信終了日時',
  `ad_end_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '広告配信開始ステータス(0:無効,1:有効)',
  PRIMARY KEY  (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告テーブル';

--
-- Table structure for table `ad_category`
--

DROP TABLE IF EXISTS `ad_category`;
CREATE TABLE `ad_category` (
  `ad_category_id` int(11) NOT NULL auto_increment COMMENT '広告カテゴリID',
  `ad_category_name` text NOT NULL COMMENT '広告カテゴリ名',
  `ad_category_desc` text NOT NULL COMMENT '広告カテゴリ説明',
  `ad_category_status` tinyint(1) unsigned NOT NULL COMMENT '広告カテゴリステータス(0:無効,1:有効)',
  `ad_category_priority_id` int(11) NOT NULL COMMENT 'カテゴリ優先度ID',
  PRIMARY KEY  (`ad_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告カテゴリテーブル';

--
-- Table structure for table `ad_code`
--

DROP TABLE IF EXISTS `ad_code`;
CREATE TABLE `ad_code` (
  `ad_code_id` int(11) NOT NULL auto_increment COMMENT '広告コードID',
  `ad_code_name` text NOT NULL COMMENT '広告コード名',
  `ad_code_param` varchar(255) NOT NULL COMMENT '広告コードパラメタ',
  `ad_code_send_param` varchar(255) NOT NULL COMMENT '広告リダイレクト時に付与するパラメタ',
  `ad_code_uaid_param` varchar(255) NOT NULL COMMENT '広告コードユーザ識別パラメタ',
  `ad_code_status_param` varchar(255) NOT NULL COMMENT '広告コードステータス識別パラメタ',
  `ad_code_status_param_receive` varchar(255) NOT NULL COMMENT '広告コードステータス受信パラメタ',
  `ad_code_price_param` varchar(255) NOT NULL COMMENT '広告成果受信時取得価格部分パラメタ',
  `ad_code_status` tinyint(1) unsigned NOT NULL COMMENT '広告コードステータス(0:無効,1:有効)',
  PRIMARY KEY  (`ad_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告コードテーブル';

--
-- Table structure for table `ad_menu`
--

DROP TABLE IF EXISTS `ad_menu`;
CREATE TABLE `ad_menu` (
  `ad_menu_id` int(11) NOT NULL auto_increment COMMENT '広告メニューID',
  `index` text NOT NULL COMMENT 'トップページ',
  `home` text NOT NULL COMMENT 'マイページ',
  `blog_article_add_done` text NOT NULL COMMENT '日記投稿完了画面',
  `blog_article_edit_done` text NOT NULL COMMENT '日記編集完了画面',
  `blog_article_delete_done` text NOT NULL COMMENT '日記削除完了画面',
  `blog_comment_add_done` text NOT NULL COMMENT '日記コメント投稿完了画面',
  `blog_comment_edit_done` text NOT NULL COMMENT '日記コメント編集完了画面',
  `blog_comment_delete_done` text NOT NULL COMMENT '日記コメント削除完了画面',
  `community_add_done` text NOT NULL COMMENT 'コミュニティ作成完了画面',
  `community_edit_done` text NOT NULL COMMENT 'コミュニティ編集完了画面',
  `community_delete_done` text NOT NULL COMMENT 'コミュニティ削除完了画面 ',
  `community_article_add_done` text NOT NULL COMMENT 'コミュニティトピック投稿完了画面',
  `community_article_edit_done` text NOT NULL COMMENT 'コミュニティトピック編集完了画面 ',
  `community_article_delete_done` text NOT NULL COMMENT 'コミュニティトピック削除完了画面 ',
  `community_comment_add_done` text NOT NULL COMMENT 'コミュニティコメント投稿完了画面',
  `community_comment_edit_done` text NOT NULL COMMENT 'コミュニティコメント編集完了画面',
  `community_comment_delete_done` text NOT NULL COMMENT 'コミュニティコメント削除完了画面',
  `bbs_add_done` text NOT NULL COMMENT '伝言板作成完了画面',
  `bbs_edit_done` text NOT NULL COMMENT '伝言板編集完了画面',
  `bbs_delete_done` text NOT NULL COMMENT '伝言板削除完了画面',
  `message_send_done` text NOT NULL COMMENT 'ミニメール送信完了画面 ',
  `comment_add_done` text NOT NULL COMMENT 'コメント投稿完了画面',
  `comment_edit_done` text NOT NULL COMMENT 'コメント編集完了画面',
  `comment_delete_done` text NOT NULL COMMENT 'コメント削除完了画面',
  PRIMARY KEY  (`ad_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告メニューテーブル';




--
-- Table structure for table `analytics`
--

DROP TABLE IF EXISTS `analytics`;
CREATE TABLE `analytics` (
  `analytics_id` int(11) NOT NULL auto_increment COMMENT '統計解析ID',
  `analytics_date` date NOT NULL default '0000-00-00' COMMENT '統計解析日',
  `pre_regist_num` int(11) NOT NULL COMMENT '仮登録者数',
  `regist_num` int(11) NOT NULL COMMENT '本登録者数',
  `friend_num` int(11) NOT NULL COMMENT '友達招待数',
  `resign_num` int(11) NOT NULL COMMENT '退会者数',
  `natural_num` int(11) NOT NULL COMMENT '自然流入者数',
  PRIMARY KEY  (`analytics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='統計解析テーブル';

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE `avatar` (
  `avatar_id` int(11) NOT NULL auto_increment COMMENT 'アバターID',
  `avatar_name` text NOT NULL COMMENT 'アバター名',
  `avatar_desc` text NOT NULL COMMENT 'アバター説明',
  `avatar_image1` varchar(255) default NULL COMMENT 'アバター画像1',
  `avatar_image1_desc` varchar(255) default NULL COMMENT 'アバター画像1説明',
  `avatar_image1_x` int(11) NOT NULL default '0' COMMENT 'アバター画像x座標',
  `avatar_image1_y` int(11) NOT NULL default '0' COMMENT 'アバター画像y座標',
  `avatar_image1_z` int(11) NOT NULL default '0' COMMENT 'アバター画像z座標',
  `avatar_image2` varchar(255) default NULL COMMENT 'アバター画像2',
  `avatar_image2_desc` varchar(255) default NULL COMMENT 'アバター画像2説明',
  `avatar_image2_x` int(11) NOT NULL default '0' COMMENT 'アバター画像2x座標',
  `avatar_image2_y` int(11) NOT NULL default '0' COMMENT 'アバター画像2y座標',
  `avatar_image2_z` int(11) NOT NULL default '0' COMMENT 'アバター画像2z座標',
  `avatar_point` int(11) NOT NULL default '0' COMMENT 'アバター消費ポイント',
  `avatar_status` int(11) NOT NULL default '0' COMMENT 'アバターステータス（1:有効, 0:無効）',
  `avatar_sex_type` int(11) NOT NULL default '0' COMMENT 'アバター性別　（0:男女, 1:男のみ, 2:女のみ）',
  `avatar_category_id` int(11) NOT NULL default '0' COMMENT 'アバターカテゴリーID',
  `preset_avatar` tinyint(1) NOT NULL default '0' COMMENT 'プリセットアバター（あらかじめユーザアバターとして登録される）(0:無効,1:有効)',
  `default_avatar` tinyint(1) NOT NULL default '0' COMMENT 'デフォルトアバター (0:無効,1:有効)',
  `first_avatar` tinyint(1) NOT NULL default '0' COMMENT '初期選択アバター(会員登録後に選択するアバター)(0:無効,1:有効)',
  `avatar_stock_num` int(11) NOT NULL default '0' COMMENT 'アバター配信終了数',
  `avatar_stock_status` int(11) NOT NULL default '0' COMMENT 'アバター配信終了数設定　（1:有効,0:無効）',
  `avater_priority_id` int(11) NOT NULL default '0' COMMENT 'アバター優先度ID',
  `avatar_stand_id` int(11) NOT NULL default '0' COMMENT 'アバター台座ID',
  `avatar_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `avatar_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `avatar_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `avatar_start_time` datetime default '0000-00-00 00:00:00' COMMENT 'アバター配信開始日時',
  `avatar_start_status` tinyint(1) NOT NULL default '0' COMMENT 'アバター配信開始ステータス(0:無効,1:有効)',
  `avatar_end_time` datetime default '0000-00-00 00:00:00' COMMENT 'アバター配信終了日時',
  `avatar_end_status` tinyint(1) NOT NULL default '0' COMMENT 'アバター配信終了ステータス(0:無効,1:有効)',
  PRIMARY KEY  (`avatar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=808 DEFAULT CHARSET=ujis COMMENT='アバターテーブル';

--
-- Table structure for table `avatar_category`
--

DROP TABLE IF EXISTS `avatar_category`;
CREATE TABLE `avatar_category` (
  `avatar_category_id` int(11) NOT NULL auto_increment COMMENT 'アバターカテゴリID',
  `avatar_system_category_id` int(11) NOT NULL default '0' COMMENT 'アバタカテゴリシステムID',
  `avatar_category_name` text NOT NULL COMMENT 'アバタカテゴリ名',
  `avatar_category_desc` text NOT NULL COMMENT 'アバタカテゴリ説明',
  `avatar_category_status` int(11) NOT NULL default '0' COMMENT 'アバタカテゴリステータス(0:無効,1:有効)',
  `avatar_category_priority_id` int(11) NOT NULL default '0' COMMENT 'アバタカテゴリ優先度ID(ゲストユーザ表示時は「-1」)',
  `avatar_stand_id` int(11) NOT NULL default '0' COMMENT 'アバター台座ID',
  `avatar_category_file1` varchar(255) default NULL COMMENT 'アバターカテゴリファイル1',
  PRIMARY KEY  (`avatar_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アバターカテゴリテーブル';

--
-- Table structure for table `avatar_stand`
--

DROP TABLE IF EXISTS `avatar_stand`;
CREATE TABLE `avatar_stand` (
  `avatar_stand_id` int(11) NOT NULL auto_increment COMMENT 'アバター台座ID',
  `avatar_stand_name` text NOT NULL COMMENT 'アバター台座名',
  `avatar_stand_image` text NOT NULL COMMENT 'アバター台座画像',
  `avatar_stand_base_x` int(11) NOT NULL COMMENT 'アバター台座切り取り開始X座標',
  `avatar_stand_base_y` int(11) NOT NULL COMMENT 'アバター台座切り取り開始Y座標',
  `avatar_stand_base_w` int(11) NOT NULL COMMENT 'アバター台座切り取り幅',
  `avatar_stand_base_h` int(11) NOT NULL COMMENT 'アバター台座切り取り高さ',
  `avatar_stand_w` int(11) NOT NULL COMMENT 'アバター台表示幅',
  `avatar_stand_h` int(11) NOT NULL COMMENT 'アバター台座表示高さ',
  `avatar_stand_status` tinyint(1) NOT NULL COMMENT 'アバター台座ステータス(0:無効,1:有効)',
  PRIMARY KEY  (`avatar_stand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アバター台座テーブル';

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL auto_increment COMMENT 'バナーID',
  `banner_body` text COMMENT 'リンク本文',
  `banner_url` text COMMENT 'リンク先URL',
  `banner_client` varchar(255) NOT NULL COMMENT 'クライアント名',
  `banner_image` varchar(255) default NULL COMMENT 'リンク画像',
  `banner_type` varchar(255) NOT NULL COMMENT 'バナータイプ（txt,jpg,gif,ping）',
  `banner_status` tinyint(1) NOT NULL COMMENT 'バナーステータス(0:無効,1:有効)',
  `banner_created_time` datetime NOT NULL COMMENT '作成日時',
  `banner_updated_time` datetime NOT NULL COMMENT '更新日時',
  `banner_deleted_time` datetime NOT NULL COMMENT '削除日時',
  PRIMARY KEY  (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='バナーテーブル';

--
-- Table structure for table `bbs`
--

DROP TABLE IF EXISTS `bbs`;
CREATE TABLE `bbs` (
  `bbs_id` int(11) unsigned NOT NULL auto_increment COMMENT '伝言ID',
  `from_user_id` int(11) unsigned NOT NULL COMMENT '伝言元ユーザID',
  `to_user_id` int(11) unsigned NOT NULL COMMENT '伝言先ユーザID',
  `bbs_body` text NOT NULL COMMENT '伝言メッセージ',
  `bbs_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '伝言板ステータス(0:削除,1:表示)',
  `bbs_checked` tinyint(1) unsigned NOT NULL COMMENT '伝言監視ステータス(0:未,1:済)',
  `bbs_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `bbs_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `bbs_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `bbs_hash` varchar(32) default NULL COMMENT '伝言識別子',
  `image_id` int(11) unsigned default '0' COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  `bbs_notice` int(11) NOT NULL default '0' COMMENT '新規投稿フラグ 0:既読　1:新規投稿',
  PRIMARY KEY  (`bbs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='伝言板テーブル';

--
-- Table structure for table `black_list`
--

DROP TABLE IF EXISTS `black_list`;
CREATE TABLE `black_list` (
  `black_list_id` int(11) unsigned NOT NULL auto_increment COMMENT 'ブラックリストID',
  `black_list_user_id` int(11) unsigned NOT NULL COMMENT 'ブラックリスト登録処理を行ったユーザID',
  `black_list_deny_user_id` int(11) unsigned NOT NULL COMMENT 'ブラックリストに登録されたユーザID',
  `black_list_status` tinyint(1) unsigned NOT NULL default '1' COMMENT 'ブラックリストステータス （1:表示,0:非表示）',
  `black_list_checked` tinyint(1) unsigned NOT NULL COMMENT 'ブラックリスト監視ステータス(0:未,1:済)',
  `black_list_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `black_list_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `black_list_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`black_list_id`),
  KEY `user_id` (`black_list_user_id`,`black_list_deny_user_id`,`black_list_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ブラックリストテーブル';

--
-- Table structure for table `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `blog_article_id` int(11) NOT NULL auto_increment COMMENT '日記ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `blog_article_status` tinyint(1) unsigned default '0' COMMENT '日記ステータス （1:表示,0:非表示）',
  `blog_article_public` tinyint(1) NOT NULL default '0' COMMENT '日記公開ステータス(0:非公開,1:公開,2:友達まで公開)',
  `blog_article_checked` tinyint(1) unsigned default '0' COMMENT '日記監視  （1:済,0:未）',
  `blog_article_title` text NOT NULL COMMENT '日記タイトル',
  `blog_article_body` text NOT NULL COMMENT '日記本文',
  `blog_article_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `blog_article_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `blog_article_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `blog_article_comment_num` int(11) NOT NULL default '0' COMMENT '日記コメント数',
  `blog_article_comment_time` datetime default '0000-00-00 00:00:00' COMMENT '最新コメント日時',
  `blog_article_hash` varchar(32) default NULL COMMENT '日記識別子',
  `image_id` int(11) default '0' COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  `blog_article_notice` int(11) default '0' COMMENT 'ブログコメント未読フラグ 0:既読　1:未読',
  PRIMARY KEY  (`blog_article_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`blog_article_status`,`blog_article_created_time`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='日記テーブル';

--
-- Table structure for table `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `blog_comment_id` int(11) NOT NULL auto_increment COMMENT '日記コメントID',
  `blog_article_id` int(11) NOT NULL COMMENT '日記ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `blog_comment_status` tinyint(1) unsigned NOT NULL COMMENT '日記コメントステータス （1:表示,0:非表示）',
  `blog_comment_checked` tinyint(1) unsigned NOT NULL COMMENT '日記コメント監視 （1:済,0:未）',
  `blog_comment_body` text NOT NULL COMMENT '日記コメント本文',
  `blog_comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `blog_comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `blog_comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `blog_comment_hash` varchar(32) default NULL COMMENT '日記コメント識別子',
  `image_id` int(11) default '0' COMMENT '画像ID',
  `blog_comment_notice` int(11) NOT NULL default '0' COMMENT '新規投稿フラグ 0:既読　1:新規投稿',
  PRIMARY KEY  (`blog_comment_id`),
  KEY `blog_article_id` (`blog_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='日記コメントテーブル';

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL auto_increment COMMENT 'カートID',
  `cart_no` varchar(255) default NULL COMMENT '日付 + cart_id（受注番号）',
  `cart_hash` varchar(255) NOT NULL COMMENT 'カートハッシュ',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_uid` varchar(32) default NULL COMMENT '携帯端末識別子',
  `item_id` int(11) NOT NULL default '0' COMMENT '商品ID',
  `stock_id` int(11) NOT NULL default '0' COMMENT '在庫ID',
  `cart_status` int(11) NOT NULL default '0' COMMENT '0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル',
  `cart_item_num` int(11) NOT NULL default '0' COMMENT '商品個数',
  `cart_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `cart_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `cart_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='カート（買い物かご）用テーブル';

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL auto_increment COMMENT 'CMSID',
  `cms_type` int(11) NOT NULL COMMENT 'CMSタイプ',
  `cms_html1` text NOT NULL COMMENT '上部HTML',
  `cms_html2` text NOT NULL COMMENT '下部HTML',
  `cms_html3` text NOT NULL COMMENT '中部HTML',
  `low_term_d` text COMMENT 'DOCOMO下位端末',
  `low_term_a` text COMMENT 'AU下位端末',
  `low_term_s` text COMMENT 'SOFTBANK下位端末',
  `cms_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  PRIMARY KEY  (`cms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='CMSテーブル（廃止予定）';

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL auto_increment COMMENT 'コメントID',
  `comment_type` int(11) NOT NULL COMMENT 'コメントタイプ　2: game',
  `comment_subid` int(11) NOT NULL COMMENT 'コメントカテゴリID',
  `comment_title` text COMMENT 'コメントタイトル',
  `comment_body` text NOT NULL COMMENT 'コメント本文',
  `comment_status` int(11) NOT NULL default '1' COMMENT 'コメントステータス　0: 非表示, 1:表示',
  `comment_checked` tinyint(1) NOT NULL default '0' COMMENT 'コメント未読ステータス　0:未, 1:済',
  `comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  PRIMARY KEY  (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コメントテーブル（ゲーム用）';

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE `community` (
  `community_id` int(11) NOT NULL auto_increment COMMENT 'コミュニティID',
  `community_title` text NOT NULL COMMENT 'コミュニティ名',
  `community_description` text NOT NULL COMMENT 'コミュニティ説明',
  `community_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `community_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `community_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `community_status` tinyint(1) unsigned NOT NULL COMMENT 'コミュニティステータス （0:削除,管理人退会 1:有効）',
  `community_checked` tinyint(1) unsigned NOT NULL COMMENT 'コミュニティ監視（1:済,0:未）',
  `community_member_num` int(11) NOT NULL default '1' COMMENT 'コミュニティメンバー数',
  `community_category_id` int(11) NOT NULL default '1' COMMENT 'コミュニティカテゴリID',
  `community_join_condition` int(11) NOT NULL default '1' COMMENT '参加条件と公開レベル（1:誰でも参加できる（公開）,2:管理人の承認が必要（公開）,3:管理人の承認が必要（非公開））',
  `community_topic_permission` int(11) NOT NULL default '1' COMMENT 'トピック作成の権限（1:参加者が作成できる,2:管理人のみ作成できる）',
  `community_hash` varchar(32) default NULL COMMENT 'コミュニティ識別子',
  `image_id` int(11) unsigned default NULL COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  PRIMARY KEY  (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティテーブル';

--
-- Table structure for table `community_article`
--

DROP TABLE IF EXISTS `community_article`;
CREATE TABLE `community_article` (
  `community_article_id` int(11) NOT NULL auto_increment COMMENT 'コミュニティトピックID',
  `community_id` int(11) NOT NULL COMMENT 'コミュニティID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `community_article_status` tinyint(1) unsigned default '0' COMMENT 'コミュニティトピックステータス （0:削除, 1:有効）',
  `community_article_checked` tinyint(1) unsigned default '0' COMMENT 'コミュニティトピック監視 （1:済,0:未',
  `community_article_title` text NOT NULL COMMENT 'コミュニティトピックタイトル',
  `community_article_body` text NOT NULL COMMENT 'コミュニティトピック本文',
  `community_article_comment_num` int(11) NOT NULL default '0' COMMENT 'コミュニティトピックコメント数',
  `community_article_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `community_article_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `community_article_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `community_article_comment_time` datetime default '0000-00-00 00:00:00' COMMENT 'コミュニティトピック最新コメント作成日時',
  `community_article_hash` varchar(32) default NULL COMMENT 'コミュニティトピック識別子',
  `image_id` int(11) unsigned default '0' COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  PRIMARY KEY  (`community_article_id`),
  KEY `community_id` (`community_id`,`community_article_status`,`community_article_comment_time`),
  KEY `community_article_status` (`community_article_status`),
  KEY `community_article_post_time` (`community_article_created_time`),
  KEY `user_id` (`user_id`),
  KEY `community_article_user` (`community_article_id`,`community_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティトピックテーブル';

--
-- Table structure for table `community_category`
--

DROP TABLE IF EXISTS `community_category`;
CREATE TABLE `community_category` (
  `community_category_id` int(11) NOT NULL auto_increment COMMENT 'コミュニティカテゴリID',
  `community_category_name` text NOT NULL COMMENT 'コミュニティカテゴリ名',
  `community_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT 'コミュニティカテゴリステータス(0:削除、1:有効)',
  `community_category_priority_id` int(11) NOT NULL default '0' COMMENT 'コミュニティカテゴリ優先度',
  PRIMARY KEY  (`community_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティカテゴリテーブル';

--
-- Table structure for table `community_comment`
--

DROP TABLE IF EXISTS `community_comment`;
CREATE TABLE `community_comment` (
  `community_comment_id` int(11) NOT NULL auto_increment COMMENT 'コミュニティコメントID',
  `community_article_id` int(11) NOT NULL COMMENT 'コミュニティトピックID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `community_comment_status` tinyint(1) unsigned NOT NULL COMMENT 'コミュニティコメントステータス （0:削除, 1:有効）',
  `community_comment_checked` tinyint(1) unsigned NOT NULL COMMENT 'コミュニティコメント監視 （1:済,0:未）',
  `community_comment_body` text NOT NULL COMMENT 'コミュニティコメント本文',
  `community_comment_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `community_comment_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `community_comment_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `community_comment_hash` varchar(32) default NULL COMMENT 'コミュニティコメント識別子',
  `image_id` int(11) unsigned default '0' COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  PRIMARY KEY  (`community_comment_id`),
  KEY `community_comment_article_user` (`community_comment_id`,`community_article_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティコメントテーブル';

--
-- Table structure for table `community_member`
--

DROP TABLE IF EXISTS `community_member`;
CREATE TABLE `community_member` (
  `community_member_id` int(10) unsigned NOT NULL auto_increment COMMENT 'コミュニティメンバーID',
  `community_id` int(10) unsigned NOT NULL COMMENT 'コミュニティID',
  `user_id` int(10) unsigned NOT NULL COMMENT 'ユーザID',
  `community_member_status` tinyint(1) unsigned NOT NULL default '1' COMMENT 'コミュニティメンバーステータス　0:メンバーから削除, 1:メンバー, 2:管理人, 3:管理人承認待ち,',
  `community_status` tinyint(1) unsigned default '1' COMMENT 'コミュニティステータス　0:コミュニティを削除, 1:活動中',
  PRIMARY KEY  (`community_member_id`),
  KEY `community_id` (`community_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='コミュニティメンバーテーブル';

--
-- Table structure for table `config_user_prof`
--

DROP TABLE IF EXISTS `config_user_prof`;
CREATE TABLE `config_user_prof` (
  `config_user_prof_id` int(11) NOT NULL auto_increment COMMENT 'ユーザプロフィール項目ID',
  `config_user_prof_name` varchar(255) NOT NULL COMMENT 'ユーザプロフィール項目名',
  `config_user_prof_type` int(11) NOT NULL COMMENT 'フォーム種別',
  `config_user_prof_order` int(11) NOT NULL COMMENT 'ユーザプロフィール項目表示順',
  PRIMARY KEY  (`config_user_prof_id`),
  KEY `config_user_prof_type` (`config_user_prof_type`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザプロフィールテーブル';

--
-- Table structure for table `config_user_prof_option`
--

DROP TABLE IF EXISTS `config_user_prof_option`;
CREATE TABLE `config_user_prof_option` (
  `config_user_prof_option_id` int(11) NOT NULL auto_increment COMMENT 'ユーザプロフィール項目選択項目ID',
  `config_user_prof_id` int(11) NOT NULL COMMENT 'ユーザープロフィール項目ID',
  `config_user_prof_option_name` text NOT NULL COMMENT 'ユーザプロフィール項目選択項目名',
  `config_user_prof_option_order` int(11) NOT NULL COMMENT 'ユーザプロフィール項目選択項目表示順',
  PRIMARY KEY  (`config_user_prof_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザプロフィール項目テーブル';


--
-- Table structure for table `decomail`
--

DROP TABLE IF EXISTS `decomail`;
CREATE TABLE `decomail` (
  `decomail_id` int(11) NOT NULL auto_increment COMMENT 'デコメールID',
  `decomail_name` text NOT NULL COMMENT 'デコメール名',
  `decomail_desc` text NOT NULL COMMENT 'デコメール説明',
  `decomail_file1` varchar(255) default NULL COMMENT 'デコメールファイル1',
  `decomail_file2` varchar(255) default NULL COMMENT 'デコメールファイル2',
  `decomail_file_d` varchar(255) default NULL COMMENT 'DOCOMO用デコメールファイル',
  `decomail_file_a` varchar(255) default NULL COMMENT 'AU用デコメールファイル',
  `decomail_file_s` varchar(255) default NULL COMMENT 'SOFTBANK用デコメールファイル',
  `decomail_point` int(11) NOT NULL default '0' COMMENT 'デコメール消費ポイント',
  `decomail_status` tinyint(1) NOT NULL default '0' COMMENT 'デコメールステータス （1：有効, 0：無効）',
  `decomail_category_id` int(11) NOT NULL default '0' COMMENT 'デコメールカテゴリID',
  `decomail_stock_num` int(11) NOT NULL default '0' COMMENT 'デコメール配信終了数',
  `decomail_stock_status` tinyint(1) NOT NULL default '0' COMMENT 'デコメール配信終了数ステータス （1：有効, 0：無効）',
  `decomail_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `decomail_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `decomail_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `decomail_start_time` datetime default '0000-00-00 00:00:00' COMMENT 'デコメール配信開始日時',
  `decomail_start_status` tinyint(1) NOT NULL default '0' COMMENT 'デコメール配信開始ステータス(0:無効,1:有効)',
  `decomail_end_time` datetime default '0000-00-00 00:00:00' COMMENT 'デコメール配信終了日時',
  `decomail_end_status` tinyint(1) NOT NULL default '0' COMMENT 'デコメール配信終了日時ステータス （1：有効, 0：無効）',
  PRIMARY KEY  (`decomail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='デコメールテーブル';

--
-- Table structure for table `decomail_category`
--

DROP TABLE IF EXISTS `decomail_category`;
CREATE TABLE `decomail_category` (
  `decomail_category_id` int(11) NOT NULL auto_increment COMMENT 'デコメールカテゴリID',
  `decomail_category_name` text NOT NULL COMMENT 'デコメールカテゴリ名',
  `decomail_category_desc` text NOT NULL COMMENT 'デコメールカテゴリ説明',
  `decomail_category_status` int(11) NOT NULL default '0' COMMENT 'デコメールカテゴリステータス （1：有効,0：無効）',
  `decomail_category_priority_id` int(11) NOT NULL default '0' COMMENT 'デコメールカテゴリ優先度ID',
  `decomail_category_file1` varchar(255) default NULL COMMENT 'デコメールカテゴリファイル1',
  PRIMARY KEY  (`decomail_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='デコメールカテゴリテーブル';

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
CREATE TABLE `exchange` (
  `exchange_id` int(11) unsigned NOT NULL auto_increment COMMENT '代引手数料ID',
  `exchange_name` varchar(255) NOT NULL COMMENT '代引手数料設定名',
  `exchange_type` tinyint(1) unsigned NOT NULL COMMENT '1:一律,2:金額範囲,3:合計金額,4:合計個数',
  `exchange_same_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:一律代引手数料設定',
  `exchange_same_price` int(11) unsigned default NULL COMMENT '一律代引手数料料金',
  `exchange_total_price_set` int(11) unsigned default NULL COMMENT '合計金額設定値',
  `exchange_total_price_set_under` int(11) default NULL COMMENT '合計金額未満時の料金設定',
  `exchange_total_price_value` int(11) unsigned default '0' COMMENT '合計金額設定値以上時の料金設定',
  `exchange_total_piece_set` int(11) unsigned default NULL COMMENT '合計個数設定値',
  `exchange_total_piece_set_under` int(11) default NULL COMMENT '合計個数未満時の料金設定',
  `exchange_total_piece_value` int(11) unsigned default '0' COMMENT '合計個数設定値以上時の料金設定',
  `exchange_created_time` datetime NOT NULL COMMENT '作成日時',
  `exchange_updated_time` datetime default NULL COMMENT '更新日時',
  `exchange_deleted_time` datetime default NULL COMMENT '削除日時',
  `exchange_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`exchange_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='代引手数料設定用テーブル';

--
-- Table structure for table `exchange_range`
--

DROP TABLE IF EXISTS `exchange_range`;
CREATE TABLE `exchange_range` (
  `exchange_range_id` int(11) unsigned NOT NULL auto_increment COMMENT '代引手数料金額範囲設定ID',
  `exchange_id` int(11) unsigned NOT NULL COMMENT '代引手数料ID',
  `exchange_range_start` int(11) unsigned default NULL COMMENT '範囲開始金額',
  `exchange_range_end` int(11) unsigned default NULL COMMENT '範囲終了金額',
  `exchange_range_price` int(11) unsigned default NULL COMMENT '範囲代引手数料',
  `exchange_range_created_time` datetime NOT NULL COMMENT '作成日時',
  `exchange_range_updated_time` datetime default NULL COMMENT '更新日時',
  `exchange_range_deleted_time` datetime default NULL COMMENT '削除日時',
  `exchange_range_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`exchange_range_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='代引手数料金額範囲設定用テーブル';

--
-- Table structure for table `footprint`
--

DROP TABLE IF EXISTS `footprint`;
CREATE TABLE `footprint` (
  `footprint_id` int(11) NOT NULL auto_increment COMMENT 'あしあとID',
  `from_user_id` int(11) NOT NULL COMMENT 'あしあと元ユーザID',
  `to_user_id` int(11) NOT NULL COMMENT 'あしあと先ユーザID',
  `footprint_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  PRIMARY KEY  (`footprint_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='あしあとテーブル';

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL auto_increment COMMENT '友達ID',
  `from_user_id` int(11) NOT NULL COMMENT '申請元ユーザID',
  `to_user_id` int(11) NOT NULL COMMENT '申請先ユーザID',
  `friend_status` int(11) NOT NULL COMMENT '友達ステータス （1:申請中, 2:友達中, 3:友達ではない）',
  `friend_message` text COMMENT '友達メッセージ本文',
  `friend_introduction` text COMMENT '友達紹介文',
  `friend_checked` tinyint(4) default '0' COMMENT '紹介文監視 （1:済,0:未）',
  PRIMARY KEY  (`friend_id`),
  UNIQUE KEY `unique_key_friend` (`from_user_id`,`to_user_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='友達テーブル';

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `game_id` int(11) NOT NULL auto_increment COMMENT 'ゲームID',
  `game_code` text NOT NULL COMMENT 'ゲームコード',
  `game_name` text NOT NULL COMMENT 'ゲーム名',
  `game_desc` text NOT NULL COMMENT 'ゲーム説明',
  `game_explain` text NOT NULL COMMENT 'ゲーム操作説明',
  `game_file1` varchar(255) default NULL COMMENT 'ゲームファイル1（一覧表示用ファイル）',
  `game_file2` varchar(255) default NULL COMMENT 'ゲームファイル2（詳細表示用ファイル）',
  `game_file3` varchar(255) default NULL COMMENT 'ゲームファイル3（プレイ用ファイル）',
  `game_point` int(11) NOT NULL default '0' COMMENT 'ゲーム消費ポイント',
  `game_status` tinyint(1) NOT NULL default '0' COMMENT 'ゲームステータス （1：有効, 0：無効）',
  `game_category_id` int(11) NOT NULL default '0' COMMENT 'ゲームカテゴリID',
  `game_stock_num` int(11) NOT NULL default '0' COMMENT 'ゲーム配信終了数',
  `game_stock_status` tinyint(1) NOT NULL default '0' COMMENT 'ゲーム配信終了数ステータス （1：有効, 0：無効）',
  `game_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `game_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `game_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `game_start_time` datetime default '0000-00-00 00:00:00' COMMENT 'ゲーム配信開始日時',
  `game_start_status` tinyint(1) NOT NULL default '0' COMMENT 'ゲーム配信開始ステータス(0:無効,1:有効)',
  `game_end_time` datetime default '0000-00-00 00:00:00' COMMENT 'ゲーム配信終了日時',
  `game_end_status` tinyint(1) NOT NULL default '0' COMMENT 'ゲーム配信終了日時ステータス （1：有効, 0：無効）',
  `game_ranking` int(11) NOT NULL default '0' COMMENT '0:無効 1:有効',
  PRIMARY KEY  (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ゲームテーブル';

--
-- Table structure for table `game_category`
--

DROP TABLE IF EXISTS `game_category`;
CREATE TABLE `game_category` (
  `game_category_id` int(11) NOT NULL auto_increment COMMENT 'ゲームカテゴリID',
  `game_category_name` text NOT NULL COMMENT 'ゲームカテゴリ名',
  `game_category_desc` text NOT NULL COMMENT 'ゲームカテゴリ説明',
  `game_category_status` int(11) NOT NULL default '0' COMMENT 'ゲームカテゴリステータス （1：有効, 0：無効）',
  `game_category_priority_id` int(11) NOT NULL default '0' COMMENT 'ゲームカテゴリ優先度ID',
  `game_category_file1` varchar(255) default NULL COMMENT 'ゲームカテゴリファイル1',
  PRIMARY KEY  (`game_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ゲームカテゴリテーブル';

--
-- Table structure for table `html_template`
--

DROP TABLE IF EXISTS `html_template`;
CREATE TABLE `html_template` (
  `html_template_id` int(11) NOT NULL auto_increment COMMENT 'HTMLテンプレートID',
  `html_template_code` varchar(255) NOT NULL COMMENT 'HTMLテンプレートコード、基底ディレクトリからの.tpl抜きのファイルパス',
  `html_template_body` text NOT NULL COMMENT 'HTMLテンプレート本体',
  `html_template_status` tinyint(1) NOT NULL default '0' COMMENT 'ステータス(0:無効,1:有効)',
  `html_template_edit` tinyint(1) NOT NULL default '0' COMMENT '編集ステータス(0:編集中でない,1:編集中)',
  `html_template_edit_start_time` datetime NOT NULL COMMENT '更新開始日時',
  `html_template_edit_end_time` datetime NOT NULL COMMENT '更新終了日時',
  PRIMARY KEY  (`html_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=ujis COMMENT='HTMLテンプレートテーブル';

--
-- Table structure for table `html_template_log`
--

DROP TABLE IF EXISTS `html_template_log`;
CREATE TABLE `html_template_log` (
  `html_template_log_id` int(11) NOT NULL auto_increment COMMENT 'HTMLテンプレートログID',
  `html_template_id` int(11) NOT NULL COMMENT 'HTMLテンプレートID',
  `html_template_code` varchar(255) NOT NULL COMMENT 'HTMLテンプレートコード',
  `html_template_body` text NOT NULL COMMENT 'HTMLテンプレート本文',
  `html_template_updated_time` datetime NOT NULL COMMENT '更新日時',
  PRIMARY KEY  (`html_template_log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=ujis COMMENT='HTMLテンプレートログテーブル';

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) unsigned NOT NULL auto_increment COMMENT '画像ID',
  `user_id` int(11) unsigned NOT NULL COMMENT 'ユーザID',
  `image_o` varchar(255) default NULL COMMENT 'オリジナル画像パス',
  `image_a` varchar(255) default NULL COMMENT '全画面画像パス',
  `image_s` varchar(255) default NULL COMMENT '小画像画像パス',
  `image_t` varchar(255) default NULL COMMENT 'サムネイル画像パス',
  `image_i` varchar(255) default NULL COMMENT 'アイコン画像パス',
  `image_mime_type` varchar(255) default NULL COMMENT '画像MIMEタイプ',
  `image_size` int(11) unsigned default NULL COMMENT '画像サイズ',
  `image_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `image_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `image_status` tinyint(1) unsigned default '0' COMMENT '画像ステータス （1:有効, 0:削除済み, 2:管理人によって削除済み）',
  `image_checked` tinyint(1) unsigned default '0' COMMENT '画像監視ステータス',
  `type` varchar(32) default NULL COMMENT '画像投稿先種別',
  `id` int(11) default '0' COMMENT '画像投稿先のID値',
  PRIMARY KEY  (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='画像テーブル';

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE `invite` (
  `invite_id` int(11) unsigned NOT NULL auto_increment COMMENT '招待ID',
  `from_user_id` int(11) unsigned NOT NULL COMMENT '招待元ユーザID',
  `to_user_id` int(11) unsigned NOT NULL COMMENT '招待先ユーザID',
  `to_user_mailaddress` varchar(64) NOT NULL COMMENT '招待先ユーザメールアドレス',
  `invite_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '招待ステータス（0:メール済,1:アクセス済,2:登録済）',
  `mail_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '送信日時',
  `access_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '登録日時',
  PRIMARY KEY  (`invite_id`),
  UNIQUE KEY `from_id` (`from_user_id`,`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='招待テーブル';

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL auto_increment COMMENT '商品ID',
  `shop_id` int(11) NOT NULL default '0' COMMENT 'ショップID',
  `item_category_id` text NOT NULL COMMENT 'カテゴリID',
  `item_distinction_id` varchar(64) default NULL COMMENT '商品識別ID',
  `item_name` varchar(255) NOT NULL default '' COMMENT '商品名',
  `item_price` int(11) unsigned default '0' COMMENT '商品価格',
  `item_text1` text NOT NULL COMMENT '一覧ページに表示する商品情報',
  `item_text2` text NOT NULL COMMENT '詳細ページに表示する商品情報',
  `item_detail` text COMMENT '商品説明',
  `item_spec` text COMMENT '商品スペック',
  `item_label_front` varchar(255) default NULL COMMENT '商品ラベル前',
  `item_label_back` varchar(255) default NULL COMMENT '商品ラベル後',
  `item_priority_id` int(11) NOT NULL default '0' COMMENT '商品表示優先順位',
  `item_image` varchar(255) default NULL COMMENT '商品画像',
  `supplier_id` int(11) default '0' COMMENT '仕入先ID',
  `postage_id` int(11) default '0' COMMENT '送料ID',
  `exchange_id` int(11) default '0' COMMENT '代引手数料ID',
  `item_use_credit_status` tinyint(1) unsigned default '0' COMMENT '1:クレジット可能',
  `item_use_conveni_status` tinyint(1) unsigned default '0' COMMENT '1:コンビニ可能',
  `item_use_exchange_status` tinyint(1) unsigned default '0' COMMENT '1:代引可能',
  `item_use_transfer_status` tinyint(1) unsigned default '0' COMMENT '1:銀行振込可能',
  `item_point` int(11) unsigned default '0' COMMENT '取得ポイント',
  `item_start_status` tinyint(1) NOT NULL COMMENT '0:販売開始期間設定無効, 1:販売開始期間設定有効',
  `item_start_time` datetime default NULL COMMENT '販売期間開始',
  `item_end_status` tinyint(1) NOT NULL COMMENT '0:販売終了期間設定無効, 1:販売終了期間設定有効',
  `item_end_time` datetime default NULL COMMENT '販売期間終了',
  `item_contents_body` text COMMENT '商品フリーページ',
  `file_id` text COMMENT 'フリーページファイル',
  `item_bundle_status` tinyint(1) unsigned default '0' COMMENT '1:同梱不可,0:同梱可',
  `item_created_time` datetime NOT NULL COMMENT '作成日時',
  `item_updated_time` datetime default NULL COMMENT '更新日時',
  `item_deleted_time` datetime default NULL COMMENT '削除日時',
  `item_status` tinyint(1) unsigned default '1' COMMENT '0:削除,1:表示,2:非表示',
  PRIMARY KEY  (`item_id`),
  KEY `category_id` (`shop_id`,`item_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品テーブル';

--
-- Table structure for table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE `item_category` (
  `item_category_id` int(11) NOT NULL auto_increment COMMENT 'カテゴリID',
  `shop_id` int(11) NOT NULL default '0' COMMENT 'ショップID',
  `item_category_name` varchar(255) NOT NULL default '' COMMENT 'カテゴリ名',
  `item_category_priority_id` int(11) NOT NULL default '0' COMMENT 'カテゴリ表示優先順位',
  `item_category_text` text NOT NULL COMMENT 'カテゴリ説明文',
  `item_category_image1` varchar(255) default NULL COMMENT 'カテゴリ画像',
  `item_category_contents_body` text COMMENT 'カテゴリフリーページ',
  `file_id` text COMMENT 'フリーページファイル',
  `item_category_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `item_category_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `item_category_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `item_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:有効',
  PRIMARY KEY  (`item_category_id`),
  KEY `item_category_status` (`item_category_status`,`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品カテゴリテーブル';

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL auto_increment COMMENT 'ログID',
  `log_type` varchar(255) NOT NULL COMMENT 'ログタイプ',
  `log_body` text NOT NULL COMMENT 'ログ本文',
  `log_created_time` datetime NOT NULL COMMENT '作成日時',
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=ujis;

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
CREATE TABLE `magazine` (
  `magazine_id` int(11) NOT NULL auto_increment COMMENT 'メルマガID',
  `magazine_title` text COMMENT 'メルマガタイトル',
  `magazine_signature` text COMMENT '署名',
  `magazine_body_text` text COMMENT 'メルマガ本文テキスト',
  `magazine_body_html_status` tinyint(1) default NULL COMMENT 'メルマガ本文HTMLステータス（0:無効,1:有効）',
  `magazine_body_html` text COMMENT 'メルマガ本文HTML',
  `magazine_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `magazine_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `magazine_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `magazine_reserve_time` datetime default '0000-00-00 00:00:00' COMMENT '配信予約日時',
  `magazine_start_time` datetime default '0000-00-00 00:00:00' COMMENT '配信開始日時',
  `magazine_end_time` datetime default '0000-00-00 00:00:00' COMMENT '配信終了日時',
  `magazine_user_num` int(11) default NULL COMMENT 'メルマガ配信対象ユーザ数',
  `magazine_sent_num` int(11) default '0' COMMENT 'メルマガ送信数',
  `magazine_error_num` int(11) default '0' COMMENT 'メルマガエラー数',
  `magazine_status` int(11) default '0' COMMENT 'メルマガステータス （0:無効,1:有効,2:配信中,3:配信済み,4:強制終了）',
  `segment_id` int(11) default '0' COMMENT 'セグメントID',
  PRIMARY KEY  (`magazine_id`),
  KEY `magazine_reserve_time` (`magazine_reserve_time`,`magazine_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='メールマガジンテーブル';

--
-- Table structure for table `mailchange_session`
--

DROP TABLE IF EXISTS `mailchange_session`;
CREATE TABLE `mailchange_session` (
  `mailchange_session_id` int(11) NOT NULL auto_increment COMMENT 'アドレス変更セッションID',
  `mailchange_session_random_id` varchar(32) default NULL COMMENT 'アドレス変更ランダムID',
  `user_hash` varchar(255) NOT NULL COMMENT 'ユーザ識別子',
  `mailchange_session_created_time` datetime NOT NULL COMMENT '作成日時',
  `mailchange_session_updated_time` datetime default NULL COMMENT '更新日時',
  `mailchange_session_deleted_time` datetime default NULL COMMENT '削除日時',
  `mailchange_session_status` tinyint(1) unsigned NOT NULL COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`mailchange_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アドレス変更セッション用テーブル';

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL auto_increment COMMENT '入会経路ID',
  `media_code` char(32) NOT NULL COMMENT '入会経路コード',
  `media_name` text NOT NULL COMMENT '入会経路名',
  `media_param1` varchar(64) default NULL COMMENT 'パラメータ1',
  `media_param2` varchar(64) default NULL COMMENT 'パラメータ2',
  `media_param3` varchar(64) default NULL COMMENT 'パラメータ3',
  `media_res_url` text COMMENT '入会時成果返却先',
  `media_point` int(11) NOT NULL default '0' COMMENT '入会時追加付与ポイント',
  `community_id` int(11) NOT NULL default '0' COMMENT '入会時デフォルト参加コミュニティID',
  `media_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '削除フラグ （1：有効 ,0：無効）',
  `media_mail_title` text COMMENT '入会経路通知メールタイトル',
  `media_mail_body` text COMMENT '入会経路通知メール本文',
  PRIMARY KEY  (`media_id`),
  UNIQUE KEY `media_code` (`media_code`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='入会経路テーブル';

--
-- Table structure for table `media_access`
--

DROP TABLE IF EXISTS `media_access`;
CREATE TABLE `media_access` (
  `media_access_id` int(11) NOT NULL auto_increment COMMENT '入会経路アクセスID',
  `media_access_hash` varchar(32) NOT NULL COMMENT '入会経路識別子',
  `media_id` int(11) default '0' COMMENT '入会経路ID',
  `media_access_param1` varchar(64) default NULL COMMENT '入会経路変数1',
  `media_access_param2` varchar(64) default NULL COMMENT '入会経路変数2',
  `media_access_param3` varchar(64) default NULL COMMENT '入会経路変数3',
  `media_access_status` tinyint(1) unsigned default '0' COMMENT '入会経路ステータス （0:access 1:mail 2:reg 3:send）',
  `user_id` int(11) unsigned default NULL COMMENT 'ユーザID',
  `access_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'アクセス日時',
  `mail_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'メール日時',
  `regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '登録日時',
  `send_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '送信日時',
  PRIMARY KEY  (`media_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='入会経路アクセステーブル';

--
-- Table structure for table `media_access_count`
--

DROP TABLE IF EXISTS `media_access_count`;
CREATE TABLE `media_access_count` (
  `media_access_count_id` int(11) unsigned NOT NULL auto_increment COMMENT '入会経路カウントID',
  `media_access_count_date` date NOT NULL default '0000-00-00' COMMENT '入会経路カウント日時',
  `media_access_count_code` varchar(64) NOT NULL COMMENT '入会経路カウントコード',
  `media_access_count_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '入会経路カウントステータス （0:access 1:mail 2:reg 3:send）',
  `media_access_count_count` int(11) unsigned NOT NULL default '0' COMMENT '入会経路カウント総計',
  `media_access_count_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  PRIMARY KEY  (`media_access_count_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='入会経路カウントテーブル';

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL auto_increment COMMENT 'メッセージID',
  `from_user_id` int(11) NOT NULL COMMENT '送信元ユーザID',
  `to_user_id` int(11) NOT NULL COMMENT '送信先ユーザID',
  `message_title` text NOT NULL COMMENT 'メッセージタイトル',
  `message_body` text NOT NULL COMMENT 'メッセージ本文',
  `message_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `message_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `message_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `message_status_from` int(11) NOT NULL default '2' COMMENT 'メッセージステータス送信元 （1:未読, 2:既読, 3:削除）',
  `message_status_to` int(11) NOT NULL default '1' COMMENT 'メッセージステータス送信先 （1:未読, 2:既読, 3:削除, 4:返信済み）',
  `message_hash` varchar(32) default NULL COMMENT 'メッセージ識別子',
  `image_id` int(11) default '0' COMMENT '画像ID',
  `movie_id` int(11) unsigned default '0' COMMENT '動画ID',
  `message_status` tinyint(1) unsigned default '0' COMMENT 'メッセージステータス （1：表示, 0：非表示）',
  `message_checked` tinyint(1) unsigned default '0' COMMENT 'メッセージ監視 （1済, 0：未）',
  PRIMARY KEY  (`message_id`),
  KEY `to_user_id` (`to_user_id`,`message_status_to`),
  KEY `message_user` (`message_id`,`from_user_id`,`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='メッセージテーブル';

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL auto_increment COMMENT '動画ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `movie_o` varchar(255) NOT NULL COMMENT 'オリジナル動画パス',
  `movie_3gp` varchar(255) NOT NULL COMMENT '3gp動画パス',
  `movie_3g2` varchar(255) NOT NULL COMMENT '3g2動画パス',
  `movie_flv` varchar(255) NOT NULL COMMENT 'flv動画パス',
  `movie_image1_t` varchar(255) NOT NULL COMMENT 'サムネイル画像１パス',
  `movie_mime_type` varchar(255) NOT NULL COMMENT '動画マイムタイプ',
  `movie_created_time` datetime NOT NULL COMMENT '作成日時',
  `movie_deleted_time` datetime NOT NULL COMMENT '削除日時',
  `movie_status` tinyint(1) unsigned NOT NULL COMMENT '動画ステータス （1:有効, 0:削除済み, 2:管理人によって削除済み）',
  `movie_checked` tinyint(1) unsigned NOT NULL COMMENT '動画監視ステータス',
  `movie_path_o` varchar(255) default NULL COMMENT 'オリジナル動画パス',
  `movie_path_a` varchar(255) default NULL COMMENT '全動画パス',
  `movie_path_s` varchar(255) default NULL COMMENT '小動画パス',
  `movie_path_t` varchar(255) default NULL COMMENT 'サムネイルパス',
  `movie_path_i` varchar(255) default NULL COMMENT 'アイコンパス',
  `movie_size` varchar(255) default NULL COMMENT '動画サイズ',
  `type` varchar(32) default NULL COMMENT '動画投稿先種別''',
  `id` int(11) default '0' COMMENT '動画投稿先のID値''',
  PRIMARY KEY  (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='動画テーブル';

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment COMMENT 'ニュースID',
  `news_type` varchar(255) NOT NULL COMMENT 'ニュースタイプ(0:all, 1:top, 4:game, 2:avatar)',
  `news_title` text NOT NULL COMMENT 'ニュースタイトル',
  `news_body` text NOT NULL COMMENT 'ニュース本文',
  `news_time` text COMMENT 'ニュース記載時刻',
  `news_status` tinyint(1) NOT NULL COMMENT '0:非表示, 1:表示',
  `news_start_status` tinyint(1) NOT NULL default '0' COMMENT 'ニュース配信開始ステータス(0:無効,1:有効)',
  `news_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ニュース配信開始日時',
  `news_end_status` tinyint(1) NOT NULL default '0' COMMENT 'ニュース配信終了ステータス(0:無効,1:有効)',
  `news_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ニュース配信終了日時',
  `news_created_time` datetime NOT NULL COMMENT '作成日時',
  `news_updated_time` datetime NOT NULL COMMENT '更新日時',
  `news_deleted_time` datetime NOT NULL COMMENT '削除日時',
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ニューステーブル';

--
-- Table structure for table `point`
--

DROP TABLE IF EXISTS `point`;
CREATE TABLE `point` (
  `point_id` int(11) NOT NULL auto_increment COMMENT 'ポイントID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `point` int(11) NOT NULL default '0' COMMENT '増減ポイント数',
  `point_type` int(11) NOT NULL default '0' COMMENT '1:管理,2:ｸﾘｯｸ,3:登録,4:料率,5:ｱﾊﾞﾀｰ,6:ﾃﾞｺﾒ,7:ｹﾞｰﾑ,8:ｻｳﾝﾄﾞ',
  `point_sub_id` int(11) NOT NULL default '0' COMMENT 'ポイントサブID(ポイントに関するサブIDが入る:ad_idなど)',
  `user_sub_id` int(11) NOT NULL default '0' COMMENT 'ユーザサブID(ユーザに関連するIDが入る:user_ad_idなど)',
  `point_memo` text COMMENT 'ポイント備考(広告名などが入る)',
  `point_status` int(11) NOT NULL default '0' COMMENT 'ポイントステータス （1：有効 ,0：無効, 2：承認済み）',
  `point_balance` int(11) default '0' COMMENT '現在ポイント残高',
  `point_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `point_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `point_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`point_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ポイントテーブル';

--
-- Table structure for table `point_exchange`
--

DROP TABLE IF EXISTS `point_exchange`;
CREATE TABLE `point_exchange` (
  `point_exchange_id` int(11) unsigned NOT NULL auto_increment COMMENT 'ポイント交換ID',
  `point_id` int(11) unsigned NOT NULL COMMENT 'ポイントID',
  `price` int(11) NOT NULL COMMENT '金額',
  `fee` int(11) NOT NULL COMMENT '手数料',
  `ebank_branch` int(11) NOT NULL COMMENT 'イーバンク支店番号',
  `ebank_account_number` varchar(255) NOT NULL COMMENT 'イーバンク口座番号',
  `ebank_account_name` varchar(255) NOT NULL COMMENT 'イーバンク口座名義',
  `edy_number` varchar(255) NOT NULL COMMENT 'edy番号',
  `point_exchange_created_time` datetime default NULL COMMENT '作成日時',
  `point_exchange_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `point_exchange_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `point_exchange_status` tinyint(1) NOT NULL default '1' COMMENT 'ポイント交換ステータス',
  PRIMARY KEY  (`point_exchange_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ポイント換金テーブル';

--
-- Table structure for table `pon`
--

DROP TABLE IF EXISTS `pon`;
CREATE TABLE `pon` (
  `pon_id` int(11) NOT NULL auto_increment COMMENT 'ポイントオンID',
  `user_hash` varchar(255) NOT NULL COMMENT 'ユーザハッシュ',
  `pon_user_hash` varchar(255) NOT NULL COMMENT 'ポイントオンユーザハッシュ',
  `pon_status` tinyint(1) NOT NULL COMMENT 'ポイントオンステータス',
  `pon_created_time` datetime NOT NULL COMMENT '作成日時',
  `pon_updated_time` datetime NOT NULL COMMENT '更新日時',
  `pon_deleted_time` datetime NOT NULL COMMENT '削除日時',
  PRIMARY KEY  (`pon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

--
-- Table structure for table `pon_point`
--

DROP TABLE IF EXISTS `pon_point`;
CREATE TABLE `pon_point` (
  `pon_point_id` tinyint(1) NOT NULL auto_increment COMMENT 'ポイントオンポイントID',
  `pon_point_tid` int(11) NOT NULL COMMENT 'ポイントオンポイントトランザクションID',
  `pon_point_pid` int(11) NOT NULL COMMENT 'ポイントオンポイントプロセスID',
  `user_hash` varchar(255) NOT NULL COMMENT 'ユーザハッシュ',
  `pon_user_hash` varchar(255) NOT NULL COMMENT 'ポイントオンユーザハッシュ',
  `pon_point` int(11) NOT NULL COMMENT 'ポイントオンポイント数',
  `pon_point_status` tinyint(1) NOT NULL COMMENT 'ポイントオンポイントステータス',
  `pon_point_result` text NOT NULL COMMENT 'ポイントオンポイント応答内容',
  `pon_point_created_time` datetime NOT NULL COMMENT '作成日時',
  `pon_point_updated_time` datetime NOT NULL COMMENT '更新日時',
  `pon_point_start_time` datetime NOT NULL COMMENT '開始日時',
  `pon_point_end_time` datetime NOT NULL COMMENT '終了日時',
  PRIMARY KEY  (`pon_point_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

--
-- Table structure for table `post_unit`
--

DROP TABLE IF EXISTS `post_unit`;
CREATE TABLE `post_unit` (
  `post_unit_id` int(11) NOT NULL auto_increment COMMENT '発送単位ID',
  `cart_hash` varchar(255) NOT NULL COMMENT 'カートハッシュ',
  `cart_id` int(11) NOT NULL COMMENT 'カートID',
  `item_id` int(11) NOT NULL default '0' COMMENT '商品ID',
  `stock_id` int(11) NOT NULL COMMENT 'ストック（タイプ）ID',
  `post_unit_item_num` int(11) NOT NULL COMMENT '発送個数',
  `post_unit_group_id` int(11) NOT NULL default '1' COMMENT 'グループID',
  `post_unit_group_postage_fee` int(11) default '0' COMMENT '送料',
  `post_unit_group_exchange_fee` int(11) default '0' COMMENT '代引手数料',
  `slip_code` varchar(255) default NULL COMMENT '配送業者伝票コード',
  `post_unit_sent_status` tinyint(1) unsigned default '0' COMMENT '0:商品未発送,1:商品発送済み',
  `post_unit_mail_sent_status` int(11) default '0' COMMENT '1:発送メール送信済み,0:発送メール未送信',
  `post_unit_sent_date` datetime default NULL COMMENT '出荷日',
  `post_unit_created_time` datetime NOT NULL COMMENT '作成日時',
  `post_unit_updated_time` datetime default NULL COMMENT '更新日時',
  `post_unit_status` int(11) NOT NULL default '1' COMMENT 'ステータス 1:有効 0:無効',
  PRIMARY KEY  (`post_unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='発送単位用テーブル';

--
-- Table structure for table `postage`
--

DROP TABLE IF EXISTS `postage`;
CREATE TABLE `postage` (
  `postage_id` int(11) unsigned NOT NULL auto_increment COMMENT '送料ID',
  `postage_name` varchar(255) NOT NULL COMMENT '送料設定名',
  `postage_status` tinyint(1) NOT NULL default '1' COMMENT '0:無効,1:有効',
  `postage_type` tinyint(1) NOT NULL COMMENT '1:全国,2:地域,3:合計金額,4:合計個数',
  `postage_total_price_set` int(11) default NULL COMMENT '合計金額設定値',
  `postage_total_price_set_under` int(11) default NULL COMMENT '合計金額設定値未満時の送料',
  `postage_total_price_value` int(11) default NULL COMMENT '合計金額設定値以上時の送料',
  `postage_total_piece_set` int(11) default NULL COMMENT '合計個数設定値',
  `postage_total_piece_set_under` int(11) default NULL COMMENT '合計個数設定値未満時の送料',
  `postage_total_piece_value` int(11) default NULL COMMENT '合計個数設定値以上時の送料',
  `postage_same_status` tinyint(1) NOT NULL default '0' COMMENT '1:全国設定',
  `postage_same_price` int(11) default NULL COMMENT '全国設定時の送料',
  `postage_created_time` datetime NOT NULL COMMENT '作成日時',
  `postage_updated_time` datetime default NULL COMMENT '更新日時',
  `postage_deleted_time` datetime default NULL COMMENT '削除日時',
  `postage_pref_1` int(11) unsigned NOT NULL default '0' COMMENT '北海道の送料',
  `postage_pref_2` int(11) unsigned NOT NULL default '0' COMMENT '青森県の送料',
  `postage_pref_3` int(11) unsigned NOT NULL default '0' COMMENT '岩手県の送料',
  `postage_pref_4` int(11) unsigned NOT NULL default '0' COMMENT '秋田県の送料',
  `postage_pref_5` int(11) unsigned NOT NULL default '0' COMMENT '宮城県の送料',
  `postage_pref_6` int(11) unsigned NOT NULL default '0' COMMENT '山形県の送料',
  `postage_pref_7` int(11) unsigned NOT NULL default '0' COMMENT '福島県の送料',
  `postage_pref_8` int(11) unsigned NOT NULL default '0' COMMENT '茨城県の送料',
  `postage_pref_9` int(11) unsigned NOT NULL default '0' COMMENT '栃木県の送料',
  `postage_pref_10` int(11) unsigned NOT NULL default '0' COMMENT '群馬県の送料',
  `postage_pref_11` int(11) unsigned NOT NULL default '0' COMMENT '埼玉県の送料',
  `postage_pref_12` int(11) unsigned NOT NULL default '0' COMMENT '千葉県の送料',
  `postage_pref_13` int(11) unsigned NOT NULL default '0' COMMENT '東京都の送料',
  `postage_pref_14` int(11) unsigned NOT NULL default '0' COMMENT '神奈川県の送料',
  `postage_pref_15` int(11) unsigned NOT NULL default '0' COMMENT '新潟県佐渡島の送料',
  `postage_pref_16` int(11) unsigned NOT NULL default '0' COMMENT '新潟県の送料',
  `postage_pref_17` int(11) unsigned NOT NULL default '0' COMMENT '富山県の送料',
  `postage_pref_18` int(11) unsigned NOT NULL default '0' COMMENT '石川県の送料',
  `postage_pref_19` int(11) unsigned NOT NULL default '0' COMMENT '福井県の送料',
  `postage_pref_20` int(11) unsigned NOT NULL default '0' COMMENT '長野県の送料',
  `postage_pref_21` int(11) unsigned NOT NULL default '0' COMMENT '山梨県の送料',
  `postage_pref_22` int(11) unsigned NOT NULL default '0' COMMENT '静岡県の送料',
  `postage_pref_23` int(11) unsigned NOT NULL default '0' COMMENT '愛知県の送料',
  `postage_pref_24` int(11) unsigned NOT NULL default '0' COMMENT '岐阜県の送料',
  `postage_pref_25` int(11) unsigned NOT NULL default '0' COMMENT '三重県の送料',
  `postage_pref_26` int(11) unsigned NOT NULL default '0' COMMENT '滋賀県の送料',
  `postage_pref_27` int(11) unsigned NOT NULL default '0' COMMENT '京都府の送料',
  `postage_pref_28` int(11) unsigned NOT NULL default '0' COMMENT '大阪府の送料',
  `postage_pref_29` int(11) unsigned NOT NULL default '0' COMMENT '兵庫県の送料',
  `postage_pref_30` int(11) unsigned NOT NULL default '0' COMMENT '奈良県の送料',
  `postage_pref_31` int(11) unsigned NOT NULL default '0' COMMENT '和歌山県の送料',
  `postage_pref_32` int(11) unsigned NOT NULL default '0' COMMENT '鳥取県の送料',
  `postage_pref_33` int(11) unsigned NOT NULL default '0' COMMENT '島根県の送料',
  `postage_pref_34` int(11) unsigned NOT NULL default '0' COMMENT '岡山県の送料',
  `postage_pref_35` int(11) unsigned NOT NULL default '0' COMMENT '広島県の送料',
  `postage_pref_36` int(11) unsigned NOT NULL default '0' COMMENT '山口県の送料',
  `postage_pref_37` int(11) unsigned NOT NULL default '0' COMMENT '香川県の送料',
  `postage_pref_38` int(11) unsigned NOT NULL default '0' COMMENT '徳島県の送料',
  `postage_pref_39` int(11) unsigned NOT NULL default '0' COMMENT '愛媛県の送料',
  `postage_pref_40` int(11) unsigned NOT NULL default '0' COMMENT '高知県の送料',
  `postage_pref_41` int(11) unsigned NOT NULL default '0' COMMENT '福岡県の送料',
  `postage_pref_42` int(11) unsigned NOT NULL default '0' COMMENT '大分県の送料',
  `postage_pref_43` int(11) unsigned NOT NULL default '0' COMMENT '佐賀県の送料',
  `postage_pref_44` int(11) unsigned NOT NULL default '0' COMMENT '長崎県の送料',
  `postage_pref_45` int(11) unsigned NOT NULL default '0' COMMENT '宮崎県の送料',
  `postage_pref_46` int(11) unsigned NOT NULL default '0' COMMENT '熊本県の送料',
  `postage_pref_47` int(11) unsigned NOT NULL default '0' COMMENT '鹿児島県の送料',
  `postage_pref_48` int(11) unsigned NOT NULL default '0' COMMENT '沖縄県の送料',
  `postage_pref_49` int(11) unsigned NOT NULL default '0' COMMENT '沖縄県離島の送料',
  PRIMARY KEY  (`postage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='送料設定用テーブル';

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking` (
  `ranking_id` int(11) NOT NULL auto_increment COMMENT 'ランキングID',
  `type` varchar(32) NOT NULL COMMENT 'ランキング種別',
  `id` int(11) NOT NULL default '0' COMMENT '集計対象のプライマリーキーID',
  `sub_id` int(11) default '0' COMMENT '集計データの分類ID（主にカテゴリID）',
  `ranking_order` int(11) NOT NULL default '0' COMMENT 'ランキング順位',
  `ranking_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  PRIMARY KEY  (`ranking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1932 DEFAULT CHARSET=ujis COMMENT='ランキングテーブル';

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) unsigned NOT NULL auto_increment COMMENT '通報ID',
  `report_user_id` int(11) unsigned NOT NULL COMMENT '通報者ユーザID',
  `report_fail_user_id` int(11) unsigned NOT NULL COMMENT '通報されたユーザID',
  `report_message` text NOT NULL COMMENT '通報メッセージ',
  `report_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '通報ステータス （1：表示 ,0：非表示）',
  `report_checked` tinyint(1) unsigned NOT NULL COMMENT '通報監視ステータス(0:未,1:済)',
  `report_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `report_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `report_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`report_id`),
  KEY `user_id` (`report_user_id`,`report_fail_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='通報テーブル';

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL auto_increment COMMENT '商品レビューID',
  `cart_id` int(11) NOT NULL COMMENT 'カートID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `item_id` int(11) NOT NULL COMMENT '商品ID',
  `review_title` text NOT NULL COMMENT '商品レビュータイトル',
  `review_body` text NOT NULL COMMENT '商品レビュー本文',
  `review_hash` varchar(32) NOT NULL COMMENT '商品レビューハッシュ',
  `review_created_time` datetime NOT NULL COMMENT '作成日時',
  `review_updated_time` datetime default NULL COMMENT '更新日時',
  `review_deleted_time` datetime default NULL COMMENT '削除日時',
  `review_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:cron待ち,2:投稿待ち,3:有効',
  PRIMARY KEY  (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品レビュー用テーブル';

--
-- Table structure for table `sample`
--

DROP TABLE IF EXISTS `sample`;
CREATE TABLE `sample` (
  `sample_id` int(11) NOT NULL auto_increment COMMENT '商品サンプルID',
  `item_id` int(11) NOT NULL default '0' COMMENT '商品ID',
  `sample_name` varchar(255) NOT NULL default '' COMMENT 'サンプル名',
  `sample_image` varchar(255) NOT NULL default '' COMMENT 'サンプル画像',
  `sample_priority_id` int(11) NOT NULL default '0' COMMENT 'サンプル表示優先順位',
  `sample_created_time` datetime default NULL COMMENT '作成日時',
  `sample_updated_time` datetime default NULL COMMENT '更新日時',
  `sample_deleted_time` datetime default NULL COMMENT '削除日時',
  `sample_status` int(11) NOT NULL default '1' COMMENT '1:有効,0:削除',
  PRIMARY KEY  (`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品サンプル用テーブル';

--
-- Table structure for table `segment`
--

DROP TABLE IF EXISTS `segment`;
CREATE TABLE `segment` (
  `segment_id` int(11) NOT NULL auto_increment COMMENT 'セグメントID',
  `segment_name` text NOT NULL COMMENT 'セグメント名',
  `segment_status` tinyint(1) NOT NULL COMMENT 'セグメントステータス（0:無効,1:有効）',
  `segment_user_num` int(11) NOT NULL default '0' COMMENT 'セグメント対象人数',
  `user_carrier` varchar(255) default NULL COMMENT 'キャリア',
  `user_point_min` int(11) default NULL COMMENT '最小ポイント',
  `user_point_max` int(11) default NULL COMMENT '最大ポイント',
  `user_age_min` int(11) default NULL COMMENT '最小年齢',
  `user_age_max` int(11) default NULL COMMENT '最大年齢',
  `user_sex` varchar(255) default NULL COMMENT '性別',
  `prefecture_id` varchar(255) default NULL COMMENT '住所',
  `job_family_id` varchar(255) default NULL COMMENT '職業',
  `business_category_id` varchar(255) default NULL COMMENT '業種',
  `user_is_married` varchar(255) default NULL COMMENT '結婚',
  `user_has_children` varchar(255) default NULL COMMENT '子供',
  `user_blood_type` varchar(255) default NULL COMMENT '血液型',
  `work_location_prefecture_id` varchar(255) default NULL COMMENT '勤務地',
  `user_created_date_start` datetime default NULL COMMENT '登録日開始',
  `user_created_date_end` datetime default NULL COMMENT '登録日終了',
  `user_carrier_status` tinyint(1) unsigned default NULL COMMENT 'キャリアステータス（0:無効,1:有効）',
  `user_point_status` tinyint(1) unsigned default NULL COMMENT 'ポイントステータス（0:無効,1:有効）',
  `user_age_status` tinyint(1) unsigned default NULL COMMENT '年齢ステータス（0:無効,1:有効）',
  `user_sex_status` tinyint(1) unsigned default NULL COMMENT '性別ステータス（0:無効,1:有効）',
  `prefecture_id_status` tinyint(1) unsigned default NULL COMMENT '住所ステータス（0:無効,1:有効）',
  `job_family_id_status` tinyint(1) unsigned default NULL COMMENT '職業ステータス（0:無効,1:有効）',
  `business_category_id_status` tinyint(1) unsigned default NULL COMMENT '業種ステータス（0:無効,1:有効）',
  `user_is_married_status` tinyint(1) unsigned default NULL COMMENT '結婚ステータス（0:無効,1:有効）',
  `user_has_children_status` tinyint(1) unsigned default NULL COMMENT '子供ステータス（0:無効,1:有効）',
  `user_blood_type_status` tinyint(1) unsigned default NULL COMMENT '血液型ステータス（0:無効,1:有効）',
  `work_location_prefecture_id_status` tinyint(1) unsigned default NULL COMMENT '勤務地ステータス（0:無効,1:有効）',
  `user_created_status` tinyint(1) unsigned default NULL COMMENT '登録日ステータス（0:無効,1:有効）',
  `item_id` varchar(255) default NULL COMMENT '購入した商品のID',
  `item_id_status` tinyint(4) default NULL COMMENT '購入商品ステータス（0:無効,1:有効）',
  PRIMARY KEY  (`segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='セグメントテーブル';

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL auto_increment COMMENT 'ショップID',
  `shop_name` varchar(255) NOT NULL default '' COMMENT 'ショップ名',
  `shop_ranking` varchar(255) NOT NULL default '' COMMENT '人気ランキング item_id(csv)',
  `shop_news` text NOT NULL COMMENT 'ショップニュース',
  `shop_new_arrivals` varchar(255) NOT NULL default '' COMMENT 'おすすめランキング item_id(csv)',
  `shop_image1` varchar(255) default NULL COMMENT 'ショップ用画像1',
  `shop_image2` varchar(255) default NULL COMMENT 'ショップ用画像2',
  `shop_priority_id` int(11) NOT NULL default '0' COMMENT 'ショップ表示優先順位',
  `shop_bgcolor` varchar(255) NOT NULL COMMENT 'ショップ背景色',
  `shop_textcolor` varchar(255) NOT NULL COMMENT 'ショップ文字色',
  `shop_linkcolor` varchar(255) NOT NULL COMMENT 'ショップリンク色',
  `shop_alinkcolor` varchar(255) NOT NULL COMMENT 'ショップアクティブリンク色',
  `shop_vlinkcolor` varchar(255) NOT NULL COMMENT 'ショップ訪問済リンク色',
  `shop_body` text COMMENT 'ショップフリーページ',
  `file_id` text COMMENT 'フリーページファイル',
  `shop_category_print_status` int(11) default NULL COMMENT '1:カテゴリ一覧を表示',
  `shop_created_time` datetime NOT NULL COMMENT '作成日時',
  `shop_updated_time` datetime default NULL COMMENT '更新日時',
  `shop_deleted_time` datetime default NULL COMMENT '削除日時',
  `shop_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:有効',
  PRIMARY KEY  (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ショップ用テーブル';

--
-- Table structure for table `sound`
--

DROP TABLE IF EXISTS `sound`;
CREATE TABLE `sound` (
  `sound_id` int(11) NOT NULL auto_increment COMMENT 'サウンドID',
  `sound_name` text NOT NULL COMMENT 'サウンド名',
  `sound_desc` text NOT NULL COMMENT 'サウンド説明',
  `sound_file1` varchar(255) default NULL COMMENT 'サウンドファイル1(一覧表示用ファイル)',
  `sound_file2` varchar(255) default NULL COMMENT 'サウンドファイル2(詳細表示用ファイル)',
  `sound_file_d` varchar(255) default NULL COMMENT 'DOCOMO用サウンドファイル',
  `sound_file_a` varchar(255) default NULL COMMENT 'AU用サウンドファイル',
  `sound_file_s` varchar(255) default NULL COMMENT 'SOFTBANK用サウンドファイル',
  `sound_point` int(11) NOT NULL default '0' COMMENT 'サウンド消費ポイント',
  `sound_status` tinyint(1) NOT NULL default '0' COMMENT 'サウンドステータス （1：有効, 0：無効）',
  `sound_category_id` int(11) NOT NULL default '0' COMMENT 'サウンドカテゴリID',
  `sound_stock_num` int(11) NOT NULL default '0' COMMENT 'サウンド配信終了数',
  `sound_stock_status` tinyint(1) NOT NULL default '0' COMMENT 'サウンド配信終了数ステータス （1：有効, 0：無効）',
  `sound_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `sound_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `sound_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `sound_start_time` datetime default '0000-00-00 00:00:00' COMMENT 'サウンド配信開始日時',
  `sound_start_status` tinyint(1) NOT NULL default '0' COMMENT 'サウンド配信開始ステータス(0:無効,1:有効)',
  `sound_end_time` datetime default '0000-00-00 00:00:00' COMMENT 'サウンド配信終了日時',
  `sound_end_status` tinyint(1) NOT NULL default '0' COMMENT 'サウンド配信終了日時ステータス （1：有効, 0：無効）',
  PRIMARY KEY  (`sound_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='サウンドテーブル';

--
-- Table structure for table `sound_category`
--

DROP TABLE IF EXISTS `sound_category`;
CREATE TABLE `sound_category` (
  `sound_category_id` int(11) NOT NULL auto_increment COMMENT 'サウンドカテゴリID',
  `sound_category_name` text NOT NULL COMMENT 'サウンドカテゴリ名',
  `sound_category_desc` text NOT NULL COMMENT 'サウンドカテゴリ説明',
  `sound_category_status` int(11) NOT NULL default '0' COMMENT 'サウンドカテゴリステータス （1：有効, 0：無効）',
  `sound_category_priority_id` int(11) NOT NULL default '0' COMMENT 'サウンドカテゴリ優先度ID',
  `sound_category_file1` varchar(255) default NULL COMMENT 'サウンドカテゴリファイル1',
  `sound_category_color` varchar(255) default NULL COMMENT 'サウンドカテゴリ色',
  PRIMARY KEY  (`sound_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='サウンドカテゴリテーブル';

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL auto_increment COMMENT '在庫ID',
  `item_id` int(11) NOT NULL default '0' COMMENT '商品ID',
  `item_type` varchar(255) NOT NULL default '' COMMENT '商品タイプ',
  `stock_num` int(11) NOT NULL default '0' COMMENT '在庫個数',
  `stock_priority_id` int(11) NOT NULL default '0' COMMENT 'タイプ表示優先順位',
  `stock_one_type_status` tinyint(1) unsigned default '0' COMMENT '1:単一タイプの商品',
  `stock_created_time` datetime NOT NULL COMMENT '作成日時',
  `stock_updated_time` datetime default NULL COMMENT '更新日時',
  `stock_deleted_time` datetime default NULL COMMENT '削除日時',
  `stock_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:有効',
  PRIMARY KEY  (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='在庫用テーブル';

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(11) unsigned NOT NULL auto_increment COMMENT '仕入先ID',
  `supplier_name` varchar(255) NOT NULL COMMENT '仕入先設定名',
  `supplier_shipping_type` tinyint(1) unsigned NOT NULL COMMENT '1:直接出荷,2:納品後出荷',
  `postage_id` int(11) unsigned NOT NULL COMMENT '送料ID',
  `exchange_id` int(11) unsigned NOT NULL COMMENT '代引手数料ID',
  `supplier_use_credit_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:クレジット可能',
  `supplier_use_conveni_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:コンビニ可能',
  `supplier_use_exchange_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:代引可能',
  `supplier_use_transfer_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:銀行振込可能',
  `supplier_bundle_allow_id` text COMMENT '同梱可能設定(仕入れ先ID:区切り)',
  `supplier_created_time` datetime NOT NULL COMMENT '作成日時',
  `supplier_updated_time` datetime default NULL COMMENT '更新日時',
  `supplier_deleted_time` datetime default NULL COMMENT '削除日時',
  `supplier_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:有効',
  PRIMARY KEY  (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='仕入先用テーブル';

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL auto_increment COMMENT 'ユーザID',
  `user_status` tinyint(1) unsigned NOT NULL COMMENT 'ユーザーステータス （1:仮登録, 2:本登録, 3:退会, 4:強制退会）',
  `user_checked` tinyint(1) unsigned NOT NULL COMMENT 'ユーザー監視 （1：済 ,0：未）',
  `user_carrier` tinyint(1) unsigned NOT NULL default '0' COMMENT 'ユーザキャリア(1:DOCOMO,2:AU,3:SOFTBANK)',
  `user_mailaddress` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `user_birth_date` date default NULL COMMENT '誕生日',
  `user_birth_date_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '生年月日公開設定（1：公開, 0：非公開）',
  `user_age_public` tinyint(4) NOT NULL default '1' COMMENT '年齢公開設定（1：公開, 0：非公開）',
  `user_sex` tinyint(1) unsigned default NULL COMMENT '性別 （1:男性, 2:女性）',
  `user_sex_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '性別公開設定（1：公開, 0：非公開）',
  `user_hash` varchar(32) default NULL COMMENT 'ユーザ識別子',
  `user_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  `user_nickname` varchar(128) default NULL COMMENT 'ニックネーム',
  `user_password` varchar(32) default NULL COMMENT 'パスワード',
  `user_uid` varchar(32) default NULL COMMENT '携帯端末識別子',
  `user_sessid` varchar(64) default NULL COMMENT 'ユーザーセッション識別子',
  `user_magazine_error_num` int(10) default '0' COMMENT 'メルマガ配信失敗数',
  `user_point` int(11) default '0' COMMENT 'ポイント',
  `user_message_1_status` tinyint(1) unsigned default '1' COMMENT '伝言板通知メール受信ステータス(0:受信しない,1:受信する)',
  `user_message_2_status` tinyint(1) unsigned default '1' COMMENT 'ミニメール通知メール受信ステータス(0:受信しない,1:受信する)',
  `user_message_3_status` tinyint(1) unsigned default '1' COMMENT '日記コメント通知メール受信ステータス(0:受信しない,1:受信する)',
  `user_message_4_status` tinyint(1) unsigned default '1' COMMENT 'コミュニティトピックコメント通知メール受信ステータス(0:受信しない,1:受信する)',
  `user_name` varchar(255) NOT NULL default '' COMMENT 'ユーザ名',
  `prefecture_id` int(11) default NULL COMMENT '住所(都道府県)',
  `prefecture_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '住所都道府県公開設定（1：公開, 0：非公開）',
  `user_address` text COMMENT '住所(市区町村番地)',
  `user_address_building` text COMMENT '住所(建物名)',
  `user_address_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '住所市区町村公開設定（1：公開, 0：非公開）',
  `user_blood_type` int(11) default NULL COMMENT '血液型',
  `user_blood_type_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '血液型公開設定（1：公開, 0：非公開）',
  `user_is_married` int(11) default NULL COMMENT '結婚',
  `user_is_married_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '既婚未婚公開設定（1：公開, 0：非公開）',
  `user_has_children` tinyint(1) unsigned default NULL COMMENT '子供',
  `user_has_children_public` tinyint(1) unsigned default '1' COMMENT '子供公開',
  `work_location_prefecture_id` int(11) default NULL COMMENT '勤務地',
  `work_location_prefecture_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '勤務地公開設定（1：公開, 0：非公開）',
  `job_family_id` int(11) default NULL COMMENT '職種',
  `job_family_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '業種公開設定（1：公開, 0：非公開）',
  `business_category_id` int(11) default NULL COMMENT '業種',
  `business_category_id_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '職種公開設定（1：公開, 0：非公開）',
  `user_hobby` text COMMENT '趣味',
  `user_hobby_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '趣味公開設定（1：公開, 0：非公開）',
  `user_url` text COMMENT 'URL',
  `user_url_public` tinyint(3) unsigned NOT NULL default '1' COMMENT 'URL公開設定（1：公開, 0：非公開）',
  `user_introduction` text COMMENT '自己紹介文',
  `user_introduction_public` tinyint(3) unsigned NOT NULL default '1' COMMENT '自己紹介文公開設定（1：公開, 0：非公開）',
  `image_id` int(11) unsigned default NULL COMMENT '画像ID',
  `invite_id` int(11) unsigned default '0' COMMENT '招待ID',
  `media_id` int(11) unsigned default '0' COMMENT '入会経路ID',
  `media_access_hash` varchar(32) default NULL COMMENT '入会経路識別子',
  `user_guest_status` tinyint(1) unsigned default '0' COMMENT 'ユーザゲストステータス(0:無効,1:有効)',
  `avatar_config_first` tinyint(1) NOT NULL default '0' COMMENT 'アバター初期設定実行履歴(0:未設定,1:設定済み)',
  `user_mail_ok` tinyint(11) NOT NULL default '1' COMMENT 'メルマガ配信OK(0:ng,1:ok)',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT 'ユーザ名かな',
  `user_zipcode` varchar(8) default NULL COMMENT '郵便番号',
  `region_id` int(11) unsigned default NULL COMMENT '地域ID',
  `user_phone` varchar(255) default NULL COMMENT '電話番号',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '最終購入日時',
  `user_device` varchar(32) default NULL COMMENT '機種名',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_mailaddress_2` (`user_mailaddress`),
  UNIQUE KEY `user_uid` (`user_uid`),
  KEY `user_status` (`user_status`,`user_magazine_error_num`),
  KEY `user_mailaddress` (`user_mailaddress`,`user_password`,`user_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザーテーブル';

--
-- Table structure for table `user_ad`
--

DROP TABLE IF EXISTS `user_ad`;
CREATE TABLE `user_ad` (
  `user_ad_id` int(11) NOT NULL auto_increment COMMENT 'ユーザ広告ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `ad_id` int(11) NOT NULL COMMENT '広告ID',
  `user_ad_status` tinyint(1) NOT NULL COMMENT 'ユーザ広告ステータス （1：有効 ,0：無効）',
  `user_ad_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_ad_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_ad_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`user_ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザ広告テーブル';

--
-- Table structure for table `user_avatar`
--

DROP TABLE IF EXISTS `user_avatar`;
CREATE TABLE `user_avatar` (
  `user_avatar_id` int(11) NOT NULL auto_increment COMMENT 'ユーザアバターID',
  `user_id` int(11) NOT NULL default '0' COMMENT 'ユーザID',
  `avatar_id` int(11) NOT NULL default '0' COMMENT 'アバターID',
  `user_avatar_status` tinyint(1) NOT NULL default '0' COMMENT 'ユーザアバターステータス （1：有効 ,0：無効）',
  `user_avatar_wear` tinyint(1) NOT NULL default '0' COMMENT 'ユーザアバター着衣ステータス(0:無効,1:有効)',
  `user_avatar_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_avatar_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_avatar_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`user_avatar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザアバターテーブル';

--
-- Table structure for table `user_decomail`
--

DROP TABLE IF EXISTS `user_decomail`;
CREATE TABLE `user_decomail` (
  `user_decomail_id` int(11) NOT NULL auto_increment COMMENT 'ユーザデコメールID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `decomail_id` int(11) NOT NULL COMMENT 'デコメールID',
  `user_decomail_status` tinyint(1) NOT NULL COMMENT 'ユーザデコメールステータス （1：有効 ,0：無効）',
  `user_decomail_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_decomail_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_decomail_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`user_decomail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザデコメールテーブル';

--
-- Table structure for table `user_game`
--

DROP TABLE IF EXISTS `user_game`;
CREATE TABLE `user_game` (
  `user_game_id` int(11) NOT NULL auto_increment COMMENT 'ユーザゲームID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `game_id` int(11) NOT NULL COMMENT 'ゲームID',
  `user_game_status` tinyint(1) NOT NULL COMMENT 'ユーザゲームステータス （1：有効 ,0：無効）',
  `user_game_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_game_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_game_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`user_game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザゲームテーブル';

--
-- Table structure for table `user_game_score`
--

DROP TABLE IF EXISTS `user_game_score`;
CREATE TABLE `user_game_score` (
  `user_game_score_id` int(11) NOT NULL auto_increment COMMENT 'ユーザゲームスコアD',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `game_id` int(11) NOT NULL COMMENT 'ゲームID',
  `user_game_score_score` int(11) NOT NULL COMMENT 'スコア',
  `user_game_score_created_time` datetime NOT NULL COMMENT '作成日時',
  `user_game_score_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_game_score_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `user_game_score_status` int(1) NOT NULL default '0' COMMENT 'ゲームスコアステータス（1：有効、0：無効）',
  PRIMARY KEY  (`user_game_score_id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザゲームスコアテーブル';

--
-- Table structure for table `user_hist`
--

DROP TABLE IF EXISTS `user_hist`;
CREATE TABLE `user_hist` (
  `user_hist_id` int(11) NOT NULL auto_increment COMMENT 'ユーザ履歴ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_mailaddress` varchar(255) NOT NULL COMMENT 'ユーザメールアドレス',
  `x_user_id` int(11) default '0' COMMENT '会員連動ユーザID',
  `user_status` tinyint(1) NOT NULL COMMENT 'ユーザステータス',
  `user_hist_created_time` datetime NOT NULL COMMENT '作成日時',
  PRIMARY KEY  (`user_hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザ履歴テーブル';

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
CREATE TABLE `user_order` (
  `user_order_id` int(11) NOT NULL auto_increment COMMENT 'オーダーID',
  `user_order_no` varchar(255) default NULL COMMENT '日付+order_id（注文番号）',
  `cart_id` int(11) unsigned default NULL COMMENT 'カートID',
  `cart_hash` varchar(255) NOT NULL COMMENT 'カートハッシュ',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_order_type` int(11) NOT NULL default '0' COMMENT '1:クレジット,2:コンビニ,3:代引,4:銀行振込',
  `user_order_use_point_status` tinyint(1) unsigned default '0' COMMENT '1:ポイント使用する',
  `user_order_use_point` int(11) unsigned default '0' COMMENT '使用するポイント値',
  `user_order_get_point` int(11) unsigned NOT NULL default '0' COMMENT '取得するポイント値',
  `user_order_get_point_date` datetime default NULL COMMENT 'ポイント付与確定日',
  `user_order_point_added_status` int(11) default NULL COMMENT '1:ポイント付与完了',
  `user_order_card_type` int(11) default '0' COMMENT '1:VISA,2:JCB,3:AMEX,4:MASTER,5:DINERS',
  `user_order_card_number` varchar(255) default NULL COMMENT 'クレジットカード番号',
  `user_order_card_name` varchar(255) default NULL COMMENT 'クレジットカード名義',
  `user_order_card_expiration` varchar(255) default NULL COMMENT 'クレジットカード期限',
  `user_order_card_revo_status` int(10) unsigned default '0' COMMENT '1:リボ払い,0:1回払い',
  `user_order_credit_auth_code` varchar(255) default NULL COMMENT 'クレジットカード決済オーソリコード',
  `user_order_credit_exchange_code` varchar(255) default NULL COMMENT 'クレジットカード決済コード',
  `user_order_conveni_type` varchar(16) default NULL COMMENT 'seveneleven,lawson,famima,seicomart',
  `user_order_conveni_sale_code` varchar(255) default NULL COMMENT 'コンビニ決済コード',
  `user_order_conveni_exchange_code` varchar(255) default NULL COMMENT 'コンビニ決済コード',
  `user_order_conveni_pay_url` text COMMENT 'コンビニ払込票URL',
  `user_order_delivery_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:登録済住所へ送る,2:住所指定する',
  `user_order_delivery_day` int(11) default NULL COMMENT '1:午前中,2:12-14時,3:14-16時,4:16-18時,5:18-21時',
  `user_order_delivery_note` varchar(255) default NULL COMMENT '配達備考',
  `user_order_delivery_name` varchar(255) default NULL COMMENT '配達先お名前',
  `user_order_delivery_name_kana` varchar(255) default NULL COMMENT '配達先お名前かな',
  `user_order_delivery_zipcode` varchar(8) default NULL COMMENT '配達先郵便番号',
  `user_order_delivery_region_id` int(10) unsigned default NULL COMMENT '配送先地域ID',
  `user_order_delivery_address` text COMMENT '配達先住所',
  `user_order_delivery_address_building` text COMMENT '配達先建物名',
  `user_order_delivery_phone` varchar(255) default NULL COMMENT '配達先電話番号',
  `user_order_total_price1` int(11) NOT NULL default '0' COMMENT '送料手数料を含まない小計',
  `user_order_total_price2` int(11) NOT NULL default '0' COMMENT '送料手数料を含む合計',
  `user_order_tax` int(11) NOT NULL default '0' COMMENT '消費税',
  `user_order_postage` int(11) NOT NULL default '0' COMMENT '送料',
  `user_order_exchange_fee` int(11) NOT NULL default '0' COMMENT '代引手数料',
  `user_order_comment` text COMMENT 'コメント',
  `user_order_created_time` datetime NOT NULL COMMENT '作成日時',
  `user_order_updated_time` datetime NOT NULL COMMENT '更新日時',
  `user_order_deleted_time` datetime NOT NULL COMMENT '作成日時',
  `user_order_status` int(11) NOT NULL default '1' COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`user_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='オーダー用テーブル';

--
-- Table structure for table `user_order_copy`
--

DROP TABLE IF EXISTS `user_order_copy`;
CREATE TABLE `user_order_copy` (
  `user_order_copy_id` int(11) NOT NULL auto_increment COMMENT '注文時ユーザ情報ID',
  `user_order_id` int(11) default NULL COMMENT 'オーダーID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `user_name` varchar(255) NOT NULL default '' COMMENT 'ユーザ名',
  `user_nickname` varchar(128) default NULL COMMENT 'ニックネーム',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT 'ユーザ名かな',
  `user_zipcode` varchar(8) default NULL COMMENT '郵便番号',
  `user_pref` int(11) NOT NULL COMMENT '住所都道府県番号',
  `region_id` int(11) default NULL,
  `user_address` text NOT NULL COMMENT '住所',
  `user_address_building` text COMMENT '住所建物名',
  `user_phone` varchar(255) NOT NULL default '' COMMENT '電話番号',
  `user_birth_date` date default NULL COMMENT '誕生年月日',
  `user_sex` tinyint(1) default NULL COMMENT '性別',
  `user_mailaddress` varchar(255) NOT NULL default '' COMMENT 'メールアドレス',
  `user_password` varchar(32) default NULL COMMENT 'パスワード',
  `user_point` int(11) unsigned default NULL COMMENT '所有ポイント',
  `user_hash` varchar(32) default NULL COMMENT 'ユーザハッシュ',
  `user_status` tinyint(1) unsigned NOT NULL COMMENT '1:仮登録,2:本登録,3:退会,4:強制退会',
  `user_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_updated_time` datetime NOT NULL COMMENT '更新日時',
  `user_deleted_time` datetime default NULL COMMENT '削除日時',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '最終購入日時',
  `user_uid` varchar(32) default NULL COMMENT '携帯端末識別子',
  `user_magazine_error_num` int(10) default '0' COMMENT 'メルマガ配信失敗数',
  `mm_only_flag` int(11) default NULL COMMENT '1:メルマガのみ登録ユーザ',
  `user_sessid` varchar(64) default NULL COMMENT 'ユーザセッション識別子',
  PRIMARY KEY  (`user_order_copy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='オーダーコピー用テーブル';

--
-- Table structure for table `user_order_hist`
--

DROP TABLE IF EXISTS `user_order_hist`;
CREATE TABLE `user_order_hist` (
  `user_order_hist_id` int(11) NOT NULL auto_increment COMMENT '変更履歴ID',
  `user_order_id` int(11) NOT NULL COMMENT '注文ID',
  `cart_id` int(11) NOT NULL COMMENT 'カートID',
  `cart_item_num` int(11) NOT NULL COMMENT '商品個数',
  `cart_status` int(11) default NULL COMMENT '0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル',
  `user_order_hist_user` varchar(255) default NULL COMMENT '変更管理者',
  `user_order_hist_created_time` datetime NOT NULL COMMENT '作成日時',
  `user_order_hist_updated_time` datetime default NULL COMMENT '更新日時',
  `user_order_hist_deleted_time` datetime default NULL COMMENT '削除日時',
  `user_order_hist_status` int(11) NOT NULL default '1' COMMENT 'ステータス 1:有効 0:無効',
  PRIMARY KEY  (`user_order_hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='管理変更履歴テーブル';

--
-- Table structure for table `user_prof`
--

DROP TABLE IF EXISTS `user_prof`;
CREATE TABLE `user_prof` (
  `user_prof_id` int(11) NOT NULL auto_increment COMMENT 'ユーザプロフID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `config_user_prof_id` int(11) NOT NULL COMMENT 'ユーザプロフィール項目ID',
  `user_prof_value` text NOT NULL COMMENT 'ユーザプロフィール項目内容',
  PRIMARY KEY  (`user_prof_id`),
  KEY `config_user_prof_id` (`config_user_prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザプロフテーブル';

--
-- Table structure for table `user_sound`
--

DROP TABLE IF EXISTS `user_sound`;
CREATE TABLE `user_sound` (
  `user_sound_id` int(11) NOT NULL auto_increment COMMENT 'ユーザサウンドID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `sound_id` int(11) NOT NULL COMMENT 'サウンドID',
  `user_sound_status` tinyint(1) NOT NULL COMMENT 'ユーザサウンドステータス （1：有効 ,0：無効）',
  `user_sound_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `user_sound_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `user_sound_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`user_sound_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ユーザサウンドテーブル';

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL auto_increment COMMENT 'ビデオID',
  `video_name` text NOT NULL COMMENT 'ビデオ名',
  `video_desc` text NOT NULL COMMENT 'ビデオ説明',
  `video_file1` varchar(255) default NULL COMMENT 'ビデオファイル1(一覧表示用ファイル)',
  `video_file2` varchar(255) default NULL COMMENT 'ビデオファイル2(詳細表示用ファイル)',
  `video_file_d` varchar(255) default NULL COMMENT 'DOCOMO用ビデオファイル',
  `video_file_a` varchar(255) default NULL COMMENT 'AU用ビデオファイル',
  `video_file_s` varchar(255) default NULL COMMENT 'SOFTBANK用ビデオファイル',
  `video_sample_d` varchar(255) default NULL COMMENT 'DOCOMO用サンプル動画ファイル',
  `video_sample_a` varchar(255) default NULL COMMENT 'AU用サンプル動画ファイル',
  `video_sample_s` varchar(255) default NULL COMMENT 'SoftBank用サンプル動画ファイル',
  `video_point` int(11) NOT NULL default '0' COMMENT 'ビデオ消費ポイント',
  `video_status` tinyint(1) NOT NULL default '0' COMMENT 'ビデオステータス （1：有効, 0：無効）',
  `video_category_id` int(11) NOT NULL default '0' COMMENT 'ビデオカテゴリID',
  `video_stock_num` int(11) NOT NULL default '0' COMMENT 'ビデオ配信終了数',
  `video_stock_status` tinyint(1) NOT NULL default '0' COMMENT 'ビデオ配信終了数ステータス （1：有効, 0：無効）',
  `video_created_time` datetime default '0000-00-00 00:00:00' COMMENT '作成日時',
  `video_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '更新日時',
  `video_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '削除日時',
  `video_start_time` datetime default '0000-00-00 00:00:00' COMMENT 'ビデオ配信開始日時',
  `video_start_status` tinyint(1) NOT NULL default '0' COMMENT 'ビデオ配信開始ステータス(0:無効,1:有効)',
  `video_end_time` datetime default '0000-00-00 00:00:00' COMMENT 'ビデオ配信終了日時',
  `video_end_status` tinyint(1) NOT NULL default '0' COMMENT 'ビデオ配信終了日時ステータス （1：有効, 0：無効）',
  PRIMARY KEY  (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ビデオテーブル';

--
-- Table structure for table `video_category`
--

DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `video_category_id` int(11) NOT NULL auto_increment COMMENT 'ビデオカテゴリID',
  `video_category_name` text NOT NULL COMMENT 'ビデオカテゴリ名',
  `video_category_desc` text NOT NULL COMMENT 'ビデオカテゴリ説明',
  `video_category_status` int(11) NOT NULL default '0' COMMENT 'ビデオカテゴリステータス （1：有効, 0：無効）',
  `video_category_priority_id` int(11) NOT NULL default '0' COMMENT 'ビデオカテゴリ優先度ID',
  `video_category_file1` varchar(255) default NULL COMMENT 'ビデオカテゴリファイル1',
  `video_category_color` varchar(255) default NULL COMMENT 'ビデオカテゴリ色',
  PRIMARY KEY  (`video_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ビデオカテゴリテーブル';
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-09-24  3:10:40
