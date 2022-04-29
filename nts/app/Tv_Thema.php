<?php
/**
 * Tv_Thema .php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �g�D�C�b�^�[����}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ThemaManager extends Ethna_AppManager
{
	/**
	 * ���݂̂�����擾����
	 * 
	 * @access public
	 * @param string 
	 * @param string 
	 * @return string ����
	 */
	function getThemaTitle()
	{ 
		// �g�D�C�b�^�[������擾
		$o =& new Tv_Thema($this->backend, 'thema_id', 1);
		
		// ����
		$_thema_title = $o->get('thema_title');
		// �J���}��؂�Ŕz���
		$_title_array = explode(',',$_thema_title);
		
		// ���肪������Ȃ��ꍇ
		if(!is_array($_title_array)){
			return $_thema_title;
		}
		
		// �؂�ւ����Ԑݒ肪����ꍇ
		if($o->get('thema_status')){
			// �؂�ւ����Ԃ��擾����
			$_term = $o->get('thema_term');
			
			// ���R�[�h�쐬���ƌ����_�ł̎��ԍ����v�Z����
			$timestamp = date('Y-m-d H:i:s');
			$diff = strtotime($timestamp) - strtotime($o->get('thema_updated_time'));
			$hour = floor($diff/60/60);
			// ���������H
			$_rest = $hour%($_term * count($_title_array));
			// ���܂ǂ��H
			$_i = $_rest/$_term + 1;
			
			return $_title_array[$_i];
			
		// �؂�ւ����Ԑݒ肪�Ȃ��ꍇ�̓����_����
		}else{
			$_rand = rand(0,count($_title_array)-1);
			return $_title_array[$_rand];
		}
	}
}

/**
 * �g�D�C�b�^�[����I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Thema  extends Ethna_AppObject
{
}
?>
