<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������������¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * ������������¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageDeleteDo extends Tv_ActionAdminOnly
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
		// ���ʾ����������
		$o =& new Tv_Postage($this->backend,'postage_id',$this->af->get('postage_id'));
		$o->set('postage_status',0);
		$o->set('postage_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_postage_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_POSTAGE_DELETE_DONE);
		
		return 'admin_ec_postage_list';
	}
}
?>