<?php
/**
 * Ranking.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * [Cron]��󥭥󥰥�������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Cli_Action_CronRanking extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// [type]�����
		$argv = $_SERVER['argv'];
		$type = $argv[1];
		
		// ��󥭥󥰥ޥ͡������ư
		$rm = & $this->backend->getManager('Ranking');
		$rm->rotateRanking($type);
		
		// ��λ
		exit;
	}
}
?>