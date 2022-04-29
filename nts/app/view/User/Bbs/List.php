<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 伝言一覧画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
//class Tv_View_UserBbsList extends Tv_ListViewClass
class Tv_View_UserBbsList extends Tv_ListViewClass_Bbs
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ユーザ情報取得
		$userId = $this->af->get('user_id');
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return;
		$this->af->setApp('user', $user->getNameObject());
		
		// user session
		$user = $this->session->get('user'); 
		
		// リストビュー
		$sqlWhere = 'b.bbs_status = 1 AND b.to_user_id = ? AND b.from_user_id = fu.user_id AND fu.user_status = 2';
		$sqlValues = array($this->af->get('user_id'));
		
		$this->listview = array(
			'action_name'		=> 'user_bbs_list',
			'sql_select' => 
				'fu.user_id as from_user_id,fu.user_nickname as from_user_nickname,fu.image_id as user_image_id,
				b.bbs_id,b.bbs_body,b.bbs_created_time, b.image_id,b.bbs_notice,b.to_user_id',
			'sql_from'		=> 'bbs as b, user as fu',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'b.bbs_created_time DESC',
			'sql_values'		=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>