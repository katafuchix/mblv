<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバター設定実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarConfigDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'first_avatar_id' => array(
			'name'		=> '1番目のｱﾊﾞﾀｰID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'second_avatar_id' => array(
			'name'		=> '2番目のｱﾊﾞﾀｰID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザアバター設定実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarConfigDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻る
		if($this->af->get('back')) return 'user_avatar_config_first';
		// 検証エラー
		if($this->af->validate()>0) return 'user_avatar_config_first';
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
		// アバター設定
		// セッション情報取得
		$sess = $this->session->get('user');
		
		$timestamp = date("Y-m-d H:i:s");
		// 初回なので購入ポイント履歴は作成しない
		
		// 第1アバター購入
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('first_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// 着ている状態
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// 第1アバター配信終了数設定がされていれば、-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('first_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		// 第2アバター購入
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('second_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// 着ている状態
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// 第2アバター配信終了数設定がされていれば、-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('second_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		
		// セッション中のアバター買い物かご情報を消去
		$this->session->set('cart_avatar', '');
		
		// ユーザ情報を更新
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定履歴を更新
		$u->set('avatar_config_first', 1);
		$r = $u->update();
		// セッション情報を更新
		$this->session->set('user', $u->getNameObject());
		
		return 'user_avatar_config_done';
	}
}
?>