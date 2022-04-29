<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理プロフィール項目登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'config_user_prof_name' => array(
			'name'		=> '項目名',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'max'		=> 255,
		),
		'config_user_prof_type' => array(
			'name'		=> 'フォーム種別',
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'min'		=> 1,
			'max'		=> 5,
		),
		'add' => array(
			'name'		=> '追加',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理プロフィール項目登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_user_prof';
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_config_user_prof';
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
		// プロフィール項目登録
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_order'),
			array(),
			array('config_user_prof_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfList[0])
			$orderMax = $configUserProfList[1][0]['config_user_prof_order'];
		else
			$orderMax = 0;
					
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProf->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProf->set('config_user_prof_order', $orderMax + 1);
		// 登録
		$configUserProf->add();
		
		$this->af->set('config_user_prof_name', '');
		return 'admin_config_user_prof';
	}
}
?>