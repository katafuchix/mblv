<?php
/**
 * Buy.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarBuy extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * �桼�����Х���������������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarBuy extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar';
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
		return 'user_avatar_buy';
	}
}
?>