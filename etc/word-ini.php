<?php
/**
 * ���ξ������
 */
switch(TEMPLATE)
{
	// ���ڡ���������
	case 'napa':
		define('W_USER_POINT', '�ŎʎߎΎ�');
		define('W_USER_POINT_UNIT', 'pt');
		define('W_ADMIN_POINT', '�ʥѥ�');
		break;
	// �ǥե����
	default:
		
		define('W_USER_POINT', '�Ύߎ��ݎ�');
		define('W_USER_POINT_UNIT', 'pt');
		define('W_ADMIN_POINT', '�ݥ����');
		
		/*
		define('W_USER_POINT', '�����Ďގ�');
		define('W_USER_POINT_UNIT', 'eco$');
		define('W_ADMIN_POINT', '�����ɥ�');
		*/
		break;
}

/**
 * �桼����¦���ܸ������
 */
/* =============================================
// ����
 ============================================= */
define('W_USER_MENU_ICON', '��');
define('W_USER_USER', '�Վ�����');
define('W_USER_USER_ID', W_USER_USER.'ID');
define('W_USER_USER_REGIST', '�����Ͽ');
define('W_USER_LOGIN', '�ێ��ގ���');
define('W_USER_LOGOUT', '�ێ��ގ�����');
define('W_USER_PASSWORD', '�ʎߎ��܎��Ď�');
define('W_USER_NEW_PASSWORD', '���ʎߎ��܎��Ď�');
define('W_USER_GAME', '���ގ���');
define('W_USER_SOUND', '�����ݎĎ�');
define('W_USER_AVATAR', '���ʎގ���');
define('W_USER_DECOMAIL', '�Îގ��Ҏ���');
define('W_USER_MAILADDRESS', '�Ҏ��َ��Ďގڎ�');
define('W_USER_NICKNAME', '�Ǝ����Ȏ���');
define('W_USER_PROFILE', '�̎ߎێ̎�����');
define('W_USER_AD', '����');
define('W_USER_BANNER', '�ʎގŎ�');
define('W_USER_IDENTIFY', 'ǧ��');
define('W_USER_DUPLICATE_POST', '������');
define('W_USER_REPORT', '����');
define('W_USER_REPORT_FAIL_USER_ID', '�����оݼ�');
define('W_USER_REPORT_MESSAGE',W_USER_REPORT. '����');
define('W_USER_SEGMENT', '�����ގҎݎ�');
define('W_USER_IMAGE', '����');
define('W_USER_MOVIE', 'ư��');
define('W_USER_CONTENTS', '�̎؎��͎ߎ�����');
define('W_USER_SUBMIT', '���ϡ�����');
define('W_USER_BACK', '����������');
define('W_USER_CONFIRM', '����ǧ���̤ء�');
define('W_USER_EDIT_CONFIRM', '���Խ���ǧ���̤ء�');
define('W_USER_DELETE_CONFIRM', '�������ǧ���̤ء�');
define('W_USER_DELETE', '���ϡ�����');
define('W_USER_UPDATE', '���ϡ�����');
define('W_USER_DELETE_IMAGE', '������������');
define('W_USER_DELETE_MOVIE', 'ư���������');
define('W_USER_ADD', '���ϡ�����');
define('W_USER_REMOVE', '���ϡ�����');
define('W_USER_SEND', '���ϡ�����');
define('W_USER_REPLY', '�ֿ�����');
define('W_USER_TO_USER_ID', '����');
define('W_USER_UNSET', '������󥻥롡');
define('W_USER_GIVE', '���ϡ�����');
define('W_USER_RESIGN', '���ϡ�����');
define('W_USER_REGISTER', '���ϡ�����');
define('W_USER_EDIT', '���ϡ�����');
define('W_USER_SEARCH', '����������');

/* =============================================
// �桼����
 ============================================= */
define('W_USER_USER_HASH', W_USER_USER.'���̻�');
define('W_USER_USER_NICKNAME','�Ǝ����Ȏ���');
define('W_USER_USER_PASSWORD', '�ʎߎ��܎��Ď�');
define('W_USER_USER_SEX', '����');
define('W_USER_USER_BIRTHDAY', '��ǯ����');
define('W_USER_USER_BIRTH_DATE_YEAR', '��ǯ����(ǯ)');
define('W_USER_USER_BIRTH_DATE_MONTH', '��ǯ����(��)');
define('W_USER_USER_BIRTH_DATE_DAY', '��ǯ����(��)');
define('W_USER_USER_PREFECTURE_ID', '����(��ƻ�ܸ�)');
define('W_USER_USER_ADDRESS', '����(�Զ�Į¼����)');
define('W_USER_USER_ADDRESS_BUILDING', '����(��ʪ̾)');
define('W_USER_USER_BLOOD_TYPE', '��շ�');
define('W_USER_JOB_FAMILY_ID', '����');
define('W_USER_BUSINESS_CATEGORY_ID', '�ȼ�');
define('W_USER_USER_IS_MARRIED', '�뺧');
define('W_USER_USER_HAS_CHILDREN', '�Ҷ�');
define('W_USER_WORK_LOCATION_PREFECTURE_ID', '��̳��');
define('W_USER_USER_HOBBY', '��̣');
define('W_USER_USER_URL', 'URL');
define('W_USER_USER_INTRODUCTION', '���ʾҲ�');
define('W_USER_USER_AGE_MIN', 'ǯ��(����)');
define('W_USER_USER_AGE_AMX', 'ǯ��(�ǹ�)');
define('W_USER_USER_PROF_KEYWORD', '�����܎��Ď�');
define('W_USER_USER_ZIPCODE', '͹���ֹ�');
define('W_USER_USER_NAME', '��̾��');
define('W_USER_USER_NAME_KANA', '�եꥬ��');
define('W_USER_USER_REGION_ID', '��ƻ�ܸ�');
define('W_USER_USER_PHONE', '�����ֹ�');
define('W_USER_USER_MAILADDRESS', '�᡼�륢�ɥ쥹');
define('W_USER_USER_MAGAZINE_ALLOW_FLAG', '���ޥ�');
define('W_USER_USER_SEX_PUBLIC', '���̸���');
define('W_USER_USER_BIRTH_DAY_PUBLIC', '��ǯ��������)');
define('W_USER_USER_ADDRESS_PUBLIC', '�������');
define('W_USER_USER_BLOOD_TYPE_PUBLIC', '��շ�����');
define('W_USER_JOB_FAMILY_PUBLIC', '�������');
define('W_USER_BUSINESS_CATEGORY_ID_PUBLIC', '�ȼ����');
define('W_USER_USER_IS_MARRIED_PUBLIC', '�뺧����');
define('W_USER_USER_HAS_CHILDREN_PUBLIC', '�Ҷ�����');
define('W_USER_WORK_LOCATION_PREFECTURE_ID_PUBLIC', '��̳�ϸ���');
define('W_USER_USER_HOBBY_PUBLIC', '��̣����');
define('W_USER_USER_URL_PUBLIC', 'URL����');
define('W_USER_USER_INTRODUCTION_PUBLIC', '���ʾҲ����');
define('W_USER_USER_MAIL_OK', '���ޥ��ۿ�');
define('W_USER_IMAGE_ADD', '[x:0066]������ź�դ���');
define('W_USER_IMAGE_EDIT', '[x:0066]�������ѹ�����');
define('W_USER_MOVIE_ADD', '[x:0780]ư���ź�դ���');
define('W_USER_MOVIE_EDIT', '[x:0780]ư����ѹ�����');

/* =============================================
// ����
 ============================================= */
define('W_USER_INVITE', '����');
define('W_USER_INVITE_NAME','ͧã����');
define('W_USER_INVITE_TO_USER_MAILADDRESS', '���ΎҎ��َ��Ďގڎ�');
define('W_USER_INVITE_MESSAGE', '�Ҏ���������(Ǥ��)');

/* =============================================
// ����
 ============================================= */
define('W_USER_BLOG_ARTICLE', '����');
define('W_USER_BLOG_ARTICLE_ID', W_USER_BLOG_ARTICLE.'ID');
define('W_USER_BLOG_ARTICLE_TITLE', W_USER_BLOG_ARTICLE.'�����Ď�');
define('W_USER_BLOG_ARTICLE_BODY', W_USER_BLOG_ARTICLE.'��ʸ');
define('W_USER_BLOG_ARTICLE_STATUS', W_USER_BLOG_ARTICLE.'���ơ�����');
define('W_USER_BLOG_ARTICLE_CHECKED', W_USER_BLOG_ARTICLE.'�ƻ�');
define('W_USER_BLOG_ARTICLE_PUBLIC', W_USER_BLOG_ARTICLE.'��������');

/* =============================================
// ����������
 ============================================= */
define('W_USER_BLOG_COMMENT', '���Ҏݎ�');
define('W_USER_BLOG_COMMENT_ID', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'ID');
define('W_USER_BLOG_COMMENT_BODY', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'��ʸ');
define('W_USER_BLOG_COMMENT_STATUS', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'���ơ�����');
define('W_USER_BLOG_COMMENT_CHECKED', W_USER_BLOG_ARTICLE.W_USER_BLOG_COMMENT.'�ƻ�');

/* =============================================
// ���ߥ�˥ƥ�
 ============================================= */
define('W_USER_COMMUNITY', '���Ў��ƎÎ�');
define('W_USER_COMMUNITY_LIST', '����'.W_USER_COMMUNITY);
define('W_USER_COMMUNITY_TITLE', W_USER_COMMUNITY.'̾');
define('W_USER_COMMUNITY_CATEGORY', W_USER_COMMUNITY.'���Î��ގ�');
define('W_USER_COMMUNITY_CATEGORY_ID', W_USER_COMMUNITY.'���Î��ގ�');
define('W_USER_COMMUNITY_DESCRIPTION', W_USER_COMMUNITY.'������');
define('W_USER_COMMUNITY_ID', W_USER_COMMUNITY.'ID');

