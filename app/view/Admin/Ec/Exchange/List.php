<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 代引き手数料設定一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcExchangeList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// exchange ID検索
			'exchange_id' => array(
				'column' => 'exchange_id',
			),
			// exchange name検索
			'exchange_name' => array(
				'type' => 'LIKE',
				'column' => 'exchange_name',
			),
			// ステータス検索
			'exchange_status' => array(
				'column' => 'exchange_status',
			),
			// 作成日時検索
			'exchange_created' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_created_time',
			),
			// 更新日時検索
			'exchange_updated' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_updated_time',
			),
			// 削除日時検索
			'exchange_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('exchange_status') == "") $this->af->set('exchange_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' exchange ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'exchange_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
		
	}
}
?>