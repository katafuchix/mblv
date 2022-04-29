<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告コード登録アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdcodeAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'ad_code_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '広告コード名',
		),
		'ad_code_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '広告コードパラメタ',
		),
		'ad_code_send_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'ユーザリダイレクト時付与認証パラメタ',
		),
		'ad_code_uaid_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'ポイントバック時取得認証パラメタ',
		),
		'ad_code_status_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'ポイントバック時取得ステータス部分パラメタ',
		),
		'ad_code_status_param_receive' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'ポイントバック時取得承認ステータス',
		),
		'ad_code_price_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'ポイントバック時取得価格部分パラメタ',
		),
	);
}

/**
 * 管理広告コード登録アクション実行クラス
 *
 * 広告コードを登録します
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcodeAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_adcode_add';
		
		// 2重POST対応
		if (Ethna_Util::isDuplicatePost()) return 'admin_adcode_list';
		
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
		// 広告コード登録
		$ac =& new Tv_AdCode($this->backend);
		// パラメタ重複確認
		$result = $ac->searchProp(
			array('ad_code_id'),
				array('ad_code_status' => 1, 'ad_code_param' => new Ethna_AppSearchObject($this->af->get('ad_code_param'), OBJECT_CONDITION_EQ)),
			array('ad_code_id' => OBJECT_SORT_DESC)
		);
		if($result[0] > 0){
			$this->ae->add(null, '', E_ADMIN_AD_CODE_DUPLICATE);
			return 'admin_adcode_add';
		}
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$ac->set('ad_code_status', 1);
		// 登録
		$r = $ac->add();
		//登録エラーの場合
		if(Ethna::isError($r)) return 'admin_adcode_list';
		
		$this->ae->add(null, '', I_ADMIN_AD_CODE_ADD_DONE);
		return 'admin_adcode_list';
	}
}
?>