/* =============================================
// ���ߥ�˥ƥ��ȥԥå�
 ============================================= */
define('W_USER_COMMUNITY_ARTICLE', '�Ďˎߎ���');
define('W_USER_COMMUNITY_ARTICLE_ID', W_USER_COMMUNITY_ARTICLE.'ID');
define('W_USER_COMMUNITY_ARTICLE_TITLE', W_USER_COMMUNITY_ARTICLE.'�����Ď�');
define('W_USER_COMMUNITY_ARTICLE_BODY', W_USER_COMMUNITY_ARTICLE.'��ʸ');
define('W_USER_COMMUNITY_ARTICLE_STATUS', W_USER_COMMUNITY_ARTICLE.'���ơ�����');
define('W_USER_COMMUNITY_ARTICLE_CHECKED', W_USER_COMMUNITY_ARTICLE.'�ƻ�');
define('W_USER_COMMUNITY_ADMIN', '������');
define('W_USER_COMMUNITY_ADMINISTRATION', '������');
define('W_USER_COMMUNITY_JOIN_CONDITION', '���þ��ȸ����ڎ͎ގ�');
define('W_USER_COMMUNITY_TOPIC_PERMISSION', '�Ďˎߎ��������θ���');

/* =============================================
// ���ߥ�˥ƥ�������
 ============================================= */
define('W_USER_COMMUNITY_COMMENT', '���Ҏݎ�');
define('W_USER_COMMUNITY_COMMENT_NAME', '���Ҏݎ�');
define('W_USER_COMMUNITY_COMMENT_ID', W_USER_COMMUNITY_COMMENT.'ID');
define('W_USER_COMMUNITY_COMMENT_BODY', '��ʸ');
define('W_USER_COMMUNITY_COMMENT_STATUS', W_USER_COMMUNITY_COMMENT.'���ơ�����');
define('W_USER_COMMUNITY_COMMENT_CHECKED', W_USER_COMMUNITY_COMMENT.'�ƻ�');

/* =============================================
// ������
 ============================================= */
define('W_USER_BBS', '������');
define('W_USER_BBS_NAME', '����');
define('W_USER_BBS_MESSAGE', W_USER_BBS_NAME.'�Ҏ���������');
define('W_USER_BBS_ID', W_USER_BBS_NAME.'ID');
define('W_USER_BBS_BODY', W_USER_BBS_NAME.'�Ҏ���������');
define('W_USER_BBS_STATUS', W_USER_BBS_NAME.'���ơ�����');
define('W_USER_BBS_CHECKED', W_USER_BBS_NAME.'�ƻ�');

/* =============================================
// �֥�å��ꥹ��
 ============================================= */
define('W_USER_BLACKLIST', '�̎ގ׎����؎���');
define('W_USER_BLACKLIST_ID', W_USER_BLACKLIST.'ID');
define('W_USER_BLACKLIST_USER_ID', W_USER_BLACKLIST.'��Ͽ������Ԥä��桼��ID');
define('W_USER_BLACKLIST_DENY_USER_ID', W_USER_BLACKLIST.'����Ͽ���줿�桼��ID');
define('W_USER_BLACKLIST_STATUS', W_USER_BLACKLIST.'���ơ�����');
define('W_USER_BLACKLIST_CHECKED', W_USER_BLACKLIST.'�ƻ�');

/* =============================================
// ������
 ============================================= */
define('W_USER_COMMENT', '������');
define('W_USER_COMMENT_NAME', '������');
define('W_USER_COMMENT_TYPE', W_USER_COMMENT.'����');
define('W_USER_COMMENT_SUBID', W_USER_COMMENT.'����ID');
define('W_USER_COMMENT_ID', W_USER_COMMENT.'ID');
define('W_USER_COMMENT_BODY', '��ʸ');
define('W_USER_COMMENT_STATUS', W_USER_COMMENT.'���ơ�����');
define('W_USER_COMMENT_CHECKED', W_USER_COMMENT.'�ƻ�');

/* =============================================
// �ǥ��᡼��
 ============================================= */
define('W_USER_DECOMAIL_ID', W_USER_DECOMAIL.'ID');

/* =============================================
// �ߥ˥᡼��
 ============================================= */
define('W_USER_MESSAGE', '�ЎƎҎ���');
define('W_USER_MESSAGE_ID', W_USER_MESSAGE.'ID');
define('W_USER_MESSAGE_REPLY_ID', W_USER_MESSAGE.'ID');
define('W_USER_MESSAGE_TITLE', '�����Ď�');
define('W_USER_MESSAGE_BODY', '��ʸ');
define('W_USER_MESSAGE_RECEIVE_BOX', '����BOX');
define('W_USER_MESSAGE_SENT_BOX', '����BOX');
define('W_USER_MESSAGE_STATUS', W_USER_MESSAGE.'���ơ�����');
define('W_USER_MESSAGE_CHECKED', W_USER_MESSAGE.'�ƻ�');
define('W_USER_FROM_USER_NICKNAME', 'FROM');
define('W_USER_TO_USER_NICKNAME', '����');

/* =============================================
// ͧã
 ============================================= */
define('W_USER_FRIEND_NAME', 'ͧã');
define('W_USER_FRIEND', W_USER_FRIEND_NAME.'�؎ݎ�');
define('W_USER_FRIEND_LIST', W_USER_FRIEND_NAME.'�؎���');
define('W_USER_FRIEND_ID', W_USER_FRIEND.'ID');
define('W_USER_FRIEND_MESSAGE', '�Ҏ���������(Ǥ��)');
define('W_USER_FRIEND_INTRODUCTION', '�Ҳ�ʸ');	
define('W_USER_FRIEND_INTRODUCTION_CHECKED', W_USER_FRIEND_INTRODUCTION.'�ƻ�');
define('W_USER_FRIEND_INTRODUCTION_STATUS', '���ơ�����');

/* =============================================
// ����
 ============================================= */
define('W_USER_IMAGE_STATUS', W_USER_IMAGE.'���ơ�����');
define('W_USER_IMAGE_CHECKED', W_USER_IMAGE.'�ƻ�');

/* =============================================
// ư��
 ============================================= */
define('W_USER_MOVIE', 'ư��');
define('W_USER_MOVIE_STATUS', W_USER_MOVIE.'���ơ�����');
define('W_USER_MOVIE_CHECKED', W_USER_MOVIE.'�ƻ�');

/* =============================================
// ����
 ============================================= */
define('W_USER_MESSAGE_1',W_USER_BBS.'�񤭹������ΎҎ���');
define('W_USER_MESSAGE_2',W_USER_MESSAGE.'���ΎҎ���');
define('W_USER_MESSAGE_3',W_USER_BLOG_COMMENT.'���ΎҎ���');
define('W_USER_MESSAGE_4',W_USER_COMMUNITY_COMMENT.'���ΎҎ���');

/* =============================================
// ���Х���
 ============================================= */
define('W_USER_AVATAR_ID', W_USER_AVATAR.'ID');
define('W_USER_AVATAR_CATEGORY', W_USER_AVATAR.'���Î��ގ�');
define('W_USER_AVATAR_STAND', W_USER_AVATAR.'���');

/* =============================================
// ����å�
 ============================================= */
define('W_USER_SHOP', '�������̎�');
define('W_USER_SHOP_NAME', 'Ź��̾');
define('W_USER_SHOP_ID', 'ID');
define('W_USER_SHOP_KEYWORD', '�����܎��Ď�');
define('W_USER_SORT_ORDER', '�¤ӽ�');
define('W_USER_STOCK_ID', '�����̎�');

/* =============================================
// ����
 ============================================= */
define('W_USER_ITEM', '����');
define('W_USER_ITEM_ID', 'ID');
define('W_USER_ITEM_KEYWORD', '�����܎��Ď�');
define('W_USER_ITEM_NUM', '�Ŀ�');
define('W_USER_ITEM_CATEGORY', '���Î��ގ�');
define('W_USER_PRICE_START', 'ͽ���Ǿ�');
define('W_USER_PRICE_END', 'ͽ������');
define('W_USER_ITEM_ORDER_TYPE', '��ʧ��ˡ');

/* =============================================
// �㤤ʪ����
 ============================================= */
define('W_USER_CART', '�㤤ʪ����');
define('W_USER_CART_ID', 'ID');
define('W_USER_CART_ITEM_NUM', '�Ŀ�');

/* =============================================
// ��ʸ
 ============================================= */
define('W_USER_ORDER', '�������ގ�');
define('W_USER_ORDER_ID', 'ID');
define('W_USER_ORDER_CREDIT', '���ڎ��ގ��Ď����Ď�');
define('W_USER_ORDER_CONVENI', '���ݎˎގ�');
define('W_USER_ORDER_TRANSFER', '�����');
define('W_USER_ORDER_EXCHANGE', '��Կ���');
define('W_USER_ORDER_CARD_TYPE', '�����Ď޼���');
define('W_USER_ORDER_CONVENI_TYPE', 'Ź������');
define('W_USER_ORDER_CARD_NUMBER', '�����Ď��ֹ�');
define('W_USER_ORDER_CARD_NAME', '̾����');
define('W_USER_ORDER_CARD_TERM', 'ͭ������');
define('W_USER_ORDER_CARD_MONTH', W_USER_ORDER_CARD_TERM . '(��)');
define('W_USER_ORDER_CARD_YEAR', W_USER_ORDER_CARD_TERM . '(ǯ)');
define('W_USER_ORDER_CARD_REVO_STATUS', '��ʧ�����');
define('W_USER_ORDER_DELIVERY_TYPE', '���Ϥ��轻��');
define('W_USER_ORDER_DELIVERY_DAY', '��ã���ֻ���');
define('W_USER_ORDER_DELIVERY_NOTE', '����');
define('W_USER_ORDER_GET_POINT', '����');
define('W_USER_ORDER_DELIVERY_NAME', '��̾��');
define('W_USER_ORDER_DELIVERY_NAME_KANA', '�̎؎��ގ�');
define('W_USER_ORDER_DELIVERY_ZIPCODE', '͹���ֹ�');
define('W_USER_ORDER_DELIVERY_REGION_ID', '��ƻ�ܸ�');
define('W_USER_ORDER_DELIVERY_ADDRESS', '����');
define('W_USER_ORDER_DELIVERY_ADDRESS_BUILDING', '��ʪ̾');
define('W_USER_ORDER_DELIVERY_PHONE', '�����ֹ�');
define('W_USER_ORDER_USE_POINT_STATUS', W_USER_POINT . '�����Ѥ���');
define('W_USER_ORDER_USE_POINT', '���Ѥ���' . W_USER_POINT);

