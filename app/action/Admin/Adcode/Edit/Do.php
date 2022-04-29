<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告コード編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdcodeEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_code_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '広告コードID',
		),
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
 * 管理広告コード編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcodeEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_adcode_edit';
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
		// パラメタ重複確認
		$ac =& new Tv_AdCode($this->backend, 'ad_code_id', $this->af->get('ad_code_id'));
		// 過去の自分のパラメタと今回の自分のパラメタが異なる場合のみ確認処理を行う
		if($this->af->get('ad_code_param') != $ac->get('ad_code_param')){
			$ac =& new Tv_AdCode($this->backend);
			$result = $ac->searchProp(
				array('ad_code_id'),
				array('ad_code_status' => 1, 'ad_code_param' => new Ethna_AppSearchObject($this->af->get('ad_code_param'), OBJECT_CONDITION_EQ)),
				array('ad_code_id' => OBJECT_SORT_DESC)
			);
			if($result[0] > 0){
				$this->ae->add(null, '', E_ADMIN_AD_CODE_DUPLICATE);
				return 'admin_adcode_edit';
			}
		}
		// ad_code_idから広告コード編集
		$ac =& new Tv_AdCode($this->backend, 'ad_code_id', $this->af->get('ad_code_id'));
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_adcode_edit';
		
		$this->ae->add(null, '', I_ADMIN_AD_CODE_EDIT_DONE);
		return 'admin_adcode_list';
	}
}
?>