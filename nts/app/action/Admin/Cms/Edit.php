<?php
/**
 * .php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理CMS編集アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminCmsEdit extends Tv_Form_AdminCmsEditDo
{
}

/**
 * 管理CMS編集アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCmsEdit extends Tv_ActionAdminOnly
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
		// CMS情報取得
		$o =& new Tv_Cms($this->backend, 'cms_type', $this->af->get('cms_type'));
		$o->exportForm();
		return 'admin_cms_edit';
	}
}
?>