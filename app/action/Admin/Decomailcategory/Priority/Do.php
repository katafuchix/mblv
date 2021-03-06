<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理デコメールカテゴリ優先度更新実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminDecomailcategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'decomail_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * 管理デコメールカテゴリ優先度更新実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminDecomailcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomailcategory_list';
		
		// 優先度の重複
		$decomail_category_priority_id = $this->af->get('decomail_category_priority_id');
		if(count($decomail_category_priority_id)!=count(array_unique($decomail_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DUPLICATE);
			return 'admin_decomailcategory_list';
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
		// デコメールカテゴリ編集
		$decomail_category_priority_id = $this->af->get('decomail_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($decomail_category_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_DecomailCategory($this->backend, 'decomail_category_id', $k);
				$dc->set('decomail_category_priority_id', $v);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_decomailcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>