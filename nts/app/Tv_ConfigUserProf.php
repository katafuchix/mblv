<?php
/**
 * Tv_ConfigUserProf.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * プロフィールオプション項目マネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ConfigUserProfManager extends Ethna_AppManager
{
	/**
	 * 項目の表示順を1つ上へ移動する
	 * 
	 * @access public
	 * @param string $configUserProfId 移動するプロフィールオプション項目のID
	 * @return boolean 成功ならtrue、失敗ならfalse
	 */
	function moveUp($configUserProfId)
	{
		// 対象のアイテムを取得
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfId
		);
		if(!$configUserProf->isValid()) return false;
		
		// 1つ上のアイテムを検索
		$configUserProfSearch =& new Tv_ConfigUserProf($this->backend);
		$filter = array(
			'config_user_prof_order' => new Ethna_AppSearchObject(
				$configUserProf->get('config_user_prof_order'),
				OBJECT_CONDITION_LT
			),
		);
		$configUserProfSearchResult = $configUserProfSearch->searchProp(
			array('config_user_prof_id'),
			$filter,
			array('config_user_prof_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfSearchResult[0] == 0) return false;
		
		// 1つ上のアイテムを取得
		$configUserProfUpper =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfSearchResult[1][0]['config_user_prof_id']
		);
		if(!$configUserProfUpper->isValid()) return false;
		
		// config_user_prof_orderの値を交換
		$tmp = $configUserProf->get('config_user_prof_order');
		$configUserProf->set(
			'config_user_prof_order',
			$configUserProfUpper->get('config_user_prof_order')
		);
		$configUserProfUpper->set('config_user_prof_order', $tmp);
		
		// DBを更新
		$configUserProf->update();
		$configUserProfUpper->update();
		
		return true;
	}
	
	/**
	 * 項目の表示順を1つ下へ移動する
	 * 
	 * @access public
	 * @param string $configUserProfId 移動するプロフィールオプション項目のID
	 * @return boolean 成功ならtrue、失敗ならfalse
	 */	
	function moveDown($configUserProfId)
	{
		// 対象のアイテムを取得
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfId
		);
		if(!$configUserProf->isValid()) return false;
		
		// 1つ下のアイテムを検索
		$configUserProfSearch =& new Tv_ConfigUserProf($this->backend);
		$filter = array(
			'config_user_prof_order' => new Ethna_AppSearchObject(
				$configUserProf->get('config_user_prof_order'),
				OBJECT_CONDITION_GT
			),
		);
		$configUserProfSearchResult = $configUserProfSearch->searchProp(
			array('config_user_prof_id'),
			$filter,
			array('config_user_prof_order' => OBJECT_SORT_ASC),
			0,
			1
		);
		if($configUserProfSearchResult[0] == 0) return false;
		
		// 1つ下のアイテムを取得
		$configUserProfLower =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$configUserProfSearchResult[1][0]['config_user_prof_id']
		);
		if(!$configUserProfLower->isValid()) return false;
		
		// config_user_prof_orderの値を交換
		$tmp = $configUserProf->get('config_user_prof_order');
		$configUserProf->set(
			'config_user_prof_order',
			$configUserProfLower->get('config_user_prof_order')
		);
		$configUserProfLower->set('config_user_prof_order', $tmp);
		
		// DBを更新
		$configUserProf->update();
		$configUserProfLower->update();
		
		return true;
	}
}

/**
 * プロフィールオプション項目オブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ConfigUserProf extends Ethna_AppObject
{
}
?>