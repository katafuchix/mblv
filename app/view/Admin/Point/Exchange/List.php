<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ポイント交換一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminPointExchangeList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// ユーザID検索
			'user_id' => array(
				'column' => 'u.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ポイントタイプ
			'point_type' => array(
				'column' => 'p.point_type',
			),
			// ポイントID
			'point_id' => array(
				'column' => 'p.point_id',
			),
			// ポイントサブID
			'point_sub_id' => array(
				'column' => 'p.point_sub_id',
			),
			// ユーザサブID
			'user_sub_id' => array(
				'column' => 'p.user_sub_id',
			),
			// ポイント備考
			'point_memo' => array(
				'type'	=> 'LIKE',
				'column' => 'p.point_memo',
			),
			// ポイントステータス
			'point_status' => array(
				'column' => 'p.point_status',
			),
			// ポイント取得日時検索
			'point_exchange_created' => array(
				'type' => 'PERIOD',
				'column' => 'pe.point_exchange_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件を付与
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= 'pe.point_id = p.point_id AND p.user_id = u.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u, point as p, point_exchange as pe',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'pe.point_exchange_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
	
	/**
	 * CSVを出力する
	 */
	 /*
	function forward()
	{
		// CSVダウンロードの場合
		if($this->af->get('csv')){
			$file_name = date('Ymd_His') . ".csv";
			header("Content-Disposition: inline ; filename=$file_name" );
			header("Content-type: text/octet-stream");
			header("Content-Length: ". strlen($result));
			
			if($this->af->get('point_type') ==10){
				$template = 'ebank';
			}elseif($this->af->get('point_type') ==11){
				$template = 'edy';
			}else{
				$template = 'normal';
			}
		}
		if($template){
			$renderer =& $this->_getRenderer();
			$this->_setDefault($renderer);
			$html = $renderer->engine->fetch('admin/csv/' . $template . '.tpl');
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
		}else{
			parent::forward();
		}
	}
	*/
}
?>