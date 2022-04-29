<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ���������ॹ�����������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminGameScoreList extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'game_id' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'game_code' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'game_name' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'user_id' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'user_nickname' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�������ॹ�����������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGameScoreList extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'admin_error';
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
		return 'admin_game_score_list';
	}
}

?>
