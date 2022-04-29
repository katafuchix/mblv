<?php
/**
 * Ranking.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * デコメールランキング画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserDecomailRanking extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$decomail_category_id = $this->af->get('decomail_category_id');
		if($decomail_category_id == '') $decomail_category_id = 0;
		
		$um = $this->backend->getManager('Util');
		
		// デコメールカテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_status = 1 AND decomail_category_priority_id >= 1',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_id = ?',
			'sql_values'	=> array( $decomail_category_id ),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('decomail_category_name', $r[0]['decomail_category_name']); 
		
		// ランキング
		$sqlValues = array('decomail');
		$sqlWhere = 'r.type = ? AND r.id = d.decomail_id AND d.decomail_status = 1';
		if($decomail_category_id){
			$sqlWhere .= ' AND r.sub_id = ?';
			$sqlValues[] = $decomail_category_id;
		}
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' ranking r, decomail d ',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order  LIMIT 10',
//			'sql_order'		=> 'r.ranking_order  LIMIT 3,7',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// ランキングの最終更新日時を取得
		// 更新は毎週木曜日
		switch(date("w"))
		{
			case 0:
				$ext = -3;
				break;
			case 1:
				$ext = -4;
				break;
			case 2:
				$ext = -5;
				break;
			case 3:
				$ext = -6;
				break;
			case 4:
				$ext = 0;
				break;
			case 5:
				$ext = -1;
				break;
			case 6:
				$ext = -2;
				break;
			default:
				$ext = 0;
				break;
		}
		$this->af->setApp('last_modified', $um->getPreDate('day', $ext));
	}
}
?>