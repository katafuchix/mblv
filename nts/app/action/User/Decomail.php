<?php
/**
 * Decomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザデコメールポータルアクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserDecomail extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
	);
}
/**
 * ユーザデコメールポータルアクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserDecomail extends Tv_ActionUserOnly
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
		$o =& new Tv_Cms($this->backend, 'cms_type', 3);
		
		// ファイル容量取得
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('low_term_s');
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
			$SESSID = session_id();
			$this->af->set('code', 'decomail_device');
			return 'user_contents';
//			header("Location: fp.php?code=decomail_device&SESSID={$SESSID}");
		}
		return 'user_decomail';
	}
}

?>
