<?php
/**
 * Exchange.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���[�U�|�C���g�����A�N�V�����t�H�[��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchange extends Tv_ActionForm
{
}

/**
 * ���[�U�|�C���g�����A�N�V����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchange extends Tv_ActionUserOnly
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
		return 'user_point_exchange';
	}
}

?>
