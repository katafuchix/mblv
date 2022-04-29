<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������ɰ������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserSoundList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'sound_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'keyword' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * �桼��������ɰ������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserSoundList extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_sound';
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
		return 'user_sound_list';
	}
}

?>
