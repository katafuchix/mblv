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
class Tv_Form_UserEcUtil extends Tv_ActionForm
{
	var $use_validator_plugin = true;
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
class Tv_Action_UserEcUtil extends Tv_ActionUser
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
		if($page == '') return 'user_ec_index';
		
		// それぞれのページ名に対応したビューを返却する
		return 'user_ec_util_'.$page;
	}
}
?>