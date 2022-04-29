<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������Ͽ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogArticleAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_title' => array(
			'required'		=> true,
		),
		'blog_article_body' => array(
			'required'		=> true,
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'submit' => array(
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'twitter_status' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �桼��������Ͽ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �ʥѥܡ��ɤξ��ϥ����ȥ��ɬ�ܤȤ��ʤ�
		if($this->af->get('twitter_status')){
			$this->af->form['blog_article_body']['required'] = false;
			$this->af->set('blog_article_public',1);
			// ��ʸ�����θ����
			$max_len = 140;
			if(preg_match_all( '/\[x:(\d{4})\]/', $this->af->get('blog_article_title'), $match )){
				// ��ʸ��������Ǽ�Ѥ��������������
				$match = array();
				// ��ʸ�������ִ�����ʸ����
				$_tmp = '��';
				// ��ʸ��������ɽ���ǰ��ʸ������ִ�����
				$_replace_str =  preg_replace( '/\[x:(\d{4})\]/', $_tmp, $this->af->get('blog_article_title') );
				// ��ʸ������������ѣ���ʸ���ʾ�ϥ��顼�Ȥ���
				if(strlen($_replace_str) > $max_len){
					$this->ae->add('errors', '���ѣ���ʸ������Ǥ����Ϥ�������');
					return 'user_twitter';
				}
			}else{
				$this->af->form['blog_article_title']['max'] = $max_len;		// ����140
			}
			$this->af->form['blog_article_title']['name'] = '���';
		}
		
		// ���ܥ���
		if($this->af->get('back')) return 'user_blog_article_add';
		
		// ���ڥ��顼
		if($this->af->validate() > 0){
			if($this->af->get('twitter_status')){
				return 'user_twitter';
			}
			return 'user_blog_article_add';
		}
		
		// �����ƥ��顼
		if (Ethna_Util::isDuplicatePost()) {
			if($this->af->get('twitter_status')){
				//$this->ae->add(null, '', E_USER_DUPLICATE_POST);
				$this->af->set('blog_article_title','');
				return 'user_twitter';
			}
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_blog_article_add';
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
		// �����������֥��������ɲ�
		$article =& new Tv_BlogArticle($this->backend);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$r = $article->add();
		if(Ethna::isError($r)) return 'user_blog_article_add';
		
		// ��������ID�򥻥å�
		$this->af->setApp('blog_article_id', $article->getId());
		// ���������ϥå���򥻥å�
		$this->af->setApp('blog_article_hash', $article->get('blog_article_hash'));
		
		// �ʥѥܡ��ɤν񤭹���
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_add_done';
	}
}
?>
