<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオカテゴリ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminVideocategoryEdit extends Tv_Form_AdminVideocategoryEditDo
{
}

/**
 * 管理ビデオカテゴリ編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryEdit extends Tv_ActionAdminOnly
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
		// ビデオカテゴリ情報取得
		$sc =& new Tv_VideoCategory($this->backend, 'video_category_id', $this->af->get('video_category_id'));
		$sc->exportForm();
		return 'admin_videocategory_edit';
	}
}
?>