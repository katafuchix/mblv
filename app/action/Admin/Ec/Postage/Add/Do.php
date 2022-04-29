<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理送料登録アクション実行フォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_same_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'postage_same_price' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> '0',
			'max'			=> '1000000',
			'option'		=> array(1 => '全国一律料金',),
		),
		'postage_pref_1' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_2' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_3' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_4' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_5' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_6' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_7' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_8' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_9' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_10' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_11' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_12' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_13' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_14' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_15' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_16' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_17' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_18' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_19' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_20' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_21' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_22' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_23' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_24' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_25' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_26' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_27' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_28' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_29' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_30' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_31' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_32' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_33' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_34' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_35' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_36' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_37' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_38' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_39' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_40' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_41' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_42' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_43' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_44' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_45' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_46' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_47' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_48' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_pref_49' => array(
			'type'			=> VAR_TYPE_INT,
			'min'			=> '0',
			'max'			=> '1000000',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'postage_type' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'postage_total_price_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'postage_total_price_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'postage_total_price_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'postage_total_piece_set' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'postage_total_piece_value' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'postage_total_piece_set_under' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
			'min' 			=> 0,
			'max' 			=> 1000000,
		),
		'add' => array(
		),
	);
}

/**
 * 管理送料登録実行アクション実行フォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if (!$this->af->get('postage_type')){
			$this->ae->add(null, '', E_ADMIN_POSTAGE_TYPE);
			return 'admin_ec_postage_list';
		}
		
		if ($this->af->validate() > 0) return 'admin_ec_postage_add';
		
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_postage_list';
		
		// 一律設定チェックONで、一律設定料金がカラの場合
		if ( ($this->af->get('postage_same_status')) && (!$this->af->get('postage_same_price')) ) {
			$this->ae->add(null, '', E_ADMIN_POSTAGE_SAME_PRICE);
			return 'admin_ec_postage_add';
		}
		// 設定名の重複確認
		$um =& $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'postage',
			'sql_where'		=> 'postage_name = ?',
			'sql_values'	=> array($this->af->get('postage_name')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_POSTAGE_NAME_ALREADY_USED);
			return 'admin_ec_postage_add';
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
		$o = new Tv_Postage($this->backend, 'postage_id', $this->af->get('postage_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('postage_status',1);
		$timestamp = date('Y-m-d H:i:s');
		$o->set('postage_created_time', $timestamp);
		$o->set('postage_updated_time', $timestamp);
		
		// 情報追加
		$r = $o->add();
		if(Ethna::isError($r)) return 'admin_ec_postage_add';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_POSTAGE_ADD_DONE);
		return 'admin_ec_postage_list';
	}
}
?>