<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理フリーページ編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminContentsEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'contents_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util,admin_shop_id',
		),
		'contents_code' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'contents_title' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'contents_body' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
	);
}

/**
 * 管理フリーページ編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminContentsEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_contents_list';
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
		// オブジェクト編集
		$o =& new Tv_Contents($this->backend,'contents_id',$this->af->get('contents_id'));
		
		// 同じ識別コードがないかどうか確認
		if($this->af->get('contents_code') != $o->get('contents_code')){
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
				return 'admin_contents_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$timestamp = date('Y-m-d H:i:s');
		$o->set('contents_updated_time', $timestamp);
		
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_contents_edit';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_CONTENTS_EDIT_DONE);
		return 'admin_contents_list';
	}
}
?>