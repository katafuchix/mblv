<?php
/**
 * word-ini.php
 * 基本語句の定義
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザ用語句
 */
/* =============================================
// 基本語句
 ============================================= */
define('W_USER_MENU_ICON', '◆');
define('W_USER_USER', 'ﾕｰｻﾞ');
define('W_USER_USER_ID', W_USER_USER.'ID');
define('W_USER_USER_REGIST', '会員登録');
//define('W_USER_POINT', 'ﾎﾟｲﾝﾄ');// 振り分け対象
define('W_USER_LOGIN', 'ﾛｸﾞｲﾝ');
define('W_USER_LOGOUT', 'ﾛｸﾞｱｳﾄ');
define('W_USER_PASSWORD', 'ﾊﾟｽﾜｰﾄﾞ');
define('W_USER_NEW_PASSWORD', '新ﾊﾟｽﾜｰﾄﾞ');
define('W_USER_GAME', 'ｹﾞｰﾑ');
define('W_USER_SOUND', 'ｻｳﾝﾄﾞ');
define('W_USER_AVATAR', 'ｱﾊﾞﾀｰ');
define('W_USER_DECOMAIL', 'ﾃﾞｺﾒｰﾙ');
define('W_USER_MAILADDRESS', 'ﾒｰﾙｱﾄﾞﾚｽ');
define('W_USER_NICKNAME', 'ﾆｯｸﾈｰﾑ');
define('W_USER_PROFILE', 'ﾌﾟﾛﾌｨｰﾙ');
define('W_USER_AD', '広告');
define('W_USER_BANNER', 'ﾊﾞﾅｰ');
define('W_USER_IMAGE', '画像');
define('W_USER_MOVIE', '動画');
define('W_USER_IDENTIFY', '認証');
define('W_USER_DUPLICATE_POST', '二重投稿');
define('W_USER_REPORT', '通報');
define('W_USER_REPORT_FAIL_USER_ID', '通報対象者');
define('W_USER_REPORT_MESSAGE', W_USER_REPORT . '内容');
define('W_USER_SEGMENT', 'ｾｸﾞﾒﾝﾄ');
define('W_USER_IMAGE', '画像');
define('W_USER_CONTENTS', 'ﾌﾘｰﾍﾟｰｼﾞ');
define('W_USER_SUBMIT', '　は　い　');
define('W_USER_BACK', '　いいえ　');
define('W_USER_CONFIRM', '　確認画面へ　');
define('W_USER_EDIT_CONFIRM', '　編集確認画面へ　');
define('W_USER_DELETE_CONFIRM', '　削除確認画面へ　');
define('W_USER_DELETE', '　は　い　');
define('W_USER_UPDATE', '　は　い　');
define('W_USER_DELETE_IMAGE', '画像を削除する');
define('W_USER_ADD', '　は　い　');
define('W_USER_REMOVE', '　は　い　');
define('W_USER_SEND', '　は　い　');
define('W_USER_REPLY', '返信する');
define('W_USER_TO_USER_ID', '宛先');
define('W_USER_UNSET', '　キャンセル　');
define('W_USER_GIVE', '　は　い　');
define('W_USER_RESIGN', '　は　い　');
define('W_USER_REGISTER', '　は　い　');
define('W_USER_EDIT', '　は　い　');
define('W_USER_SEARCH', '　検　索　');

/* =============================================
// ユーザ情報語句
 ============================================= */
define('W_USER_USER_HASH', W_USER_USER.'識別子');
define('W_USER_USER_NICKNAME','ﾆｯｸﾈｰﾑ');
define('W_USER_USER_PASSWORD', 'ﾊﾟｽﾜｰﾄﾞ');
define('W_USER_USER_SEX', '性別');
define('W_USER_USER_BIRTH_DATE_YEAR', '生年月日(年)');
define('W_USER_USER_BIRTH_DATE_MONTH', '生年月日(月)');
define('W_USER_USER_BIRTH_DATE_DAY', '生年月日(日)');
define('W_USER_USER_PREFECTURE_ID', '住所(都道府県)');
define('W_USER_USER_ADDRESS', '住所(市区町村番地)');
define('W_USER_USER_ADDRESS_BUILDING', '住所(建物名)');
define('W_USER_USER_BLOOD_TYPE', '血液型');
define('W_USER_JOB_FAMILY_ID', '職種');
define('W_USER_BUSINESS_CATEGORY_ID', '業種');
define('W_USER_USER_IS_MARRIED', '結婚');
define('W_USER_USER_HAS_CHILDREN', '子供');
define('W_USER_WORK_LOCATION_PREFECTURE_ID', '勤務地');
define('W_USER_USER_HOBBY', '趣味');
define('W_USER_USER_URL', 'URL');
define('W_USER_USER_INTRODUCTION', '自己紹介');
define('W_USER_USER_AGE_MIN', '年齢(最低)');
define('W_USER_USER_AGE_AMX', '年齢(最高)');
define('W_USER_USER_PROF_KEYWORD', 'ｷｰﾜｰﾄﾞ');

/* =============================================
// ユーザ情報公開語句
 ============================================= */
define('W_USER_USER_SEX_PUBLIC', '性別公開');
define('W_USER_USER_BIRTH_DAY_PUBLIC', '生年月日公開)');
define('W_USER_USER_ADDRESS_PUBLIC', '住所公開');
define('W_USER_USER_BLOOD_TYPE_PUBLIC', '血液型公開');
define('W_USER_JOB_FAMILY_PUBLIC', '職種公開');
define('W_USER_BUSINESS_CATEGORY_ID_PUBLIC', '業種公開');
define('W_USER_USER_IS_MARRIED_PUBLIC', '結婚公開');
define('W_USER_USER_HAS_CHILDREN_PUBLIC', '子供公開');
define('W_USER_WORK_LOCATION_PREFECTURE_ID_PUBLIC', '勤務地公開');
define('W_USER_USER_HOBBY_PUBLIC', '趣味公開');
define('W_USER_USER_URL_PUBLIC', 'URL公開');
define('W_USER_USER_INTRODUCTION_PUBLIC', '自己紹介公開');

/* =============================================
// 画像投稿語句
 ============================================= */
define('W_USER_IMAGE_ADD', '[x:0066]画像を添付する');
define('W_USER_IMAGE_EDIT', '[x:0066]画像を変更する');

/* =============================================
// 日記語句
 ============================================= */
