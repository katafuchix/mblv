<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʰ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		//where������
		$sqlWhere = " 1 ";
		
		//������ɸ���
		if($this->af->get('keyword')){
			//�������ʡ�Ⱦ��/���ѡˤΤߤ�ñ��ʤ�Ⱦ��/����ξ���Ǹ�������
			$keyword = $this->af->get('keyword');
			$keyword_z = mb_convert_kana($keyword, "KV");//Ⱦ�Ѣ�����
			$keyword_h = mb_convert_kana($keyword, "k");//���Ѣ�Ⱦ��
			$sqlWhere .= " and(i.item_name LIKE ? or i.item_name like ? or i.item_name like ?) ";
			$sqlValues[] = "%" . $keyword . "%";
			$sqlValues[] = "%" . $keyword_z . "%";
			$sqlValues[] = "%" . $keyword_h . "%";
		}
		
		//����å׸���
		if($this->af->get('shop') != ""){
			$sqlWhere .= " AND i.shop_id = ? ";
			$sqlValues[] = $this->af->get('shop');
		}
		
		//���ƥ���ơ��֥�ȥ����ƥ�ơ��֥�����
		if($this->af->get('item_category') != ""){
			$sqlWhere .= " AND (";
			
			$sqlWhere .= ' i.item_category_id = ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ?)';
			$sqlValues[] = $this->af->get('item_category');
			$sqlValues[] = '^' . $this->af->get('item_category') . ',';
			$sqlValues[] = ',' . $this->af->get('item_category') . '$';
			$sqlValues[] = ',' . $this->af->get('item_category') . ',';
		}
		
		//���ƥ���ơ��֥�ȥ����ƥ�ơ��֥�����
		if($this->af->get('category_id') != ""){
			$sqlWhere .= ' (i.item_category_id = ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ?)';
			$sqlValues[] = $this->af->get('item_category');
			$sqlValues[] = '^' . $this->af->get('item_category') . ',';
			$sqlValues[] = ',' . $this->af->get('item_category') . '$';
			$sqlValues[] = ',' . $this->af->get('item_category') . ',';
		}
		
		//ͽ��min
		if($this->af->get('price_start') != ""){
			$sqlWhere .= " AND i.item_price >= ? ";
			$sqlValues[] = $this->af->get('price_start');
		}
		
		//ͽ��max
		if($this->af->get('price_end') != ""){
			$sqlWhere .= " AND i.item_price <= ? ";
			$sqlValues[] = $this->af->get('price_end');
		}
		
		//��ʧ��ˡ����
		if($this->af->get('item_order_type') != ""){
			if($this->af->get('item_order_type') == 1)$item_order_type_flag = 'item_use_credit_status';
			if($this->af->get('item_order_type') == 2)$item_order_type_flag = 'item_use_conveni_status';
			if($this->af->get('item_order_type') == 3)$item_order_type_flag = 'item_use_exchange_status';
			if($this->af->get('item_order_type') == 4)$item_order_type_flag = 'item_use_transfer_status';
			$sqlWhere .= " AND i.$item_order_type_flag = 1 ";
		}
		
		//�¤ӽ�
		if($this->af->get('sort_order') != ""){
			if($this->af->get('sort_order') == 2)$sqlOrder = ' i.item_price asc ';	//���ʤ��¤�
			if($this->af->get('sort_order') == 3)$sqlOrder = ' i.item_price desc ';	//���ʤ��⤤
			
			//�͵���ξ���ranking�ȷ�礹��
			if($this->af->get('sort_order') == 1){
				//�͵���Ǿ���
				$sqlOrder = ' r.ranking_order desc ';
				//���
				$join = ' left join ranking r on i.item_id = r.id AND '.
						"  r.type = 'item '";
			}
		}else{
			$sqlOrder = ' i.item_id desc ';
		}
		
		//ɽ�����Ƥ褤���ʤΤ߸���(item_status:0:���,1:ɽ��,2:��ɽ��  
		$sqlWhere.= " AND i.item_status = '1' ";
		
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (i.item_start_status = 0 OR (i.item_start_status = 1 AND i.item_start_time < now())) ';
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (i.item_end_status = 0 OR (i.item_end_status = 1 AND i.item_end_time > now())) ';
		$sqlSelect = "i.item_id, i.item_name, i.item_price, i.item_image, i.item_text1, i.item_label_front, i.item_label_back ";
		if($join) $sqlSelect.= " , ifnull(r.ranking_order, 10000)as rank ";//�͵���ξ��Ͻ�̤����
		
		$this->listview = array(
			'action_name'	=> 'user_ec_item_list',
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> 'item i ' . $join,
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5
		);
	}
}
?>