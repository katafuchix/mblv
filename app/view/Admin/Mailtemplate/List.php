<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メールテンプレート一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMailtemplateList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_mailtemplate_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'mail_template',
			'sql_where'	=> 'mail_template_status > 0',
			'sql_order'	=> 'mail_template_id ASC',
			'sql_values'	=> array(),
		);
	}
}
?>