<?php
/**
 * Buy.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarBuy extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���Х����������
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		$a->exportForm();
	}
}
?>