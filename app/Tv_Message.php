<?php
/**
 * Tv_Message.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��å������ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MessageManager extends Ethna_AppManager {
	
	/**
	 * ���ꤷ���桼���Υ�å�������������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOff($user_id)
	{ 
		// ��å���������ɽ���ˤ���
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'to_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
	} 
	
	/**
	 * ��񤷤��桼���Υ�å������򤹤٤ƺ������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOffResign($user_id)
	{ 
		// to_user_id
		// ��å���������ɽ���ˤ���
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'to_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
		
		// from_user_id
		// ��å���������ɽ���ˤ���
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'from_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
		
	} 
} 

/**
 * ��å��������֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Message extends Ethna_AppObject
{
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// ���֥������Ȥ��ɲ�
		$this->set('from_user_id', $user['user_id']);
		$this->set('message_status', 1);
		$this->set('message_checked', 0);
		$this->set('message_status_from', 2);
		$this->set('message_status_to', 1);
		$this->set('image_id', 0);
		$this->set('message_created_time', $timestamp);
		$this->set('message_updated_time', $timestamp);
		parent::add();
		
		// message_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Message($this->backend, 'message_id', $id);
		$o->set('message_hash', $hash);
		$o->update();
		// message_hash�򥻥åȤ���
		$this->set('message_hash', $hash);
		
		//��å����������뤳�Ȥ�桼������E�᡼��Ǥ��Τ餻 start
		$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
		// �᡼�����������ǧ
		if($to_user->get('user_message_2_status')){
			$to_user_hash = $to_user->get('user_hash');
			$to_user_nickname = $to_user->get('user_nickname');
			$to_user_mailaddress = $to_user->get('user_mailaddress');
			
			$ms = new Tv_Mail($this->backend);
			$value = array (
				'from_user_nickname' => $user['user_nickname'],
				'to_user_nickname' => $to_user_nickname,
			);
			$ms->sendOne($to_user_mailaddress , 'user_got_message' , $value );
		}
		//��å����������뤳�Ȥ�桼������E�᡼��Ǥ��Τ餻 end
		
		return true;
	}
	
	/**
	 *  ���֥������Ȥ򹹿�����
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('message_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  ��å������������������
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('message_deleted_time', $timestamp);
		// �������
		$this->set('message_status_from', 3);
		$this->set('message_status_to', 3);
		parent::update();
	}
	
	/**
	 *  ������������
	 *
	 *  @access     public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteImage()
	{
		// ��������
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'),'message',$this->get('message_id'));
			
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  ư���������
	 *
	 *  @access     public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteMovie()
	{
		// ư�����
		if($this->get('movie_id')) {
			$im =& $this->backend->getManager('Movie');
			$im->remove($this->get('movie_id'),'message',$this->get('message_id'));
			// ư����������
			$this->set('movie_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  ���֥������Ȥ�������
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function remove()
	{
		// ��������
		$this->deleteImage();
		
		return parent::remove();
	}
} 
?>