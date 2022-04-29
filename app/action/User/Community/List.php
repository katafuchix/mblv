<?php
/**
 * List.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��������������ե�����
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Form_UserCommunityList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��������������
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunityList extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_home';
		
		$user_session = $this->session->get('user');
		// user_id�����ꤵ��Ƥʤ����ϼ�ʬ�λ��å��ߥ�˥ƥ�������ɽ������
		$user_id = ($this->af->get('user_id') == '') ?
			$user_session['user_id'] : $this->af->get('user_id');
			
		// �桼������
		$user =& new Tv_User($this->backend, 'user_id', $user_id);
		if($user->isValid() == false || $user->get('user_status') != 2)
		{
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
		return 'user_community_list';
	}
}
?>