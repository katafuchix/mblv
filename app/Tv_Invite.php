<?php
/**
 * Tv_Invite.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ԥޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_InviteManager extends Ethna_AppManager
{
	/**
	 * �桼�����Ԥ���
	 */
	function invite()
	{
		// ���å���������������
		$sess = $this->session->get('user');
		$from_user_id = $sess['user_id'];
		$from_user_hash = $sess['user_hash'];
		$from_user_nickname = $sess['user_nickname'];
		
		$_user_id = 0;
		$user_point = 0;
		
		// user�˥᡼�륢�ɥ쥹����Ͽ�����뤫�ɤ��������å�
		$user =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('to_user_mailaddress'));
		
		// user�˥᡼�륢�ɥ쥹����Ͽ�����롢�������ޤ��ϲ���Ͽ��
		if($user->get('user_status') != 2){
			//��¸�桼���������������ΤФ����ϴ�¸�ǡ�����[ʪ�����]����
			$r = $user->remove();
		}
		
		// user�˥᡼�륢�ɥ쥹����Ͽ���ʤ��������Υ桼���ξ��
		if(!$user->isValid()){
			// �桼����Ͽ
			$u =& new Tv_User($this->backend);
			$u->set('user_mailaddress',$this->af->get('to_user_mailaddress'));
			// SPGV�桼��ID�򥻥å� �����ʤ�
			/*
			if($_user_id){
				$u->set('spgv_user_id', $_user_id);
			}
			*/
			// ���ݥ���Ȥ򥻥å�
			if($user_point){
				$u->set('user_point', $user_point);
			}
			// �����С��饤��
			$r = $u->add();
			$to_user_id = $u->getId();
			if(Ethna::isError($r)) return false;
			
			//invite��ͧã���Ծ������Ͽ
			$i =& new Tv_Invite($this->backend);
			$i->set('from_user_id',$from_user_id);
			$i->set('to_user_id',$to_user_id);
			$i->set('to_user_mailaddress',$this->af->get('to_user_mailaddress'));
			$i->set('invite_status',1);
			$i->set('mail_time',date("Y-m-d H:i:s"));
			$r = $i->add();
			$invite_id = $i->getId();
			if(Ethna::isError($r)) return false;
			
			// invite_id���Ԥ��줿�桼������˲ä���
			$u = new Tv_User($this->backend, 'user_hash', $u->get('user_hash'));
			// ����ID�򥻥å�
			$u->set('invite_id', $invite_id);
			// �����С��饤��
			$u->update();
			if(Ethna::isError($r)) return false;
			
			// �桼���������Ͽ
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $to_user_id);
			$uh->set('user_mailaddress', $u->get('user_mailaddress'));
			$uh->set('user_status', 1);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			
			/* =============================================
			// ͧã�������ײ��Ͻ���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// ���������INSERT 0:mail 1:access 2:reg
			$sm->addStats('invite', $from_user_id, 0, 0);
			
			// ���ԥ᡼������
			$ms = new Tv_Mail($this->backend);
			$value = array (
				'user_hash'				=> $u->get('user_hash'),
				'from_user_id'			=> $from_user_id ,
				'from_user_hash'		=> $from_user_hash ,
				'from_user_nickname'	=> $from_user_nickname ,
				'to_user_mailaddress'	=> $this->af->get('to_user_mailaddress') ,
				'invite_message'		=> $this->af->get('message') ,
			);
			$ms->sendOne($this->af->get('to_user_mailaddress') , 'user_invite' , $value );
		}
		// user�˥᡼�륢�ɥ쥹����Ͽ�����롢������Ͽ��
		elseif($user->get('user_status') == 2){
			//ͧã����
			$fm = $this->backend->getManager('Friend');
			$this->af->set('to_user_id', $user->gete('user_id'));
			$fm->applyFriend();
		}
	}
	
	/**
	 * ���ԥ桼�������Ͽ������
	 */
	function inviteRegist($invite_id, $no_point=false)
	{
		if(!$invite_id) return false;
		
		$um = $this->backend->getManager('Util');
		
		// ����ID�����뤫�ɤ�����ǧ����
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'invite',
			'sql_where'		=> 'invite_id = ?',
			'sql_values'	=> array($invite_id),
		);
		$r = $um->dataQuery($param);
		//DB�����Ǥ������Ϲ���
		if(count($r) > 0){
			// ���Ը��桼���������
			$from_user_id = $r[0]['from_user_id'];
			// �ﾷ�ԥ桼���������
			$to_user_id = $r[0]['to_user_id'];
			
			// ���Ծ��󹹿�
			$i =& new Tv_Invite($this->backend,'invite_id',$invite_id);
			$i->set('invite_status',2);
			$i->set('regist_time',date('Y-m-d H:i:s'));
			$r = $i->update();
			// ���顼����ϹԤ�ʤ�
//				if(Ethna::isError($r)){}
		}
		
		// ͧã��Ͽ
		if($from_user_id){
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$sns_info = $this->config->get('sns_info');
			
			//���Լ�¦���ﾷ�ԼԤ���Ͽ
			$f =& new Tv_Friend($this->backend);
			$f->set('from_user_id',$from_user_id);
			$f->set('to_user_id', $to_user_id);
			$f->set('friend_status',2);
			$r = $f->add();
			// ���顼����ϹԤ�ʤ�
//			if(Ethna::isError($r)){}
			
			// ���ԼԤ˥ݥ������Ϳ
			// �ݥ������Ϳ����Τ�����
			if(!$no_point){
				$u = new Tv_User($this->backend, 'user_id', $to_user_id);
				$param = array(
					'user_id'		=> $from_user_id,
					'point'			=> intval($sns_info['site_invite_from_point']),
					'point_type'	=> $point_type_search['invite_from'],
					'point_status'	=> 2,// ��ǧ�Ѥ�
					'user_sub_id'	=> $invite_id,
					'point_sub_id'	=> $to_user_id,
					'point_memo'	=> $u->get('user_nickname'),
				);
				$pm->addPoint($param);
			}
			
			//�ﾷ�Լ�¦�˾��ԼԤ���Ͽ
			$f =& new Tv_Friend($this->backend);
			$f->set('from_user_id',$to_user_id);
			$f->set('to_user_id',$from_user_id);
			$f->set('friend_status',2);
			$r = $f->add();
			// ���顼����ϹԤ�ʤ�
//			if(Ethna::isError($r)){}
			
			// �ﾷ�ԼԤ˥ݥ������Ϳ
			// �ݥ������Ϳ����Τ�����
			if(!$no_point){
				$u = new Tv_User($this->backend, 'user_id', $from_user_id);
				$param = array(
					'user_id'		=> $to_user_id,
					'point'			=> intval($sns_info['site_invite_to_point']),
					'point_type'	=> $point_type_search['invite_to'],
					'point_status'	=> 2,// ��ǧ�Ѥ�
					'user_sub_id'	=> $invite_id,
					'point_sub_id'	=> $from_user_id,
					'point_memo'	=> $u->get('user_nickname'),
				);
				$pm->addPoint($param);
			}
		}
		
		return true;
	}
}

/**
 * ���ԥ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Invite extends Ethna_AppObject
{
}
?>