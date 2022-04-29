<?php
/**
 *  Tv_Error.php
 * エラー定義
 *
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 共通エラー番号定義
 */

$i = 260;
define('E_INVALID_DATE', $i++);

/**
 * 管理エラー番号定義
 */
/* =============================================
// 共通
 ============================================= */
define('E_ADMIN_DB', $i++);
define('I_ADMIN_UPDATE_STATUS_ALL_DONE', $i++);

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
define('I_ADMIN_AD_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_AD_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_AD_CODE_ADD_DONE', $i++);
define('I_ADMIN_AD_CODE_DELETE_DONE', $i++);
define('I_ADMIN_AD_CODE_EDIT_DONE', $i++);

/* =============================================
// アバター
 ============================================= */
define('I_ADMIN_AVATAR_ADD_DONE', $i++);
define('I_ADMIN_AVATAR_DELETE_DONE', $i++);
define('I_ADMIN_AVATAR_EDIT_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE', $i++);
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
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE', $i++);

/* =============================================
// ゲーム
 ============================================= */
define('I_ADMIN_GAME_ADD_DONE', $i++);
define('I_ADMIN_GAME_DELETE_DONE', $i++);
define('I_ADMIN_GAME_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_PRIORITY_DONE', $i++);

/* =============================================
// フリーページ
 ============================================= */
define('I_ADMIN_CONTENTS_ADD_DONE', $i++);
define('I_ADMIN_CONTENTS_DELETE_DONE', $i++);
define('I_ADMIN_CONTENTS_EDIT_DONE', $i++);
define('I_ADMIN_CONTENTS_CODE_DUPLICATE', $i++);

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

/* =============================================
// ユーザ
 ============================================= */
define('E_ADMIN_USER_DUPLICATE', $i++);
define('E_ADMIN_USER_NOT_FOUND', $i++);
define('E_ADMIN_USER_COMMUNITY_EDIT_ADMIN', $i++);
define('E_ADMIN_USER_FRIEND_EDIT_APPLYING', $i++);
define('E_ADMIN_USER_FRIEND_INVALID', $i++);
define('I_ADMIN_USER_COMMUNITY_EDIT_DONE', $i++);
define('I_ADMIN_USER_EDIT_DONE', $i++);
define('I_ADMIN_USER_FRIEND_EDIT_DONE', $i++);

/* =============================================
// 管理者
 ============================================= */
define('I_ADMIN_ACCOUNT_ADD_DONE', $i++);
define('I_ADMIN_ACCOUNT_EDIT_DONE', $i++);
define('I_ADMIN_ACCOUNT_DELETE_DONE', $i++);
define('E_ADMIN_ID_DUPLICATE', $i++);

/* =============================================
// twitter
 ============================================= */
define('I_ADMIN_THEMA_ADD_DONE', $i++);
define('I_ADMIN_THEMA_DELETE_DONE', $i++);
define('I_ADMIN_THEMA_EDIT_DONE', $i++);

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

/* =============================================
// アバター
 ============================================= */
define('E_USER_AVATAR_DUPLICATE', $i++);
define('E_USER_AVATAR_SEX', $i++);
define('E_USER_AVATAR_INVALID', $i++);
define('I_USER_AVATAR_BUY_DONE', $i++);
define('I_USER_AVATAR_CHANGE_DONE', $i++);
define('I_USER_AVATAR_DELETE_DONE', $i++);

/* =============================================
// 伝言板
 ============================================= */
define('E_USER_BBS_MESSAGE_NOT_FOUND', $i++);

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
define('E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED', $i++);
define('E_USER_COMMUNITY_ARTICLE_ADD_DENIED', $i++);
define('E_USER_COMMUNITY_ARTICLE_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_COMMENT_ACCESS_DENIED', $i++);
define('E_USER_COMMUNITY_COMMENT_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_MEMBER_NOT_FOUND', $i++);
define('E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN', $i++);
define('I_USER_COMMUNITY_ADMIN_GIVE_DONE', $i++);
define('I_USER_COMMUNITY_COMMENT_DELETE_DONE', $i++);

