<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã�Ҳ�ʸ�Խ���ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendIntroductionEditConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե����������
		$hidden_vars = $this->af->getHiddenVars(null, array('confirm', 'back', 'edit'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>
