<?php
/**
 * Avatar.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * アバターポータル画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatar extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
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
		// 一般ユーザの場合は優先「1」まで表示させる
		$priority = 1;
		// ゲストユーザの場合は優先「-1」まで表示させる
		if($u->get('user_guest_status') == 1) $priority = -1;
		// スタッフユーザの場合は優先「-2」まで表示させる
		if($u->get('user_guest_status') == 2) $priority = -2;
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar_category',
			'sql_where'		=> 'avatar_category_status = 1 AND avatar_category_priority_id >= ? AND avatar_category_priority_id <> 0',
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
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// CMS
		$o = &new Tv_Cms($this->backend, 'cms_type', 2);
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('cms_html3')));
		
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_AVATAR);
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}

?>
