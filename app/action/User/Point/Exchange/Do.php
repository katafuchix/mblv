<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザポイント換金実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchangeDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'point'	=> array(
			'name'		=> '交換ポイント数',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'point_exchange_type'	=> array(
			'name'			=> '交換先',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'option'		=> 'Util, point_exchange',
			'required'		=> true,
		),
		// イーバンク銀行
		'ebank_branch'	=> array(
			'name'			=> '支店',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, ebank_branch',
		),
		'ebank_account_number'	=> array(
			'name'			=> '口座番号',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'ebank_account_name'	=> array(
			'name'			=> '口座名',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// Edy
		'edy_number'	=> array(
			'name'			=> 'Edy番号',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// ポイントオン
	);
}

/**
 * ユーザポイント換金実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 二重投稿の禁止
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add('errors', "二重投稿です。");
			return 'user_index';
		}
		$err = false;
		$unit = 10;
		// ポイントオンの場合
		if($this->af->get('point_exchange_type') == 3) $unit = 20;
		// 指定のポイントが10または20の倍数かチェックする
		if($this->af->get('point') % $unit !=0){
			$this->ae->add('errors', W_USER_POINT . "は" . $unit . W_USER_POINT_UNIT . "単位で入力して下さい");
			$err = true;
		}
		// 交換最低ポイントに到達しているかチェックする
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		$this->point_rate = $point_rate;
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
		// ユーザ情報取得
		$user = $this->session->get('user');
		
		// タイムスタンプ
		$timestamp = date("Y-m-d H:i:s");
		
		// ポイント減算
		if($this->af->get('point_exchange_type') == 1){
			// イーバンク
			$point_type = 201;
		}elseif($this->af->get('point_exchange_type') == 2){
			// Edy
			$point_type = 202;
		}elseif($this->af->get('point_exchange_type') == 3){
			// ポイントオン
			$point_type = 203;
			// ポイントオンIDを取得
			$sess = $this->session->get('user');
			$p = new Tv_Pon($this->backend);
			$pon = $p->searchProp(
				array('pon_user_hash'),
				array('user_hash' => $sess['user_hash'], 'pon_status' => 3)
			);
			// 有効なレコードがない場合
			$pon_user_hash = $pon[1][0]['pon_user_hash'];
			if($pon[0] == 0 || !$pon_user_hash){
				$this->ae->add('errors', "ポイントオンIDを取得してください。");
				return 'user_point_home';
			}else{
				// トランザクション登録
				$pon = new Tv_PonPoint($this->backend);
				$pon_point = $this->af->get('point') * 3/20;
				$pon->set('pon_point', $pon_point);
				$pon->set('user_hash', $sess['user_hash']);
				$pon->set('pon_user_hash', $pon_user_hash);
				$pon->set('pon_point_status', 1);
				$pon->set('pon_point_created_time', date("Y-m-d H:i:s"));
				$pon->set('pon_point_start_time', date("Y-m-d H:i:s"));
				$pon->add();
				$pon_point_id = mysql_insert_id();
				if(!$pon_point_id){
					$this->ae->add('errors', "ポイントオンIDを取得してください。");
					return 'user_point_home';
				}
				// ポイントオンと通信
				$um = $this->backend->getmanager('Util');
				$this->af->set('pon_point', $pon_point);
				$this->af->set('pon_point_id', $pon_point_id);
				$r = $um->ponPointRequest();
				// 通信失敗
				if(!$r){
					// エラー処理
					$pon = new Tv_PonPoint($this->backend, 'pon_point_id', $pon_point_id);
					$pon->set('pon_point_status', 5);
					$pon->set('pon_point_updated_time', date("Y-m-d H:i:s"));
					$pon->set('pon_point_end_time', date("Y-m-d H:i:s"));
					$pon->update();
					$this->ae->add('errors', "ポイントオンIDを取得してください。");
					return 'user_point_home';
				}
				// 通信成功
				else{
					// トランザクション終了
					$pon = new Tv_PonPoint($this->backend, 'pon_point_id', $pon_point_id);
					$pon->set('pon_point_tid', $r[0]);
					$pon->set('pon_point_pid', $r[1]);
					$pon->set('pon_point_status', 3);
					$pon->set('pon_point_updated_time', date("Y-m-d H:i:s"));
					$pon->set('pon_point_end_time', date("Y-m-d H:i:s"));
					$pon->update();
				}
			}
		}else{
			$this->ae->add('erros', "不正なポイント交換タイプです");
			return 'user_error';
		}
		// ポイントレコード処理
		$pm = $this->backend->getManager('Point');
		$point = 0 - $this->af->get('point') - $this->point_rate;
		$param = array(
			'user_id'		=> $user['user_id'],
			'point'			=> $point,
			'point_type'	=> $point_type,
			'point_status'	=> 2,
		);
		$point_id = $pm->addPoint($param);
		// 交換額算出
		$price = $this->af->get('point') * $this->config->get('point_yen');
		$fee = $this->point_rate * $this->config->get('point_yen');
		
		// ポイント交換申請登録
		$o =& new Tv_PointExchange($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('point_id', $point_id);
		$o->set('price', $price);
		$o->set('fee', $fee);
		$o->set('point_exchange_status', 1);
		$o->set('point_exchange_created_time', $timestamp);
		$r = $o->add();
		
		$this->ae->add('errors', "ポイント交換申請を送信しました");
		return 'user_point_exchange_done';
	}
}

?>
