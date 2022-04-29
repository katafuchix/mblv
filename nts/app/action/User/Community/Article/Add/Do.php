<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ��ȥԥå���Ͽ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityArticleAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
		),
		'community_article_title' => array(
			'required'  => true,
		),
		'community_article_body' => array(
			'required'  => true,
		),
		'add' => array(
		),
		'back' => array(
		),
		'confirm' => array(
		),
	);
}
/**
 * �桼�����ߥ�˥ƥ��ȥԥå���Ͽ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleAddDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_community_article_add';
		
		// ���¥����å�
		$user = $this->session->get('user');
		$communityMemberManager =& $this->backend->getManager('CommunityMember');
		$userStatus = $communityMemberManager->getUserStatus(
			$this->af->get('community_id'),
			$user['user_id']
		);
		if( !$userStatus['can_add_topic'] ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ADD_DENIED);
			return 'user_community_view';
		}
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_community_article_add';
		
		// �����ƥ��顼
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_community_article_add';
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
		// ���ߥ�˥ƥ������ɲ�
		$article =& new Tv_CommunityArticle($this->backend);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$article->add();
		
		// ���ߥ�˥ƥ�����ID�򥻥å�
		$this->af->set('community_article_id', $article->getId());
		
		// ���ߥ�˥ƥ��������̻Ҥ򥻥å�
		$this->af->setApp('community_article_hash', $article->get('community_article_hash'));
		
		return 'user_community_article_add_done';
	}
}

?>
