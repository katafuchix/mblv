<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティカテゴリ登録アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigCommunityCategoryAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'community_category_name' => array(
			'name'		=> 'コミュニティカテゴリ名',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理コミュニティカテゴリ登録アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigCommunityCategoryAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_community_category';
		
		// 二重投稿エラー
		if (Ethna_Util::isDuplicatePost() ) return 'admin_config_community_category';
		
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
		// コミュニティカテゴリオブジェクト追加
		$o =& new Tv_CommunityCategory($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->add();
		
		// フォーム値をクリア
		$this->af->clearFormVars();
		
		// メッセージ
		$this->ae->add(null, '', I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE);
		
		return 'admin_config_community_category';
	}
}
?>