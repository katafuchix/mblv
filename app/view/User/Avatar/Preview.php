<?php
/**
 * Preview.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����ץ�ӥ塼���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarPreview extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
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
		// �����ȥ桼���ξ���ͥ���-1�פޤ�ɽ��������
		$priority = 1;
		if($u->get('user_guest_status') == 1) $priority = -1;
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar_category',
			'sql_where'		=> 'avatar_category_status = 1 AND avatar_category_priority_id >= ?',
			'sql_values'	=> array($priority),
			'sql_order'		=> 'avatar_category_priority_id DESC'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
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
				}
			}
		}
		$this->af->setApp('data_list', $avatar_list);
		$this->af->setApp('total_point', $total_point);
		
		// ���ƥ������μ���
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>