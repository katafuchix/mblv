<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���˥塼���������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserNewsList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$news_type = NEWS_TYPE_TOP;
		if($this->af->get('news_type')) $news_type = $this->af->get('news_type');
		
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array($news_type);
		$this->listview = array(
			'action_name'	=> 'user_news_list',
			'sql_select'	=> 'news_id, news_title',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
		);
		
		switch($news_type)
		{
		case NEWS_TYPE_TOP:
			$this->af->setApp('return_href', '?action_user_top=true');
			$this->af->setApp('return_name', '�Ύߎ�����');
			break;
		case NEWS_TYPE_AVATAR:
			$this->af->setApp('return_href', '?action_user_avatar=true');
			$this->af->setApp('return_name', '���ʎގ���');
			break;
		case NEWS_TYPE_DECOMAIL:
			$this->af->setApp('return_href', '?action_user_decomail=true');
			$this->af->setApp('return_name', '�Îގ��Ҏ���');
			break;
		case NEWS_TYPE_GAME:
			$this->af->setApp('return_href', '?action_user_game=true');
			$this->af->setApp('return_name', '���ގ���');
			break;
		case NEWS_TYPE_SOUND:
			$this->af->setApp('return_href', '?action_user_sound=true');
			$this->af->setApp('return_name', '�����ݎĎ�');
			break;
		}
		
		$this->af->set('news_type', $news_type);
	}
}
?>
