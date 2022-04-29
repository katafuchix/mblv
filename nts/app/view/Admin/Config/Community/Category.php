<?php
/**
 * Category.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ����ƥ����ѹ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminConfigCommunityCategory extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ����ƥ���ꥹ�Ȥ����
		$cca =& new Tv_CommunityCategory($this->backend);
		$category_list =& $cca->searchProp(
			array('community_category_id', 'community_category_name'),
			array('community_category_status' => 1),
			array('community_category_id' => OBJECT_SORT_ASC)
		);
		$this->af->setApp('category_list', $category_list[1]);
	}
}
?>
