<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����桼���������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserResignDo extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'name'		=> '�桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}
/**
 * �����桼���������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserResignDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'admin_user_list';
		
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
		// �桼������������
		$userManager =& $this->backend->getManager('user');
		if($userManager->forcedResign($this->af->get('user_id'))){
			// �ǡ������
			$rm = & $this->backend->getManager('Resign');
			$rm->deleteData($this->af->get('user_id'));
			// ���ｪλ
			$this->ae->add('errors', "�桼��ID:" . $this->af->get('user_id') . "������񤵤��ޤ�����");
		}else{
			// ���顼
			$this->ae->add('errors', "�桼��ID:" . $this->af->get('user_id') . "������񤵤��뤳�Ȥ��Ǥ��ޤ���Ǥ����������ƥ�����Ԥˤ�Ϣ����������");
		}
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		return 'admin_user_list';
	}
}
?>