<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバター台座削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAvatarstandDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'avatar_stand_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理アバター台座削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarstandDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		// アバター台座削除（物理削除しない
		$ac =& new Tv_AvatarStand($this->backend, 'avatar_stand_id', $this->af->get('avatar_stand_id'));
		$ac->set('avatar_stand_status', 0);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_avatarstand_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_DELETE_DONE);
		return 'admin_avatarstand_list';
	}
}
?>