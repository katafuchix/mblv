<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバターカテゴリ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAvatarcategoryEdit extends Tv_Form_AdminAvatarcategoryEditDo
{
}

/**
 * 管理アバターカテゴリ編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryEdit extends Tv_ActionAdminOnly
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
		// アバター情報取得
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $this->af->get('avatar_category_id'));
		$ac->exportForm();
		return 'admin_avatarcategory_edit';
	}
}
?>