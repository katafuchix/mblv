<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザかんたんログイン設定変更実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigLoginEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_password' => array(
			'name'		=> 'ﾊﾟｽﾜｰﾄﾞ',
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMoはpassword指定すると数字モードになってしまうので。FORM_TYPE_TEXTに。
			'form_type'	=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 4,
			'required_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
			'min_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
			'regexp_error'	=> '{form}を半角英数字4文字以上で正しく入力してください',
		),
		'register' => array(
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'edit' => array(
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'delete' => array(
			'name'		=> '　削除する　',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}
/**
 * ユーザかんたんログイン設定変更実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigLoginEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'user_config_login_edit';
		
		// セッションからユーザ情報を取得する
		$sess = $this->session->get('user');
		
		// DBからユーザ情報を取得する
		$this->user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		//入力されたパスワードとDBから取得したパスワードは同じか確認、違うなら戻す
		if($this->user->get('user_password') != $this->af->get('user_password')){
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_config_login_edit';
		}
		
		return null;
	}
	
	function perform()
	{
		//登録or変更のばあい
		if( $this->af->get('edit') || $this->af->get('register') ){
			//携帯端末UIDを取得
			$um =& $this->backend->getManager('Util');
			$term = $um->getTermInfo();
			
			//UID取得できなければﾛｸﾞｲﾝ画面にリダイレクト
			if(!$term[5]){
				$this->ae->add(null, '', E_USER_IDENTIFY);//UIDをクライアントから取得できなかった
				return 'user_config_login_edit';
			}
			
			//uidをアップデートする
			$this->user->set('user_uid',$term[5]);
			$res = $this->user->update();
			return 'user_config_login_edit_done';
		}
		//削除の場合
		elseif($this->af->get('delete')){
			//uidをnullで更新する
			$this->user->set('user_uid',NULL);
			$r = $this->user->update();
			return 'user_config_login_edit_done';
		}
	}
}

?>
