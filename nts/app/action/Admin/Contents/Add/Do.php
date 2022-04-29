<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理フリーページ登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminContentsAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'contents_code' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'contents_title' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'contents_body' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * 管理フリーページ登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_contents_add';
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
		// 同じ識別コードがないかどうか確認
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> 'contents_id',
			'sql_from'	=> 'contents',
			'sql_where'	=> 'contents_code = ?',
			'sql_values'	=> array($this->af->get('contents_code')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_CONTENTS_CODE_DUPLICATE);
			return 'admin_contents_add';
		}
		
		// フリーページ登録
		$timestamp = date('Y-m-d H:i:s');
		$c =& new Tv_Contents($this->backend);
		$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$c->set('contents_status', 1);
		$c->set('contents_created_time', $timestamp);
		$c->set('contents_updated_time', $timestamp);
		
		// 登録
		$r = $c->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_contents_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_ADD_DONE);
		return 'admin_contents_list';
	}
}
?>