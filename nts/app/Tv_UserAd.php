<?php
/**
 * Tv_UserAd.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���[�U�L���}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserAdManager extends Ethna_AppManager
{
	/**
	 * �w�肵�����[�U�̍L�����폜����
	 * 
	 * @access public
	 * @param string $user_id ���[�UID
	 */
	function status_off($user_id)
	{ 
		// ���[�U�[�L���𖳌��ɂ���
		$o = new Tv_UserAd($this->backend);
		$o_list = $o->searchProp(
			array('user_ad_id'),
			array(
				'user_id' => $user_id,
				'user_ad_status' => 1
			)
		); 
		// status��"0:�폜"�ɂ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserAd($this->backend, 'user_ad_id', $v['user_ad_id']);
				if (!$o->isValid()) return false;
				$o->set('user_ad_status', 0);
				$o->set('user_ad_updated_time',$now);
				$o->set('user_ad_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ���[�U�L���I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserAd extends Ethna_AppObject
{
}
?>