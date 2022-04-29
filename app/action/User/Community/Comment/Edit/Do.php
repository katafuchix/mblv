<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��������Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_comment_id' => array(
			'required'	=> true,
		),
		'community_comment_body' => array(
			'required'  => true,
		),
		'community_comment_hash' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'update' => array(
		),
		'back' => array(
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��������Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentEditDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'user_community_comment_edit';
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
		// ���ߥ�˥ƥ������ȥ��֥������Ȥ��������
		$comment =& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$this->af->get('community_comment_id')
		);
		
		// ͭ���ʥ��ߥ�˥ƥ������ȤǤʤ����ϥ��顼
		if( !$comment->isValid() || $comment->get('community_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// ���ߥ�˥ƥ��ȥԥå�ID�򥻥å�
		$this->af->set('community_article_id', $comment->get('community_article_id'));
		
		// ���ܥ���
		if( $this->af->get('back') ) {
			return 'user_community_comment_edit';
		}
		
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��������
		if($this->af->get('delete_image')){
			$comment->deleteImage();
		}
		// �����С��饤��
		$comment->update();
		
		return 'user_community_comment_edit_done';
	}
}
?>