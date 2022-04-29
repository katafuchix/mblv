<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンドカテゴリ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminSoundcategoryEdit extends Tv_Form_AdminSoundcategoryEditDo
{
}

/**
 * 管理サウンドカテゴリ編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryEdit extends Tv_ActionAdminOnly
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
		// サウンドカテゴリ情報取得
		$sc =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$sc->exportForm();
		return 'admin_soundcategory_edit';
	}
}
?>