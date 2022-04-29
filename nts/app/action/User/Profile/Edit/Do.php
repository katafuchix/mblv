<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザプロフィール変更実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserProfileEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
		// napatownではnicknameの変更はしない
		'user_nickname' => array(
			'form_type' => FORM_TYPE_HIDDEN,
			'required' => false,
			'ngword' => true,
		),
		
		'user_birth_date_year' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 4,
			'max'				=> 4,
			'min_error'			=> '{form}を数字4文字で入力してください',
			'max_error'			=> '{form}を数字4文字で入力してください',
		),
		'user_birth_date_month' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}を数字1〜2文字で入力してください',
			'max_error'			=> '{form}を数字1〜2文字で入力してください',
		),
		'user_birth_date_day' => array(
			'required'			=> true,
			'type'				=> VAR_TYPE_STRING,
			'min'				=> 1,
			'max'				=> 2,
			'min_error'			=> '{form}を数字1〜2文字で入力してください',
			'max_error'			=> '{form}を数字1〜2文字で入力してください',
		),
		'user_birth_date_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		
		'user_sex' => array(
			'form_type' => FORM_TYPE_HIDDEN,
			'required' => false,// 性別は変更不可
		),
		'user_sex_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'prefecture_id' => array(
		),
		'user_address' => array(
		),
		'user_address_building' => array(
		),
		'user_address_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_blood_type' => array(
		),
		'user_blood_type_public' => array(
			'name'		=> '血液型公開',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'job_family_id' => array(
		),
		'job_family_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'business_category_id' => array(
		),
		'business_category_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_is_married' => array(
		),
		'user_is_married_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_has_children' => array(
		),
		'user_has_children_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'work_location_prefecture_id' => array(
		),
		'work_location_prefecture_id_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_hobby' => array(
		),
		'user_hobby_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_url' => array(
		),
		'user_url_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_introduction' => array(
		),
		'user_introduction_public' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(0 => '非公開'),
		),
		'user_prof_text' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_prof_textarea' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'user_prof_select' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_SELECT,
		),
		'user_prof_checkbox' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_prof_radio' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_RADIO,
		),
	);
}

