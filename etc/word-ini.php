<?php
/**
 * 語句の上書き設定
 */
switch(TEMPLATE)
{
	// スペースアウト
	case 'napa':
		define('W_USER_POINT', 'ﾅﾊﾟﾎﾟ');
		define('W_USER_POINT_UNIT', 'pt');
		define('W_ADMIN_POINT', 'ナパポ');
		break;
	// デフォルト
	default:
		
		define('W_USER_POINT', 'ﾎﾟｲﾝﾄ');
		define('W_USER_POINT_UNIT', 'pt');
		define('W_ADMIN_POINT', 'ポイント');
		
		/*
		define('W_USER_POINT', 'ｴｺﾄﾞﾙ');
		define('W_USER_POINT_UNIT', 'eco$');
		define('W_ADMIN_POINT', 'エコドル');
		*/
		break;
}

/**
 * ユーザー側基本語句の定義
 */
/* =============================================
// 共通
 ============================================= */
define('W_USER_MENU_ICON', '◆');
define('W_USER_USER', 'ﾕｰｻﾞ');
define('W_USER_USER_ID', W_USER_USER.'ID');
define('W_USER_USER_REGIST', '会員登録');
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
define('W_USER_IDENTIFY', '認証');
define('W_USER_DUPLICATE_POST', '二重投稿');
define('W_USER_REPORT', '通報');
define('W_USER_REPORT_FAIL_USER_ID', '通報対象者');
define('W_USER_REPORT_MESSAGE',W_USER_REPORT. '内容');
define('W_USER_SEGMENT', 'ｾｸﾞﾒﾝﾄ');
define('W_USER_IMAGE', '画像');
define('W_USER_MOVIE', '動画');
define('W_USER_CONTENTS', 'ﾌﾘｰﾍﾟｰｼﾞ');
define('W_USER_SUBMIT', '　は　い　');
define('W_USER_BACK', '　いいえ　');
define('W_USER_CONFIRM', '　確認画面へ　');
define('W_USER_EDIT_CONFIRM', '　編集確認画面へ　');
define('W_USER_DELETE_CONFIRM', '　削除確認画面へ　');
define('W_USER_DELETE', '　は　い　');
define('W_USER_UPDATE', '　は　い　');
define('W_USER_DELETE_IMAGE', '画像を削除する');
define('W_USER_DELETE_MOVIE', '動画を削除する');
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
// ユーザー
 ============================================= */
define('W_USER_USER_HASH', W_USER_USER.'識別子');
define('W_USER_USER_NICKNAME','ﾆｯｸﾈｰﾑ');
define('W_USER_USER_PASSWORD', 'ﾊﾟｽﾜｰﾄﾞ');
define('W_USER_USER_SEX', '性別');
define('W_USER_USER_BIRTHDAY', '生年月日');
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
define('W_USER_USER_ZIPCODE', '郵便番号');
define('W_USER_USER_NAME', 'お名前');
define('W_USER_USER_NAME_KANA', 'フリガナ');
define('W_USER_USER_REGION_ID', '都道府県');
define('W_USER_USER_PHONE', '電話番号');
define('W_USER_USER_MAILADDRESS', 'メールアドレス');
define('W_USER_USER_MAGAZINE_ALLOW_FLAG', 'メルマガ');
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
define('W_USER_USER_MAIL_OK', 'メルマガ配信');
define('W_USER_IMAGE_ADD', '[x:0066]画像を添付する');
define('W_USER_IMAGE_EDIT', '[x:0066]画像を変更する');
define('W_USER_MOVIE_ADD', '[x:0780]動画を添付する');
define('W_USER_MOVIE_EDIT', '[x:0780]動画を変更する');

/* =============================================
// 招待
 ============================================= */
define('W_USER_INVITE', '招待');
define('W_USER_INVITE_NAME','友達招待');
define('W_USER_INVITE_TO_USER_MAILADDRESS', '相手のﾒｰﾙｱﾄﾞﾚｽ');
define('W_USER_INVITE_MESSAGE', 'ﾒｯｾｰｼﾞ(任意)');

/* =============================================
// 日記
 ============================================= */
define('W_USER_BLOG_ARTICLE', '日記');
define('W_USER_BLOG_ARTICLE_ID', W_USER_BLOG_ARTICLE.'ID');
define('W_USER_BLOG_ARTICLE_TITLE', W_USER_BLOG_ARTICLE.'ﾀｲﾄﾙ');
define('W_USER_BLOG_ARTICLE_BODY', W_USER_BLOG_ARTICLE.'本文');
define('W_USER_BLOG_ARTICLE_STATUS', W_USER_BLOG_ARTICLE.'ステータス');
define('W_USER_BLOG_ARTICLE_CHECKED', W_USER_BLOG_ARTICLE.'監視');
define('W_USER_BLOG_ARTICLE_PUBLIC', W_USER_BLOG_ARTICLE.'公開設定');

/* =============================================
// 日記コメント
 ============================================= */
define('W_USER_BLOG_COMMENT', 'ｺﾒﾝﾄ');
define('W_USER_BLOG_COMMENT_ID', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'ID');
define('W_USER_BLOG_COMMENT_BODY', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'本文');
define('W_USER_BLOG_COMMENT_STATUS', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'ステータス');
define('W_USER_BLOG_COMMENT_CHECKED', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'監視');

/* =============================================
// コミュニティ
 ============================================= */
define('W_USER_COMMUNITY', 'ｺﾐｭﾆﾃｨ');
define('W_USER_COMMUNITY_LIST', '参加'.W_USER_COMMUNITY);
define('W_USER_COMMUNITY_TITLE', W_USER_COMMUNITY.'名');
define('W_USER_COMMUNITY_CATEGORY', W_USER_COMMUNITY.'ｶﾃｺﾞﾘ');
define('W_USER_COMMUNITY_CATEGORY_ID', W_USER_COMMUNITY.'ｶﾃｺﾞﾘ');
define('W_USER_COMMUNITY_DESCRIPTION', W_USER_COMMUNITY.'の説明');
define('W_USER_COMMUNITY_ID', W_USER_COMMUNITY.'ID');

/* =============================================
// コミュニティトピック
 ============================================= */
define('W_USER_COMMUNITY_ARTICLE', 'ﾄﾋﾟｯｸ');
define('W_USER_COMMUNITY_ARTICLE_ID', W_USER_COMMUNITY_ARTICLE.'ID');
define('W_USER_COMMUNITY_ARTICLE_TITLE', W_USER_COMMUNITY_ARTICLE.'ﾀｲﾄﾙ');
define('W_USER_COMMUNITY_ARTICLE_BODY', W_USER_COMMUNITY_ARTICLE.'本文');
define('W_USER_COMMUNITY_ARTICLE_STATUS', W_USER_COMMUNITY_ARTICLE.'ステータス');
define('W_USER_COMMUNITY_ARTICLE_CHECKED', W_USER_COMMUNITY_ARTICLE.'監視');
define('W_USER_COMMUNITY_ADMIN', '管理者');
define('W_USER_COMMUNITY_ADMINISTRATION', '管理権');
define('W_USER_COMMUNITY_JOIN_CONDITION', '参加条件と公開ﾚﾍﾞﾙ');
define('W_USER_COMMUNITY_TOPIC_PERMISSION', 'ﾄﾋﾟｯｸ作成の権限');

