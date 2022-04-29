<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理プロフィール項目編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigUserProfEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'config_user_prof_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'config_user_prof_name' => array(
			'name'		=> '項目名',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'max'		=> 255,
		),
		'back' => array(
			'name'		=> '戻る',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'submit' => array(
			'name'		=> '編集完了',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理プロフィール項目編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminConfigUserProfEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// backの場合
		if($this->af->get('back')){
			$this->af->set('config_user_prof_name',null);
			return 'admin_config_user_prof';
		}
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
		// 編集対象のアイテムを取得
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$this->af->get('config_user_prof_id')
		);
		if(!$configUserProf->isValid()) return 'admin_config_user_prof';
		
		// DB更新
		$configUserProf->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProf->update();
		
		$this->af->set('config_user_prof_name',null);
		return 'admin_config_user_prof';
	}
}
?>