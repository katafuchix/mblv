<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告カテゴリ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdcategoryEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_category_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'ad_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * 管理広告カテゴリ編集アクション実行クラス
 * 
 * 広告カテゴリを更新します
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcategoryEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_adcategory_edit';
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
		// ad_category_idから広告カテゴリ編集
		$timestamp = date('Y-m-d H:i:s');
		$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $this->af->get('ad_category_id'));
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_adcategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_EDIT_DONE);
		return 'admin_adcategory_list';
	}
}
?>