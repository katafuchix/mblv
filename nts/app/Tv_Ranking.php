<?php
/**
 * Tv_Game.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ランキングマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_RankingManager extends Ethna_AppManager
{
	/**
	 * ランキングのローテーションを行う
	 */
	function rotateRanking($type)
	{
		// [type]別に処理を分岐する
		switch($type)
		{
			case 'all':
				$ranking_type = $this->getRankingType();
				foreach($ranking_type as $k => $v){
					if($k){
						$this->_rotateRanking($k);
					}
				}
				break;
			default:
				$this->_rotateRanking($type);
		}
	}
	
	/**
	 * （rotateRankingの内部関数）ランキングのローテーションを行う
	 */
	function _rotateRanking($type)
	{
		$sm = & $this->backend->getManager('Stats');
		$um = $this->backend->getManager('Util');
		
		$ranking_type = $this->getRankingType();
		$stats_type = $sm->getStatsType();
		
		// ランキングテーブルは指定期間を過ぎたものを削除する
		$deletetime = date("Y-m-d H:i:s", $um->getPreDate('day', -7));
		$db =& $this->backend->getDB();
//		$sql = "delete from ranking where type = {$type} AND ranking_created_time < {$deletetime}";
print		$sql = "delete from ranking where type = '".$type."'";
		$r = $db->db->query($sql);
		
		// データ取得元テーブル
		$sqlFrom = $sm->getTableName($type, 'week');
		// データ取得元カラム
		$_sqlSelect = $stats_type[$type]['sql_select']['month'];
		$_sqlSelect[] = 'sub_id';
		// 検索条件取得
		// 年をまたがった場合
		if(is_array($sqlFrom)){
			// データ取得元カラム生成
			$sqlSelect = "";
			foreach($_sqlSelect as $v){
				$sqlSelect .= 
					"{$sqlFrom[0]}.{$v}" .
					"{$sqlFrom[1]}.{$v}";
			}
			// データ選択箇所生成
			$sqlWhere = 
				"{$sqlFrom[0]}.datetime >= ? AND {$sqlFrom[0]}.datetime <= NOW()" .
				"{$sqlFrom[1]}.datetime >= ? AND {$sqlFrom[1]}.datetime <= NOW()";
			$post = $um->getPreDate('day', -7);
			// データ選択値生成
			$sqlValues[] = date("Y-m-d H:i:s", $post);
			$sqlValues[] = date("Y-m-d H:i:s", $post);
			// データ取得元テーブル生成
			$sqlFrom = implode(',', $sqlFrom);
		}
		// 通常の場合
		else{
			// データ取得元カラム生成
			$sqlSelect = implode(',', $_sqlSelect);
			// データ選択箇所生成
			$sqlWhere = "datetime >= ? AND datetime <= NOW()";
			// データ選択値生成
			$post = $um->getPreDate('day', -7);
			$sqlValues[] = date("Y-m-d H:i:s", $post);
		}
		
		// 統計解析情報を取得する
		$param = array(
			'db_key'		=> 'stats',
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> $sqlFrom,
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_group'		=> 'id',
		);
		$data = $um->dataQuery($param);
//print $data->getDebugInfo();
//print_r($data);
//exit;
		
		// データがない場合処理を終了
		if(Ethna::isError($data)) return false;
		if(count($data) == 0) return false;
		
		// sub_id内の[id]ランキングの場合
		$order_score = $ranking_type[$type]['order_score'];
		if($ranking_type[$type]['sub_id']){
			// [sub_id]の配列を生成
			$sub_id_list = array();
			foreach($data as $l){
				if($l['sub_id'] && !in_array($l['sub_id'], $sub_id_list)){
					$sub_id_list[] = $l['sub_id'];
				}
			}
			
			// [sub_id]がない場合処理を終了
			if(count($sub_id_list) == 0) return false;
			
			// [sub_id]配列に対して処理を行う
			foreach($sub_id_list as $k){
				// [sub_id]内での[score]を取得する
				$score = array();
				$sub_data = array();
				foreach($data as $j => $l){
					if($l['sub_id'] == $k){
						$score[] = $l[$order_score];
						$sub_data[] = $l;
					}
				}
				// 結果データがない場合は次の[sub_id]処理に回る
				if(count($sub_data) == 0) continue;
				
				// [score]数でソートする
				array_multisort($score, SORT_DESC, $sub_data);
				
				// 順位配列生成
				$order = $this->makeOrderArray($score);
				
				// [sub_id]単位のレコード登録
				$i=0;
				foreach($sub_data as $n => $m){
					$i++;
					$rk =& new Tv_Ranking($this->backend);
					$rk->set('type', $type);
					$rk->set('id', $m['id']);
					$rk->set('sub_id', $m['sub_id']);
					$rk->set('ranking_order', $order[$m[$order_score]]);
					$rk->set('ranking_created_time', date('Y-m-d H:i:s'));
					$rk->add();
					// データ保存は50件まで
					if($i>=50) break;
				}
			}
		
		}
		// [id]ランキングの場合
		else{
			// [score]を取得する
			$score = array();
			foreach($data as $k => $v){
				$score[$k] = $v[$order_score];
			}
			
			// [score]数でソートする
			array_multisort($score, SORT_DESC, $data);
			
			// 順位配列生成
			$order = $this->makeOrderArray($score);
			
			// [type]単位のレコード登録
			$i=0;
			foreach($data as $k => $v){
				$i++;
				$rk =& new Tv_Ranking($this->backend);
				$rk->set('type', $type);
				$rk->set('id', $v['id']);
				$rk->set('sub_id', $v['sub_id']);
				$rk->set('ranking_order', $order[$v[$order_score]]);
				$rk->set('ranking_created_time', date('Y-m-d H:i:s'));
				$rk->add();
				$i++;
				// データ保存は50件まで
				if($i>=50) break;
			}
		}
		return true;
	}
	
	/**
	 * key:閲覧数、value:順位の配列を作成する
	 * list:閲覧数の配列
	 */	
	function makeOrderArray($data)
	{
		// 重複を除く
		$uniq = array_unique($data);
		
		// 閲覧数が多いもの順にソートする
		rsort($uniq);
		
		// key:閲覧数、value:順位の配列を作成する
		$order = array();
		$i = 1;
		foreach($uniq as $k=>$v){
			$order[$v] = $i;
			$i++;
		}
		return $order;
	}
	
	/**
	 * ランキング設定を取得する
	 */
	function getRankingType()
	{
		return $config = array(
//			'access' => array(
//				'sub_id'		=> false,
//				'order_score'	=> 'view',
//			),
			'blog' => array(
				'sub_id'		=> false,
				'order_score'	=> 'view',
			),
			'blog_article' => array(
				'sub_id'		=> false,
				'order_score'	=> 'view',
			),
			'community'=> array(
				'sub_id'		=> false,
				'order_score'	=> 'view',
			),
			'community_article' => array(
				'sub_id'		=> false,
				'order_score'	=> 'view',
			),
			'ad' => array(
				'sub_id'		=> false,
				'order_score'	=> 'click',
			),
			'avatar' => array(
				'sub_id'		=> false,
				'order_score'	=> 'dl',
			),
			'decomail' => array(
				'sub_id'		=> true,
				'order_score'	=> 'dl',
			),
			'game' => array(
				'sub_id'		=> false,
				'order_score'	=> 'dl',
			),
			'sound' => array(
				'sub_id'		=> false,
				'order_score'	=> 'dl',
			),
		);
	}
	
}

/**
 * ランキングオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Ranking extends Ethna_AppObject
{
}
?>