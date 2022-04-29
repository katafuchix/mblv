<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����ͧã�Ҳ�ʸ�Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserFriendIntroductionEdit extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'friend_id' => array(
			'name'		=> 'ͧãID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}

/**
 * ����ͧã�Ҳ�ʸ�Խ����������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserFriendIntroductionEdit extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_user_friend_introduction_list';
		
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
		$friend =& new Tv_Friend(
			$this->backend,
			'friend_id',
			$this->af->get('friend_id')
		);
		if($friend->isValid()){
			$friend->exportForm();
		}else{
			$this->ae->add(null, '', E_ADMIN_USER_FRIEND_INVALID);
			return 'admin_user_friend_introduction_list';
		}
		
		return 'admin_user_friend_introduction_edit';
	}
}
?>