<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ѥ�����ѹ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigPassEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * �桼���ѥ�����ѹ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigPassEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		return 'user_config_pass_edit';
	}
}

?>
