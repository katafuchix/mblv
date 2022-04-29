<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理プロフィール項目削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfOptionDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'config_user_prof_option_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理プロフィール項目削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfOptionDeleteDo extends Tv_ActionAdminOnly
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
		// 情報削除（※物理削除する
		$db = $this->backend->getDB();
		$sql = "DELETE FROM config_user_prof_option WHERE config_user_prof_option_id = " . $this->af->get('config_user_prof_option_id');
		// 削除
		$res = $db->query($sql);
		$this->ae->add(null, '', I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE);
		return 'admin_config_user_prof';
	}
}
?>