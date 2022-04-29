<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ��ȥԥå������ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityArticleDeleteConfirm extends Tv_Form_UserCommunityArticleDeleteDo
{
}

/**
 * �桼�����ߥ�˥ƥ��ȥԥå������ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ߥ�˥ƥ��������֥������Ȥ����
		$article =& new Tv_CommunityArticle( &$this->backend, 'community_article_id', $this->af->get('community_article_id') );
		
		// ͭ��Ƚ�ꥨ�顼
		if( !$article->isValid() || $article->get('community_article_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_community_article_delete_confirm';
	}
}

?>
