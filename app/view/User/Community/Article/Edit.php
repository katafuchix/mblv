<?php
/**
 * Edit.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������Խ����̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleEdit extends Tv_ViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		// �ȥԥå������
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		$this->af->setApp('article', $article->getNameObject());
	}
}
?>