<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ファイル一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminFileList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// HIDDENフォーム生成
		$hiddenVars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// 検索条件の生成
		$condition = array(
			// ユーザID検索
			'user_id' => array(),
			// MIMEタイプ検索
			'file_mime_type' => array(
				'type' => 'LIKE',
			),
			// ファイルサイズ
			'file_size' => array(
				'type' => 'RANGE',
			),
			// アップロード日時検索
			'file_upload' => array(
				'type' => 'PERIOD',
				//'column' => 'file_upload_time',
				'column' => 'file_created_time ',
			),
			// 監視
			'file_check' => array(),
			// 状態
			'file_status' => array(),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 表示順
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'file_mime_type', 'file_size', 'file_created_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 2){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_file_search_do',
			'sql_select'	=> '*',
			'sql_from'		=> 'file',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>