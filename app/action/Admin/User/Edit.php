<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ユーザ編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserEdit extends Tv_ActionForm
{
	/** @var bool バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'		=> 'ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * 管理ユーザ編集アクション実行クラス
 * 
 * ユーザー情報編集画面の出力準備
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserEdit extends Tv_ActionAdminOnly
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
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
			return 'admin_error';
		}
		$user->exportForm();
		
		
		// ユーザ誕生日
		$userBirthDate = split('-', $user->get('user_birth_date'));
		$this->af->set('user_birth_date_year', $userBirthDate[0]);
		$this->af->set('user_birth_date_month', $userBirthDate[1]);
		$this->af->set('user_birth_date_day', $userBirthDate[2]);
		
		// オプション項目の値をDBから取得
		$userProf =& new Tv_UserProf($this->backend);
		$userProfList = $userProf->searchProp(
			array('config_user_prof_id', 'user_prof_value'),
			array('user_id' => new Ethna_AppSearchObject($this->af->get('user_id'), OBJECT_CONDITION_EQ))
		);
		$userProfValue = array();
		$isChecked = array();
		foreach($userProfList[1] as $item)
		{
			$userProfValue[$item['config_user_prof_id']] = $item['user_prof_value'];
			
			// チェックボックスならisCheckをTrueにする
			$configUserProf =& new Tv_ConfigUserProf(
				$this->backend,
				array('config_user_prof_id', 'config_user_prof_type'),
				array($item['config_user_prof_id'], 5)
			);
			if($configUserProf->isValid())
			{
				$isChecked[$item['user_prof_value']] = true;
			}
		}
		$this->af->setApp('userProfValue', $userProfValue);
		$this->af->setApp('isChecked', $isChecked);
		
		return 'admin_user_edit';
	}
}
?>