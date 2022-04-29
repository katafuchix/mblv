<?php
/**
 *  Tv_Error.php
 * エラー定義
 *
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 共通エラー番号定義
 */

$i = 388;
define('E_INVALID_DATE', $i++);

/**
 * 管理エラー番号定義
 */
/* =============================================
// 共通
 ============================================= */
define('E_ADMIN_DB', $i++);
define('I_ADMIN_UPDATE_STATUS_ALL_DONE', $i++);
define('E_ADMIN_AUTHORITY_EDIT', $i++);

/* =============================================
// 日記
 ============================================= */
define('I_ADMIN_BLOG_ARTICLE_ADD_DONE', $i++);
define('I_ADMIN_BLOG_ARTICLE_EDIT_DONE', $i++);
define('I_ADMIN_BLOG_ARTICLE_DELETE_DONE', $i++);

/* =============================================
// 日記コメント
 ============================================= */
define('I_ADMIN_BLOG_COMMENT_ADD_DONE', $i++);
define('I_ADMIN_BLOG_COMMENT_EDIT_DONE', $i++);
define('I_ADMIN_BLOG_COMMENT_DELETE_DONE', $i++);

/* =============================================
// コミュニティ
 ============================================= */
define('E_ADMIN_COMMUNITY_NOT_MEMBER', $i++);
define('I_ADMIN_COMMUNITY_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_DELETE_DONE', $i++);

/* =============================================
// コミュニティトピック
 ============================================= */
define('I_ADMIN_COMMUNITY_ARTICLE_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_ARTICLE_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_ARTICLE_DELETE_DONE', $i++);

/* =============================================
// コミュニティコメント
 ============================================= */
define('I_ADMIN_COMMUNITY_COMMENT_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_COMMENT_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_COMMENT_DELETE_DONE', $i++);

/* =============================================
// 広告
 ============================================= */
define('E_ADMIN_AD_CODE_DUPLICATE', $i++);
define('I_ADMIN_AD_ADD_DONE', $i++);
define('I_ADMIN_AD_EDIT_DONE', $i++);
define('I_ADMIN_AD_DELETE_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_AD_CODE_ADD_DONE', $i++);
define('I_ADMIN_AD_CODE_DELETE_DONE', $i++);
define('I_ADMIN_AD_CODE_EDIT_DONE', $i++);
define('I_ADMIN_ADMENU_EDIT_DONE', $i++);

/* =============================================
// アバター
 ============================================= */
define('I_ADMIN_AVATAR_ADD_DONE', $i++);
define('I_ADMIN_AVATAR_DELETE_DONE', $i++);
define('I_ADMIN_AVATAR_EDIT_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_AVATAR_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_PRIORITY_DUPLICATE', $i++);
define('I_ADMIN_AVATAR_STAND_ADD_DONE', $i++);
define('I_ADMIN_AVATAR_STAND_DELETE_DONE', $i++);
define('I_ADMIN_AVATAR_STAND_EDIT_DONE', $i++);

/* =============================================
// バナー
 ============================================= */
define('I_ADMIN_BANNER_ADD_DONE', $i++);
define('I_ADMIN_BANNER_DELETE_DONE', $i++);
define('I_ADMIN_BANNER_EDIT_DONE', $i++);

/* =============================================
// CMS
 ============================================= */
define('I_ADMIN_CMS_EDIT_DONE', $i++);

/* =============================================
// 設定
 ============================================= */
define('I_ADMIN_CONFIG_EDIT_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_CONFIG_USER_PROF_DELETE_DONE', $i++);
define('I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE', $i++);

/* =============================================
// デコメール
 ============================================= */
define('I_ADMIN_DECOMAIL_ADD_DONE', $i++);
define('I_ADMIN_DECOMAIL_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DUPLICATE', $i++);

/* =============================================
// ゲーム
 ============================================= */
define('I_ADMIN_GAME_ADD_DONE', $i++);
define('I_ADMIN_GAME_DELETE_DONE', $i++);
define('I_ADMIN_GAME_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_GAME_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_PRIORITY_DUPLICATE', $i++);

/* =============================================
// サウンド
 ============================================= */
define('I_ADMIN_SOUND_ADD_DONE', $i++);
define('I_ADMIN_SOUND_DELETE_DONE', $i++);
define('I_ADMIN_SOUND_EDIT_DONE', $i++);
define('I_ADMIN_SOUND_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_SOUND_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_SOUND_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_SOUND_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_SOUND_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_SOUND_CATEGORY_PRIORITY_DUPLICATE', $i++);

/* =============================================
// ビデオ
 ============================================= */
define('I_ADMIN_VIDEO_ADD_DONE', $i++);
define('I_ADMIN_VIDEO_DELETE_DONE', $i++);
define('I_ADMIN_VIDEO_EDIT_DONE', $i++);
define('I_ADMIN_VIDEO_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_VIDEO_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_VIDEO_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_VIDEO_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_VIDEO_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_VIDEO_CATEGORY_PRIORITY_DUPLICATE', $i++);

/* =============================================
// フリーページ
 ============================================= */
define('I_ADMIN_CONTENTS_ADD_DONE', $i++);
define('I_ADMIN_CONTENTS_DELETE_DONE', $i++);
define('I_ADMIN_CONTENTS_EDIT_DONE', $i++);
define('E_ADMIN_CONTENTS_CODE_DUPLICATE', $i++);

/* =============================================
// ショップ
 ============================================= */
define('I_ADMIN_SHOP_ADD_DONE', $i++);
define('I_ADMIN_SHOP_DELETE_DONE', $i++);
define('I_ADMIN_SHOP_EDIT_DONE', $i++);
define('I_ADMIN_SHOP_PRIORITY_EDIT_DONE', $i++);
define('E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD', $i++);
define('E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD', $i++);

/* =============================================
// 商品カテゴリ
 ============================================= */
define('I_ADMIN_ITEM_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT_DONE', $i++);
define('E_ADMIN_ITEM_CATEGORY_SHOP_NOT_FOUND', $i++);
define('E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD', $i++);

/* =============================================
// 商品
 ============================================= */
define('I_ADMIN_ITEM_ADD_DONE', $i++);
define('I_ADMIN_ITEM_DELETE_DONE', $i++);
define('I_ADMIN_ITEM_EDIT_DONE', $i++);
define('I_ADMIN_ITEM_PRIORITY_EDIT_DONE', $i++);
define('E_ADMIN_ITEM_ITEM_CATEGORY_NOT_FOUND', $i++);
define('E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK', $i++);
define('E_ADMIN_ITEM_START_TO_END_TIME', $i++);
define('E_ADMIN_ITEM_SUPPLIER', $i++);
define('E_ADMIN_ITEM_SETTLEMENT', $i++);
define('E_ADMIN_ITEM_BUNDLE_STATUS', $i++);
define('E_ADMIN_ITEM_NO_DUPLICATE', $i++);
define('E_ADMIN_ITEM_IMAGE_FILE_UPLOAD', $i++);

/* =============================================
// サンプル画像
 ============================================= */
define('E_ADMIN_SAMPLE_IMAGE_FILE_UPLOAD', $i++);
define('E_ADMIN_SAMPLE_PRIORITY_ID_DUPLICATE', $i++);

/* =============================================
// 在庫
 ============================================= */
define('E_ADMIN_STOCK_NUM', $i++);

/* =============================================
// 仕入先
 ============================================= */
define('I_ADMIN_SUPPLIER_ADD_DONE', $i++);
define('I_ADMIN_SUPPLIER_DELETE_DONE', $i++);
define('I_ADMIN_SUPPLIER_EDIT_DONE', $i++);
define('E_ADMIN_SUPPLIER_SETTLEMENT',$i++);
define('E_ADMIN_SUPPLIER_NAME_ALREADY_USED',$i++);
	
/* =============================================
// 送料
 ============================================= */
define('I_ADMIN_POSTAGE_ADD_DONE', $i++);
define('I_ADMIN_POSTAGE_DELETE_DONE', $i++);
define('I_ADMIN_POSTAGE_EDIT_DONE', $i++);
define('E_ADMIN_POSTAGE_TYPE', $i++);
define('E_ADMIN_POSTAGE_SAME_PRICE', $i++);
define('E_ADMIN_POSTAGE_NAME_ALREADY_USED', $i++);

