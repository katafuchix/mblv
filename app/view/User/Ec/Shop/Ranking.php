<?php
/**
 * Ranking.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����å׾��ʥ�󥭥󥰲��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcShopRanking extends Tv_ViewClass //�ڡ����󥰤��ʤ��Τ�um��Ȥ�
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ����å׾���μ���
		$shopObject =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		// ����åץ�󥭥󥰤Υ����ƥ�ID�򥫥�޶��ڤ������ˤ���
		if($shopObject->get('shop_ranking')) $rankingId = split(",",$shopObject->get('shop_ranking'));
		
		$rankings = array();
		if(is_array($rankingId)){
			foreach($rankingId as $k=>$v){
				// ͭ���ʥ��ơ������ξ��ʤΤ߼�������
				$sqlWhere .= 'item_id = ? AND item_status = 1';
				// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
				$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
				// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
				$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
				
				$param = array(
					'sql_select'	=> '*',
					'sql_from'		=> 'item',
					'sql_where'		=> $sqlWhere,
					'sql_values'	=> array($v),
				);
				$r = $um->dataQuery($param);
				// �ǡ�����������ɲä���
				if(count($r)>0){
					$rankings[] = $r[0];
				}
			}
		}
		$this->af->setAppNE('shop_ranking_list',$rankings);
		
	}
}
?>