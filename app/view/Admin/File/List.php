<?php
/**
 * List.php
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
class Tv_View_AdminFileList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// HIDDEN�ե���������
		$hiddenVars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(),
			// MIME�����׸���
			'file_mime_type' => array(
				'type' => 'LIKE',
			),
			// �ե����륵����
			'file_size' => array(
				'type' => 'RANGE',
			),
			// ���åץ�����������
			'file_upload' => array(
				'type' => 'PERIOD',
				//'column' => 'file_upload_time',
				'column' => 'file_created_time ',
			),
			// �ƻ�
			'file_check' => array(),
			// ����
			'file_status' => array(),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ɽ����
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'file_mime_type', 'file_size', 'file_created_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 2){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}
		
		// �ڡ�����
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