/* =============================================
// 代引き手数料
 ============================================= */
define('I_ADMIN_EXCHANGE_ADD_DONE', $i++);
define('I_ADMIN_EXCHANGE_DELETE_DONE', $i++);
define('I_ADMIN_EXCHANGE_EDIT_DONE', $i++);
define('E_ADMIN_EXCHANGE_SAME_PRICE', $i++);
define('E_ADMIN_EXCHANGE_NAME_ALREADY_USED', $i++);

/* =============================================
// 代引き手数料金額範囲指定
 ============================================= */
define('E_ADMIN_EXCHANGE_RANGE_PRICE', $i++);

/* =============================================
// 注文
 ============================================= */
define('I_ADMIN_USER_ORDER_EDIT_DONE', $i++);
define('E_ADMIN_USER_ORDER_DELIVERY_TYPE', $i++);

/* =============================================
// カート
 ============================================= */
define('I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY', $i++);
define('E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL', $i++);
define('E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN', $i++);
define('E_ADMIN_CART_ITEM_NUM_SUBTRACTION', $i++);

/* =============================================
// 発送単位
 ============================================= */
define('I_ADMIN_POST_UNIT_MAIL_SENT_DONE', $i++);
define('I_ADMIN_POST_UNIT_EDIT_DONE', $i++);

/* =============================================
// レビュー
 ============================================= */
define('I_ADMIN_REVIEW_EDIT_DONE', $i++);
define('I_ADMIN_REVIEW_DELETE_DONE', $i++);


/* =============================================
// ファイル
 ============================================= */
define('I_ADMIN_FILE_UPLOAD', $i++);
define('E_ADMIN_FILE_UPLOAD', $i++);
define('I_ADMIN_FILE_DELETE', $i++);
define('E_ADMIN_FILE_DELETE', $i++);

/* =============================================
// ログイン
 ============================================= */
define('E_ADMIN_LOGIN', $i++);

/* =============================================
// ログアウト
 ============================================= */
define('I_ADMIN_LOGOUT', $i++);

/* =============================================
// メールマガジン
 ============================================= */
define('I_ADMIN_MAGAZINE_ADD_DONE', $i++);
define('I_ADMIN_MAGAZINE_DELETE_DONE', $i++);
define('I_ADMIN_MAGAZINE_EDIT_DONE', $i++);
define('I_ADMIN_MAGAZINE_STOP_DONE', $i++);

/* =============================================
// 入会経路
 ============================================= */
define('E_ADMIN_MEDIA_CODE_DUPLICATE', $i++);
define('I_ADMIN_MEDIA_ADD_DONE', $i++);
define('I_ADMIN_MEDIA_DELETE_DONE', $i++);
define('I_ADMIN_MEDIA_EDIT_DONE', $i++);

/* =============================================
// ニュース
 ============================================= */
define('I_ADMIN_NEWS_ADD_DONE', $i++);
define('I_ADMIN_NEWS_EDIT_DONE', $i++);
define('I_ADMIN_NEWS_DELETE_DONE', $i++);

/* =============================================
// ユーザ
 ============================================= */
define('E_ADMIN_USER_DUPLICATE', $i++);
define('E_ADMIN_USER_NOT_FOUND', $i++);
define('E_ADMIN_USER_COMMUNITY_EDIT_ADMIN', $i++);
define('E_ADMIN_USER_FRIEND_EDIT_APPLYING', $i++);
define('E_ADMIN_USER_FRIEND_INVALID', $i++);
define('I_ADMIN_USER_FRIEND_INTRODUCTION_EDIT_DONE', $i++);
define('I_ADMIN_USER_COMMUNITY_EDIT_DONE', $i++);
define('I_ADMIN_USER_EDIT_DONE', $i++);
define('I_ADMIN_USER_FRIEND_EDIT_DONE', $i++);
define('E_ADMIN_USER_MAILADDRESS_ERROR', $i++);

/* =============================================
// 管理者
 ============================================= */
define('I_ADMIN_ACCOUNT_ADD_DONE', $i++);
define('I_ADMIN_ACCOUNT_EDIT_DONE', $i++);
define('I_ADMIN_ACCOUNT_DELETE_DONE', $i++);
define('E_ADMIN_ID_DUPLICATE', $i++);

/* =============================================
// NGワード
 ============================================= */
define('E_ADMIN_NGWORD_EDIT_DONE',$i++);

/* =============================================
// セグメント
 ============================================= */
define('I_ADMIN_SEGMENT_ADD_DONE', $i++);
define('I_ADMIN_SEGMENT_EDIT_DONE', $i++);
define('I_ADMIN_SEGMENT_DELETE_DONE', $i++);


/**
 * ユーザエラー番号定義
 */
/* =============================================
// 共通
 ============================================= */
define('E_USER_ACCESS_DENIED', $i++);
define('E_USER_DB', $i++);
define('E_USER_DUPLICATE_POST', $i++);
define('E_USER_IDENTIFY', $i++);
define('E_USER_NOT_FOUND', $i++);
define('E_USER_PASSWORD', $i++);
define('E_USER_PLEASE_LOGIN', $i++);
define('E_USER_POINT_SHORTAGE', $i++);

/* =============================================
// 広告
 ============================================= */
define('E_USER_AD_OUT_OF_DATE', $i++);
define('E_USER_AD_PC', $i++);
define('E_USER_AD_MOBILE', $i++);
define('E_USER_AD_STOCK_OVER', $i++);
define('E_USER_AD_NOT_START', $i++);

/* =============================================
// アバター
 ============================================= */
define('E_USER_AVATAR_DUPLICATE', $i++);
define('E_USER_AVATAR_SEX', $i++);
define('I_USER_AVATAR_BUY_DONE', $i++);
define('I_USER_AVATAR_CHANGE_DONE', $i++);
define('E_USER_AVATAR_ALREADY_IN_CART', $i++);
define('E_USER_AVATAR_SELECT', $i++);

/* =============================================
// 伝言板
 ============================================= */
define('E_USER_BBS_MESSAGE_NOT_FOUND', $i++);

/* =============================================
// 通報
 ============================================= */
define('E_USER_REPORT', $i++);
define('I_USER_REPORT_DELETE_DONE', $i++);

/* =============================================
// ブラックリスト
 ============================================= */
define('E_USER_BLACKLIST', $i++);
define('E_USER_BLACKLIST_DUPLICATE', $i++);
define('I_USER_BLACKLIST_DELETE_DONE', $i++);
define('E_USER_BLACKLIST_HOME', $i++);

/* =============================================
// ブログ
 ============================================= */
define('E_USER_BLOG_ARTICLE_ACCESS_DENIED', $i++);
define('E_USER_BLOG_ARTICLE_NOT_FOUND', $i++);
define('E_USER_BLOG_COMMENT_ACCESS_DENIED', $i++);
define('E_USER_BLOG_COMMENT_NOT_FOUND', $i++);
define('I_USER_BLOG_ARTICLE_ADD_DONE', $i++);

/* =============================================
// コメント
 ============================================= */
define('E_USER_COMMENT_NOT_FOUND', $i++);

/* =============================================
// コミュニティ
 ============================================= */
define('E_USER_COMMUNITY_ADMIN', $i++);
define('E_USER_COMMUNITY_APPLIED', $i++);
define('E_USER_COMMUNITY_DUPLICATE', $i++);
define('E_USER_COMMUNITY_RESIGN_ADMIN', $i++);
define('E_USER_COMMUNITY_ADMIN_FORMER_GET', $i++);
define('E_USER_COMMUNITY_ADMIN_FORMER_SET', $i++);
define('E_USER_COMMUNITY_ADMIN_GIVE', $i++);
define('E_USER_COMMUNITY_ADMIN_GIVE_SELF', $i++);
define('E_USER_COMMUNITY_ADMIN_LATER_GET', $i++);
define('E_USER_COMMUNITY_ADMIN_LATER_SET', $i++);
define('E_USER_COMMUNITY_ACCESS_DENIED', $i++);
define('E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED', $i++);
define('E_USER_COMMUNITY_ARTICLE_ADD_DENIED', $i++);
define('E_USER_COMMUNITY_ARTICLE_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_COMMENT_ACCESS_DENIED', $i++);
define('E_USER_COMMUNITY_COMMENT_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_MEMBER_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN', $i++);
define('I_USER_COMMUNITY_ADMIN_GIVE_DONE', $i++);
define('I_USER_COMMUNITY_COMMENT_DELETE_DONE', $i++);
define('I_USER_COMMUNITY_MEMBER_REMOVE_DONE', $i++);
define('E_USER_COMMUNITY_ACCEPTED_DONE', $i++);
define('E_USER_COMMUNITY_ACCEPTED_DENIED', $i++);

