<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザプロフィール編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserProfileEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * ユーザプロフィール編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserProfileEdit extends Tv_ActionUserOnly
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
		// セッション情報を取得する
		$sess = $this->session->get('user');
		// ユーザ情報を取得する
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		if(!$user->isValid()) return 'user_home';
		
		$user->exportForm();
		
		// 生年月日をセットする
		$userBirthDate = split('-', $user->get('user_birth_date'));
		$this->af->set('user_birth_date_year', $userBirthDate[0]);
		$this->af->set('user_birth_date_month', $userBirthDate[1]);
		$this->af->set('user_birth_date_day', $userBirthDate[2]);
		
		// オプション項目の値をDBから取得
		$userProf =& new Tv_UserProf($this->backend);
		$userProfList = $userProf->searchProp(
			array('config_user_prof_id', 'user_prof_value'),
			array('user_id' => new Ethna_AppSearchObject($sess['user_id'], OBJECT_CONDITION_EQ))
		);
		
		// オプション項目の値をフォームの種類ごとに$formにセット
		$userProfText = array();
		$userProfTextarea = array();
		$userProfSelect = array();
		$userProfCheckbox = array();
		$userProfRadio = array();
		foreach($userProfList[1] as $item)
		{
			$configUserProf =& new Tv_ConfigUserProf(
				$this->backend,
				array('config_user_prof_id'),
				array($item['config_user_prof_id'])
			);
			if($configUserProf->isValid())
			{
				switch($configUserProf->get('config_user_prof_type'))
				{
				case 1: // テキスト
					$userProfText[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 2: // テキストエリア
					$userProfTextarea[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 3: // セレクト
					$userProfSelect[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 4: // ラジオ
					$userProfRadio[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 5: // チェック
					$userProfCheckbox[$item['user_prof_value']] = true;
					break;
				}
			}
		}
		$this->af->set('user_prof_text', $userProfText);
		$this->af->set('user_prof_textarea', $userProfTextarea);
		$this->af->set('user_prof_select', $userProfSelect);
		$this->af->set('user_prof_radio', $userProfRadio);
		$this->af->set('user_prof_checkbox', $userProfCheckbox);
		
		return 'user_profile_edit';
	}
}

?>
