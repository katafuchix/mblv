<?php
/**
 * Log.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理HTMLテンプレートログ画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminHtmltemplateLog extends Tv_ListViewClass
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
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_htmltemplate_log',
			'sql_select'	=> '*',
			'sql_from'		=> 'html_template_log',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'html_template_log_id ASC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>