define('W_USER_BLOG_ARTICLE', '日記');
define('W_USER_BLOG_ARTICLE_ID', W_USER_BLOG_ARTICLE.'ID');
define('W_USER_BLOG_ARTICLE_TITLE', W_USER_BLOG_ARTICLE.'ﾀｲﾄﾙ');
define('W_USER_BLOG_ARTICLE_BODY', W_USER_BLOG_ARTICLE.'本文');
define('W_USER_BLOG_ARTICLE_PUBLIC', W_USER_BLOG_ARTICLE.'公開設定');

/* =============================================
// 日記コメント語句
 ============================================= */
define('W_USER_BLOG_COMMENT', 'ｺﾒﾝﾄ');
define('W_USER_BLOG_COMMENT_ID', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'ID');
define('W_USER_BLOG_COMMENT_BODY', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'本文');

/* =============================================
// コミュニティ語句
 ============================================= */
define('W_USER_COMMUNITY', 'ｺﾐｭﾆﾃｨ');
define('W_USER_COMMUNITY_ID', W_USER_COMMUNITY.'ID');
define('W_USER_COMMUNITY_LIST', '参加'.W_USER_COMMUNITY);
define('W_USER_COMMUNITY_TITLE', W_USER_COMMUNITY.'名');
define('W_USER_COMMUNITY_CATEGORY', W_USER_COMMUNITY.'ｶﾃｺﾞﾘ');
define('W_USER_COMMUNITY_CATEGORY_ID', W_USER_COMMUNITY.'ｶﾃｺﾞﾘ');
define('W_USER_COMMUNITY_DESCRIPTION', W_USER_COMMUNITY.'の説明');
define('W_USER_COMMUNITY_ADMIN', '管理者');
define('W_USER_COMMUNITY_ADMINISTRATION', '管理権');
define('W_USER_COMMUNITY_JOIN_CONDITION', '参加条件と公開ﾚﾍﾞﾙ');
define('W_USER_COMMUNITY_TOPIC_PERMISSION', 'ﾄﾋﾟｯｸ作成の権限');

/* =============================================
// コミュニティトピック語句
 ============================================= */
define('W_USER_COMMUNITY_ARTICLE', 'ﾄﾋﾟｯｸ');
define('W_USER_COMMUNITY_ARTICLE_ID', W_USER_COMMUNITY_ARTICLE.'ID');
define('W_USER_COMMUNITY_ARTICLE_TITLE', W_USER_COMMUNITY_ARTICLE.'ﾀｲﾄﾙ');
define('W_USER_COMMUNITY_ARTICLE_BODY', W_USER_COMMUNITY_ARTICLE.'本文');

/* =============================================
// コミュニティコメント語句
 ============================================= */
define('W_USER_COMMUNITY_COMMENT', 'ｺﾒﾝﾄ');
define('W_USER_COMMUNITY_COMMENT_NAME', 'ｺﾒﾝﾄ');
define('W_USER_COMMUNITY_COMMENT_ID', W_USER_COMMUNITY_COMMENT.'ID');
define('W_USER_COMMUNITY_COMMENT_BODY', '本文');

/* =============================================
// 伝言板語句
 ============================================= */
define('W_USER_BBS', '伝言板');
define('W_USER_BBS_NAME', '伝言');
define('W_USER_BBS_MESSAGE', W_USER_BBS_NAME.'ﾒｯｾｰｼﾞ');
define('W_USER_BBS_ID', W_USER_BBS_NAME.'ID');
define('W_USER_BBS_BODY', W_USER_BBS_NAME.'ﾒｯｾｰｼﾞ');

/* =============================================
// ブラックリスト語句
 ============================================= */
define('W_USER_BLACKLIST', 'ﾌﾞﾗｯｸﾘｽﾄ');
define('W_USER_BLACKLIST_ID', W_USER_BLACKLIST.'ID');
define('W_USER_BLACKLIST_USER_ID', W_USER_BLACKLIST.'登録処理を行ったユーザID');
define('W_USER_BLACKLIST_DENY_USER_ID', W_USER_BLACKLIST.'に登録されたユーザID');

/* =============================================
// コメント（感想）語句
 ============================================= */
define('W_USER_COMMENT', 'コメント');
define('W_USER_COMMENT_NAME', 'コメント');
define('W_USER_COMMENT_TYPE', W_USER_COMMENT.'種別');
define('W_USER_COMMENT_SUBID', W_USER_COMMENT.'サブID');
define('W_USER_COMMENT_ID', W_USER_COMMENT.'ID');
define('W_USER_COMMENT_BODY', '本文');

/* =============================================
// メッセージ語句
 ============================================= */
define('W_USER_MESSAGE', 'ﾐﾆﾒｰﾙ');
define('W_USER_MESSAGE_ID', W_USER_MESSAGE.'ID');
define('W_USER_MESSAGE_REPLY_ID', W_USER_MESSAGE.'ID');
define('W_USER_MESSAGE_TITLE', 'ﾀｲﾄﾙ');
define('W_USER_MESSAGE_BODY', '本文');
define('W_USER_MESSAGE_RECEIVE_BOX', '受信BOX');
define('W_USER_MESSAGE_SENT_BOX', '送信BOX');
define('W_USER_MESSAGE_STATUS', W_USER_MESSAGE.'ステータス');
define('W_USER_MESSAGE_CHECKED', W_USER_MESSAGE.'監視');

/* =============================================
// 送受信語句
 ============================================= */
define('W_USER_FROM_USER_NICKNAME', 'FROM');
define('W_USER_TO_USER_NICKNAME', '宛先');

/* =============================================
// 友達語句
 ============================================= */
define('W_USER_FRIEND_NAME', '友達');
define('W_USER_FRIEND', W_USER_FRIEND_NAME.'ﾘﾝｸ');
define('W_USER_FRIEND_LIST', W_USER_FRIEND_NAME.'ﾘｽﾄ');
define('W_USER_FRIEND_ID', W_USER_FRIEND.'ID');
define('W_USER_FRIEND_MESSAGE', 'ﾒｯｾｰｼﾞ(任意)');
define('W_USER_FRIEND_INTRODUCTION', '紹介文');

/* =============================================
// 通知メール語句
 ============================================= */
define('W_USER_MESSAGE_1',W_USER_BBS.'書き込み通知ﾒｰﾙ');
define('W_USER_MESSAGE_2',W_USER_MESSAGE.'通知ﾒｰﾙ');
define('W_USER_MESSAGE_3',W_USER_BLOG_COMMENT.'通知ﾒｰﾙ');
define('W_USER_MESSAGE_4',W_USER_COMMUNITY_COMMENT.'通知ﾒｰﾙ');

