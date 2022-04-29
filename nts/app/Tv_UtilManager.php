<?php
require_once 'Net/IPv4.php';

class Tv_UtilManager extends Ethna_AppManager
{
	/**
	 * ���ץ��������
	 */
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
			// ǯ
			case 'year': 
				for($i = 2007;$i <= date('Y')+1;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// ��
			case 'month': 
				for($i = 1;$i <= 12;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// ��
			case 'day': 
				for($i = 1;$i <= 31;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// ��
			case 'hour': 
				for($i = 0;$i <= 23;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 10ʬ�ֳ�
			case '10min': 
				for($i = 0;$i <= 50;$i=$i+10){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// ����
			case 'sex_type':
				$data = array(
					'0' => array('name' => '�˽�'),
					'1' => array('name' => '�ˤΤ�'),
					'2' => array('name' => '���Τ�'),
				);
				return $data;
				break;
			// ���ߥ�˥ƥ����ƥ���
			case 'community_category':
				$cca = new Tv_CommunityCategory($this->backend);
				$result = $cca->searchProp(
					array('community_category_id', 'community_category_name'),
					array('community_category_status' => 1),
					array('community_category_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['community_category_id']] = array(
						'name' => $item['community_category_name'],
					);
				}
				$data = $data;
				break;
			// ���Х������ƥ���
			case 'avatar_category':
				$a = new Tv_AvatarCategory($this->backend);
				$result = $a->searchProp(
					array('avatar_category_id', 'avatar_category_name'),
					array('avatar_category_status' => 1),
					array('avatar_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['avatar_category_id']] = array(
						'name' => $item['avatar_category_name'],
					);
				}
				break;
			// ���Х������
			case 'avatar_stand':
				$a = new Tv_AvatarStand($this->backend);
				$result = $a->searchProp(
					array('avatar_stand_id', 'avatar_stand_name'),
					array('avatar_stand_status' => 1),
					array('avatar_stand_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['avatar_stand_id']] = array(
						'name' => $item['avatar_stand_name'],
					);
				}
				return $data;
				break;
			// �ǥ��᡼�륫�ƥ���
			case 'decomail_category':
				$a = new Tv_DecomailCategory($this->backend);
				$result = $a->searchProp(
					array('decomail_category_id', 'decomail_category_name'),
					array('decomail_category_status' => 1),
					array('decomail_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['decomail_category_id']] = array(
						'name' => $item['decomail_category_name'],
					);
				}
				$data = $data;
				break;
			// �����५�ƥ���
			case 'game_category':
				$a = new Tv_GameCategory($this->backend);
				$result = $a->searchProp(
					array('game_category_id', 'game_category_name'),
					array('game_category_status' => 1),
					array('game_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['game_category_id']] = array(
						'name' => $item['game_category_name'],
					);
				}
				break;
			// ������ɥ��ƥ���
			case 'sound_category':
				$a = new Tv_SoundCategory($this->backend);
				$result = $a->searchProp(
					array('sound_category_id', 'sound_category_name','sound_category_file1','sound_category_color'),
					array('sound_category_status' => 1),
					array('sound_category_priority_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['sound_category_id']] = array(
						'name' => $item['sound_category_name'],
						'sound_category_file1' => $item['sound_category_file1'],
						'sound_category_color' => $item['sound_category_color'],
						'sound_category_id' => $item['sound_category_id'],
					);
				}
				break;
			// ���𥫥ƥ���
			case 'ad_category':
				$ac =& new Tv_AdCategory($this->backend);
				$result = $ac->searchProp(
					array('ad_category_id', 'ad_category_name'),
					array('ad_category_status' => 1),
					array('ad_category_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['ad_category_id']] = array(
						'name' => $item['ad_category_name'],
					);
				}
				break;
			// ���𥳡���
			case 'ad_code':
				$o =& new Tv_AdCode($this->backend);
				$result = $o->searchProp(
					array('ad_code_id', 'ad_code_name'),
					array('ad_code_status' => 1),
					array('ad_code_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['ad_code_id']] = array(
						'name' => $item['ad_code_name'],
					);
				}
				break;
			// ��������
			case 'segment':
				$o =& new Tv_Segment($this->backend);
				$result = $o->searchProp(
					array('segment_id', 'segment_name'),
					array('segment_status' => 1),
					array('segment_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['segment_id']] = array(
						'name' => $item['segment_name'],
					);
				}
				break;
			// ��ǥ���
			case 'media':
				$o =& new Tv_Media($this->backend);
				$result = $o->searchProp(
					array('media_id', 'media_name'),
					null,//array('media_status' => 1),
					array('media_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['media_id']] = array(
						'name' => $item['media_name'],
					);
				}
				break;
			// twitter���ƥ���
			case 'twitter_thema_category':
				$c =& new Tv_TwitterThemaCategory($this->backend);
				$result = $c->searchProp(
					array('twitter_thema_category_id', 'twitter_thema_category_name'),
					array('twitter_thema_category_status' => 1),
					array('twitter_thema_category_priority_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['twitter_thema_category_id']] = array(
						'name' => $item['twitter_thema_category_name'],
					);
				}
				break;
			// �ǥե����
			default:
				$data = $this->config->get($attr_name);
		}
		if(count($data) > 0) return $data;
		return array(array('name' =>''));
	}
	
	/**
	* ����ե�����˵��Ҥ��줿�����Фο����������ꤷ���ե������FTP���åץ��ɤ���
	* @param
		dst_file
			���åץ�����ʣƣԣХ����о�ˤǤΥե�����̾
			���åץ��ɤ��������Υե�����̾����̾������ǽ
			���Хѥ��Ǥ����Хѥ��Ǥ�����ǽ
			���ʤ餺FTP�桼���ε���ѥ����ǧ���뤳��
		src_file
			���åץ��ɤ��������Υե�����̾
			���Хѥ��Ǥ����Хѥ��Ǥ�����ǽ
	* @return ������������ TRUE �򡢼��Ԥ������� FALSE ���֤��ޤ��� 
	*/
	function ftpUpload($dst_file, $src_file)
	{
		// FTP��³�������
		if(!$ftp = $this->config->get('ftp')) return false;
		
		// �����п������֤�
		foreach($ftp as $k => $server){
			// �������Фˤϥ��åפ��ʤ�
			$ip = $_SERVER['SERVER_ADDR'];
			$host = gethostbyaddr($ip);
			if(!$server['host'] || $ip == $server['host'] || $host == $server['host']){
				continue;
			}
			
			// ��³���Ω����
			$conn_id = ftp_connect($server['host']); 
			
			// �桼��̾�ȥѥ���ɤǥ����󤹤�
			$login_result = ftp_login($conn_id, $server['user'], $server['pass']); 
			
			// ��³�Ǥ�������ǧ����
			if ((!$conn_id) || (!$login_result)) return false;
			// �ե�����򥢥åץ��ɤ���
			
			if(!ftp_put($conn_id, $dst_file, $src_file, FTP_BINARY)) return false;
			
			// �ѡ��ߥå��������ꤹ��
			$chmod_cmd = "CHMOD 0777 {$dst_file}";
			ftp_site($conn_id, $chmod_cmd);
			
			// ��³���ڤ�
			if(!ftp_close($conn_id)) return false;
		}
		
		// ���ｪλ
		return true;
	}
	
	/**
	 * ������������������ֵѤ���
	 * @param
		$type
			year,month,day,hour
		$pre 
			�����ǻ��ꤹ�� -1�ʤ�
		date("Y-m-d H",$this->getPreDate('day',-1)) // ����������
		date("Y-m-d H",$this->getPreDate('hour',-1)); // 1������������
	*/
	function getPreDate($term,$pre)
	{
		$now = time();
		$preDate = "";
		switch($term)
		{
			case 'year':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
			case 'month':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now)+$pre,date("d",$now),date("Y",$now));
				break;
			case 'day':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now)+$pre,date("Y",$now));
				break;
			case 'hour':
				$preDate = mktime(date("H",$now)+$pre,date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now));
				break;
			default:
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
		}		
	    return $preDate;
	}
	
	/**
	 * ����ǯ��γ������Ƚ�λ�����������
	 */
	function getDayOfWeekRange($year, $month, $weekno)
	{
		// �����1����������0:������,6:��������
		$one_w = date("w", mktime(0, 0, 0, $month , 1, $year ));
		// 1���ܤ�����
		if($one_w == 0){
			$one_week_count = 1;
		}else{
			$one_week_count = 8 - $one_w;
		}
		// 1���ܰʳ��ξ�硢1���ܤ�������û�����
		if($weekno > 1){
			$start_day = $one_week_count;
			$end_day = $one_week_count;
			// ���׳������η���
			$start_day += 7 * ($weekno-2) +1;
			// ���׽�λ���η���
			$end_day += 7 * ($weekno-1);
			// �����ˤޤ�������η׻�
			$last_day = date("d", mktime(0, 0, 0, $month + 1 , 0, $year ) );
			// ���׽�λ�������ˤʤ���Ϸ������˺����ؤ���
			if($end_day > $last_day ) $end_day = $last_day;
		}
		// 1���ܤξ�硢1���ܤκǽ����ϡ�1������Ŭ��7���֤��û���ʤ��ǽ��������
		else{
			// ���׳������η���
			$start_day = 1;
			// ���׽�λ���η���
			$end_day = $one_week_count;
		}
		
		return array($start_day, $end_day);
	}
	
	/**
	 * URL�˥ѥ�᥿����Ϳ����
	 */
	function addUrlParam($url, $key, $value)
	{
		// URL����?�פ�ޤ���ϡ�&�פ���Ϳ����
		if(strstr($url, '?')){
			$url .= "&{$key}={$value}";
		}else{
			$url .= "?{$key}={$value}";
		}
		return $url;
	}
	
	/**
	 * ����������ʬ�򤷤ƽ���η����ǥ��������ե�����˥������󤹤�
	 */
	function setSepTime($af, $time, $key)
	{
		// ��������Ⱦ�ȸ�Ⱦ��ʬ��
		$t = explode(" ", $time);
		// ��Ⱦ��ʬ��
		$d1 = explode("-", $t[0]);
		// ǯ
		$af->set($key . '_year', sprintf("%04d", $d1[0]));
		// ��
		$af->set($key . '_month', sprintf("%01d", $d1[1]));
		// ��
		$af->set($key . '_day', sprintf("%01d", $d1[2]));
		// ��Ⱦ��ʬ��
		$d2 = explode(":", $t[1]);
		// ��
		$af->set($key . '_hour', sprintf("%01d", $d2[0]));
		// ʬ
		$af->set($key . '_min', sprintf("%01d", $d2[1]));
		// ��
		$af->set($key . '_sec', sprintf("%01d", $d2[2]));
		
		return $af;
	}
	
	/**
	 * �����Ѵ�����������֤�
	 */
	function getBaseTags()
	{
		$sns_info = $this->config->get('sns_info');
		return array(
			'login_url'		=> $this->config->get('login_url'),
			'sns_name'		=> $sns_info['sns_name'],
			'support_mailaddress'	=> $this->config->get('support_mailaddress'),
		);
	}
	
	/*
	 * ���𥿥����Ѵ�����
	 *
	 */
	function replaceAdTag($body, $user_hash)
	{
		// [cut]ad:\d[cut]��õ���ƹ���URL���������ơ��Ǹ��user_hash���ɲä���
		$cut = $this->config->get('tag_cut');
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = $this->config->get('user_url') . "ad.php?ad_id=\\1&user_hash=" . $user_hash;
		$body = preg_replace($search, $replace, $body);
		return $body;
	}
	
	/**
	 * ����ƥ����ʸ�Ѵ�
	 * 
	 */
	function convertHtml($html)
	{
		$cut = $this->config->get('tag_cut');
		
		// �ե�����URL�����Ѵ�
		$search = "/{$cut}file(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'f.php?type=file&id=\' . $id[1] . \'\';'), $html);
		
		// ���Х���URL�����Ѵ�
		$search = "/{$cut}avatar(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_avatar_buy=true&avatar_id=\' . $id[1] . \'\';'), $html);
		
		// �ǥ��᡼��URL�����Ѵ�
		$search = "/{$cut}decomail(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// �ǥ��᡼���������ɥ����Ѵ�
		$search = "/{$cut}decomail_dl(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy_do=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// ������URL�����Ѵ�
		$search = "/{$cut}game(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_game_buy=true&game_id=\' . $id[1] . \'\';'), $html);
		
		// �������URL�����Ѵ�
		$search = "/{$cut}sound(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_sound_buy=true&sound_id=\' . $id[1] . \'\';'), $html);
		
		// [id]�ե꡼�ڡ���URL�����Ѵ�
		$search = "/{$cut}fp(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&contents_id=\' . $id[1] . \'\';'), $html);
		
		// [code]�ե꡼�ڡ���URL�����Ѵ�
		$search = "/{$cut}fp\[(.*)\]{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&code=\' . $id[1] . \'\';'), $html);
		
		// ���ߥ�˥ƥ�URL�����Ѵ�
		$search = "/{$cut}community(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_community_view=true&community_id=\' . $id[1] . \'\';'), $html);
		
		// TOPURL�����Ѵ�
		$search = "/{$cut}top{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_top=true\';'), $html);
		
		// �ޥ��ڡ���URL�����Ѵ�
		$search = "/{$cut}home{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_home=true\';'), $html);
		
		// ���𥿥��Ѵ�
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = "ad.php?ad_id=\\1";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAd($id);'), $html);
//		$html = preg_replace($search, $replace, $html);
		
		// ���𥿥��Ѵ�
		$search = "/{$cut}ad_banner(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// ���𥿥��Ѵ�
		$search = "/{$cut}ad_banner\((.*?)\){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// �����Ͽ�᡼�륢�ɥ쥹�����Ѵ�
		$search = "/{$cut}regist_mailaddress{$cut}/";
		$mail_account = $this->config->get('mail_account');
		$media_access_hash = $this->session->get('media_access_hash');
		$replace = $mail_account['regist']['account'] . "_" . $media_access_hash . "@" . $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// �᡼��ɥᥤ�󥿥��Ѵ�
		$search = "/{$cut}mail_domain{$cut}/";
		$replace = $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// �˥塼�������ȥ륿���Ѵ�
		$search = "/{$cut}news(\d+)_title{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'title\', $id);'), $html);
		
		// �˥塼��URL�����Ѵ�
		$search = "/{$cut}news(\d+)_url{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'url\', $id);'), $html);
		
		// point_ad�Ѵ�
		$search = "/{$cut}point_ad(.*){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdPoint($id);'), $html);
		
		return $html;
	}
	
	/**
	 * �˥塼�������ִ��������ؿ�
	 */
	function _callbackNews($type, $id)
	{
		if(!$id[1]) return ;
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$um = $backend->getManager('Util');
		// ����������ַ׻�
		$sqlLimit = $id[1] -1 . ',1';
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
//			'sql_order'		=> "news_id DESC LIMIT {$sqlLimit}",
			'sql_order'		=> "news_start_time DESC LIMIT {$sqlLimit}",
		);
		$r = $um->dataQuery($param);
		if(count($r) == 1){
			// �����ȥ�ξ��
			if($type=='title'){
				return $r[0]['news_title'];
			}
			// URL�ξ��
			elseif($type=='url'){
				return "?action_user_news_view=true&news_id={$r[0]['news_id']}";
			}
		}
		return '';
	}
	
	/**
	 * ���𥿥��ִ��������ؿ�
	 */
	function _callbackAd($id)
	{
		if(!$id[1]) return ;
		$ad_id = $id[1];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$html = "ad.php?ad_id={$ad_id}";
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// ���������INSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * ����Хʡ������ִ��������ؿ�
	 */
	function _callbackAdBanner($id)
	{
		if(!$id[1]) return ;
		// ����ɽ�����빭����������
		$b = explode(',', $id[1]);
		srand((float) microtime() * 10000000);
		$rand_key = array_rand($b);
		$ad_id = $b[$rand_key];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$a = new Tv_Ad($backend, 'ad_id', $ad_id);
		if(!$a->isValid()) return '';
		$html = "<a href=\"ad.php?ad_id={$ad_id}\">";
		// ����������в����Хʡ�
		if($a->get('ad_image')){
			
			$html .= "<img src=\"f.php?file=ad/{$a->get('ad_image')}\">";
		}else{
			$html .= $a->get('ad_desc');
		}
		$html .= "</a>";
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// ���������INSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * ����ݥ�����ɲôؿ�
	 */
	function _callbackAdPoint($id)
	{
		if(!$id[1]) return ;
		
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
		$ids = explode('_',$id[1]);
		$ad_id = $ids[0];
		$message = $ids[1];
		
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
		if($ua_list[0] == 0 || $term_flag ){
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
			
			return $message;
		}
		
	}
	
	/**
	 * ���ϤȽ�λ�δ֤ˤ����Τ��������
	 */
	function between($beg, $end, $str)
	{
		$ret_array = array();
		$array = explode($beg,$str);
		foreach($array as $item) {
			$pos = strpos($item,$end);
			if( false !== $pos ) {
				$ret_array[] = substr($item,0,$pos);
			}
		}
		return( $ret_array );
	}
	
	/**
	 * �ڡ����󥰽����Ѿ������
	 * SQL�¹Ի��ξ������
	 * ListViewClass��getCondition ��Ʊ��
	 */
	 function getDataCondition($condition)
	 {
	 	 // �����
	 	 $sqlWhere = "";
	 	 $sqlValues = array();
	 	// ����
	 	foreach($condition as $key => $value){
	 		// ���̤��ʤ����ϥ������밷���ǽ���
			if(!array_key_exists('type', $value)){
				$type = 'EQ';
			}else{
				$type = $value['type'];
			}
			// ������ά
			if(!array_key_exists('column', $value)){
				$column = $key;
			}else{
				$column = $value['column'];
			}
		 	// �����̤�����
		 	switch($type){
		 		// ��������ξ��
		 		case 'EQ':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' = ?';
						$sqlValues[] = $this->af->get($key);
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// �饤���ξ��
		 		case 'LIKE':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' LIKE ?';
						$sqlValues[] = "%%" . $this->af->get($key) . "%%";
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ���֤ξ��
		 		case 'PERIOD':
		 			// ����
					if($this->af->get($key . '_year_start') != '' && $this->af->get($key . '_month_start') != '' && $this->af->get($key . '_day_start') != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_start = sprintf("%04d-%02d-%02d 00:00:00", $this->af->get($key . '_year_start'), $this->af->get($key . '_month_start'), $this->af->get($key . '_day_start'));
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $date_start;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ��λ
					if($this->af->get($key . '_year_end') != '' && $this->af->get($key . '_month_end') != '' && $this->af->get($key . '_day_end') != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_end = sprintf("%04d-%02d-%02d 23:59:59", $this->af->get($key . '_year_end'),$this->af->get($key . '_month_end'), $this->af->get($key . '_day_end'));
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $date_end;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		/**
		 		 * �ϰϤξ��
		 		 * @param [����]_min, [����]_min���б�����ե������ͤ򸵤�SQL������
		 		 */
		 		case 'RANGE':
					// �Ǿ�
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $this->af->get($key . '_min');
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ����
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $this->af->get($key . '_max');
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ǯ��ξ��
				case 'AGE':
					$today = getdate(); // ���ռ���
					// ǯ��ʺǾ���
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$maxBirthDate = sprintf(
							"%04d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_min'),
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $maxBirthDate;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
					// ǯ��ʺ����
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$minBirthDate = sprintf(
							"%d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_max') - 1,
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $minBirthDate;
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ����ɽ���ξ��
		 		case 'REGEXP':
					if($this->af->get($key) != ''){
						// ��������Ϳ
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' (' .$column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?)';
						
						$sqlValues[] = $this->af->get($key);
						$sqlValues[] = '^' . $this->af->get($key) . ',';
						$sqlValues[] = ',' . $this->af->get($key) . '$';
						$sqlValues[] = ',' . $this->af->get($key) . ',';
						
						// �������ܤ�ͭ����
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ʣ������ξ��
		 		case 'IN':
		 			
		 			
		 		break;
		 	}
		}
		return array($sqlWhere, $sqlValues);
	 }
	
	/**
	 * SQL��åѡ��ؿ�
	 @param
	 	db_key				dsn�μ���
		sql_select			������ǻ��ꤹ��select�֥�å�
		sql_from			������ǻ��ꤹ��from�֥�å�
		sql_where			������ǻ��ꤹ��where�֥�å�
		sql_values			������ǻ��ꤹ��ץ졼����
		sql_order			������ǻ��ꤹ��order�֥�å�
		sql_group			������ǻ��ꤹ��group�֥�å�
		sql_num			���ڡ����˲���Υǡ�����ɽ�������뤫
	@return
		pageData �������
	 */
	function dataQuery($listview)
	{
		// �����ɬ�פʾ��
		if(is_array($listview) && array_key_exists('sql_select',$listview ) && array_key_exists('sql_from', $listview)){
			// �ѥ�᥿���������
			// ɬ�ܤǤʤ��ѥ�᥿
			$db_key = "";
			$sqlOrder = "";
			$sqlGroup = "";
			$sqlWhere = "";
			$sqlValues = array();
			if(array_key_exists('db_key', $listview)) $db_key = $listview['db_key'];
			if(array_key_exists('sql_order', $listview)) $sqlOrder = $listview['sql_order'];
			if(array_key_exists('sql_group', $listview)) $sqlGroup = $listview['sql_group'];
			if(array_key_exists('sql_where', $listview)) $sqlWhere = $listview['sql_where'];
			if(array_key_exists('sql_values', $listview)) $sqlValues = $listview['sql_values'];
			if(array_key_exists('sql_num', $listview)) $sqlNum = $listview['sql_num'];
			// ɬ�ܤΥѥ�᥿
			$sqlSelect		= $listview['sql_select'];
			$sqlFrom		= $listview['sql_from'];
			
			// �١��������������
			$dataQuery = "SELECT {$sqlSelect} FROM {$sqlFrom}";
			// where�֥�å��λ���
			if($sqlWhere){
				$dataQuery .= " WHERE {$sqlWhere}";
			}
			// group�֥�å��λ���
			if($sqlGroup){
				$dataQuery .=  " GROUP by {$sqlGroup}";
			}
			// order�֥�å��λ���
			if($sqlOrder){
				$dataQuery .=  " ORDER by {$sqlOrder}";
			}
			// ��������֥�å��λ���
			if($sqlNum) $dataQuery .= " LIMIT {$sqlNum}";
			
			// ɽ���ǡ��������
			$db	=& $this->backend->getDB($db_key);
			//$db	=& $this->backend->getDB();
			$pageData = $db->db->getAll($dataQuery, $sqlValues, DB_FETCHMODE_ASSOC);
//echo $dataQuery.'<br>';
//print_r($sqlValues);
//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//	foreach($this->backend->db_list as $a) $this->trace($a->db->last_query);
//echo "\n";
//print $dataQuery;
//if(Ethna::isError($pageData)) print $pageData->getDebugInfo();
			
			return $pageData;
		}else{
 			return array();
 		}
	}
	
	/**
	 * ʸ����򥭥��饤������
	 * 
	 */
	function camelize ($str)
	{
		return str_replace(' ','',ucwords(str_replace('_',' ',$str)));
	}
	
	/**
	 * �ݥ���ȥ���ؤ�IDǧ�ڥꥯ������
	 */
	function ponIdRequest()
	{
		// �桼������μ���
		$sess = $this->session->get('user');
		
		// penparam������
		return ID_Request_MAKE('New', $this->config->get('pon_siteid'), $sess['user_hash'], $this->config->get('pon_return_url'), $this->config->get('pon_regist_key'));
	}
	
	/**
	 * �ݥ���ȥ��󤫤��IDǧ�ڼ���
	 */
	function ponIdReceive()
	{
		$RegistKey = $this->config->get('pon_regist_key');
		$PENParam = $_POST['penparam'];
		$FreeParam1 = $_POST['p1'];
		$FreeParam2 = $_POST['p2'];
		$FreeParam3 = $_POST['p3'];
		$ReturnArray = ID_Response_GET($PENParam, $RegistKey);
		$RegisterType = $ReturnArray['RegisterType'];
		$SiteID = $ReturnArray['SiteID'];
		$Account = $ReturnArray['Account'];
		$PENAccount = $ReturnArray['PENAccount'];
		$State = $ReturnArray['State'];
		$LocalState = $ReturnArray['LocalState'];
		//$LocalState �Υ����å� ����ʸ�������󤵤�Ƥ��ʤ�����
		if (strtoupper($LocalState) == 'SUCCESS') {
			//$State���ͤ���ݥ���ȥ���ν�����̤�����å�
			if (strtoupper($State) == 'SUCCESS') {
				//IDǧ�ڴ�λ�ν��������
				$timestamp = date("Y-m-d H:i:s");
				$p = new Tv_PonId($this->backend);
				$p->set('user_hash', $Account);
				$p->set('pon_user_hash', $PENAccount);
				$p->set('pon_id_status', 3);
				$p->set('pon_id_result', $State);
				$p->set('pon_id_regist_time', $timestamp);
				$p->set('pon_id_update_time', $timestamp);
				$r = $p->add();
			}else{
				//���顼���� (�����: reject �⤷���� system_internal_error)
				return false;
			}
		}else{
			//���顼���� (�����: cert_fail)
			return false;
		}
		return true;
	}
	
	/**
	 * �ݥ���ȥ���ؤΥݥ���ȸ򴹥ꥯ������
	 */
	function ponPointRequest()
	{
		// �桼������μ���
		$sess = $this->session->get('user');
		$Account = $sess['user_hash'];
		
		$SiteID = $this->config->get('pon_siteid');
		$trn_id = $this->af->get('pon_point_id');
		$point = $this->af->get('pon_point');
		$RegistKey = $this->config->get('pon_regist_key');
		$ProcessID = 1;
		$PostURL = $this->config->get('pon_point_url');
		# �ݥ���Ȥ����򤳤��˵��ܡʽ��ס�
		#�������Ѥ�
		
		# �ݥ���ȸ򴹥ꥯ��������ʸ�κ���
		$PENParam = Point_Trans_Request_MAKE($trn_id, $ProcessID, $SiteID, $Account, $point, $RegistKey);
		# �ݥ���ȸ򴹥ꥯ��������ʸ��POST������ͤμ���
		$ReturnArray = Point_Request_POST($PENParam, $PostURL, $RegistKey);
		# �ݥ���ȥ��󤫤��������줿����ͤ�Ϣ�������ѿ�������
		$MessageType = $ReturnArray["MessageType"];
		$TransactionID = $ReturnArray["TransactionID"];
		$ProcessID = $ReturnArray["ProcessID"];
		$SiteID = $ReturnArray["SiteID"];
		$ResponseDate = $ReturnArray["Date"];
		$State = $ReturnArray["State"];
		$LocalState = $ReturnArray['LocalState'];
		if ( strtoupper($LocalState) == 'ACCEPT') {
			if (strtoupper($State) == 'ACCEPT') {
				# ���ｪλ�Τ������ݥ���Ȥθ򴹴�λ�����»�
				return array($TransactionID, $ProcessID);
			} else {
				# �ݥ���ȥ���ˤƼ����Ǥ��ʤ��ä�����ݥ���Ȥ򺹤��᤹
				return false;
			}
		} else if (strtoupper($LocalState) == 'SOCKET_TIMEOUT') {
			# �ݥ���ȥ���ˤƥ����åȥ����ॢ����ȯ���Τ��ᡢ�ݥ���ȸ򴹳�ǧ�ꥯ�����Ȥ���������
			return false;
		} else if (strtoupper($LocalState) == 'SOCKET_ERROR') {
			# �����åȥ��ͥ���������ɤΤ���ݥ���Ȥ򺹤��᤹
			return false;
		} else {
			# ����¾�Υ��顼�Τ������ݥ���ȤϤ��Τޤ������֤Ȥ���
			return false;
		}
		return false;
	}
	
	/**
	 * ǯ�𤫤�����������������
	 */
	function getBirthday($age)
	{
		$ty = date("Y");
		$tm = date("m");
		$td = date("d");
		$by = $ty - $age;
		$birth['under'] = date("Y-m-d",mktime(0,0,0,$tm,$td+1,$by-1));
		$birth['over'] = date("Y-m-d",mktime(0,0,0,$tm,$td,$by));
		return $birth;
	}
	
	/**
	 *  ǯ����������
	 *
	 *  @access	private
	 *  @param	birth_date	string	��ǯ����
	 */
	function getAge($birth_date)
	{
		$ty = date('Y');
		$tm = date('m');
		$td = date('d');
		list($by, $bm, $bd) = explode('-', $birth_date);
		$age = $ty - $by;
		if($tm * 100 + $td < $bm * 100 + $bd){
			$age--;
		}
		return $age;
	}
	
	/**
	 *  ���¤��������
	 *
	 *  @access	private
	 *  @param	birth_date	string	��ǯ����
	 */
	function _getZodiacSign($birth_date)
	{
		list($y, $m, $d) = explode('-', $birth_date);
		$birthday = $m * 100 + $d;
		if(120 <= $birthday && $birthday <= 218){
			return '���Ӻ�';
		} elseif(219 <= $birthday && $birthday <= 320){
			return '����';
		} elseif(321 <= $birthday && $birthday <= 419){
			return '���Ӻ�';
		} elseif(420 <= $birthday && $birthday <= 520){
			return '�����';
		} elseif(521 <= $birthday && $birthday <= 621){
			return '�лҺ�';
		} elseif(622 <= $birthday && $birthday <= 722){
			return '����';
		} elseif(723 <= $birthday && $birthday <= 822){
			return '��Һ�';
		} elseif(823 <= $birthday && $birthday <= 922){
			return '������';
		} elseif(923 <= $birthday && $birthday <= 1023){
			return 'ŷ���';
		} elseif(1024 <= $birthday && $birthday <= 1121){
			return '긺�';
		} elseif(1122 <= $birthday && $birthday <= 1221){
			return '�ͼ��';
		} else {
			return '���Ӻ�';
		}
	}
	
	/**
	 * �ե�����򥢥åץ���
	 * 
	 * @access public 
	 * @param string $f �ե�����ǡ���
	 * @param string $dir ���ӻ��ꤷ�������åץ��ɥǥ��쥯�ȥ�
	 * @return integer true/false
	 */
	function uploadFile($f, $dir="")
	{
		// �ե����뤬�Ϥ��Ƥ��ʤ���票�顼
		if($f['error'] == UPLOAD_ERR_NO_FILE || $f == null){
			return false;
		}
		
		// �ե�����̾����
		list($prev, $ext) = $this->extractName($f['name']);
		// ��ʣ���ʤ��褦�ʥե�����̾������
		$token = time() . substr(md5(microtime()), 0, rand(5, 12));
		$filename = $token . '.' . strtolower($ext);
		// ���ꥸ�ʥ�ե�����򥢥åץ���
		$path = $filename;
		if($dir) $path = "{$dir}/{$filename}";
		$original_file_path = $this->config->get('file_path') . $path;
		$r = copy($f['tmp_name'], $original_file_path);
		chmod($original_file_path, 0755);
		// �����Υ��åץ��ɤ˼��Ԥ������
		if(!$r) return false;
		
		// ���ʬ���б���ʣ�������Ф˥��åץ���
		$this->ftpUpload($path, $original_file_path);
		
		return $filename;
	}
	
	/**
	 * ��������ͥ���򥢥åץ��ɤ���
	 * 
	 * @access private 
	 * @param string $imagePath ,$article_id,$article_image_id
	 * @param string $file 
	 * @return $filename
	 */
	function uploadSumImage($imagePath, $file, $article_id, $article_image_id)
	{
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = null;
		}else{ 
			// �ե�����̾����
			$filename = sprintf("%06d_s%01d", $article_id, $article_image_id) . ".jpg"; 
			// �����������
			list($size_x, $size_y) = getimagesize($file['tmp_name']);
			if($size_x > 120){ 
				// ����͡��륵���������
				$sam_x = 120;
				$sam_y = ($sam_x * $size_y) / $size_x; 
				// ����͡��륵�����Ѥ˺���
				$main_img = @imagecreatefromjpeg($file['tmp_name']); 
				// ����͡��륵�����˽̾�
				$sub_img = imagecreatetruecolor($sam_x, $sam_y);
				imagecopyresized($sub_img, $main_img, 0, 0, 0, 0, $sam_x, $sam_y, $size_x, $size_y);
				imagejpeg($sub_img, "$imagePath$filename", 100);
				imagedestroy($sub_img);
				imagedestroy($main_img);
			}else{
				$ret = copy($file['tmp_name'], "$imagePath$filename");
			}
		}
		return $filename;
	}

	/**
	 * �ե�����ե�����ǥ��åץ��ɤ��������������ʾ��إ��ԡ�����
	 * 
	 * @access private 
	 * @param string $imagePath 
	 * @param string $file 
	 * @return $filename
	 */
	function copyImage($imagePath, $file)
	{
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = null;
		}else{
			list($prev, $ext) = $this->extractName($file['name']);
			$num = 0;
			while(file_exists($imagePath . $prev . $num . "." . $ext)){
				$num++;
			}
			$filename = $prev . $num . "." . $ext;
			$ret = copy($file['tmp_name'], "$imagePath$filename");
		}
		return $filename;
	}

	/**
	 * ���顼�ꥹ�Ȥ��������
	 * 
	 * @access public 
	 * @return string $colorList
	 */
	function getColorList()
	{
		$colorList = array('' => array('name' => '��̤����'),
			'#0000FF' => array('name' => '�Ŀ�'),
			'#66CCFF' => array('name' => 'ǻ���忧'),
			'#00FFFF' => array('name' => '�忧'),
			'#6600CC' => array('name' => '����'),
			'#666699' => array('name' => '�Ļ翧'),
			'#993399' => array('name' => '�翧'),
			'#DA70D6' => array('name' => '���翧'),
			'#CC0099' => array('name' => '�ֻ翧'),
			'#FFEEEE' => array('name' => '���ˎߎݎ���'),
			'#FFC0E0' => array('name' => '�ˎߎݎ���'),
			'#FF60B0' => array('name' => '�Ύ��Ďˎߎݎ�'),
			'#FF0000' => array('name' => '�ֿ�'),
			'#EE0000' => array('name' => '���㿧'),
			'#996600' => array('name' => '�㿧'),
			'#990000' => array('name' => '�����㿧'),
			'#FFD700' => array('name' => '���㿧'),
			'#AAAA00' => array('name' => '���ڎݎ��޿�'),
			'#66CCFF' => array('name' => '��������'),
			'#F5F5DC' => array('name' => '�͎ގ����ގ���'),
			'#FFFF00' => array('name' => '����'),
			'#FFFFBB' => array('name' => '������'),
			'#00FF00' => array('name' => '���п�'),
			'#66CC00' => array('name' => '�п�'),
			'#808000' => array('name' => '���؎��̎޿�'),
			'#669900' => array('name' => '���п�'),
			'#999999' => array('name' => '����'),
			'#CCCCCC' => array('name' => '�俧'),
			'#3388BB' => array('name' => '�ĳ���'),
			'#777777' => array('name' => '������'),
			'#000000' => array('name' => '����'),
			'#FFFFFF' => array('name' => '��'),
			);
		return $colorList;
	}

	/**
	 * �����ȯ��������
	 * 
	 * @access public 
	 * @param string $codeLength �����Ĺ��
	 * @param string $codeType �����ʸ����
	 * @return string $checkCode	   ���
	 */
	function getRandamCode($codeLength = 8, $codeType = "alphanum")
	{
		$codeData = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
			'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
			'U', 'V', 'W', 'X', 'Y', 'Z',
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
			'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
			'u', 'v', 'w', 'x', 'y', 'z'
			); 
		// ��ǧ�ѥ����ɤ�����������
		if (!is_numeric($codeLength) || $codeLength < 1){
			$codeLength = 8;
		}
		mt_srand();
		$checkCode = "";
		for ($i = 0; $i < $codeLength; $i++){
			$cnt = mt_rand(0, count($codeData) - 1);
			$checkCode .= $codeData[$cnt];
		}
		if ($codeType == "smallal"){
			$checkCode = strtolower($checkCode);
		}elseif ($codeType == "biglal"){
			$checkCode = strtoupper($checkCode);
		}
		return $checkCode;
	}
	
	/**
	 * ��ˡ�����ID��ȯ�Ԥ���
	 *
	 */
	function getUniqId()
	{
		// �����Ф��Ȥ˥�ˡ�����ID�ˤ���ɬ�פϤʤ����
		return uniqid();
	}
	
	/**
	 * UserAgent ���ͤ��饭��ꥢ�����Ƚ�̤���
	 * return a[au],d[docomo],s[softbank],o[����¾]
	 */
	function getMobileType()
	{
		$ua = $_SERVER['HTTP_USER_AGENT'];
		$type = "o"; 
		// DoCoMo
		if (!strncmp($ua, 'DoCoMo', 6)){
			$type = "d";
		} 
		// Vodafone(PDC)
		elseif (!strncmp($ua, 'J-PHONE', 7)){
			$type = "s";
		} 
		// Vodafone(3G)
		// * Up.Browser ����ܤ��Ƥ����Τ�����(au������ɾ��)
		elseif (!strncmp($ua, 'Vodafone', 8) || !strncmp($ua, 'MOT', 3)){
			$type = "s";
		} 
		// SoftBank
		elseif (!strncmp($ua, 'SoftBank', 8)){
			$type = "s";
		} 
		// au
		elseif (!strncmp($ua, 'KDDI', 4) || !strncasecmp($ua, 'up.browser', 10)){
			$type = "a";
		} 
		// WILLCOM / DDIPOCKET
		elseif (strpos($ua, 'WILLCOM') !== false || strpos($ua, 'SHARP/WS') !== false || strpos($ua, 'DDIPOCKET') !== false){
			$type = "o";
		}else{
			$type = "o";
		}

		return $type;
	}

	/**
	 * sendRequest
	 * ���ե��ꥨ���Ȥ����̤�����
	 */
	function sendRequest($session_id, $user_info)
	{
		$advertisement_id = 'kc51716';
		$host = 'smart-c.jp';
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$port = 80;
		$path = '/gateway/action.cgi';
		return @join('', @file("http://$host:$port$path?i=$advertisement_id&s=$session_id&u=$user_info"));
	}

	/**
	 * �ե�����̾���ĥ�Ҥ�ʬ��
	 * 
	 * @access private 
	 * @param string $filename 
	 * @return $string $file
	 * @return $string $ext
	 */
	function extractName($filename)
	{
		$pos = strrpos($filename, ".");
		if(!$pos){
			return array($filename, "");
		}
		$file = substr($filename, 0, $pos);
		$ext = substr($filename, $pos + 1);
		return array($file, $ext);
	}

	/**
	 * ���������򥢥åץ��ɤ���
	 * 
	 * @access private 
	 * @param string $imagePath ,$article_id,$article_image_id
	 * @param string $file 
	 * @return $filename
	 */
	function uploadArticleImage($imagePath, $file, $article_id, $article_image_id)
	{
		$filename = "";
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = "";
		}else{
			list($prev, $ext) = $this->extractName($file['name']);
			// $num = 0;
			// while(file_exists($imagePath . $prev . $num .  "." . $ext)){
			// $num++;
			// }
			// $filename = $prev . $num . "." . $ext;
			$filename = sprintf("%06d_%01d", $article_id, $article_image_id) . ".jpg";
			$ret = copy($file['tmp_name'], "$imagePath$filename");
		}
		return $filename;
	}
	
	/**
	 * ���� ����ǯ����κǽ������֤���
	 * 
	 * @param int $year 
	 * @param int $month 
	 * @return ����ǯ����κǽ���
	 */
	function getDayCount($year, $month)
	{
		for ($day = 31; $day >= 28; $day--){
			if (checkdate($month, $day, $year)){
				break;
			}
		}
		return $day;
	}
	
	/**
	 * IP���ɥ쥹�ˤ�ä�au���ɤ�����Ƚ��
	 * 
	 * @return au �ʤ�true
	 */
	function isAu()
	{
		$ipList = $this->config->get('ip_au');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IP���ɥ쥹�ˤ�ä�DoCoMo���ɤ�����Ƚ��
	 * 
	 * @return DoCoMo �ʤ�true
	 */
	function isDocomo()
	{
		$ipList = $this->config->get('ip_docomo');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IP���ɥ쥹�ˤ�ä�SoftBank���ɤ�����Ƚ��
	 * 
	 * @return SoftBank �ʤ�true
	 */
	function isSoftbank()
	{
		$ipList = $this->config->get('ip_softbank');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * IP���ɥ쥹�ˤ�ä�Willcom���ɤ�����Ƚ��
	 * 
	 * @return Willcom �ʤ�true
	 */
	function isWillcom()
	{
		$ipList = $this->config->get('ip_willcom');
		foreach($ipList as $ip){
			if(Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip)){
				return true;
			}
		}
		return false;
	}
	
	/**
	 * ü����XUID���֤�
	 * 
	 * @return XUID
	 */
	function getXuid()
	{
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		// DOCOMO
		if ($user_agent[0] == 'DoCoMo'){
			$uid = $_SERVER['HTTP_X_DCMGUID'];
		}
		// AU
		elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){
			$uid = $_SERVER['HTTP_X_UP_SUBNO'];
		}
		// SOFTBANK
		elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){
			$uid = $_SERVER['HTTP_X_JPHONE_UID'];
		}
		return $uid;
	}
	
	/**
	 * ü���ΥǥХ���������֤�
	 * 
	 * @return MODEL
	 */
	function getModel()
	{
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		// DOCOMO
		if ($user_agent[0] == 'DoCoMo'){
				$pattern = "/^DoCoMo\/[0-9\.]*[ \/]([0-9a-zA-Z\+]+)/i";
				$key = 1;
		}
		// AU
		elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){ 
			$pattern = "/^(KDDI-|UP\.Browser\/[0-9\.]+-)([0-9a-zA-Z\+]+)/i";
			$key = 2;
		}
		// SOFTBANK
		elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){ 
			$pattern = "/^(MOT-|Vodafone\/[0-9\.]+\/V|J-PHONE\/[0-9\.]+\/|Vodafone\/[0-9\.]+\/|SoftBank\/[0-9\.]+\/)([0-9a-zA-Z\+]+)/i";
			$key = 2;
		}else{
			return '';
		}
		// ü����������
		if(preg_match($pattern, $_SERVER['HTTP_USER_AGENT'], $matches)){
			$model = $matches[$key];
		}
		return $model;
	}
	
	/**
	 * �����������Ƥ��륯�饤����Ȥ�ü��������֤���
	 * 
	 * @return ����ꥢ
	 */
	function getTermInfo()
	{
		$cary = '';
		$model = '';
		$devid = '';
		$ser = '';
		$icc = '';
		$uid = '';
		$user_agent = explode("/", $_SERVER['HTTP_USER_AGENT']);
		if ($user_agent[0] == 'DoCoMo'){ 
			// DoCoMo
			if (preg_match('/^1\..$/', $user_agent[1])){ 
				// �̎ގ׎����ގʎގ����ގ��� 1.0
				$model = $user_agent[2];
//				if($this->isDocomo()){
					$devid = '';
					$ser = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
					$icc = '';
//					$uid = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
//				}
			}elseif (preg_match('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', $user_agent[1])){ 
				// �̎ގ׎����ގʎގ����ގ��� 2.0(FOMA)
				$model = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\1', $user_agent[1]);
//				if($this->isDocomo()){
					$ser = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\2', $user_agent[1]);
					$icc = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\3', $user_agent[1]);
//					$uid = preg_replace('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', '\\3', $user_agent[1]);
//				}
			}
			$uid = $_SERVER['HTTP_X_DCMGUID'];
			$cary = 'DoCoMo';
		}elseif (preg_match("/KDDI/", $user_agent[0]) or ($user_agent[0] == 'UP.Browser')){ 
			// au(�쵡��)
			$model = $user_agent[0]; //KDDI-SN37 UP.Browser 
			// $model = $user_agent[1];//6.2.0.11.1.2(GUI) MMP
			// $model = $user_agent[2];//2.0
			// $model = $_SERVER['HTTP_USER_AGENT'];
			if ($user_agent[0] == 'UP.Browser'){
				$devid = preg_replace('/(.+?)-(.+)/', '\\2', $user_agent[1]);
			}elseif (preg_match("/KDDI/", $user_agent[1])){
				$devid = preg_replace('/^KDDI-(.+?)\sUP(.+)/', '\\1', $user_agent[0]);
			}
//			if($this->isAu()){
				$ser = preg_replace('/^(.+?)_t.+/', '\\1', $_SERVER['HTTP_X_UP_SUBNO']);
				$icc = $_SERVER['HTTP_X_UP_SUBNO'];
				$uid = $_SERVER['HTTP_X_UP_SUBNO'];
//			}
			$cary = 'au';
		}elseif (preg_match("/(J-PHONE)|(Vodafone)|(MOT)|(SoftBank)/", $user_agent[0])){ 
			// Vodafone,SoftBank
			$model = preg_replace('/^(.+?)[\s_]*/', '\\1', $_SERVER['HTTP_X_JPHONE_MSNAME']);
			if ($model == ''){
				if (preg_match("/SoftBank/", $user_agent[0])){
					$model = $user_agent[2];
				}else{
					$model = preg_replace('/^(.+?)\s*/', '\\1', $user_agent[2]);
				}
			}
//			if($this->isSoftbank()){
				if (preg_match("/J-PHONE/", $user_agent[0])){ 
					// 'J-PHONE'�Վ����ގ��������ގ��ݎ�
					$ser = preg_replace('/^SN(.+?)\s.+$/', '\\1', $user_agent[3]);
				}elseif (preg_match("/Vodafone/", $user_agent[0]) or preg_match("/SoftBank/", $user_agent[0])){ 
					// 'Vodafone','SoftBank'�Վ����ގ��������ގ��ݎ�
					$ser = preg_replace('/^SN(.+?)\s.+$/', '\\1', $user_agent[4]);
				}elseif (preg_match("/MOT/", $user_agent[0])){
					$ser = '';
				}
				$devid = '';
				$icc = $_SERVER['HTTP_X_JPHONE_UID'];
				$uid = $_SERVER['HTTP_X_JPHONE_UID'];
//			}
			$cary = 'Vodafone';
		}else{
			$cary = 'PC';
			$model = $user_agent[0] . ' ' . $user_agent[1];
			$devid = '';
			$ser = '';
			$icc = '';
			$uid = '';
		}
		return array($cary, $model, $ser, $icc, $devid, $uid);
	}
	
	/**
	 * CSV�ե��������Ϥ���
	 * 
	 * @param �����ȥ������󡢽���������
	 * 
	 * @return  null
	 */	
	 function outputCsv($titleArray, $lineArray)
	 {
	 	// ʸ�������ɤ�SJIS���Ѵ�����
		$csv_title_array = array();
		$csv_line_array  = array();
		foreach($titleArray as $k=>$v){
			$csv_title_array[] = mb_convert_encoding($v, "SJIS", "EUC-JP");
		}
		// ��������Τǳ����Ǥ�ʸ���������Ѵ���Ԥ�
		foreach($lineArray as $k => $v){
			$_line_array = array();
			foreach($v as $k2 => $v2){
				$_line_array[] = mb_convert_encoding($v2, "SJIS", "EUC-JP");
			}
			$csv_line_array[] = $_line_array;
		}
		
		// �ãӣ֥ե�����̾
		$file_name = $this->config->get('master_csv_dir').date("YmdHis",time()) . '.csv';
		
		// �񤭹���
		$fp = fopen( $file_name, "w" );
		fputs($fp, implode( ",", $csv_title_array ) . "\n");
		foreach($csv_line_array as $k => $v){
			fputs($fp, "\"".implode( "\",\"", $v ) . "\"\n");
		}
		$file = $file_name;
		$dl_name = date("YmdHis",time()) . '.csv';
		
		//�إå���
		header('Content-Type: text/csv');
		header("Content-Disposition: attachment; filename=".$dl_name );
		header('Content-Length: '.filesize($file));
		//����
		readfile($file);
		///tmp/�ե�������
		unlink($file);
		
	 }
	 
	/**
	 * �ǥХå������ϥ᥽�å� 
	 *  �����衧�ץ�������/log/����.log
	 * 
	 * @param  ���Ϥ�����ʸ����
	 * @return true
	 */
	function trace($str)
	{
		
		$log_file = dirname(dirname(__FILE__)) .'/log/'.date('Y-m-d') .'.log';
		// �ե�����¸�ߡ��񤭹��߸��¤γ�ǧ
		if(!is_writable($log_file)){
			if(!is_file($log_file)){
				if(touch($log_file)){
					chmod($log_file,0777);
				}else{
					return false;
				}
			}
		}else{
			$fp = @fopen($log_file, "a+");
			if($str){
				if (!(empty($fp))) {
					flock($fp, LOCK_EX);
					fputs($fp, date('H:i:s').' : ');
					fputs($fp, $str);
					fputs($fp, "\n");
					flock($fp, LOCK_UN);
					fclose($fp);
				}
			}
			return true;
		}
	}
}

?>
