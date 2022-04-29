<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����å������������ơ������ѹ����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserConfigReceiveEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * �桼����å������������ơ������ѹ����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfigReceiveEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		// ���å�����������
		$sess = $this->session->get('user');
		// �桼����������
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		if(!$user->isValid()) return 'user_home';
		$user->exportForm();
		
		return 'user_config_receive_edit';
	}
}
?>