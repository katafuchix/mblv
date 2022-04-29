<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティ編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{	//コミュニティ情報の取得
		$communityObject =& new Tv_Community($this->backend,'community_id',$this->af->get('community_id'));
		$communityObject->exportForm();
	}
}
?>