<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ����������ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ��������֥������Ȥ����
		$o = new Tv_CommunityArticle($this->backend, 'community_article_id', $this->af->get('community_article_id'));
		$o->exportform();
	}
}
?>
