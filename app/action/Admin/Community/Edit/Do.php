<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティ編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminCommunityEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'community_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_title' => array(
		),
		'community_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_category',
		),
		'community_join_condition' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_topic_permission',
		),
		'community_description' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'delete_image' => array(
		),
	);
}

/**
 * 管理コミュニティコメント編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminCommunityEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_edit';
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
		// オブジェクトを取得
		$o =& new Tv_Community($this->backend,'community_id',$this->af->get('community_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像削除
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// オーバーライド
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_community_edit';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_EDIT_DONE);
		return 'admin_community_list';
	}
}
?>