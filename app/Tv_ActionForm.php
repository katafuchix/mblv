<?php
// vim: foldmethod=marker
/**
 *  Tv_ActionForm.php
 *
 *  @author     Technovarth
 *  @package    MBLV
 */

// {{{ Tv_ActionForm
/**
 *  ���������ե����९�饹
 *
 *  @author     Technovarth
 *  @package    MBLV
 *  @access     public
 */
class Tv_ActionForm extends Ethna_ActionForm
{
	/**#@+
	 *  @access private
	 */
	
	/** @var    array   �ե����������(�ǥե����) */
	var $form_template = array(
		/* =============================================
		// ���ܸ��
		 ============================================= */
		// ��������
		'menu_icon' => array('name'=> W_USER_MENU_ICON),
		// ����ܥ���
		'submit' => array(
			'name'			=> W_USER_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ���ܥ���
		'back' => array(
			'name'			=> W_USER_BACK,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ��ǧ�ܥ���
		'confirm' => array(
			'name'			=> W_USER_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// �ꥻ�åȥܥ���
		'unset' => array(
			'name'			=> W_USER_UNSET,
			'type'	  		=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// �����Ͽ�ܥ���
		'register' => array(
			'name'			=> W_USER_REGISTER,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// �Խ��ܥ���
		'edit' => array(
			'name'			=> W_USER_EDIT,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// �Խ���ǧ�ܥ���
		'edit_confirm' => array(
			'name'			=> W_USER_EDIT_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ����ܥ���
		'delete' => array(
			'name'			=> W_USER_DELETE,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// �����ǧ�ܥ���
		'delete_confirm' => array(
			'name'			=> W_USER_DELETE_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// �Խ��ܥ���
		'update' => array(
			'name'	  		=> W_USER_UPDATE,
			'form_type' 	=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// �������
		'delete_image' => array(
			'name'			=> W_USER_DELETE_IMAGE,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'type'			=> VAR_TYPE_BOOLEAN,
			'option'		=> array(1 => W_USER_DELETE_IMAGE),
		),
		// ư����
		'delete_movie' => array(
			'name'			=> W_USER_DELETE_MOVIE,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'type'			=> VAR_TYPE_BOOLEAN,
			'option'		=> array(1 => W_USER_DELETE_MOVIE),
		),
		// ��Ͽ�ܥ���
		'add' => array(
			'name'	  		=> W_USER_ADD,
			'form_type' 	=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// ����ܥ���
		'remove' => array(
			'name'	  		=> W_USER_REMOVE,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// �����ܥ���
		'send' => array(
			'name'	  		=> W_USER_SEND,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
		// �ֿ��ܥ���
		'reply' => array(
			'name'			=> W_USER_REPLY,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// ���ϥܥ���
		'give' => array(
			'name'			=> W_USER_GIVE,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ���ܥ���
		'resign' => array(
			'name'			=> W_USER_RESIGN,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// �����ܥ���
		'search' => array(
			'name'			=> W_USER_SEARCH,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ����桼��ID
		'to_user_id' => array(
			'name'	  		=> W_USER_TO_USER_ID,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'	  	=> VAR_TYPE_INT,
		),
		// �ݥ����̾��
		'point' => array('name'=> W_USER_POINT),
		// �ݥ����ñ��̾��
		'point_unit' => array('name'=> W_USER_POINT_UNIT),
		// ����̾��
		'image' => array('name' => W_USER_IMAGE),
		// ������Ͽ̾��
		'image_add' => array('name' => W_USER_IMAGE_ADD),
		// �����Խ�̾��
		'image_edit' => array('name' => W_USER_IMAGE_EDIT),
		// ư��̾��
		'movie' => array('name' => W_USER_MOVIE),
		// ư����Ͽ̾��
		'movie_add' => array('name' => W_USER_MOVIE_ADD),
		// ư���Խ�̾��
		'movie_edit' => array('name' => W_USER_MOVIE_EDIT),
		// ��������̾��
		'segment' => array('name' => W_USER_SEGMENT),
		// �桼��̾��
		'user' => array('name' => W_USER_USER),
		
		/* =============================================
		// �桼��������
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
		'user_mail_ok' => array(
			'name'		=> W_USER_USER_MAIL_OK, 
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ���Ը��
		 ============================================= */
		'invite' => array(
			'name'		=> W_USER_INVITE,
			'type'		=> VAR_TYPE_STRING,
		),
		'invite_name' => array(
			'name'		=> W_USER_INVITE_NAME,
			'type'		=> VAR_TYPE_STRING,
		),
		'to_user_mailaddress' => array(
			'name'		=> W_USER_INVITE_TO_USER_MAILADDRESS,
			'type'		=> VAR_TYPE_STRING,
		),
		'message' => array(
			'name'		=> W_USER_INVITE_MESSAGE,
			'type'		=> VAR_TYPE_STRING,
		),
			
		/* =============================================
		// �������
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
		// ���������ȸ��
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
		// �����ȡʴ��ۡ˸��
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
		// ���ߥ�˥ƥ����
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
		// ���ߥ�˥ƥ������ȸ��
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
		// �����ĸ��
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
		// �֥�å��ꥹ�ȸ��
		 ============================================= */
		'blacklist' => array('name' => W_USER_BLACKLIST),
		'black_list_id' => array(
			'name'		=> W_USER_BLACKLIST_ID,
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
		// ��å��������
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
		// �˥塼�����
		 ============================================= */
		'news_id' => array(
			'name'	=> W_ADMIN_NEWS_ID,
			'type'	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'news' => array(
			'name'	=> W_ADMIN_NEWS,
		),
		/* =============================================
		// ͧã���
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
		'friend_checked' => array(
			'name'		=> W_USER_FRIEND_INTRODUCTION_CHECKED,
			'type'		=> VAR_TYPE_INT,
		),
		'friend_status' => array(
			'name'		=> W_USER_FRIEND_INTRODUCTION_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �������
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
		// ư����
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
		// ư����
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
		// ������
		 ============================================= */
		'ad' => array(
			'name'		=> W_USER_AD,
		),
		
		/* =============================================
		// ���Х������
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
		// �ǥ��᡼����
		 ============================================= */
		'decomail' => array(
			'name'		=> W_USER_DECOMAIL,
		),
		'decomail_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_USER_DECOMAIL_ID,
		),
		
		/* =============================================
		// ��������
		 ============================================= */
		'game' => array(
			'name'		=> W_USER_GAME,
		),
		'user_game_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'score' => array(
			'name'		=> '������',
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ������ɸ��
		 ============================================= */
		'sound' => array(
			'name'		=> W_USER_SOUND,
		),
		
		/* =============================================
		// ������
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
		// ����å׸��
		 ============================================= */
		'shop' => array(
			'name'		=> W_USER_SHOP,
		),
		'shop_id' => array(
			'name'	  => W_USER_SHOP_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'shop_name' => array(
			'name'	  => W_USER_SHOP_NAME,
			'type'	  => VAR_TYPE_STRING,
		),
		'keyword' => array(
			'name'	  => W_USER_SHOP_KEYWORD,
			'type'	  => VAR_TYPE_STRING,
		),
		
		/* =============================================
		// ���ʸ��
		 ============================================= */
		'item' => array(
			'name'		=> W_USER_ITEM,
		),
		'item_id' => array(
			'name'	  => W_USER_ITEM_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'keyword' => array(
			'name'	  => W_USER_ITEM_KEYWORD,
			'type'	  => VAR_TYPE_STRING,
		),
		'item_category' => array(
			'name'	  => W_USER_ITEM_CATEGORY,
			'type'	  => VAR_TYPE_INT,
		),
		'sort_order' => array(
			'name'	  => W_USER_SORT_ORDER,
			'type'	  => VAR_TYPE_INT,
		),
		'price_start' => array(
			'name'	  => W_USER_PRICE_START,
			'type'	  => VAR_TYPE_INT,
		),
		'price_end' => array(
			'name'	  => W_USER_PRICE_END,
			'type'	  => VAR_TYPE_INT,
		),
		'item_order_type' => array(
			'name'	  => W_USER_ITEM_ORDER_TYPE,
			'type'	  => VAR_TYPE_INT,
		),
		'item_num' => array(
			'name'	  => W_USER_ITEM_NUM,
			'type'	  => VAR_TYPE_INT,
		),
		
		/* =============================================
		// �����ȸ��
		 ============================================= */
		'item' => array(
			'name'		=> W_USER_CART,
		),
		'cart_id' => array(
			'name'	  => W_USER_CART_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'stock_id' => array(
			'name'	  => W_USER_STOCK_ID,
			'type'	  => VAR_TYPE_STRING,
		),
		'cart_item_num' => array(
			'name'	  => W_USER_CART_ITEM_NUM,
			'type'	  => VAR_TYPE_INT,
		),
		
		/* =============================================
		// �����������
		 ============================================= */
		'order' => array(
			'name'		=> W_USER_ORDER,
		),
		'order_id' => array(
			'name'	  => W_USER_ORDER_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_card_type' => array(
			'name'	  => W_USER_ORDER_CARD_TYPE,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_conveni_type' => array(
			'name'	  => W_USER_ORDER_CONVENI_TYPE,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_card_number' => array(
			'name'	  => W_USER_ORDER_CARD_NUMBER,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_card_name' => array(
			'name'	  => W_USER_ORDER_CARD_NAME,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_card_month' => array(
			'name'	  => W_USER_ORDER_CARD_MONTH,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_card_year' => array(
			'name'	  => W_USER_ORDER_CARD_YEAR,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_card_revo_status' => array(
			'name'	  => W_USER_ORDER_CARD_REVO_STATUS,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_delivery_type' => array(
			'name'	  => W_USER_ORDER_DELIVERY_TYPE,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_day' => array(
			'name'	  => W_USER_ORDER_DELIVERY_DAY,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_delivery_note' => array(
			'name'	  => W_USER_ORDER_DELIVERY_NOTE,
			'type'	  => VAR_TYPE_STRING,
		),
		'cart_item_num' => array(
			'name'	  => W_USER_CART_ITEM_NUM,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_use_point_status' => array(
			'name'		=> W_USER_ORDER_USE_POINT_STATUS,
			'type'		=> VAR_TYPE_INT,
			'option'	=> array(1 => W_USER_ORDER_USE_POINT_STATUS),
		),
		'user_order_type' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_USER_ORDER_TYPE,
		),
		'user_order_use_point' => array(
			'name' 		=> W_USER_ORDER_USE_POINT,
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
			'regexp'	=> '/^[0-9]+$/',
		),
		
		/* =============================================
		// �桼��������
		 ============================================= */
		'user_name' => array(
			'name'		=> W_USER_USER_NAME,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_name_kana' => array(
			'name'	  => W_USER_USER_NAME_KANA,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_zipcode' => array(
			'name'	  => W_USER_USER_ZIPCODE,
			'type'	  => VAR_TYPE_STRING,
		),
		'region_id' => array(
			'name'	  => W_USER_REGION_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'user_phone' => array(
			'name'	  => W_USER_USER_PHONE,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_birthday' => array(
			'name'	  => W_USER_USER_BIRTHDAY,
		),
		'user_mailaddress' => array(
			'name'	  => W_USER_USER_MAILADDRESS,
		),
		'user_magazine_allow_flag' => array(
			'name'	  => W_USER_USER_MAGAZINE_ALLOW_FLAG,
			'type'	  => VAR_TYPE_INT,
		),
		
		/* =============================================
		// �桼����������
		 ============================================= */
		'user_order_delivery_name' => array(
			'name'		=> W_USER_ORDER_DELIVERY_NAME,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_name_kana' => array(
			'name'	  => W_USER_ORDER_DELIVERY_NAME_KANA,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_zipcode' => array(
			'name'	  => W_USER_ORDER_DELIVERY_ZIPCODE,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_region_id' => array(
			'name'	  => W_USER_ORDER_DELIVERY_REGION_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'user_order_delivery_address' => array(
			'name'	  => W_USER_ORDER_DELIVERY_ADDRESS,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'name'	  => W_USER_ORDER_DELIVERY_ADDRESS_BUILDING,
			'type'	  => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'name'	  => W_USER_ORDER_DELIVERY_PHONE,
			'type'	  => VAR_TYPE_STRING,
		),
	);
	
	/** @var	array   �ե����������(���������) */
	var $admin_template = array(
		/* =============================================
		// ���ܸ��
		 ============================================= */
		'menu_icon' => array(
			'name'			=> W_ADMIN_MENU_ICON,
		),
		'admin_account' => array('name'=>W_ADMIN_ACCOUNT),
		'point' => array( 'name' => W_ADMIN_POINT ),
		'segment' => array( 'name' => W_ADMIN_SEGMENT ),
		'user' => array( 'name' => W_ADMIN_USER ),
		'image' => array( 'name' => W_ADMIN_IMAGE ),
		'movie' => array( 'name' => W_ADMIN_MOVIE ),
		'ec' => array( 'name' => W_ADMIN_EC),
		'logout' => array( 'name' => W_ADMIN_LOGOUT),
		'account' => array( 'name' => W_ADMIN_ACCOUNT),
		
		// ��Ͽ�ܥ���
		'add' => array(
			'name'			=> W_ADMIN_ADD,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		// �Խ��ܥ���
		'edit' => array(
			'name'			=> W_ADMIN_EDIT,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ��ǧ�ܥ���
		'confirm' => array(
			'name'			=> W_ADMIN_CONFIRM,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ����å�ͥ�����ѹ��ܥ���
		'shop_priority_edit' => array(
			'name'	  		=> W_ADMIN_SHOP_PRIORITY_EDIT,
			'type'	 	 	=> VAR_TYPE_STRINT,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ���ʥ��ƥ���ͥ�����ѹ��ܥ���
		'item_category_priority_edit' => array(
			'name'	  		=> W_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT,
			'type'	 	 	=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ����ͥ�����ѹ��ܥ���
		'item_priority_edit' => array(
			'name'	  		=> W_ADMIN_ITEM_PRIORITY_EDIT,
			'type'	 	 	=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ������Ͽ�ܥ���
		'item_add' => array(
			'name'	  		=> W_ADMIN_ITEM_ADD,
			'type'	 	 	=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ������Ͽ�ܥ���
		'postage_add' => array(
			'name'	  		=> W_ADMIN_POSTAGE_ADD,
			'type'	 	 	=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		// ������������Ͽ�ܥ���
		'exchange_add' => array(
			'name'	  		=> W_ADMIN_EXCHANGE_ADD,
			'type'	 	 	=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
		'search' => array(
			'name'			=> W_ADMIN_SEARCH,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'download' => array(
			'name'			=> W_ADMIN_DOWNLOAD,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'form_add' => array(
			'name'			=> W_ADMIN_FORM_ADD,
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'sort_key' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SORT_KEY,
		),
		'sort_order' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SORT_ORDER,
		),
		
		/* =============================================
		// �桼��������
		 ============================================= */
		'profile' => array('name'=> W_ADMIN_PROFILE),
		'user_id' => array(
			'name'		=> W_ADMIN_USER_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_sub_id' => array(
			'name'		=> W_ADMIN_USER_SUB_ID,
		),
		'user_hash' => array(
			'name'		=> W_ADMIN_USER_HASH,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_nickname' => array(
			'name'		=> W_ADMIN_USER_NICKNAME,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_password' => array(
			'name'		=> W_ADMIN_USER_PASSWORD,
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
//			'regexp'		=> '/^[a-zA-Z0-9]+$/',
//			'min'		=> 4,
//			'required_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
//			'min_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
//			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'user_sex' => array(
			'name'		=> W_ADMIN_USER_SEX,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_sex',
		),
		'user_birth_date_year' => array(
			'name'		=> W_ADMIN_USER_BIRTH_DATE_YEAR,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1900,
			'max'		=> 2100,
		),
		'user_birth_date_month' => array(
			'name'		=> W_ADMIN_USER_BIRTH_DATE_MONTH,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 12,
		),
		'user_birth_date_day' => array(
			'name'		=> W_ADMIN_USER_BIRTH_DATE_DAY,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'min'		=> 1,
			'max'		=> 31,
		),
		'prefecture_id' => array(
			'name'	 	=> W_ADMIN_USER_PREFECTURE_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_name' => array(
			'name'		=> W_ADMIN_USER_NAME,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_name_kana' => array(
			'name'		=> W_ADMIN_USER_NAME_KANA,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_zipcode' => array(
			'name'		=> W_ADMIN_USER_ZIPCODE,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'region_id' => array(
			'name'	 	=> W_ADMIN_USER_REGION_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_address' => array(
			'name'		=> W_ADMIN_USER_ADDRESS,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'name'		=> W_ADMIN_USER_ADDRESS_BUILDING,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_phone' => array(
			'name'		=> W_ADMIN_USER_PHONE,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_blood_type' => array(
			'name'		=> W_ADMIN_USER_BLOOD_TYPE,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_blood_type',
		),
		'job_family_id' => array(
			'name'		=> W_ADMIN_JOB_FAMILY_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, job_family_id',
		),
		'business_category_id' => array(
			'name'		=> W_ADMIN_BUSINESS_CATEGORY_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, business_category_id',
		),
		'user_is_married' => array(
			'name'		=> W_ADMIN_USER_IS_MARRIED,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_is_married',
		),
		'user_has_children' => array(
			'name'		=> W_ADMIN_USER_HAS_CHILDREN,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_has_children',
		),
		'work_location_prefecture_id' => array(
			'name'		=> W_ADMIN_WORK_LOCATION_PREFECTURE_ID,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, prefecture_id',
		),
		'user_hobby' => array(
			'name'	  	=> W_ADMIN_USER_HOBBY,
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_url' => array(
			'name'		=> W_ADMIN_USER_URL,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_introduction' => array(
			'name'		=> W_ADMIN_USER_INTRODUCTION,
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
			'name'		=> W_ADMIN_USER_GUEST_STATUS,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_guest_status',
		),
		'user_status' => array(
			'name'		=> W_ADMIN_USER_STATUS,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_status',
		),
		'user_mail_ok' => array(
			'name'		=> W_ADMIN_USER_MAIL_OK, 
			'type'		=> VAR_TYPE_INT,
		),
		'user_mailaddress' => array(
			'name'		=> W_ADMIN_USER_MAILADDRESS,
		),
		'user_age_min' => array(
			'name'		=> W_ADMIN_USER_AGE_MIN,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'		=> W_ADMIN_USER_AGE_MAX,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_prof_keyword' => array(
			'name'		=> W_ADMIN_USER_PROF_KEYWORD,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_magazine_error_num' => array(
			'name'		=> W_ADMIN_USER_MAGAZINE_ERROR_NUM,
			),
		'user_point'	=> array(
			'name'		=> W_ADMIN_USER_POINT,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_carrier' => array(
			'name'			=> W_ADMIN_USER_CARRIER,
		),
		'user_device' => array(
			'name'		=> W_ADMIN_USER_DEVICE,
		),
		/* =============================================
		// �����ϩ���
		 ============================================= */
		'media'					=> array('name'=> W_ADMIN_MEDIA),
		'media_id'				=> array('name'=> W_ADMIN_MEDIA_ID),
		'media_code'			=> array('name'=> W_ADMIN_MEDIA_CODE),
		'media_name'			=> array('name'=> W_ADMIN_MEDIA_NAME),
		'media_param'			=> array('name'=> W_ADMIN_MEDIA_PARAM),
		'media_param1'			=> array('name'=> W_ADMIN_MEDIA_PARAM1),
		'media_param2'			=> array('name'=> W_ADMIN_MEDIA_PARAM2),
		'media_param3'			=> array('name'=> W_ADMIN_MEDIA_PARAM3),
		'media_res_url'			=> array('name'=> W_ADMIN_MEDIA_RES_URL),
		'media_point'			=> array('name'=> W_ADMIN_MEDIA_POINT),
		'media_status'			=> array('name'=> W_ADMIN_MEDIA_STATUS),
		'media_mail_title'		=> array('name'=> W_ADMIN_MEDIA_MAIL_TITLE),
		'media_mail_body'		=> array('name'=> W_ADMIN_MEDIA_MAIL_BODY),
		'media_account'			=> array('name'=> W_ADMIN_MEDIA_ACCOUNT),
		
		/* =============================================
		// �����������ݡ��ȸ��
		 ============================================= */
		'analytics'				=> array('name'=> W_ADMIN_ANALYTICS),
		'analytics_id'			=> array('name'=> W_ADMIN_ANALYTICS_ID),
		'analytics_date'		=> array('name'=> W_ADMIN_ANALYTICS_DATE),
		'pre_regist_num'		=> array('name'=> W_ADMIN_PRE_REGIST_NUM),
		'regist_num'			=> array('name'=> W_ADMIN_REGIST_NUM),
		'friend_num'			=> array('name'=> W_ADMIN_FRIEND_NUM),
		'resign_num'			=> array('name'=> W_ADMIN_RESIGN_NUM),
		'natural_num'			=> array('name'=> W_ADMIN_NATURAL_NUM),
		
		/* =============================================
		// ���ޥ����
		 ============================================= */
		'magazine'				=> array('name'=> W_ADMIN_MAGAZINE),
		
		/* =============================================
		// �������
		 ============================================= */
		'blog_article' => array('name'=> W_ADMIN_BLOG_ARTICLE),
		'blog_article_id' => array( 'name' => W_ADMIN_BLOG_ARTICLE_ID ),
		'blog_article_title' => array( 'name' => W_ADMIN_BLOG_ARTICLE_TITLE ),
		'blog_article_body' => array( 'name' => W_ADMIN_BLOG_ARTICLE_BODY ),
		'blog_article_status' => array( 'name' => W_ADMIN_BLOG_ARTICLE_STATUS ),
		'blog_article_checked' => array( 'name' => W_ADMIN_BLOG_ARTICLE_CHECKED ),
		'blog_article_public' => array( 'name' => W_ADMIN_BLOG_ARTICLE_PUBLIC ),
		
		/* =============================================
		// ���������ȸ��
		 ============================================= */
		'blog_comment' => array('name' => W_ADMIN_BLOG_COMMENT),
		'blog_comment_id' => array( 'name' => W_ADMIN_BLOG_COMMENT_ID ),
		'blog_comment_body' => array( 'name' => W_ADMIN_BLOG_COMMENT_BODY ),
		'blog_comment_status' => array( 'name' => W_ADMIN_BLOG_COMMENT_STATUS ),
		'blog_comment_checked' => array( 'name' => W_ADMIN_BLOG_COMMENT_CHECKED ),
		
		/* =============================================
		// �����ȸ��
		 ============================================= */
		'comment_id' => array( 'name' => W_ADMIN_COMMENT_ID ),
		'comment_type' => array( 'name' => W_ADMIN_COMMENT_TYPE ),
		'comment_subid' => array( 'name' => W_ADMIN_COMMENT_SUBID ),
		'comment_body' => array( 'name' => W_ADMIN_COMMENT_BODY ),
		'comment_status' => array( 'name' => W_ADMIN_COMMENT_STATUS ),
		'comment_checked' => array( 'name' => W_ADMIN_COMMENT_CHECKED ),
		
		/* =============================================
		// ���ߥ�˥ƥ����
		 ============================================= */
		'community' => array('name' => W_ADMIN_COMMUNITY),
		'community_id' => array( 'name' => W_ADMIN_COMMUNITY_ID ),
		'community_title' => array('name' => W_ADMIN_COMMUNITY_TITLE),
		'community_description' => array(
			'name'			=> W_ADMIN_COMMUNITY_DESCRIPTION,
			'type'			=> VAR_TYPE_STRING,
		),
		'community_category' => array('name' => W_ADMIN_COMMUNITY_CATEGORY),
		'community_category_id' => array(
			'name'			=> W_ADMIN_COMMUNITY_CATEGORY_ID,
			'type'			=> VAR_TYPE_INT,
		),
		'community_join_condition' => array(
			'name'			=> W_ADMIN_COMMUNITY_JOIN_CONDITION,
			'type'			=> VAR_TYPE_INT,
		),
		'community_topic_permission' => array(
				'name'		=> W_ADMIN_COMMUNITY_TOPIC_PERMISSION,
				'type'	  	=> VAR_TYPE_INT,
		),
		/* =============================================
		// ���ߥ�˥ƥ��ȥԥå����
		 ============================================= */
		'community_list' => array('name' => W_ADMIN_COMMUNITY_LIST),
		'community_article' => array('name' => W_ADMIN_COMMUNITY_ARTICLE),
		'community_article_id' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_ID ),
		'community_article_title' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_TITLE ),
		'community_article_body' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_BODY ),
		'community_article_status' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_STATUS ),
		'community_article_checked' => array( 'name' => W_ADMIN_COMMUNITY_ARTICLE_CHECKED ),
		
		/* =============================================
		// ���ߥ�˥ƥ������ȸ��
		 ============================================= */
		'community_comment' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT ),
		'community_comment' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT ),
		'community_comment_id' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_ID ),
		'community_comment_body' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_BODY ),
		'community_comment_status' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_STATUS ),
		'community_comment_checked' => array( 'name' => W_ADMIN_COMMUNITY_COMMENT_CHECKED ),
		
		/* =============================================
		// �����ĸ��
		 ============================================= */
		'bbs' => array('name' => W_ADMIN_BBS),
		'bbs_name' => array('name' => W_ADMIN_BBS_NAME),
		'bbs_id' => array( 'name' => W_ADMIN_ID ),
		'bbs_body' => array( 'name' => W_ADMIN_BBS_BODY ),
		'bbs_status' => array( 'name' => W_ADMIN_BBS_STATUS ),
		'bbs_checked' => array( 'name' => W_ADMIN_BBS_CHECKED ),
		
		/* =============================================
		// �֥�å��ꥹ�ȸ��
		 ============================================= */
		'blacklist' => array('name' => W_ADMIN_BLACKLIST),
		'black_list_id' => array('name' => W_ADMIN_BLACKLIST_ID),
		'black_list_user_id' => array( 'name' => W_ADMIN_BLACKLIST_ADMIN_ID ),
		'black_list_deny_user_id' => array( 'name' => W_ADMIN_BLACKLIST_DENY_ADMIN_ID ),
		'black_list_status' => array( 'name' => W_ADMIN_BLACKLIST_STATUS ),
		'black_list_checked' => array( 'name' => W_ADMIN_BLACKLIST_CHECKED ),
		
		/* =============================================
		// ���ܾ�����
		 ============================================= */
		'config' => array('name' => W_ADMIN_CONFIG),
		/* =============================================
		
		/* =============================================
		// ���ߥ�˥ƥ����ƥ�����
		 ============================================= */
		'community_category' => array('name' => W_ADMIN_COMMUNITY_CATEGORY),
		/* =============================================
		
		// �ߥ˥᡼����
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
		// �˥塼�����
		 ============================================= */
		'news_type' => array(
			'name'			=> W_ADMIN_NEWS_TYPE,
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> 'Util,news_type',
		),
		'news_title' => array(
			'name'			=> W_ADMIN_NEWS_TITLE,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'news_body' => array(
			'name'			=> W_ADMIN_NEWS_BODY,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'news_time' => array(
			'name'			=> W_ADMIN_NEWS_TIME,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		
		/* =============================================
		// ͧã��Ϣ���
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
		// �������
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
		// ư����
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
		// ư����
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
		// �����Ը��
		 ============================================= */
		'admin_account' => array('name'=>W_ADMIN_ACCOUNT),
		
		/* =============================================
		// �ݥ���ȸ��
		 ============================================= */
		'point_id' => array(
			'name'		=> W_ADMIN_POINT_ID,
			'type'		=> VAR_TYPE_INT,
		),
		'point_sub_id' => array(
			'name'		=> W_ADMIN_POINT_SUB_ID,
			'type'		=> VAR_TYPE_INT,
		),
		'point_type' => array(
			'name'		=> W_ADMIN_POINT_TYPE,
			'type'		=> VAR_TYPE_INT,
		),
		'point_status' => array(
			'name'		=> W_ADMIN_POINT_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'point_memo' => array(
			'name'		=> W_ADMIN_POINT_MEMO,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		/* =============================================
		// ���Х������
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
		// �ǥ��᡼����
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
		// ��������
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
		// �ե꡼�ڡ������
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
		// ������ɸ��
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
		// �ӥǥ����
		 ============================================= */
		'video' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_VIDEO,
		),
		'video_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_VIDEO_ID,
		),
		'video_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_NAME
		),
		'video_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_DESC
		),
		'video_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_URL,
		),
		'video_image' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_VIDEO_IMAGE,
		),
		'video_point' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_POINT,
		),
		'video_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_CATEGORY_ID,
		),
		'video_stock_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_STOCK_NUM,
		),
		'video_stock_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_VIDEO_STOCK_STATUS,
		),
		'video_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_START_TIME,
		),
		'video_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_VIDEO_START_STATUS,
		),
		'video_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_END_TIME,
		),
		'video_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_VIDEO_END_STATUS,
		),
		'video_image_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_IMAGE_NAME
		),
		'video_image_file' => array(
			'type'		=> VAR_TYPE_FILE,
			'name'		=> W_ADMIN_VIDEO_IMAGE_FILE,
		),
		'video_image_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_IMAGE_STATUS,
		),
		'video_category' => array(
			'name'		=> W_ADMIN_VIDEO_CATEGORY,
		),
		'video_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_CATEGORY_NAME,
		),
		'video_category_desc' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_VIDEO_CATEGORY_DESC,
		),
		'video_category_priority' => array(
			'name'		=> W_ADMIN_VIDEO_CATEGORY_PRIORITY_ID,
		),		
		'video_category_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'name'		=> W_ADMIN_VIDEO_CATEGORY_PRIORITY_ID,
		),
		
		/* =============================================
		// ������
		 ============================================= */
		'report' => array( 'name' => W_ADMIN_REPORT ),
		
		/* =============================================
		// �Хʡ����
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
		// ������
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
		// �����˥塼���
		 ============================================= */
		'admenu' => array(
			'name'		=> W_ADMIN_ADMENU,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �����������ϸ��
		 ============================================= */
		'stats' => array(
			'name'		=> W_ADMIN_STATS,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// HTML�ƥ�ץ졼�ȸ��
		 ============================================= */
		'htmltemplate' => array(
			'name'		=> W_ADMIN_HTMLTEMPLATE,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �᡼��ƥ�ץ졼�ȸ��
		 ============================================= */
		'mailtemplate' => array(
			'name'		=> W_ADMIN_MAILTEMPLATE,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �������ޥ˥奢����
		 ============================================= */
		'faq' => array(
			'name'		=> W_ADMIN_FAQ,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ��ʸ���ѥ�åȸ��
		 ============================================= */
		'emoji' => array(
			'name'		=> W_ADMIN_EMOJI,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// NG��ɸ��
		 ============================================= */
		'ngword' => array(
			'name'		=> W_ADMIN_NGWORD,
			'type'		=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// ��ӥ塼���
		 ============================================= */
		'review' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_REVIEW,
		),
		'review_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_REVIEW_ID,
		),
		'cart_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CART_ID,
		),
		'item_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_ID,
		),
		'review_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_REVIEW_STATUS,
		),
		'review_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_REVIEW_TITLE,
		),
		'review_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_REVIEW_BODY,
		),
		
		/* =============================================
		// �����������
		 ============================================= */
		'user_order' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER,
		),
		'user_order_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_ID,
		),
		'user_order_no' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_NO,
		),
		'user_order_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_NAME,
		),
		'user_order_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_STATUS,
		),
		'user_order_type' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_TYPE,
		),
		'user_order_delivery_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_NAME,
		),
		'user_order_delivery_name_kana' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_NAME_KANA,
		),
		'user_order_delivery_zipcode' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_ZIPCODE,
		),
		'user_order_delivery_region_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_REGION_ID,
		),
		'user_order_delivery_address' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_ADDRESS,
		),
		'user_order_delivery_address_building' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_ADDRESS_BUILDING,
		),
		'user_order_delivery_phone' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_PHONE,
		),
		'user_order_delivery_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_TYPE,
		),
		'user_order_card_cart_hash' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_CARD_CART_HASH,
		),
		'user_order_card_revo_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_CARD_REVO_STATUS,
		),
		'user_order_credit_auth_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_CREDIT_AUTH_CODE,
		),
		'user_order_conveni_cart_hash' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_CONVENI_CART_HASH,
		),
		'user_order_conveni_sale_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_CONVENI_SALE_CODE,
		),
		'user_order_comment' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_COMMENT,
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_USE_POINT_STATUS,
		),
		'user_order_get_point' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_GET_POINT,
		),
		'user_order_delivery_day' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_DAY
		),
		'user_order_delivery_note' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_DELIVERY_NOTE,
		),
		'user_order_total_price1' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_TOTAL_PRICE1,
		),
		'user_order_total_price2' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_TOTAL_PRICE2,
		),
		'user_order_tax' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_TAX,
		),
		'user_order_postage' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_POSTAGE,
		),
		'user_order_exchange_fee' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_USER_ORDER_EXCHANGE_FEE,
		),
		'user_order_use_point' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_USE_POINT,
		),
		'user_order_created_time' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_USER_ORDER_CREATED_TIME,
		),
		
		/* =============================================
		// ���ʸ��
		 ============================================= */
		'item' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM,
		),
		'item_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_ID,
		),
		'item_distinction_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_DISTINCTION_ID,
		),
		'item_priority_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_PRIORITY_ID,
		),
		'item_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_NAME,
		),
		'item_price' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_PRICE,
		),
		'item_detail' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_DETAIL,
		),
		'item_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_STATUS,
		),
		'item_contents_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_CONTENTS_BODY,
		),
		'item_start_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_START_STATUS,
		),
		'item_end_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_END_STATUS,
		),
		'item_start_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_START_TIME,
		),
		'item_end_time' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_END_TIME,
		),
		'item_type' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_TYPE,
		),
		'item_' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_USE_CREDIT_STATUS,
		),
		'item_settlement' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_SETTLEMENT,
		),
		'item_use_credit_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_USE_CREDIT_STATUS,
		),
		'item_use_conveni_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_USE_CONVENI_STATUS,
		),
		'item_use_exchange_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_USE_EXCHANGE_STATUS,
		),
		'item_use_transfer_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_USE_TRANSFER_STATUS,
		),
		'item_bundle_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_ITEM_BUNDLE_STATUS,
		),
		'item_label_front' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_LABEL_FRONT,
		),
		'item_label_back' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_LABEL_BACK,
		),
		'item_point' => array(
			'type'		=> VAR_TYPE_INT,
			//'name'		=> W_ADMIN_ITEM_POINT,
			'name'		=> W_ADMIN_POINT,
		),
		'item_text1' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_TEXT1,
		),
		'item_text2' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_TEXT2,
		),
		'item_spec' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_SPEC,
		),
		'item_image_file' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_IMAGE_FILE,
		),
		
		/* =============================================
		// ��������
		 ============================================= */
		'supplier' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SUPPLIER,
		),
		'supplier_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_SUPPLIER_ID,
		),
		'supplier_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SUPPLIER_NAME,
		),
		'supplier_shipping_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SUPPLIER_SHIPPING_TYPE,
		),
		'supplier_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SUPPLIER_STATUS,
		),
		'supplier_bundle_allow_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SUPPLIER_BUNDLE_ALLOW_ID,
		),
		'supplier_settlement' => array(
			'name'		=> W_ADMIN_SUPPLIER_SETTLEMENT,
		),
		/* =============================================
		// �������
		 ============================================= */
		'postage' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POSTAGE,
		),
		'postage_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POSTAGE_ID,
		),
		'postage_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_POSTAGE_NAME,
		),
		'postage_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_POSTAGE_STATUS,
		),
		'postage_same_status' => array(
			'name'			=> W_ADMIN_POSTAGE_SAME_STATUS,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_same_price' => array(
			'name'			=> W_ADMIN_POSTAGE_SAME_PRICE,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_1' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_1,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_2' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_2,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_3' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_3,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_4' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_4,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_5' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_5,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_6' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_6,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_7' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_7,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_8' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_8,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_9' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_9,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_10' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_10,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_11' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_11,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_12' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_12,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_13' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_13,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_14' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_14,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_15' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_15,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_16' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_16,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_17' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_17,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_18' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_18,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_19' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_19,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_20' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_20,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_21' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_21,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_22' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_22,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_23' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_23,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_24' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_24,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_25' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_25,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_26' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_26,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_27' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_27,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_28' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_28,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_29' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_29,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_30' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_30,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_31' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_31,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_32' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_32,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_33' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_33,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_34' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_34,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_35' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_35,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_36' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_36,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_37' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_37,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_38' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_38,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_39' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_39,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_40' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_40,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_41' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_41,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_42' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_42,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_43' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_43,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_44' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_44,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_45' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_45,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_46' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_46,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_47' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_47,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_48' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_48,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_pref_49' => array(
			'name'			=> W_ADMIN_POSTAGE_PREF_49,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_type' => array(
			'name'			=> W_ADMIN_POSTAGE_TYPE,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_price_set' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PRICE_SET,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_price_value' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PRICE_VALUE,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_price_set_under' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PRICE_SET_UNDER,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_piece_set' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PIECE_SET,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_piece_value' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PIECE_VALUE,
			'type'			=> VAR_TYPE_INT,
		),
		'postage_total_piece_set_under' => array(
			'name'			=> W_ADMIN_POSTAGE_TOTAL_PIECE_SET_UNDER,
			'type'			=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �������������
		 ============================================= */
		'exchange' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_EXCHANGE,
		),
		'exchange_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_EXCHANGE_ID,
		),
		'exchange_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_EXCHANGE_NAME,
		),
		'exchange_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_EXCHANGE_STATUS,
		),
		'exchange_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_EXCHANGE_TYPE,
		),
		'exchange_same_status' => array(
			'name'			=> W_ADMIN_EXCHANGE_SAME_STATUS,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_same_price' => array(
			'name'			=> W_ADMIN_EXCHANGE_SAME_PRICE,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_price_set' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PRICE_SET,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_price_set_under' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PRICE_SET_UNDER,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_price_value' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PRICE_VALUE,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_piece_set' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PIECE_SET,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_piece_value' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PIECE_VALUE,
			'type'			=> VAR_TYPE_INT,
		),
		'exchange_total_piece_set_under' => array(
			'name'			=> W_ADMIN_EXCHANGE_TOTAL_PIECE_SET_UNDER,
			'type'			=> VAR_TYPE_INT,
		),
		
		/* =============================================
		// �������������
		 ============================================= */
		'exchange_range' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_EXCHANGE_RANGE,
		),
		'exchange_range_price' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_EXCHANGE_RANGE_PRICE,
		),
		'new_exchange_range_price' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_NEW_EXCHANGE_RANGE_PRICE,
		),
		'new_exchange_range_start' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_NEW_EXCHANGE_RANGE_START,
		),
		'new_exchange_range_end' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_NEW_EXCHANGE_RANGE_END,
		),
		
		/* =============================================
		// �߸˸��
		 ============================================= */
		'stock' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_STOCK,
		),
		'item_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_ITEM_TYPE,
		),
		'stock_num' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_STOCK_NUM,
		),
		'stock_one_type_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_STOCK_ONE_TYPE_STATUS,
		),
		'stock_priority_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_STOCK_PRIORITY_ID,
		),
		
		/* =============================================
		// �����ȸ��
		 ============================================= */
		'cart' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CART,
		),
		'cart_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CART_ID,
		),
		'cart_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_CART_STATUS,
		),
		'cart_item_num' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_CART_ITEM_NUM,
		),
		'slip_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'name'		=> W_ADMIN_SLIP_CODE,
		),
		
		/* =============================================
		// ����ñ�̸��
		 ============================================= */
		'post_unit' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_CART,
		),
		'post_unit_group_id' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POST_UNIT_GROUP_ID,
		),
		'post_unit_sent_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POST_UNIT_SENT_STATUS,
		),
		'post_unit_sent_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POST_UNIT_SENT_STATUS,
		),
		'post_unit_item_num' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> W_ADMIN_POST_UNIT_ITEM_NUM,
		),
		
		/* =============================================
		// ����å׸��
		 ============================================= */
		'shop' => array(
			'name'		=> W_ADMIN_SHOP,
		),
		'shop_id' => array(
			'name'	  => W_ADMIN_SHOP_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'shop_name' => array(
			'name'	  => W_ADMIN_SHOP_NAME,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_status' => array(
			'name'	  => W_ADMIN_SHOP_STATUS,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_priority_id' => array(
			'name'	  => W_ADMIN_SHOP_PRIORITY_ID,
			'type'	  => VAR_TYPE_INT,
		),
		'shop_news' => array(
			'name'	  => W_ADMIN_SHOP_NEWS,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_bgcolor' => array(
			'name'	  => W_ADMIN_SHOP_BGCOLOR,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_textcolor' => array(
			'name'	  => W_ADMIN_SHOP_TEXTCOLOR,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_linkcolor' => array(
			'name'	  => W_ADMIN_SHOP_LINKCOLOR,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_alinkcolor' => array(
			'name'	  => W_ADMIN_SHOP_ALINKCOLOR,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_vlinkcolor' => array(
			'name'	  => W_ADMIN_SHOP_VLINKCOLOR,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_new_arrivals' => array(
			'name'	  => W_ADMIN_SHOP_NEW_ARRIVALS,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_ranking' => array(
			'name'	  => W_ADMIN_SHOP_RANKING,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_image1_file' => array(
			'name'	  => W_ADMIN_SHOP_IMAGE1_FILE,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_image2_file' => array(
			'name'	  => W_ADMIN_SHOP_IMAGE2_FILE,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_category_print_status' => array(
			'name'	  => W_ADMIN_SHOP_CATEGORY_PRINT_STATUS,
			'type'	  => VAR_TYPE_STRING,
		),
		'shop_body' => array(
			'name'	  => W_ADMIN_SHOP_BODY,
			'type'	  => VAR_TYPE_STRING,
		),
		
		/* =============================================
		// ���ʥ��ƥ�����
		 ============================================= */
		'item_category' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY,
			'type'		=> VAR_TYPE_STRING,
		),
		'item_category_id' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_ID,
			'type'		=> VAR_TYPE_INT,
		),
		'item_category_name' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_NAME,
			'type'		=> VAR_TYPE_STRING,
		),
		'item_category_status' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_STATUS,
			'type'		=> VAR_TYPE_INT,
		),
		'item_category_text' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'item_category_image1_file' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_IMAGE1_FILE,
			'type'		=> VAR_TYPE_STRING,
		),
		'item_category_contents_body' => array(
			'name'		=> W_ADMIN_ITEM_CATEGORY_CONTENTS_BODY,
			'type'		=> VAR_TYPE_STRING,
		),
		'item_category_priority_id' => array(
			'name'	  => W_ADMIN_ITEM_CATEGORY_PRIORITY_ID,
			'type'	  => VAR_TYPE_INT,
		),
		
		/* =============================================
		// ���ʥ���ץ���
		 ============================================= */
		'sample' => array(
			'name'		=> W_ADMIN_SAMPLE,
			'type'		=> VAR_TYPE_STRING,
		),
		'sample_id' => array(
			'name'		=> W_ADMIN_SAMPLE,
			'type'		=> VAR_TYPE_INT,
		),
		'sample_name' => array(
			'name'		=> W_ADMIN_SAMPLE_NAME,
			'type'		=> VAR_TYPE_STRING,
		),
		'sample_image' => array(
			'name'		=> W_ADMIN_SAMPLE_IMAGE,
			'type'		=> VAR_TYPE_STRING,
		),
	);
	
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;

	/**#@-*/

	/**
v	 *  �ե������͸��ڤΥ��顼������Ԥ�
	 *
	 *  @access     public
	 *  @param  string	  $name   �ե��������̾
	 *  @param  int		 $code   ���顼������
	 */
	function handleError($name, $code)
	{
		return parent::handleError($name, $code);
	}
	
	/**
	 *  �ե�����������ƥ�ץ졼�Ȥ����ꤹ��
	 *
	 *  @access protected
	 *  @param  array   $form_template  �ե������ͥƥ�ץ졼��
	 *  @return array   �ե������ͥƥ�ץ졼��
	 */
	function _setFormTemplate($form_template)
	{
		$access_key = "";
		// access_key(�ꥯ�����Ȥ��줿���������̾)
		foreach($this->backend->controller->action as $key => $value) {
			$access_key = $this->backend->controller->action[$key]['class_name'];
			break;
		}
		
		// PC�Ǵ������̤˥������������Ȥ���PC�Ѥ�ɽ������Ѥ���
		if($GLOBALS['EMOJIOBJ']->carrier == 'PC' && ereg('Admin',$access_key)){
			// ñ�˥ޡ�����������Ǥϥե�������󤬾�񤭤���Ƥ��ޤ��Τǡ��Ƶ�Ū�˼¹Ԥ��ƥե������������¸����褦�ˤ���
			$form_template = $this->_setAdminTemplate($form_template, $this->admin_template);
		}
		
		return parent::_setFormTemplate($form_template);
	}
	
	/**
	 *  �ե�����������ƥ�ץ졼�Ȥ�ޡ�������
	 *
	 *  @access protected
	 *  @param  array   $form_template  �ޡ����оݥե������ͥƥ�ץ졼��
	 *  @param  array   $admin_template  �ޡ����ѥե������ͥƥ�ץ졼��
	 *  @return array   �ե������ͥƥ�ץ졼��
	 */
	function _setAdminTemplate($form_template, $admin_template)
	{
		if(is_array($admin_template)){
			foreach($admin_template as $k => $v){
				// ����ξ��
				if(is_array($v)){
					// �����Υ����������硢�ޡ����ؿ���ư
					if(array_key_exists($k , $form_template)){
						$form_template[$k] = array_merge($form_template[$k],$v);
					}
					// �����������ʤ���硢������ɲ�
					else{
						$form_template[$k] = $v;
					}
				}
				// �����顼�ξ��
				else{
					// �ɲ�
					$form_template[$k] = $v;
				}
			}
		}
		return $form_template;
	}
	
	/**
	 *  �ե���������������ꤹ��
	 *
	 *  @access protected
	 */
	function _setFormDef()
	{
		return parent::_setFormDef();
	}

	/**
	 *  �ե������ͤؤΥ�������(W)
	 *
	 *  @access     public
	 *  @param  string  $name   �ե������ͤ�̾��
	 *  @param  string  $value  ���ꤹ����
	 */
	function set($name, $value)
	{
		return parent::set($name,$value);
	}

	/**
	 *  �ե��������ɽ��̾���������
	 *
	 *  @access     public
	 *  @param  string  $name   �ե������ͤ�̾��
	 *  @return mixed   �ե������ͤ�ɽ��̾
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
	
	// hiddenvars��γ�ʸ�����Ѵ�
	function _replaceEmojiForm($value)
	{
		// �ե�������������ʸ�������ɤ��Ѵ�
		$value = preg_replace('/\[x:(\d{4})\]/','[xf:\\1]',$value);
		return $value;
	}
	
	/**
	 *  �ե������ͤ�hidden�����Ȥ����֤�
	 *
	 *  @access     public
	 *  @param  array   $include_list   ���󤬻��ꤵ�줿��硢��������˴ޤޤ��ե�������ܤΤߤ��оݤȤʤ�
	 *  @param  array   $exclude_list   ���󤬻��ꤵ�줿��硢��������˴ޤޤ�ʤ��ե�������ܤΤߤ��оݤȤʤ�
	 *  @return string  hidden�����Ȥ��Ƶ��Ҥ��줿HTML
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
				// �ե������ͤ������Ƥ��ʤ����Ϥ��⤽��hidden��������Ϥ��ʤ�
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