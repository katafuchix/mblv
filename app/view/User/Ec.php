<?php
/**
 * �⡼��ȥåץڡ�����ɽ��
 */
class Tv_View_UserEc extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// CMS
		$o = &new Tv_Config($this->backend, 'config_type', 'mall');
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('site_cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('site_cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('site_cms_html3')));
		
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
		
		// ����åװ����μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$param = array(
			'sql_select'	=> 'shop_id, shop_name, shop_news, shop_image1',
			'sql_from'		=> 'shop',
			'sql_where'		=> 'shop_id in ( select distinct shop_id from item_category where item_category_status = 1 ) AND shop_status = 1',
			'sql_order'		=> 'shop_priority_id ASC'
		);
		
		$s = $um->dataQuery($param);
		$this->af->setAppNe('shop_list', $s); 
		
		// ͭ���ʥ��ơ������ξ��ʤΤ߼�������
		$sqlWhere = 'r.type = ? AND i.item_id = r.id AND i.item_status = 1';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
		// ��󥭥󥰼���
		$sqlValues[] = 'item';
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'item i left join ranking r on i.item_id = r.id',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3'
		);
		
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
	}
}
?>