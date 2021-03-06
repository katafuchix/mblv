<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザ編集ページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminUserEdit extends Tv_ViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access public
	 */
	function preforward()
	{
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array(
				'config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
			),
			array(),
			array('config_user_prof_order' => 'ASC')
		);
		foreach($configUserProfList[1] as $key => $item)
		{
			if($item['config_user_prof_type'] >= 3)
			{
				$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
				$filter = array(
					'config_user_prof_id' => new Ethna_AppSearchObject($item['config_user_prof_id'], OBJECT_CONDITION_EQ)
				);
				$configUserProfOptionList = $configUserProfOption->searchProp(
					array(
						'config_user_prof_option_id',
						'config_user_prof_option_name',
					),
					$filter,
					array('config_user_prof_option_order' => 'ASC')
				);
				$configUserProfList[1][$key]['config_user_prof_option'] = $configUserProfOptionList[1];
			}
		}
		$this->af->setApp('configUserProfList', $configUserProfList[1]);
	}
}
?>
