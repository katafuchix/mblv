<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * レビュー一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcReviewList extends Tv_ListViewClass
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
			// review ID検索
			'review_id' => array(
				'column' => 'r.review_id',
			),
			// review title検索
			'review_title' => array(
				'type' => 'LIKE',
				'column' => 'r.review_title',
			),
			// review body検索
			'review_body' => array(
				'type' => 'LIKE',
				'column' => 'r.review_body',
			),
			// ステータス検索
			'review_status' => array(
				'column' => 'r.review_status',
			),
			// 作成日時検索
			'review_created' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_created_time',
			),
			// 更新日時検索
			'review_updated' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_updated_time',
			),
			// 削除日時検索
			'review_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_deleted_time',
			),
			// ニックネーム
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			'item_name' => array(
				'type' => 'LIKE',
				'column' => 'i.item_name',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere){
			$sqlWhere .= " AND u.user_id = r.user_id AND r.item_id = i.item_id" ;
		}else{
			$sqlWhere .= " u.user_id = r.user_id AND r.item_id = i.item_id" ;
		}
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' review r, user u, item i',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'review_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>