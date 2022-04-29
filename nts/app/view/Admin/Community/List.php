<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ������ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// ���ߥ�˥ƥ�̾����
			'community_title' => array(
				'type' => 'LIKE',
				'column' => 'c.community_title',
			),
			// ���ߥ�˥ƥ���������
			'community_description' => array(
				'type' => 'LIKE',
				'column' => 'c.community_description',
			),
			// ���ߥ�˥ƥ����ƥ��긡��
			'community_category_id' => array(
				'column' => 'cca.community_category_id',
			),
			// ���ߥ�˥ƥ����ơ���������
			'community_status' => array(
				'column' => 'c.community_status',
			),
			// ���ߥ�˥ƥ��ƻ륹�ơ���������
			'community_checked' => array(
				'column' => 'c.community_checked',
			),
			// ������������
			'community_created' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_created_time',
			),
			// ������������
			'community_updated' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_updated_time',
			),
			// �����������
			'community_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'c.community_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' c.community_category_id = cca.community_category_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'c.community_id,c.community_title,c.community_description,c.community_member_num,c.community_status,c.community_checked,c.community_created_time,c.community_updated_time,c.community_deleted_time,' .
				'cca.community_category_name',
			'sql_from'		=> 'community as c,community_category as cca',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.community_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>