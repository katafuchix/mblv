<?php
/**
 *  Tv_Error.php
 * ���顼���
 *
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���̥��顼�ֹ����
 */

$i = 388;
define('E_INVALID_DATE', $i++);

/**
 * �������顼�ֹ����
 */
/* =============================================
// ����
 ============================================= */
define('E_ADMIN_DB', $i++);
define('I_ADMIN_UPDATE_STATUS_ALL_DONE', $i++);
define('E_ADMIN_AUTHORITY_EDIT', $i++);

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
// ���Х���
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
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_STOP', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE', $i++);
define('I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DUPLICATE', $i++);

/* =============================================
// ������
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
// �������
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
// �ӥǥ�
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
// �ե꡼�ڡ���
 ============================================= */
define('I_ADMIN_CONTENTS_ADD_DONE', $i++);
define('I_ADMIN_CONTENTS_DELETE_DONE', $i++);
define('I_ADMIN_CONTENTS_EDIT_DONE', $i++);
define('E_ADMIN_CONTENTS_CODE_DUPLICATE', $i++);

/* =============================================
// ����å�
 ============================================= */
define('I_ADMIN_SHOP_ADD_DONE', $i++);
define('I_ADMIN_SHOP_DELETE_DONE', $i++);
define('I_ADMIN_SHOP_EDIT_DONE', $i++);
define('I_ADMIN_SHOP_PRIORITY_EDIT_DONE', $i++);
define('E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD', $i++);
define('E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD', $i++);

/* =============================================
// ���ʥ��ƥ���
 ============================================= */
define('I_ADMIN_ITEM_CATEGORY_ADD_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_DELETE_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_EDIT_DONE', $i++);
define('I_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT_DONE', $i++);
define('E_ADMIN_ITEM_CATEGORY_SHOP_NOT_FOUND', $i++);
define('E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD', $i++);

/* =============================================
// ����
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
// ����ץ����
 ============================================= */
define('E_ADMIN_SAMPLE_IMAGE_FILE_UPLOAD', $i++);
define('E_ADMIN_SAMPLE_PRIORITY_ID_DUPLICATE', $i++);

/* =============================================
// �߸�
 ============================================= */
define('E_ADMIN_STOCK_NUM', $i++);

/* =============================================
// ������
 ============================================= */
define('I_ADMIN_SUPPLIER_ADD_DONE', $i++);
define('I_ADMIN_SUPPLIER_DELETE_DONE', $i++);
define('I_ADMIN_SUPPLIER_EDIT_DONE', $i++);
define('E_ADMIN_SUPPLIER_SETTLEMENT',$i++);
define('E_ADMIN_SUPPLIER_NAME_ALREADY_USED',$i++);
	
/* =============================================
// ����
 ============================================= */
define('I_ADMIN_POSTAGE_ADD_DONE', $i++);
define('I_ADMIN_POSTAGE_DELETE_DONE', $i++);
define('I_ADMIN_POSTAGE_EDIT_DONE', $i++);
define('E_ADMIN_POSTAGE_TYPE', $i++);
define('E_ADMIN_POSTAGE_SAME_PRICE', $i++);
define('E_ADMIN_POSTAGE_NAME_ALREADY_USED', $i++);

/* =============================================
// ����������
 ============================================= */
define('I_ADMIN_EXCHANGE_ADD_DONE', $i++);
define('I_ADMIN_EXCHANGE_DELETE_DONE', $i++);
define('I_ADMIN_EXCHANGE_EDIT_DONE', $i++);
define('E_ADMIN_EXCHANGE_SAME_PRICE', $i++);
define('E_ADMIN_EXCHANGE_NAME_ALREADY_USED', $i++);

/* =============================================
// ��������������ϰϻ���
 ============================================= */
define('E_ADMIN_EXCHANGE_RANGE_PRICE', $i++);

/* =============================================
// ��ʸ
 ============================================= */
define('I_ADMIN_USER_ORDER_EDIT_DONE', $i++);
define('E_ADMIN_USER_ORDER_DELIVERY_TYPE', $i++);

/* =============================================
// ������
 ============================================= */
define('I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY', $i++);
define('E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL', $i++);
define('E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN', $i++);
define('E_ADMIN_CART_ITEM_NUM_SUBTRACTION', $i++);

/* =============================================
// ȯ��ñ��
 ============================================= */
define('I_ADMIN_POST_UNIT_MAIL_SENT_DONE', $i++);
define('I_ADMIN_POST_UNIT_EDIT_DONE', $i++);

/* =============================================
// ��ӥ塼
 ============================================= */
define('I_ADMIN_REVIEW_EDIT_DONE', $i++);
define('I_ADMIN_REVIEW_DELETE_DONE', $i++);


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
define('I_ADMIN_MAGAZINE_STOP_DONE', $i++);

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
define('I_ADMIN_NEWS_DELETE_DONE', $i++);

/* =============================================
// �桼��
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
// ������
 ============================================= */
define('I_ADMIN_ACCOUNT_ADD_DONE', $i++);
define('I_ADMIN_ACCOUNT_EDIT_DONE', $i++);
define('I_ADMIN_ACCOUNT_DELETE_DONE', $i++);
define('E_ADMIN_ID_DUPLICATE', $i++);

/* =============================================
// NG���
 ============================================= */
define('E_ADMIN_NGWORD_EDIT_DONE',$i++);

/* =============================================
// ��������
 ============================================= */
define('I_ADMIN_SEGMENT_ADD_DONE', $i++);
define('I_ADMIN_SEGMENT_EDIT_DONE', $i++);
define('I_ADMIN_SEGMENT_DELETE_DONE', $i++);


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
define('E_USER_AD_STOCK_OVER', $i++);
define('E_USER_AD_NOT_START', $i++);

