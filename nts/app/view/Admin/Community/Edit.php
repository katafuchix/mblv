<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ��Խ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{	//���ߥ�˥ƥ�����μ���
		$communityObject =& new Tv_Community($this->backend,'community_id',$this->af->get('community_id'));
		$communityObject->exportForm();
	}
}
?>