/* =============================================
// コミュニティコメント
 ============================================= */
define('W_USER_COMMUNITY_COMMENT', 'ｺﾒﾝﾄ');
define('W_USER_COMMUNITY_COMMENT_NAME', 'ｺﾒﾝﾄ');
define('W_USER_COMMUNITY_COMMENT_ID', W_USER_COMMUNITY_COMMENT.'ID');
define('W_USER_COMMUNITY_COMMENT_BODY', '本文');
define('W_USER_COMMUNITY_COMMENT_STATUS', W_USER_COMMUNITY_COMMENT.'ステータス');
define('W_USER_COMMUNITY_COMMENT_CHECKED', W_USER_COMMUNITY_COMMENT.'監視');

/* =============================================
// 伝言板
 ============================================= */
define('W_USER_BBS', '伝言板');
define('W_USER_BBS_NAME', '伝言');
define('W_USER_BBS_MESSAGE', W_USER_BBS_NAME.'ﾒｯｾｰｼﾞ');
define('W_USER_BBS_ID', W_USER_BBS_NAME.'ID');
define('W_USER_BBS_BODY', W_USER_BBS_NAME.'ﾒｯｾｰｼﾞ');
define('W_USER_BBS_STATUS', W_USER_BBS_NAME.'ステータス');
define('W_USER_BBS_CHECKED', W_USER_BBS_NAME.'監視');

/* =============================================
// ブラックリスト
 ============================================= */
define('W_USER_BLACKLIST', 'ﾌﾞﾗｯｸﾘｽﾄ');
define('W_USER_BLACKLIST_ID', W_USER_BLACKLIST.'ID');
define('W_USER_BLACKLIST_USER_ID', W_USER_BLACKLIST.'登録処理を行ったユーザID');
define('W_USER_BLACKLIST_DENY_USER_ID', W_USER_BLACKLIST.'に登録されたユーザID');
define('W_USER_BLACKLIST_STATUS', W_USER_BLACKLIST.'ステータス');
define('W_USER_BLACKLIST_CHECKED', W_USER_BLACKLIST.'監視');

/* =============================================
// コメント
 ============================================= */
define('W_USER_COMMENT', 'コメント');
define('W_USER_COMMENT_NAME', 'コメント');
define('W_USER_COMMENT_TYPE', W_USER_COMMENT.'種別');
define('W_USER_COMMENT_SUBID', W_USER_COMMENT.'サブID');
define('W_USER_COMMENT_ID', W_USER_COMMENT.'ID');
define('W_USER_COMMENT_BODY', '本文');
define('W_USER_COMMENT_STATUS', W_USER_COMMENT.'ステータス');
define('W_USER_COMMENT_CHECKED', W_USER_COMMENT.'監視');

/* =============================================
// デコメール
 ============================================= */
define('W_USER_DECOMAIL_ID', W_USER_DECOMAIL.'ID');

/* =============================================
// ミニメール
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
define('W_USER_FROM_USER_NICKNAME', 'FROM');
define('W_USER_TO_USER_NICKNAME', '宛先');

/* =============================================
// 友達
 ============================================= */
define('W_USER_FRIEND_NAME', '友達');
define('W_USER_FRIEND', W_USER_FRIEND_NAME.'ﾘﾝｸ');
define('W_USER_FRIEND_LIST', W_USER_FRIEND_NAME.'ﾘｽﾄ');
define('W_USER_FRIEND_ID', W_USER_FRIEND.'ID');
define('W_USER_FRIEND_MESSAGE', 'ﾒｯｾｰｼﾞ(任意)');
define('W_USER_FRIEND_INTRODUCTION', '紹介文');	
define('W_USER_FRIEND_INTRODUCTION_CHECKED', W_USER_FRIEND_INTRODUCTION.'監視');
define('W_USER_FRIEND_INTRODUCTION_STATUS', 'ステータス');

/* =============================================
// 画像
 ============================================= */
define('W_USER_IMAGE_STATUS', W_USER_IMAGE.'ステータス');
define('W_USER_IMAGE_CHECKED', W_USER_IMAGE.'監視');

/* =============================================
// 動画
 ============================================= */
define('W_USER_MOVIE', '動画');
define('W_USER_MOVIE_STATUS', W_USER_MOVIE.'ステータス');
define('W_USER_MOVIE_CHECKED', W_USER_MOVIE.'監視');

/* =============================================
// 設定
 ============================================= */
define('W_USER_MESSAGE_1',W_USER_BBS.'書き込み通知ﾒｰﾙ');
define('W_USER_MESSAGE_2',W_USER_MESSAGE.'通知ﾒｰﾙ');
define('W_USER_MESSAGE_3',W_USER_BLOG_COMMENT.'通知ﾒｰﾙ');
define('W_USER_MESSAGE_4',W_USER_COMMUNITY_COMMENT.'通知ﾒｰﾙ');

/* =============================================
// アバター
 ============================================= */
define('W_USER_AVATAR_ID', W_USER_AVATAR.'ID');
define('W_USER_AVATAR_CATEGORY', W_USER_AVATAR.'ｶﾃｺﾞﾘ');
define('W_USER_AVATAR_STAND', W_USER_AVATAR.'台座');

/* =============================================
// ショップ
 ============================================= */
define('W_USER_SHOP', 'ｼｮｯﾌﾟ');
define('W_USER_SHOP_NAME', '店舗名');
define('W_USER_SHOP_ID', 'ID');
define('W_USER_SHOP_KEYWORD', 'ｷｰﾜｰﾄﾞ');
define('W_USER_SORT_ORDER', '並び順');
define('W_USER_STOCK_ID', 'ﾀｲﾌﾟ');

/* =============================================
// 商品
 ============================================= */
define('W_USER_ITEM', '商品');
define('W_USER_ITEM_ID', 'ID');
define('W_USER_ITEM_KEYWORD', 'ｷｰﾜｰﾄﾞ');
define('W_USER_ITEM_NUM', '個数');
define('W_USER_ITEM_CATEGORY', 'ｶﾃｺﾞﾘ');
define('W_USER_PRICE_START', '予算最小');
define('W_USER_PRICE_END', '予算最大');
define('W_USER_ITEM_ORDER_TYPE', '支払方法');

/* =============================================
// 買い物かご
 ============================================= */
define('W_USER_CART', '買い物かご');
define('W_USER_CART_ID', 'ID');
define('W_USER_CART_ITEM_NUM', '個数');

/* =============================================
// 注文
 ============================================= */
