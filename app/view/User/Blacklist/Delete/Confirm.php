<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �֥�å��ꥹ�Ȳ����ǧ���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �����桼���ξ������
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$this->af->get('black_list_deny_user_id')
			);
		$this->af->setApp('deny_user', $to_user->getNameObject());
	}
}
?>