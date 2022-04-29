<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告削除アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理広告削除アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdDeleteDo extends Tv_ActionAdminOnly
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
		// ad_idから広告削除（ad_statusを0にする。物理削除はしない）
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$a->set('ad_status', 0);
		$a->set('ad_updated_time', $timestamp);
		$a->set('ad_deleted_time', $timestamp);
		$r = $a->update();
		
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_ad_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_AD_DELETE_DONE);
		return 'admin_ad_list';
	}
}
?>