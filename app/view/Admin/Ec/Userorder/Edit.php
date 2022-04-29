<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * オーダー編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcUserorderEdit extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		$o = & new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		$o->exportForm();
		
		// 注文者情報
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'user',
			'sql_where'		=> 'user_id = ? ',
			'sql_values'	=> array($this->af->get('user_id')),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('user', $r[0]);
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'cart',
			'sql_where'		=> 'cart_hash = ? ',
			'sql_values'	=> array($this->af->get('cart_hash')),
		);
		$r = $um->dataQuery($param);
		$this->af->setAppNe('cart',$r[0]);
		
		
		// 注文商品情報の取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'cart c, item i, stock s ',
			'sql_where'		=> 'c.cart_hash = ? and c.item_id = i.item_id and c.stock_id = s.stock_id',
			'sql_order'		=> 'c.cart_id asc',
			'sql_values'	=> array($this->af->get('cart_hash')),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('item_list', $r);
	
		// 注文商品情報と発送単位情報の取得
		/** ethna select */
		$cart_id_list = array();
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'post_unit pu, item i, cart c, stock s ',
			'sql_where'		=> 'pu.cart_hash = ? and pu.cart_id = c.cart_id and pu.item_id = i.item_id and pu.stock_id = s.stock_id ',
			'sql_order'		=> 'pu.post_unit_group_id, pu.post_unit_id asc',
			'sql_values'	=> array($this->af->get('cart_hash')),
		);
		$rows = $um->dataQuery($param);
		
		//HTMLテーブル生成時に使用するrowspan=?を取得する
		$param = array(
			'sql_select'	=> ' *,ifnull(count(post_unit_id), 0)as rowspan ',
			'sql_from'		=> 'post_unit',
			'sql_where'		=> 'cart_hash = ? ',
			'sql_group'		=> 'post_unit_group_id',
			'sql_order'		=> 'post_unit_group_id, post_unit_id asc',
			'sql_values'	=> array($this->af->get('cart_hash')),
		);
		$rowspan_rows = $um->dataQuery($param);

		foreach($rowspan_rows as $k => $v) $rowspan[$v['post_unit_id']] = $v['rowspan'];//整形
		//配列にrowspanを加える
		foreach($rows as $k => $v){
			$km = $k - 1;
			if($v['post_unit_id'] != $rows[$km]['post_unit_id']){
				$rows[$k]['rowspan'] = $rowspan[$v['post_unit_id']];
			}
		}
		
		$this->af->setApp('post_unit_list', $rows);
		
		// 注文ステータスオプション(選択処理)
		//0:未決済,1:注文済,2:決済済,3:発送済,4:返品済,5:キャンセル
		$status_list = $um->getAttrList('cart_status');
		// 「指定しない」を削除する
		unset($status_list[""]);
		$this->af->setApp("status_list",$status_list);
	}
}
?>