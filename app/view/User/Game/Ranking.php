<?php
/**
 * Game.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ゲームランキング画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameRanking extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ゲームカテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game_category',
			'sql_where'	=> 'game_category_status = 1 AND game_category_priority_id >= 1',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		// ゲームランキング
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game',
			'sql_where'	=> 'game_status = 1 ',
			'sql_values'	=> array(),
			'sql_order'	=> 'game_updated_time DESC LIMIT 3,7'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
	}
}
?>