<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ニュース編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminNewsEdit extends Tv_Form_AdminNewsEditDo
{
}

/**
 * 管理ニュース実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsEdit extends Tv_ActionAdminOnly
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
		$o =& new Tv_News(
			$this->backend,
			'news_id',
			$this->af->get('news_id')
		);
		$o->exportForm();
		
		$um = $this->backend->getManager('Util');
		// 配信開始日時の分解してセット
		$this->af = $um->setSepTime($this->af, $o->get('news_start_time'), 'news_start');
		// 配信終了日時の分解してセット
		$this->af = $um->setSepTime($this->af, $o->get('news_end_time'), 'news_end');
		// 投稿先を分解してセット
		$this->af->set('news_type', explode(',', $this->af->get('news_type')));
		
		return 'admin_news_edit';
	}
}
?>