<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザブラックリスト登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlacklistAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'black_list_deny_user_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'confirm' => array(
		),
		'submit' => array(
		),
		'back' => array(
		),
		
	);
}

/**
 * ユーザブラックリスト登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlacklistAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			$this->af->setApp('user_id', $this->af->get('black_list_deny_user_id'));
			return 'user_profile_view';
		}
		
		//既にBL登録済みの場合戻す
		$user = $this->session->get('user');
		$user_id = $user['user_id'];
		$bl =& new Tv_BlackList($this->backend);
		$user = $bl->searchProp(
			array('black_list_id'),
			array(
				'black_list_user_id' => $user_id,
				'black_list_deny_user_id' => $this->af->get('black_list_deny_user_id'), 
				'black_list_status' => 1
			)
		);
		if($user[0] > 0){
			$this->ae->add(null, '', E_USER_BLACKLIST_DUPLICATE);
			return 'user_error';
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
		$timestamp = date('Y-m-d H:i:s');
		
		// 更新 or 登録
		$bl =& new Tv_BlackList( $this->backend );
		$user = $this->session->get('user');
		// 解除済みのデータがあるか？
		$blList =& $bl->searchProp(
			array('black_list_id'),
			array(
				'black_list_user_id' => $user['user_id'],
				'black_list_deny_user_id' => $this->af->get('black_list_deny_user_id'),
				'black_list_status' => 0
			)
		);
		if( $blList[0] > 0 ) $id = $blList[1][0]['black_list_id'];
		// データがあれば更新
		if($id){
			// オブジェクトを更新
			$bl =& new Tv_BlackList($this->backend, 'black_list_id', $id );
			// ステータス
			$bl->set('black_list_status', 1);
			// 更新日時
			$bl->set('black_list_updated_time', $timestamp);
			// 更新
			$bl->update();
		}
		// データがなければ登録
		else{
			// オブジェクトを登録
			$bl->importForm(OBJECT_IMPORT_IGNORE_NULL);
			// 通報したユーザID
			$bl->set('black_list_user_id', $user['user_id']);
			// ステータス
			$bl->set('black_list_status', 1);
			// 作成日時
			$bl->set('black_list_created_time', $timestamp);
			// 更新日時
			$bl->set('black_list_updated_time', $timestamp);
			// 登録
			$bl->add();
		}
		return 'user_blacklist_add_done';
	}
}
?>