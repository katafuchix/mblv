<?php
$profile = array(
	/* =============================================
	// ユーザプロフィール設定
	============================================= */
	// 年齢制限
	//'user_age_min' => 20,
	'user_age_min' => 0,// 年齢制限なし
	
	// 公開/非公開
	'public' => array(
		true	=> array('name' => '公開'),
		false	=> array('name' => '非公開'),
	),
	
	// [マスタ]ユーザプロフィール設定項目
	// 管理画面での検索などのマスターとなる
	'profile' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> true,// ●固定
		// 性別
		'user_sex'						=> true,// ●
//		'user_sex'						=> false,// ×
		// 誕生日
		'user_birth_date'				=> true,// ●
//		'user_birth_date'				=> false,// ×
		// 地域（都道府県）
		'prefecture_id'					=> true,// ●
//		'prefecture_id'					=> false,// ×
		// 地域（住所）
		'user_address'					=> true,// ●
//		'user_address'					=> false,// ×
		// 地域（建物名）
		'user_address_building'			=> true,// ●
//		'user_address_building'			=> false,// ×
		// 血液型
		'user_blood_type'				=> true,// ●
//		'user_blood_type'				=> false,// ×
		// 職種
		'job_family_id'					=> true,// ●
//		'job_family_id'					=> false,// ×
		// 業種
		'business_category_id'			=> true,// ●
//		'business_category_id'			=> false,// ×
		// 結婚
		'user_is_married'				=> true,// ●
//		'user_is_married'				=> false,// ×
		// 子供
		'user_has_children'				=> true,// ●
//		'user_has_children'				=> false,// ×
		// 勤務地
		'work_location_prefecture_id'	=> true,// ●
//		'work_location_prefecture_id'	=> false,// ×
		// 趣味
		'user_hobby'					=> true,// ●
//		'user_hobby'					=> false,// ×
		// URL
		'user_url'						=> true,// ●
//		'user_url'						=> false,// ×
		// 自己紹介
		'user_introduction'				=> true,// ●
//		'user_introduction'				=> false,// ×
	),
	// [マスタ]ユーザプロフィール要求項目
	'profile_required' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> true,// ●固定
		// 性別
//		'user_sex'						=> true,// ●
		'user_sex'						=> false,// ×
		// 誕生日
//		'user_birth_date'				=> true,// ●
		'user_birth_date'				=> false,// ×
		// 地域（都道府県）
//		'prefecture_id'					=> true,// ●
		'prefecture_id'					=> false,// ×
		// 地域（住所）
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 地域（建物名）
//		'user_address_building'			=> true,// ●
		'user_address_building'			=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> false,// ×
	),
	// [マスタ]ユーザプロフィール公開項目
	// 元々非公開チェックボックスが表示されていない場合、このマスターの設定が有効となる
	'profile_public' => array(
		// ニックネーム
//		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> false,// ×固定
		// 性別
		'user_sex'						=> true,// ●
//		'user_sex'						=> false,// ×
		// 誕生日
//		'user_birth_date'				=> true,// ●
		'user_birth_date'				=> false,// ×
		// 地域
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> false,// ×
	),
	// [登録用]ユーザプロフィール設定項目
	// 会員登録時に表示する入力フォーム
	'profile_regist' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> true,// ●固定
		// 性別
		'user_sex'						=> true,// ●
//		'user_sex'						=> false,// ●
		// 誕生日
		'user_birth_date'				=> true,// ●
//		'user_birth_date'				=> false,// ●
		// 地域（都道府県）
		'prefecture_id'					=> true,// ●
//		'prefecture_id'					=> false,// ●
		// 地域（住所）
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 地域（建物名）
//		'user_address_building'			=> true,// ●
		'user_address_building'			=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> false,// ×
	),
	// [登録用]ユーザプロフィール設定項目
	// 会員登録時に入力必須とするフォーム
	'profile_regist_required' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> true,// ●固定
		// 性別
		'user_sex'						=> true,// ●固定
//		'user_sex'						=> false,// ×
		// 誕生日
//		'user_birth_date'				=> true,// ●
		'user_birth_date'				=> false,// ×
		// 地域（都道府県）
		'prefecture_id'					=> true,// ●
//		'prefecture_id'					=> true,// ×
		// 地域（住所）
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 地域（建物名）
//		'user_address_building'			=> true,// ●
		'user_address_building'			=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> false,// ×
	),
	// [登録用]ユーザプロフィール公開項目
	// 会員登録時に表示させる非表示チェックボックス
	'profile_regist_public' => array(
		// ニックネーム
//		'user_nickname'					=> true,// ●固定
		// パスワード
		'user_password'					=> false,// ×固定
		// 性別
//		'user_sex'						=> true,// ●
		'user_sex'						=> false,// ×
		// 誕生日
//		'user_birth_date'				=> true,// ●
		'user_birth_date'				=> false,// ×
		// 地域
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> true,// ×
	),
	// [編集用]ユーザプロフィール設定項目
	// プロフィール編集時に表示させる入力フォーム
	'profile_edit' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●
		// パスワード
		'user_password'					=> false,// ×固定
		// 性別
		'user_sex'						=> false,// ×固定
		// 誕生日
		'user_birth_date'				=> true,// ●
