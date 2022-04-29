<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_avatar_id_list' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'type'			=> array(VAR_TYPE_INT),
			'name'			=> 'ﾕｰｻﾞｱﾊﾞﾀｰID',
		),
	);
}

/**
 * ユーザアバター実行実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar_home';
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
		// タイムスタンプ生成
		$timestamp = date('Y-m-d H:i:s');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// ユーザアバターIDを取得する
		$user_avatar_id_list = $this->af->get('user_avatar_id_list');
		
		// アバターIDが選択されていない場合
		if(!is_array($user_avatar_id_list)){
			$this->ae->add('errors', "ｱﾊﾞﾀｰを選択してください。");
			return 'user_avatar_home';
		}
		
		foreach($user_avatar_id_list as $v){
			/* =============================================
			// ユーザアバター削除
			 ============================================= */
			$ua = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v);
			// 有効なレコードにの場合
			if($ua->isValid()){
				$ua->set('user_avatar_status', 0);
				$ua->set('user_avatar_deleted_time', $timestamp);
				$r = $ua->update();
				if(Ethna::isError($r)) return 'user_avatar_home';
			}
		}
		
		// フォーム値をクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_USER_AVATAR_DELETE_DONE);
		return 'user_avatar_home';
	}
}

?>
