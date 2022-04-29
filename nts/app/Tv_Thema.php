<?php
/**
 * Tv_Thema .php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * トゥイッターお題マネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ThemaManager extends Ethna_AppManager
{
	/**
	 * 現在のお題を取得する
	 * 
	 * @access public
	 * @param string 
	 * @param string 
	 * @return string お題
	 */
	function getThemaTitle()
	{ 
		// トゥイッターお題情報取得
		$o =& new Tv_Thema($this->backend, 'thema_id', 1);
		
		// お題
		$_thema_title = $o->get('thema_title');
		// カンマ区切りで配列に
		$_title_array = explode(',',$_thema_title);
		
		// お題が一つしかない場合
		if(!is_array($_title_array)){
			return $_thema_title;
		}
		
		// 切り替え時間設定がある場合
		if($o->get('thema_status')){
			// 切り替え時間を取得する
			$_term = $o->get('thema_term');
			
			// レコード作成時と現時点での時間差を計算する
			$timestamp = date('Y-m-d H:i:s');
			$diff = strtotime($timestamp) - strtotime($o->get('thema_updated_time'));
			$hour = floor($diff/60/60);
			// 何回回った？
			$_rest = $hour%($_term * count($_title_array));
			// いまどこ？
			$_i = $_rest/$_term + 1;
			
			return $_title_array[$_i];
			
		// 切り替え時間設定がない場合はランダムに
		}else{
			$_rand = rand(0,count($_title_array)-1);
			return $_title_array[$_rand];
		}
	}
}

/**
 * トゥイッターお題オブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Thema  extends Ethna_AppObject
{
}
?>
