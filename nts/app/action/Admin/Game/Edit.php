<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ゲーム編集アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminGameEdit extends Tv_Form_AdminGameEditDo
{
}

/**
 * 管理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGameEdit extends Tv_ActionAdminOnly
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
		// ゲーム情報取得
		$o =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('game_start_time'), 'game_start');
		// 配信終了日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('game_end_time'), 'game_end');
		
		return 'admin_game_edit';
	}
}
?>