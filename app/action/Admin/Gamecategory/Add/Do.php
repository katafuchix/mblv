<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲームカテゴリ登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminGamecategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'game_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'game_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * 管理ゲームカテゴリ登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminGamecategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_gamecategory_add';
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
		// ゲームカテゴリ登録
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_GameCategory($this->backend);
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$ac->set('game_category_status', 1);
		// 登録
		$r = $ac->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_gamecategory_list';
		
		$this->ae->add(null, '', I_ADMIN_GAME_CATEGORY_ADD_DONE);
		return 'admin_gamecategory_list';
	}
}
?>