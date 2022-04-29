<?php
/**
 * Emoji.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理絵文字アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEmoji extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
	);
}

/**
 * 管理絵文字アクション実行クラス
 * 
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEmoji extends Tv_ActionAdminOnly
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
		$this->af->setApp('emojiList', $GLOBALS['EMOJIOBJ']->input_support);
		return 'admin_emoji';
	}
}
?>