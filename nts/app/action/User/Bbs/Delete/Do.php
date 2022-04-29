<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼����������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBbsDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼����������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ��󡢸��ڥ��顼
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			return 'user_profile_view';
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
		// �������֥������Ȥ����
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		// �����С��饤��
		$message->delete();
		
		return 'user_bbs_delete_done';
	}
}
?>