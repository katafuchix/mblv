<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ管理者権限譲渡実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');
class Tv_Form_UserCommunityAdminPowerGiveDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'new_admin_user_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'give' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'		=> '　いいえ　',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ユーザコミュニティ管理者権限譲渡実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAdminPowerGiveDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back')) return 'user_community_admin_member';
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
		
		//ユーザ情報をセッションから取得
		$userSession = $this->session->get('user');
		$admin_user_id = $userSession['user_id'];
		
		
		//このｺﾐｭﾆﾃｨの管理権限を、
		$community_id = $this->af->get('community_id');
		
		
		//このユーザーから、
		//echo $admin_user_id;
		
		
		//このユーザーにわたす
		$new_admin_user_id = $this->af->get('new_admin_user_id');
		
		
		//自分から自分へはｘ
		if($admin_user_id == $new_admin_user_id){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_GIVE_SELF);
			return 'user_community_admin_member';
		}
		
		
		//このcommunity_idの管理者はadmin_user_idか？
		$cm =& $this->backend->getManager('CommunityMember');
		$cm_res = $cm->getUserStatus($community_id,$admin_user_id);
		//var_dump($cm_res);
		//array(4) { ["is_member"]=>  bool(true) ["is_admin"]=>  bool(true) ["can_add_topic"]=>  bool(true) ["can_read_article"]=>  bool(true) }
		if( ($cm_res['is_member'] === true) && ($cm_res['is_admin'] === true) ){
			//管理者
		}else{
			//管理者ではない
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN);
			return 'user_community_admin_member';
		}
		
		
		//管理者admin_userのcommunity_member keyを取得
		$c =& new Tv_CommunityMember($this->backend);
		$r = $c->searchProp(
			array('community_member_id'),
			array(
				'community_id' => $community_id,
				'user_id' => $admin_user_id,
				'community_member_status' => 2,
				'community_status' => 1,
			)
		);
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_FORMER_GET);
			return 'user_community_admin_member';
		}
		$community_member_id = $r[1][0]['community_member_id'];
		
		
		//新管理者new_admin_userのcommunity_member keyを取得
		$c =& new Tv_CommunityMember($this->backend);
		$r = $c->searchProp(
			array('community_member_id'),
			array(
				'community_id' => $community_id,
				'user_id' => $new_admin_user_id,
				'community_member_status' => 1,
				'community_status' => 1,
			)
		);
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_LATER_GET);
			return 'user_community_admin_member';
		}
		$new_community_member_id = $r[1][0]['community_member_id'];
		
		
		//管理者をメンバーにadmin update
		$c =& new Tv_CommunityMember($this->backend,'community_member_id',$community_member_id);
		$c->set('community_member_status',1);
		$r = $c->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_FORMER_SET);
			return 'user_community_admin_member';
		}
		
		
		//新管理者の誕生new admin update
		$c =& new Tv_CommunityMember($this->backend,'community_member_id',$new_community_member_id);
		$c->set('community_member_status',2);
		$r = $c->update();
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_LATER_SET);
			return 'user_community_admin_member';
		}
		
		
		//コミュニティ名ゲット、セット
		$c =& new Tv_Community($this->backend,'community_id',$community_id);
		$this->af->setApp('community_title',$c->get('community_title'));
		
		$this->ae->add(null, '', I_USER_COMMUNITY_ADMIN_GIVE_DONE);
		return 'user_community_admin_power_give_done';
		
	}
}
?>