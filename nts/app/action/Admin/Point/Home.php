<?php
/**
 * Home.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �Ǘ��|�C���g�ʒ��A�N�V�����t�H�[���N���X
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Form_AdminPointHome extends Tv_ActionForm
{
	/** @var	bool	�o���f�[�^�Ƀv���O�C�����g���t���O */
	var $use_validator_plugin = true;
	
	/** @var	array   �t�H�[���l��` */
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * �Ǘ��|�C���g�ʒ��A�N�V�������s�N���X
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminPointHome extends Tv_ActionAdminOnly
{
	/**
	 * �A�N�V�������s�O�̏���(�t�H�[���l�`�F�b�N��)���s��
	 * 
	 * @access public
	 * @return string  �J�ږ�(null�Ȃ琳��I��, false�Ȃ珈���I��)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * �A�N�V�������s
	 * 
	 * @access public
	 * @return string  �J�ږ�(null�Ȃ�J�ڂ͍s��Ȃ�)
	 */
	function perform()
	{
		return 'admin_point_home';
	}
}

?>