define('W_USER_ORDER', 'ｵｰﾀﾞｰ');
define('W_USER_ORDER_ID', 'ID');
define('W_USER_ORDER_CREDIT', 'ｸﾚｼﾞｯﾄｶｰﾄﾞ');
define('W_USER_ORDER_CONVENI', 'ｺﾝﾋﾞﾆ');
define('W_USER_ORDER_TRANSFER', '代引き');
define('W_USER_ORDER_EXCHANGE', '銀行振込');
define('W_USER_ORDER_CARD_TYPE', 'ｶｰﾄﾞ種類');
define('W_USER_ORDER_CONVENI_TYPE', '店舗選択');
define('W_USER_ORDER_CARD_NUMBER', 'ｶｰﾄﾞ番号');
define('W_USER_ORDER_CARD_NAME', '名義人');
define('W_USER_ORDER_CARD_TERM', '有効期限');
define('W_USER_ORDER_CARD_MONTH', W_USER_ORDER_CARD_TERM . '(月)');
define('W_USER_ORDER_CARD_YEAR', W_USER_ORDER_CARD_TERM . '(年)');
define('W_USER_ORDER_CARD_REVO_STATUS', '支払い回数');
define('W_USER_ORDER_DELIVERY_TYPE', 'お届け先住所');
define('W_USER_ORDER_DELIVERY_DAY', '配達時間指定');
define('W_USER_ORDER_DELIVERY_NOTE', '備考');
define('W_USER_ORDER_GET_POINT', '獲得');
define('W_USER_ORDER_DELIVERY_NAME', 'お名前');
define('W_USER_ORDER_DELIVERY_NAME_KANA', 'ﾌﾘｶﾞﾅ');
define('W_USER_ORDER_DELIVERY_ZIPCODE', '郵便番号');
define('W_USER_ORDER_DELIVERY_REGION_ID', '都道府県');
define('W_USER_ORDER_DELIVERY_ADDRESS', '住所');
define('W_USER_ORDER_DELIVERY_ADDRESS_BUILDING', '建物名');
define('W_USER_ORDER_DELIVERY_PHONE', '電話番号');
define('W_USER_ORDER_USE_POINT_STATUS', W_USER_POINT . 'を利用する');
define('W_USER_ORDER_USE_POINT', '利用する' . W_USER_POINT);

/* =============================================
// ユーザ
 ============================================= */
define('W_USER_NAME', 'お名前');
define('W_USER_NAME_KANA', 'ﾌﾘｶﾞﾅ');
define('W_USER_ZIPCODE', '郵便番号');
define('W_USER_REGION_ID', '都道府県');
define('W_USER_ADDRESS', '住所');
define('W_USER_ADDRESS_BUILDING', '建物名');
define('W_USER_PHONE', '電話番号');
define('W_USER_BIRTHDAY', '誕生日');
define('W_USER_SEX', '性別');
define('W_USER_MAGAZINE_ALLOW_FLAG', 'ﾒﾙﾏｶﾞ');



/**
 * 管理側基本語句の定義
 */
/* =============================================
// 共通
 ============================================= */
define('W_ADMIN_MENU_ICON', '◆');
define('W_ADMIN_ACCOUNT', '管理者アカウント');
define('W_ADMIN_USER', 'ユーザー');
define('W_ADMIN_USER_ID',  W_ADMIN_USER.'ID');
define('W_ADMIN_USER_SUB_ID',  W_ADMIN_USER.'サブID');
define('W_ADMIN_USER_HASH',  W_ADMIN_USER.'識別ＩＤ');
define('W_ADMIN_USER_PASSWORD', 'パスワード');
define('W_ADMIN_USER_SEX', '性別');
define('W_ADMIN_USER_BIRTHDAY', '生年月日');
define('W_ADMIN_USER_BIRTH_DATE_YEAR', W_ADMIN_USER_BIRTHDAY.'(年)');
define('W_ADMIN_USER_BIRTH_DATE_MONTH', W_ADMIN_USER_BIRTHDAY.'(月)');
define('W_ADMIN_USER_BIRTH_DATE_DAY', W_ADMIN_USER_BIRTHDAY.'(日)');
define('W_ADMIN_USER_PREFECTURE_ID', '住所(都道府県)');
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
define('W_ADMIN_USER_GUEST_STATUS', 'ゲストユーザ');
define('W_ADMIN_USER_STATUS', 'ユーザステータス');
define('W_ADMIN_USER_MAIL_OK', 'メルマガ配信');
define('W_ADMIN_USER_MAGAZINE_ERROR_NUM',  'エラーメール数');
define('W_ADMIN_USER_MAILADDRESS',  'メールアドレス');
define('W_ADMIN_USER_NICKNAME',  'ニックネーム');
define('W_ADMIN_USER_NAME',  '氏名');
define('W_ADMIN_USER_NAME_KANA',  'フリガナ');
define('W_ADMIN_USER_ZIPCODE',  'お届け先郵便番号');
define('W_ADMIN_USER_REGION_ID',  'お届け先区域');
define('W_ADMIN_USER_ADDRESS',  'お届け先住所');
define('W_ADMIN_USER_ADDRESS_BUILDING',  'お届け先住所(建物名)');
define('W_ADMIN_USER_PHONE',  'お届け先電話番号');
define('W_ADMIN_USER_POINT', W_ADMIN_USER.W_ADMIN_POINT);
define('W_ADMIN_USER_CARRIER','キャリア');
define('W_ADMIN_USER_DEVICE','機種名');
define('W_ADMIN_SEARCH', '　検　索　');
define('W_ADMIN_ADD', '　登　録　');
define('W_ADMIN_EDIT', '　この内容で更新する　');
define('W_ADMIN_CONFIRM', '　確認画面へ　');
define('W_ADMIN_DOWNLOAD', 'ダウンロード');
define('W_ADMIN_SORT_KEY', '並び順');
define('W_ADMIN_SORT_ORDER', '順序');
define('W_ADMIN_MESSAGE', 'ミニメール');
define('W_ADMIN_LOGIN', 'ログイン');
define('W_ADMIN_LOGOUT', 'ログアウト');
define('W_ADMIN_PASSWORD', 'パスワード');
define('W_ADMIN_GAME', 'ゲーム');
define('W_ADMIN_GAME_CATEGORY', W_ADMIN_GAME.'カテゴリ');
define('W_ADMIN_SOUND', 'サウンド');
define('W_ADMIN_SOUND_CATEGORY', W_ADMIN_SOUND.'カテゴリ');
define('W_ADMIN_VIDEO', 'ビデオ');
define('W_ADMIN_VIDEO_CATEGORY', W_ADMIN_VIDEO.'カテゴリ');
define('W_ADMIN_AVATAR', 'アバター');
define('W_ADMIN_DECOMAIL', 'デコメール');
define('W_ADMIN_DECOMAIL_CATEGORY', W_ADMIN_DECOMAIL.'カテゴリ');
define('W_ADMIN_MAILADDRESS', 'メールアドレス');
define('W_ADMIN_PROFILE', 'プロフィール');
define('W_ADMIN_AD', '広告');
define('W_ADMIN_ADMENU', W_ADMIN_AD.'メニュー');
define('W_ADMIN_IMAGE', '画像');
define('W_ADMIN_AD_CATEGORY', W_ADMIN_AD.'カテゴリ');
define('W_ADMIN_AD_CODE', W_ADMIN_AD.'コード');
define('W_ADMIN_BANNER', 'バナー');
define('W_ADMIN_COMMUNITY', 'コミュニティ');
define('W_ADMIN_COMMUNITY_ARTICLE', W_ADMIN_COMMUNITY.'トピック');
define('W_ADMIN_COMMUNITY_ARTICLE_NAME', 'トピック');
define('W_ADMIN_COMMUNITY_CATEGORY', W_ADMIN_COMMUNITY.'カテゴリ');
define('W_ADMIN_MAGAZINE', 'メルマガ');
define('W_ADMIN_MEDIA', '入会経路');
define('W_ADMIN_CHECKED', '監視');
define('W_ADMIN_CONFIG', '基本情報');
define('W_ADMIN_PRIORITY', '優先度');
define('W_ADMIN_REPORT', '通報');
define('W_ADMIN_SEGMENT', 'セグメント');
define('W_ADMIN_CONTENTS', 'フリーページ');
define('W_ADMIN_CMS', 'コンテンツ');
define('W_ADMIN_STATS', 'アクセス解析');
define('W_ADMIN_HTMLTEMPLATE', 'HTMLテンプレート');
define('W_ADMIN_MAILTEMPLATE', 'メールテンプレート');
define('W_ADMIN_FAQ', '管理操作マニュアル');
define('W_ADMIN_EMOJI', '絵文字パレット');
define('W_ADMIN_NGWORD', 'NGワード');
define('W_ADMIN_EC', 'EC');
define('W_ADMIN_IMAGE_ADD', '[x:0066]画像を添付する');
define('W_ADMIN_IMAGE_EDIT', '[x:0066]画像を変更する');

