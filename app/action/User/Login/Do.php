<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザログイン実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserLoginDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_mailaddress' => array(
			'name'		=> 'ﾒｰﾙｱﾄﾞﾚｽ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//簡単ログインを使用する場合はアドレスは空になるのでtrueでない。
		),
		'user_password' => array(
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMoはpassword指定すると数字モードになってしまうので。FORM_TYPE_TEXTに。
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//簡単ログインを使用する場合はパスワードは空になるのでtrueでない。
		),
		'easy_login' => array(
			'name'		=> '簡単ログイン',
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	=> VAR_TYPE_STRING,
		),
		'guid' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザログイン実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserLoginDo extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_login';
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		$um =& $this->backend->getManager('Util');
		$xuid = $um->getXuid();
		
		//簡単ログイン
		if($this->af->get('easy_login')){
			// PCの場合
			if($GLOBALS['EMOJIOBJ']->carrier == 'PC'){
				//$this->ae->add(null, '', E_USER_IDENTIFY);
				//return 'user_index';
				return 'user_login';
			}
			//UID取得できなければログイン画面にリダイレクト
			if(!$xuid){
				$this->ae->add(null, '', E_USER_IDENTIFY);//UIDをクライアントから取得できなかった
				return 'user_login';
			}
			
			//取得したUIDで、ステータス有効のユーザーが、table:userにいるか確認
			$param = array(
				'sql_select'	=> ' user_uid, user_mailaddress, user_password ',
				'sql_from'		=> ' user ',
				'sql_where'		=> 'user_uid = ? AND user_status = ? ' ,
				'sql_values'	=> array( $xuid, 2 ),
			);
			$user = $um->dataQuery($param);
			
			//if($user[0] == 0){
			if(count($user) == 0){
				$this->ae->add(null, '', E_USER_IDENTIFY);//DBになかった
				return 'user_login';
			}
			
			//クライアントから取得したUIDとDB取得UIDが同じ
			if($xuid == $user[0]['user_uid']){
				$userManager =& $this->backend->getManager('User');
				if($userManager->login($user[0]['user_mailaddress'],$user[0]['user_password'])){
					//注文へ直行か、TOPか判断する
					// セッションにcart_hashがあるか確認
					if($this->af->get('mode') == 'order' || $this->session->get('cart_hash') != ""){
						return 'user_ec_order_type';
					}else{
						return 'user_home';
					}
				}
			}
			
			//想定外エラー
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_login';
			
		}else{
			$userManager =& $this->backend->getManager('User');
			
			//認証
			if($userManager->login($this->af->get('user_mailaddress'), $this->af->get('user_password'))){
				// PCを弾く設定とき
				if($this->config->get('mobile_only'))
				{
					$user_session = $this->session->get('user');
					if(!$user_session['user_guest_status'] && $GLOBALS['EMOJIOBJ']->carrier == 'PC'){
						// ゲストではないのにログアウトさせる
						$userManager->logout();
						//認証NG
						$this->ae->add(null, '', E_USER_LOGIN_MOBILE_ONLY);
						return 'user_login';
					}
				}
				//注文へ直行か、TOPか判断する
				// セッションにcart_hashがあるか確認
				if($this->session->get('cart_hash')){
					return 'user_ec_order_type';
				}else{
					return 'user_home';
				}
			}
			
			//認証NG
			$this->ae->add(null, '', E_USER_LOGIN);
			return 'user_login';
		}
	}
}
?>