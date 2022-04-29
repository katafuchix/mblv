<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理管理者アカウント編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccountEditDo extends Tv_ActionForm
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
		'admin_name' => array(
			'name'		=> '管理者名',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'login_id' => array(
			'name'		=> 'ログインID',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'login_password' => array(
			'name'		=> 'ログインパスワード',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'admin_status' => array(
			'name'		=> '管理者権限',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, admin_status',
		),
	);
}

/**
 * 管理管理者アカウント編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccountEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_account_edit';
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
		// 管理者情報重複確認
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'admin',
			'sql_where'	=> 'login_id = ? AND admin_id <> ?',
			'sql_values'	=> array($this->af->get('login_id'), $this->af->get('admin_id')),
		);
		$um = $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '' ,E_ADMIN_ACCOUNT_DUPLICATE);
			return 'admin_account_edit';
		}
		
		// オブジェクトを取得
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_admin_edit';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ACCOUNT_EDIT_DONE);
		
		return 'admin_account_list';
	}
}
?>