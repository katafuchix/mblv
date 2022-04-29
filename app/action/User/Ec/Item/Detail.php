<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品詳細ページ表示アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemDetail extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'shop_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'category_id' => array(
			'type'			=> VAR_TYPE_INT,
		),
		'item_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'type' => array(
			'type'			=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 商品詳細ページ表示アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemDetail extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$um = $this->backend->getManager('Util');
		
		// 有効なステータスの商品のみ取得する
		$sqlWhere .= 'item_id = ? AND item_status = 1';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
		$sqlValues[] = $this->af->get('item_id');
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'item',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		
		$r = $um->dataQuery($param);
		if(count($r) == 0){
			$this->ae->add(null, '', E_USER_ITEM_NOT_FOUND);
			return 'user_error';
		}
		
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
		return 'user_ec_item_detail';
	}
}
?>