//		'user_birth_date'				=> false,// ×
		// 地域（都道府県）
		'prefecture_id'					=> true,// ●
//		'prefecture_id'					=> false,// ×
		// 地域（住所）
		'user_address'					=> true,// ●
//		'user_address'					=> false,// ×
		// 地域（建物名）
		'user_address_building'			=> true,// ●
//		'user_address_building'			=> false,// ×
		// 血液型
		'user_blood_type'				=> true,// ●
//		'user_blood_type'				=> false,// ×
		// 職種
		'job_family_id'					=> true,// ●
//		'job_family_id'					=> false,// ×
		// 業種
		'business_category_id'			=> true,// ●
//		'business_category_id'			=> false,// ×
		// 結婚
		'user_is_married'				=> true,// ●
//		'user_is_married'				=> false,// ×
		// 子供
		'user_has_children'				=> true,// ●
//		'user_has_children'				=> false,// ×
		// 勤務地
		'work_location_prefecture_id'	=> true,// ●
//		'work_location_prefecture_id'	=> false,// ×
		// 趣味
		'user_hobby'					=> true,// ●
//		'user_hobby'					=> false,// ×
		// URL
		'user_url'						=> true,// ●
//		'user_url'						=> false,// ×
		// 自己紹介
		'user_introduction'				=> true,// ●
//		'user_introduction'				=> false,// ×
	),
	// [編集用]ユーザプロフィール要求項目
	// プロフィール編集時に入力必須とするフォーム
	'profile_edit_required' => array(
		// ニックネーム
		'user_nickname'					=> true,// ●
		// パスワード
		'user_password'					=> false,// ×固定
		// 性別
		'user_sex'						=> false,// ×固定
		// 誕生日
		'user_birth_date'				=> true,// ●
//		'user_birth_date'				=> false,// ×
		// 地域（都道府県）
		'prefecture_id'					=> true,// ●
//		'prefecture_id'					=> false,// ×
		// 地域（住所）
//		'user_address'					=> true,// ●
		'user_address'					=> false,// ×
		// 地域（建物名）
//		'user_address_building'			=> true,// ●
		'user_address_building'			=> false,// ×
		// 血液型
//		'user_blood_type'				=> true,// ●
		'user_blood_type'				=> false,// ×
		// 職種
//		'job_family_id'					=> true,// ●
		'job_family_id'					=> false,// ×
		// 業種
//		'business_category_id'			=> true,// ●
		'business_category_id'			=> false,// ×
		// 結婚
//		'user_is_married'				=> true,// ●
		'user_is_married'				=> false,// ×
		// 子供
//		'user_has_children'				=> true,// ●
		'user_has_children'				=> false,// ×
		// 勤務地
//		'work_location_prefecture_id'	=> true,// ●
		'work_location_prefecture_id'	=> false,// ×
		// 趣味
//		'user_hobby'					=> true,// ●
		'user_hobby'					=> false,// ×
		// URL
//		'user_url'						=> true,// ●
		'user_url'						=> false,// ×
		// 自己紹介
//		'user_introduction'				=> true,// ●
		'user_introduction'				=> false,// ×
	),
	// [編集]ユーザプロフィール公開項目
	// プロフィール編集時に表示させる非表示チェックボックス
	'profile_edit_public' => array(
		// ニックネーム
//		'user_nickname'					=> false,// ×固定
		// パスワード
		'user_password'					=> false,// ×固定
		// 性別
		'user_sex'						=> true,// ●固定
		// 誕生日
		'user_birth_date'				=> true,// ●
//		'user_birth_date'				=> false,// ×
		// 地域
		'user_address'					=> true,// ●
//		'user_address'					=> false,// ×
		// 血液型
		'user_blood_type'				=> true,// ●
//		'user_blood_type'				=> false,// ×
		// 職種
		'job_family_id'					=> true,// ●
//		'job_family_id'					=> false,// ×
		// 業種
		'business_category_id'			=> true,// ●
//		'business_category_id'			=> false,// ×
		// 結婚
		'user_is_married'				=> true,// ●
//		'user_is_married'				=> false,// ×
		// 子供
		'user_has_children'				=> true,// ●
//		'user_has_children'				=> false,// ×
		// 勤務地
		'work_location_prefecture_id'	=> true,// ●
//		'work_location_prefecture_id'	=> false,// ×
		// 趣味
		'user_hobby'					=> true,// ●
//		'user_hobby'					=> false,// ×
		// URL
		'user_url'						=> true,// ●
//		'user_url'						=> false,// ×
		// 自己紹介
		'user_introduction'				=> true,// ●
//		'user_introduction'				=> false,// ×
	),
);
?>