<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Ȱ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @ac.ss public
 * @package    MBLV
 */
class Tv_View_AdminCommentList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @ac.ss public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(
				'column' => 'c.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ������ID����
			'comment_id' => array(
				'column' => 'c.comment_id',
			),
			// ��������ʸ����
			'comment_body' => array(
				'type' => 'LIKE',
				'column' => 'c.comment_body',
			),
			// �����ȥơ���������
			'comment_status' => array(
				'column' => 'c.comment_status',
			),
			// �����ȴƻ륹�ơ���������
			'comment_checked' => array(
				'column' => 'c.comment_checked',
			),
			// ������������
			'comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_created_time',
			),
			// ������������
			'comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_updated_time',
			),
			// �����������
			'comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('comment_status') == "") $this->af->set('comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' c.user_id = u.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,u.user_status,
				c.comment_id,c.comment_body,c.comment_status,c.comment_checked,c.comment_created_time,c.comment_updated_time,c.comment_deleted_time',
			'sql_from'	=> 'user as u,comment as c',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'c.comment_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>