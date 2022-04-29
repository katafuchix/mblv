<?php
/**
 * Delete.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendDelete extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user_id;
		
		/*
		 *
		 * Tv_View_UserFriendApply�򻲹͡ʥ��ԥڡ�
		 *
		 */
		//user_hash�ێ��ގ��ݡ���������ü�
		if( $_REQUEST['action_user_friend_apply'] && $_REQUEST['to_user_id'] && $_REQUEST['user_hash'] ) {
			
			$um = $this->backend->getManager('Util');
			
			if( !$this->session->isStart() ) {
				
				//���ơ�����ͭ���ǡ��ѥ�᡼��user_hash�Ρ����Ďގڎ��ȥѥ���ɤ����
				$param = array(
					'sql_select'	=> 'user_mailaddress, user_password',
					'sql_from'		=> ' user ',
					'sql_where'		=> 'user_hash = ? AND user_status = ?',
					'sql_values'	=> array( $_REQUEST['user_hash'], 2 ),
				);
				$user = $um->dataQuery($param);
				
				if(count($user) == 0){
					return 'user_index';
				}
				$userMailaddress = $user[0]['user_mailaddress'];
				$userPassword = $user[0]['user_password'];
				
				
				//DB��������������Ďގڎ��ȥѥ���ɤ�ǧ��
				$userManager =& $this->backend->getManager('User');
				if( !$userManager->login($userMailaddress,$userPassword) ) {
					return 'user_index';
				}
			}
			
			$user_id = $_REQUEST['to_user_id'];
		} else {
			$user_id = $this->af->get('to_user_id');
		}
		
		$to_user =& new Tv_User(
			$this->backend,
			'user_id',
			$user_id
		);
		
		if( $to_user->isValid() ) {
			$this->af->setApp( 'to_user', $to_user->getNameObject() );
		}
	}
}
?>