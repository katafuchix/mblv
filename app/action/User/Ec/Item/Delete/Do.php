<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʺ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'cart_id' => array(
			'type' 		=> VAR_TYPE_INT,
			'required' 	=> true,
		),
		'stock_id' => array(
			'type'        => VAR_TYPE_INT,
			'required' 	=> true,
		),
	);
}

/**
 * ���ʺ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemDeleteDo extends Tv_ActionUser
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
		// �㤤ʪ������������äƤ���쥳���ɤ��������
		$o = & new Tv_Cart(
			$this->backend,
			array('cart_id','stock_id'),
			array($this->af->get('cart_id'),$this->af->get('stock_id'))
		);
		// ���
		if($o->isValid()){
			$o->remove();
		}
		
		$this->ae->add(null, '', I_USER_CART_DELETE_DONE);
		
		return 'user_ec_cart';
	}
}
?>