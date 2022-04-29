<?php
/**
 * Second.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター設定ページ2アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarConfigSecond extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'first_avatar_id' => array(
			'name'		=> '1番目のｱﾊﾞﾀｰID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}
/**
 * ユーザアバター設定ページ2アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigSecond extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate()>0) return 'user_avatar_config_first';
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
		// セッション情報取得
		$sess = $this->session->get('user');
		
		// ユーザ情報を取得
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定履歴があるかどうか確認
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "既にｱﾊﾞﾀｰ初期設定が完了しています。");
			return 'user_error';
		}
		
		return 'user_avatar_config_second';
	}
}

?>
