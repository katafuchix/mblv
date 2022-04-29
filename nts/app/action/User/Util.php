<?php
/**
 * Util.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザユーティリティアクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserUtil extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'page' => array(
			'name'		=> 'ﾍﾟｰｼﾞ',
			'type'		=> VAR_TYPE_STRING,
		),
		'ma_hash' => array(
			'name'		=> 'ma_hash',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザユーティリティアクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		
		//メディア経由でのアクセスの場合はパラメータをURLにつけて引き継ぐ
		$this->af->setApp('ma_hash',$this->af->get('ma_hash'));
				
		// それぞれのページ名に対応したビューを返却する
		return 'user_util_'.$page;
	}
}

?>
