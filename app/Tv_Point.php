<?php
/**
 * Tv_Point.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ポイントマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_PointManager extends Ethna_AppManager
{
	/**
	 * ポイントを加算する
	 * 「user」にポイント加算
	 * 「point」にポイントレコード加算
	 * @param
	 *  user_id         ユーザID
	 *  point           付与するポイント
	 *  point_type      ポイントタイプ
	 *  user_sub_id     ユーザサブID
	 *  point_sub_id    ポイントサブID
	 *  point_status    ポイントステータス（0:無効,1:未承認,2:承認済み）
	 *  point_memo      ポイントメモ
	 * @return mixed
	*/
	function addPoint($param)
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
		
		// ユーザー情報を取得
		$u =& new Tv_User($this->backend, 'user_id', $user_id);
		
		if($u->isValid()){
			
			// ユーザポイント情報を取得
			$user_point = $u->get('user_point');
			// 今回更新分のポイント情報を計算
			$point_balance = $user_point + $point;
			
			// ポイント増減分をセット
			$u->set('user_point', $point_balance);
			// ポイント付与
			$r = $u->update();
			
			// ポイントテーブルへレコード作成
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
			
			// クエリエラーでない場合
			if(!Ethna::isError($r)){
				// ポイントIDを返却
				return $p->getId();
			}
		}
		
		return false;
	}
	
	/**
	 * 指定したユーザのポイントを無効にする
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
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
	
	/**
	 * 指定したユーザの承認済みポイントを無効にする
	 * ユーザー退会時のみ無効にする
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusForceOff($user_id)
	{ 
		// ユーザーポイントを無効にする
		$o = new Tv_Point($this->backend);
		$o_list = $o->searchProp(
			array('point_id'),
			array(
				'user_id' => $user_id,
				'point_status' => 2
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
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Point extends Ethna_AppObject
{
}
?>