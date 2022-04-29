<?php
function smarty_function_napaboard($params, &$smarty)
{
	// ���֥������Ȥ����
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	$um = $backend->getManager('Util');
	
	$tm = $backend->getManager('Thema');
	
	$user_id = $params['user_id'];
	$num = $params['num'];
	if(!$num) $num = 1;
	
	$smarty->assign('thema_title', $tm->getThemaTitle());
	
	// Twitter�����ΰ��������
	$bl_id_array = array();
	if($user_id){
		// �֥�å��ꥹ�Ȥ��θ
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ���Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'bl.black_list_deny_user_id = ? AND u.user_id = bl.black_list_user_id AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user_id),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ����Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_deny_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'u.user_id = bl.black_list_deny_user_id AND bl.black_list_user_id = ? AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user_id),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
	}
	
	$whereStr = ' u.user_id = b.user_id ';
	if(count($bl_id_array)){
		$whereStr .= ' AND u.user_id not in ('.implode(',',$bl_id_array).')';
	}
	$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 ';
	//$whereStr .= ' AND b.thema_id = '. $thema_id .' AND twitter_status = 1';
	$whereStr .= ' AND twitter_status = 1';
	
	$param = array(
			'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_body, b.blog_article_comment_num, b.blog_article_comment_time, u.user_id, u.user_nickname ',
			'sql_from'		=> 'user u, blog_article b ',
			'sql_where'		=> $whereStr,
			'sql_values'	=> array(),
			'sql_order'		=> 'b.blog_article_comment_time DESC',
			'sql_num'		=> $num,
	);
	
	$napaboard_list = $um->dataQuery($param); 
	
	$smarty->assign('napaboard_list', $napaboard_list);
	$smarty->assign('latest_date', $napaboard_list[0]['blog_article_comment_time']);
	$smarty->display('user/napaboard-gate.tpl');
	
	//print_r($napaboard_list);
	
	
/*
	// ���֥������Ȥ����
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	
	// ����ID�δ�����������
	$b = array();
	if($params['id']) $b = split(',',$params['id']);
	
	// ����ꥢ���Ȥ����ꤹ�빭������
	switch($GLOBALS['EMOJIOBJ']->carrier)
	{
		case 'DOCOMO':
			if($params['d']){
				$c = split(',',$params['d']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		case 'AU':
			if($params['a']){
				$c = split(',',$params['a']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		case 'SOFTBANK':
			if($params['s']){
				$c = split(',',$params['s']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		default:
			break;
	}
	
	// ���־�ꤴ�Ȥ�ɽ�����빭����������
	if($params['type']){
		$am = new Tv_AdMenu($backend, 'ad_menu_id', 1);
		$d = $am->get($params['type']);
		$c = split(',',$d);
		if(is_array($c)) $b = array_merge($b,$c);
	}
	
	// ����ɽ�����빭����������
	srand((float) microtime() * 10000000);
	$rand_key = array_rand($b);
	$ad_id = $b[$rand_key];
	
	$a = new Tv_Ad($backend, 'ad_id', $ad_id);
	if($a->isValid()){
		// ����ǡ������ɤ߹���
		$smarty->assign('ad', $a->getNameObject());
		$smarty->display('user/napaboard-gate.tpl');
		
		
		$sm = $backend->getManager('Stats');
		// ���������INSERT
		$sm->addStats('ad', $ad_id, 0, 1);
	}
*/

}

?>
