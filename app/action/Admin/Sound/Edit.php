<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンド編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminSoundEdit extends Tv_Form_AdminSoundEditDo
{
}

/**
 * 管理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundEdit extends Tv_ActionAdminOnly
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
		// サウンド情報取得
		$o =& new Tv_Sound($this->backend, 'sound_id', $this->af->get('sound_id'));
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('sound_start_time'), 'sound_start');
		// 配信終了日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $o->get('sound_end_time'), 'sound_end');
		
		return 'admin_sound_edit';
	}
}
?>