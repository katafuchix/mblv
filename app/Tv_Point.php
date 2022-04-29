<?php
/**
 * Tv_Point.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �|�C���g�}�l�[�W��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_PointManager extends Ethna_AppManager
{
	/**
	 * �|�C���g�����Z����
	 * �uuser�v�Ƀ|�C���g���Z
	 * �upoint�v�Ƀ|�C���g���R�[�h���Z
	 * @param
	 *  user_id         ���[�UID
	 *  point           �t�^����|�C���g
	 *  point_type      �|�C���g�^�C�v
	 *  user_sub_id     ���[�U�T�uID
	 *  point_sub_id    �|�C���g�T�uID
	 *  point_status    �|�C���g�X�e�[�^�X�i0:����,1:�����F,2:���F�ς݁j
	 *  point_memo      �|�C���g����
	 * @return mixed
	*/
	function addPoint($param)
	{
		/*
		 * �p�����^�̎󂯎��
		 */
		// ���[�UID
		if(array_key_exists('user_id', $param)) $user_id = $param['user_id'];
		// �|�C���gID
		if(array_key_exists('point_id', $param)) $point_id = $param['point_id'];
		// �t�^�|�C���g
		if(array_key_exists('point', $param)) $point = $param['point'];
		// �|�C���g�^�C�v
		if(array_key_exists('point_type', $param)) $point_type = $param['point_type'];
		// ���[�U�T�uID
		if(array_key_exists('user_sub_id', $param)) $user_sub_id = $param['user_sub_id'];
		// �|�C���g�T�uID
		if(array_key_exists('point_sub_id', $param)) $point_sub_id = $param['point_sub_id'];
		// �|�C���g�X�e�[�^�X
		if(array_key_exists('point_status', $param)) $point_status = $param['point_status'];
		// �|�C���g����
		if(array_key_exists('point_memo', $param)) $point_memo = $param['point_memo'];
		
		/*
		 * �p�����^�`�F�b�N
		 */
		if(!$user_id) return false;
		if(!$point_type) $point_type = 0;
		if(!$user_sub_id) $user_sub_id = 0;
		if(!$point_sub_id) $point_sub_id = 0;
		if(!$point_status) $point_status = 0;
		
		$timestamp = date("Y-m-d H:i:s");
		
		// ���[�U�[�����擾
		$u =& new Tv_User($this->backend, 'user_id', $user_id);
		
		if($u->isValid()){
			
			// ���[�U�|�C���g�����擾
			$user_point = $u->get('user_point');
			// ����X�V���̃|�C���g�����v�Z
			$point_balance = $user_point + $point;
			
			// �|�C���g���������Z�b�g
			$u->set('user_point', $point_balance);
			// �|�C���g�t�^
			$r = $u->update();
			
			// �|�C���g�e�[�u���փ��R�[�h�쐬
			$p =& new Tv_Point($this->backend);
			$p->set('user_id', $user_id);
			$p->set('point', $point);
			$p->set('point_type', $point_type);
			$p->set('point_status', $point_status);
			$p->set('point_balance', $point_balance);
			$p->set('point_created_time', $timestamp);
			$p->set('point_updated_time', $timestamp);
			
			if($user_sub_id){
				$p->set('user_sub_id', $user_sub_id);
			}
			if($point_sub_id){
				$p->set('point_sub_id', $point_sub_id);
			}
			if($point_memo){
				$p->set('point_memo', $point_memo);
			}
			// �ǉ�
			$r = $p->add();
			
			// �N�G���G���[�łȂ��ꍇ
			if(!Ethna::isError($r)){
				// �|�C���gID��ԋp
				return $p->getId();
			}
		}
		
		return false;
	}
	
	/**
	 * �w�肵�����[�U�̃|�C���g�𖳌��ɂ���
	 * 
	 * @access     public
	 * @param string $user_id ���[�UID
	 */
	function statusOff($user_id)
	{ 
		// ���[�U�[�|�C���g�𖳌��ɂ���
		$o = new Tv_Point($this->backend);
		$o_list = $o->searchProp(
			array('point_id'),
			array(
				'user_id' => $user_id,
				'point_status' => 1
			)
		); 
		// status��"0:�폜"�ɂ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_Point($this->backend, 'point_id', $v['point_id']);
				if (!$o->isValid()) return false;
				$o->set('point_status', 0);
				$o->set('point_updated_time',$now);
				$o->set('point_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
	
	/**
	 * �w�肵�����[�U�̏��F�ς݃|�C���g�𖳌��ɂ���
	 * ���[�U�[�މ�̂ݖ����ɂ���
	 * @access     public
	 * @param string $user_id ���[�UID
	 */
	function statusForceOff($user_id)
	{ 
		// ���[�U�[�|�C���g�𖳌��ɂ���
		$o = new Tv_Point($this->backend);
		$o_list = $o->searchProp(
			array('point_id'),
			array(
				'user_id' => $user_id,
				'point_status' => 2
			)
		); 
		// status��"0:�폜"�ɂ���
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_Point($this->backend, 'point_id', $v['point_id']);
				if (!$o->isValid()) return false;
				$o->set('point_status', 0);
				$o->set('point_updated_time',$now);
				$o->set('point_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * �|�C���g�I�u�W�F�N�g
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Point extends Ethna_AppObject
{
}
?>