/* =============================================
// �桼��
 ============================================= */
define('W_USER_NAME', '��̾��');
define('W_USER_NAME_KANA', '�̎؎��ގ�');
define('W_USER_ZIPCODE', '͹���ֹ�');
define('W_USER_REGION_ID', '��ƻ�ܸ�');
define('W_USER_ADDRESS', '����');
define('W_USER_ADDRESS_BUILDING', '��ʪ̾');
define('W_USER_PHONE', '�����ֹ�');
define('W_USER_BIRTHDAY', '������');
define('W_USER_SEX', '����');
define('W_USER_MAGAZINE_ALLOW_FLAG', '�Ҏَώ���');



/**
 * ����¦���ܸ������
 */
/* =============================================
// ����
 ============================================= */
define('W_ADMIN_MENU_ICON', '��');
define('W_ADMIN_ACCOUNT', '�����ԥ��������');
define('W_ADMIN_USER', '�桼����');
define('W_ADMIN_USER_ID',  W_ADMIN_USER.'ID');
define('W_ADMIN_USER_SUB_ID',  W_ADMIN_USER.'����ID');
define('W_ADMIN_USER_HASH',  W_ADMIN_USER.'���̣ɣ�');
define('W_ADMIN_USER_PASSWORD', '�ѥ����');
define('W_ADMIN_USER_SEX', '����');
define('W_ADMIN_USER_BIRTHDAY', '��ǯ����');
define('W_ADMIN_USER_BIRTH_DATE_YEAR', W_ADMIN_USER_BIRTHDAY.'(ǯ)');
define('W_ADMIN_USER_BIRTH_DATE_MONTH', W_ADMIN_USER_BIRTHDAY.'(��)');
define('W_ADMIN_USER_BIRTH_DATE_DAY', W_ADMIN_USER_BIRTHDAY.'(��)');
define('W_ADMIN_USER_PREFECTURE_ID', '����(��ƻ�ܸ�)');
define('W_ADMIN_USER_BLOOD_TYPE', '��շ�');
define('W_ADMIN_JOB_FAMILY_ID', '����');
define('W_ADMIN_BUSINESS_CATEGORY_ID', '�ȼ�');
define('W_ADMIN_USER_IS_MARRIED', '�뺧');
define('W_ADMIN_USER_HAS_CHILDREN', '�Ҷ�');
define('W_ADMIN_WORK_LOCATION_PREFECTURE_ID', '��̳��');
define('W_ADMIN_USER_HOBBY', '��̣');
define('W_ADMIN_USER_URL', 'URL');
define('W_ADMIN_USER_INTRODUCTION', '���ʾҲ�');
define('W_ADMIN_USER_AGE_MIN', 'ǯ��(����)');
define('W_ADMIN_USER_AGE_AMX', 'ǯ��(�ǹ�)');
define('W_ADMIN_USER_PROF_KEYWORD', '�������');
define('W_ADMIN_USER_GUEST_STATUS', '�����ȥ桼��');
define('W_ADMIN_USER_STATUS', '�桼�����ơ�����');
define('W_ADMIN_USER_MAIL_OK', '���ޥ��ۿ�');
define('W_ADMIN_USER_MAGAZINE_ERROR_NUM',  '���顼�᡼���');
define('W_ADMIN_USER_MAILADDRESS',  '�᡼�륢�ɥ쥹');
define('W_ADMIN_USER_NICKNAME',  '�˥å��͡���');
define('W_ADMIN_USER_NAME',  '��̾');
define('W_ADMIN_USER_NAME_KANA',  '�եꥬ��');
define('W_ADMIN_USER_ZIPCODE',  '���Ϥ���͹���ֹ�');
define('W_ADMIN_USER_REGION_ID',  '���Ϥ�����');
define('W_ADMIN_USER_ADDRESS',  '���Ϥ��轻��');
define('W_ADMIN_USER_ADDRESS_BUILDING',  '���Ϥ��轻��(��ʪ̾)');
define('W_ADMIN_USER_PHONE',  '���Ϥ��������ֹ�');
define('W_ADMIN_USER_POINT', W_ADMIN_USER.W_ADMIN_POINT);
define('W_ADMIN_USER_CARRIER','����ꥢ');
define('W_ADMIN_USER_DEVICE','����̾');
define('W_ADMIN_SEARCH', '����������');
define('W_ADMIN_ADD', '���С�Ͽ��');
define('W_ADMIN_EDIT', '���������Ƥǹ������롡');
define('W_ADMIN_CONFIRM', '����ǧ���̤ء�');
define('W_ADMIN_DOWNLOAD', '���������');
define('W_ADMIN_SORT_KEY', '�¤ӽ�');
define('W_ADMIN_SORT_ORDER', '���');
define('W_ADMIN_MESSAGE', '�ߥ˥᡼��');
define('W_ADMIN_LOGIN', '������');
define('W_ADMIN_LOGOUT', '��������');
define('W_ADMIN_PASSWORD', '�ѥ����');
define('W_ADMIN_GAME', '������');
define('W_ADMIN_GAME_CATEGORY', W_ADMIN_GAME.'���ƥ���');
define('W_ADMIN_SOUND', '�������');
define('W_ADMIN_SOUND_CATEGORY', W_ADMIN_SOUND.'���ƥ���');
define('W_ADMIN_VIDEO', '�ӥǥ�');
define('W_ADMIN_VIDEO_CATEGORY', W_ADMIN_VIDEO.'���ƥ���');
define('W_ADMIN_AVATAR', '���Х���');
define('W_ADMIN_DECOMAIL', '�ǥ��᡼��');
define('W_ADMIN_DECOMAIL_CATEGORY', W_ADMIN_DECOMAIL.'���ƥ���');
define('W_ADMIN_MAILADDRESS', '�᡼�륢�ɥ쥹');
define('W_ADMIN_PROFILE', '�ץ�ե�����');
define('W_ADMIN_AD', '����');
define('W_ADMIN_ADMENU', W_ADMIN_AD.'��˥塼');
define('W_ADMIN_IMAGE', '����');
define('W_ADMIN_AD_CATEGORY', W_ADMIN_AD.'���ƥ���');
define('W_ADMIN_AD_CODE', W_ADMIN_AD.'������');
define('W_ADMIN_BANNER', '�Хʡ�');
define('W_ADMIN_COMMUNITY', '���ߥ�˥ƥ�');
define('W_ADMIN_COMMUNITY_ARTICLE', W_ADMIN_COMMUNITY.'�ȥԥå�');
define('W_ADMIN_COMMUNITY_ARTICLE_NAME', '�ȥԥå�');
define('W_ADMIN_COMMUNITY_CATEGORY', W_ADMIN_COMMUNITY.'���ƥ���');
define('W_ADMIN_MAGAZINE', '���ޥ�');
define('W_ADMIN_MEDIA', '�����ϩ');
define('W_ADMIN_CHECKED', '�ƻ�');
define('W_ADMIN_CONFIG', '���ܾ���');
define('W_ADMIN_PRIORITY', 'ͥ����');
define('W_ADMIN_REPORT', '����');
define('W_ADMIN_SEGMENT', '��������');
define('W_ADMIN_CONTENTS', '�ե꡼�ڡ���');
define('W_ADMIN_CMS', '����ƥ��');
define('W_ADMIN_STATS', '������������');
define('W_ADMIN_HTMLTEMPLATE', 'HTML�ƥ�ץ졼��');
define('W_ADMIN_MAILTEMPLATE', '�᡼��ƥ�ץ졼��');
define('W_ADMIN_FAQ', '�������ޥ˥奢��');
define('W_ADMIN_EMOJI', '��ʸ���ѥ�å�');
define('W_ADMIN_NGWORD', 'NG���');
define('W_ADMIN_EC', 'EC');
define('W_ADMIN_IMAGE_ADD', '[x:0066]������ź�դ���');
define('W_ADMIN_IMAGE_EDIT', '[x:0066]�������ѹ�����');

/* =============================================
// �����ϩ
 ============================================= */
define('W_ADMIN_MEDIA_ID', 'ID');
define('W_ADMIN_MEDIA_CODE', '���̥�����');
define('W_ADMIN_MEDIA_NAME', W_ADMIN_MEDIA.'̾');
define('W_ADMIN_MEDIA_PARAM', '�ѥ�᡼��');
define('W_ADMIN_MEDIA_PARAM1', W_ADMIN_MEDIA_PARAM.'��');
define('W_ADMIN_MEDIA_PARAM2', W_ADMIN_MEDIA_PARAM.'��');
define('W_ADMIN_MEDIA_PARAM3', W_ADMIN_MEDIA_PARAM.'��');
define('W_ADMIN_MEDIA_RES_URL', '����������ֵ���URL');
define('W_ADMIN_MEDIA_POINT', '�������Ϳ�ݥ����');
define('W_ADMIN_MEDIA_STATUS', '���ơ�����');
define('W_ADMIN_MEDIA_MAIL_TITLE', W_ADMIN_MEDIA.'���Υ᡼�륢�ɥ쥹');
define('W_ADMIN_MEDIA_MAIL_BODY', W_ADMIN_MEDIA.'���Υ᡼����ʸ');
define('W_ADMIN_MEDIA_ACCOUNT', '���������ѥ᡼�륢�ɥ쥹');

/* =============================================
// �����������ݡ���
 ============================================= */
