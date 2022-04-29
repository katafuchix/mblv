<?php
/**
 * Prof.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理プロフィール項目管理画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminConfigUserProf extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
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
		$this->af->setApp('configUserProfList', $configUserProfList[1]);
		
		$configUserProfTypeList = array(
			1 => 'テキスト',
			2 => 'テキストエリア',
			3 => 'セレクトボックス',
			4 => 'ラジオボタン',
			5 => 'チェックボックス',
		);
		$this->af->setApp('configUserProfTypeList', $configUserProfTypeList);
	}
}
?>