<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ広告リスト画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAdList extends Tv_ListViewClass
{
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// ad category id
			'ad_category_id' => array(
				'column' => 'a.ad_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// キーワード検索
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.ad_name LIKE ? OR a.ad_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= " AND a.ad_status = 1 AND ac.ad_category_id = a.ad_category_id AND a.ad_display_type = 1 ";
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.ad_start_status = 0 OR (a.ad_start_status = 1 AND a.ad_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.ad_end_status = 0 OR (a.ad_end_status = 1 AND a.ad_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.ad_stock_status = 0 OR (a.ad_stock_status = 1 AND a.ad_stock_num > 0)) ";
		
		// キャリア別URLの確認
		if($GLOBALS['EMOJIOBJ']->carrier=='AU'){
			$sqlWhere .= " AND a.ad_url_a <> ''";
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='DOCOMO'){
			$sqlWhere .= " AND a.ad_url_d <> ''";
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='SOFTBANK'){
			$sqlWhere .= " AND a.ad_url_s <> ''";
		}
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_ad_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'ad as a,ad_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.ad_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 10,
		);
		// カテゴリ情報の取得
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('ad_category'));
	}
	
	function forward()
	{
		// HTMLを出力する
		parent::forward();
		
		// 表示している広告リストを取得する
		$ad_list = $this->af->getApp('listview_data');
		
		// 広告統計解析処理
		$sm = $this->backend->getManager('Stats');
		if(is_array($ad_list)){
			foreach($ad_list as $v){
				$ad_id = $v['ad_id'];
				// 閲覧履歴をINSERT
				$sm->addStats('ad', $ad_id, 0, 1);
			}
		}
	}
}
?>
