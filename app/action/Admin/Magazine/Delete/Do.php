<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メルマガ削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMagazineDeleteDo extends Tv_ActionForm
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
 * 管理メルマガ削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMagazineDeleteDo extends Tv_ActionAdminOnly
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
		// メルマガ削除（物理削除しない
		$magazineObject =& new Tv_Magazine($this->backend,'magazine_id',$this->af->get('magazine_id'));
		$magazineObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$magazineObject->set('magazine_status',0);
		// 更新
		$r = $magazineObject->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_magazine_list';
		
		$this->ae->add(null, '', I_ADMIN_MAGAZINE_DELETE_DONE);
		
		return 'admin_magazine_list';
	}
}
?>