<?php
/**
 * Tv_UserSound.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �桼��������ɥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSoundManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υ�����ɤ�������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	function status_off($user_id)
	{ 
		// �桼����������ɤ�̵���ˤ���
		$o = new Tv_UserSound($this->backend);
		$o_list = $o->searchProp(
			array('user_sound_id'),
			array(
				'user_id' => $user_id,
				'user_sound_status' => 1
			)
		); 
		// status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserSound($this->backend, 'user_sound_id', $v['user_sound_id']);
				if (!$o->isValid()) return false;
				$o->set('user_sound_status', 0);
				$o->set('user_sound_updated_time',$now);
				$o->set('user_sound_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * �桼��������ɥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSound extends Ethna_AppObject
{
}
?>