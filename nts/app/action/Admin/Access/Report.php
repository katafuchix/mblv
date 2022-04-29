<?php
/**
 * Report.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 管理アクセス解析集計アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAccessReport extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'access_key' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'year' => array(
			'type'		=> VAR_TYPE_INT,
			'required' => true,
			'name' => '年',
		),
		'month' => array(
			'type'		=> VAR_TYPE_INT,
			'required' => true,
			'name' => '月',
		),
	);
}

/**
 * 管理アクセス解析集計アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAccessReport extends Tv_ActionAdminOnly
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
		return 'admin_access_report';
	}
}
?>