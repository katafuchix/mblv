<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティトピック閲覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityArticleView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'page'			=>array(
			'type'		=>VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * ユーザコミュニティトピック閲覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityArticleView extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		// トピック主が本会員で内場合はエラー
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		if(!$article->isValid()){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$article->get('user_id')
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		if($user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_COMMUNITY_ARTICLE_ACCESS_DENIED);
			return 'user_error';
		}
		
		return 'user_community_article_view';
	}
}

?>
