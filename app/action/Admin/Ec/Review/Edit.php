<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理レビュー編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcReviewEdit extends Tv_ActionForm
{
	/** @var	bool	バリデータｕ#vラグインり携ｂ》ラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値剃荏 */
	var $form = array(
		'review_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),

	);
}
/**
 * 管理レビュー編集アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcReviewEdit extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return null;
	}
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function perform()
	{
		// レビュー情報取得
		$o =& new Tv_Review($this->backend, 'review_id', $this->af->get('review_id'));
		$o->exportForm();
		return 'admin_ec_review_edit';
	}
}
?>