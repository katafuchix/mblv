<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogArticleEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{	//��������μ���
		$articleObject =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$articleObject->exportForm();
	}
}
?>