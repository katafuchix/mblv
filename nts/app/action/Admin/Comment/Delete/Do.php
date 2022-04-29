<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������Ⱥ���¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCommentDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'comment_id' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �������������Ⱥ���¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCommentDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_comment_search';
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
		/* �����Ⱥ���ʢ�ʪ��������� */
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		$comment->delete();
		return 'admin_comment_delete_done';
	}
}
?>