<?php
/**
 * Tv_User.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �桼���ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserManager extends Ethna_AppManager
{
	/**
	 * �桼��������󤵤���
	 * 
	 * @access public
	 * @param string $userMailaddress �᡼�륢�ɥ쥹
	 * @param string $userPassword �ѥ����
	 * @return boolean �������������������true�ʤ�������
	 */
	function login($userMailaddress, $userPassword)
	{ 
		// �桼���μ���
		$user = &new Tv_User(
			$this->backend,
			array('user_mailaddress', 'user_password', 'user_status'),
			array($userMailaddress, $userPassword, 2)
		);
		if(!$user->isValid()) return false; // �桼�����󤬼����Ǥ��ʤ����
		// ���å����˥桼���������¸
		$this->session->start(0);
		$this->session->set('user', $user->getNameObject()); 
		// ���å����ID��DB����¸
		$user->set('user_sessid', session_id());
		// ����̾�򹹿�
		$um = $this->backend->getManager('Util');
		$user->set('user_device', $um->getModel());
		$user->update();
		return true;
	}
	
	/**
	 * �桼����������Ȥ�����
	 * 
	 * @access public
	 */
	function logout()
	{
		$this->session->destroy();
	}
	
	/**
	 * �桼������񤵤���
	 * 
	 * @access public
	 * @param string $userPassword �ѥ����
	 * @return boolean ����������������true�ʤ�������
	 */
	function resign($userPassword)
	{
		$userSession = $this->session->get('user');
		$user_id = $userSession['user_id'];
		if($userPassword != $userSession['user_password']){
			$this->backend->ae->add(null, '', E_USER_PASSWORD);
			return false;
		} 
		// ������ɽ������ʤ��褦�ˤ��� start
		$ba = &$this->backend->getManager('BlogArticle');
		$ba->status_off($userSession['user_id']); 
		// �֥�������
		$bc = $this->backend->getManager('BlogComment');
		$bc->status_off($userSession['user_id']);
		// ������ɽ������ʤ��褦�ˤ��� end
		// ͧã������ɽ������ʤ��褦�ˤ��� start
		$friend = &$this->backend->getManager('Friend');
		$friend->status_off($userSession['user_id']); 
		// ͧã������ɽ������ʤ��褦�ˤ��� end
		// ��񤹤�桼�����򻲲ä��Ƥ��륳�ߥ�˥ƥ��Υ��С���������ä� start
		$cm = &new Tv_CommunityMember($this->backend);
		$cm_list = $cm->searchProp(
			array('community_member_id','community_id'),
			array('user_id' => $userSession['user_id'],
				'community_member_status' => 1,
				)
			);
		if($cm_list[0] > 0){
			// ���٤ƤΥ��ߥ�˥ƥ����Ф��ƽ�����Ԥ�
			foreach($cm_list[1] as $v){
				$community_id = $v['community_id'];
				$community_member_id = $v['community_member_id'];
				
				// community_member�ơ��֥��ɽ�����ơ�����OFF
				$communityMember = &$this->backend->getManager('CommunityMember');
				$communityMember->status_off($community_member_id); 
			}
		}
		
		// ���ߥ�˥ƥ��ȥԥå�
		$ca = $this->backend->getManager('CommunityArticle');
		$ca->status_off($user_id);
		
		// ���ߥ�˥ƥ�������
		$cc = $this->backend->getManager('CommunityComment');
		$cc->status_off($user_id);
		
		// ������
		$bb = $this->backend->getManager('Bbs');
		$bb->status_off_resign($user_id);
		
		// ��������
		$fm = $this->backend->getManager('Footprint');
		$fm->status_off($user_id);
		
		// ��å�����
		$mm = $this->backend->getManager('Message');
		$mm->status_off_resign($user_id);
		
		// �ץ��
		$up = $this->backend->getManager('UserProf');
		$up->status_off($user_id);
		
		
		// ���ץ��������ꤵ��Ƥ�����ܤ��������
		$option = $this->config->get('option');
		
		// ���Х���
		if($option['avatar']){
			$bm = $this->backend->getManager('UserAvatar');
			$bm->status_off($user_id);
		}
		// �ݥ����
		if($option['point']){
			$pm = $this->backend->getManager('Point');
			$pm->status_off($user_id);
		}
		// �ǥ��᡼��
		if($option['decomail']){
			$ud = $this->backend->getManager('UserDecomail');
			$ud->status_off($user_id);
		}
		// ������
		if($option['game']){
			$ug = $this->backend->getManager('UserGame');
			$ug->status_off($user_id);
		}
		// �������
		if($option['sound']){
			$us = $this->backend->getManager('UserSound');
			$us->status_off($user_id);
		}
		
		/* =============================================
		// �����ϩ����򹹿�
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// �����Υ�ǥ�����������ID�����뤫�ɤ�����ǧ����
		$param = array(
			'sql_select'	=> 'media_access_id',
			'sql_from'		=> 'media_access as ma, media as m, user u',
			'sql_where'		=> 'u.user_id= ? AND media_access_status <> 4 AND ma.media_access_hash = u.media_access_hash AND ma.media_id = m.media_id',
			'sql_values'	=> array($user_id),
		);
		$r = $um->dataQuery($param);
		// �����ϩ�Υǡ�����¸�ߤ������
		if(count($r) > 0){
			// ��ǥ���������������򥹥ȥ�
			$media_access_id		= $r[0]['media_access_id'];
			
			// ��ǥ�������������������(4)�˹�������
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('media_access_status',4);
			$ma->set('access_time', date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// �����ϩ���ײ��Ͻ���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// ��������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 4);
		}
		
		// user�ơ��֥�Υ��ơ����������ˤ��� start
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		if(!$user->isValid()) return false;
		
		$user->set('user_status', 3);
		$user->set('user_deleted_time', date('Y-m-d H:i:s'));
		$user->update();
		$this->logout(); 
		// user�ơ��֥�Υ��ơ����������ˤ��� end
		
		return true;
	}
	
	/**
	 * �桼��������񤵤���
	 * 
	 * @access public
	 * @param integer $userId �桼��ID
	 * @param integer $userStatus �桼�����ơ�����
	 * @return boolean ��������������������true�ʤ�������
	 */
	function forcedResign($userId, $userStatus=null)
	{
		if(!$userStatus) $userStatus = 4;
		
		// ������ɽ������ʤ��褦�ˤ��� start
		$ba = &$this->backend->getManager('BlogArticle');
		$ba->status_off($userId); 
		// �֥�������
		$bc = $this->backend->getManager('BlogComment');
		$bc->status_off($userId);
		// ������ɽ������ʤ��褦�ˤ��� end
		// ͧã������ɽ������ʤ��褦�ˤ��� start
		$friend = &$this->backend->getManager('Friend');
		$friend->status_off($userId); 
		// ͧã������ɽ������ʤ��褦�ˤ��� end
		// ��񤹤�桼���������ߥ�˥ƥ������ͤξ��ϡ����ơ������ѹ����� start
		$cm = &new Tv_CommunityMember($this->backend);
		$cm_list = $cm->searchProp(
			array('community_id', 'community_member_id'),
			array('user_id' => $userId)
		);
		
		if($cm_list[0] > 0){
			foreach($cm_list[1] as $v){
				$community_id = $v['community_id'];
				$community_member_id = $v['community_member_id'];
				
				// community_member�ơ��֥��ɽ�����ơ�����OFF
				$communityMember = &$this->backend->getManager('CommunityMember');
				$communityMember->status_off($community_member_id); 
				
				// community�ơ��֥��ɽ�����ơ�����OFF(���ߥ�˥ƥ��δ����ͤξ��)
				if($v['community_member_status'] == 2){
					$community = &$this->backend->getManager('Community');
					$community->status_off($community_id);
				}
			}
		} 
		
		// ���ߥ�˥ƥ��ȥԥå�
		$ca = $this->backend->getManager('CommunityArticle');
		$ca->status_off($userId);
		
		// ���ߥ�˥ƥ�������
		$cc = $this->backend->getManager('CommunityComment');
		$cc->status_off($userId);
		
		// ������
		$bb = $this->backend->getManager('Bbs');
		$bb->status_off_resign($userId);
		
		// ��������
		$fm = $this->backend->getManager('Footprint');
		$fm->status_off($userId);
		
		// ��å�����
		$mm = $this->backend->getManager('Message');
		$mm->status_off_resign($userId);
		
		// �ץ��
		$up = $this->backend->getManager('UserProf');
		$up->status_off($userId);
		
		// ���ץ��������ꤵ��Ƥ�����ܤ��������
		$option = $this->config->get('option');
		
		// ���Х���
		if($option['avatar']){
			$bm = $this->backend->getManager('UserAvatar');
			$bm->status_off($userId);
		}
		
		// �ݥ����
		if($option['point']){
			$pm = $this->backend->getManager('Point');
			$pm->status_off($userId);
		}
		// �ǥ��᡼��
		if($option['decomail']){
			$ud = $this->backend->getManager('UserDecomail');
			$ud->status_off($userId);
		}
		
		// ������
		if($option['game']){
			$ug = $this->backend->getManager('UserGame');
			$ug->status_off($userId);
		}
		// �������
		if($option['sound']){
			$us = $this->backend->getManager('UserSound');
			$us->status_off($userId);
		}
		
		/* =============================================
		// �����ϩ����򹹿�
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// �����Υ�ǥ�����������ID�����뤫�ɤ�����ǧ����
		$param = array(
			'sql_select'	=> 'media_access_id',
			'sql_from'		=> 'media_access as ma, media as m, user u',
			'sql_where'		=> 'u.user_id= ? AND media_access_status <> 4 AND ma.media_access_hash = u.media_access_hash AND ma.media_id = m.media_id',
			'sql_values'	=> array($userId),
		);
		$r = $um->dataQuery($param);
		// �����ϩ�Υǡ�����¸�ߤ������
		if(count($r) > 0){
			// ��ǥ���������������򥹥ȥ�
			$media_access_id		= $r[0]['media_access_id'];
			
			// ��ǥ�������������������(4)�˹�������
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('media_access_status',4);
			$ma->set('access_time', date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// �����ϩ���ײ��Ͻ���
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// ��������INSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 4);
		
		}
		
		// ��񤹤�桼���������ߥ�˥ƥ������ͤξ��ϡ����ơ������ѹ����� end
		// user�ơ��֥�Υ��ơ������������ˤ��� start
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return false;
		
		$user->set('user_status', $userStatus);
		$user->set('user_deleted_time', date('Y-m-d H:i:s'));
		$user->update(); 
		// user�ơ��֥�Υ��ơ������������ˤ��� end
		// ������������
		if(!$this->forcedLogout($user->get('user_id'))) return false;
		
		return true;
	}
	
	/**
	 * �桼�������������Ȥ�����
	 * 
	 * @access public
	 * @param integer $userId �桼��ID
	 * @return boolean �����������Ȥ�������������true�ʤ�������
	 */
	function forcedLogout($userId)
	{ 
		// tmp/sess_{SESSID}�������ƶ���Ū�˥������Ȥ��ޤ�
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return false;
		
		$ctl = $this->backend->getController();
		$sessionFile = $ctl->getDirectory('tmp') . '/sess_' . $user->get('user_sessid');
		
		// �ե����뤬�ʤ���Х������Ⱦ��֤ʤΤ�OK
		if(!file_exists($sessionFile)) return true;
		
		return unlink($sessionFile);
	}
	
	/**
	 * 2�桼���δط����������
	 * 
	 * @access public
	 * @return integer 0:ͧã�ǤϤʤ�, 1:ͧã, 2:��ʬ
	 */
	function getUserRelation($from_user_id, $to_user_id)
	{
		if($from_user_id == $to_user_id){
			return 2;
		}
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($from_user_id, $to_user_id)
		);
		if($friend->isValid() && $friend->get('friend_status') == 2){
			return 1;
		}
		
		return 0;
	}
}

