<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ��ȥԥå��������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityArticleView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'page'			=>array(
			'type'		=>VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��ȥԥå��������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleView extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// �ȥԥå��礬�ܲ��������ϥ��顼
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		if(!$article->isValid()){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$article->get('user_id')
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		if($user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		
		return 'user_community_article_view';
	}
}

?>
