<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理プロフィール項目選択肢優先度更新実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfOptionMoveDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'config_user_prof_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'config_user_prof_option_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'up' => array(
			'name'		=> '↑',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'down' => array(
			'name'		=> '↓',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * 管理プロフィール項目選択肢優先度更新実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfOptionMoveDo extends Tv_ActionAdminOnly
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
		// 優先度更新
		$configUserProfOptionManager =& $this->backend->getManager('ConfigUserProfOption');
		
		if($this->af->get('up')){
			$configUserProfOptionManager->moveUp($this->af->get('config_user_prof_option_id'));
		}elseif($this->af->get('down')){
			$configUserProfOptionManager->moveDown($this->af->get('config_user_prof_option_id'));
		}
		return 'admin_config_user_prof_edit';
	}
}
?>