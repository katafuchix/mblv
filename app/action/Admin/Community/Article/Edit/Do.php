<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティトピック編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminCommunityArticleEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'community_article_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_article_title' => array(
		),
		'community_article_body' => array(
		),
		'delete_image' => array(
		),
	);
}

/**
 * 管理コミュニティトピック編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminCommunityArticleEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_article_edit';
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
		// 記事編集
		$o =& new Tv_CommunityArticle($this->backend,'community_article_id',$this->af->get('community_article_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像削除
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// オーバーライド
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_community_article_edit';
		
		// フォーム値をクリアする
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_ARTICLE_EDIT_DONE);
		return 'admin_community_article_list';
	}
}
?>