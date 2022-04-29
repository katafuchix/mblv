<?php
/**
 * .php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲームカテゴリ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminGamecategoryEdit extends Tv_Form_AdminGamecategoryEditDo
{
}

/**
 * 管理ゲームカテゴリ編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminGamecategoryEdit extends Tv_ActionAdminOnly
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
		// ゲームカテゴリ情報取得
		$gc =& new Tv_GameCategory($this->backend, 'game_category_id', $this->af->get('game_category_id'));
		$gc->exportForm();
		return 'admin_gamecategory_edit';
	}
}
?>