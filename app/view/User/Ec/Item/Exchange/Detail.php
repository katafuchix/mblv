<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 手数料詳細画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemExchangeDetail extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		$this->af->setApp('from_mailaddress', $this->config->get('from_mailaddress'));
		
		//代引手数料設定名とタイプを取得、セット
		$i = new Tv_Item($this->backend, 'item_id', $this->af->get('item_id'));
		$exchange_id = $i->get('exchange_id');
		$e = new Tv_Exchange($this->backend, 'exchange_id', $exchange_id);
		$e->exportForm(OBJECT_IMPORT_IGNORE_NULL);
		$this->af->setApp('exchange_name', $e->get('exchange_name'));
		$this->af->setApp('exchange_type', $e->get('exchange_type'));
		
		
		if($exchange_id && $e->get('exchange_type') == 2){
			//金額範囲設定の場合はリストを取得
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'exchange_range',
				'sql_where'		=> 'exchange_id = ?',
				'sql_values'	=> array($exchange_id)
			);
			$rows = $um->dataQuery($param);
			
			if (PEAR::isError($rows)) return 'user_error';
			foreach($rows as $k => $v){
				$exchange_range_list[$k][start] = $v['exchange_range_start'];
				$exchange_range_list[$k][end] = $v['exchange_range_end'];
				$exchange_range_list[$k][price] = $v['exchange_range_price'];
			}
			$this->af->setApp('exchange_range_list', $exchange_range_list);
		}
	}
}
?>