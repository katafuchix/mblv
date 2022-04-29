<?php
/**
 * Confirm.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ���Ͽ��ǧ���������ե�����
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityAddConfirm extends Tv_Form_UserCommunityAddDo
{
}

/**
 * �桼�����ߥ�˥ƥ���Ͽ��ǧ���������
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunityAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) {
			return 'user_community_add';
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
		// HIDDEN�ե���������
		$hidden_vars = $this->af->getHiddenVars(NULL, array('confirm', 'add', 'back'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// ���ߥ�˥ƥ����ƥ������
		$cc = new Tv_CommunityCategory(
			$this->backend,
			'community_category_id',
			$this->af->get('community_category_id')
		);
		$cc->exportform();
		
		return 'user_community_add_confirm';
	}
}
?>