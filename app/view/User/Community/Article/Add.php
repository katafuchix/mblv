<?php
/**
 * Add.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������ɲò��̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleAdd extends Tv_ViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ������
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
	}
}
?>