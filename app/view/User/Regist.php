<?php
/**
 * Regist.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ会員登録ページビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserRegist extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// オプション項目一覧を出力
		$configUserProf = &new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
				),
			array(),
			array('config_user_prof_order' => 'ASC')
			);
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
		
		// 友達紹介統計処理のアクセスログ
		$u = & new Tv_User($this->backend);
		// user_hashでデータを探す
		$userList =  $u->searchProp(
			array('user_id',
				'invite_id',
				),
			array('user_hash' => $this->af->get('user_hash')),
			array()
			);
		if($userList[0]>0){
			$in = & new Tv_Invite($this->backend,'invite_id',$userList[1][0]['invite_id']);
			if($in->isValid()){
				/* =============================================
				// 友達招待統計解析処理
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// 入会履歴をINSERT 0:mail 1:access 2:reg
				$sm->addStats('invite', $in->get('from_user_id'), 0, 1);
			}
		}
	}
}
?>