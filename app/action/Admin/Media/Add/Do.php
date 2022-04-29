<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メディア登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMediaAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'media_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 1,
			'max'		=> 32,
			'required_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
			'min_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
			'max_error'	=> '{form}を半角英数字32文字以内で正しく入力してください',
			'regexp_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
		),
		'media_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'community_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_point' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param1' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param2' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param3' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_res_url' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_title' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_body' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * 管理メディア登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMediaAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if ($this->af->validate() > 0) return 'admin_media_add';
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'admin_media_list';
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
		// 同じ識別コードがないかどうか確認
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> 'media_id',
			'sql_from'		=> 'media',
			'sql_where'		=> 'media_code = ?',
			'sql_values'	=> array($this->af->get('media_code')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_MEDIA_CODE_DUPLICATE);
			return 'admin_media_add';
		}
		
		// メディア登録
		$o =& new Tv_Media($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('media_status', 1);
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_media_add';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_ADD_DONE);
		return 'admin_media_list';
	}
}
?>