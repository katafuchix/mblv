<?php
/**
 * Member.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * コミュニティメンバ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommunityMember extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// コミュニティ情報取得
		$c = new Tv_Community($this->backend, 'community_id', $this->af->get('community_id'));
		$this->af->setApp('community', $c->getNameObject());
		
		// リストビュー
		$sqlWhere = 'c.community_id = ? ' .
				'AND c.user_id = u.user_id ' .
				'AND c.community_member_status  <> 0 ' . // community_member_status 0:メンバーから削除, 1:メンバー, 2:管理人, 3:管理人承認待ち,
				'AND c.community_member_status  <> 3 ' .
				'AND u.user_status = 2 ' ;			// user_status ユーザーステータス （1:仮登録, 2:本登録, 3:退会, 4:強制退会）
		$sqlValues = array($this->af->get('community_id'));
		$this->listview = array(
			'action_name'	=> 'user_community_member',
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u, community_member as c ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.community_member_id ASC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>