<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ユーザ強制退会実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserResignDo extends Tv_ActionForm
{
	/** @var bool バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'		=> 'ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}
/**
 * 管理ユーザ強制退会実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserResignDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_user_list';
		
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
		// ユーザ強制退会処理
		$userManager =& $this->backend->getManager('user');
		if($userManager->forcedResign($this->af->get('user_id'))){
			// データ削除
			$rm = & $this->backend->getManager('Resign');
			$rm->deleteData($this->af->get('user_id'));
			// 正常終了
			$this->ae->add('errors', "ユーザID:" . $this->af->get('user_id') . "を強制退会させました。");
		}else{
			// エラー
			$this->ae->add('errors', "ユーザID:" . $this->af->get('user_id') . "を強制退会させることができませんでした。システム管理者にご連絡ください。");
		}
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		return 'admin_user_list';
	}
}
?>