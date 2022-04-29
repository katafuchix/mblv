<?php
/**
 * Tv_UtilManager.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�ƥ���ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
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
				for($i = 2008;$i <= date('Y')+3;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// ����ǯ
			case 'birth_year': 
				for($i = 1930;$i <= date('Y')+3;$i++){
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
					array('community_category_priority_id' => OBJECT_SORT_ASC)
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
			// �ӥǥ����ƥ���
			case 'video_category':
				$a = new Tv_VideoCategory($this->backend);
				$result = $a->searchProp(
					array('video_category_id', 'video_category_name','video_category_file1','video_category_color'),
					array('video_category_status' => 1),
					array('video_category_priority_id' => OBJECT_SORT_DESC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['video_category_id']] = array(
						'name' => $item['video_category_name'],
						'video_category_file1' => $item['video_category_file1'],
						'video_category_color' => $item['video_category_color'],
						'video_category_id' => $item['video_category_id'],
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
			// ����
			case 'item':
				// ���ʾ���μ���
				$o =& new Tv_Item($this->backend);
				$filter = array(
					'item_status' => 1,
				);
				$result = $o->searchProp(array('item_id','item_name'),$filter,null,null,null);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['item_id']] = array(
						'name' => $item['item_name'],
					);
				}
				$data = $data;
				break;
			// ���ʥ��ƥ���
			case 'item_category':
				// ������������
				$where = array('item_category_status' => 1);
				
				// item_catregory_id�����
				$item_category_id = $this->af->get('item_category_id');
				// item_category_id��ʣ��������
				// shop_id��������
				if($this->af->get('shop_id'))
				{
					$where['shop_id'] = $this->af->get('shop_id');
				}
				else
				{
					if(is_array($item_category_id))
					{
						$ic = new Tv_ItemCategory($this->backend, 'item_category_id', $item_category_id[0][item_category_id]);
						if($ic->get('shop_id')) $where['shop_id'] = $ic->get('shop_id');
					}
					// item_category_id����ĤΤߤξ��
					elseif(isset($item_category_id))
					{
						$ic = new Tv_ItemCategory($this->backend, 'item_category_id', $item_category_id);
						if($ic->get('shop_id')) $where['shop_id'] = $ic->get('shop_id');
					}
				}
				
				if(!$this->af->get('item_category_status'))
				{
					$where['item_category_status'] = 1;
				}
				
				$a = new Tv_ItemCategory($this->backend);
				$result = $a->searchProp(
					array('item_category_id', 'item_category_name'),
					$where,
					array('item_category_priority_id' => OBJECT_SORT_ASC)
				);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['item_category_id']] = array(
						'name' => $item['item_category_name'],
					);
				}
				$data = $data;
				break;
			case 'shop':
				// ����å׾���μ���
				$o =& new Tv_Shop($this->backend);
				$filter = array(
					'shop_status' => 1,
				);
				$result = $o->searchProp(array('shop_id','shop_name'),$filter,null,null,null);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['shop_id']] = array(
						'name' => $item['shop_name'],
					);
				}
				$data = $data;
				break;
			case 'postage':
				// ��������μ���
				$o =& new Tv_Postage($this->backend);
				$filter = array(
					'postage_status' => 1,
				);
				$result = $o->searchProp(array('postage_id','postage_name'),$filter,null,null,null);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['postage_id']] = array(
						'name' => $item['postage_name'],
					);
				}
				$data = $data;
				break;
			case 'exchange':
				// ��������������μ���
				$o =& new Tv_Exchange($this->backend);
				$filter = array(
					'exchange_status' => 1,
				);
				$result = $o->searchProp(array('exchange_id','exchange_name'),$filter,null,null,null);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['exchange_id']] = array(
						'name' => $item['exchange_name'],
					);
				}
				$data = $data;
				break;
			case 'supplier':
				// ���������μ���
				$o =& new Tv_Supplier($this->backend);
				$filter = array(
					'supplier_status' => 1,
				);
				$result = $o->searchProp(array('supplier_id','supplier_name'),$filter,null,null,null);
				$data = array();
				foreach($result[1] as $item){
					$data[$item['supplier_id']] = array(
						'name' => $item['supplier_name'],
					);
				}
				$data = $data;
				break;
			case 'admin_shop_id':
				// �������¤���ĥ���å׾���μ���
				$result = $this->getAuthShopList();
				$data = array();
				foreach($result as $item){
					$data[$item['shop_id']] = array(
						'name' => $item['shop_name'],
					);
				}
				$data = $data;
				break;
			// �ǥե����
			default:
				$data = $this->config->get($attr_name);
		}
		if(count($data) > 0) return $data;
		return array(array('name' =>''));
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
		
		// ���𥿥��Ѵ�
		$search = "/{$cut}ad_banner(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// ���𥿥��Ѵ�
		$search = "/{$cut}ad_banner\((.*?)\){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// site�����Ѵ�
		$search = "/{$cut}(site_.*?){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackConfig($id);'), $html);
		
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
		
		// ���ʥڡ��������Ѵ�
		$search = "/{$cut}item(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_ec_item=true&item_id=\' . $id[1] . \'\';'), $html);
		// ����åײ��������Ѵ�
		$search = "/{$cut}shop_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_shop_image_tag'), $html);
		// ���ʥ��ƥ�����������Ѵ�
		$search = "/{$cut}ic_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_item_category_image_tag'), $html);
		// ���ʲ��������Ѵ�
		$search = "/{$cut}item_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_item_image_tag'), $html);
		// ���ʥ���ץ���������Ѵ�
//		$search = "/#sample(\d+)/";
//		$html = preg_replace_callback($search, array($this, 'callback_get_sample_image_tag'), $html);
		
		return $html;
	}
	
	/**
	������Хå�������åײ��������ؿ�
	return <img src="f.php?file_name=34.jpg&contents=shop"/>
	*/
	function callback_get_shop_image_tag($match)
	{
		//select sql
		$db = $this->backend->getDB();
		$sql = "select shop_image2 from shop where shop_id = '".$match[1]."' and shop_status = 1 limit 1";
		$shop_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$shop_image_url = "f.php?file=shop/" . $shop_list[0][shop_image2];
		return $shop_image_url;
	}
	
	/**
	������Хå������ʲ��������ؿ�
	return <img src="f.php?file_name=34.jpg&contents=item"/>
	*/
	function callback_get_item_category_image_tag($match)
	{
		//select sql
		$db = $this->backend->getDB();
		$sql = "select item_category_image1 from item_category where item_category_id = '".$match[1]."' and item_category_status = 1 limit 1";
		$item_category_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$item_category_image_url = "f.php?file=item_category/" . $item_category_list[0][item_category_image1];
		return $item_category_image_url;
	}
	
	/**
	������Хå������ʲ��������ؿ�
	return <img src="f.php?file_name=34.jpg&contents=item"/>
	*/
	function callback_get_item_image_tag($match)
	{
		//select sql
		$db = $this->backend->getDB();
		$sql = "select item_image from item where item_id = '".$match[1]."' and item_status = 1 limit 1";
		$item_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
//		$item_image_url = "f.php?file_name=" . $item_list[0][item_image] . "&contents=item";
		$item_image_url = "f.php?file=item/" . $item_list[0][item_image];
		return $item_image_url;
	}
	
	/**
	������Хå������ʥ���ץ���������ؿ�
	return <img src="?action_image=true&file=../public_file/sample/34.jpg"/>
	*/
	function callback_get_sample_image_tag($match)
	{
		//select sql
		$db = $this->backend->getDB();
		$sql = "select sample_image from sample where item_id = '".$GLOBALS['item_id']."' and sample_priority_id = '".$match[1]."' and sample_status = 1 limit 1";
		$sample_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$GLOBALS['sample_image'] = "<img src=\"?action_image=true&file=../public_file/sample/". $sample_list[0][sample_image] ."\">";
		return $GLOBALS['sample_image'];
	}
	
	/**
	 * site�����ִ��������ؿ�
	 */
	function _callbackConfig($id)
	{
		if(!$id[1]) return ;
		$tag = $id[1];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$config = $ctl->getConfig();
		$sns_info = $config->get('sns_info');
		if(is_array($sns_info)){
			if(array_key_exists($tag, $sns_info)){
				$html = $sns_info[$tag];
			}
		}
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
			'sql_order'		=> "news_id DESC LIMIT {$sqlLimit}",
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
if(Ethna::isError($pageData)) print $pageData->getDebugInfo();
			
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
				$p->set('pon_status', 3);
				$p->set('pon_result', $State);
				$p->set('pon_created_time', $timestamp);
				$p->set('pon_updated_time', $timestamp);
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
	 * @access     public
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
	 * @access     public
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
	 * �᡼�륢�ɥ쥹��Ƚ��᥽�å� 
	 * 
	 * @param  �᡼�륢�ɥ쥹
	 * @return true
	 */
	function checkMailAddress($str)
	{
		if (!$str) {
			return false;
		}
		
		// "(���֥륯�����ơ������)�������
		// "example"@docomo.ne.jp
		$str = str_replace('"', '', $str);
		
		// <example@docomo.ne.jp> �Ȥ������ɥ쥹�ˤʤ뤳�Ȥ����롣
		//   ���ܸ� <example@docomo.ne.jp>
		// �Τ褦�ʾ���ʣ���ޥå������ǽ��������Τǡ�
		// �ޥå������Ǹ�Τ�Τ��äƤ���褦���ѹ�
		$matches = array();
		$regx = '/([\.\w!#$%&\'*+-\/=?^`{|}~]+@[\w!#$%&\'*+-\/=?^`{|}~]+(\.[\w!#$%&\'*+-\/=?^`{|}~]+)*)/';
		if (preg_match_all($regx, $str, $matches)) {
			return array_pop($matches[1]);
		}
		
		return false;
	}
	
	
	/**
	 * ����ͥ�������᥽�å�
	 * 
	 * @access private 
	 * @param string $filedir �������Υե�����ǥ��쥯�ȥ�
	 * @param string $fileThumNaildir ����ͥ�����ϥǥ��쥯�ȥ�
	 * @param string $filename �����ե�����̾
	 * @param string $thumb_size ����ͥ��벣������
	 * @return item 
	 */
	function makeThumbImage($filedir,$fileThumbDir,$filename,$thumb_size)
	{
		$src = $filedir.$filename;
		@$size = GetImageSize($src);
		// �ꥵ����
		@$keys = $thumb_size / $size[0];
		$out_w = $size[0] * $keys;
		$out_h = $size[1] * $keys;
		
		/*
		// ���ϲ����ʥ���ͥ���ˤΥ��᡼�������
		@$im_out = ImageCreateTrueColor($out_w, $out_h);
		// ��������Ĳ��Ȥ� ���ԡ�
		@ImageCopyResampled($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size[0], $size[1]);
		// ����ͥ����������¸
		switch ($size[2]) {
			case 1 : ImageGIF($im_out, $fileThumbDir.$filename); break;
			case 2 : ImageJPEG($im_out, $fileThumbDir.$filename); break;
			case 3 : ImagePNG($im_out, $fileThumbDir.$filename);  break;
		}
		// �����������᡼�����˴�
		@ImageDestroy($im_in);
		@ImageDestroy($im_out);
		*/
		
		// �Ѵ�
		$cmd = $this->config->get('imagemagick_path') . ' ' . $filedir.$filename. ' -resize ' . $out_w . 'x' . $out_h . ' ' . $fileThumbDir.$filename;
		system($cmd);
		// �ѡ��ߥå������ѹ�
		chmod($fileThumbDir.$filename, 0755);
		
		return $filename;
	}
	
	/**
	*  ����ͥ�������򥢥åץ��ɤ���
	*
	*  @access private
	*  @param  string  $imagePath,$image_id,$image_number
	*  @param  string  $file
	*  @return $filename
	*/
	function uploadThumbImage($imagePath, $file,$image_id)
	{
		$filename = "";
		if($file['error'] == UPLOAD_ERR_NO_FILE || $file == null){
			$filename = "";
		}else{
			// �ե�����̾����
			list($prev, $ext) = $this->extractName($file['name']);
			$ext = strtolower($ext);
			$filename = $image_id . '.' . $ext;
			//�����������
			list($size_x,$size_y)=getimagesize($file['tmp_name']);
			if($size_x > 240){
				
				//����͡��륵���������
				$sam_x = 240;
				$sam_y = ($sam_x * $size_y) / $size_x;
				
				/*
				// ����͡��륵�����Ѥ˺���
				// �ե��������� URL ���鿷�� JPEG �������������
				// �������������������ɽ�����᡼��ID���֤��ޤ��� 
				//$main_img = imagecreatefromjpeg($file['tmp_name']);//error
				$main_img = imagecreatefromstring(file_get_contents($file['tmp_name']));
				
				// ����͡��륵�����˽̾�
				// TrueColor ���᡼���򿷵��˺�������
				// ���ꤷ���礭���ι���������ɽ������ ID ���֤��ޤ��� 
				$sub_img = imagecreatetruecolor($sam_x,$sam_y);
				
				// �����ΰ����򥳥ԡ������������ѹ�����
				imagecopyresized($sub_img,$main_img,0,0,0,0,$sam_x,$sam_y,$size_x,$size_y);
				
				// ������֥饦���ޤ��ϥե�����˽��Ϥ���
				imagejpeg($sub_img, "$imagePath$filename", 100);
				
				// �������˴�����
				// �ݻ���������������ޤ��� 
				imagedestroy($sub_img);
				imagedestroy($main_img);
				*/
				
				// �Ѵ�
				$cmd = $this->config->get('imagemagick_path') . ' ' . $file['tmp_name'] . ' -resize ' . $sam_x . 'x' . $sam_y . ' ' . $imagePath.$filename;
				system($cmd);
				// �ѡ��ߥå������ѹ�
				chmod($imagePath.$filename, 0755);
				
			}else{
				$ret = copy($file['tmp_name'], "$imagePath$filename");
			}
		}
		return $filename;
	}
	
	/**
	 * �ե�����̾���ѹ�
	 * 
	 * @access     public
	 * @param string $f �ե�����ǡ���
	 * @return integer true/false
	 */
	function renameFile($f,$after)
	{
		// �ե����뤬�Ϥ��Ƥ��ʤ���票�顼
		if(!$f) return false;
		if(!is_file($f)) return false;
		
		// �ե�����̾����
		list($prev, $ext) = $this->extractName($f);
		$filename = $prev.strtolower($ext);
		
		//��͡���
		$r = rename($f,$after);
		// ���Ԥ������
		if(!$r) return false;
		
		return $after;
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
	
	/**
	 * ������ʸ������ϥ᥽�å� 
	 * 
	 * @param  
	 * @return �������ʸ����
	 */
	function getRandomStr(){
		 $str = "abcdefghijklmnopqrstuvwxyz123456789";
		 $len = strlen($str);
		 $ret = "";
			for($i=0;$i<16;$i++){
				$h = rand(0, $len-1);
				$ret .= substr($str,$h,1);
			}
		
		return $ret;
	}
	
	/**
	 * pager
	 * 
	 * @access private 
	 * @param string $total ����θ�����̤����
	 * @param string $offset ����ɽ������ڡ����Ǥϲ����ܤ���ɽ������Τ�
	 * @param string $count ���ڡ������ɽ��������
	 * @param string $action_name ���URL
	 * @return item 
	 */
	function getPager($total, $offset, $count, $action_name)
	{ 
		// �ڡ������֥������Ȥ�����
		$pager = Ethna_Util::getDirectLinkList($total, $offset, $count); 
		// ���ڡ����Υ��ե��å���
		$next = $offset + $count; 
		// ���ڡ����ǤΥ��ե��å��ͤ�����θ�����̤����̤���ξ������̤ξ���
		if($next < $total){
			$last = ceil($total / $count);
			$item['hasnext'] = true;
			$item['next'] = $next;
			$item['last'] = ($last * $count) - $count;
			$item['last_pagenum'] = $last;
		}else{
			$last = ceil($total / $count);
			$item['last_pagenum'] = $last;
		}
		$prev = $offset - $count;
		if($offset - $count >= 0){
			$item['hasprev'] = true;
			$item['prev'] = $prev;
		} 
		// ���ߤΥ��ե��å���
		$item['current'] = $offset;
		$item['current_pagenum'] = ceil($offset / $count) + 1;
		// ��󥯤θ��ˤʤ�ʸ����
		$link = '?' . $action_name . '=true'; //test
		$params = &$this->af->getArray();
		foreach($params as $key => $value){
			if($key == 'start') continue;
			if(is_array($value)){
				foreach($value as $key2 => $value2){
					if($value2 != '')
						//$link .= '&' . $key . '[' . $key2 . ']=' . urlencode(mb_convert_encoding($value2, "SJIS", "EUC-JP"));
						$link .= '&' . $key . '[' . $key2 . ']=' . urlencode($value2);
				}
			}else{
				if($value != '')
					//$link .= '&' . $key . '=' . urlencode(mb_convert_encoding($value, "SJIS", "EUC-JP"));
					$link .= '&' . $key . '=' . urlencode($value);
			}
		}
		$item['link'] = $link;
		$item['pager'] = $pager;
		return $item;
	}
	
	/*
	 * getPostage
	 * ���������
	 * @param array $cart_list ���ʾ���ꥹ��
	 * @param integer $pref �����轻���ֹ�
	 * @param array $unit_item_detail 
	 * @return integer ����
	 */
	/*
	 * ��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
	 * ��2��ȯ��ñ�̤�ʬ����
	 * ��3��ȯ��ñ�̤����
	 * ��4�������ơ��֥������
	 * ��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
	 * ��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������
	 * ��7��ȯ��ñ�̤��Ȥγƾ��ʤθ��������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤������פȤ��롣
	 * ��8��ȯ��ñ�̤��������פ���
	 */
	function getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $pref)
	{
		//��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
		$prepare_list 			= $this->getPrepareList($cart_list);
		$postage_id_list 		= $prepare_list['postage_id_list'];			//����ID�ꥹ��
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//�����ID�ꥹ��
		$item_postage_table 	= $prepare_list['item_postage_table'];		//�����ơ��֥�
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//������ơ��֥�
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//Ʊ����ǽ�ơ��֥벾
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//Ʊ���Բ�����
		
		//��2��ȯ��ñ�̤�ʬ����
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		
		//��3��ȯ��ñ�̤����
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		
		//��4�������ơ��֥������
		$postage_id_data = $this->generatePostageTable($postage_id_list, $pref);
		
		//��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������
		$postage_fee_list = $this->getPostageFeeList($unit, $unit_stock_detail, $item_postage_table, $postage_id_data, $item_bundle_status, $unit_total);
		
		//��7��ȯ��ñ�̤��Ȥγƾ��ʤθ��������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤������פȤ��롣
		$unit_most_low = $this->getPostageFee($postage_fee_list);
		
		//��8��ȯ��ñ�̤��������פ���
		$final_postage_fee = $this->getFinalPostageFee($unit_most_low);
		
		return $final_postage_fee;
	}
	
	/*
	 * getPrepareList
	 * 
	 */
	function getPrepareList($cart_list)
	{
		//��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
		$postage_id_list = array();
		$exchange_id_list = array();
		foreach($cart_list as $k => $v){
			// item_id�ꥹ�Ȥ��������
			$item_id_list[] = $v['item_id'];
			// cart_id�ꥹ�Ȥ��������
			$cart_id_list[] = $v['cart_id'];
			// stock_id�ꥹ�Ȥ��������
			$stock_id_list[] = $v['stock_id'];
			// cart_item_num�ꥹ�Ȥ��������
			$cart_item_num_list[$v['stock_id']] = $v['cart_item_num'];
			// postage_id�ꥹ�Ȥ��������
			$postage_id_list[] = $v['postage_id'];
			// item_id��postage_id���б��ơ��֥����������stock_id���ۤʤ뾦�ʤ��Ϥä��褿�Ȥ��Ƥ�[item_id]��[postage_id]���б��ط���Ʊ����
			$item_postage_table[$v['item_id']] = $v['postage_id'];
			// exchange_id�ꥹ�Ȥ��������
			$exchange_id_list[] = $v['exchange_id'];
			// item_id��exchange_id���б��ơ��֥����������stock_id���ۤʤ뾦�ʤ��Ϥä��褿�Ȥ��Ƥ�[item_id]��[exchange_id]���б��ط���Ʊ����
			$item_exchange_table[$v['item_id']] = $v['exchange_id'];
			// item_id��supplier_bundle_allow_id���б��ơ��֥���������
			$supplier =& new Tv_Supplier($this->backend, 'supplier_id', $v['supplier_id']);
			$item_allow_table_tmp1[$v['item_id']] = explode(':', $supplier->get('supplier_bundle_allow_id'));
			// stock_id��supplier_bundle_allow_id���б��ơ��֥���������
			$supplier =& new Tv_Supplier($this->backend, 'supplier_id', $v['supplier_id']);
			$stock_allow_table_tmp1[$v['stock_id']] = explode(':', $supplier->get('supplier_bundle_allow_id'));
			// Ʊ���Բ�����ʥ����Ͼ���ID
			$item_bundle_status[$v['item_id']] = $v['item_bundle_status'];
			// Ʊ���Բ�����ʥ����ϥ��ȥå��ʥ����ס�ID
			$stock_bundle_status[$v['stock_id']] = $v['item_bundle_status'];
		}
		// postage_id_list�ϥ�ˡ���������Ȥ���
		$postage_id_list = array_unique($postage_id_list);
		// exchange_id_list�ϥ�ˡ���������Ȥ���
		$exchange_id_list = array_unique($exchange_id_list);
		//set
		$prepare_list['item_id_list'] = $item_id_list;
		$prepare_list['cart_id_list'] = $cart_id_list;
		$prepare_list['stock_id_list'] = $stock_id_list;
		$prepare_list['cart_item_num_list'] = $cart_item_num_list;
		$prepare_list['postage_id_list'] = $postage_id_list;
		$prepare_list['exchange_id_list'] = $exchange_id_list;
		$prepare_list['item_postage_table'] = $item_postage_table;
		$prepare_list['item_exchange_table'] = $item_exchange_table;
		$prepare_list['item_allow_table_tmp1'] = $item_allow_table_tmp1;
		$prepare_list['stock_allow_table_tmp1'] = $stock_allow_table_tmp1;
		$prepare_list['item_bundle_status'] = $item_bundle_status;
		$prepare_list['stock_bundle_status'] = $stock_bundle_status;
		
		return $prepare_list;
		
	}
	
	/*
	 * splitUnit
	 * 
	 */
	function splitUnit($item_allow_table_tmp1, $item_bundle_status)
	{
		//��2��ȯ��ñ�̤�ʬ����
		//���󤫤�""�������
		$item_allow_table_tmp1 = array_map('array_filter', $item_allow_table_tmp1);
		//������
		foreach($item_allow_table_tmp1 as $k => $v){
			$temp = $v;
			sort($temp);
			$item_allow_table_tmp2[$k] = $temp;
		}
		//��ӽ����Τ��������
		foreach($item_allow_table_tmp2 as $k => $v) $item_allow_table_tmp3[$k] = implode(',',$v);
		// Ʊ���Ǥ��ʤ����̤ʾ��ʤ�Ʊ����ǽ�ɣĤ�0�ˤ��Ƥ���
		foreach($item_allow_table_tmp3 as $k => $v){
			if($item_bundle_status[$k] != 1){
				$item_allow_table_tmp4[$k] = $v;
			}else{
				$item_allow_table_tmp4[$k] = 0;
			}
		}
		return $item_allow_table_tmp4;
	}
	
	/*
	 * getUnitList
	 *
	 */
	function getUnitList($item_allow_table_tmp4, $unit_item_detail)
	{
		//��3��ȯ��ñ�̤����
		$i=0;
		foreach($item_allow_table_tmp4 as $k => $v){
			$hit_key = array_keys($item_allow_table_tmp4, $item_allow_table_tmp4[$k]);
			if($hit_key !== false && false === @array_search($hit_key, $hit_key_list)){
				//Ʊ���Ǥ��ʤ��ü�ʾ��ʤʤ�
				if($v == 0){
					//���ι����Ŀ�ʬȯ�������ȯ��ñ��$unit��++��
					for($i=1;$i<=$unit_item_detail[$k]['cart_item_num'];$i++){
						$hit_key_list[] = $hit_key;
						$unit[$i] = $hit_key;
					}
				}else{
					$hit_key_list[] = $hit_key;
					$unit[$i] = $hit_key;
				}
				$i++;
			}
		}
		return $unit;
		//unit = Array ( [0] => Array ( [0] => 93 [1] => 96 [2] => 94 ) [1] => Array ( [0] => 95 [1] => 92 ) ) 
	}
	
	/*
	 * generatePostageTable
	 *
	 */
	function generatePostageTable($postage_id_list, $pref)
	{
		//��4�������ơ��֥������
		$db = $this->backend->getDB();
		$postage_csv_id = implode(',', $postage_id_list);
		$sqlSelect = " * ";
		$sqlFrom = "postage";
		$sqlWhere = " postage_id in ( ".$postage_csv_id." ) ";
		$sql = "select " . $sqlSelect . "from " . $sqlFrom . " where " . $sqlWhere;
		$postage_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		// ���٤Ƥλ�������Ф��ƽ�����Ԥ�
		// postage_id��postage_type��postage_same_price���б��ơ��֥������
		$postage_id_data = array();
		foreach($postage_list as $k => $v){
			// postage_id��postage_type���б��ơ��֥���������
			$postage_id_data[$v['postage_id']]['type'] = $v['postage_type'];
			//��Χ
			if($v['postage_type'] == 1) $postage_id_data[$v['postage_id']]['same_price'] 		= $v['postage_same_price'];
			//�ϰ�
			if($v['postage_type'] == 2) $postage_id_data[$v['postage_id']]['pref_price'] 		= $v['postage_pref_'.$pref];
			//��׶��
			if($v['postage_type'] == 3) $postage_id_data[$v['postage_id']]['total_price'] 		= $v['postage_total_price_set'];
			if($v['postage_type'] == 3) $postage_id_data[$v['postage_id']]['total_price_under'] = $v['postage_total_price_set_under'];
			//��׸Ŀ�
			if($v['postage_type'] == 4) $postage_id_data[$v['postage_id']]['total_sum'] 		= $v['postage_total_piece_set'];
			if($v['postage_type'] == 4) $postage_id_data[$v['postage_id']]['total_sum_under'] 	= $v['postage_total_piece_set_under'];
		}
		return $postage_id_data;
	}
	
	/*
	 * prepareUnitTotal
	 *
	 */
	function prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail)
	{
		//��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
		$i=0;
		foreach($unit as $k => $v){
			//ȯ��ñ����ι�׶��
			$unit_total_price = 0;
			//ȯ��ñ����ι�׸Ŀ�
			$unit_total_num = 0;
			foreach($v as $k2 => $v2){
				if($item_bundle_status[$v2] == 1){
					$unit_total_price = $unit_item_detail[$v2]['item_price'];
					$unit_total_num = 1;
				}else{
					$unit_total_price += $unit_item_detail[$v2]['subtotal'];
					$unit_total_num += $unit_item_detail[$v2]['cart_item_num'];
				}
			}
			$unit_total[$i]['total_price'] = $unit_total_price;
			$unit_total[$i]['total_num'] = $unit_total_num;
			$i++;
		}
		return $unit_total;
	}
	
	/*
	 * getPostageFeeList
	 *
	 */
	function getPostageFeeList($unit, $unit_item_detail, $item_postage_table, $postage_id_data, $item_bundle_status, $unit_total)
	{
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������
		$postage_fee_list = array();
		$i=0;
		foreach($unit as $k => $v){
			foreach($v as $k2 => $v2){
				$postage_fee_list[$i][$v2]['item_price'] = $unit_item_detail[$v2]['item_price'];
				$postage_fee_list[$i][$v2]['cart_item_num'] = $unit_item_detail[$v2]['cart_item_num'];
				$postage_fee_list[$i][$v2]['subtotal'] = $unit_item_detail[$v2]['subtotal'];
				$postage_fee_list[$i][$v2]['postage_id'] = $item_postage_table[$v2];
				$postage_fee_list[$i][$v2]['postage_type'] = $postage_id_data[$item_postage_table[$v2]]['type'];
				
				//�緿���ʤʤ��ü��Ʊ���Ǥ��ʤ����ʤξ��
				if($item_bundle_status[$v2]){
					//��Χ
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 1){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['same_price'];
					}
					//�ϰ�
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 2){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['pref_price'];
					}
					//��׶��
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 3){
						//����ñ�Σ��Ĥβ��ʤ��ֹ�׶������פ������ͤ�Ķ���Ƥ����0��
						if($unit_item_detail[$v2]['item_price'] >= $postage_id_data[$item_postage_table[$v2]]['total_price']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}
						//�����Ƥ��ʤ���С������ͤ������ʤ����ζ�ۡפ�����
						else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_price_under'];
						}
					}
					//��׸Ŀ�
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 4){
						// �緿���ʤʤɤ�Ʊ���Բ�ǽ���ü�ʾ��ʤ�1�Ĥ���ȯ������
						if(1 >= $postage_id_data[$item_postage_table[$v2]]['total_sum']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}
						//ȯ��ñ����ι�׸Ŀ����ֹ�׸Ŀ�����פ������ͤ�Ķ���ʤ����ϡ������ͤ������ʤ����ζ�ۡפ�����
						else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_sum_under'];
						}
					}
				}else{
					//��Χ
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 1){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['same_price'];
					}
					//�ϰ�
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 2){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['pref_price'];
					}
					//��׶��
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 3){
						if($unit_total[$i]['total_price'] >= $postage_id_data[$item_postage_table[$v2]]['total_price']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_price_under'];
						}
					}
					//��׸Ŀ�
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 4){
						if($unit_total[$i]['total_num'] >= $postage_id_data[$item_postage_table[$v2]]['total_sum']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_sum_under'];
						}
					}
				}
			}
			$i++;
		}
		return $postage_fee_list;
	}
	
	/*
	 * getPostageFee
	 *
	 */
	function getPostageFee($postage_fee_list)
	{
		//��7��ȯ��ñ�̤��Ȥγƾ��ʤθ��������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤������פȤ��롣��ȯ��ñ�̤������פ��פ���
		foreach($postage_fee_list as $k => $v){
			$most_low = false;
			foreach($v as $k2 => $v2){
				//�ǽ�Ϻǰ��ͤ������ϥ��졣
				if($most_low === false) $most_low = $v2['postage_fee'];
				//������������¤����
				if($most_low >= $v2['postage_fee']) $most_low = $v2['postage_fee'];
			}
			//ȯ��ñ�̤��Ȥκǰ��ͤ�����
			$unit_most_low[$k] = $most_low;
		}
		return $unit_most_low;
	}
	
	/*
	 * getFinalPostageFee
	 *
	 */
	function getFinalPostageFee($unit_most_low)
	{
		//��8��ȯ��ñ�̤��������פ���return
		$final_postage_fee = array_sum($unit_most_low);
		return $final_postage_fee;
	}
	
	/*
	 * getExchangeFee
	 * ���������������
	 * @param array $cart_list ���ʾ���ꥹ��
	 * @param array $unit_item_detail 
	 * @return integer $exchange_fee ����������
	 */
	/* 
	 * ��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
	 * ��2��ȯ��ñ�̤�ʬ����
	 * ��3��ȯ��ñ�̤����
	 * ��4�������������ơ��֥������
	 * ��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
	 * ��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������������
	 * ��7��ȯ��ñ�̤��Ȥ������������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤����������פȤ���
	 * ��8��ȯ��ñ�̤������������פ��롣
	*/
	function getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail)
	{
		//��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
		$prepare_list 			= $this->getPrepareList($cart_list);
		$postage_id_list 		= $prepare_list['postage_id_list'];			//����ID�ꥹ��
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//�����ID�ꥹ��
		$item_postage_table 	= $prepare_list['item_postage_table'];		//�����ơ��֥�
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//������ơ��֥�
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//Ʊ����ǽ�ơ��֥벾
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//Ʊ���Բ�����
		
		//��2��ȯ��ñ�̤�ʬ����
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		
		//��3��ȯ��ñ�̤����
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		
		//��4�������������ơ��֥������
		$exchange_id_data = $this->generateExchangeTable($exchange_id_list);
		
		//��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������������
		$exchange_fee_list = $this->getExchangeFeeList($unit, $unit_stock_detail, $item_exchange_table, $exchange_id_data, $item_bundle_status, $unit_total);
		
		//��7��ȯ��ñ�̤��Ȥ������������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤����������פȤ��롣
		$unit_most_low = $this->exchangeFee($exchange_fee_list);
		
		//��8��ȯ��ñ�̤������������פ��롣
		$final_exchange_fee = $this->getFinalExchangeFee($unit_most_low);
		
		return $final_exchange_fee;
	}
	
	/*
	 * generateExchangeTable
	 *
	 */
	function generateExchangeTable($exchange_id_list)
	{
		//��4�������������ơ��֥������
		$db = $this->backend->getDB();
		$exchange_csv_id = implode(',', $exchange_id_list);
		$sqlSelect = " exchange_id, exchange_type, exchange_total_price_set, exchange_total_price_set_under, exchange_total_price_value, ".
						"exchange_total_piece_set, exchange_total_piece_set_under,exchange_total_piece_value, exchange_same_price ";
		$sqlWhere = " exchange_id in ( ".$exchange_csv_id." ) ";
		$sql = "select " . $sqlSelect . "from exchange where " . $sqlWhere;
		$exchange_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		$db = $this->backend->getDB();
		// ���٤Ƥλ�������Ф��ƽ�����Ԥ�
		// exchange_id��exchange_type��exchange_same_price���б��ơ��֥������
		$exchange_id_data = array();
		foreach($exchange_list as $k => $v){
			// exchange_id��exchange_type���б��ơ��֥���������
			$exchange_id_data[$v['exchange_id']]['type'] = $v['exchange_type'];
			//��Χ
			if($v['exchange_type'] == 1) $exchange_id_data[$v['exchange_id']]['same_price'] = $v['exchange_same_price'];
			//�ϰ�
			if($v['exchange_type'] == 2){
				$sql = "select exchange_range_start,exchange_range_end,exchange_range_price from exchange_range where exchange_id = ? ";
				$r = $db->db->getAll($sql, array($v['exchange_id']), DB_FETCHMODE_ASSOC);
				$i=0;
				foreach($r as $rk => $rv){
					$exchange_id_data[$v['exchange_id']][$i]['exchange_range_start'] = $rv['exchange_range_start'];
					$exchange_id_data[$v['exchange_id']][$i]['exchange_range_end'] = $rv['exchange_range_end'];
					$exchange_id_data[$v['exchange_id']][$i]['exchange_range_price'] = $rv['exchange_range_price'];
					$i++;
				}
			}
			//��׶��
			if($v['exchange_type'] == 3) $exchange_id_data[$v['exchange_id']]['total_price'] = $v['exchange_total_price_set'];
			if($v['exchange_type'] == 3) $exchange_id_data[$v['exchange_id']]['total_price_under'] = $v['exchange_total_price_set_under'];
			//��׸Ŀ�
			if($v['exchange_type'] == 4) $exchange_id_data[$v['exchange_id']]['total_sum'] = $v['exchange_total_piece_set'];
			if($v['exchange_type'] == 4) $exchange_id_data[$v['exchange_id']]['total_sum_under'] = $v['exchange_total_piece_set_under'];
		}
		return $exchange_id_data;
	}
	
	/*
	 * getExchangeFeeList
	 *
	 */
	function getExchangeFeeList($unit, $unit_item_detail, $item_exchange_table, $exchange_id_data, $item_bundle_status, $unit_total)
	{
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������������
		$exchange_fee_list = array();
		$i=0;
		foreach($unit as $k => $v){
			foreach($v as $k2 => $v2){
				$exchange_fee_list[$i][$v2]['item_price'] = $unit_item_detail[$v2]['item_price'];
				$exchange_fee_list[$i][$v2]['cart_item_num'] = $unit_item_detail[$v2]['cart_item_num'];
				$exchange_fee_list[$i][$v2]['subtotal'] = $unit_item_detail[$v2]['subtotal'];
				$exchange_fee_list[$i][$v2]['excahnge_id'] = $item_exchange_table[$v2];
				$exchange_fee_list[$i][$v2]['excahnge_type'] = $exchange_id_data[$item_exchange_table[$v2]]['type'];
				// �緿���ʤʤɤ�Ʊ���Բ�ǽ�ʾ��ʤϼ����*�Ŀ��Ȥ����item_bundle_status=1��
				if($item_bundle_status[$v2]){
					//��Χ
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 1){
						$exchange_fee_list[$i][$v2]['exchange_fee'] = 
							$exchange_id_data[$item_exchange_table[$v2]]['same_price'];
					}
					//�ϰ�
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 2){
						foreach($exchange_id_data[$item_exchange_table[$v2]] as $k3 => $v3){
							if(is_array($v3)){
								foreach($v3 as $k4 => $v4) $range_list[$item_exchange_table[$v2]][$k3][$k4] = $v4;
							}
						}
						foreach($range_list[$item_exchange_table[$v2]] as $k5 => $v5){
							if( ($unit_item_detail[$v2]['item_price'] >= $v5[exchange_range_start]) && 
								($unit_item_detail[$v2]['item_price'] <= $v5[exchange_range_end]) ) {
								$exchange_fee_list[$i][$v2]['exchange_fee'] = $v5[exchange_range_price];
							}
						}
					}
					//��׶��
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 3){
						//
						if($unit_item_detail[$v2]['item_price'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_price']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//ȯ��ñ����ι�׶�ۤ��ֹ�׶������פ������ͤ�Ķ���ʤ����ϡ������ͤ������ʤ����ζ�ۡפ�����
						else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 
								$exchange_id_data[$item_exchange_table[$v2]]['total_price_under'];
						}
					}
					//��׸Ŀ�
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 4){
						// �緿���ʤʤɤ�Ʊ���Բ�ǽ���ü�ʾ��ʤ�1�Ĥ���ȯ������
						if(1 >= $exchange_id_data[$item_exchange_table[$v2]]['total_sum']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//ȯ��ñ����ι�׸Ŀ����ֹ�׸Ŀ�����פ������ͤ�Ķ���ʤ����ϡ������ͤ������ʤ����ζ�ۡפ�����
						else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 
								$exchange_id_data[$item_exchange_table[$v2]]['total_sum_under'];
						}
					}
				}
				// �緿���ʤʤɤ�Ʊ���Բ�ǽ�ʾ��ʤǤʤ���item_bundle_status=0��
				else{
					//��Χ
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 1) $exchange_fee_list[$i][$v2]['exchange_fee'] = $exchange_id_data[$item_exchange_table[$v2]]['same_price'];
					//�ϰ�
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 2){
						foreach($exchange_id_data[$item_exchange_table[$v2]] as $k3 => $v3){
							if(is_array($v3)){
								foreach($v3 as $k4 => $v4){
									$range_list[$item_exchange_table[$v2]][$k3][$k4] = $v4;
								}
							}
						}
						foreach($range_list[$item_exchange_table[$v2]] as $k5 => $v5){
							if( ($unit_total[$i]['total_price'] >= $v5[exchange_range_start]) && 
								($unit_total[$i]['total_price'] <= $v5[exchange_range_end]) ) {
								$exchange_fee_list[$i][$v2]['exchange_fee'] = $v5[exchange_range_price];
							}
						}
					}
					//��׶��
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 3){
						if($unit_total[$i]['total_price'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_price']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = $exchange_id_data[$item_exchange_table[$v2]]['total_price_under'];
						}
					}
					//��׸Ŀ�
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 4){
						//ȯ��ñ����ι�׸Ŀ����ֹ�׸Ŀ�����פ������ͤ�Ķ�����������0��
						if($unit_total[$i]['total_num'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_sum']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//ȯ��ñ����ι�׸Ŀ����ֹ�׸Ŀ�����פ������ͤ�Ķ���ʤ����ϡ������ͤ������ʤ����ζ�ۡפ�����
						else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = $exchange_id_data[$item_exchange_table[$v2]]['total_sum_under'];
						}
					}
				}
			}
			$i++;
		}
		return $exchange_fee_list;
	}
	
	/*
	 * exchangeFee
	 *
	 */
	function exchangeFee($exchange_fee_list)
	{
		//��7��ȯ��ñ�̤��Ȥ������������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤����������פȤ��롣��ȯ��ñ�̤����������פ��פ��롣
		foreach($exchange_fee_list as $k => $v){
			$most_low = false;
			foreach($v as $k2 => $v2){
				//�ǽ�������������������
				if($most_low === false) $most_low = $v2['exchange_fee'];
				//����μ�������������¤��ʤ�
				if($most_low >= $v2['exchange_fee']) $most_low = $v2['exchange_fee'];
			}
			//ȯ��ñ�̤��Ȥκǰ��ͤμ����
			$unit_most_low[$k] = $most_low;
		}
		return $unit_most_low;
	}
	
	/*
	 * getFinalExchangeFee
	 *
	 */
	function getFinalExchangeFee($unit_most_low)
	{
		//��8����ȯ��ñ�̤����������פ��פ��롣
		$final_exchange_fee = array_sum($unit_most_low);
		return $final_exchange_fee;
	}
	
	/*
	 * insertPostUnit
	 * ȯ��ñ�̤�post_unit�ơ��֥����Ͽ����
	 */
	function insertPostUnit($cart_list, $unit_item_detail, $unit_stock_detail)
	{
		//����
		//��1�����ʾ���ꥹ�ȡ��㤤ʪ�����ˤ򷫤��֤����ƥꥹ�Ȥ��������
		$prepare_list 			= $this->getPrepareList($cart_list);
		$item_id_list 			= $prepare_list['item_id_list'];			//����ID�ꥹ�ȡʥ����פ�����Τǽ�ʣ�⤢���
		$cart_id_list 			= $prepare_list['cart_id_list'];			//������ID�ꥹ��
		$stock_id_list 			= $prepare_list['stock_id_list'];			//���ȥå��ʥ����ס�ID�ꥹ��
		$cart_item_num_list 			= $prepare_list['cart_item_num_list'];			//�����Ŀ��ꥹ��
		$postage_id_list 		= $prepare_list['postage_id_list'];			//����ID�ꥹ��
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//�����ID�ꥹ��
		$item_postage_table 	= $prepare_list['item_postage_table'];		//�����ơ��֥�
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//������ơ��֥�
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//����ID����Ʊ����ǽ�ơ��֥벾
		$stock_allow_table_tmp1 = $prepare_list['stock_allow_table_tmp1'];	//���ȥå��ʥ����ס�ID����Ʊ����ǽ�ơ��֥벾
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//Ʊ���Բ����� key=item_id
		$stock_bundle_status 		= $prepare_list['stock_bundle_status'];		//Ʊ���Բ����� key=stock_id
		//��2��ȯ��ñ�̤�ʬ����
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		$stock_allow_table_tmp4 = $this->splitUnitStock($stock_allow_table_tmp1, $stock_bundle_status);
		//��3��ȯ��ñ�̤����
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		$stock_unit = $this->getUnitListStock($stock_allow_table_tmp4, $unit_stock_detail);
		
		//����
		//��4�������ơ��֥������
		$postage_id_data = $this->generatePostageTable($postage_id_list, $pref);
		//��5��ȯ��ñ����ι�׶�ۤȹ�׸Ŀ������
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������
		$postage_fee_list = $this->getPostageFeeList($unit, $unit_stock_detail, $item_postage_table, $postage_id_data, $item_bundle_status, $unit_total);
		//��7��ȯ��ñ�̤��Ȥγƾ��ʤθ��������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤������פȤ��롣
		$unit_most_low_p = $this->getPostageFee($postage_fee_list);
		
		//�����
		//��4�������������ơ��֥������
		$exchange_id_data = $this->generateExchangeTable($exchange_id_list);
		//��6��ȯ��ñ�̤��Ȥ˳ƾ��ʤθ����������������������
		$exchange_fee_list = $this->getExchangeFeeList($unit, $unit_stock_detail, $item_exchange_table, $exchange_id_data, $item_bundle_status, $unit_total);
		//��7��ȯ��ñ�̤��Ȥ������������ǰ��ְ¤��ͤ򡢡�ȯ��ñ�̤����������פȤ��롣
		$unit_most_low_e = $this->exchangeFee($exchange_fee_list);
		
		//�����򿶤�ľ��
		//Array ( [1] => Array ( [0] => 93 ) [2] => Array ( [0] => 93 ) [4] => Array ( [0] => 99 [1] => 95 [2] => 92 ) )
		$stock_unit = array_values($stock_unit);
		//Array ( [0] => Array ( [0] => 93 ) [1] => Array ( [0] => 93 ) [2] => Array ( [0] => 99 [1] => 95 [2] => 92 ) )
		
		//���줾���stock_id�ʥ����סˤ��ɤ�ȯ��ñ�̤�
		$db = $this->backend->getDB();
		
		foreach($stock_id_list as $k => $v){
			foreach($stock_unit as $k2 => $v2){
				$res = array_search($v, $v2);
				if($res !== false){
					//null�ʤ�������0�ߤ�
					if(is_null($unit_most_low_p[$k2])) $unit_most_low_p[$k2] = 0;
					//null�ʤ�������0�ߤ�
					if(is_null($unit_most_low_e[$k2])) $unit_most_low_e[$k2] = 0;
					//Ʊ���ԲĤʤ�ȯ���Ŀ���1�Ĥ�
					if($stock_bundle_status[$v]){
						$post_unit_item_num = 1;
					}else{
						$post_unit_item_num = $cart_item_num_list[$v];
					}
					$values = array(
						'cart_hash' 					=> $cart_list[0]['cart_hash'],
						'cart_id' 						=> $cart_id_list[$k],
						'item_id' 						=> $item_id_list[$k],
						'stock_id' 						=> $stock_id_list[$k],
						'post_unit_item_num'			=> $post_unit_item_num,
						'post_unit_group_id' 			=> $k2 + 1,
						'post_unit_group_postage_fee' 	=> $unit_most_low_p[$k2],
						'post_unit_group_exchange_fee' 	=> $unit_most_low_e[$k2],
						'post_unit_created_time' 		=> date('Y-m-d H:i:s'),
					);
					$res = $db->db->autoExecute('post_unit', $values, DB_AUTOQUERY_INSERT);
					if (PEAR::isError($res)) return 'user_error';
				}
			}
		}
	}
	
	/*
	 * splitUnitStock
	 *
	 */
	function splitUnitStock($item_allow_table_tmp1, $item_bundle_status)
	{
		//��2��ȯ��ñ�̤�ʬ����
		//���󤫤�""�������
		$item_allow_table_tmp1 = array_map('array_filter', $item_allow_table_tmp1);
		//������
		foreach($item_allow_table_tmp1 as $k => $v){
			$temp = $v;
			sort($temp);
			$item_allow_table_tmp2[$k] = $temp;
		}
		//��ӽ����Τ��������
		foreach($item_allow_table_tmp2 as $k => $v) $item_allow_table_tmp3[$k] = implode(',',$v);
		// Ʊ���Ǥ��ʤ����̤ʾ��ʤ�Ʊ����ǽ�ɣĤ�0�ˤ��Ƥ���
		foreach($item_allow_table_tmp3 as $k => $v){
			if($item_bundle_status[$k] != 1){
				$item_allow_table_tmp4[$k] = $v;
			}else{
				$item_allow_table_tmp4[$k] = 0;
			}
		}
		return $item_allow_table_tmp4;
	}
	
	/*
	 * getUnitListStock
	 *
	 */
	function getUnitListStock($item_allow_table_tmp4, $unit_stock_detail)
	{
		foreach($item_allow_table_tmp4 as $k => $v){
			//array_keys �� ����Υ����򤹤٤��֤�(������������ꤵ�줿��硢 ���ꤷ���ͤ˴ؤ��륭���Τߤ��֤���ޤ�)
			$hit_key = array_keys($item_allow_table_tmp4, $item_allow_table_tmp4[$k]);
			//Ʊ���Բ����ꤵ��Ƥ���
			if($v === 0){
				//���ι����Ŀ�ʬȯ�������ȯ��ñ��$unit��++��
				for($i=1;$i<=$unit_stock_detail[$k]['cart_item_num'];$i++){
					$hit_key_list[] = $hit_key;
					//$unit[$i] = $hit_key;
					$unit[] = array($k);
				}
				$item_allow_table_tmp4[$k] = false;//Ƚ�꤬��λ������false�ˤ��Ƥ������Ȥǡ����٥ҥåȤ��ʤ���
			}
			//Ʊ���Բ����ꤵ��Ƥ��ʤ�
			else{
				//array_search �� ���ꤷ���ͤ�����Ǹ����������Ĥ��ä������б����륭�����֤�
				if($hit_key !== false && false === @array_search($hit_key, $hit_key_list)){
					//Ʊ���Ǥ��ʤ��ü�ʾ��ʤʤ�
					$hit_key_list[] = $hit_key;
					$unit[] = $hit_key;
				}
			}
			$i++;
		}
		return $unit;
	}
	
	/**
	 * ���ʤ���������ID���֤�
	 * 
	 * @return  int
	 */
	function getPostageId($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		return $i->get('postage_id');
	}
	
	/**
	 * ���ʤ����������פ��֤�
	 * 
	 * @return  1:����,2:�ϰ�,3:��׶��,4:��׸Ŀ�
	 */
	function getPostageType($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$postage_id = $i->get('postage_id');
		$p = new Tv_Postage($this->backend, 'postage_id', $postage_id);
		$postage_type = $p->get('postage_type');
		return $postage_type;
	}
	
	/**
	 * ���ʤ������ɷ�Ѳ�ǽ��
	 * 
	 * @return  1:��ǽ
	 */
	function getItemUseCreditStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$status = $i->get('item_use_credit_status');
		return $status;
	}
	
	/**
	 * ���ʤ�����ӥ˷�Ѳ�ǽ��
	 * 
	 * @return  1:��ǽ
	 */
	function getItemUseConveniStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_conveni_status');
		return $flag;
	}
	
	/**
	 * ���ʤ������Ѳ�ǽ��
	 * 
	 * @return  1:��ǽ
	 */
	function getItemUseExchangeStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_exchange_status');
		return $flag;
	}
	
	/**
	 * ���ʤ���Կ�����߷�Ѳ�ǽ��
	 * 
	 * @return  1:��ǽ
	 */
	function getItemUseTransferStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_transfer_status');
		return $flag;
	}
	
	/**
	*  �������¤��ͭ���륷��å׾�����������
	*  @access private
	*  @return $shop_list
	*/
	function getAuthShopList()
	{
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$um = $backend->getManager('Util');
		
		$admin = $this->session->get('admin');
		$a =& new Tv_Admin($this->backend, 'admin_id', $admin['admin_id']);
		$admin_shop_id = $a->get('admin_shop_id');
		
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'shop_status = 1 AND shop_id in(' . $admin_shop_id . ')';
		$param = array(
			'sql_select'	=> 'shop_id, shop_name',
			'sql_from'		=> 'shop',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> "shop_id",
		);
		$r = $um->dataQuery($param);
		return $r;
	}
	
	/*
	 * sendOrderRequest
	 * ���夲���̤�����
	 */
	function sendOrderRequest($type,$values)
	{
		// ��ѥ����Хۥ���
		$host = $this->config->get('payment_host');
		// ��ѥ����Хѥ�
		$path = $this->config->get('payment_path');
		// ��ѥ����Х�����ץ�
		$script = $this->config->get('payment_script_' . $type);
		// �����������
		foreach($values as $k => $v){
			$query .= $k . "=" . urlencode($v) . "&";
		}
		// ���������Ϳ������
		$query .= $this->config->get('payment_query_' . $type);
		
		//file �� �ե��������Τ��ɤ߹��������˳�Ǽ����
		//join �� implode() �Υ����ꥢ��
		//implode �� �������Ǥ�ʸ����ˤ��Ϣ�뤹��
		//split �� ����ɽ���ˤ��ʸ�����ʬ�䤷������˳�Ǽ����
		$request = "$host$path$script?$query";
		$ret = @join('',@file($request));
		return split("\n",$ret);
	}
	
	/*
	 * ͹���ֹ��API���������ƽ��������餦
	 *  @param  string  $zip
	 *  @return $address // 0:͹���ֹ� 1:��ƻ�ܸ�̾ 2:�Զ� 3:Į¼
	 */
	function getAddressByZip($zip)
	{
		/*
		html��ˤ�����������äƤ�����ʬ����Ϥ���
		<td class="data"><small>145-0062</small></td>
		<td class="data"><small>�����</small></td>
		<td class="data"><small>���Ķ�</small></td>
		<td>
			<div class="data">
				<p><small><a href="zipcode.php?pref=13&city=1131110&addr=%E5%8C%97%E5%8D%83%E6%9D%9F&cmp=1">����«</a></small></p>
				<p class="comment"><small>�������󥾥�</small></p>
			</div>
		</td>
		*/
		if(!$zip) return '';
		// ����͹�ؤ�͹���ֹ渡���ڡ���
		$_url = "http://search.post.japanpost.jp/cgi-zip/zipcode.php?zip={$zip}";
		// html���������
		$html = $this->getHtml( $_url );
		if(!$html) return '';
		$addrArray = array();
		// ͹���ֹ桢��ƻ�ܸ����Զ�̾
		$pattern = "<td class=\"data\"><small>(.*)<\/small><\/td>";
		if(preg_match_all ( "/".$pattern."/i", $html, $match )){
			foreach($match[1] as $k=>$v){
				$addrArray[] = mb_convert_encoding($v,'EUC-JP','auto');
			}
		}
		// Į¼̾
		$pattern = "<p><small><a href=\"zipcode.php(.*)>(.*)<\/a><\/small><\/p>";
		if(preg_match( "/".$pattern."/i", $html, $match )){
			$addrArray[] = mb_convert_encoding($match[2],'EUC-JP','auto');
		}
		
		return $addrArray;
	 }
	 
	/*
	 * URL����HTML���������᥽�å�
	 *  @param  string  $url
	 *  @return $html
	 */
	function getHtml( $url ) 
	{
		$_data = null;
		if( $_http = fopen( $url, "r" ) ) {
			while( !feof( $_http ) ) {
				$_data .= fgets( $_http, 1024 );
			}
			fclose( $_http );
		}
		return $_data;
	}
}
?>
