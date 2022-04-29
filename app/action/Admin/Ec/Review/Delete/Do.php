<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理レビュー削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcReviewDeleteDo extends Tv_ActionForm
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
 * 管理レビュー削除実行処理アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcReviewDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_ec_review_list';
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
		// レビュー削除（物理削除しない
		$reviewObject =& new Tv_Review($this->backend,'review_id',$this->af->get('review_id'));
		$reviewObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$reviewObject->set('review_status',0);
		$reviewObject->set('review_deleted_time',date('Y-m-d H:i:s'));
		// 更新
		$r = $reviewObject->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_ec_review_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		$this->ae->add(null, '', I_ADMIN_REVIEW_DELETE_DONE);
		
		return 'admin_ec_review_list';
	}
}
?>