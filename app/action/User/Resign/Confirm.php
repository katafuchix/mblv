<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ退会確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserResignConfirm extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * ユーザ退会確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserResignConfirm extends Tv_ActionUserOnly
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
		//退会するユーザーがコミュニティ管理人か否かで処理変更 start
		//sessionからユーザー情報取得
		$user = $this->session->get('user');
		
		//テーブル community_member より該当の条件でcommunity_idを取得する
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' community_id ',
			'sql_from'		=> ' community_member ',
			'sql_where'		=> 'user_id = ? AND community_member_status = ?',
			'sql_values'	=> array( $user['user_id'], 2 ),
		);
		$communityList = $um->dataQuery($param);
		
		// 管理しているｺﾐｭﾆﾃｨの数を格納する変数
		$myCommunityCount = 0;
		
		//結果分だけくりかえす
		//foreach($communityList[1] as $key => $item)
		foreach($communityList as $key => $item)
		{
			//取得したcommunity_idから、さらにコミュニティ名とステータスを取得
			$community =& new Tv_Community(
				$this->backend,
				'community_id',
				$item['community_id']
			);
			if( $community->get('community_status') == 1 ) $myCommunityCount++;
		}
		
		//結果件数があるなら退会させないで、ｺﾐｭﾆﾃｨ一覧へ
		if( $myCommunityCount > 0){
			$this->ae->add(null, '', E_USER_RESIGN_COMMUNITY);
			return 'user_community_list';
		}
		//退会するユーザーがコミュニティ管理人か否かで処理変更 end
		
		
		//退会処理へ
		return 'user_resign_confirm';
	}
}
?>