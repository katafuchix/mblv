<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオカテゴリ編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'video_category_id' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'video_category_name' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_category_desc' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_category_file1' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'video_category_file1_file' => array(
			'name'			=> 'ビデオカテゴリファイル1',
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'video_category_file1_status' => array(
			'name'			=> 'ビデオカテゴリファイル1ステータス',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_category_file2' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'video_category_file2_file' => array(
			'name'			=> 'ビデオカテゴリファイル2',
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'video_category_file2_status' => array(
			'name'			=> 'ビデオカテゴリファイル2ステータス',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_category_color' => array(
			'name'			=> 'ビデオカテゴリ色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理ビデオカテゴリ編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_videocategory_edit';
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
		// ビデオカテゴリ編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_VideoCategory($this->backend, 'video_category_id', $this->af->get('video_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ビデオカテゴリファイル1のアップロード(1=編集)
		if($this->af->get('video_category_file1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_category_file1', $um->uploadFile($this->af->get('video_category_file1_file'),'video'));
		}
		// ビデオカテゴリファイル1の削除(2=削除)
		elseif($this->af->get('video_category_file1_status') == 2){
			$o->set('video_category_file1', '');
		}
		// ビデオカテゴリファイル2のアップロード(1=編集)
		if($this->af->get('video_category_file2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_category_file2', $um->uploadFile($this->af->get('video_category_file2_file'),'video'));
		}
		// ビデオカテゴリファイル2の削除(2=削除)
		elseif($this->af->get('video_category_file2_status') == 2){
			$o->set('video_category_file2', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_videocategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_EDIT_DONE);
		return 'admin_videocategory_list';
	}
}
?>