<?php
/**
 * Tv_BlackList.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ブラックリストマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlackListManager extends Ethna_AppManager
{
	/**
	 * ブラックリストチェック
	 * 
	 * @access public
	 * @param 
	 * 	アクセス禁止にする場面
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーのＴＯＰページは閲覧できる。
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーの伝言板の書きこみを不可能にする。
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーの紹介文を書く/編集できないようにする。
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーへの友達申請を不可能にする。 
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーへのミニメール送信を不可能にする。 
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーの日記の閲覧および書きこみを不可能にする。 
	 * ・ブラックリストに登録されたユーザーは  ブラックリストに登録したユーザーの主催コミュニティへの参加を不可能にする。 
	 */
	 function check(){
		// アクション名取得して、このアクションはブラックリストチェックするのか判断
		foreach($this->backend->controller->action as $key => $value) {
			$action_class_name = $this->backend->controller->action[$key]['class_name'];
		}
		// ブラックリスト者からのアクセスを禁止するアクションクラス名配列
		$prohibition_action_class_name_array = array(
			'Tv_Action_UserFriendApply',// 友達申請
			'Tv_Action_UserMessageSend',// メッセージ送信
			'Tv_Action_UserBlogCommentAddConfirm',// 日記コメント投稿確認
			'Tv_Action_UserCommunityJoinDo',// コミュニティ参加
			//'Tv_Action_UserProfileView',// プロフィール閲覧
			'Tv_Action_UserBbsAddConfirm',// 伝言板投稿確認
			'Tv_Action_UserBbsEditConfirm',// 伝言板編集確認
			'Tv_Action_UserBlogArticleView',// 日記閲覧
			'Tv_Form_UserFriendIntroductionEditConfirm',//紹介文編集確認
		);
		// ブラックリストの対象のアクションの場合以下処理を実行する
		if(in_array ( $action_class_name, $prohibition_action_class_name_array)){
			// 相手（アクセスされる側）のuser_id取得（アクションによって取得するkeyが違う
			foreach($_REQUEST as $k => $v){
				// 日記コメント投稿確認
				if($action_class_name == 'Tv_Action_UserBlogCommentAddConfirm'){
					if($k == 'user_id') $other_user_id = $v;
				}
				// コミュニティ参加
				// 対象者が管理人のコミュニティへの参加
				elseif($action_class_name == 'Tv_Action_UserCommunityJoinDo'){
					if($k == 'community_id') $community_id = $v;
				}
				// 日記閲覧
				elseif($action_class_name == 'Tv_Action_UserBlogArticleView'){
					if($k == 'blog_article_id') $blog_article_id = $v;
				}
				// その他
				else{
					if($k == 'to_user_id') $other_user_id = $v;
				}
			}
			//対象者が管理人のコミュニティへの参加
			// 相手（アクセスされる側）のuser_id取得（上で取得したcommunity_idだけではuser_idは不明なのでここでuser_id取得
			if($action_class_name == 'Tv_Action_UserCommunityJoinDo'){
				$sql = 	'select user_id from community_member where community_id = ' . $community_id . 
						' and community_member_status = 2 ';
				$db = $this->backend->getDB();
				$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
				// エラーでない場合
				if(!Ethna::isError($rows)){
					if($rows[0]['user_id']){
						$other_user_id = $rows[0]['user_id'];
					}
				}
			}
			//対象者が日記を閲覧
			// 相手（アクセスされる側）のuser_id取得（上で取得したblog_article_idだけではuser_idは不明なのでここでuser_id取得
			if($action_class_name == 'Tv_Action_UserBlogArticleView'){
				$sql = 	'select user_id from blog_article where blog_article_id = ' . $blog_article_id ; 
				$db = $this->backend->getDB();
				$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
				// エラーでない場合
				if(!Ethna::isError($rows)){
					if($rows[0]['user_id']){
						$other_user_id = $rows[0]['user_id'];
					}
				}
			}
			// 相手（アクセスされる側）のuser_id取得
			if($action_class_name == 'Tv_Action_UserProfileView'){//相手のプロフィール閲覧
				$other_user_id = $_REQUEST['user_id'];
			}
			// 自分（アクセスする側）のuser_id取得
			$u = $this->session->get('user');
			$my_user_id = $u['user_id'];
			// 相手（アクセスされる側）が、自分（アクセスする側）を、ブラックリスト登録しているか判断
			$db = $this->backend->getDB();
			$sql = 	'select count(black_list_id)as cnt from black_list where black_list_user_id = '.$other_user_id.
					' and black_list_deny_user_id = '.$my_user_id.' and black_list_status = 1 ';
			$rows = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
			// エラーでない場合
			if(!Ethna::isError($rows)){
				// ブラックリスト登録されている場合
				if($rows[0]['cnt'] > 0){
					return true;
				}
			}
		}
		return false;
	 }
}

/**
 * ブラックリストオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlackList extends Ethna_AppObject
{
}
?>