<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理プロフィール項目削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigUserProfDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'config_user_prof_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理プロフィール項目削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminConfigUserProfDeleteDo extends Tv_ActionAdminOnly
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
		$o = & new Tv_ConfigUserProf($this->backend, 'config_user_prof_id', $this->af->get('config_user_prof_id'));
		// 削除
		$res = $o->remove();
		$this->ae->add(null, '', I_ADMIN_CONFIG_USER_PROF_DELETE_DONE);
		return 'admin_config_user_prof';
	}
}
?>