<?php
/**
 * Order.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʧ����ˡ����ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemOrder extends Tv_ActionForm
{
	var $form = array(
		'item_id' => array(
			'required'		=> true,
			'type'		=> VAR_TYPE_INT,
			'min'		=> 1,
		),
	);
}
/**
 * ��ʧ����ˡ����ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemOrder extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		//���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'user_ec_item';
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
		return 'user_ec_item_order';
	}
}
?>