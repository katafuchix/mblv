<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理動画一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMovieList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// ユーザID検索
			'user_id' => array(
				'column' => 'movie.user_id',
			),
			// MIMEタイプ検索
			'movie_mime_type' => array(
				'type' => 'LIKE',
				'column' => 'movie.movie_type',
			),
			// 動画サイズ
			'movie_size' => array(
				'type' => 'RANGE',
				'column' => 'movie.movie_size',
			),
			// 作成日時検索
			'movie_created' => array(
				'type' => 'PERIOD',
				'column' => 'movie.movie_created_time',
			),
			// 監視
			'movie_checked' => array(
				'column' => 'movie.movie_checked',
			),
			// 状態
			'movie_status' => array(
				'column' => 'movie.movie_status',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('movie_status') == "") $this->af->set('movie_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 表示順
		if($this->af->get('sort_key') != ''){
			$key = array('user_id', 'movie_mime_type', 'movie_size', 'movie_created_time', 'movie_deleted_time');
			$sqlOrder = $key[$this->af->get('sort_key')];
			
			if($this->af->get('sort_order') == 1){
				$sqlOrder .= ' DESC';
			} else {
				$sqlOrder .= ' ASC';
			}
		}else{
			$sqlOrder .= 'movie_created_time DESC';
		}
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_movie_list',
			'sql_select'	=> 
								'movie.movie_id, movie.movie_status, movie.movie_created_time, movie.movie_deleted_time,' .
								'movie.user_id, user.user_nickname, movie.movie_mime_type, movie.movie_size, movie.movie_checked, movie.movie_status',
			'sql_from'		=> 'movie LEFT JOIN user ON movie.user_id = user.user_id ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>