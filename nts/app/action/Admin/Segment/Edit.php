<?php
/**
 * Edit.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理セグメント編集アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentEdit extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'segment_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * 管理セグメント編集アクション実行クラス
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentEdit extends Tv_ActionAdminOnly
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
		// セグメント情報の取得
		$o = new Tv_Segment($this->backend, 'segment_id', $this->af->get('segment_id'));
		$o->exportform();
		
		// セグメント情報のエクスポート
		$sm = $this->backend->getManager('Segment');
		$segment_keys = $sm->getSegmentKeys();
		foreach($segment_keys as $v){
			$this->af = $sm->setDivSegment($this->af, $v);
		}
		// ポイント（エクスポート済み）
		// 年齢（エクスポート済み）
		// 登録期間
		$start_date = $o->get('user_created_date_start');
		$end_date = $o->get('user_created_date_end');
		if($start_date && $end_date){
			preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):00:00/",$start_date,$match);
			$this->af->set('user_created_year_start',sprintf("%04d",$match[1]));
			$this->af->set('user_created_month_start',sprintf("%d",$match[2]));
			$this->af->set('user_created_day_start',sprintf("%d",$match[3]));
			preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):59:59/",$end_date,$match);
			$this->af->set('user_created_year_end',sprintf("%04d",$match[1]));
			$this->af->set('user_created_month_end',sprintf("%d",$match[2]));
			$this->af->set('user_created_day_end',sprintf("%d",$match[3]));
		}
		return 'admin_segment_edit';
	}
}
?>