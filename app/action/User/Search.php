<?php
/**
 * Search.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ検索アクションフォーム
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
 * ユーザ検索アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserSearch extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// オプション項目一覧を出力
		$configUserProf = & new Tv_ConfigUserProf($this->backend);
		
		// 趣味のプロフ項目を取得
		$filter = array('config_user_prof_name'
							=> new Ethna_AppSearchObject('趣味',OBJECT_CONDITION_LIKE),
					);
		
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
				),
			$filter,
			array('config_user_prof_order' => 'ASC')
			);
		
		// オプション以下の選択項目を取得する
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