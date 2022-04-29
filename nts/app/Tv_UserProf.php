<?php
/**
 *  Tv_UserProf.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  ユーザプロフィールオプション項目値マネージャ
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package SNSV
 */
class Tv_UserProfManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのプロフを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// DBに接続する
		$db = & $this->backend->getDB();
		// 削除
		$sql = "DELETE FROM user_prof WHERE user_id =" . $user_id;
		$db->db->query($sql);
	} 
}

/**
 *  ユーザプロフィールオプション項目値オブジェクト
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package SNSV
 */
class Tv_UserProf extends Ethna_AppObject
{
	/**
	 *  オブジェクトプロパティ表示名へのアクセサ
	 *
	 *  @access public
	 *  @param  string  $key	プロパティ名
	 *  @return string  プロパティの表示名
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}

?>
