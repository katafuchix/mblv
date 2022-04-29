<?php
/**
 * Util.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���桼�ƥ���ƥ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserUtil extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'page' => array(
			'name'		=> '�͎ߎ�����',
			'type'		=> VAR_TYPE_STRING,
		),
		'ma_hash' => array(
			'name'		=> 'ma_hash',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼���桼�ƥ���ƥ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserUtil extends Tv_ActionUser
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
		// �桼����ɽ������ڡ���̾���������
		$page = $this->af->get('page');
		// �ڡ���̾�����ξ��ϥ�����ڡ�����ɽ��������
		if($page == '') return 'user_index';
		
		//��ǥ�����ͳ�ǤΥ��������ξ��ϥѥ�᡼����URL�ˤĤ��ư����Ѥ�
		$this->af->setApp('ma_hash',$this->af->get('ma_hash'));
				
		// ���줾��Υڡ���̾���б������ӥ塼���ֵѤ���
		return 'user_util_'.$page;
	}
}

?>