define('W_ADMIN_ANALYTICS', '�����������ݡ���');
define('W_ADMIN_ANALYTICS_ID', 'ID');
define('W_ADMIN_ANALYTICS_DATE', '����');
define('W_ADMIN_PRE_REGIST_NUM', '����Ͽ�Կ�');
define('W_ADMIN_REGIST_NUM', '����Ͽ�Կ�');
define('W_ADMIN_FRIEND_NUM', 'ͧã������Ͽ�Կ�');
define('W_ADMIN_RESIGN_NUM', '���Կ�');
define('W_ADMIN_NATURAL_NUM', '������Ͽ�Կ�');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_BLOG_ARTICLE', '����');
define('W_ADMIN_BLOG_ARTICLE_ID', W_ADMIN_BLOG_ARTICLE.'ID');
define('W_ADMIN_BLOG_ARTICLE_TITLE', W_ADMIN_BLOG_ARTICLE.'�����ȥ�');
define('W_ADMIN_BLOG_ARTICLE_BODY', W_ADMIN_BLOG_ARTICLE.'��ʸ');
define('W_ADMIN_BLOG_ARTICLE_STATUS', W_ADMIN_BLOG_ARTICLE.'���ơ�����');
define('W_ADMIN_BLOG_ARTICLE_CHECKED', W_ADMIN_BLOG_ARTICLE.'�ƻ�');
define('W_ADMIN_BLOG_ARTICLE_PUBLIC', W_ADMIN_BLOG_ARTICLE.'��������');

/* =============================================
// ����������
 ============================================= */
define('W_ADMIN_BLOG_COMMENT', '������');
define('W_ADMIN_BLOG_COMMENT_ID', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'ID');
define('W_ADMIN_BLOG_COMMENT_BODY', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'��ʸ');
define('W_ADMIN_BLOG_COMMENT_STATUS', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'���ơ�����');
define('W_ADMIN_BLOG_COMMENT_CHECKED', W_ADMIN_BLOG_ARTICLE.W_ADMIN_BLOG_COMMENT.'�ƻ�');

/* =============================================
// ������
 ============================================= */
define('W_ADMIN_COMMENT', '������');
define('W_ADMIN_COMMENT_NAME', '������');
define('W_ADMIN_COMMENT_TYPE', W_ADMIN_COMMENT.'����');
define('W_ADMIN_COMMENT_SUBID', W_ADMIN_COMMENT.'����ID');
define('W_ADMIN_COMMENT_ID', W_ADMIN_COMMENT.'ID');
define('W_ADMIN_COMMENT_BODY', '��ʸ');
define('W_ADMIN_COMMENT_STATUS', W_ADMIN_COMMENT.'���ơ�����');
define('W_ADMIN_COMMENT_CHECKED', W_ADMIN_COMMENT.'�ƻ�');

/* =============================================
// ���ߥ�˥ƥ�
 ============================================= */
define('W_ADMIN_COMMUNITY_CATEGORY_ID', W_ADMIN_COMMUNITY.'���ƥ���');
define('W_ADMIN_COMMUNITY_DESCRIPTION', W_ADMIN_COMMUNITY.'������');
define('W_ADMIN_COMMUNITY_LIST', '����'.W_ADMIN_COMMUNITY);
define('W_ADMIN_COMMUNITY_TITLE', W_ADMIN_COMMUNITY.'̾');
define('W_ADMIN_COMMUNITY_ID', W_ADMIN_COMMUNITY.'ID');

/* =============================================
// ���ߥ�˥ƥ��ȥԥå�
 ============================================= */
define('W_ADMIN_COMMUNITY_ARTICLE_ID', W_ADMIN_COMMUNITY_ARTICLE.'ID');
define('W_ADMIN_COMMUNITY_ARTICLE_TITLE', W_ADMIN_COMMUNITY_ARTICLE.'�����ȥ�');
define('W_ADMIN_COMMUNITY_ARTICLE_BODY', W_ADMIN_COMMUNITY_ARTICLE.'��ʸ');
define('W_ADMIN_COMMUNITY_ARTICLE_STATUS', W_ADMIN_COMMUNITY_ARTICLE.'���ơ�����');
define('W_ADMIN_COMMUNITY_ARTICLE_CHECKED', W_ADMIN_COMMUNITY_ARTICLE.'�ƻ�');

/* =============================================
// ���ߥ�˥ƥ�����
 ============================================= */
define('W_ADMIN_COMMUNITY_ADMIN', '������');
define('W_ADMIN_COMMUNITY_ADMINISTRATION', '������');
define('W_ADMIN_COMMUNITY_JOIN_CONDITION', '���þ��ȸ�����٥�');
define('W_ADMIN_COMMUNITY_TOPIC_PERMISSION', '�ȥԥå������θ���');

/* =============================================
// ���ߥ�˥ƥ�������
 ============================================= */
define('W_ADMIN_COMMUNITY_COMMENT', '������');
define('W_ADMIN_COMMUNITY_COMMENT_NAME', '������');
define('W_ADMIN_COMMUNITY_COMMENT_ID', W_ADMIN_COMMUNITY_COMMENT.'ID');
define('W_ADMIN_COMMUNITY_COMMENT_BODY', '��ʸ');
define('W_ADMIN_COMMUNITY_COMMENT_STATUS', W_ADMIN_COMMUNITY_COMMENT.'���ơ�����');
define('W_ADMIN_COMMUNITY_COMMENT_CHECKED', W_ADMIN_COMMUNITY_COMMENT.'�ƻ�');

/* =============================================
// ������
 ============================================= */
define('W_ADMIN_BBS', '������');
define('W_ADMIN_BBS_NAME', '����');
define('W_ADMIN_BBS_MESSAGE', W_ADMIN_BBS_NAME.'��å�����');
define('W_ADMIN_BBS_ID', W_ADMIN_BBS_NAME.'ID');
define('W_ADMIN_BBS_BODY', W_ADMIN_BBS_NAME.'��å�����');
define('W_ADMIN_BBS_STATUS', W_ADMIN_BBS_NAME.'���ơ�����');
define('W_ADMIN_BBS_CHECKED', W_ADMIN_BBS_NAME.'�ƻ�');

/* =============================================
// �֥�å��ꥹ��
 ============================================= */
define('W_ADMIN_BLACKLIST', '�֥�å��ꥹ��');
define('W_ADMIN_BLACKLIST_ID', W_ADMIN_BLACKLIST.'ID');
define('W_ADMIN_BLACKLIST_ADMIN_ID', W_ADMIN_BLACKLIST.'��Ͽ������Ԥä��桼��ID');
define('W_ADMIN_BLACKLIST_DENY_ADMIN_ID', W_ADMIN_BLACKLIST.'����Ͽ���줿�桼��ID');
define('W_ADMIN_BLACKLIST_STATUS', W_ADMIN_BLACKLIST.'���ơ�����');
define('W_ADMIN_BLACKLIST_CHECKED', W_ADMIN_BLACKLIST.'�ƻ�');

/* =============================================
// �ǥ��᡼��
 ============================================= */
define('W_ADMIN_DECOMAIL_ID', W_ADMIN_DECOMAIL.'ID');
define('W_ADMIN_DECOMAIL_NAME', W_ADMIN_DECOMAIL.'̾');
define('W_ADMIN_DECOMAIL_DESC', W_ADMIN_DECOMAIL.'����');
define('W_ADMIN_DECOMAIL_IMAGE', W_ADMIN_DECOMAIL.'����');
define('W_ADMIN_DECOMAIL_POINT', W_ADMIN_DECOMAIL.'����ݥ����');
define('W_ADMIN_DECOMAIL_CATEGORY_ID', W_ADMIN_DECOMAIL_CATEGORY.'ID');
define('W_ADMIN_DECOMAIL_STOCK_NUM', W_ADMIN_DECOMAIL.'�ۿ���λ��');
define('W_ADMIN_DECOMAIL_STOCK_STATUS', W_ADMIN_DECOMAIL_STOCK_NUM.'����');
define('W_ADMIN_DECOMAIL_START_TIME', W_ADMIN_DECOMAIL.'�ۿ���λ����');
define('W_ADMIN_DECOMAIL_START_STATUS', W_ADMIN_DECOMAIL_START_TIME.'����');
define('W_ADMIN_DECOMAIL_END_TIME', W_ADMIN_DECOMAIL.'�ۿ���λ����');
define('W_ADMIN_DECOMAIL_END_STATUS', W_ADMIN_DECOMAIL_END_TIME.'����');
define('W_ADMIN_DECOMAIL_IMAGE_NAME', W_ADMIN_DECOMAIL.'����');
define('W_ADMIN_DECOMAIL_IMAGE_FILE', W_ADMIN_DECOMAIL.'�����ե�����');
define('W_ADMIN_DECOMAIL_IMAGE_STATUS', W_ADMIN_DECOMAIL.'�������ơ�����');
define('W_ADMIN_DECOMAIL_CATEGORY_NAME', W_ADMIN_DECOMAIL_CATEGORY.'̾');
define('W_ADMIN_DECOMAIL_CATEGORY_DESC', W_ADMIN_DECOMAIL_CATEGORY.'����');
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY', W_ADMIN_DECOMAIL_CATEGORY.'ͥ����');
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_NAME', W_ADMIN_DECOMAIL_CATEGORY_PRIORITY);
define('W_ADMIN_DECOMAIL_CATEGORY_PRIORITY_ID', W_ADMIN_DECOMAIL_CATEGORY.'ͥ����ID');

/* =============================================
// ������
 ============================================= */
