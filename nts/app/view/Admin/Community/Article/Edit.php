<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ������Խ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityArticleEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{	//��������μ���
		$articleObject =& new Tv_CommunityArticle($this->backend,'community_article_id',$this->af->get('community_article_id'));
		$articleObject->exportForm();
	}
}
?>
