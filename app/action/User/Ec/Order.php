<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʸ�������ϲ��̿���ʬ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrder extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'total_price' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'order' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ��ʸ�������ϲ��̿���ʬ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrder extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		$um = $this->backend->getManager('Util');
		
		// ����
		$cart_hash = $this->session->get('cart_hash');
		
		// �㤤ʪ�����˾��ʤ����뤫�ɤ�����ǧ����
		$cart = $this->backend->getManager('Cart');
		// �оݤ�̤���ʬ�Τ�ΤΤ�
		$cart_list = $cart->getCartList($cart_hash, 0, false);
		// �㤤ʪ��������Ȥ��ʤ����
		if(count($cart_list) == 0){
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// �桼�����󤬤���Х������������פ�������̤�
		$userSess = $this->session->get('user');
		if($userSess['user_id']){
			// ��ʧ����ǽ����ʸ��ˡ���������
			$order_type_list = $cart->getOrderTypeList($cart_list);
			// ���Ѳ�ǽ�ʻ�ʧ��ˡ���ʤ��ʤä����ϥ��顼
			if(count($order_type_list) == 0){
				// �㤤ʪ�������̤�����
				$this->ae->add(null, '', E_USER_ORDER_TYPE_EMPTY);
				return 'user_ec_cart';
			}
			// ���Ѳ�ǽ�ʻ�ʧ����ˡ��¸�ߤ�����
			else{
				// ��ʧ����ˡ�򥻥å�
				$this->af->setApp('order_type_list',$order_type_list);
				// ��ʧ����ˡ������̤�����
				return 'user_ec_order_type';
			}
		}else{
			// �㤤ʪ�����ơ��֥��XUID���Ǽ����
			// ʣ���Ԥ򹹿�����Τǡ��Ϥ�������autoExecute����Ѥ���
			$db = $this->backend->getDB();
			$updateValues = array(
				'user_uid' => $um->getXuid(),
			);
			$res = $db->db->autoExecute('cart', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$cart_hash'");
			if(Ethna::isError($res)) return 'user_error';
			
			// ������ڡ���������
			$this->ae->add(null,'',E_USER_ORDER_LOGIN);
			return 'user_login';
		}
	}
}
?>