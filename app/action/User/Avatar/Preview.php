<?php
/**
 * Preview.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバタープレビューアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarPreview extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'cart' => array(
			'form_type' 	=> FORM_TYPE_SUBMIT,
		),
		'cart_avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
//			'required'	=> true,
		),
		'cmd' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
		),
	);
}

/**
 * ユーザアバタープレビューアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarPreview extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar';
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
		// 買い物かごに入れる
		$avatar_id = $this->af->get('avatar_id');
		if($avatar_id && $this->af->get('cart')){
			// セッションからユーザ情報を取得する
			$user = $this->session->get('user');
			// セッションからアバター情報を取得する
			$cart_avatar = $this->session->get('cart_avatar');
			// アバターIDが既に買い物かごに入っていないかどうか確認する
			if(is_array($cart_avatar)){
				foreach($cart_avatar as $k => $v){
					// 空の配列がある場合は削除する
					if(!$v['avatar_id']){
						unset($cart_avatar[$k]);
						continue;
					}
					// 入っていた場合はそのままPreviewを見せる
					if($v['avatar_id'] == $avatar_id){
						$this->ae->add(null,'',E_USER_AVATAR_ALREADY_IN_CART);
						return 'user_avatar_preview';
					}
				}
			}
			// 重複アバター購入確認
			$um = $this->backend->getManager('Util');
			$param = array(
				'sql_select'	=> ' avatar_id ',
				'sql_from'		=> ' user_avatar ',
				'sql_where'		=> ' user_id = ? AND avatar_id  = ? AND user_avatar_status <> ?',
				'sql_values'	=> array( $user['user_id'], $avatar_id, 0 ),
			);
			$ua_list = $um->dataQuery($param);
		
			// 重複している場合は買い物かごに入れない
			//if($ua_list[0] > 0){
			if(count($ua_list) > 0){
				$this->ae->add(null, '', E_USER_AVATAR_DUPLICATE);
				return 'user_avatar_preview';
			}
			// 今回のアバター情報を追加する
			$cart_avatar[] = array('avatar_id' => $avatar_id, 'avatar_wear' => 1);
			// アバター情報をセッションにセットする
			$this->session->set('cart_avatar', $cart_avatar);
		}
		
		// カートアバターの着る/脱ぐステータス管理
		$cart_avatar_id = $this->af->get('cart_avatar_id');
		if($cart_avatar_id){
			$cart_avatar = $this->session->get('cart_avatar');
			if(is_array($cart_avatar)){
				foreach($cart_avatar as $k => $v){
					// 空の配列がある場合は削除する
					if(!$v['avatar_id']){
						unset($cart_avatar[$k]);
						continue;
					}
					// 該当のアバターがある場合は着替える
					if($v['avatar_id'] == $cart_avatar_id){
						if($this->af->get('cmd')=='off'){
							// 脱ぐ
							$cart_avatar[$k]['avatar_wear'] = 0;
							$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
						}elseif($this->af->get('cmd')=='on'){
							// 着る
							$cart_avatar[$k]['avatar_wear'] = 1;
							$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
						}
					}
				}
				// アバター情報をセッションにセットする
				$this->session->set('cart_avatar', $cart_avatar);
			}
		}
		
		return 'user_avatar_preview';
	}
}
?>