<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ߥ�˥ƥ����Խ���ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityEditConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե���������
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// ���ߥ�˥ƥ����ƥ������
		$cc = new Tv_CommunityCategory($this->backend, 'community_category_id', $this->af->get('community_category_id'));
		$cc->exportform();
	}
}

?>
