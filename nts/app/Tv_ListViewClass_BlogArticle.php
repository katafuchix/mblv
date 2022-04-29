<?php
/**
 * Tv_ListView_BlogArticle.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 見るとブログコメントを既読に変更するビューの基底クラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_ListViewClass_BlogArticle extends Tv_ListViewClass
{
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  特殊な画面を表示する場合を除いて特にオーバーライドする必要は無い
	 *  (preforward()のみオーバーライドすれば良い)
	 *
	 *  @access public
	 */
	function forward()
	{
		parent::forward();
		
		// ブログコメント表示分の未読データを既読に変更する
		$bcManager =& $this->backend->getManager('BlogComment');
		$listview_data = $this->af->getApp('listview_data');
		$bcManager->updateNoticeList($listview_data);
	}
}
// }}}
?>
