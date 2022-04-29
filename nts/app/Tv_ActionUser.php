<?php
/**
 * Tv_ActionUser.php
 * 
 * @author Technovarth
 * @package SNSV
 */

require_once 'Tv_ActionClass.php';

/**
 * ユーザのみがアクセスできるアクションの基底クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionUser extends Tv_ActionClass
{
	/**
	 * 認証
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// 基本情報を取得する
		parent::setSnsInfo();
		
		// ログを統計解析に投入
		$s = & $this->backend->getManager('Stats');
		$s->addStats('access');
		
		//メンテナンスフラグがON(メンテ中
		$sns_info = $this->config->get('sns_info');
		if($sns_info['sns_maintenance_status'] == 1){
			return 'user_maintenance';
		}
		
		// ブラックリストチェック
		$b = & $this->backend->getManager('BlackList');
		// ブラックリストに登録されている場合はエラー画面へ
		if($b->check()){
			$this->ae->add(null, '', E_USER_BLACKLIST_HOME);
			return 'user_error';
		}
		
		// 友達リンク申請ならばuser_friend_applyへ。
		$friend_apply_request = '';
		if(array_key_exists('action_user_friend_apply',$_REQUEST)){ $friend_apply_request = true; }
		if($friend_apply_request && $_REQUEST['to_user_id'] && $_REQUEST['user_hash']){
			return 'user_friend_apply';
		}
		
		return parent::authenticate();
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string 遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return parent::prepare();
	} 
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return parent::perform();
	}
} 
?>