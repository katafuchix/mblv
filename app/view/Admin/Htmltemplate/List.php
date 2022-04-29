<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����HTML�ƥ�ץ졼�Ȱ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminHtmltemplateList extends Tv_ListViewClass
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
			// html_template_code ����
			'html_template_code' => array(
				'type' => 'LIKE',
				'column' => 'html_template_code',
			),
			// �Խ����ơ���������
			'html_template_edit' => array(
				'column' => 'html_template_edit',
			),
			// �ǽ�����������������
			'html_template_edit_start' => array(
				'type' => 'PERIOD',
				'column' => 'html_template_edit_start_time',
			),
			// �ǽ�������λ��������
			'html_template_edit_end' => array(
				'type' => 'PERIOD',
				'column' => 'html_template_edit_end_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere){
			$sqlWhere .= ' AND ';
		}
		$sqlWhere .= 'html_template_status > 0';
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_htmltemplate_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'html_template',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'html_template_edit_end_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>