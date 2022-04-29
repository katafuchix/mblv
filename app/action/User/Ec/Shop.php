<?php
/**
 * Shop.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����åץȥåץڡ���ɽ�����������ե�����
 * 
 * @author  Technovarth
 * @access  public
 * @package    MBLV
 */
class Tv_Form_UserEcShop extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'required' 	=> true,
			'name' 		=> '�������̎�',
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> 'Util, shop',
		),
	);
}

/**
 * ����åץȥåץڡ���ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcShop extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ec';
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_ec_shop';
	}
}
?>