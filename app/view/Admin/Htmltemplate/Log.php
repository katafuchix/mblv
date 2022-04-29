<?php
/**
 * Log.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����HTML�ƥ�ץ졼�ȥ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminHtmltemplateLog extends Tv_ListViewClass
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
			// html_template_id ����
			'html_template_id' => array(
				'column' => 'html_template_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_htmltemplate_log',
			'sql_select'	=> '*',
			'sql_from'		=> 'html_template_log',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'html_template_log_id ASC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>