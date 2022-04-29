<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告カテゴリ登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdcategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '広告カテゴリ名',
		),
		'ad_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '広告カテゴリ説明',
		),
	);
}

/**
 * 管理広告カテゴリ登録アクション実行クラス
 * 
 * 広告カテゴリを登録します
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_adcategory_add';
		
		// 2重POST対応
		if (Ethna_Util::isDuplicatePost()) return 'admin_adcategory_list';
		
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
		// 広告カテゴリ登録
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_AdCategory($this->backend);
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$ac->set('ad_category_status', 1);

		// 登録
		$r = $ac->add();
		//登録エラーの場合
		if(Ethna::isError($r)) return 'admin_adcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_ADD_DONE);
		return 'admin_adcategory_list';
	}
}
?>