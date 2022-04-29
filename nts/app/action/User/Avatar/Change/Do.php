<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ѹ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarChangeDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '�Վ����ގ��ʎގ���ID',
		),
		'cmd' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
			'name'		=> '���ώݎĎ�',
		),
		'return' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
			'name'		=> '���͎ߎ�����',
		),
	);
}

/**
 * �桼�����Х����ѹ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarChangeDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar_home';
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// �桼�����Х������ơ���������
		$timestamp = date('Y-m-d H:i:s');
		$ua =& new Tv_UserAvatar($this->backend, 'user_avatar_id', $this->af->get('user_avatar_id'));
		$ua->set('user_avatar_updated_time', $timestamp);
		// ��᥹�ơ��������ڤ��ؤ���
		if($ua->get('user_avatar_wear')==1 && $this->af->get('cmd') == 'off'){
			// æ��
			$ua->set('user_avatar_wear', 0);
		}elseif($ua->get('user_avatar_wear')==0 && $this->af->get('cmd') == 'on'){
			// ���
			$ua->set('user_avatar_wear', 1);
			// �⤷�����Х��������ƥ५�ƥ��꤬����1.��ס�2.�Ρס�3.ȱ�ס�4.���ȥåץ��ס�5.���ܥȥॹ�ס�6.�����ԡ����ס�8.��ʪ�ס�13.�طʡס�20. �����륤����פΤ�Τ���ᤷ����硢
			// �桼�����Х����ˤ��롢�������Х��������ƥ५�ƥ���Υ��Х�����æ�᤹��
			$a = new Tv_Avatar($this->backend, 'avatar_id', $ua->get('avatar_id'));
			if($a->isValid()){
				$ac = new Tv_AvatarCategory($this->backend, 'avatar_category_id', $a->get('avatar_category_id'));
				// ���Х��������ƥ५�ƥ���˳����򸡺�
				if($ac->isValid()){
					if(in_array($ac->get('avatar_system_category_id'), array(1,2,3,4,5,6,8,13,20))){
						$um = $this->backend->getManager('Util');
						$sess = $this->session->get('user');
						$user_id = $sess['user_id'];
						// �����Ρ��������Х��������ƥ५�ƥ�����Υ桼�����Х�������
						$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.user_avatar_wear = 1 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
						$sqlWhere .= '  AND ac.avatar_system_category_id = ?';
						$param = array(
							'sql_select'	=> '*',
							'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
							'sql_where'		=> $sqlWhere,
							'sql_values'	=> array($user_id, $ac->get('avatar_system_category_id')),
							'sql_order'		=> 'a.avatar_image1_z DESC',
						);
						$ua_list = $um->dataQuery($param);
						// �����桼�����Х�����¸�ߤ�����
						if(count($ua_list) > 0){
							// ����������Ф��٤�æ����֤˹���
							foreach($ua_list as $v){
								// æ��ե饰
								$hit = false;
								// ��4.���ȥåץ��פξ����ü�ǡ�Ʊ��Z���Τ�ΤΤߤ�æ����֤Ȥ���
								if($ac->get('avatar_system_category_id') == 4){
									if(
										// 1���ܤ�Z��ɸ�����
										(
											$a->get('avatar_image1_desc') && 
											(
												// ����оݤ�1���ܤ�2���ܤ�Z��ɸ�˹��פ��뤫Ĵ�٤�
												$a->get('avatar_image1_z') == $v['avatar_image1_z']
												||
												$a->get('avatar_image1_z') == $v['avatar_image2_z']
											)
										)
										||
										// 2���ܤ�Z��ɸ�����
										(
											$a->get('avatar_image2_desc') && 
											(
												// ����оݤ�1���ܤ�2���ܤ�Z��ɸ�˹��פ��뤫Ĵ�٤�
												$a->get('avatar_image2_z') == $v['avatar_image1_z']
												||
												$a->get('avatar_image2_z') == $v['avatar_image2_z']
											)
										)
									){
										$hit = true;
									}
								}
								// ����¾�Υ��Х��������ƥ५�ƥ���ξ��
								else{
									$hit = true;
								}
								
								// �����������æ����֤Ȥ���
								if($hit){
									$_ua = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v['user_avatar_id']);
									$_ua->set('user_avatar_wear', 0);
									$_ua->set('user_avatar_updated_time', $timestamp);
									$_ua->update();
									// ���顼����ϹԤ�ʤ�
								}
							}
						}
					}
				}
			}
		}else{
			// �㳰�Υ��ޥ��
			return 'user_avatar_home';
		}
		$r = $ua->update();
		if(Ethna::isError($r)) return 'user_avatar_home';
		
		$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
		// ���ڡ�������ޤäƤ�����
		if($this->af->get('return')){
			return 'user_avatar_' . $this->af->get('return');
		}else{
			return 'user_avatar_home';
		}
	}
}

?>
