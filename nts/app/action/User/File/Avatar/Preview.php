<?php
/**
 * Preview.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ץ�ӥ塼���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileAvatarPreview extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'attr' => array(
			'type'  => VAR_TYPE_STRING,
		),
		'place' => array(
			'type'  => VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����Х����ץ�ӥ塼���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileAvatarPreview extends Tv_ActionUser //Only
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) exit;
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
		$um = $this->backend->getManager('Util');
		// �桼��ID���������
		$user_id = $this->af->get('user_id');
		// �ѥ�᥿�˥桼��ID��������Ϥ������ͥ�褹��
		if(!$user_id){
			// ���å���󤫤�桼��������������
			$user = $this->session->get('user');
			$user_id = $user['user_id'];
			// ���å���󤫤饢�Х���������������
			$cart_avatar = $this->session->get('cart_avatar');
		}
		// �桼��������������
		$u =& new Tv_User($this->backend, 'user_id', $user_id);
		// ���Х��������������
		$avatar_config_first = $u->get('avatar_config_first');
		// �ǥե���ȥ��Х���������������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,avatar_category as ac',
			'sql_where'		=> 'a.avatar_status = 1 AND a.default_avatar = 1 AND a.avatar_sex_type = ? AND a.avatar_category_id = ac.avatar_category_id',
			'sql_values'	=> array($u->get('user_sex')),
			'sql_order'		=> 'a.avatar_image1_z DESC',
		);
		$da_list = $um->dataQuery($param);
//print_r($da_list);exit;
		
		// �桼�����Х�����������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.user_avatar_wear = 1 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id',
			'sql_values'	=> array($user_id),
			'sql_order'		=> 'a.avatar_image1_z DESC',
		);
		$ua_list = $um->dataQuery($param);
//print_r($ua_list);
		
		if(is_array($cart_avatar) && in_array($this->af->get('place'), array('cart','config_confirm'))){
			// ������夹�륢�Х�����������
			foreach($cart_avatar as $v){
				if($v['avatar_id'] && $v['avatar_wear']){
					// ���Х������󡢥��Х������ƥ����������
					$param = array(
						'sql_select'	=> '*',
						'sql_from'		=> 'avatar as a,avatar_category as ac',
						'sql_where'		=> 'a.avatar_id = ? AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id',
						'sql_values'	=> array($v['avatar_id']),
						'sql_order'		=> 'a.avatar_image1_z DESC',
					);
					$r = $um->dataQuery($param);
					if(count($r) > 0){
						// [�롼��7]������˥��Х��������ƥ५�ƥ����1.��ס�2.�Ρס�3.ȱ�ס�4.���ȥåץ��ס�5.���ܥȥॹ�ס�6.�����ԡ����ס�8.��ʪ�ס�13.�طʡס�20. �����륤����פΤ�Τ���ᤷ����硢
						// �桼�����Х����ˤ��롢�������Х��������ƥ५�ƥ���Υ��Х�����æ�᤹��
						if(in_array($r[0]['avatar_system_category_id'], array(1,2,3,4,5,6,8,13,20))){
							foreach($ua_list as $j => $l){
								// ����������Ф��٤�æ����֤˹���
								if($l['avatar_system_category_id'] == $r[0]['avatar_system_category_id']){
									// æ��ե饰
									$hit = false;
									// ��4.���ȥåץ��פξ����ü�ǡ�Ʊ��Z���Τ�ΤΤߤ�æ����֤Ȥ���
									if($l['avatar_system_category_id'] == 4){
										if(
											// 1���ܤ�Z��ɸ�����
											(
												$l['avatar_image1_desc'] && 
												(
													// ����оݤ�1���ܤ�2���ܤ�Z��ɸ�˹��פ��뤫Ĵ�٤�
													$l['avatar_image1_z'] == $r[0]['avatar_image1_z']
													||
													$l['avatar_image1_z'] == $r[0]['avatar_image2_z']
												)
											)
											||
											// 2���ܤ�Z��ɸ�����
											(
												$l['avatar_image2_desc'] && 
												(
													// ����оݤ�1���ܤ�2���ܤ�Z��ɸ�˹��פ��뤫Ĵ�٤�
													$l['avatar_image2_z'] == $r[0]['avatar_image1_z']
													||
													$l['avatar_image2_z'] == $r[0]['avatar_image2_z']
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
										unset($ua_list[$j]);
									}
								}
							}
						}
						// �桼������˻��夹�륢�Х��������ޡ���
						$ua_list[] = $r[0];
					}
				}
			}
		}
		
		// �ᥤ�󥢥Х����ꥹ�Ȥ�����
		$avatar_list = $ua_list;
		
//p($avatar_list,true);
		
		// �������Ԥ�
		// [�롼��1]Ʊ�쥷���ƥ५�ƥ���˥ǥե���ȥ��Х���������ˤ⤫����餺���桼�����Х�����¸�ߤ�����ϥǥե���ȥ��Х������˴�����
		// [�롼��2]Ʊ��Z����˥ǥե���ȥ��Х���������ˤ⤫����餺���桼�����Х�����¸�ߤ�����ϥǥե���ȥ��Х������˴�����
		// �ʲ����٤ƤΥǥե���ȥ��Х������Ф��ƽ�����Ԥ�
		foreach($da_list as $k => $v){
			$hit = false;
			foreach($ua_list as $i => $j){
				// [�롼��1]�ǥե���ȥ��Х������˴�
				if($j['avatar_system_category_id'] == $v['avatar_system_category_id']) $hit = true;
				// [�롼��2]�ǥե���ȥ��Х������˴�
				if($j['avatar_image1_z'] != 0){
					if(
						$j['avatar_image1_z'] == $v['avatar_image1_z']
						||
						$j['avatar_image1_z'] == $v['avatar_image2_z']
					){
						$hit = true;
					}
				}
				if($j['avatar_image2_z'] != 0){
					if(
						$j['avatar_image2_z'] == $v['avatar_image1_z']
						||
						$j['avatar_image2_z'] == $v['avatar_image2_z']
					){
						$hit = true;
					}
				}
			}
			if(!$hit) $avatar_list[] = $v;
		}
		
//p($avatar_list,true);
		
		// [�롼��3]�����ƥ५�ƥ����4.���ȥåץ��ס�5.���ܥȥॹ�פ˥桼�����Х�����̵���������ƥ५�ƥ����7.������ʡ��ʲ���ˡפ˲������饢�Х������������4.���ȥåץ��ס�5.���ܥȥॹ�פΥǥե���ȥ��Х������˴���
		// [�롼��4]�����ƥ५�ƥ����6.�����ԡ����פ˥桼�����Х����������硢��4.���ȥåץ��ס�5.���ܥȥॹ�פΤ��٤ƤΥ��Х������˴���
		// [�롼��6]�����ƥ५�ƥ����20.�����륤����פ˥桼�����Х����������硢��4.���ȥåץ��ס�5.���ܥȥॹ�ס�6.�����ԡ����ס�8.��ʪ�פΤ��٤ƤΥ��Х������˴������Υ롼���[�롼��3][�롼��4]�ξ�̸��¤��ġ�
		// ������
		$select3 = array(4,5);
		$_select3 = false;
		$select4 = array(6);
		$_select4 = false;
		$select6 = array(20);
		$_select6 = false;
		// �Ѵ����
		$replace3 = array(7);
		$_replace3 = false;
		$replace4 = array(4,5);
		$replace6 = array(4,5,6,8);
		// ���٤ƤΥ桼�����Х������Ф��ƽ�����Ԥ�
		foreach($ua_list as $k => $v){
			// ������˹��פ��뤫�ɤ���Ĵ�٤�
			if(in_array($v['avatar_system_category_id'], $select3) && !$v['default_avatar']) $_select3 = true;
			if(in_array($v['avatar_system_category_id'], $select4) && !$v['default_avatar']) $_select4 = true;
			if(in_array($v['avatar_system_category_id'], $select6) && !$v['default_avatar']) $_select6 = true;
			// �Ѵ����˹��פ��뤫�ɤ���Ĵ�٤�
			if($v['avatar_system_category_id'] == $replace3) $_replace3 = true;
		}
		// [6]�����郎��������Ƥ���аʲ�������¹�
		if($_select6){
			foreach($avatar_list as $k => $v){
				// �����Υ����ƥ५�ƥ���ˤ��륢�Х����ǡ�����õ�
				if(in_array($v['avatar_system_category_id'], $replace6)) unset($avatar_list[$k]);
			}
		}
		// ��̸��¤Υ롼�뤬���Ԥ���ʤ����ʲ���¹�
		else{
			// [3]������Ѵ����Ȥ����������Ƥ���аʲ�������¹�
			// �����ƥ५�ƥ����4.���ȥåץ��ס�5.���ܥȥॹ�פ˥桼�����Х�����̵��
			// �����ƥ५�ƥ����7.������ʡ��ʲ���ˡפ˲������饢�Х���������
			if(!$_select3 && $_replace3){
				foreach($avatar_list as $k => $v){
					// �����Υ����ƥ५�ƥ���ˤ��륢�Х����ǡ�����õ�
					if(in_array($v['avatar_system_category_id'], $replace3)) unset($avatar_list[$k]);
				}
			}
			// [4]�����郎��������Ƥ���аʲ�������¹�
			// �����ƥ५�ƥ����6.�����ԡ����פ˥桼�����Х���������
			if($_select4){
				foreach($avatar_list as $k => $v){
					// �����Υ����ƥ५�ƥ���ˤ��륢�Х����ǡ�����õ�
					if(in_array($v['avatar_system_category_id'], $replace4)) unset($avatar_list[$k]);
				}
			}
		}
//p($avatar_list,true);
		
		// �쥤�䡼�������������
		// [�롼��5]�桼�������Х����������򽪤��Ƥ��롢�ޤ��Ͻ�������ǧ�ڡ����ξ�硢�����ƥ५�ƥ����19.���̤����פΤ��٤ƤΥ��Х������˴���
		$layer_list = array();
		foreach($avatar_list as $k => $v){
			// [5]
			if(
				($avatar_config_first || $this->af->get('place') == 'config_confirm')
				&&
				$v['avatar_system_category_id'] == 19
			){
				continue;
			}
			if($v['avatar_image1_desc']){
				$data[0][] = $v['avatar_image1_z'];
				$data[1][] = $v['avatar_image1_desc'];
			}
			if($v['avatar_image2_desc']){
				$data[0][] = $v['avatar_image2_z'];
				$data[1][] = $v['avatar_image2_desc'];
			}
		}
//print_r($data);exit;
		
		// �쥤�䡼���¤��ؤ��򤹤�
//		array_multisort($z, SORT_DESC, SORT_NUMERIC, $image, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_DESC, $image, SORT_DESC, $data);
//		array_multisort($z, SORT_NUMERIC, SORT_DESC, $image, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_NUMERIC, SORT_ASC, $data);
//		array_multisort($data[0], SORT_NUMERIC, SORT_DESC, $data[1], SORT_NUMERIC, SORT_DESC);
		if(count($data[0]) > 0){
			array_multisort($data[0], SORT_NUMERIC, SORT_ASC, $data[1], SORT_NUMERIC, SORT_ASC);
		}
//print_r($data);exit;
		// ���Х����Υץ�ӥ塼������
		$avatar =& $this->backend->getManager('AvatarGenerator');
		$avatar->set_background("#ffffff");
		// �������η���
		$attr = $this->af->get('attr');
		if(!$this->af->get('attr')) $attr = 's';
		$avatar->set_width($this->config->get("avatar_{$attr}_width"));
		$avatar->set_height($this->config->get("avatar_{$attr}_height"));
		// �ڤ�Ф��������η���
		if($attr != 's'){
			$avatar->set_base(
				$this->config->get("avatar_{$attr}_base_x"),
				$this->config->get("avatar_{$attr}_base_y"),
				$this->config->get("avatar_{$attr}_base_w"),
				$this->config->get("avatar_{$attr}_base_h")
			);
		}
		// ���Х����ե�����̾�μ���
		if(count($data[1]) > 0){
			while (list ($k, $v) = each ($data[1])){
				$avatar->add_layer($this->config->get('file_path') . 'avatar/' . $v);
			}
		}
		// ����
		$avatar->build();
		exit;
	}
}

?>
