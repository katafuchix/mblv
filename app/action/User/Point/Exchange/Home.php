<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���[�U�|�C���g�����z�[���A�N�V�����t�H�[��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchangeHome extends Tv_ActionForm
{
}

/**
 * ���[�U�|�C���g�����z�[���A�N�V����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeHome extends Tv_ActionUserOnly
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
		return 'user_point_exchange_home';
	}
}

?>
