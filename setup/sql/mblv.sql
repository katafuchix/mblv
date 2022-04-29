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
INSERT INTO `admin` VALUES (1,'root','mobile','ZEKNn2e5','account,ad,analytics,avatar,banner,bbs,blacklist,blog,comment,community,config,contents,decomail,ec,emoji,file,game,htmlltemplate,image,movie,magazine,mailtemplate,media,message,news,ngword,point,ranking,report,segment,sound,video,stats,user,util','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295','16,19,20',2),(2,'������','mobile1','sns1','','','',1),(3,'!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\ ','1,40,59,61','','',1),(10,'����å�1,2������','id','id','29,42,43,55,56','','1,2',1),(11,'tesutop','tesu','top','','','',0),(12,'tesutop','tesu4','top','','','',0),(13,'tesutop','tesu3','top','','','',1),(14,'tesutop','tesu2','top','','','',1),(15,'tesutop','tesu1','top','','','',1),(16,'�����ѡ�������','root','adgj','account,ad,analytics,avatar,banner,bbs,blacklist,blog,comment,community,config,contents,decomail,ec,emoji,file,game,htmlltemplate,image,magazine,mailtemplate,media,message,news,ngword,point,ranking,report,segment,sound,stats,user,util','','16,19,20',2),(17,'�ƥ��ȴ�����','testadmin','testadmin','1,2,3,4,5,6,26,32,33,34,38,39,42,44,49,56,57,60,61','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,114,115,116,117,118,119,222,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163160,161,162,163,188,189,190,191,192,193,194,195,196,197,198,206,207,208,209,210,211,212,221,248,249,250,251,252,275,276,277,278,279,280,281,275,287,288,289,290,291,util','',0),(18,'���¥ƥ�����','authtest','authtest','38,61',NULL,'',1),(19,'����å״�����','shop1xxxxx','shop1','ec,point,user',NULL,'16',1),(20,'����å״����ԣ�','shop2','adgj','ec,point,user',NULL,'19',1);

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` tinyint(1) unsigned NOT NULL auto_increment COMMENT '����ե���ID',
  `config_type` varchar(16) NOT NULL COMMENT '����ե���������',
  `site_name` varchar(128) default NULL COMMENT '������̾',
  `site_url` varchar(255) default NULL COMMENT '������URL',
  `site_company_name` text COMMENT '�����ȱ��Ĳ��',
  `site_phone` varchar(255) default NULL COMMENT '���ĸ������ֹ�',
  `site_html_title` text COMMENT 'HTML������̾',
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
  `site_ngword` text COMMENT 'NG���',
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
INSERT INTO `config` VALUES (1,'config','�ƥ��Υ�','http://mblv.varth.jp/','�������ABCDEFG','03-0000-0000','�ƥ��Υ�','[x:0001]���Ļ�̳�ɤ���Τ��Τ餻[x:0001]\r\n[x:0138]���ε��᤽�������Ǥ���[x:0138]',1,0,'���ӥ����ȹ��ۥץ�åȥե�����','���ӥ����ȹ��ۥץ�åȥե�����','noindex,nofollow','���ӥ����ȹ��ۥץ�åȥե�����','#FFFFFF','#595959','#004A7F','#0099CC','#004A7F','#FF9933','#F8F8FF','#6AD500','#FF9933','#009900','#000000','#E9E9E9','#BF6000','#FF0000','�����̷�\r\n�Ĵ�\r\n����\r\n­�ڤ�\r\n�����\r\n������\r\n����\r\n�\r\n������\r\n������\r\n����\r\n��¿\r\n�����\r\n��\r\n���襤��\r\n��˷\r\n��������\r\n��������ϻ\r\n����\r\n����\r\n���㤤\r\n���\r\n����\r\n����\r\n����\r\n����\r\n�����\r\n����\r\n����\r\n��ʹ�\r\n����\r\n����\r\n����\r\n���ӿ�\r\n���Ȥ�\r\n����\r\n����\r\n����\r\n��������\r\n���ľɻ�\r\n���塼\r\n������\r\n����\r\n����ä�\r\n�����\r\n�����\r\n�����۾�\r\n����\r\n��Ѥ\r\n����\r\n������\r\n������\r\n��ϩ����\r\n�ݽ���\r\n�ݽ���\r\n������\r\n�������\r\n�軰��\r\n������\r\n���å��ޥ�\r\n�η��٤�\r\n����\r\n����󥳥�\r\n�润\r\nī����Ȳ\r\n��\r\nϸ\r\nϸ����\r\n�㳫ȯ��\r\n��Ǿ\r\n��Ǿ��\r\n����\r\n�����\r\n����\r\n�ü�ص�\r\n�ü�ع�\r\n�ɤ䳹\r\n�˻�\r\n�˻���\r\n�˻���\r\n�ɤ����\r\n�ڿ�\r\n�ɥ�\r\n�ɥ䳹\r\n�ȥ륳��\r\n�ȥ륳��Ϥ\r\n�ɤ�ɴ��\r\n�ʥ���\r\n����\r\n�˥���\r\n�˥���\r\n��­\r\n�����\r\n����\r\n����\r\nǾ���\r\n�ϼ��Ǥ�����Ǥ�\r\n����\r\n�϶�\r\n����\r\nȾ���\r\n�������\r\n��\r\n����\r\n��ϲ��\r\n����\r\n�ݥ��ڥ�\r\n��������\r\n����\r\n̤����\r\n̤��ȯ��\r\n�ظž�\r\n�տ�\r\n����\r\nʸ��\r\n����\r\nϪ��\r\n��󡦥ѥ�\r\n���ѥ�\r\n����\r\n����\r\n������\r\n������\r\n�������\r\n�������\r\n���\r\n�ۥ�����\r\n�ۤ�����\r\n���å���\r\n���ä���\r\nSEX\r\n�ޥ�\r\n�ޤ�\r\n���ޥ�\r\n���ޤ�\r\n���ᥳ\r\n���ᤳ\r\n����ȥꥹ\r\n����Ȥꤹ\r\n����\r\n����\r\n����\r\n����\r\n����\r\n�֤û���\r\n�֥å���\r\n���\r\n����\r\n��\r\n����\r\n������\r\n������\r\n�ꥹ�ȥ��å�\r\n�ꤹ�Ȥ��ä�\r\n�ꥹ��\r\n�ꤹ��\r\n@docomo.ne.jp\r\n@ezweb.ne.jp\r\n@softbank.ne.jp\r\npdx.ne.jp\r\n090\r\n080\r\n070\r\n������\r\n���\r\n�ձ��\r\n�ձ�����\r\n���ļ���\r\n���夦���󤸤���\r\n���奦���󥸥���\r\n��������\r\n�Ӥä�\r\n�᤯��\r\n!\"#$%&\'()=~|`{+*}<>?_@[;:],./\\-^\\\r\n����\r\n����',100,20,30,'','||\\\\,#$%&\'()=~','','','','',''),(2,'mall','�ӎʎގ��َʎގ���EC','http://mblv-user.varth.jp/index.php?action_user_ec=true','������ҥƥ��ΥС���','03-5842-1366','�ʤ�Ǥ⤽���ӎʎގ��َʎގ���EC','[x:0001]���Ļ�̳�ɤ���Τ��Τ餻[x:0001]\r\n[x:0138]���ε��᤽�������Ǥ���[x:0138]',1,0,'�ߤ�ʽ��ޤ�ӎʎގ��َʎގ���EC','�ǥ���,���Х���,����åԥ󥰥⡼��,SNS','noindex,nofollow,noarchive','technovarth.co.jp','#FFFFFF','#66333','#ff00FF','#0099CC','#CC66FF','#FF99AA','#FFFFFF','#00AA2B','#f57af4','#009900','#000000','#E9E9E9','#BF6000','#FF0000',NULL,110,120,130,'�ʥӥ��������ƥ�ץ졼��?','','','','���<b>��Х���С���</b>���ϣУţΤ��ޤ�����\r\n������Ďގ�����','����<b>��Х���С���</b>�ϸ��ߥ١����ƥ�����Ǥ�������','��ˤʤˤ򤹤�Ф������狼��ʤ���\r\n��<b>�ץ�ե�����</b>�򽼼¤�����\r\n����ͧã��Ĥ���'),(3,'decomail','�ǥ��᡼�빽�ۥѥå�����',NULL,'������ҥƥ��ΥС���','','�ǥ��᡼����','',1,0,'','','','','','','','','','','','','','','','','','',NULL,0,0,0,'','D503i\r\nD503iS\r\nF503i\r\nF503iS\r\nN503i\r\nN503iS\r\nP503i\r\nP503iS\r\nSO503i\r\nSO503iS\r\nD504i\r\nF504i\r\nF504iS\r\nN504i\r\nN504iS\r\nP504i\r\nP504iS\r\nSO504i\r\nD505i\r\nF505i\r\nF505iGPS\r\nN505i\r\nP505i\r\nSH505i\r\nSH505i2\r\nSO505i\r\nD505iS\r\nN505iS\r\nP505iS\r\nSH505iS\r\nSO505iS\r\nD506i\r\nF506i\r\nN506i\r\nN506iS\r\nN506iS2\r\nP506iC\r\nSH506iC\r\nSO506i\r\nSO506iC\r\nSO506iS\r\nD2101V\r\nN2001\r\nN2002\r\nP2002\r\nP2101V\r\nSH2101V\r\nT2101V\r\nF2051\r\nF2102V\r\nN2051\r\nN2102V\r\nN2701\r\nN2701m\r\nP2102V\r\nF700i\r\nF700iS\r\nN700i\r\nP700i\r\nSA700iS\r\nSH700i\r\nSH700iS\r\nD701i\r\nD701iWM\r\nD702i\r\nD702iF\r\nF702iD\r\nM702iG\r\nM702iS\r\nN701i\r\nN701iECO\r\nN702iD\r\nN702iS\r\nP701iD\r\nP702i\r\nP702iD\r\nP851i_prosolid2\r\nSA702i\r\nSA800i\r\nSH702iD\r\nSH702iS\r\nSO702i\r\n','ST13\r\nKC14\r\nKC15\r\nST14\r\nSN22\r\nSN23\r\nSA24\r\nSA25\r\nTS25\r\nSA28\r\nKC23\r\nSN26\r\nSN27\r\nSN28\r\nKC26\r\nSN29\r\nPT21\r\nSA21\r\nCA21\r\nTS22\r\nSN21\r\nSA22\r\nTS23\r\nCA22\r\nHI23\r\nHI24\r\nTS24\r\nKC22\r\nST21\r\nCA23\r\nSN24\r\nCA24\r\nSN25\r\nST23\r\nCA25\r\nCA26\r\nTS26\r\nKC24\r\nKC25\r\nSA26\r\nTS27\r\nSA27\r\nTS28\r\nST24\r\nSY15\r\nSN17\r\nHI01\r\nHI02\r\nDN01\r\nHI21\r\nKC21\r\nMA21\r\nTS11\r\nHI11\r\nCA11\r\nSY11\r\nSN11\r\nKC11\r\nMA11\r\nMA12\r\nHI12\r\nTS12\r\nCA12\r\nKC12\r\nSY12\r\nDN11\r\nST11\r\nSN12\r\nSN14\r\nSY13\r\nSN13\r\nHI13\r\nMA13\r\nCA13\r\nTS13\r\nST12\r\nSY14\r\nSN15\r\nSN16\r\nKC13\r\nTS14\r\nHI14\r\nCA14\r\nTS21\r\nST22\r\nMIT1\r\nKCT1\r\nKCT2\r\nKCT4\r\nKCT5\r\nKCT6\r\nKCT3\r\nKCT7\r\nKCT8\r\nKCT9\r\nKCTA\r\nKCTB\r\nKCTC\r\nKCTD\r\nKCU1\r\nMAT1\r\nMAT2\r\nMAT3\r\nSYT1\r\nSYT2\r\nSYT3\r\nSYT4\r\nSYT5\r\nTST1\r\nTST2\r\nTST3\r\nTST4\r\nTST5\r\nTST6\r\nTST7\r\nTST8\r\nTST9\r\nHI31\r\nST25','703N\r\n705N\r\n705NK\r\n705P\r\n705SC\r\n705T\r\n706N\r\n706P\r\n706SC\r\n707SC\r\n707SC2\r\n708SC\r\n709SC\r\n802N\r\n803T\r\n804N\r\n804NK\r\n804SS\r\n805SC\r\n810T\r\n821P\r\n821SH\r\n902T\r\n903T\r\n904T\r\nJ-D08\r\nJ-N05\r\nJ-N51\r\nJ-NM02\r\nJ-P51\r\nJ-SA04\r\nJ-SA05\r\nJ-SA06\r\nJ-SA51\r\nJ-SH05\r\nJ-SH07\r\nJ-SH08\r\nJ-SH09\r\nJ-SH10\r\nJ-SH51\r\nJ-SH52\r\nJ-SH53\r\nJ-T06\r\nJ-T07\r\nJ-T08\r\nJ-T09\r\nJ-T10\r\nJ-T51\r\nV301D\r\nV301SH\r\nV301T\r\nV302SH\r\nV302T\r\nV303T\r\nV401D\r\nV401SA\r\nV401SH\r\nV401T\r\nV402SH\r\nV403SH\r\nV501SH\r\nV501T\r\nV502T\r\nV601N\r\nV601SH\r\nV601T\r\nV603T\r\nV604SH\r\nV702MO\r\nV702NK\r\nV702NK2\r\nV702sMO\r\nV703N\r\nV705T\r\nV801SA\r\nV801SH\r\nV802N\r\nV802SE\r\nV803T\r\nV804N\r\nV804NK\r\nV804SS\r\nV902SH\r\nV902T\r\nV903T\r\nV904T','<hr color=\"#ffe4e1\">\r\n<!--��˥塼-->\r\n����HTML�ΰ�<br />\r\n<div style=\"background-color:#ffe4e1; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#ffff00\">[x:0761]</span><span style=\"color:#800000\">��˥塼</span><span style=\"color:#ffff00\">[x:0112]</span><br />\r\n<a href=\"?action_user_decomail_list=true&decomail_category_id=1\"><span style=\"font-size:small; color:#dc143c\">����</span></a>\r\n[x:0761]&nbsp;<a href=\"?action_user_decomail_ranking=true\"><span style=\"font-size:xx-small; color:#ffa500\">�׎ݎ��ݎ���</span></a>\r\n[x:0112]&nbsp;<a href=\"#d_tokusyu\"><span style=\"font-size:xx-small; color:#0000cd\">�ý�</span></a>\r\n[x:0761]<br />\r\n<a href=\"#d_chara\"><span style=\"font-size:xx-small; color:#9370db\">������</span></a>[x:0761]&nbsp;\r\n<a href=\"#d_category\"><span style=\"font-size:xx-small; color:#9370db\">���Î��ގ�</span></a>[x:0112]<br />\r\n</div>\r\n','','����HTML�ΰ�'),(4,'avatar','���Х��������ȹ��ۥѥå�����',NULL,'������ҥƥ��ΥС���','','','',1,0,'','','','','','','','','','','','','','','','','','',NULL,0,0,0,'','','','','','����HTML','����HTML'),(5,'game',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'sound',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'ad',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL auto_increment COMMENT '�ե꡼�ڡ���ID',
  `shop_id` int(11) NOT NULL default '0',
  `contents_code` varchar(255) NOT NULL COMMENT '�ե꡼�ڡ���������',
  `contents_title` text NOT NULL COMMENT '�ե꡼�ڡ��������ȥ�',
  `contents_body` text NOT NULL COMMENT '�ե꡼�ڡ�������ƥ��',
  `contents_status` tinyint(11) NOT NULL COMMENT '�ե꡼�ڡ������ơ����� ��1��ͭ��,0��̵����',
  `contents_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `contents_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `contents_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ե꡼�ڡ����ơ��֥�';
INSERT INTO `contents` VALUES (1,0,'test','�ե꡼�ڡ��������ȥ�1','�ե꡼�ڡ�����ʸ',1,'0000-00-00 00:00:00','2008-04-03 16:30:59','0000-00-00 00:00:00'),(2,0,'test1','2','3',0,'2008-04-03 15:09:32','2008-04-03 16:39:41','2008-04-03 15:40:18'),(3,0,'fortune_index','�ȥåץڡ���','<html>\r\n<head>\r\n<title>�Ŏʎߎ����� ���ǎ��ꤤ</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n</head>\r\n\r\n<body bgcolor=\"#FFFFFF\" text=\"#666666\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n<div align=\"center\"><img src=\"##file13##\" width=\"240\" height=\"40\" alt=\"���ǎ��ꤤ�Ď��̎�\"></div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"���ΎʎގŎ�\"><br>\r\n</div>\r\n<br>\r\n<div style=\"background-color:#336633\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">�Ŏʎߎ����ݿ������</font></div>\r\n</div>\r\n<div style=\"background-color:#ECFFE8\" >4/20 ���ގ��ю��Ҏ��Ύ޷����о�<br>\r\n      4/15 ���ʎގ������դ��ý�����������<br>\r\n      4/10 ���ǡ��ꤤ�����؎��ގŎٿ��ǎ��ɲ�</div>\r\n<div style=\"background-color:#CC3333\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">������ǎ��ꤤ</font> </div>\r\n</div>\r\n<div style=\"background-color:#FFECEC\" >\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"�ý��ʎގŎ�\">�ʤ�Ǥ����׎ݎ��ݎ��ގ�<a href=\"ranking/q001.html\">�����ˎӎä�����</a>��<br>\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"�ý��ʎގŎ�\">���؎��ގŎٿ��ǎ�<a href=\"original/q001/index.html\">���ʤ��������˼��Ԥ�����ͳ</a>�� \r\n<br>\r\n<img src=\"\" width=\"40\" height=\"40\" alt=\"�ý��ʎގŎ�\">��շ��ꤤ��<a href=\"blood/q001/index.html\">��շ��̴�������</a>��\r\n</div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"�ý��ʎގŎ�\"></div>\r\n<font size=\"1\">�������᤻!�ý�<br>\r\n������ˎ�����ʽ��˵���Ĥ���!!<br>\r\n</font> \r\n<div align=\"right\">��<a href=\"##fp1##\">�ý��򸫤�</a></div>\r\n<br>\r\n<div style=\"background-color:#FF6600\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">�Ŏʎߎ����ݿ���</font></div>\r\n</div>\r\n<div style=\"background-color:#FFECCE\" ><a href=\"situation/index.html\">���������������ݿ���</a><br>\r\n  <a href=\"woman/index.html\">���ι����ϸ���</a><br>\r\n  <a href=\"original/index.html\">���؎��ގŎٿ���</a></div>\r\n<div style=\"background-color:#6666CC\">\r\n  <div align=\"center\"><font color=\"#FFFFFF\">�Ŏʎߎ������ꤤ</font></div>\r\n</div>\r\n<div style=\"background-color:#E8E8FF\" ><a href=\"ranking/index.html\">�ʤ�Ǥ����׎ݎ��ݎ���</a><br>\r\n      <a href=\"blood/index.html\">��շ��ꤤ</a></div>\r\n<br>\r\n<div align=\"center\"><img src=\"\" width=\"200\" height=\"30\" alt=\"���ΎʎގŎ�\"></div>\r\n<br>\r\n��Ϣ���Ў��ƎÎ�<br>\r\n<a href=\"\">�ꤤ���</a><br>\r\n<a href=\"\">���Ҏ���</a><br>\r\n<a href=\"\">��ë�ղ�</a><br>\r\n<a href=\"\">������</a><br>\r\n<br>\r\n�ʎߎ܎����Ď��ݎ��������ގ����ޤʤ�<br>\r\n<a href=\"\">�Ŏʎߎ����ݎώ�������</a><br>\r\n<br>\r\n<div align=\"center\"><a href=\"uranai.html\">���ގ���</a>/<a href=\"abatar.html\">���ʎގ���</a>/<a href=\"deco.html\">�Îގ���</a>/<a href=\"sound.html\">�����ݎĎ�</a><br>\r\n</div>\r\n<br>\r\n<div style=\"background-color:#660000\"> \r\n  <div align=\"center\"><font color=\"#FFFFFF\">MENU</font></div>\r\n</div>\r\n<a href=\"\">�б�����</a><br>\r\n<a href=\"\">�ŎʎߎΎߤν�����</a><br>\r\n<a href=\"\">Q&A</a><br>\r\n<a href=\"\">�ώ��͎ߎ�����</a><br>\r\n&#59115;<a href=\"\">�Ŏʎߎ��������TOP��</a> \r\n<hr>\r\n<div align=\"center\">(C)���͎ߎ���������</div>\r\n</body>\r\n</html>\r\n',0,'2008-04-03 17:09:46','2008-08-09 00:11:41','2008-08-09 00:11:41'),(4,0,'decomail_new','�����ο���ǥ��᡼��','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ��ῷ��</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ffe4e1; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#00ff00\">NEW</span><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#00ff00\">�����ο���Ϥ�����</span><br />\r\n</div>\r\n<!--����-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#ff6699\">4/12NEW</span><br />\r\n<img src=\"##file16##\"  width=\"70\" height=\"80\"><br />\r\n<a href=\"xxxx\"><span style=\"font-size:xx-small;\">�ԤäƤ��ޡ���<br />�ʎ׎ˎߎ�&���ˎߎ���<br />��5pt��<br /></span></a><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#ff6699\">�����ο���</span><br />\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:small;\">\r\n<a href=\"xxxx\"><span style=\"color:#ff6699\">4/11(��)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/10(��)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/9(��)</span></a><br />\r\n<a href=\"xxxx\"><span style=\"color:#ff6699\">4/8(��)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/7(��)</span></a>&nbsp;<a href=\"xxxx\"><span style=\"color:#ff6699\">4/6(��)</span></a><br />\r\n</div>\r\n\r\n\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--���ƥ���-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\n���ƥ���</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">�夦��</span></a>��<span style=\"font-size:xx-small; color:#808080\">ή�ԤΎ����ݎĎޤǎ��������򎶎����ώ�����</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">���ʎގ���</span></a>��<span style=\"font-size:xx-small; color:#ff69b4\">�ӎÿ���������������ؤ��褦</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">���ގ���</span></a>��<span style=\"font-size:xx-small; color:#6aacee\">���⤷�펹�ގ��ѤΎ��ݎʎߎڎ��Ď�</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">�������ˎߎݎ���</span></a>��<span style=\"font-size:xx-small; color:#e6b422\">ɬ�������㤤������</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">�ꤤ</span></a>��<span style=\"font-size:xx-small; color:#9d5b8b\">���ێ��ĤǤ��ʤ�����¦�����</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\"></span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\"></span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 10:59:10','2008-08-09 00:11:27','2008-08-09 00:11:27'),(5,0,'decomail_puchi','�פ��դ�Ҳ�','	<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ���פ��դ�Ҳ�</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<span style=\"color:#808000\">�פ�&#59203;�դ�DECO�����񤹤��&#59125;<br />��ä�&#59178;���܎����Îގ��Ҥ����äѤ�&#59163;</span><br />\r\n<span style=\"color:#ff6699; font-size:small\">����??�ʥѥݎ̎ߎڎ��ގݎ�&#59013;</span>\r\n</div>\r\n<div style=\"background-color:#ff6699; text-align:center; font-size:xx-small;\">\r\n�פ�&#59203;�դ�DECO�ä�?<br />\r\n</div>\r\n<div style=\"background-color:#ffffff; font-size:xx-small;\">\r\n<span style=\"color:#ff6699; font-size:x-small\">�פ�&#59203;�դ�DECO</span>�����ˤ����ʤ��͵������׎������ΎÎގ��Ҥ��Ȥ�����&#59175;�פ�&#59203;�դ�DECO������<span style=\"color:#ff6699; font-size:x-small\">�����ۿ�</span>������<br />\r\n</div>\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\n<span style=\"color:#fa8072; font-size:x-small\">�Îގ��ҤǺ����դ������Ď�&#59159;</span><br />\r\n<span style=\"color:#7cfc00; font-size:x-small\">���Ĥ�ΎÎގ��Ҥ�˰�����Ď�&#59143;</span><br />\r\n<span style=\"color:#00bfff; font-size:x-small\">���襤���Îގ��Ҥ��������ꤿ���Ď�&#59021;</span><br />\r\n<span style=\"color:#dda0dd; font-size:x-small\">�Îގ��Ҥǵ����������������Ď�&#59169;</span><br />\r\n�ˎ������ҤǤ�<br />\r\n</div>\r\n<br />\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\n<span style=\"color:#ffff00 ; font-size:xx-small\">&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;</span><br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">�פ�&#59203;�դ�DECO����Ͽ</a><br />\r\n<span style=\"color:#ffff00 ; font-size:xx-small\">&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;&#59162;&#59130;</span><br />\r\n</div>\r\n<br />\r\n<div style=\"background-color:#ffffff; font-size:xx-small; text-align:center;\">\r\n����ʤˤ��襤���Îގ��Ҥ��Ȥ�����<br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">�͵�No.1����ޤ�</a><br />\r\n<img src=\"##file18##\" /><br />\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\">�ޤ��ޤ������׎��������äѤ�</a><br />\r\n<img src=\"##file19##\" /><br />\r\n</div>\r\n\r\n\r\n\r\n\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"http://puchifuru.jp/p300/index.jsp?uid=NULLGWDOCOMO\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 10:59:41','2008-08-09 00:11:38','2008-08-09 00:11:38'),(6,0,'decomail_chara_alice','�����/���ꥹ','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ��ᤢ�ꤹ</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#f14e69; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file20##\" /><br />\r\n<a href=\"xxxx\">���ڶ��ι�Τ��ꤹ</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#f14e69; font-size:xx-small;\">\r\nͭ轻�(���ꤹ)�ȵ�����(���ꤹ)���ܤ����˸��줿�Ի׵Ĥʹ�ǭ�������줬�Τꤿ���ä���Ĥ�����ʤ�������ǭ�ˤ���Ͷ�����ͤ�ˬ�줿���Ϥޤ�����ڶ����������䤫�ʿ��̤Ȳ�ͻ�礹���Ի׵Ĥʰ����֤��ä���������̴�ζ��֤�̥������ѳ����12�Фξ��������ώ����Ĥ����и������Ӥ���\r\n</div>\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--���ƥ���-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\n���ƥ���</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">�夦��</span></a>��<span style=\"font-size:xx-small; color:#808080\">ή�ԤΎ����ݎĎޤǎ��������򎶎����ώ�����</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">���ʎގ���</span></a>��<span style=\"font-size:xx-small; color:#ff69b4\">�ӎÿ���������������ؤ��褦</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">���ގ���</span></a>��<span style=\"font-size:xx-small; color:#6aacee\">���⤷�펹�ގ��ѤΎ��ݎʎߎڎ��Ď�</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">�������ˎߎݎ���</span></a>��<span style=\"font-size:xx-small; color:#e6b422\">ɬ�������㤤������</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">�ꤤ</span></a>��<span style=\"font-size:xx-small; color:#9d5b8b\">���ێ��ĤǤ��ʤ�����¦�����</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:07:21','2008-08-09 00:11:36','2008-08-09 00:11:36'),(7,0,'decomail_chara_busane','�����/�֤���','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ���֤�������</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ffff9a; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file21##\" /><br />\r\n<a href=\"xxxx\">�֤�������</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#ffff9a; font-size:xx-small;\">\r\n�ޤ����¤ι�꤬ɺ����Į����Τ�Ȥμ�:����ǭ�����͎��������Ƥ���֤��ͤȸƤФ쎤��Τ�ȤΤߤʤ餺�����Ǥ����äȤ���ͭ̾��(ǭ?)���Ǥä֤�Ȥ����ΎގÎގ��ȸ������܎��������ճ��Ȼи�ȩ������ǭ�Τ��ޤ�䤴���Ύ��ڎ̎�ǭ���؎��ގ͎ގ������������ʤ��ǤΤ�Ӥ�ޤä���Ĥ��ΰ����٤�ǭ�܎��َĎޤ��Ϥ����ޤ���\r\n</div>\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--���ƥ���-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\n���ƥ���</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">�夦��</span></a>��<span style=\"font-size:xx-small; color:#808080\">ή�ԤΎ����ݎĎޤǎ��������򎶎����ώ�����</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">���ʎގ���</span></a>��<span style=\"font-size:xx-small; color:#ff69b4\">�ӎÿ���������������ؤ��褦</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">���ގ���</span></a>��<span style=\"font-size:xx-small; color:#6aacee\">���⤷�펹�ގ��ѤΎ��ݎʎߎڎ��Ď�</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">�������ˎߎݎ���</span></a>��<span style=\"font-size:xx-small; color:#e6b422\">ɬ�������㤤������</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">�ꤤ</span></a>��<span style=\"font-size:xx-small; color:#9d5b8b\">���ێ��ĤǤ��ʤ�����¦�����</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:07:55','2008-08-09 00:11:33','2008-08-09 00:11:33'),(8,0,'decomail_chara','�����','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ��ᥭ������</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#e0ffff; text-align:center; font-size:xx-small;\">\r\n����饯��������\r\n\r\n</div>\r\n<div style=\"background-color:#ffffff; text-align:center; font-size:xx-small;\">\r\n<a href=\"mochi_index.html\"><img src=\"##file32##\" /></a><a href=\"busane_index.html\"><img src=\"##file23##\" /></a><a href=\"alice_index.html\"><img src=\"##file22##\" /></a><br />\r\n<a href=\"../puchi_info.html\">\r\n<img src=\"##file24##\" /><img src=\"##file25##\" /><img src=\"##file26##\" /><br />\r\n<img src=\"##file27##\" /><img src=\"##file39##\" /><img src=\"##file29##\" /><br />\r\n<img src=\"##file30##\" /><img src=\"##file33##\" /><img src=\"##file34##\" /><br />\r\n<img src=\"##file35##\" /><img src=\"##file37##\" /><img src=\"##file38##\" /></a><br />\r\n<br />\r\n</div>\r\n\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"../puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--���ƥ���-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\n���ƥ���</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">�夦��</span></a>��<span style=\"font-size:xx-small; color:#808080\">ή�ԤΎ����ݎĎޤǎ��������򎶎����ώ�����</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">���ʎގ���</span></a>��<span style=\"font-size:xx-small; color:#ff69b4\">�ӎÿ���������������ؤ��褦</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">���ގ���</span></a>��<span style=\"font-size:xx-small; color:#6aacee\">���⤷�펹�ގ��ѤΎ��ݎʎߎڎ��Ď�</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">�������ˎߎݎ���</span></a>��<span style=\"font-size:xx-small; color:#e6b422\">ɬ�������㤤������</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">�ꤤ</span></a>��<span style=\"font-size:xx-small; color:#9d5b8b\">���ێ��ĤǤ��ʤ�����¦�����</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:08:19','2008-08-09 00:11:31','2008-08-09 00:11:31'),(9,0,'decomail_chara_mochi','�����/���','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ�����ǥ������ޤ�</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#808080\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<div style=\"background-color:#ecd9b0; text-align:center; font-size:xx-small;\">\r\n<img src=\"##file31##\" /><br />\r\n<a href=\"xxxx\">����ޤ�</a><br />\r\n</div>\r\n\r\n<div style=\"background-color:#ecd9b0; font-size:xx-small;\">\r\n�������Τ������˽���Ǥ����Ի׵Ĥ�����ʪ�ؤ���ޤ��!�ؤ���٤������ޤ줿�ؤ���ޤ�٤����ώ���������Ҥ�����掤�����Ƥߤ���Ȣ�Τߤ��󤿤��ˤޤ��쎤���ä�����©��Ď����ȤΤ�����Ȥ���������ۤ�狼�ᤴ���Ƥޤ����⤷���ʤ��Τ��ȤΤ��ۻҤ�Ȣ����ˡؤ���ޤ�٤�����Ǥ����鎤���ä���ѻ����ƤߤƎȎ�\r\n</div>\r\n<!--�פ��դ�DECO��ͶƳ���-->\r\n<div style=\"background-color:#ffffff; text-align:center;\">\r\n<a href=\"puchi_info.html\"><img src=\"##file17##\" width=\"240\" height=\"50\" border=\"1\" /></a><br />\r\n<hr color=\"#c4a3bf\">\r\n</div>\r\n\r\n<!--���ƥ���-->\r\n<div style=\"background-color:#fff4ff; text-align:center;\">\r\n<span style=\"font-size:xx-small; color:#0000cd\">\r\n���ƥ���</span>\r\n</div>\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left;\">\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9400d3\">�夦��</span></a>��<span style=\"font-size:xx-small; color:#808080\">ή�ԤΎ����ݎĎޤǎ��������򎶎����ώ�����</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#ff0000\">���ʎގ���</span></a>��<span style=\"font-size:xx-small; color:#ff69b4\">�ӎÿ���������������ؤ��褦</span><br />\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#0000cd\">���ގ���</span></a>��<span style=\"font-size:xx-small; color:#6aacee\">���⤷�펹�ގ��ѤΎ��ݎʎߎڎ��Ď�</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#808000\">�������ˎߎݎ���</span></a>��<span style=\"font-size:xx-small; color:#e6b422\">ɬ�������㤤������</span><br />\r\n\r\n\r\n<a href=\"xxxx\"><span style=\"font-size:x-small; color:#9a493f\">�ꤤ</span></a>��<span style=\"font-size:xx-small; color:#9d5b8b\">���ێ��ĤǤ��ʤ�����¦�����</span><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:left; font-size:xx-small\">\r\n<span style=\"font-size:x-small; color:#ff69b4\">&#59086;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�б��������</span></a><br />\r\n<span style=\"font-size:x-small; color:#9a493f\">&#59201;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�ŎʎߎΎߤν�����</span></a><br />\r\n<span style=\"font-size:x-small; color:#d4ff00\">&#59011;</span><a href=\"xxxx\"><span style=\"color:#6aacee\">�Îގ��Ҥθ�</span></a><br />\r\n<span style=\"font-size:x-small; color:#ff0000\">&#59021;</span><a href=\"xxxxx\"><span style=\"color:#6aacee\">�ώ��͎ߎ�����</span></a><br>\r\n&#59106;<a href=\"napa_decome_top.html\" accesskey=\"1\"><span style=\"color:#6aacee\">�Îގ���TOP</span></a><br>\r\n&#59115;<a href=\"napatown.html\" accesskey=\"0\"><span style=\"color:#6aacee\">�Ŏʎߎ��������TOP�͎ߎ����ޤ�</span></a><br /><br />\r\n</div>\r\n\r\n\r\n<div style=\"background-color:#fff4ff; text-align:center; font-size:x-small\">\r\n(C)���͎ߎ���������\r\n</div>\r\n\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-08 11:08:47','2008-08-09 00:11:25','2008-08-09 00:11:25'),(10,0,'system_game_device','�����ƥ�/������/�б�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�������б�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�����˥������б�����򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-04-08 15:31:37','2008-08-09 00:41:43','0000-00-00 00:00:00'),(11,0,'media_fuji','�����ϩ�̥ڡ���/fuji','<!--�إå���-->\r\n<html>\r\n<head>\r\n<title>����SNS�ѥå�����</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\"></meta>\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\"></meta>\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\"></meta>\r\n<meta http-equiv=\"Expires\" content=\"0\"></meta>\r\n<meta name=\"description\" content=\"����SNS�ѥå�����\">\r\n<meta name=\"keywords\" content=\"���� SNS �ѥå�-��\">\r\n<meta name=\"robots\" content=\"noindex,nofollow\">\r\n<meta name=\"author\" content=\"���� SNS �ѥå�-��\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\"/>\r\n</head>\r\n<body style=\"color:#595959; background-color:#FFF6D9\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:#004A7F}\r\na:visited{color:#004A7F}\r\n]]>\r\n\r\n</style>\r\n\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n<a href=\"top\"></a>\r\n<div align=\"center\" style=\"color:#F8F8FF;font-size:small;background:#FF9933;text-align:center;\">\r\n	<span style=\"display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite\">\r\n		<span style=\"font-size:small;color:#FFFF33;text-decoration: blink;\">������</span>\r\n		�͵�ʨƭ��\r\n		<span style=\"font-size:small;color:#FFFF33;text-decoration: blink;\">������</span>\r\n	</span>\r\n\r\n</div>\r\n<!--���顼��å�����ɽ������-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;background:#ffffff;\">\r\n	</div>\r\n<!--���顼��å�����ɽ����λ-->\r\n<!--����������-->\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">\r\n	<img src=\"img/logo.gif\" align=\"center\" style=\"text-align:center\"><br />\r\n</div>\r\n<!--��������λ-->\r\n\r\n<!--�����ȥ�-->\r\n<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\"><img src=\"http://snsvemoji.varth.jp/docomo/1.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">�ߤ�ʤ��Ĥޤ�SNS<img src=\"http://snsvemoji.varth.jp/docomo/1.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span></div>\r\n<!--�����󳫻�-->\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:medium;\">\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<a href=\"mailto:##media_mailaddress[fuji]##?subject=�����Ͽ&body=���ΤޤގҎ��٤��������Ƥ�������\">\r\n<span style=\"color:#6AD500;\">̵�������Ͽ</span></a>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n<a href=\"mailto:##media_mailaddress[fuji]##?subject=�����Ͽ&body=���ΤޤގҎ��٤��������Ƥ�������\">\r\n<span style=\"color:#6AD500;\">̵�������Ͽ</span></a>\r\n<span style=\"font-size:small;text-decoration: blink;\">\r\n<img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\">\r\n</span>\r\n	<span style=\"font-size:small;text-decoration: blink;\"><img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span>\r\n	<a href=\"mailto:##media_mailaddress[fuji]##?subject=�����Ͽ&body=���ΤޤގҎ��٤��������Ƥ�������\"><span style=\"color:#6AD500;\">̵�������Ͽ</span></a>\r\n	<span style=\"font-size:small;text-decoration: blink;\"><img src=\"http://snsvemoji.varth.jp/docomo/114.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></span>\r\n</div>\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">\r\n	[<a href=\"?action_user_login_do=true&easy_login=true&guid=ON\">���������<img src=\"http://snsvemoji.varth.jp/docomo/150.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"></a>]<br />\r\n	�ێ��ގ��ݤǤ��ʤ�����<a href=\"?action_user_login=true\">������</a>\r\n\r\n</div>\r\n<!--������λ-->\r\n\r\n<!--����ƥ�ĳ���-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n		<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">���ʎގ���</span></div>\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/a1.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">���ʎގ���</a><br />\r\n\r\n			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />\r\n			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/a2.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n\r\n			<a href=\"?action_user_util=true&page=about-regist\">���ʎގ���</a><br />\r\n			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />\r\n			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">�Îގ���</span></div>\r\n\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/d1.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">�Îގ���</a><br />\r\n			�Îގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ���<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/d2.gif\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">�Îގ���</a><br />\r\n			�Îގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ���<br />\r\n		</span>\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n\r\n	\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">���ގ���</span></div>\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/g1.jpg\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">���ގ���</a><br />\r\n			���ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ���<br />\r\n		</span>\r\n\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n	\r\n	<div align=\"left\" style=\"text-align:left;float:left;\">\r\n		<img src=\"img/g2.jpg\" align=\"left\" style=\"float:left;margin:0px 5px 0px 5px;\" />\r\n		<span style=\"margin-top:5px;\">\r\n			<a href=\"?action_user_util=true&page=about-regist\">���ގ���</a><br />\r\n			���ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ���<br />\r\n		</span>\r\n\r\n	</div>\r\n	<br clear=\"all\" style=\"clear:all;display:none;\" /><div align=\"center\" style=\"text-align:center;float:top center;\"><img src=\"http://snsvuser.varth.jp/img/line3.gif\"/></div>\r\n</div>\r\n<!--����ƥ�Ľ�λ-->\r\n\r\n<!--�����ȥ�-->\r\n<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">���Ύߎ��ĎҎƎ���</span></div>\r\n<!--���ݡ��ȥ�˥塼����-->\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=about-sns\">SNS�ѥå������ˤĤ���</a><br />\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=about-regist\">������Ͽ�ˤĤ���</a><br />\r\n\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=caution\">��ջ���</a><br />\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=support\">�䤤��碌</a><br />\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=about-device\">�б�����</a><br />\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=privacy\">�̎ߎ׎��ʎގ����Ύߎ؎���</a><br />\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=terms\">���ѵ���</a><br />\r\n\r\n	<span style=\"color:#6AD500\">��</span><a href=\"?action_user_util=true&page=company\">��ҳ���</a>\r\n</div>\r\n<!--���ݡ��ȥ�˥塼��λ-->\r\n\r\n<!--�եå���-->\r\n<br />\r\n<hr color=\"#FF9933\" style=\"border:solid 1px #FF9933;\">\r\n	<!--̤��������եå�������-->\r\n	<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n		<img src=\"http://snsvemoji.varth.jp/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"?action_user_index=true&ma_hash=\" accesskey=\"0\">�Ď��̎�</a>\r\n\r\n	</div>\r\n	<!--̤��������եå�����λ-->\r\n	<div style=\"text-align:center; background-color:#FF9933\"><span style=\"color:#F8F8FF;font-size:small\">(c)SNS�ѥå�����</span></div>\r\n</div>\r\n<!--����ƥʽ�λ-->\r\n</body>\r\n</html>',1,'2008-04-13 16:05:53','2008-06-02 15:30:31','0000-00-00 00:00:00'),(12,0,'sound_device','�������/�б�����','<HTML>\r\n<HEAD>\r\n<META http-equiv=\"Content-Type\" content=\"text/html; charset=SHIFT_JIS\">\r\n	<TITLE>�ʥѥ����󥵥����</TITLE>\r\n</HEAD>\r\n\r\n<body bgcolor=\"#ffffff\" text=\"#666666\" link=\"#3399FF\" vlink=\"#3399FF\">\r\n\r\n<table width=\"100%\">\r\n<tr bgcolor=\"blue\" align=\"center\"><td><font color=\"#ffffff\">�б�����</font></td></tr>\r\n</table>\r\n\r\n<hr color=\"#ffffff\">\r\n\r\n�������б�����򵭺ܤ��Ƥ���������\r\n\r\n\r\n<hr color=\"blue\">\r\n\r\n<hr color=\"blue\">\r\n<div align=\"center\">(c)SPACEOUT</div>\r\n</BODY>\r\n</HTML>\r\n',0,'2008-04-16 01:56:48','2008-06-02 15:29:51','2008-06-02 14:57:34'),(13,0,'system_regist','�����ƥ�/�������','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�褦����</span>\r\n</div>\r\n<div style=\"text-align:right;font-size:small;\">\r\n[x:0109]<a href=\"?action_user_login_do=true&easy_login=true&guid=ON\">��������ώ�����</a>\r\n</div>\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n[x:0107]<a href=\"mailto:##regist_mailaddress##?subject=�����Ͽ&body=���ΤޤގҎ��٤��������Ƥ�������\">̵�������Ͽ</a>[x:0107]\r\n</div>\r\n<br />\r\n<div style=\"text-aling:left;font-size:small;\">\r\n##site_name##�Ǥϵ��ι礦��ͧã����֤򸫤Ĥ�������Ǥ��ޤ���<br />\r\n������Ҏ��١����Ў��ƎÎ���ȤäƤ�ͧã���ؤ򹭤��Ƥ��������͡�<br />\r\n����¾�����ގ��ѡ��夦�������ǎ��ꤤ���Îގ��ҡ����ʎގ��������ڤ���뵡ǽ�������ʎߎ��Ǥ���<br />\r\n����̵����ͷ�٤�ΤǤȤäƤ⤪���Ǥ���<br />\r\n</div>\r\n<br />\r\n<div style=\"text-align:center;font-size:small;\">\r\n[x:0107]<a href=\"mailto:##regist_mailaddress##?subject=�����Ͽ&body=���ΤޤގҎ��٤��������Ƥ�������\">̵�������Ͽ</a>[x:0107]<br />\r\n<br />\r\n[x:0068]<a href=\"fp.php?code=system_terms\">���ѵ���</a><br />\r\n[x:0204]<a href=\"fp.php?code=system_policy\">�̎ߎ׎��ʎގ����Ύߎ؎���</a>\r\n</div>\r\n<br />\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;\">���ǎҎ����к��򤵤�Ƥ�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n���ǎҎ����к��򤵤�Ƥ������ϡ�##mail_domain##�ͤ�����Ǥ���褦�˲����򎺎ˎߎ��������ꤷ�Ƥ���������\r\n<div style=\"text-align:center;font-size:small;\">\r\n<form action=\"index.php\">\r\n<input type=\"text\" id=\"address\" size=\"20\" value=\"##mail_domain##\" />\r\n</form>\r\n</div>\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n\r\n\r\n\r\n\r\n',1,'0000-00-00 00:00:00','2008-08-17 13:27:16','0000-00-00 00:00:00'),(14,0,'system_ec_return','�����ƥ�/���ʤˤĤ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���ʤˤĤ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n��������ɤ���������ʤ������塢���ʤϤ��������뤳�Ȥ��Ǥ��ޤ���ͽ�ᤴλ������������<br />\r\n<br />\r\n��[���ʤΤ��Ϥ�����]<br />\r\n���ҤǤϸ�§�������ǧ��10������ˤ�ȯ���������ޤ�������ʾ�Ȥʤ����ͽ�ᤴϢ�������ޤ���<br />\r\n�������ξ�硢���̤���������Ƥ���ȯ�����ʹߤ�ȯ���Ȥʤ�ޤ��Τǡ�ͽ�ᤴλ������������<br />\r\n<br />\r\n��[��ʸ�����ݎ��٤ˤĤ���]<br />\r\n��۳���Ҏ��٤����ո壱���ֲ᤮�Ƥ����⤬���ꤵ��ʤ����ϡ���ưŪ�ˎ����ݎ��٤Ȥ����Ƥ��������ޤ��Τǡ�ͽ�ᤴλ������������<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 18:24:11','2008-08-09 00:43:06','0000-00-00 00:00:00'),(15,0,'system_ec_guide','�����ƥ�/EC�����ѥ�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�����ю��ގ��Ď�</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n��<a href=\"index.php?action_user_ec_util=true&page=first\">���Ƥ���</a><br />\r\n<br />\r\n��<a href=\"index.php?action_user_ec_util=true&page=register\">�����Ͽ�ˤĤ���</a><br />\r\n\r\n<br />\r\n��<a href=\"index.php?action_user_ec_util=true&page=first#try\">�����ˤĤ���</a><br />\r\n<br />\r\n��<a href=\"fp.php?code=system_terms\">�����ѵ���</a><br />\r\n<br />\r\n��<a href=\"fp.php?code=system_policy\">�̎ߎ׎��ʎގ����ݸ�����</a><br />\r\n<br />\r\n��<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n<br />\r\n\r\n��<a href=\"fp.php?code=system_ec_opinion\">���ո��ώ�����</a><br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n������ʪ�μ��<br />\r\n<span style=\"color:#ff0000\">���ʤ�õ����</span><br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n���ý���õ����<br />\r\n��������ý����䎢�׎ݎ��ݎ��ގ��ʤɤ��ý��򸫤ƾ��ʤ�õ���ޤ���<br />\r\n<br />\r\n�����Î��ގؤ�õ����<br />\r\n�ߤ������ʤ����ꤽ���ʎ��Î��ގؤ򸫤Ĥ��ƾ��ʤ�õ���ޤ���<br />\r\n\r\nƱ���褦�ʾ��ʤ�¿��ɽ������ޤ��Τǎ���ӤǤ��������Ǥ���<br />\r\n<br />\r\n�������܎��Ďޤ�õ����<br />\r\n�ߤ������ʤ�̾���䷿�֤ʤɤ��狼�äƤ����玤���Ύ����܎��Ďޤ����Ϥ���õ����ˡ�Ǥ���<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">���ʤ����Ƥ򸫤褦</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n�ߤ������ʤ򸫤Ĥ����龦�ʎ͎ߎ����ޤ����Ƥ��ǧ���ޤ��礦��<br />\r\n���ʎ͎ߎ����ޤǤώ����ʤβ��������ʤ������򸫤뤳�Ȥ��Ǥ��ޤ���<br />\r\n��ʧ��ˡ��������˺�줺�˳�ǧ���ޤ��礦��<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">�������褦</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n�ߤ������ʤ��������ˤώ��ޤ����ʎ͎ߎ����ޤΎ�����������뎣�򲡤��ƶ�ۤ��ǧ���ޤ���<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">���������ݎ��٤ˤĤ���</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n����ʸ��Ύ����ݎ��٤ˤĤ��ޤ��ƤϤ������Ǥ��ޤ���<br />\r\n<br />\r\n\r\n���������Թ�ˤ�����Ū�ʎ����ݎ��٤ϸǤ����Ǥꤷ�Ƥ���ޤ���<br />\r\n������̵���ʎ����ݎ��٤�ʤ����ޤ��Ȏ������ݎ������ĸ�����䤪���ͤμҲ�Ū�ʿ��Ѥ˴ؤ�����꤬�����ޤ��Τǎ����줰��⤴��դ��������ޤ���<br />\r\n<br />\r\n\r\n�������ξ�玤��Ϣ��̵���ˎ����ݎ��٤�����ĺ�����Ȥ��������ޤ���<br />\r\n1)���μ���ˤ����Ǝ����ݎ��٤��줿���򤬤����玡<br />\r\n2)����Ͽ�������������꤬�����玡<br />\r\n3)��Ϣ�����ʤ��ʤäƤ��ޤä���玡<br />\r\n4)�ＱŪ�˰�æ�������������ߤ����ä���玡<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 18:39:27','2008-08-09 00:42:41','0000-00-00 00:00:00'),(16,0,'system_ec_contact','EC���䤤��碌','<html>\r\n<head>\r\n<title>�ӎʎގ��َʎގ���EC</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\" />\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\" />\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\r\n<meta http-equiv=\"Expires\" content=\"Thu, 01 Dec 1994 16:00:00 GMT\" />\r\n<meta name=\"description\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<meta name=\"keywords\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<meta name=\"robots\" content=\"noindex,nofollow\" />\r\n<meta name=\"author\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"#FFFFFF\" text=\"#66333\" link=\"#ff00FF\" vlink=\"#CC66FF\" alink=\"#0099CC\">\r\n\r\n<div id=\"container\">\r\n<a name=\"top\"></a>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">���䤤��碌</span></div>\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n\r\n��<a href=\"?action_user_ec_util=true&page=first\">���Ƥ���</a><br>\r\n<br>\r\n��<a href=\"?action_user_ec_util=true&page=register\">�����ϿQ&A</a><br>\r\n\r\n<br>\r\n��<a href=\"fp.php?code=system_ec_order\">�����ˤĤ���Q&A</a><br>\r\n<br>\r\n�����䤤��碌�����ˎ�Q&A�����ǧ���ޤ��礦��\r\n<br>\r\n<a href=\"mailto:mblv@ml.technovarth.jp\">���䤤��碌����</a>\r\n\r\n</div>\r\n\r\n<hr color=\"#f57af4\" style=\"border:solid 1px #f57af4;\">\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<img src=\"http://mblv.varth.jp/img_emoji/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"index.php?action_user_index=true\" accesskey=\"0\">�Ď��̎�</a>\r\n</div>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">(c)�ƥ��Υ�</span></div>\r\n\r\n</div>\r\n\r\n</body>\r\n</html>',0,'2008-08-07 19:18:45','2008-08-09 00:16:09','2008-08-09 00:16:09'),(17,0,'system_ec_opinion','�����ƥ�/EC���ո�������˾','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���ո�������˾</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n�ߤʤ��ޤΰո������äƲ������͎��ɤ�ʤ˾����ʤ��ȤǤ�OK!<br />\r\n�ʤ���ĺ�������ո����Ф��Ƥθ��̤β����Ϥ��Ƥ���ޤ���Τǎ�ͽ�ᤴλ����������<br />\r\n<br />\r\n�������罸��ΎÎ���<br />\r\n����ʾ��ʤ��ߤ���!<br />\r\n���㤤�������ʤ����ä��鶵���Ʋ�������<br />\r\n<br />\r\n<a href=\"fp.php?code=system_support\">���ո�������˾������</a>\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 19:23:20','2008-08-09 00:43:17','0000-00-00 00:00:00'),(18,0,'system_ec_dealings','�����ƥ�/���꾦����˴�Ť�ɽ��','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���꾦���ˡ�˴�Ť�ɽ��</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n���������̎�̾<br />\r\n##site_name##<br />\r\n�����Ĳ��<br />\r\n##site_company_name##<br />\r\n����Ǥ��<br />\r\n������Ϻ<br />\r\n�������<br />\r\n����ԡ��������1-2-3 10F<br />\r\n�������ֹ�<br />\r\n##site_phone##<br />\r\n<span style=\"color:#666666\">(10:00��18:00 �������������)</span><br />\r\n�����䤤��碌��<br />\r\n[x:0161]<a href=\"fp.php?code=support\">���䤤��碌</a><br />\r\n���������ʳ���ɬ������<br />\r\n�����ǎ�����������������������ޤ���<br />\r\n�����ʤ��������<br />\r\n���̾��ʎ͎ߎ����ޤ˵���<br />\r\n�����ʰ��ϻ���<br />\r\n���ʤ���ʸ����10������Ǥ��Ϥ��������ޤ��� <br />\r\n�ޤ�����ʸ�����椷����礪�Ϥ����٤���������ޤ���<br />\r\n����ʧ����ˡ<br />\r\n�����ڎ��ގ��Ď����Ď޷��<br />\r\n�����ݎˎގƷ��<br />\r\n�����������<br />\r\n����Կ���<br />\r\n��â����ˡ���͎��ȼ��ͤ���Τ���ʸ�ˤĤ��ޤ��Ƥώ����̎ގݎ��ڎ̎ގݤǤΎ��ݎˎގƷ�Ѥ��Ǥ����ͤޤ��Τǎ����餫���ᤴλ���������ޤ��� <br />\r\n���ޤ������Î�FAX���Ҏ��٤���Τ���ʸ�˴ؤ��ޤ��Ƥ⎤���̎ގݎ��ڎ̎ގݤǤΎ��ݎˎގƷ�Ѥ������Ѥˤʤ�ޤ��󎡤��Ƽϲ������ޤ��褦���ꤤ�����夲�ޤ���<br />\r\n��������<br />\r\n���ʤȸ򴹤����Ƥ��������ޤ���â�������ͤΤ��Թ�ˤ���ΤϤ���θ��������<br />\r\n������������» �����ʎ�����Ў�<br />\r\n���ʤȸ򴹤򤵤��Ƥ��������ޤ���<br />\r\n������<br />\r\n�����ְ㤨���Ŀ��ѹ����������Թ�ˤ���Ύ������Ѥ���Ƥ������»���� ���ʤ��ԲĤȤ����Ƥ��������ޤ��� <br />\r\n�������ݎ���<br />\r\n����Ū�˹��������߸�Ύ����ݎ��٤ϼ��դ��Ƥ���ޤ���<br />\r\nͽ�ᤴλ���ξ厤���㤤��᤯�������� <br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-07 19:46:29','2008-08-09 00:44:09','0000-00-00 00:00:00'),(19,0,'system_ec_rule','�����ƥ�/EC���ѵ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">EC���ѵ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n��##site_name##��EC���ѵ���<br />\r\n<br />\r\n##site_company_name##(�ʲ������Ҏ��Ȥ����ޤ�)�ώ����Ҥ����Ĥ��뎼�����ˎߎݎ��ގ����Ď�##site_name##��(�ʲ����܎����ˎގ����Ȥ����ޤ�)�����ѤˤĤ��Ǝ��ʲ��ΤȤ��구��(�ʲ����ܵ��󎣤Ȥ����ޤ�)�����ޤ���<br />\r\n<br />\r\n��1�� �ܵ����Ŭ���ϰϵڤ��ѹ��ˤĤ���<br />\r\n\r\n1 �ܵ�����܎����ˎގ����󶡵ڤӤ������Ѥ˴ؤ������ҵڤ����Ѽ�(�܎����ˎގ������������������礻�ʤɤ����Ѥ�Ԥä����򤤤��ޤ�)��Ŭ�Ѥ�����ΤȤ��ޤ���<br />\r\n2 ���Ҥώ����ѼԤλ����ξ��������뤳�Ȥʤ����ܵ�����ѹ�������ΤȤ��ޤ������ѼԤ��܎����ˎގ������Ѥˤ�ꎤ�ѹ���Ʊ�դ�����ΤȤߤʤ��ޤ����ѹ��������ώ��ä����ʤ��¤ꎤ�̵ڤ���Ŭ�Ѥ�����ΤȤ��ޤ���<br />\r\n<br />\r\n��2�� �܎����ˎގ������ѤˤĤ���<br />\r\n1 ���ѼԤώ��ܵ���ڤ����Ҥ��������뤴������ˡ�ʤɤ˽������܎����ˎގ������Ѥ����ΤȤ��ޤ���<br />\r\n2 ���Ҥώ����ĤǤ��܎����ˎގ������Ƥ�����ι��Τʤ����ѹ����ޤ����ѻߤ��뤳�Ȥ��Ǥ����ΤȤ��ޤ������Ҥ��܎����ˎގ������Ƥ��ѹ����ѻߤˤ�����ѼԤ�»���ˤĤ��ư��ڤ���Ǥ���餤�ޤ���<br /><br />\r\n��3�� ������<br />\r\n1 ����Ȥώ��ܵ����ǧ�ξ厤���ݎ����Ȏ��Ĥ�Ȥä��܎����ˎގ����ѤΤ��������򿽤����ߎ����Ҥ�����Ȥ��������ǧ�Ꭴ���Ĥ��줿�Ŀ͎�ˡ�ͤ򤤤��ޤ���<br />\r\n2 ����ώ��ܵ���˴�Ť����܎����ˎގ��ˤ����Ƥξ��ʹ����򤹤뤳�Ȥ��Ǥ��ޤ���<br />\r\n\r\n3 ����ώ������ʤ��軰�Ԥ����Ѥ������ꎤ��Ϳ�����ώ����㎤�������򤹤뤳�ȤϤǤ��ʤ���ΤȤ��ޤ���<br />\r\n<br />\r\n��4�� �������<br />\r\n1 ������˾�����(�ʲ��������˾�Ԏ��Ȥ���)�ώ����Ҥ������³�˽��äƎ�����򿽤������ΤȤ��ޤ��������˾�Ԥ�̤��ǯ�ԤǤ����玤�Ƹ��Ԥ�Ʊ�դ���������������򿽤������ΤȤ��ޤ���<br />\r\n2 �����Ͽ��³�ώ�����ο������Ф������Ҥξ������äƴ�λ�����ΤȤ��ޤ��������������Ҥώ������˾�Ԥ��ʲ��������ͳ�Τ����줫�˳������뤳�Ȥ�Ƚ��������玤�����˾�Ԥ������ǧ��ʤ����Ȥ����ꎤ�����ǧ�᤿��Ǥ⎤�������ä����Ȥ�����ޤ���<br />\r\n(1) �����˾�Ԥ�̤��ǯ�ԤǿƸ��Ԥ�Ʊ�դ����Ƥ��ʤ����<br />\r\n(2) �����˾�Ԥ����ܹ񳰤˵ｻ������<br />\r\n(3) �����˾�Ԥ������ܵ����ȿ���ˤ������ʤ����ä��줿���<br />\r\n(4) �����˾�Ԥ������κݤ����Ҥ��Ϥ��Ф�����˵����������ϵ�����줬���ä����<br />\r\n\r\n(5) �����˾�Ԥ����Ҥ��Ф����̳�λ�ʧ���դä����Ȥ�������<br />\r\n(6) ����¾���Ҥ���Ŭ����Ƚ�Ǥ������<br />\r\n<br />\r\n��5�� �ʎߎ��܎��Ďޤδ���<br />\r\n1 ����ώ������Ͽ������Ҥ�����Ύʎߎ��܎��Ďޤδ�����Ǥ���餦��ΤȤ��ޤ���<br />\r\n2 ����ώ��ʎߎ��܎��Ďޤ��軰�Ԥ����Ѥ������ꎤ��Ϳ�����ώ����㎤�������򤹤뤳�ȤϤǤ��ʤ���ΤȤ��ޤ���<br />\r\n3 �ʎߎ��܎��Ďޤδ����Խ�ʬ�����Ѿ�β�펤�軰�Ԥλ������ˤ��»���ˤĤ������Ҥϰ�����Ǥ���餤�ޤ��󎡎ʎߎ��܎��Ďޤ����������Ѥ��줿���Ȥˤ�����Ҥ�»������������玤����ώ����Ҥ��Ф�������»������������ΤȤ��ޤ���<br />\r\n4 ����ώ��ʎߎ��܎��Ďޤ��軰�Ԥ��Τ�줿��玤�ޤ��ώʎߎ��܎��Ďޤ��軰�Ԥ˻��Ѥ���Ƥ��뵿���Τ�����ˤώ�ľ�������Ҥˤ��λ�Ϣ����ȤȤ�ˎ����Ҥλؼ���������ˤϤ���˽����ˤ�ΤȤ��ޤ���<br />\r\n5 ����ώ����Ū�ˎʎߎ��܎��Ďޤ��ѹ������̳�������ΤȤ������ε�̳���դä����Ȥˤ��»���������Ƥ����Ҥϰ�����Ǥ���餤�ޤ���<br />\r\n\r\n<br />\r\n��6�� �����ʤ���ߎ�����<br />\r\n���Ҥώ��ʲ��λ�ͳ�������玤����˲�����������Τޤ��ϺŹ�򤹤뤳�Ȥʤ��������ʤ�����ߤ����ޤ������ä��뤳�Ȥ��Ǥ����ΤȤ��ޤ������ξ�玤���ҤΤȤä����֤ˤ������»�����������Ȥ��Ƥ⎤���Ҥϰ��ڤ���Ǥ���餤�ޤ���<br />\r\n(1) �������ݎĤ���ӎʎߎ��܎��Ďޤ������˻��Ѥ��ޤ��ϻ��Ѥ�������玡<br />\r\n(2) �������������줿�����ޤǤ˻�ʧ��ʤ��ä���玡<br />\r\n(3) ������Ф���������������������ʬ���������Ԏ��˻���̱�����������������������������ҹ����ο���Ω�Ƥ��ʤ��줿��玤�ڤӲ�����ޤ��ώ�����Ω�Ƥ򤷤���玡<br />\r\n(4) ����¾��������ܵ���Τ����줫�ξ��˰�ȿ������玡<br />\r\n(5) ����¾������Ȥ�����Ŭ�ʤ����Ҥ�Ƚ�Ǥ�����玡<br />\r\n<br />\r\n��7�� ���<br />\r\n\r\n1 ����ώ����ҽ���μ�³���ˤ����񤹤뤳�Ȥ��Ǥ��ޤ���<br />\r\n2 �������˴�ޤ��ϲ򻶤�����玤���Ҥώ�������������λ�������񤷤���ΤȤߤʤ����������ݎĤ���ӎʎߎ��܎��Ďޤ����ѤǤ��ʤ������ΤȤ��ޤ���<br />\r\n<br />\r\n��8�� ���ʤι���<br />\r\n1 ����ώ����Ҥ�������ˡ�ˤ�꾦�����ι����򿽤������ΤȤ��ޤ���<br />\r\n2 ����ο������ߤ��Ф��Ǝ����Ҥ�꾵������ݤ�e�Ҏ��٤�������ȯ�����������ǲ���Ȥδ֤��������ʤʤɤ˴ؤ������������Ω�����ΤȤ��ޤ���<br />\r\n<br />\r\n��9�� ���ʤ����ʎ��������β��<br />\r\n1 ���ʤ����ʤώ����������»�����ʤ����ӎ��ʰ㤤������¾���Ҥ�ǧ����������Ǥ��ʤ���ΤȤ��ޤ����ޤ������ʤ����ʎ����Ӥ��뾦�ʤθ򴹎��򴹤Ǥ��ʤ����η���β���ώ���������ʤ���Τ����厤1������ˎ����Ҥ��Ф��������ο����򤷤����˸¤ꎤ��ǽ�ʤ�ΤȤ��ޤ���<br />\r\n2 ����������Τ����줫�ˤ��ƤϤޤ��玤���Ҥϻ�����Ϣ��̵���˲���Ȥδ֤��������������뤳�Ȥ��Ǥ����ΤȤ��ޤ���<br />\r\n\r\n(1)���μ���ˤ��������Ҥ����������������줿���򤬤�����<br />\r\n(2)����Ͽ�������������꤬������<br />\r\n(3)��Ϣ�����ʤ��ʤäƤ��ޤä����<br />\r\n(4)�Ｑ�˰�æ�������������ߤ����ä����<br />\r\n(5)����¾�����Ҥ���Ŭ����Ƚ�Ǥ������<br />\r\n<br />\r\n��10�� �������ю������ގ�<br />\r\n1 �������ю������ގ��ξ��ʤώ�������Թ�䎻�����ް㤤�ˤ�뤴��ʸ�Ύ����ݎ��َ��򴹤ϰ��ڽ���ޤ���<br />\r\n2 ���ʤλ����ѹ��ˤĤ��Ƥώ����Ҥ�Ƚ�Ǥ�ͥ�褹�뤳�Ȥ�����ޤ����ޤ����ѹ���ȤοʹԤˤ�äƻ����ˤ����������������餵����������ݤ��뤳�Ȥ�����ޤ���<br />\r\n\r\n3 �������˾�ˤ�äƤ��ɲ���������ᤵ���Ƥ���������礬����ޤ���<br />\r\n<br />\r\n��11�� �Ύߎ��ݎĤ�����<br />\r\n1##site_name##�Ύߎ��ݎ�(�ʲ����Ύߎ��ݎĎ��Ȥ����ޤ�)�ώ�##site_name##��ˤ�������Ϳ���쎤##site_name##��ǤΤ����Ѳ�ǽ�ʎΎߎ��ݎĤ�ؤ��ޤ�������ώ����Ҥ�������ˡ�ˤ����ͭ����Ύߎ��ݎĤ����Ҥ����봹��Ψ�ǎ�������(�����Ǥ�����������Ȥ��ޤ�)�������ޤ��ϰ����λ�ʧ�������Ѥ��뤳�Ȥ��Ǥ��ޤ���â���������ǎ���������Ӽ�����ˤĤ��Ƥϸ���ˤ���ʧ����ΤȤ��ޤ���<br />\r\n2��������������ۤλ�ʧ���ˎΎߎ��ݎĤ����Ѥ������θ�����⤬���餫�λ���Ǹ��ۤ��줿���ˤώ��Ύߎ��ݎĤޤ��ϸ�����ִԤ��Ԥ��ޤ���<br />\r\n3�����������λ�ʧ���ˎΎߎ��ݎĤ����Ѥ����厤���餫�λ���ˤ������⤬���ۤ��줿���ώ����������ʬ��Ύߎ��ݎĤޤ��ϸ���ˤ���ʧ����ΤȤ��ޤ���<br />\r\n<br />\r\n<br />\r\n��12�� �Ύߎ��ݎľ��Ϥʤɤζػ�<br />\r\n1 �Ύߎ��ݎĤ����Ѥώ�����ܿͤ��Ԥ���ΤȤ��ޤ�����������ʳ����軰�Ԥ����Ѥ��뤳�ȤϤǤ��ޤ��󎡲���ώ���ͭ����Ύߎ��ݎĤ�¾�β������¾�軰�Ԥ˰�ž�����Ϥ��뤳�Ȏ������줹�뤳�Ȏ��ޤ���¾�β���ȎΎߎ��ݎĤ�ͭ���뤳�ȤϤǤ��ޤ���<br />\r\n\r\n2 ����ώ������ʤ���Ǥ�Ύߎ��ݎĤ򸽶����˸򴹤��뤳�ȤϤǤ��ޤ���<br />\r\n3 ��ͤβ����ʣ���β����Ͽ�򤷤Ƥ����玤����Ϥ��줾��β����Ͽ�ˤ�������ͭ����Ύߎ��ݎĤ�绻���뤳�ȤϤǤ��ޤ���<br />\r\n<br />\r\n��13�� �Ύߎ��ݎĤμ��ä�������<br />\r\n1 �����ѵ���ؤΰ�ȿ����¾���Ҥ�������������Ƚ�Ǥ���԰٤����ä����ˤώ����Ҥώ�����ؤΎΎߎ��ݎĤ���Ϳ�⤷���ϲ������ͭ����Ύߎ��ݎĤ����Ѥ���ߤ����ޤ��ώ��������ͭ����Ύߎ��ݎĤΰ����⤷������������ä����Ȥ��Ǥ����ΤȤ��ޤ���<br />\r\n2 ��Ѥ���ä�����玤������Ѥ����Ѥ��줿�Ύߎ��ݎĤ��ִԤ�����ΤȤ�������ˤ���ִԤϹԤ��ޤ���<br />\r\n3 ��������ʤɤˤ������ʤ��Ӽ��������ώ������������ͭ����Ύߎ��ݎĤ�ľ���˼��������ΤȤ��ޤ���<br />\r\n4 ��������Ҥ�������֤�Ķ���ƎΎߎ��ݎĤˤ������Ԥ�ʤ��ä���玤�Ύߎ��ݎĤϼ�ưŪ�˾��Ǥ��ޤ���<br />\r\n5 ���Ҥώ���äޤ��Ͼ��Ǥ����Ύߎ��ݎĤˤĤ��Ʋ���������Ԥ鷺�����ڤ���Ǥ���餤�ޤ���<br />\r\n\r\n<br />\r\n��14�� �Ͻл�����ѹ���<br />\r\n1 ����ώ����񿽹��κݤ����Ҥ��Ϥ��Ф���������ѹ��Τ��ä����ώ����Ҥ��Ƥ����ڤʤ�Ϣ�����ΤȤ��ޤ���<br />\r\n2 ���Ҥ�������Τ����Ҥ���Ͽ���줿�Ͻл���˴�Ť�Ϣ�����ȯ�����뤳�Ȥˤ�ꎤ������̾���ã���٤��Ȥ�����ã�����Ȥߤʤ�����ΤȤ��ޤ���<br />\r\n<br />\r\n��15�� �������¾�θ�����º��<br />\r\n1 ���ѼԤώ������Ԥε��������ʤ��ǎ��܎����ˎގ����̤����󶡤���뤤���ʤ����ˤĤ��Ƥ⎤���ѼԸĿͤλ�Ūʣ���ʤ����ˡ��ǧ������ϰϤ�Ķ���Ƥλ��Ѥ򤹤뤳�ȤϤǤ��ޤ���<br />\r\n2 �ܾ�ε���˰�ȿ���Ƹ����Ԥ��뤤���軰�ԤȤδ֤����꤬��������玤���ѼԤϼ��ʤ���Ǥ�����Ѥˤ����Ƥ���������褹��ȤȤ�ˎ����Ҥ˲������Ǥޤ���»����Ϳ���ʤ���ΤȤ��ޤ���<br /><br />\r\n\r\n��16�� ##site_name##�����ǎ����<br />\r\n\r\n1 ���Ҥώ��ʲ��Τ����줫�λ�ͳ�˳��������玤����˻��������Τ��뤳�Ȥʤ��܎����ˎގ��ΰ����⤷���������������ǎ��ޤ�����ߤ��뤳�Ȥ�����ޤ���<br />\r\n(1)�܎����ˎގ����󶡤Τ�������֎������ÎѤ��ݼ�������������Ԥ���玡<br />\r\n(2) �кҎ����Ŏ�ŷ�Ҥʤɤˤ�ꎤ�܎����ˎގ����󶡤�����ʾ�玡<br />\r\n(3) ɬ�פ��ŵ��̿����ȼԤ���̳���󶡤���ʤ���玡<br />\r\n(4) ����¾�����Ҥ��܎����ˎގ��ΰ�����Ǥ⤷������ߤ�ɬ�פǤ����Ƚ�Ǥ�����玡<br />\r\n2 ���Ҥώ�##site_name##���󶡤ΰ�����ǎ��������ȯ���ˤ�ꎤ���ѼԤ���ä������ʤ�»���ˤĤ��Ƥ���ڤ���Ǥ�����ʤ���ΤȤ��ޤ���<br />\r\n<br />\r\n��17�� ���Ď����ˡ���ɳ��Ƚ��<br />\r\n1 ���Ҥ����ѼԤȤ�Ϣ����ˡ�ώ�e�Ҏ��ٵڤ����äˤ���ΤȤ��ޤ���<br />\r\n\r\n2 �܎����ˎގ��Τ����Ѥ˴ؤ��Ǝ��ܵ���ˤ����Ǥ��ʤ����꤬���������ˤώ�##site_name##�ώ������Ĥ����ѼԤȤδ֤��������դ��ä��ä��礤��������褹���ΤȤ��ޤ���<br />\r\n3 �ܵ���ν��ˡ������ˡ�Ȥ������Ҥ����ѼԤδ֤�������ʶ��ˤĤ��Ƥ����������Ƚ�����쿳��°�ɺ�Ƚ��Ȥ��ޤ���<br />\r\n4 ���ѼԤ����������ʧ������¾�ܵ����ȿ�԰٤ˤ�äƎ�»�������̳��ȯ�����������������Τ���ˎ�##site_name##���۸�Τ��Ѥ������ˤώ����Ҥ���ʧ�ä��۸�����ѤˤĤ��Ƥ����ѼԤ���ô�Ȥ��ޤ���<br />\r\n<br />\r\n�ʾ�<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"?action_user_top=true\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',0,'2008-08-08 11:02:35','2008-08-09 00:18:51','2008-08-09 00:18:51'),(20,0,'system_ec_privacy','�����ƥ�/EC�ץ饤�Х����ݸ�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�̎ߎ׎��ʎގ����ݸ�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n�̎ߎ׎��ʎގ����ݸ�����<br />\r\n<br />\r\n##site_company_name##(�ʲ������Ҏ��Ȥ����ޤ�)�ώ����ѼԤθĿ;�����������ڤʤ�Τȹͤ��Ƥ��ꎤˡ�����˴�Ť������ѼԤθĿ;����Ŭ�ڤ˴������ݸ��ȤȤ�ˎ����ѼԤ��¿��Ǥ��뎻���ˎގ����󶡤��뤳�Ȥ���Ū�Ȥ��Ǝ��ʲ������ˤ˴�Ť��Ŀ;�����ݸ���ؤ�ޤ������Ύ��̎ߎ׎��ʎގ����ݸ����ˎ�(�ʲ��������ˎ��Ȥ����ޤ�)�ώ���Ŭ�Ѥ��쎤���ѼԤ������Ѥ���˺ݤ������Ҥ��������뤳�ȤȤʤä����ѼԤθĿ;���ώ������ˤ˴�Ť��ƴ�������ޤ���<br />\r\n<br />\r\n1 ˡ�����ν��ˤĤ���<br />\r\n\r\n���Ҥώ��Ŀ;���μ�갷���˴ؤ��Ǝ��Ŀ;����ݸ�ˡ��Ϥ���Ȥ���Ŀ;���˴ؤ���ˡ����餷�ޤ���<br />\r\n<br />\r\n2 �Ŀ;�������<br />\r\n�����Ѥ��Ƥ��������������Ͽ������������̾��͹���ֹ掤���ꎤ�����ֹ掤�Ҏ��َ��Ďގڎ������̎���ǯ���������ڎ��ގ��Ď����Ď޾���(�ֹ掤�����Ď޼��̎����ڎ��ގ��Ď����Ď�ͭ������)���������󎤾��ʤ����դ�ɬ�פ�������ξ���ʤɤ���Ͽ����򎢸Ŀ;��󎣤Ȥ��Ƽ�갷���ޤ���<br />\r\n<br />\r\n3 �Ŀ;����������Ū�ˤĤ���<br />\r\n�Ǥώ��Ŀ;�������Ѥ��Ǝ��ʲ��Τ��Ȥ�ԤäƤ���ޤ���<br />\r\n<br />\r\n�� ��ʸ���ʤ�ȯ��<br />\r\n�� ���ѼԤؤ�Ϣ��<br />\r\n\r\n�� �Ҏ��َώ��ގ��ގ��ۿ�<br />\r\n�� ���Τ餻�����ո����ݎ����ĎҎ��٤�����<br />\r\n�� �ώ����Î��ݎ��ގÎގ�����ʬ��<br />\r\n<br />\r\n�Ŀ;���ϼ�ˎ���ʸ���ʤ�ȯ�������ѼԤؤ�Ϣ��ȎҎ��َώ��ގ��ގݤ��ۿ��˻��Ѥ��Ƥ��ޤ����ޤ������ߤ���Ӿ���Ū���󶡤�Ƥ���Ƥ��뎻���ˎގ��ˤĤ������ѼԤΰո���Ĵ�����뤿��ˎ����ݎ����ķ�����Ϣ���뤳�Ȥ⤢��ޤ����ώ����Î��ݎ��ގÎގ�����ʬ�Ϥώ��ɤξ��ʎ��ɤΎ��ݎÎݎ¤ο͵����⤤�����ǧ���������ΎÎގ������鎤�����ʬ��˶�̣�򼨤������ѼԤˎ����ζ�̣�˹�碌�����ݎÎݎ¤乭����󶡤���ʤɎ����ѼԤ��Ф��Ƥ��⤤�����ˎގ���Ԥ����Ȥ���Ū�Ȥ������Ѥ��ޤ���<br />\r\n<br />\r\n4 �Ŀ;��������������ʤ�<br />\r\n���Ҥώ����ѼԤ��Ŀ;���γ�������������������˾�����玤���ҤޤǤ�Ϣ����������Ў��ܿͤǤ��뤳�Ȥ��ǧ�ξ厤����Ū���ϰϤǤ��ߤ䤫���б��������ޤ����ޤ��ܿͤΎÎގ�����¸�ߤ��ʤ��Ȥ��ˤ⎤���ߤ䤫�ˤ��λݤ����Τ��ޤ����ʤ��������Ŀ;�����������������äƤώ�����򴪰Ƥ�������Ū���ϰϤǤμ�����򿽤��������礬����ޤ���<br />\r\n<br />\r\n5 �Ŀ;�����軰���󶡎���Ʊ���ѤˤĤ���<br />\r\n\r\n���ҤǤώ������μ��ێ����ڎ��ގ��Ď����Ď޷�ѤʤɤˤĤ���¾�Ҥ���Ԥ���ꤷ�Ƥ��ޤ��������β�Ҥώ����ѼԤθĿ;������̩���ݻ�����٤˽��̤ˤƵ�̩�ݻ�������ӎ������μ��ێ����ڎ��ގ��Ď����Ď޷�Ѥʤɵ�̩�ݻ����������줿������Ū���ϰϳ������ѼԤθĿ;�����Ѥ��뤳�ȤϤ���ޤ������Ҥ�ˡ������ʤ���᤬���������������ѼԤθĿ;���򎤻��������Ѽ��ܿͤ�Ʊ�դ����뤳�Ȥʤ��軰�Ԥ��󶡤��ޤ���<br />\r\n<br />\r\n6 �Ŀ;���δ����ˤĤ���<br />\r\n���Ҥώ��Ŀ;�������Ѥ��̳��ɬ�פʼҰ����������¤����Ŀ;��󤬴ޤޤ�����Τʤɤ��ݴɎ������ʤɤ˴ؤ��뵬§���ꎤ�Ŀ;����ݸ�Τ����ͽ�����֤�֤��ޤ��������ÎѤ���¸����Ƥ���Ŀ;���ˤĤ��Ƥώ���̳��ɬ�פʼҰ����������ѤǤ���褦�������ݎĤȎʎߎ��܎��Ďޤ��Ѱդ��������������´�����»ܤ��ޤ����ʤ����������ݎĤȎʎߎ��܎��Ďޤ�ϳ�������Ǽ��Τʤ��褦���Ť˴������ޤ����Ŀ;���ˤ������Îގ����������Ύ������؎Î��Τ��Ꭴɬ�פ�WEB�͎ߎ����ޤ˶ȳ�ɸ��ΰŹ沽�̿��Ǥ���SSL����Ѥ��ޤ���<br />\r\n<br />\r\n7 20��̤���θĿ;���ˤĤ���<br />\r\n�Ǥώ�20��̤������Ͽ����������Ͽ����20��̤���Ǥ��뤳�Ȥ�Ƚ���������ˤώ��Ŀ;���μ�������ӻ��ѤϹԤ��ޤ��󎡻Ҷ���𤷤Ʋ�²�ξ�����������褦�ʹ԰٤ϹԤäƤ��ޤ���<br />\r\n<br />\r\n8 �ێ��ގ̎����٤ˤĤ���<br />\r\n���Ҥώ����ѼԤ�ư����Ĵ������٤ˎ��������ێ��ގ��̎����٤���Ѥ��ޤ�������ˤ�ꎤ���Ҥώ�����Ū�ʎ��������Ѿ�������뤳�Ȥ��Ǥ��ޤ������Ŀ;���μ��������ϤΤ�������Ѥ��뤳�ȤϤ���ޤ���<br />\r\n\r\n<br />\r\n9 �����ˤβ���<br />\r\n��Ҥ����ѼԤΎ̎����Ďގʎގ�����ȿ�Ǥ��뤿��ˎ����Ύ��̎ߎ׎��ʎގ����ݸ����ˎ������������Ƥ���ͽ��Ǥ������Ҥ����ѼԤξ����ɤΤ褦���ݸ�Ƥ��뤫���ǧ���Ƥ�����������ˤ⎤�����ˤ����Ū�˳�ǧ���뤳�Ȥ򤪴��ᤷ�ޤ���<br />\r\n<br />\r\n10 ���䤤��碌<br />\r\n�Ŀ;���˴ؤ��뤪�䤤��碌����������Ҥ������ˤ��餷�Ƥ��ʤ��Ȥ��ͤ��ξ��ώ��ʲ��ΰ���ˤ�Ϣ����������<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n<br />\r\n�ʾ�<br />\r\n<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"?action_user_top=true\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',0,'2008-08-08 11:05:57','2008-08-09 00:17:34','2008-08-09 00:17:34'),(21,0,'system_ec_order','�����ƥ�/EC�����ˤĤ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�����ˤĤ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n�������ˤĤ���\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.��Ź�˼��䤷������</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.���ʤˤĤ��������������ܤ���ʹ���������Ȥ�����Ȥ��ˤώ����ʎ͎ߎ����ޤΎ�ŹĹ�˼���!�����餪Ź�˼��䤹�뤳�Ȥ��Ǥ��ޤ���<br />\r\n\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.���������ݎ��٤�������</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.����ʸ��Ύ����ݎ��٤ˤĤ��ޤ��ƤϤ������Ǥ��ޤ���<br />\r\n\r\n���������Թ�ˤ�����Ū�ʎ����ݎ��٤ϸǤ����Ǥꤷ�Ƥ���ޤ���<br />\r\n������̵���ʎ����ݎ��٤�ʤ����ޤ��Ȏ������ݎ������ĸ�����䤪���ͤμҲ�Ū�ʿ��Ѥ˴ؤ�����꤬�����ޤ��Τǎ����줰��⤴��դ��������ޤ���<br />\r\n<br />\r\n�������ξ�玤��Ϣ��̵���ˎ����ݎ��٤�����ĺ�����Ȥ��������ޤ���<br />\r\n1)���μ���ˤ����Ǝ����ݎ��٤��줿���򤬤����玡<br />\r\n\r\n2)����Ͽ�������������꤬�����玡<br />\r\n3)��Ϣ�����ʤ��ʤäƤ��ޤä���玡<br />\r\n4)�ＱŪ�˰�æ�������������ߤ����ä���玡<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.�㤪���ȻפäƤ������ʤκ߸ˤ��ʤ��������Ǥ��ޤ���</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.���ָ���ˤƾ��ʤ����䤤�����Ƥ���ޤ���<br />\r\n�ܤ�����<a href=\"fp.php?code=system_support\">���䤤��碌</a>��������\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n<span style=\"color:#ff0000\">Q.���ʤ�����������ή��򶵤��Ʋ�������</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.WEB��Ǥι�����³������λ����Ȏ������ͤξ���ľ�ܤ�Ź����������ޤ���<br />\r\n�����Τ��Τ餻�ΎҎ��٤����夷�ޤ���<br />\r\n<br />\r\n��Ź����Ϣ���ʤ����ˤώ���Ź��Ϣ���ޤ��礦��<br />\r\n������ʸ����λ���Ƥ��ʤ���礬�������ޤ���<br />\r\n<br />\r\n�����ʧ���ޤ�����Ѥ˴ؤ��Ƥ�<a href=\"index.php?action_user_ec_util=true&page=first#try\">������</a>�򤴳�ǧ��������<br />\r\n\r\n<br />\r\n���ʤ������Ƥ��ޤ���<br />\r\n<br />\r\n��Ź�ˤ�äƤώ�������������ȯ�����뤳�Ȥ�����Τǎ������˾��ʎ͎ߎ����ޤǳ�ǧ���ޤ��礦��<br />\r\n�������ؤǤμ�������򤷤��ͤώ����ʤ�������Ȥ��ˎ���ã���οͤ˾������+���������ʧ���ޤ���<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.�㤤ʪ�����Ȥϲ��Ǥ�����</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.�㤪���Ȼפä����ʤϤޤ�������������뎣�Ύގ��ݤ��㤤ʪ����������ޤ��礦��<br />\r\n�㤤ʪ���������줿�����Ǥώ��ޤ������ϳ��ꤷ�ޤ���<br />\r\n\r\n�����¾�ξ��ʤ�������㤤ʪ��³���뤳�Ȥ��Ǥ��ޤ���<br />\r\n�㤤ʪ�򽪤����鎤�㤤ʪ��������ξ��ʤ�ޤȤ����ʸ��³���򤷤ޤ���<br />\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#ff0000\">Q.���ʤ��Ϥ��ʤ���</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n<span style=\"color:#0000ff\">A</span>.���ʤ�ȯ�������ώ���Ź��ľ�ܤ��䤤��碌��������<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:19:06','2008-08-09 00:44:20','0000-00-00 00:00:00'),(22,0,'EC���ո�������˾','ec_opinion','<html>\r\n<head>\r\n<title>�ӎʎގ��َʎގ���EC</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\" />\r\n<meta http-equiv=\"Pragma\" content=\"no-cache\" />\r\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\r\n<meta http-equiv=\"Expires\" content=\"Thu, 01 Dec 1994 16:00:00 GMT\" />\r\n<meta name=\"description\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<meta name=\"keywords\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<meta name=\"robots\" content=\"noindex,nofollow\" />\r\n<meta name=\"author\" content=\"���ӥ����ȹ��ۥץ�åȥե�����\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"#FFFFFF\" text=\"#66333\" link=\"#ff00FF\" vlink=\"#CC66FF\" alink=\"#0099CC\">\r\n\r\n<div id=\"container\">\r\n<a name=\"top\"></a>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">���ո�������˾</span></div>\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n\r\n<div style=\"background-color:#ffffff; text-align:left; font-size:small; align:center;\">\r\n�ߤʤ��ޤΰո������äƲ������͎��ɤ�ʤ˾����ʤ��ȤǤ�OK!<br />\r\n�ʤ���ĺ�������ո����Ф��Ƥθ��̤β����Ϥ��Ƥ���ޤ���Τǎ�ͽ�ᤴλ����������<br />\r\n<br />\r\n<font color=\"blue\">��</font>�����罸��ΎÎ���<br />\r\n\r\n����ʾ��ʤ��ߤ���!<br />\r\n���㤤�������ʤ����ä��鶵���Ʋ�������<br />\r\n<br />\r\n</div>\r\n\r\n<div style=\"background-color:#ffffff; text-align:center; align:center;\"><a href=\"mailto:mblv@ml.technovarth.jp?subject=���ո�������˾&body=�����ˤ��ո�������˾�򤴵�������������\">���ո�������˾������</a></div>\r\n	\r\n</div>\r\n\r\n<hr color=\"#f57af4\" style=\"border:solid 1px #f57af4;\">\r\n\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n	<img src=\"http://mblv.varth.jp/img_emoji/docomo/134.gif\" border=\"0\" align=\"center\" style=\"vertical-align: middle\"><a href=\"index.php?action_user_index=true\" accesskey=\"0\">�Ď��̎�</a>\r\n</div>\r\n\r\n<div style=\"text-align:center; background-color:#FF99AA\"><span style=\"color:#FFFFFF;font-size:small\">(c)�ƥ��Υ�</span></div>\r\n</div>\r\n\r\n</body>\r\n</html>',0,'2008-08-08 11:25:21','2008-08-08 12:10:10','2008-08-08 12:10:10'),(23,0,'system_ec_paycredit','�����ƥ�/EC���쥸�åȷ��','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���ڎ��ގ��ķ��</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n����ʧ��ˡ������<br /><br />\r\n�����ڎ��ގ��Ď����Ď޷�ю������򢪻��Ѥ��뎸�ڎ��ގ��Ď����Ďޤ����򢪎��ڎ��ގ��Ď����Ď޾�������Ϣ�����ʧ��􎣤�̎ߎَ��ގ��ݤ������򤷤ޤ���<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:37:17','2008-08-09 00:44:28','0000-00-00 00:00:00'),(24,0,'system_ec_payconveni','�����ƥ�/EC����ӥ˷��','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���ݎˎގƷ��</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n<span style=\"color:#FF5B00\">�����̎ގݎ��ڎ̎ގ�</span><hr color=\"#FF5B00\" style=\"border:solid 1px #FF5B00\">\r\n������ʸ�μ�³������λ����Ȏ�����ʸ���Ƴ�ǧ���Ҏ��٤������Ƥ��ޤ���<br />\r\n\r\n���ΎҎ��٤�̎ߎ؎ݎĎ����Ĥ�(�⤷���ϵ��ܤ���Ƥ��뎢ʧ��ɼ�ֹ掣��ҎӤ���)�����᤯�Ύ��̎ގݎ��ڎ̎ގݤΎڎ��ޤˤƎ����⎣�Ǥ���ʧ������������<br /><br />\r\n\r\n<span style=\"color:#FF0000\">��</span>���ݎˎގ�ŹƬ�Ǥ��ѹ���ʧ�ᤷ�ϤǤ��ޤ���Τǎ�ͽ�ᤴλ������������<br />\r\n<span style=\"color:#FF0000\">��</span>��ʧ��ʧ�ᤷ���ѹ��򤵤����ώ�ľ�ܤ�Ź¦�ˤ�Ϣ����������<br />\r\n<span style=\"color:#FF0000\">��</span>����ʧ���厤�����ν񎣤��Ϥ��������ޤ���<br />\r\n�ºݤ����򤪻�ʧ�����줿���Ȥ�����������Ǥ��Τǎ����ڤ��ݴɤ��Ƥ���������<br /><br />\r\n\r\n<a name=\"lawson\"></a>\r\n<span style=\"color:#315BFF\">���ێ�����</span><hr style=\"border:solid 1px #315BFF\">\r\n\r\n������ʸ�μ�³������λ����Ȏ�����ʸ���Ƴ�ǧ���Ҏ��٤������Ƥ��ޤ���<br />\r\n���ΎҎ��٤˵��ܤ���Ƥ��뎢��ʧ���ֹ掣��ҎӤ������᤯�Ύێ����ݤˤưʲ�����ˡ�Ǥ���ʧ������������<br /><br />\r\n\r\n[x:0115]�ێ����ݤ�Loppiü������؎��ݎ����Ȏ��ļ��ա٤�����<br />\r\n[x:0116]����ʧ�����ֹ�˻�ʧ���ֹ������<br />\r\n[x:0117]�����ֹ������<br />\r\n[x:0118]���̤˽�����ü�����ȯ�Ԥ���뿽�����߷���ڎ��ޤǤ��󼨲�������<br /><br />\r\n\r\n<span style=\"color:#FF0000\">��</span>���ݎˎގ�ŹƬ�Ǥ��ѹ���ʧ�ᤷ�ϤǤ��ޤ���Τǎ�ͽ�ᤴλ������������<br />\r\n\r\n<span style=\"color:#FF0000\">��</span>��ʧ��ʧ�ᤷ���ѹ��򤵤����ώ�ľ�ܤ�Ź¦�ˤ�Ϣ����������<br />\r\n<span style=\"color:#FF0000\">��</span>����ʧ���厤���μ��񎣤��Ϥ��������ޤ����ºݤ����򤪻�ʧ�����줿���Ȥ�����������Ǥ��Τǎ����ڤ��ݴɤ��Ƥ��������� <br /><br />\r\n\r\n<a name=\"famima\"></a>\r\n<span style=\"color:#46FF71\">���̎��Ў؎��ώ���</span><hr style=\"border:solid 1px #46FF71\">\r\n������ʸ�μ�³������λ����Ȏ�����ʸ���Ƴ�ǧ���Ҏ��٤������Ƥ��ޤ���<br />\r\n���ΎҎ��٤˵��ܤ���Ƥ��뎢��Ȏ����Ďގ��Ȏ���ʧ���ֹ掣��ҎӤ������᤯�Ύ̎��Ў؎��ώ��Ĥˤưʲ�����ˡ�Ǥ���ʧ������������<br /><br />\r\n\r\n[x:0115]ŹƬ��Fami�Ύߎ���/�̎��ЎȎ��ĤγƲ��̤�������<br />\r\n\r\n���̎��ЎΎߎ��Ĥξ��:������ʧ�������������ޡ�=>�ؼ�Ǽɽȯ�ԡ�<br />\r\n���̎��ЎȎ��Ĥξ��:�ؼ�Ǽɽȯ�ԡ�<br />\r\n[x:0116]��Ȏ����Ďޤ�����<br />\r\n[x:0117]��ʸ�ֹ�˻�ʧ���ֹ������<br />\r\n[x:0118]���̤˽�����Fami�Ύߎ���/�̎��ЎȎ��Ĥ��ȯ�Ԥ���뿽�����߷���ڎ��ޤؤ��󼨲�������<br /><br />\r\n\r\n<span style=\"color:#FF0000\">��</span>���ݎˎގ�ŹƬ�Ǥ��ѹ���ʧ�ᤷ�ϤǤ��ޤ���Τǎ�ͽ�ᤴλ������������<br />\r\n<span style=\"color:#FF0000\">��</span>��ʧ��ʧ�ᤷ���ѹ��򤵤����ώ�ľ�ܤ�Ź¦�ˤ�Ϣ����������<br />\r\n\r\n<span style=\"color:#FF0000\">��</span>����ʧ���厤���μ��񎣤��Ϥ��������ޤ���<br />\r\n�ºݤ����򤪻�ʧ�����줿���Ȥ�����������Ǥ��Τǎ����ڤ��ݴɤ��Ƥ��������� <br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:39:38','2008-08-09 00:45:57','0000-00-00 00:00:00'),(25,0,'system_ec_paycollect','�����ƥ�/EC������','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">������</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n������������<br />\r\n��\\1�ʾ��\\10,000�ʲ���\\315<br />\r\n\r\n��\\10,001�ʾ��\\30,000�ʲ���\\420<br />\r\n��\\30,001�ʾ��\\100,000�ʲ���\\630<br />\r\n��\\100,001�ʾ��\\300,000�ʲ���\\1,050<br />\r\n��\\300,001�ʾ��\\500,000�ʲ���\\2,100<br />\r\n��\\500,001�ʾ��\\999,999�ʲ���\\3,150<br />\r\n��\\1,000,000�ʾ����\\4,200<br /><br />\r\n\r\n�������������߾��ʤΰ���<br />\r\n��������������ɽ��Ŭ�ѳ��Ȥʤ�ޤ���<br /><br />\r\n\r\n�����������ˤ���������ǤˤĤ���<br />\r\n���������Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />\r\n<span style=\"color:#FF0000\">��</span>�ܺ٤�Ź�ޤˤ��䤤��碌����������<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:43:20','2008-08-09 00:46:07','0000-00-00 00:00:00'),(26,0,'system_ec_paybank','�����ƥ�/EC��Կ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">��Կ������</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n����ʸ��ǧ�Υ᡼��ˤơ������衢������߶�ۤ��Τ餻�������ޤ���<br />\r\n�������ǧ���ȯ���ˤʤ�ޤ���ͽ�ᤴλ������������ <br />\r\n������������Ϥ����ͤΤ���ô�ˤƤ��ꤤ�������ޤ��� <br />\r\n<span style=\"color:#FF0000\">��</span>�ܺ٤�Ź�ޤˤ��䤤��碌����������<br />\r\n<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 11:45:04','2008-08-09 00:46:17','0000-00-00 00:00:00'),(27,0,'system_terms','�����ƥ�/���ѵ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���ѵ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n��##site_name##�����ѵ���<br />\r\n<br />\r\n##site_company_name##(�ʲ������Ҏ��Ȥ����ޤ�)�ώ����Ҥ����Ĥ��뎻���Ď�##site_name##��(�ʲ����܎����ˎގ����Ȥ����ޤ�)�����ѤˤĤ��Ǝ��ʲ��ΤȤ��구��(�ʲ����ܵ��󎣤Ȥ����ޤ�)�����ޤ���<br />\r\n<br />\r\n��1�� �ܵ����Ŭ���ϰϵڤ��ѹ��ˤĤ���<br />\r\n\r\n1 �ܵ�����܎����ˎގ����󶡵ڤӤ������Ѥ˴ؤ������ҵڤ����Ѽ�(�܎����ˎގ������������������礻�ʤɤ����Ѥ�Ԥä����򤤤��ޤ�)��Ŭ�Ѥ�����ΤȤ��ޤ���<br />\r\n2 ���Ҥώ����ѼԤλ����ξ��������뤳�Ȥʤ����ܵ�����ѹ�������ΤȤ��ޤ������ѼԤ��܎����ˎގ������Ѥˤ�ꎤ�ѹ���Ʊ�դ�����ΤȤߤʤ��ޤ����ѹ��������ώ��ä����ʤ��¤ꎤ�̵ڤ���Ŭ�Ѥ�����ΤȤ��ޤ���<br />\r\n<br />\r\n��2�� �܎����ˎގ������ѤˤĤ���<br />\r\n1 ���ѼԤώ��ܵ���ڤ����Ҥ��������뤴������ˡ�ʤɤ˽������܎����ˎގ������Ѥ����ΤȤ��ޤ���<br />\r\n2 ���Ҥώ����ĤǤ��܎����ˎގ������Ƥ�����ι��Τʤ����ѹ����ޤ����ѻߤ��뤳�Ȥ��Ǥ����ΤȤ��ޤ������Ҥ��܎����ˎގ������Ƥ��ѹ����ѻߤˤ�����ѼԤ�»���ˤĤ��ư��ڤ���Ǥ���餤�ޤ���<br /><br />\r\n��3�� ������<br />\r\n1 ����Ȥώ��ܵ����ǧ�ξ厤���ݎ����Ȏ��Ĥ�Ȥä��܎����ˎގ����ѤΤ��������򿽤����ߎ����Ҥ�����Ȥ��������ǧ�Ꭴ���Ĥ��줿�Ŀ͎�ˡ�ͤ򤤤��ޤ���<br />\r\n2 ����ώ��ܵ���˴�Ť����܎����ˎގ��ˤ����Ƥξ��ʹ����򤹤뤳�Ȥ��Ǥ��ޤ���<br />\r\n\r\n3 ����ώ������ʤ��軰�Ԥ����Ѥ������ꎤ��Ϳ�����ώ����㎤�������򤹤뤳�ȤϤǤ��ʤ���ΤȤ��ޤ���<br />\r\n<br />\r\n��4�� �������<br />\r\n1 ������˾�����(�ʲ��������˾�Ԏ��Ȥ���)�ώ����Ҥ������³�˽��äƎ�����򿽤������ΤȤ��ޤ��������˾�Ԥ�̤��ǯ�ԤǤ����玤�Ƹ��Ԥ�Ʊ�դ���������������򿽤������ΤȤ��ޤ���<br />\r\n2 �����Ͽ��³�ώ�����ο������Ф������Ҥξ������äƴ�λ�����ΤȤ��ޤ��������������Ҥώ������˾�Ԥ��ʲ��������ͳ�Τ����줫�˳������뤳�Ȥ�Ƚ��������玤�����˾�Ԥ������ǧ��ʤ����Ȥ����ꎤ�����ǧ�᤿��Ǥ⎤�������ä����Ȥ�����ޤ���<br />\r\n(1) �����˾�Ԥ�̤��ǯ�ԤǿƸ��Ԥ�Ʊ�դ����Ƥ��ʤ����<br />\r\n(2) �����˾�Ԥ����ܹ񳰤˵ｻ������<br />\r\n(3) �����˾�Ԥ������ܵ����ȿ���ˤ������ʤ����ä��줿���<br />\r\n(4) �����˾�Ԥ������κݤ����Ҥ��Ϥ��Ф�����˵����������ϵ�����줬���ä����<br />\r\n\r\n(5) �����˾�Ԥ����Ҥ��Ф����̳�λ�ʧ���դä����Ȥ�������<br />\r\n(6) ����¾���Ҥ���Ŭ����Ƚ�Ǥ������<br />\r\n<br />\r\n��5�� �ʎߎ��܎��Ďޤδ���<br />\r\n1 ����ώ������Ͽ������Ҥ�����Ύʎߎ��܎��Ďޤδ�����Ǥ���餦��ΤȤ��ޤ���<br />\r\n2 ����ώ��ʎߎ��܎��Ďޤ��軰�Ԥ����Ѥ������ꎤ��Ϳ�����ώ����㎤�������򤹤뤳�ȤϤǤ��ʤ���ΤȤ��ޤ���<br />\r\n3 �ʎߎ��܎��Ďޤδ����Խ�ʬ�����Ѿ�β�펤�軰�Ԥλ������ˤ��»���ˤĤ������Ҥϰ�����Ǥ���餤�ޤ��󎡎ʎߎ��܎��Ďޤ����������Ѥ��줿���Ȥˤ�����Ҥ�»������������玤����ώ����Ҥ��Ф�������»������������ΤȤ��ޤ���<br />\r\n4 ����ώ��ʎߎ��܎��Ďޤ��軰�Ԥ��Τ�줿��玤�ޤ��ώʎߎ��܎��Ďޤ��軰�Ԥ˻��Ѥ���Ƥ��뵿���Τ�����ˤώ�ľ�������Ҥˤ��λ�Ϣ����ȤȤ�ˎ����Ҥλؼ���������ˤϤ���˽����ˤ�ΤȤ��ޤ���<br />\r\n5 ����ώ����Ū�ˎʎߎ��܎��Ďޤ��ѹ������̳�������ΤȤ������ε�̳���դä����Ȥˤ��»���������Ƥ����Ҥϰ�����Ǥ���餤�ޤ���<br />\r\n\r\n<br />\r\n��6�� �����ʤ���ߎ�����<br />\r\n���Ҥώ��ʲ��λ�ͳ�������玤����˲�����������Τޤ��ϺŹ�򤹤뤳�Ȥʤ��������ʤ�����ߤ����ޤ������ä��뤳�Ȥ��Ǥ����ΤȤ��ޤ������ξ�玤���ҤΤȤä����֤ˤ������»�����������Ȥ��Ƥ⎤���Ҥϰ��ڤ���Ǥ���餤�ޤ���<br />\r\n(1) �������ݎĤ���ӎʎߎ��܎��Ďޤ������˻��Ѥ��ޤ��ϻ��Ѥ�������玡<br />\r\n(2) �������������줿�����ޤǤ˻�ʧ��ʤ��ä���玡<br />\r\n(3) ������Ф���������������������ʬ���������Ԏ��˻���̱�����������������������������ҹ����ο���Ω�Ƥ��ʤ��줿��玤�ڤӲ�����ޤ��ώ�����Ω�Ƥ򤷤���玡<br />\r\n(4) ����¾��������ܵ���Τ����줫�ξ��˰�ȿ������玡<br />\r\n(5) ����¾������Ȥ�����Ŭ�ʤ����Ҥ�Ƚ�Ǥ�����玡<br />\r\n<br />\r\n��7�� ���<br />\r\n\r\n1 ����ώ����ҽ���μ�³���ˤ����񤹤뤳�Ȥ��Ǥ��ޤ���<br />\r\n2 �������˴�ޤ��ϲ򻶤�����玤���Ҥώ�������������λ�������񤷤���ΤȤߤʤ����������ݎĤ���ӎʎߎ��܎��Ďޤ����ѤǤ��ʤ������ΤȤ��ޤ���<br />\r\n<br />\r\n��8�� ���ʤι���<br />\r\n1 ����ώ����Ҥ�������ˡ�ˤ�꾦�����ι����򿽤������ΤȤ��ޤ���<br />\r\n2 ����ο������ߤ��Ф��Ǝ����Ҥ�꾵������ݤ�e�Ҏ��٤�������ȯ�����������ǲ���Ȥδ֤��������ʤʤɤ˴ؤ������������Ω�����ΤȤ��ޤ���<br />\r\n<br />\r\n��9�� ���ʤ����ʎ��������β��<br />\r\n1 ���ʤ����ʤώ����������»�����ʤ����ӎ��ʰ㤤������¾���Ҥ�ǧ����������Ǥ��ʤ���ΤȤ��ޤ����ޤ������ʤ����ʎ����Ӥ��뾦�ʤθ򴹎��򴹤Ǥ��ʤ����η���β���ώ���������ʤ���Τ����厤1������ˎ����Ҥ��Ф��������ο����򤷤����˸¤ꎤ��ǽ�ʤ�ΤȤ��ޤ���<br />\r\n2 ����������Τ����줫�ˤ��ƤϤޤ��玤���Ҥϻ�����Ϣ��̵���˲���Ȥδ֤��������������뤳�Ȥ��Ǥ����ΤȤ��ޤ���<br />\r\n\r\n(1)���μ���ˤ��������Ҥ����������������줿���򤬤�����<br />\r\n(2)����Ͽ�������������꤬������<br />\r\n(3)��Ϣ�����ʤ��ʤäƤ��ޤä����<br />\r\n(4)�Ｑ�˰�æ�������������ߤ����ä����<br />\r\n(5)����¾�����Ҥ���Ŭ����Ƚ�Ǥ������<br />\r\n<br />\r\n��10�� �������ю������ގ�<br />\r\n1 �������ю������ގ��ξ��ʤώ�������Թ�䎻�����ް㤤�ˤ�뤴��ʸ�Ύ����ݎ��َ��򴹤ϰ��ڽ���ޤ���<br />\r\n2 ���ʤλ����ѹ��ˤĤ��Ƥώ����Ҥ�Ƚ�Ǥ�ͥ�褹�뤳�Ȥ�����ޤ����ޤ����ѹ���ȤοʹԤˤ�äƻ����ˤ����������������餵����������ݤ��뤳�Ȥ�����ޤ���<br />\r\n\r\n3 �������˾�ˤ�äƤ��ɲ���������ᤵ���Ƥ���������礬����ޤ���<br />\r\n<br />\r\n��11�� �Ύߎ��ݎĤ�����<br />\r\n1##site_name##�Ύߎ��ݎ�(�ʲ����Ύߎ��ݎĎ��Ȥ����ޤ�)�ώ�##site_name##��ˤ�������Ϳ���쎤##site_name##��ǤΤ����Ѳ�ǽ�ʎΎߎ��ݎĤ�ؤ��ޤ�������ώ����Ҥ�������ˡ�ˤ����ͭ����Ύߎ��ݎĤ����Ҥ����봹��Ψ�ǎ�������(�����Ǥ�����������Ȥ��ޤ�)�������ޤ��ϰ����λ�ʧ�������Ѥ��뤳�Ȥ��Ǥ��ޤ���â���������ǎ���������Ӽ�����ˤĤ��Ƥϸ���ˤ���ʧ����ΤȤ��ޤ���<br />\r\n2��������������ۤλ�ʧ���ˎΎߎ��ݎĤ����Ѥ������θ�����⤬���餫�λ���Ǹ��ۤ��줿���ˤώ��Ύߎ��ݎĤޤ��ϸ�����ִԤ��Ԥ��ޤ���<br />\r\n3�����������λ�ʧ���ˎΎߎ��ݎĤ����Ѥ����厤���餫�λ���ˤ������⤬���ۤ��줿���ώ����������ʬ��Ύߎ��ݎĤޤ��ϸ���ˤ���ʧ����ΤȤ��ޤ���<br />\r\n<br />\r\n<br />\r\n��12�� �Ύߎ��ݎľ��Ϥʤɤζػ�<br />\r\n1 �Ύߎ��ݎĤ����Ѥώ�����ܿͤ��Ԥ���ΤȤ��ޤ�����������ʳ����軰�Ԥ����Ѥ��뤳�ȤϤǤ��ޤ��󎡲���ώ���ͭ����Ύߎ��ݎĤ�¾�β������¾�軰�Ԥ˰�ž�����Ϥ��뤳�Ȏ������줹�뤳�Ȏ��ޤ���¾�β���ȎΎߎ��ݎĤ�ͭ���뤳�ȤϤǤ��ޤ���<br />\r\n\r\n2 ����ώ������ʤ���Ǥ�Ύߎ��ݎĤ򸽶����˸򴹤��뤳�ȤϤǤ��ޤ���<br />\r\n3 ��ͤβ����ʣ���β����Ͽ�򤷤Ƥ����玤����Ϥ��줾��β����Ͽ�ˤ�������ͭ����Ύߎ��ݎĤ�绻���뤳�ȤϤǤ��ޤ���<br />\r\n<br />\r\n��13�� �Ύߎ��ݎĤμ��ä�������<br />\r\n1 �����ѵ���ؤΰ�ȿ����¾���Ҥ�������������Ƚ�Ǥ���԰٤����ä����ˤώ����Ҥώ�����ؤΎΎߎ��ݎĤ���Ϳ�⤷���ϲ������ͭ����Ύߎ��ݎĤ����Ѥ���ߤ����ޤ��ώ��������ͭ����Ύߎ��ݎĤΰ����⤷������������ä����Ȥ��Ǥ����ΤȤ��ޤ���<br />\r\n2 ��Ѥ���ä�����玤������Ѥ����Ѥ��줿�Ύߎ��ݎĤ��ִԤ�����ΤȤ�������ˤ���ִԤϹԤ��ޤ���<br />\r\n3 ��������ʤɤˤ������ʤ��Ӽ��������ώ������������ͭ����Ύߎ��ݎĤ�ľ���˼��������ΤȤ��ޤ���<br />\r\n4 ��������Ҥ�������֤�Ķ���ƎΎߎ��ݎĤˤ������Ԥ�ʤ��ä���玤�Ύߎ��ݎĤϼ�ưŪ�˾��Ǥ��ޤ���<br />\r\n5 ���Ҥώ���äޤ��Ͼ��Ǥ����Ύߎ��ݎĤˤĤ��Ʋ���������Ԥ鷺�����ڤ���Ǥ���餤�ޤ���<br />\r\n\r\n<br />\r\n��14�� �Ͻл�����ѹ���<br />\r\n1 ����ώ����񿽹��κݤ����Ҥ��Ϥ��Ф���������ѹ��Τ��ä����ώ����Ҥ��Ƥ����ڤʤ�Ϣ�����ΤȤ��ޤ���<br />\r\n2 ���Ҥ�������Τ����Ҥ���Ͽ���줿�Ͻл���˴�Ť�Ϣ�����ȯ�����뤳�Ȥˤ�ꎤ������̾���ã���٤��Ȥ�����ã�����Ȥߤʤ�����ΤȤ��ޤ���<br />\r\n<br />\r\n��15�� �������¾�θ�����º��<br />\r\n1 ���ѼԤώ������Ԥε��������ʤ��ǎ��܎����ˎގ����̤����󶡤���뤤���ʤ����ˤĤ��Ƥ⎤���ѼԸĿͤλ�Ūʣ���ʤ����ˡ��ǧ������ϰϤ�Ķ���Ƥλ��Ѥ򤹤뤳�ȤϤǤ��ޤ���<br />\r\n2 �ܾ�ε���˰�ȿ���Ƹ����Ԥ��뤤���軰�ԤȤδ֤����꤬��������玤���ѼԤϼ��ʤ���Ǥ�����Ѥˤ����Ƥ���������褹��ȤȤ�ˎ����Ҥ˲������Ǥޤ���»����Ϳ���ʤ���ΤȤ��ޤ���<br /><br />\r\n\r\n��16�� ##site_name##�����ǎ����<br />\r\n\r\n1 ���Ҥώ��ʲ��Τ����줫�λ�ͳ�˳��������玤����˻��������Τ��뤳�Ȥʤ��܎����ˎގ��ΰ����⤷���������������ǎ��ޤ�����ߤ��뤳�Ȥ�����ޤ���<br />\r\n(1)�܎����ˎގ����󶡤Τ�������֎������ÎѤ��ݼ�������������Ԥ���玡<br />\r\n(2) �кҎ����Ŏ�ŷ�Ҥʤɤˤ�ꎤ�܎����ˎގ����󶡤�����ʾ�玡<br />\r\n(3) ɬ�פ��ŵ��̿����ȼԤ���̳���󶡤���ʤ���玡<br />\r\n(4) ����¾�����Ҥ��܎����ˎގ��ΰ�����Ǥ⤷������ߤ�ɬ�פǤ����Ƚ�Ǥ�����玡<br />\r\n2 ���Ҥώ�##site_name##���󶡤ΰ�����ǎ��������ȯ���ˤ�ꎤ���ѼԤ���ä������ʤ�»���ˤĤ��Ƥ���ڤ���Ǥ�����ʤ���ΤȤ��ޤ���<br />\r\n<br />\r\n��17�� ���Ď����ˡ���ɳ��Ƚ��<br />\r\n1 ���Ҥ����ѼԤȤ�Ϣ����ˡ�ώ�e�Ҏ��ٵڤ����äˤ���ΤȤ��ޤ���<br />\r\n\r\n2 �܎����ˎގ��Τ����Ѥ˴ؤ��Ǝ��ܵ���ˤ����Ǥ��ʤ����꤬���������ˤώ�##site_name##�ώ������Ĥ����ѼԤȤδ֤��������դ��ä��ä��礤��������褹���ΤȤ��ޤ���<br />\r\n3 �ܵ���ν��ˡ������ˡ�Ȥ������Ҥ����ѼԤδ֤�������ʶ��ˤĤ��Ƥ����������Ƚ�����쿳��°�ɺ�Ƚ��Ȥ��ޤ���<br />\r\n4 ���ѼԤ����������ʧ������¾�ܵ����ȿ�԰٤ˤ�äƎ�»�������̳��ȯ�����������������Τ���ˎ�##site_name##���۸�Τ��Ѥ������ˤώ����Ҥ���ʧ�ä��۸�����ѤˤĤ��Ƥ����ѼԤ���ô�Ȥ��ޤ���<br />\r\n<br />\r\n�ʾ�<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:06:44','2008-08-16 16:28:09','0000-00-00 00:00:00'),(28,0,'system_policy','�����ƥ�/�ץ饤�Х����ݥꥷ��','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�̎ߎ׎��ʎގ����ݸ�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n�̎ߎ׎��ʎގ����ݸ�����<br />\r\n<br />\r\n##site_company_name##(�ʲ������Ҏ��Ȥ����ޤ�)�ώ����ѼԤθĿ;�����������ڤʤ�Τȹͤ��Ƥ��ꎤˡ�����˴�Ť������ѼԤθĿ;����Ŭ�ڤ˴������ݸ��ȤȤ�ˎ����ѼԤ��¿��Ǥ��뎻���ˎގ����󶡤��뤳�Ȥ���Ū�Ȥ��Ǝ��ʲ������ˤ˴�Ť��Ŀ;�����ݸ���ؤ�ޤ������Ύ��̎ߎ׎��ʎގ����ݸ����ˎ�(�ʲ��������ˎ��Ȥ����ޤ�)�ώ���Ŭ�Ѥ��쎤���ѼԤ������Ѥ���˺ݤ������Ҥ��������뤳�ȤȤʤä����ѼԤθĿ;���ώ������ˤ˴�Ť��ƴ�������ޤ���<br />\r\n<br />\r\n1 ˡ�����ν��ˤĤ���<br />\r\n\r\n���Ҥώ��Ŀ;���μ�갷���˴ؤ��Ǝ��Ŀ;����ݸ�ˡ��Ϥ���Ȥ���Ŀ;���˴ؤ���ˡ����餷�ޤ���<br />\r\n<br />\r\n2 �Ŀ;�������<br />\r\n�����Ѥ��Ƥ��������������Ͽ������������̾��͹���ֹ掤���ꎤ�����ֹ掤�Ҏ��َ��Ďގڎ������̎���ǯ���������ڎ��ގ��Ď����Ď޾���(�ֹ掤�����Ď޼��̎����ڎ��ގ��Ď����Ď�ͭ������)���������󎤾��ʤ����դ�ɬ�פ�������ξ���ʤɤ���Ͽ����򎢸Ŀ;��󎣤Ȥ��Ƽ�갷���ޤ���<br />\r\n<br />\r\n3 �Ŀ;����������Ū�ˤĤ���<br />\r\n�Ǥώ��Ŀ;�������Ѥ��Ǝ��ʲ��Τ��Ȥ�ԤäƤ���ޤ���<br />\r\n<br />\r\n�� ��ʸ���ʤ�ȯ��<br />\r\n�� ���ѼԤؤ�Ϣ��<br />\r\n\r\n�� �Ҏ��َώ��ގ��ގ��ۿ�<br />\r\n�� ���Τ餻�����ո����ݎ����ĎҎ��٤�����<br />\r\n�� �ώ����Î��ݎ��ގÎގ�����ʬ��<br />\r\n<br />\r\n�Ŀ;���ϼ�ˎ���ʸ���ʤ�ȯ�������ѼԤؤ�Ϣ��ȎҎ��َώ��ގ��ގݤ��ۿ��˻��Ѥ��Ƥ��ޤ����ޤ������ߤ���Ӿ���Ū���󶡤�Ƥ���Ƥ��뎻���ˎގ��ˤĤ������ѼԤΰո���Ĵ�����뤿��ˎ����ݎ����ķ�����Ϣ���뤳�Ȥ⤢��ޤ����ώ����Î��ݎ��ގÎގ�����ʬ�Ϥώ��ɤξ��ʎ��ɤΎ��ݎÎݎ¤ο͵����⤤�����ǧ���������ΎÎގ������鎤�����ʬ��˶�̣�򼨤������ѼԤˎ����ζ�̣�˹�碌�����ݎÎݎ¤乭����󶡤���ʤɎ����ѼԤ��Ф��Ƥ��⤤�����ˎގ���Ԥ����Ȥ���Ū�Ȥ������Ѥ��ޤ���<br />\r\n<br />\r\n4 �Ŀ;��������������ʤ�<br />\r\n���Ҥώ����ѼԤ��Ŀ;���γ�������������������˾�����玤���ҤޤǤ�Ϣ����������Ў��ܿͤǤ��뤳�Ȥ��ǧ�ξ厤����Ū���ϰϤǤ��ߤ䤫���б��������ޤ����ޤ��ܿͤΎÎގ�����¸�ߤ��ʤ��Ȥ��ˤ⎤���ߤ䤫�ˤ��λݤ����Τ��ޤ����ʤ��������Ŀ;�����������������äƤώ�����򴪰Ƥ�������Ū���ϰϤǤμ�����򿽤��������礬����ޤ���<br />\r\n<br />\r\n5 �Ŀ;�����軰���󶡎���Ʊ���ѤˤĤ���<br />\r\n\r\n���ҤǤώ������μ��ێ����ڎ��ގ��Ď����Ď޷�ѤʤɤˤĤ���¾�Ҥ���Ԥ���ꤷ�Ƥ��ޤ��������β�Ҥώ����ѼԤθĿ;������̩���ݻ�����٤˽��̤ˤƵ�̩�ݻ�������ӎ������μ��ێ����ڎ��ގ��Ď����Ď޷�Ѥʤɵ�̩�ݻ����������줿������Ū���ϰϳ������ѼԤθĿ;�����Ѥ��뤳�ȤϤ���ޤ������Ҥ�ˡ������ʤ���᤬���������������ѼԤθĿ;���򎤻��������Ѽ��ܿͤ�Ʊ�դ����뤳�Ȥʤ��軰�Ԥ��󶡤��ޤ���<br />\r\n<br />\r\n6 �Ŀ;���δ����ˤĤ���<br />\r\n���Ҥώ��Ŀ;�������Ѥ��̳��ɬ�פʼҰ����������¤����Ŀ;��󤬴ޤޤ�����Τʤɤ��ݴɎ������ʤɤ˴ؤ��뵬§���ꎤ�Ŀ;����ݸ�Τ����ͽ�����֤�֤��ޤ��������ÎѤ���¸����Ƥ���Ŀ;���ˤĤ��Ƥώ���̳��ɬ�פʼҰ����������ѤǤ���褦�������ݎĤȎʎߎ��܎��Ďޤ��Ѱդ��������������´�����»ܤ��ޤ����ʤ����������ݎĤȎʎߎ��܎��Ďޤ�ϳ�������Ǽ��Τʤ��褦���Ť˴������ޤ����Ŀ;���ˤ������Îގ����������Ύ������؎Î��Τ��Ꭴɬ�פ�WEB�͎ߎ����ޤ˶ȳ�ɸ��ΰŹ沽�̿��Ǥ���SSL����Ѥ��ޤ���<br />\r\n<br />\r\n7 20��̤���θĿ;���ˤĤ���<br />\r\n�Ǥώ�20��̤������Ͽ����������Ͽ����20��̤���Ǥ��뤳�Ȥ�Ƚ���������ˤώ��Ŀ;���μ�������ӻ��ѤϹԤ��ޤ��󎡻Ҷ���𤷤Ʋ�²�ξ�����������褦�ʹ԰٤ϹԤäƤ��ޤ���<br />\r\n<br />\r\n8 �ێ��ގ̎����٤ˤĤ���<br />\r\n���Ҥώ����ѼԤ�ư����Ĵ������٤ˎ��������ێ��ގ��̎����٤���Ѥ��ޤ�������ˤ�ꎤ���Ҥώ�����Ū�ʎ��������Ѿ�������뤳�Ȥ��Ǥ��ޤ������Ŀ;���μ��������ϤΤ�������Ѥ��뤳�ȤϤ���ޤ���<br />\r\n\r\n<br />\r\n9 �����ˤβ���<br />\r\n��Ҥ����ѼԤΎ̎����Ďގʎގ�����ȿ�Ǥ��뤿��ˎ����Ύ��̎ߎ׎��ʎގ����ݸ����ˎ������������Ƥ���ͽ��Ǥ������Ҥ����ѼԤξ����ɤΤ褦���ݸ�Ƥ��뤫���ǧ���Ƥ�����������ˤ⎤�����ˤ����Ū�˳�ǧ���뤳�Ȥ򤪴��ᤷ�ޤ���<br />\r\n<br />\r\n10 ���䤤��碌<br />\r\n�Ŀ;���˴ؤ��뤪�䤤��碌����������Ҥ������ˤ��餷�Ƥ��ʤ��Ȥ��ͤ��ξ��ώ��ʲ��ΰ���ˤ�Ϣ����������<br />\r\n[x:0161]<a href=\"fp.php?code=system_support\">���䤤��碌</a><br />\r\n<br />\r\n�ʾ�<br />\r\n<br />\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:08:52','2008-08-09 00:42:58','0000-00-00 00:00:00'),(29,0,'system_caution','�����ƥ�/��ջ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">��ջ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n��������ջ���򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:32:09','2008-08-09 00:45:06','0000-00-00 00:00:00'),(30,0,'system_support','�����ƥ�/���䤤��碌','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���䤤��碌</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�������䤤��碌�����򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:32:54','2008-08-09 00:44:56','0000-00-00 00:00:00'),(31,0,'system_company','�����ƥ�/��ҳ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">��ҳ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�����˲�ҳ��פ򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:33:35','2008-08-09 00:44:48','0000-00-00 00:00:00'),(32,0,'system_device','�����ƥ�/�б�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�б�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�������б�����򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-08 17:35:04','2008-08-09 00:44:38','0000-00-00 00:00:00'),(33,0,'system_decomail_device','�����ƥ�/�ǥ��᡼��/�б�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">�ǥ��᡼���б�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�����˥ǥ��᡼���б�����򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-09 00:22:26','2008-08-09 00:41:26','0000-00-00 00:00:00'),(34,0,'system_sound_device','�����ƥ�/�������/�б�����','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">��������б�����</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n-------------------------<br />\r\n�����˥�������б�����򵭺ܤ��Ʋ�������<br />\r\n-------------------------</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-09 00:23:04','2008-08-09 00:41:13','0000-00-00 00:00:00'),(35,0,'system_ec_first','�����ƥ�/EC/���Ƥ���','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���Ƥ���</span>\r\n</div>\r\n<div style=\"text-align:left;font-size:small;\">\r\n<a name=\"TOP\"></a>\r\n<span style=\"color:#FF0000\">��</span>�����Ѥ�����ɬ�����ɤ߲�������<br />\r\n<span style=\"color:#0035D5\">��</span><a href=\"#mall\">##site_name##�Ȥ�?</a><br />\r\n\r\n<span style=\"color:#0035D5\">��</span><a href=\"#search\">�ߤ������ʤ�õ���Ƥߤ褦!</a><br />\r\n<span style=\"color:#0035D5\">��</span><a href=\"#try\">��äƤߤ褦!</a><br />\r\n<span style=\"color:#0035D5\">��</span><a href=\"#register\">�����Ͽ!</a><br />\r\n<span style=\"color:#0035D5\">��</span><a href=\"#mail\">�Ҏَώ��ޤǤ�äȤ���!</a>\r\n\r\n<br /><br />\r\n<div align=\"center\">\r\n------------------\r\n</div>\r\n\r\n<a name=\"mall\" id=\"mall\"></a><br />\r\n[x:0068]<span style=\"color:#CC0000\">##site_name##�Ȥ�?</span> \r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n�Ϥ���Ƥ����Ǥ�¿����Ƴڤ���뎻���ˎގ������äѤ��Ύ������ˎߎݎ��ގ����ĤǤ���<br />\r\n\r\n<a name=\"search\" id=\"search\"></a><br />\r\n[x:0111]�ߤ������ʤ�õ���Ƥߤ褦!\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n[x:0115]�������̎ߤ���õ��<br />\r\n�ʎߎ܎����Ď��ݎ��̎��������ݎ����Ŏ�������̣�����뎼�����̎ߤ򎸎؎������Ǝ����ʤ�ʤ���ळ�Ȥ��Ǥ��ޤ���\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink>\r\n<a href=\"?action_user_ec=true\" accesskey=\"0\">##site_name##���鎼�����̎ߤ�õ��</a>\r\n<blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink> \r\n</div>\r\n<br />\r\n\r\n[x:0116]��������õ��<br />\r\n���ˤʤ�܎��Ďޤ򸡺�BOX������Ƹ����Ύގ��ݤ򲡤������ǎ����ʤ��椫���Ϣ���뾦�ʤ�õ�����Ȥ��Ǥ��ޤ���<br />\r\n<br />\r\n\r\n<!--������-->\r\n<div align=\"center\">\r\n<span style=\"color:#FFBF00\"><blink>��</blink> ��®õ���Ƥߤ� <blink>��</blink></span>\r\n\r\n<form action=\"index.php\" method=\"post\"><input type=\"hidden\" name=\"action_user_ec_item_list\" value=\"true\">\r\n<input type=\"text\" name=\"keyword\" size=\"14\">\r\n<input type=\"submit\" name=\"submit\" value=\"����\">\r\n</form>\r\n</div>\r\n\r\n[x:0117]�ý�����õ��<br />\r\n##site_name##�Ǥώ������ʾ��ʤ亣����ξ��ʤ򽸤᤿�ý������Ŏ�����������!!<br />\r\n�����˾��ʤ�GET�������ʤ鎺��!!\r\n\r\n\r\n<div align=\"right\">\r\n<a href=\"#TOP\">���͎ߎ�����TOP��</a>\r\n\r\n</div>\r\n\r\n\r\n<a name=\"try\" id=\"try\"></a><br />\r\n[x:0086]<span style=\"color:#CC0000\">��äƤߤ褦!</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n\r\n[x:0162]����������ʧ��ˡ<br />\r\n�����Ͼ��ʤˤ�äưۤʤ�ޤ���<br />\r\n��ˤώ�����̵���ξ��ʤ⤢��ޤ��ΤǤ���ƨ���ʤ�!!<br />\r\n�����ˡ�ϰʲ����椫�����򤹤뤳�Ȥ��Ǥ��ޤ���<br />\r\n<br />\r\n\r\n��<a href=\"fp.php?code=system_ec_paycredit\">���ڎ��ގ��Ď����Ď޷��</a><br />\r\n�����ݎˎގƷ��<br />\r\n����<a href=\"fp.php?code=system_ec_payconveni#seven\">���̎ގݎ��ڎ̎ގ�</a><br />\r\n����<a href=\"fp.php?code=system_ec_payconveni#lawson\">�ێ�����</a><br />\r\n\r\n����<a href=\"fp.php?code=system_ec_payconveni#famima\">�̎��Ў؎��ώ���</a><br />\r\n\r\n��<a href=\"fp.php?code=system_ec_paycollect\">������</a><br />\r\n��<a href=\"fp.php?code=system_ec_paybank\">��Կ���</a><br /><br />\r\n\r\n[x:0162]�㤤ʪ�����äơ�<br />\r\n�������ä����ʤ򸫤Ĥ������<br />\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">�֤�����������</div>\r\n\r\n�ܥ���򲡤��ơ��㤤ʪ�����˾��ʤ�����ޤ��礦��<br /><br />\r\n	\r\n[x:0162]�����ξ��ʤ����\r\n�㤤ʪ���������줿�����ǤϹ����ϴ�λ���ޤ���<br />\r\n\r\n<div align=\"center\" style=\"text-align:center;font-size:small;\">����ʸ���̤˿ʤ��</div>\r\n�ܥ���򲡤��ơ�������λ���ޤ��礦��<br /><br />\r\n\r\n\r\n<a name=\"register\" id=\"register\"></a>\r\n[x:0109]���㤤ʪ���줿���ȤΤʤ����ϡ������Ͽ�򤷤ޤ��礦��<br />\r\n�����󤷤Ƥ���ʪ����ȡ��Ύߎ��ݎĤ����ޤä��ꡢ�������Ϥ��ά���������ޤ���<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���\">̵�������Ͽ�ώ�����</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n</div>\r\n\r\n<br />\r\n##site_name##�����Ͽ����ȡ�\r\n\r\n����ʪ���ޤ��ޤ��ڤ����ʤ���ŵ�����äѤ�\r\n<br /><br />\r\n[x:0085]���ݤʽ������Ϥ�����!<br />\r\n�������ˎێ��ގ��ݤ������Ϥ��Ƥ������Ȥǎ�����ʪ���μ�֤��ʤ��ޤ���<br /><br />\r\n[x:0085]�Ύߎ��ݎĤ����ޤ�ޤ���<br />\r\n�������ۤ˱����ƎΎߎ��ݎĤ����ޤ�!<br />\r\n\r\n    �Ύߎ��ݎĤϤ���ʪ�ۤγ���ˤ����ѤǤ����ꡢ�Ύ��ʎގ����䎺�ݎÎݎ¤ʤɤˤ����Ѳ�ǽ��<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���\">̵�������Ͽ�ώ�����</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div><br />\r\n\r\n[x:0046]�Ύߎ��ݎĤä�??<br />\r\n\r\n������ʤ鎤�ێ��ގ��ݤ򤷤Ƥ��Τޤޤ���ʪ��������Ύߎ��ݎĤ����ޤ�ޤ���<br />\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"?action_user_ec=true\" accesskey=\"0\">����ʪ�ώ����פ���</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div>\r\n<br />\r\n\r\n[x:0161]�Ύߎ��ݎĤ�Ȥ�<br />\r\n������ʪ��ȯ�������Ύߎ��ݎĤώ�����厤����ʪ��ȯ�������Ύߎ��ݎĤ�Ȥ����Ȥ��Ǥ��ޤ��� <br /><br />\r\n\r\n    <span style=\"color:#FF0000\">��</span>��Ź�ǻȤ� ����ʪ�ˎΎߎ��ݎĤ�Ȥ����ώ��㤤ʪ�����˾��ʤ����쎤���Τޤ޿ʤߎ��Ύߎ��ݎĤ�Ȥ������򤷤Ƥ��������� \r\n    �Ύߎ��ݎĤϡ�100�Ύߎ��ݎġۤ�����Ѳ�ǽ�Ǥ���<br />\r\n    <span style=\"color:#FF0000\">��</span>����ˎΎߎ��ݎĤ򤿤��!! �Ύߎ��ݎĎ����̎ߎ����ݎ͎ߎ��ݤʤɳƼ���ݎ͎ߎ��ݤ�»ܤ��Ƥ��ޤ�!! \r\n    �����ʎ����Ўݎ��ޤ򸫤Τ����������������Ύߎ��ݎĤ򤿤�ƎȢ�<br />\r\n\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"?action_user_ec=true\" accesskey=\"0\">���ä�������ʪ</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n</div>\r\n<div align=\"right\">\r\n<a href=\"#TOP\">���͎ߎ�����TOP��</a>\r\n</div><br />\r\n\r\n<a name=\"mail\" id=\"mail\"></a>\r\n[x:0105]<span style=\"color:#CC0000\">�Ҏَώ��ޤǤ�äȤ���! \r\n</span> \r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n�����ʾ����̵���Ǥ��Ϥ�����Ҏ��َ����ˎގ���<br />\r\n���͎ގݎĎ����徦�ʤʤɎ��ΤäƤ����Ȏ��׎�����!���ʾ��󤬤��äѤ�! �Ҏ��٤Ǥ����Ϥ䤯���Τ����ʤ������GET<span style=\"color:#FF9933\">��</span><br />\r\n�ɤ�ʪ�Ȥ��Ƥ�ڤ���ޤ���\r\n�ޤ��ϲ����Ͽ���ƎȢ�<br />\r\n<div align=\"center\">\r\n<blink><span style=\"color:#0035D5\">&lt;&lt;</span></blink><a href=\"mailto:##regist_mailaddress##?subject=�����Ͽ&body=���Τޤޥ᡼����������Ƥ���������%0D%0A�����Ͽ�Τ���³���᡼�뤬�Ϥ��ޤ���\">̵�������Ͽ�ώ�����</a><blink><span style=\"color:#0035D5\">&gt;&gt;</span></blink>\r\n\r\n</div>\r\n<div align=\"right\">\r\n<a href=\"#TOP\">���͎ߎ�����TOP��</a>\r\n</div>\r\n<br />\r\n[x:0186]<span style=\"color:#CC0000\">�����ˡ</span>\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\" />\r\n����³���ϰʲ��μ��ǿ����͎ߎ����ޤޤǎ���������������³���򤪴ꤤ�������ޤ���<br />\r\n<br />\r\n����ێ��ގ��ݢ�����������ѹ����������Ϥ����餫�鎣��������³����\r\n\r\n<div align=\"right\">\r\n<a href=\"#TOP\">���͎ߎ�����TOP��</a>\r\n</div>\r\n</div>\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n',1,'2008-08-10 12:21:41','2008-08-10 15:28:32','0000-00-00 00:00:00'),(36,19,'shop_fp_sample01','����åץե꡼�ڡ�������ץ룰��','<html>\r\n<head>\r\n<title>##site_name##</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mobile.css\" media=\"screen\" />\r\n</head>\r\n<body bgcolor=\"##site_bg_color##\" text=\"##site_text_color##\" link=\"##site_link_color##\" vlink=\"##site_vlink_color##\" alink=\"##site_alink_color##\" style=\"color:##site_text_color##; background-color:##site_bg_color##\">\r\n<style type=\"text/css\">\r\n<![CDATA[\r\na:link{color:##site_link_color##}\r\na:visited{color:##site_vlink_color##}\r\na:active{color:##site_alink_color##}\r\n]]>\r\n</style>\r\n<!--����ƥʳ���-->\r\n<div id=\"container\">\r\n\r\n<div style=\"text-align:center;font-size:small;background-color:##site_title_bg_color##\">\r\n<span style=\"color:##site_title_font_color##;font-size:small\">���褦�������軨��Ź��!��</span>\r\n</div>\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n</div>\r\n<br />\r\n<div style=\"text-aling:left;font-size:small;\">\r\ntest test test test test test test test test test test test test test test test test test test test test test test test test test</div>\r\n<br />\r\n<div style=\"text-align:center;font-size:small;\">\r\n<br />\r\n</div>\r\n<br />\r\n\r\n<!--�եå���-->\r\n<hr color=\"##site_hr_color##\" style=\"border:solid 1px ##site_hr_color##\">\r\n<div align=\"left\" style=\"text-align:left;font-size:small;\">\r\n[x:0124]<a href=\"./\" accesskey=\"0\">�Ď��̎ߤ�</a>\r\n</div>\r\n<div style=\"text-align:center; background-color:#FF9933\">\r\n<span style=\"color:#F8F8FF;font-size:small\">(c)##site_name##</span>\r\n</div>\r\n</div>\r\n</body>\r\n</html>\r\n\r\n\r\n\r\n\r\n',1,'2008-08-11 12:48:33','2008-08-11 18:44:58','0000-00-00 00:00:00'),(37,19,'shop_fp_sample02','���軨�߲��Υե꡼�ڡ�����','�ե꡼�ڡ������Ǥ���',1,'2008-08-11 18:05:37','2008-08-11 18:05:37','0000-00-00 00:00:00');

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL auto_increment COMMENT '�ե�����ID',
  `file_name` text NOT NULL COMMENT '�ե�����̾',
  `file_name_o` text NOT NULL COMMENT '���ꥸ�ʥ�ե�����̾',
  `file_memo` text COMMENT '�ե�������',
  `file_status` tinyint(1) NOT NULL COMMENT '�ե����륹�ơ�������0:̵�� 1:ͭ��',
  `file_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `file_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `file_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
  PRIMARY KEY  (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ե�����ơ��֥�';
INSERT INTO `file` VALUES (1,'','',NULL,0,'2008-04-03 18:47:03','2008-04-03 19:08:59','2008-04-03 19:08:59'),(2,'','',NULL,0,'2008-04-03 18:47:53','2008-04-03 19:08:54','2008-04-03 19:08:54'),(3,'12072162991710942a779.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:39','2008-04-03 18:51:39','0000-00-00 00:00:00'),(4,'12072163067b7d17fda18.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:46','2008-04-03 18:51:46','0000-00-00 00:00:00'),(5,'1207216309e79c07f94.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:51:49','2008-04-03 19:39:44','2008-04-03 19:39:44'),(6,'120721642183d24d846c64.gif','rapi_love20_s1.gif',NULL,0,'2008-04-03 18:53:41','2008-04-03 18:53:41','0000-00-00 00:00:00'),(7,'12072167812f1ead7db.gif','rapi_leave06_s1.gif',NULL,0,'2008-04-03 18:59:41','2008-04-03 18:59:41','0000-00-00 00:00:00'),(8,'1207216927670add1b1.gif','rapi_congra03b_s1.gif',NULL,0,'2008-04-03 19:02:07','2008-04-03 19:02:07','0000-00-00 00:00:00'),(9,'12072173512cc79b2.gif','dou_thanks08_s1.gif',NULL,0,'2008-04-03 19:09:11','2008-04-03 19:09:11','0000-00-00 00:00:00'),(10,'120721740242d2a1.gif','dou_thanks08_s1.gif',NULL,0,'2008-04-03 19:10:02','2008-04-03 19:10:02','0000-00-00 00:00:00'),(11,'1207217430dec17e.gif','niji_notice11_s1.gif',NULL,0,'2008-04-03 19:10:30','2008-04-03 19:10:30','0000-00-00 00:00:00'),(12,'120721743781f12ba18.gif','mochi_say02_s1.gif',NULL,0,'2008-04-03 19:10:37','2008-04-03 19:10:37','0000-00-00 00:00:00'),(13,'120721744801a5048.gif','dl_leave06_s1.gif',NULL,0,'2008-04-03 19:10:48','2008-04-03 19:10:48','0000-00-00 00:00:00'),(14,'120721745977588326207.gif','mochi_word02_s2.gif',NULL,0,'2008-04-03 19:10:59','2008-04-03 19:10:59','0000-00-00 00:00:00'),(15,'1207219116659cb123504b.gif','dl_leave06_s2.gif',NULL,0,'2008-04-03 19:38:36','2008-04-03 19:38:36','0000-00-00 00:00:00'),(16,'1207620603c85f3.gif','test1.gif',NULL,0,'2008-04-08 11:10:03','2008-04-08 11:10:03','0000-00-00 00:00:00'),(17,'120762064161d567760440.gif','banner.gif',NULL,0,'2008-04-08 11:10:41','2008-04-08 11:10:41','0000-00-00 00:00:00'),(18,'1207620712b9a900f846df.gif','no_mochi.gif',NULL,0,'2008-04-08 11:11:52','2008-04-08 11:11:52','0000-00-00 00:00:00'),(19,'1207620746e8185b4.gif','no_soy_donatu.gif',NULL,0,'2008-04-08 11:12:26','2008-04-08 11:12:26','0000-00-00 00:00:00'),(20,'1207620865860706.jpg','alice.jpg',NULL,0,'2008-04-08 11:14:25','2008-04-08 11:14:25','0000-00-00 00:00:00'),(21,'12076209394620a5938fa.gif','busane.gif',NULL,0,'2008-04-08 11:15:39','2008-04-08 11:19:16','2008-04-08 11:19:16'),(22,'1207621016fa2798d8eb33.gif','alice_s.gif',NULL,0,'2008-04-08 11:16:56','2008-04-08 11:16:56','0000-00-00 00:00:00'),(23,'1207621022c685d72c.gif','busane_s.gif',NULL,0,'2008-04-08 11:17:02','2008-04-08 11:17:02','0000-00-00 00:00:00'),(24,'1207621026c4fcd.gif','cn_s.gif',NULL,0,'2008-04-08 11:17:06','2008-04-08 11:17:06','0000-00-00 00:00:00'),(25,'12076210319a73f11d0ff3.gif','dls_s.gif',NULL,0,'2008-04-08 11:17:11','2008-04-08 11:17:11','0000-00-00 00:00:00'),(26,'1207621036f7b018669558.gif','donatu_s.gif',NULL,0,'2008-04-08 11:17:16','2008-04-08 11:17:16','0000-00-00 00:00:00'),(27,'1207621041746986704f82.gif','hood_s.gif',NULL,0,'2008-04-08 11:17:21','2008-04-08 11:17:21','0000-00-00 00:00:00'),(28,'12076210456ee9ff8.gif','hood_s.gif',NULL,0,'2008-04-08 11:17:25','2008-04-08 11:17:25','0000-00-00 00:00:00'),(29,'12076210499de33a7c.gif','kc_s.gif',NULL,0,'2008-04-08 11:17:29','2008-04-08 11:17:29','0000-00-00 00:00:00'),(30,'1207621054877648.gif','lapi_s.gif',NULL,0,'2008-04-08 11:17:34','2008-04-08 11:17:34','0000-00-00 00:00:00'),(31,'12076210596838868eecc7.gif','mochi.gif',NULL,0,'2008-04-08 11:17:39','2008-04-08 11:17:39','0000-00-00 00:00:00'),(32,'120762106306c847d7.gif','mochi_s.gif',NULL,0,'2008-04-08 11:17:43','2008-04-08 11:17:43','0000-00-00 00:00:00'),(33,'12076210685a9ecdf43.gif','napa_s.gif',NULL,0,'2008-04-08 11:17:48','2008-04-08 11:17:48','0000-00-00 00:00:00'),(34,'1207621074b6064b67c5c1.gif','nijiusa_s.gif',NULL,0,'2008-04-08 11:17:54','2008-04-08 11:17:54','0000-00-00 00:00:00'),(35,'1207621081b9716b0abb33.gif','pp_s.gif',NULL,0,'2008-04-08 11:18:01','2008-04-08 11:18:01','0000-00-00 00:00:00'),(36,'1207621092e8dc3f5e.gif','pp_s.gif',NULL,0,'2008-04-08 11:18:12','2008-04-08 11:18:12','0000-00-00 00:00:00'),(37,'1207621101d24635ad56ab.gif','sc_s.gif',NULL,0,'2008-04-08 11:18:21','2008-04-08 11:18:21','0000-00-00 00:00:00'),(38,'12076211063e9cf8ab188.gif','st_s.gif',NULL,0,'2008-04-08 11:18:26','2008-04-08 11:18:26','0000-00-00 00:00:00'),(39,'12076211168fb52aa7.gif','tuco_s.gif',NULL,0,'2008-04-08 11:18:36','2008-04-08 11:18:36','0000-00-00 00:00:00'),(40,'1207621124e0ed392c.gif','wa_s.gif',NULL,0,'2008-04-08 11:18:44','2008-04-08 11:18:44','0000-00-00 00:00:00'),(41,'12154896227bd7fbc5af7.jpg','ba_1615.jpg',NULL,0,'2008-04-10 19:42:28','2008-07-08 13:00:29','2008-07-08 13:00:29'),(42,'1207824160506280519.jpg','20070729-00000112-reu-bus_all-view-000.jpg',NULL,0,'2008-04-10 19:42:40','2008-04-10 19:42:49','2008-04-10 19:42:49'),(43,'1207824187cda0c0.jpg','15jmd13sops.jpg',NULL,0,'2008-04-10 19:43:07','2008-04-10 19:43:14','2008-04-10 19:43:14'),(44,'','',NULL,0,'2008-05-16 20:29:43','2008-05-16 20:29:47','2008-05-16 20:29:47'),(45,'1215481625360797740d.jpg','080424_hefti_100x100.jpg',NULL,1,'2008-05-16 20:32:29','2008-07-08 10:47:05','0000-00-00 00:00:00'),(46,'1210937760e2e9fe18a.jpg','1.jpg',NULL,0,'2008-05-16 20:36:00','2008-05-16 20:37:36','2008-05-16 20:37:36'),(47,'1210937866f58b6e.jpg','1d.jpg',NULL,0,'2008-05-16 20:37:46','2008-05-16 20:40:38','2008-05-16 20:40:38'),(48,'','',NULL,0,'2008-06-06 21:33:41','2008-06-06 21:33:41','0000-00-00 00:00:00'),(49,'12127556420861d.gif','1_1.gif',NULL,1,'2008-06-06 21:34:02','2008-06-06 21:34:02','0000-00-00 00:00:00'),(50,'121543371565265626f.jpg','1d.jpg',NULL,0,'2008-07-07 21:28:35','2008-07-07 21:29:17','2008-07-07 21:29:17'),(51,'1217217824aef36d.jpg','13_2.jpg',NULL,1,'2008-07-28 13:03:44','2008-07-28 13:03:44','0000-00-00 00:00:00'),(52,'1217217865a33d5c722e4.gif','1002_2.gif',NULL,1,'2008-07-28 13:04:25','2008-07-28 13:04:25','0000-00-00 00:00:00'),(53,'1219225420c59572.jpg','','',1,'2008-07-28 19:14:23','2008-08-20 18:43:40','0000-00-00 00:00:00'),(54,'12173198495e5f4319d97.jpg','1.jpg',NULL,0,'2008-07-29 17:24:09','2008-07-29 17:32:12','2008-07-29 17:32:12'),(55,'1217386822c9dfb5.jpg','1.jpg',NULL,1,'2008-07-30 12:00:21','2008-07-30 12:00:21','0000-00-00 00:00:00'),(56,'12173868431ff0adf69.jpg','2.jpg',NULL,1,'2008-07-30 12:00:43','2008-07-30 12:00:43','0000-00-00 00:00:00'),(57,'12173868533e99270ce426.jpg','3.jpg','������',1,'2008-07-30 12:00:53','2008-08-20 18:38:09','0000-00-00 00:00:00'),(58,'1219225069f75810a.jpg','080424_hefti_100x100.jpg','youtube1',1,'2008-08-05 18:02:45','2008-08-20 18:38:56','0000-00-00 00:00:00'),(59,'12192253151d28796a15bf.jpg','ck.jpg','������1',1,'2008-08-20 18:41:55','2008-08-20 19:42:31','0000-00-00 00:00:00'),(60,'12217203975211bf3.jpg','1.jpg','',1,'2008-09-18 15:46:36','2008-09-18 15:46:36','0000-00-00 00:00:00'),(61,'122172407078f37ab3ee7e.jpg','ba_046_s.jpg','',1,'2008-09-18 16:47:50','2008-09-18 16:47:50','0000-00-00 00:00:00');

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE `mail_template` (
  `mail_template_id` int(11) NOT NULL auto_increment COMMENT '�᡼��ƥ�ץ졼��ID',
  `mail_template_code` varchar(255) NOT NULL COMMENT '�᡼��ƥ�ץ졼�ȥ�����',
  `mail_template_name` text NOT NULL COMMENT '�᡼��ƥ�ץ졼��̾',
  `mail_template_title` text NOT NULL COMMENT '�᡼��ƥ�ץ졼�ȥ����ȥ�',
  `mail_template_body` text NOT NULL COMMENT '�᡼��ƥ�ץ졼����ʸ',
  `mail_template_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '�᡼��ƥ�ץ졼�ȥ��ơ�������0:���,1:ͭ����',
  PRIMARY KEY  (`mail_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�᡼��ƥ�ץ졼�ȥơ��֥�';
INSERT INTO `mail_template` VALUES (1,'user_regist','','[##site_name##]�����Ͽ','�����٤�[##site_name##]����Ͽ��������ĺ�������꤬�Ȥ��������ޤ����� \r\n����URL�������Ͽ��λ�����Ƥ���������\r\n##regist_url####user_hash##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(2,'user_already_member_error','','[##site_name##]�����Ͽ���顼','�����٤�[##site_name##]����Ͽ��������ĺ�������꤬�Ȥ��������ޤ����� \r\n���ʤ��ϴ��˲���Τ�����Ͽ���뤳�Ȥ�����ޤ���\r\n����URL�������󤷤Ƥ���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(3,'user_change_mailaddress_done','','[##site_name##]�᡼�륢�ɥ쥹�ѹ�','�᡼�륢�ɥ쥹���ѹ�����λ���ޤ�����\r\n����URL�������󤷤Ƥ���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(4,'user_change_mailaddress_error','','[##site_name##]�᡼�륢�ɥ쥹�ѹ����顼','���Υ᡼�륢�ɥ쥹�ϴ��˻Ȥ��Ƥ��ޤ����̤Υ᡼�륢�ɥ쥹����ꤷ�Ʋ�������\r\n��������ϲ���URL�������󤷤Ƥ���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(5,'user_regist_done','','[##site_name##]�����Ͽ��λ','�����٤�[##site_name##]����Ͽ����ĺ�������꤬�Ȥ��������ޤ����� \r\n����URL�������󤷤Ʋ�������\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(6,'user_remind','','[##site_name##]�ѥ��������','[##site_name##]������ĺ�������꤬�Ȥ��������ޤ��� \r\n���ʤ��Υѥ���ɤˤʤ�ޤ���\r\n##user_password##\r\n��������ϲ���URL�������󤷤Ƥ���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(7,'user_invite','','[##site_name##]���Ծ������ꤷ�ޤ�','##to_user_mailaddress##����\r\n\r\n##from_user_nickname##�����ꡢ���ʤ��ء���##site_name##�פؤξ��Ծ����Ϥ��Ƥ��ޤ���\r\n\r\n��##from_user_nickname##���󤫤�Υ�å�����\r\n##invite_message##\r\n\r\n��������URL�������Ͽ(̵��)��Ԥ��С�\r\n���ʤ���##site_name##�˻��äǤ��ޤ���\r\n##regist_url####user_hash##\r\n\r\n�����Ǥ�##site_name##����Ͽ�Ѥߤξ��ϡ�\r\nͧã��󥯿������Ϥ��Ƥ��ޤ��ΤǤ���ǧ����������\r\n##login_url##\r\n\r\n�����Ծ��������Ԥ˳Ф����ʤ����\r\n�᡼�륢�ɥ쥹���ä���������Ƥ����ǽ��������ޤ���\r\n���Ѥ�����ǤϤ������ޤ�����\r\n�ʲ��Τ��䤤��碌��ޤǤ�Ϣ����������\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ���##support_mailaddress##\r\n',1),(8,'user_got_message','','[##site_name##]��å��������Ϥ��Ƥ��ޤ�','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n����Ȣ�� ##from_user_nickname## ���󤫤�Υ�å��������Ϥ��Ƥ��ޤ���\r\n��å����������Ƥ��ǧ����ˤϰʲ���URL�򥯥�å����ƥ����󤷤���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(9,'user_friend_apply','','[##site_name##]ͧã��󥯿������Ϥ��Ƥ��ޤ�','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n##from_user_nickname##���󤫤�ͧã��󥯿������Ϥ��Ƥ��ޤ�\r\n���Ƥ��ǧ����ˤϰʲ���URL�򥯥�å����ƥ����󤷤���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(10,'user_bbs','','[##site_name##]�����Ĥ˽񤭹��ߤ�����ޤ���','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n�����Ĥ� ##from_user_nickname## ���󤫤��������Ϥ��Ƥ��ޤ���\r\n�������Ƥ��ǧ����ˤϰʲ���URL�򥯥�å����ƥ����󤷤���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(11,'alert','','[##site_name##]##alert_subject##','[��������]##alert_date##\r\n[�ե�����]##alert_file##\r\n[��������]##alert_body##\r\n',1),(12,'user_image_success','','[##site_name##]������ƴ�λ','[##site_name##]������ĺ�������꤬�Ȥ��������ޤ��� \r\n��������Ƥ���λ���ޤ�����\r\n��������ϲ���URL�������󤷤Ʋ�������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(13,'user_image_error','','[##site_name##]������ƥ��顼','�����٤�[##site_name##]������ĺ�������꤬�Ȥ��������ޤ��� \r\n���Ѥ�����Ǥ��������åץ��ɤ��줿���������顼�Τ��ᤴ���Ѥˤʤ�ޤ���\r\n##error##\r\n\r\n������Υ᡼�륢�ɥ쥹���˺��ٲ�����ź�դ��Ƥ����겼������\r\n##image_mailaddress##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(14,'user_community_join','','[##site_name##]���ߥ�˥ƥ����ÿ���','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n���ʤ��Υ��ߥ�˥ƥ��˻��ô�˾�οͤ����ޤ����嵭URL���饢����������ǧ�ڤ��Ʋ�������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##',1),(15,'user_review','','[##site_name##]ɾ���򤪴ꤤ���ޤ���','##user_name##��\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n\r\n���������������ޤ������ʡ�##item_name##�פ�ɾ���򤪴ꤤ�������ޤ���\r\n\r\n##user_url##?action_user_ec_review_add=true&review_id=##review_id##&review_hash=##review_hash##\r\n���ʤ�ɾ���ˤ�����ĺ���ޤ��������顡�����ǡ�1,000##point_name##�ۥץ쥼��ȡ���\r\n\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##\r\n',1),(16,'user_order','��ʸ��ǧ�᡼�롡�ƥ����ѥǡ���','[##site_name##]����ʸ���Ƴ�ǧ','??????????\r\n�ܥ᡼��ϡ��������ȤˤƤ���ʸ���������������ͤءڤ���ʸ���ơۤγ�ǧ�򤤤���������Ρ���ư�ۿ��᡼��ȤʤäƤ���ޤ���\r\n�����ʤ���������Ф����ʤ����Υ᡼�뤬�Ϥ������ϡ�������Ǥ��������� ##admin_mailaddress## �ޤǤ�Ϣ����������\r\n�������ġġġġ�����\r\n������ʸ��³����λ\r\n�����ġġġġġġ���\r\n\r\n##user_name##����\r\n\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n�ʲ������ƤǾ��ʤ���ʸ��³����Ԥ��ޤ����ΤǤ���ǧ����������\r\n\r\n���ڤ���ʸ����ۡ��\r\n\r\n��ʸ������##user_order_created_time##\r\n��ʸ�ֹ桧##user_order_no##\r\n��ʧ��ˡ��������\r\n�����ʤϤ��٤��ǹ�ɽ���ȤʤäƤ���ޤ���\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n�����ס���##item_type##\r\n�����ֹ桧##item_id##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##item_price##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġġ�\r\n�������ס�����##user_order_total_price1##��\r\n(�������)����##user_order_tax##��\r\n��������������##user_order_postage##��\r\n������������##user_order_exchange_fee##��\r\n##if[user_order_expend_point]##\r\n�ݥ��������ʬ������-##user_order_expend_point##��\r\n##/if[user_order_expend_point]##\r\n�ġġġġġġġġġġ�\r\n���硡�ס���##user_order_total_price2##��\r\n\r\n�����������\r\n\r\n\r\n���ݥ���ȤˤĤ���\r\n�㤤ʪ�����׾夵��Ƥ���ݥ���Ȥϡ����ʷ�ѻ��ˤϲû�����ޤ���\r\n���ʤνвٳ����βû��Ȥʤ�ޤ���ͽ�ᤴλ������������\r\n\r\n�����ʤ�ȯ���ˤĤ���\r\n���ʤΤ��Ϥ��ϡ�����ʸ������10�����Ȥʤ�ޤ���\r\nȯ������λ�������ޤ����顢����ȯ���Τ��Τ餻�᡼�뤬�Ϥ��ޤ���\r\n���ʤˤ�äƤ�1�������夫������⤴�����ޤ������������٤��������Ӥ��Τ餻�������ޤ�\r\n2���ְʾ夿�äƤ⾦�ʤ��Ϥ��ʤ����ϡ����䤤��碌����������\r\n\r\n������󥻥�˴ؤ���\r\n������åפǤϡ����̸���ʤ�Ӥ˴��ָ���η��Ǥ������ԤäƤ��뤿�ᡢ���������߸�Υ���󥻥�ϼ����դ��Ƥ���ޤ���\r\n\r\n�������ʤ˴ؤ���\r\n���ʤ��ʼ��ˤ���������դ�ʧ�äƤ���ޤ����������ξ��Τ�����������ô�Ǥ����ؤ������Ƥ��������ޤ���\r\n\r\n��������λ���������»����»��ȯ���������\r\n������ߥ��ˤ����ʸ���줿���ʤȰۤʤ���\r\n������ź�դη���������줿��ͳ�ˤ����\r\n\r\n���κݤϡ���������������˺��������2������ˡ�##admin_mailaddress##�ޤǤ�Ϣ����������\r\n\r\n�ʾ头����ξ塢���ʤΤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##\r\n',1),(17,'user_order1','��ʸ��ǧ�᡼�� ���쥸�å�','[##site_name##]����ʸ���Ƴ�ǧ','??????????\r\n�ܥ᡼��ϡ��������ȤˤƤ���ʸ���������������ͤءڤ���ʸ���ơۤγ�ǧ�򤤤���������Ρ���ư�ۿ��᡼��ȤʤäƤ���ޤ���\r\n�����ʤ���������Ф����ʤ����Υ᡼�뤬�Ϥ������ϡ�������Ǥ��������� ##admin_mailaddress## �ޤǤ�Ϣ����������\r\n�������ġġġġ�����\r\n������ʸ��³����λ\r\n�����ġġġġġġ���\r\n\r\n##user_name##����\r\n\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n�ʲ������ƤǾ��ʤ���ʸ��³����Ԥ��ޤ����ΤǤ���ǧ����������\r\n\r\n���ڤ���ʸ����ۡ��\r\n\r\n��ʸ������##user_order_created_time##\r\n��ʸ�ֹ桧##user_order_no##\r\n��ʧ��ˡ�����쥸�åȥ�����\r\n�����ʤϤ��٤��ǹ�ɽ���ȤʤäƤ���ޤ���\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n�����ס���##item_type##\r\n�����ֹ桧##item_id##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġġ�\r\n�������ס�����##user_order_total_price1##��\r\n(�������)����##user_order_tax##��\r\n��������������##user_order_postage##��\r\n������������##user_order_exchange_fee##��\r\n##if[user_order_expend_point]##\r\n�ݥ��������ʬ������-##user_order_expend_point##��\r\n##/if[user_order_expend_point]##\r\n�ġġġġġġġġġġ�\r\n���硡�ס���##user_order_total_price2##��\r\n\r\n�����������\r\n\r\n\r\n���ݥ���ȤˤĤ���\r\n�㤤ʪ�����׾夵��Ƥ���ݥ���Ȥϡ����ʷ�ѻ��ˤϲû�����ޤ���\r\n���ʤνвٳ����βû��Ȥʤ�ޤ���ͽ�ᤴλ������������\r\n\r\n�����ʤ�ȯ���ˤĤ���\r\n���ʤΤ��Ϥ��ϡ�����ʸ������10�����Ȥʤ�ޤ���\r\nȯ������λ�������ޤ����顢����ȯ���Τ��Τ餻�᡼�뤬�Ϥ��ޤ���\r\n���ʤˤ�äƤ�1�������夫������⤴�����ޤ������������٤��������Ӥ��Τ餻�������ޤ�\r\n2���ְʾ夿�äƤ⾦�ʤ��Ϥ��ʤ����ϡ����䤤��碌����������\r\n\r\n������󥻥�˴ؤ���\r\n������åפǤϡ����̸���ʤ�Ӥ˴��ָ���η��Ǥ������ԤäƤ��뤿�ᡢ���������߸�Υ���󥻥�ϼ����դ��Ƥ���ޤ���\r\n\r\n�������ʤ˴ؤ���\r\n���ʤ��ʼ��ˤ���������դ�ʧ�äƤ���ޤ����������ξ��Τ�����������ô�Ǥ����ؤ������Ƥ��������ޤ���\r\n\r\n��������λ���������»����»��ȯ���������\r\n������ߥ��ˤ����ʸ���줿���ʤȰۤʤ���\r\n������ź�դη���������줿��ͳ�ˤ����\r\n\r\n���κݤϡ���������������˺��������2������ˡ�##admin_mailaddress##�ޤǤ�Ϣ����������\r\n\r\n�ʾ头����ξ塢���ʤΤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##',1),(18,'user_order2','��ʸ��ǧ�᡼�롡����ӥ�','[##site_name##]����ʸ���Ƴ�ǧ','??????????\r\n�ܥ᡼��ϡ��������ȤˤƤ���ʸ���������������ͤءڤ���ʸ���ơۤγ�ǧ�򤤤���������Ρ���ư�ۿ��᡼��ȤʤäƤ���ޤ���\r\n�����ʤ���������Ф����ʤ����Υ᡼�뤬�Ϥ������ϡ�������Ǥ��������� ##admin_mailaddress## �ޤǤ�Ϣ����������\r\n�������ġġġġ�����\r\n������ʸ��³����λ\r\n�����ġġġġġġ���\r\n\r\n##user_name##����\r\n\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n�ʲ������ƤǾ��ʤ���ʸ��³����Ԥ��ޤ����ΤǤ���ǧ����������\r\n\r\n���ڤ���ʸ����ۡ��\r\n\r\n��ʸ������##user_order_created_time##\r\n��ʸ�ֹ桧##user_order_no##\r\n��ʧ��ˡ������ӥ˷�� ##user_order_conveni_type##\r\n�����ʤϤ��٤��ǹ�ɽ���ȤʤäƤ���ޤ���\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n�����ס���##item_type##\r\n�����ֹ桧##item_id##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġġ�\r\n�������ס�����##user_order_total_price1##��\r\n(�������)����##user_order_tax##��\r\n��������������##user_order_postage##��\r\n������������##user_order_exchange_fee##��\r\n##if[user_order_expend_point]##\r\n�ݥ��������ʬ������-##user_order_expend_point##��\r\n##/if[user_order_expend_point]##\r\n�ġġġġġġġġġġ�\r\n���硡�ס���##user_order_total_price2##��\r\n\r\n�����������\r\n\r\n������ʧ����ˡ\r\n##if[seveneleven]##\r\n**********************\r\n���֥󥤥�֥�ǤΤ���ʧ��\r\n**********************\r\n##user_order_conveni_pay_url##\r\n�嵭��ʧ��ɼ��������ơ�����ʧ�����������ݤ˥쥸�ˤ��Ϥ�����������\r\n�����Ǥ��ʤ����ϡ��إ��󥿡��ͥåȤǤΤ���ʧ���٤ȥ쥸�ˤƤ������Фξ塢��##user_order_conveni_sale_code##�٤���������������\r\n##/if[seveneleven]##\r\n##if[famima]##\r\n**********************\r\n�ե��ߥ꡼�ޡ��ȤǤΤ���ʧ��\r\n**********************\r\n1.ŹƬ��Fami�ݡ��Ȥβ��̤�������\r\n��������ʧ����=>�ؼ�Ǽɽȯ�ԡ�\r\n2.��ȥ����ɤˡ�10020�٤�����\r\n3.��ʸ�ֹ�˻�ʧ���ֹ��##user_order_conveni_sale_code##�٤�����\r\n4.���̤˽�����Fami�ݡ��Ȥ��ȯ�Ԥ���뿽�����߷���쥸�ؤ��󼨲�������\r\n##/if[famima]##\r\n##if[lawson]##\r\n**********************\r\n������ǤΤ���ʧ��\r\n**********************\r\n1.�������Loppiü������إ��󥿡��ͥåȼ��ա٤�����\r\n2.����ʧ�����ֹ�˻�ʧ���ֹ��##user_order_conveni_sale_code##�٤�����\r\n3.�����ֹ��{$user_phone}�٤�����\r\n4.���̤˽�����ü�����ȯ�Ԥ���뿽�����߷���쥸�Ǥ��󼨲�������\r\n##/if[lawson]##\r\n##if[seicomart]##\r\n**********************\r\n���������ޡ��ȤǤΤ���ʧ��\r\n**********************\r\n1.���������ޡ��ȤΥ���֥��ơ������ü������إ��󥿡��ͥåȼ��ա٤�����\r\n2.����ʧ�����ֹ�˻�ʧ���ֹ��##user_order_conveni_sale_code##�٤�����\r\n3.�����ֹ��##user_phone##�٤�����\r\n4.���̤˽�����ü�����ȯ�Ԥ���뿽�����߷���쥸�Ǥ��󼨲�������\r\n##/if[seicomart]##\r\n\r\n������բ�\r\n���ν�ο�������̾�ˤϡ������Բ��̾�Ρإ��ե쥸�٤ȵ��ܤ���ޤ���\r\n��ʧ����Τ��������ʤɤϼ��ν�˵��ܤ������ֹ�ؤ��䤤��碌��������\r\n\r\n���ݥ���ȤˤĤ���\r\n�㤤ʪ�����׾夵��Ƥ���ݥ���Ȥϡ����ʷ�ѻ��ˤϲû�����ޤ���\r\n���ʤνвٳ����βû��Ȥʤ�ޤ���ͽ�ᤴλ������������\r\n\r\n�����ʤ�ȯ���ˤĤ���\r\n���ʤΤ��Ϥ��ϡ�����ʸ������10�����Ȥʤ�ޤ���\r\nȯ������λ�������ޤ����顢����ȯ���Τ��Τ餻�᡼�뤬�Ϥ��ޤ���\r\n���ʤˤ�äƤ�1�������夫������⤴�����ޤ������������٤��������Ӥ��Τ餻�������ޤ�\r\n2���ְʾ夿�äƤ⾦�ʤ��Ϥ��ʤ����ϡ����䤤��碌����������\r\n\r\n������󥻥�˴ؤ���\r\n������åפǤϡ����̸���ʤ�Ӥ˴��ָ���η��Ǥ������ԤäƤ��뤿�ᡢ���������߸�Υ���󥻥�ϼ����դ��Ƥ���ޤ���\r\n\r\n�������ʤ˴ؤ���\r\n���ʤ��ʼ��ˤ���������դ�ʧ�äƤ���ޤ����������ξ��Τ�����������ô�Ǥ����ؤ������Ƥ��������ޤ���\r\n\r\n��������λ���������»����»��ȯ���������\r\n������ߥ��ˤ����ʸ���줿���ʤȰۤʤ���\r\n������ź�դη���������줿��ͳ�ˤ����\r\n\r\n���κݤϡ���������������˺��������2������ˡ�##admin_mailaddress##�ޤǤ�Ϣ����������\r\n\r\n�ʾ头����ξ塢���ʤΤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##site_url##\r\n[���Ĳ��]\r\n##site_company_name##',1),(19,'user_order3','��ʸ��ǧ�᡼�롡�����','[##site_name##]����ʸ���Ƴ�ǧ','??????????\r\n�ܥ᡼��ϡ��������ȤˤƤ���ʸ���������������ͤءڤ���ʸ���ơۤγ�ǧ�򤤤���������Ρ���ư�ۿ��᡼��ȤʤäƤ���ޤ���\r\n�����ʤ���������Ф����ʤ����Υ᡼�뤬�Ϥ������ϡ�������Ǥ��������� ##admin_mailaddress## �ޤǤ�Ϣ����������\r\n�������ġġġġ�����\r\n������ʸ��³����λ\r\n�����ġġġġġġ���\r\n\r\n##user_name##����\r\n\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n�ʲ������ƤǾ��ʤ���ʸ��³����Ԥ��ޤ����ΤǤ���ǧ����������\r\n\r\n���ڤ���ʸ����ۡ��\r\n\r\n��ʸ������##user_order_created_time##\r\n��ʸ�ֹ桧##user_order_no##\r\n��ʧ��ˡ��������\r\n�����ʤϤ��٤��ǹ�ɽ���ȤʤäƤ���ޤ���\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n�����ס���##item_type##\r\n�����ֹ桧##item_id##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġġ�\r\n�������ס�����##user_order_total_price1##��\r\n(�������)����##user_order_tax##��\r\n��������������##user_order_postage##��\r\n������������##user_order_exchange_fee##��\r\n##if[user_order_expend_point]##\r\n�ݥ��������ʬ������-##user_order_expend_point##��\r\n##/if[user_order_expend_point]##\r\n�ġġġġġġġġġġ�\r\n���硡�ס���##user_order_total_price2##��\r\n\r\n�����������\r\n\r\n\r\n���ݥ���ȤˤĤ���\r\n�㤤ʪ�����׾夵��Ƥ���ݥ���Ȥϡ����ʷ�ѻ��ˤϲû�����ޤ���\r\n���ʤνвٳ����βû��Ȥʤ�ޤ���ͽ�ᤴλ������������\r\n\r\n�����ʤ�ȯ���ˤĤ���\r\n���ʤΤ��Ϥ��ϡ�����ʸ������10�����Ȥʤ�ޤ���\r\nȯ������λ�������ޤ����顢����ȯ���Τ��Τ餻�᡼�뤬�Ϥ��ޤ���\r\n���ʤˤ�äƤ�1�������夫������⤴�����ޤ������������٤��������Ӥ��Τ餻�������ޤ�\r\n2���ְʾ夿�äƤ⾦�ʤ��Ϥ��ʤ����ϡ����䤤��碌����������\r\n\r\n������󥻥�˴ؤ���\r\n������åפǤϡ����̸���ʤ�Ӥ˴��ָ���η��Ǥ������ԤäƤ��뤿�ᡢ���������߸�Υ���󥻥�ϼ����դ��Ƥ���ޤ���\r\n\r\n�������ʤ˴ؤ���\r\n���ʤ��ʼ��ˤ���������դ�ʧ�äƤ���ޤ����������ξ��Τ�����������ô�Ǥ����ؤ������Ƥ��������ޤ���\r\n\r\n��������λ���������»����»��ȯ���������\r\n������ߥ��ˤ����ʸ���줿���ʤȰۤʤ���\r\n������ź�դη���������줿��ͳ�ˤ����\r\n\r\n���κݤϡ���������������˺��������2������ˡ�##admin_mailaddress##�ޤǤ�Ϣ����������\r\n\r\n�ʾ头����ξ塢���ʤΤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##\r\n',1),(20,'user_order4','��ʸ��ǧ�᡼�롡��Կ���','[##site_name##]����ʸ���Ƴ�ǧ','??????????\r\n�ܥ᡼��ϡ��������ȤˤƤ���ʸ���������������ͤءڤ���ʸ���ơۤγ�ǧ�򤤤���������Ρ���ư�ۿ��᡼��ȤʤäƤ���ޤ���\r\n�����ʤ���������Ф����ʤ����Υ᡼�뤬�Ϥ������ϡ�������Ǥ��������� ##admin_mailaddress## �ޤǤ�Ϣ����������\r\n�������ġġġġ�����\r\n������ʸ��³����λ\r\n�����ġġġġġġ���\r\n\r\n##user_name##����\r\n\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n�ʲ������ƤǾ��ʤ���ʸ��³����Ԥ��ޤ����ΤǤ���ǧ����������\r\n\r\n���ڤ���ʸ����ۡ��\r\n\r\n��ʸ������##user_order_created_time##\r\n��ʸ�ֹ桧##user_order_no##\r\n��ʧ��ˡ����Կ����塢����ȯ��\r\n�����ʤϤ��٤��ǹ�ɽ���ȤʤäƤ���ޤ���\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n�����ס���##item_type##\r\n�����ֹ桧##item_id##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġġ�\r\n�������ס�����##user_order_total_price1##��\r\n(�������)����##user_order_tax##��\r\n��������������##user_order_postage##��\r\n������������##user_order_exchange_fee##��\r\n##if[user_order_expend_point]##\r\n�ݥ��������ʬ������-##user_order_expend_point##��\r\n##/if[user_order_expend_point]##\r\n�ġġġġġġġġġġ�\r\n���硡�ס���##user_order_total_price2##��\r\n\r\n�����������\r\n������ʧ����ˡ\r\n�����ְ���˻���ζ�Ը��¤ˤ������ߤ����������������߳�ǧ�徦��ȯ���Ȥʤ�ޤ����嵭�����פ򲼵��θ��¤ޤǤ������ߤ���������\r\n\r\n����������������������������\r\n����xxx��ԡ�yyy��Ź��������\r\n�������̡�zzzzzz������������\r\n����##site_company_name## ��\r\n����������������������������\r\n\r\n������������Ϥ�������ô�Ǥ��ꤤ�פ��ޤ��� \r\n�ʤ���������Ǥ������������ߤ��Ѥߤޤ����餳�Υ᡼����ֿ��ˤƤ�Ϣ����������\r\n\r\n\r\n���ݥ���ȤˤĤ���\r\n�㤤ʪ�����׾夵��Ƥ���ݥ���Ȥϡ����ʷ�ѻ��ˤϲû�����ޤ���\r\n���ʤνвٳ����βû��Ȥʤ�ޤ���ͽ�ᤴλ������������\r\n\r\n�����ʤ�ȯ���ˤĤ���\r\n���ʤΤ��Ϥ��ϡ�����ʸ������10�����Ȥʤ�ޤ���\r\nȯ������λ�������ޤ����顢����ȯ���Τ��Τ餻�᡼�뤬�Ϥ��ޤ���\r\n���ʤˤ�äƤ�1�������夫������⤴�����ޤ������������٤��������Ӥ��Τ餻�������ޤ�\r\n2���ְʾ夿�äƤ⾦�ʤ��Ϥ��ʤ����ϡ����䤤��碌����������\r\n\r\n������󥻥�˴ؤ���\r\n������åפǤϡ����̸���ʤ�Ӥ˴��ָ���η��Ǥ������ԤäƤ��뤿�ᡢ���������߸�Υ���󥻥�ϼ����դ��Ƥ���ޤ���\r\n\r\n�������ʤ˴ؤ���\r\n���ʤ��ʼ��ˤ���������դ�ʧ�äƤ���ޤ����������ξ��Τ�����������ô�Ǥ����ؤ������Ƥ��������ޤ���\r\n\r\n��������λ���������»����»��ȯ���������\r\n������ߥ��ˤ����ʸ���줿���ʤȰۤʤ���\r\n������ź�դη���������줿��ͳ�ˤ����\r\n\r\n���κݤϡ���������������˺��������2������ˡ�##admin_mailaddress##�ޤǤ�Ϣ����������\r\n\r\n�ʾ头����ξ塢���ʤΤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##site_url##\r\n[���Ĳ��]\r\n##site_company_name##\r\n',1),(21,'stock_alert','���ʴ���᡼��','[##site_name##�����䥢�顼��]��##$item_name##�פ����䤷�ޤ�����','[���ʾ���]\r\n����ID��##item_id##\r\n���ʼ���ID��##item_distinction_id##\r\n����̾��##item_name##\r\n�����ס�##item_type##\r\n���������##item_sum##\r\n��λ������##now_date##\r\n\r\n\r\n',1),(22,'user_regist_finish','�����Ͽ��λ','[##site_name##]�����Ͽ��λ','�����٤�[##site_name##]����Ͽ����ĺ�������꤬�Ȥ��������ޤ����� \r\n����URL�������󤷤Ƥ��ڤ��ߤ���������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##',1),(23,'user_community_join_ok','���ߥ�˥ƥ����õ���','[##site_name##]���ߥ�˥ƥ����þ�ǧ','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n���ߥ�˥ƥ�[##community_title##]�˻��ÿ�������ǧ����ޤ�����\r\n�ʲ���URL��ꥢ���������Ƴ�ǧ���Ʋ�������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##',1),(24,'user_community_join_ng','���ߥ�˥ƥ����õ���','[##site_name##]���ߥ�˥ƥ����õ���','##to_user_nickname##���󡢤���ˤ��ϡ�\r\n##site_name##����Τ��Τ餻�Ǥ���\r\n\r\n���ߥ�˥ƥ�[##community_title##]�˻��ÿ��������ݤ���ޤ�����\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##',1),(25,'item_sent1','����ȯ��(1:ľ�ܽв�)','[##site_name##]����ȯ���Τ��Τ餻','##user_name##����\r\n\r\n���Τ��Ӥϡ���##site_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n����������ʸ���������ޤ������ʤ�ȯ���������ޤ�����\r\n\r\n##if[sagawa_code_list]##\r\n[������ؤβ�ʪ���䤤��碌�����ƥ�Τ�����]\r\n���ʤ����������򲼵��ڡ�����ꤴ��ǧ���뤳�Ȥ��Ǥ��ޤ���\r\nhttp://k2k.sagawa-exp.co.jp/ezservice1.hdml\r\n##foreach[sagawa_code_list]##\r\n���䤤��碌�����NO��##sagawa_code##\r\n##/foreach[sagawa_code_list]##\r\n##/if[sagawa_code_list]##\r\n\r\n���ڽв����١ۡ��\r\n\r\n�в�����##sent_date##\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##item_name##\r\n##if[one_type_only_flag]##\r\n�����ס���##item_type##\r\n##/if[one_type_only_flag]##\r\n\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġ�\r\n�������ס���##total_price1##��\r\n������������##postage##��\r\n����������##exchange_fee##��\r\n�⡡�����ǡ�##tax##��\r\n�ݥ�������ѡ���-##expend_point##��\r\n�ġġġġġġġġġ�\r\n���硡�ס���##total_price2##��\r\n\r\n�����������\r\n���ʤ������ڤ��ߤˤ��Ԥ�����������\r\n�����ʤϡ�##supplier_name##�ˤ��ľ������ޤ��Τǡ����������ꤤ�������ޤ���\r\n�ޤ��Τ����ѡ�����ꤪ�Ԥ����Ƥ���ޤ���\r\n\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##',1),(26,'item_sent2','����ȯ���Τ��Τ餻(2:Ǽ�ʸ�в�)','[##site_name##]����ȯ���Τ��Τ餻','##user_name##����\r\n\r\n���Τ��Ӥϡ���##mall_name##�פ����Ѥ��������ޤ��Ƥ��꤬�Ȥ��������ޤ�����\r\n����������ʸ���������ޤ������ʤ�ȯ���������ޤ�����\r\n\r\n[������ؤβ�ʪ���䤤��碌�����ƥ�Τ�����]\r\n���ʤ����������򲼵��ڡ�����ꤴ��ǧ���뤳�Ȥ��Ǥ��ޤ���\r\nhttp://k2k.sagawa-exp.co.jp/ezservice1.hdml\r\n##foreach[sagawa_code_list]##\r\n���䤤��碌�����NO��##sagawa_code##\r\n##/foreach[sagawa_code_list]##\r\n\r\n���ڽв����١ۡ��\r\n\r\n�в�����##sent_date##\r\n\r\n##foreach[cart_list]##\r\n�� �� ̾��##tem_name##\r\n##if[one_type_only_flag]##\r\n�����ס���##item_type##\r\n##/if[one_type_only_flag]##\r\n�⡡���ۡ�##item_price##�ߡ��ߡ�##cart_item_num##�ġ�##subtotal##��\r\n##/foreach[cart_list]##\r\n�ġġġġġġġġġ�\r\n�������ס���##total_price1##��\r\n������������##postage##��\r\n����������##exchange_fee##��\r\n�⡡�����ǡ�##tax##��\r\n�ݥ�������ѡ���-##expend_point##��\r\n�ġġġġġġġġġ�\r\n���硡�ס���##total_price2##��\r\n\r\n�����������\r\n���ʤ������ڤ��ߤˤ��Ԥ�����������\r\n\r\n����Ȥ��##site_name##�٤��������ꤤ�������ޤ���\r\n\r\n??????????\r\n��##site_name##�פξ��ʤ�����˴ؤ��뤴����Ϥ�����\r\n[##site_name##]\r\ne-mail: ##admin_mailaddress##\r\nTEL:##site_phone## 10:00-18:00�������������������\r\nURL�� ##user_url##\r\n[���Ĳ��]\r\n##site_company_name##',1),(28,'user_movie_success','','[##site_name##]ư����ƴ�λ','[##site_name##]������ĺ�������꤬�Ȥ��������ޤ��� \r\nư�����Ƥ���λ���ޤ�����\r\n��������ϲ���URL�������󤷤Ʋ�������\r\n\r\n��##site_name##\r\n##login_url##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1),(29,'user_movie_error','','[##site_name##]ư����ƥ��顼','�����٤�[##site_name##]������ĺ�������꤬�Ȥ��������ޤ��� \r\n���Ѥ�����Ǥ��������åץ��ɤ��줿ư�褬���顼�Τ��ᤴ���Ѥˤʤ�ޤ���\r\n##error##\r\n\r\n������Υ᡼�륢�ɥ쥹���˺���ư���ź�դ��Ƥ����겼������\r\n##image_mailaddress##\r\n\r\n----------------------\r\n(c)##site_name##\r\n���ݡ��ȡ�##support_mailaddress##\r\n',1);


--
-- Table structure for table `ad`
--

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
  `ad_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '���𥿥��ס�1:��󥯥�å���2:��Ͽ��3:�����',
  `ad_point_type` tinyint(1) unsigned NOT NULL default '0' COMMENT '����ݥ���ȥ�����(1:����,2:��Ψ)',
  `ad_point` int(11) NOT NULL default '0' COMMENT '����ݥ����',
  `ad_item_point` int(11) NOT NULL default '0' COMMENT '���ʸ��ݥ����',
  `ad_point_percent` int(11) NOT NULL default '0' COMMENT '����ݥ���ȥѡ�����ơ���',
  `ad_item_point_percent` int(11) NOT NULL default '0' COMMENT '���ʸ��ݥ���ȥѡ������',
  `ad_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '���𥹥ơ�����(0:̵��,1:ͭ��)',
  `ad_display_type` tinyint(1) unsigned NOT NULL default '1' COMMENT '����ɽ��������(1:WEB,2:MAIL)',
  `ad_category_id` int(11) NOT NULL default '0' COMMENT '���𥫥ƥ���ID',
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
  `comment_add_done` text NOT NULL COMMENT '��������ƴ�λ����',
  `comment_edit_done` text NOT NULL COMMENT '�������Խ���λ����',
  `comment_delete_done` text NOT NULL COMMENT '�����Ⱥ����λ����',
  PRIMARY KEY  (`ad_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�����˥塼�ơ��֥�';




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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ײ��ϥơ��֥�';

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
) ENGINE=MyISAM AUTO_INCREMENT=808 DEFAULT CHARSET=ujis COMMENT='���Х����ơ��֥�';

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
  `banner_status` tinyint(1) NOT NULL COMMENT '�Хʡ����ơ�����(0:̵��,1:ͭ��)',
  `banner_created_time` datetime NOT NULL COMMENT '��������',
  `banner_updated_time` datetime NOT NULL COMMENT '��������',
  `banner_deleted_time` datetime NOT NULL COMMENT '�������',
  PRIMARY KEY  (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�Хʡ��ơ��֥�';

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
  `black_list_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `black_list_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `black_list_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
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
  `user_uid` varchar(32) default NULL COMMENT '����ü�����̻�',
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
-- Table structure for table `footprint`
--

DROP TABLE IF EXISTS `footprint`;
CREATE TABLE `footprint` (
  `footprint_id` int(11) NOT NULL auto_increment COMMENT '��������ID',
  `from_user_id` int(11) NOT NULL COMMENT '�������ȸ��桼��ID',
  `to_user_id` int(11) NOT NULL COMMENT '����������桼��ID',
  `footprint_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`footprint_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�������ȥơ��֥�';

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL auto_increment COMMENT 'ͧãID',
  `from_user_id` int(11) NOT NULL COMMENT '�������桼��ID',
  `to_user_id` int(11) NOT NULL COMMENT '������桼��ID',
  `friend_status` int(11) NOT NULL COMMENT 'ͧã���ơ����� ��1:������, 2:ͧã��, 3:ͧã�ǤϤʤ���',
  `friend_message` text COMMENT 'ͧã��å�������ʸ',
  `friend_introduction` text COMMENT 'ͧã�Ҳ�ʸ',
  `friend_checked` tinyint(4) default '0' COMMENT '�Ҳ�ʸ�ƻ� ��1:��,0:̤��',
  PRIMARY KEY  (`friend_id`),
  UNIQUE KEY `unique_key_friend` (`from_user_id`,`to_user_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ͧã�ơ��֥�';

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `game_id` int(11) NOT NULL auto_increment COMMENT '������ID',
  `game_code` text NOT NULL COMMENT '�����ॳ����',
  `game_name` text NOT NULL COMMENT '������̾',
  `game_desc` text NOT NULL COMMENT '����������',
  `game_explain` text NOT NULL COMMENT '�������������',
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
-- Table structure for table `html_template`
--

DROP TABLE IF EXISTS `html_template`;
CREATE TABLE `html_template` (
  `html_template_id` int(11) NOT NULL auto_increment COMMENT 'HTML�ƥ�ץ졼��ID',
  `html_template_code` varchar(255) NOT NULL COMMENT 'HTML�ƥ�ץ졼�ȥ����ɡ�����ǥ��쥯�ȥ꤫���.tplȴ���Υե�����ѥ�',
  `html_template_body` text NOT NULL COMMENT 'HTML�ƥ�ץ졼������',
  `html_template_status` tinyint(1) NOT NULL default '0' COMMENT '���ơ�����(0:̵��,1:ͭ��)',
  `html_template_edit` tinyint(1) NOT NULL default '0' COMMENT '�Խ����ơ�����(0:�Խ���Ǥʤ�,1:�Խ���)',
  `html_template_edit_start_time` datetime NOT NULL COMMENT '������������',
  `html_template_edit_end_time` datetime NOT NULL COMMENT '������λ����',
  PRIMARY KEY  (`html_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=ujis COMMENT='HTML�ƥ�ץ졼�ȥơ��֥�';

--
-- Table structure for table `html_template_log`
--

DROP TABLE IF EXISTS `html_template_log`;
CREATE TABLE `html_template_log` (
  `html_template_log_id` int(11) NOT NULL auto_increment COMMENT 'HTML�ƥ�ץ졼�ȥ�ID',
  `html_template_id` int(11) NOT NULL COMMENT 'HTML�ƥ�ץ졼��ID',
  `html_template_code` varchar(255) NOT NULL COMMENT 'HTML�ƥ�ץ졼�ȥ�����',
  `html_template_body` text NOT NULL COMMENT 'HTML�ƥ�ץ졼����ʸ',
  `html_template_updated_time` datetime NOT NULL COMMENT '��������',
  PRIMARY KEY  (`html_template_log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=ujis COMMENT='HTML�ƥ�ץ졼�ȥ��ơ��֥�';

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
  `type` varchar(32) default NULL COMMENT '������������',
  `id` int(11) default '0' COMMENT '����������ID��',
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
  `invite_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '���ԥ��ơ�������0:�᡼���,1:����������,2:��Ͽ�ѡ�',
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
  `item_category_id` text NOT NULL COMMENT '���ƥ���ID',
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
  `item_use_exchange_status` tinyint(1) unsigned default '0' COMMENT '1:�����ǽ',
  `item_use_transfer_status` tinyint(1) unsigned default '0' COMMENT '1:��Կ�����ǽ',
  `item_point` int(11) unsigned default '0' COMMENT '�����ݥ����',
  `item_start_status` tinyint(1) NOT NULL COMMENT '0:���䳫�ϴ�������̵��, 1:���䳫�ϴ�������ͭ��',
  `item_start_time` datetime default NULL COMMENT '������ֳ���',
  `item_end_status` tinyint(1) NOT NULL COMMENT '0:���佪λ��������̵��, 1:���佪λ��������ͭ��',
  `item_end_time` datetime default NULL COMMENT '������ֽ�λ',
  `item_contents_body` text COMMENT '���ʥե꡼�ڡ���',
  `file_id` text COMMENT '�ե꡼�ڡ����ե�����',
  `item_bundle_status` tinyint(1) unsigned default '0' COMMENT '1:Ʊ���Բ�,0:Ʊ����',
  `item_created_time` datetime NOT NULL COMMENT '��������',
  `item_updated_time` datetime default NULL COMMENT '��������',
  `item_deleted_time` datetime default NULL COMMENT '�������',
  `item_status` tinyint(1) unsigned default '1' COMMENT '0:���,1:ɽ��,2:��ɽ��',
  PRIMARY KEY  (`item_id`),
  KEY `category_id` (`shop_id`,`item_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ʥơ��֥�';

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='���ʥ��ƥ���ơ��֥�';

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL auto_increment COMMENT '��ID',
  `log_type` varchar(255) NOT NULL COMMENT '��������',
  `log_body` text NOT NULL COMMENT '����ʸ',
  `log_created_time` datetime NOT NULL COMMENT '��������',
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�᡼��ޥ�����ơ��֥�';

--
-- Table structure for table `mailchange_session`
--

DROP TABLE IF EXISTS `mailchange_session`;
CREATE TABLE `mailchange_session` (
  `mailchange_session_id` int(11) NOT NULL auto_increment COMMENT '���ɥ쥹�ѹ����å����ID',
  `mailchange_session_random_id` varchar(32) default NULL COMMENT '���ɥ쥹�ѹ�������ID',
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
  `movie_path_o` varchar(255) default NULL COMMENT '���ꥸ�ʥ�ư��ѥ�',
  `movie_path_a` varchar(255) default NULL COMMENT '��ư��ѥ�',
  `movie_path_s` varchar(255) default NULL COMMENT '��ư��ѥ�',
  `movie_path_t` varchar(255) default NULL COMMENT '����ͥ���ѥ�',
  `movie_path_i` varchar(255) default NULL COMMENT '��������ѥ�',
  `movie_size` varchar(255) default NULL COMMENT 'ư�襵����',
  `type` varchar(32) default NULL COMMENT 'ư����������''',
  `id` int(11) default '0' COMMENT 'ư��������ID��''',
  PRIMARY KEY  (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ư��ơ��֥�';

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment COMMENT '�˥塼��ID',
  `news_type` varchar(255) NOT NULL COMMENT '�˥塼��������(0:all, 1:top, 4:game, 2:avatar)',
  `news_title` text NOT NULL COMMENT '�˥塼�������ȥ�',
  `news_body` text NOT NULL COMMENT '�˥塼����ʸ',
  `news_time` text COMMENT '�˥塼�����ܻ���',
  `news_status` tinyint(1) NOT NULL COMMENT '0:��ɽ��, 1:ɽ��',
  `news_start_status` tinyint(1) NOT NULL default '0' COMMENT '�˥塼���ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `news_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�˥塼���ۿ���������',
  `news_end_status` tinyint(1) NOT NULL default '0' COMMENT '�˥塼���ۿ���λ���ơ�����(0:̵��,1:ͭ��)',
  `news_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�˥塼���ۿ���λ����',
  `news_created_time` datetime NOT NULL COMMENT '��������',
  `news_updated_time` datetime NOT NULL COMMENT '��������',
  `news_deleted_time` datetime NOT NULL COMMENT '�������',
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
  `point_type` int(11) NOT NULL default '0' COMMENT '1:����,2:���؎���,3:��Ͽ,4:��Ψ,5:���ʎގ���,6:�Îގ���,7:���ގ���,8:�����ݎĎ�',
  `point_sub_id` int(11) NOT NULL default '0' COMMENT '�ݥ���ȥ���ID(�ݥ���Ȥ˴ؤ��륵��ID������:ad_id�ʤ�)',
  `user_sub_id` int(11) NOT NULL default '0' COMMENT '�桼������ID(�桼���˴�Ϣ����ID������:user_ad_id�ʤ�)',
  `point_memo` text COMMENT '�ݥ��������(����̾�ʤɤ�����)',
  `point_status` int(11) NOT NULL default '0' COMMENT '�ݥ���ȥ��ơ����� ��1��ͭ�� ,0��̵��, 2����ǧ�Ѥߡ�',
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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ݥ���ȴ���ơ��֥�';

--
-- Table structure for table `pon`
--

DROP TABLE IF EXISTS `pon`;
CREATE TABLE `pon` (
  `pon_id` int(11) NOT NULL auto_increment COMMENT '�ݥ���ȥ���ID',
  `user_hash` varchar(255) NOT NULL COMMENT '�桼���ϥå���',
  `pon_user_hash` varchar(255) NOT NULL COMMENT '�ݥ���ȥ���桼���ϥå���',
  `pon_status` tinyint(1) NOT NULL COMMENT '�ݥ���ȥ��󥹥ơ�����',
  `pon_created_time` datetime NOT NULL COMMENT '��������',
  `pon_updated_time` datetime NOT NULL COMMENT '��������',
  `pon_deleted_time` datetime NOT NULL COMMENT '�������',
  PRIMARY KEY  (`pon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

--
-- Table structure for table `pon_point`
--

DROP TABLE IF EXISTS `pon_point`;
CREATE TABLE `pon_point` (
  `pon_point_id` tinyint(1) NOT NULL auto_increment COMMENT '�ݥ���ȥ���ݥ����ID',
  `pon_point_tid` int(11) NOT NULL COMMENT '�ݥ���ȥ���ݥ���ȥȥ�󥶥������ID',
  `pon_point_pid` int(11) NOT NULL COMMENT '�ݥ���ȥ���ݥ���ȥץ���ID',
  `user_hash` varchar(255) NOT NULL COMMENT '�桼���ϥå���',
  `pon_user_hash` varchar(255) NOT NULL COMMENT '�ݥ���ȥ���桼���ϥå���',
  `pon_point` int(11) NOT NULL COMMENT '�ݥ���ȥ���ݥ���ȿ�',
  `pon_point_status` tinyint(1) NOT NULL COMMENT '�ݥ���ȥ���ݥ���ȥ��ơ�����',
  `pon_point_result` text NOT NULL COMMENT '�ݥ���ȥ���ݥ���ȱ�������',
  `pon_point_created_time` datetime NOT NULL COMMENT '��������',
  `pon_point_updated_time` datetime NOT NULL COMMENT '��������',
  `pon_point_start_time` datetime NOT NULL COMMENT '��������',
  `pon_point_end_time` datetime NOT NULL COMMENT '��λ����',
  PRIMARY KEY  (`pon_point_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ujis;

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
  `slip_code` varchar(255) default NULL COMMENT '�����ȼ���ɼ������',
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
  `type` varchar(32) NOT NULL COMMENT '��󥭥󥰼���',
  `id` int(11) NOT NULL default '0' COMMENT '�����оݤΥץ饤�ޥ꡼����ID',
  `sub_id` int(11) default '0' COMMENT '���ץǡ�����ʬ��ID�ʼ�˥��ƥ���ID��',
  `ranking_order` int(11) NOT NULL default '0' COMMENT '��󥭥󥰽��',
  `ranking_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  PRIMARY KEY  (`ranking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1932 DEFAULT CHARSET=ujis COMMENT='��󥭥󥰥ơ��֥�';

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
  `report_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `report_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '��������',
  `report_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�������',
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
  `supplier_use_exchange_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:�����ǽ',
  `supplier_use_transfer_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:��Կ�����ǽ',
  `supplier_bundle_allow_id` text COMMENT 'Ʊ����ǽ����(��������ID:���ڤ�)',
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
  `user_mailaddress` varchar(255) NOT NULL COMMENT '�᡼�륢�ɥ쥹',
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
  `user_message_1_status` tinyint(1) unsigned default '1' COMMENT '���������Υ᡼��������ơ�����(0:�������ʤ�,1:��������)',
  `user_message_2_status` tinyint(1) unsigned default '1' COMMENT '�ߥ˥᡼�����Υ᡼��������ơ�����(0:�������ʤ�,1:��������)',
  `user_message_3_status` tinyint(1) unsigned default '1' COMMENT '�������������Υ᡼��������ơ�����(0:�������ʤ�,1:��������)',
  `user_message_4_status` tinyint(1) unsigned default '1' COMMENT '���ߥ�˥ƥ��ȥԥå����������Υ᡼��������ơ�����(0:�������ʤ�,1:��������)',
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
  `user_mail_ok` tinyint(11) NOT NULL default '1' COMMENT '���ޥ��ۿ�OK(0:ng,1:ok)',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT '�桼��̾����',
  `user_zipcode` varchar(8) default NULL COMMENT '͹���ֹ�',
  `region_id` int(11) unsigned default NULL COMMENT '�ϰ�ID',
  `user_phone` varchar(255) default NULL COMMENT '�����ֹ�',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '�ǽ���������',
  `user_device` varchar(32) default NULL COMMENT '����̾',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_mailaddress_2` (`user_mailaddress`),
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
  `user_game_score_id` int(11) NOT NULL auto_increment COMMENT '�桼�������ॹ����D',
  `user_id` int(11) NOT NULL COMMENT '�桼��ID',
  `game_id` int(11) NOT NULL COMMENT '������ID',
  `user_game_score_score` int(11) NOT NULL COMMENT '������',
  `user_game_score_created_time` datetime NOT NULL COMMENT '��������',
  `user_game_score_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `user_game_score_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `user_game_score_status` int(1) NOT NULL default '0' COMMENT '�����ॹ�������ơ�������1��ͭ����0��̵����',
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
  `x_user_id` int(11) default '0' COMMENT '���Ϣư�桼��ID',
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
  `user_order_delivery_region_id` int(10) unsigned default NULL COMMENT '�������ϰ�ID',
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
  `user_pref` int(11) NOT NULL COMMENT '������ƻ�ܸ��ֹ�',
  `region_id` int(11) default NULL,
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

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL auto_increment COMMENT '�ӥǥ�ID',
  `video_name` text NOT NULL COMMENT '�ӥǥ�̾',
  `video_desc` text NOT NULL COMMENT '�ӥǥ�����',
  `video_file1` varchar(255) default NULL COMMENT '�ӥǥ��ե�����1(����ɽ���ѥե�����)',
  `video_file2` varchar(255) default NULL COMMENT '�ӥǥ��ե�����2(�ܺ�ɽ���ѥե�����)',
  `video_file_d` varchar(255) default NULL COMMENT 'DOCOMO�ѥӥǥ��ե�����',
  `video_file_a` varchar(255) default NULL COMMENT 'AU�ѥӥǥ��ե�����',
  `video_file_s` varchar(255) default NULL COMMENT 'SOFTBANK�ѥӥǥ��ե�����',
  `video_sample_d` varchar(255) default NULL COMMENT 'DOCOMO�ѥ���ץ�ư��ե�����',
  `video_sample_a` varchar(255) default NULL COMMENT 'AU�ѥ���ץ�ư��ե�����',
  `video_sample_s` varchar(255) default NULL COMMENT 'SoftBank�ѥ���ץ�ư��ե�����',
  `video_point` int(11) NOT NULL default '0' COMMENT '�ӥǥ�����ݥ����',
  `video_status` tinyint(1) NOT NULL default '0' COMMENT '�ӥǥ����ơ����� ��1��ͭ��, 0��̵����',
  `video_category_id` int(11) NOT NULL default '0' COMMENT '�ӥǥ����ƥ���ID',
  `video_stock_num` int(11) NOT NULL default '0' COMMENT '�ӥǥ��ۿ���λ��',
  `video_stock_status` tinyint(1) NOT NULL default '0' COMMENT '�ӥǥ��ۿ���λ�����ơ����� ��1��ͭ��, 0��̵����',
  `video_created_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `video_updated_time` datetime default '0000-00-00 00:00:00' COMMENT '��������',
  `video_deleted_time` datetime default '0000-00-00 00:00:00' COMMENT '�������',
  `video_start_time` datetime default '0000-00-00 00:00:00' COMMENT '�ӥǥ��ۿ���������',
  `video_start_status` tinyint(1) NOT NULL default '0' COMMENT '�ӥǥ��ۿ����ϥ��ơ�����(0:̵��,1:ͭ��)',
  `video_end_time` datetime default '0000-00-00 00:00:00' COMMENT '�ӥǥ��ۿ���λ����',
  `video_end_status` tinyint(1) NOT NULL default '0' COMMENT '�ӥǥ��ۿ���λ�������ơ����� ��1��ͭ��, 0��̵����',
  PRIMARY KEY  (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ӥǥ��ơ��֥�';

--
-- Table structure for table `video_category`
--

DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `video_category_id` int(11) NOT NULL auto_increment COMMENT '�ӥǥ����ƥ���ID',
  `video_category_name` text NOT NULL COMMENT '�ӥǥ����ƥ���̾',
  `video_category_desc` text NOT NULL COMMENT '�ӥǥ����ƥ�������',
  `video_category_status` int(11) NOT NULL default '0' COMMENT '�ӥǥ����ƥ��ꥹ�ơ����� ��1��ͭ��, 0��̵����',
  `video_category_priority_id` int(11) NOT NULL default '0' COMMENT '�ӥǥ����ƥ���ͥ����ID',
  `video_category_file1` varchar(255) default NULL COMMENT '�ӥǥ����ƥ���ե�����1',
  `video_category_color` varchar(255) default NULL COMMENT '�ӥǥ����ƥ��꿧',
  PRIMARY KEY  (`video_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='�ӥǥ����ƥ���ơ��֥�';
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-09-24  3:10:40
