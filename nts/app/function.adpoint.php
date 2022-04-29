<?php
function smarty_function_adpoint($params, &$smarty)
{
	// ���֥������Ȥ����
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	
	/* =============================================
	// ���å���󤫤�桼��������������
	 ============================================= */
	$user = $backend->session->get('user');
	$user_id = $user['user_id'];
	
	/* =============================================
	// �⤷�桼��ID���ʤ����
	 ============================================= */
	if(!$user_id) return '';
	
	$um = $backend->getManager('Util');
	$pm = $backend->getManager('Point');
	
	// ����ID���� [id_��å�����]�����
	//$ids = explode('_',$id[1]);
	$ad_id = $params['id'];
	$message = $params['message'];
	
	// �����ॹ���������
	$timestamp = date('Y-m-d H:i:s');
	
	/* =============================================
	// ����ǡ�������
	 ============================================= */
	$a =& new Tv_Ad($backend, 'ad_id', $ad_id);
	$ad_name = $a->get('ad_name');
	$ad_point = $a->get('ad_point');
	$ad_code_id = $a->get('ad_code_id');
	
	/* =============================================
	// �����ۿ���λ����ǧ
	 ============================================= */
	if( $a->get('ad_stock_status') == 1 ){
		// �ۿ���λ������ã�������
		if( $a->get('ad_stock_num') == 0 ){
			return '';
		}
	}
	
	/* =============================================
	// �����ۿ�����������ǧ
	// �ۿ�������������Ƥ��ʤ����
	 ============================================= */
	if ( $a->get('ad_start_status') == 1 ) {
		if ( $a->get('ad_start_time') >= date('Y-m-d H:i:s') ) {
			return '';
		}
	}
	
	/* =============================================
	// �����ۿ���λ������ǧ
	// �ۿ���λ������Ķ���Ƥ���ξ��
	 ============================================= */
	if ( $a->get('ad_end_status') == 1 ) {
		if ( $a->get('ad_end_time') <= date('Y-m-d H:i:s') ) {
			return '';
		}
	}
	
	/* =============================================
	// �ݥ������Ϳ�����������å�
	 ============================================= */
	if ( $a->get('ad_point_give_day_status') == 1 ) {
		// ���������ˤ����ݥ������Ϳ�������äƤ��뤫��
		// ����޶��ڤ������ˤ��Ƥ�����˺��������뤫
		$g_array = explode(",", $a->get('ad_point_give_day'));
		if(array_search(intval(date('d')), $g_array)!==false){ // ��Ƭ0���ܥ����λ��к�
			// OK�ʤΤǲ��⤷�ʤ�
		}else{
			return '';
		}
	}
	
	/* =============================================
	// ��ʣ�����ǧ
	 ============================================= */
	$ua =& new Tv_UserAd($backend);
	$ua_list =& $ua->searchProp(
		array('user_ad_id','user_ad_created_time'),
		array(
			'user_id'			=> $user_id,
			'ad_id'				=> $ad_id,
			'user_ad_status'	=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
		),
		array('user_ad_created_time' => OBJECT_SORT_DESC)
	);
	
	/* =============================================
	// �ݥ���Ƚ�ʣ��Ϳ�������������å�
	 ============================================= */
	$term_flag = true;
	if ( $a->get('ad_point_give_term_status') == 1 && $ua_list[0]>0) {
		if( $ua_list[1][0]['user_ad_created_time']){
			// �������դ����ʣ���´��֤����������
			$period = mktime (0,0,0, date('m'), date('d') - $a->get('ad_point_give_term'), date('Y')  );
			// �嵭�Ǻ����������դȺǸ�Υݥ�����ɲ�������Ӥ���
			if(date('Y-m-d 23:59:59',$period) < $ua_list[1][0]['user_ad_created_time']) {
				$term_flag = false;
			}
		}
	}
	
	// ��ʣ���ʤ���� or ��ʣ�����äƤ�������ֳ��ξ��
	if($ua_list[0] == 0 || $term_flag){
		/* =============================================
		// �����ۿ���λ�����꤬����Ƥ���С�-1
		 ============================================= */
		$a = new Tv_Ad($backend, 'ad_id', $ad_id);
		if($a->get('ad_stock_status')){
			$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_ad_buy';
		}
		
		/* =============================================
		// ������ɲ�
		 ============================================= */
		$ua->set('user_id', $user_id);
		$ua->set('ad_id', $ad_id);
		$ua->set('user_ad_status', 2); // ��ǧ�Ѥ�
		$ua->set('user_ad_created_time', $timestamp);
		$ua->set('user_ad_updated_time', $timestamp);
		$r = $ua->add();
		// �桼������ID
		$uaid = $ua->getId();
		
		/* =============================================
		// �ݥ�����ɲ÷Ͻ���
		 ============================================= */
		$point_type_search = $backend->config->get('point_type_search');
		$param = array(
			'user_id'	=> $user_id,
			'point'		=> $ad_point,
			'point_type'	=> $point_type_search['site_access'],
			'point_status'	=> 2,// ��ǧ�Ѥ�
			'user_sub_id'	=> $uaid,
			'point_sub_id'	=> $ad_id,
			'point_memo'	=> $ad_name,
		);
		$pm->addPoint($param);
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// ����å������INSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		// �ݥ�����ɲä��ʤ��줿���Τߥ�å���������Ϥ���
		$smarty->assign('message', $message);
		$smarty->display('user/ad-point.tpl');
	}
	
}

?>