/* =============================================
// アバター語句
 ============================================= */
define('W_USER_AVATAR_ID', W_USER_AVATAR.'ID');
define('W_USER_AVATAR_CATEGORY', W_USER_AVATAR.'ｶﾃｺﾞﾘ');
define('W_USER_AVATAR_STAND', W_USER_AVATAR.'台座');

/* =============================================
// デコメール語句
 ============================================= */
define('W_USER_DECOMAIL_ID', W_USER_DECOMAIL.'ID');

/* =============================================
// twitter語句
 ============================================= */
define('W_USER_TWITTER', 'ﾅﾊﾟﾎﾞｰﾄﾞ');
define('W_USER_TWITTER_ID', W_USER_TWITTER.'ID');
define('W_USER_TWITTER_BODY', W_USER_TWITTER.'本文');

define('W_USER_THEMA', 'お題');
define('W_USER_THEMA_ID', W_USER_THEMA.'ID');


/* =============================================
// ゲームポイント語句
 ============================================= */
define('W_USER_GAMEPOINT', 'ｹﾞｰﾑﾎﾟｲﾝﾄ');
define('W_USER_GAMEPOINT_ID', W_USER_GAMEPOINT.'ID');
define('W_USER_ID', 'ID');
define('W_USER_ORDER', '順位');


/**
 * 管理用語句
 */
/* =============================================
// 基本語句
 ============================================= */
define('W_ADMIN_MENU_ICON', '◆');
define('W_ADMIN_ACCOUNT', '管理者アカウント');
define('W_ADMIN_USER', 'ユーザー');
define('W_ADMIN_USER_ID',  W_ADMIN_USER.'ID');
define('W_ADMIN_MESSAGE', 'ミニメール');
//define('W_ADMIN_POINT', 'ポイント');// 振り分け対象
define('W_ADMIN_LOGIN', 'ログイン');
define('W_ADMIN_LOGOUT', 'ログアウト');
define('W_ADMIN_PASSWORD', 'パスワード');
define('W_ADMIN_GAME', 'ゲーム');
define('W_ADMIN_GAME_CATEGORY', 'ゲームカテゴリ');
define('W_ADMIN_SOUND', 'サウンド');
define('W_ADMIN_SOUND_CATEGORY', 'サウンドカテゴリ');
define('W_ADMIN_AVATAR', 'アバター');
define('W_ADMIN_DECOMAIL', 'デコメール');
define('W_ADMIN_DECOMAIL_CATEGORY', 'デコメールカテゴリ');
define('W_ADMIN_MAILADDRESS', 'メールアドレス');
define('W_ADMIN_PROFILE', 'プロフィール');
define('W_ADMIN_AD', '広告');
define('W_ADMIN_IMAGE', '画像');
define('W_ADMIN_AD_CATEGORY', '広告カテゴリ');
define('W_ADMIN_AD_CODE', '広告コード');
define('W_ADMIN_BANNER', 'バナー');
define('W_ADMIN_COMMUNITY', 'コミュニティ');
define('W_ADMIN_COMMUNITY_ARTICLE', 'コミュニティトピック');
define('W_ADMIN_COMMUNITY_ARTICLE_NAME', 'コミュニティトピック');
define('W_ADMIN_COMMUNITY_CATEGORY', 'コミュニティカテゴリ');
define('W_ADMIN_MAGAZINE', 'マガジン');
define('W_ADMIN_MEDIA', '入会経路');
define('W_ADMIN_CHECKED', '監視');
define('W_ADMIN_CONFIG', '基本情報');
define('W_ADMIN_PRIORITY', '優先度');
define('W_ADMIN_REPORT', '通報');
define('W_ADMIN_SEGMENT', 'セグメント');
define('W_ADMIN_CONTENTS', 'フリーページ');
define('W_ADMIN_CMS', 'コンテンツ');

/* =============================================
// ユーザ情報語句
 ============================================= */
define('W_ADMIN_USER_HASH', W_ADMIN_USER.'識別子');
define('W_ADMIN_USER_NICKNAME','ニックネーム');
define('W_ADMIN_USER_PASSWORD', 'パスワード');
define('W_ADMIN_USER_SEX', '性別');
define('W_ADMIN_USER_BIRTH_DATE_YEAR', '生年月日(年)');
define('W_ADMIN_USER_BIRTH_DATE_MONTH', '生年月日(月)');
define('W_ADMIN_USER_BIRTH_DATE_DAY', '生年月日(日)');
define('W_ADMIN_USER_PREFECTURE_ID', '住所(都道府県)');
define('W_ADMIN_USER_ADDRESS', '住所(市区町村番地)');
define('W_ADMIN_USER_ADDRESS_BUILDING', '住所(建物名)');
define('W_ADMIN_USER_BLOOD_TYPE', '血液型');
define('W_ADMIN_JOB_FAMILY_ID', '職種');
define('W_ADMIN_BUSINESS_CATEGORY_ID', '業種');
define('W_ADMIN_USER_IS_MARRIED', '結婚');
define('W_ADMIN_USER_HAS_CHILDREN', '子供');
define('W_ADMIN_WORK_LOCATION_PREFECTURE_ID', '勤務地');
define('W_ADMIN_USER_HOBBY', '趣味');
define('W_ADMIN_USER_URL', 'URL');
define('W_ADMIN_USER_INTRODUCTION', '自己紹介');
define('W_ADMIN_USER_AGE_MIN', '年齢(最低)');
define('W_ADMIN_USER_AGE_AMX', '年齢(最高)');
define('W_ADMIN_USER_PROF_KEYWORD', 'キーワード');
define('W_ADMIN_USER_GUEST_USER', 'ゲストユーザー');

/* =============================================
// ユーザ情報公開語句
 ============================================= */
define('W_ADMIN_USER_SEX_PUBLIC', '性別公開');
define('W_ADMIN_USER_BIRTH_DAY_PUBLIC', '生年月日公開)');
define('W_ADMIN_USER_ADDRESS_PUBLIC', '住所公開');
define('W_ADMIN_USER_BLOOD_TYPE_PUBLIC', '血液型公開');
define('W_ADMIN_JOB_FAMILY_PUBLIC', '職種公開');
define('W_ADMIN_BUSINESS_CATEGORY_ID_PUBLIC', '業種公開');
define('W_ADMIN_USER_IS_MARRIED_PUBLIC', '結婚公開');
define('W_ADMIN_USER_HAS_CHILDREN_PUBLIC', '子供公開');
define('W_ADMIN_WORK_LOCATION_PREFECTURE_ID_PUBLIC', '勤務地公開');
define('W_ADMIN_USER_HOBBY_PUBLIC', '趣味公開');
define('W_ADMIN_USER_URL_PUBLIC', 'URL公開');
define('W_ADMIN_USER_INTRODUCTION_PUBLIC', '自己紹介公開');

