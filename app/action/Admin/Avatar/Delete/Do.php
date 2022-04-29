<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理アバター削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarDeleteDo extends Tv_ActionAdminOnly
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
		$timestamp = date('Y-m-d H:i:s');
		// avatar_idからアバター削除（物理削除しない）
		$o =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		$o->set('avatar_status', 0);
		$o->set('avatar_updated_time',$timestamp);
		$o->set('avatar_deleted_time',$timestamp);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_avatar_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_DELETE_DO);
		return 'admin_avatar_list';
	}
}
?>