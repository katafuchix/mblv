<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 仕入先一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcSupplierList extends Tv_ListViewClass
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
			// supplier ID検索
			'supplier_id' => array(
				'column' => 'supplier_id',
			),
			// supplier name検索
			'supplier_name' => array(
				'type' => 'LIKE',
				'column' => 'supplier_name',
			),
			// ステータス検索
			'supplier_status' => array(
				'column' => 'supplier_status',
			),
			// 作成日時検索
			'supplier_created' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_created_time',
			),
			// 更新日時検索
			'supplier_updated' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_updated_time',
			),
			// 削除日時検索
			'supplier_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('supplier_status') == "") $this->af->set('supplier_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
				
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' supplier ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'supplier_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
		
	}
}
?>