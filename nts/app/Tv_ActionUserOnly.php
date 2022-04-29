<?php
/**
 * Tv_ActionUserOnly.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/** */
require_once 'Tv_ActionUser.php';

/**
 * 本登録ユーザのみがアクセスできるアクションの基底クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionUserOnly extends Tv_ActionUser
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
		
		// セッションが開始していることが前提
		if (!$this->session->isValid()) {
			// メディア経路計測用にセッションは常に展開しているので、本会員モードかどうか確認
			$s = $this->session->get('user');
			if(!$s){
				// iniファイルに飛ばし先があれば
				if($this->config->get('redirect_url')){
					header("Location: ".$this->config->get('redirect_url'));
					exit;
				}else{
					return 'user_index';
				}
			}
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