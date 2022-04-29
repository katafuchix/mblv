<?php
/**
 * Regist.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ登録アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserRegist extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_hash' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ登録アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRegist extends Tv_ActionUser
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
		$sns_info = $this->config->get('sns_info');
		
		// キャリア別端末一覧取得
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $sns_info['sns_low_term_d'];
				break;
			case 'AU':
				$term_list = $sns_info['sns_low_term_a'];
				break;
			case 'SOFTBANK':
				$term_list = $sns_info['sns_low_term_s'];
				break;
			default:
				break;
		}
		// 下位端末かどうか判別
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$term = $um->getTermInfo();
			$device = strtolower($term[1]);
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
			$this->af->set('code', 'guide_device');
			return 'user_contents';
		}
		return 'user_regist';
	}
}

?>