/* =============================================
// ���Х���
 ============================================= */
define('E_USER_AVATAR_DUPLICATE', $i++);
define('E_USER_AVATAR_SEX', $i++);
define('I_USER_AVATAR_BUY_DONE', $i++);
define('I_USER_AVATAR_CHANGE_DONE', $i++);
define('E_USER_AVATAR_ALREADY_IN_CART', $i++);
define('E_USER_AVATAR_SELECT', $i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_BBS_MESSAGE_NOT_FOUND', $i++);

/* =============================================
// ����
 ============================================= */
define('E_USER_REPORT', $i++);
define('I_USER_REPORT_DELETE_DONE', $i++);

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
// ����
 ============================================= */
define('E_USER_CONFIG_FORMER_PASSWORD', $i++);

/* =============================================
// �ǥ��᡼��
 ============================================= */
define('E_USER_DECOMAIL_DUPLICATE', $i++);
define('I_USER_DECOMAIL_BUY_DONE', $i++);
define('E_USER_DECOMAIL_OUT_OF_DATE', $i++);

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
define('E_USER_GAME_OUT_OF_DATE', $i++);

/* =============================================
// �������
 ============================================= */
define('E_USER_SOUND_ACCESS_DENIED', $i++);
define('I_USER_SOUND_BUY_DONE', $i++);
define('E_USER_SOUND_OUT_OF_DATE', $i++);

/* =============================================
// �ӥǥ�
 ============================================= */
define('E_USER_VIDEO_ACCESS_DENIED', $i++);
define('I_USER_VIDEO_BUY_DONE', $i++);
define('E_USER_VIDEO_OUT_OF_DATE', $i++);

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
define('E_USER_INVITE_PCMAILADDRESS', $i++);

/* =============================================
// ��å�����
 ============================================= */
define('E_USER_MESSAGE_NOT_FOUND', $i++);
define('I_USER_MESSAGE_DELETE_DONE', $i++);

/* =============================================
// ��å�����
 ============================================= */
define('E_USER_INVITE_NAME_NOT_FOUND',$i++);

/* =============================================
// ������
 ============================================= */
define('E_USER_LOGIN', $i++);
define('E_USER_LOGIN_MOBILE_ONLY', $i++);
define('I_USER_LOGIN_DONE', $i++);

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
// ��ޥ������
 ============================================= */
define('I_USER_REMIND_DONE', $i++);

/* =============================================
// ���
 ============================================= */
define('E_USER_RESIGN_COMMUNITY', $i++);


/* =============================================
// ����
 ============================================= */
define('E_USER_ITEM_NOT_FOUND', $i++);
define('E_USER_ITEM_BUDGET', $i++);
define('E_USER_ITEM_BUNDLE_STATUS', $i++);

/* =============================================
// ������
 ============================================= */
define('I_USER_CART_DELETE_DONE', $i++);
define('E_USER_CART_EMPTY', $i++);
define('E_USER_CART_ITEM_NUM', $i++);

/* =============================================
// �ե�����
 ============================================= */
define('E_USER_FILE_NOT_FOUND', $i++);
define('E_USER_FILE_TYPE_UNMATCHED', $i++);

/* =============================================
// �桼��
 ============================================= */
define('E_USER_BIRTHDAY', $i++);

/* =============================================
// ��ӥ塼
 ============================================= */
define('E_USER_REVIEW_NOT_EXIST', $i++);

/* =============================================
// �߸�
 ============================================= */
define('E_USER_STOCK_OUT', $i++);
define('E_USER_STOCK_OVER', $i++);
define('E_USER_STOCK_ORDER_OVER', $i++);

/* =============================================
// ��ʸ
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
 * ���顼��å��������
 */
$errorMessage = array(
// ����
E_INVALID_DATE							=> '̵�������դǤ�',
// ����¦
E_ADMIN_DB								=> 'DB���顼',
I_ADMIN_UPDATE_STATUS_ALL_DONE			=> W_ADMIN_CHECKED.'�����򹹿����ޤ�����',
E_ADMIN_AUTHORITY_EDIT					=> '�Խ����¤�����ޤ���',
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
I_ADMIN_AD_DELETE_DONE					=> W_ADMIN_AD.'�Խ�����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_ADD_DONE			=> W_ADMIN_AD_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_DELETE_DONE			=> W_ADMIN_AD_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_AD_CATEGORY_EDIT_DONE			=> W_ADMIN_AD_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_AD_CATEGORY_PRIORITY_DONE		=> W_ADMIN_AD_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_AD_CODE_ADD_DONE				=> W_ADMIN_AD_CODE.'����Ͽ����λ���ޤ�����',
I_ADMIN_AD_CODE_DELETE_DONE				=> W_ADMIN_AD_CODE.'�κ������λ���ޤ�����',
I_ADMIN_AD_CODE_EDIT_DONE				=> W_ADMIN_AD_CODE.'���Խ�����λ���ޤ�����',
I_ADMIN_ADMENU_EDIT_DONE				=> W_ADMIN_ADMENU.'���Խ�����λ���ޤ�����',

// ���Х���
I_ADMIN_AVATAR_ADD_DONE					=> W_ADMIN_AVATAR.'����Ͽ����λ���ޤ�����',
I_ADMIN_AVATAR_DELETE_DONE				=> W_ADMIN_AVATAR.'�κ������λ���ޤ�����',
I_ADMIN_AVATAR_EDIT_DONE				=> W_ADMIN_AVATAR.'���Խ�����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_ADD_DONE		=> W_ADMIN_AVATAR_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_DELETE_DONE		=> W_ADMIN_AVATAR_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_DELETE_STOP		=> W_ADMIN_AVATAR.'����Ͽ�����뤿�ᤴ�����'.W_ADMIN_AVATAR_CATEGORY.'�κ���ϤǤ��ޤ���',
I_ADMIN_AVATAR_CATEGORY_EDIT_DONE		=> W_ADMIN_AVATAR_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_AVATAR_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_AVATAR_CATEGORY.W_ADMIN_PRIORITY.'����ʣ���Ƥ��ޤ���',
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
I_ADMIN_DECOMAIL_CATEGORY_DELETE_STOP	=> W_ADMIN_DECOMAIL.'����Ͽ�����뤿�ᤴ�����'.W_ADMIN_DECOMAIL_CATEGORY.'�κ���ϤǤ��ޤ���',
I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE		=> W_ADMIN_DECOMAIL_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_DECOMAIL_CATEGORY.W_ADMIN_PRIORITY.'����ʣ���Ƥ��ޤ���',
// ������
I_ADMIN_GAME_ADD_DONE					=> W_ADMIN_GAME.'����Ͽ����λ���ޤ�����',
I_ADMIN_GAME_DELETE_DONE				=> W_ADMIN_GAME.'�κ������λ���ޤ�����',
I_ADMIN_GAME_EDIT_DONE					=> W_ADMIN_GAME.'���Խ�����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_ADD_DONE			=> W_ADMIN_GAME_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_DELETE_DONE		=> W_ADMIN_GAME_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_DELETE_STOP		=> W_ADMIN_GAME.'����Ͽ�����뤿�ᤴ�����'.W_ADMIN_GAME_CATEGORY.'�κ���ϤǤ��ޤ���',
I_ADMIN_GAME_CATEGORY_EDIT_DONE			=> W_ADMIN_GAME_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_PRIORITY_DONE		=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_GAME_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_GAME_CATEGORY.W_ADMIN_PRIORITY.'����ʣ���Ƥ��ޤ���',
// �������
I_ADMIN_SOUND_ADD_DONE					=> W_ADMIN_SOUND.'����Ͽ����λ���ޤ�����',
I_ADMIN_SOUND_DELETE_DONE				=> W_ADMIN_SOUND.'�κ������λ���ޤ�����',
I_ADMIN_SOUND_EDIT_DONE					=> W_ADMIN_SOUND.'���Խ�����λ���ޤ�����',
I_ADMIN_SOUND_CATEGORY_ADD_DONE			=> W_ADMIN_SOUND_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_SOUND_CATEGORY_DELETE_DONE		=> W_ADMIN_SOUND_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_SOUND_CATEGORY_DELETE_STOP		=> W_ADMIN_SOUND.'����Ͽ�����뤿�ᤴ�����'.W_ADMIN_SOUND_CATEGORY.'�κ���ϤǤ��ޤ���',
I_ADMIN_SOUND_CATEGORY_EDIT_DONE			=> W_ADMIN_SOUND_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_SOUND_CATEGORY_PRIORITY_DONE		=> W_ADMIN_SOUND_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_SOUND_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_SOUND_CATEGORY.W_ADMIN_PRIORITY.'����ʣ���Ƥ��ޤ���',
// �ӥǥ�
I_ADMIN_VIDEO_ADD_DONE					=> W_ADMIN_VIDEO.'����Ͽ����λ���ޤ�����',
I_ADMIN_VIDEO_DELETE_DONE				=> W_ADMIN_VIDEO.'�κ������λ���ޤ�����',
I_ADMIN_VIDEO_EDIT_DONE					=> W_ADMIN_VIDEO.'���Խ�����λ���ޤ�����',
I_ADMIN_VIDEO_CATEGORY_ADD_DONE			=> W_ADMIN_VIDEO_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_VIDEO_CATEGORY_DELETE_DONE		=> W_ADMIN_VIDEO_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_VIDEO_CATEGORY_DELETE_STOP		=> W_ADMIN_VIDEO.'����Ͽ�����뤿�ᤴ�����'.W_ADMIN_VIDEO_CATEGORY.'�κ���ϤǤ��ޤ���',
I_ADMIN_VIDEO_CATEGORY_EDIT_DONE			=> W_ADMIN_VIDEO_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_VIDEO_CATEGORY_PRIORITY_DONE		=> W_ADMIN_VIDEO_CATEGORY.W_ADMIN_PRIORITY.'��������λ���ޤ�����',
I_ADMIN_VIDEO_CATEGORY_PRIORITY_DUPLICATE	=> W_ADMIN_VIDEO_CATEGORY.W_ADMIN_PRIORITY.'����ʣ���Ƥ��ޤ���',
// �ե꡼�ڡ���
I_ADMIN_CONTENTS_ADD_DONE				=> W_ADMIN_CONTENTS.'����Ͽ����λ���ޤ�����',
I_ADMIN_CONTENTS_DELETE_DONE			=> W_ADMIN_CONTENTS.'�κ������λ���ޤ�����',
I_ADMIN_CONTENTS_EDIT_DONE				=> W_ADMIN_CONTENTS.'���Խ�����λ���ޤ�����',
E_ADMIN_CONTENTS_CODE_DUPLICATE			=> '����' . W_ADMIN_CONTENTS . '�����ɤϴ��˻��Ѥ���Ƥ��ޤ���',

// ����å�
I_ADMIN_SHOP_ADD_DONE					=> W_ADMIN_SHOP.'����Ͽ����λ���ޤ�����',
I_ADMIN_SHOP_DELETE_DONE				=> W_ADMIN_SHOP.'�κ������λ���ޤ�����',
I_ADMIN_SHOP_EDIT_DONE					=> W_ADMIN_SHOP.'���Խ�����λ���ޤ�����',
I_ADMIN_SHOP_PRIORITY_EDIT_DONE			=> W_ADMIN_SHOP_PRIORITY_ID.'���Խ�����λ���ޤ�����',
E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD			=> W_ADMIN_SHOP_IMAGE1_FILE.'�Υ��åץ��ɤ˼��Ԥ��ޤ�����',
E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD			=> W_ADMIN_SHOP_IMAGE2_FILE.'�Υ��åץ��ɤ˼��Ԥ��ޤ�����',

// ���ʥ��ƥ���
I_ADMIN_ITEM_CATEGORY_ADD_DONE				=> W_ADMIN_ITEM_CATEGORY.'����Ͽ����λ���ޤ�����',
I_ADMIN_ITEM_CATEGORY_DELETE_DONE			=> W_ADMIN_ITEM_CATEGORY.'�κ������λ���ޤ�����',
I_ADMIN_ITEM_CATEGORY_EDIT_DONE				=> W_ADMIN_ITEM_CATEGORY.'���Խ�����λ���ޤ�����',
I_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT_DONE	=> W_ADMIN_ITEM_CATEGORY_PRIORITY_ID.'���Խ�����λ���ޤ�����',
E_ADMIN_ITEM_CATEGORY_SHOP_NOT_FOUND		=> W_ADMIN_ITEM_CATEGORY.'���ɲä���ˤϡ��ޤ�',W_ADMIN_SHOP.'��������Ƥ���������',
E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD		=> '�����Υ��åץ��ɤ˼��Ԥ��ޤ�����',

// ����
I_ADMIN_ITEM_ADD_DONE						=> W_ADMIN_ITEM.'����Ͽ����λ���ޤ�����',
I_ADMIN_ITEM_DELETE_DONE					=> W_ADMIN_ITEM.'�κ������λ���ޤ�����',
I_ADMIN_ITEM_EDIT_DONE						=> W_ADMIN_ITEM.'���Խ�����λ���ޤ�����',
I_ADMIN_ITEM_PRIORITY_EDIT_DONE				=> W_ADMIN_ITEM_PRIORITY_ID.'���Խ�����λ���ޤ�����',
E_ADMIN_ITEM_ITEM_CATEGORY_NOT_FOUND		=> W_ADMIN_ITEM.'���ɲä���ˤϡ��ޤ�',W_ADMIN_ITEM_CATEGORY.'��������Ƥ���������',
E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK	=> '����'.W_ADMIN_ITEM_IMAGE_FILE.'�����򤷤Ƥ���������',
E_ADMIN_ITEM_START_TO_END_TIME				=> W_ADMIN_ITEM_START_TIME.'����'.W_ADMIN_ITEM_END_TIME.'�����꤬�ְ�äƤ��ޤ���',
E_ADMIN_ITEM_SUPPLIER						=> W_ADMIN_SUPPLIER.'�����򤷤Ƥ���������',
E_ADMIN_ITEM_SETTLEMENT						=> W_ADMIN_ITEM_SETTLEMENT.'�����򤷤Ƥ���������',
E_ADMIN_ITEM_BUNDLE_STATUS					=> 'Ʊ���ԲĤξ��ʤˤϡ�ʣ���Υ����פ��������ޤ���',
E_ADMIN_ITEM_NO_DUPLICATE					=> W_ADMIN_ITEM_DISTINCTION_ID.'��¾'.W_ADMIN_ITEM.'��Ʊ���Ǥ���',
E_ADMIN_ITEM_IMAGE_FILE_UPLOAD				=> W_ADMIN_ITEM_IMAGE_FILE.'�Υ��åץ��ɤ˼��Ԥ��ޤ�����',

// ����ץ����
E_ADMIN_SAMPLE_IMAGE_FILE_UPLOAD			=> W_ADMIN_SAMPLE_IMAGE.'�Υ��åץ��ɤ˼��Ԥ��ޤ�����',
E_ADMIN_SAMPLE_PRIORITY_ID_DUPLICATE		=> W_ADMIN_SAMPLE_PRIORITY_ID.'�Ͻ�ʣ���ʤ��褦�����ꤷ�Ƥ���������',

// �߸�
E_ADMIN_STOCK_NUM							=> 	W_ADMIN_STOCK_NUM.'�����Ϥ��Ƥ���������',

// ������
I_ADMIN_SUPPLIER_ADD_DONE					=> W_ADMIN_SUPPLIER.'����Ͽ����λ���ޤ�����',
I_ADMIN_SUPPLIER_DELETE_DONE				=> W_ADMIN_SUPPLIER.'�κ������λ���ޤ�����',
I_ADMIN_SUPPLIER_EDIT_DONE					=> W_ADMIN_SUPPLIER.'���Խ�����λ���ޤ�����',
E_ADMIN_SUPPLIER_SETTLEMENT					=> W_ADMIN_SUPPLIER_SETTLEMENT.'�����򤷤Ƥ���������',
E_ADMIN_SUPPLIER_NAME_ALREADY_USED			=> '����'.W_ADMIN_SUPPLIER_NAME.'�ϴ��˻��Ѥ���Ƥ��ޤ���',

// ����
I_ADMIN_POSTAGE_ADD_DONE					=> W_ADMIN_POSTAGE.'����Ͽ����λ���ޤ�����',
I_ADMIN_POSTAGE_DELETE_DONE					=> W_ADMIN_POSTAGE.'�κ������λ���ޤ�����',
I_ADMIN_POSTAGE_EDIT_DONE					=> W_ADMIN_POSTAGE.'���Խ�����λ���ޤ�����',
E_ADMIN_POSTAGE_TYPE						=> W_ADMIN_POSTAGE_TYPE.'����ꤷ�Ƥ���������',
E_ADMIN_POSTAGE_SAME_PRICE					=> W_ADMIN_POSTAGE_SAME_STATUS.'�ˤ�����ϡ�'.W_ADMIN_POSTAGE_SAME_PRICE.'�ե�����˶�ۤ����ꤷ�Ƥ���������',
E_ADMIN_POSTAGE_NAME_ALREADY_USED			=> '����'.W_ADMIN_POSTAGE_NAME.'�ϴ��˻��Ѥ���Ƥ��ޤ���',

// ����������
I_ADMIN_EXCHANGE_ADD_DONE					=> W_ADMIN_EXCHANGE.'����Ͽ����λ���ޤ�����',
I_ADMIN_EXCHANGE_DELETE_DONE				=> W_ADMIN_EXCHANGE.'�κ������λ���ޤ�����',
I_ADMIN_EXCHANGE_EDIT_DONE					=> W_ADMIN_EXCHANGE.'���Խ�����λ���ޤ�����',
E_ADMIN_EXCHANGE_SAME_PRICE					=> W_ADMIN_EXCHANGE_SAME_STATUS.'�ˤ�����ϡ�'.W_ADMIN_EXCHANGE_SAME_PRICE.'�ե�����˶�ۤ����ꤷ�Ƥ���������',
E_ADMIN_EXCHANGE_NAME_ALREADY_USED			=> '����'.W_ADMIN_EXCHANGE_NAME.'�ϴ��˻��Ѥ���Ƥ��ޤ���',

// ��������������ϰϻ���
E_ADMIN_EXCHANGE_RANGE_PRICE				=> W_ADMIN_EXCHANGE_RANGE_PRICE.'�ˤϿ���(����)�����Ϥ��Ʋ�������',

// ��ӥ塼
I_ADMIN_REVIEW_EDIT_DONE				=> W_ADMIN_REVIEW.'���Խ�����λ���ޤ�����',
I_ADMIN_REVIEW_DELETE_DONE				=> W_ADMIN_REVIEW.'�κ������λ���ޤ�����',

// ��ʸ
I_ADMIN_USER_ORDER_EDIT_DONE			=> W_ADMIN_USER_ORDER.'���Խ�����λ���ޤ�����',
E_ADMIN_USER_ORDER_DELIVERY_TYPE		=> W_ADMIN_USER_ORDER_DELIVERY_TYPE.'���ֻ��꽻��פξ���'.W_ADMIN_USER_ORDER_DELIVERY_TYPE . '��������Ϥ��Ƥ���������',

// ������
I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY		=> '��ʸ���ʸĿ������٤�0�ˤʤ�ޤ����Τǡ�'.W_ADMIN_USER_ORDER_GET_POINT.W_ADMIN_POINT.'��'.W_ADMIN_USER_ORDER_TOTAL_PRICE1.'��'.W_ADMIN_USER_ORDER_TOTAL_PRICE2.'��'.W_ADMIN_USER_ORDER_TAX.'��'.W_ADMIN_USER_ORDER_POSTAGE.'��'.W_ADMIN_USER_ORDER_EXCHANGE_FEE.'��0�ߤ��ѹ����ޤ�����',E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL	=> '����󥻥�����ꤷ��'.W_ADMIN_USER_ORDER_STATUS.'���ѹ��Ǥ��ޤ���',
E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN	=> '���ʺѤߤ����ꤷ��'.W_ADMIN_USER_ORDER_STATUS.'���ѹ��Ǥ��ޤ���',
E_ADMIN_CART_ITEM_NUM_SUBTRACTION			=> '����ʸ�������Ƥ�'.W_ADMIN_CART_ITEM_NUM.'�ϸ������Ƥ���������',

// ȯ��ñ��
I_ADMIN_POST_UNIT_MAIL_SENT_DONE		=> '��ʸ�԰��˾���ȯ���᡼����������ޤ�����',
I_ADMIN_POST_UNIT_EDIT_DONE		=> 'ȯ������򹹿����ޤ�����',


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
I_ADMIN_MAGAZINE_STOP_DONE				=> W_ADMIN_MAGAZINE.'������λ����λ���ޤ�����',

// �����ϩ
E_ADMIN_MEDIA_CODE_DUPLICATE			=> '���μ��̥����ɤϴ��˻��Ѥ���Ƥ��ޤ���',
I_ADMIN_MEDIA_ADD_DONE					=> W_ADMIN_MEDIA.'�ɲä���λ���ޤ�����',
I_ADMIN_MEDIA_DELETE_DONE				=> W_ADMIN_MEDIA.'����κ������λ���ޤ�����',
I_ADMIN_MEDIA_EDIT_DONE					=> W_ADMIN_MEDIA.'�Խ�����λ���ޤ�����',
// �˥塼��
I_ADMIN_NEWS_ADD_DONE					=> W_ADMIN_NEWS.'�ɲä���λ���ޤ�����',
I_ADMIN_NEWS_EDIT_DONE					=> W_ADMIN_NEWS.'�Խ�����λ���ޤ�����',
I_ADMIN_NEWS_DELETE_DONE					=> W_ADMIN_NEWS.'�������λ���ޤ�����',
// �桼��
E_ADMIN_USER_NOT_FOUND					=> '¸�ߤ��ʤ�'.W_ADMIN_USER.'�Ǥ�',
E_ADMIN_USER_COMMUNITY_EDIT_ADMIN		=> W_ADMIN_COMMUNITY_ADMIN.'�ξ��֤��ѹ��Ǥ��ޤ���',
E_ADMIN_USER_FRIEND_EDIT_APPLYING		=> '�������'.W_ADMIN_FRIEND_NAME.'���֤��ѹ��Ǥ��ޤ���',
E_ADMIN_USER_FRIEND_INVALID				=> W_ADMIN_FRIEND_NAME.'�λ��꤬�����Ǥ���',
I_ADMIN_USER_FRIEND_INTRODUCTION_EDIT_DONE => W_ADMIN_FRIEND_INTRODUCTION.'�Խ�����λ���ޤ�����',
I_ADMIN_USER_COMMUNITY_EDIT_DONE		=> W_ADMIN_USER.'��'.W_ADMIN_COMMUNITY.'���С����֤��ѹ����ޤ���',
I_ADMIN_USER_EDIT_DONE					=> W_ADMIN_USER.'������Խ�����λ���ޤ���',
I_ADMIN_USER_FRIEND_EDIT_DONE			=> W_ADMIN_USER.'��'.W_ADMIN_FRIEND_NAME.'���֤��ѹ����ޤ���',
E_ADMIN_USER_MAILADDRESS_ERROR			=> W_ADMIN_MAILADDRESS.'�η����������Ǥ�',
// NG���
E_ADMIN_NGWORD_EDIT_DONE				=> W_ADMIN_NGWORD.'�Խ�����λ���ޤ���',
// ��������
I_ADMIN_SEGMENT_ADD_DONE					=> W_ADMIN_SEGMENT.'�ɲä���λ���ޤ�����',
I_ADMIN_SEGMENT_EDIT_DONE					=> W_ADMIN_SEGMENT.'�Խ�����λ���ޤ�����',
I_ADMIN_SEGMENT_DELETE_DONE					=> W_ADMIN_SEGMENT.'�������λ���ޤ�����',

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
E_USER_AD_STOCK_OVER					=> '����'.W_ADMIN_AD.'���ۿ���λ���ޤ�����',
E_USER_AD_NOT_START						=> '����'.W_USER_AD.'�Ϥޤ��ۿ��򳫻Ϥ��Ƥ��ޤ���',

// ���Х���
E_USER_AVATAR_DUPLICATE					=> '����'.W_USER_AVATAR.'�ϴ��˹������Ƥ��ޤ�',
E_USER_AVATAR_ALREADY_IN_CART			=> '����'.W_USER_AVATAR.'�ϴ���'.W_USER_CART.'��������äƤ��ޤ�',
E_USER_AVATAR_SELECT					=> W_USER_AVATAR.'�����򤷤Ƥ���������',

E_USER_AVATAR_SEX						=> W_USER_PROFILE.'�ˤ����̤����򤷤Ƥ�������',
I_USER_AVATAR_BUY_DONE					=> W_USER_AVATAR.'�ι�������λ���ޤ���',
I_USER_AVATAR_CHANGE_DONE				=> W_USER_AVATAR.'�����ؤ��ޤ���',
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
// ���ߥ�˥ƥ���
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
E_USER_COMMUNITY_ARTICLE_ADD_DENIED		=> '���ʤ���'.W_USER_COMMUNITY_ARTICLE.'����ޤ���',
E_USER_COMMUNITY_ARTICLE_NOT_FOUND		=> '����'.W_USER_COMMUNITY_ARTICLE.'��¸�ߤ��ޤ���',
E_USER_COMMUNITY_COMMENT_ACCESS_DENIED	=> '����'.W_USER_COMMUNITY_COMMENT.'�ˤώ��������Ǥ��ޤ���',
E_USER_COMMUNITY_COMMENT_NOT_FOUND		=> '����'.W_USER_COMMUNITY_COMMENT.'��¸�ߤ��ޤ���',
E_USER_COMMUNITY_MEMBER_NOT_FOUND		=> '����'.W_USER_COMMUNITY.'�ΎҎݎʎގ��ǤϤ���ޤ���',
E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN	=> W_USER_COMMUNITY_ADMIN.'�ώҎݎʎގ����鳰���ޤ���',
I_USER_COMMUNITY_ADMIN_GIVE_DONE		=> W_USER_COMMUNITY_ADMINISTRATION.'�ξ��Ϥ���λ���ޤ���',
I_USER_COMMUNITY_COMMENT_DELETE_DONE	=> W_USER_COMMUNITY_COMMENT.'�������ޤ���',
I_USER_COMMUNITY_MEMBER_REMOVE_DONE		=> '�����Վ����ޤ�'.W_USER_COMMUNITY.'�Ҏݎʎގ�����������ޤ���',
E_USER_COMMUNITY_ACCEPTED_DONE				=> W_USER_COMMUNITY.'�ؤλ��ä�ǧ���ޤ���',
E_USER_COMMUNITY_ACCEPTED_DENIED			=> W_USER_COMMUNITY.'�ؤλ��ä���ݤ��ޤ���',

// ����
E_USER_CONFIG_FORMER_PASSWORD			=> '��'.W_USER_PASSWORD.'���ְ�äƤ��ޤ�',
// �ǥ��᡼��
E_USER_DECOMAIL_DUPLICATE				=> '����'.W_USER_DECOMAIL.'�ϴ��˹������Ƥ��ޤ�',
I_USER_DECOMAIL_BUY_DONE				=> W_USER_DECOMAIL.'��������λ���ޤ���',
E_USER_DECOMAIL_OUT_OF_DATE				=> '���ѿ���������ޤ��󤬤���'.W_USER_DECOMAIL.'��������֤���λ���Ƥ��ޤ��ޤ�����',
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
E_USER_GAME_OUT_OF_DATE					=> '���ѿ���������ޤ��󤬤���'.W_USER_GAME.'��������֤���λ���Ƥ��ޤ��ޤ�����',

// �������
E_USER_SOUND_ACCESS_DENIED				=> '����'.W_USER_SOUND.'�ˤώ��������Ǥ��ޤ���',
I_USER_SOUND_BUY_DONE					=> W_USER_SOUND.'��������λ���ޤ���',
E_USER_SOUND_OUT_OF_DATE					=> '���ѿ���������ޤ��󤬤���'.W_USER_SOUND.'��������֤���λ���Ƥ��ޤ��ޤ�����',

// �ӥǥ�
E_USER_VIDEO_ACCESS_DENIED				=> '����'.W_USER_VIDEO.'�ˤώ��������Ǥ��ޤ���',
I_USER_VIDEO_BUY_DONE					=> W_USER_VIDEO.'��������λ���ޤ���',
E_USER_VIDEO_OUT_OF_DATE					=> '���ѿ���������ޤ��󤬤���'.W_USER_VIDEO.'��������֤���λ���Ƥ��ޤ��ޤ�����',


// �ե꡼�ڡ���
E_USER_CONTENTS_NOT_FOUND				=> '¸�ߤ��ʤ�'.W_USER_CONTENTS.'�Ǥ�',
// ����
E_USER_INVITE_VALID_USER				=> '���ΎҎ��َ��Ďގڎ��ϴ�����Ͽ����Ƥ��ޤ�',
E_USER_INVITE_CHAPCHA					=> '�����ο��������Ϥ��줿���������פ��ޤ���Ǥ���',
E_USER_INVITE_DUPLICATE					=> '����'.W_USER_FRIEND_NAME.'���Ԥ���Ƥ���' . W_USER_USER . '�Ǥ�',
E_USER_INVITE_MAILADDRESS				=> W_USER_MAILADDRESS.'�ˤ�'.W_USER_FRIEND_NAME.'��'.W_USER_MAILADDRESS.'�����Ϥ��Ƥ�������',
E_USER_INVITE_PCMAILADDRESS				=> 'PC�Ҏ��َ��Ďގڎ��Ͼ��ԤǤ��ޤ���',

// ��å�����
E_USER_MESSAGE_NOT_FOUND				=> W_USER_MESSAGE . '��¸�ߤ��ޤ���',
I_USER_MESSAGE_DELETE_DONE				=> W_USER_MESSAGE . '�κ������λ���ޤ���',
// ����
E_USER_INVITE_NAME_NOT_FOUND			=> W_USER_INVITE_NAME.'��¸�ߤ��ޤ���',
// ������
E_USER_LOGIN							=> W_USER_MAILADDRESS.'�ޤ���'.W_USER_PASSWORD.'���㤤�ޤ�',
E_USER_LOGIN_MOBILE_ONLY				=> '�ѥ����󤫤�Ϥ�����ĺ���ޤ���',
I_USER_LOGIN_DONE						=> W_USER_LOGIN.'���ޤ���',
// ��������
I_USER_LOGOUT_DONE						=> W_USER_LOGOUT.'���ޤ���',
// �ץ�ե�����
I_USER_PROFILE_EDIT_DONE				=> W_USER_PROFILE.'���Խ����ޤ���',
E_USER_NICKNAME_ALREADY_USED				=> '����'.W_USER_NICKNAME.'�ϴ��˻��Ѥ���Ƥ��ޤ���',
// ͧã����
E_USER_SEARCH_NO_KEY					=> '�����������Ϥ��Ʋ�����',
// �����Ͽ
E_USER_REGIST_NO_USER_HASH				=> '�⤦���ٲ����Ͽ�᡼��˵��ܤ�URL���饢���������Ʋ�������',
E_USER_REGIST_10						=> '���˲��������񤷤Ƥ��뤿����Ͽ������Ԥ����Ȥ��Ǥ��ޤ���',
E_USER_REGIST_20						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_30						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_40						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
E_USER_REGIST_50						=> '����������Ͽ�Ǥ��ޤ���Ǥ������⤦������Ͽ�򤪴ꤤ�������ޤ���',
I_USER_REGIST_DONE						=> W_USER_USER_REGIST.'����λ���ޤ�����',
E_USER_BIRTHDAY_ERROR					=> '��������ǯ�����Ǥ���',
E_USER_NICKNAME_EMOJI					=> W_USER_NICKNAME.'�˳�ʸ���ϻ��ѤǤ��ޤ���',
E_USER_NICKNAME_LENGTH					=> W_USER_NICKNAME.'��128ʸ���ʲ������Ϥ��Ƥ���������',
E_USER_XUID								=>'�������äθ��μ��̾����������������Ȥ��Ʋ�������',
	
// ��ޥ������
I_USER_REMIND_DONE						=> W_USER_LOGIN.'��������'.W_USER_MAILADDRESS.'�����������ޤ�����'.W_USER_MAILADDRESS.'���ְ�äƤ�����ώҎ��٤��Ϥ��ޤ���ΤǤ���դ���������',
// ���
E_USER_RESIGN_COMMUNITY					=> '���ʤ���'.W_USER_COMMUNITY_ADMIN.'��'.W_USER_COMMUNITY.'������ޤ���'.W_USER_COMMUNITY_ADMINISTRATION.'����Ϥ��Ƥ���������',
// ����
E_USER_ITEM_NOT_FOUND					=> '¸�ߤ��ʤ�' . W_USER_ITEM . '�Ǥ���',
E_USER_ITEM_BUDGET						=> 'ͽ����ۤ򤴳�ǧ����������',
E_USER_ITEM_BUNDLE_STATUS					=> '���ξ��ʤϡ�¾�ξ��ʤȤ�Ʊ��������ʤ����ᡢ1�Ĺ������Ȥ������������������û�����ޤ���',
// ������
I_USER_CART_DELETE_DONE					=> W_USER_CART . '��������' . W_USER_ITEM . '�������ޤ�����',
E_USER_CART_EMPTY						=> W_USER_CART . '�����' . W_USER_ITEM . '������ޤ���',
E_USER_CART_ITEM_NUM					=> 'Ʊ�����ʤ�9�ĤޤǤ���' . W_USER_CART . '�㤤ʪ����������ޤ���',
// �ե�����
E_USER_FILE_NOT_FOUND					=> '�ե����뤬¸�ߤ��ޤ���',
E_USER_FILE_TYPE_UNMATCHED				=> '�ե�����������б����Ƥ��ޤ���',
// �桼��
E_USER_BIRTHDAY							=> W_USER_BIRTHDAY . '�����������Ϥ��Ƥ���������',
// ��ӥ塼
E_USER_REVIEW_NOT_EXIST					=> '̵���ʥ�ӥ塼�Ǥ���',
// �߸�
E_USER_STOCK_OUT						=> '���ѿ������������ޤ��󤬡����ξ��ʤ����ڤ�Ǥ���',
E_USER_STOCK_OVER						=> '�߸˿��򥪡��С����Ƥ��ޤ����Ŀ��򾯤ʤ����ƺ��٤���ʸ����������',
E_USER_STOCK_ORDER_OVER					=> '���ѿ���������ޤ��󤬤��㤤ʪ��˰ʲ��ξ��ʤ��߸��ڤ�ȤʤäƤ��ޤ��ޤ�����',
// ��ʸ
E_USER_ORDER_USE_POINT_OVER				=> '���Ѥ���' . W_USER_POINT . '�Ͻ�ͭ' . W_USER_POINT . '��������Ϥ��Ƥ���������',
E_USER_ORDER_USE_POINT_MIN				=> '���Ѥ���' . W_USER_POINT . '��100�ʾ�����Ϥ��Ƥ���������',
E_USER_ORDER_USE_POINT_MAX				=> '���Ѥ���' . W_USER_POINT . '�Ͼ�������װ�������Ϥ��Ƥ���������',
E_USER_ORDER_USE_CARD_ERROR				=> '���ڎ��ގ��ķ�Ѥ˼��Ԥ��ޤ�����',
E_USER_ORDER_USE_CONVENI_ERROR			=> '���ݎˎގƷ�Ѥ˼��Ԥ��ޤ�����',
E_USER_ORDER_CARD_TYPE					=> W_USER_ORDER_CARD_TYPE . '�����򤷤Ƥ���������',
E_USER_ORDER_CARD_NUMBER				=> W_USER_ORDER_CARD_NUMBER . '��Ⱦ�ѿ����Τߤ����������Ϥ��Ƥ���������',
E_USER_ORDER_CARD_NAME					=> W_USER_ORDER_CARD_NAME . '�����Ϥ��Ƥ���������',
E_USER_ORDER_CARD_MONTH					=> W_USER_ORDER_CARD_MONTH . '�����򤷤Ƥ���������',
E_USER_ORDER_CARD_YEAR					=> W_USER_ORDER_CARD_YEAR . '�����򤷤Ƥ���������',
E_USER_ORDER_CARD_TERM					=> W_USER_ORDER_CARD_TERM . '���ǧ���Ƥ���������',
E_USER_ORDER_CONVENI_TYPE				=> W_USER_ORDER_CONVENI . '�����򤷤Ƥ���������',
E_USER_ORDER_DELIVERY_NAME				=> W_USER_ORDER_DELIVERY_NAME . '�����Ϥ��Ƥ���������',
E_USER_ORDER_DELIVERY_NAME_KANA			=> W_USER_ORDER_DELIVERY_NAME_KANA . '�����Ϥ��Ƥ���������',
E_USER_ORDER_DELIVERY_ZIPCODE			=> W_USER_ORDER_DELIVERY_ZIPCODE . '��Ⱦ�ѿ����Τߤ����������Ϥ��Ƥ���������',
E_USER_ORDER_DELIVERY_ADDRESS			=> W_USER_ORDER_DELIVERY_ADDRESS . '�����Ϥ��Ƥ���������',
E_USER_ORDER_DELIVERY_PHONE				=> W_USER_ORDER_DELIVERY_PHONE . '��Ⱦ�ѿ����Τߤ����������Ϥ��Ƥ���������',
E_USER_ORDER_TYPE_EMPTY					=> W_USER_CART . '�����äƤ��뾦�ʤ˶��̤����Ѳ�ǽ�ʻ�ʧ��ˡ������ޤ��󎡾��ʤ������ƺ��٤����������',
E_USER_ORDER_TYPE						=> '�����ˡ�����򤵤�Ƥ��ޤ���',
E_USER_ORDER_ITEM_NOT_FOUND				=> '���ѿ���������ޤ��󤬎������оݤξ��ʤ�������֤�λ�������ޤ�����',
E_USER_ORDER_LOGIN						=> '���㤤ʪ�������'.W_USER_LOGIN.'���Ʒ�Ѿ�������Ϥ��Ʋ�������',

);
?>