<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������ȼ¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserLogoutDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
	);
}
/**
 * �桼���������ȼ¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserLogoutDo extends Tv_ActionUserOnly
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
		// �������ȥե饰��Ω�Ƥ�
		$this->af->setApp('logout', true);
		// ���å������˴�
		$this->session->destroy();
		
		$this->ae->add(null, '', I_USER_LOGOUT_DONE);
		return 'user_index';
	}
}
?>