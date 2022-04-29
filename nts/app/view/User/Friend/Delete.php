<?php
/**
 * Delete.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendDelete extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
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
			
			if( !$this->session->isStart() ) {
				
				//���ơ�����ͭ���ǡ��ѥ�᡼��user_hash�Ρ����Ďގڎ��ȥѥ���ɤ����
				$tv_user =& new Tv_User($this->backend);
				$user = $tv_user->searchProp(
					array('user_mailaddress','user_password'),
					array(
						'user_hash'		=> $_REQUEST['user_hash'],
						'user_status'	=> 2,
					)
				);
				
				if($user[0] == 0) {
					return 'user_index';
				}
				
				$userMailaddress = $user[1][0]['user_mailaddress'];
				$userPassword	= $user[1][0]['user_password'];
				
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
