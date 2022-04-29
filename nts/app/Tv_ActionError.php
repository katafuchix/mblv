<?php
/**
 * Tv_ActionError.php
 *
 *  @author	 Tachnovarth
 *  @package	SNSV
 */

/**
 *  アプリケーションエラー管理クラス
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package	SNSV
 */
class Tv_ActionError extends Ethna_ActionError
{
	/**
	 *  エラーオブジェクトを生成/追加する
	 *
	 *  @access public
	 *  @param  string  $name       エラーの発生したフォーム項目名(不要ならnull)
	 *  @param  string  $message    エラーメッセージ
	 *  @param  int     $code       エラーコード
	 *  @return Ethna_Error エラーオブジェクト
	 */
	function &add($name, $message, $code = null)
	{
		global $errorMessage;
		
		// メッセージコードからメッセージを取得する
		if(isset($errorMessage[$code])){
			$message = $errorMessage[$code];
		}
		// エラーをアサインする
		$error = parent::add($name, $message, $code);
		
		return $error;
	}
}
?>
