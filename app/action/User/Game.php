<?php
/**
 * Game.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームポータルアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */class Tv_Form_UserGame extends Tv_ActionForm
{
}

/**
 * ユーザゲームポータルアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserGame extends Tv_ActionUserOnly
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
		// 下位端末かどうか判別開始
		$o =& new Tv_Config($this->backend,'config_type', 'game');
		
		// ファイル容量取得
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('site_low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('site_low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('site_low_term_s');
				break;
			default:
				break;
		}
		// 下位端末かどうか判別
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$model = $um->getModel();
			$device = strtolower($model);
			foreach($term_list as $v){
				if($v){
					if($device == strtolower(trim($v))){
						$low_term = true;
					}
				}
			}
		}
		// 下位端末の場合
		if($low_term){
			$this->af->set('code', 'system_game_device');
			return 'user_contents';
		}
		return 'user_game';
	}
}
?>