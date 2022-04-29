<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������Х�����º���¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAvatarstandDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'avatar_stand_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������Х�����º���¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarstandDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// ���Х�����º����ʪ��������ʤ�
		$ac =& new Tv_AvatarStand($this->backend, 'avatar_stand_id', $this->af->get('avatar_stand_id'));
		$ac->set('avatar_stand_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatarstand_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_DELETE_DONE);
		return 'admin_avatarstand_list';
	}
}
?>