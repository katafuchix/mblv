<?php
/**
 * Tv_Footprint.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 足跡マネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_FootprintManager extends Ethna_AppManager
{
	/**
	 * 足跡を付ける
	 * 
	 * @access public
	 */
	function leave()
	{
		// 足跡を付けるアクションのActionFormに
		// user_id（足跡を付けられるユーザ）が定義されている必要があります。
		// また、ユーザがログインしていることが前提です。
		if (!$this->session->isValid() || $this->af->get('user_id') == '')
			return;

		$user = $this->session->get('user');
		if ($user['user_id'] != $this->af->get('user_id')) {
			// 自分以外のユーザのページを見ている場合は足跡をつける
			// 今日'user_id'に対して付けた足跡を探す
			$footprint = &new Tv_Footprint($this->backend);
			$filter = array('to_user_id' => $this->af->get('user_id'),
				'from_user_id' => $user['user_id'],
				'footprint_regist_time' => new Ethna_AppSearchObject(
					date('Y-m-d 00:00:00', time()), OBJECT_CONDITION_GT
					),
				);
			$todaysFootprint = $footprint->searchProp(
				array('footprint_id'),
				$filter
				);
			if ($todaysFootprint[0] > 0) {
				// 今日'user_id'に対して付けた足跡が有る場合
				// 足跡を付けた時間を現在の時間に更新する
				$footprint = &new Tv_Footprint($this->backend,
					'footprint_id',
					$todaysFootprint[1][0]['footprint_id']
					);
				$footprint->set('footprint_regist_time', date('Y-m-d H:i:s', time()));
				$footprint->update();
			} else {
				// 今日'user_id'に対して付けた足跡が無い場合
				// 足跡を新規作成する
				$footprint = &new Tv_Footprint($this->backend);
				$footprint->set('to_user_id', $this->af->get('user_id'));
				$footprint->set('from_user_id', $user['user_id']);
				$footprint->set('footprint_regist_time', date('Y-m-d H:i:s', time()));
				$footprint->add(); 
				// 'user_id'の足跡が30件を超えた場合は古い足跡を削除する
				$footprint = &new Tv_Footprint($this->backend);
				$oldFootprint = $footprint->searchProp(
					array('footprint_id'),
					array('to_user_id' => $this->af->get('user_id')),
					array('footprint_regist_time' => OBJECT_SORT_DESC),
					30, 1
					);
				if (count($oldFootprint[1]) > 0) {
					foreach($oldFootprint[1] as $item) {
						$footprint = &new Tv_Footprint($this->backend,
							'footprint_id',
							$item['footprint_id']
							);
						$footprint->remove();
					} 
				} 
			} 
		}
	}
	
	/**
	 * 指定したユーザのあしあとを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// DBに接続する
		$db = & $this->backend->getDB();
		// 削除
		$sql = "DELETE FROM footprint  WHERE from_user_id =" . $user_id;
		$db->db->query($sql);
	} 
}

/**
 * 足跡オブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Footprint extends Ethna_AppObject
{
	/**
	 * オブジェクトプロパティ表示名へのアクセサ
	 * 
	 * @access public
	 * @param string $key プロパティ名
	 * @return string プロパティの表示名
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}

?>
