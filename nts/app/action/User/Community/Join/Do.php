<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ参加実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityJoinDo extends Tv_ActionUserOnly
{
	/**
	 * 認証
	 * 
	 * @access public
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
			
			/*/メールアドレス,ユーザーIDを取得
			$address =& new Tv_User(
				$this->backend,
				array('user_mailaddress','user_id'),
				array($this->backend->get('user_mailaddress'),$this->backend->get('user_id'))
			);
			//管理人のメールアドレスに照合
			$address = $communityMember->get('user_id');
			
			// メール配信
			$mail_to = array("{$address}");
			foreach($mail_to as $v){
				$title = '=?ISO-2022-JP?B?'.base64_encode(mb_convert_encoding(コミュニティ参加認証,"JIS","EUC-JP")).'?=';;
				$body = mb_convert_encoding("[URL]\n".http://www/varth.jp/public_user
											."\n[本文]\n".あなたのコミュニティに参加希望の人がいます。上記URLからアクセスして認証して下さい.
											$this->config->get('base_url')."_blog/","JIS","EUC-JP");
				mail($v,$title,$body,"From: info@varth.jp");
			}*/
			
			$communityMember->add();
			
			return 'user_community_join_sent';
		}
	}
}

?>
