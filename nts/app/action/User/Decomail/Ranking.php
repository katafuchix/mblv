<?php
/**
 * Ranking.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザデコメールランキングアクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserDecomailRanking extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'decomail_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザデコメールランキングアクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserDecomailRanking extends Tv_ActionUserOnly
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
		return 'user_decomail_ranking';
	}
}

?>
