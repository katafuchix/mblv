<?php
// vim: foldmethod=marker
/**
 * Tv_Session.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * セッションクラス（memcache対応版）
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Session extends Ethna_Session
{
	/**
	 *  Ethna_Sessionクラスのコンストラクタ
	 *
	 *  @access     public
	 *  @param  string  $appid	  アプリケーションID(セッション名として使用)
	 *  @param  string  $save_dir   セッションデータを保存するディレクトリ
	 */
	function Tv_Session($appid, $save_dir, $logger)
	{
		// セッション格納方式によって処理を振り分ける
		$save_path = ini_get('session.save_path');
		if($save_path){
			// ディレクトリでない場合
			if(!is_dir($save_path)){
				$save_dir = '';
				// memcache系に変更
				Tv_SessionMemcache::singleton();
			}
		}
		$this->Ethna_Session('', $save_dir, $logger) ;
	}
	
	/**
	 *  セッションを復帰する
	 *
	 *  @access     public
	 */
	function restore()
	{
		if (
			!empty($_COOKIE[$this->session_name])
			||
			(
				ini_get("session.use_trans_sid") == 1
				&&
				!empty($_REQUEST[$this->session_name])
			)
		) {
			session_start();
			$this->session_start = true;
			
			// check session
//			if ($this->isValid() == false) {
//				setcookie($this->session_name, "", 0, "/");
//				$this->session_start = false;
//			}
			
			// check anonymous
			if ($this->get('__anonymous__')) {
				$this->anonymous = true;
			}
		}
	}
	
	/**
	 *  セッションの正当性チェック
	 *
	 *  @access     public
	 *  @return bool	true:正当なセッション false:不当なセッション
	 */
	function isValid()
	{
		if (!$this->session_start) {
			if (!empty($_COOKIE[$this->session_name]) || session_id() != null) {
				setcookie($this->session_name, "", 0, "/");
			}
			return false;
		}
		
		// check remote address
		if (!isset($_SESSION['REMOTE_ADDR'])
			|| $this->_validateRemoteAddr($_SESSION['REMOTE_ADDR'],
										  $_SERVER['REMOTE_ADDR']) == false) {
			// we do not allow this
			setcookie($this->session_name, "", 0, "/");
			session_destroy();
			$this->session_start = false;
			return false;
		}
		return true;
	}
	
	/**
	 *  セッションに保存されたIPアドレスとアクセス元のIPアドレスが
	 *  同一ネットワーク範囲かどうかを判別する(16bit mask)
	 *
	 *  @access private
	 *  @param  string  $src_ip	 セッション開始時のアクセス元IPアドレス
	 *  @param  string  $dst_ip	 現在のアクセス元IPアドレス
	 *  @return bool	true:正常終了 false:不正なIPアドレス
	 */
	function _validateRemoteAddr($src_ip, $dst_ip)
	{
		return true;
	}
}
?>