<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティコメント編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityCommentEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		//記事情報の取得
		$articleObject =& new Tv_CommunityComment($this->backend,'community_comment_id',$this->af->get('community_comment_id'));
		$articleObject->exportForm();
	}
}
?>