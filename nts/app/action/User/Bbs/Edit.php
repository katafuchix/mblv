<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ伝言編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBbsEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'bbs_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザ伝言編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsEdit extends Tv_ActionUserOnly
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
		if($this->af->validate() > 0) return 'user_bbs_list';
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
		$comment =& new Tv_Bbs(
			$this->backend,
			'bbs_id',
			$this->af->get('bbs_id')
		);
		$comment->exportForm();
		
		return 'user_bbs_edit';
	}
}
?>