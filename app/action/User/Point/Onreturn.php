<?php
/**
 * Onreturn.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���[�U�|�C���g�I���������^�[���A�N�V�����t�H�[��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointOnreturn extends Tv_ActionForm
{
}

/**
 * ���[�U�|�C���g�I���������^�[���A�N�V����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
//�����̈�
class Tv_Action_UserPointOnreturn extends Tv_ActionUser
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
		// �|�C���g�I������̃p�����^����M����
		$um = $this->backend->getManager('Util');
		$um->ponIdReceive();
		
		return 'user_point_onreturn';
	}
}

?>
