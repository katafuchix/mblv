<?php
$point = array(
	/* =============================================
	// �ݥ��������
	============================================= */
	// pointon
	// ����
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
	
	// �ƥ���
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
		1 => array('name' => '�����Х󥯶��',		'point_rate' => 105),
		2 => array('name' => 'Edy',					'point_rate' => 52),
		3 => array('name' => '�ݥ���ȥ���',		'point_rate' => 0),
	),
	'begin_point' => 1000,
	'per_point' => 10,
	'point_yen' => 1,// �ݥ���Ȥ���ߤ��Ѵ������ܿ�
	'ebank_branch' => array(
		201 => array('name' => '���㥺'),
		202 => array('name' => '��å�'),
		203 => array('name' => '�����'),
		204 => array('name' => '����'),
		205 => array('name' => '���ڥ�'),
		206 => array('name' => '����'),
		207 => array('name' => '���륵'),
		208 => array('name' => '����'),
		209 => array('name' => '�ꥺ��'),
		210 => array('name' => '�ӡ���'),
		211 => array('name' => '�ޡ���'),
		101 => array('name' => '�ۥ�ƥ�'),
		// �￶�����ѻ�Ź
		701 => array('name' => 'ˡ�����'),
		702 => array('name' => 'ˡ������'),
		703 => array('name' => 'ˡ���軰'),
		704 => array('name' => 'ˡ�����'),
		705 => array('name' => 'ˡ�����'),
		706 => array('name' => 'ˡ����ϻ'),
		750 => array('name' => '�ͥåȥ�����'),
	),
	
	// �ݥ����<=>�ߤδ���졼��
	'point_price_rates' => 1,
	
	// point������
	'point_type' => array(
		1 => array('name' => 'SNS����Ĵ��'),
		2 => array('name' => '����å�����'),// ad.ad_type=1
		3 => array('name' => '��Ͽ����'),// ad.ad_type=2
		4 => array('name' => '��Ψ����'),// ad.ad_type=3
		5 => array('name' => '���Х���'),
		6 => array('name' => '�ǥ��᡼��'),
		7 => array('name' => '������'),
		8 => array('name' => '�������'),
		9 => array('name' => '�����ϩ'),
		10 => array('name' => 'SNS�����Ͽ'),
		11 => array('name' => 'SNSͧã����(����)'),
		12 => array('name' => 'SNSͧã����(�ﾷ��)'),
		// EC
		101 => array('name' => 'EC����Ĵ��'),
		102 => array('name' => 'EC�����Ͽ'),
		103 => array('name' => 'EC����'),
		// �ݥ���ȴ���
		201 => array('name' => '�����Х�'),
		202 => array('name' => 'Edy'),
		203 => array('name' => '�ݥ���ȥ���'),
	),
	
	//�ݥ����̾
	'point_name' => W_USER_POINT,
	
	//�ݥ����ñ��
	'point_unit' => W_USER_POINT_UNIT,
);
?>