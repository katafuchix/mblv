<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザプロフィール閲覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserProfileView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザプロフィール閲覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserProfileView extends Tv_ActionUserOnly
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
		if($this->af->validate() > 0){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
		}
		
		// 存在確認
		$user =& new Tv_User($this->backend,'user_id',$this->af->get('user_id'));
		// レコード自体が存在しない場合
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
		}
		// ステータスが本会員でない場合
		if($user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
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
		return 'user_profile_view';
	}
}
?>