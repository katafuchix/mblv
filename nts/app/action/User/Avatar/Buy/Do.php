<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター購入実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
//		'avatar_id' => array(
//			'type'			=> VAR_TYPE_INT,
//			'form_type' 	=> FORM_TYPE_HIDDEN,
//		),
		'avatar_id_list' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_CHECKBOX,
		),
//		'buy' => array(
//			'name'		=> '購入する',
//			'form_type' 	=> FORM_TYPE_SUBMIT,
//			'required'	=> true,
//		),
		'unset' => array(
			'form_type' 	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ユーザアバター購入実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarBuyDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'user_avatar_preview';
		
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// タイムスタンプ生成
		$timestamp = date('Y-m-d H:i:s');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// アバターIDを取得する
		$avatar_id_list = $this->af->get('avatar_id_list');
		
		// アバターIDが選択されていない場合
		if(!is_array($avatar_id_list)){
			$this->ae->add('errors', "ｱﾊﾞﾀｰを選択してください。");
			return 'user_avatar_preview';
		}
		
		// 買い物かごにあるアバター情報を取得する
		$total_point = 0;
		$avatar_point_list = array();
		foreach($avatar_id_list as $k => $v){
			// アバター情報を取得
			$a = new Tv_Avatar($this->backend, 'avatar_id', $v);
			// ポイントを計算する
			$total_point += $a->get('avatar_point');
			// アバターポイント配列を作成
			$avatar_point_list[$k] = $a->get('avatar_point');
		}
		
		/* =============================================
		// ポイントチェック
		 ============================================= */
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		if($u->get('user_point') < $total_point){
			$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
			return 'user_avatar_preview';
		}
		
		/* =============================================
		// アバター購入回りの処理
		 ============================================= */
		$pm = $this->backend->getManager('Point');
		foreach($avatar_id_list as $k => $v){
			$avatar_id = $v;
			/* =============================================
			// アバター購入
			 ============================================= */
			$ua = new Tv_UserAvatar($this->backend);
			$ua->set('user_id', $user['user_id']);
			$ua->set('avatar_id', $avatar_id);
			$ua->set('user_avatar_status', 1);
			$ua->set('user_avatar_created_time', $timestamp);
			$ua->set('user_avatar_updated_time', $timestamp);
			$r = $ua->add();
			if(Ethna::isError($r)) return 'user_avatar_preview';
			// ユーザアバターID
			$uaid = $ua->getId();
			
			/* =============================================
			// アバター配信終了数設定がされていれば、-1
			 ============================================= */
			$a = new Tv_Avatar($this->backend, 'avatar_id', $avatar_id);
			$avatar_category_id = $a->get('avatar_category_id');
			if($a->get('avatar_stock_status')){
				$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
				$r = $a->update();
				if(Ethna::isError($r)) return 'user_avatar_preview';
			}
			
			/* =============================================
			// ポイント追加系処理
			 ============================================= */
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $user['user_id'],
				'point'			=> 0 - $avatar_point_list[$k],
				'point_type'	=> $point_type_search['avatar'],
				'point_status'	=> 2,// 承認済み
				'user_sub_id'	=> $uaid,
				'point_sub_id'	=> $avatar_id,
				'point_memo'	=> $a->get('avatar_name'),
			);
			$pm->addPoint($param);
			
			
			/* =============================================
			// ログ追加処理
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('avatar',$avatar_id, $avatar_category_id);
			
		}
		
		// 無事終了すればセッションをクリアする
		$this->session->set('cart_avatar', '');
		
//		$this->ae->add(null, '', I_USER_AVATAR_BUY_DONE);
		return 'user_avatar_buy_done';
	}
}

?>
