<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メルマガ強制終了実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMagazineStopDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'magazine_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理メルマガ強制終了実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMagazineStopDo extends Tv_ActionAdminOnly
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
		// メルマガ強制終了
		$o =& new Tv_Magazine($this->backend,'magazine_id',$this->af->get('magazine_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('magazine_status',4);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_magazine_list';
		
		// ロックファイルの生成
		$ctl = $this->backend->getController();
		$tmp_path = $ctl->getDirectory('tmp');
		$lock_path = "{$tmp_path}/.magazine" . $this->af->get('magazine_id');
		@touch($lock_path);
		@chmod($lock_path, 0777);
		
		$this->ae->add(null, '', I_ADMIN_MAGAZINE_STOP_DONE);
		return 'admin_magazine_list';
	}
}
?>