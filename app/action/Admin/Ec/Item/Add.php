<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemAdd extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'item_category_id' => array(
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> 'Util, item_category',
		),
	);
}

/**
 * ����������Ͽ���������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemAdd extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ޤ����ƥ��꤬�ʤ����Ͼ��ʤ���ʤ�
		$db = $this->backend->getDB();
		$sql = "SELECT count(item_category_id)as cnt FROM item_category where item_category_status = 1 ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if( $rows[0]['cnt'] == 0 ){
			$this->ae->add(null, '', E_ADMIN_ITEM_ITEM_CATEGORY_NOT_FOUND);
			return 'admin_ec_itemcategory_list';
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
		// ʣ�����ƥ�������Τ��᥻�쥯�ȥܥå����Υǥե�����ͤ����ꤷ�ޤ�
		$category_id = $this->af->get('item_category_id');
		for($i=1;$i<=5;$i++){
			$this->af->set('item_category_id' . $i, $category_id);
		}
		
		$um = $this->backend->getManager('Util');
		
		// ����å�̾�����
		$ifnull_shop_id = $this->af->get('shop_id');
		// shop_id���ʤ���硡category_id����shop_id��������롣category_id��ʤ���н�λ
		if(!$this->af->get('shop_id')){
			if(!$this->af->get('item_category_id')){
				return;
			}else{
				$o =& new Tv_ItemCategory($this->backend, 'item_category_id', $this->af->get('item_category_id'));
				$ifnull_shop_id = $o->get('shop_id');
			}
		}
		// ����å׾���μ���
		$s =& new Tv_Shop($this->backend, 'shop_id', $ifnull_shop_id);
		// ����å�̾�ȥ���å�id��form����Ϥ�
		$s->exportForm();
		
		return 'admin_ec_item_add';
	}
}
?>