define('W_ADMIN_GAME_ID', W_ADMIN_GAME.'ID');
define('W_ADMIN_GAME_CODE', W_ADMIN_GAME.'������');
define('W_ADMIN_GAME_NAME', W_ADMIN_GAME.'̾');
define('W_ADMIN_GAME_DESC', W_ADMIN_GAME.'����');
define('W_ADMIN_GAME_EXPLAIN', W_ADMIN_GAME.'�������');
define('W_ADMIN_GAME_URL', W_ADMIN_GAME.'URL');
define('W_ADMIN_GAME_IMAGE', W_ADMIN_GAME.'����');
define('W_ADMIN_GAME_POINT', W_ADMIN_GAME.'����ݥ����');
define('W_ADMIN_GAME_CATEGORY_ID', W_ADMIN_GAME_CATEGORY.'ID');
define('W_ADMIN_GAME_STOCK_NUM', W_ADMIN_GAME.'�ۿ���λ��');
define('W_ADMIN_GAME_STOCK_STATUS', W_ADMIN_GAME_STOCK_NUM.'����');
define('W_ADMIN_GAME_START_TIME', W_ADMIN_GAME.'�ۿ���λ����');
define('W_ADMIN_GAME_START_STATUS', W_ADMIN_GAME_START_TIME.'����');
define('W_ADMIN_GAME_END_TIME', W_ADMIN_GAME.'�ۿ���λ����');
define('W_ADMIN_GAME_END_STATUS', W_ADMIN_GAME_END_TIME.'����');
define('W_ADMIN_GAME_IMAGE_NAME', W_ADMIN_GAME.'����');
define('W_ADMIN_GAME_IMAGE_FILE', W_ADMIN_GAME.'�����ե�����');
define('W_ADMIN_GAME_IMAGE_STATUS', W_ADMIN_GAME.'�������ơ�����');
define('W_ADMIN_GAME_CATEGORY_NAME', W_ADMIN_GAME_CATEGORY.'̾');
define('W_ADMIN_GAME_CATEGORY_DESC', W_ADMIN_GAME_CATEGORY.'����');
define('W_ADMIN_GAME_CATEGORY_PRIORITY', W_ADMIN_GAME_CATEGORY.'ͥ����');
define('W_ADMIN_GAME_CATEGORY_PRIORITY_ID', W_ADMIN_GAME_CATEGORY.'ͥ����ID');

/* =============================================
// �ե꡼�ڡ���
 ============================================= */
define('W_ADMIN_CONTENTS_ID', W_ADMIN_CONTENTS.'ID');
define('W_ADMIN_CONTENTS_CODE', W_ADMIN_CONTENTS.'������');
define('W_ADMIN_CONTENTS_TITLE', W_ADMIN_CONTENTS.'�����ȥ�');
define('W_ADMIN_CONTENTS_BODY', W_ADMIN_CONTENTS.'��ʸ');
define('W_ADMIN_CONTENTS_STATUS', W_ADMIN_CONTENTS.'���ơ�����');

/* =============================================
// �������
 ============================================= */
define('W_ADMIN_SOUND_ID', W_ADMIN_SOUND.'ID');
define('W_ADMIN_SOUND_NAME', W_ADMIN_SOUND.'̾');
define('W_ADMIN_SOUND_DESC', W_ADMIN_SOUND.'����');
define('W_ADMIN_SOUND_URL', W_ADMIN_SOUND.'URL');
define('W_ADMIN_SOUND_IMAGE', W_ADMIN_SOUND.'����');
define('W_ADMIN_SOUND_POINT', W_ADMIN_SOUND.'����ݥ����');
define('W_ADMIN_SOUND_CATEGORY_ID', W_ADMIN_SOUND_CATEGORY.'ID');
define('W_ADMIN_SOUND_STOCK_NUM', W_ADMIN_SOUND.'�ۿ���λ��');
define('W_ADMIN_SOUND_STOCK_STATUS', W_ADMIN_SOUND_STOCK_NUM.'����');
define('W_ADMIN_SOUND_START_TIME', W_ADMIN_SOUND.'�ۿ���λ����');
define('W_ADMIN_SOUND_START_STATUS', W_ADMIN_SOUND_START_TIME.'����');
define('W_ADMIN_SOUND_END_TIME', W_ADMIN_SOUND.'�ۿ���λ����');
define('W_ADMIN_SOUND_END_STATUS', W_ADMIN_SOUND_END_TIME.'����');
define('W_ADMIN_SOUND_IMAGE_NAME', W_ADMIN_SOUND.'����');
define('W_ADMIN_SOUND_IMAGE_FILE', W_ADMIN_SOUND.'�����ե�����');
define('W_ADMIN_SOUND_IMAGE_STATUS', W_ADMIN_SOUND.'�������ơ�����');
define('W_ADMIN_SOUND_CATEGORY_NAME', W_ADMIN_SOUND_CATEGORY.'̾');
define('W_ADMIN_SOUND_CATEGORY_DESC', W_ADMIN_SOUND_CATEGORY.'����');
define('W_ADMIN_SOUND_CATEGORY_PRIORITY', W_ADMIN_SOUND_CATEGORY.'ͥ����');
define('W_ADMIN_SOUND_CATEGORY_PRIORITY_ID', W_ADMIN_SOUND_CATEGORY.'ͥ����ID');

/* =============================================
// �ӥǥ�
 ============================================= */
define('W_ADMIN_VIDEO_ID', W_ADMIN_VIDEO.'ID');
define('W_ADMIN_VIDEO_NAME', W_ADMIN_VIDEO.'̾');
define('W_ADMIN_VIDEO_DESC', W_ADMIN_VIDEO.'����');
define('W_ADMIN_VIDEO_URL', W_ADMIN_VIDEO.'URL');
define('W_ADMIN_VIDEO_IMAGE', W_ADMIN_VIDEO.'����');
define('W_ADMIN_VIDEO_POINT', W_ADMIN_VIDEO.'����ݥ����');
define('W_ADMIN_VIDEO_CATEGORY_ID', W_ADMIN_VIDEO_CATEGORY.'ID');
define('W_ADMIN_VIDEO_STOCK_NUM', W_ADMIN_VIDEO.'�ۿ���λ��');
define('W_ADMIN_VIDEO_STOCK_STATUS', W_ADMIN_VIDEO_STOCK_NUM.'����');
define('W_ADMIN_VIDEO_START_TIME', W_ADMIN_VIDEO.'�ۿ���λ����');
define('W_ADMIN_VIDEO_START_STATUS', W_ADMIN_VIDEO_START_TIME.'����');
define('W_ADMIN_VIDEO_END_TIME', W_ADMIN_VIDEO.'�ۿ���λ����');
define('W_ADMIN_VIDEO_END_STATUS', W_ADMIN_VIDEO_END_TIME.'����');
define('W_ADMIN_VIDEO_IMAGE_NAME', W_ADMIN_VIDEO.'����');
define('W_ADMIN_VIDEO_IMAGE_FILE', W_ADMIN_VIDEO.'�����ե�����');
define('W_ADMIN_VIDEO_IMAGE_STATUS', W_ADMIN_VIDEO.'�������ơ�����');
define('W_ADMIN_VIDEO_CATEGORY_NAME', W_ADMIN_VIDEO_CATEGORY.'̾');
define('W_ADMIN_VIDEO_CATEGORY_DESC', W_ADMIN_VIDEO_CATEGORY.'����');
define('W_ADMIN_VIDEO_CATEGORY_PRIORITY', W_ADMIN_VIDEO_CATEGORY.'ͥ����');
define('W_ADMIN_VIDEO_CATEGORY_PRIORITY_ID', W_ADMIN_VIDEO_CATEGORY.'ͥ����ID');

/* =============================================
// �Хʡ�
 ============================================= */
