<?php
/**
 * Tv_ActionAdminOnly.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ԤΤߤ����������Ǥ��륢�������δ��쥯�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Tv_ActionAdmin.php';
class Tv_ActionAdminOnly extends Tv_ActionAdmin
{
	/**
	 * ǧ��
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		// ���ܾ�����������
		parent::setSnsInfo();
		
		// ���å���󤬳��Ϥ��Ƥ��뤳�Ȥ�����
		if ( !$this->session->isStart() ) {		// ���å�����ڤ�
			// �����Ԥ�ǰ�Τ��ᡢ�����ԥ⡼�ɤ��ɤ�����ǧ
			$s = $this->session->get('admin');
			if(!$s){
				return 'admin_index';
			}
		}
		
		// �������¥����å�
		if (!$this->adminAuthActionCheck()
			&& $this->backend->ctl->getCurrentActionName() != 'admin_logout_do'
			&& $this->backend->ctl->getCurrentActionName() != 'admin_index') {
			
			return 'admin_index';
		}
		return parent::authenticate();
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return parent::perform();
	}
	
	/**
	 * ���ơ��������ƻ륹�ơ�������������
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	 /**
	  * ���׷�
	  	1. �ִƻ륹�ơ������ס�̤��ǧ�פ�ʪ��HIDDEN���褿���ϡִƻ륹�ơ������פ�ֳ�ǧ�ѡפȤ���
	  	2. �ִƻ륹�ơ������סֳ�ǧ�ѡפ�ʪ��HIDDEN���褿���ϡ��ִƻ륹�ơ������פ˴ؤ��ƤϹ������ƤϤ����ʤ�
	  	3. �֥��ơ������ס�ɽ���פ�ʪ��CHECKBOX���褿���ϡ��֥��ơ������פ����ɽ���פȤ���
	  	4. �֥��ơ������ס���ɽ���פ�ʪ��CHECKBOX���褿���ϡ��֥��ơ������פ��ɽ���פȤ���
	  	5. �ִƻ륹�ơ������ס֥��ơ������פȤ���ѹ�����ɬ�פ��ʤ����ϥ��֥������Ȥ򹹿����ƤϤ����ʤ�
	  */
	function updateStatusAll($object_name)
	{
		$primary_key = $object_name . '_id';
		$status_column = $object_name . '_status';
		$checked_column = $object_name . '_checked';
		$deleted_column = $object_name . '_deleted_time';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		$id = $this->af->get('id');
		$check = $this->af->get('check');
		$checked = false;
		
		// ���ơ������ѹ�
		if(is_array($id)){
			if(is_array($check)) $checked = true;
			foreach($id as $v){
				// �������ͤ��ʤ����ϰʲ��ν����򤷤ʤ�
				if(!$v) continue;
				// ���ơ������˹�������ɬ�פ����뤫�ɤ���
				$_status = false;
				// �ƻ륹�ơ������˹�������ɬ�פ����뤫�ɤ���
				$_checked = false;
				
				// �оݤΥ��֥������Ȥ��������
				$o = new $class_name($this->backend, $primary_key, $v);
				// ����ν�������ɽ�������å���������
				if($checked){
					// ��ɽ�������å�������
					if(in_array($v, $check)){
						// ���֥������Ȥ�ɽ��
						if($o->get($status_column) == 1){
							// ���֥������Ȥ���ɽ������
							$_status = true;
							$status = 0;
						}
					}
					// ��ɽ�������å����ʤ�
					else{
						// ���֥������Ȥ���ɽ��
						if($o->get($status_column) == 0){
							// ���֥������Ȥ�ɽ������
							$_status = true;
							$status = 1;
						}
					}
				}
				// ����ν����˥����å����ʤ����
				else{
					// ���֥������Ȥ���ɽ��
					if($o->get($status_column) == 0){
						// ���֥������Ȥ�ɽ������
						$_status = true;
						$status = 1;
					}
				}
				// �ƻ륹�ơ�������̤�ƻ�
				if(array_key_exists($checked_column, $o->getDef())
					&& $o->get($checked_column) == 0){
					// ���֥������ȴƻ륹�ơ�������ƻ�Ѥߤˤ������
					$_checked = true;
				}
				// ���֥������ȥ��ơ������򹹿�����ɬ�פ�������
				if($_status){
					// ���֥������Ȥ�ɽ���ˤ���
					if($status == 1){
						$o->set($status_column, 1);
						$this->ae->add('errors', "ID:{$v}��ɽ���ˤ��ޤ�����");
					}
					// ���֥������Ȥ���ɽ���ˤ���
					else{
						$o->set($status_column, 0);
						$this->ae->add('errors', "ID:{$v}����ɽ���ˤ��ޤ�����");
					}
				}
				// ���֥������ȴƻ륹�ơ������򹹿�����ɬ�פ�������
				if($_checked){
					// ���֥������Ȥ�ƻ�Ѥߤˤ���
					if($_checked){
						$o->set($checked_column, 1);
					}
				}
				// ���֥������Ȥ򹹿�����ɬ�פ�������
				if($_status || $_checked){
					// ����
					$o->update();
				}
			}
		}
		
		// ���٤�ƻ���֤򹹿������hidden��;�פ�Value����äƤ��ޤ�������������
		$this->af->set('id', array());
		$this->af->set('check', array());
		
		$this->ae->add(null, '', I_ADMIN_UPDATE_STATUS_ALL_DONE);
	}
	
	/**
	 * ͧã���ơ��������ƻ륹�ơ�������������
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	 /**
	  * ���׷�
	  	1. �ִƻ륹�ơ������ס�̤��ǧ�פ�ʪ��HIDDEN���褿���ϡִƻ륹�ơ������פ�ֳ�ǧ�ѡפȤ���
	  	2. �ִƻ륹�ơ������סֳ�ǧ�ѡפ�ʪ��HIDDEN���褿���ϡ��ִƻ륹�ơ������פ˴ؤ��ƤϹ������ƤϤ����ʤ�
	  	3. �֥��ơ������ס�ɽ���פ�ʪ��CHECKBOX���褿���ϡ��֥��ơ������פ����ɽ���פȤ���
	  	4. �֥��ơ������ס���ɽ���פ�ʪ��CHECKBOX���褿���ϡ��֥��ơ������פ��ɽ���פȤ���
	  	5. �ִƻ륹�ơ������ס֥��ơ������פȤ���ѹ�����ɬ�פ��ʤ����ϥ��֥������Ȥ򹹿����ƤϤ����ʤ�
	  	6.  friend_status �ե��ɥ��ơ����� ��1:������, 2:ͧã��, 3:ͧã�ǤϤʤ���
	  */
	function updateFriendStatusAll($object_name)
	{
		$primary_key = $object_name . '_id';
		$status_column = $object_name . '_status';
		$checked_column = $object_name . '_checked';
		$deleted_column = $object_name . '_deleted_time';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		$id = $this->af->get('id');
		$check = $this->af->get('check');
		$checked = false;
		
		// ���ơ������ѹ�
		if(is_array($id)){
			if(is_array($check)) $checked = true;
			foreach($id as $v){
				// �������ͤ��ʤ����ϰʲ��ν����򤷤ʤ�
				if(!$v) continue;
				// ���ơ������˹�������ɬ�פ����뤫�ɤ���
				$_status = false;
				// �ƻ륹�ơ������˹�������ɬ�פ����뤫�ɤ���
				$_checked = false;
				
				// �оݤΥ��֥������Ȥ��������
				$o = new $class_name($this->backend, $primary_key, $v);
				// ����ν�������ɽ�������å���������
				if($checked){
					// ��ɽ�������å�������
					if(in_array($v, $check)){
						// ���֥������Ȥ�ɽ��
						// ͧã������⤷���Ϥ��Ǥ�ͧã
						if($o->get($status_column) == 1 || $o->get($status_column) == 2){
							// ���֥������Ȥ���ɽ������
							$_status = true;
							$status = 0;
						}
					}
					// ��ɽ�������å����ʤ�
					else{
						// ���֥������Ȥ���ɽ��
						if($o->get($status_column) == 0){
							// ���֥������Ȥ�ɽ������
							$_status = true;
							$status = 1;
						}
					}
				}
				// ����ν����˥����å����ʤ����
				else{
					// ���֥������Ȥ���ɽ��
					if($o->get($status_column) == 0){
						// ���֥������Ȥ�ɽ������
						$_status = true;
						$status = 1;
					}
				}
				// �ƻ륹�ơ�������̤�ƻ�
				if(array_key_exists($checked_column, $o->getDef())
					&& $o->get($checked_column) == 0){
					// ���֥������ȴƻ륹�ơ�������ƻ�Ѥߤˤ������
					$_checked = true;
				}
				// ���֥������ȥ��ơ������򹹿�����ɬ�פ�������
				if($_status){
					// ���֥������Ȥ�ɽ���ˤ���
					if($status == 1){
						$o->set($status_column, 2);
						$this->ae->add('errors', "ID:{$v}��ɽ���ˤ��ޤ�����");
					}
					// ���֥������Ȥ���ɽ���ˤ���
					else{
						$o->set($status_column, 3);
						$this->ae->add('errors', "ID:{$v}����ɽ���ˤ��ޤ�����");
					}
				}
				// ���֥������ȴƻ륹�ơ������򹹿�����ɬ�פ�������
				if($_checked){
					// ���֥������Ȥ�ƻ�Ѥߤˤ���
					if($_checked){
						$o->set($checked_column, 1);
					}
				}
				// ���֥������Ȥ򹹿�����ɬ�פ�������
				if($_status || $_checked){
					// ����
					$o->update();
				}
			}
		}
		
		// ���٤�ƻ���֤򹹿������hidden��;�פ�Value����äƤ��ޤ�������������
		$this->af->set('id', array());
		$this->af->set('check', array());
		
		$this->ae->add(null, '', I_ADMIN_UPDATE_STATUS_ALL_DONE);
	}
}
?>