/* =============================================
// 設定
 ============================================= */
define('E_USER_CONFIG_FORMER_PASSWORD', $i++);

/* =============================================
// デコメール
 ============================================= */
define('E_USER_DECOMAIL_DUPLICATE', $i++);
define('I_USER_DECOMAIL_BUY_DONE', $i++);
define('E_USER_DECOMAIL_OUT_OF_DATE', $i++);

/* =============================================
// 友達
 ============================================= */
define('E_USER_FRIEND_APPLY_DUPLICATE', $i++);
define('E_USER_FRIEND_DELETE_APPLYING', $i++);
define('E_USER_FRIEND_DELETE_DONE', $i++);
define('E_USER_FRIEND_DELETE_NOT_FRIEND', $i++);
define('E_USER_FRIEND_DUPLICATE', $i++);
define('E_USER_FRIEND_INTRODUCTION_DENIED', $i++);
define('I_USER_FRIEND_DELETE_DONE', $i++);

/* =============================================
// ゲーム
 ============================================= */
define('E_USER_GAME_ACCESS_DENIED', $i++);
define('I_USER_GAME_BUY_DONE', $i++);
define('E_USER_GAME_OUT_OF_DATE', $i++);

/* =============================================
// サウンド
 ============================================= */
define('E_USER_SOUND_ACCESS_DENIED', $i++);
define('I_USER_SOUND_BUY_DONE', $i++);
define('E_USER_SOUND_OUT_OF_DATE', $i++);

/* =============================================
// ビデオ
 ============================================= */
define('E_USER_VIDEO_ACCESS_DENIED', $i++);
define('I_USER_VIDEO_BUY_DONE', $i++);
define('E_USER_VIDEO_OUT_OF_DATE', $i++);

/* =============================================
// フリーページ
 ============================================= */
define('E_USER_CONTENTS_NOT_FOUND', $i++);

/* =============================================
// 招待
 ============================================= */
define('E_USER_INVITE_VALID_USER', $i++);
define('E_USER_INVITE_CHAPCHA', $i++);
define('E_USER_INVITE_DUPLICATE', $i++);
define('E_USER_INVITE_MAILADDRESS', $i++);
define('E_USER_INVITE_PCMAILADDRESS', $i++);

/* =============================================
// メッセージ
 ============================================= */
define('E_USER_MESSAGE_NOT_FOUND', $i++);
define('I_USER_MESSAGE_DELETE_DONE', $i++);

/* =============================================
// メッセージ
 ============================================= */
define('E_USER_INVITE_NAME_NOT_FOUND',$i++);

/* =============================================
// ログイン
 ============================================= */
define('E_USER_LOGIN', $i++);
define('E_USER_LOGIN_MOBILE_ONLY', $i++);
define('I_USER_LOGIN_DONE', $i++);

/* =============================================
// ログアウト
 ============================================= */
define('I_USER_LOGOUT_DONE', $i++);

/* =============================================
// プロフィール
 ============================================= */
define('I_USER_PROFILE_EDIT_DONE', $i++);
define('E_USER_NICKNAME_ALREADY_USED', $i++);

/* =============================================
// 友達検索
 ============================================= */
define('E_USER_SEARCH_NO_KEY', $i++);

/* =============================================
// 会員登録
 ============================================= */
define('E_USER_REGIST_NO_USER_HASH', $i++);
define('E_USER_REGIST_10', $i++);
define('E_USER_REGIST_20', $i++);
define('E_USER_REGIST_30', $i++);
define('E_USER_REGIST_40', $i++);
define('E_USER_REGIST_50', $i++);
define('I_USER_REGIST_DONE', $i++);
define('E_USER_BIRTHDAY_ERROR', $i++);
define('E_USER_NICKNAME_EMOJI', $i++);
define('E_USER_NICKNAME_LENGTH', $i++);
define('E_USER_XUID', $i++);
	
/* =============================================
// リマインダー
 ============================================= */
define('I_USER_REMIND_DONE', $i++);

/* =============================================
// 退会
 ============================================= */
define('E_USER_RESIGN_COMMUNITY', $i++);


/* =============================================
// 商品
 ============================================= */
define('E_USER_ITEM_NOT_FOUND', $i++);
define('E_USER_ITEM_BUDGET', $i++);
define('E_USER_ITEM_BUNDLE_STATUS', $i++);

/* =============================================
// カート
 ============================================= */
define('I_USER_CART_DELETE_DONE', $i++);
define('E_USER_CART_EMPTY', $i++);
define('E_USER_CART_ITEM_NUM', $i++);

/* =============================================
// ファイル
 ============================================= */
define('E_USER_FILE_NOT_FOUND', $i++);
define('E_USER_FILE_TYPE_UNMATCHED', $i++);

/* =============================================
// ユーザ
 ============================================= */
define('E_USER_BIRTHDAY', $i++);

/* =============================================
// レビュー
 ============================================= */
define('E_USER_REVIEW_NOT_EXIST', $i++);

/* =============================================
// 在庫
 ============================================= */
define('E_USER_STOCK_OUT', $i++);
define('E_USER_STOCK_OVER', $i++);
define('E_USER_STOCK_ORDER_OVER', $i++);

/* =============================================
// 注文
 ============================================= */
define('E_USER_ORDER_USE_POINT_OVER', $i++);
define('E_USER_ORDER_USE_POINT_MIN', $i++);
define('E_USER_ORDER_USE_POINT_MAX', $i++);
define('E_USER_ORDER_USE_CARD_ERROR', $i++);
define('E_USER_ORDER_USE_CONVENI_ERROR', $i++);
define('E_USER_ORDER_CARD_TYPE', $i++);
define('E_USER_ORDER_CARD_NUMBER', $i++);
define('E_USER_ORDER_CARD_NAME', $i++);
define('E_USER_ORDER_CARD_MONTH', $i++);
define('E_USER_ORDER_CARD_YEAR', $i++);
define('E_USER_ORDER_CARD_TERM', $i++);
define('E_USER_ORDER_CONVENI_TYPE', $i++);
define('E_USER_ORDER_DELIVERY_NAME', $i++);
define('E_USER_ORDER_DELIVERY_NAME_KANA', $i++);
define('E_USER_ORDER_DELIVERY_ZIPCODE', $i++);
define('E_USER_ORDER_DELIVERY_ADDRESS', $i++);
define('E_USER_ORDER_DELIVERY_PHONE', $i++);
define('E_USER_ORDER_TYPE_EMPTY', $i++);
define('E_USER_ORDER_TYPE', $i++);
define('E_USER_ORDER_ITEM_NOT_FOUND', $i++);
define('E_USER_ORDER_LOGIN', $i++);

/**
 * エラーメッセージ定義
 */
