<?php
/**
 * Confirm.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ登録確認アクションフォーム
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityAddConfirm extends Tv_Form_UserCommunityAddDo
{
}

/**
 * ユーザコミュニティ登録確認アクション
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunityAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) {
			return 'user_community_add';
		}
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
		$hidden_vars = $this->af->getHiddenVars(NULL, array('confirm', 'add', 'back'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// コミュニティカテゴリ取得
		$cc = new Tv_CommunityCategory(
			$this->backend,
			'community_category_id',
			$this->af->get('community_category_id')
		);
		$cc->exportform();
		
		return 'user_community_add_confirm';
	}
}
?>