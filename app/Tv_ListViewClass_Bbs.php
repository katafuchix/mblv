<?php
/**
 * Tv_ListView_Bbs.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 見ると伝言板を既読に変更するビューの基底クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ListViewClass_Bbs extends Tv_ListViewClass
{
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  特殊な画面を表示する場合を除いて特にオーバーライドする必要は無い
	 *  (preforward()のみオーバーライドすれば良い)
	 *
	 *  @access     public
	 */
	function forward()
	{
		parent::forward();
		
		// 自分の未読伝言板書き込みを既読に変更する
		$bbsManager =& $this->backend->getManager('Bbs');
		$listview_data = $this->af->getApp('listview_data');
		$bbsManager->updateNoticeList($listview_data);
	}
}
// }}}
?>