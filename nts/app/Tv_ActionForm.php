<?php
// vim: foldmethod=marker
/**
 *  Tv_ActionForm.php
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @version	$Id: app.actionform.php,v 1.1 2006/08/22 15:52:26 fujimoto Exp $
 */

// {{{ Tv_ActionForm
/**
 *  アクションフォームクラス
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @access	 public
 */
class Tv_ActionForm extends Ethna_ActionForm
{
	/**#@+
	 *  @access private
	 */
	
	/** @var	array   フォーム値定義(デフォルト) */
	var $form_template = array(
		/* =============================================
		// 基本語句
		 ============================================= */
		// アイコン
		'menu_icon' => array('name'=> W_USER_MENU_ICON),
		// 決定ボタン
		'submit' => array(
			'name'			=> W_USER_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 戻るボタン
		'back' => array(
			'name'			=> W_USER_BACK,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 確認ボタン
		'confirm' => array(
			'name'			=> W_USER_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// リセットボタン
		'unset' => array(
			'name'			=> W_USER_UNSET,
			'type'	  		=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 会員登録ボタン
		'register' => array(
			'name'			=> W_USER_REGISTER,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// 編集ボタン
		'edit' => array(
			'name'			=> W_USER_EDIT,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// 編集確認ボタン
		'edit_confirm' => array(
			'name'			=> W_USER_EDIT_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 削除ボタン
		'delete' => array(
			'name'			=> W_USER_DELETE,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// 削除確認ボタン
		'delete_confirm' => array(
			'name'			=> W_USER_DELETE_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 編集ボタン
		'update' => array(
			'name'	  		=> W_USER_UPDATE,
			'form_type' 	=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// 画像削除
		'delete_image' => array(
			'name'			=> W_USER_DELETE_IMAGE,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'type'			=> VAR_TYPE_BOOLEAN,
			'option'		=> array(1 => W_USER_DELETE_IMAGE),
		),
		// 登録ボタン
		'add' => array(
			'name'	  		=> W_USER_ADD,
			'form_type' 	=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// 削除ボタン
		'remove' => array(
			'name'	  		=> W_USER_REMOVE,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// 送信ボタン
		'send' => array(
			'name'	  		=> W_USER_SEND,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// 返信ボタン
		'reply' => array(
			'name'			=> W_USER_REPLY,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// 譲渡ボタン
		'give' => array(
			'name'			=> W_USER_GIVE,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 退会ボタン
		'resign' => array(
			'name'			=> W_USER_RESIGN,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 検索ボタン
		'search' => array(
			'name'			=> W_USER_SEARCH,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// 宛先ユーザID
		'to_user_id' => array(
			'name'	  		=> W_USER_TO_USER_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'	  	=> VAR_TYPE_INT,
		),
		// ポイント名称
		'point' => array('name'=> W_USER_POINT),
		// 画像名称
		'image' => array('name' => W_USER_IMAGE),
		// 画像登録名称
		'image_add' => array('name' => W_USER_IMAGE_ADD),
		// 画像編集名称
		'image_edit' => array('name' => W_USER_IMAGE_EDIT),
		// セグメント名称
		'segment' => array('name' => W_USER_SEGMENT),
		// ユーザ名称
		'user' => array('name' => W_USER_USER),
		
		/* =============================================
		// ユーザ情報語句
		 ============================================= */
		'profile' => array('name'=> W_USER_PROFILE),
		'new_user_password' => array('name' => W_USER_NEW_PASSWORD),
		'user_id' => array(
			'name'		=> W_USER_USER_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_hash' => array(
			'name'		=> W_USER_USER_HASH,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_nickname' => array(
			'name'		=> W_USER_USER_NICKNAME,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'ngword'	=> true,
		),
		'user_password' => array(
			'name'		=> W_USER_USER_PASSWORD,
			'type'		=> VAR_TYPE_STRING,
		),
		'new_user_password' => array(
			'name'		=> W_USER_NEW_PASSWORD,
			'type'		=> VAR_TYPE_STRING,
		),
		'user_sex' => array(
			'name'		=> W_USER_USER_SEX,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_sex',
		),
		'user_age_min' => array(
			'name'		=> W_USER_USER_AGE_MIN,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'		=> W_USER_USER_AGE_MAX,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_birth_date_year' => array(
			'name'		=> W_USER_USER_BIRTH_DATE_YEAR,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1900,
			'max'		=> 2100,
		),
		'user_birth_date_month' => array(
			'name'		=> W_USER_USER_BIRTH_DATE_MONTH,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 12,
		),
		'user_birth_date_day' => array(
			'name'		=> W_USER_USER_BIRTH_DATE_DAY,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 31,
		),
		'prefecture_id' => array(
			'name'	 	=> W_USER_USER_PREFECTURE_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_address' => array(
			'name'		=> W_USER_USER_ADDRESS,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'ngword'	=> true,
		),
		'user_address_building' => array(
			'name'		=> W_USER_USER_ADDRESS_BUILDING,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'ngword'	=> true,
		),
		'user_blood_type' => array(
			'name'		=> W_USER_USER_BLOOD_TYPE,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_blood_type',
		),
		'job_family_id' => array(
			'name'		=> W_USER_JOB_FAMILY_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, job_family_id',
		),
		'business_category_id' => array(
			'name'		=> W_USER_BUSINESS_CATEGORY_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, business_category_id',
		),
		'user_is_married' => array(
			'name'		=> W_USER_USER_IS_MARRIED,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_is_married',
		),
		'user_has_children' => array(
			'name'		=> W_USER_USER_HAS_CHILDREN,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_has_children',
		),
		'work_location_prefecture_id' => array(
			'name'		=> W_USER_WORK_LOCATION_PREFECTURE_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_hobby' => array(
			'name'	  	=> W_USER_USER_HOBBY,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'ngword'	=> true,
		),
		'user_url' => array(
			'name'		=> W_USER_USER_URL,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'ngword'	=> true,
		),
		'user_introduction' => array(
			'name'		=> W_USER_USER_INTRODUCTION,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'ngword'	=> true,
		),
		'user_message_1_status' => array(
			'name'		=> W_USER_MESSAGE_1,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_2_status' => array(
			'name'		=> W_USER_MESSAGE_2,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_3_status' => array(
			'name'		=> W_USER_MESSAGE_3,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_4_status' => array(
			'name'		=> W_USER_MESSAGE_4,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_prof_keyword' => array(
			'name'		=> W_USER_USER_PROF_KEYWORD,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_birth_day_public' => array(
			'name'		=> W_USER_USER_BIRTH_DAY_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_sex_public' => array(
			'name'		=> W_USER_USER_SEX_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_address_public' => array(
			'name'		=> W_USER_USER_ADDRESS_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_blood_type_public' => array(
			'name'		=> W_USER_USER_BLOOD_TYPE_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'job_family_public' => array(
			'name'		=> W_USER_JOB_FAMILY_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'business_category_id_public' => array(
			'name'		=> W_USER_BUSINESS_CATEGORY_ID_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_is_married_public' => array(
			'name'		=> W_USER_USER_IS_MARRIED_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_has_children_public' => array(
			'name'		=> W_USER_USER_HAS_CHILDREN_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'work_location_prefecture_id_public' => array(
			'name'		=> W_USER_WORK_LOCATION_PREFECTURE_ID_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_hobby_public' => array(
			'name'		=> W_USER_USER_HOBBY_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_url_public' => array(
			'name'		=> W_USER_USER_URL_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		'user_introduction_public' => array(
			'name'		=> W_USER_USER_INTRODUCTION_PUBLIC,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// 日記語句
		 ============================================= */
		'blog_article' => array('name'=> W_USER_BLOG_ARTICLE),
		'blog_article_id' => array(
			'name'				=> W_USER_BLOG_ARTICLE_ID,
			'form_type'			=> FORM_TYPE_HIDDEN,
			'type'				=> VAR_TYPE_INT,
		),
		'blog_article_title' => array(
			'name'				=> W_USER_BLOG_ARTICLE_TITLE,
			'form_type'			=> FORM_TYPE_TEXT,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'string_max_emoji'	=> 2000,
			'ngword'			=> true,
		),
		'blog_article_body' => array(
			'name'				=> W_USER_BLOG_ARTICLE_BODY,
			'form_type'			=> FORM_TYPE_TEXTAREA,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'string_max_emoji'	=> 2000,
			'ngword'			=> true,
		),
		'blog_article_status' => array(
			'name'		=> W_USER_BLOG_ARTICLE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'blog_article_checked' => array(
			'name'		=> W_USER_BLOG_ARTICLE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		'blog_article_public' => array(
			'name'		=> W_USER_BLOG_ARTICLE_PUBLIC,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, blog_article_public',
		),
		
		/* =============================================
		// 日記コメント語句
		 ============================================= */
		'blog_comment' => array('name' => W_USER_BLOG_COMMENT),
		'blog_comment_id' => array(
			'name'			=> W_USER_BLOG_COMMENT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'blog_comment_body' => array(
			'name'				=> W_USER_BLOG_COMMENT,
			'form_type'	 		=> FORM_TYPE_TEXTAREA,
			'type'	  			=> VAR_TYPE_STRING,
			'string_max_emoji'  => 1000,
			'ngword'			=> true,
		),
		'blog_comment_status' => array(
			'name'			=> W_USER_BLOG_COMMENT,
			'type'			=> VAR_TYPE_INT,
		),
		'blog_comment_checked' => array(
			'name'			=> W_USER_BLOG_COMMENT,
			'type'			=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// コメント（感想）語句
		 ============================================= */
		'comment' => array('name' => W_USER_COMMENT),
		'comment_id' => array(
			'name'			=> W_USER_COMMENT_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'comment_type' => array(
			'name'			=> W_USER_COMMENT_TYPE,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'comment_subid' => array(
			'name'			=> W_USER_COMMENT_SUBID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'comment_body' => array(
			'name'	 			=> W_USER_COMMENT_BODY,
			'form_type'			=> FORM_TYPE_TEXTAREA,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 40,
			'ngword'			=> true,
		),
		
		/* =============================================
		// コミュニティ語句
		 ============================================= */
		'community' => array('name' => W_USER_COMMUNITY),
		'community_title' => array(
			'name'			=> W_USER_COMMUNITY_TITLE,
			'type'	 		=> VAR_TYPE_STRING,
			'ngword'		=> true,
		),
		'community_description' => array(
			'name'			=> W_USER_COMMUNITY_DESCRIPTION,
			'type'			=> VAR_TYPE_STRING,
			'ngword'		=> true,
		),
		'community_category' => array('name' => W_USER_COMMUNITY_CATEGORY),
		'community_category_id' => array(
			'name'			=> W_USER_COMMUNITY_CATEGORY_ID,
			'type'			=> VAR_TYPE_INT,
		),
		'community_join_condition' => array(
			'name'			=> W_USER_COMMUNITY_JOIN_CONDITION,
			'type'			=> VAR_TYPE_INT,
		),
		'community_topic_permission' => array(
				'name'		=> W_USER_COMMUNITY_TOPIC_PERMISSION,
				'type'	  	=> VAR_TYPE_INT,
		),
		'community_list' => array('name' => W_USER_COMMUNITY_LIST),
		'community_article' => array('name' => W_USER_COMMUNITY_ARTICLE),
		'community_comment' => array('name' => W_USER_COMMUNITY_COMMENT),
		'community_id' => array(
			'name'			=> W_USER_COMMUNITY_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'community_article_id' => array(
			'name'			=> W_USER_COMMUNITY_ARTICLE_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'community_article_title' => array(
			'name'				=> W_USER_COMMUNITY_ARTICLE_TITLE,
			'form_type'			=> FORM_TYPE_TEXT,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
			'ngword'			=> true,
		),
		'community_article_body' => array(
			'name'				=> W_USER_COMMUNITY_ARTICLE_BODY,
			'form_type'			=> FORM_TYPE_TEXTAREA,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 1000,
			'ngword'			=> true,
		),
		'community_article_status' => array(
			'name'		=> W_USER_COMMUNITY_ARTICLE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'community_article_checked' => array(
			'name'		=> W_USER_COMMUNITY_ARTICLE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// コミュニティコメント語句
		 ============================================= */
		'community_comment' => array(
			'name'		=> W_USER_COMMUNITY_COMMENT,
		),
		'community_comment_id' => array(
			'name'		=> W_USER_COMMUNITY_COMMENT_ID,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'community_comment_body' => array(
			'name'				=> W_USER_COMMUNITY_COMMENT_BODY,
			'form_type'			=> FORM_TYPE_TEXTAREA,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 1000,
			'ngword'			=> true,
		),
		'community_comment_status' => array(
			'name'		=> W_USER_COMMUNITY_COMMENT_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'community_comment_checked' => array(
			'name'		=> W_USER_COMMUNITY_COMMENT_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// 伝言板語句
		 ============================================= */
		'bbs' => array('name' => W_USER_BBS),
		'bbs_name' => array('name' => W_USER_BBS_NAME),
		'bbs_id' => array(
			'name'		=> W_USER_ID,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'bbs_body' => array(
			'name'				=> W_USER_BBS_BODY,
			'form_type'			=> FORM_TYPE_TEXTAREA,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 2000,
			'ngword'			=> true,
		),
		'bbs_status' => array(
			'name'		=> W_USER_BBS_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'bbs_checked' => array(
			'name'		=> W_USER_BBS_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ブラックリスト語句
		 ============================================= */
		'blacklist' => array('name' => W_USER_BLACKLIST),
		'blacklist_id' => array('name' => W_USER_BLACKLIST_ID),
		'black_list_id' => array(
			'name'		=> W_USER_BLACKLIST,
			'type'		=> VAR_TYPE_INT,
		),
		'black_list_user_id' => array(
			'name'		=> W_USER_BLACKLIST_USER_ID,
			'type'		=> VAR_TYPE_INT,
		),
		'black_list_deny_user_id' => array(
			'name'		=> W_USER_BLACKLIST_DENY_USER_ID,
			'type'		=> VAR_TYPE_INT,
		),
		'black_list_status' => array(
			'name'		=> W_USER_BLACKLIST_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'black_list_checked' => array(
			'name'		=> W_USER_BLACKLIST_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// メッセージ語句
		 ============================================= */
		'message' => array('name' => W_USER_MESSAGE),
		'message_id' => array('name' => W_USER_MESSAGE_ID),
		'from_user_nickname' => array('name' => W_USER_FROM_USER_NICKNAME),
		'to_user_nickname' => array('name' => W_USER_TO_USER_NICKNAME),
		'message_receive_box' => array('name' => W_USER_MESSAGE_RECEIVE_BOX),
		'message_sent_box' => array('name' => W_USER_MESSAGE_SENT_BOX),
		'reply_message_id' => array(
			'name'			=> W_USER_MESSAGE_REPLY_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'message_title' => array(
			'name'				=> W_USER_MESSAGE_TITLE,
			'form_type'			=> FORM_TYPE_TEXT,
			'type'				=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
			'ngword'			=> true,
		),
		'message_body' => array(
			'name'	  => W_USER_MESSAGE_BODY,
			'form_type' => FORM_TYPE_TEXTAREA,
			'type'	  => VAR_TYPE_STRING,
			'string_max_emoji'  => 2000,
			'ngword'			=> true,
		),
		'message_status' => array(
			'name'		=> W_USER_MESSAGE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'message_checked' => array(
			'name'		=> W_USER_MESSAGE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ニュース語句
		 ============================================= */
		'news_id' => array(
			'type'	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		
		/* =============================================
		// 友達語句
		 ============================================= */
		'friend_name' => array('name'=>W_USER_FRIEND_NAME),
		'friend' => array('name'=>W_USER_FRIEND),
		'friend_list' => array('name'=>W_USER_FRIEND_LIST),
		'friend_id' => array(
			'name'		=> W_USER_FRIEND_ID,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'accept' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_BOOLEAN
		),
		'friend_message' => array(
			'name'			=> W_USER_FRIEND_MESSAGE,
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'type'			=> VAR_TYPE_STRING,
			'ngword'		=> true,
		),
		'friend_introduction' => array(
			'name'			=> W_USER_FRIEND_INTRODUCTION,
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'type'			=> VAR_TYPE_STRING,
			'ngword'		=> true,
		),
		
		/* =============================================
		// 画像語句
		 ============================================= */
		'image' => array(
			'name'		=> W_USER_IMAGE,
		),
		'image_status' => array(
			'name'		=> W_USER_IMAGE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'image_checked' => array(
			'name'		=> W_USER_IMAGE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// 動画語句
		 ============================================= */
		'movie' => array(
			'name'		=> W_USER_MOVIE,
		),
		'movie_status' => array(
			'name'		=> W_USER_MOVIE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'movie_checked' => array(
			'name'		=> W_USER_MOVIE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// アバター語句
		 ============================================= */
		'avatar' => array('name' => W_USER_AVATAR),
		'avatar_category' => array('name' => W_USER_AVATAR_CATEGORY),
		'avatar_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_USER_AVATAR_ID,
		),
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'user_avatar_id' => array(
			'type'			=> VAR_TYPE_INT,
			'name'			=> W_USER_AVATAR_ID,
		),
		
		/* =============================================
		// デコメール語句
		 ============================================= */
		'decomail' => array(
			'name'		=> W_USER_DECOMAIL,
		),
		'decomail_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_USER_DECOMAIL_ID,
		),
		
		/* =============================================
		// ゲーム語句
		 ============================================= */
		'game' => array(
			'name'		=> W_USER_GAME,
		),
		'user_game_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'score' => array(
			'name'		=> 'ｽｺｱ',
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// サウンド語句
		 ============================================= */
		'sound' => array(
			'name'		=> W_USER_SOUND,
		),
		
		/* =============================================
		// 通報語句
		 ============================================= */
		'report' => array(
			'name'		=> W_USER_REPORT,
		),
		'report_fail_user_id' => array(
			'name'	  => W_USER_REPORT_FAIL_USER_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'report_message' => array(
			'name'	  => W_USER_REPORT_MESSAGE,
			'type'	  => VAR_TYPE_STRING,
		),
		
		/* =============================================
		// twitter語句
		 ============================================= */
		'twitter' => array(
			'name'		=> W_USER_TWITTER,
		),
		'thema' => array(
			'name'	  => W_USER_THEMA,
		),
	);
	
	/** @var	array   フォーム値定義(管理上書き用) */
	var $admin_template = array(
		/* =============================================
		// 基本語句
		 ============================================= */
		'menu_icon' => array(
			'name'			=> W_ADMIN_MENU_ICON,
		),
		'admin_account' => array('name'=>W_ADMIN_ACCOUNT),
		'point' => array( 'name' => W_ADMIN_POINT ),
		'segment' => array( 'name' => W_ADMIN_SEGMENT ),
		'user' => array( 'name' => W_ADMIN_USER ),
		'image' => array( 'name' => W_ADMIN_IMAGE ),
		
		/* =============================================
		// ユーザ情報語句
		 ============================================= */
		'profile' => array('name'=> W_ADMIN_PROFILE),
		'user_id' => array(
			'name'		=> W_ADMIN_USER_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_hash' => array(
			'name'		=> 'ﾕｰｻﾞ識別子',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_nickname' => array(
			'name'		=> 'ﾆｯｸﾈｰﾑ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_password' => array(
			'name'		=> 'ﾊﾟｽﾜｰﾄﾞ',
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMoはpassword指定すると数字モードになってしまうので。FORM_TYPE_TEXTに。
			'form_type'	=> FORM_TYPE_TEXT,
//			'regexp'		=> '/^[a-zA-Z0-9]+$/',
//			'min'		=> 4,
//			'required_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
//			'min_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
//			'regexp_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
		),
		'user_sex' => array(
			'name'		=> '性別',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_sex',
		),
		'user_birth_date_year' => array(
			'name'		=> '生年月日(年)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1900,
			'max'		=> 2100,
		),
		'user_birth_date_month' => array(
			'name'		=> '生年月日(月)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 12,
		),
		'user_birth_date_day' => array(
			'name'		=> '生年月日(日)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 31,
		),
		'prefecture_id' => array(
			'name'	 	=> '住所(都道府県)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_address' => array(
			'name'		=> '住所(市区町村番地)',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'name'		=> '住所(建物名)',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_blood_type' => array(
			'name'		=> '血液型',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_blood_type',
		),
		'job_family_id' => array(
			'name'		=> '職種',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, job_family_id',
		),
		'business_category_id' => array(
			'name'		=> '業種',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, business_category_id',
		),
		'user_is_married' => array(
			'name'		=> '結婚',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_is_married',
		),
		'user_has_children' => array(
			'name'		=> '子供',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_has_children',
		),
		'work_location_prefecture_id' => array(
			'name'		=> '勤務地',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_hobby' => array(
			'name'	  	=> '趣味',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_url' => array(
			'name'		=> 'URL',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_introduction' => array(
			'name'		=> '自己紹介',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'user_message_1_status' => array(
			'name'		=> W_ADMIN_MESSAGE_1,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_2_status' => array(
			'name'		=> W_ADMIN_MESSAGE_2,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_3_status' => array(
			'name'		=> W_ADMIN_MESSAGE_3,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_message_4_status' => array(
			'name'		=> W_ADMIN_MESSAGE_4,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,receive_status',
		),
		'user_guest_status' => array(
			'name'		=> 'ゲストユーザ',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_guest_status',
		),
		'user_status' => array(
			'name'		=> 'ユーザステータス',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_status',
		),
		
		/* =============================================
		// 日記語句
		 ============================================= */
		'blog_article' => array('name'=> W_ADMIN_BLOG_ARTICLE),
		'blog_article_id' => array( 'name' => W_ADMIN_BLOG_ARTICLE_ID ),
		'blog_article_title' => array( 'name' => W_ADMIN_BLOG_ARTICLE_TITLE ),
		'blog_article_body' => array( 'name' => W_ADMIN_BLOG_ARTICLE_BODY ),
		'blog_article_status' => array( 'name' => W_ADMIN_BLOG_ARTICLE_STATUS ),
		'blog_article_checked' => array( 'name' => W_ADMIN_BLOG_ARTICLE_CHECKED ),
		'blog_article_public' => array( 'name' => W_ADMIN_BLOG_ARTICLE_PUBLIC ),
		
		/* =============================================
		// 日記コメント語句
		 ============================================= */
		'blog_comment' => array('name' => W_ADMIN_BLOG_COMMENT),
		'blog_comment_id' => array( 'name' => W_ADMIN_BLOG_COMMENT_ID ),
		'blog_comment_body' => array( 'name' => W_ADMIN_BLOG_COMMENT_BODY ),
		'blog_comment_status' => array( 'name' => W_ADMIN_BLOG_COMMENT_STATUS ),
		'blog_comment_checked' => array( 'name' => W_ADMIN_BLOG_COMMENT_CHECKED ),
		
		/* =============================================
		// コメント語句
		 ============================================= */
		'comment_id' => array( 'name' => W_ADMIN_COMMENT_ID ),
		'comment_type' => array( 'name' => W_ADMIN_COMMENT_TYPE ),
		'comment_subid' => array( 'name' => W_ADMIN_COMMENT_SUBID ),
		'comment_body' => array( 'name' => W_ADMIN_COMMENT_BODY ),
		'comment_status' => array( 'name' => W_ADMIN_COMMENT_STATUS ),
		'comment_checked' => array( 'name' => W_ADMIN_COMMENT_CHECKED ),
		
		/* =============================================
		// コミュニティ語句
		 ============================================= */
		'community' => array('name' => W_ADMIN_COMMUNITY),
		'community_id' => array( 'name' => W_ADMIN_COMMUNITY_ID ),
		'community_title' => array('name' => W_ADMIN_COMMUNITY_TITLE),

		/* =============================================
		// コミュニティトピック語句
		 ============================================= */
		'community_list' => array('name' => W_ADMIN_COMMUNITY_LIST),
		'community_article' => array('name' => W_ADMIN_COMMUNITY_ARTICLE),
		'community_article_id' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_ID ),
		'community_article_title' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_TITLE ),
		'community_article_body' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_BODY ),
		'community_article_status' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_STATUS ),
		'community_article_checked' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_CHECKED ),
		
		/* =============================================
		// コミュニティコメント語句
		 ============================================= */
		'community_comment' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT ),
		'community_comment' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT ),
		'community_comment_id' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_ID ),
		'community_comment_body' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_BODY ),
		'community_comment_status' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_STATUS ),
		'community_comment_checked' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_CHECKED ),
		
		/* =============================================
		// 伝言板語句
		 ============================================= */
		'bbs' => array('name' => W_ADMIN_BBS),
		'bbs_name' => array('name' => W_ADMIN_BBS_NAME),
		'bbs_id' => array( 'name' => W_ADMIN_ID ),
		'bbs_body' => array( 'name' => W_ADMIN_BBS_BODY ),
		'bbs_status' => array( 'name' => W_ADMIN_BBS_STATUS ),
		'bbs_checked' => array( 'name' => W_ADMIN_BBS_CHECKED ),
		
		/* =============================================
		// ブラックリスト語句
		 ============================================= */
		'blacklist' => array('name' => W_ADMIN_BLACKLIST),
		'blacklist_id' => array('name' => W_ADMIN_BLACKLIST_ID),
		'black_list_id' => array( 'name' => W_ADMIN_BLACKLIST ),
		'black_list_user_id' => array( 'name' => W_ADMIN_BLACKLIST_ADMIN_ID ),
		'black_list_deny_user_id' => array( 'name' => W_ADMIN_BLACKLIST_DENY_ADMIN_ID ),
		'black_list_status' => array( 'name' => W_ADMIN_BLACKLIST_STATUS ),
		'black_list_checked' => array( 'name' => W_ADMIN_BLACKLIST_CHECKED ),
		
		/* =============================================
		// ミニメール語句
		 ============================================= */
		'message' => array('name' => W_ADMIN_MESSAGE),
		'message_id' => array('name' => W_ADMIN_MESSAGE_ID),
		'from_user_nickname' => array('name' => W_ADMIN_FROM_ADMIN_NICKNAME),
		'to_user_nickname' => array('name' => W_ADMIN_TO_ADMIN_NICKNAME),
		'message_receive_box' => array('name' => W_ADMIN_MESSAGE_RECEIVE_BOX),
		'message_sent_box' => array('name' => W_ADMIN_MESSAGE_SENT_BOX),
		'reply_message_id' => array( 'name' => W_ADMIN_MESSAGE_REPLY_ID ),
		'message_title' => array( 'name' => W_ADMIN_MESSAGE_TITLE ),
		'message_body' => array( 'name' => W_ADMIN_MESSAGE_BODY ),
		'message_status' => array('name' => W_ADMIN_MESSAGE_STATUS ),
		'message_checked' => array( 'name' => W_ADMIN_MESSAGE_CHECKED ),
		
		/* =============================================
		// ニュース語句
		 ============================================= */
		'news_type' => array(
			'name'		=> W_ADMIN_NEWS_TYPE,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,news_type',
		),
		'news_title' => array(
			'name'		=> W_ADMIN_NEWS_TITLE,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'news_body' => array(
			'name'		=> W_ADMIN_NEWS_BODY,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'news_time' => array(
			'name'		=> W_ADMIN_NEWS_TIME,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		
		/* =============================================
		// 友達関連語句
		 ============================================= */
		'friend_name' => array( 'name'=>W_ADMIN_FRIEND_NAME ),
		'friend' => array( 'name'=>W_ADMIN_FRIEND ),
		'friend_list' => array( 'name'=>W_ADMIN_FRIEND_LIST ),
		'friend_id' => array( 'name' => W_ADMIN_FRIEND_ID ),
		'accept' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_BOOLEAN,
		),
		'friend_message' => array( 'name' => W_ADMIN_FRIEND_MESSAGE ),
		'friend_introduction' => array( 'name' => W_ADMIN_FRIEND_INTRODUCTION ),
		
		/* =============================================
		// 画像語句
		 ============================================= */
		'image' => array(
			'name'		=> W_ADMIN_IMAGE,
		),
		'image_status' => array(
			'name'		=> W_ADMIN_IMAGE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'image_checked' => array(
			'name'		=> W_ADMIN_IMAGE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// 動画語句
		 ============================================= */
		'movie' => array(
			'name'		=> W_ADMIN_MOVIE,
		),
		'movie_status' => array(
			'name'		=> W_ADMIN_MOVIE_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'movie_checked' => array(
			'name'		=> W_ADMIN_MOVIE_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),

		/* =============================================
		// 管理者語句
		 ============================================= */
		'admin_account' => array('name'=>W_ADMIN_ACCOUNT),

		/* =============================================
		// アバター語句
		 ============================================= */
		'avatar' 				=> array( 'name' => W_ADMIN_AVATAR ),
		'avatar_category' 		=> array( 'name' => W_ADMIN_AVATAR_CATEGORY ),
		'avatar_id' => array( 'name' => W_ADMIN_AVATAR_ID ),
		'avatar_category_id' => array( 'type' => VAR_TYPE_STRING ),
		'user_avatar_id' => array( 'name' => W_USER_AVATAR_ID ),
		'avatar_category_name' => array(
			'type'				=> VAR_TYPE_STRING,
			'name'				=> W_ADMIN_AVATAR_CATEGORY_NAME,
		),
		'avatar_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_DESC,
		),
		'avatar_system_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_SYSTEM_CATEGORY_ID,
		),
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_CATEGORY_ID,
		),
		'avatar_category_priority' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_CATEGORY_PRIORITY,
		),
		'avatar_category_priority_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_CATEGORY_PRIORITY_ID,
		),
		'avatar_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_NAME,
		),
		'avatar_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_DESC,
		),
		'avatar_image1' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE1,
		),
		'avatar_image1_desc' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_DESC,
		),
		'avatar_image1_x' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_X,
		),
		'avatar_image1_y' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_Y,
		),
		'avatar_image1_z' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_Z,
		),
		'avatar_image2' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE2,
		),
		'avatar_image2_desc' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_DESC,
		),
		'avatar_image2_x' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_X,
		),
		'avatar_image2_y' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_Y,
		),
		'avatar_image2_z' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_Z,
		),
		'avatar_point' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_POINT,
		),
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_CATEGORY_ID,
		),
		'avatar_sex_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_SEX_TYPE,
		),
		'preset_avatar' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_PRESET,
		),
		'default_avatar' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_DEFAULT,
		),
		'first_avatar' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_FIRST,
		),
		'avatar_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_STOCK_NUM,
		),
		'avatar_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_STOCK_STATUS,
		),
		'avatar_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_END_TIME,
		),
		'avatar_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AVATAR_END_STATUS,
		),
		'avatar_image1_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_FILE,
		),
		'avatar_image1_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_STATUS,
		),
		'avatar_image1_desc_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_DESC_NAME,
		),
		'avatar_image1_desc_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_DESC_FILE,
		),
		'avatar_image1_desc_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE1_DESC_STATUS,
		),

		'avatar_image2_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_FILE,
		),
		'avatar_image2_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_STATUS,
		),
		'avatar_image2_desc_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_DESC_NAME,
		),
		'avatar_image2_desc_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_DESC_FILE,
		),
		'avatar_image2_desc_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_IMAGE2_DESC_STATUS,
		),
		'avatar_stand_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AVATAR_STAND_ID,
		),
		
		/* =============================================
		// デコメール語句
		 ============================================= */
		'decomail' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_DECOMAIL,
		),
		'decomail_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_DECOMAIL_ID
		),
		'decomail_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_NAME,
		),
		'decomail_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_DESC,
		),
		'decomail_image' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_DECOMAIL_IMAGE,
		),
		'decomail_point' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_POINT,
		),
		'decomail_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_ID,
		),
		'decomail_category_priority_name' => array(
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_NAME,
		),
		'decomail_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_STOCK_NUM,
		),
		'decomail_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_DECOMAIL_STOCK_STATUS,
		),
		'decomail_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_START_TIME,
		),
		'decomail_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_DECOMAIL_START_STATUS,
		),
		'decomail_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_END_TIME,
		),
		'decomail_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_DECOMAIL_END_STATUS,
		),
		'decomail_image_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_IMAGE_NAME,
		),
		'decomail_image_file' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_IMAGE_FILE,
		),
		'decomail_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_IMAGE_STATUS,
		),
		'decomail_category' => array(
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY,
		),
		'decomail_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_NAME,
		),
		'decomail_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_DESC,
		),
		'decomail_category_priority' => array(
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_PRIORITY,
		),
		'decomail_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'name'		=> W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_ID,
		),
		
		/* =============================================
		// ゲーム語句
		 ============================================= */
		'game_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_GAME_ID,
		),
		'game_code' => array(
			'name'		=> W_ADMIN_GAME_CODE,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'game' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME
		),
		'game_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_NAME,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'game_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_CODE,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'game_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_DESC
		),
		'game_explain' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_EXPLAIN
		),
		'game_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_URL,
		),
		'game_image' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_GAME_IMAGE,
		),
		'game_point' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_POINT,
		),
		'game_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_CATEGORY_ID,
		),
		'game_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_STOCK_NUM,
		),
		'game_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_GAME_STOCK_STATUS,
		),
		'game_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_START_TIME,
		),
		'game_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_GAME_START_STATUS,
		),
		'game_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_END_TIME,
		),
		'game_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_GAME_END_STATUS,
		),
		'game_image_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_IMAGE_NAME
		),
		'game_image_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_GAME_IMAGE_FILE,
		),
		'game_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_IMAGE_STATUS,
		),
		'game_category' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_CATEGORY,
		),
		'game_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_CATEGORY_NAME,
		),
		'game_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_GAME_CATEGORY_DESC,
		),
		'game_category_priority' => array(
			'name'		=> W_ADMIN_GAME_CATEGORY_PRIORITY,
		),
		'game_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'name'		=> W_ADMIN_GAME_CATEGORY_PRIORITY_ID,
		),
		
		/* =============================================
		// フリーページ語句
		 ============================================= */
		'contents' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CONTENTS,
		),
		'contents_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CONTENTS_ID
		),
		'contents_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_CONTENTS_TITLE,
		),
		'contents_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_CONTENTS_BODY,
		),
		'contents_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_CONTENTS_CODE,
		),
		'contents_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CONTENTS_STATUS,
		),
		
		/* =============================================
		// サウンド語句
		 ============================================= */
		'sound' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SOUND,
		),
		'sound_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SOUND_ID,
		),
		'sound_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_NAME
		),
		'sound_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_DESC
		),
		'sound_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_URL,
		),
		'sound_image' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_SOUND_IMAGE,
		),
		'sound_point' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_POINT,
		),
		'sound_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_CATEGORY_ID,
		),
		'sound_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_STOCK_NUM,
		),
		'sound_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SOUND_STOCK_STATUS,
		),
		'sound_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_START_TIME,
		),
		'sound_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SOUND_START_STATUS,
		),
		'sound_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_END_TIME,
		),
		'sound_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SOUND_END_STATUS,
		),
		'sound_image_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_IMAGE_NAME
		),
		'sound_image_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_SOUND_IMAGE_FILE,
		),
		'sound_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_IMAGE_STATUS,
		),
		'sound_category' => array(
			'name'		=> W_ADMIN_SOUND_CATEGORY,
		),
		'sound_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_CATEGORY_NAME,
		),
		'sound_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SOUND_CATEGORY_DESC,
		),
		'sound_category_priority' => array(
			'name'		=> W_ADMIN_SOUND_CATEGORY_PRIORITY_ID,
		),		
		'sound_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'name'		=> W_ADMIN_SOUND_CATEGORY_PRIORITY_ID,
		),		
		
		/* =============================================
		// 通報語句
		 ============================================= */
		'report' => array( 'name' => W_ADMIN_REPORT ),
		
		/* =============================================
		// バナー語句
		 ============================================= */
		'banner' => array( 'name' => W_ADMIN_BANNER ),
		'banner_id' => array(
			'name' 		=> W_ADMIN_BANNER_ID,
			'type'		=> VAR_TYPE_STRING,
		),
		'banner_client' => array(
			'type'		=> VAR_TYPE_STRING,
			'name' 		=> W_ADMIN_BANNER_CLIENT,
		),
		'banner_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'name' 		=> W_ADMIN_BANNER_URL,
		),
		'banner_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name' 		=> W_ADMIN_BANNER_TYPE,
		),
		'banner_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'name' 		=> W_ADMIN_BANNER_BODY,
		),
		'banner_image' => array(
			'type'		=> VAR_TYPE_FILE,
			'name' 		=> W_ADMIN_BANNER_IMAGE,
		),
		'banner_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_BANNER_IMAGE_STATUS,
		),
		
		/* =============================================
		// 広告語句
		 ============================================= */
		'ad' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD,
		),
		'ad_category_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_CATEGORY,
		),
		'ad_category' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_CATEGORY,
		),
		'ad_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_CATEGORY_NAME,
		),
		'ad_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_CATEGORY_DESC,
		),
		'ad_category_priority' => array(
			'name'		=> W_ADMIN_AD_CATEGORY_PRIORITY,
		),
		'ad_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'name'		=> W_ADMIN_AD_CATEGORY_PRIORITY_ID,
		),
		'ad_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_STATUS,
		),
		'ad_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_ID,
		),
		'ad_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_NAME,
		),
		'ad_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_DESC,
		),
		'ad_url_d' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_URL_D,
		),
		'ad_url_a' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_URL_A,
		),
		'ad_url_s' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_URL_S,
		),
		'ad_code_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_CODE_ID,
		),
		'ad_code' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_CODE,
		),
		'ad_image' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_IMAGE,
		),
		'ad_image_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_IMAGE_NAME,
		),
		'ad_image_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_AD_IMAGE_FILE,
		),
		'ad_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_IMAGE_STATUS,
		),
		'ad_point_type' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_POINT_TYPE,
		),
		'ad_point' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_POINT,
		),
		'ad_item_price' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_PRICE,
		),
		'ad_point_percent' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_POINT_PERCENT,
		),
		'ad_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_STOCK_NUM,
		),
		'ad_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_STOCK_STATUS,
		),
		'ad_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_START_TIME,
		),
		'ad_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_START_STATUS,
		),
		'ad_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_END_TIME,
		),
		'ad_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_AD_END_STATUS,
		),
		'ad_type' => array(
			'name'		=> W_ADMIN_AD_TYPE,
			'type'		=> VAR_TYPE_INT,
		),
		'ad_display_type' => array(
			'name'		=> W_ADMIN_AD_DISPLAY_TYPE,
			'type'		=> VAR_TYPE_INT,
		),
		'ad_memo' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_MEMO,
		),
		'ad_mail_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_AD_MAIL_BODY,
		),
		
		/* =============================================
		// tieitter語句
		 ============================================= */
		'twitter' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_TWITTER,
		),
		'twitter_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_TWITTER_ID,
		),
		'twitter_body' => array(
			'type'		=> VAR_TYPE_TEXT,
			'name'		=> W_ADMIN_TWITTER_BODY,
		),
		'twitter_status' => array( 'name' => W_ADMIN_TWITTER_STATUS ),
		'twitter_checked' => array( 'name' => W_ADMIN_TWITTER_CHECKED ),
		
		'thema' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA,
		),
		'thema_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_ID,
		),
		'thema_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_NAME,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'thema_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_TITLE,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'thema_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_DESC
		),
		'thema_point' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_POINT,
		),
		'thema_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_CATEGORY_ID,
		),
		'thema_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_START_TIME,
		),
		'thema_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_START_STATUS,
		),
		'thema_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_END_TIME,
		),
		'thema_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_END_STATUS,
		),
		'thema_memo' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_THEMA_MEMO,
		),
		'thema_stock_num' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_STOCK_NUM,
		),
		'thema_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_STOCK_STATUS,
		),
		'thema_term' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_TERM,
		),
		'thema_term_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_THEMA_TERM_STATUS,
		),
	);
	
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;

	/**#@-*/

	/**
	 *  フォーム値検証のエラー処理を行う
	 *
	 *  @access public
	 *  @param  string	  $name   フォーム項目名
	 *  @param  int		 $code   エラーコード
	 */
	function handleError($name, $code)
	{
		return parent::handleError($name, $code);
	}
	
	/**
	 *  フォーム値定義テンプレートを設定する
	 *
	 *  @access protected
	 *  @param  array   $form_template  フォーム値テンプレート
	 *  @return array   フォーム値テンプレート
	 */
	function _setFormTemplate($form_template)
	{
		$access_key = "";
		// access_key(リクエストされたアクション名)
		foreach($this->backend->controller->action as $key => $value) {
			$access_key = $this->backend->controller->action[$key]['class_name'];
			break;
		}
		
		// PCでアクセスしたときはPC用の表示を使用する
		if($GLOBALS['EMOJIOBJ']->carrier == 'PC' && ereg('Admin',$access_key)){
			// 単にマージするだけではフォーム情報が上書きされてしまうので、再帰的に実行してフォーム定義は保存するようにする
			$form_template = $this->_setAdminTemplate($form_template, $this->admin_template);
		}
		
		return parent::_setFormTemplate($form_template);
	}
	
	/**
	 *  フォーム値定義テンプレートをマージする
	 *
	 *  @access protected
	 *  @param  array   $form_template  マージ対象フォーム値テンプレート
	 *  @param  array   $admin_template  マージ用フォーム値テンプレート
	 *  @return array   フォーム値テンプレート
	 */
	function _setAdminTemplate($form_template, $admin_template)
	{
		if(is_array($admin_template)){
			foreach($admin_template as $k => $v){
				// 配列の場合
				if(is_array($v)){
					// 該当のキーがある場合、マージ関数を起動
					if(array_key_exists($k , $form_template)){
						$form_template[$k] = array_merge($form_template[$k],$v);
					}
					// 該当キーがない場合、配列を追加
					else{
						$form_template[$k] = $v;
					}
				}
				// スカラーの場合
				else{
					// 追加
					$form_template[$k] = $v;
				}
			}
		}
		return $form_template;
	}
	
	/**
	 *  フォーム値定義を設定する
	 *
	 *  @access protected
	 */
	function _setFormDef()
	{
		return parent::_setFormDef();
	}

	/**
	 *  フォーム値へのアクセサ(W)
	 *
	 *  @access public
	 *  @param  string  $name   フォーム値の名称
	 *  @param  string  $value  設定する値
	 */
	function set($name, $value)
	{
		return parent::set($name,$value);
	}

	/**
	 *  フォーム項目表示名を取得する
	 *
	 *  @access public
	 *  @param  string  $name   フォーム値の名称
	 *  @return mixed   フォーム値の表示名
	 */
	function getFtName($name)
	{
		if (isset($this->form_template[$name]) == false) {
			return null;
		}
		if (isset($this->form_template[$name]['name'])
			&& $this->form_template[$name]['name'] != null) {
			return $this->form_template[$name]['name'];
		}
		// try message catalog
		return $this->i18n->get($name);
	}
	
	// hiddenvars内の絵文字用変換
	function _replaceEmojiForm($value)
	{
		// フォーム用内部絵文字コードに変換
		$value = preg_replace('/\[x:(\d{4})\]/','[xf:\\1]',$value);
		return $value;
	}
	
	/**
	 *  フォーム値をhiddenタグとして返す
	 *
	 *  @access public
	 *  @param  array   $include_list   配列が指定された場合、その配列に含まれるフォーム項目のみが対象となる
	 *  @param  array   $exclude_list   配列が指定された場合、その配列に含まれないフォーム項目のみが対象となる
	 *  @return string  hiddenタグとして記述されたHTML
	 */
	function getHiddenVars($include_list = null, $exclude_list = null)
	{
		$hidden_vars = "";
		foreach ($this->form as $key => $value) {
			if (is_array($include_list) == true
				&& in_array($key, $include_list) == false) {
				continue;
			}
			if (is_array($exclude_list) == true
				&& in_array($key, $exclude_list) == true) {
				continue;
			}
			
			$type = is_array($value['type']) ? $value['type'][0] : $value['type'];
			if ($type == VAR_TYPE_FILE) {
				continue;
			}

			$form_value = $this->form_vars[$key];
			if (is_array($value['type'])) {
				$form_array = true;
			} else {
				$form_value = array($form_value);
				$form_array = false;
			}

			if (is_null($this->form_vars[$key])) {
				// フォーム値が送られていない場合はそもそもhiddenタグを出力しない
				continue;
			}

			foreach ($form_value as $k => $v) {
				if ($form_array) {
					$form_name = "$key" . "[$k]";
				} else {
					$form_name = $key;
				}
				
				$hidden_vars .=
					sprintf("<input type=\"hidden\" name=\"%s\" value=\"%s\" />\n",
					$form_name, $this->_replaceEmojiForm(htmlspecialchars($v, ENT_QUOTES)));
			}
		}
		return $hidden_vars;
	}
}
// }}}
?>
