<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理セグメント削除実行処理アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'segment_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理セグメント削除実行処理アクション実行クラス
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentDeleteDo extends Tv_ActionAdminOnly
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
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// 削除
		$o =& new Tv_Segment($this->backend,'segment_id',$this->af->get('segment_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 論理削除
		$o->set('segment_status',0);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_segment_list';
		
		$this->ae->add("errors","セグメント情報の削除が完了しました。");
		return 'admin_segment_list';
	}
}
?>