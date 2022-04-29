<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理管理者アカウント編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAccountEdit extends Tv_ActionForm
{
	/** @var bool バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var array   フォーム値定義 */
	var $form = array(
		'admin_id' => array(
			'name'		=> '管理者ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * 管理管理者アカウント編集アクション実行クラス
 * 
 * 管理者情報編集画面の出力準備
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAccountEdit extends Tv_ActionAdminOnly
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
		// オブジェクトを取得
		$o =& new Tv_Admin($this->backend,'admin_id',$this->af->get('admin_id'));
		$o->exportForm();
		
		$admin_action_category = explode(",", $o->get('admin_action_category_id'));
		$this->af->set('admin_action_category_id', $admin_action_category);
		
		$admin_shop = explode(",", $o->get('admin_shop_id'));
		$this->af->set('admin_shop_id', $admin_shop);

		return 'admin_account_edit';
	}
}
?>