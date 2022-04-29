<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ伝言削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBbsDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザ伝言削除実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン、検証エラー
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			return 'user_profile_view';
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
		// 伝言オブジェクトを取得
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		// オーバーライド
		$message->delete();
		
		return 'user_bbs_delete_done';
	}
}
?>