<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティ一覧ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// コミュニティ名検索
			'community_title' => array(
				'type' => 'LIKE',
				'column' => 'c.community_title',
			),
			// コミュニティ説明検索
			'community_description' => array(
				'type' => 'LIKE',
				'column' => 'c.community_description',
			),
			// コミュニティカテゴリ検索
			'community_category_id' => array(
				'column' => 'cca.community_category_id',
			),
			// コミュニティステータス検索
			'community_status' => array(
				'column' => 'c.community_status',
			),
			// コミュニティ監視ステータス検索
			'community_checked' => array(
				'column' => 'c.community_checked',
			),
			// 作成日時検索
			'community_created' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_created_time',
			),
			// 更新日時検索
			'community_updated' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_updated_time',
			),
			// 削除日時検索
			'community_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('community_status') == "") $this->af->set('community_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' c.community_category_id = cca.community_category_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'c.community_id,c.community_title,c.community_description,c.community_member_num,c.community_status,c.community_checked,c.community_created_time,c.community_updated_time,c.community_deleted_time,' .
				'cca.community_category_name,c.image_id',
			'sql_from'		=> 'community_category as cca, community as c LEFT JOIN image ON c.image_id = image.image_id ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.community_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>