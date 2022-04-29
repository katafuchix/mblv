<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティカテゴリ編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigCommunityCategoryEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'community_category_id' => array(
			'name'		=> 'コミュニティカテゴリID',
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_category_name' => array(
			'name'		=> 'コミュニティカテゴリ名',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
	);
}

/**
 * 管理コミュニティカテゴリ編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigCommunityCategoryEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'admin_config_community_category_edit';
		
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
		// コミュニティカテゴリオブジェクトを更新
		$o =& new Tv_CommunityCategory($this->backend,'community_category_id',$this->af->get('community_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->update();
		
		// フォーム値をクリア
		$this->af->clearFormVars();
		
		// メッセージ
		$this->ae->add(null, '', I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE);
		
		return 'admin_config_community_category';
	}
}
?>