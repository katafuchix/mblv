<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ招待削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserInviteDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'invite_id' => array(
			'form'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'  => true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザ招待削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserInviteDeleteDo extends Tv_ActionUserOnly
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
		if($this->af->validate() > 0) return 'user_invite';
		
		// 「いいえ」が押されたならば戻る
		if( $this->af->get('back') ) {
			return 'user_invite';
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
		// 招待オブジェクトを取得する
		$o =& new Tv_Invite($this->backend,'invite_id',$this->af->get('invite_id'));
		
		// 招待が存在しない場合はエラーを出す
		if( !$o->isValid() ) {
			$this->ae->add(null, '', E_USER_INVITE_NAME_NOT_FOUND);
			return 'user_error';
		}
		
		// ユーザーIDを取得する
		$user_id = $o->get('to_user_id');
		
		// 物理削除
		$o->remove();
		
		return 'user_invite_delete_done';
	}
}
?>