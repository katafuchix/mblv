<?php
/**
 * Top.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * �ݡ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserTop extends Tv_ListViewClass
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
			// news_type ����
			'news_type' => array(
				'type' => 'REGEXP',
				'column' => 'news_type',
			),
		);
		
		// TOP��ɽ��
		$this->af->set('news_type', NEWS_TYPE_TOP);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �˥塼�������μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere .= ' AND news_status = 1';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ';
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ';
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'news_updated_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>