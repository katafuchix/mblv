<?php
/**
 *  Tv_Error.php
 * ���顼���
 *
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ���̥��顼�ֹ����
 */

$i = 260;
define('E_INVALID_DATE', $i++);

/**
 * �������顼�ֹ����
 */
/* =============================================
// ����
 ============================================= */
define('E_ADMIN_DB', $i++);
define('I_ADMIN_UPDATE_STATUS_ALL_DONE', $i++);

/* =============================================
// ����
 ============================================= */
define('I_ADMIN_BLOG_ARTICLE_ADD_DONE', $i++);
define('I_ADMIN_BLOG_ARTICLE_EDIT_DONE', $i++);
define('I_ADMIN_BLOG_ARTICLE_DELETE_DONE', $i++);

/* =============================================
// ����������
 ============================================= */
define('I_ADMIN_BLOG_COMMENT_ADD_DONE', $i++);
define('I_ADMIN_BLOG_COMMENT_EDIT_DONE', $i++);
define('I_ADMIN_BLOG_COMMENT_DELETE_DONE', $i++);

/* =============================================
// ���ߥ�˥ƥ�
 ============================================= */
define('E_ADMIN_COMMUNITY_NOT_MEMBER', $i++);
define('I_ADMIN_COMMUNITY_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_DELETE_DONE', $i++);

/* =============================================
// ���ߥ�˥ƥ��ȥԥå�
 ============================================= */
define('I_ADMIN_COMMUNITY_ARTICLE_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_ARTICLE_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_ARTICLE_DELETE_DONE', $i++);

/* =============================================
// ���ߥ�˥ƥ�������
 ============================================= */
define('I_ADMIN_COMMUNITY_COMMENT_ADD_DONE', $i++);
define('I_ADMIN_COMMUNITY_COMMENT_EDIT_DONE', $i++);
define('I_ADMIN_COMMUNITY_COMMENT_DELETE_DONE', $i++);

/* =============================================
// ����
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
// ���Х���
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
// �Хʡ�
 ============================================= */
define('I_ADMIN_BANNER_ADD_DONE', $i++);
define('I_ADMIN_BANNER_DELETE_DONE', $i++);
define('I_ADMIN_BANNER_EDIT_DONE', $i++);

/* =============================================
// CMS
 ============================================= */
define('I_ADMIN_CMS_EDIT_DONE', $i++);

/* =============================================
// ����
 ============================================= */
define('I_ADMIN_CONFIG_EDIT_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_CONFIG_USER_PROF_DELETE_DONE', $i++);
define('I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE', $i++);

/* =============================================
// �ǥ��᡼��
 ============================================= */
define('I_ADMIN_DECOMAIL_ADD_DONE', $i++);
define('I_ADMIN_DECOMAIL_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE', $i++);

/* =============================================
// ������
 ============================================= */
define('I_ADMIN_GAME_ADD_DONE', $i++);
define('I_ADMIN_GAME_DELETE_DONE', $i++);
define('I_ADMIN_GAME_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_GAME_CATEGORY_PRIORITY_DONE', $i++);

/* =============================================
// �ե꡼�ڡ���
 ============================================= */
define('I_ADMIN_CONTENTS_ADD_DONE', $i++);
define('I_ADMIN_CONTENTS_DELETE_DONE', $i++);
define('I_ADMIN_CONTENTS_EDIT_DONE', $i++);
define('I_ADMIN_CONTENTS_CODE_DUPLICATE', $i++);

/* =============================================
// �ե�����
 ============================================= */
define('I_ADMIN_FILE_UPLOAD', $i++);
define('E_ADMIN_FILE_UPLOAD', $i++);
define('I_ADMIN_FILE_DELETE', $i++);
define('E_ADMIN_FILE_DELETE', $i++);

/* =============================================
// ������
 ============================================= */
define('E_ADMIN_LOGIN', $i++);

/* =============================================
// ��������
 ============================================= */
define('I_ADMIN_LOGOUT', $i++);

/* =============================================
// �᡼��ޥ�����
 ============================================= */
define('I_ADMIN_MAGAZINE_ADD_DONE', $i++);
define('I_ADMIN_MAGAZINE_DELETE_DONE', $i++);
define('I_ADMIN_MAGAZINE_EDIT_DONE', $i++);

/* =============================================
// �����ϩ
 ============================================= */
