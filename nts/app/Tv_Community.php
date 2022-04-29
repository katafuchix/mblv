<?php
/**
 * Tv_Community.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ߥ�˥ƥ��ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityManager extends Ethna_AppManager
{
	/**
	 * ���ߥ�˥ƥ���������
	 * 
	 * @access public
	 * @param string $communityId ������륳�ߥ�˥ƥ���ID
	 */
	function delete($communityId)
	{
		$community = &new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
			);
		if (!$community->isValid()) {
			return Ethna::raiseError('���ߥ�˥ƥ���¸�ߤ��ޤ���', E_COMMUNITY_NOT_FOUND);
		} 
		$community->set('community_deleted_time', date('Y-m-d H:i:s'));
		$community->set('community_status', 0);
		$community->update();
	} 

	/**
	 * ���ߥ�˥ƥ���ɽ���ե饰��OFF�ˤ���
	 * 
	 * @access public
	 * @param string $communityId ɽ���ե饰��OFF�ˤ��륳�ߥ�˥ƥ���ID
	 */
	function status_off($communityId)
	{
		$community = &new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
			);
		if (!$community->isValid()) {
			return false;
		} 
		$community->set('community_status', 3);
		$community->update();
	} 
} 

/**
 * ���ߥ�˥ƥ����֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Community extends Ethna_AppObject
{
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
		$this->set('community_status', 1);
		$this->set('community_checked', 0);
		$this->set('community_member_num', 1);
		$this->set('image_id', 0);
		$this->set('community_created_time', $timestamp);
		$this->set('community_updated_time', $timestamp);
		parent::add();
		
		// community_hash������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Community($this->backend, 'community_id', $id);
		$o->set('community_hash', $hash);
		$o->update();
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
		$this->set('community_updated_time', $timestamp);
		parent::update();
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
		// ������������¸����
		$this->set('community_deleted_time', $timestamp);
		// �������
		$this->set('community_status', 0);
		parent::update();
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
			
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
} 
?>
