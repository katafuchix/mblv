<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理画像一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminImageList extends Tv_ListViewClass
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
				'column' => 'image.user_id',
			),
			// MIMEタイプ検索
			'image_mime_type' => array(
				'type' => 'LIKE',
				'column' => 'image.image_type',
			),
			// 画像サイズ
			'image_size' => array(
				'type' => 'RANGE',
				'column' => 'image.image_size',
			),
			// 作成日時検索
			'image_created' => array(
				'type' => 'PERIOD',
				'column' => 'image.image_created_time',
			),
			// 監視
			'image_checked' => array(
				'column' => 'image.image_checked',
			),
			// 状態
			'image_status' => array(
				'column' => 'image.image_status',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('image_status') == "") $this->af->set('image_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 表示順
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'image_mime_type', 'image_size', 'image_created_time', 'image_deleted_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 1){
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
			'sql_select'	=> 
								'image.image_id, image.image_status, image.image_created_time, image.image_deleted_time,' .
								'image.user_id, user.user_nickname, image.image_mime_type, image.image_size, image.image_checked, image.image_status',
			'sql_from'		=> 'image LEFT JOIN user ON image.user_id = user.user_id ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>