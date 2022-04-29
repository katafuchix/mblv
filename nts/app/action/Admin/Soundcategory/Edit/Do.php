<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理サウンドカテゴリ編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminSoundcategoryEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'sound_category_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'sound_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_file1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'sound_category_file1_file' => array(
			'name'		=> 'サウンドカテゴリファイル1',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file1_status' => array(
			'name'		=> 'サウンドカテゴリファイル1ステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'sound_category_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'sound_category_file2_file' => array(
			'name'		=> 'サウンドカテゴリファイル2',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file2_status' => array(
			'name'		=> 'サウンドカテゴリファイル2ステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'sound_category_color' => array(
			'name'	=> 'サウンドカテゴリ色',
			'type' 	=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理サウンドカテゴリ編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminSoundcategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_soundcategory_edit';
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
		// サウンドカテゴリ編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// サウンドカテゴリファイル1のアップロード
		if($this->af->get('sound_category_file1_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('sound_category_file1', $um->uploadFile($this->af->get('sound_category_file1_file'),'sound'));
		}elseif($this->af->get('sound_category_file1_status') == 'delete'){
			$o->set('sound_category_file1', '');
		}
		// サウンドカテゴリファイル2のアップロード
		if($this->af->get('sound_category_file2_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('sound_category_file2', $um->uploadFile($this->af->get('sound_category_file2_file'),'sound'));
		}elseif($this->af->get('sound_category_file2_status') == 'delete'){
			$o->set('sound_category_file2', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_soundcategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_EDIT_DONE);
		return 'admin_soundcategory_list';
	}
}
?>