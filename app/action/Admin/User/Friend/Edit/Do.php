<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ユーザ友達状態編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserFriendEditDo extends Tv_ActionForm
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
		'friend_status' => array(
			'name'		=> '友達状態',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'option'	=> array(
				//1 => array('name' => '申請中'),
				2 => '友達',
				3 => '友達ではない',
			),
			'min'		=> 2,
			'max'		=> 3,
		),
		'update' => array(
			'name'		=> '実行',
		),
	);
}

/**
 * 管理ユーザ友達状態編集実行クラス
 * 
 * ユーザ友達状態編集画面の出力準備
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserFriendEditDo extends Tv_ActionAdminOnly
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
			return 'admin_user_friend_list';
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
			$this->ae->add(null, '友達を選択して下さい');
			return 'admin_user_friend_list';
		}
		foreach($this->af->get('check') as $userId)
		{
			$friend =& new Tv_Friend(
				$this->backend,
				array('from_user_id', 'to_user_id'),
				array($this->af->get('user_id'), $userId)
			);
			$friendReverse =& new Tv_Friend(
				$this->backend,
				array('from_user_id', 'to_user_id'),
				array($userId, $this->af->get('user_id'))
			);
			
			if(!$friend->isValid()){
				$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
				continue;
			}elseif($friend->get('friend_status') == 1){
				$this->ae->add(null, '', E_ADMIN_USER_FRIEND_EDIT_APPLYING);
				continue;
			}elseif(!$friendReverse->isValid()){
				$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
				continue;
			}
			$friend->set(
				'friend_status',
				$this->af->get('friend_status')
			);
			$r = $friend->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
			$friendReverse->set(
				'friend_status',
				$this->af->get('friend_status')
			);
			$r = $friendReverse->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
		}
		//$this->ae->add(null, '', I_ADMIN_USER_FRIEND_EDIT_DONE);
		return 'admin_user_friend_list';
	}
}
?>