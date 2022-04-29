<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告カテゴリ編集アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAdcategoryEdit extends Tv_Form_AdminAdcategoryEditDo
{
}

/**
 * 管理広告カテゴリ編集アクション実行クラス
 * 
 * 広告カテゴリ編集フォーム画面を表示します
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryEdit extends Tv_ActionAdminOnly
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
		// ad_category_idから広告情報取得
		$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $this->af->get('ad_category_id'));
		$ac->exportForm();
		return 'admin_adcategory_edit';
	}
}
?>