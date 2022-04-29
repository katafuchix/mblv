<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ参加実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityJoinDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザコミュニティ参加実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityJoinDo extends Tv_ActionUserOnly
{
	/**
	 * 認証
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		parent::authenticate();
		
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
			case 0:	// 削除
				// 旧データを消去
				$communityMember->remove();
				return null;
				
			case 1:	// メンバー
			case 2:	// オーナー
				$this->ae->add(null, '', E_USER_COMMUNITY_DUPLICATE);
				return 'user_error';
				
			case 3:	// 申請済み
				$this->ae->add(null, '', E_USER_COMMUNITY_APPLIED);
				return 'user_error';
				
			}
		}
		
		return null;
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_home';
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
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember($this->backend);
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		
		$communityMember->set('community_id', $this->af->get('community_id'));
		$communityMember->set('user_id', $user['user_id']);
		
		if($community->get('community_join_condition') == 1){
			// 誰でも参加できる
			$communityMember->set('community_member_status', 1);
			$communityMember->add();
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
			
			return 'user_community_join_done';
		}else{
			// 管理人の許可が必要
			$communityMember->set('community_member_status', 3);
			
			// 管理人情報
			$communityAdmin  =& new Tv_CommunityMember(
				$this->backend,
				array('community_id','community_member_status'),
				array($this->af->get('community_id'),2)
			);
			
			//メールアドレス,ユーザーIDを取得
			$u =& new Tv_User(
				$this->backend,
				'user_id',
				$communityAdmin->get('user_id')
			);
			
			$ms = new Tv_Mail($this->backend);
			// パラメタを生成
			$value = array (
					'from_user_nickname'	=> $user['user_nickname'],
					'to_user_nickname'	=> $user['user_nickname'],
			);
			// メール送信
			$ms->sendOne($u->get('user_mailaddress') , 'user_community_join' , $value );
			
			$communityMember->add();
			
			return 'user_community_join_sent';
		}
	}
}
?>