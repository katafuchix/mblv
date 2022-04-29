<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバター台座登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAvatarstandAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'avatar_stand_name' => array(
			'name'			=> 'アバター台座名',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_stand_image' => array(
			'name'			=> 'アバター台座画像',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_stand_base_x' => array(
			'name'			=> 'アバター台座切り出し開始X座標',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_y' => array(
			'name'			=> 'アバター台座切り出し開始Y座標',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_w' => array(
			'name'			=> 'アバター台座切り出し幅',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_h' => array(
			'name'			=> 'アバター台座切り出し高さ',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_w' => array(
			'name'			=> 'アバター台座表示幅',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_h' => array(
			'name'			=> 'アバター台座表示高さ',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * 管理アバター台座登録実行処理アクション実行クラス
 * 
 * アバター台座を登録します
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarstandAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarstand_add';
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
		// アバター台座登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_AvatarStand($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('avatar_stand_status', 1);
		// アバター画像1のアップロード
		if($this->af->get('avatar_stand_image')){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_stand_image', $um->uploadFile($this->af->get('avatar_stand_image'), 'avatar'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_avatarstand_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_ADD_DONE);
		return 'admin_avatarstand_list';
	}
}
?>