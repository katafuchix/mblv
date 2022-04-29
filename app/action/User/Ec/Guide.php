<?php
/**
 * Guide.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ガイドページ表示アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcGuide extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'page' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * ガイドページ表示アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcGuide extends Tv_ActionUser
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
		// パラメタ取得
		$page = $this->af->get('page');
		// 該当ページを出力
		if($page){
			return 'user_ec_guide_' . $page;
		}
		// 該当ページが存在しない場合はuser_ec_guide_indexを出力
		else{
			return 'user_ec_guide_index';
		}
	}
}
?>