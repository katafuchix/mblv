<?php
/**
 * Tv_ActionAdmin.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/** */
require_once 'Tv_ActionClass.php';

/**
 * �Ǘ��҂��A�N�Z�X����A�N�V�����̊��N���X
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionAdmin extends Tv_ActionClass
{
	/**
	 * �F��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// ��{�����擾����
		parent::setSnsInfo();
		
		return parent::authenticate();
	}
	
	/**
	 * �A�N�V�������s�O�̏���(�t�H�[���l�`�F�b�N��)���s��
	 * 
	 * @access public
	 * @return string �J�ږ�(null�Ȃ琳��I��, false�Ȃ珈���I��)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * �A�N�V�������s
	 * 
	 * @access public
	 * @return string �J�ږ�(null�Ȃ�J�ڂ͍s��Ȃ�)
	 */
	function perform()
	{
		return parent::perform();
	}
}
?>