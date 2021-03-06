<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メルマガ登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMagazineAdd extends Tv_ActionForm
{
	/** @var bool   バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'year' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'month' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'day' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理メルマガ登録アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMagazineAdd extends Tv_ActionAdminOnly
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
		return 'admin_magazine_add';
	}
}
?>