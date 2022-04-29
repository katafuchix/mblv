<?php
/**
 * Preview.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバタープレビュー画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarPreview extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
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
				}
			}
		}
		$this->af->setApp('data_list', $avatar_list);
		$this->af->setApp('total_point', $total_point);
		
		// カテゴリ情報の取得
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>