<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAvatarEdit extends Tv_Form_AdminAvatarEditDo
{
}

/**
 * 管理アバター編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarEdit extends Tv_ActionAdminOnly
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
		// avatar_idからアバター情報取得
		$o =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('avatar_start_time'), 'avatar_start');
		// 配信終了日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('avatar_end_time'), 'avatar_end');
		
		return 'admin_avatar_edit';
	}
}
?>