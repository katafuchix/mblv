<?php
/**
 * Decomail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �f�R���[���|�[�^����ʃr���[�N���X
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserDecomail extends Tv_ListViewClass
{
	/**
	 *  ��ʕ\���O����
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// �f�R���[���J�e�S���ꗗ���擾
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_status = 1 AND decomail_category_priority_id >= 1',
			'sql_order'		=> 'decomail_category_priority_id',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		// �e���v�������L���O
		// �����L���O
		$sqlValues = array('decomail');
		$sqlWhere = 'r.type = ? AND r.id = d.decomail_id AND d.decomail_status = 1';
		//if($decomail_category_id){
			$sqlWhere .= ' AND r.sub_id = ?';
			$sqlValues[] = 1;
		//}
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' ranking r, decomail d ',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order  LIMIT 3',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking1', $r); 
		
		// �����L���O
		$sqlValues = array('decomail');
		$sqlWhere = 'r.type = ? AND r.id = d.decomail_id AND d.decomail_status = 1';
		//if($decomail_category_id){
			$sqlWhere .= ' AND r.sub_id = ?';
			$sqlValues[] = 2;
		//}
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'ranking r, decomail d',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order LIMIT 3',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking2', $r); 
		
		// CMS
		$o = & new Tv_Config($this->backend, 'config_type', 'decomail');
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('site_cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('site_cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('site_cms_html3')));
		
		// ���������̐���
		$condition = array(
			// news_type ����
			'news_type' => array(
				'type' => 'REGEXP',
				'column' => 'news_type',
			),
		);
		
		// DECOMAIL��\��
		$this->af->set('news_type', NEWS_TYPE_DECOMAIL);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �j���[�X�ꗗ�̎擾
		// �X�e�[�^�X���L���ȑ����̂ݕ\������
		$sqlWhere .= ' AND news_status = 1';
		// �z�M�J�n�������L���Ȃ��̂̂ݕ\������
		$sqlWhere .= ' AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ';
		// �z�M�I���������L���Ȃ��̂̂ݕ\������
		$sqlWhere .= ' AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ';
		// ���X�g�r���[
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