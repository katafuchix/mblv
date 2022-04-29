<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcUserorderList extends Tv_ListViewClass
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
			// user_order ID����
			'user_order_id' => array(
				'column' => 'user_order_id',
			),
			// ��ʸ�ֹ渡��
			'user_order_no' => array(
				'column' => 'user_order_no',
			),
			// user_name����
			'user_name' => array(
				'type'	=> 'LIKE',
				'column' => 'u.user_name',
			),
			// ����̾
			'item_name' => array(
				'type'	=> 'LIKE',
				'column'		=> 'i.item_name',
			),
			// ���ơ���������
			'user_order_status' => array(
				'column' => 'user_order_status',
			),
			// ������ID����
			'cart_id' => array(
				'column' => 'c.cart_id',
			),
			// �����ȥ��ơ���������
			'cart_status' => array(
				'column' => 'c.cart_status',
			),
			// ��ʧ��ˡ
			'user_order_type' => array(
				'column' => 'o.user_order_type',
			),
			// ������������
			'user_order_created' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_created_time',
			),
			// ������������
			'user_order_updated' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_updated_time',
			),
			// �����������
			'user_order_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'user_order_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �������
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= "o.cart_hash = c.cart_hash AND o.user_id = u.user_id AND c.item_id = i.item_id AND c.stock_id = s.stock_id ";
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'		=> ' user_order as o, cart as c, user as u, item as i, stock as s ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'user_order_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
	
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  @access public
	 */
	function forward()
	{
		// ��������ɤξ��
		if($this->af->get('download')){
			// �������
			$this->listview['data_only'] = true;
			// listview�¹�
			$this->build();
			// �ե�����̾�η���
			$file_name = date('Ymd_His') . ".csv";
			// �ե�����̾�إå�����
			header("Content-Disposition: inline ; filename={$file_name}" );
			// MIME�����ץإå�����
			header("Content-type: text/octet-stream");
			// �����饪�֥������Ȥ����
			$renderer =& $this->_getRenderer();
			// �ǥե���ȥޥ����¹�
			$this->_setDefault($renderer);
			// HTML�����
			$html = $renderer->engine->fetch('admin/csv/order.tpl');
			// �������إå�����
			header("Content-Length: ". strlen($html));
			// ʸ�������ɤ��Ѵ����ƽ���
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
			// ��λ
			exit;
		}
		// ����¾�ξ��
		else{
			parent::forward();
		}
	}
}
?>