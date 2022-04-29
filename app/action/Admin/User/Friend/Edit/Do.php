<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����桼��ͧã�����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserFriendEditDo extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'required'	=> true,
		),
		'check' => array(
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'type'		=> array(VAR_TYPE_INT),
		),
		'friend_status' => array(
			'name'		=> 'ͧã����',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'option'	=> array(
				//1 => array('name' => '������'),
				2 => 'ͧã',
				3 => 'ͧã�ǤϤʤ�',
			),
			'min'		=> 2,
			'max'		=> 3,
		),
		'update' => array(
			'name'		=> '�¹�',
		),
	);
}

/**
 * �����桼��ͧã�����Խ��¹ԥ��饹
 * 
 * �桼��ͧã�����Խ����̤ν��Ͻ���
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserFriendEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'admin_user_friend_list';
		}
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// ID�������å����줿���ɤ�����ǧ��Ԥ�
		if(!is_array($this->af->get('check'))){
			$this->ae->add(null, 'ͧã�����򤷤Ʋ�����');
			return 'admin_user_friend_list';
		}
		foreach($this->af->get('check') as $userId)
		{
			$friend =& new Tv_Friend(
				$this->backend,
				array('from_user_id', 'to_user_id'),
				array($this->af->get('user_id'), $userId)
			);
			$friendReverse =& new Tv_Friend(
				$this->backend,
				array('from_user_id', 'to_user_id'),
				array($userId, $this->af->get('user_id'))
			);
			
			if(!$friend->isValid()){
				$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
				continue;
			}elseif($friend->get('friend_status') == 1){
				$this->ae->add(null, '', E_ADMIN_USER_FRIEND_EDIT_APPLYING);
				continue;
			}elseif(!$friendReverse->isValid()){
				$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
				continue;
			}
			$friend->set(
				'friend_status',
				$this->af->get('friend_status')
			);
			$r = $friend->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
			$friendReverse->set(
				'friend_status',
				$this->af->get('friend_status')
			);
			$r = $friendReverse->update();
			if(PEAR::isError($r)){
				$this->ae->add(null, '', I_ADMIN_DB);
			}
		}
		//$this->ae->add(null, '', I_ADMIN_USER_FRIEND_EDIT_DONE);
		return 'admin_user_friend_list';
	}
}
?>