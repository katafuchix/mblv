<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х�������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarConfigDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'first_avatar_id' => array(
			'name'		=> '1���ܤΎ��ʎގ���ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'second_avatar_id' => array(
			'name'		=> '2���ܤΎ��ʎގ���ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
	);
}
/**
 * �桼�����Х�������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// ���
		if($this->af->get('back')) return 'user_avatar_config_first';
		// ���ڥ��顼
		if($this->af->validate()>0) return 'user_avatar_config_first';
		return null;
	}
	
	function perform()
	{
		// ���Х�������
		// ���å����������
		$sess = $this->session->get('user');
		
		// �桼����������
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х�������������򤬤��뤫�ɤ�����ǧ
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "���ˎ��ʎގ���������꤬��λ���Ƥ��ޤ���");
			return 'user_error';
		}
		
		$timestamp = date("Y-m-d H:i:s");
		// ���ʤΤǹ����ݥ��������Ϻ������ʤ�
		
		// ��1���Х�������
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('first_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// ��Ƥ������
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// ��1���Х����ۿ���λ�����꤬����Ƥ���С�-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('first_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		// ��2���Х�������
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('second_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// ��Ƥ������
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// ��2���Х����ۿ���λ�����꤬����Ƥ���С�-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('second_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		
		// ���å������Υ��Х����㤤ʪ���������õ�
		$this->session->set('cart_avatar', '');
		
		// �桼������򹹿�
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х��������������򹹿�
		$u->set('avatar_config_first', 1);
		
		$r = $u->update();
		// ���å�������򹹿�
		$this->session->set('user', $u->getNameObject());
		
		// ���Х������ꤢ��������ϩ�ξ��Ϥ���������Ͽ�ˤ���
		if($u->get('media_id')){
			// �����ϩ����μ���
			$m = & new Tv_Media($this->backend, 'media_id', $u->get('media_id'));
			// ���Х������꤬������ϥ��ơ�����������Ͽ�ˤ���
			if($m->get('media_avatar')){
				// ���ơ�����������Ͽ��
				$u->set('user_status', 2);
				$u->update();
				
				// ��Ͽ��λ�Υ�å�����
				$this->ae->add(null, '', I_USER_REGIST_DONE);
				
				$um = $this->backend->getManager('Util');
				$pm =& $this->backend->getManager('Point');
				$user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
				$user_id = $user->get('user_id');
				$user_mailaddress = $user->get('user_mailaddress');
				$invite_id = $user->get('invite_id');
				$media_access_hash = $user->get('media_access_hash');
				/* =============================================
				// �桼���������Ͽ����򸡺�
				 ============================================= */
				$param = array(
					'sql_select'	=> '*',
					'sql_from'		=> 'user_hist',
					'sql_where'		=> 'user_mailaddress = ? AND user_status = 2',
					'sql_values'	=> array($user->get('user_mailaddress')),
				);
				$uh_list = $um->dataQuery($param);
				// �ǥե���Ȥϥݥ������Ϳ��Ԥ�
				$no_point = false;
				if(count($uh_list) > 0){
					// SPGV�桼��¸�߳�ǧ
					if($user->get('spgv_user_id')){
						$su = new Tv_SpgvUser($this->backend, 'user_id', $user->get('spgv_user_id'));
						// ͭ���ʥ쥳���ɤξ��
						if($su->isValid()){
							// ͭ������ξ��
							if($su->get('user_status') == 2){
								// �ݥ������Ϳ���ʤ�
								$no_point = true;
							}
						}
					}
				}
				
				/* =============================================
				// �ݥ�����ɲ÷Ͻ���
				 ============================================= */
				// �ݥ������Ϳ�Τ�����
				if(!$no_point){
					$sns_info = $this->config->get('sns_info');
					$point_type_search = $this->config->get('point_type_search');
					$param = array(
						'user_id'		=> $user_id,
						'point'			=> intval($sns_info['sns_regist_point']),
						'point_type'	=> $point_type_search['regist'],
						'point_status'	=> 2,// ��ǧ�Ѥ�
					);
					$pm->addPoint($param);
				}
				
				/* =============================================
				// �����ϩ��ͳ�ξ��ν���
				 ============================================= */
				if($media_access_hash){
					$mm = $this->backend->getManager('Media');
					$mm->mediaResponse($media_access_hash, $no_point);
				}
				
				/* =============================================
				// �桼���������Ͽ
				 ============================================= */
				$timestamp = date('Y-m-d H:i:s');
				$uh = new Tv_UserHist($this->backend);
				$uh->set('user_id', $user_id);
				$uh->set('user_mailaddress', $user->get('user_mailaddress'));
				$uh->set('spgv_user_id', $user->get('spgv_user_id'));
				$uh->set('user_status', 2);
				$uh->set('user_hist_created_time', $timestamp);
				$uh->add();
				/*
				 * �����������ݡ��Ƚ���
				 */
				$an = $this->backend->getManager('Analytics');
				$param = array(
					'pre_regist'	=> false,
					'regist'		=> true,
					'invite'		=> $invite_id,
					'media'			=> $media_hash,
					'resign'		=> false,
				);
				$an->addAnalytics($param);
				
				/*
				 * ��������� �桼��������򹹿����Ƥ���ΤǺ��٥����������Ԥ�
				 */
				$userManager =& $this->backend->getManager('User');
				$r = $userManager->login( $user->get('user_mailaddress'), $user->get('user_password') );
				// ��������
				if(!$r){
					$this->ae->add(null, '', E_USER_LOGIN);
					return 'user_index';
				}
			}
		} // ����Ͽ���������
		
		return 'user_avatar_config_done';
	}
}

?>
