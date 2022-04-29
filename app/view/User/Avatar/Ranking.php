<?php
/**
 * Avatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * アバターポータル画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarRanking extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// セッション情報を取得する（管理画面からユーザをゲスト化すると次回ログインから有効となります）
		$user = $this->session->get('user');
		
		// ユーザ情報を取得する
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// アバターカテゴリ一覧を取得
		// ゲストユーザの場合は優先「-1」まで表示させる
		$priority = 1;
		if($u->get('user_guest_status') == 1) $priority = -1;
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar_category',
			'sql_where'		=> 'avatar_category_status = 1 AND avatar_category_priority_id >= ?',
			'sql_values'	=> array($priority),
			'sql_order'		=> 'avatar_category_priority_id DESC'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		
		// アバターランキング
		$sqlWhere = 'r.type = ? AND a.avatar_id = r.id AND a.avatar_status = 1';
		$sqlValues = array('avatar');
		
		// 性別情報を追加する
		// 「男性」ならば「女性用」以外を表示
		if($u->get('user_sex')==1){
			$exclude_sex = 2;
		}
		// 「女性」ならば「男性用」以外を表示
		elseif($u->get('user_sex')==2){
			$exclude_sex = 1;
		}
		$sqlWhere .= " AND a.avatar_sex_type <> ?";
		$sqlValues[] = $exclude_sex;
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar a, ranking r',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3,7'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r);
	}
}
?>