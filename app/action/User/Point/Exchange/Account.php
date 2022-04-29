<?php
/**
 * Account.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザポイント換金アカウントアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchangeAccount extends Tv_ActionForm
{
	var $form = array(
		'point_exchange_type'	=> array(
			'name'			=> '交換先',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
	);
}

/**
 * ユーザポイント換金アカウントアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeAccount extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証
		if($this->af->validate() > 0) return 'user_point_exchange';
		
		// 交換最低ポイントに到達しているかチェックする
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		if($u->get('user_point') < $this->config->get('begin_point') + $point_rate){
			$this->ae->add('erros', "交換最低ポイントに到達していません");
			return 'user_error';
		}
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
		switch($this->af->get('point_exchange_type'))
		{
			case 1: // イーバンク銀行
				return 'user_point_exchange_account_ebank';
				break;
			case 2: // Edy
				return 'user_point_exchange_account_edy';
				break;
			case 3: // ポイントオン
				return 'user_point_exchange_account_pointon';
				break;
			default: // その他
				$this->ae->add('errors', '交換先を選択して下さい');
				return 'user_point_exchange';
				break;
		}
	}
}

?>
