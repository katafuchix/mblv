<?php
/**
 * File.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ե�����������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminFile extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$sqlWhere = "file_status = 1 ";
		$sqlValues = array();
		// �������褿���ϥե�����̾�ȥ��򸡺��оݤȤ���
		if($this->af->get('text') && $this->af->get('search')){
			$sqlWhere .= " AND ( file_name_o like ? OR file_memo like ? )";
			$sqlValues[] = '%'.$this->af->get('text').'%';
			$sqlValues[] = '%'.$this->af->get('text').'%';
		}
		// �ڡ�����
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