<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once('action/User/Community/Base/AdminOnly.php');
class Tv_Form_UserCommunityEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'community_title' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			'type'			=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
		),
		'community_description' => array(
			'required'		=> true,
			'form_type'	 	=> FORM_TYPE_TEXTAREA,
			'type'	  		=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 1000,
		),
		'community_category_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'	  		=> VAR_TYPE_INT,
			'option'			=> 'Util,community_category',
		),
		'community_join_condition' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'			=> VAR_TYPE_INT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'	  		=> VAR_TYPE_INT,
			'option'			=> 'Util,community_topic_permission',
		),
		'community_hash' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'edit_confirm' => array(
		),
		'update' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザコミュニティ編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityEditDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン
		if($this->af->get('back')) return 'user_community_edit';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_community_edit';
		
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
		// コミュニティオブジェクトを取得する
		$community =& new Tv_Community(
			$this->backend,
			array('community_id', 'community_status'),
			array($this->af->get('community_id'), 1)
		);
		// 無効な場合はエラー
		if(!$community->isValid()) return 'user_home';
		
		$community->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像を削除
		if($this->af->get('delete_image')){
			$community->deleteImage();
		}
		// オーバーライド
		$community->update();
		
		return 'user_community_edit_done';
	}
}
?>