<?php
/**
 * Edit.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理メルマガ編集アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminMagazineEdit extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'magazine_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * 管理メルマガ編集アクション実行クラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminMagazineEdit extends Tv_ActionAdminOnly
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
		// メルマガ情報の取得
		$o = new Tv_Magazine($this->backend, 'magazine_id', $this->af->get('magazine_id'));
		$o->exportform();
		
		// 予約年月日時を分解
		$magazine_reserve_time = $o->get('magazine_reserve_time');
		preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):00:00/",$magazine_reserve_time,$match);
		$this->af->set('year',sprintf("%04d",$match[1]));
		$this->af->set('month',sprintf("%d",$match[2]));
		$this->af->set('day',sprintf("%d",$match[3]));
		$this->af->set('hour',sprintf("%d",$match[4]));
		return 'admin_magazine_edit';
	}
}
?>