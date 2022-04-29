<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * レビュー登録アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;	
	
	var $form = array(
		'review_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'review_hash' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
		
}

/**
 * レビュー登録アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAdd extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function authenticate()
	{
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function prepare()
	{
		if( $this->af->validate() > 0 ) return 'user_index';
		
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
	function perform()
	{
		$r =& new Tv_Review($this->backend, array('review_id', 'review_hash', 'review_status'), array($this->af->get('review_id'), $this->af->get('review_hash'), 2));
		$r->exportForm();
		
		$i =& new Tv_Item($this->backend, 'item_id', $r->get('item_id'));
		
		// レビュー情報を出力
		$this->af->setApp('item_name', $i->get('item_name'));
		
		return 'user_ec_review_add';
	}
}
?>