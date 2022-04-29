<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��ȥԥå�����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityArticleDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��ȥԥå�����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityArticleDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'user_community_article_view';
		
		// ���ڥ��顼
		if($this->af->validate() > 0)return 'user_community_article_delete_confirm';
		
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
		// ���ߥ�˥ƥ��������֥������Ȥ����
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		// �������
		$article->delete();
		
		// ���ߥ�˥ƥ�ID�򥻥å�
		$this->af->set('community_id', $article->get('community_id'));
		
		return 'user_community_article_delete_done';
	}
}
?>