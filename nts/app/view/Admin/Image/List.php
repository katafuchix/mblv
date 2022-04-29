<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理画像一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminImageList extends Tv_ListViewClass
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
			'user_id' => array(),
			// MIMEタイプ検索
			'image_mime_type' => array(
				'type' => 'LIKE',
			),
			// 画像サイズ
			'image_size' => array(
				'type' => 'RANGE',
			),
			// 作成日時検索
			'image_created' => array(
				'type' => 'PERIOD',
				'column' => 'image_created_time ',
			),
			// 削除日時検索
			'image_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'image_deleted_time ',
			),
			// 状態
			'image_status' => array(),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 表示順
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'image_mime_type', 'image_size', 'image_created_time', 'image_deleted_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 2){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}else{
			$sqlOrder .= 'image_created_time DESC';
		}
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_image_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'image',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>