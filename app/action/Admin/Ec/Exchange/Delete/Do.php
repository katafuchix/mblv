<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理代引き手数料削除実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcExchangeDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'exchange_id' => array(
			'required'		=> true,
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * 管理代引き手数料削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcExchangeDeleteDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ec_exchange_list';
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
		
		// 情報論理削除
		// 商品情報論理削除
		$o =& new Tv_Exchange($this->backend,'exchange_id',$this->af->get('exchange_id'));
		$o->set('exchange_status',0);
		$o->set('exchange_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_exchange_list';	
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_EXCHANGE_DELETE_DONE);
		
		return 'admin_ec_exchange_list';
	}
}
?>