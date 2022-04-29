<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
require_once('Do.php');
/**
 * ��ӥ塼�Խ���ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewEditConfirm extends Tv_Form_UserEcReviewEditDo
{
}

/**
 * ��ӥ塼�Խ���ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewEditConfirm extends Tv_ActionUserOnly
{
	function prepare()
	{
		if ($this->af->validate() > 0){
			return 'user_ec_review_edit';
		}
		return null;
	}
	function perform()
	{
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'user_ec_review_edit_confirm';
	}
}
?>