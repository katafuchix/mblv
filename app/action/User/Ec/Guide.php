<?php
/**
 * Guide.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ɥڡ���ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcGuide extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'page' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * �����ɥڡ���ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcGuide extends Tv_ActionUser
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
		// �ѥ�᥿����
		$page = $this->af->get('page');
		// �����ڡ��������
		if($page){
			return 'user_ec_guide_' . $page;
		}
		// �����ڡ�����¸�ߤ��ʤ�����user_ec_guide_index�����
		else{
			return 'user_ec_guide_index';
		}
	}
}
?>