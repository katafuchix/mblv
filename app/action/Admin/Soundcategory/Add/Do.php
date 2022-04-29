<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンドカテゴリ登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundcategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'sound_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_file1' => array(
			'name'		=> 'サウンドカテゴリファイル1',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file2' => array(
			'name'		=> 'サウンドカテゴリファイル2',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_color' => array(
			'name'	=> 'サウンドカテゴリ色',
			'type' 	=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理サウンドカテゴリ登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_soundcategory_add';
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
		
		// サウンドカテゴリ登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_SoundCategory($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('sound_category_status', 1);
		// サウンドカテゴリファイル1のアップロード
		if($this->af->get('sound_category_file1')){
			$o->set('sound_category_file1', $um->uploadFile($this->af->get('sound_category_file1'),'sound'));
		}
		// サウンドカテゴリファイル2のアップロード
		if($this->af->get('sound_category_file2')){
			$o->set('sound_category_file2', $um->uploadFile($this->af->get('sound_category_file2'),'sound'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_soundcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_ADD_DONE);
		return 'admin_soundcategory_list';
	}
}
?>