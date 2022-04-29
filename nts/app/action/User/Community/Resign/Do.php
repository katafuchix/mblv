<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ退会実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityResignDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'back' => array(
			'name'		=> '　いいえ　',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'resign' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		
	);
}

/**
 * ユーザコミュニティ退会実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityResignDo extends Tv_ActionUserOnly
{
	/**
	 * 認証
	 * 
	 * @access public
	 */
	function authenticate()
	{
		parent::authenticate();
		
		if($this->af->get('back')) return 'user_community_view';
		
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array(
				$this->af->get('community_id'),
				$user['user_id'],
			)
		);
		if($communityMember->isValid())
		{
			switch($communityMember->get('community_member_status'))
			{
			case 1:	// メンバー
				return null;
				
			case 2:	// オーナー
				$this->ae->add(null, '', E_USER_COMMUNITY_RESIGN_ADMIN);
				return 'user_error';
			}
		}
		
		$this->ae->add(null, '', E_USER_ACCESS_DENIED);
		return 'user_error';
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_community_resign_confirm';
		if($this->af->get('back')) return 'user_community_view';
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
		
		/*$communityManager =& $this->backend->getManager('User');

		if($communityManager->resign())
			return 'user_community_resign_done';
		else
			return 'user_community_resign_confirm';	// 要修正:エラー発生時の遷移先*/
			
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		if($communityMember->isValid())
		{
			$communityMember->set('community_member_status', 0);
			$communityMember->update();
			
			$community =& new Tv_Community(
				$this->backend,
				'community_id',
				$this->af->get('community_id')
			);
			if($community->isValid())
			{
				$community->set(
					'community_member_num',
					$community->get('community_member_num') - 1
				);
				$community->update();
			}
		}
		
		return 'user_community_resign_done';
	}
}

?>
