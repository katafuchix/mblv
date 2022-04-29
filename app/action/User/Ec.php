<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * モールトップページ表示アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEc extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'spg_go_on' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'autologin' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * モールトップページ表示アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEc extends Tv_ActionUser
{

	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		//買い物かご画面で「買い物を続ける」をクリックした場合
		if($this->af->get('spg_go_on')){
			//sessionからback_url（戻るべきショップとカテゴリ）を取得
			if($back_url = $this->session->get('back_url')){
				$this->af->set('shop_id', $back_url['shop_id']);
				$this->af->set('item_category_id', $back_url['item_category_id']);
				//モールカテゴリ画面へもどす
				return 'user_ec_category';
			}
		}
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

		// リファラがSNS_URL とマッチする場合のみかんたんログインを実行する
		// ※ docomo 以外はリファラを取得できるので、リファラで振り分けたい場合はこちらを使用しても可
//		if ($um->get_host_name(getenv('HTTP_REFERER')) == $um->get_host_name(SNS_URL))

		// GET パラメータにautologin が入っている場合はかんたんログイン処理を実行
		if ($this->af->get('autologin'))
		{
			//セッションがない場合自動ログインをためす
			if(!$this->session->get('user')){
				//携帯端末UIDを取得
				$user_uid = $um->getXuid();
				$term = $um->GetTermInfo();
				//UID取得できなければﾛｸﾞｲﾝ画面にリダイレクト
				if(!$user_uid ){
					return 'user_ec';
				}
				//取得したUIDで、ステータス有効のユーザーが、table:userにいるか確認
				$user =& new Tv_User($this->backend, array(user_uid, user_status,), array($user_uid , 2,));
				// ユーザーがいない
				if(!$user->isValid()){
					return 'user_ec';
				}
				//クライアントから取得したUIDとDB取得UIDが同じ
				if($user_uid  == $user->get('user_uid')){
					//ｵｰﾄﾛｸﾞｲﾝ認証
					$userManager =& $this->backend->getManager('User');
					$userManager->login($user->get('user_mailaddress'), $user->get('user_password'));
					$this->ae->add(null,'',I_USER_LOGIN_DONE);
					return 'user_ec';
				}
				//クライアントから取得したUIDとDB取得UIDが異なるのでもどす
				else{
					return 'user_ec';
				}
			}
		}
		//セッションがある場合TOPへ
		else{
			return 'user_ec';
		}
		//TOPへ
		return 'user_ec';
	}
}
?>