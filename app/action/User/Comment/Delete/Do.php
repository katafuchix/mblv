<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Ⱥ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'comment_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�������Ⱥ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentDeleteDo extends Tv_ActionUserOnly
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
		if( $this->af->validate() > 0 ) return 'user_home';
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
		
		// �����Ȥ�¸�ߤ��ʤ����ϥ��顼��Ф�
		if(!$comment->isValid() || $comment->get('comment_status') != 1){
			$this->ae->add(null, '', E_USER_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// �֤������פ������줿�ʤ�����
		if( $this->af->get('back') ) {
			// ToDo:������׸�Ƥ
			if($comment->get('comment_type') == 2){
				$this->af->set('game_id', $comment->get('comment_subid'));
				return 'user_comment_edit';
			}
			return 'user_home';
		}
		
		// �����Ȥ��������
		$comment->set('comment_status', 0);
		$comment->set('comment_deleted_time', date('YmdHis'));
		$comment->update();
		
		$comment->exportForm();
		
		if($comment->get('comment_type') == 2){
			//$this->af->set('game_id', $comment->get('comment_subid'));
			//return 'user_game_buy';
			return 'user_comment_delete_done';
		}
		return 'user_comment_delete_done';
	}
}
?>