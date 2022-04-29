<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������Խ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogArticleEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_id' => array(
			'required'  => true,
		),
		'blog_article_title' => array(
			'required'		=> true,
		),
		'blog_article_body' => array(
			'required'		=> true,
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'blog_article_hash' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'edit_confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
		'twitter_status' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �桼�������Խ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleEditDo extends Tv_ActionUserOnly
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
			$this->af->form['blog_article_public']['required'] = false;
		}
		
		// ���ܥ���
		if($this->af->get('back')) return 'user_blog_article_edit';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_blog_article_edit';
		
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
		// �������֥������Ȥ򹹿�
		$article =& new Tv_BlogArticle($this->backend, 'blog_article_id', $this->af->get('blog_article_id'));
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��������
		if($this->af->get('delete_image')){
			$article->deleteImage();
		}
		// �����С��饤��
		$article->update();
		
		// �ʥѥܡ��ɤν񤭹���
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_edit_done';
	}
}

?>
