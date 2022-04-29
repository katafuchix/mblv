<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ӥ塼��Ͽ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;	
	
	var $form = array(
		'review_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'review_hash' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
		
}

/**
 * ��ӥ塼��Ͽ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAdd extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function authenticate()
	{
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function prepare()
	{
		if( $this->af->validate() > 0 ) return 'user_index';
		
		//���������ѥ�᡼����DB�˥ǡ������ʤ����
		$r =& new Tv_Review($this->backend, array('review_id', 'review_hash',), array($this->af->get('review_id'), $this->af->get('review_hash'),));
		if(!$r->isValid()){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
		}
		
		//�����Ͽ��Υ桼����Ƚ��
		$u =& new Tv_User($this->backend, 'user_id', $r->get('user_id'));
		if($u->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
		}
		
		return null;
	}
	function perform()
	{
		$r =& new Tv_Review($this->backend, array('review_id', 'review_hash', 'review_status'), array($this->af->get('review_id'), $this->af->get('review_hash'), 2));
		$r->exportForm();
		
		$i =& new Tv_Item($this->backend, 'item_id', $r->get('item_id'));
		
		// ��ӥ塼��������
		$this->af->setApp('item_name', $i->get('item_name'));
		
		return 'user_ec_review_add';
	}
}
?>