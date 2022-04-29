<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');

class Tv_Form_UserCommunityDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザコミュニティ削除実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityDeleteDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_community_delete_confirm';
		if($this->af->get('back')) return 'user_community_view';
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
		// コミュニティオブジェクトを削除
		$communityManager =& $this->backend->getManager('Community');
		$communityManager->delete($this->af->get('community_id'));
		
		return 'user_community_delete_done';
	}
}

?>
