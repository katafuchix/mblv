<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理代引き手数料追加実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcExchangeAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'exchange_type' 	=> array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'exchange_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'exchange_same_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'exchange_same_price' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_price_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_price_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_price_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_total_piece_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
		),
		'exchange_range_start' => array(
			'type'			=> array(VAR_TYPE_STRING),
			'min' 			=> 0,
		),
		'exchange_range_end' => array(
			'type'			=> array(VAR_TYPE_STRING),
			'min' 			=> 0,
		),
		'exchange_range_price' => array(
			'type'			=> array(VAR_TYPE_STRING),
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'add' => array(
		),
	);
}


/**
 * 管理代引き手数料追加実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcExchangeAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_exchange_add';
		
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_exchange_list';
		
		// 一律設定チェックONで、一律設定料金がカラの場合
		if ( ($this->af->get('exchange_same_status')) && (!$this->af->get('exchange_same_price')) ) {
			$this->ae->add(null, '', E_ADMIN_EXCHANGE_SAME_PRICE);
			return 'admin_ec_exchange_add';
		}
		// 設定名の重複確認
		$um =& $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'exchange',
			'sql_where'		=> 'exchange_name = ?',
			'sql_values'	=> array($this->af->get('exchange_name')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_EXCHANGE_NAME_ALREADY_USED);
			return 'admin_ec_exchange_add';
		}
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
		// 情報追加準備
		$o = new Tv_Exchange($this->backend, 'exchange_id', $this->af->get('exchange_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('exchange_status',1);
		$timestamp = date('Y-m-d H:i:s');
		$o->set('exchange_created_time', $timestamp);
		$o->set('exchange_updated_time', $timestamp);
		
		// 情報追加
		$r = $o->add();
		if(Ethna::isError($r)) return 'master_exchange_add';
		$exchange_id = $o->get('exchange_id');
		
		//代引き手数料設定タイプが2：金額範囲で代引き手数料を設定の場合はexchange_rangeテーブルにもinsertする
		if($this->af->get('exchange_type') == 2){
			$exchange_range_start = $this->af->get('exchange_range_start');
			$exchange_range_end   = $this->af->get('exchange_range_end');
			$exchange_range_price = $this->af->get('exchange_range_price');
			foreach($exchange_range_start as $k => $v){
				$o =& new Tv_ExchangeRange($this->backend);
				$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
				$o->set('exchange_id',$exchange_id);
				$o->set('exchange_range_start',$exchange_range_start[$k]);
				$o->set('exchange_range_end',$exchange_range_end[$k]);
				$o->set('exchange_range_price',$exchange_range_price[$k]);
				if($exchange_range_start[$k] >= $exchange_range_end[$k]) continue;
				$r = $o->add();
				
				if(Ethna::isError($r)) return 'admin_ec_exchange_add';
			}
		}
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_EXCHANGE_ADD_DONE);
		return 'admin_ec_exchange_list';
	}
}
?>