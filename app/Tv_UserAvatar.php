<?php
/**
 * Tv_UserAvatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���[�U�A�o�^�[�}�l�[�W��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserAvatarManager extends Ethna_AppManager
{
	/**
	 * �w�肵�����[�U�̃A�o�^�[���폜����
	 * 
	 * @access     public
	 * @param string $user_id ���[�UID
	 */
	function statusOff($user_id)
	{ 
		// ���[�U�[�A�o�^�[�𖳌��ɂ���
		$o = new Tv_UserAvatar($this->backend);
		$o_list = $o->searchProp(
			array('user_avatar_id'),
			array(
				'user_id' => $user_id,
				'user_avatar_status' => 1
			)
		); 
		// blog_article_status��"0:�폜"�ɂ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v['user_avatar_id']);
				if (!$o->isValid()) return false;
				$o->set('user_avatar_status', 0);
				$o->set('user_avatar_updated_time',$now);
				$o->set('user_avatar_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ���[�U�A�o�^�[�I�u�W�F�N�g
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserAvatar extends Ethna_AppObject
{
}
?>