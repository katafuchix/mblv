<?php
/**
 * Do.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ退会実行アクションフォーム
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
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
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunityResignDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 「いいえ」ボタンが押されたときはコミュニティに戻る
		if($this->af->get('back'))
		{
			return 'user_community_view';
		}
		
		// バリデート
		if($this->af->validate() > 0)
		{
			return 'user_community_resign_confirm';
		}
		
		// Sessionからユーザ情報を取得
		$user = $this->session->get('user');
		
		// ユーザがコミュニティに参加しているかを調べる
		$community_member =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array(
				$this->af->get('community_id'),
				$user['user_id'],
			)
		);
		if($community_member->isValid())
		{
			switch($community_member->get('community_member_status'))
			{
			case 1:	// メンバー
				// 退会できる
				return null;
				
			case 2:	// オーナー
				// 管理権限を譲渡しないと退会できない
				$this->ae->add(null, '', E_USER_COMMUNITY_RESIGN_ADMIN);
				return 'user_community_resign_error';
			}
		}
		
		// コミュニティに参加していない場合はエラー
		$this->ae->add(null, '', E_USER_ACCESS_DENIED);
		return 'user_error';
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// Sessionからユーザ情報を取得
		$user = $this->session->get('user');
		
		// コミュニティメンバを取得
		$community_member =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'user_id'),
			array($this->af->get('community_id'), $user['user_id'])
		);
		if($community_member->isValid())
		{
			// コミュニティメンバの状態を「0:メンバーから削除」にして更新する
			$community_member->set('community_member_status', 0);
			$community_member->update();
			
			// コミュニティのメンバ数を減らす
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