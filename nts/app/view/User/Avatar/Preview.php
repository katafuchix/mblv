<?php
/**
 * Preview.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバタープレビュー画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarPreview extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// セッションからアバター情報を取得する
		$cart_avatar = $this->session->get('cart_avatar');
		
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
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		// 検索条件
		$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
		$sqlValues = array($user['user_id']);
		
		// 試着中アバター取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere . ' AND ua.user_avatar_wear = 1',
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
		);
		$r = $um->dataQuery($param);
		$user_avatar_wear_list = $r;
		
		// 買い物かごにあるアバター情報を取得する
		$avatar_list = array();
		$total_point = 0;
		if(is_array($cart_avatar)){
			foreach($cart_avatar as $k => $v){
				// アバター情報を取得
				$a = new Tv_Avatar($this->backend, 'avatar_id', $v['avatar_id']);
				$avatar_list[$k] = $a->getNameObject();
				$avatar_list[$k]['avatar_wear'] = $v['avatar_wear'];
				// 着衣しているものの場合
				if($v['avatar_wear']){
					// ポイントを計算する
					$total_point += $a->get('avatar_point');
					// 着用中リストに追加
					$l = $a->getNameObject();
					$user_avatar_wear_list[] = $l;
				}
			}
		}
		$this->af->setApp('data_list', $avatar_list);
		$this->af->setApp('total_point', $total_point);
		
		$this->af->setApp('user_avatar_wear_list', $user_avatar_wear_list); 
		
		// カテゴリ情報の取得
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>
