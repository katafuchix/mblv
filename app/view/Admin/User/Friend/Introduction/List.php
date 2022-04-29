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
class Tv_View_AdminUserFriendIntroductionList extends Tv_ListViewClass
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
				'column' => 'f.from_user_id',
			),
			// �����桼��ID����
			'to_user_id' => array(
				'column' => 'f.to_user_id',
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
			// �Ҳ�ʸ����
			'friend_introduction' => array(
				'type' => 'LIKE',
				'column' => 'f.friend_introduction',
			),
			// �Ҳ�ʸ�ƻ륹�ơ���������
			'friend_checked' => array(
				'column' => 'f.friend_checked',
			),
			// �Ҳ�ʸ���ơ���������
			'friend_status' => array(
				'column' => 'f.friend_status',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  'fu.user_id = f.from_user_id AND tu.user_id = f.to_user_id AND ' .
			"f.friend_introduction <> ''";
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'f.from_user_id, fu.user_nickname as from_user_nickname,
				f.to_user_id, tu.user_nickname as to_user_nickname,
				f.friend_id, f.friend_introduction, f.friend_checked, f.friend_status',
			'sql_from'	=> 'user as fu, user as tu, friend as f',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'f.friend_id DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>