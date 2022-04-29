<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ファイル削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminFileRemoveDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'file_id' => array(
			'name'	  => 'ファイル',
			'required'  => true,
			'form_type' => FORM_TYPE_CHECKBOX,
			'type'	  => array(VAR_TYPE_INT),
		),
		'confirm' => array(
			'name'	  => '選択したファイルを削除',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'back' => array(
			'name'	  => 'いいえ',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'remove' => array(
			'name'	  => 'はい',
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		// 遷移元ビュー名(削除確認画面で「いいえ」で戻る先)
		'prev_view_name' => array(
			'name'	  => '遷移元ビュー名',
			'form_type' => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
		// 記事編集画面に戻れるように
		'blog_article_id' => array( 
			'form_type' => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_INT,
		),
		// 以下ファイル検索用項目
		'user_id' => array(
			'name'	  => '所有ユーザID',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_mime_type' => array(
			'name'	  => 'MIMEタイプ',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_size_max' => array(
			'name'	  => 'ファイルサイズ(最大)',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_size_min' => array(
			'name'	  => 'ファイルサイズ(最小)',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_year' => array(
			'name'	  => 'アップロード日時（年）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_month' => array(
			'name'	  => 'アップロード日時（月）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_max_day' => array(
			'name'	  => 'アップロード日時（日）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_year' => array(
			'name'	  => 'アップロード日時（年）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_month' => array(
			'name'	  => 'アップロード日時（月）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_upload_time_min_day' => array(
			'name'	  => 'アップロード日時（日）',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
		),
		'file_status' => array(
			'name'	  => '状態',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array(
				1 => '有効',
				0 => '削除済み',
				2 => '管理人によって削除済み',
			)
		),
		'sort_key' => array(
			'name'	  => 'ソートに使用するキー',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('所有ユーザID', 'MIMEタイプ', 'ファイルサイズ', 'アップロード日時', '状態'),
		),
		'sort_order' => array(
			'name'	  => 'ソート順',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('昇順', '降順'),
		),
	);
}

/**
 * 管理ファイル削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFileRemoveDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// backもしくは、検証エラーの場合
		if($this->af->get('back') != '' || $this->af->validate() > 0) {
			// prev_view_nameの場合
			if($this->af->get('prev_view_name') != ''){
				return $this->af->get('prev_view_name');
			}else{
				return 'admin_file_search_result';
			}
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
		//ファイル削除
		$im =& $this->backend->getManager('Image');
		foreach($this->af->get('file_id') as $fileId) {
			$im->remove($fileId, 2);
		}
		return 'admin_file_remove_done';
	}
}
?>