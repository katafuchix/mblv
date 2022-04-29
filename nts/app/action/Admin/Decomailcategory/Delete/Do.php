<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメールカテゴリ削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminDecomailcategoryDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'decomail_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理デコメールカテゴリ削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailcategoryDeleteDo extends Tv_ActionAdminOnly
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
		// デコメールカテゴリ削除（物理削除しない
		$ac =& new Tv_DecomailCategory($this->backend, 'decomail_category_id', $this->af->get('decomail_category_id'));
		$ac->set('decomail_category_status', 0);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_decomailcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>