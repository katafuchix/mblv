<?php
/**
 * Recommend.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ����åפ������ᥢ�������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcShopRecommend extends Tv_ActionForm
{
	var $form = array(
		'shop_id' => array(
			'type' 		=> VAR_TYPE_INT,
			'required' 	=> true,
		),
	);
}
/**
 * ����åפ������ᥢ�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcShopRecommend extends Tv_ActionUser
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
		return 'user_ec_shop_recommend';
	}
}
?>