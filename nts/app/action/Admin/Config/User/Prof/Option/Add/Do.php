<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理プロフィール項目選択肢登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfOptionAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'config_user_prof_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
		'config_user_prof_option_name' => array(
			'name'		=> '項目名',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
		'add' => array(
			'name'		=> '追加',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理プロフィール項目選択肢登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfOptionAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_user_prof_edit';
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
		// 選択肢の登録
		$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id' => new Ethna_AppSearchObject($this->af->get('config_user_prof_id'), OBJECT_CONDITION_EQ	)
		);
		$configUserProfOptionList = $configUserProfOption->searchProp(
			array('config_user_prof_option_order'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfOptionList[0])
			$orderMax = $configUserProfOptionList[1][0]['config_user_prof_option_order'];
		else
			$orderMax = 0;
		
		$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
		$configUserProfOption->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProfOption->set('config_user_prof_option_order', $orderMax + 1);
		// 登録
		$configUserProfOption->add();
		
		$this->af->set('config_user_prof_option_name', '');
		return 'admin_config_user_prof_edit';
	}
}
?>