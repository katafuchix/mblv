<?php
function smarty_function_banner($params, &$smarty)
{
	//sessionをsmartyから取得
	//$url_add_sess_id = $smarty->_tpl_vars[session][user][user_sessid];
	$url_add_sess_id = $smarty->_tpl_vars['SESSID'];
	
	//$params['dsn']をパースしてDB接続情報を取得します start
	$dsn = $params['dsn'];
	// Find dbtype
	if (($pos = strpos($dsn, '://')) !== false) {
		$str = substr($dsn, 0, $pos);
		$dsn = substr($dsn, $pos + 3);
	} else {
		$str = $dsn;
		$dsn = null;
	}
				
	// Get username and password
	if (($at = strrpos($dsn,'@')) !== false) {
		$str = substr($dsn, 0, $at);
		$dsn = substr($dsn, $at + 1);
		if (($pos = strpos($str, ':')) !== false) {
			$parsed['username'] = rawurldecode(substr($str, 0, $pos));
			$parsed['password'] = rawurldecode(substr($str, $pos + 1));
		} else {
			$parsed['username'] = rawurldecode($str);
		}
	}
	
	// Get host name
	if ($dsn) {
		if (($pos = strpos($dsn, '?')) === false) {
			// /database
			$parsed['host'] = rawurldecode($dsn);
		} else {
			// /database?param1=value1&param2=value2
			$parsed['host'] = rawurldecode(substr($dsn, 0, $pos));
			$dsn = substr($dsn, $pos + 1);
			if (strpos($dsn, '&') !== false) {
				$opts = explode('&', $dsn);
			} else { // database?param1=value1
				$opts = array($dsn);
			}
			foreach ($opts as $opt) {
				list($key, $value) = explode('=', $opt);
				if (!isset($parsed[$key])) {
					// don't allow params overwrite
					$parsed[$key] = rawurldecode($value);
				}
			}
		}
	}
	
	// GET parse host name ,database name
	if (strpos($parsed['host'], '/') !== false) {
			list($parsed['host'],$parsed['database']) = explode('/', $parsed['host'], 2);
		} else {
		}
	//$params['config']['dsn']をパースしてDB接続情報を取得します end
	
	
	// get career
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$b = array();
	if($params['all']) $b = split(',',$params['all']);

	// DoCoMo
	if (strstr($ua, 'DoCoMo')) {
		if($params['i']){
			$i = split(',',$params['i']);
			if(is_array($i))$b = array_merge($b,$i);
		}
	}
	// au
	elseif (strstr($ua, 'KDDI') || strstr($ua, 'UP.Browser')) {
		if($params['e']){
			$e = split(',',$params['e']);
			if(is_array($e))$b = array_merge($b,$e);
		}
	}
	if($params['id']){
		$id = split(',',$params['id']);
		if(is_array($id))$b = array_merge($b,$id);
	}

	// get banner_id
	srand((float) microtime() * 10000000);
	$rand_key = array_rand($b);
	$banner_id = $b[$rand_key];

	// display href
	$conn = mysql_connect($parsed['host'],$parsed['username'],$parsed['password']);
	mysql_select_db($parsed['database']);
	
	$sql = "SELECT * FROM banner WHERE banner_id = '$banner_id'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num){
		$info = mysql_fetch_array($result);
		if($info['banner_type'] == 'txt'){
			$banner_body = $info['banner_body'];
			print("<a href=\"?action_user_banner_redirect=true&banner_id=$banner_id&SESSID=$url_add_sess_id\">$banner_body</a>\n");
		}else{
			$banner_image = $info['banner_image'];
			print("<a href=\"?action_user_banner_redirect=true&banner_id=$banner_id&SESSID=$url_add_sess_id\"><img src=\"?action_user_file_get=true&file=banner/$banner_image&SESSID=$url_add_sess_id\" border=0></a>\n");
		}
		/* =============================================
		// バナー統計解析処理
		 ============================================= */
//		$sm = $this->backend->getManager('Stats');
//		// 閲覧履歴をINSERT
//		$sm->addStats('banner', $banner_id, 0, 1);
	}
}

?>
