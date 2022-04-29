<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザブラックリスト削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlacklistDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'black_list_deny_user_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}
/**
 * ユーザブラックリスト削除実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlacklistDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if( $this->af->get('back') ) {
			$this->af->set('user_id',$this->af->get('black_list_deny_user_id'));
			return 'user_profile_view';
		}
		if( $this->af->validate() > 0 ) {
			return  'user_blacklist_delete_confirm';
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
		$user = $this->session->get('user');		// 自分のﾕｰｻﾞｰID
		$deny_user_id = $this->af->get('black_list_deny_user_id'); // 相手のﾕｰｻﾞｰID
		
		// black_list.idを取得
		$bl =& new Tv_BlackList( $this->backend );
		$blList =& $bl->searchProp(
						array('black_list_id'), 
						array(
							'black_list_user_id' => $user['user_id'], 
							'black_list_deny_user_id' => $deny_user_id,
						)
					);
		if( $blList[0] > 0 ) $id = $blList[1][0]['black_list_id'];
		
		// black_list.statusを0に更新
		$bl =& new Tv_BlackList($this->backend, 'black_list_id', $id);
		if( $bl->isValid() ){
			$bl->set('black_list_status', 0);
			$bl->set('black_list_update_time', date('Y-m-d H:i:s'));
			$bl->set('black_list_delete_time', date('Y-m-d H:i:s'));
			$bl->update();
		}
		$this->ae->add(null, '', I_USER_BLACKLIST_DELETE_DONE);
		
		return 'user_blacklist_delete_done';
	}
}
?>