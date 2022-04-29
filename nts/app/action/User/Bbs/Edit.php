<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�������Խ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBbsEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'bbs_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * �桼�������Խ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsEdit extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_bbs_list';
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
		$comment =& new Tv_Bbs(
			$this->backend,
			'bbs_id',
			$this->af->get('bbs_id')
		);
		$comment->exportForm();
		
		return 'user_bbs_edit';
	}
}
?>