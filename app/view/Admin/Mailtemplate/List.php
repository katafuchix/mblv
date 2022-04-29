<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����᡼��ƥ�ץ졼�Ȱ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMailtemplateList extends Tv_ListViewClass
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
			'action_name'	=> 'admin_mailtemplate_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'mail_template',
			'sql_where'	=> 'mail_template_status > 0',
			'sql_order'	=> 'mail_template_id ASC',
			'sql_values'	=> array(),
		);
	}
}
?>