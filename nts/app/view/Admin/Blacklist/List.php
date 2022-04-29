<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �֥�å��ꥹ�Ȱ����ڡ����ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBlacklistList extends Tv_ListViewClass
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
			// �֥�å��ꥹ�ȼԥ桼��ID����
			'black_list_user_id' => array(
				'column' => 'fu.user_id',
			),
			// �֥�å��ꥹ���оݼԥ桼��ID����
			'black_list_deny_user_id' => array(
				'column' => 'tu.user_id',
			),
			// �֥�å��ꥹ�ȼԥ桼���˥å��͡��ม��
			'black_list_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// �֥�å��ꥹ���оݼԥ桼���˥å��͡��ม��
			'black_list_fail_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// �֥�å��ꥹ��ID����
			'black_list_id' => array(
				'column' => 'bl.black_list_id',
			),
			// �֥�å��ꥹ�ȥ��ơ���������
			'black_list_status' => array(
				'column' => 'bl.black_list_status',
			),
			// �֥�å��ꥹ�ȴƻ륹�ơ���������
			'black_list_checked' => array(
				'column' => 'bl.black_list_checked',
			),
			// �����������
			'black_list_created' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_regist_time',
			),
			// ������������
			'black_list_updated' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_update_time',
			),
			// �����������
			'black_list_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_delete_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = bl.black_list_user_id AND tu.user_id = bl.black_list_deny_user_id ';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as black_list_user_id,fu.user_nickname as black_list_user_nickname,
				tu.user_id as black_list_deny_user_id,tu.user_nickname as black_list_deny_user_nickname,
				bl.black_list_id,bl.black_list_status,bl.black_list_checked,bl.black_list_regist_time,bl.black_list_update_time,bl.black_list_delete_time',
			'sql_from'	=> 'user as fu,user as tu,black_list as bl',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'bl.black_list_update_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>