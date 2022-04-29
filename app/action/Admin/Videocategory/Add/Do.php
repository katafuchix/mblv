<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオカテゴリ登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'video_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'video_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'video_category_file1' => array(
			'name'		=> 'ビデオカテゴリファイル1',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_category_file2' => array(
			'name'		=> 'ビデオカテゴリファイル2',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_category_color' => array(
			'name'	=> 'ビデオカテゴリ色',
			'type' 	=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理ビデオカテゴリ登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_videocategory_add';
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
		$um = $this->backend->getManager('Util');
		
		// ビデオカテゴリ登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_VideoCategory($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('video_category_status', 1);
		// ビデオカテゴリファイル1のアップロード
		if($this->af->get('video_category_file1')){
			$o->set('video_category_file1', $um->uploadFile($this->af->get('video_category_file1'),'video'));
		}
		// ビデオカテゴリファイル2のアップロード
		if($this->af->get('video_category_file2')){
			$o->set('video_category_file2', $um->uploadFile($this->af->get('video_category_file2'),'video'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_videocategory_list';
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_ADD_DONE);
		return 'admin_videocategory_list';
	}
}
?>