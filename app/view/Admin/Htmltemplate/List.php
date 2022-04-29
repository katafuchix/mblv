<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理HTMLテンプレート一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminHtmltemplateList extends Tv_ListViewClass
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
			// html_template_id 検索
			'html_template_id' => array(
				'column' => 'html_template_id',
			),
			// html_template_code 検索
			'html_template_code' => array(
				'type' => 'LIKE',
				'column' => 'html_template_code',
			),
			// 編集ステータス検索
			'html_template_edit' => array(
				'column' => 'html_template_edit',
			),
			// 最終更新開始日時検索
			'html_template_edit_start' => array(
				'type' => 'PERIOD',
				'column' => 'html_template_edit_start_time',
			),
			// 最終更新終了日時検索
			'html_template_edit_end' => array(
				'type' => 'PERIOD',
				'column' => 'html_template_edit_end_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere){
			$sqlWhere .= ' AND ';
		}
		$sqlWhere .= 'html_template_status > 0';
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_htmltemplate_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'html_template',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'html_template_edit_end_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>