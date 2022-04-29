<?php
/**
 * Tv_ConfigUserProfOption.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * プロフィールオプション項目選択枝マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ConfigUserProfOptionManager extends Ethna_AppManager
{
	/**
	 * 選択枝の表示順を1つ上へ移動する
	 * 
	 * @access     public
	 * @param string $configUserProfOptionId 移動するプロフィールオプション項目選択枝のID
	 * @return boolean 成功ならtrue、失敗ならfalse
	 */
	function moveUp($configUserProfOptionId)
	{
		// 対象のアイテムを取得
		$configUserProfOption =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionId
		);
		if(!$configUserProfOption->isValid()) return false;
		
		// 1つ上のアイテムを検索
		$configUserProfOptionSearch =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id'	=> new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_id'),
				OBJECT_CONDITION_EQ
			),
			'config_user_prof_option_order' => new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_option_order'),
				OBJECT_CONDITION_LT
			),
		);
		$configUserProfOptionSearchResult = $configUserProfOptionSearch->searchProp(
			array('config_user_prof_option_id'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfOptionSearchResult[0] == 0) return false;
		
		// 1つ上のアイテムを取得
		$configUserProfOptionUpper =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionSearchResult[1][0]['config_user_prof_option_id']
		);
		if(!$configUserProfOptionUpper->isValid()) return false;
		
		// config_user_prof_option_orderの値を交換
		$tmp = $configUserProfOption->get('config_user_prof_option_order');
		$configUserProfOption->set(
			'config_user_prof_option_order',
			$configUserProfOptionUpper->get('config_user_prof_option_order')
		);
		$configUserProfOptionUpper->set('config_user_prof_option_order', $tmp);
		
		// DBを更新
		$configUserProfOption->update();
		$configUserProfOptionUpper->update();
		
		return true;
	}
	
	/**
	 * 項目の表示順を1つ下へ移動する
	 * 
	 * @access     public
	 * @param string $configUserProfOptionId 移動するプロフィールオプション項目選択枝のID
	 * @return boolean 成功ならtrue、失敗ならfalse
	 */
	function moveDown($configUserProfOptionId)
	{
		// 対象のアイテムを取得
		$configUserProfOption =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionId
		);
		if(!$configUserProfOption->isValid()) return false;
		
		// 1つ下のアイテムを検索
		$configUserProfOptionSearch =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id'	=> new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_id'),
				OBJECT_CONDITION_EQ
			),
			'config_user_prof_option_order' => new Ethna_AppSearchObject(
				$configUserProfOption->get('config_user_prof_option_order'),
				OBJECT_CONDITION_GT
			),
		);
		$configUserProfOptionSearchResult = $configUserProfOptionSearch->searchProp(
			array('config_user_prof_option_id'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_ASC),
			0,
			1
		);
		if($configUserProfOptionSearchResult[0] == 0) return false;
		
		// 1つ下のアイテムを取得
		$configUserProfOptionLower =& new Tv_ConfigUserProfOption(
			$this->backend,
			'config_user_prof_option_id',
			$configUserProfOptionSearchResult[1][0]['config_user_prof_option_id']
		);
		if(!$configUserProfOptionLower->isValid()) return false;
		
		// config_user_prof_option_orderの値を交換
		$tmp = $configUserProfOption->get('config_user_prof_option_order');
		$configUserProfOption->set(
			'config_user_prof_option_order',
			$configUserProfOptionLower->get('config_user_prof_option_order')
		);
		$configUserProfOptionLower->set('config_user_prof_option_order', $tmp);
		
		// DBを更新
		$configUserProfOption->update();
		$configUserProfOptionLower->update();
		
		return true;
	}
}

/**
 * プロフィールオプション項目選択枝オブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ConfigUserProfOption extends Ethna_AppObject
{
}
?>