<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告カテゴリ優先度更新アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdcategoryPriorityDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'ad_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> array(VAR_TYPE_INT),
			'required'	=> true,
		),
	);
}

/**
 * 管理広告カテゴリ優先度更新アクション実行クラス
 * 
 * 広告カテゴリ優先度を更新します
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_adcategory_list';
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
		// 広告カテゴリ編集
		$ad_category_priority_id = $this->af->get('ad_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($ad_category_priority_id as $k => $v){
			if($k){
				$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $k);
				$ac->set('ad_category_priority_id', $v);
				$r = $ac->update();
				if(Ethna::isError($r)) return 'admin_adcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_PRIORITY_DONE);
		return 'admin_adcategory_list';
	}
}
?>