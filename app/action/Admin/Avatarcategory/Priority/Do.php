<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバターカテゴリ優先度更新実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarcategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> array(VAR_TYPE_INT),
			'required'	=> true,
		),
	);
}

/**
 * 管理アバターカテゴリ優先度更新実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarcategory_list';
		
		// 優先度の重複
		$avatar_category_priority_id = $this->af->get('avatar_category_priority_id');
		if(count($avatar_category_priority_id)!=count(array_unique($avatar_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_PRIORITY_DUPLICATE);
			return 'admin_avatarcategory_list';
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
		// アバターカテゴリ編集
		$avatar_category_priority_id = $this->af->get('avatar_category_priority_id');
		foreach($avatar_category_priority_id as $k => $v){
			if($k){
				$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $k);
				$ac->set('avatar_category_priority_id', $v);
				$r = $ac->update();
				if(Ethna::isError($r)) return 'admin_avatarcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_PRIORITY_DONE);
		return 'admin_avatarcategory_list';
	}
}
?>