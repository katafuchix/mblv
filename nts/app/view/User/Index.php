<?php
/**
 * Index.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �桼���ȥåץڡ����ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserIndex extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public
	 */
	function preforward()
	{
		// �����ϩ¬��
		if($this->af->get('code')){
			// ��ǥ�����ͳ�Υ���������Ƚ��
			$mm = $this->backend->getManager('Media');
			$media_access_hash = $mm->addMediaAccess();
			// ���å���󤬻ϤޤäƤ��ʤ����ϳ���
			if(!$this->session->isStart()){
				$this->session->start(0);
			} 
			// ��ǥ�����ͳ�ǤΥ��������ξ��ϥѥ�᡼���򥻥å����˳�Ǽ���ư����Ѥ�
			$this->session->set('media_access_hash', $media_access_hash); 
		}
		
		// �˥塼�������μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
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
