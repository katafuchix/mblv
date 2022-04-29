
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
  `ad_type` int(11) NOT NULL default '0',
  `ad_point_type` tinyint(1) unsigned NOT NULL default '0',
  `ad_point` int(11) NOT NULL default '0',
  `ad_item_point` int(11) NOT NULL default '0' COMMENT '商品元ポイント',
  `ad_point_percent` int(11) NOT NULL default '0',
  `ad_item_point_percent` int(11) NOT NULL default '0' COMMENT '商品元ポイントパーセント',
  `ad_status` int(11) NOT NULL default '0',
  `ad_display_type` tinyint(1) unsigned NOT NULL default '1',
  `ad_category_id` int(11) NOT NULL default '0',
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
-- Table structure for table `ad_access`
--

DROP TABLE IF EXISTS `ad_access`;
CREATE TABLE `ad_access` (
  `ad_access_id` int(11) NOT NULL auto_increment COMMENT '広告アクセスID',
  `ad_id` int(11) NOT NULL COMMENT '広告ID',
  `ad_access_date` date NOT NULL COMMENT '日付',
  `ad_view` int(11) NOT NULL COMMENT '閲覧数',
  `ad_click` int(11) NOT NULL COMMENT 'クリック数',
  `ad_regist` int(11) NOT NULL COMMENT '登録数',
  PRIMARY KEY  (`ad_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告アクセステーブル';

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
  PRIMARY KEY  (`ad_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='広告メニューテーブル';

--
-- Table structure for table `admin`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='アバターテーブル';

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
  PRIMARY KEY  (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='バナーテーブル';

--
-- Table structure for table `banner_access`
--

DROP TABLE IF EXISTS `banner_access`;
CREATE TABLE `banner_access` (
  `banner_access_id` int(11) NOT NULL auto_increment COMMENT 'バナーアクセスID',
  `banner_id` int(11) NOT NULL COMMENT 'バナーID',
  `banner_access_date` date NOT NULL default '0000-00-00' COMMENT '日付',
  `banner_view` int(11) NOT NULL default '0' COMMENT 'インプレッション（掲載回数）',
  `banner_click` int(11) NOT NULL COMMENT 'クリック数',
  PRIMARY KEY  (`banner_access_id`),
  KEY `banner_id` (`banner_id`,`banner_access_date`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='バナーアクセステーブル';

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
  `black_list_regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `black_list_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `black_list_delete_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` tinyint(1) unsigned NOT NULL auto_increment COMMENT 'コンフィグID',
  `config_type` varchar(16) NOT NULL COMMENT 'どのタイプのconfigか',
  `site_name` varchar(128) default NULL COMMENT 'サイト名',
  `site_url` varchar(255) default NULL COMMENT 'サイトURL',
  `site_company_name` text COMMENT 'サイト運営会社',
  `site_phone` varchar(255) default NULL COMMENT '運営元電話番号',
  `site_html_title` text COMMENT 'HTML名',
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
  `site_ngword` text COMMENT 'NGワード色',
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
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `contents_id` int(11) NOT NULL auto_increment COMMENT 'フリーページID',
  `contents_code` varchar(255) NOT NULL COMMENT 'フリーページタイプ',
  `contents_title` text NOT NULL COMMENT 'フリーページタイトル',
  `contents_body` text NOT NULL COMMENT 'フリーページコンテンツ',
  `contents_status` tinyint(11) NOT NULL COMMENT 'フリーページステータス （1：有効,0：無効）',
  `contents_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `contents_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `contents_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='フリーページテーブル';

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
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL auto_increment COMMENT 'ファイルID',
  `file_name` text NOT NULL COMMENT 'ファイル名',
  `file_name_o` text NOT NULL COMMENT 'オリジナルファイル名',
  `file_status` tinyint(1) NOT NULL COMMENT 'ファイルステータス　0:無効 1:有効',
  `file_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `file_updated_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `file_deleted_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
  PRIMARY KEY  (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ファイルテーブル';

--
-- Table structure for table `footprint`
--

DROP TABLE IF EXISTS `footprint`;
CREATE TABLE `footprint` (
  `footprint_id` int(11) NOT NULL auto_increment COMMENT 'あしあとID',
  `from_user_id` int(11) NOT NULL COMMENT 'あしあと元ユーザID',
  `to_user_id` int(11) NOT NULL COMMENT 'あしあと先ユーザID',
  `footprint_regist_time` timestamp NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `footprint_status` int(11) NOT NULL default '0' COMMENT 'ステータス　0:無効 1:有効',
  PRIMARY KEY  (`footprint_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='あしあとテーブル';

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL auto_increment COMMENT 'フレンドID',
  `from_user_id` int(11) NOT NULL COMMENT '申請元ユーザID',
  `to_user_id` int(11) NOT NULL COMMENT '申請先ユーザID',
  `friend_status` int(11) NOT NULL COMMENT 'フレンドステータス （1:申請中, 2:友達中, 3:友達ではない）',
  `friend_message` text COMMENT 'フレンドメッセージ本文',
  `friend_introduction` text COMMENT 'フレンド紹介文',
  PRIMARY KEY  (`friend_id`),
  UNIQUE KEY `unique_key_friend` (`from_user_id`,`to_user_id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='フレンドテーブル';

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `game_id` int(11) NOT NULL auto_increment COMMENT 'ゲームID',
  `game_code` text NOT NULL,
  `game_name` text NOT NULL COMMENT 'ゲーム名',
  `game_desc` text NOT NULL COMMENT 'ゲーム説明',
  `game_explain` text NOT NULL COMMENT 'ｹﾞｰﾑ操作説明',
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
  `invite_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '招待ステータス （0:mail 1:access 2:reg）',
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
  `item_category_id` text NOT NULL COMMENT 'カテゴリID1',
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
  `item_use_daibiki_status` tinyint(1) unsigned default '0' COMMENT '1:代引可能',
  `item_use_furikomi_status` tinyint(1) unsigned default '0' COMMENT '1:銀行振込可能',
  `item_point` int(11) unsigned default '0' COMMENT '取得ポイント',
  `item_start_status` int(11) NOT NULL COMMENT '1:販売期間設定有効,2:販売期間設定無効',
  `item_start_time` datetime default NULL COMMENT '販売期間開始',
  `item_end_time` datetime default NULL COMMENT '販売期間終了',
  `item_contents_body` text COMMENT '商品フリーページ',
  `file_id` text COMMENT 'フリーページファイル',
  `item_doukon_deny` tinyint(1) unsigned default '0' COMMENT '1:同梱不可,0:同梱可',
  `item_created_time` datetime NOT NULL COMMENT '作成日時',
  `item_updated_time` datetime default NULL COMMENT '更新日時',
  `item_deleted_time` datetime default NULL COMMENT '削除日時',
  `item_status` tinyint(1) unsigned default '1' COMMENT '0:削除,1:表示,2:非表示',
  PRIMARY KEY  (`item_id`),
  KEY `category_id` (`shop_id`,`item_status`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品用テーブル';

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='商品カテゴリ用テーブル';

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='メルマガテーブル';

--
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE `mail_template` (
  `mail_template_id` int(11) NOT NULL auto_increment COMMENT 'ﾒｰﾙテンプレートID',
  `mail_template_code` varchar(255) NOT NULL COMMENT 'ﾒｰﾙテンプレートコード',
  `mail_template_name` text NOT NULL COMMENT 'ﾒｰﾙテンプレート名',
  `mail_template_title` text NOT NULL COMMENT 'ﾒｰﾙテンプレートタイトル',
  `mail_template_body` text NOT NULL COMMENT 'ﾒｰﾙテンプレート本文',
  `mail_template_status` tinyint(1) unsigned NOT NULL default '0' COMMENT 'ﾒｰﾙテンプレートステータス（0:削除,1:有効）',
  PRIMARY KEY  (`mail_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='メールテンプレートテーブル';

--
-- Table structure for table `mailchange_session`
--

DROP TABLE IF EXISTS `mailchange_session`;
CREATE TABLE `mailchange_session` (
  `mailchange_session_id` int(11) NOT NULL auto_increment COMMENT 'アドレス変更セッションID',
  `mailchange_session_random_id` varchar(10) default NULL COMMENT 'アドレス変更ランダムID',
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
  PRIMARY KEY  (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='動画テーブル';

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
  `news_status` tinyint(1) NOT NULL COMMENT '0:非表示, 1:表示',
  `news_start_status` tinyint(1) NOT NULL default '0' COMMENT 'ニュース配信開始ステータス(0:無効,1:有効)',
  `news_start_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ニュース配信開始日時',
  `news_end_status` tinyint(1) NOT NULL default '0' COMMENT 'ニュース配信終了ステータス(0:無効,1:有効)',
  `news_end_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'ニュース配信終了日時',
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
  `point_type` tinyint(1) NOT NULL default '0' COMMENT '1:管理,2:ｸﾘｯｸ,3:登録,4:料率,5:ｱﾊﾞﾀｰ,6:ﾃﾞｺﾒ,7:ｹﾞｰﾑ,8:ｻｳﾝﾄﾞ',
  `point_sub_id` int(11) NOT NULL default '0' COMMENT 'ポイントサブID(ポイントに関するサブIDが入る:ad_idなど)',
  `user_sub_id` int(11) NOT NULL default '0' COMMENT 'ユーザサブID(ユーザに関連するIDが入る:user_ad_idなど)',
  `point_memo` text COMMENT 'ポイント備考(広告名などが入る)',
  `point_status` int(11) NOT NULL default '0' COMMENT 'ポイントステータス （1：有効 ,0：無効）',
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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
  `sagawa_code` varchar(255) default NULL COMMENT '佐川伝票コード',
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
  `type` varchar(32) NOT NULL COMMENT 'ランキングタイプ　access, decomail など',
  `id` int(11) NOT NULL default '0' COMMENT 'ランキング対象ID',
  `sub_id` int(11) default '0' COMMENT 'ランキング対象カテゴリID',
  `ranking_order` int(11) NOT NULL default '0' COMMENT 'ランキング順位',
  `ranking_created_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  PRIMARY KEY  (`ranking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='ランキングテーブル';

--
-- Table structure for table `ranking_access`
--

DROP TABLE IF EXISTS `ranking_access`;
CREATE TABLE `ranking_access` (
  `ranking_access_id` int(11) unsigned NOT NULL auto_increment COMMENT '人気商品アクセスID',
  `item_id` int(11) unsigned NOT NULL COMMENT '商品ID',
  `ranking_access_created_time` datetime NOT NULL COMMENT '作成日時',
  `ranking_access_updated_time` datetime default NULL COMMENT '更新日時',
  `ranking_access_deleted_time` datetime default NULL COMMENT '削除日時',
  `ranking_access_status` tinyint(1) unsigned NOT NULL COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`ranking_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='人気商品アクセス履歴用テーブル';

--
-- Table structure for table `ranking_count`
--

DROP TABLE IF EXISTS `ranking_count`;
CREATE TABLE `ranking_count` (
  `ranking_count_id` int(11) unsigned NOT NULL auto_increment COMMENT '人気商品集計ID',
  `ranking_count_rank` tinyint(1) unsigned default NULL COMMENT '人気商品順位',
  `item_id` int(11) unsigned default NULL COMMENT '商品ID',
  `stock_id` int(11) unsigned default NULL COMMENT '在庫ID',
  `ranking_count_num` int(11) unsigned default NULL COMMENT '人気集計数',
  `ranking_count_start_date` date NOT NULL COMMENT '集計範囲開始',
  `ranking_count_end_date` date NOT NULL COMMENT '集計範囲終了',
  `ranking_count_created_time` datetime NOT NULL COMMENT '作成日時',
  `ranking_count_updated_time` datetime default NULL COMMENT '更新日時',
  `ranking_count_deleted_time` datetime default NULL COMMENT '削除日時',
  `ranking_count_status` tinyint(1) unsigned NOT NULL COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`ranking_count_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='人気商品集計用テーブル';

--
-- Table structure for table `ranking_order`
--

DROP TABLE IF EXISTS `ranking_order`;
CREATE TABLE `ranking_order` (
  `ranking_order_id` int(11) unsigned NOT NULL auto_increment COMMENT '人気商品購入ID',
  `item_id` int(11) unsigned NOT NULL COMMENT '商品ID',
  `stock_id` int(11) unsigned NOT NULL COMMENT '在庫ID',
  `ranking_order_item_num` int(11) unsigned NOT NULL COMMENT '購入個数',
  `ranking_order_created_time` datetime NOT NULL COMMENT '作成日時',
  `ranking_order_updated_time` datetime default NULL COMMENT '更新日時',
  `ranking_order_deleted_time` datetime default NULL COMMENT '削除日時',
  `ranking_order_status` tinyint(1) unsigned NOT NULL COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`ranking_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='人気商品購入履歴用テーブル';

--
-- Table structure for table `register_session`
--

DROP TABLE IF EXISTS `register_session`;
CREATE TABLE `register_session` (
  `register_session_id` int(11) unsigned NOT NULL auto_increment COMMENT '登録セッションID',
  `register_session_random_id` varchar(10) default NULL COMMENT '登録ランダムID',
  `register_session_session_id` varchar(64) default NULL COMMENT '登録セッション',
  `register_session_created_time` datetime NOT NULL COMMENT '作成日時',
  `register_session_updated_time` datetime default NULL COMMENT '更新日時',
  `register_session_deleted_time` datetime default NULL COMMENT '削除日時',
  `register_session_status` tinyint(1) unsigned NOT NULL COMMENT '0:無効,1:有効',
  PRIMARY KEY  (`register_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='登録セッション用テーブル';

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
  `report_regist_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '作成日時',
  `report_update_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '更新日時',
  `report_delete_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '削除日時',
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
-- Table structure for table `shop_contents`
--

DROP TABLE IF EXISTS `shop_contents`;
CREATE TABLE `shop_contents` (
  `shop_contents_id` int(11) unsigned NOT NULL auto_increment COMMENT 'フリーページID',
  `shop_contents_category_id` text NOT NULL COMMENT 'フリーページカテゴリID',
  `shop_contents_title` text NOT NULL COMMENT 'フリーページタイトル',
  `shop_contents_body` text NOT NULL COMMENT 'フリーページ本文',
  `file_id` text COMMENT 'フリーページファイル',
  `shop_contents_link_shop_id` int(11) default NULL COMMENT 'フリーページフッターリンク設定(ショップID)',
  `shop_contents_link_shop_status` int(11) default NULL COMMENT 'フリーページフッターリンク設定ステータス(1:有効)',
  `shop_contents_created_time` datetime NOT NULL COMMENT '作成日時',
  `shop_contents_updated_time` datetime default NULL COMMENT '更新日時',
  `shop_contents_deleted_time` datetime default NULL COMMENT '削除日時',
  `shop_contents_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '1:非公開,2:公開,0:削除',
  PRIMARY KEY  (`shop_contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='モールフリーページ用テーブル';

--
-- Table structure for table `shop_contents_category`
--

DROP TABLE IF EXISTS `shop_contents_category`;
CREATE TABLE `shop_contents_category` (
  `shop_contents_category_id` int(11) unsigned NOT NULL auto_increment COMMENT 'フリーページカテゴリID',
  `shop_contents_category_name` text NOT NULL COMMENT 'フリーページカテゴリ名',
  `shop_contents_category_priority_id` int(11) NOT NULL default '0' COMMENT 'ショップコンテンツカテゴリ優先度',
  `shop_contents_category_created_time` datetime default NULL COMMENT '作成日時',
  `shop_contents_category_updated_time` datetime default NULL COMMENT '更新日時',
  `shop_contents_category_deleted_time` datetime default NULL COMMENT '削除日時',
  `shop_contents_category_status` tinyint(1) unsigned NOT NULL default '1' COMMENT '0:削除,1:有効',
  PRIMARY KEY  (`shop_contents_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis COMMENT='モールフリーページカテゴリ用テーブル';

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
  `supplier_use_daibiki_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:代引可能',
  `supplier_use_furikomi_status` tinyint(1) unsigned NOT NULL default '0' COMMENT '1:銀行振込可能',
  `supplier_doukon_allow_id` text COMMENT '同梱可能設定(仕入れ先ID:区切り)',
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
  `user_mailaddress` char(255) NOT NULL COMMENT 'メールアドレス',
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
  `user_message_1_status` tinyint(1) unsigned default '1',
  `user_message_2_status` tinyint(1) unsigned default '1',
  `user_message_3_status` tinyint(1) unsigned default '1',
  `user_message_4_status` tinyint(1) unsigned default '1',
  `user_public_1_status` tinyint(1) unsigned default '1',
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
  `spgv_user_id` int(11) default '0' COMMENT 'SPGVユーザID',
  `user_mail_ok` int(11) NOT NULL default '1' COMMENT 'メルマガ配信OK  1:ok 0:reject',
  `user_name_kana` varchar(255) NOT NULL default '' COMMENT 'ユーザ名かな',
  `user_zipcode` varchar(8) default NULL COMMENT '郵便番号',
  `user_pref` tinyint(1) unsigned NOT NULL COMMENT '住所都道府県番号',
  `user_phone` varchar(255) NOT NULL default '' COMMENT '電話番号',
  `user_order_time` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '最終購入日時',
  `mm_only_flag` int(11) default NULL COMMENT '1:メルマガのみ登録ユーザ',
  PRIMARY KEY  (`user_id`),
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
  `user_game_score_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_game_score_score` int(11) NOT NULL,
  `user_game_score_created_time` datetime NOT NULL,
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
  `spgv_user_id` int(11) NOT NULL COMMENT 'SPGVユーザID',
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
  `user_order_delivery_pref` int(1) unsigned default NULL COMMENT '配達先住所都道府県番号',
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
  `user_pref` tinyint(1) unsigned NOT NULL COMMENT '住所都道府県番号',
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



INSERT INTO `admin` (`admin_id`, `admin_name`, `login_id`, `login_password`, `admin_action_category_id`, `admin_action_id`, `admin_shop_id`, `admin_status`) VALUES
(1, 'root', 'mobile', 'sns', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295', '', 1);