define('W_ADMIN_BANNER_ID', W_ADMIN_BANNER.'ID');
define('W_ADMIN_BANNER_NAME', W_ADMIN_BANNER.'̾');
define('W_ADMIN_BANNER_CLIENT', W_ADMIN_BANNER.'���饤�����̾');
define('W_ADMIN_BANNER_TYPE', W_ADMIN_BANNER.'������');
define('W_ADMIN_BANNER_DESC', W_ADMIN_BANNER.'����');
define('W_ADMIN_BANNER_BODY', W_ADMIN_BANNER.'��ʸ');
define('W_ADMIN_BANNER_URL', W_ADMIN_BANNER.'�����URL');
define('W_ADMIN_BANNER_IMAGE', W_ADMIN_BANNER.'����');
define('W_ADMIN_BANNER_POINT', W_ADMIN_BANNER.'����ݥ����');
define('W_ADMIN_BANNER_CATEGORY', W_ADMIN_BANNER.'���ƥ���');
define('W_ADMIN_BANNER_CATEGORY_ID', W_ADMIN_BANNER_CATEGORY.'ID');
define('W_ADMIN_BANNER_STOCK_NUM', W_ADMIN_BANNER.'�ۿ���λ��');
define('W_ADMIN_BANNER_STOCK_STATUS', W_ADMIN_BANNER_STOCK_NUM.'����');
define('W_ADMIN_BANNER_END_TIME', W_ADMIN_BANNER.'�ۿ���λ����');
define('W_ADMIN_BANNER_END_STATUS', W_ADMIN_BANNER_END_TIME.'����');
define('W_ADMIN_BANNER_IMAGE_NAME', W_ADMIN_BANNER.'����');
define('W_ADMIN_BANNER_IMAGE_FILE', W_ADMIN_BANNER.'�����ե�����');
define('W_ADMIN_BANNER_IMAGE_STATUS', W_ADMIN_BANNER.'�������ơ�����');
define('W_ADMIN_BANNER_CATEGORY_NAME', W_ADMIN_BANNER_CATEGORY.'̾');
define('W_ADMIN_BANNER_CATEGORY_DESC', W_ADMIN_BANNER_CATEGORY.'����');
define('W_ADMIN_BANNER_CATEGORY_PRIORITY', W_ADMIN_BANNER_CATEGORY.'ͥ����');
define('W_ADMIN_BANNER_CATEGORY_PRIORITY_ID', W_ADMIN_BANNER_CATEGORY.'ͥ����ID');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_AD_ID', W_ADMIN_AD.'ID');
define('W_ADMIN_AD_NAME', W_ADMIN_AD.'̾');
define('W_ADMIN_AD_STATUS', W_ADMIN_AD.'���ơ�����');
define('W_ADMIN_AD_CLIENT', W_ADMIN_AD.'���饤�����̾');
define('W_ADMIN_AD_TYPE', W_ADMIN_AD.'������');
define('W_ADMIN_AD_DISPLAY_TYPE', W_ADMIN_AD.'ɽ��������');
define('W_ADMIN_AD_DESC', W_ADMIN_AD.'����');
define('W_ADMIN_AD_BODY', W_ADMIN_AD.'��ʸ');
define('W_ADMIN_AD_URL', W_ADMIN_AD.'�����URL');
define('W_ADMIN_AD_IMAGE', W_ADMIN_AD.'����');
define('W_ADMIN_AD_POINT', W_ADMIN_AD.'�����ݥ����');
define('W_ADMIN_AD_POINT_PERCENT', W_ADMIN_AD.'�����ݥ����');
define('W_ADMIN_AD_POINT_TYPE', W_ADMIN_AD.'�����ݥ���ȥ�����');
define('W_ADMIN_AD_PRICE', W_ADMIN_AD.'����ñ��');
define('W_ADMIN_AD_CATEGORY_ID', W_ADMIN_AD_CATEGORY.'ID');
define('W_ADMIN_AD_STOCK_NUM', W_ADMIN_AD.'�ۿ���λ��');
define('W_ADMIN_AD_STOCK_STATUS', W_ADMIN_AD_STOCK_NUM.'����');
define('W_ADMIN_AD_START_TIME', W_ADMIN_AD.'�ۿ���λ����');
define('W_ADMIN_AD_START_STATUS', W_ADMIN_AD_START_TIME.'����');
define('W_ADMIN_AD_END_TIME', W_ADMIN_AD.'�ۿ���λ����');
define('W_ADMIN_AD_END_STATUS', W_ADMIN_AD_END_TIME.'����');
define('W_ADMIN_AD_IMAGE_NAME', W_ADMIN_AD.'����');
define('W_ADMIN_AD_IMAGE_FILE', W_ADMIN_AD.'�����ե�����');
define('W_ADMIN_AD_IMAGE_STATUS', W_ADMIN_AD.'�������ơ�����');
define('W_ADMIN_AD_CATEGORY_NAME', W_ADMIN_AD_CATEGORY.'̾');
define('W_ADMIN_AD_CATEGORY_DESC', W_ADMIN_AD_CATEGORY.'����');
define('W_ADMIN_AD_CATEGORY_PRIORITY', W_ADMIN_AD_CATEGORY.'ͥ����');
define('W_ADMIN_AD_CATEGORY_PRIORITY_ID', W_ADMIN_AD_CATEGORY.'ͥ����ID');
define('W_ADMIN_AD_URL_D', 'DOCOMO����URL');
define('W_ADMIN_AD_URL_A', 'au����URL');
define('W_ADMIN_AD_URL_S', 'SoftBank����URL');
define('W_ADMIN_AD_CODE_ID', W_ADMIN_AD.'������');
define('W_ADMIN_AD_MEMO', '���');
define('W_ADMIN_AD_MAIL_BODY', '�᡼����ʸ');

/* =============================================
// �ߥ˥᡼��
 ============================================= */
define('W_ADMIN_MESSAGE_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_REPLY_ID', W_ADMIN_MESSAGE.'ID');
define('W_ADMIN_MESSAGE_TITLE', '�����ȥ�');
define('W_ADMIN_MESSAGE_BODY', '��ʸ');
define('W_ADMIN_MESSAGE_RECEIVE_BOX', '����BOX');
define('W_ADMIN_MESSAGE_SENT_BOX', '����BOX');
define('W_ADMIN_MESSAGE_STATUS', W_ADMIN_MESSAGE.'���ơ�����');
define('W_ADMIN_MESSAGE_CHECKED', W_ADMIN_MESSAGE.'�ƻ�');

/* =============================================
// �˥塼��
 ============================================= */
define('W_ADMIN_NEWS', '�˥塼��');
define('W_ADMIN_NEWS_ID', W_ADMIN_NEWS.'ID');
define('W_ADMIN_NEWS_TYPE', '�����');
define('W_ADMIN_NEWS_TITLE', W_ADMIN_NEWS.'�����ȥ�');
define('W_ADMIN_NEWS_BODY', W_ADMIN_NEWS.'��ʸ');
define('W_ADMIN_NEWS_TIME', '��������');
define('W_ADMIN_FROM_ADMIN_NICKNAME', 'FROM');
define('W_ADMIN_TO_ADMIN_NICKNAME', '����');

/* =============================================
// ͧã
 ============================================= */
define('W_ADMIN_FRIEND_NAME', 'ͧã');
define('W_ADMIN_FRIEND', W_ADMIN_FRIEND_NAME.'���');
define('W_ADMIN_FRIEND_LIST', W_ADMIN_FRIEND_NAME.'�ꥹ��');
define('W_ADMIN_FRIEND_ID', W_ADMIN_FRIEND.'ID');
define('W_ADMIN_FRIEND_MESSAGE', '��å�����(Ǥ��)');
define('W_ADMIN_FRIEND_INTRODUCTION', '�Ҳ�ʸ');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_IMAGE_STATUS', W_ADMIN_IMAGE.'���ơ�����');
define('W_ADMIN_IMAGE_CHECKED', W_ADMIN_IMAGE.'�ƻ�');

/* =============================================
// ư��
 ============================================= */
define('W_ADMIN_MOVIE', 'ư��');
define('W_ADMIN_MOVIE_STATUS', W_ADMIN_MOVIE.'���ơ�����');
define('W_ADMIN_MOVIE_CHECKED', W_ADMIN_MOVIE.'�ƻ�');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_MESSAGE_1',W_ADMIN_BBS.'�񤭹������Υ᡼��');
define('W_ADMIN_MESSAGE_2',W_ADMIN_MESSAGE.'���Υ᡼��');
define('W_ADMIN_MESSAGE_3',W_ADMIN_BLOG_COMMENT.'���Υ᡼��');
define('W_ADMIN_MESSAGE_4',W_ADMIN_COMMUNITY_COMMENT.'���Υ᡼��');

/* =============================================
// ư��
 ============================================= */

/* =============================================
// �ݥ����
 ============================================= */
define('W_ADMIN_POINT_ID', W_ADMIN_POINT.'ID');
define('W_ADMIN_POINT_SUB_ID', W_ADMIN_POINT.'����ID');
define('W_ADMIN_POINT_TYPE', W_ADMIN_POINT.'������');
define('W_ADMIN_POINT_STATUS', W_ADMIN_POINT.'���ơ�����');
define('W_ADMIN_POINT_MEMO', W_ADMIN_POINT.'���');


/* =============================================
// ���Х���
 ============================================= */
define('W_ADMIN_AVATAR_ID', W_ADMIN_AVATAR.'ID');
define('W_ADMIN_AVATAR_CATEGORY', W_ADMIN_AVATAR.'���ƥ���');
define('W_ADMIN_AVATAR_CATEGORY_ID', W_ADMIN_AVATAR_CATEGORY.'ID');
define('W_ADMIN_AVATAR_CATEGORY_NAME', W_ADMIN_AVATAR_CATEGORY.'̾');
define('W_ADMIN_AVATAR_STAND', W_ADMIN_AVATAR.'���');
define('W_ADMIN_AVATAR_STAND_ID', W_ADMIN_AVATAR_STAND.'ID');
define('W_ADMIN_AVATAR_STAND_NAME', W_ADMIN_AVATAR_STAND.'̾');
define('W_ADMIN_AVATAR_DESC', W_ADMIN_AVATAR.'����');
define('W_ADMIN_AVATAR_SYSTEM_CATEGORY_ID', '���Х��������ƥ५�ƥ���ID');
define('W_ADMIN_AVATAR_CATEGORY_PRIORITY', W_ADMIN_AVATAR_CATEGORY.'ͥ����');
define('W_ADMIN_AVATAR_CATEGORY_PRIORITY_ID', W_ADMIN_AVATAR_CATEGORY.'ͥ����ID');
define('W_ADMIN_AVATAR_NAME',	W_ADMIN_AVATAR.'̾');
define('W_ADMIN_AVATAR_IMAGE1',	W_ADMIN_AVATAR. '����1');
define('W_ADMIN_AVATAR_IMAGE1_X',	W_ADMIN_AVATAR_IMAGE1. 'x��ɸ');
define('W_ADMIN_AVATAR_IMAGE1_Y',	W_ADMIN_AVATAR_IMAGE1. 'y��ɸ');
define('W_ADMIN_AVATAR_IMAGE1_Z',	W_ADMIN_AVATAR_IMAGE1. 'z��ɸ');
define('W_ADMIN_AVATAR_IMAGE2',	W_ADMIN_AVATAR. '����2');
define('W_ADMIN_AVATAR_IMAGE2_X',	W_ADMIN_AVATAR_IMAGE2. 'x��ɸ');
define('W_ADMIN_AVATAR_IMAGE2_Y',	W_ADMIN_AVATAR_IMAGE2. 'y��ɸ');
define('W_ADMIN_AVATAR_IMAGE2_Z',	W_ADMIN_AVATAR_IMAGE2. 'z��ɸ');
define('W_ADMIN_AVATAR_POINT',	W_ADMIN_AVATAR.'����ݥ����');
define('W_ADMIN_AVATAR_SEX_TYPE',	W_ADMIN_AVATAR.'���̥�����');
define('W_ADMIN_AVATAR_PRESET',	'�ץꥻ�å�'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_DEFAULT',	'�ǥե����'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_FIRST',	'�������'.W_ADMIN_AVATAR);
define('W_ADMIN_AVATAR_STOCK_NUM',	W_ADMIN_AVATAR.'�ۿ���λ��');
define('W_ADMIN_AVATAR_STOCK_STATUS',	W_ADMIN_AVATAR_STOCK_NUM.'����');
define('W_ADMIN_AVATAR_START_TIME',	W_ADMIN_AVATAR.'�ۿ���λ����');
define('W_ADMIN_AVATAR_START_STATUS',	W_ADMIN_AVATAR_START_TIME.'����');
define('W_ADMIN_AVATAR_END_TIME',	W_ADMIN_AVATAR.'�ۿ���λ����');
define('W_ADMIN_AVATAR_END_STATUS',	W_ADMIN_AVATAR_END_TIME.'����');
define('W_ADMIN_AVATAR_IMAGE1_FILE',	W_ADMIN_AVATAR. '����1�ե�����');
define('W_ADMIN_AVATAR_IMAGE1_STATUS',	W_ADMIN_AVATAR. '����1���ơ�����');
define('W_ADMIN_AVATAR_IMAGE1_DESC',	W_ADMIN_AVATAR. '����1');
define('W_ADMIN_AVATAR_IMGAE1_DESC_NAME',	'�ºݤ˻��Ѥ���'.W_ADMIN_AVATAR_IMAGE1);
define('W_ADMIN_AVATAR_IMAGE1_DESC_FILE',	W_ADMIN_AVATAR. '����1�ե�����');
define('W_ADMIN_AVATAR_IMAGE1_DESC_STATUS',	W_ADMIN_AVATAR. '����1���ơ�����');
define('W_ADMIN_AVATAR_IMAGE2_FILE',	W_ADMIN_AVATAR. '����2�ե�����');
define('W_ADMIN_AVATAR_IMAGE2_STATUS',	W_ADMIN_AVATAR. '����2���ơ�����');
define('W_ADMIN_AVATAR_IMAGE2_DESC',	W_ADMIN_AVATAR. '����2');
define('W_ADMIN_AVATAR_IMGAE2_DESC_NAME',	'�ºݤ˻��Ѥ���'.W_ADMIN_AVATAR_IMAGE2);
define('W_ADMIN_AVATAR_IMAGE2_DESC_FILE',	W_ADMIN_AVATAR. '����2�ե�����');
define('W_ADMIN_AVATAR_IMAGE2_DESC_STATUS',	W_ADMIN_AVATAR. '����2���ơ�����');

