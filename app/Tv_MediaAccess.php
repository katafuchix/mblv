<?php
/**
 * Tv_MediaAccess.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���f�B�A�}�l�[�W��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaAccessManager extends Ethna_AppManager
{
}

/**
 * ���f�B�A�A�N�Z�X�I�u�W�F�N�g
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaAccess extends Ethna_AppObject
{
	/**
	 *  �I�u�W�F�N�g��ǉ�����
	 *
	 *  @access     public
	 *  @return mixed   0:����I�� Ethna_Error:�G���[
	 */
	function add()
	{
		// �I�u�W�F�N�g�̒ǉ�
		$this->set('media_access_status',0);// status:0�i�A�N�Z�X�ς݁j
		parent::add();
		
		// media_access_hash�𐶐�����
		$um = $this->backend->getManager('Util');
		$this->set('media_access_hash', $um->getUniqId());
		$o = new Tv_MediaAccess($this->backend, 'media_access_id', $this->getId());
		$o->set('media_access_hash', $this->get('media_access_hash'));
		return $o->update();
	}
}
?>