<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理統計解析一覧実行処理アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminStatsList extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'type' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, stats_type',
		),
		'term' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'id' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'sub_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'datetime' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// 投稿期間
		'year' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'month' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'day' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'hour' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'weekno' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
		),
		'id_use' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'download' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理統計解析一覧実行処理アクション実行クラス
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminStatsList extends Tv_ActionAdminOnly
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
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// 使用するIDの指定
		if($this->af->get('id_use')){
			$this->af->set('id', $this->af->get('id_use'));
		}
		
		return 'admin_stats_list';
	}
}
?>