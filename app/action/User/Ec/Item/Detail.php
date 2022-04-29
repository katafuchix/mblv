<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʾܺ٥ڡ���ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemDetail extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'shop_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'category_id' => array(
			'type'			=> VAR_TYPE_INT,
		),
		'item_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'type' => array(
			'type'			=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ���ʾܺ٥ڡ���ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemDetail extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$um = $this->backend->getManager('Util');
		
		// ͭ���ʥ��ơ������ξ��ʤΤ߼�������
		$sqlWhere .= 'item_id = ? AND item_status = 1';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
		$sqlValues[] = $this->af->get('item_id');
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'item',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		
		$r = $um->dataQuery($param);
		if(count($r) == 0){
			$this->ae->add(null, '', E_USER_ITEM_NOT_FOUND);
			return 'user_error';
		}
		
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_ec_item_detail';
	}
}
?>