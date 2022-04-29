<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理ユーザ参加コミュニティメンバー状態編集アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminUserCommunityEditDo extends Tv_ActionForm
{
	/** @var bool バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'required'	=> true,
		),
		'check' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'type'		=> array(VAR_TYPE_INT),
		),
		'community_member_status' => array(
			'name'		=> 'メンバー状態',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'option'	=> array(
				0 => 'メンバーから削除',
				1 => 'メンバー',
				// 2 => '管理人',
				3 => '管理人承認待ち',
			),
		),
		'update' => array(),
	);
}

/**
 * 管理ユーザ参加コミュニティメンバー状態編集実行クラス
 * 
 * ユーザー情報編集画面の出力準備
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminUserCommunityEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'admin_user_community_list';
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
		// IDがチェックされたかどうか確認を行う
		if(!is_array($this->af->get('check'))){
			$this->ae->add(null, 'コミュニティを選択して下さい');
			return 'admin_user_community_list';
		}
		
		foreach($this->af->get('check') as $communityId)
		{
			$communityMember =& new Tv_CommunityMember(
				$this->backend,
				array('user_id', 'community_id'),
				array($this->af->get('user_id'), $communityId)
			);
			
			if(!$communityMember->isValid()){
				$this->ae->add(null, 'コミュニティIDが正しくありません');
				continue;
			}
			if($communityMember->get('community_member_status') == 2){
				$this->ae->add(null, '', E_ADMIN_USER_COMMUNITY_EDIT_ADMIN);
				continue;
			}
			$communityMember->set(
				'community_member_status',
				$this->af->get('community_member_status')
			);
			$r = $communityMember->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
		}
		//$this->ae->add(null, '', I_ADMIN_USER_COMMUNITY_EDIT_DONE);
		return 'admin_user_community_list';
	}
}
?>