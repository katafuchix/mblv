<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ߥ�˥ƥ����Խ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ�����
		$community = &new Tv_Community($this->backend,
			'community_id',
			$this->af->get('community_id')
			);
		$this->af->setApp('community', $community->getNameObject());
	}
}

?>