/**
 * �桼�����֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_User extends Ethna_AppObject
{
	/**
	 * ���֥������ȥץ�ѥƥ�ɽ��̾�ؤΥ�������
	 * 
	 * @access public
	 * @param string $key �ץ�ѥƥ�̾
	 * @return string �ץ�ѥƥ���ɽ��̾
	 */
	function getName($key)
	{
		$um =& $this->backend->getManager('Util');
		
		switch ($key){
			case 'user_nickname':
				if($this->get('user_status') != 2){ 
					// ����Ͽ���ְʳ��ξ���mixi����ä�"��"��ɽ��
					return '��';
				}else{
					return $this->get('user_nickname');
				}
/*
			case 'prefecture_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_blood_type':
				$r = $um->getAttrName($key, $this->get($key));
			case 'work_location_prefecture_id':
				$r = $um->getAttrName('prefecture_id', $this->get('prefecture_id'));
			case 'job_family_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'business_category_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_is_married':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_has_married':
				$r = $um->getAttrName($key, $this->get($key));
			default:
*/
		}
		return $this->get($key);
	}
	
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ���֥������Ȥ��ɲ�
		$this->set('user_status',1);
		$this->set('user_checked',0);
		$this->set('user_created_time', $timestamp);
		$this->set('user_updated_time', $timestamp);
		parent::add();
		
		// user_hash����������
		$this->set('user_hash', md5($this->getId()));
		$o = new Tv_User($this->backend, 'user_id', $this->getId());
		$o->set('user_hash', $this->get('user_hash'));
		return $o->update();
	}
	
	/**
	 *  ���֥������Ȥ򹹿�����
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('user_updated_time', $timestamp);
		return parent::update();
	}
	
	/**
	 *  ���֥������Ȥ������������
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// �����������¸����
		$this->set('user_deleted_time', $timestamp);
		// �������
		$this->set('user_status', 0);
		return parent::update();
	}
	
	/**
	 *  ������������
	 *
	 *  @access public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteImage()
	{
		// ��������
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'));
			// �������������
			$this->set('image_id', 0);
		}
		return $this->update();
	}
}

?>