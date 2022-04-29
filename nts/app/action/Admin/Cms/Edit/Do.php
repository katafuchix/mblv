<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理CMS編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCmsEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'cms_type' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'タイプ',
		),
		'cms_html1' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '上部HTML',
		),
		'cms_html2' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '下部HTML',
		),
		'cms_html3' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '中部HTML',
		),
		'low_term_d' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'DOCOMO下位端末(機種名)',
		),
		'low_term_a' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'AU下位端末(デバイスID)',
		),
		'low_term_s' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'SOFTBANK下位端末(機種名)',
		),
	);
}

/**
 * 管理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCmsEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_cms_edit';
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
		// CMS編集
		$cms_type = $this->af->get('cms_type');
		$o =& new Tv_Cms($this->backend, 'cms_type', $cms_type);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_cms_edit';
		
		$this->ae->add(null, '', I_ADMIN_CMS_EDIT_DONE);
		$cms_type_list = $this->config->get('cms_type');
		return 'admin_' . $cms_type_list[$cms_type]['type'] . '_list';
	}
}
?>