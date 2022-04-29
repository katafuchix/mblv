<?php
$point = array(
	/* =============================================
	// ポイント設定
	============================================= */
	// pointon
	// 本番
	'pon_return_url' => SSL_URL .'?action_user_point_onreturn=true',
	'pon_id_url' => 'https://p-o-n.jp/',
	'pon_point_url' => 'https://p-o-n.jp/scripts/member/p2g/P2GExchangeReal.do',
	'pon_hdl' => 'idregist/agreement',
	'pon_partnerid' => '00000000',
	'pon_siteid' => '00000000',
	'pon_serviceid' => 'R00000000000',
	'pon_mobiletopid' => '000',
	'pon_regist_key' => '00000000000000000000000000',
//	'pon_partnerid' => '10018616',
//	'pon_siteid' => '10018616',
//	'pon_serviceid' => 'R10000000382',
//	'pon_mobiletopid' => '441',
//	'pon_regist_key' => '4e2b3c612429fc51fc3f62c385c1df07',
	
	// テスト
//	'pon_return_url' => SSL_URL . '?action_user_point_onreturn=true',
//	'pon_id_url' => 'https://tpon.p-o-n.jp/p-on/',
//	'pon_point_url' => 'https://tpon.p-o-n.jp/scripts/member/p2g/P2GExchangeReal.do',
//	'pon_hdl' => 'idregist/agreement',
//	'pon_partnerid' => '10003791',
//	'pon_siteid' => '10003791',
//	'pon_mobiletopid' => '310',
//	'pon_serviceid' => 'R10000000200',
//	'pon_regist_key' => 'c32d33bd8f7cb4fd1ad1f3a5a6ed3db4',
	
	'point_exchange' => array(
		1 => array('name' => 'イーバンク銀行',		'point_rate' => 105),
		2 => array('name' => 'Edy',					'point_rate' => 52),
		3 => array('name' => 'ポイントオン',		'point_rate' => 0),
	),
	'begin_point' => 1000,
	'per_point' => 10,
	'point_yen' => 1,// ポイントから円に変換する倍数
	'ebank_branch' => array(
		201 => array('name' => 'ジャズ'),
		202 => array('name' => 'ロック'),
		203 => array('name' => 'サンバ'),
		204 => array('name' => 'ワルツ'),
		205 => array('name' => 'オペラ'),
		206 => array('name' => 'タンゴ'),
		207 => array('name' => 'サルサ'),
		208 => array('name' => 'ダンス'),
		209 => array('name' => 'リズム'),
		210 => array('name' => 'ビート'),
		211 => array('name' => 'マーチ'),
		101 => array('name' => 'ホンテン'),
		// 被振込専用支店
		701 => array('name' => '法人第一'),
		702 => array('name' => '法人第二'),
		703 => array('name' => '法人第三'),
		704 => array('name' => '法人第四'),
		705 => array('name' => '法人第五'),
		706 => array('name' => '法人第六'),
		750 => array('name' => 'ネットカード'),
	),
	
	// ポイント<=>円の換金レート
	'point_price_rates' => 1,
	
	// pointタイプ
	'point_type' => array(
		1 => array('name' => 'SNS管理調整'),
		2 => array('name' => 'クリック広告'),// ad.ad_type=1
		3 => array('name' => '登録広告'),// ad.ad_type=2
		4 => array('name' => '料率広告'),// ad.ad_type=3
		5 => array('name' => 'アバター'),
		6 => array('name' => 'デコメール'),
		7 => array('name' => 'ゲーム'),
		8 => array('name' => 'サウンド'),
		9 => array('name' => '入会経路'),
		10 => array('name' => 'SNS会員登録'),
		11 => array('name' => 'SNS友達招待(招待)'),
		12 => array('name' => 'SNS友達招待(被招待)'),
		// EC
		101 => array('name' => 'EC管理調整'),
		102 => array('name' => 'EC会員登録'),
		103 => array('name' => 'EC購買'),
		// ポイント換金
		201 => array('name' => 'イーバンク'),
		202 => array('name' => 'Edy'),
		203 => array('name' => 'ポイントオン'),
	),
	
	//ポイント名
	'point_name' => W_USER_POINT,
	
	//ポイント単位
	'point_unit' => W_USER_POINT_UNIT,
);
?>