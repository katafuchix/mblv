<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティトピック登録実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityArticleAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
		),
		'community_article_title' => array(
			'required'  => true,
		),
		'community_article_body' => array(
			'required'  => true,
		),
		'add' => array(
		),
		'back' => array(
		),
		'confirm' => array(
		),
	);
}
/**
 * ユーザコミュニティトピック登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleAddDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_community_article_add';
		
		// 権限チェック
		$user = $this->session->get('user');
		$communityMemberManager =& $this->backend->getManager('CommunityMember');
		$userStatus = $communityMemberManager->getUserStatus(
			$this->af->get('community_id'),
			$user['user_id']
		);
		if( !$userStatus['can_add_topic'] ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ADD_DENIED);
			return 'user_community_view';
		}
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_community_article_add';
		
		// 二重投稿エラー
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_community_article_add';
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
		// コミュニティ記事追加
		$article =& new Tv_CommunityArticle($this->backend);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$article->add();
		
		// コミュニティ記事IDをセット
		$this->af->set('community_article_id', $article->getId());
		
		// コミュニティ記事識別子をセット
		$this->af->setApp('community_article_hash', $article->get('community_article_hash'));
		
		return 'user_community_article_add_done';
	}
}

?>
