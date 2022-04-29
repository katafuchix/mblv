<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理メディア編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminMediaEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'media_code' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'name'		=> '識別コード',
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 1,
			'max'		=> 32,
			'required_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
			'min_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
			'max_error'	=> '{form}を半角英数字32文字以内で正しく入力してください',
			'regexp_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
		),
		'media_name' => array(
			'name'		=> '入会経路名',
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
		'community_id' => array(
			'name'		=> '入会時参加コミュニティID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_point' => array(
			'name'		=> '入会時付与ポイント',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_param1' => array(
			'name'		=> 'パラメータ1',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_param2' => array(
			'name'		=> 'パラメータ2',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_param3' => array(
			'name'		=> 'パラメータ3',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_res_url' => array(
			'name'		=> '入会時成果返却先URL',
			'type'		=> VAR_TYPE_STRING,
		),
		'media_mail_title' => array(
			'name'		=> '入会経路通知メールタイトル',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'media_mail_body' => array(
			'name'		=> '入会経路通知メール本文',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'media_avatar' => array(
			'name'		=> 'アバター設定',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, media_avatar',
		),
	);
}

/**
 * 管理メディア編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminMediaEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_media_edit';
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
		// メディア編集
		$o =& new Tv_Media($this->backend,'media_id',$this->af->get('media_id'));
		
		// 同じ識別コードがないかどうか確認
		if($this->af->get('media_code') != $o->get('media_code')){
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
				return 'admin_media_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_media_edit';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_EDIT_DONE);
		return 'admin_media_list';
	}
}
?>