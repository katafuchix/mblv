<?php
/**
 * Top.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ポータル画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserTop extends Tv_ListViewClass
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
			// news_type 検索
			'news_type' => array(
				'type' => 'REGEXP',
				'column' => 'news_type',
			),
		);
		
		// TOPを表示
		$this->af->set('news_type', NEWS_TYPE_TOP);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere .= ' AND news_status = 1';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= ' AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ';
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= ' AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ';
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'news_updated_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>