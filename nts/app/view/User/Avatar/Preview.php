<?php
/**
 * Preview.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ץ�ӥ塼���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarPreview extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// ���å���󤫤饢�Х���������������
		$cart_avatar = $this->session->get('cart_avatar');
		
		// �桼��������������
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// ���Х������ƥ�����������
		// ���̥桼���ξ���ͥ���1�פޤ�ɽ��������
		$priority = 1;
		// �����ȥ桼���ξ���ͥ���-1�פޤ�ɽ��������
		if($u->get('user_guest_status') == 1) $priority = -1;
		// �����åե桼���ξ���ͥ���-2�פޤ�ɽ��������
		if($u->get('user_guest_status') == 2) $priority = -2;
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar_category',
			'sql_where'		=> 'avatar_category_status = 1 AND avatar_category_priority_id >= ? AND avatar_category_priority_id <> 0',
			'sql_values'	=> array($priority),
			'sql_order'		=> 'avatar_category_priority_id DESC'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		
		// �������
		$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
		$sqlValues = array($user['user_id']);
		
		// �����楢�Х�������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere . ' AND ua.user_avatar_wear = 1',
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
		);
		$r = $um->dataQuery($param);
		$user_avatar_wear_list = $r;
		
		// �㤤ʪ�����ˤ��륢�Х���������������
		$avatar_list = array();
		$total_point = 0;
		if(is_array($cart_avatar)){
			foreach($cart_avatar as $k => $v){
				// ���Х�����������
				$a = new Tv_Avatar($this->backend, 'avatar_id', $v['avatar_id']);
				$avatar_list[$k] = $a->getNameObject();
				$avatar_list[$k]['avatar_wear'] = $v['avatar_wear'];
				// ��ᤷ�Ƥ����Τξ��
				if($v['avatar_wear']){
					// �ݥ���Ȥ�׻�����
					$total_point += $a->get('avatar_point');
					// ������ꥹ�Ȥ��ɲ�
					$l = $a->getNameObject();
					$user_avatar_wear_list[] = $l;
				}
			}
		}
		$this->af->setApp('data_list', $avatar_list);
		$this->af->setApp('total_point', $total_point);
		
		$this->af->setApp('user_avatar_wear_list', $user_avatar_wear_list); 
		
		// ���ƥ������μ���
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>
