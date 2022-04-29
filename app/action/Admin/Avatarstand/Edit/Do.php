<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター台座編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarstandEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_stand_id' => array(
			'name'			=> 'アバター台座ID',
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'avatar_stand_name' => array(
			'name'			=> 'アバター台座名',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'avatar_stand_image' => array(
			'name'			=> 'アバター台座画像',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_stand_image_file' => array(
			'name'			=> 'アバター台座画像',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_stand_image_status' => array(
			'name'			=> 'アバター台座画像ステータス',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
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
 * 管理アバター台座編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarstandEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarstand_edit';
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
		// avatar_stand_idからアバター台座編集
		$o =& new Tv_AvatarStand($this->backend, 'avatar_stand_id', $this->af->get('avatar_stand_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// アバター画像1のアップロード(1=編集)
		if($this->af->get('avatar_stand_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_stand_image', $um->uploadFile($this->af->get('avatar_stand_image_file'), 'avatar'));
		}
		// アバター画像1の削除(2=削除)
		elseif($this->af->get('avatar_stand_image_status') == 2){
			$o->set('avatar_stand_image', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_avatarstand_edit';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_EDIT_DONE);
		return 'admin_avatarstand_list';
	}
}
?>