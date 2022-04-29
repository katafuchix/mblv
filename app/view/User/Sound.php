<?php
/**
 * Sound.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������ɥݡ�����ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSound extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ������ɥ��ƥ�����������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'sound_category',
			'sql_where'		=> 'sound_category_status = 1 AND sound_category_priority_id > 0',
			'sql_order'		=> 'sound_category_priority_id DESC',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r);
		
		// ������ɥ�󥭥�
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'sound s, sound_category sc, ranking r',
			'sql_where'		=> 'r.type = ? AND s.sound_id = r.id AND s.sound_status = 1 AND s.sound_category_id = sc.sound_category_id',
			'sql_values'	=> array('sound'),
			'sql_order'		=> 'r.ranking_order LIMIT 3'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// CMS
		$o = & new Tv_Config($this->backend, 'config_type', 'sound');
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('site_cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('site_cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('site_cms_html3')));
		
		// ������������
		$condition = array(
			// news_type ����
			'news_type' => array(
				'type' => 'REGEXP',
				'column' => 'news_type',
			),
		);
		
		// SOUND��ɽ��
		$this->af->set('news_type', NEWS_TYPE_SOUND);
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