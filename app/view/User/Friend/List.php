<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 友達一覧画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		$user_session = $this->session->get('user'); 
		// user_idが指定されてない場合は自分の友達一覧を表示する
		$user_id = ($this->af->get('user_id') == '') ?
		$user_session['user_id'] : $this->af->get('user_id'); 
		
		// ユーザのニックネームを出力
		$user = &new Tv_User($this->backend,
			'user_id',
			$user_id
			);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// 友達一覧を取得
		$param = array(
			'sql_select'	=> ' friend_id, to_user_id',
			'sql_from'		=> ' friend ',
			'sql_where'		=> ' from_user_id = ? AND friend_status = ? ',
			'sql_values'	=> array( $user_id, 2 ),
		);
		$friendList = $um->dataQuery($param);
		
		foreach($friendList as $key => $item){
			$toUser = &new Tv_User($this->backend,
				'user_id',
				$item['to_user_id']
				); 
			// 友達がすでに退会している場合は、一覧から消す
			if(!$toUser->isValid() || $toUser->get('user_status') != 2){
				unset($friendList[$key]);
			}else{
				$friendList[$key]['image_id'] = $toUser->getName('image_id');
				$friendList[$key]['to_user_nickname'] = $toUser->getName('user_nickname');
			}
		}
		// 友人一覧を出力
		$this->af->setApp('friend_list', $friendList);
	}
}
?>