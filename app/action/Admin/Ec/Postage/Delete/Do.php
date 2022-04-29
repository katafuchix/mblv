<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理送料削除実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * 管理送料削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageDeleteDo extends Tv_ActionAdminOnly
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
		// 商品情報論理削除
		$o =& new Tv_Postage($this->backend,'postage_id',$this->af->get('postage_id'));
		$o->set('postage_status',0);
		$o->set('postage_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_postage_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_POSTAGE_DELETE_DONE);
		
		return 'admin_ec_postage_list';
	}
}
?>