/* =============================================
// 設定
 ============================================= */
define('E_USER_CONFIG_FORMER_PASSWORD', $i++);

/* =============================================
// デコメール
 ============================================= */
define('E_USER_DECOMAIL_DUPLICATE', $i++);
define('I_USER_DECOMAIL_BUY_DONE', $i++);

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

/* =============================================
// メッセージ
 ============================================= */
define('E_USER_MESSAGE_NOT_FOUND', $i++);
define('I_USER_MESSAGE_DELETE_DONE', $i++);

/* =============================================
// ログイン
 ============================================= */
define('E_USER_LOGIN', $i++);
define('E_USER_LOGIN_MOBILE_ONLY', $i++);

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
define('E_USER_REGIST_10', $i++);
define('E_USER_REGIST_20', $i++);
define('E_USER_REGIST_30', $i++);
define('E_USER_REGIST_40', $i++);
define('E_USER_REGIST_50', $i++);
define('I_USER_REGIST_DONE', $i++);

/* =============================================
// リマインダー
 ============================================= */
define('I_USER_REMIND_DONE', $i++);

/* =============================================
// 退会
 ============================================= */
define('E_USER_RESIGN_COMMUNITY', $i++);



/**
 * エラーメッセージ定義
 */
$errorMessage = array(
// 共通
E_INVALID_DATE							=> '無効な日付です',
// 管理側
E_ADMIN_DB								=> 'DBエラー',
I_ADMIN_UPDATE_STATUS_ALL_DONE			=> W_ADMIN_CHECKED.'状況を更新しました。',
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
I_ADMIN_AD_CATEGORY_ADD_DONE			=> W_ADMIN_AD_CATEGORY.'の登録が完了しました。',
I_ADMIN_AD_CATEGORY_DELETE_DONE			=> W_ADMIN_AD_CATEGORY.'の削除が完了しました。',
I_ADMIN_AD_CATEGORY_EDIT_DONE			=> W_ADMIN_AD_CATEGORY.'の編集が完了しました。',
I_ADMIN_AD_CATEGORY_PRIORITY_DONE		=> W_ADMIN_AD_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
I_ADMIN_AD_CODE_ADD_DONE				=> W_ADMIN_AD_CODE.'の登録が完了しました。',
I_ADMIN_AD_CODE_DELETE_DONE				=> W_ADMIN_AD_CODE.'の削除が完了しました。',
I_ADMIN_AD_CODE_EDIT_DONE				=> W_ADMIN_AD_CODE.'の編集が完了しました。',
// アバター
I_ADMIN_AVATAR_ADD_DONE					=> W_ADMIN_AVATAR.'の登録が完了しました。',
I_ADMIN_AVATAR_DELETE_DONE				=> W_ADMIN_AVATAR.'の削除が完了しました。',
I_ADMIN_AVATAR_EDIT_DONE				=> W_ADMIN_AVATAR.'の編集が完了しました。',
I_ADMIN_AVATAR_CATEGORY_ADD_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の登録が完了しました。',
I_ADMIN_AVATAR_CATEGORY_DELETE_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の削除が完了しました。',
I_ADMIN_AVATAR_CATEGORY_EDIT_DONE		=> W_ADMIN_AVATAR_CATEGORY.'の編集が完了しました。',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
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
I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.'の削除が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'の編集が完了しました。',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
// ゲーム
I_ADMIN_GAME_ADD_DONE					=> W_ADMIN_GAME.'の登録が完了しました。',
I_ADMIN_GAME_DELETE_DONE				=> W_ADMIN_GAME.'の削除が完了しました。',
I_ADMIN_GAME_EDIT_DONE					=> W_ADMIN_GAME.'の編集が完了しました。',
I_ADMIN_GAME_CATEGORY_ADD_DONE			=> W_ADMIN_GAME_CATEGORY.'の登録が完了しました。',
I_ADMIN_GAME_CATEGORY_DELETE_DONE		=> W_ADMIN_GAME_CATEGORY.'の削除が完了しました。',
I_ADMIN_GAME_CATEGORY_EDIT_DONE			=> W_ADMIN_GAME_CATEGORY.'の編集が完了しました。',
I_ADMIN_GAME_CATEGORY_PRIORITY_DONE		=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'更新が完了しました。',
// フリーページ
I_ADMIN_CONTENTS_ADD_DONE				=> W_ADMIN_CONTENTS.'の登録が完了しました。',
I_ADMIN_CONTENTS_DELETE_DONE			=> W_ADMIN_CONTENTS.'の削除が完了しました。',
I_ADMIN_CONTENTS_EDIT_DONE				=> W_ADMIN_CONTENTS.'の編集が完了しました。',
E_ADMIN_CONTENTS_CODE_DUPLICATE			=> 'この' . W_ADMIN_CONTENTS . 'コードは既に使用されています。',
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
// 入会経路
E_ADMIN_MEDIA_CODE_DUPLICATE			=> 'この識別コードは既に使用されています。',
I_ADMIN_MEDIA_ADD_DONE					=> W_ADMIN_MEDIA.'追加が完了しました。',
I_ADMIN_MEDIA_DELETE_DONE				=> W_ADMIN_MEDIA.'情報の削除が完了しました。',
I_ADMIN_MEDIA_EDIT_DONE					=> W_ADMIN_MEDIA.'編集が完了しました。',
// ニュース
I_ADMIN_NEWS_ADD_DONE					=> W_ADMIN_NEWS.'追加が完了しました。',
I_ADMIN_NEWS_EDIT_DONE					=> W_ADMIN_NEWS.'編集が完了しました。',
// ユーザ
E_ADMIN_USER_NOT_FOUND					=> '存在しない'.W_ADMIN_USER.'です',
E_ADMIN_USER_COMMUNITY_EDIT_ADMIN		=> W_ADMIN_COMMUNITY_ADMIN.'の状態は変更できません。',
E_ADMIN_USER_FRIEND_EDIT_APPLYING		=> '申請中の'.W_ADMIN_FRIEND_NAME.'状態は変更できません',
E_ADMIN_USER_FRIEND_INVALID				=> ADMIN_FRIEND_NAME.'の指定が不正です。',
I_ADMIN_USER_COMMUNITY_EDIT_DONE		=> 	W_ADMIN_USER.'の'.W_ADMIN_COMMUNITY.'メンバー状態を変更しました',
I_ADMIN_USER_FRIEND_EDIT_DONE			=> 	W_ADMIN_USER.'の'.W_ADMIN_FRIEND_NAME.'状態を変更しました',
// twitter
I_ADMIN_THEMA_ADD_DONE					=> W_ADMIN_THEMA.'の登録が完了しました。',
I_ADMIN_THEMA_DELETE_DONE				=> W_ADMIN_THEMA.'の削除が完了しました。',
I_ADMIN_THEMA_EDIT_DONE					=> W_ADMIN_THEMA.'の編集が完了しました。',

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
// アバター
E_USER_AVATAR_DUPLICATE					=> 'この'.W_USER_AVATAR.'は既に購入しています',
E_USER_AVATAR_SEX						=> W_USER_PROFILE.'にて性別を選択してください',
E_USER_AVATAR_INVALID					=> 'この' . W_USER_AVATAR . 'にはｱｸｾｽできません',
I_USER_AVATAR_BUY_DONE					=> W_USER_AVATAR.'の購入が完了しました',
I_USER_AVATAR_CHANGE_DONE				=> W_USER_AVATAR.'を着替えました',
I_USER_AVATAR_DELETE_DONE				=> W_USER_AVATAR.'を削除しました',
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
// コミュニティ
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
E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED	=> 'この'.W_USER_COMMUNITY_ARTICLE.'にはｱｸｾｽできません',
E_USER_COMMUNITY_ARTICLE_ADD_DENIED		=> 'あなたは'.W_USER_COMMUNITY_ARTICLE.'を作れません',
E_USER_COMMUNITY_ARTICLE_NOT_FOUND		=> 'この'.W_USER_COMMUNITY_ARTICLE.'は存在しません',
E_USER_COMMUNITY_COMMENT_ACCESS_DENIED	=> 'この'.W_USER_COMMUNITY_COMMENT.'にはｱｸｾｽできません',
E_USER_COMMUNITY_COMMENT_NOT_FOUND		=> 'この'.W_USER_COMMUNITY_COMMENT.'は存在しません',
E_USER_COMMUNITY_MEMBER_NOT_FOUND		=> 'この'.W_USER_COMMUNITY.'のﾒﾝﾊﾞｰではありません',
E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN	=> W_USER_COMMUNITY_ADMIN.'はﾒﾝﾊﾞｰから外せません',
I_USER_COMMUNITY_ADMIN_GIVE_DONE		=> W_USER_COMMUNITY_ADMINISTRATION.'の譲渡が完了しました',
I_USER_COMMUNITY_COMMENT_DELETE_DONE	=> W_USER_COMMUNITY_COMMENT.'を削除しました',
// 設定
E_USER_CONFIG_FORMER_PASSWORD			=> '旧'.W_USER_PASSWORD.'が間違っています',
// デコメール
E_USER_DECOMAIL_DUPLICATE				=> 'この'.W_USER_DECOMAIL.'は既に購入しています',
I_USER_DECOMAIL_BUY_DONE				=> W_USER_DECOMAIL.'購入が完了しました',
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
// フリーページ
E_USER_CONTENTS_NOT_FOUND				=> '存在しない'.W_USER_CONTENTS.'です',
// 招待
E_USER_INVITE_VALID_USER				=> 'このﾒｰﾙｱﾄﾞﾚｽは既に登録されています',
E_USER_INVITE_CHAPCHA					=> '画像の数字と入力された数字が一致しませんでした',
E_USER_INVITE_DUPLICATE					=> '既に'.W_USER_FRIEND_NAME.'招待されている' . W_USER_USER . 'です',
E_USER_INVITE_MAILADDRESS				=> W_USER_MAILADDRESS.'には'.W_USER_FRIEND_NAME.'の'.W_USER_MAILADDRESS.'を入力してください',
// メッセージ
E_USER_MESSAGE_NOT_FOUND				=> W_USER_MESSAGE . 'が存在しません',
I_USER_MESSAGE_DELETE_DONE				=> W_USER_MESSAGE . 'の削除が完了しました',
// ログイン
E_USER_LOGIN							=> W_USER_MAILADDRESS.'または'.W_USER_PASSWORD.'が違います',
E_USER_LOGIN_MOBILE_ONLY				=> 'パソコンからはご利用頂けません',
// ログアウト
I_USER_LOGOUT_DONE						=> W_USER_LOGOUT.'しました',
// プロフィール
I_USER_PROFILE_EDIT_DONE				=> W_USER_PROFILE.'を編集しました',
E_USER_NICKNAME_ALREADY_USED				=> 'この'.W_USER_NICKNAME.'は既に使用されています。',
// 友達検索
E_USER_SEARCH_NO_KEY					=> '検索条件を入力して下さい',
// 会員登録
E_USER_REGIST_10						=> '既に会員か、退会しているため登録処理を行うことができません。',
E_USER_REGIST_20						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_30						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_40						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
E_USER_REGIST_50						=> '会員情報を登録できませんでした。もう一度登録をお願いいたします。',
I_USER_REGIST_DONE						=> W_USER_USER_REGIST.'が完了しました。',
// リマインダー
I_USER_REMIND_DONE						=> W_USER_LOGIN.'情報を指定'.W_USER_MAILADDRESS.'宛に送信しました。'.W_USER_MAILADDRESS.'が間違っている場合はﾒｰﾙが届きませんのでご注意ください。',
// 退会
E_USER_RESIGN_COMMUNITY					=> 'あなたが'.W_USER_COMMUNITY_ADMIN.'の'.W_USER_COMMUNITY.'があります。'.W_USER_COMMUNITY_ADMINISTRATION.'を譲渡してください。',
);

?>