/* =============================================
// 入会経路
 ============================================= */
define('W_ADMIN_MEDIA_ID', 'ID');
define('W_ADMIN_MEDIA_CODE', '識別コード');
define('W_ADMIN_MEDIA_NAME', W_ADMIN_MEDIA.'名');
define('W_ADMIN_MEDIA_PARAM', 'パラメータ');
define('W_ADMIN_MEDIA_PARAM1', W_ADMIN_MEDIA_PARAM.'１');
define('W_ADMIN_MEDIA_PARAM2', W_ADMIN_MEDIA_PARAM.'２');
define('W_ADMIN_MEDIA_PARAM3', W_ADMIN_MEDIA_PARAM.'３');
define('W_ADMIN_MEDIA_RES_URL', '入会時成果返却先URL');
define('W_ADMIN_MEDIA_POINT', '入会時付与ポイント');
define('W_ADMIN_MEDIA_STATUS', 'ステータス');
define('W_ADMIN_MEDIA_MAIL_TITLE', W_ADMIN_MEDIA.'通知メールアドレス');
define('W_ADMIN_MEDIA_MAIL_BODY', W_ADMIN_MEDIA.'通知メール本文');
define('W_ADMIN_MEDIA_ACCOUNT', '入会通知用メールアドレス');

/* =============================================
// 入会数増減レポート
 ============================================= */
define('W_ADMIN_ANALYTICS', '会員数増減レポート');
define('W_ADMIN_ANALYTICS_ID', 'ID');
define('W_ADMIN_ANALYTICS_DATE', '日付');
define('W_ADMIN_PRE_REGIST_NUM', '仮登録者数');
define('W_ADMIN_REGIST_NUM', '本登録者数');
define('W_ADMIN_FRIEND_NUM', '友達招待登録者数');
define('W_ADMIN_RESIGN_NUM', '退会者数');
define('W_ADMIN_NATURAL_NUM', '自然登録者数');

/* =============================================
// 日記
 ============================================= */
define('W_ADMIN_BLOG_ARTICLE', '日記');
define('W_ADMIN_BLOG_ARTICLE_ID', W_ADMIN_BLOG_ARTICLE.'ID');
define('W_ADMIN_BLOG_ARTICLE_TITLE', W_ADMIN_BLOG_ARTICLE.'タイトル');
define('W_ADMIN_BLOG_ARTICLE_BODY', W_ADMIN_BLOG_ARTICLE.'本文');
define('W_ADMIN_BLOG_ARTICLE_STATUS', W_ADMIN_BLOG_ARTICLE.'ステータス');
define('W_ADMIN_BLOG_ARTICLE_CHECKED', W_ADMIN_BLOG_ARTICLE.'監視');
define('W_ADMIN_BLOG_ARTICLE_PUBLIC', W_ADMIN_BLOG_ARTICLE.'公開設定');

/* =============================================
// 日記コメント
 ============================================= */
define('W_ADMIN_BLOG_COMMENT', 'コメント');
define('W_ADMIN_BLOG_COMMENT_ID', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'ID');
define('W_ADMIN_BLOG_COMMENT_BODY', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'本文');
define('W_ADMIN_BLOG_COMMENT_STATUS', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'ステータス');
define('W_ADMIN_BLOG_COMMENT_CHECKED', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'監視');

/* =============================================
// コメント
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
// コミュニティ
 ============================================= */
define('W_ADMIN_COMMUNITY_CATEGORY_ID', W_ADMIN_COMMUNITY.'カテゴリ');
define('W_ADMIN_COMMUNITY_DESCRIPTION', W_ADMIN_COMMUNITY.'の説明');
define('W_ADMIN_COMMUNITY_LIST', '参加'.W_ADMIN_COMMUNITY);
define('W_ADMIN_COMMUNITY_TITLE', W_ADMIN_COMMUNITY.'名');
define('W_ADMIN_COMMUNITY_ID', W_ADMIN_COMMUNITY.'ID');

/* =============================================
// コミュニティトピック
 ============================================= */
define('W_ADMIN_COMMUNITY_ARTICLE_ID', W_ADMIN_COMMUNITY_ARTICLE.'ID');
define('W_ADMIN_COMMUNITY_ARTICLE_TITLE', W_ADMIN_COMMUNITY_ARTICLE.'タイトル');
define('W_ADMIN_COMMUNITY_ARTICLE_BODY', W_ADMIN_COMMUNITY_ARTICLE.'本文');
define('W_ADMIN_COMMUNITY_ARTICLE_STATUS', W_ADMIN_COMMUNITY_ARTICLE.'ステータス');
define('W_ADMIN_COMMUNITY_ARTICLE_CHECKED', W_ADMIN_COMMUNITY_ARTICLE.'監視');

/* =============================================
// コミュニティ管理
 ============================================= */
define('W_ADMIN_COMMUNITY_ADMIN', '管理者');
define('W_ADMIN_COMMUNITY_ADMINISTRATION', '管理権');
define('W_ADMIN_COMMUNITY_JOIN_CONDITION', '参加条件と公開レベル');
define('W_ADMIN_COMMUNITY_TOPIC_PERMISSION', 'トピック作成の権限');

