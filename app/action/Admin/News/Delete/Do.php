<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ニュース削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNewsDeleteDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'news_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理ニュース削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsDeleteDo extends Tv_ActionAdminOnly
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
		$timestamp = date('Y-m-d H:i:s');
		
		// ニュース更新
		$o =& new Tv_News($this->backend, 'news_id', $this->af->get('news_id'));
		// ステータス
		$o->set('news_status', 0);
		// 更新日時
		$o->set('news_updated_time', $timestamp);
		// 削除日時
		$o->set('news_updated_time', $timestamp);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_news_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_NEWS_DELETE_DONE);
		return 'admin_news_list';
	}
}
?>