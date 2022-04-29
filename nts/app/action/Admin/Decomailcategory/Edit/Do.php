<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメールカテゴリ編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminDecomailcategoryEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'decomail_category_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'decomail_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'decomail_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理デコメールカテゴリ編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailcategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomailcategory_edit';
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
		// デコメールカテゴリ編集
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_DecomailCategory($this->backend, 'decomail_category_id', $this->af->get('decomail_category_id'));
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_decomailcategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_EDIT_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>