/* =============================================
// コミュニティコメント
 ============================================= */
define('W_ADMIN_COMMUNITY_COMMENT', 'コメント');
define('W_ADMIN_COMMUNITY_COMMENT_NAME', 'コメント');
define('W_ADMIN_COMMUNITY_COMMENT_ID', W_ADMIN_COMMUNITY_COMMENT.'ID');
define('W_ADMIN_COMMUNITY_COMMENT_BODY', '本文');
define('W_ADMIN_COMMUNITY_COMMENT_STATUS', W_ADMIN_COMMUNITY_COMMENT.'ステータス');
define('W_ADMIN_COMMUNITY_COMMENT_CHECKED', W_ADMIN_COMMUNITY_COMMENT.'監視');

/* =============================================
// 伝言板
 ============================================= */
define('W_ADMIN_BBS', '伝言板');
define('W_ADMIN_BBS_NAME', '伝言');
define('W_ADMIN_BBS_MESSAGE', W_ADMIN_BBS_NAME.'メッセージ');
define('W_ADMIN_BBS_ID', W_ADMIN_BBS_NAME.'ID');
define('W_ADMIN_BBS_BODY', W_ADMIN_BBS_NAME.'メッセージ');
define('W_ADMIN_BBS_STATUS', W_ADMIN_BBS_NAME.'ステータス');
define('W_ADMIN_BBS_CHECKED', W_ADMIN_BBS_NAME.'監視');

/* =============================================
// ブラックリスト
 ============================================= */
define('W_ADMIN_BLACKLIST', 'ブラックリスト');
define('W_ADMIN_BLACKLIST_ID', W_ADMIN_BLACKLIST.'ID');
define('W_ADMIN_BLACKLIST_ADMIN_ID', W_ADMIN_BLACKLIST.'登録処理を行ったユーザID');
define('W_ADMIN_BLACKLIST_DENY_ADMIN_ID', W_ADMIN_BLACKLIST.'に登録されたユーザID');
define('W_ADMIN_BLACKLIST_STATUS', W_ADMIN_BLACKLIST.'ステータス');
define('W_ADMIN_BLACKLIST_CHECKED', W_ADMIN_BLACKLIST.'監視');

/* =============================================
// デコメール
 ============================================= */
define('W_ADMIN_DECOMAIL_ID', W_ADMIN_DECOMAIL.'ID');
define('W_ADMIN_DECOMAIL_NAME', W_ADMIN_DECOMAIL.'名');
define('W_ADMIN_DECOMAIL_DESC', W_ADMIN_DECOMAIL.'説明');
define('W_ADMIN_DECOMAIL_IMAGE', W_ADMIN_DECOMAIL.'画像');
define('W_ADMIN_DECOMAIL_POINT', W_ADMIN_DECOMAIL.'消費ポイント');
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
// ゲーム
 ============================================= */
define('W_ADMIN_GAME_ID', W_ADMIN_GAME.'ID');
define('W_ADMIN_GAME_CODE', W_ADMIN_GAME.'コード');
define('W_ADMIN_GAME_NAME', W_ADMIN_GAME.'名');
define('W_ADMIN_GAME_DESC', W_ADMIN_GAME.'説明');
define('W_ADMIN_GAME_EXPLAIN', W_ADMIN_GAME.'操作説明');
define('W_ADMIN_GAME_URL', W_ADMIN_GAME.'URL');
define('W_ADMIN_GAME_IMAGE', W_ADMIN_GAME.'画像');
define('W_ADMIN_GAME_POINT', W_ADMIN_GAME.'消費ポイント');
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
// フリーページ
 ============================================= */
define('W_ADMIN_CONTENTS_ID', W_ADMIN_CONTENTS.'ID');
define('W_ADMIN_CONTENTS_CODE', W_ADMIN_CONTENTS.'コード');
define('W_ADMIN_CONTENTS_TITLE', W_ADMIN_CONTENTS.'タイトル');
define('W_ADMIN_CONTENTS_BODY', W_ADMIN_CONTENTS.'本文');
define('W_ADMIN_CONTENTS_STATUS', W_ADMIN_CONTENTS.'ステータス');

/* =============================================
// サウンド
 ============================================= */
define('W_ADMIN_SOUND_ID', W_ADMIN_SOUND.'ID');
define('W_ADMIN_SOUND_NAME', W_ADMIN_SOUND.'名');
define('W_ADMIN_SOUND_DESC', W_ADMIN_SOUND.'説明');
define('W_ADMIN_SOUND_URL', W_ADMIN_SOUND.'URL');
define('W_ADMIN_SOUND_IMAGE', W_ADMIN_SOUND.'画像');
define('W_ADMIN_SOUND_POINT', W_ADMIN_SOUND.'消費ポイント');
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
// ビデオ
 ============================================= */
define('W_ADMIN_VIDEO_ID', W_ADMIN_VIDEO.'ID');
define('W_ADMIN_VIDEO_NAME', W_ADMIN_VIDEO.'名');
define('W_ADMIN_VIDEO_DESC', W_ADMIN_VIDEO.'説明');
define('W_ADMIN_VIDEO_URL', W_ADMIN_VIDEO.'URL');
define('W_ADMIN_VIDEO_IMAGE', W_ADMIN_VIDEO.'画像');
define('W_ADMIN_VIDEO_POINT', W_ADMIN_VIDEO.'消費ポイント');
define('W_ADMIN_VIDEO_CATEGORY_ID', W_ADMIN_VIDEO_CATEGORY.'ID');
define('W_ADMIN_VIDEO_STOCK_NUM', W_ADMIN_VIDEO.'配信終了数');
define('W_ADMIN_VIDEO_STOCK_STATUS', W_ADMIN_VIDEO_STOCK_NUM.'設定');
define('W_ADMIN_VIDEO_START_TIME', W_ADMIN_VIDEO.'配信終了日時');
define('W_ADMIN_VIDEO_START_STATUS', W_ADMIN_VIDEO_START_TIME.'設定');
define('W_ADMIN_VIDEO_END_TIME', W_ADMIN_VIDEO.'配信終了日時');
define('W_ADMIN_VIDEO_END_STATUS', W_ADMIN_VIDEO_END_TIME.'設定');
define('W_ADMIN_VIDEO_IMAGE_NAME', W_ADMIN_VIDEO.'画像');
define('W_ADMIN_VIDEO_IMAGE_FILE', W_ADMIN_VIDEO.'画像ファイル');
define('W_ADMIN_VIDEO_IMAGE_STATUS', W_ADMIN_VIDEO.'画像ステータス');
define('W_ADMIN_VIDEO_CATEGORY_NAME', W_ADMIN_VIDEO_CATEGORY.'名');
define('W_ADMIN_VIDEO_CATEGORY_DESC', W_ADMIN_VIDEO_CATEGORY.'説明');
define('W_ADMIN_VIDEO_CATEGORY_PRIORITY', W_ADMIN_VIDEO_CATEGORY.'優先度');
define('W_ADMIN_VIDEO_CATEGORY_PRIORITY_ID', W_ADMIN_VIDEO_CATEGORY.'優先度ID');

