<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理メッセージ一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminUserFriendIntroductionList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// 送信ユーザID検索
			'from_user_id' => array(
				'column' => 'f.from_user_id',
			),
			// 受信ユーザID検索
			'to_user_id' => array(
				'column' => 'f.to_user_id',
			),
			// 送信ユーザニックネーム検索
			'from_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// 受信ユーザニックネーム検索
			'to_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// 紹介文検索
			'friend_introduction' => array(
				'type' => 'LIKE',
				'column' => 'f.friend_introduction',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  'fu.user_id = f.from_user_id AND tu.user_id = f.to_user_id AND ' .
			"f.friend_introduction <> ''";
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'f.from_user_id, fu.user_nickname as from_user_nickname,
				f.to_user_id, tu.user_nickname as to_user_nickname,
				f.friend_id, f.friend_introduction',
			'sql_from'	=> 'user as fu, user as tu, friend as f',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'f.friend_id DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>