<?php
/**
 *  Tv_UserProf.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  ユーザプロフィールオプション項目値マネージャ
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package    MBLV
 */
class Tv_UserProfManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのプロフを削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{
		// オブジェクトを取得
		/*
		$o = new Tv_UserProf($this->backend, 'user_id', $user_id);
		// 有効な場合
		if($o->isValid()){
			// オブジェクト削除
			$o->remove();
		}
		*/
		// ユーザーのプロフを取得
		$o = & new Tv_UserProf($this->backend);
		$result = $o->searchProp(
			array('user_prof_id'),
			array('user_id' => $user_id),
			array('user_prof_id' => OBJECT_SORT_ASC)
		);
		foreach($result[1] as $item){
			// オブジェクトを取得
			$p = & new Tv_UserProf($this->backend, 'user_prof_id', $item['user_prof_id']);
			// 有効な場合
			if($p->isValid()){
				// オブジェクト削除
				$p->remove();
			}
		}
	}
}

/**
 *  ユーザプロフィールオプション項目値オブジェクト
 *
 *  @author	 Technovarth
 *  @access	 public
 *  @package    MBLV
 */
class Tv_UserProf extends Ethna_AppObject
{
}
?>