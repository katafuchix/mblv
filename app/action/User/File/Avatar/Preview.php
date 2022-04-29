<?php
/**
 * Preview.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバタープレビューアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFileAvatarPreview extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'attr' => array(
			'type'  => VAR_TYPE_STRING,
		),
		'place' => array(
			'type'  => VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザアバタープレビューアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFileAvatarPreview extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) exit;
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
		$a = $this->backend->getManager('Avatar');
		$a->preview();
	}
}
?>