<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'comment_id' => array(
			'required'	=> true,
		),
		'comment_body' => array(
			'required'	=> true,
		),
		'submit' => array(
		),
		'edit_confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
	);
}
/**
 * �桼���������Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentEditDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if( $this->af->validate() > 0 ) {
			return 'user_comment_edit';
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
		// �����ȥ��֥������Ȥμ���
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		
		// ���֥������Ȥ�̵���Ǥ��뤫�����Ȥ��������Ƥ���Ȥ�
		if(!$comment->isValid() || $comment->get('comment_status') != 1){
			$this->ae->add(null, '', E_USER_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// �֤������פ򲡤����ʤ����������
		if( $this->af->get('back') ) {
			// ToDo: ������׸�Ƥ
			if($comment->get('comment_type') == 2){
				$this->af->set('game_id', $comment->get('comment_subid'));
				return 'user_comment_edit';
			}
			return 'user_home';
		}
		
		// ���������Ȥ��Խ�
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$comment->set('comment_updated_time', date('YmdHis'));
		$comment->update();
		if(Ethna::isError($r)) return 'user_error';
		
		$comment->exportForm();
		
		// ToDo:�������׸�Ƥ
		if($comment->get('comment_type') == 2){
			//$this->af->set('game_id', $comment->get('comment_subid'));
			//return 'user_game_buy';
			return 'user_comment_edit_done';
		}
		return 'user_comment_edit_done';
	}
}
?>