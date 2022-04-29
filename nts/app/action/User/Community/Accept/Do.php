<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ承認実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityAcceptDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_member_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'accept' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_BOOLEAN
		),
	);
}

/**
 * ユーザコミュニティ承認実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAcceptDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_community_accept';
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
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$this->af->get('community_member_id')
		);
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$communityMember->get('community_id')
		);
		
		if($this->af->get('accept')){
			/* 承認 */
			$communityMember->set('community_member_status', 1);
			$communityMember->update();
			
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
			
			/* minimail */
			
		}else{
			/* 拒否 */
			$communityMember->set('community_member_status', 0);
			$communityMember->update();
			
			/* minimail */
			
		}
		return 'user_community_accept';
	}
}

?>
