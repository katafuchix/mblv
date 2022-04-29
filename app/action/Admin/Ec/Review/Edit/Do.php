<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理レビュー編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcReviewEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'review_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'review_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'review_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'review_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, review_status',
		),
		'edit' => array(
		),
	);
}
/**
 * 管理レビュー編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcReviewEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->validate() > 0) return 'admin_ec_review_edit';
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
		// レビュー編集
		$reviewObject =& new Tv_Review($this->backend,'review_id',$this->af->get('review_id'));
		$reviewObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$reviewObject->set('review_updated_time',date('Y-m-d H:i:s'));
		// 更新
		$r = $reviewObject->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_ec_review_edit';
		
		$this->af->clearFormVars();
		$this->ae->add(null, '', I_ADMIN_REVIEW_EDIT_DONE);
		
		return 'admin_ec_review_list';
	}
}
?>