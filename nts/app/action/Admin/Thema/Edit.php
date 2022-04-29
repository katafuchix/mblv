<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理トゥイッターお題編集アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminThemaEdit extends Tv_Form_AdminThemaEditDo
{
}

/**
 * 管理トゥイッターお題編集アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminThemaEdit extends Tv_ActionAdminOnly
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
		// トゥイッターお題情報取得
		$o =& new Tv_Thema($this->backend, 'thema_id', 1);
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('thema_start_time'), 'thema_start');
		// 配信終了日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('thema_end_time'), 'thema_end');
		
		return 'admin_thema_edit';
	}
}
?>
