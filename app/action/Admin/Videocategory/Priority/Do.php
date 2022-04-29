<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオカテゴリ優先度更新実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryPriorityDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'video_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * 管理ビデオカテゴリ優先度更新実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_videocategory_list';
		
		// 優先度の重複
		$video_category_priority_id = $this->af->get('video_category_priority_id');
		if(count($video_category_priority_id)!=count(array_unique($video_category_priority_id))){
			$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_PRIORITY_DUPLICATE);
			return 'admin_videocategory_list';
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
		// サウンドカテゴリ編集
		$video_category_priority_id = $this->af->get('video_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($video_category_priority_id as $k => $v){
			if($k){
				$gc =& new Tv_VideoCategory($this->backend, 'video_category_id', $k);
				$gc->set('video_category_priority_id', $v);
				$r = $gc->update();
				if(Ethna::isError($r)) return 'admin_videocategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_PRIORITY_DONE);
		return 'admin_videocategory_list';
	}
}
?>