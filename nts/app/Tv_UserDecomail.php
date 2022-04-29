<?php
/**
 * Tv_UserDecomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���[�U�f�R���[���}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserDecomailManager extends Ethna_AppManager
{
	/**
	 * �w�肵�����[�U�̃f�R���[�����폜����
	 * 
	 * @access public
	 * @param string $user_id ���[�UID
	 */
	function status_off($user_id)
	{ 
		// ���[�U�[�f�R���[���𖳌��ɂ���
		$o = new Tv_UserDecomail($this->backend);
		$o_list = $o->searchProp(
			array('user_decomail_id'),
			array(
				'user_id' => $user_id,
				'user_decomail_status' => 1
			)
		); 
		// status��"0:�폜"�ɂ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserDecomail($this->backend, 'user_decomail_id', $v['user_decomail_id']);
				if (!$o->isValid()) return false;
				$o->set('user_decomail_status', 0);
				$o->set('user_decomail_updated_time',$now);
				$o->set('user_decomail_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ���[�U�f�R���[���I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserDecomail extends Ethna_AppObject
{
}
?>