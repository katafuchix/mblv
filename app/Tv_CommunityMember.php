<?php
/**
 * Tv_CommunityMember.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * コミュニティメンバーマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CommunityMemberManager extends Ethna_AppManager
{
	/**
	 * コミュニティメンバー追加
	 * @param user_id ユーザID
	 * @param community_id コミュニティID
	 */
	function addCommunityMember($param)
	{
		// パラメタを取得する
		if(array_key_exists('user_id', $param))			$user_id		= $param['user_id'];
		if(array_key_exists('community_id', $param))	$community_id	= $param['community_id'];
		
		// 必要項目がない場合は処理を終了する
		if(!$user_id || !$community_id) return false;
		
		// 現状該当コミュニティに参加していないか確認する
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($community_id, $user_id)
		);
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
				// 削除
				case 0:
					// 旧データを消去
					$communityMember->remove();
				// メンバー
				case 1:
				// オーナー
				case 2:
					return false;
				// 申請済み
				case 3:
					return false;
				}
		}
		
		// コミュニティ情報取得
		$community =& new Tv_Community($this->backend,'community_id',$community_id);
		
		// コミュニティメンバー追加
		$communityMember =& new Tv_CommunityMember($this->backend);
		$communityMember->set('community_id', $community_id);
		$communityMember->set('user_id', $user_id);
		
		// 誰でも参加できる
		if($community->get('community_join_condition') == 1){
			// メンバー参加
			$communityMember->set('community_member_status', 1);
			$communityMember->add();
			// コミュニティ情報更新
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
		}
		// 管理人の許可が必要
		else{
			// メンバー申請
			$communityMember->set('community_member_status', 3);
			// [要検討]メッセージを送信する
			$communityMember->add();
		}
		return true;
	}
	
	// コミュニティーのメンバを退会させる（論理削除）
	function delete($communityMemberId)
	{
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$communityMemberId
		);
		$communityMember->set('community_member_status', 0);
		$communityMember->update();
	}
	
	// コミュニティ内でのユーザの情報、権限等を取得
	function getUserStatus($communityId, $userId)
	{
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
		);
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('user_id', 'community_id'),
			array($userId, $communityId)
		);
		
		if($communityMember->isValid()
			&& $communityMember->get('community_member_status') > 0
			&& $communityMember->get('community_member_status') < 3
		)
		{
			// メンバー
			$isMember = true;
			$isAdmin = ($communityMember->get('community_member_status') == 2);
			$canAddTopic = ($community->get('community_topic_permission') != 2
								|| $communityMember->get('community_member_status') == 2
			);
			$canReadArticle = true;
		}else{
			// メンバーではない
			$isMember = false;
			$isAdmin = false;
			$canAddTopic = false;
			$canReadArticle = ($community->get('community_join_condition') != 3);
		}
		
		$result = array(
			'is_member'			=> $isMember,
			'is_admin'			=> $isAdmin,
			'can_add_topic'		=> $canAddTopic,
			'can_read_article'	=> $canReadArticle,
		);
		
		return $result;
	}
	
	// コミュニティーのステータスを削除にする
	// →ちがいます。community_member_status:0はメンバーから削除です！2007/09/13
	function statusOff($communityMemberId)
	{
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$communityMemberId
		);
		$communityMember->set('community_member_status', 0);
		$communityMember->update();
	}
}

/**
 * コミュニティメンバーオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CommunityMember extends Ethna_AppObject
{
}
?>