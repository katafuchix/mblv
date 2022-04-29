<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����ͧã�Ҳ�ʸ�Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserFriendIntroductionEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'friend_id' => array(
			'name'		=> 'ͧãID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'friend_introduction' => array(
			'name'		=> '�Ҳ�ʸ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * ����ͧã�Ҳ�ʸ�Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserFriendIntroductionEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'admin_user_friend_introduction_edit';
		
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
		// ���֥������Ȥ����
		$friend =& new Tv_Friend($this->backend, 'friend_id', $this->af->get('friend_id'));
		// ���֥������Ȥ�ͭ���ʾ��
		if($friend->isValid()){
			$friend->set('friend_introduction', $this->af->get('friend_introduction'));
			$r = $friend->update();
			// �����ꥨ�顼�ξ��
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_DB);
				return 'admin_user_friend_introduction_edit';
			}
		}
		// ���֥������Ȥ�̵���ʾ��
		else{
			$this->ae->add(null, '', E_ADMIN_USER_FRIEND_INVALID);
			return 'admin_user_friend_introduction_list';
		}
		
		// �ե������ͤ򥯥ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_USER_FRIEND_INTRODUCTION_EDIT_DONE);
		return 'admin_user_friend_introduction_list';
	}
}
?>