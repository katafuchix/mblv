<?php
/**
 * Cofirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������Խ���ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogArticleEditConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե����������
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'back', 'add'));
		
		$this->af->setAppNE('hidden_vars', $hiddenVars);
	}
}
?>
