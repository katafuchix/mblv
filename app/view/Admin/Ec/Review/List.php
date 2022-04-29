<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ӥ塼�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcReviewList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{

		// ������������
		$condition = array(
			// review ID����
			'review_id' => array(
				'column' => 'r.review_id',
			),
			// review title����
			'review_title' => array(
				'type' => 'LIKE',
				'column' => 'r.review_title',
			),
			// review body����
			'review_body' => array(
				'type' => 'LIKE',
				'column' => 'r.review_body',
			),
			// ���ơ���������
			'review_status' => array(
				'column' => 'r.review_status',
			),
			// ������������
			'review_created' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_created_time',
			),
			// ������������
			'review_updated' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_updated_time',
			),
			// �����������
			'review_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'r.review_deleted_time',
			),
			// �˥å��͡���
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			'item_name' => array(
				'type' => 'LIKE',
				'column' => 'i.item_name',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere){
			$sqlWhere .= " AND u.user_id = r.user_id AND r.item_id = i.item_id" ;
		}else{
			$sqlWhere .= " u.user_id = r.user_id AND r.item_id = i.item_id" ;
		}
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' review r, user u, item i',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'review_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>