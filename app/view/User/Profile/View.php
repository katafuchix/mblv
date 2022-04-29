<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
define('CONFIG_USER_PROF_ID', 0);
define('CONFIG_USER_PROF_NAME', 1);
define('CONFIG_USER_PROF_TYPE', 2);
define('USER_PROF_VALUE', 3);

/**
 * �ץ�ե�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserProfileView extends Tv_View_Footprint
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		parent::preforward();	// ­�פ�Ĥ���
		
		// �桼���������
		$userId = $this->af->get('user_id');
		$user = new Tv_User($this->backend, 'user_id', $userId);
		if(!$user->isValid()) return;
		$this->af->setApp('user', $user->getNameObject());
		
		// ��ʬ���ɤ���
		$userSession = $this->session->get('user');
		$isMyself = ($user->get('user_id') == $userSession['user_id']);
		$this->af->setApp('is_myself', $isMyself);
		
		// ͧã���ɤ���
		$tv_friend = new Tv_Friend($this->backend);
		$friend_id_list = $tv_friend->searchProp(
			array('friend_status'),
			array(
				'from_user_id' => $userSession['user_id'],
				'to_user_id' => $user->get('user_id'),
			)
		);
		if($friend_id_list[0] == 0 || $friend_id_list[1][0]['friend_status'] == 3){
			$this->af->setApp('friend_status', 0); // ͧã�Ǥʤ�
		}else if($friend_id_list[1][0]['friend_status'] == 1){
			$this->af->setApp('friend_status', 1); // ͧã��󥯿�����
		}else if($friend_id_list[1][0]['friend_status'] == 2){
			$this->af->setApp('friend_status', 2); // ͧã
		}
		
		// �֥�å��ꥹ����Ͽ����Ƥ��뤫start
		$bl = &new Tv_BlackList($this->backend);
		$bl_list = $bl->searchProp(
			array('black_list_status'), 
			array(
				'black_list_user_id' => $userSession['user_id'],
				'black_list_deny_user_id' => $user->get('user_id'),)
		);
		if($bl_list[1][0]['black_list_status'] == 1){
			$this->af->setApp('blacklist_status', 1); // BL��Ͽ����Ƥ���
		}else{
			$this->af->setApp('blacklist_status', 0); // BL��Ͽ����Ƥ��ʤ�
		}
		// �֥�å��ꥹ����Ͽ����Ƥ��뤫end
		
		// �����ĥ�å���������start
		$db = &$this->backend->getDB();
		$sql = 	"select b.bbs_id, b.from_user_id, b.to_user_id, u.user_nickname as from_user_nickname, u.image_id as user_image_id, b.bbs_body, b.bbs_created_time, b.image_id".
				" from bbs b join user u on b.from_user_id = u.user_id and u.user_status = 2 ".
				" where b.to_user_id = ? and b.bbs_status = 1 ".
				" order by b.bbs_created_time desc limit 5 ";
		$mb =& $db->db->getAll($sql, array($userId), DB_FETCHMODE_ASSOC);
		$this->af->setApp('bbs', $mb);
		// �����ĥ�å���������end
		
		// �ץ�ե�����Υ��ץ������ܤȤ��������ͤμ���
		$db = &$this->backend->getDB();
		$sql = "SELECT `config_user_prof`.`config_user_prof_id`,
				`config_user_prof`.`config_user_prof_name`,
				`config_user_prof`.`config_user_prof_type`,
				`user_prof`.`user_prof_value`
			FROM `config_user_prof`, `user_prof`
			WHERE `user_prof`.`user_id` = $userId
			AND `config_user_prof`.`config_user_prof_id` = `user_prof`.`config_user_prof_id`
			ORDER BY `config_user_prof`.`config_user_prof_order`";
		$result = &$db->query($sql);
		
		$userProfList = array();
		while($item = $result->fetchRow()){
			if(count($userProfList) && $item[CONFIG_USER_PROF_ID] == $userProfList[count($userProfList) - 1][CONFIG_USER_PROF_ID]){
				// 1�����ι��ܤ�Ʊ�����ܤξ��ʥ����å��ܥå����ѡ�
				$configUserProfOption = &new Tv_ConfigUserProfOption($this->backend,
					array('config_user_prof_id', 'config_user_prof_option_id'),
					array($item[CONFIG_USER_PROF_ID], $item[USER_PROF_VALUE])
					);
				$value = $configUserProfOption->get('config_user_prof_option_name');
				$userProfList[count($userProfList) - 1][USER_PROF_VALUE][] = $value;
			}else{
				if($item[CONFIG_USER_PROF_TYPE] >= 3){
					// ����褬������ܤ�������̾����������ơ�������ͤȤ���
					$configUserProfOption = &new Tv_ConfigUserProfOption($this->backend,
						array('config_user_prof_id', 'config_user_prof_option_id'),
						array($item[CONFIG_USER_PROF_ID], $item[USER_PROF_VALUE])
						);
					if($item[CONFIG_USER_PROF_TYPE] == 5) 
						// �����å��ܥå���
						$item[USER_PROF_VALUE] = array($configUserProfOption->get('config_user_prof_option_name'));
					else 
						// �����å��ܥå����ʳ�
						$item[USER_PROF_VALUE] = $configUserProfOption->get('config_user_prof_option_name');
				}else{
					// ������̵�����ܤ�$item[USER_PROF_VALUE]�򤽤Τޤ��ͤȤ���
					$item[USER_PROF_VALUE] = $item[USER_PROF_VALUE];
				}
				$userProfList[] = $item;
			}
		}
		$this->af->setApp('userProfList', $userProfList);
	}
}
?>