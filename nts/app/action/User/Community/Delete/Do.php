<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ�����¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');

class Tv_Form_UserCommunityDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ�����¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityDeleteDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_community_delete_confirm';
		if($this->af->get('back')) return 'user_community_view';
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
		// ���ߥ�˥ƥ����֥������Ȥ���
		$communityManager =& $this->backend->getManager('Community');
		$communityManager->delete($this->af->get('community_id'));
		
		return 'user_community_delete_done';
	}
}

?>
