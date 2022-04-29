<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBbsEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_id' => array(
			'required'	=> true,
		),
		'bbs_body' => array(
			'required'		=> true,
		),
		'bbs_hash' => array(
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
	);
}

/**
 * ユーザ伝言編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsEditDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 画像を削除
		if($this->af->get('delete_image')){
			$o =& new Tv_Bbs($this->backend, 'blog_article_id', $this->af->get('blog_article_id'));
			if($o->isValid()) $o->deleteImage();
			
			// 編集画面へ戻る
			return 'user_bbs_edit';
		}
		
		// 戻るボタン
		if($this->af->get('back')) return 'user_bbs_edit';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_bbs_edit';
		
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
		// 伝言オブジェクトを更新
		$o =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$o->update();
		
		return 'user_bbs_edit_done';
	}
}
?>