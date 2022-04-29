<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������Ͽ��ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'action/User/Bbs/Add/Do.php';
class Tv_Form_UserBbsAddConfirm extends Tv_Form_UserbbsAddDo
{
}

/**
 * �桼��������Ͽ��ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			return 'user_profile_view';
		}
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_bbs_add';
		
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
		return 'user_bbs_add_confirm';
	}
}
?>