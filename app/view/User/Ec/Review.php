<?php
/**
 * Review.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * レビュー画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcReview extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		$sqlWhere = 'u.user_id = a.user_id AND a.item_id = i.item_id AND a.review_status = 3 AND a.item_id = ?';
		
		$sqlValues = array();
		$sqlValues[] = $this->af->get('item_id');
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_ec_review',
			'sql_select'	=> 'u.user_id,u.user_name,a.review_id,a.review_created_time,a.review_title,a.review_body,a.review_status, i.item_id, i.item_category_id, i.item_name ,i.item_image, i.item_price, i.item_text1, i.shop_id',
			'sql_from'		=> 'user as u, review as a,item as i',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'a.review_updated_time DESC',
			'sql_num'		=> 5
		);
		
		$usersess = $this->session->get('user');
		$this->af->setApp("self_user_id",$usersess['user_id']);
	}
}
?>