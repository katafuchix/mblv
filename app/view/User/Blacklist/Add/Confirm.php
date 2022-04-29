<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���֥�å��ꥹ���ɲó�ǧ���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistAddConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$toUser =& new Tv_User(
			$this->backend,
			array('user_id'),
			$this->af->get('black_list_deny_user_id')
		);
		$this->af->setApp('toUser', $toUser->getNameObject());
	}
}
?>