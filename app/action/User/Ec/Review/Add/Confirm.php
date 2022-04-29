<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
require_once('Do.php');
/**
 * ��ӥ塼��Ͽ��ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAddConfirm extends Tv_Form_UserEcReviewAddDo
{
}

/**
 * ��ӥ塼��Ͽ��������󥢥������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAddConfirm extends Tv_ActionUserOnly
{
	function authenticate()
	{
		return null;
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0){
			return 'user_ec_review_add';
		}
		
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
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'user_ec_review_add_confirm';
	}
}
?>