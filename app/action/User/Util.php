<?php
/**
 * Util.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���桼�ƥ���ƥ����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserUtil extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'page' => array(
			'name'		=> '�͎ߎ�����',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼���桼�ƥ���ƥ����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		
		// ���줾��Υڡ���̾���б������ӥ塼���ֵѤ���
		return 'user_util_'.$page;
	}
}
?>