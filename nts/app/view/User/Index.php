<?php
/**
 * Index.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザトップページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserIndex extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access public
	 */
	function preforward()
	{
		// 入会経路測定
		if($this->af->get('code')){
			// メディア経由のアクセスか判断
			$mm = $this->backend->getManager('Media');
			$media_access_hash = $mm->addMediaAccess();
			// セッションが始まっていない場合は開始
			if(!$this->session->isStart()){
				$this->session->start(0);
			} 
			// メディア経由でのアクセスの場合はパラメータをセッションに格納して引き継ぐ
			$this->session->set('media_access_hash', $media_access_hash); 
		}
		
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}

?>
