<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageEdit extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_id' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'postage_name' => array(
			'required'  => true,
			'type'      => VAR_TYPE_STRING,
		),
	);
}
/**
 * ���������Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageEdit extends Tv_ActionAdminOnly
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
		// ����μ���
		$o =& new Tv_Postage($this->backend,'postage_id',$this->af->get('postage_id'));
		$o->exportform();
		return 'admin_ec_postage_edit';
	}
}
?>