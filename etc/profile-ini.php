<?php
$profile = array(
	/* =============================================
	// �桼���ץ�ե���������
	============================================= */
	// ǯ������
	//'user_age_min' => 20,
	'user_age_min' => 0,// ǯ�����¤ʤ�
	
	// ����/�����
	'public' => array(
		true	=> array('name' => '����'),
		false	=> array('name' => '�����'),
	),
	
	// [�ޥ���]�桼���ץ�ե������������
	// �������̤Ǥθ����ʤɤΥޥ������Ȥʤ�
	'profile' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> true,// ������
		// ����
		'user_sex'						=> true,// ��
//		'user_sex'						=> false,// ��
		// ������
		'user_birth_date'				=> true,// ��
//		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,// ��
//		'prefecture_id'					=> false,// ��
		// �ϰ�ʽ����
		'user_address'					=> true,// ��
//		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
		'user_address_building'			=> true,// ��
//		'user_address_building'			=> false,// ��
		// ��շ�
		'user_blood_type'				=> true,// ��
//		'user_blood_type'				=> false,// ��
		// ����
		'job_family_id'					=> true,// ��
//		'job_family_id'					=> false,// ��
		// �ȼ�
		'business_category_id'			=> true,// ��
//		'business_category_id'			=> false,// ��
		// �뺧
		'user_is_married'				=> true,// ��
//		'user_is_married'				=> false,// ��
		// �Ҷ�
		'user_has_children'				=> true,// ��
//		'user_has_children'				=> false,// ��
		// ��̳��
		'work_location_prefecture_id'	=> true,// ��
//		'work_location_prefecture_id'	=> false,// ��
		// ��̣
		'user_hobby'					=> true,// ��
//		'user_hobby'					=> false,// ��
		// URL
		'user_url'						=> true,// ��
//		'user_url'						=> false,// ��
		// ���ʾҲ�
		'user_introduction'				=> true,// ��
//		'user_introduction'				=> false,// ��
	),
	// [�ޥ���]�桼���ץ�ե������׵����
	'profile_required' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> true,// ������
		// ����
//		'user_sex'						=> true,// ��
		'user_sex'						=> false,// ��
		// ������
//		'user_birth_date'				=> true,// ��
		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
//		'prefecture_id'					=> true,// ��
		'prefecture_id'					=> false,// ��
		// �ϰ�ʽ����
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
//		'user_address_building'			=> true,// ��
		'user_address_building'			=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> false,// ��
	),
	// [�ޥ���]�桼���ץ�ե������������
	// ��������������å��ܥå�����ɽ������Ƥ��ʤ���硢���Υޥ����������꤬ͭ���Ȥʤ�
	'profile_public' => array(
		// �˥å��͡���
//		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> false,// �߸���
		// ����
		'user_sex'						=> true,// ��
//		'user_sex'						=> false,// ��
		// ������
//		'user_birth_date'				=> true,// ��
		'user_birth_date'				=> false,// ��
		// �ϰ�
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> false,// ��
	),
	// [��Ͽ��]�桼���ץ�ե������������
	// �����Ͽ����ɽ���������ϥե�����
	'profile_regist' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> true,// ������
		// ����
		'user_sex'						=> true,// ��
//		'user_sex'						=> false,// ��
		// ������
		'user_birth_date'				=> true,// ��
//		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,// ��
//		'prefecture_id'					=> false,// ��
		// �ϰ�ʽ����
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
//		'user_address_building'			=> true,// ��
		'user_address_building'			=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> false,// ��
	),
	// [��Ͽ��]�桼���ץ�ե������������
	// �����Ͽ��������ɬ�ܤȤ���ե�����
	'profile_regist_required' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> true,// ������
		// ����
		'user_sex'						=> true,// ������
//		'user_sex'						=> false,// ��
		// ������
//		'user_birth_date'				=> true,// ��
		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,// ��
//		'prefecture_id'					=> true,// ��
		// �ϰ�ʽ����
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
//		'user_address_building'			=> true,// ��
		'user_address_building'			=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> false,// ��
	),
	// [��Ͽ��]�桼���ץ�ե������������
	// �����Ͽ����ɽ����������ɽ�������å��ܥå���
	'profile_regist_public' => array(
		// �˥å��͡���
//		'user_nickname'					=> true,// ������
		// �ѥ����
		'user_password'					=> false,// �߸���
		// ����
//		'user_sex'						=> true,// ��
		'user_sex'						=> false,// ��
		// ������
//		'user_birth_date'				=> true,// ��
		'user_birth_date'				=> false,// ��
		// �ϰ�
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> true,// ��
	),
	// [�Խ���]�桼���ץ�ե������������
	// �ץ�ե������Խ�����ɽ�����������ϥե�����
	'profile_edit' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ��
		// �ѥ����
		'user_password'					=> false,// �߸���
		// ����
		'user_sex'						=> false,// �߸���
		// ������
		'user_birth_date'				=> true,// ��
