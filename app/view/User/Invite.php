<?php
/**
 * Invite.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã���ԥӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserInvite extends Tv_ViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// ���å����������
		$sess = $this->session->get('user');
		
		//���߾�����᡼�륢�ɥ쥹��������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'invite',
			'sql_where'	=> 'from_user_id = ? AND invite_status = 1',
			'sql_values'	=> array($sess['user_id']),
		);
		$um = $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		$this->af->setApp('now_inviting_list', $r);
	}
}
?>