/**
 * ユーザプロフィール変更実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserProfileEditDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// プロフィール属性によってValidateする必要があるかどうか確認する
		$profile_required = $this->config->get('profile_required');
		foreach($profile_required as $k => $v){
			// プロフィールとして検証対象となっている場合
			if($v){
				if($k == 'user_birth_date'){
					$this->af->form[$k.'_year']['required'] = true;
					$this->af->form[$k.'_month']['required'] = true;
					$this->af->form[$k.'_day']['required'] = true;
				}else{
					$this->af->form[$k]['required'] = true;
				}
			}
		}
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_profile_edit';
		
		/*
		// napatownではニックネームの変更は不可となったのでこの処理は不要
		// ニックネームの絵文字制限
		if(preg_match('/\[x:\d+\]/', $this->af->get('user_nickname'), $match)){
			$this->ae->add("errors","ﾆｯｸﾈｰﾑに絵文字は使用できません");
			return 'user_profile_edit';
		}
		// ニックネームの文字数制限
		if( mb_strlen($this->af->get('user_nickname')) > 128 ) {
			$this->ae->add("errors","ﾆｯｸﾈｰﾑは128文字以下で入力してください");
			return 'user_profile_edit';
		}
		*/
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
		// セッション情報を取得
		$sess = $this->session->get('user');
		
		// ニックネームの重複確認
		if($sess['user_nickname'] != $this->af->get('user_nickname')){
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'user',
				'sql_where'		=> 'user_nickname = ?',
				'sql_values'	=> array($this->af->get('user_nickname')),
			);
			$um = $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			if(count($r) > 0){
				$this->ae->add(null, '', E_USER_NICKNAME_ALREADY_USED);
				return 'user_profile_edit';
			}
		}
		
		// プロフィール基本項目をDBに保存
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		$user->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// 生年月日
		if(
			($this->af->get('user_birth_date_year' ) != '') && 
			($this->af->get('user_birth_date_month') != '') &&
			($this->af->get('user_birth_date_day'  ) != '') &&
			checkdate(
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day'  ),
				$this->af->get('user_birth_date_year' )
			)
		) {
			// 年齢の確認
			$um = $this->backend->getManager('Util');
			$birth_date = sprintf("%04d-%02d-%02d",
				$this->af->get('user_birth_date_year'),
				$this->af->get('user_birth_date_month'),
				$this->af->get('user_birth_date_day')
			);
			if($um->getAge($birth_date) < $this->config->get('user_age_min')){
				$this->ae->add(
					'errors',
					$this->config->get('user_age_min') .
						'歳未満の方は当サービスを利用することができません。'
				);
				return 'user_profile_edit';
			}
			$user->set('user_birth_date',
				sprintf(
					"%04d-%02d-%02d",
					$this->af->get('user_birth_date_year' ),
					$this->af->get('user_birth_date_month'),
					$this->af->get('user_birth_date_day'  )
				)
			);
		}else{
			$this->ae->add('errors','存在しない日時です。');
			return 'user_profile';
		}
		// プロフィール属性によって公開設定を更新する
		$profile_public = $this->config->get('profile_public');
		foreach($profile_public as $k => $v){
			// プロフィールとして検証対象となっている場合
			if($v){
				// 非公開にチェックがあればパラメタは「0」
				// 非公開にチェックがなければパラメタはないので「1」で補う
				if($this->af->get("{$k}_public") == ''){
					$user->set("{$k}_public", 1);
				}
			}
		}
		// オーバーライド
		$user->update();
		
		/* プロフィールオプション項目をDBに保存（内容が空ならDBから削除） */
		$formTypeList = array('text', 'textarea', 'select', 'radio');   // フォームタイプ一覧(チェックボックスは実装が特殊なので除く)
		// フォーム情報を取得して保存
		foreach($formTypeList as $formType){
			$formUserProf = $this->af->get('user_prof_' . $formType);
			if(!is_array($formUserProf)) continue;
			foreach($formUserProf as $configUserProfId => $userProfValue){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id'),
					array($sess['user_id'], $configUserProfId)
				);
				if($userProfValue != ''){
					if($userProf->isValid()){
						$userProf->set('user_prof_value', $userProfValue);
						$userProf->update();
					}else{
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $sess['user_id']);
						$userProf->set('config_user_prof_id', $configUserProfId);
						$userProf->set('user_prof_value', $userProfValue);
						$userProf->add();
					}
				}else{
					if($userProf->isValid()) $userProf->remove();
				}
			}
		}
		// チェックボックス(Ethnaでフォーム値が2次元配列に出来ないので、これだけ特殊な実装)
		$user_id = $sess['user_id'];
		$db = $this->backend->getDB();
		$sql = 'SELECT o.config_user_prof_option_id, o.config_user_prof_id 
			FROM config_user_prof_option as o left join config_user_prof as p 
				on o.config_user_prof_id = p.config_user_prof_id 
			WHERE p.config_user_prof_type = 5';
		$options = $db->db->getAll($sql, array(), DB_FETCHMODE_ASSOC);
		
		$checkbox_values = $this->af->get('user_prof_checkbox');
		if(is_array($options)){
			foreach($options as $option){
				if(is_array($checkbox_values) && in_array($option['config_user_prof_option_id'], $checkbox_values)){
					// チェックされている項目
					$user_prof =& new Tv_UserProf(
						$this->backend,
						array('user_id', 'config_user_prof_id', 'user_prof_value'),
						array(
							$user_id,
							$option['config_user_prof_id'],
							$option['config_user_prof_option_id'],
						)
					);
					if(!$user_prof->isValid()){
						$user_prof =& new Tv_UserProf($this->backend);
						$user_prof->set('user_id', $user_id);
						$user_prof->set(
							'config_user_prof_id',
							$option['config_user_prof_id']
						);
						$user_prof->set(
							'user_prof_value',
							$option['config_user_prof_option_id']
						);
						$user_prof->add();
					}
				}else{
					// チェックされていない項目
					$user_prof =& new Tv_UserProf(
						$this->backend,
						array('user_id', 'config_user_prof_id', 'user_prof_value'),
						array(
							$user_id,
							$option['config_user_prof_id'],
							$option['config_user_prof_option_id'],
						)
					);
					if($user_prof->isValid()){
						$user_prof->remove();
					}
				}
			}
		}
		/*
		$formUserProfCheckbox = $this->af->get('user_prof_checkbox');
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		// フォーム形式がチェックボックスの項目一覧を取得
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id'),
			array('config_user_prof_type' => new Ethna_AppSearchObject(5, OBJECT_CONDITION_EQ))
		);
		
		$cupo =& new Tv_ConfigUserProfOption($this->backend);
		foreach($configUserProfList[1] as $configUserProf){
			$configUserProfOptionList = $cupo->searchProp(
				array('config_user_prof_option_id'),
				array('config_user_prof_id' => new Ethna_AppSearchObject($configUserProf['config_user_prof_id'], OBJECT_CONDITION_EQ))
			);
			foreach($configUserProfOptionList[1] as $configUserProfOption){
				$userProf =& new Tv_UserProf(
					$this->backend,
					array('user_id', 'config_user_prof_id', 'user_prof_value'),
					array($sess['user_id'], $configUserProf['config_user_prof_id'], $configUserProfOption['config_user_prof_option_id'])
				);
				if(is_array($formUserProfCheckbox) && !(array_search($configUserProfOption['config_user_prof_option_id'], $formUserProfCheckbox) === false)){
					// チェックボックスが選択されている
					if(!$userProf->isValid()){
						$userProf =& new Tv_UserProf($this->backend);
						$userProf->set('user_id', $sess['user_id']);
						$userProf->set('config_user_prof_id', $configUserProf['config_user_prof_id']);
						$userProf->set('user_prof_value', $configUserProfOption['config_user_prof_option_id']);
						$userProf->add();
					}
				}else{
					// チェックボックスが選択されていない
					if($userProf->isValid())
					{
						$userProf->remove();
					}
				}
			}
		}
		*/
		
		//user_nickname セッション更新
		unset($_SESSION['user']['user_nickname']);
		//$_SESSION['user']['user_nickname'] = $this->af->get('user_nickname');
		
		// formの中にnicknameがないのでAppObjectから取得して代入する
		$_SESSION['user']['user_nickname'] = $user->get('user_nickname');
		$this->ae->add(null, '', I_USER_PROFILE_EDIT_DONE);
		return 'user_home';
	}
}

?>
