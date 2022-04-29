<?php
/**
 * Util.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザユーティリティアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserUtil extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'page' => array(
			'name'		=> 'ﾍﾟｰｼﾞ',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザユーティリティアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserUtil extends Tv_ActionUser
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
		// ユーザに表示するページ名を取得する
		$page = $this->af->get('page');
		// ページ名が空の場合はログインページを表示させる
		if($page == '') return 'user_index';
		
		// それぞれのページ名に対応したビューを返却する
		return 'user_util_'.$page;
	}
}
?>