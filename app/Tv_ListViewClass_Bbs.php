<?php
/**
 * Tv_ListView_Bbs.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������Ĥ���ɤ��ѹ�����ӥ塼�δ��쥯�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ListViewClass_Bbs extends Tv_ListViewClass
{
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  �ü�ʲ��̤�ɽ���������������ä˥����С��饤�ɤ���ɬ�פ�̵��
	 *  (preforward()�Τߥ����С��饤�ɤ�����ɤ�)
	 *
	 *  @access     public
	 */
	function forward()
	{
		parent::forward();
		
		// ��ʬ��̤�������Ľ񤭹��ߤ���ɤ��ѹ�����
		$bbsManager =& $this->backend->getManager('Bbs');
		$listview_data = $this->af->getApp('listview_data');
		$bbsManager->updateNoticeList($listview_data);
	}
}
// }}}
?>