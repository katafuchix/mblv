<?php
/**
 * Avatar.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���Х����ݡ�������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatar extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ���å���������������ʴ������̤���桼���򥲥��Ȳ�����ȼ�������󤫤�ͭ���Ȥʤ�ޤ���
		$user = $this->session->get('user');
		
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
		
		// ���Х�����󥭥�
		$sqlWhere = 'r.type = ? AND a.avatar_id = r.id AND a.avatar_status = 1';
		$sqlValues = array('avatar');
		
		// ���̾�����ɲä���
		// �������פʤ�Сֽ����ѡװʳ���ɽ��
		if($u->get('user_sex')==1){
			$exclude_sex = 2;
		}
		// �ֽ����פʤ�С������ѡװʳ���ɽ��
		elseif($u->get('user_sex')==2){
			$exclude_sex = 1;
		}
		$sqlWhere .= " AND a.avatar_sex_type <> ?";
		$sqlValues[] = $exclude_sex;
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar a, ranking r',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// CMS
		$o = &new Tv_Cms($this->backend, 'cms_type', 2);
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('cms_html3')));
		
		// �˥塼�������μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_AVATAR);
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}

?>
