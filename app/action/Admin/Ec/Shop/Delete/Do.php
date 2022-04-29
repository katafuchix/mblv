<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ショップ削除実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * 管理ショップ削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopDeleteDo extends Tv_ActionAdminOnly
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
		// ショップ情報論理削除
		$o =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		$o->set('shop_status',0);
		$o->set('shop_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_shop_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SHOP_DELETE_DONE);
		
		return 'admin_ec_shop_list';
	}
}
?>