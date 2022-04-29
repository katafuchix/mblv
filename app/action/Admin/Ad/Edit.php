<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAdEdit extends Tv_Form_AdminAdEditDo
{
}

/**
 * 管理広告編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdEdit extends Tv_ActionAdminOnly
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
		// ad_idから広告情報取得
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$a->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $a->get('ad_start_time'), 'ad_start');
		// 配信終了日時の分解＆セット
		$this->af = $um->setSepTime($this->af, $a->get('ad_end_time'), 'ad_end');
		
		return 'admin_ad_edit';
	}
}
?>