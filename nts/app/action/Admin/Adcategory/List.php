<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告カテゴリ一覧アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdcategoryList extends Tv_ActionForm
{
}

/**
 * 管理広告カテゴリ一覧アクション実行クラス
 * 
 * 広告カテゴリ一覧画面を表示します
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryList extends Tv_ActionAdminOnly
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
		return 'admin_adcategory_list';
	}
}
?>