<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����������Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
		'comment_type' => array(
			'required'  => true,
		),
		'comment_subid' => array(
			'required'  => true,
		),
		'comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
			'name' => '����',
		),
		'return' => array(
		),
	);
}

/**
 * �桼����������Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ToDo:������׸�Ƥ
		// ���ܥ��󡢸��ڥ��顼
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			//return 'user_error';
			$this->af->set('game_id',$this->af->get('comment_subid'));
			return 'user_game_buy';
		}
		// �����ƥ��顼
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_error';
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
		// �����ȥ��֥������Ȥ��ɲ�
		$comment =& new Tv_Comment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		if(!$this->af->get('user_id')){
			$user_session = $this->session->get('user');
			$comment->set('user_id', $user_session['user_id']);
		}
		
		$r = $comment->add();
		if(Ethna::isError($r)) return 'user_error';
		
		return 'user_comment_add_done';
	}
}
?>