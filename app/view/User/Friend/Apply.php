<?php
/**
 * Apply.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達申請画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendApply extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		//user_hashﾛｸﾞｲﾝ　これだけ特殊
		if($_REQUEST['action_user_friend_apply'] && $_REQUEST['to_user_id'] && $_REQUEST['user_hash'] ){
			
			$um = $this->backend->getManager('Util');
			
			if (!$this->session->isStart()) {
				
				//ステータス有効で、パラメータuser_hashの、ｱﾄﾞﾚｽとパスワードを取得
				/*
				$tv_user =& new Tv_User($this->backend);
				$user = $tv_user->searchProp(
					array('user_mailaddress','user_password'),
					array(
						'user_hash' => $_REQUEST['user_hash'],
						'user_status' => 2 
					)
				);
				if($user[0] == 0){
					return 'user_index';
				}
				$userMailaddress = $user[1][0]['user_mailaddress'];
				$userPassword = $user[1][0]['user_password'];
				*/
					
				$param = array(
					'sql_select'	=> 'user_mailaddress, user_password',
					'sql_from'		=> ' user ',
					'sql_where'		=> 'user_hash = ? AND user_status = ?',
					'sql_values'	=> array( $_REQUEST['user_hash'], 2 ),
				);
				$user = $um->dataQuery($param);
				
				if(count($user) == 0){
					return 'user_index';
				}
				$userMailaddress = $user[0]['user_mailaddress'];
				$userPassword = $user[0]['user_password'];
				
				
				//DBから取得したｱﾄﾞﾚｽとパスワードで認証
				$userManager =& $this->backend->getManager('User');
				if(!$userManager->login($userMailaddress, $userPassword)){
					return 'user_index';
				}
			}
			
			$to_user =& new Tv_User(
				$this->backend,
				'user_id',
				//$this->af->get('to_user_id')
				$_REQUEST['to_user_id']
			);
			$this->af->setApp('to_user', $to_user->getNameObject());
		}else{
			$to_user =& new Tv_User(
				$this->backend,
				'user_id',
				//$this->af->get('to_user_id')
				$_REQUEST['to_user_id']
			);
			$this->af->setApp('to_user', $to_user->getNameObject());
		}
	}
}
?>