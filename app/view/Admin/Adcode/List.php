<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������𥳡��ɥݡ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAdcodeList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_adcode_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'ad_code',
			'sql_where'	=> 'ad_code_status > 0',
			'sql_order'	=> 'ad_code_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>