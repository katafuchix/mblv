<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * BL一覧画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlacklistList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user');
		$user_id = $user_session['user_id'];
		
		// ユーザのニックネームを出力
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// BL一覧を取得
		$bl = &new Tv_BlackList($this->backend);
		$blList = &$bl->searchProp(
			array('black_list_id', 'black_list_deny_user_id'),
			array('black_list_user_id' => $user_id, 'black_list_status' => 1,)
		);
		foreach($blList[1] as $k => $v){
			$denyUser = &new Tv_User($this->backend, 'user_id', $v['black_list_deny_user_id']); 
			// 対象者がすでに退会している場合は、一覧から消す
			if(!$denyUser->isValid() || $denyUser->get('user_status') != 2){
				unset($blList[1][$k]);
			}else{
				$blList[1][$k]['deny_user_nickname'] = $denyUser->getName('user_nickname');
			}
		}
		// BL一覧を出力
		$this->af->setApp('bl_list', $blList);
	}
}
?>