define('E_ADMIN_MEDIA_CODE_DUPLICATE', $i++);
define('I_ADMIN_MEDIA_ADD_DONE', $i++);
define('I_ADMIN_MEDIA_DELETE_DONE', $i++);
define('I_ADMIN_MEDIA_EDIT_DONE', $i++);

/* =============================================
// �˥塼��
 ============================================= */
define('I_ADMIN_NEWS_ADD_DONE', $i++);
define('I_ADMIN_NEWS_EDIT_DONE', $i++);

/* =============================================
// �桼��
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
// ������
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
 * �桼�����顼�ֹ����
 */
/* =============================================
// ����
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
// ����
 ============================================= */
define('E_USER_AD_OUT_OF_DATE', $i++);
define('E_USER_AD_PC', $i++);
define('E_USER_AD_MOBILE', $i++);

/* =============================================
// ���Х���
 ============================================= */
define('E_USER_AVATAR_DUPLICATE', $i++);
define('E_USER_AVATAR_SEX', $i++);
define('E_USER_AVATAR_INVALID', $i++);
define('I_USER_AVATAR_BUY_DONE', $i++);
define('I_USER_AVATAR_CHANGE_DONE', $i++);
define('I_USER_AVATAR_DELETE_DONE', $i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_BBS_MESSAGE_NOT_FOUND', $i++);

/* =============================================
// �֥�å��ꥹ��
 ============================================= */
define('E_USER_BLACKLIST', $i++);
define('E_USER_BLACKLIST_DUPLICATE', $i++);
define('I_USER_BLACKLIST_DELETE_DONE', $i++);
define('E_USER_BLACKLIST_HOME', $i++);

/* =============================================
// �֥�
 ============================================= */
define('E_USER_BLOG_ARTICLE_ACCESS_DENIED', $i++);
define('E_USER_BLOG_ARTICLE_NOT_FOUND', $i++);
define('E_USER_BLOG_COMMENT_ACCESS_DENIED', $i++);
define('E_USER_BLOG_COMMENT_NOT_FOUND', $i++);
define('I_USER_BLOG_ARTICLE_ADD_DONE', $i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_COMMENT_NOT_FOUND', $i++);

/* =============================================
// ���ߥ�˥ƥ�
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
// ����
 ============================================= */
define('E_USER_CONFIG_FORMER_PASSWORD', $i++);

/* =============================================
// �ǥ��᡼��
 ============================================= */
define('E_USER_DECOMAIL_DUPLICATE', $i++);
define('I_USER_DECOMAIL_BUY_DONE', $i++);

/* =============================================
// ͧã
 ============================================= */
define('E_USER_FRIEND_APPLY_DUPLICATE', $i++);
define('E_USER_FRIEND_DELETE_APPLYING', $i++);
define('E_USER_FRIEND_DELETE_DONE', $i++);
define('E_USER_FRIEND_DELETE_NOT_FRIEND', $i++);
define('E_USER_FRIEND_DUPLICATE', $i++);
define('E_USER_FRIEND_INTRODUCTION_DENIED', $i++);
define('I_USER_FRIEND_DELETE_DONE', $i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_GAME_ACCESS_DENIED', $i++);
define('I_USER_GAME_BUY_DONE', $i++);

/* =============================================
// �ե꡼�ڡ���
 ============================================= */
define('E_USER_CONTENTS_NOT_FOUND', $i++);

/* =============================================
// ����
 ============================================= */
define('E_USER_INVITE_VALID_USER', $i++);
define('E_USER_INVITE_CHAPCHA', $i++);
define('E_USER_INVITE_DUPLICATE', $i++);
define('E_USER_INVITE_MAILADDRESS', $i++);

/* =============================================
// ��å�����
 ============================================= */
define('E_USER_MESSAGE_NOT_FOUND', $i++);
define('I_USER_MESSAGE_DELETE_DONE', $i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_LOGIN', $i++);
define('E_USER_LOGIN_MOBILE_ONLY', $i++);

/* =============================================
// ��������
 ============================================= */
define('I_USER_LOGOUT_DONE', $i++);

/* =============================================
// �ץ�ե�����
 ============================================= */
define('I_USER_PROFILE_EDIT_DONE', $i++);
define('E_USER_NICKNAME_ALREADY_USED', $i++);

/* =============================================
// ͧã����
 ============================================= */
define('E_USER_SEARCH_NO_KEY', $i++);

/* =============================================
// �����Ͽ
 ============================================= */
define('E_USER_REGIST_10', $i++);
define('E_USER_REGIST_20', $i++);
define('E_USER_REGIST_30', $i++);
define('E_USER_REGIST_40', $i++);
define('E_USER_REGIST_50', $i++);
define('I_USER_REGIST_DONE', $i++);

/* =============================================
// ��ޥ������
 ============================================= */
define('I_USER_REMIND_DONE', $i++);

/* =============================================
// ���
 ============================================= */
define('E_USER_RESIGN_COMMUNITY', $i++);



/**
 * ���顼��å��������
 */
$errorMessage = array(
// ����
E_INVALID_DATE							=> '̵�������դǤ�',
// ����¦
E_ADMIN_DB								=> 'DB���顼',
I_ADMIN_UPDATE_STATUS_ALL_DONE			=> W_ADMIN_CHECKED.'�����򹹿����ޤ�����',
// ������
E_ADMIN_ID_DUPLICATE					=> '���Υ�����ID�ϴ��˻��Ѥ���Ƥ��ޤ���',
I_ADMIN_ACCOUNT_ADD_DONE				=> W_ADMIN_ACCOUNT.'��Ͽ����λ���ޤ�����',
I_ADMIN_ACCOUNT_EDIT_DONE				=> W_ADMIN_ACCOUNT.'�Խ�����λ���ޤ�����',
I_ADMIN_ACCOUNT_DELETE_DONE				=> W_ADMIN_ACCOUNT.'�������λ���ޤ�����',
// ����
I_ADMIN_BLOG_ARTICLE_ADD_DONE			=> W_ADMIN_BLOG_ARTICLE.'����Ͽ����λ���ޤ�����',
I_ADMIN_BLOG_ARTICLE_EDIT_DONE			=> W_ADMIN_BLOG_ARTICLE.'���Խ�����λ���ޤ�����',
I_ADMIN_BLOG_ARTICLE_DELETE_DONE		=> W_ADMIN_BLOG_ARTICLE.'�κ������λ���ޤ�����',
// ����������
I_ADMIN_BLOG_COMMENT_ADD_DONE			=> W_ADMIN_BLOG_COMMENT.'����Ͽ����λ���ޤ�����',
I_ADMIN_BLOG_COMMENT_EDIT_DONE			=> W_ADMIN_BLOG_COMMENT.'���Խ�����λ���ޤ�����',
I_ADMIN_BLOG_COMMENT_DELETE_DONE		=> W_ADMIN_BLOG_COMMENT.'�κ������λ���ޤ�����',
// ���ߥ�˥ƥ�
I_ADMIN_COMMUNITY_ADD_DONE				=> W_ADMIN_COMMUNITY.'����Ͽ����λ���ޤ�����',
I_ADMIN_COMMUNITY_EDIT_DONE				=> W_ADMIN_COMMUNITY.'���Խ�����λ���ޤ�����',
I_ADMIN_COMMUNITY_DELETE_DONE			=> W_ADMIN_COMMUNITY.'�κ������λ���ޤ�����',
// ���ߥ�˥ƥ��ȥԥå�
I_ADMIN_COMMUNITY_ARTICLE_ADD_DONE		=> W_ADMIN_COMMUNITY_ARTICLE.'����Ͽ����λ���ޤ�����',
I_ADMIN_COMMUNITY_ARTICLE_EDIT_DONE		=> W_ADMIN_COMMUNITY_ARTICLE.'���Խ�����λ���ޤ�����',
I_ADMIN_COMMUNITY_ARTICLE_DELETE_DONE	=> W_ADMIN_COMMUNITY_ARTICLE.'�κ������λ���ޤ�����',
// ���ߥ�˥ƥ�������
I_ADMIN_COMMUNITY_COMMENT_ADD_DONE		=> W_ADMIN_COMMUNITY_COMMENT.'����Ͽ����λ���ޤ�����',
I_ADMIN_COMMUNITY_COMMENT_EDIT_DONE		=> W_ADMIN_COMMUNITY_COMMENT.'���Խ�����λ���ޤ�����',
I_ADMIN_COMMUNITY_COMMENT_DELETE_DONE	=> W_ADMIN_COMMUNITY_COMMENT.'�κ������λ���ޤ�����',
// ���ߥ�˥ƥ����С�
E_ADMIN_COMMUNITY_NOT_MEMBER			=> W_ADMIN_COMMUNITY.'�Υ��ФǤϤ���ޤ���',
// ����
E_ADMIN_AD_CODE_DUPLICATE				=> '����'.W_ADMIN_AD_CODE.'�ѥ�᥿�ϴ��˻Ȥ��Ƥ��ޤ����̤Υѥ�᥿����ꤷ�Ƥ���������',
I_ADMIN_AD_ADD_DONE						=> W_ADMIN_AD.'��Ͽ����λ���ޤ�����',
I_ADMIN_AD_EDIT_DONE					=> W_ADMIN_AD.'�Խ�����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_ADD_DONE			=> W_ADMIN_AD_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_DELETE_DONE			=> W_ADMIN_AD_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_AD_CATEGORY_EDIT_DONE			=> W_ADMIN_AD_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_PRIORITY_DONE		=> W_ADMIN_AD_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_AD_CODE_ADD_DONE				=> W_ADMIN_AD_CODE.'����Ͽ����λ���ޤ�����',
I_ADMIN_AD_CODE_DELETE_DONE				=> W_ADMIN_AD_CODE.'�κ������λ���ޤ�����',
I_ADMIN_AD_CODE_EDIT_DONE				=> W_ADMIN_AD_CODE.'���Խ�����λ���ޤ�����',
// ���Х���
I_ADMIN_AVATAR_ADD_DONE					=> W_ADMIN_AVATAR.'����Ͽ����λ���ޤ�����',
I_ADMIN_AVATAR_DELETE_DONE				=> W_ADMIN_AVATAR.'�κ������λ���ޤ�����',
I_ADMIN_AVATAR_EDIT_DONE				=> W_ADMIN_AVATAR.'���Խ�����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_ADD_DONE		=> W_ADMIN_AVATAR_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_DELETE_DONE		=> W_ADMIN_AVATAR_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_EDIT_DONE		=> W_ADMIN_AVATAR_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_AVATAR_STAND_ADD_DONE			=> W_ADMIN_AVATAR_STAND.'����Ͽ����λ���ޤ�����',
I_ADMIN_AVATAR_STAND_DELETE_DONE		=> W_ADMIN_AVATAR_STAND.'�κ������λ���ޤ�����',
I_ADMIN_AVATAR_STAND_EDIT_DONE			=> W_ADMIN_AVATAR_STAND.'���Խ�����λ���ޤ�����',
// �Хʡ�
I_ADMIN_BANNER_ADD_DONE					=> W_ADMIN_BANNER.'��Ͽ����λ���ޤ�����',
I_ADMIN_BANNER_DELETE_DONE				=> W_ADMIN_BANNER.'����κ������λ���ޤ�����',
I_ADMIN_BANNER_EDIT_DONE				=> W_ADMIN_BANNER.'�Խ�����λ���ޤ�����',
// ����ƥ��
I_ADMIN_CMS_EDIT_DONE					=> W_ADMIN_CMS.'�Խ�����λ���ޤ�����',
// ����
I_ADMIN_CONFIG_EDIT_DONE						=> W_ADMIN_CONFIG.'�Խ�����λ���ޤ�����',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE		=> W_ADMIN_COMMUNITY_CATEGORY.'���ɲä��ޤ�����',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_DELETE_DONE	=> W_ADMIN_COMMUNITY_CATEGORY.'�������ޤ�����',
I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE		=> W_ADMIN_COMMUNITY_CATEGORY.'���Խ����ޤ�����',
I_ADMIN_CONFIG_USER_PROF_DELETE_DONE			=> '���ܤκ������λ���ޤ�����',
I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE		=> '���ܤκ������λ���ޤ�����',
// �ǥ��᡼��
I_ADMIN_DECOMAIL_ADD_DONE				=> W_ADMIN_DECOMAIL.'����Ͽ����λ���ޤ�����',
I_ADMIN_DECOMAIL_DELETE_DONE			=> W_ADMIN_DECOMAIL.'�κ������λ���ޤ�����',
I_ADMIN_DECOMAIL_EDIT_DONE				=> W_ADMIN_DECOMAIL.'���Խ�����λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_ADD_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
// ������
I_ADMIN_GAME_ADD_DONE					=> W_ADMIN_GAME.'����Ͽ����λ���ޤ�����',
I_ADMIN_GAME_DELETE_DONE				=> W_ADMIN_GAME.'�κ������λ���ޤ�����',
I_ADMIN_GAME_EDIT_DONE					=> W_ADMIN_GAME.'���Խ�����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_ADD_DONE			=> W_ADMIN_GAME_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_DELETE_DONE		=> W_ADMIN_GAME_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_EDIT_DONE			=> W_ADMIN_GAME_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_PRIORITY_DONE		=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
// �ե꡼�ڡ���
I_ADMIN_CONTENTS_ADD_DONE				=> W_ADMIN_CONTENTS.'����Ͽ����λ���ޤ�����',
I_ADMIN_CONTENTS_DELETE_DONE			=> W_ADMIN_CONTENTS.'�κ������λ���ޤ�����',
I_ADMIN_CONTENTS_EDIT_DONE				=> W_ADMIN_CONTENTS.'���Խ�����λ���ޤ�����',
E_ADMIN_CONTENTS_CODE_DUPLICATE			=> '����' . W_ADMIN_CONTENTS . '�����ɤϴ��˻��Ѥ���Ƥ��ޤ���',
// �ե�����
I_ADMIN_FILE_UPLOAD						=> '�ե����륢�åץ��ɤ���λ���ޤ�����',
E_ADMIN_FILE_UPLOAD						=> '�ե����륢�åץ��ɤ˼��Ԥ��ޤ�����',
I_ADMIN_FILE_DELETE						=> '�ե�����������λ���ޤ�����',
E_ADMIN_FILE_DELETE						=> '�ե��������˼��Ԥ��ޤ�����',
// ������
E_ADMIN_LOGIN							=> 'ID���ޤ���'.W_ADMIN_PASSWORD.'���ְ�äƤ��ޤ���',
// ��������
I_ADMIN_LOGOUT							=> W_ADMIN_LOGOUT.'���ޤ�����',
// �᡼��ޥ�����
I_ADMIN_MAGAZINE_ADD_DONE				=> W_ADMIN_MAGAZINE.'��Ͽ����λ���ޤ�����',
I_ADMIN_MAGAZINE_DELETE_DONE			=> W_ADMIN_MAGAZINE.'����κ������λ���ޤ�����',
I_ADMIN_MAGAZINE_EDIT_DONE				=> W_ADMIN_MAGAZINE.'�Խ�����λ���ޤ�����',
// �����ϩ
E_ADMIN_MEDIA_CODE_DUPLICATE			=> '���μ��̥����ɤϴ��˻��Ѥ���Ƥ��ޤ���',
I_ADMIN_MEDIA_ADD_DONE					=> W_ADMIN_MEDIA.'�ɲä���λ���ޤ�����',
I_ADMIN_MEDIA_DELETE_DONE				=> W_ADMIN_MEDIA.'����κ������λ���ޤ�����',
I_ADMIN_MEDIA_EDIT_DONE					=> W_ADMIN_MEDIA.'�Խ�����λ���ޤ�����',
// �˥塼��
I_ADMIN_NEWS_ADD_DONE					=> W_ADMIN_NEWS.'�ɲä���λ���ޤ�����',
I_ADMIN_NEWS_EDIT_DONE					=> W_ADMIN_NEWS.'�Խ�����λ���ޤ�����',
// �桼��
E_ADMIN_USER_NOT_FOUND					=> '¸�ߤ��ʤ�'.W_ADMIN_USER.'�Ǥ�',
E_ADMIN_USER_COMMUNITY_EDIT_ADMIN		=> W_ADMIN_COMMUNITY_ADMIN.'�ξ��֤��ѹ��Ǥ��ޤ���',
E_ADMIN_USER_FRIEND_EDIT_APPLYING		=> '�������'.W_ADMIN_FRIEND_NAME.'���֤��ѹ��Ǥ��ޤ���',
E_ADMIN_USER_FRIEND_INVALID				=> ADMIN_FRIEND_NAME.'�λ��꤬�����Ǥ���',
I_ADMIN_USER_COMMUNITY_EDIT_DONE		=> 	W_ADMIN_USER.'��'.W_ADMIN_COMMUNITY.'���С����֤��ѹ����ޤ���',
I_ADMIN_USER_FRIEND_EDIT_DONE			=> 	W_ADMIN_USER.'��'.W_ADMIN_FRIEND_NAME.'���֤��ѹ����ޤ���',
// twitter
I_ADMIN_THEMA_ADD_DONE					=> W_ADMIN_THEMA.'����Ͽ����λ���ޤ�����',
I_ADMIN_THEMA_DELETE_DONE				=> W_ADMIN_THEMA.'�κ������λ���ޤ�����',
I_ADMIN_THEMA_EDIT_DONE					=> W_ADMIN_THEMA.'���Խ�����λ���ޤ�����',

// �桼��¦
// ����
E_USER_ACCESS_DENIED					=> '�����������¤�����ޤ���',
E_USER_DB								=> 'DB���׎�',
E_USER_NOT_FOUND						=> W_USER_USER . '�ϴ�����񤷤�����¸�ߤ��ʤ�' . W_USER_USER . 'ID�Ǥ�',
E_USER_IDENTIFY							=> W_USER_IDENTIFY.'�˼��Ԥ��ޤ���',
E_USER_DUPLICATE_POST					=> W_USER_DUPLICATE_POST.'�϶ػߤ���Ƥ��ޤ�',
E_USER_PASSWORD							=> W_USER_PASSWORD.'���㤤�ޤ���',
E_USER_PLEASE_LOGIN						=> W_USER_LOGIN.'���Ƥ�������',
E_USER_POINT_SHORTAGE					=> W_USER_POINT.'��­��ޤ���',
// ����
E_USER_AD_OUT_OF_DATE					=> '����'.W_USER_AD.'���ۿ���λ���ޤ���',
E_USER_AD_PC							=> '���ѿ���������ޤ���PC'.W_USER_AD.'�ˤ����б��ȤʤäƤ���ޤ���',
E_USER_AD_MOBILE						=> '���ѿ���������ޤ��󤬤���'.W_USER_AD.'�Ϥ����ͤΥ���ꥢ�ǤϤ����Ѥˤʤ�����Ǥ��ޤ���',
// ���Х���
E_USER_AVATAR_DUPLICATE					=> '����'.W_USER_AVATAR.'�ϴ��˹������Ƥ��ޤ�',
E_USER_AVATAR_SEX						=> W_USER_PROFILE.'�ˤ����̤����򤷤Ƥ�������',
E_USER_AVATAR_INVALID					=> '����' . W_USER_AVATAR . '�ˤώ��������Ǥ��ޤ���',
I_USER_AVATAR_BUY_DONE					=> W_USER_AVATAR.'�ι�������λ���ޤ���',
I_USER_AVATAR_CHANGE_DONE				=> W_USER_AVATAR.'�����ؤ��ޤ���',
I_USER_AVATAR_DELETE_DONE				=> W_USER_AVATAR.'�������ޤ���',
// ������
E_USER_BBS_MESSAGE_NOT_FOUND			=> W_USER_BBS_MESSAGE.'��¸�ߤ��ޤ���',
// �֥�å��ꥹ��
E_USER_BLACKLIST						=> W_USER_BLACKLIST . '����Ͽ����Ƥ��뤿�ᤳ�����ϹԤ��ޤ���',
E_USER_BLACKLIST_DUPLICATE				=> '����' . W_USER_BLACKLIST . '��Ͽ�򤷤Ƥ��ޤ�',
I_USER_BLACKLIST_DELETE_DONE			=> W_USER_BLACKLIST . '��Ͽ�������ޤ���',
E_USER_BLACKLIST_HOME					=> '�����ͤΤ��Թ�ˤ�ꤳ�����ϹԤ��ޤ���',
// �֥�
E_USER_BLOG_ARTICLE_ACCESS_DENIED		=> '����'.W_USER_BLOG_ARTICLE.'�ˤώ��������Ǥ��ޤ���',
E_USER_BLOG_ARTICLE_NOT_FOUND			=> '����'.W_USER_BLOG_ARTICLE.'��¸�ߤ��ޤ���',
E_USER_BLOG_COMMENT_ACCESS_DENIED		=> '����'.W_USER_BLOG_COMMENT.'�ˤώ��������Ǥ��ޤ���',
E_USER_BLOG_COMMENT_NOT_FOUND			=> '����'.W_USER_BLOG_COMMENT.'��¸�ߤ��ޤ���',
I_USER_BLOG_ARTICLE_ADD_DONE			=> '��Ƥ��ޤ���',
// ������
E_USER_COMMENT_NOT_FOUND				=> W_USER_COMMENT.'��¸�ߤ��ޤ���',
// ���ߥ�˥ƥ�
E_USER_COMMUNITY_ADMIN					=> '���ʤ���'.W_USER_COMMUNITY_ADMIN.'�ǤϤ���ޤ���',
E_USER_COMMUNITY_APPLIED				=> '���˻��ÿ����򤷤Ƥ��ޤ�',
E_USER_COMMUNITY_DUPLICATE				=> '���ˤ���'.W_USER_COMMUNITY.'�˻��ä��Ƥ��ޤ�',
E_USER_COMMUNITY_RESIGN_ADMIN			=> W_USER_COMMUNITY_ADMIN.'�����Ǥ��ޤ���',
E_USER_COMMUNITY_ADMIN_FORMER_GET		=> W_USER_COMMUNITY_ADMIN.'����������顼�Ǥ����⤦���٤Ϥ��ᤫ�餪�ꤤ���ޤ���',
E_USER_COMMUNITY_ADMIN_FORMER_SET		=> W_USER_COMMUNITY_ADMIN.'���󹹿����顼�Ǥ����⤦���٤Ϥ��ᤫ�餪�ꤤ���ޤ���',
E_USER_COMMUNITY_ADMIN_GIVE				=> '����' . W_USER_USER . '��'.W_USER_COMMUNITY_ADMINISTRATION.'���Ϥ��ޤ���',
E_USER_COMMUNITY_ADMIN_GIVE_SELF		=> W_USER_COMMUNITY_ADMINISTRATION.'�ϼ�ʬ�ʳ���' . W_USER_USER . '���Ϥ��Ƥ�������',
E_USER_COMMUNITY_ADMIN_LATER_GET		=> '��'.W_USER_COMMUNITY_ADMIN.'����������顼�Ǥ����⤦���٤Ϥ��ᤫ�餪�ꤤ���ޤ���',
E_USER_COMMUNITY_ADMIN_LATER_SET		=> '��'.W_USER_COMMUNITY_ADMIN.'���󹹿����顼�Ǥ����⤦���٤Ϥ��ᤫ�餪�ꤤ���ޤ���',
E_USER_COMMUNITY_ACCESS_DENIED			=> '���ʤ��Ϥ���'.W_USER_COMMUNITY.'�ˎ��������Ǥ��ޤ���',
E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED	=> '����'.W_USER_COMMUNITY_ARTICLE.'�ˤώ��������Ǥ��ޤ���',
E_USER_COMMUNITY_ARTICLE_ADD_DENIED		=> '���ʤ���'.W_USER_COMMUNITY_ARTICLE.'����ޤ���',
E_USER_COMMUNITY_ARTICLE_NOT_FOUND		=> '����'.W_USER_COMMUNITY_ARTICLE.'��¸�ߤ��ޤ���',
E_USER_COMMUNITY_COMMENT_ACCESS_DENIED	=> '����'.W_USER_COMMUNITY_COMMENT.'�ˤώ��������Ǥ��ޤ���',
E_USER_COMMUNITY_COMMENT_NOT_FOUND		=> '����'.W_USER_COMMUNITY_COMMENT.'��¸�ߤ��ޤ���',
E_USER_COMMUNITY_MEMBER_NOT_FOUND		=> '����'.W_USER_COMMUNITY.'�ΎҎݎʎގ��ǤϤ���ޤ���',
E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN	=> W_USER_COMMUNITY_ADMIN.'�ώҎݎʎގ����鳰���ޤ���',
I_USER_COMMUNITY_ADMIN_GIVE_DONE		=> W_USER_COMMUNITY_ADMINISTRATION.'�ξ��Ϥ���λ���ޤ���',
I_USER_COMMUNITY_COMMENT_DELETE_DONE	=> W_USER_COMMUNITY_COMMENT.'�������ޤ���',
// ����
E_USER_CONFIG_FORMER_PASSWORD			=> '��'.W_USER_PASSWORD.'���ְ�äƤ��ޤ�',
// �ǥ��᡼��
E_USER_DECOMAIL_DUPLICATE				=> '����'.W_USER_DECOMAIL.'�ϴ��˹������Ƥ��ޤ�',
I_USER_DECOMAIL_BUY_DONE				=> W_USER_DECOMAIL.'��������λ���ޤ���',
// ͧã
E_USER_FRIEND_DELETE_APPLYING			=> W_USER_FRIEND.'������˲�����뤳�ȤϤǤ��ޤ���',
E_USER_FRIEND_DELETE_DONE				=> '����'.W_USER_FRIEND.'�������Ƥ��ޤ�',
E_USER_FRIEND_DELETE_NOT_FRIEND			=> '�ޤ�'.W_USER_FRIEND_NAME.'�ˤʤäƤ��ޤ���',
E_USER_FRIEND_DUPLICATE					=> '����'.W_USER_FRIEND.'�����äƤ��ޤ�',
E_USER_FRIEND_APPLY_DUPLICATE			=> '����'.W_USER_FRIEND.'�����򤷤Ƥ��ޤ�',
E_USER_FRIEND_INTRODUCTION_DENIED		=> '����'.W_USER_USER.'�ξҲ�ʸ�Ͻ񤱤ޤ���',
I_USER_FRIEND_DELETE_DONE				=> W_USER_FRIEND.'�������ޤ���',
// ������
E_USER_GAME_ACCESS_DENIED				=> '����'.W_USER_GAME.'�ˤώ��������Ǥ��ޤ���',
I_USER_GAME_BUY_DONE					=> W_USER_GAME.'��������λ���ޤ���',
// �ե꡼�ڡ���
E_USER_CONTENTS_NOT_FOUND				=> '¸�ߤ��ʤ�'.W_USER_CONTENTS.'�Ǥ�',
// ����
E_USER_INVITE_VALID_USER				=> '���ΎҎ��َ��Ďގڎ��ϴ�����Ͽ����Ƥ��ޤ�',
E_USER_INVITE_CHAPCHA					=> '�����ο��������Ϥ��줿���������פ��ޤ���Ǥ���',
E_USER_INVITE_DUPLICATE					=> '����'.W_USER_FRIEND_NAME.'���Ԥ���Ƥ���' . W_USER_USER . '�Ǥ�',
E_USER_INVITE_MAILADDRESS				=> W_USER_MAILADDRESS.'�ˤ�'.W_USER_FRIEND_NAME.'��'.W_USER_MAILADDRESS.'�����Ϥ��Ƥ�������',
// ��å�����
E_USER_MESSAGE_NOT_FOUND				=> W_USER_MESSAGE . '��¸�ߤ��ޤ���',
I_USER_MESSAGE_DELETE_DONE				=> W_USER_MESSAGE . '�κ������λ���ޤ���',
// ������
E_USER_LOGIN							=> W_USER_MAILADDRESS.'�ޤ���'.W_USER_PASSWORD.'���㤤�ޤ�',
E_USER_LOGIN_MOBILE_ONLY				=> '�ѥ����󤫤�Ϥ�����ĺ���ޤ���',
// ��������
I_USER_LOGOUT_DONE						=> W_USER_LOGOUT.'���ޤ���',
// �ץ�ե�����
I_USER_PROFILE_EDIT_DONE				=> W_USER_PROFILE.'���Խ����ޤ���',
E_USER_NICKNAME_ALREADY_USED				=> '����'.W_USER_NICKNAME.'�ϴ��˻��Ѥ���Ƥ��ޤ���',
// ͧã����
E_USER_SEARCH_NO_KEY					=> '�����������Ϥ��Ʋ�����',
// �����Ͽ
E_USER_REGIST_10						=> '���˲��������񤷤Ƥ��뤿����Ͽ������Ԥ����Ȥ��Ǥ��ޤ���',
E_USER_REGIST_20						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_30						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_40						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_50						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
I_USER_REGIST_DONE						=> W_USER_USER_REGIST.'����λ���ޤ�����',
// ��ޥ������
I_USER_REMIND_DONE						=> W_USER_LOGIN.'��������'.W_USER_MAILADDRESS.'�����������ޤ�����'.W_USER_MAILADDRESS.'���ְ�äƤ�����ώҎ��٤��Ϥ��ޤ���ΤǤ���դ���������',
// ���
E_USER_RESIGN_COMMUNITY					=> '���ʤ���'.W_USER_COMMUNITY_ADMIN.'��'.W_USER_COMMUNITY.'������ޤ���'.W_USER_COMMUNITY_ADMINISTRATION.'����Ϥ��Ƥ���������',
);

?>
