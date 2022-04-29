<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * レビュー登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'review_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_INT,
			'required'	  => true,
			'name'		  => "review_id",
		),
		'review_title' => array(
			'form_type'	 => FORM_TYPE_TEXT,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "ﾚﾋﾞｭｰﾀｲﾄﾙ",
			'min'		  => 1,
			'string_max_emoji'  => 100,
		),
		'review_body' => array(
			'form_type'	 => FORM_TYPE_TEXTAREA,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "ﾚﾋﾞｭｰ本文",
			'min'		  => 1,
			'string_max_emoji'  => 2000,
		),
		'review_hash' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "",
		),
		'submit' => array(
			'name'	  => '　は　い　',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'	  => '　いいえ　',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * レビュー登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAddDo extends Tv_ActionUserOnly
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
		 // 二重POSTの場合
  		if(Ethna_Util::isDuplicatePost()) return 'user_error';
  
		if($this->af->get('back') || $this->af->validate() > 0) {
			return 'user_ec_review_add';
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
		// レビューデータを取得
		$o = & new Tv_Review($this->backend,
							array('review_id','review_status','review_hash'),
							array($this->af->get('review_id'),2,$this->af->get('review_hash'))
					);
		// データがあれば
		if($o->isValid()){
			// レビュー情報更新
			$values = array(
				'review_status'			=> 3,	// review_status 0:削除,1:cron待ち,2:投稿待ち,3:有効 
				'review_title' 			=> $this->af->get('review_title'),
				'review_body'  			=> $this->af->get('review_body'),
				'review_updated_time' 	=> date('Y-m-d H:i:s'),
			);
			// AppObjectにセット
			foreach($values as $k=>$v){
				$o->set($k,$v);
			}
			// 更新
			$r = $o->update();
			// 更新エラーの場合
			if(Ethna::isError($r)) return "user_ec_review_add";
		}
		
		// Viewへ返却する情報
		return 'user_ec_review_add_done';
	}
}
?>