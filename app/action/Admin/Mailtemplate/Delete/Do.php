<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����᡼��ƥ�ץ졼�Ⱥ�����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'mail_template_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������ƥ��������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateDeleteDo extends Tv_ActionAdminOnly
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
		// mail_template_id����᡼��ƥ�ץ졼�Ⱥ����ʪ��������ʤ���
		$ac =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		$ac->set('mail_template_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_mailtemplate_list';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_DELETE_DONE);
		$this->ae->add(null, '�᡼��ƥ�ץ졼�Ȥ������ޤ�����');
		return 'admin_mailtemplate_list';
	}
}
?>