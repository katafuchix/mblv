<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������ɲó�ǧ���̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleAddConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե����������
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>
