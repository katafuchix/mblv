<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
require_once('Do.php');
/**
 * レビュー登録確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAddConfirm extends Tv_Form_UserEcReviewAddDo
{
}

/**
 * レビュー登録アクションアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAddConfirm extends Tv_ActionUserOnly
{
	function authenticate()
	{
		return null;
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0){
			return 'user_ec_review_add';
		}
		
		//取得したパラメータでDBにデータがない場合
		$r =& new Tv_Review($this->backend, array('review_id', 'review_hash',), array($this->af->get('review_id'), $this->af->get('review_hash'),));
		if(!$r->isValid()){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
		}
		
		//会員登録中のユーザか判断
		$u =& new Tv_User($this->backend, 'user_id', $r->get('user_id'));
		if($u->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_REVIEW_NOT_EXIST);
			return 'user_error';
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
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'user_ec_review_add_confirm';
	}
}
?>