<?php
/**
 * Tv_Bbs.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ĥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BbsManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���������Ĥ�������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	function status_off($user_id)
	{ 
		// �����Ĥ���ɽ���ˤ���
		$b = new Tv_Bbs($this->backend);
		$b_list = $b->searchProp(
			array('bbs_id'),
			array(
				'to_user_id' => $user_id,
				'bbs_status' => 1
			)
		); 
		// bbs_status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($b_list[0] > 0) {
			foreach($b_list[1] as $v) {
				$b = new Tv_Bbs($this->backend, 'bbs_id', $v['bbs_id']);
				if (!$b->isValid()) return false;
				$b->set('bbs_status', 0);
				$b->set('bbs_updated_time',$now);
				$b->set('bbs_deleted_time',$now);
				$b->update();
			} 
		} 
	} 
	
	
	/**
	 * ���ꤷ���桼����ɽ�����Ƥ���ʬ�������ĥ��ơ���������ɥ��ơ��������ѹ�����
	 * 
	 * @access public
	 * @param string $listview_data
	 */
	 function updateNoticeList($listview_data)
	 {
		 $user = $this->session->get('user');
		 
		// �����ʥ�������
		if (!$this->session->isValid() || $user['user_id'] == ''){
				return;
		}
		
		foreach($listview_data as $k=>$v){
				$o = &new Tv_Bbs($this->backend, 'bbs_id', $v['bbs_id']);
				// ̤�ɤΥǡ����Ǥ���д��ɤ��ѹ�����
				if( $o->get('bbs_notice') == 1 && $user['user_id'] == $v['to_user_id'] ){
					$o->set('bbs_notice', 0);
					$o->update();
				}
		}
	 }
	 
}

/**
 * �����ĥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Bbs extends Ethna_AppObject
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
		$user = $this->session->get('user');
		// ���֥������Ȥ��ɲä���
		$this->set('from_user_id', $user['user_id']);
		$this->set('image_id', 0);
		$this->set('bbs_status', 1);
		$this->set('bbs_checked', 0);
		$this->set('bbs_created_time', $timestamp);
		$this->set('bbs_updated_time', $timestamp);
		parent::add();
		
		// bbs_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Bbs($this->backend, 'bbs_id', $id);
		$o->set('bbs_hash', $hash);
		$o->update();
		// bbs_hash�򥻥åȤ���
		$this->set('bbs_hash', $hash);
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
		$this->set('bbs_updated_time', $timestamp);
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
		// �����������¸����
		$this->set('bbs_deleted_time', $timestamp);
		// �������
		$this->set('bbs_status', 0);
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