/* =============================================
// 画像投稿語句
 ============================================= */
define('W_ADMIN_IMAGE_ADD', '[x:0066]画像を添付する');
define('W_ADMIN_IMAGE_EDIT', '[x:0066]画像を変更する');

/* =============================================
// 日記語句
 ============================================= */
define('W_ADMIN_BLOG_ARTICLE', '日記');
define('W_ADMIN_BLOG_ARTICLE_ID', W_ADMIN_BLOG_ARTICLE.'ID');
define('W_ADMIN_BLOG_ARTICLE_TITLE', W_ADMIN_BLOG_ARTICLE.'タイトル');
define('W_ADMIN_BLOG_ARTICLE_BODY', W_ADMIN_BLOG_ARTICLE.'本文');
define('W_ADMIN_BLOG_ARTICLE_STATUS', W_ADMIN_BLOG_ARTICLE.'ステータス');
define('W_ADMIN_BLOG_ARTICLE_CHECKED', W_ADMIN_BLOG_ARTICLE.'監視');
define('W_ADMIN_BLOG_ARTICLE_PUBLIC', W_ADMIN_BLOG_ARTICLE.'公開設定');

/* =============================================
// 日記コメント語句
 ============================================= */
define('W_ADMIN_BLOG_COMMENT', '日記コメント');
define('W_ADMIN_BLOG_COMMENT_ID', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'ID');
define('W_ADMIN_BLOG_COMMENT_BODY', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'本文');
define('W_ADMIN_BLOG_COMMENT_STATUS', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'ステータス');
define('W_ADMIN_BLOG_COMMENT_CHECKED', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'監視');

/* =============================================
// コメント（感想）語句
 ============================================= */
define('W_ADMIN_COMMENT', 'コメント');
define('W_ADMIN_COMMENT_NAME', 'コメント');
define('W_ADMIN_COMMENT_TYPE', W_ADMIN_COMMENT.'種別');
define('W_ADMIN_COMMENT_SUBID', W_ADMIN_COMMENT.'サブID');
define('W_ADMIN_COMMENT_ID', W_ADMIN_COMMENT.'ID');
define('W_ADMIN_COMMENT_BODY', '本文');
define('W_ADMIN_COMMENT_STATUS', W_ADMIN_COMMENT.'ステータス');
define('W_ADMIN_COMMENT_CHECKED', W_ADMIN_COMMENT.'監視');

/* =============================================
// コミュニティ語句
 ============================================= */
define('W_ADMIN_COMMUNITY', 'コミュニティ');
define('W_ADMIN_COMMUNITY_LIST', '参加'.W_ADMIN_COMMUNITY);
define('W_ADMIN_COMMUNITY_TITLE', W_ADMIN_COMMUNITY.'名');
define('W_ADMIN_COMMUNITY_ID', W_ADMIN_COMMUNITY.'ID');
define('W_ADMIN_COMMUNITY_ARTICLE', 'ﾄﾋﾟｯｸ');
define('W_ADMIN_COMMUNITY_ARTICLE_ID', W_ADMIN_COMMUNITY_ARTICLE.'ID');
define('W_ADMIN_COMMUNITY_ARTICLE_TITLE', W_ADMIN_COMMUNITY_ARTICLE.'タイトル');
define('W_ADMIN_COMMUNITY_ARTICLE_BODY', W_ADMIN_COMMUNITY_ARTICLE.'本文');
define('W_ADMIN_COMMUNITY_ARTICLE_STATUS', W_ADMIN_COMMUNITY_ARTICLE.'ステータス');
define('W_ADMIN_COMMUNITY_ARTICLE_CHECKED', W_ADMIN_COMMUNITY_ARTICLE.'監視');
define('W_ADMIN_COMMUNITY_ADMIN', '管理者');
define('W_ADMIN_COMMUNITY_ADMIN_USER_ID', '管理者' . W_ADMIN_USER_ID);
define('W_ADMIN_COMMUNITY_ADMINISTRATION', '管理権');

/* =============================================
// コミュニティコメント語句
 ============================================= */
define('W_ADMIN_COMMUNITY_COMMENT', 'コミュニティコメント');
define('W_ADMIN_COMMUNITY_COMMENT_NAME', 'コミュニティコメント');
define('W_ADMIN_COMMUNITY_COMMENT_ID', W_ADMIN_COMMUNITY_COMMENT.'ID');
define('W_ADMIN_COMMUNITY_COMMENT_BODY', '本文');
define('W_ADMIN_COMMUNITY_COMMENT_STATUS', W_ADMIN_COMMUNITY_COMMENT.'ステータス');
define('W_ADMIN_COMMUNITY_COMMENT_CHECKED', W_ADMIN_COMMUNITY_COMMENT.'監視');

/* =============================================
// 伝言板語句
 ============================================= */
define('W_ADMIN_BBS', '伝言板');
define('W_ADMIN_BBS_NAME', '伝言');
define('W_ADMIN_BBS_MESSAGE', W_ADMIN_BBS_NAME.'メッセージ');
define('W_ADMIN_BBS_ID', W_ADMIN_BBS_NAME.'ID');
define('W_ADMIN_BBS_BODY', W_ADMIN_BBS_NAME.'メッセージ');
define('W_ADMIN_BBS_STATUS', W_ADMIN_BBS_NAME.'ステータス');
define('W_ADMIN_BBS_CHECKED', W_ADMIN_BBS_NAME.'監視');

/* =============================================
// ブラックリスト語句
 ============================================= */
define('W_ADMIN_BLACKLIST', 'ブラックリスト');
define('W_ADMIN_BLACKLIST_ID', W_ADMIN_BLACKLIST.'ID');
define('W_ADMIN_BLACKLIST_ADMIN_ID', W_ADMIN_BLACKLIST.'登録処理を行ったユーザID');
define('W_ADMIN_BLACKLIST_DENY_ADMIN_ID', W_ADMIN_BLACKLIST.'に登録されたユーザID');
define('W_ADMIN_BLACKLIST_STATUS', W_ADMIN_BLACKLIST.'ステータス');
define('W_ADMIN_BLACKLIST_CHECKED', W_ADMIN_BLACKLIST.'監視');

