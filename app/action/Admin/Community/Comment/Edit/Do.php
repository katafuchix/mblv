<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ߥ�˥ƥ��������Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminCommunityCommentEditDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'community_comment_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_comment_body' => array(
		),
		'delete_image' => array(
		),
	);
}

/**
 * �������ߥ�˥ƥ��������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminCommunityCommentEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'admin_community_comment_edit';
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
		// ���֥������Ȥ����
		$o =& new Tv_CommunityComment($this->backend,'community_comment_id',$this->af->get('community_comment_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// �����С��饤��
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_community_comment_edit';
		
		// �ե������ͤ򥯥ꥢ����
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_COMMENT_EDIT_DONE);
		return 'admin_community_comment_list';
		
	}
}
?>