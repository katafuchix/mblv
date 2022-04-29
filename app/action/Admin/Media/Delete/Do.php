<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メディア削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMediaDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * 管理メディア削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMediaDeleteDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_media_list';
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
		// メディア削除（物理削除しない
		$o =& new Tv_Media($this->backend,'media_id',$this->af->get('media_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('media_status',0);
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_media_list';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_DELETE_DONE);
		
		return 'admin_media_list';
	}
}
?>