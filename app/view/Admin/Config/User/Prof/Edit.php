<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ץ�ե���������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminConfigUserProfEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �Խ��оݥ����ƥ�μ���
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$this->af->get('config_user_prof_id')
		);
		if(!$configUserProf->isValid()) return;
		
		$configUserProf->exportForm();
		
		// ����ޥꥹ�Ȥν���
		$configUserProfOption =& new Tv_configUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id' => new Ethna_AppSearchObject($this->af->get('config_user_prof_id'), OBJECT_CONDITION_EQ	)
		);
		$configUserProfOptionList = $configUserProfOption->searchProp(
			array(
				'config_user_prof_option_id',
				'config_user_prof_option_name',
			),
			$filter,
			array('config_user_prof_option_order' => 'ASC')
		);
		$this->af->setApp('configUserProfOptionList', $configUserProfOptionList[1]);
	}
}
?>