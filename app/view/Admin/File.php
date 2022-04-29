<?php
/**
 * File.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ファイル管理画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminFile extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$sqlWhere = "file_status = 1 ";
		$sqlValues = array();
		// 検索で来た場合はファイル名とメモを検索対象とする
		if($this->af->get('text') && $this->af->get('search')){
			$sqlWhere .= " AND ( file_name_o like ? OR file_memo like ? )";
			$sqlValues[] = '%'.$this->af->get('text').'%';
			$sqlValues[] = '%'.$this->af->get('text').'%';
		}
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_file',
			'sql_select'	=> '*',
			'sql_from'		=> 'file',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'file_id DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>