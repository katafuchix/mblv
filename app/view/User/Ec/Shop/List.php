<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����åװ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcShopList extends  Tv_ListViewClass
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
			// shop_name
			'shop_name' => array(
				'type'		=> 'LIKE',
				'column'	=> 'shop_name',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// ���ơ�������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND shop_status = 1 ';
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_ec_shop_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'shop',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'shop_id DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}?>