<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����᡼��ƥ�ץ졼����Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'mail_template_code' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '�᡼��ƥ�ץ졼��̾',
			'option'		=> 'Util, mail_template',
		),
		'mail_template_title' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '�᡼��ƥ�ץ졼�ȥ����ȥ�',
		),
		'mail_template_body' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�᡼��ƥ�ץ졼����ʸ',
		),
	);
}

/**
 * �����᡼��ƥ�ץ졼����Ͽ���������¹ԥ��饹
 *
 * �᡼��ƥ�ץ졼�Ȥ���Ͽ���ޤ�
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_mailtemplate_add';
		
		// 2��POST�б�
		if (Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'admin_mailtemplate_list';
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
		// �᡼��ƥ�ץ졼����Ͽ
		$o =& new Tv_MailTemplate($this->backend);
		// �ѥ�᥿��ʣ��ǧ
		$result = $o->searchProp(
			array('mail_template_id'),
			array('mail_template_status' => 1, 'mail_template_code' => new Ethna_AppSearchObject($this->af->get('mail_template_code'), OBJECT_CONDITION_EQ)),
			array('mail_template_id' => OBJECT_SORT_DESC)
		);
		if($result[0] > 0){
//			$this->ae->add(null, '', E_ADMIN_MAIL_TEMPLATE_CODE_DUPLICATE);
			$this->ae->add(null, '�᡼��ƥ�ץ졼��̾����ʣ���Ƥ��ޤ���');
			return 'admin_mailtemplate_add';
		}
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('mail_template_status', 1);
		// ��Ͽ
		$r = $o->add();
		//��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_mailtemplate_list';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_ADD_DONE);
		$this->ae->add(null, '�᡼��ƥ�ץ졼�Ȥ���Ͽ����λ���ޤ�����');
		return 'admin_mailtemplate_list';
	}
}
?>