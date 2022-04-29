<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 送料設定一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcPostageList extends Tv_ListViewClass
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
			// postage ID検索
			'postage_id' => array(
				'column' => 'postage_id',
			),
			// postage name検索
			'postage_name' => array(
				'type' => 'LIKE',
				'column' => 'postage_name',
			),
			// ステータス検索
			'postage_status' => array(
				'column' => 'postage_status',
			),
			// 作成日時検索
			'postage_created' => array(
				'type' => 'PERIOD',
				'column' => 'postage_created_time',
			),
			// 更新日時検索
			'postage_updated' => array(
				'type' => 'PERIOD',
				'column' => 'postage_updated_time',
			),
			// 削除日時検索
			'postage_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'postage_deleted_time',
			),
			'postage_add' => array(
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('postage_status') == "") $this->af->set('postage_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' postage ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'postage_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>