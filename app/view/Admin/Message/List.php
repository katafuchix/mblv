<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������å������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMessageList extends Tv_ListViewClass
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
			// �����桼��ID����
			'from_user_id' => array(
				'column' => 'fu.user_id',
			),
			// �����桼��ID����
			'to_user_id' => array(
				'column' => 'tu.user_id',
			),
			// �����桼���˥å��͡��ม��
			'from_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// �����桼���˥å��͡��ม��
			'to_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// ��å�����ID����
			'message_id' => array(
				'column' => 'm.message_id',
			),
			// ��å����������ȥ븡��
			'message_title' => array(
				'type' => 'LIKE',
				'column' => 'm.message_title',
			),
			// ��å�������ʸ����
			'message_body' => array(
				'type' => 'LIKE',
				'column' => 'm.message_body',
			),
			// ��å��������ơ���������
			'message_status' => array(
				'column' => 'm.message_status',
			),
			// ��å������ƻ륹�ơ���������
			'message_checked' => array(
				'column' => 'm.message_checked',
			),
			// �����������
			'message_created' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_created_time',
			),
			// ������������
			'message_updated' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_updated_time',
			),
			// �����������
			'message_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('message_status') == "") $this->af->set('message_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = m.from_user_id AND tu.user_id = m.to_user_id ';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as from_user_id,fu.user_nickname as from_user_nickname,
				tu.user_id as to_user_id,tu.user_nickname as to_user_nickname,
				m.message_id,m.message_title,m.message_body,m.message_status,m.message_checked,m.message_created_time,m.image_id',
			'sql_from'	=> 'user as fu,user as tu,message as m LEFT JOIN image ON m.image_id = image.image_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'm.message_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>