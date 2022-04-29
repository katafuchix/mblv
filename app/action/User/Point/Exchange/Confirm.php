<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザポイント換金確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserPointExchangeConfirm extends Tv_Form_UserPointExchangeDo
{
}

/**
 * ユーザポイント換金確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$err = false;
		$unit = 10;
		// ポイントオンの場合
		if($this->af->get('point_exchange_type') == 3) $unit = 20;
		// 指定のポイントが10または20の倍数かチェックする
		if($this->af->get('point') % $unit !=0){
			$this->ae->add('errors', "ポイントは" . $unit . "pt単位で入力して下さい");
			$err = true;
		}
		// 交換最低ポイントに到達しているかチェックする
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		if($u->get('user_point') < $this->config->get('begin_point') + $point_rate){
			$this->ae->add('erros', "所持ポイントが交換最低ポイントに到達していません");
			$err = true;
		}
		if($this->af->get('point') < $this->config->get('begin_point')){
			$this->ae->add('erros', "入力ポイントが交換最低ポイントに到達していません");
			$err = true;
		}
		if($u->get('user_point') < $this->af->get('point') + $point_rate){
			$this->ae->add('erros', "交換ポイントが不足しています");
			$err = true;
		}
		// フォーム値の確認
		if($err){
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
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		return 'user_point_exchange_confirm';
	}
}

?>
