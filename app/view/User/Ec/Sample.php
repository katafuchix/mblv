<?php
/**
 * Sample.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����ץ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcSample extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// �����ƥ����μ���
		$itemObject =& new Tv_Item($this->backend,'item_id',$this->af->get('item_id'));
		$this->af->setAppNE('item_detail',$itemObject->get('item_detail'));
		$this->af->setAppNE('item_spec',$itemObject->get('item_spec'));
		$itemObject->exportform();
		
		$this->af->setAppNE('item_text2',$itemObject->get('item_text2'));
		
		// ���ʺ߸˰����μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$param = array(
			'sql_select'	=> 'stock_id, item_type, stock_num, stock_one_type_status',
			'sql_from'		=> 'stock',
			'sql_where'		=> 'stock_status = 1 and item_id = ?',
			'sql_values'	=> array($this->af->get('item_id')),
			'sql_order'		=> 'stock_priority_id ASC'
		);
		$stockList = $um->dataQuery($param);

		if(count($stockList) == 0) {
			$zaiko_error = true;
		} else {
			// �����ƥॿ���ץ��ץ����
			foreach($stockList as $k => $v){
				$stock_id = $v['stock_id'];
				if($v['stock_num']>0){
					$item_type_list[$stock_id]['name'] = $v['item_type'];
					if($v['stock_one_type_status']){
						$this->af->setApp("stock_one_type_status",$v['stock_one_type_status']);
						$this->af->setApp("one_type_only_id",$v['stock_id']);
					}
				}else{
					$zaiko_error = true;
				}
			}
		}
		
		if($zaiko_error) $this->af->setApp("zaikoerror","���侦�ʤ˴ؤ��Ƥ�����Ǥ��ʤ��褦�ˤʤäƤ���ޤ���");
		$this->af->setApp("item_type_list",$item_type_list);
		
		// �Ŀ����ץ����
		for($i=1;$i<=9;$i++){
			$item_num_list[$i]['name'] = $i;
		}
		$this->af->setApp("item_num_list",$item_num_list);
		
		// ����ץ��������μ���
		$param = array(
			'sql_select'	=> 'sample_id, sample_name, sample_image',
			'sql_from'		=> 'sample',
			'sql_where'		=> 'sample_status = 1 and item_id = ?',
			'sql_values'	=> array($this->af->get('item_id')),
			'sql_order'		=> 'sample_priority_id ASC'
		);
		$sampleList = $um->dataQuery($param);
		$this->af->setApp('sample_list',$sampleList);
		
		// SHOP_ID�������
		$param = array(
			'sql_select'	=> 'shop_id',
			'sql_from'		=> 'item',
			'sql_where'		=> 'item_id = ?',
			'sql_values'	=> array($this->af->get('item_id'))
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('shop_id', $r[0]['shop_id']);
		$this->af->setApp('shop_new_arrivals', $r[0]['shop_new_arrivals']);
		
		// ����Υ���ץ��������μ���
		$sampleObject =& new Tv_Sample($this->backend,'sample_id',$this->af->get('sample_id'));
		$sampleObject->exportform();
	}
}
?>