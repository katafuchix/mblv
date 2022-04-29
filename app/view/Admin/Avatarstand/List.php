<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター台座一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAvatarstandList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_avatarstand_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'avatar_stand',
			'sql_where'	=> 'avatar_stand_status > 0',
			'sql_order'	=> 'avatar_stand_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>