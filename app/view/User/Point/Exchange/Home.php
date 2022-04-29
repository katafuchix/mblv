<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ポイント交換ホーム画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointExchangeHome extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access	public
	 */
	function preforward()
	{ 
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		//以下DBに問い合わせ
		$db = $this->backend->getDB();
		
		// 今回表示するページでは何件目から表示するのか
		$this->offset = $this->af->get('start') == null ? 0 : $this->af->get('start');
		
		// １ページ内に表示する件数
		$this->count = 10;
		
		// SQL条件
		$sqlFrom = "point as p, point_exchange as pe";
		$sqlCount = "p.point";
		$sqlOrder = "pe.point_exchange_time DESC";
		$sqlSelect = "p.point_id,p.point, p.point_type, p.point_status, pe.price, pe.fee, pe.point_exchange_time";
		$sqlWhere = "p.user_id = ? AND (p.point_type = 10 OR p.point_type = 11 OR p.point_type = 12) AND p.point_id = pe.point_id";
		$sqlValues = array($user['user_id']);
		
		// 今回の問い合わせの総数を取得する
		$sql = "SELECT count(" . $sqlCount . ") FROM " . $sqlFrom . " WHERE " . $sqlWhere . " ORDER BY " . $sqlOrder;
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		$this->total = $rows[0]['count(' . $sqlCount . ')'];
		$this->af->setApp('total', $this->total);
		
		// 実際に今回のページに表示するデータを取得する
		$sql = "SELECT " . $sqlSelect . " FROM " . $sqlFrom . " WHERE " . $sqlWhere . " ORDER BY " . $sqlOrder . " LIMIT " . $this->offset . "," . $this->count;
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		
		// ポイントリストをセット
		$this->af->setApp('point_list', $rows);
		
		// ページングサブ関数呼び出し
		$um = &$this->backend->getManager('Util');
		$pager = $um->getPager($this->total, $this->offset, $this->count, 'action_user_point_exchange_home');
		$this->af->setApp('pager', $pager);
		
		// 現在のポイントを取得
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$user_point = $o->get('user_point');
		$this->af->setApp('user_point', $user_point);
	}
}

?>
