<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ検索実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserSearchDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_nickname' => array(
			'name'		=> 'ﾆｯｸﾈｰﾑ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age' => array(
			'name'		=> '年齢',
		),
		'user_age_min' => array(
			'name'		=> '年齢（下限）',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'user_age_max' => array(
			'name'		=> '年齢（上限）',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'user_sex' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> array(1 => '男性',
									 2 => '女性',
//									 0 => '問わない',
//									 '' => '問わない',
									),
			'required'	=> true,
		),
		'prefecture_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			//'option'	=> 'user,prefecture_id',
			'option'		=> 'Util, prefecture_id',
		),
		'user_blood_type' => array(
			'name'	  => '血液型',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'user,blood_type',
		),
		'job_family_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'user,job_family',
		),
		'business_category_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'user,business_category',
		),
		'user_is_married' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array(0 => '未婚', 1 => '既婚'),
		),
		'user_has_children' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array(1 => 'いる', 0 => 'いない'),
		),
		'work_location_prefecture_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'user,prefecture',
		),
		'user_hobby' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_introduction' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
/*
		'user_prof_text' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_prof_textarea' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
*/
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
		'user_prof_keyword' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'search' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ユーザ検索実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserSearchDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// ニックネームに入力がある場合は年齢（上限）、年齢（下限）、性別の検証チェックを外す
		if($this->af->get('user_nickname')){
			$this->af->form['user_age_min']['required'] = false;
			$this->af->form['user_age_max']['required'] = false;
			$this->af->form['user_sex']['required'] = false;
		}
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_search';
		
		// 検索条件が入力されていないエラー
		if( $this->af->get('user_nickname') == '' && $this->af->get('user_hobby') == '' 
			&& $this->af->get('prefecture_id') == '' 
			&& $this->af->get('user_prof_checkbox') == '' && $this->af->get('user_age_min') == '' 
			&& $this->af->get('user_age_max') == '' 
			&& $this->af->get('user_sex') == 0 
		){
			$this->ae->add(null, '', E_USER_SEARCH_NO_KEY);
			return 'user_search';
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
		return 'user_search_result';
	}
}

?>
