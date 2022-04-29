<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��ȥԥå��Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityArticleEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'community_article_title' => array(
			'required'  => true,
		),
		'community_article_body' => array(
			'required'  => true,
		),
		'community_article_hash' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'edit_confirm' => array(
		),
		'update' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��ȥԥå��Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityArticleEditDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')){
			return 'user_community_article_edit';
		}
		
		// ���ڥ��顼
		if($this->af->validate() > 0){
			return 'user_community_article_edit';
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
		// ���ߥ�˥ƥ��ȥԥå����֥������Ȥ����
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��������
		if($this->af->get('delete_image')){
			$article->deleteImage();
		}
		// �����С��饤��
		$article->update();
		
		// ���ߥ�˥ƥ�ID�򥻥å�
		$this->af->set('community_id', $article->get('community_id'));
		
		return 'user_community_article_edit_done';
	}
}
?>