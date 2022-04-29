<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ��ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminbbsList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �񤭹��ߥ桼��ID����
			'from_user_id' => array(
				'column' => 'fu.user_id',
			),
			// �񤭹��ޤ줿�桼��ID����
			'to_user_id' => array(
				'column' => 'fu.user_id',
			),
			// �񤭹��ߥ桼���˥å��͡��ม��
			'from_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// �񤭹��ޤ줿�桼���˥å��͡��ม��
			'to_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// ����ID����
			'bbs_id' => array(
				'column' => 'mb.bbs_id',
			),
			// ������ʸ����
			'message' => array(
				'type' => 'LIKE',
				'column' => 'mb.bbs_body',
			),
			// ��å��������ơ���������
			'bbs_status' => array(
				'column' => 'mb.bbs_status',
			),
			// ��å������ƻ륹�ơ���������
			'bbs_checked' => array(
				'column' => 'mb.bbs_checked',
			),
			// �����������
			'bbs_created' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_created_time',
			),
			// ������������
			'bbs_updated' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_updated_time',
			),
			// �����������
			'bbs_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('bbs_status') == "") $this->af->set('bbs_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = mb.from_user_id AND tu.user_id = mb.to_user_id ';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as from_user_id,fu.user_nickname as from_user_nickname,
				tu.user_id as to_user_id,tu.user_nickname as to_user_nickname,
				mb.bbs_id,mb.bbs_body,mb.bbs_status,mb.bbs_checked,mb.bbs_created_time,mb.bbs_updated_time,mb.bbs_deleted_time,mb.image_id',
			'sql_from'	=> 'user as fu,user as tu,bbs as mb LEFT JOIN image ON mb.image_id = image.image_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'mb.bbs_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>