/* =============================================
// バナー
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
// 広告
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
define('W_ADMIN_AD_MEMO', 'メモ');
define('W_ADMIN_AD_MAIL_BODY', 'メール本文');

/* =============================================
// ミニメール
 ============================================= */
define('W_ADMIN_MESSAGE_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_REPLY_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_TITLE', 'タイトル');
define('W_ADMIN_MESSAGE_BODY', '本文');
define('W_ADMIN_MESSAGE_RECEIVE_BOX', '受信BOX');
define('W_ADMIN_MESSAGE_SENT_BOX', '送信BOX');
define('W_ADMIN_MESSAGE_STATUS', W_ADMIN_MESSAGE.'ステータス');
define('W_ADMIN_MESSAGE_CHECKED', W_ADMIN_MESSAGE.'監視');

/* =============================================
// ニュース
 ============================================= */
define('W_ADMIN_NEWS', 'ニュース');
define('W_ADMIN_NEWS_ID', W_ADMIN_NEWS.'ID');
define('W_ADMIN_NEWS_TYPE', '投稿先');
define('W_ADMIN_NEWS_TITLE', W_ADMIN_NEWS.'タイトル');
define('W_ADMIN_NEWS_BODY', W_ADMIN_NEWS.'本文');
define('W_ADMIN_NEWS_TIME', '更新日時');
define('W_ADMIN_FROM_ADMIN_NICKNAME', 'FROM');
define('W_ADMIN_TO_ADMIN_NICKNAME', '宛先');

/* =============================================
// 友達
 ============================================= */
define('W_ADMIN_FRIEND_NAME', '友達');
define('W_ADMIN_FRIEND', W_ADMIN_FRIEND_NAME.'リンク');
define('W_ADMIN_FRIEND_LIST', W_ADMIN_FRIEND_NAME.'リスト');
define('W_ADMIN_FRIEND_ID', W_ADMIN_FRIEND.'ID');
define('W_ADMIN_FRIEND_MESSAGE', 'メッセージ(任意)');
define('W_ADMIN_FRIEND_INTRODUCTION', '紹介文');

/* =============================================
// 画像
 ============================================= */
define('W_ADMIN_IMAGE_STATUS', W_ADMIN_IMAGE.'ステータス');
define('W_ADMIN_IMAGE_CHECKED', W_ADMIN_IMAGE.'監視');

/* =============================================
// 動画
 ============================================= */
define('W_ADMIN_MOVIE', '動画');
define('W_ADMIN_MOVIE_STATUS', W_ADMIN_MOVIE.'ステータス');
define('W_ADMIN_MOVIE_CHECKED', W_ADMIN_MOVIE.'監視');

/* =============================================
// 設定
 ============================================= */
define('W_ADMIN_MESSAGE_1',W_ADMIN_BBS.'書き込み通知メール');
define('W_ADMIN_MESSAGE_2',W_ADMIN_MESSAGE.'通知メール');
define('W_ADMIN_MESSAGE_3',W_ADMIN_BLOG_COMMENT.'通知メール');
define('W_ADMIN_MESSAGE_4',W_ADMIN_COMMUNITY_COMMENT.'通知メール');

/* =============================================
// 動画
 ============================================= */

/* =============================================
// ポイント
 ============================================= */
define('W_ADMIN_POINT_ID', W_ADMIN_POINT.'ID');
define('W_ADMIN_POINT_SUB_ID', W_ADMIN_POINT.'サブID');
define('W_ADMIN_POINT_TYPE', W_ADMIN_POINT.'タイプ');
define('W_ADMIN_POINT_STATUS', W_ADMIN_POINT.'ステータス');
define('W_ADMIN_POINT_MEMO', W_ADMIN_POINT.'メモ');


/* =============================================
// アバター
 ============================================= */
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
// レビュー
 ============================================= */
define('W_ADMIN_REVIEW',	'レビュー');
define('W_ADMIN_REVIEW_ID',	'レビューID');
define('W_ADMIN_REVIEW_STATUS',	'レビューステータス');
define('W_ADMIN_REVIEW_TITLE',	'レビュータイトル');
define('W_ADMIN_REVIEW_BODY',	'レビュー本文');

/* =============================================
// 注文
 ============================================= */
define('W_ADMIN_USER_ORDER',	'注文');
define('W_ADMIN_USER_ORDER_ID',	'注文ID');
define('W_ADMIN_USER_ORDER_NO',	'注文番号');
define('W_ADMIN_USER_ORDER_NAME',	'注文者');
define('W_ADMIN_USER_ORDER_STATUS',	'注文ステータス');
define('W_ADMIN_USER_ORDER_TYPE',	'お支払方法');
define('W_ADMIN_USER_ORDER_DELIVERY_NAME',	'お届け先氏名');
define('W_ADMIN_USER_ORDER_DELIVERY_NAME_KANA',	'お届け先氏名フリガナ');
define('W_ADMIN_USER_ORDER_DELIVERY_ZIPCODE',	'お届け先郵便番号');
define('W_ADMIN_USER_ORDER_DELIVERY_REGION_ID',	'お届け先都道府県');
define('W_ADMIN_USER_ORDER_DELIVERY_ADDRESS',	'お届け先住所');
define('W_ADMIN_USER_ORDER_DELIVERY_ADDRESS_BUILDING',	'お届け先建物名');
define('W_ADMIN_USER_ORDER_DELIVERY_PHONE',	'お届け先電話番号');
define('W_ADMIN_USER_ORDER_DELIVERY_TYPE',	'商品お届け先');
define('W_ADMIN_USER_ORDER_CARD_CART_HASH',	'クレジット伝票番号');
define('W_ADMIN_USER_ORDER_CARD_REVO_STATUS',	'支払回数');
define('W_ADMIN_USER_ORDER_CREDIT_AUTH_CODE',	'クレジットオーソリー番号');
define('W_ADMIN_USER_ORDER_CONVENI_CART_HASH',	'コンビニ伝票番号');
define('W_ADMIN_USER_ORDER_CONVENI_SALE_CODE',	'コンビニお客様番号');
define('W_ADMIN_USER_ORDER_COMMENT',	'コメント');
define('W_ADMIN_USER_ORDER_CREATED_TIME',	'注文日時');
define('W_ADMIN_USER_ORDER_USE_POINT_STATUS',	'利用');
define('W_ADMIN_USER_ORDER_GET_POINT',	'獲得');
define('W_ADMIN_USER_ORDER_DELIVERY_DAY',	'配送時間指定');
define('W_ADMIN_USER_ORDER_DELIVERY_NOTE',	'備考');
define('W_ADMIN_USER_ORDER_POSTAGE',	'送料');
define('W_ADMIN_USER_ORDER_EXCHANGE_FEE',	'代引き手数料');
define('W_ADMIN_USER_ORDER_TOTAL_PRICE1',	'商品合計');
define('W_ADMIN_USER_ORDER_TOTAL_PRICE2',	'合計金額');
define('W_ADMIN_USER_ORDER_TAX',	'消費税');

