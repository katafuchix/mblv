<?php
/**
 * Ranking.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * [Cron]ランキングアクションクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Cli_Action_CronRanking extends Tv_ActionClass
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// [type]を取得
		$argv = $_SERVER['argv'];
		$type = $argv[1];
		
		// ランキングマネージャを起動
		$rm = & $this->backend->getManager('Ranking');
		$rm->rotateRanking($type);
		
		// 終了
		exit;
	}
}
?>