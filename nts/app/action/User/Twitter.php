<?php
/**
 * Twiter.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ȥ����å����������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserTwitter extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'page' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'thema_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
	);
}
/**
 * �桼���ȥ����å����������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserTwitter extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �����ξ��ϣ��ڡ����ܰʹߤϸ����ʤ�
		$sess = $this->session->get('user');
		if($this->af->get('page') >= 2 && !$sess){
			header("Location: ".$this->config->get('redirect_url'));
			exit;
		}
		
		if($this->af->validate() > 0) return 'user_error';
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
		return 'user_twitter';
	}
}
?>
