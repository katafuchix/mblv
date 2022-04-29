<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理フリーページ削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminContentsDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'contents_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理フリーページ削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsDeleteDo extends Tv_ActionAdminOnly
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
		$timestamp = date('Y-m-d H:i:s');
		// フリーページ削除（物理削除しない
		$c =& new Tv_Contents($this->backend, 'contents_id', $this->af->get('contents_id'));
		$c->set('contents_status', 0);
		$c->set('contents_updated_time',$timestamp);
		$c->set('contents_deleted_time',$timestamp);
		// 更新
		$r = $c->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_contents_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_DELETE_DONE);
		return 'admin_contents_list';
	}
}
?>