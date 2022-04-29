<?php
/**
 * Buy.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲーム購入画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameBuy extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ゲーム情報取得
		$a =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$a->exportForm();
		
		// リストビュー
		$sqlWhere = 'c.comment_type=2 AND c.comment_subid=? AND c.comment_status=1' .
			' AND u.user_id=c.user_id AND u.user_status = ? ';
		$sqlValues = array($this->af->get('game_id'),2);
		$this->listview = array(
			'action_name'	=> 'user_game_buy',
			'sql_select'	=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,c.comment_id,c.comment_created_time,c.comment_body',
			'sql_from'		=> 'user as u, comment as c',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
		
		// 下位端末かどうか判別開始
		$o =& new Tv_Config($this->backend, 'config_type', 'game');
		
		// ファイル容量取得
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('site_low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('site_low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('site_low_term_s');
				break;
			default:
				break;
		}
		// 下位端末かどうか判別
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$term = $um->getModel();
			$model = strtolower($model);
			foreach($term_list as $v){
				if($v){
					if($device == strtolower(trim($v))){
						$low_term = true;
					}
				}
			}
		}
		$this->af->setApp('low_term', $low_term);
	}
}
?>