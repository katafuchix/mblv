<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティトピック編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityArticleEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'community_article_title' => array(
			'required'  => true,
		),
		'community_article_body' => array(
			'required'  => true,
		),
		'community_article_hash' => array(
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
 * ユーザコミュニティトピック編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityArticleEditDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')){
			return 'user_community_article_edit';
		}
		
		// 検証エラー
		if($this->af->validate() > 0){
			return 'user_community_article_edit';
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
		// コミュニティトピックオブジェクトを取得
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像を削除
		if($this->af->get('delete_image')){
			$article->deleteImage();
		}
		// オーバーライド
		$article->update();
		
		// コミュニティIDをセット
		$this->af->set('community_id', $article->get('community_id'));
		
		return 'user_community_article_edit_done';
	}
}
?>