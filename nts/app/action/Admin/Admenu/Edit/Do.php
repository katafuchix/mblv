<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告メニュー編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdmenuEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'index' => array(
			'name'			=> 'トップページ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'home' => array(
			'name'			=> 'マイページ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_add_done' => array(
			'name'			=> '日記投稿完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_edit_done' => array(
			'name'			=> '日記編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_article_delete_done' => array(
			'name'			=> '日記削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_add_done' => array(
			'name'			=> '日記コメント投稿完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_edit_done' => array(
			'name'			=> '日記コメント編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'blog_comment_delete_done' => array(
			'name'			=> '日記コメント削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_add_done' => array(
			'name'			=> 'コミュニティ作成完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_edit_done' => array(
			'name'			=> 'コミュニティ編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_delete_done' => array(
			'name'			=> 'コミュニティ削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_add_done' => array(
			'name'			=> 'コミュニティトピック投稿完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_edit_done' => array(
			'name'			=> 'コミュニティトピック編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_article_delete_done' => array(
			'name'			=> 'コミュニティトピック削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_add_done' => array(
			'name'			=> 'コミュニティコメント投稿完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_edit_done' => array(
			'name'			=> 'コミュニティコメント編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'community_comment_delete_done' => array(
			'name'			=> 'コミュニティコメント削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_add_done' => array(
			'name'			=> '伝言板作成完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_edit_done' => array(
			'name'			=> '伝言板編集完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'bbs_delete_done' => array(
			'name'			=> '伝言板削除完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'message_send_done' => array(
			'name'			=> 'ミニメール送信完了画面',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'decomail' => array(
			'name'			=> 'デコメールTOP',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理広告メニュー編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdmenuEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->Validate() > 0) return 'admin_admenu_edit';
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
		// オブジェクト更新
		$o =& new Tv_Admenu($this->backend,'ad_menu_id',1);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// 更新
 		$r = $o->update();
 		// 更新エラーの場合
 		if(Ethna::isError($r))return 'admin_admenu_edit';
		
		$this->ae->add("errors","広告メニュー編集が完了しました");
		return 'admin_admenu_edit';
	}
}
?>