<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʧ��ˡ�������ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderTypeIndex extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'user_order_type' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_order_type',
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_order_use_point' => array(
		),
		'mode' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * ��ʧ��ˡ�������ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderTypeIndex extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ec_order_type';
		
		// �����ȥϥå���򸵤��㤤ʪ����������ʤκ߸ˤ��ǧ����
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�)
		// �߸˥ơ��֥�Ϸ�礷�ʤ�
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// �㤤ʪ��������˾��ʤ��ʤ����
		if(count($r) == 0){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		//�ݥ���Ȥˡ�000010�פʤɡ����Ϥ��줿�����θ����intval����
		if($this->af->get('user_order_use_point_status') == 1){
			$this->af->set('user_order_use_point', intval($this->af->get('user_order_use_point')));
		}
		//�ݥ���Ȥ�Ȥ�ʤ��ʤ�0�ˤ��Ƥ���
		else{
			$this->af->set('user_order_use_point', 0);
		}
		
		// ���Ϥ��줿�ݥ���Ȥϥ桼����ͭ��ͭ�����ϰϤ�Ƚ�Ǥ���
		$usersess = $this->session->get('user');
		$userObject =& new Tv_User($this->backend, 'user_id', $usersess['user_id']);
		if($this->af->get('user_order_use_point_status') && $userObject->get('user_point') < $this->af->get('user_order_use_point')){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_OVER);
			return 'user_ec_order_type';
		}
/*
		// �ڸ�Ƥ�ۥݥ���Ȥ����Ѳ������¤�̵�����ɤ��ΤǤϤʤ�����
		// �ݥ�������Ѥ�100�ʾ夫���99�Ϥ����
		if($this->af->get('user_order_use_point_status') && $this->af->get('user_order_use_point') < 100){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_MIN);
			return 'user_ec_order_type';
		}
*/
		// �㤤ʪ��������Ⱦ��ʹ�׶����ȴ�μ���
		$cart = $this->backend->getManager('Cart');
		$total_price = $cart->getTotalPriceTaxout($this->session->get('cart_hash'));
		// ���Ϥ��줿�ݥ���ȤϾ��ʹ�פ��ϰϤ�Ƚ�Ǥ���
		if($this->af->get('user_order_use_point_status') && $total_price < $this->af->get('user_order_use_point')){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_MAX);
			return 'user_ec_order_type';
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
		$this->af->set('mode','type');
		return 'user_ec_order_type_' . $this->af->get('user_order_type');
	}
}
?>