$errorMessage = array(
// 共通
E_INVALID_DATE							=> '無効な日付です',
// 管理側
E_ADMIN_DB								=> 'DBエラー',
I_ADMIN_UPDATE_STATUS_ALL_DONE			=> W_ADMIN_CHECKED.'状況を更新しました。',
E_ADMIN_AUTHORITY_EDIT					=> '編集権限がありません',
// 管理者
E_ADMIN_ID_DUPLICATE					=> 'このログインIDは既に使用されています。',
I_ADMIN_ACCOUNT_ADD_DONE				=> W_ADMIN_ACCOUNT.'登録が完了しました。',
I_ADMIN_ACCOUNT_EDIT_DONE				=> W_ADMIN_ACCOUNT.'編集が完了しました。',
I_ADMIN_ACCOUNT_DELETE_DONE				=> W_ADMIN_ACCOUNT.'削除が完了しました。',
// 日記
I_ADMIN_BLOG_ARTICLE_ADD_DONE			=> W_ADMIN_BLOG_ARTICLE.'の登録が完了しました。',
I_ADMIN_BLOG_ARTICLE_EDIT_DONE			=> W_ADMIN_BLOG_ARTICLE.'の編集が完了しました。',
I_ADMIN_BLOG_ARTICLE_DELETE_DONE		=> W_ADMIN_BLOG_ARTICLE.'の削除が完了しました。',
// 日記コメント
I_ADMIN_BLOG_COMMENT_ADD_DONE			=> W_ADMIN_BLOG_COMMENT.'の登録が完了しました。',
I_ADMIN_BLOG_COMMENT_EDIT_DONE			=> W_ADMIN_BLOG_COMMENT.'の編集が完了しました。',
I_ADMIN_BLOG_COMMENT_DELETE_DONE		=> W_ADMIN_BLOG_COMMENT.'の削除が完了しました。',
// コミュニティ
I_ADMIN_COMMUNITY_ADD_DONE				=> W_ADMIN_COMMUNITY.'の登録が完了しました。',
I_ADMIN_COMMUNITY_EDIT_DONE				=> W_ADMIN_COMMUNITY.'の編集が完了しました。',
I_ADMIN_COMMUNITY_DELETE_DONE			=> W_ADMIN_COMMUNITY.'の削除が完了しました。',
// コミュニティトピック
I_ADMIN_COMMUNITY_ARTICLE_ADD_DONE		=> W_ADMIN_COMMUNITY_ARTICLE.'の登録が完了しました。',
I_ADMIN_COMMUNITY_ARTICLE_EDIT_DONE		=> W_ADMIN_COMMUNITY_ARTICLE.'の編集が完了しました。',
I_ADMIN_COMMUNITY_ARTICLE_DELETE_DONE	=> W_ADMIN_COMMUNITY_ARTICLE.'の削除が完了しました。',
// コミュニティコメント
I_ADMIN_COMMUNITY_COMMENT_ADD_DONE		=> W_ADMIN_COMMUNITY_COMMENT.'の登録が完了しました。',
I_ADMIN_COMMUNITY_COMMENT_EDIT_DONE		=> W_ADMIN_COMMUNITY_COMMENT.'の編集が完了しました。',
I_ADMIN_COMMUNITY_COMMENT_DELETE_DONE	=> W_ADMIN_COMMUNITY_COMMENT.'の削除が完了しました。',
// コミュニティメンバー
E_ADMIN_COMMUNITY_NOT_MEMBER			=> W_ADMIN_COMMUNITY.'のメンバではありません。',
// 広告
E_ADMIN_AD_CODE_DUPLICATE				=> 'この'.W_ADMIN_AD_CODE.'パラメタは既に使われています。別のパラメタを指定してください。',
I_ADMIN_AD_ADD_DONE						=> W_ADMIN_AD.'登録が完了しました。',
I_ADMIN_AD_EDIT_DONE					=> W_ADMIN_AD.'編集が完了しました。',
I_ADMIN_AD_DELETE_DONE					=> W_ADMIN_AD.'編集が完了しました。',
I_ADMIN_AD_CATEGORY_ADD_DONE			=> W_ADMIN_AD_CATEGORY.'の登録が完了しました。',
I_ADMIN_AD_CATEGORY_DELETE_DONE			=> W_ADMIN_AD_CATEGORY.'の削除が完了しました。',
I_ADMIN_AD_CATEGORY_EDIT_DONE			=> W_ADMIN_AD_CATEGORY.'の編集が完了しました。',
I_ADMIN_AD_CATEGORY_PRIORITY_DONE		=> W_ADMIN_AD_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_AD_CODE_ADD_DONE				=> W_ADMIN_AD_CODE.'の登録が完了しました。',
I_ADMIN_AD_CODE_DELETE_DONE				=> W_ADMIN_AD_CODE.'の削除が完了しました。',
I_ADMIN_AD_CODE_EDIT_DONE				=> W_ADMIN_AD_CODE.'の編集が完了しました。',
I_ADMIN_ADMENU_EDIT_DONE				=> W_ADMIN_ADMENU.'の編集が完了しました。',

// アバター
I_ADMIN_AVATAR_ADD_DONE					=> W_ADMIN_AVATAR.'の登録が完了しました。',
I_ADMIN_AVATAR_DELETE_DONE				=> W_ADMIN_AVATAR.'の削除が完了しました。',
I_ADMIN_AVATAR_EDIT_DONE				=> W_ADMIN_AVATAR.'の編集が完了しました。',
I_ADMIN_AVATAR_CATEGORY_ADD_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の登録が完了しました。',
I_ADMIN_AVATAR_CATEGORY_DELETE_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の削除が完了しました。',
I_ADMIN_AVATAR_CATEGORY_DELETE_STOP		=> W_ADMIN_AVATAR.'の登録があるためご指定の'.W_ADMIN_AVATAR_CATEGORY.'の削除はできません。',
I_ADMIN_AVATAR_CATEGORY_EDIT_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の編集が完了しました。',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'が重複しています。',
I_ADMIN_AVATAR_STAND_ADD_DONE			=> W_ADMIN_AVATAR_STAND.'の登録が完了しました。',
I_ADMIN_AVATAR_STAND_DELETE_DONE		=> W_ADMIN_AVATAR_STAND.'の削除が完了しました。',
I_ADMIN_AVATAR_STAND_EDIT_DONE			=> W_ADMIN_AVATAR_STAND.'の編集が完了しました。',
// バナー
I_ADMIN_BANNER_ADD_DONE					=> W_ADMIN_BANNER.'登録が完了しました。',
I_ADMIN_BANNER_DELETE_DONE				=> W_ADMIN_BANNER.'情報の削除が完了しました。',
I_ADMIN_BANNER_EDIT_DONE				=> W_ADMIN_BANNER.'編集が完了しました。',
// コンテンツ
I_ADMIN_CMS_EDIT_DONE					=> W_ADMIN_CMS.'編集が完了しました。',
// 設定
I_ADMIN_CONFIG_EDIT_DONE						=> W_ADMIN_CONFIG.'編集が完了しました。',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE		=> W_ADMIN_COMMUNITY_CATEGORY.'を追加しました。',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_DELETE_DONE	=> W_ADMIN_COMMUNITY_CATEGORY.'を削除しました。',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE		=> W_ADMIN_COMMUNITY_CATEGORY.'を編集しました。',
I_ADMIN_CONFIG_USER_PROF_DELETE_DONE			=> '項目の削除が完了しました。',
I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE		=> '項目の削除が完了しました。',
// デコメール
I_ADMIN_DECOMAIL_ADD_DONE				=> W_ADMIN_DECOMAIL.'の登録が完了しました。',
I_ADMIN_DECOMAIL_DELETE_DONE			=> W_ADMIN_DECOMAIL.'の削除が完了しました。',
I_ADMIN_DECOMAIL_EDIT_DONE				=> W_ADMIN_DECOMAIL.'の編集が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_ADD_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'の登録が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_DELETE_STOP	=> W_ADMIN_DECOMAIL.'の登録があるためご指定の'.W_ADMIN_DECOMAIL_CATEGORY.'の削除はできません。',
I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.'の削除が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'の編集が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'が重複しています。',
// ゲーム
I_ADMIN_GAME_ADD_DONE					=> W_ADMIN_GAME.'の登録が完了しました。',
I_ADMIN_GAME_DELETE_DONE				=> W_ADMIN_GAME.'の削除が完了しました。',
I_ADMIN_GAME_EDIT_DONE					=> W_ADMIN_GAME.'の編集が完了しました。',
I_ADMIN_GAME_CATEGORY_ADD_DONE			=> W_ADMIN_GAME_CATEGORY.'の登録が完了しました。',
I_ADMIN_GAME_CATEGORY_DELETE_DONE		=> W_ADMIN_GAME_CATEGORY.'の削除が完了しました。',
I_ADMIN_GAME_CATEGORY_DELETE_STOP		=> W_ADMIN_GAME.'の登録があるためご指定の'.W_ADMIN_GAME_CATEGORY.'の削除はできません。',
I_ADMIN_GAME_CATEGORY_EDIT_DONE			=> W_ADMIN_GAME_CATEGORY.'の編集が完了しました。',
I_ADMIN_GAME_CATEGORY_PRIORITY_DONE		=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_GAME_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'が重複しています。',
// サウンド
I_ADMIN_SOUND_ADD_DONE					=> W_ADMIN_SOUND.'の登録が完了しました。',
I_ADMIN_SOUND_DELETE_DONE				=> W_ADMIN_SOUND.'の削除が完了しました。',
I_ADMIN_SOUND_EDIT_DONE					=> W_ADMIN_SOUND.'の編集が完了しました。',
I_ADMIN_SOUND_CATEGORY_ADD_DONE			=> W_ADMIN_SOUND_CATEGORY.'の登録が完了しました。',
I_ADMIN_SOUND_CATEGORY_DELETE_DONE		=> W_ADMIN_SOUND_CATEGORY.'の削除が完了しました。',
I_ADMIN_SOUND_CATEGORY_DELETE_STOP		=> W_ADMIN_SOUND.'の登録があるためご指定の'.W_ADMIN_SOUND_CATEGORY.'の削除はできません。',
I_ADMIN_SOUND_CATEGORY_EDIT_DONE			=> W_ADMIN_SOUND_CATEGORY.'の編集が完了しました。',
I_ADMIN_SOUND_CATEGORY_PRIORITY_DONE		=> W_ADMIN_SOUND_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_SOUND_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_SOUND_CATEGORY.W_ADMIN_PRIORITY.'が重複しています。',
// ビデオ
I_ADMIN_VIDEO_ADD_DONE					=> W_ADMIN_VIDEO.'の登録が完了しました。',
I_ADMIN_VIDEO_DELETE_DONE				=> W_ADMIN_VIDEO.'の削除が完了しました。',
I_ADMIN_VIDEO_EDIT_DONE					=> W_ADMIN_VIDEO.'の編集が完了しました。',
I_ADMIN_VIDEO_CATEGORY_ADD_DONE			=> W_ADMIN_VIDEO_CATEGORY.'の登録が完了しました。',
I_ADMIN_VIDEO_CATEGORY_DELETE_DONE		=> W_ADMIN_VIDEO_CATEGORY.'の削除が完了しました。',
I_ADMIN_VIDEO_CATEGORY_DELETE_STOP		=> W_ADMIN_VIDEO.'の登録があるためご指定の'.W_ADMIN_VIDEO_CATEGORY.'の削除はできません。',
I_ADMIN_VIDEO_CATEGORY_EDIT_DONE			=> W_ADMIN_VIDEO_CATEGORY.'の編集が完了しました。',
I_ADMIN_VIDEO_CATEGORY_PRIORITY_DONE		=> W_ADMIN_VIDEO_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_VIDEO_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_VIDEO_CATEGORY.W_ADMIN_PRIORITY.'が重複しています。',
// フリーページ
I_ADMIN_CONTENTS_ADD_DONE				=> W_ADMIN_CONTENTS.'の登録が完了しました。',
I_ADMIN_CONTENTS_DELETE_DONE			=> W_ADMIN_CONTENTS.'の削除が完了しました。',
I_ADMIN_CONTENTS_EDIT_DONE				=> W_ADMIN_CONTENTS.'の編集が完了しました。',
E_ADMIN_CONTENTS_CODE_DUPLICATE			=> 'この' . W_ADMIN_CONTENTS . 'コードは既に使用されています。',

// ショップ
I_ADMIN_SHOP_ADD_DONE					=> W_ADMIN_SHOP.'の登録が完了しました。',
I_ADMIN_SHOP_DELETE_DONE				=> W_ADMIN_SHOP.'の削除が完了しました。',
I_ADMIN_SHOP_EDIT_DONE					=> W_ADMIN_SHOP.'の編集が完了しました。',
I_ADMIN_SHOP_PRIORITY_EDIT_DONE			=> W_ADMIN_SHOP_PRIORITY_ID.'の編集が完了しました。',
E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD			=> W_ADMIN_SHOP_IMAGE1_FILE.'のアップロードに失敗しました。',
E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD			=> W_ADMIN_SHOP_IMAGE2_FILE.'のアップロードに失敗しました。',

// 商品カテゴリ
I_ADMIN_ITEM_CATEGORY_ADD_DONE				=> W_ADMIN_ITEM_CATEGORY.'の登録が完了しました。',
I_ADMIN_ITEM_CATEGORY_DELETE_DONE			=> W_ADMIN_ITEM_CATEGORY.'の削除が完了しました。',
I_ADMIN_ITEM_CATEGORY_EDIT_DONE				=> W_ADMIN_ITEM_CATEGORY.'の編集が完了しました。',
I_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT_DONE	=> W_ADMIN_ITEM_CATEGORY_PRIORITY_ID.'の編集が完了しました。',
E_ADMIN_ITEM_CATEGORY_SHOP_NOT_FOUND		=> W_ADMIN_ITEM_CATEGORY.'を追加するには、まず',W_ADMIN_SHOP.'を作成してください。',
E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD		=> '画像のアップロードに失敗しました。',

// 商品
I_ADMIN_ITEM_ADD_DONE						=> W_ADMIN_ITEM.'の登録が完了しました。',
I_ADMIN_ITEM_DELETE_DONE					=> W_ADMIN_ITEM.'の削除が完了しました。',
I_ADMIN_ITEM_EDIT_DONE						=> W_ADMIN_ITEM.'の編集が完了しました。',
I_ADMIN_ITEM_PRIORITY_EDIT_DONE				=> W_ADMIN_ITEM_PRIORITY_ID.'の編集が完了しました。',
E_ADMIN_ITEM_ITEM_CATEGORY_NOT_FOUND		=> W_ADMIN_ITEM.'を追加するには、まず',W_ADMIN_ITEM_CATEGORY.'を作成してください。',
E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK	=> '再度'.W_ADMIN_ITEM_IMAGE_FILE.'を選択してください。',
E_ADMIN_ITEM_START_TO_END_TIME				=> W_ADMIN_ITEM_START_TIME.'から'.W_ADMIN_ITEM_END_TIME.'の設定が間違っています。',
E_ADMIN_ITEM_SUPPLIER						=> W_ADMIN_SUPPLIER.'を選択してください。',
E_ADMIN_ITEM_SETTLEMENT						=> W_ADMIN_ITEM_SETTLEMENT.'を選択してください。',
E_ADMIN_ITEM_BUNDLE_STATUS					=> '同梱不可の商品には、複数のタイプを設定出来ません。',
E_ADMIN_ITEM_NO_DUPLICATE					=> W_ADMIN_ITEM_DISTINCTION_ID.'が他'.W_ADMIN_ITEM.'と同じです。',
E_ADMIN_ITEM_IMAGE_FILE_UPLOAD				=> W_ADMIN_ITEM_IMAGE_FILE.'のアップロードに失敗しました。',

// サンプル画像
E_ADMIN_SAMPLE_IMAGE_FILE_UPLOAD			=> W_ADMIN_SAMPLE_IMAGE.'のアップロードに失敗しました。',
E_ADMIN_SAMPLE_PRIORITY_ID_DUPLICATE		=> W_ADMIN_SAMPLE_PRIORITY_ID.'は重複しないように設定してください。',

// 在庫
E_ADMIN_STOCK_NUM							=> 	W_ADMIN_STOCK_NUM.'を入力してください。',

// 仕入先
I_ADMIN_SUPPLIER_ADD_DONE					=> W_ADMIN_SUPPLIER.'の登録が完了しました。',
I_ADMIN_SUPPLIER_DELETE_DONE				=> W_ADMIN_SUPPLIER.'の削除が完了しました。',
I_ADMIN_SUPPLIER_EDIT_DONE					=> W_ADMIN_SUPPLIER.'の編集が完了しました。',
E_ADMIN_SUPPLIER_SETTLEMENT					=> W_ADMIN_SUPPLIER_SETTLEMENT.'を選択してください。',
E_ADMIN_SUPPLIER_NAME_ALREADY_USED			=> 'この'.W_ADMIN_SUPPLIER_NAME.'は既に使用されています。',

// 送料
I_ADMIN_POSTAGE_ADD_DONE					=> W_ADMIN_POSTAGE.'の登録が完了しました。',
I_ADMIN_POSTAGE_DELETE_DONE					=> W_ADMIN_POSTAGE.'の削除が完了しました。',
I_ADMIN_POSTAGE_EDIT_DONE					=> W_ADMIN_POSTAGE.'の編集が完了しました。',
E_ADMIN_POSTAGE_TYPE						=> W_ADMIN_POSTAGE_TYPE.'を指定してください。',
E_ADMIN_POSTAGE_SAME_PRICE					=> W_ADMIN_POSTAGE_SAME_STATUS.'にする場合は、'.W_ADMIN_POSTAGE_SAME_PRICE.'フォームに金額を設定してください。',
E_ADMIN_POSTAGE_NAME_ALREADY_USED			=> 'この'.W_ADMIN_POSTAGE_NAME.'は既に使用されています。',

// 代引き手数料
I_ADMIN_EXCHANGE_ADD_DONE					=> W_ADMIN_EXCHANGE.'の登録が完了しました。',
I_ADMIN_EXCHANGE_DELETE_DONE				=> W_ADMIN_EXCHANGE.'の削除が完了しました。',
I_ADMIN_EXCHANGE_EDIT_DONE					=> W_ADMIN_EXCHANGE.'の編集が完了しました。',
E_ADMIN_EXCHANGE_SAME_PRICE					=> W_ADMIN_EXCHANGE_SAME_STATUS.'にする場合は、'.W_ADMIN_EXCHANGE_SAME_PRICE.'フォームに金額を設定してください。',
E_ADMIN_EXCHANGE_NAME_ALREADY_USED			=> 'この'.W_ADMIN_EXCHANGE_NAME.'は既に使用されています。',

// 代引き手数料金額範囲指定
E_ADMIN_EXCHANGE_RANGE_PRICE				=> W_ADMIN_EXCHANGE_RANGE_PRICE.'には数字(整数)を入力して下さい。',

// レビュー
I_ADMIN_REVIEW_EDIT_DONE				=> W_ADMIN_REVIEW.'の編集が完了しました。',
I_ADMIN_REVIEW_DELETE_DONE				=> W_ADMIN_REVIEW.'の削除が完了しました。',

// 注文
I_ADMIN_USER_ORDER_EDIT_DONE			=> W_ADMIN_USER_ORDER.'の編集が完了しました。',
E_ADMIN_USER_ORDER_DELIVERY_TYPE		=> W_ADMIN_USER_ORDER_DELIVERY_TYPE.'が「指定住所」の場合は'.W_ADMIN_USER_ORDER_DELIVERY_TYPE . '情報を入力してください。',

// カート
I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY		=> '注文商品個数がすべて0になりましたので、'.W_ADMIN_USER_ORDER_GET_POINT.W_ADMIN_POINT.'、'.W_ADMIN_USER_ORDER_TOTAL_PRICE1.'、'.W_ADMIN_USER_ORDER_TOTAL_PRICE2.'、'.W_ADMIN_USER_ORDER_TAX.'、'.W_ADMIN_USER_ORDER_POSTAGE.'、'.W_ADMIN_USER_ORDER_EXCHANGE_FEE.'を0円に変更しました。',E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL	=> 'キャンセルに設定した'.W_ADMIN_USER_ORDER_STATUS.'は変更できません。',
E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN	=> '返品済みに設定した'.W_ADMIN_USER_ORDER_STATUS.'は変更できません。',
E_ADMIN_CART_ITEM_NUM_SUBTRACTION			=> 'ご注文商品内容の'.W_ADMIN_CART_ITEM_NUM.'は減算してください。',

// 発送単位
I_ADMIN_POST_UNIT_MAIL_SENT_DONE		=> '注文者宛に商品発送メールを送信しました。',
I_ADMIN_POST_UNIT_EDIT_DONE		=> '発送情報を更新しました。',


// ファイル
I_ADMIN_FILE_UPLOAD						=> 'ファイルアップロードが完了しました。',
E_ADMIN_FILE_UPLOAD						=> 'ファイルアップロードに失敗しました。',
I_ADMIN_FILE_DELETE						=> 'ファイル削除が完了しました。',
E_ADMIN_FILE_DELETE						=> 'ファイル削除に失敗しました。',
// ログイン
E_ADMIN_LOGIN							=> 'ID、または'.W_ADMIN_PASSWORD.'が間違っています。',
// ログアウト
I_ADMIN_LOGOUT							=> W_ADMIN_LOGOUT.'しました。',
// メールマガジン
I_ADMIN_MAGAZINE_ADD_DONE				=> W_ADMIN_MAGAZINE.'登録が完了しました。',
I_ADMIN_MAGAZINE_DELETE_DONE			=> W_ADMIN_MAGAZINE.'情報の削除が完了しました。',
I_ADMIN_MAGAZINE_EDIT_DONE				=> W_ADMIN_MAGAZINE.'編集が完了しました。',
I_ADMIN_MAGAZINE_STOP_DONE				=> W_ADMIN_MAGAZINE.'強制終了が完了しました。',

// 入会経路
E_ADMIN_MEDIA_CODE_DUPLICATE			=> 'この識別コードは既に使用されています。',
I_ADMIN_MEDIA_ADD_DONE					=> W_ADMIN_MEDIA.'追加が完了しました。',
I_ADMIN_MEDIA_DELETE_DONE				=> W_ADMIN_MEDIA.'情報の削除が完了しました。',
I_ADMIN_MEDIA_EDIT_DONE					=> W_ADMIN_MEDIA.'編集が完了しました。',
// ニュース
I_ADMIN_NEWS_ADD_DONE					=> W_ADMIN_NEWS.'追加が完了しました。',
I_ADMIN_NEWS_EDIT_DONE					=> W_ADMIN_NEWS.'編集が完了しました。',
I_ADMIN_NEWS_DELETE_DONE					=> W_ADMIN_NEWS.'削除が完了しました。',
// ユーザ
E_ADMIN_USER_NOT_FOUND					=> '存在しない'.W_ADMIN_USER.'です',
E_ADMIN_USER_COMMUNITY_EDIT_ADMIN		=> W_ADMIN_COMMUNITY_ADMIN.'の状態は変更できません。',
E_ADMIN_USER_FRIEND_EDIT_APPLYING		=> '申請中の'.W_ADMIN_FRIEND_NAME.'状態は変更できません',
E_ADMIN_USER_FRIEND_INVALID				=> W_ADMIN_FRIEND_NAME.'の指定が不正です。',
I_ADMIN_USER_FRIEND_INTRODUCTION_EDIT_DONE => W_ADMIN_FRIEND_INTRODUCTION.'編集が完了しました。',
I_ADMIN_USER_COMMUNITY_EDIT_DONE		=> W_ADMIN_USER.'の'.W_ADMIN_COMMUNITY.'メンバー状態を変更しました',
I_ADMIN_USER_EDIT_DONE					=> W_ADMIN_USER.'情報を編集が完了しました',
I_ADMIN_USER_FRIEND_EDIT_DONE			=> W_ADMIN_USER.'の'.W_ADMIN_FRIEND_NAME.'状態を変更しました',
E_ADMIN_USER_MAILADDRESS_ERROR			=> W_ADMIN_MAILADDRESS.'の形式が不正です',
// NGワード
E_ADMIN_NGWORD_EDIT_DONE				=> W_ADMIN_NGWORD.'編集が完了しました',
// セグメント
I_ADMIN_SEGMENT_ADD_DONE					=> W_ADMIN_SEGMENT.'追加が完了しました。',
I_ADMIN_SEGMENT_EDIT_DONE					=> W_ADMIN_SEGMENT.'編集が完了しました。',
I_ADMIN_SEGMENT_DELETE_DONE					=> W_ADMIN_SEGMENT.'削除が完了しました。',

// ユーザ側
// 共通
E_USER_ACCESS_DENIED					=> 'ｱｸｾｽ権限がありません',
E_USER_DB								=> 'DBｴﾗｰ',
E_USER_NOT_FOUND						=> W_USER_USER . 'は既に退会したか、存在しない' . W_USER_USER . 'IDです',
E_USER_IDENTIFY							=> W_USER_IDENTIFY.'に失敗しました',
E_USER_DUPLICATE_POST					=> W_USER_DUPLICATE_POST.'は禁止されています',
E_USER_PASSWORD							=> W_USER_PASSWORD.'が違います。',
E_USER_PLEASE_LOGIN						=> W_USER_LOGIN.'してください',
E_USER_POINT_SHORTAGE					=> W_USER_POINT.'が足りません',
// 広告
E_USER_AD_OUT_OF_DATE					=> 'この'.W_USER_AD.'は配信を終了しました',
E_USER_AD_PC							=> '大変申し訳ありませんがPC'.W_USER_AD.'には非対応となっております。',
E_USER_AD_MOBILE						=> '大変申し訳ありませんがこの'.W_USER_AD.'はお客様のキャリアではご利用になる事ができません。',
E_USER_AD_STOCK_OVER					=> 'この'.W_ADMIN_AD.'は配信を終了しました｡',
E_USER_AD_NOT_START						=> 'この'.W_USER_AD.'はまだ配信を開始していません｡',

// アバター
E_USER_AVATAR_DUPLICATE					=> 'この'.W_USER_AVATAR.'は既に購入しています',
E_USER_AVATAR_ALREADY_IN_CART			=> 'この'.W_USER_AVATAR.'は既に'.W_USER_CART.'の中に入っています',
E_USER_AVATAR_SELECT					=> W_USER_AVATAR.'を選択してください。',

E_USER_AVATAR_SEX						=> W_USER_PROFILE.'にて性別を選択してください',
I_USER_AVATAR_BUY_DONE					=> W_USER_AVATAR.'の購入が完了しました',
I_USER_AVATAR_CHANGE_DONE				=> W_USER_AVATAR.'を着替えました',
// 伝言板
E_USER_BBS_MESSAGE_NOT_FOUND			=> W_USER_BBS_MESSAGE.'が存在しません。',
// ブラックリスト
E_USER_BLACKLIST						=> W_USER_BLACKLIST . 'に登録されているためこの操作は行えません｡',
E_USER_BLACKLIST_DUPLICATE				=> '既に' . W_USER_BLACKLIST . '登録をしています',
I_USER_BLACKLIST_DELETE_DONE			=> W_USER_BLACKLIST . '登録を解除しました',
E_USER_BLACKLIST_HOME					=> 'お客様のご都合によりこの操作は行えません',
// ブログ
E_USER_BLOG_ARTICLE_ACCESS_DENIED		=> 'この'.W_USER_BLOG_ARTICLE.'にはｱｸｾｽできません',
E_USER_BLOG_ARTICLE_NOT_FOUND			=> 'この'.W_USER_BLOG_ARTICLE.'は存在しません',
E_USER_BLOG_COMMENT_ACCESS_DENIED		=> 'この'.W_USER_BLOG_COMMENT.'にはｱｸｾｽできません',
E_USER_BLOG_COMMENT_NOT_FOUND			=> 'この'.W_USER_BLOG_COMMENT.'は存在しません',
I_USER_BLOG_ARTICLE_ADD_DONE			=> '投稿しました',
// コメント
E_USER_COMMENT_NOT_FOUND				=> W_USER_COMMENT.'は存在しません',
// コミュニティー
E_USER_COMMUNITY_ADMIN					=> 'あなたは'.W_USER_COMMUNITY_ADMIN.'ではありません',
E_USER_COMMUNITY_APPLIED				=> '既に参加申請をしています',
E_USER_COMMUNITY_DUPLICATE				=> '既にこの'.W_USER_COMMUNITY.'に参加しています',
E_USER_COMMUNITY_RESIGN_ADMIN			=> W_USER_COMMUNITY_ADMIN.'は退会できません',
E_USER_COMMUNITY_ADMIN_FORMER_GET		=> W_USER_COMMUNITY_ADMIN.'情報取得エラーです。もう一度はじめからお願いします。',
E_USER_COMMUNITY_ADMIN_FORMER_SET		=> W_USER_COMMUNITY_ADMIN.'情報更新エラーです。もう一度はじめからお願いします。',
E_USER_COMMUNITY_ADMIN_GIVE				=> 'その' . W_USER_USER . 'に'.W_USER_COMMUNITY_ADMINISTRATION.'は渡せません',
E_USER_COMMUNITY_ADMIN_GIVE_SELF		=> W_USER_COMMUNITY_ADMINISTRATION.'は自分以外の' . W_USER_USER . 'に渡してください',
E_USER_COMMUNITY_ADMIN_LATER_GET		=> '新'.W_USER_COMMUNITY_ADMIN.'情報取得エラーです。もう一度はじめからお願いします。',
E_USER_COMMUNITY_ADMIN_LATER_SET		=> '新'.W_USER_COMMUNITY_ADMIN.'情報更新エラーです。もう一度はじめからお願いします。',
E_USER_COMMUNITY_ACCESS_DENIED			=> 'あなたはこの'.W_USER_COMMUNITY.'にｱｸｾｽできません',
E_USER_COMMUNITY_ARTICLE_ADD_DENIED		=> 'あなたは'.W_USER_COMMUNITY_ARTICLE.'を作れません',
E_USER_COMMUNITY_ARTICLE_NOT_FOUND		=> 'この'.W_USER_COMMUNITY_ARTICLE.'は存在しません',
E_USER_COMMUNITY_COMMENT_ACCESS_DENIED	=> 'この'.W_USER_COMMUNITY_COMMENT.'にはｱｸｾｽできません',
E_USER_COMMUNITY_COMMENT_NOT_FOUND		=> 'この'.W_USER_COMMUNITY_COMMENT.'は存在しません',
E_USER_COMMUNITY_MEMBER_NOT_FOUND		=> 'この'.W_USER_COMMUNITY.'のﾒﾝﾊﾞｰではありません',
E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN	=> W_USER_COMMUNITY_ADMIN.'はﾒﾝﾊﾞｰから外せません',
I_USER_COMMUNITY_ADMIN_GIVE_DONE		=> W_USER_COMMUNITY_ADMINISTRATION.'の譲渡が完了しました',
I_USER_COMMUNITY_COMMENT_DELETE_DONE	=> W_USER_COMMUNITY_COMMENT.'を削除しました',
I_USER_COMMUNITY_MEMBER_REMOVE_DONE		=> '該当ﾕｰｻﾞを'.W_USER_COMMUNITY.'ﾒﾝﾊﾞｰから除外しました',
E_USER_COMMUNITY_ACCEPTED_DONE				=> W_USER_COMMUNITY.'への参加を承認しました',
E_USER_COMMUNITY_ACCEPTED_DENIED			=> W_USER_COMMUNITY.'への参加を拒否しました',

// 設定
E_USER_CONFIG_FORMER_PASSWORD			=> '旧'.W_USER_PASSWORD.'が間違っています',
// デコメール
E_USER_DECOMAIL_DUPLICATE				=> 'この'.W_USER_DECOMAIL.'は既に購入しています',
I_USER_DECOMAIL_BUY_DONE				=> W_USER_DECOMAIL.'購入が完了しました',
E_USER_DECOMAIL_OUT_OF_DATE				=> '大変申し訳ありませんがこの'.W_USER_DECOMAIL.'は販売期間が終了してしまいました｡',
// 友達
E_USER_FRIEND_DELETE_APPLYING			=> W_USER_FRIEND.'申請中に解除することはできません',
E_USER_FRIEND_DELETE_DONE				=> '既に'.W_USER_FRIEND.'を解除しています',
E_USER_FRIEND_DELETE_NOT_FRIEND			=> 'まだ'.W_USER_FRIEND_NAME.'になっていません',
E_USER_FRIEND_DUPLICATE					=> '既に'.W_USER_FRIEND.'に入っています',
E_USER_FRIEND_APPLY_DUPLICATE			=> '既に'.W_USER_FRIEND.'申請をしています',
E_USER_FRIEND_INTRODUCTION_DENIED		=> 'この'.W_USER_USER.'の紹介文は書けません',
I_USER_FRIEND_DELETE_DONE				=> W_USER_FRIEND.'を解除しました',
// ゲーム
E_USER_GAME_ACCESS_DENIED				=> 'この'.W_USER_GAME.'にはｱｸｾｽできません',
I_USER_GAME_BUY_DONE					=> W_USER_GAME.'購入が完了しました',
E_USER_GAME_OUT_OF_DATE					=> '大変申し訳ありませんがこの'.W_USER_GAME.'は販売期間が終了してしまいました｡',

// サウンド
E_USER_SOUND_ACCESS_DENIED				=> 'この'.W_USER_SOUND.'にはｱｸｾｽできません',
I_USER_SOUND_BUY_DONE					=> W_USER_SOUND.'購入が完了しました',
E_USER_SOUND_OUT_OF_DATE					=> '大変申し訳ありませんがこの'.W_USER_SOUND.'は販売期間が終了してしまいました｡',

// ビデオ
E_USER_VIDEO_ACCESS_DENIED				=> 'この'.W_USER_VIDEO.'にはｱｸｾｽできません',
I_USER_VIDEO_BUY_DONE					=> W_USER_VIDEO.'購入が完了しました',
E_USER_VIDEO_OUT_OF_DATE					=> '大変申し訳ありませんがこの'.W_USER_VIDEO.'は販売期間が終了してしまいました｡',


// フリーページ
E_USER_CONTENTS_NOT_FOUND				=> '存在しない'.W_USER_CONTENTS.'です',
// 招待
E_USER_INVITE_VALID_USER				=> 'このﾒｰﾙｱﾄﾞﾚｽは既に登録されています',
E_USER_INVITE_CHAPCHA					=> '画像の数字と入力された数字が一致しませんでした',
E_USER_INVITE_DUPLICATE					=> '既に'.W_USER_FRIEND_NAME.'招待されている' . W_USER_USER . 'です',
E_USER_INVITE_MAILADDRESS				=> W_USER_MAILADDRESS.'には'.W_USER_FRIEND_NAME.'の'.W_USER_MAILADDRESS.'を入力してください',
E_USER_INVITE_PCMAILADDRESS				=> 'PCﾒｰﾙｱﾄﾞﾚｽは招待できません。',

// メッセージ
E_USER_MESSAGE_NOT_FOUND				=> W_USER_MESSAGE . 'が存在しません',
I_USER_MESSAGE_DELETE_DONE				=> W_USER_MESSAGE . 'の削除が完了しました',
// 招待
E_USER_INVITE_NAME_NOT_FOUND			=> W_USER_INVITE_NAME.'が存在しません',
// ログイン
E_USER_LOGIN							=> W_USER_MAILADDRESS.'または'.W_USER_PASSWORD.'が違います',
E_USER_LOGIN_MOBILE_ONLY				=> 'パソコンからはご利用頂けません',
I_USER_LOGIN_DONE						=> W_USER_LOGIN.'しました',
// ログアウト
I_USER_LOGOUT_DONE						=> W_USER_LOGOUT.'しました',
// プロフィール
I_USER_PROFILE_EDIT_DONE				=> W_USER_PROFILE.'を編集しました',
E_USER_NICKNAME_ALREADY_USED				=> 'この'.W_USER_NICKNAME.'は既に使用されています。',
// 友達検索
E_USER_SEARCH_NO_KEY					=> '検索条件を入力して下さい',
// 会員登録
E_USER_REGIST_NO_USER_HASH				=> 'もう一度会員登録メールに記載のURLからアクセスして下さい。',
E_USER_REGIST_10						=> '既に会員か、退会しているため登録処理を行うことができません。',
E_USER_REGIST_20						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_30						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_40						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_50						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
I_USER_REGIST_DONE						=> W_USER_USER_REGIST.'が完了しました。',
E_USER_BIRTHDAY_ERROR					=> '不正な生年月日です。',
E_USER_NICKNAME_EMOJI					=> W_USER_NICKNAME.'に絵文字は使用できません。',
E_USER_NICKNAME_LENGTH					=> W_USER_NICKNAME.'は128文字以下で入力してください。',
E_USER_XUID								=>'携帯電話の個体識別情報を送信する設定として下さい。',
	
// リマインダー
I_USER_REMIND_DONE						=> W_USER_LOGIN.'情報を指定'.W_USER_MAILADDRESS.'宛に送信しました。'.W_USER_MAILADDRESS.'が間違っている場合はﾒｰﾙが届きませんのでご注意ください。',
// 退会
E_USER_RESIGN_COMMUNITY					=> 'あなたが'.W_USER_COMMUNITY_ADMIN.'の'.W_USER_COMMUNITY.'があります。'.W_USER_COMMUNITY_ADMINISTRATION.'を譲渡してください。',
// 商品
E_USER_ITEM_NOT_FOUND					=> '存在しない' . W_USER_ITEM . 'です。',
E_USER_ITEM_BUDGET						=> '予算金額をご確認ください。',
E_USER_ITEM_BUNDLE_STATUS					=> 'この商品は、他の商品との同梱が出来ないため、1個購入ごとに送料と代引手数料が加算されます。',
// カート
I_USER_CART_DELETE_DONE					=> W_USER_CART . 'から指定の' . W_USER_ITEM . 'を削除しました。',
E_USER_CART_EMPTY						=> W_USER_CART . 'の中に' . W_USER_ITEM . 'がありません。',
E_USER_CART_ITEM_NUM					=> '同じ商品は9個までしか' . W_USER_CART . '買い物カゴに入りません。',
// ファイル
E_USER_FILE_NOT_FOUND					=> 'ファイルが存在しません。',
E_USER_FILE_TYPE_UNMATCHED				=> 'ファイル形式が対応していません。',
// ユーザ
E_USER_BIRTHDAY							=> W_USER_BIRTHDAY . 'を正しく入力してください｡',
// レビュー
E_USER_REVIEW_NOT_EXIST					=> '無効なレビューです。',
// 在庫
E_USER_STOCK_OUT						=> '大変申し訳ございませんが、この商品は品切れです。',
E_USER_STOCK_OVER						=> '在庫数をオーバーしています。個数を少なくして再度ご注文ください。',
E_USER_STOCK_ORDER_OVER					=> '大変申し訳ありませんがお買い物中に以下の商品が在庫切れとなってしまいました。',
// 注文
E_USER_ORDER_USE_POINT_OVER				=> '使用する' . W_USER_POINT . 'は所有' . W_USER_POINT . '以内で入力してください。',
E_USER_ORDER_USE_POINT_MIN				=> '使用する' . W_USER_POINT . 'は100以上で入力してください。',
E_USER_ORDER_USE_POINT_MAX				=> '使用する' . W_USER_POINT . 'は商品代金合計以内で入力してください。',
E_USER_ORDER_USE_CARD_ERROR				=> 'ｸﾚｼﾞｯﾄ決済に失敗しました。',
E_USER_ORDER_USE_CONVENI_ERROR			=> 'ｺﾝﾋﾞﾆ決済に失敗しました。',
E_USER_ORDER_CARD_TYPE					=> W_USER_ORDER_CARD_TYPE . 'を選択してください｡',
E_USER_ORDER_CARD_NUMBER				=> W_USER_ORDER_CARD_NUMBER . 'を半角数字のみで正しく入力してください｡',
E_USER_ORDER_CARD_NAME					=> W_USER_ORDER_CARD_NAME . 'を入力してください｡',
E_USER_ORDER_CARD_MONTH					=> W_USER_ORDER_CARD_MONTH . 'を選択してください｡',
E_USER_ORDER_CARD_YEAR					=> W_USER_ORDER_CARD_YEAR . 'を選択してください｡',
E_USER_ORDER_CARD_TERM					=> W_USER_ORDER_CARD_TERM . 'を確認してください｡',
E_USER_ORDER_CONVENI_TYPE				=> W_USER_ORDER_CONVENI . 'を選択してください｡',
E_USER_ORDER_DELIVERY_NAME				=> W_USER_ORDER_DELIVERY_NAME . 'を入力してください｡',
E_USER_ORDER_DELIVERY_NAME_KANA			=> W_USER_ORDER_DELIVERY_NAME_KANA . 'を入力してください｡',
E_USER_ORDER_DELIVERY_ZIPCODE			=> W_USER_ORDER_DELIVERY_ZIPCODE . 'を半角数字のみで正しく入力してください｡',
E_USER_ORDER_DELIVERY_ADDRESS			=> W_USER_ORDER_DELIVERY_ADDRESS . 'を入力してください｡',
E_USER_ORDER_DELIVERY_PHONE				=> W_USER_ORDER_DELIVERY_PHONE . 'を半角数字のみで正しく入力してください｡',
E_USER_ORDER_TYPE_EMPTY					=> W_USER_CART . 'に入っている商品に共通で利用可能な支払方法がありません｡商品を削除して再度お試し下さい｡',
E_USER_ORDER_TYPE						=> '決済方法が選択されていません｡',
E_USER_ORDER_ITEM_NOT_FOUND				=> '大変申し訳ありませんが､購入対象の商品は販売期間を終了いたしました｡',
E_USER_ORDER_LOGIN						=> 'お買い物中の方は'.W_USER_LOGIN.'して決済情報を入力して下さい。',

);
?>