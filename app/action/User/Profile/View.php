<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ץ�ե�����������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserProfileView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �桼���ץ�ե�����������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserProfileView extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
		}
		
		// ¸�߳�ǧ
		$user =& new Tv_User($this->backend,'user_id',$this->af->get('user_id'));
		// �쥳���ɼ��Τ�¸�ߤ��ʤ����
		if(!$user->isValid()){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
		}
		// ���ơ��������ܲ���Ǥʤ����
		if($user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
		}
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
		return 'user_profile_view';
	}
}
?>