/* =============================================
// ��ӥ塼
 ============================================= */
define('W_ADMIN_REVIEW',	'��ӥ塼');
define('W_ADMIN_REVIEW_ID',	'��ӥ塼ID');
define('W_ADMIN_REVIEW_STATUS',	'��ӥ塼���ơ�����');
define('W_ADMIN_REVIEW_TITLE',	'��ӥ塼�����ȥ�');
define('W_ADMIN_REVIEW_BODY',	'��ӥ塼��ʸ');

/* =============================================
// ��ʸ
 ============================================= */
define('W_ADMIN_USER_ORDER',	'��ʸ');
define('W_ADMIN_USER_ORDER_ID',	'��ʸID');
define('W_ADMIN_USER_ORDER_NO',	'��ʸ�ֹ�');
define('W_ADMIN_USER_ORDER_NAME',	'��ʸ��');
define('W_ADMIN_USER_ORDER_STATUS',	'��ʸ���ơ�����');
define('W_ADMIN_USER_ORDER_TYPE',	'����ʧ��ˡ');
define('W_ADMIN_USER_ORDER_DELIVERY_NAME',	'���Ϥ����̾');
define('W_ADMIN_USER_ORDER_DELIVERY_NAME_KANA',	'���Ϥ����̾�եꥬ��');
define('W_ADMIN_USER_ORDER_DELIVERY_ZIPCODE',	'���Ϥ���͹���ֹ�');
define('W_ADMIN_USER_ORDER_DELIVERY_REGION_ID',	'���Ϥ�����ƻ�ܸ�');
define('W_ADMIN_USER_ORDER_DELIVERY_ADDRESS',	'���Ϥ��轻��');
define('W_ADMIN_USER_ORDER_DELIVERY_ADDRESS_BUILDING',	'���Ϥ����ʪ̾');
define('W_ADMIN_USER_ORDER_DELIVERY_PHONE',	'���Ϥ��������ֹ�');
define('W_ADMIN_USER_ORDER_DELIVERY_TYPE',	'���ʤ��Ϥ���');
define('W_ADMIN_USER_ORDER_CARD_CART_HASH',	'���쥸�å���ɼ�ֹ�');
define('W_ADMIN_USER_ORDER_CARD_REVO_STATUS',	'��ʧ���');
define('W_ADMIN_USER_ORDER_CREDIT_AUTH_CODE',	'���쥸�åȥ������꡼�ֹ�');
define('W_ADMIN_USER_ORDER_CONVENI_CART_HASH',	'����ӥ���ɼ�ֹ�');
define('W_ADMIN_USER_ORDER_CONVENI_SALE_CODE',	'����ӥˤ������ֹ�');
define('W_ADMIN_USER_ORDER_COMMENT',	'������');
define('W_ADMIN_USER_ORDER_CREATED_TIME',	'��ʸ����');
define('W_ADMIN_USER_ORDER_USE_POINT_STATUS',	'����');
define('W_ADMIN_USER_ORDER_GET_POINT',	'����');
define('W_ADMIN_USER_ORDER_DELIVERY_DAY',	'�������ֻ���');
define('W_ADMIN_USER_ORDER_DELIVERY_NOTE',	'����');
define('W_ADMIN_USER_ORDER_POSTAGE',	'����');
define('W_ADMIN_USER_ORDER_EXCHANGE_FEE',	'����������');
define('W_ADMIN_USER_ORDER_TOTAL_PRICE1',	'���ʹ��');
define('W_ADMIN_USER_ORDER_TOTAL_PRICE2',	'��׶��');
define('W_ADMIN_USER_ORDER_TAX',	'������');

/* =============================================
// �㤤ʪ����
 ============================================= */
define('W_ADMIN_CART_ID',	'�㤤ʪ����ID');
define('W_ADMIN_CART_STATUS',	'��ʸ���ơ�����');
define('W_ADMIN_CART_ITEM_NUM',	'����');
define('W_ADMIN_SLIP_CODE',	'�����ȼ���ɼ������');

/* =============================================
// ȯ��
 ============================================= */
define('W_ADMIN_POST_UNIT',	'Ʊ��ȯ�����롼��');
define('W_ADMIN_POST_UNIT_GROUP_ID',	'Ʊ��ȯ�����롼��ID');
define('W_ADMIN_POST_UNIT_SENT_STATUS',	'����ȯ�����ơ�����');
define('W_ADMIN_POST_UNIT_ITEM_NUM',	'ȯ���Ŀ�');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_ITEM',	'����');
define('W_ADMIN_ITEM_ID',	'����ID');
define('W_ADMIN_ITEM_DISTINCTION_ID',	'���ʼ���ID');
define('W_ADMIN_ITEM_PRIORITY_ID', '����ͥ����');
define('W_ADMIN_ITEM_NAME',	'����̾');
define('W_ADMIN_ITEM_PRICE',	'����');
define('W_ADMIN_ITEM_DETAIL',	'���ʾܺ�');
define('W_ADMIN_ITEM_STATUS',	'���ʥ��ơ�����');
define('W_ADMIN_ITEM_START_STATUS',	'���䳫�ϥ��ơ�����');
define('W_ADMIN_ITEM_START_TIME',	'������ֳ���');
define('W_ADMIN_ITEM_END_STATUS',	'���佪λ���ơ�����');
define('W_ADMIN_ITEM_END_TIME',	'������ֽ�λ');
define('W_ADMIN_ITEM_TYPE',	'������');
define('W_ADMIN_ITEM_SETTLEMENT',	'�����ˡ');
define('W_ADMIN_ITEM_USE_CREDIT_STATUS',	'���쥸�åȲ�ǽ');
define('W_ADMIN_ITEM_USE_CONVENI_STATUS',	'����ӥ˲�ǽ');
define('W_ADMIN_ITEM_USE_EXCHANGE_STATUS',	'�������ǽ');
define('W_ADMIN_ITEM_USE_TRANSFER_STATUS',	'��Կ�����ǽ');
define('W_ADMIN_ITEM_BUNDLE_STATUS',	'Ʊ���Բĥե饰');
define('W_ADMIN_ITEM_LABEL_FRONT',	'���ʥ�٥������');
define('W_ADMIN_ITEM_LABEL_BACK',	'���ʥ�٥�ʸ��');
define('W_ADMIN_ITEM_POINT',	'�ݥ����');
define('W_ADMIN_ITEM_TEXT1',	'����å����ԡ�');
define('W_ADMIN_ITEM_TEXT2',	'�ܺ٥ڡ�����ɽ�����뾦�ʾ���');
define('W_ADMIN_ITEM_SPEC',	'���ʥ��ڥå�');
define('W_ADMIN_ITEM_IMAGE_FILE',	'���ʲ���');
define('W_ADMIN_ITEM_CONTENTS_BODY',	'���ʥե꡼���ڡ���');
define('W_ADMIN_ITEM_ADD', '�����ɲ�');
define('W_ADMIN_ITEM_PRIORITY_EDIT', '����ͥ���ٹ���');

/* =============================================
// ����å�
 ============================================= */
define('W_ADMIN_SHOP', '����å�');
define('W_ADMIN_SHOP_ID', '����å�ID');
define('W_ADMIN_SHOP_NAME', '����å�̾');
define('W_ADMIN_SHOP_NEWS', '����åץ˥塼��');
define('W_ADMIN_SHOP_BGCOLOR', '����å��طʿ�');
define('W_ADMIN_SHOP_TEXTCOLOR', '����å�ʸ����');
define('W_ADMIN_SHOP_LINKCOLOR', '����åץ�󥯿�');
define('W_ADMIN_SHOP_ALINKCOLOR', '����åץ����ƥ��֥�󥯿�');
define('W_ADMIN_SHOP_VLINKCOLOR', '����å�ˬ��Ѥߥ�󥯿�');
define('W_ADMIN_SHOP_NEW_ARRIVALS', '�������ᾦ��');
define('W_ADMIN_SHOP_RANKING', '�͵���󥭥�');
define('W_ADMIN_SHOP_IMAGE1_FILE', '����åײ���1(TOP��)');
define('W_ADMIN_SHOP_IMAGE2_FILE', '����åײ���2(SHOP��)');
define('W_ADMIN_SHOP_CATEGORY_PRINT_STATUS', '����å�TOP���ƥ������ɽ������');
define('W_ADMIN_SHOP_BODY', '����åץե꡼���ڡ���');
define('W_ADMIN_SHOP_STATUS', '����åץ��ơ�����');
define('W_ADMIN_SHOP_PRIORITY_ID', '����å�ͥ����');
define('W_ADMIN_SHOP_PRIORITY_EDIT', '����å�ͥ�����ѹ�');

