<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * コミュニティー編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommunityEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// コミュニティ取得
		$community = &new Tv_Community($this->backend,
			'community_id',
			$this->af->get('community_id')
			);
		$this->af->setApp('community', $community->getNameObject());
	}
}
?>