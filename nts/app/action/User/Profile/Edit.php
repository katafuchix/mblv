<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ץ�ե������Խ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserProfileEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼���ץ�ե������Խ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserProfileEdit extends Tv_ActionUserOnly
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
		// ���å���������������
		$sess = $this->session->get('user');
		// �桼��������������
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		if(!$user->isValid()) return 'user_home';
		
		$user->exportForm();
		
		// ��ǯ�����򥻥åȤ���
		$userBirthDate = split('-', $user->get('user_birth_date'));
		$this->af->set('user_birth_date_year', $userBirthDate[0]);
		$this->af->set('user_birth_date_month', $userBirthDate[1]);
		$this->af->set('user_birth_date_day', $userBirthDate[2]);
		
		// ���ץ������ܤ��ͤ�DB�������
		$userProf =& new Tv_UserProf($this->backend);
		$userProfList = $userProf->searchProp(
			array('config_user_prof_id', 'user_prof_value'),
			array('user_id' => new Ethna_AppSearchObject($sess['user_id'], OBJECT_CONDITION_EQ))
		);
		
		// ���ץ������ܤ��ͤ�ե�����μ��ऴ�Ȥ�$form�˥��å�
		$userProfText = array();
		$userProfTextarea = array();
		$userProfSelect = array();
		$userProfCheckbox = array();
		$userProfRadio = array();
		foreach($userProfList[1] as $item)
		{
			$configUserProf =& new Tv_ConfigUserProf(
				$this->backend,
				array('config_user_prof_id'),
				array($item['config_user_prof_id'])
			);
			if($configUserProf->isValid())
			{
				switch($configUserProf->get('config_user_prof_type'))
				{
				case 1: // �ƥ�����
					$userProfText[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 2: // �ƥ����ȥ��ꥢ
					$userProfTextarea[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 3: // ���쥯��
					$userProfSelect[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 4: // �饸��
					$userProfRadio[$item['config_user_prof_id']] = $item['user_prof_value'];
					break;
				case 5: // �����å�
					$userProfCheckbox[$item['user_prof_value']] = true;
					break;
				}
			}
		}
		$this->af->set('user_prof_text', $userProfText);
		$this->af->set('user_prof_textarea', $userProfTextarea);
		$this->af->set('user_prof_select', $userProfSelect);
		$this->af->set('user_prof_radio', $userProfRadio);
		$this->af->set('user_prof_checkbox', $userProfCheckbox);
		
		return 'user_profile_edit';
	}
}

?>
