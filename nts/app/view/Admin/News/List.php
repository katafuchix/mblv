<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����˥塼���������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminNewsList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */

	function preforward()
	{
		// �˥塼�������μ���
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'news',
			'sql_where'	=> '1',
			'sql_order'	=> 'news_id DESC',
			'sql_values' => array(),
		);
	}
}
?>