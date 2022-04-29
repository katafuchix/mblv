<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティトピック削除確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityArticleDeleteConfirm extends Tv_Form_UserCommunityArticleDeleteDo
{
}

/**
 * ユーザコミュニティトピック削除確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// コミュニティ記事オブジェクトを取得
		$article =& new Tv_CommunityArticle( &$this->backend, 'community_article_id', $this->af->get('community_article_id') );
		
		// 有効判定エラー
		if( !$article->isValid() || $article->get('community_article_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_NOT_FOUND);
			return 'user_error';
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
		return 'user_community_article_delete_confirm';
	}
}

?>