/* =============================================
// 買い物かご
 ============================================= */
define('W_ADMIN_CART_ID',	'買い物かごID');
define('W_ADMIN_CART_STATUS',	'注文ステータス');
define('W_ADMIN_CART_ITEM_NUM',	'数量');
define('W_ADMIN_SLIP_CODE',	'配送業者伝票コード');

/* =============================================
// 発送
 ============================================= */
define('W_ADMIN_POST_UNIT',	'同時発送グループ');
define('W_ADMIN_POST_UNIT_GROUP_ID',	'同時発送グループID');
define('W_ADMIN_POST_UNIT_SENT_STATUS',	'商品発送ステータス');
define('W_ADMIN_POST_UNIT_ITEM_NUM',	'発送個数');

/* =============================================
// 商品
 ============================================= */
define('W_ADMIN_ITEM',	'商品');
define('W_ADMIN_ITEM_ID',	'商品ID');
define('W_ADMIN_ITEM_DISTINCTION_ID',	'商品識別ID');
define('W_ADMIN_ITEM_PRIORITY_ID', '商品優先度');
define('W_ADMIN_ITEM_NAME',	'商品名');
define('W_ADMIN_ITEM_PRICE',	'価格');
define('W_ADMIN_ITEM_DETAIL',	'商品詳細');
define('W_ADMIN_ITEM_STATUS',	'商品ステータス');
define('W_ADMIN_ITEM_START_STATUS',	'販売開始ステータス');
define('W_ADMIN_ITEM_START_TIME',	'販売期間開始');
define('W_ADMIN_ITEM_END_STATUS',	'販売終了ステータス');
define('W_ADMIN_ITEM_END_TIME',	'販売期間終了');
define('W_ADMIN_ITEM_TYPE',	'タイプ');
define('W_ADMIN_ITEM_SETTLEMENT',	'決済方法');
define('W_ADMIN_ITEM_USE_CREDIT_STATUS',	'クレジット可能');
define('W_ADMIN_ITEM_USE_CONVENI_STATUS',	'コンビニ可能');
define('W_ADMIN_ITEM_USE_EXCHANGE_STATUS',	'代引き可能');
define('W_ADMIN_ITEM_USE_TRANSFER_STATUS',	'銀行振込可能');
define('W_ADMIN_ITEM_BUNDLE_STATUS',	'同梱不可フラグ');
define('W_ADMIN_ITEM_LABEL_FRONT',	'商品ラベル（前）');
define('W_ADMIN_ITEM_LABEL_BACK',	'商品ラベル（後）');
define('W_ADMIN_ITEM_POINT',	'ポイント');
define('W_ADMIN_ITEM_TEXT1',	'キャッチコピー');
define('W_ADMIN_ITEM_TEXT2',	'詳細ページに表示する商品情報');
define('W_ADMIN_ITEM_SPEC',	'商品スペック');
define('W_ADMIN_ITEM_IMAGE_FILE',	'商品画像');
define('W_ADMIN_ITEM_CONTENTS_BODY',	'商品フリースペース');
define('W_ADMIN_ITEM_ADD', '商品追加');
define('W_ADMIN_ITEM_PRIORITY_EDIT', '商品優先度更新');

/* =============================================
// ショップ
 ============================================= */
define('W_ADMIN_SHOP', 'ショップ');
define('W_ADMIN_SHOP_ID', 'ショップID');
define('W_ADMIN_SHOP_NAME', 'ショップ名');
define('W_ADMIN_SHOP_NEWS', 'ショップニュース');
define('W_ADMIN_SHOP_BGCOLOR', 'ショップ背景色');
define('W_ADMIN_SHOP_TEXTCOLOR', 'ショップ文字色');
define('W_ADMIN_SHOP_LINKCOLOR', 'ショップリンク色');
define('W_ADMIN_SHOP_ALINKCOLOR', 'ショップアクティブリンク色');
define('W_ADMIN_SHOP_VLINKCOLOR', 'ショップ訪問済みリンク色');
define('W_ADMIN_SHOP_NEW_ARRIVALS', 'おすすめ商品');
define('W_ADMIN_SHOP_RANKING', '人気ランキング');
define('W_ADMIN_SHOP_IMAGE1_FILE', 'ショップ画像1(TOP用)');
define('W_ADMIN_SHOP_IMAGE2_FILE', 'ショップ画像2(SHOP用)');
define('W_ADMIN_SHOP_CATEGORY_PRINT_STATUS', 'ショップTOPカテゴリ一覧表示設定');
define('W_ADMIN_SHOP_BODY', 'ショップフリースペース');
define('W_ADMIN_SHOP_STATUS', 'ショップステータス');
define('W_ADMIN_SHOP_PRIORITY_ID', 'ショップ優先度');
define('W_ADMIN_SHOP_PRIORITY_EDIT', 'ショップ優先度変更');

/* =============================================
// 商品カテゴリ
 ============================================= */
define('W_ADMIN_ITEM_CATEGORY', '商品カテゴリ');
define('W_ADMIN_ITEM_CATEGORY_ID', '商品カテゴリID');
define('W_ADMIN_ITEM_CATEGORY_NAME', '商品カテゴリ名');
define('W_ADMIN_ITEM_CATEGORY_STATUS', '商品カテゴリステータス');
define('W_ADMIN_ITEM_CATEGORY_TEXT', '商品カテゴリ説明文');
define('W_ADMIN_ITEM_CATEGORY_IMAGE1_FILE', '商品カテゴリ画像');
define('W_ADMIN_ITEM_CATEGORY_CONTENTS_BODY', '商品カテゴリフリースペース');
define('W_ADMIN_ITEM_CATEGORY_PRIORITY_ID', '商品カテゴリ優先度');
define('W_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT', '商品カテゴリ優先度更新');

/* =============================================
// 仕入先
 ============================================= */
define('W_ADMIN_SUPPLIER',	'仕入先設定');
define('W_ADMIN_SUPPLIER_NAME',	W_ADMIN_SUPPLIER.'名');
define('W_ADMIN_SUPPLIER_ID',	'仕入先ID');
define('W_ADMIN_SUPPLIER_SHIPPING_TYPE',	'出荷タイプ');
define('W_ADMIN_SUPPLIER_STATUS',	'仕入先ステータス');
define('W_ADMIN_SUPPLIER_BUNDLE_ALLOW_ID',	'同梱可能設定');
define('W_ADMIN_SUPPLIER_SETTLEMENT',	'決済設定');

/* =============================================
// 送料
 ============================================= */
