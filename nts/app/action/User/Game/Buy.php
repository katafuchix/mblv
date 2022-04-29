<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameBuy extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * �桼��������������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameBuy extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_game';
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
		return 'user_game_buy';
	}
}

?>
