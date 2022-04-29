<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ退会実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserResignDo extends Tv_ActionForm
{
	var $form = array(
		'user_password' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'back' => array(
			'name'		=> '戻る',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'resign' => array(
			'name'		=> '退会',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ユーザ退会実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserResignDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back')) return 'user_home';
		if($this->af->validate() > 0) return  'user_resign_confirm';
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
		$sess = $this->session->get('user');
		
		//テーブル community_member より該当の条件でcommunity_idを取得する
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' community_id ',
			'sql_from'		=> ' community_member ',
			'sql_where'		=> 'user_id = ? AND community_member_status = ?',
			'sql_values'	=> array( $user['user_id'], 2 ),
		);
		$communityList = $um->dataQuery($param);
		
		// 管理しているコミュニティの数を格納する変数
		$myCommunityCount = 0;
		
		//結果分だけくりかえす
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
		
		//結果件数があるなら退会させないで、コミュニティ一覧へ
		if( $myCommunityCount > 0){
			$this->ae->add(null, '', E_USER_RESIGN_COMMUNITY);
			return 'user_community_list';
		}
		//退会するユーザーがコミュニティ管理人か否かで処理変更 end
		
		// ユーザ情報を取得
		$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		/* =============================================
		// ユーザ履歴に登録
		 ============================================= */
		$timestamp = date('Y-m-d H:i:s');
		$uh = new Tv_UserHist($this->backend);
		$uh->set('user_id', $user->get('user_id'));
		$uh->set('user_mailaddress', $user->get('user_mailaddress'));
		$uh->set('user_status', 3);
		$uh->set('user_hist_created_time', $timestamp);
		$uh->add();
		
		// 会員数増減レポート
		$an = $this->backend->getManager('Analytics');
		$param = array(
			'pre_regist'	=> false,
			'regist'		=> false,
			'invite'		=> false,
			'media'			=> false,
			'resign'		=> true,
		);
		$an->addAnalytics($param);
		
		//ユーザーの退会処理
		$userManager =& $this->backend->getManager('User');
		if($userManager->resign($this->af->get('user_password'))){
			return 'user_resign_done';
		}else{
			return 'user_resign_confirm';	// 要修正:エラー発生時の遷移先
		}
	}
}
?>