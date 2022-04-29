<?php
/**
 * Tv_Point.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ポイントマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_PointManager extends Ethna_AppManager
{
	/**
	 * ポイントを加算する
	 * 「user」にポイント加算
	 * 「point」にポイントレコード加算
	 * @param
	 	user_id			ユーザID
	 	point			付与するポイント
	 	point_type		ポイントタイプ
	 	user_sub_id		ユーザサブID
	 	point_sub_id	ポイントサブID
	 	point_status	ポイントステータス（0:無効,1:未承認,2:承認済み）
	 	point_memo		ポイントメモ
	*/
	function AddPoint($param)
	{
		/*
		 * パラメタの受け取り
		 */
		// ユーザID
		if(array_key_exists('user_id', $param)) $user_id = $param['user_id'];
		// ポイントID
		if(array_key_exists('point_id', $param)) $point_id = $param['point_id'];
		// 付与ポイント
		if(array_key_exists('point', $param)) $point = $param['point'];
		// ポイントタイプ
		if(array_key_exists('point_type', $param)) $point_type = $param['point_type'];
		// ユーザサブID
		if(array_key_exists('user_sub_id', $param)) $user_sub_id = $param['user_sub_id'];
		// ポイントサブID
		if(array_key_exists('point_sub_id', $param)) $point_sub_id = $param['point_sub_id'];
		// ポイントステータス
		if(array_key_exists('point_status', $param)) $point_status = $param['point_status'];
		// ポイントメモ
		if(array_key_exists('point_memo', $param)) $point_memo = $param['point_memo'];
		
		/*
		 * パラメタチェック
		 */
		if(!$user_id) return false;
		if(!$point_type) $point_type = 0;
		if(!$user_sub_id) $user_sub_id = 0;
		if(!$point_sub_id) $point_sub_id = 0;
		if(!$point_status) $point_status = 0;
		
		$timestamp = date("Y-m-d H:i:s");
		
		// ポイントタイプ別に接続元を判別
		if(in_array($point_type, array(101,102,103))){
			$api_user = 'spgv';
		}else{
			$api_user = 'snsv';
		}
		
		//ポイント残高
		switch($api_user)
		{
			case 'spgv':
				// ユーザ情報を取得
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				if($o->isValid()){
					// もう一方のDBユーザ情報を取得
					$_user_id = $o->get('snsv_user_id');
					// ユーザポイント情報を取得
					$user_point = $o->get('user_point');
					// 今回更新分のポイント情報を計算
					$point_balance = $user_point + $point;
				}
				break;
			case 'snsv':
				// ユーザ情報を取得
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				if($o->isValid()){
					// もう一方のDBユーザ情報を取得
					$_user_id = $o->get('spgv_user_id');
					// ユーザポイント情報を取得
					$user_point = $o->get('user_point');
					// 今回更新分のポイント情報を計算
					$point_balance = $user_point + $point;
				}
				break;
			default;
				// 処理終了
				return false;
				break;
		}
		
		// ポイント上限値の設定
		if($point_balance >= $this->config->get('point_max')){
			// ポイント上限に達した場合はそれ以上ポイントが付与されない
			@error_log("max point exhaust!!\n" . __FILE__.__LINE__,1,'snsvml@ml.technovarth.jp');
			$point_balance = $this->config->get('point_max');
		}
		
		// ポイント付与
		switch($api_user)
		{
			case 'spgv':
				// SPGVユーザにポイント付与
				$u =& new Tv_User($this->backend, 'user_id', $user_id);
				if($u->isValid()){
					$u->set('user_point', $point_balance);
					// 付与
					$r = $u->update();
					// 付与エラーの場合
//					if(Ethna::isError($r)) return false;
				}
				
				// SNSVユーザにポイント付与
				if($_user_id){
					$u =& new Tv_SnsvUser($this->backend, 'user_id', $_user_id);
					if($u->isValid()){
						$u->set('user_point', $point_balance);
						// 付与
						$r = $u->update();
						// 付与エラーの場合
//						if(Ethna::isError($r)) return false;
					}
				}
				break;
			case 'snsv':
				// ポイントステータスが承認済みの場合のみ、ユーザテーブルのポイント情報を更新する
				if($point_status == 2){
					// SNSVユーザにポイント付与
					$u =& new Tv_User($this->backend, 'user_id', $user_id);
					if($u->isValid()){
						$u->set('user_point', $point_balance);
						// 付与
						$r = $u->update();
						// 付与エラーの場合
//						if(Ethna::isError($r)) return false;
					}
					
					// SPGVユーザにポイント付与
					if($_user_id){
						$u =& new Tv_SpgvUser($this->backend, 'user_id', $_user_id);
						if($u->isValid()){
							$u->set('user_point', $point_balance);
							// 付与
							$r = $u->update();
							// 付与エラーの場合
//							if(Ethna::isError($r)) return false;
						}
					}
				}
				break;
			default;
				// 処理終了
				return false;
				break;
		}
		
		// ポイント履歴追加
		switch($api_user)
		{
			case 'spgv':
				// SPGVポイントレコード追加
				$p =& new Tv_Point($this->backend);
				$p->set('user_id', $user_id);
				$p->set('point', $point);
				$p->set('point_type', $point_type);
				$p->set('point_status', $point_status);
				$p->set('point_balance', $point_balance);
				$p->set('point_created_time', $timestamp);
				$p->set('point_updated_time', $timestamp);
				if($user_sub_id){
					$p->set('user_sub_id', $user_sub_id);
				}
				if($point_sub_id){
					$p->set('point_sub_id', $point_sub_id);
				}
				if($point_memo){
					$p->set('point_memo', $point_memo);
				}
				// 追加
				$r = $p->add();
				// 追加エラーの場合
//				if(Ethna::isError($r)) return false;
				
				// SNSVポイントレコード追加
				if($_user_id){
					$p =& new Tv_SnsvPoint($this->backend);
					$p->set('user_id', $_user_id);
					$p->set('point', $point);
					$p->set('point_type', $point_type);
					$p->set('point_status', $point_status);
					$p->set('point_balance', $point_balance);
					$p->set('point_created_time', $timestamp);
					$p->set('point_updated_time', $timestamp);
					if($user_sub_id){
						$p->set('user_sub_id', $user_sub_id);
					}
					if($point_sub_id){
						$p->set('point_sub_id', $point_sub_id);
					}
					if($point_memo){
						$p->set('point_memo', $point_memo);
					}
					// 追加
					$r = $p->add();
					// 追加エラーの場合
//					if(Ethna::isError($r)) return false;
				}
				break;
			case 'snsv':
				// SNSVポイントレコード追加
				$p =& new Tv_Point($this->backend);
				$p->set('user_id', $user_id);
				$p->set('point', $point);
				$p->set('point_type', $point_type);
				$p->set('point_status', $point_status);
				$p->set('point_balance', $point_balance);
				$p->set('point_created_time', $timestamp);
				$p->set('point_updated_time', $timestamp);
				if($user_sub_id){
					$p->set('user_sub_id', $user_sub_id);
				}
				if($point_sub_id){
					$p->set('point_sub_id', $point_sub_id);
				}
				if($point_memo){
					$p->set('point_memo', $point_memo);
				}
				// 追加
				$r = $p->add();
				// 追加エラーの場合
//				if(Ethna::isError($r)) return false;
				
				// SPGVポイントレコード追加
				if($_user_id){
					$p =& new Tv_SpgvPoint($this->backend);
					$p->set('user_id', $_user_id);
					$p->set('point', $point);
					$p->set('point_type', $point_type);
					$p->set('point_status', $point_status);
					$p->set('point_balance', $point_balance);
					$p->set('point_created_time', $timestamp);
					$p->set('point_updated_time', $timestamp);
					if($user_sub_id){
						$p->set('user_sub_id', $user_sub_id);
					}
					if($point_sub_id){
						$p->set('point_sub_id', $point_sub_id);
					}
					if($point_memo){
						$p->set('point_memo', $point_memo);
					}
					// 追加
					$r = $p->add();
					// 追加エラーの場合
//					if(Ethna::isError($r)) return false;
				}
				break;
			default:
				// 処理を終了
				return false;
				break;
		}
		return true;
	}
	
	/**
	 * 指定したユーザのポイントを無効にする
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// ユーザーポイントを無効にする
		$o = new Tv_Point($this->backend);
		$o_list = $o->searchProp(
			array('point_id'),
			array(
				'user_id' => $user_id,
				'point_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_Point($this->backend, 'point_id', $v['point_id']);
				if (!$o->isValid()) return false;
				$o->set('point_status', 0);
				$o->set('point_updated_time',$now);
				$o->set('point_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ポイントオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Point extends Ethna_AppObject
{
}
?>