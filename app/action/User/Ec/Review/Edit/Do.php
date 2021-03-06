<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * レビュー編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'review_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_INT,
			'required'	  => true,
			'name'		  => "review_id",
		),
		'review_title' => array(
			'form_type'	 => FORM_TYPE_TEXT,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "ﾚﾋﾞｭｰﾀｲﾄﾙ",
			'min'		  => 1,
			'string_max_emoji'  => 100,
		),
		'review_body' => array(
			'form_type'	 => FORM_TYPE_TEXTAREA,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "ﾚﾋﾞｭｰ本文",
			'min'		  => 1,
			'string_max_emoji'  => 2000,
		),
		'submit' => array(
			'name'	  => '　は　い　',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'	  => '　いいえ　',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * レビュー編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		if($this->af->get('back') || $this->af->validate() > 0) {
			return 'user_ec_review_edit';
		}
		if (Ethna_Util::isDuplicatePost()) {
			return 'user_ec_review_edit_done';
		}
		return null;
	}
	function perform()
	{
		// レビュー編集
		$reviewObject =& new Tv_Review($this->backend,'review_id',$this->af->get('review_id'));
		$reviewObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$reviewObject->set('review_title',$this->af->get('review_title'));
		$reviewObject->set('review_body',$this->af->get('review_body'));
		$reviewObject->set('review_updated_time',date('Y-m-d H:i:s'));
		// 更新
		$r = $reviewObject->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'user_ec_review_edit';
		
		// Viewへ返却する情報
		return 'user_ec_review_edit_done';
	}
}
?>