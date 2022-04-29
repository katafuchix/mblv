<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ץ��ե�������ܺ���¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigUserProfOptionDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'config_user_prof_option_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����ץ��ե�������ܺ���¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminConfigUserProfOptionDeleteDo extends Tv_ActionAdminOnly
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
		// �������ʢ�ʪ���������
		$o = & new Tv_ConfigUserProfOption($this->backend, 'config_user_prof_option_id', $this->af->get('config_user_prof_option_id'));
		// ���
		$res = $o->remove();
		$this->ae->add(null, '', I_ADMIN_CONFIG_USER_PROF_OPTION_DELETE_DONE);
		return 'admin_config_user_prof';
	}
}
?>