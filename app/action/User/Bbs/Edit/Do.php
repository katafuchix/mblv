<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBbsEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_id' => array(
			'required'	=> true,
		),
		'bbs_body' => array(
			'required'		=> true,
		),
		'bbs_hash' => array(
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
	);
}

/**
 * �桼�������Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsEditDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ��������
		if($this->af->get('delete_image')){
			$o =& new Tv_Bbs($this->backend, 'blog_article_id', $this->af->get('blog_article_id'));
			if($o->isValid()) $o->deleteImage();
			
			// �Խ����̤����
			return 'user_bbs_edit';
		}
		
		// ���ܥ���
		if($this->af->get('back')) return 'user_bbs_edit';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_bbs_edit';
		
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
		$o =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$o->update();
		
		return 'user_bbs_edit_done';
	}
}
?>