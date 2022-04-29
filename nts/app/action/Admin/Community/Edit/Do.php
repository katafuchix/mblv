<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティ編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCommunityEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'community_id' => array(
//			'name'		=> 'コミュニティID',
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_title' => array(
//			'name'			=> 'コミュニティタイトル',
		),
		'community_category_id' => array(
//			'name'		=> 'コミュニティカテゴリ',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_category',
		),
		'community_join_condition' => array(
//			'name'			=> '参加条件と公開ﾚﾍﾞﾙ',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
//			'name'			=> 'ﾄﾋﾟｯｸ作成の権限',
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
 * @author Technovarth
 * @access public
 * @package SNSV
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
		
		// メッセージ
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_EDIT_DONE);
		
		return 'admin_community_edit_done';
	}
}
?>