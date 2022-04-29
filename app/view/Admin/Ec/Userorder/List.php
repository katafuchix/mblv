<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * オーダー一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcUserorderList extends Tv_ListViewClass
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
			// user_order ID検索
			'user_order_id' => array(
				'column' => 'user_order_id',
			),
			// 注文番号検索
			'user_order_no' => array(
				'column' => 'user_order_no',
			),
			// user_name検索
			'user_name' => array(
				'type'	=> 'LIKE',
				'column' => 'u.user_name',
			),
			// 商品名
			'item_name' => array(
				'type'	=> 'LIKE',
				'column'		=> 'i.item_name',
			),
			// ステータス検索
			'user_order_status' => array(
				'column' => 'user_order_status',
			),
			// カートID検索
			'cart_id' => array(
				'column' => 'c.cart_id',
			),
			// カートステータス検索
			'cart_status' => array(
				'column' => 'c.cart_status',
			),
			// 支払方法
			'user_order_type' => array(
				'column' => 'o.user_order_type',
			),
			// 作成日時検索
			'user_order_created' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_created_time',
			),
			// 更新日時検索
			'user_order_updated' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_updated_time',
			),
			// 削除日時検索
			'user_order_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 検索条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= "o.cart_hash = c.cart_hash AND o.user_id = u.user_id AND c.item_id = i.item_id AND c.stock_id = s.stock_id ";
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'		=> ' user_order as o, cart as c, user as u, item as i, stock as s ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'user_order_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
	
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  @access public
	 */
	function forward()
	{
		// ダウンロードの場合
		if($this->af->get('download')){
			// 全件取得
			$this->listview['data_only'] = true;
			// listview実行
			$this->build();
			// ファイル名の決定
			$file_name = date('Ymd_His') . ".csv";
			// ファイル名ヘッダ出力
			header("Content-Disposition: inline ; filename={$file_name}" );
			// MIMEタイプヘッダ出力
			header("Content-type: text/octet-stream");
			// レンダラオブジェクトを取得
			$renderer =& $this->_getRenderer();
			// デフォルトマクロを実行
			$this->_setDefault($renderer);
			// HTMLを取得
			$html = $renderer->engine->fetch('admin/csv/order.tpl');
			// サイズヘッダ出力
			header("Content-Length: ". strlen($html));
			// 文字コードを変換して出力
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
			// 終了
			exit;
		}
		// その他の場合
		else{
			parent::forward();
		}
	}
}
?>