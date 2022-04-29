<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Խ���ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserBbsEditConfirm extends Tv_Form_UserBbsEditDo
{
}

/**
 * �桼�������Խ���ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsEditConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ��������
		if($this->af->get('delete_image')){
			$bbs =& new Tv_Bbs(
				$this->backend,
				'bbs_id',
				$this->af->get('bbs_id')
			);
			if($article->isValid()) $bbs->deleteImage();
			return 'user_bbs_edit';
		}
		// ���
		if($this->af->get('back')) return 'user_bbs_view';
		
		if($this->af->validate() > 0) return 'user_bbs_edit';
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
		return 'user_bbs_edit_confirm';
	}
}
?>