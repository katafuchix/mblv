<?php
/**
 * Search.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'action/User/Search/Do.php';
class Tv_Form_UserSearch extends Tv_Form_UserSearchDo
{
}

/**
 * �桼���������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserSearch extends Tv_ActionUserOnly
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
		// ���ץ������ܰ��������
		$configUserProf = & new Tv_ConfigUserProf($this->backend);
		
		// ��̣�Υץ�չ��ܤ����
		$filter = array('config_user_prof_name'
							=> new Ethna_AppSearchObject('��̣',OBJECT_CONDITION_LIKE),
					);
		
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
				),
			$filter,
			array('config_user_prof_order' => 'ASC')
			);
		
		// ���ץ����ʲ���������ܤ��������
		foreach($configUserProfList[1] as $key => $item){
			if($item['config_user_prof_type'] >= 3){
				$configUserProfOption = &new Tv_ConfigUserProfOption($this->backend);
				$filter = array('config_user_prof_id' => new Ethna_AppSearchObject($item['config_user_prof_id'], OBJECT_CONDITION_EQ)
					);
				$configUserProfOptionList = $configUserProfOption->searchProp(
					array('config_user_prof_option_id',
						'config_user_prof_option_name',
						),
					$filter,
					array('config_user_prof_option_order' => 'ASC')
					);
				$configUserProfList[1][$key]['config_user_prof_option'] = $configUserProfOptionList[1];
			}
		}
		
		$this->af->setApp('config_user_prof_list', $configUserProfList[1]);
		
		if($this->af->get('user_sex') == ''){
			$this->af->set('user_sex', 0);
		}
		
		return 'user_search';
	}
}
?>