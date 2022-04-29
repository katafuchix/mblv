<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ポイント一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminPointList extends Tv_ListViewClass
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
			// 作成日時検索
			'point_created' => array(
				'type' => 'PERIOD',
				'column' => 'p.point_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = p.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u,point as p',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'p.point_created_time DESC',
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
			$html = $renderer->engine->fetch('admin/csv/point.tpl');
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