define('W_ADMIN_POSTAGE',	'送料設定');
define('W_ADMIN_POSTAGE_NAME',	W_ADMIN_POSTAGE.'名');
define('W_ADMIN_POSTAGE_ID',	'送料ID');
define('W_ADMIN_POSTAGE_STATUS',	'送料設定ステータス');
define('W_ADMIN_POSTAGE_TYPE',	'送料タイプ');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_SET',	'合計金額');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_SET_UNDER',	'合計金額に満たない場合の送料');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_VALUE',	'送料');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_SET',	'合計個数');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_SET_UNDER',	'合計個数に満たない場合の送料');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_VALUE',	'送料');
define('W_ADMIN_POSTAGE_SAME_STATUS',	'全国一律設定');
define('W_ADMIN_POSTAGE_SAME_PRICE',	'全国一律料金');
define('W_ADMIN_POSTAGE_PREF_1',	'北海道');
define('W_ADMIN_POSTAGE_PREF_2',	'青森県');
define('W_ADMIN_POSTAGE_PREF_3',	'岩手県');
define('W_ADMIN_POSTAGE_PREF_4',	'秋田県');
define('W_ADMIN_POSTAGE_PREF_5',	'宮城県');
define('W_ADMIN_POSTAGE_PREF_6',	'山形県');
define('W_ADMIN_POSTAGE_PREF_7',	'福島県');
define('W_ADMIN_POSTAGE_PREF_8',	'茨城県');
define('W_ADMIN_POSTAGE_PREF_9',	'栃木県');
define('W_ADMIN_POSTAGE_PREF_10',	'群馬県');
define('W_ADMIN_POSTAGE_PREF_11',	'埼玉県');
define('W_ADMIN_POSTAGE_PREF_12',	'千葉県');
define('W_ADMIN_POSTAGE_PREF_13',	'東京都');
define('W_ADMIN_POSTAGE_PREF_14',	'神奈川県');
define('W_ADMIN_POSTAGE_PREF_15',	'新潟県佐渡島');
define('W_ADMIN_POSTAGE_PREF_16',	'新潟県');
define('W_ADMIN_POSTAGE_PREF_17',	'富山県');
define('W_ADMIN_POSTAGE_PREF_18',	'石川県');
define('W_ADMIN_POSTAGE_PREF_19',	'福井県');
define('W_ADMIN_POSTAGE_PREF_20',	'長野県');
define('W_ADMIN_POSTAGE_PREF_21',	'山梨県');
define('W_ADMIN_POSTAGE_PREF_22',	'静岡県');
define('W_ADMIN_POSTAGE_PREF_23',	'愛知県');
define('W_ADMIN_POSTAGE_PREF_24',	'岐阜県');
define('W_ADMIN_POSTAGE_PREF_25',	'三重県');
define('W_ADMIN_POSTAGE_PREF_26',	'滋賀県');
define('W_ADMIN_POSTAGE_PREF_27',	'京都府');
define('W_ADMIN_POSTAGE_PREF_28',	'大阪府');
define('W_ADMIN_POSTAGE_PREF_29',	'兵庫県');
define('W_ADMIN_POSTAGE_PREF_30',	'奈良県');
define('W_ADMIN_POSTAGE_PREF_31',	'和歌山県');
define('W_ADMIN_POSTAGE_PREF_32',	'鳥取県');
define('W_ADMIN_POSTAGE_PREF_33',	'島根県');
define('W_ADMIN_POSTAGE_PREF_34',	'岡山県');
define('W_ADMIN_POSTAGE_PREF_35',	'広島県');
define('W_ADMIN_POSTAGE_PREF_36',	'山口県');
define('W_ADMIN_POSTAGE_PREF_37',	'香川県');
define('W_ADMIN_POSTAGE_PREF_38',	'徳島県');
define('W_ADMIN_POSTAGE_PREF_39',	'愛媛県');
define('W_ADMIN_POSTAGE_PREF_40',	'高知県');
define('W_ADMIN_POSTAGE_PREF_41',	'福岡県');
define('W_ADMIN_POSTAGE_PREF_42',	'大分県');
define('W_ADMIN_POSTAGE_PREF_43',	'佐賀県');
define('W_ADMIN_POSTAGE_PREF_44',	'長崎県');
define('W_ADMIN_POSTAGE_PREF_45',	'宮崎県');
define('W_ADMIN_POSTAGE_PREF_46',	'熊本県');
define('W_ADMIN_POSTAGE_PREF_47',	'鹿児島県');
define('W_ADMIN_POSTAGE_PREF_48',	'沖縄県');
define('W_ADMIN_POSTAGE_PREF_49',	'沖縄県離島');
define('W_ADMIN_POSTAGE_ADD',	'送料登録');

/* =============================================
// 代引き手数料
 ============================================= */
define('W_ADMIN_EXCHANGE',	'代引き手数料');
define('W_ADMIN_EXCHANGE_ID',	'代引き手数料ID');
define('W_ADMIN_EXCHANGE_NAME',	'代引き手数料設定名');
define('W_ADMIN_EXCHANGE_STATUS',	'代引き手数料ステータス');
define('W_ADMIN_EXCHANGE_TYPE',	'代引き手数料設定タイプ');
define('W_ADMIN_EXCHANGE_SAME_STATUS',	'一律設定');
define('W_ADMIN_EXCHANGE_SAME_PRICE',	'一律料金');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_SET',	'合計金額');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_SET_UNDER',	'合計金額に満たない場合の代引き手数料');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_VALUE',	'代引き手数料');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_SET',	'合計個数');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_SET_UNDER',	'合計個数に満たない場合の代引き手数料');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_VALUE',	'代引き手数料');
define('W_ADMIN_EXCHANGE_ADD',	'代引き手数料登録');

/* =============================================
// 代引き手数料範囲
 ============================================= */
define('W_ADMIN_EXCHANGE_RANGE',	'代引き手数料金額範囲');
define('W_ADMIN_EXCHANGE_RANGE_PRICE',	'範囲代引き手数料');
define('W_ADMIN_NEW_EXCHANGE_RANGE_PRICE',	'追加範囲代引き手数料');
define('W_ADMIN_NEW_EXCHANGE_RANGE_START',	'追加範囲開始金額');
define('W_ADMIN_NEW_EXCHANGE_RANGE_END',	'追加範囲終了金額');

/* =============================================
// 在庫
 ============================================= */
define('W_ADMIN_STOCK',	'在庫');
define('W_ADMIN_STOCK_NUM',	'在庫数');
define('W_ADMIN_STOCK_PRIORITY_ID',	'優先度');
define('W_ADMIN_STOCK_ONE_TYPE_STATUS',	'単一タイプの商品');

/* =============================================
// サンプル画像
 ============================================= */
define('W_ADMIN_SAMPLE',	'サンプル画像');
define('W_ADMIN_SAMPLE_NAME',	'サンプル画像タイトル');
define('W_ADMIN_SAMPLE_IMAGE',	'画像');
define('W_ADMIN_SAMPLE_PRIORITY_ID',	'サンプル画像番号');


?>