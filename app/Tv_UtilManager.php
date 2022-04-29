<?php
/**
 * Tv_UtilManager.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーティルマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Net/IPv4.php';
class Tv_UtilManager extends Ethna_AppManager
{
	/**
	 * オプション選択
	 */
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
			// 年
			case 'year': 
				for($i = 2008;$i <= date('Y')+3;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 誕生年
			case 'birth_year': 
				for($i = 1930;$i <= date('Y')+3;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 月
			case 'month': 
				for($i = 1;$i <= 12;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 日
			case 'day': 
				for($i = 1;$i <= 31;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 時
			case 'hour': 
				for($i = 0;$i <= 23;$i++){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 10分間隔
			case '10min': 
				for($i = 0;$i <= 50;$i=$i+10){
					$data[$i]['name'] = $i;
				}
				return $data;
				break;
			// 性別
			case 'sex_type':
				$data = array(
					'0' => array('name' => '男女'),
					'1' => array('name' => '男のみ'),
					'2' => array('name' => '女のみ'),
				);
				return $data;
				break;
			// コミュニティカテゴリ
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
			// アバターカテゴリ
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
			// アバター台座
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
			// デコメールカテゴリ
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
			// ゲームカテゴリ
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
			// サウンドカテゴリ
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
			// ビデオカテゴリ
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
			// 広告カテゴリ
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
			// 広告コード
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
			// セグメント
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
			// 商品
			case 'item':
				// 商品情報の取得
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
			// 商品カテゴリ
			case 'item_category':
				// 検索条件を生成
				$where = array('item_category_status' => 1);
				
				// item_catregory_idを取得
				$item_category_id = $this->af->get('item_category_id');
				// item_category_idが複数ある場合
				// shop_idがある場合
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
					// item_category_idが一つのみの場合
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
				// ショップ情報の取得
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
				// 送料情報の取得
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
				// 代引き手数料情報の取得
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
				// 仕入れ情報の取得
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
				// 管理権限を持つショップ情報の取得
				$result = $this->getAuthShopList();
				$data = array();
				foreach($result as $item){
					$data[$item['shop_id']] = array(
						'name' => $item['shop_name'],
					);
				}
				$data = $data;
				break;
			// デフォルト
			default:
				$data = $this->config->get($attr_name);
		}
		if(count($data) > 0) return $data;
		return array(array('name' =>''));
	}
	
	/**
	 * 指定時間前の日時を返却する
	 * @param
		$type
			year,month,day,hour
		$pre 
			数字で指定する -1など
		date("Y-m-d H",$this->getPreDate('day',-1)) // 昨日の日付
		date("Y-m-d H",$this->getPreDate('hour',-1)); // 1時間前の日付
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
	 * 指定年月週の開始日と終了日を取得する
	 */
	function getDayOfWeekRange($year, $month, $weekno)
	{
		// 指定月1日の曜日（0:日曜日,6:土曜日）
		$one_w = date("w", mktime(0, 0, 0, $month , 1, $year ));
		// 1週目の日数
		if($one_w == 0){
			$one_week_count = 1;
		}else{
			$one_week_count = 8 - $one_w;
		}
		// 1週目以外の場合、1週目の日数を加算する
		if($weekno > 1){
			$start_day = $one_week_count;
			$end_day = $one_week_count;
			// 集計開始日の決定
			$start_day += 7 * ($weekno-2) +1;
			// 集計終了日の決定
			$end_day += 7 * ($weekno-1);
			// 月末にまたがる場合の計算
			$last_day = date("d", mktime(0, 0, 0, $month + 1 , 0, $year ) );
			// 集計終了日が翌月になる場合は月末日に差し替える
			if($end_day > $last_day ) $end_day = $last_day;
		}
		// 1週目の場合、1週目の最終日は、1日から適宜7日間より短くなる可能性がある
		else{
			// 集計開始日の決定
			$start_day = 1;
			// 集計終了日の決定
			$end_day = $one_week_count;
		}
		
		return array($start_day, $end_day);
	}
	
	/**
	 * URLにパラメタを付与する
	 */
	function addUrlParam($url, $key, $value)
	{
		// URLが「?」を含む場合は「&」を付与する
		if(strstr($url, '?')){
			$url .= "&{$key}={$value}";
		}else{
			$url .= "?{$key}={$value}";
		}
		return $url;
	}
	
	/**
	 * 日時形式を分解して所定の形式でアクションフォームにアサインする
	 */
	function setSepTime($af, $time, $key)
	{
		// 日時を前半と後半に分割
		$t = explode(" ", $time);
		// 前半を分割
		$d1 = explode("-", $t[0]);
		// 年
		$af->set($key . '_year', sprintf("%04d", $d1[0]));
		// 月
		$af->set($key . '_month', sprintf("%01d", $d1[1]));
		// 日
		$af->set($key . '_day', sprintf("%01d", $d1[2]));
		// 後半を分割
		$d2 = explode(":", $t[1]);
		// 時
		$af->set($key . '_hour', sprintf("%01d", $d2[0]));
		// 分
		$af->set($key . '_min', sprintf("%01d", $d2[1]));
		// 秒
		$af->set($key . '_sec', sprintf("%01d", $d2[2]));
		
		return $af;
	}
	
	/*
	 * 広告タグを変換する
	 *
	 */
	function replaceAdTag($body, $user_hash)
	{
		// [cut]ad:\d[cut]を探して広告URLを生成して、最後にuser_hashを追加する
		$cut = $this->config->get('tag_cut');
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = $this->config->get('user_url') . "ad.php?ad_id=\\1&user_hash=" . $user_hash;
		$body = preg_replace($search, $replace, $body);
		return $body;
	}
	
	/**
	 * コンテンツ本文変換
	 * 
	 */
	function convertHtml($html)
	{
		$cut = $this->config->get('tag_cut');
		
		// ファイルURLタグ変換
		$search = "/{$cut}file(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'f.php?type=file&id=\' . $id[1] . \'\';'), $html);
		
		// アバターURLタグ変換
		$search = "/{$cut}avatar(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_avatar_buy=true&avatar_id=\' . $id[1] . \'\';'), $html);
		
		// デコメールURLタグ変換
		$search = "/{$cut}decomail(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// デコメールダウンロードタグ変換
		$search = "/{$cut}decomail_dl(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_decomail_buy_do=true&decomail_id=\' . $id[1] . \'\';'), $html);
		
		// ゲームURLタグ変換
		$search = "/{$cut}game(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_game_buy=true&game_id=\' . $id[1] . \'\';'), $html);
		
		// サウンドURLタグ変換
		$search = "/{$cut}sound(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_sound_buy=true&sound_id=\' . $id[1] . \'\';'), $html);
		
		// [id]フリーページURLタグ変換
		$search = "/{$cut}fp(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&contents_id=\' . $id[1] . \'\';'), $html);
		
		// [code]フリーページURLタグ変換
		$search = "/{$cut}fp\[(.*)\]{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_contents=true&code=\' . $id[1] . \'\';'), $html);
		
		// コミュニティURLタグ変換
		$search = "/{$cut}community(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_community_view=true&community_id=\' . $id[1] . \'\';'), $html);
		
		// TOPURLタグ変換
		$search = "/{$cut}top{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_top=true\';'), $html);
		
		// マイページURLタグ変換
		$search = "/{$cut}home{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_home=true\';'), $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad(\d+){$cut}/";
		$replace = "ad.php?ad_id=\\1";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAd($id);'), $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad_banner(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// 広告タグ変換
		$search = "/{$cut}ad_banner\((.*?)\){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackAdBanner($id);'), $html);
		
		// siteタグ変換
		$search = "/{$cut}(site_.*?){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackConfig($id);'), $html);
		
		// 会員登録メールアドレスタグ変換
		$search = "/{$cut}regist_mailaddress{$cut}/";
		$mail_account = $this->config->get('mail_account');
		$media_access_hash = $this->session->get('media_access_hash');
		$replace = $mail_account['regist']['account'] . "_" . $media_access_hash . "@" . $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// メールドメインタグ変換
		$search = "/{$cut}mail_domain{$cut}/";
		$replace = $this->config->get('mail_domain');
		$html = preg_replace($search, $replace, $html);
		
		// ニュースタイトルタグ変換
		$search = "/{$cut}news(\d+)_title{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'title\', $id);'), $html);
		
		// ニュースURLタグ変換
		$search = "/{$cut}news(\d+)_url{$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return Tv_UtilManager::_callbackNews(\'url\', $id);'), $html);
		
		// 商品ページタグ変換
		$search = "/{$cut}item(\d+){$cut}/";
		$html = preg_replace_callback($search, create_function('$id', 'return \'?action_user_ec_item=true&item_id=\' . $id[1] . \'\';'), $html);
		// ショップ画像タグ変換
		$search = "/{$cut}shop_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_shop_image_tag'), $html);
		// 商品カテゴリ画像タグ変換
		$search = "/{$cut}ic_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_item_category_image_tag'), $html);
		// 商品画像タグ変換
		$search = "/{$cut}item_img(\d+){$cut}/";
		$html = preg_replace_callback($search, array($this, 'callback_get_item_image_tag'), $html);
		// 商品サンプル画像タグ変換
//		$search = "/#sample(\d+)/";
//		$html = preg_replace_callback($search, array($this, 'callback_get_sample_image_tag'), $html);
		
		return $html;
	}
	
	/**
	コールバック：ショップ画像取得関数
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
	コールバック：商品画像取得関数
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
	コールバック：商品画像取得関数
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
	コールバック：商品サンプル画像取得関数
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
	 * siteタグ置換用内部関数
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
	 * ニュースタグ置換用内部関数
	 */
	function _callbackNews($type, $id)
	{
		if(!$id[1]) return ;
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$um = $backend->getManager('Util');
		// 取得件数位置計算
		$sqlLimit = $id[1] -1 . ',1';
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
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
			// タイトルの場合
			if($type=='title'){
				return $r[0]['news_title'];
			}
			// URLの場合
			elseif($type=='url'){
				return "?action_user_news_view=true&news_id={$r[0]['news_id']}";
			}
		}
		return '';
	}
	
	/**
	 * 広告タグ置換用内部関数
	 */
	function _callbackAd($id)
	{
		if(!$id[1]) return ;
		$ad_id = $id[1];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$html = "ad.php?ad_id={$ad_id}";
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// 閲覧履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * 広告バナータグ置換用内部関数
	 */
	function _callbackAdBanner($id)
	{
		if(!$id[1]) return ;
		// 今回表示する広告を取得する
		$b = explode(',', $id[1]);
		srand((float) microtime() * 10000000);
		$rand_key = array_rand($b);
		$ad_id = $b[$rand_key];
		
		$ctl = $GLOBALS['_Ethna_controller'];
		$backend = $ctl->getBackend();
		$a = new Tv_Ad($backend, 'ad_id', $ad_id);
		if(!$a->isValid()) return '';
		$html = "<a href=\"ad.php?ad_id={$ad_id}\">";
		// 画像があれば画像バナー
		if($a->get('ad_image')){
			
			$html .= "<img src=\"f.php?file=ad/{$a->get('ad_image')}\">";
		}else{
			$html .= $a->get('ad_desc');
		}
		$html .= "</a>";
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// 閲覧履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
		
		return $html;
	}
	
	/**
	 * 開始と終了の間にあるものを取得する
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
	 * ページング処理用条件生成
	 * SQL実行時の条件設定
	 * ListViewClassのgetCondition ト同じ
	 */
	 function getDataCondition($condition)
	 {
	 	 // 初期化
	 	 $sqlWhere = "";
	 	 $sqlValues = array();
	 	// 処理
	 	foreach($condition as $key => $value){
	 		// 種別がない場合はイコール扱いで処理
			if(!array_key_exists('type', $value)){
				$type = 'EQ';
			}else{
				$type = $value['type'];
			}
			// カラム省略
			if(!array_key_exists('column', $value)){
				$column = $key;
			}else{
				$column = $value['column'];
			}
		 	// 条件種別を特定
		 	switch($type){
		 		// イコールの場合
		 		case 'EQ':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' = ?';
						$sqlValues[] = $this->af->get($key);
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// ライクの場合
		 		case 'LIKE':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' LIKE ?';
						$sqlValues[] = "%%" . $this->af->get($key) . "%%";
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 期間の場合
		 		case 'PERIOD':
		 			// 開始
					if($this->af->get($key . '_year_start') != '' && $this->af->get($key . '_month_start') != '' && $this->af->get($key . '_day_start') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_start = sprintf("%04d-%02d-%02d 00:00:00", $this->af->get($key . '_year_start'), $this->af->get($key . '_month_start'), $this->af->get($key . '_day_start'));
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $date_start;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 終了
					if($this->af->get($key . '_year_end') != '' && $this->af->get($key . '_month_end') != '' && $this->af->get($key . '_day_end') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_end = sprintf("%04d-%02d-%02d 23:59:59", $this->af->get($key . '_year_end'),$this->af->get($key . '_month_end'), $this->af->get($key . '_day_end'));
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $date_end;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		/**
		 		 * 範囲の場合
		 		 * @param [キー]_min, [キー]_minに対応するフォーム値を元にSQLを生成
		 		 */
		 		case 'RANGE':
					// 最小
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $this->af->get($key . '_min');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 最大
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $this->af->get($key . '_max');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 年齢の場合
				case 'AGE':
					$today = getdate(); // 日付取得
					// 年齢（最小）
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$maxBirthDate = sprintf(
							"%04d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_min'),
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $maxBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 年齢（最大）
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$minBirthDate = sprintf(
							"%d-%02d-%02d",
							$today['year'] - $this->af->get($key . '_max') - 1,
							$today['mon'],
							$today['mday']
						);
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $minBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 正規表現の場合
		 		case 'REGEXP':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' (' .$column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?)';
						
						$sqlValues[] = $this->af->get($key);
						$sqlValues[] = '^' . $this->af->get($key) . ',';
						$sqlValues[] = ',' . $this->af->get($key) . '$';
						$sqlValues[] = ',' . $this->af->get($key) . ',';
						
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
		 		break;
		 		// 複合選択の場合
		 		case 'IN':
		 			
		 			
		 		break;
		 	}
		}
		return array($sqlWhere, $sqlValues);
	 }
	 
	/**
	 * SQLラッパー関数
	 @param
	 	db_key				dsnの種別
		sql_select			クエリで指定するselectブロック
		sql_from			クエリで指定するfromブロック
		sql_where			クエリで指定するwhereブロック
		sql_values			クエリで指定するプレース値
		sql_order			クエリで指定するorderブロック
		sql_group			クエリで指定するgroupブロック
		sql_num			１ページに何件のデータを表示させるか
	@return
		pageData 結果配列
	 */
	function dataQuery($listview)
	{
		// 最低限必要な条件
		if(is_array($listview) && array_key_exists('sql_select',$listview ) && array_key_exists('sql_from', $listview)){
			// パラメタを取得する
			// 必須でないパラメタ
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
			
			// 必須のパラメタ
			$sqlSelect		= $listview['sql_select'];
			$sqlFrom		= $listview['sql_from'];
			
			// ベースクエリの生成
			$dataQuery = "SELECT {$sqlSelect} FROM {$sqlFrom}";
			// whereブロックの指定
			if($sqlWhere){
				$dataQuery .= " WHERE {$sqlWhere}";
			}
			// groupブロックの指定
			if($sqlGroup){
				$dataQuery .=  " GROUP by {$sqlGroup}";
			}
			// orderブロックの指定
			if($sqlOrder){
				$dataQuery .=  " ORDER by {$sqlOrder}";
			}
			// 取得件数ブロックの指定
			if($sqlNum) $dataQuery .= " LIMIT {$sqlNum}";
			
			// 表示データを取得
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
	 * 文字列をキャメライズする
	 * 
	 */
	function camelize ($str)
	{
		return str_replace(' ','',ucwords(str_replace('_',' ',$str)));
	}
	
	/**
	 * ポイントオンへのID認証リクエスト
	 */
	function ponIdRequest()
	{
		// ユーザ情報の取得
		$sess = $this->session->get('user');
		
		// penparamの生成
		return ID_Request_MAKE('New', $this->config->get('pon_siteid'), $sess['user_hash'], $this->config->get('pon_return_url'), $this->config->get('pon_regist_key'));
	}
	
	/**
	 * ポイントオンからのID認証受信
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
		//$LocalState のチェック （電文が改ざんされていないか）
		if (strtoupper($LocalState) == 'SUCCESS') {
			//$Stateの値からポイントオンの処理結果をチェック
			if (strtoupper($State) == 'SUCCESS') {
				//ID認証完了の処理を実装
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
				//エラー処理 (戻り値: reject もしくは system_internal_error)
				return false;
			}
		}else{
			//エラー処理 (戻り値: cert_fail)
			return false;
		}
		return true;
	}
	
	/**
	 * ポイントオンへのポイント交換リクエスト
	 */
	function ponPointRequest()
	{
		// ユーザ情報の取得
		$sess = $this->session->get('user');
		$Account = $sess['user_hash'];
		
		$SiteID = $this->config->get('pon_siteid');
		$trn_id = $this->af->get('pon_point_id');
		$point = $this->af->get('pon_point');
		$RegistKey = $this->config->get('pon_regist_key');
		$ProcessID = 1;
		$PostURL = $this->config->get('pon_point_url');
		# ポイントの凍結をここに記載（重要）
		#既に凍結済み
		
		# ポイント交換リクエスト電文の作成
		$PENParam = Point_Trans_Request_MAKE($trn_id, $ProcessID, $SiteID, $Account, $point, $RegistKey);
		# ポイント交換リクエスト電文をPOST／戻り値の取得
		$ReturnArray = Point_Request_POST($PENParam, $PostURL, $RegistKey);
		# ポイントオンから返送された戻り値の連想配列→変数へ代入
		$MessageType = $ReturnArray["MessageType"];
		$TransactionID = $ReturnArray["TransactionID"];
		$ProcessID = $ReturnArray["ProcessID"];
		$SiteID = $ReturnArray["SiteID"];
		$ResponseDate = $ReturnArray["Date"];
		$State = $ReturnArray["State"];
		$LocalState = $ReturnArray['LocalState'];
		if ( strtoupper($LocalState) == 'ACCEPT') {
			if (strtoupper($State) == 'ACCEPT') {
				# 正常終了のため凍結ポイントの交換完了処理実施
				return array($TransactionID, $ProcessID);
			} else {
				# ポイントオンにて受理できなかったためポイントを差し戻す
				return false;
			}
		} else if (strtoupper($LocalState) == 'SOCKET_TIMEOUT') {
			# ポイントオンにてソケットタイムアウト発生のため、ポイント交換確認リクエストを送信する
			return false;
		} else if (strtoupper($LocalState) == 'SOCKET_ERROR') {
			# ソケットコネクション不良のためポイントを差し戻す
			return false;
		} else {
			# その他のエラーのため凍結ポイントはそのまま凍結状態とする
			return false;
		}
		return false;
	}
	
	/**
	 * 年齢から誕生日を生成する
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
	 *  年齢を取得する
	 *
	 *  @access	private
	 *  @param	birth_date	string	生年月日
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
	 *  星座を取得する
	 *
	 *  @access	private
	 *  @param	birth_date	string	生年月日
	 */
	function _getZodiacSign($birth_date)
	{
		list($y, $m, $d) = explode('-', $birth_date);
		$birthday = $m * 100 + $d;
		if(120 <= $birthday && $birthday <= 218){
			return '水瓶座';
		} elseif(219 <= $birthday && $birthday <= 320){
			return '魚座';
		} elseif(321 <= $birthday && $birthday <= 419){
			return '牡羊座';
		} elseif(420 <= $birthday && $birthday <= 520){
			return '牡牛座';
		} elseif(521 <= $birthday && $birthday <= 621){
			return '双子座';
		} elseif(622 <= $birthday && $birthday <= 722){
			return '蟹座';
		} elseif(723 <= $birthday && $birthday <= 822){
			return '獅子座';
		} elseif(823 <= $birthday && $birthday <= 922){
			return '乙女座';
		} elseif(923 <= $birthday && $birthday <= 1023){
			return '天秤座';
		} elseif(1024 <= $birthday && $birthday <= 1121){
			return '蠍座';
		} elseif(1122 <= $birthday && $birthday <= 1221){
			return '射手座';
		} else {
			return '山羊座';
		}
	}
	
	/**
	 * ファイルをアップロード
	 * 
	 * @access     public
	 * @param string $f ファイルデータ
	 * @param string $dir 別途指定したいアップロードディレクトリ
	 * @return integer true/false
	 */
	function uploadFile($f, $dir="")
	{
		// ファイルが届いていない場合エラー
		if($f['error'] == UPLOAD_ERR_NO_FILE || $f == null){
			return false;
		}
		
		// ファイル名生成
		list($prev, $ext) = $this->extractName($f['name']);
		// 重複しないようなファイル名を生成
		$token = time() . substr(md5(microtime()), 0, rand(5, 12));
		$filename = $token . '.' . strtolower($ext);
		// オリジナルファイルをアップロード
		$path = $filename;
		if($dir) $path = "{$dir}/{$filename}";
		$original_file_path = $this->config->get('file_path') . $path;
		$r = copy($f['tmp_name'], $original_file_path);
		chmod($original_file_path, 0755);
		// 画像のアップロードに失敗した場合
		if(!$r) return false;
		
		return $filename;
	}
	
	/**
	 * 画像サムネイルをアップロードする
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
			// ファイル名作成
			$filename = sprintf("%06d_s%01d", $article_id, $article_image_id) . ".jpg"; 
			// サイズを所得
			list($size_x, $size_y) = getimagesize($file['tmp_name']);
			if($size_x > 120){ 
				// サムネールサイズを決定
				$sam_x = 120;
				$sam_y = ($sam_x * $size_y) / $size_x; 
				// サムネールサイズ用に作成
				$main_img = @imagecreatefromjpeg($file['tmp_name']); 
				// サムネールサイズに縮小
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
	 * ファイルフォームでアップロードした画像を正式な場所へコピーする
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
	 * カラーリストを取得する
	 * 
	 * @access public
	 * @return string $colorList
	 */
	function getColorList()
	{
		$colorList = array('' => array('name' => '▼未選択'),
			'#0000FF' => array('name' => '青色'),
			'#66CCFF' => array('name' => '濃い水色'),
			'#00FFFF' => array('name' => '水色'),
			'#6600CC' => array('name' => '紺色'),
			'#666699' => array('name' => '青紫色'),
			'#993399' => array('name' => '紫色'),
			'#DA70D6' => array('name' => '薄紫色'),
			'#CC0099' => array('name' => '赤紫色'),
			'#FFEEEE' => array('name' => '薄ﾋﾟﾝｸ色'),
			'#FFC0E0' => array('name' => 'ﾋﾟﾝｸ色'),
			'#FF60B0' => array('name' => 'ﾎｯﾄﾋﾟﾝｸ'),
			'#FF0000' => array('name' => '赤色'),
			'#EE0000' => array('name' => '赤茶色'),
			'#996600' => array('name' => '茶色'),
			'#990000' => array('name' => 'こげ茶色'),
			'#FFD700' => array('name' => '黄茶色'),
			'#AAAA00' => array('name' => 'ｵﾚﾝｼﾞ色'),
			'#66CCFF' => array('name' => 'ｶｰｷ色'),
			'#F5F5DC' => array('name' => 'ﾍﾞｰｼﾞｭ色'),
			'#FFFF00' => array('name' => '黄色'),
			'#FFFFBB' => array('name' => '薄黄色'),
			'#00FF00' => array('name' => '黄緑色'),
			'#66CC00' => array('name' => '緑色'),
			'#808000' => array('name' => 'ｵﾘｰﾌﾞ色'),
			'#669900' => array('name' => '深緑色'),
			'#999999' => array('name' => '灰色'),
			'#CCCCCC' => array('name' => '銀色'),
			'#3388BB' => array('name' => '青灰色'),
			'#777777' => array('name' => '黒灰色'),
			'#000000' => array('name' => '黒色'),
			'#FFFFFF' => array('name' => '白'),
			);
		return $colorList;
	}

	/**
	 * 乱数を発生させる
	 * 
	 * @access     public
	 * @param string $codeLength 乱数の長さ
	 * @param string $codeType 乱数の文字型
	 * @return string $checkCode	   乱数
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
		// 確認用コードをランダムで生成
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
	 * ユニークなIDを発行する
	 *
	 */
	function getUniqId()
	{
		// サーバごとにユニークなIDにする必要はない場合
		return uniqid();
	}
	
	/**
	 * UserAgent の値からキャリア情報を判別する
	 * return a[au],d[docomo],s[softbank],o[その他]
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
		// * Up.Browser を搭載しているものがある(auより先に評価)
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
	 * アフィリエイトの成果を送信
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
	 * ファイル名を拡張子に分解
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
	 * 記事画像をアップロードする
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
	 * 処理 指定年・月の最終日を返す。
	 * 
	 * @param int $year 
	 * @param int $month 
	 * @return 指定年・月の最終日
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
	 * IPアドレスによってauかどうかを判別
	 * 
	 * @return au ならtrue
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
	 * IPアドレスによってDoCoMoかどうかを判別
	 * 
	 * @return DoCoMo ならtrue
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
	 * IPアドレスによってSoftBankかどうかを判別
	 * 
	 * @return SoftBank ならtrue
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
	 * IPアドレスによってWillcomかどうかを判別
	 * 
	 * @return Willcom ならtrue
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
	 * 端末のXUIDを返す
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
	 * 端末のデバイス情報を返す
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
		// 端末情報を取得
		if(preg_match($pattern, $_SERVER['HTTP_USER_AGENT'], $matches)){
			$model = $matches[$key];
		}
		return $model;
	}
	
	/**
	 * アクセスしているクライアントの端末情報を返す。
	 * 
	 * @return キャリア
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
				// ﾌﾞﾗｳｻﾞﾊﾞｰｼﾞｮﾝ 1.0
				$model = $user_agent[2];
//				if($this->isDocomo()){
					$devid = '';
					$ser = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
					$icc = '';
//					$uid = preg_replace('/^ser(.+)/', '\\1', $user_agent[4]);
//				}
			}elseif (preg_match('/^2\..\s(.+?)\(c.*?;ser(.+?)[\s;]icc(.+?)\)/', $user_agent[1])){ 
				// ﾌﾞﾗｳｻﾞﾊﾞｰｼﾞｮﾝ 2.0(FOMA)
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
			// au(旧機種)
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
					// 'J-PHONE'ﾕｰｻﾞｰｴｰｼﾞｪﾝﾄ
					$ser = preg_replace('/^SN(.+?)\s.+$/', '\\1', $user_agent[3]);
				}elseif (preg_match("/Vodafone/", $user_agent[0]) or preg_match("/SoftBank/", $user_agent[0])){ 
					// 'Vodafone','SoftBank'ﾕｰｻﾞｰｴｰｼﾞｪﾝﾄ
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
	 * メールアドレス書式判定メソッド 
	 * 
	 * @param  メールアドレス
	 * @return true
	 */
	function checkMailAddress($str)
	{
		if (!$str) {
			return false;
		}
		
		// "(ダブルクォーテーション)を取り除く
		// "example"@docomo.ne.jp
		$str = str_replace('"', '', $str);
		
		// <example@docomo.ne.jp> というアドレスになることがある。
		//   日本語 <example@docomo.ne.jp>
		// のような場合に複数マッチする可能性があるので、
		// マッチした最後のものを取ってくるように変更
		$matches = array();
		$regx = '/([\.\w!#$%&\'*+-\/=?^`{|}~]+@[\w!#$%&\'*+-\/=?^`{|}~]+(\.[\w!#$%&\'*+-\/=?^`{|}~]+)*)/';
		if (preg_match_all($regx, $str, $matches)) {
			return array_pop($matches[1]);
		}
		
		return false;
	}
	
	
	/**
	 * サムネイル作成メソッド
	 * 
	 * @access private 
	 * @param string $filedir 元画像のファイルディレクトリ
	 * @param string $fileThumNaildir サムネイル出力ディレクトリ
	 * @param string $filename 画像ファイル名
	 * @param string $thumb_size サムネイル横サイズ
	 * @return item 
	 */
	function makeThumbImage($filedir,$fileThumbDir,$filename,$thumb_size)
	{
		$src = $filedir.$filename;
		@$size = GetImageSize($src);
		// リサイズ
		@$keys = $thumb_size / $size[0];
		$out_w = $size[0] * $keys;
		$out_h = $size[1] * $keys;
		
		/*
		// 出力画像（サムネイル）のイメージを作成
		@$im_out = ImageCreateTrueColor($out_w, $out_h);
		// 元画像を縦横とも コピー
		@ImageCopyResampled($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size[0], $size[1]);
		// サムネイル画像を保存
		switch ($size[2]) {
			case 1 : ImageGIF($im_out, $fileThumbDir.$filename); break;
			case 2 : ImageJPEG($im_out, $fileThumbDir.$filename); break;
			case 3 : ImagePNG($im_out, $fileThumbDir.$filename);  break;
		}
		// 作成したイメージを破棄
		@ImageDestroy($im_in);
		@ImageDestroy($im_out);
		*/
		
		// 変換
		$cmd = $this->config->get('imagemagick_path') . ' ' . $filedir.$filename. ' -resize ' . $out_w . 'x' . $out_h . ' ' . $fileThumbDir.$filename;
		system($cmd);
		// パーミッションの変更
		chmod($fileThumbDir.$filename, 0755);
		
		return $filename;
	}
	
	/**
	*  サムネイル画像をアップロードする
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
			// ファイル名作成
			list($prev, $ext) = $this->extractName($file['name']);
			$ext = strtolower($ext);
			$filename = $image_id . '.' . $ext;
			//サイズを所得
			list($size_x,$size_y)=getimagesize($file['tmp_name']);
			if($size_x > 240){
				
				//サムネールサイズを決定
				$sam_x = 240;
				$sam_y = ($sam_x * $size_y) / $size_x;
				
				/*
				// サムネールサイズ用に作成
				// ファイル又は URL から新規 JPEG 画像を作成する
				// 引数から得られる画像を表すイメージIDを返します。 
				//$main_img = imagecreatefromjpeg($file['tmp_name']);//error
				$main_img = imagecreatefromstring(file_get_contents($file['tmp_name']));
				
				// サムネールサイズに縮小
				// TrueColor イメージを新規に作成する
				// 指定した大きさの黒い画像を表す画像 ID を返します。 
				$sub_img = imagecreatetruecolor($sam_x,$sam_y);
				
				// 画像の一部をコピーしサイズを変更する
				imagecopyresized($sub_img,$main_img,0,0,0,0,$sam_x,$sam_y,$size_x,$size_y);
				
				// 画像をブラウザまたはファイルに出力する
				imagejpeg($sub_img, "$imagePath$filename", 100);
				
				// 画像を破棄する
				// 保持するメモリを解放します。 
				imagedestroy($sub_img);
				imagedestroy($main_img);
				*/
				
				// 変換
				$cmd = $this->config->get('imagemagick_path') . ' ' . $file['tmp_name'] . ' -resize ' . $sam_x . 'x' . $sam_y . ' ' . $imagePath.$filename;
				system($cmd);
				// パーミッションの変更
				chmod($imagePath.$filename, 0755);
				
			}else{
				$ret = copy($file['tmp_name'], "$imagePath$filename");
			}
		}
		return $filename;
	}
	
	/**
	 * ファイル名を変更
	 * 
	 * @access     public
	 * @param string $f ファイルデータ
	 * @return integer true/false
	 */
	function renameFile($f,$after)
	{
		// ファイルが届いていない場合エラー
		if(!$f) return false;
		if(!is_file($f)) return false;
		
		// ファイル名生成
		list($prev, $ext) = $this->extractName($f);
		$filename = $prev.strtolower($ext);
		
		//リネーム
		$r = rename($f,$after);
		// 失敗した場合
		if(!$r) return false;
		
		return $after;
	}
	
	
	/**
	 * デバッグログ出力メソッド 
	 *  出力先：プロジェクト/log/日付.log
	 * 
	 * @param  出力したい文字列
	 * @return true
	 */
	function trace($str)
	{
		
		$log_file = dirname(dirname(__FILE__)) .'/log/'.date('Y-m-d') .'.log';
		// ファイル存在＆書き込み権限の確認
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
	 * ランダム文字列出力メソッド 
	 * 
	 * @param  
	 * @return ランダムな文字列
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
	 * @param string $total 今回の検索結果の総数
	 * @param string $offset 今回表示するページでは何件目から表示するのか
	 * @param string $count １ページ内に表示する件数
	 * @param string $action_name リンクURL
	 * @return item 
	 */
	function getPager($total, $offset, $count, $action_name)
	{ 
		// ページオブジェクトを生成
		$pager = Ethna_Util::getDirectLinkList($total, $offset, $count); 
		// 次ページのオフセット値
		$next = $offset + $count; 
		// 次ページでのオフセット値が今回の検索結果の総数未満の場合（普通の場合）
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
		// 現在のオフセット値
		$item['current'] = $offset;
		$item['current_pagenum'] = ceil($offset / $count) + 1;
		// リンクの元になる文字列
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
	 * 送料を取得
	 * @param array $cart_list 商品情報リスト
	 * @param integer $pref 送付先住所番号
	 * @param array $unit_item_detail 
	 * @return integer 送料
	 */
	/*
	 * ■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
	 * ■2■発送単位に分ける
	 * ■3■発送単位を決定
	 * ■4■送料テーブルを生成
	 * ■5■発送単位内の合計金額と合計個数を準備
	 * ■6■発送単位ごとに各商品の個別送料を取得する
	 * ■7■発送単位ごとの各商品の個別送料で一番安い値を、「発送単位の送料」とする。
	 * ■8■発送単位の送料を合計する
	 */
	function getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $pref)
	{
		//■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
		$prepare_list 			= $this->getPrepareList($cart_list);
		$postage_id_list 		= $prepare_list['postage_id_list'];			//送料IDリスト
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//手数料IDリスト
		$item_postage_table 	= $prepare_list['item_postage_table'];		//送料テーブル
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//手数料テーブル
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//同梱可能テーブル仮
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//同梱不可設定
		
		//■2■発送単位に分ける
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		
		//■3■発送単位を決定
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		
		//■4■送料テーブルを生成
		$postage_id_data = $this->generatePostageTable($postage_id_list, $pref);
		
		//■5■発送単位内の合計金額と合計個数を準備
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		
		//■6■発送単位ごとに各商品の個別送料を取得する
		$postage_fee_list = $this->getPostageFeeList($unit, $unit_stock_detail, $item_postage_table, $postage_id_data, $item_bundle_status, $unit_total);
		
		//■7■発送単位ごとの各商品の個別送料で一番安い値を、「発送単位の送料」とする。
		$unit_most_low = $this->getPostageFee($postage_fee_list);
		
		//■8■発送単位の送料を合計する
		$final_postage_fee = $this->getFinalPostageFee($unit_most_low);
		
		return $final_postage_fee;
	}
	
	/*
	 * getPrepareList
	 * 
	 */
	function getPrepareList($cart_list)
	{
		//■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
		$postage_id_list = array();
		$exchange_id_list = array();
		foreach($cart_list as $k => $v){
			// item_idリストを作成する
			$item_id_list[] = $v['item_id'];
			// cart_idリストを作成する
			$cart_id_list[] = $v['cart_id'];
			// stock_idリストを作成する
			$stock_id_list[] = $v['stock_id'];
			// cart_item_numリストを作成する
			$cart_item_num_list[$v['stock_id']] = $v['cart_item_num'];
			// postage_idリストを作成する
			$postage_id_list[] = $v['postage_id'];
			// item_idとpostage_idの対応テーブルを作成する（stock_idが異なる商品が渡って来たとしても[item_id]と[postage_id]の対応関係は同じ）
			$item_postage_table[$v['item_id']] = $v['postage_id'];
			// exchange_idリストを作成する
			$exchange_id_list[] = $v['exchange_id'];
			// item_idとexchange_idの対応テーブルを作成する（stock_idが異なる商品が渡って来たとしても[item_id]と[exchange_id]の対応関係は同じ）
			$item_exchange_table[$v['item_id']] = $v['exchange_id'];
			// item_idとsupplier_bundle_allow_idの対応テーブルを作成する
			$supplier =& new Tv_Supplier($this->backend, 'supplier_id', $v['supplier_id']);
			$item_allow_table_tmp1[$v['item_id']] = explode(':', $supplier->get('supplier_bundle_allow_id'));
			// stock_idとsupplier_bundle_allow_idの対応テーブルを作成する
			$supplier =& new Tv_Supplier($this->backend, 'supplier_id', $v['supplier_id']);
			$stock_allow_table_tmp1[$v['stock_id']] = explode(':', $supplier->get('supplier_bundle_allow_id'));
			// 同梱不可設定（キーは商品ID
			$item_bundle_status[$v['item_id']] = $v['item_bundle_status'];
			// 同梱不可設定（キーはストック（タイプ）ID
			$stock_bundle_status[$v['stock_id']] = $v['item_bundle_status'];
		}
		// postage_id_listはユニークな配列とする
		$postage_id_list = array_unique($postage_id_list);
		// exchange_id_listはユニークな配列とする
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
		//■2■発送単位に分ける
		//配列から""を取り除く
		$item_allow_table_tmp1 = array_map('array_filter', $item_allow_table_tmp1);
		//ソート
		foreach($item_allow_table_tmp1 as $k => $v){
			$temp = $v;
			sort($temp);
			$item_allow_table_tmp2[$k] = $temp;
		}
		//比較準備のために配列化
		foreach($item_allow_table_tmp2 as $k => $v) $item_allow_table_tmp3[$k] = implode(',',$v);
		// 同梱できない特別な商品は同梱可能ＩＤを0にしておく
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
		//■3■発送単位を決定
		$i=0;
		foreach($item_allow_table_tmp4 as $k => $v){
			$hit_key = array_keys($item_allow_table_tmp4, $item_allow_table_tmp4[$k]);
			if($hit_key !== false && false === @array_search($hit_key, $hit_key_list)){
				//同梱できない特殊な商品なら
				if($v == 0){
					//その購入個数分発送する（発送単位$unitが++）
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
		//■4■送料テーブルを生成
		$db = $this->backend->getDB();
		$postage_csv_id = implode(',', $postage_id_list);
		$sqlSelect = " * ";
		$sqlFrom = "postage";
		$sqlWhere = " postage_id in ( ".$postage_csv_id." ) ";
		$sql = "select " . $sqlSelect . "from " . $sqlFrom . " where " . $sqlWhere;
		$postage_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		// すべての仕入先に対して処理を行う
		// postage_idとpostage_type、postage_same_priceの対応テーブルを初期化
		$postage_id_data = array();
		foreach($postage_list as $k => $v){
			// postage_idとpostage_typeの対応テーブルを作成する
			$postage_id_data[$v['postage_id']]['type'] = $v['postage_type'];
			//一律
			if($v['postage_type'] == 1) $postage_id_data[$v['postage_id']]['same_price'] 		= $v['postage_same_price'];
			//地域
			if($v['postage_type'] == 2) $postage_id_data[$v['postage_id']]['pref_price'] 		= $v['postage_pref_'.$pref];
			//合計金額
			if($v['postage_type'] == 3) $postage_id_data[$v['postage_id']]['total_price'] 		= $v['postage_total_price_set'];
			if($v['postage_type'] == 3) $postage_id_data[$v['postage_id']]['total_price_under'] = $v['postage_total_price_set_under'];
			//合計個数
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
		//■5■発送単位内の合計金額と合計個数を準備
		$i=0;
		foreach($unit as $k => $v){
			//発送単位内の合計金額
			$unit_total_price = 0;
			//発送単位内の合計個数
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
		//■6■発送単位ごとに各商品の個別送料を取得する
		$postage_fee_list = array();
		$i=0;
		foreach($unit as $k => $v){
			foreach($v as $k2 => $v2){
				$postage_fee_list[$i][$v2]['item_price'] = $unit_item_detail[$v2]['item_price'];
				$postage_fee_list[$i][$v2]['cart_item_num'] = $unit_item_detail[$v2]['cart_item_num'];
				$postage_fee_list[$i][$v2]['subtotal'] = $unit_item_detail[$v2]['subtotal'];
				$postage_fee_list[$i][$v2]['postage_id'] = $item_postage_table[$v2];
				$postage_fee_list[$i][$v2]['postage_type'] = $postage_id_data[$item_postage_table[$v2]]['type'];
				
				//大型商品など特殊で同梱できない商品の場合
				if($item_bundle_status[$v2]){
					//一律
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 1){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['same_price'];
					}
					//地域
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 2){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['pref_price'];
					}
					//合計金額
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 3){
						//商品単体１つの価格が「合計金額設定」の設定値を超えていれば0円
						if($unit_item_detail[$v2]['item_price'] >= $postage_id_data[$item_postage_table[$v2]]['total_price']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}
						//こえていなければ「設定値に満たない場合の金額」を代入
						else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_price_under'];
						}
					}
					//合計個数
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 4){
						// 大型商品などの同梱不可能な特殊な商品は1個ずつ発送する
						if(1 >= $postage_id_data[$item_postage_table[$v2]]['total_sum']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}
						//発送単位内の合計個数が「合計個数設定」の設定値を超えない場合は「設定値に満たない場合の金額」を代入
						else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_sum_under'];
						}
					}
				}else{
					//一律
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 1){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['same_price'];
					}
					//地域
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 2){
						$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['pref_price'];
					}
					//合計金額
					if($postage_id_data[$item_postage_table[$v2]]['type'] == 3){
						if($unit_total[$i]['total_price'] >= $postage_id_data[$item_postage_table[$v2]]['total_price']){
							$postage_fee_list[$i][$v2]['postage_fee'] = 0;
						}else{
							$postage_fee_list[$i][$v2]['postage_fee'] = $postage_id_data[$item_postage_table[$v2]]['total_price_under'];
						}
					}
					//合計個数
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
		//■7■発送単位ごとの各商品の個別送料で一番安い値を、「発送単位の送料」とする。「発送単位の送料」を合計する
		foreach($postage_fee_list as $k => $v){
			$most_low = false;
			foreach($v as $k2 => $v2){
				//最初は最安値の送料はコレ。
				if($most_low === false) $most_low = $v2['postage_fee'];
				//前回の送料より安ければ
				if($most_low >= $v2['postage_fee']) $most_low = $v2['postage_fee'];
			}
			//発送単位ごとの最安値の送料
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
		//■8■発送単位の送料を合計してreturn
		$final_postage_fee = array_sum($unit_most_low);
		return $final_postage_fee;
	}
	
	/*
	 * getExchangeFee
	 * 代引き手数料を取得
	 * @param array $cart_list 商品情報リスト
	 * @param array $unit_item_detail 
	 * @return integer $exchange_fee 代引き手数料
	 */
	/* 
	 * ■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
	 * ■2■発送単位に分ける
	 * ■3■発送単位を決定
	 * ■4■代引き手数料テーブルを生成
	 * ■5■発送単位内の合計金額と合計個数を準備
	 * ■6■発送単位ごとに各商品の個別代引き手数料を取得する
	 * ■7■発送単位ごとの代引き手数料で一番安い値を、「発送単位の代引手数料」とする
	 * ■8■発送単位の代引手数料を合計する。
	*/
	function getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail)
	{
		//■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
		$prepare_list 			= $this->getPrepareList($cart_list);
		$postage_id_list 		= $prepare_list['postage_id_list'];			//送料IDリスト
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//手数料IDリスト
		$item_postage_table 	= $prepare_list['item_postage_table'];		//送料テーブル
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//手数料テーブル
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//同梱可能テーブル仮
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//同梱不可設定
		
		//■2■発送単位に分ける
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		
		//■3■発送単位を決定
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		
		//■4■代引き手数料テーブルを生成
		$exchange_id_data = $this->generateExchangeTable($exchange_id_list);
		
		//■5■発送単位内の合計金額と合計個数を準備
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		
		//■6■発送単位ごとに各商品の個別代引き手数料を取得する
		$exchange_fee_list = $this->getExchangeFeeList($unit, $unit_stock_detail, $item_exchange_table, $exchange_id_data, $item_bundle_status, $unit_total);
		
		//■7■発送単位ごとの代引き手数料で一番安い値を、「発送単位の代引手数料」とする。
		$unit_most_low = $this->exchangeFee($exchange_fee_list);
		
		//■8■発送単位の代引手数料を合計する。
		$final_exchange_fee = $this->getFinalExchangeFee($unit_most_low);
		
		return $final_exchange_fee;
	}
	
	/*
	 * generateExchangeTable
	 *
	 */
	function generateExchangeTable($exchange_id_list)
	{
		//■4■代引き手数料テーブルを生成
		$db = $this->backend->getDB();
		$exchange_csv_id = implode(',', $exchange_id_list);
		$sqlSelect = " exchange_id, exchange_type, exchange_total_price_set, exchange_total_price_set_under, exchange_total_price_value, ".
						"exchange_total_piece_set, exchange_total_piece_set_under,exchange_total_piece_value, exchange_same_price ";
		$sqlWhere = " exchange_id in ( ".$exchange_csv_id." ) ";
		$sql = "select " . $sqlSelect . "from exchange where " . $sqlWhere;
		$exchange_list = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		$db = $this->backend->getDB();
		// すべての仕入先に対して処理を行う
		// exchange_idとexchange_type、exchange_same_priceの対応テーブルを初期化
		$exchange_id_data = array();
		foreach($exchange_list as $k => $v){
			// exchange_idとexchange_typeの対応テーブルを作成する
			$exchange_id_data[$v['exchange_id']]['type'] = $v['exchange_type'];
			//一律
			if($v['exchange_type'] == 1) $exchange_id_data[$v['exchange_id']]['same_price'] = $v['exchange_same_price'];
			//範囲
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
			//合計金額
			if($v['exchange_type'] == 3) $exchange_id_data[$v['exchange_id']]['total_price'] = $v['exchange_total_price_set'];
			if($v['exchange_type'] == 3) $exchange_id_data[$v['exchange_id']]['total_price_under'] = $v['exchange_total_price_set_under'];
			//合計個数
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
		//■6■発送単位ごとに各商品の個別代引き手数料を取得する
		$exchange_fee_list = array();
		$i=0;
		foreach($unit as $k => $v){
			foreach($v as $k2 => $v2){
				$exchange_fee_list[$i][$v2]['item_price'] = $unit_item_detail[$v2]['item_price'];
				$exchange_fee_list[$i][$v2]['cart_item_num'] = $unit_item_detail[$v2]['cart_item_num'];
				$exchange_fee_list[$i][$v2]['subtotal'] = $unit_item_detail[$v2]['subtotal'];
				$exchange_fee_list[$i][$v2]['excahnge_id'] = $item_exchange_table[$v2];
				$exchange_fee_list[$i][$v2]['excahnge_type'] = $exchange_id_data[$item_exchange_table[$v2]]['type'];
				// 大型商品などの同梱不可能な商品は手数料*個数とする（item_bundle_status=1）
				if($item_bundle_status[$v2]){
					//一律
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 1){
						$exchange_fee_list[$i][$v2]['exchange_fee'] = 
							$exchange_id_data[$item_exchange_table[$v2]]['same_price'];
					}
					//範囲
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
					//合計金額
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 3){
						//
						if($unit_item_detail[$v2]['item_price'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_price']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//発送単位内の合計金額が「合計金額設定」の設定値を超えない場合は「設定値に満たない場合の金額」を代入
						else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 
								$exchange_id_data[$item_exchange_table[$v2]]['total_price_under'];
						}
					}
					//合計個数
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 4){
						// 大型商品などの同梱不可能な特殊な商品は1個ずつ発送する
						if(1 >= $exchange_id_data[$item_exchange_table[$v2]]['total_sum']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//発送単位内の合計個数が「合計個数設定」の設定値を超えない場合は「設定値に満たない場合の金額」を代入
						else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 
								$exchange_id_data[$item_exchange_table[$v2]]['total_sum_under'];
						}
					}
				}
				// 大型商品などの同梱不可能な商品でない（item_bundle_status=0）
				else{
					//一律
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 1) $exchange_fee_list[$i][$v2]['exchange_fee'] = $exchange_id_data[$item_exchange_table[$v2]]['same_price'];
					//範囲
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
					//合計金額
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 3){
						if($unit_total[$i]['total_price'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_price']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}else{
							$exchange_fee_list[$i][$v2]['exchange_fee'] = $exchange_id_data[$item_exchange_table[$v2]]['total_price_under'];
						}
					}
					//合計個数
					if($exchange_id_data[$item_exchange_table[$v2]]['type'] == 4){
						//発送単位内の合計個数が「合計個数設定」の設定値を超える場合は送料0円
						if($unit_total[$i]['total_num'] >= $exchange_id_data[$item_exchange_table[$v2]]['total_sum']){
							$exchange_fee_list[$i][$v2]['exchange_fee'] = 0;
						}
						//発送単位内の合計個数が「合計個数設定」の設定値を超えない場合は「設定値に満たない場合の金額」を代入
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
		//■7■発送単位ごとの代引き手数料で一番安い値を、「発送単位の代引手数料」とする。「発送単位の代引手数料」を合計する。
		foreach($exchange_fee_list as $k => $v){
			$most_low = false;
			foreach($v as $k2 => $v2){
				//最初だけ手数料を代入する
				if($most_low === false) $most_low = $v2['exchange_fee'];
				//今回の手数料が前回よりも安いなら
				if($most_low >= $v2['exchange_fee']) $most_low = $v2['exchange_fee'];
			}
			//発送単位ごとの最安値の手数料
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
		//■8■「発送単位の代引手数料」を合計する。
		$final_exchange_fee = array_sum($unit_most_low);
		return $final_exchange_fee;
	}
	
	/*
	 * insertPostUnit
	 * 発送単位をpost_unitテーブルに登録する
	 */
	function insertPostUnit($cart_list, $unit_item_detail, $unit_stock_detail)
	{
		//共通
		//■1■商品情報リスト（買い物かご）を繰り返し、各リストを取得する
		$prepare_list 			= $this->getPrepareList($cart_list);
		$item_id_list 			= $prepare_list['item_id_list'];			//商品IDリスト（タイプがあるので重複もあり）
		$cart_id_list 			= $prepare_list['cart_id_list'];			//カートIDリスト
		$stock_id_list 			= $prepare_list['stock_id_list'];			//ストック（タイプ）IDリスト
		$cart_item_num_list 			= $prepare_list['cart_item_num_list'];			//購入個数リスト
		$postage_id_list 		= $prepare_list['postage_id_list'];			//送料IDリスト
		$exchange_id_list 		= $prepare_list['exchange_id_list'];		//手数料IDリスト
		$item_postage_table 	= $prepare_list['item_postage_table'];		//送料テーブル
		$item_exchange_table 	= $prepare_list['item_exchange_table'];		//手数料テーブル
		$item_allow_table_tmp1 	= $prepare_list['item_allow_table_tmp1'];	//商品IDごと同梱可能テーブル仮
		$stock_allow_table_tmp1 = $prepare_list['stock_allow_table_tmp1'];	//ストック（タイプ）IDごと同梱可能テーブル仮
		$item_bundle_status 		= $prepare_list['item_bundle_status'];		//同梱不可設定 key=item_id
		$stock_bundle_status 		= $prepare_list['stock_bundle_status'];		//同梱不可設定 key=stock_id
		//■2■発送単位に分ける
		$item_allow_table_tmp4 = $this->splitUnit($item_allow_table_tmp1, $item_bundle_status);
		$stock_allow_table_tmp4 = $this->splitUnitStock($stock_allow_table_tmp1, $stock_bundle_status);
		//■3■発送単位を決定
		$unit = $this->getUnitList($item_allow_table_tmp4, $unit_item_detail);
		$stock_unit = $this->getUnitListStock($stock_allow_table_tmp4, $unit_stock_detail);
		
		//送料
		//■4■送料テーブルを生成
		$postage_id_data = $this->generatePostageTable($postage_id_list, $pref);
		//■5■発送単位内の合計金額と合計個数を準備
		$unit_total = $this->prepareUnitTotal($unit, $item_bundle_status, $unit_item_detail);
		//■6■発送単位ごとに各商品の個別送料を取得する
		$postage_fee_list = $this->getPostageFeeList($unit, $unit_stock_detail, $item_postage_table, $postage_id_data, $item_bundle_status, $unit_total);
		//■7■発送単位ごとの各商品の個別送料で一番安い値を、「発送単位の送料」とする。
		$unit_most_low_p = $this->getPostageFee($postage_fee_list);
		
		//手数料
		//■4■代引き手数料テーブルを生成
		$exchange_id_data = $this->generateExchangeTable($exchange_id_list);
		//■6■発送単位ごとに各商品の個別代引き手数料を取得する
		$exchange_fee_list = $this->getExchangeFeeList($unit, $unit_stock_detail, $item_exchange_table, $exchange_id_data, $item_bundle_status, $unit_total);
		//■7■発送単位ごとの代引き手数料で一番安い値を、「発送単位の代引手数料」とする。
		$unit_most_low_e = $this->exchangeFee($exchange_fee_list);
		
		//キーを振り直す
		//Array ( [1] => Array ( [0] => 93 ) [2] => Array ( [0] => 93 ) [4] => Array ( [0] => 99 [1] => 95 [2] => 92 ) )
		$stock_unit = array_values($stock_unit);
		//Array ( [0] => Array ( [0] => 93 ) [1] => Array ( [0] => 93 ) [2] => Array ( [0] => 99 [1] => 95 [2] => 92 ) )
		
		//それぞれのstock_id（タイプ）がどの発送単位か
		$db = $this->backend->getDB();
		
		foreach($stock_id_list as $k => $v){
			foreach($stock_unit as $k2 => $v2){
				$res = array_search($v, $v2);
				if($res !== false){
					//nullなら送料を0円に
					if(is_null($unit_most_low_p[$k2])) $unit_most_low_p[$k2] = 0;
					//nullなら手数料を0円に
					if(is_null($unit_most_low_e[$k2])) $unit_most_low_e[$k2] = 0;
					//同梱不可なら発送個数は1個に
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
		//■2■発送単位に分ける
		//配列から""を取り除く
		$item_allow_table_tmp1 = array_map('array_filter', $item_allow_table_tmp1);
		//ソート
		foreach($item_allow_table_tmp1 as $k => $v){
			$temp = $v;
			sort($temp);
			$item_allow_table_tmp2[$k] = $temp;
		}
		//比較準備のために配列化
		foreach($item_allow_table_tmp2 as $k => $v) $item_allow_table_tmp3[$k] = implode(',',$v);
		// 同梱できない特別な商品は同梱可能ＩＤを0にしておく
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
			//array_keys ― 配列のキーをすべて返す(第二引数が指定された場合、 指定した値に関するキーのみが返されます)
			$hit_key = array_keys($item_allow_table_tmp4, $item_allow_table_tmp4[$k]);
			//同梱不可設定されている
			if($v === 0){
				//その購入個数分発送する（発送単位$unitが++）
				for($i=1;$i<=$unit_stock_detail[$k]['cart_item_num'];$i++){
					$hit_key_list[] = $hit_key;
					//$unit[$i] = $hit_key;
					$unit[] = array($k);
				}
				$item_allow_table_tmp4[$k] = false;//判定が完了したらfalseにしておくことで、再度ヒットしない。
			}
			//同梱不可設定されていない
			else{
				//array_search ― 指定した値を配列で検索し、見つかった場合に対応するキーを返す
				if($hit_key !== false && false === @array_search($hit_key, $hit_key_list)){
					//同梱できない特殊な商品なら
					$hit_key_list[] = $hit_key;
					$unit[] = $hit_key;
				}
			}
			$i++;
		}
		return $unit;
	}
	
	/**
	 * 商品の送料設定IDを返す
	 * 
	 * @return  int
	 */
	function getPostageId($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		return $i->get('postage_id');
	}
	
	/**
	 * 商品の送料タイプを返す
	 * 
	 * @return  1:全国,2:地域,3:合計金額,4:合計個数
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
	 * 商品がカード決済可能か
	 * 
	 * @return  1:可能
	 */
	function getItemUseCreditStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$status = $i->get('item_use_credit_status');
		return $status;
	}
	
	/**
	 * 商品がコンビニ決済可能か
	 * 
	 * @return  1:可能
	 */
	function getItemUseConveniStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_conveni_status');
		return $flag;
	}
	
	/**
	 * 商品が代引決済可能か
	 * 
	 * @return  1:可能
	 */
	function getItemUseExchangeStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_exchange_status');
		return $flag;
	}
	
	/**
	 * 商品が銀行振り込み決済可能か
	 * 
	 * @return  1:可能
	 */
	function getItemUseTransferStatus($item_id)
	{
		$i = new Tv_Item($this->backend, 'item_id', $item_id);
		$flag = $i->get('item_use_transfer_status');
		return $flag;
	}
	
	/**
	*  管理権限を所有するショップ情報を取得する
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
		
		// ステータスが有効な属性のみ表示する
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
	 * 売り上げ成果を送信
	 */
	function sendOrderRequest($type,$values)
	{
		// 決済サーバホスト
		$host = $this->config->get('payment_host');
		// 決済サーバパス
		$path = $this->config->get('payment_path');
		// 決済サーバスクリプト
		$script = $this->config->get('payment_script_' . $type);
		// クエリを生成
		foreach($values as $k => $v){
			$query .= $k . "=" . urlencode($v) . "&";
		}
		// クエリに付与する値
		$query .= $this->config->get('payment_query_' . $type);
		
		//file ― ファイル全体を読み込んで配列に格納する
		//join ― implode() のエイリアス
		//implode ― 配列要素を文字列により連結する
		//split ― 正規表現により文字列を分割し、配列に格納する
		$request = "$host$path$script?$query";
		$ret = @join('',@file($request));
		return split("\n",$ret);
	}
	
	/*
	 * 郵便番号をAPIに送信して住所情報をもらう
	 *  @param  string  $zip
	 *  @return $address // 0:郵便番号 1:都道府県名 2:市区 3:町村
	 */
	function getAddressByZip($zip)
	{
		/*
		html内にこんな風に入っている部分を解析する
		<td class="data"><small>145-0062</small></td>
		<td class="data"><small>東京都</small></td>
		<td class="data"><small>大田区</small></td>
		<td>
			<div class="data">
				<p><small><a href="zipcode.php?pref=13&city=1131110&addr=%E5%8C%97%E5%8D%83%E6%9D%9F&cmp=1">北千束</a></small></p>
				<p class="comment"><small>キタセンゾク</small></p>
			</div>
		</td>
		*/
		if(!$zip) return '';
		// 日本郵便の郵便番号検索ページ
		$_url = "http://search.post.japanpost.jp/cgi-zip/zipcode.php?zip={$zip}";
		// htmlを取得する
		$html = $this->getHtml( $_url );
		if(!$html) return '';
		$addrArray = array();
		// 郵便番号、都道府県、市区名
		$pattern = "<td class=\"data\"><small>(.*)<\/small><\/td>";
		if(preg_match_all ( "/".$pattern."/i", $html, $match )){
			foreach($match[1] as $k=>$v){
				$addrArray[] = mb_convert_encoding($v,'EUC-JP','auto');
			}
		}
		// 町村名
		$pattern = "<p><small><a href=\"zipcode.php(.*)>(.*)<\/a><\/small><\/p>";
		if(preg_match( "/".$pattern."/i", $html, $match )){
			$addrArray[] = mb_convert_encoding($match[2],'EUC-JP','auto');
		}
		
		return $addrArray;
	 }
	 
	/*
	 * URLからHTMLを取得するメソッド
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
