<?php
/**
 * Finish.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * �����ཪλ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserGameFinish extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������������
		$a =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$a->exportForm();
		
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'c.comment_type=2 AND c.comment_subid=? AND c.comment_status=1' .
			' AND u.user_id=c.user_id';
		$sqlValues = array($this->af->get('game_id'));
		$this->listview = array(
			'action_name'	=> 'user_game_finish',
			'sql_select'
				=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,' .
				'c.comment_id,c.comment_created_time,c.comment_body',
			'sql_from'		=> 'user as u, comment as c',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 10,
		);

/*
		// �����Ȥ����
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'comment.comment_type = 2 ' .
			'AND comment.comment_subid = ? ' .
			'AND comment.comment_status = 1';
		$game = $this->af->getApp('game');
		$sqlValues = array($game['game_id']);
		
		$this->listview = array(
			'action_name'	=> 'user_game_finish',
			'sql_select'	=>
				'comment.comment_id,comment.comment_body,
					comment.comment_created_time,user.user_nickname,user.user_id',
			'sql_from'		=> 'comment left join user on comment.user_id = user.user_id',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'comment.comment_id DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
*/
	}
}

?>
