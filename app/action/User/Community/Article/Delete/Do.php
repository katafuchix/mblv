<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティトピック削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityArticleDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザコミュニティトピック削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityArticleDeleteDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_community_article_view';
		
		// 検証エラー
		if($this->af->validate() > 0)return 'user_community_article_delete_confirm';
		
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
		// コミュニティ記事オブジェクトを取得
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		// 論理削除
		$article->delete();
		
		// コミュニティIDをセット
		$this->af->set('community_id', $article->get('community_id'));
		
		return 'user_community_article_delete_done';
	}
}
?>