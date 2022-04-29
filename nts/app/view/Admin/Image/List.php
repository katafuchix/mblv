<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminImageList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(),
			// MIME�����׸���
			'image_mime_type' => array(
				'type' => 'LIKE',
			),
			// ����������
			'image_size' => array(
				'type' => 'RANGE',
			),
			// ������������
			'image_created' => array(
				'type' => 'PERIOD',
				'column' => 'image_created_time ',
			),
			// �����������
			'image_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'image_deleted_time ',
			),
			// ����
			'image_status' => array(),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ɽ����
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'image_mime_type', 'image_size', 'image_created_time', 'image_deleted_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 2){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}else{
			$sqlOrder .= 'image_created_time DESC';
		}
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_image_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'image',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>