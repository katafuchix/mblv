<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����ͧã�Ҳ�ʸ�����¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserFriendIntroductionList extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'from_user_id' => array(
			'name'		=> '�����桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'to_user_id' => array(
			'name'		=> '�����桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'from_user_nickname' => array(
			'name'		=> '�����桼���˥å��͡���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'to_user_nickname' => array(
			'name'		=> '�����桼���˥å��͡���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'friend_introduction' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ����ͧã�Ҳ�ʸ�����¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserFriendIntroductionList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_menu';
		
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
		// HIDDEN�ե���������
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'admin_user_friend_introduction_list';
	}
}
?>