//		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,// ��
//		'prefecture_id'					=> false,// ��
		// �ϰ�ʽ����
		'user_address'					=> true,// ��
//		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
		'user_address_building'			=> true,// ��
//		'user_address_building'			=> false,// ��
		// ��շ�
		'user_blood_type'				=> true,// ��
//		'user_blood_type'				=> false,// ��
		// ����
		'job_family_id'					=> true,// ��
//		'job_family_id'					=> false,// ��
		// �ȼ�
		'business_category_id'			=> true,// ��
//		'business_category_id'			=> false,// ��
		// �뺧
		'user_is_married'				=> true,// ��
//		'user_is_married'				=> false,// ��
		// �Ҷ�
		'user_has_children'				=> true,// ��
//		'user_has_children'				=> false,// ��
		// ��̳��
		'work_location_prefecture_id'	=> true,// ��
//		'work_location_prefecture_id'	=> false,// ��
		// ��̣
		'user_hobby'					=> true,// ��
//		'user_hobby'					=> false,// ��
		// URL
		'user_url'						=> true,// ��
//		'user_url'						=> false,// ��
		// ���ʾҲ�
		'user_introduction'				=> true,// ��
//		'user_introduction'				=> false,// ��
	),
	// [�Խ���]�桼���ץ�ե������׵����
	// �ץ�ե������Խ���������ɬ�ܤȤ���ե�����
	'profile_edit_required' => array(
		// �˥å��͡���
		'user_nickname'					=> true,// ��
		// �ѥ����
		'user_password'					=> false,// �߸���
		// ����
		'user_sex'						=> false,// �߸���
		// ������
		'user_birth_date'				=> true,// ��
//		'user_birth_date'				=> false,// ��
		// �ϰ����ƻ�ܸ���
		'prefecture_id'					=> true,// ��
//		'prefecture_id'					=> false,// ��
		// �ϰ�ʽ����
//		'user_address'					=> true,// ��
		'user_address'					=> false,// ��
		// �ϰ�ʷ�ʪ̾��
//		'user_address_building'			=> true,// ��
		'user_address_building'			=> false,// ��
		// ��շ�
//		'user_blood_type'				=> true,// ��
		'user_blood_type'				=> false,// ��
		// ����
//		'job_family_id'					=> true,// ��
		'job_family_id'					=> false,// ��
		// �ȼ�
//		'business_category_id'			=> true,// ��
		'business_category_id'			=> false,// ��
		// �뺧
//		'user_is_married'				=> true,// ��
		'user_is_married'				=> false,// ��
		// �Ҷ�
//		'user_has_children'				=> true,// ��
		'user_has_children'				=> false,// ��
		// ��̳��
//		'work_location_prefecture_id'	=> true,// ��
		'work_location_prefecture_id'	=> false,// ��
		// ��̣
//		'user_hobby'					=> true,// ��
		'user_hobby'					=> false,// ��
		// URL
//		'user_url'						=> true,// ��
		'user_url'						=> false,// ��
		// ���ʾҲ�
//		'user_introduction'				=> true,// ��
		'user_introduction'				=> false,// ��
	),
	// [�Խ�]�桼���ץ�ե������������
	// �ץ�ե������Խ�����ɽ����������ɽ�������å��ܥå���
	'profile_edit_public' => array(
		// �˥å��͡���
//		'user_nickname'					=> false,// �߸���
		// �ѥ����
		'user_password'					=> false,// �߸���
		// ����
		'user_sex'						=> true,// ������
		// ������
		'user_birth_date'				=> true,// ��
//		'user_birth_date'				=> false,// ��
		// �ϰ�
		'user_address'					=> true,// ��
//		'user_address'					=> false,// ��
		// ��շ�
		'user_blood_type'				=> true,// ��
//		'user_blood_type'				=> false,// ��
		// ����
		'job_family_id'					=> true,// ��
//		'job_family_id'					=> false,// ��
		// �ȼ�
		'business_category_id'			=> true,// ��
//		'business_category_id'			=> false,// ��
		// �뺧
		'user_is_married'				=> true,// ��
//		'user_is_married'				=> false,// ��
		// �Ҷ�
		'user_has_children'				=> true,// ��
//		'user_has_children'				=> false,// ��
		// ��̳��
		'work_location_prefecture_id'	=> true,// ��
//		'work_location_prefecture_id'	=> false,// ��
		// ��̣
		'user_hobby'					=> true,// ��
//		'user_hobby'					=> false,// ��
		// URL
		'user_url'						=> true,// ��
//		'user_url'						=> false,// ��
		// ���ʾҲ�
		'user_introduction'				=> true,// ��
//		'user_introduction'				=> false,// ��
	),
);
?>