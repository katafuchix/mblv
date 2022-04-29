<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����桼���Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserEdit extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'name'		=> '�桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �����桼���Խ����������¹ԥ��饹
 * 
 * �桼���������Խ����̤ν��Ͻ���
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserEdit extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		if(!$user->isValid()){
			$this->ae->add(null, '', E_ADMIN_USER_NOT_FOUND);
			return 'admin_error';
		}
		$user->exportForm();
		
		
		// �桼��������
		$userBirthDate = split('-', $user->get('user_birth_date'));
		$this->af->set('user_birth_date_year', $userBirthDate[0]);
		$this->af->set('user_birth_date_month', $userBirthDate[1]);
		$this->af->set('user_birth_date_day', $userBirthDate[2]);
		
		// ���ץ������ܤ��ͤ�DB�������
		$userProf =& new Tv_UserProf($this->backend);
		$userProfList = $userProf->searchProp(
			array('config_user_prof_id', 'user_prof_value'),
			array('user_id' => new Ethna_AppSearchObject($this->af->get('user_id'), OBJECT_CONDITION_EQ))
		);
		$userProfValue = array();
		$isChecked = array();
		foreach($userProfList[1] as $item)
		{
			$userProfValue[$item['config_user_prof_id']] = $item['user_prof_value'];
			
			// �����å��ܥå����ʤ�isCheck��True�ˤ���
			$configUserProf =& new Tv_ConfigUserProf(
				$this->backend,
				array('config_user_prof_id', 'config_user_prof_type'),
				array($item['config_user_prof_id'], 5)
			);
			if($configUserProf->isValid())
			{
				$isChecked[$item['user_prof_value']] = true;
			}
		}
		$this->af->setApp('userProfValue', $userProfValue);
		$this->af->setApp('isChecked', $isChecked);
		
		return 'admin_user_edit';
	}
}
?>