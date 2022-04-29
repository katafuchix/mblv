<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * 管理ファイル削除確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminFileRemoveConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'remove', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// 状態一覧
		$fileStatusList = array(
			1 => '有効',
			0 => '削除済み', 
			2 => '管理者によって削除済み',
		);
		$this->af->setApp('fileStatusList', $fileStatusList);
		
		// 削除対象ファイル一覧を生成
		$db = $this->backend->getDB();
		$sqlWhere = '0' . str_repeat(' OR file_id = ?', count($this->af->get('file_id')));
		$sqlOrder = '';
		if($this->af->get('sort_key') != '')
		{
			$key = array('user_id', 'file_mime_type', 'file_size', 'file_upload_time', 'file_status');
			$sqlOrder = ' ORDER BY ' . $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order')){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}
		$sql = 'SELECT * FROM file WHERE ' . $sqlWhere . $sqlOrder;		$rows = $db->db->getAll($sql, $this->af->get('file_id'), DB_FETCHMODE_ASSOC);
		$this->af->setApp('fileList', array(count($rows), $rows));
	}
}

?>
