<?php
/**
 * Tv_Analytics.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 統計解析マネージャ
 * 
 * @author Technovarth 
 * @analytics public 
 * @package SNSV
 */
class Tv_AnalyticsManager extends Ethna_AppManager
{
	/**
	 * 統計解析用にデータを加算する
	 * $param = array(
	 *	'pre_regist',
	 *	'regist',
	 *	'invite',
	 *	'media',
	 *	'resign',
	 * );
	 */
	function addAnalytics($param)
	{
		// 今日の日付で、このリクエスト名でデータがあるか
		$analytics =& new Tv_Analytics($this->backend);
		$row = &$analytics->searchProp(
			array('analytics_id', 'analytics_date', 'pre_regist_num', 'regist_num', 'friend_num', 'natural_num', 'resign_num'),
			array(
				'analytics_date' => new Ethna_AppSearchObject(date('Y-m-d'), OBJECT_CONDITION_EQ),
				)
			);
		// なければadd
		if ($row[0] == 0) {
			$analytics->set('analytics_date', date('Y-m-d'));
			// pre_regist_num		仮登録者数
			if($param['pre_regist']){
				$analytics->set('pre_regist_num', 1);
			}
			// regist_num		本登録者数
			if($param['regist']){
				$analytics->set('regist_num', 1);
			}
			// friend_num		友達招待登録数
			if($param['invite']){
				$analytics->set('friend_num', 1);
			}
			// natural_num		自然登録数
			if($param['regist'] && !$param['invite'] && !$param['media']){
				$analytics->set('natural_num', 1);
			}
			// resign_num		退会者数
			if($param['resign']){
				$analytics->set('resign_num', 1);
			}
			$analytics->add();
		}
		// あればupdate
		elseif ($row[0] > 0) {
			// ID取得
			$analytics_id = $row[1][0]['analytics_id']; 
			$analytics = &new Tv_Analytics($this->backend, 'analytics_id', $analytics_id);
			// pre_regist_num		仮登録者数
			if($param['pre_regist']){
				$analytics->set('pre_regist_num', $row[1][0]['pre_regist_num'] + 1);
			}
			// regist_num		本登録者数
			if($param['regist']){
				$analytics->set('regist_num', $row[1][0]['regist_num'] + 1);
			}
			// friend_num		友達招待登録数
			if($param['invite']){
				$analytics->set('friend_num', $row[1][0]['friend_num'] + 1);
			}
			// natural_num		自然登録数
			if($param['regist'] && !$param['invite'] && !$param['media']){
				$analytics->set('natural_num', $row[1][0]['natural_num'] + 1);
			}
			// resign_num		退会者数
			if($param['resign']){
				$analytics->set('resign_num', $row[1][0]['resign_num'] + 1);
			}
			$r = $analytics->update();
		}
	}
}
/**
 * 統計解析オブジェクト
 * 
 * @author Technovarth 
 * @analytics public 
 * @package SNSV
 */
class Tv_Analytics extends Ethna_AppObject
{
	/**
	 * オブジェクトプロパティ表示名へのアクセサ
	 * 
	 * @analytics public 
	 * @param string $key プロパティ名
	 * @return string プロパティの表示名
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}
?>