/* =============================================
// アバター語句
 ============================================= */
define('W_ADMIN_AVATAR_ID', W_ADMIN_AVATAR.'ID');
define('W_ADMIN_AVATAR_STATUS', W_ADMIN_MOVIE.'ステータス');
define('W_ADMIN_AVATAR_CHECKED', W_ADMIN_MOVIE.'監視');
define('W_ADMIN_AVATAR_ID', W_ADMIN_AVATAR.'ID');
define('W_ADMIN_AVATAR_CATEGORY', W_ADMIN_AVATAR.'カテゴリ');
define('W_ADMIN_AVATAR_CATEGORY_ID', W_ADMIN_AVATAR_CATEGORY.'ID');
define('W_ADMIN_AVATAR_CATEGORY_NAME', W_ADMIN_AVATAR_CATEGORY.'名');
define('W_ADMIN_AVATAR_STAND', W_ADMIN_AVATAR.'台座');
define('W_ADMIN_AVATAR_STAND_ID', W_ADMIN_AVATAR_STAND.'ID');
define('W_ADMIN_AVATAR_STAND_NAME', W_ADMIN_AVATAR_STAND.'名');
define('W_ADMIN_AVATAR_DESC', W_ADMIN_AVATAR.'説明');
define('W_ADMIN_AVATAR_SYSTEM_CATEGORY_ID', 'アバターシステムカテゴリID');
define('W_ADMIN_AVATAR_CATEGORY_PRIORITY', W_ADMIN_AVATAR_CATEGORY.'優先度');
define('W_ADMIN_AVATAR_CATEGORY_PRIORITY_ID', W_ADMIN_AVATAR_CATEGORY.'優先度ID');
define('W_ADMIN_AVATAR_NAME',	W_ADMIN_AVATAR.'名');
define('W_ADMIN_AVATAR_DESC',	W_ADMIN_AVATAR.'説明');
define('W_ADMIN_AVATAR_IMAGE1',	W_ADMIN_AVATAR. '画像1');
define('W_ADMIN_AVATAR_IMAGE1_X',	W_ADMIN_AVATAR_IMAGE1. 'x座標');
define('W_ADMIN_AVATAR_IMAGE1_Y',	W_ADMIN_AVATAR_IMAGE1. 'y座標');
define('W_ADMIN_AVATAR_IMAGE1_Z',	W_ADMIN_AVATAR_IMAGE1. 'z座標');
define('W_ADMIN_AVATAR_IMAGE2',	W_ADMIN_AVATAR. '画像2');
define('W_ADMIN_AVATAR_IMAGE2_X',	W_ADMIN_AVATAR_IMAGE2. 'x座標');
define('W_ADMIN_AVATAR_IMAGE2_Y',	W_ADMIN_AVATAR_IMAGE2. 'y座標');
define('W_ADMIN_AVATAR_IMAGE2_Z',	W_ADMIN_AVATAR_IMAGE2. 'z座標');
define('W_ADMIN_AVATAR_POINT',	W_ADMIN_AVATAR.'消費ポイント');
define('W_ADMIN_AVATAR_SEX_TYPE',	W_ADMIN_AVATAR.'性別タイプ');
define('W_ADMIN_AVATAR_PRESET',	'プリセット'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_DEFAULT',	'デフォルト'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_FIRST',	'初期選択'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_STOCK_NUM',	W_ADMIN_AVATAR.'配信終了数');
define('W_ADMIN_AVATAR_STOCK_STATUS',	W_ADMIN_AVATAR_STOCK_NUM.'設定');
define('W_ADMIN_AVATAR_START_TIME',	W_ADMIN_AVATAR.'配信終了日時');
define('W_ADMIN_AVATAR_START_STATUS',	W_ADMIN_AVATAR_START_TIME.'設定');
define('W_ADMIN_AVATAR_END_TIME',	W_ADMIN_AVATAR.'配信終了日時');
define('W_ADMIN_AVATAR_END_STATUS',	W_ADMIN_AVATAR_END_TIME.'設定');
define('W_ADMIN_AVATAR_IMAGE1_FILE',	W_ADMIN_AVATAR. '画像1ファイル');
define('W_ADMIN_AVATAR_IMAGE1_STATUS',	W_ADMIN_AVATAR. '画像1ステータス');
define('W_ADMIN_AVATAR_IMAGE1_DESC',	W_ADMIN_AVATAR. '画像1');
define('W_ADMIN_AVATAR_IMGAE1_DESC_NAME',	'実際に使用する'.W_ADMIN_AVATAR_IMAGE1);
define('W_ADMIN_AVATAR_IMAGE1_DESC_FILE',	W_ADMIN_AVATAR. '画像1ファイル');
define('W_ADMIN_AVATAR_IMAGE1_DESC_STATUS',	W_ADMIN_AVATAR. '画像1ステータス');
define('W_ADMIN_AVATAR_IMAGE2_FILE',	W_ADMIN_AVATAR. '画像2ファイル');
define('W_ADMIN_AVATAR_IMAGE2_STATUS',	W_ADMIN_AVATAR. '画像2ステータス');
define('W_ADMIN_AVATAR_IMAGE2_DESC',	W_ADMIN_AVATAR. '画像2');
define('W_ADMIN_AVATAR_IMGAE2_DESC_NAME',	'実際に使用する'.W_ADMIN_AVATAR_IMAGE2);
define('W_ADMIN_AVATAR_IMAGE2_DESC_FILE',	W_ADMIN_AVATAR. '画像2ファイル');
define('W_ADMIN_AVATAR_IMAGE2_DESC_STATUS',	W_ADMIN_AVATAR. '画像2ステータス');

/* =============================================
// デコメール語句
 ============================================= */
define('W_ADMIN_DECOMAIL_ID', W_ADMIN_DECOMAIL.'ID');
define('W_ADMIN_DECOMAIL_NAME', W_ADMIN_DECOMAIL.'名');
define('W_ADMIN_DECOMAIL_DESC', W_ADMIN_DECOMAIL.'説明');
define('W_ADMIN_DECOMAIL_IMAGE', W_ADMIN_DECOMAIL.'画像');
define('W_ADMIN_DECOMAIL_POINT', W_ADMIN_DECOMAIL.'消費ポイント');
define('W_ADMIN_DECOMAIL_CATEGORY', W_ADMIN_DECOMAIL.'カテゴリ');
define('W_ADMIN_DECOMAIL_CATEGORY_ID', W_ADMIN_DECOMAIL_CATEGORY.'ID');
define('W_ADMIN_DECOMAIL_STOCK_NUM', W_ADMIN_DECOMAIL.'配信終了数');
define('W_ADMIN_DECOMAIL_STOCK_STATUS', W_ADMIN_DECOMAIL_STOCK_NUM.'設定');
define('W_ADMIN_DECOMAIL_START_TIME', W_ADMIN_DECOMAIL.'配信終了日時');
define('W_ADMIN_DECOMAIL_START_STATUS', W_ADMIN_DECOMAIL_START_TIME.'設定');
define('W_ADMIN_DECOMAIL_END_TIME', W_ADMIN_DECOMAIL.'配信終了日時');
define('W_ADMIN_DECOMAIL_END_STATUS', W_ADMIN_DECOMAIL_END_TIME.'設定');
define('W_ADMIN_DECOMAIL_IMAGE_NAME', W_ADMIN_DECOMAIL.'画像');
define('W_ADMIN_DECOMAIL_IMAGE_FILE', W_ADMIN_DECOMAIL.'画像ファイル');
define('W_ADMIN_DECOMAIL_IMAGE_STATUS', W_ADMIN_DECOMAIL.'画像ステータス');
define('W_ADMIN_DECOMAIL_CATEGORY_NAME', W_ADMIN_DECOMAIL_CATEGORY.'名');
define('W_ADMIN_DECOMAIL_CATEGORY_DESC', W_ADMIN_DECOMAIL_CATEGORY.'説明');
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY', W_ADMIN_DECOMAIL_CATEGORY.'優先度');
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_NAME', W_ADMIN_DECOMAIL_CATEGORY_PRIORITY);
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_ID', W_ADMIN_DECOMAIL_CATEGORY.'優先度ID');

/* =============================================
// ゲーム語句
 ============================================= */
define('W_ADMIN_GAME_ID', W_ADMIN_GAME.'ID');
define('W_ADMIN_GAME_CODE', W_ADMIN_GAME.'コード');
define('W_ADMIN_GAME_NAME', W_ADMIN_GAME.'名');
define('W_ADMIN_GAME_DESC', W_ADMIN_GAME.'説明');
define('W_ADMIN_GAME_EXPLAIN', W_ADMIN_GAME.'操作説明');
define('W_ADMIN_GAME_URL', W_ADMIN_GAME.'URL');
define('W_ADMIN_GAME_IMAGE', W_ADMIN_GAME.'画像');
define('W_ADMIN_GAME_POINT', W_ADMIN_GAME.'消費ポイント');
define('W_ADMIN_GAME_CATEGORY', W_ADMIN_GAME.'カテゴリ');
define('W_ADMIN_GAME_CATEGORY_ID', W_ADMIN_GAME_CATEGORY.'ID');
define('W_ADMIN_GAME_STOCK_NUM', W_ADMIN_GAME.'配信終了数');
define('W_ADMIN_GAME_STOCK_STATUS', W_ADMIN_GAME_STOCK_NUM.'設定');
define('W_ADMIN_GAME_START_TIME', W_ADMIN_GAME.'配信終了日時');
define('W_ADMIN_GAME_START_STATUS', W_ADMIN_GAME_START_TIME.'設定');
define('W_ADMIN_GAME_END_TIME', W_ADMIN_GAME.'配信終了日時');
define('W_ADMIN_GAME_END_STATUS', W_ADMIN_GAME_END_TIME.'設定');
define('W_ADMIN_GAME_IMAGE_NAME', W_ADMIN_GAME.'画像');
define('W_ADMIN_GAME_IMAGE_FILE', W_ADMIN_GAME.'画像ファイル');
define('W_ADMIN_GAME_IMAGE_STATUS', W_ADMIN_GAME.'画像ステータス');
define('W_ADMIN_GAME_CATEGORY_NAME', W_ADMIN_GAME_CATEGORY.'名');
define('W_ADMIN_GAME_CATEGORY_DESC', W_ADMIN_GAME_CATEGORY.'説明');
define('W_ADMIN_GAME_CATEGORY_PRIORITY', W_ADMIN_GAME_CATEGORY.'優先度');
define('W_ADMIN_GAME_CATEGORY_PRIORITY_ID', W_ADMIN_GAME_CATEGORY.'優先度ID');

/* =============================================
// フリーページ語句
 ============================================= */
define('W_ADMIN_CONTENTS_ID', W_ADMIN_CONTENTS.'ID');
define('W_ADMIN_CONTENTS_CODE', W_ADMIN_CONTENTS.'コード');
define('W_ADMIN_CONTENTS_TITLE', W_ADMIN_CONTENTS.'タイトル');
define('W_ADMIN_CONTENTS_BODY', W_ADMIN_CONTENTS.'本文');
define('W_ADMIN_CONTENTS_STATUS', W_ADMIN_CONTENTS.'ステータス');

/* =============================================
// サウンド語句
 ============================================= */
define('W_ADMIN_SOUND_ID', W_ADMIN_SOUND.'ID');
define('W_ADMIN_SOUND_NAME', W_ADMIN_SOUND.'名');
define('W_ADMIN_SOUND_DESC', W_ADMIN_SOUND.'説明');
define('W_ADMIN_SOUND_URL', W_ADMIN_SOUND.'URL');
define('W_ADMIN_SOUND_IMAGE', W_ADMIN_SOUND.'画像');
define('W_ADMIN_SOUND_POINT', W_ADMIN_SOUND.'消費ポイント');
define('W_ADMIN_SOUND_CATEGORY', W_ADMIN_SOUND.'カテゴリ');
define('W_ADMIN_SOUND_CATEGORY_ID', W_ADMIN_SOUND_CATEGORY.'ID');
define('W_ADMIN_SOUND_STOCK_NUM', W_ADMIN_SOUND.'配信終了数');
define('W_ADMIN_SOUND_STOCK_STATUS', W_ADMIN_SOUND_STOCK_NUM.'設定');
define('W_ADMIN_SOUND_START_TIME', W_ADMIN_SOUND.'配信終了日時');
define('W_ADMIN_SOUND_START_STATUS', W_ADMIN_SOUND_START_TIME.'設定');
define('W_ADMIN_SOUND_END_TIME', W_ADMIN_SOUND.'配信終了日時');
define('W_ADMIN_SOUND_END_STATUS', W_ADMIN_SOUND_END_TIME.'設定');
define('W_ADMIN_SOUND_IMAGE_NAME', W_ADMIN_SOUND.'画像');
define('W_ADMIN_SOUND_IMAGE_FILE', W_ADMIN_SOUND.'画像ファイル');
define('W_ADMIN_SOUND_IMAGE_STATUS', W_ADMIN_SOUND.'画像ステータス');
define('W_ADMIN_SOUND_CATEGORY_NAME', W_ADMIN_SOUND_CATEGORY.'名');
define('W_ADMIN_SOUND_CATEGORY_DESC', W_ADMIN_SOUND_CATEGORY.'説明');
define('W_ADMIN_SOUND_CATEGORY_PRIORITY', W_ADMIN_SOUND_CATEGORY.'優先度');
define('W_ADMIN_SOUND_CATEGORY_PRIORITY_ID', W_ADMIN_SOUND_CATEGORY.'優先度ID');

/* =============================================
// 広告語句
 ============================================= */
define('W_ADMIN_AD_ID', W_ADMIN_AD.'ID');
define('W_ADMIN_AD_NAME', W_ADMIN_AD.'名');
define('W_ADMIN_AD_STATUS', W_ADMIN_AD.'ステータス');
define('W_ADMIN_AD_CLIENT', W_ADMIN_AD.'クライアント名');
define('W_ADMIN_AD_TYPE', W_ADMIN_AD.'タイプ');
define('W_ADMIN_AD_DISPLAY_TYPE', W_ADMIN_AD.'表示タイプ');
define('W_ADMIN_AD_DESC', W_ADMIN_AD.'説明');
define('W_ADMIN_AD_BODY', W_ADMIN_AD.'本文');
define('W_ADMIN_AD_URL', W_ADMIN_AD.'リンク先URL');
define('W_ADMIN_AD_IMAGE', W_ADMIN_AD.'画像');
define('W_ADMIN_AD_POINT', W_ADMIN_AD.'取得ポイント');
define('W_ADMIN_AD_POINT_PERCENT', W_ADMIN_AD.'取得ポイント');
define('W_ADMIN_AD_POINT_TYPE', W_ADMIN_AD.'取得ポイントタイプ');
define('W_ADMIN_AD_PRICE', W_ADMIN_AD.'成果単価');
define('W_ADMIN_AD_CATEGORY', W_ADMIN_AD.'カテゴリ');
define('W_ADMIN_AD_CATEGORY_ID', W_ADMIN_AD_CATEGORY.'ID');
define('W_ADMIN_AD_STOCK_NUM', W_ADMIN_AD.'配信終了数');
define('W_ADMIN_AD_STOCK_STATUS', W_ADMIN_AD_STOCK_NUM.'設定');
define('W_ADMIN_AD_START_TIME', W_ADMIN_AD.'配信終了日時');
define('W_ADMIN_AD_START_STATUS', W_ADMIN_AD_START_TIME.'設定');
define('W_ADMIN_AD_END_TIME', W_ADMIN_AD.'配信終了日時');
define('W_ADMIN_AD_END_STATUS', W_ADMIN_AD_END_TIME.'設定');
define('W_ADMIN_AD_IMAGE_NAME', W_ADMIN_AD.'画像');
define('W_ADMIN_AD_IMAGE_FILE', W_ADMIN_AD.'画像ファイル');
define('W_ADMIN_AD_IMAGE_STATUS', W_ADMIN_AD.'画像ステータス');
define('W_ADMIN_AD_CATEGORY_NAME', W_ADMIN_AD_CATEGORY.'名');
define('W_ADMIN_AD_CATEGORY_DESC', W_ADMIN_AD_CATEGORY.'説明');
define('W_ADMIN_AD_CATEGORY_PRIORITY', W_ADMIN_AD_CATEGORY.'優先度');
define('W_ADMIN_AD_CATEGORY_PRIORITY_ID', W_ADMIN_AD_CATEGORY.'優先度ID');
define('W_ADMIN_AD_URL_D', 'DOCOMO広告URL');
define('W_ADMIN_AD_URL_A', 'au広告URL');
define('W_ADMIN_AD_URL_S', 'SoftBank広告URL');
define('W_ADMIN_AD_CODE_ID', W_ADMIN_AD.'コード');
define('W_ADMIN_AD_CODE', W_ADMIN_AD.'コード');
define('W_ADMIN_AD_MEMO', 'メモ');
define('W_ADMIN_AD_MAIL_BODY', 'メール本文');

/* =============================================
// バナー語句
 ============================================= */
define('W_ADMIN_BANNER_ID', W_ADMIN_BANNER.'ID');
define('W_ADMIN_BANNER_NAME', W_ADMIN_BANNER.'名');
define('W_ADMIN_BANNER_CLIENT', W_ADMIN_BANNER.'クライアント名');
define('W_ADMIN_BANNER_TYPE', W_ADMIN_BANNER.'タイプ');
define('W_ADMIN_BANNER_DESC', W_ADMIN_BANNER.'説明');
define('W_ADMIN_BANNER_BODY', W_ADMIN_BANNER.'本文');
define('W_ADMIN_BANNER_URL', W_ADMIN_BANNER.'リンク先URL');
define('W_ADMIN_BANNER_IMAGE', W_ADMIN_BANNER.'画像');
define('W_ADMIN_BANNER_POINT', W_ADMIN_BANNER.'消費ポイント');
define('W_ADMIN_BANNER_CATEGORY', W_ADMIN_BANNER.'カテゴリ');
define('W_ADMIN_BANNER_CATEGORY_ID', W_ADMIN_BANNER_CATEGORY.'ID');
define('W_ADMIN_BANNER_STOCK_NUM', W_ADMIN_BANNER.'配信終了数');
define('W_ADMIN_BANNER_STOCK_STATUS', W_ADMIN_BANNER_STOCK_NUM.'設定');
define('W_ADMIN_BANNER_END_TIME', W_ADMIN_BANNER.'配信終了日時');
define('W_ADMIN_BANNER_END_STATUS', W_ADMIN_BANNER_END_TIME.'設定');
define('W_ADMIN_BANNER_IMAGE_NAME', W_ADMIN_BANNER.'画像');
define('W_ADMIN_BANNER_IMAGE_FILE', W_ADMIN_BANNER.'画像ファイル');
define('W_ADMIN_BANNER_IMAGE_STATUS', W_ADMIN_BANNER.'画像ステータス');
define('W_ADMIN_BANNER_CATEGORY_NAME', W_ADMIN_BANNER_CATEGORY.'名');
define('W_ADMIN_BANNER_CATEGORY_DESC', W_ADMIN_BANNER_CATEGORY.'説明');
define('W_ADMIN_BANNER_CATEGORY_PRIORITY', W_ADMIN_BANNER_CATEGORY.'優先度');
define('W_ADMIN_BANNER_CATEGORY_PRIORITY_ID', W_ADMIN_BANNER_CATEGORY.'優先度ID');

/* =============================================
// メッセージ語句
 ============================================= */
define('W_ADMIN_MESSAGE', 'ミニメール');
define('W_ADMIN_MESSAGE_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_REPLY_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_TITLE', 'タイトル');
define('W_ADMIN_MESSAGE_BODY', '本文');
define('W_ADMIN_MESSAGE_RECEIVE_BOX', '受信BOX');
define('W_ADMIN_MESSAGE_SENT_BOX', '送信BOX');
define('W_ADMIN_MESSAGE_STATUS', W_ADMIN_MESSAGE.'ステータス');
define('W_ADMIN_MESSAGE_CHECKED', W_ADMIN_MESSAGE.'監視');

/* =============================================
// ニュース語句
 ============================================= */
define('W_ADMIN_NEWS', 'ニュース');
define('W_ADMIN_NEWS_TYPE', '投稿先');
define('W_ADMIN_NEWS_TITLE', 'タイトル');
define('W_ADMIN_NEWS_BODY', '本文');
define('W_ADMIN_NEWS_TIME', '更新日時');

/* =============================================
// 送受信語句
 ============================================= */
define('W_ADMIN_FROM_ADMIN_NICKNAME', 'FROM');
define('W_ADMIN_TO_ADMIN_NICKNAME', '宛先');

/* =============================================
// 友達語句
 ============================================= */
define('W_ADMIN_FRIEND_NAME', '友達');
define('W_ADMIN_FRIEND', W_ADMIN_FRIEND_NAME.'リンク');
define('W_ADMIN_FRIEND_LIST', W_ADMIN_FRIEND_NAME.'リスト');
define('W_ADMIN_FRIEND_ID', W_ADMIN_FRIEND.'ID');
define('W_ADMIN_FRIEND_MESSAGE', 'メッセージ(任意)');
define('W_ADMIN_FRIEND_INTRODUCTION', '紹介文');


/* =============================================
// 画像語句
 ============================================= */
define('W_ADMIN_IMAGE', '画像');
define('W_ADMIN_IMAGE_STATUS', W_ADMIN_IMAGE.'ステータス');
define('W_ADMIN_IMAGE_CHECKED', W_ADMIN_IMAGE.'監視');

/* =============================================
// 動画語句
 ============================================= */
define('W_ADMIN_MOVIE', '動画');
define('W_ADMIN_MOVIE_STATUS', W_ADMIN_MOVIE.'ステータス');
define('W_ADMIN_MOVIE_CHECKED', W_ADMIN_MOVIE.'監視');

/* =============================================
// 通知メール語句
 ============================================= */
define('W_ADMIN_MESSAGE_1',W_ADMIN_BBS.'書き込み通知メール');
define('W_ADMIN_MESSAGE_2',W_ADMIN_MESSAGE.'通知メール');
define('W_ADMIN_MESSAGE_3',W_ADMIN_BLOG_COMMENT.'通知メール');
define('W_ADMIN_MESSAGE_4',W_ADMIN_COMMUNITY_COMMENT.'通知メール');


/**
 * 上書き設定
 */
switch(TEMPLATE)
{
	// スペースアウト
	case 'napa':
define('W_USER_POINT', 'ﾅﾊﾟﾎﾟ');
define('W_ADMIN_POINT', 'ナパポ');
		break;
	// デフォルト
	default:
define('W_USER_POINT', 'ﾎﾟｲﾝﾄ');
define('W_ADMIN_POINT', 'ポイント');
		break;
}


/* =============================================
// tiwitter語句
 ============================================= */
define('W_ADMIN_TWITTER', 'ナパボード');
define('W_ADMIN_TWITTER_ID', W_ADMIN_TWITTER.'ID');
define('W_ADMIN_TWITTER_BODY', W_ADMIN_TWITTER.'本文');
define('W_ADMIN_TWITTER_STATUS', W_ADMIN_TWITTER.'ステータス');
define('W_ADMIN_TWITTER_CHECKED', W_ADMIN_TWITTER.'監視');

define('W_ADMIN_THEMA', 'お題');
define('W_ADMIN_THEMA_ID', W_ADMIN_THEMA.'ID');
define('W_ADMIN_THEMA_NAME', W_ADMIN_THEMA.'名');
define('W_ADMIN_THEMA_TITLE', W_ADMIN_THEMA);
define('W_ADMIN_THEMA_DESC', W_ADMIN_THEMA.'説明');
define('W_ADMIN_THEMA_MEMO', W_ADMIN_THEMA.'備考');
define('W_ADMIN_THEMA_POINT', W_ADMIN_THEMA.W_ADMIN_POINT);
define('W_ADMIN_THEMA_START_TIME', W_ADMIN_THEMA.'配信終了日時');
define('W_ADMIN_THEMA_START_STATUS', W_ADMIN_THEMA_START_TIME.'設定');
define('W_ADMIN_THEMA_END_TIME', W_ADMIN_THEMA.'配信終了日時');
define('W_ADMIN_THEMA_END_STATUS', W_ADMIN_THEMA_END_TIME.'設定');
define('W_ADMIN_THEMA_STOCK_NUM', W_ADMIN_THEMA.'配信終了数');
define('W_ADMIN_THEMA_STOCK_STATUS', W_ADMIN_THEMA_STOCK_NUM.'設定');
define('W_ADMIN_THEMA_TERM', W_ADMIN_THEMA.'切替時間');
define('W_ADMIN_THEMA_TERM_STATUS', W_ADMIN_THEMA_TERM.'設定');

/* =============================================
// ゲームポイント語句
 ============================================= */
define('W_ADMIN_GAMEPOINT', 'ゲームポイント');
define('W_ADMIN_GAMEPOINT_ID', W_ADMIN_GAMEPOINT.'ID');
define('W_ADMIN_ID', 'ID');
define('W_ADMIN_ORDER', '順位');

?>
