<?php
/**
 * Delete.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ӥ塼������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewDelete extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_id' => array(
			'type'			=> VAR_TYPE_INT,
			'name'			=> '�����ƥ�ID',
			'required'		=> true,
		),
		'review_id' => array(
			'type'			=> VAR_TYPE_INT,
			'name'			=> '��ӥ塼ID',
			'required'		=> true,
		),
	);
}

/**
 * ��ӥ塼������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewDelete extends Tv_ActionUserOnly
{
	function prepare()
	{
		if ($this->af->validate() > 0) return 'user_login';
		return null;
	}
	function perform()
	{
		// ͭ���ͥ��ơ������ξ���
		$i =& new Tv_Item($this->backend, array('item_id', 'item_status',), array($this->af->get('item_id'), 1,));
		if(!$i->isValid()){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
		}
		$this->af->setApp('item_name', $i->get('item_name'));
		
		// ��ӥ塼�򸡺�
		$r =& new Tv_Review($this->backend, array('review_id', 'item_id',), array($this->af->get('review_id'), $this->af->get('item_id'),));
		if(!$r->isValid()){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
		}
		$r->exportForm();
		return 'user_ec_review_delete';
	}
}
?>