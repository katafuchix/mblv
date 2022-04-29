<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ニュース一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminNewsList extends Tv_ListViewClass
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
			// news_id 検索
			'news_id' => array(
				'column' => 'news_id',
			),
			// news_title 検索
			'news_title' => array(
				'type' => 'LIKE',
				'column' => 'news_title',
			),
			// news_body 検索
			'news_body' => array(
				'type' => 'LIKE',
				'column' => 'news_body',
			),
			// news_type 検索
			'news_type' => array(
				'type' => 'REGEXP_IN',
				'column' => 'news_type',
			),
			// news_time検索
			'news_time' => array(
				'column' => 'news_time',
			),
			// ステータス検索
			'news_status' => array(
				'column' => 'news_status',
			),
			// 配信開始テータス検索
			'news_start_status' => array(
				'column' => 'news_start_status',
			),
			// 配信終了テータス検索
			'news_end_status' => array(
				'column' => 'news_end_status',
			),
			// 配信開始日時検索
			'news_start' => array(
				'type' => 'PERIOD',
				'column' => 'news_start_time',
			),
			// 配信終了テータス検索
			'news_end_status' => array(
				'column' => 'news_end_status',
			),
			// 配信終了日時検索
			'news_end' => array(
				'type' => 'PERIOD',
				'column' => 'news_end_time',
			),
			// 作成日時検索
			'news_created' => array(
				'type' => 'PERIOD',
				'column' => 'news_created_time',
			),
			// 更新日時検索
			'news_updated' => array(
				'type' => 'PERIOD',
				'column' => 'news_updated_time',
			),
			// 削除日時検索
			'news_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'news_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('news_status') == "") $this->af->set('news_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ニュース一覧の取得
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'news_updated_time DESC',
		);
		// ListViewを実行する
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// 投稿先名をセットする
		$news_types = $this->config->get('news_type');
		foreach($listview_data as $k=>$v){
			// 投稿先を分解する
			$data = explode(',',$v['news_type']);
			// すべての投稿先に対して処理を行う
			foreach($data as $v2){
				// 該当の投稿先名が存在する場合
				if($news_types[$v2]['name']){
					// 今回表示するデータに追加する
					$listview_data[$k]['news_type_name'] .= "[".$news_types[$v2]['name']."] ";
				}
			}
		}
		
		// テンプレートに引き渡す
		$this->af->setApp('listview_data', $listview_data);
	}
}
?>