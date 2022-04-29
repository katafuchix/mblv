<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理管理者アカウント削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccountDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'admin_id' => array(
			'name'		=> '管理者ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * 管理管理者アカウント削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccountDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_admin_edit';
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
		// オブジェクトを取得
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 論理削除
		$o->set('admin_status', 0);
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_account_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ACCOUNT_DELETE_DONE);
		
		return 'admin_account_list';
	}
}
?>