<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * �����ե���������ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminFileRemoveConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'remove', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// ���ְ���
		$fileStatusList = array(
			1 => 'ͭ��',
			0 => '����Ѥ�', 
			2 => '�����Ԥˤ�äƺ���Ѥ�',
		);
		$this->af->setApp('fileStatusList', $fileStatusList);
		
		// ����оݥե��������������
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