/* =============================================
// ���ʥ��ƥ���
 ============================================= */
define('W_ADMIN_ITEM_CATEGORY', '���ʥ��ƥ���');
define('W_ADMIN_ITEM_CATEGORY_ID', '���ʥ��ƥ���ID');
define('W_ADMIN_ITEM_CATEGORY_NAME', '���ʥ��ƥ���̾');
define('W_ADMIN_ITEM_CATEGORY_STATUS', '���ʥ��ƥ��ꥹ�ơ�����');
define('W_ADMIN_ITEM_CATEGORY_TEXT', '���ʥ��ƥ�������ʸ');
define('W_ADMIN_ITEM_CATEGORY_IMAGE1_FILE', '���ʥ��ƥ������');
define('W_ADMIN_ITEM_CATEGORY_CONTENTS_BODY', '���ʥ��ƥ���ե꡼���ڡ���');
define('W_ADMIN_ITEM_CATEGORY_PRIORITY_ID', '���ʥ��ƥ���ͥ����');
define('W_ADMIN_ITEM_CATEGORY_PRIORITY_EDIT', '���ʥ��ƥ���ͥ���ٹ���');

/* =============================================
// ������
 ============================================= */
define('W_ADMIN_SUPPLIER',	'����������');
define('W_ADMIN_SUPPLIER_NAME',	W_ADMIN_SUPPLIER.'̾');
define('W_ADMIN_SUPPLIER_ID',	'������ID');
define('W_ADMIN_SUPPLIER_SHIPPING_TYPE',	'�в٥�����');
define('W_ADMIN_SUPPLIER_STATUS',	'�����襹�ơ�����');
define('W_ADMIN_SUPPLIER_BUNDLE_ALLOW_ID',	'Ʊ����ǽ����');
define('W_ADMIN_SUPPLIER_SETTLEMENT',	'�������');

/* =============================================
// ����
 ============================================= */
define('W_ADMIN_POSTAGE',	'��������');
define('W_ADMIN_POSTAGE_NAME',	W_ADMIN_POSTAGE.'̾');
define('W_ADMIN_POSTAGE_ID',	'����ID');
define('W_ADMIN_POSTAGE_STATUS',	'�������ꥹ�ơ�����');
define('W_ADMIN_POSTAGE_TYPE',	'����������');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_SET',	'��׶��');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_SET_UNDER',	'��׶�ۤ������ʤ���������');
define('W_ADMIN_POSTAGE_TOTAL_PRICE_VALUE',	'����');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_SET',	'��׸Ŀ�');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_SET_UNDER',	'��׸Ŀ��������ʤ���������');
define('W_ADMIN_POSTAGE_TOTAL_PIECE_VALUE',	'����');
define('W_ADMIN_POSTAGE_SAME_STATUS',	'�����Χ����');
define('W_ADMIN_POSTAGE_SAME_PRICE',	'�����Χ����');
define('W_ADMIN_POSTAGE_PREF_1',	'�̳�ƻ');
define('W_ADMIN_POSTAGE_PREF_2',	'�Ŀ���');
define('W_ADMIN_POSTAGE_PREF_3',	'��긩');
define('W_ADMIN_POSTAGE_PREF_4',	'���ĸ�');
define('W_ADMIN_POSTAGE_PREF_5',	'�ܾ븩');
define('W_ADMIN_POSTAGE_PREF_6',	'������');
define('W_ADMIN_POSTAGE_PREF_7',	'ʡ�縩');
define('W_ADMIN_POSTAGE_PREF_8',	'��븩');
define('W_ADMIN_POSTAGE_PREF_9',	'���ڸ�');
define('W_ADMIN_POSTAGE_PREF_10',	'���ϸ�');
define('W_ADMIN_POSTAGE_PREF_11',	'��̸�');
define('W_ADMIN_POSTAGE_PREF_12',	'���ո�');
define('W_ADMIN_POSTAGE_PREF_13',	'�����');
define('W_ADMIN_POSTAGE_PREF_14',	'�����');
define('W_ADMIN_POSTAGE_PREF_15',	'���㸩������');
define('W_ADMIN_POSTAGE_PREF_16',	'���㸩');
define('W_ADMIN_POSTAGE_PREF_17',	'�ٻ���');
define('W_ADMIN_POSTAGE_PREF_18',	'���');
define('W_ADMIN_POSTAGE_PREF_19',	'ʡ�温');
define('W_ADMIN_POSTAGE_PREF_20',	'Ĺ�');
define('W_ADMIN_POSTAGE_PREF_21',	'������');
define('W_ADMIN_POSTAGE_PREF_22',	'�Ų���');
define('W_ADMIN_POSTAGE_PREF_23',	'���θ�');
define('W_ADMIN_POSTAGE_PREF_24',	'���츩');
define('W_ADMIN_POSTAGE_PREF_25',	'���Ÿ�');
define('W_ADMIN_POSTAGE_PREF_26',	'���츩');
define('W_ADMIN_POSTAGE_PREF_27',	'������');
define('W_ADMIN_POSTAGE_PREF_28',	'�����');
define('W_ADMIN_POSTAGE_PREF_29',	'ʼ�˸�');
define('W_ADMIN_POSTAGE_PREF_30',	'���ɸ�');
define('W_ADMIN_POSTAGE_PREF_31',	'�²λ���');
define('W_ADMIN_POSTAGE_PREF_32',	'Ļ�踩');
define('W_ADMIN_POSTAGE_PREF_33',	'�纬��');
define('W_ADMIN_POSTAGE_PREF_34',	'������');
define('W_ADMIN_POSTAGE_PREF_35',	'���縩');
define('W_ADMIN_POSTAGE_PREF_36',	'������');
define('W_ADMIN_POSTAGE_PREF_37',	'���');
define('W_ADMIN_POSTAGE_PREF_38',	'���縩');
define('W_ADMIN_POSTAGE_PREF_39',	'��ɲ��');
define('W_ADMIN_POSTAGE_PREF_40',	'���θ�');
define('W_ADMIN_POSTAGE_PREF_41',	'ʡ����');
define('W_ADMIN_POSTAGE_PREF_42',	'��ʬ��');
define('W_ADMIN_POSTAGE_PREF_43',	'���츩');
define('W_ADMIN_POSTAGE_PREF_44',	'Ĺ�긩');
define('W_ADMIN_POSTAGE_PREF_45',	'�ܺ긩');
define('W_ADMIN_POSTAGE_PREF_46',	'���ܸ�');
define('W_ADMIN_POSTAGE_PREF_47',	'�����縩');
define('W_ADMIN_POSTAGE_PREF_48',	'���츩');
define('W_ADMIN_POSTAGE_PREF_49',	'���츩Υ��');
define('W_ADMIN_POSTAGE_ADD',	'������Ͽ');

/* =============================================
// ����������
 ============================================= */
define('W_ADMIN_EXCHANGE',	'����������');
define('W_ADMIN_EXCHANGE_ID',	'����������ID');
define('W_ADMIN_EXCHANGE_NAME',	'��������������̾');
define('W_ADMIN_EXCHANGE_STATUS',	'�������������ơ�����');
define('W_ADMIN_EXCHANGE_TYPE',	'�������������꥿����');
define('W_ADMIN_EXCHANGE_SAME_STATUS',	'��Χ����');
define('W_ADMIN_EXCHANGE_SAME_PRICE',	'��Χ����');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_SET',	'��׶��');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_SET_UNDER',	'��׶�ۤ������ʤ���������������');
define('W_ADMIN_EXCHANGE_TOTAL_PRICE_VALUE',	'����������');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_SET',	'��׸Ŀ�');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_SET_UNDER',	'��׸Ŀ��������ʤ���������������');
define('W_ADMIN_EXCHANGE_TOTAL_PIECE_VALUE',	'����������');
define('W_ADMIN_EXCHANGE_ADD',	'������������Ͽ');

/* =============================================
// �����������ϰ�
 ============================================= */
define('W_ADMIN_EXCHANGE_RANGE',	'��������������ϰ�');
define('W_ADMIN_EXCHANGE_RANGE_PRICE',	'�ϰ�����������');
define('W_ADMIN_NEW_EXCHANGE_RANGE_PRICE',	'�ɲ��ϰ�����������');
define('W_ADMIN_NEW_EXCHANGE_RANGE_START',	'�ɲ��ϰϳ��϶��');
define('W_ADMIN_NEW_EXCHANGE_RANGE_END',	'�ɲ��ϰϽ�λ���');

/* =============================================
// �߸�
 ============================================= */
define('W_ADMIN_STOCK',	'�߸�');
define('W_ADMIN_STOCK_NUM',	'�߸˿�');
define('W_ADMIN_STOCK_PRIORITY_ID',	'ͥ����');
define('W_ADMIN_STOCK_ONE_TYPE_STATUS',	'ñ�쥿���פξ���');

/* =============================================
// ����ץ����
 ============================================= */
define('W_ADMIN_SAMPLE',	'����ץ����');
define('W_ADMIN_SAMPLE_NAME',	'����ץ���������ȥ�');
define('W_ADMIN_SAMPLE_IMAGE',	'����');
define('W_ADMIN_SAMPLE_PRIORITY_ID',	'����ץ�����ֹ�');


?>