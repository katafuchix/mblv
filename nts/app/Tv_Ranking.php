<?php
/**
 * Tv_Game.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ��󥭥󥰥ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_RankingManager extends Ethna_AppManager
{
	/**
	 * ��󥭥󥰤Υ��ơ�������Ԥ�
	 */
	function rotateRanking($type)
	{
		// [type]�̤˽�����ʬ������
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
	 * ��rotateRanking�������ؿ��˥�󥭥󥰤Υ��ơ�������Ԥ�
	 */
	function _rotateRanking($type)
	{
		$sm = & $this->backend->getManager('Stats');
		$um = $this->backend->getManager('Util');
		
		$ranking_type = $this->getRankingType();
		$stats_type = $sm->getStatsType();
		
		// ��󥭥󥰥ơ��֥�ϻ�����֤�᤮����Τ�������
		$deletetime = date("Y-m-d H:i:s", $um->getPreDate('day', -7));
		$db =& $this->backend->getDB();
//		$sql = "delete from ranking where type = {$type} AND ranking_created_time < {$deletetime}";
print		$sql = "delete from ranking where type = '".$type."'";
		$r = $db->db->query($sql);
		
		// �ǡ����������ơ��֥�
		$sqlFrom = $sm->getTableName($type, 'week');
		// �ǡ��������������
		$_sqlSelect = $stats_type[$type]['sql_select']['month'];
		$_sqlSelect[] = 'sub_id';
		// ����������
		// ǯ��ޤ����ä����
		if(is_array($sqlFrom)){
			// �ǡ������������������
			$sqlSelect = "";
			foreach($_sqlSelect as $v){
				$sqlSelect .= 
					"{$sqlFrom[0]}.{$v}" .
					"{$sqlFrom[1]}.{$v}";
			}
			// �ǡ�������ս�����
			$sqlWhere = 
				"{$sqlFrom[0]}.datetime >= ? AND {$sqlFrom[0]}.datetime <= NOW()" .
				"{$sqlFrom[1]}.datetime >= ? AND {$sqlFrom[1]}.datetime <= NOW()";
			$post = $um->getPreDate('day', -7);
			// �ǡ�������������
			$sqlValues[] = date("Y-m-d H:i:s", $post);
			$sqlValues[] = date("Y-m-d H:i:s", $post);
			// �ǡ����������ơ��֥�����
			$sqlFrom = implode(',', $sqlFrom);
		}
		// �̾�ξ��
		else{
			// �ǡ������������������
			$sqlSelect = implode(',', $_sqlSelect);
			// �ǡ�������ս�����
			$sqlWhere = "datetime >= ? AND datetime <= NOW()";
			// �ǡ�������������
			$post = $um->getPreDate('day', -7);
			$sqlValues[] = date("Y-m-d H:i:s", $post);
		}
		
		// ���ײ��Ͼ�����������
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
		
		// �ǡ������ʤ���������λ
		if(Ethna::isError($data)) return false;
		if(count($data) == 0) return false;
		
		// sub_id���[id]��󥭥󥰤ξ��
		$order_score = $ranking_type[$type]['order_score'];
		if($ranking_type[$type]['sub_id']){
			// [sub_id]�����������
			$sub_id_list = array();
			foreach($data as $l){
				if($l['sub_id'] && !in_array($l['sub_id'], $sub_id_list)){
					$sub_id_list[] = $l['sub_id'];
				}
			}
			
			// [sub_id]���ʤ���������λ
			if(count($sub_id_list) == 0) return false;
			
			// [sub_id]������Ф��ƽ�����Ԥ�
			foreach($sub_id_list as $k){
				// [sub_id]��Ǥ�[score]���������
				$score = array();
				$sub_data = array();
				foreach($data as $j => $l){
					if($l['sub_id'] == $k){
						$score[] = $l[$order_score];
						$sub_data[] = $l;
					}
				}
				// ��̥ǡ������ʤ����ϼ���[sub_id]�����˲��
				if(count($sub_data) == 0) continue;
				
				// [score]���ǥ����Ȥ���
				array_multisort($score, SORT_DESC, $sub_data);
				
				// �����������
				$order = $this->makeOrderArray($score);
				
				// [sub_id]ñ�̤Υ쥳������Ͽ
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
					// �ǡ�����¸��50��ޤ�
					if($i>=50) break;
				}
			}
		
		}
		// [id]��󥭥󥰤ξ��
		else{
			// [score]���������
			$score = array();
			foreach($data as $k => $v){
				$score[$k] = $v[$order_score];
			}
			
			// [score]���ǥ����Ȥ���
			array_multisort($score, SORT_DESC, $data);
			
			// �����������
			$order = $this->makeOrderArray($score);
			
			// [type]ñ�̤Υ쥳������Ͽ
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
				// �ǡ�����¸��50��ޤ�
				if($i>=50) break;
			}
		}
		return true;
	}
	
	/**
	 * key:��������value:��̤�������������
	 * list:������������
	 */	
	function makeOrderArray($data)
	{
		// ��ʣ�����
		$uniq = array_unique($data);
		
		// ��������¿����ν�˥����Ȥ���
		rsort($uniq);
		
		// key:��������value:��̤�������������
		$order = array();
		$i = 1;
		foreach($uniq as $k=>$v){
			$order[$v] = $i;
			$i++;
		}
		return $order;
	}
	
	/**
	 * ��󥭥�������������
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
 * ��󥭥󥰥��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Ranking extends Ethna_AppObject
{
}
?>