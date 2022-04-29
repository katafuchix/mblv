<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザパスワード変更実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigPassEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_password' => array(
			'name'		=> '旧ﾊﾟｽﾜｰﾄﾞ',
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
		'new_user_password' => array(
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
		'edit' => array(
			'name'		=> '　変更する　',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}
/**
 * ユーザパスワード変更実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigPassEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'user_config_pass_edit';
		
		// セッションからユーザ情報を取得する
		$sess = $this->session->get('user');
		
		// DBからユーザ情報を取得する
		$this->user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		// 本会員なければ戻す
		if($this->user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_config_pass_edit';
		}
		
		//入力されたパスワードとDBから取得したパスワードは同じか確認、違うなら戻す
		if($this->user->get('user_password') != $this->af->get('user_password')){
			$this->ae->add(null, '', E_USER_CONFIG_FORMER_PASSWORD);
			return 'user_config_pass_edit';
		}
		
		return null;
	}
	
	function perform()
	{
		//password変更
		$this->user->set('user_password', $this->af->get('new_user_password'));
		$r = $this->user->update();
		if(Ethna::isError($r)) return 'user_config_pass_edit';
		return 'user_config_pass_edit_done';
	}
}
?>
