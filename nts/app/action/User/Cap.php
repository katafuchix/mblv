<?php
/**
 * Cap.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������ǧ�ڥ��������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCap extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
	);
}

/**
 * �桼��������ǧ�ڥ������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCap extends Tv_ActionUser
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
		//captcha
		$captcha = new KCAPTCHA();
		
		//���å����˳�Ǽ
		$this->session->set('captcha_keystring', $captcha->getKeyString());
		
		return 'user_cap';
	}
}

?>
