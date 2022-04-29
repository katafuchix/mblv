<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ショップ優先度更新実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopPriorityDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'shop_priority_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'shop_priority_edit' => array(
		),
	);
}

/**
 * 管理ショップ優先度更新実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ec_shop_list';
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
		// デコメールカテゴリ編集
		$shop_priority_id = $this->af->get('shop_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($shop_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_Shop($this->backend, 'shop_id', $k);
				$dc->set('shop_priority_id', $v);
				$dc->set('shop_updated_time', $timestamp);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_ec_shop_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_SHOP_PRIORITY_EDIT_DONE);
		return 'admin_ec_shop_list';
	}
}
?>