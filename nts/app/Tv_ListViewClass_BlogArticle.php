<?php
/**
 * Tv_ListView_BlogArticle.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����ȥ֥������Ȥ���ɤ��ѹ�����ӥ塼�δ��쥯�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_ListViewClass_BlogArticle extends Tv_ListViewClass
{
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  �ü�ʲ��̤�ɽ���������������ä˥����С��饤�ɤ���ɬ�פ�̵��
	 *  (preforward()�Τߥ����С��饤�ɤ�����ɤ�)
	 *
	 *  @access public
	 */
	function forward()
	{
		parent::forward();
		
		// �֥�������ɽ��ʬ��̤�ɥǡ�������ɤ��ѹ�����
		$bcManager =& $this->backend->getManager('BlogComment');
		$listview_data = $this->af->getApp('listview_data');
		$bcManager->updateNoticeList($listview_data);
	}
}
// }}}
?>
