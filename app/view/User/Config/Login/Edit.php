<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ簡単ログイン設定編集ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserConfigLoginEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// セッション情報取得
		$sess = $this->session->get('user');
		
		// オブジェクト取得
		$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		// 簡単ログイン用UID新規登録
		if(!$user->get('user_uid')){
			$this->af->set('config_type',1);
		}
		// 簡単ログイン用UID変更(or 削除)
		elseif($row[0] > 0){
			$this->af->set('config_type',0);
		}
	}
}
?>