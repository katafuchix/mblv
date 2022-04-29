<?php
/**
 * Install.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]���󥹥ȡ��륢������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitInstall extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// ����Ȥ��ưʲ����������Ʋ�������
		// 1. ���Ѥ���DB�֥ᥤ��DB�ס����ײ���DB�פ���������Ƥ��뤳��
		// 2. DSN�����꤬�Ԥ��Ƥ��뤳��
		
		
		// �����Υ�����ץȤϸ��߻��Ѥ���Ƥ��ޤ���
		
		// SQLʸ���֤����
		// data�ʲ���mblv.sql, mblv_stats.sql ��̾���ǥơ��֥륯�ꥨ����SQL������
		$dataDir = BASE."/data/";
		
		
		// �ᥤ��DB
		// DSN�����ʬ�򤷤�DB̾���������
		$dsn_array = explode('/',$this->config->get('dsn'));
		
		// DB̾
		$db_name = $dsn_array[3];
		
		// DB̾����ꤻ������³����
		$dns =  str_replace($db_name, "", $this->config->get('dsn'));
		$con = DB::connect($dns);
		
		// �ƥ��ȤΤ��ᤳ������
		$db_name = "test1";
		
		// DB���ʤ��ä����������
		$con->query("CREATE DATABASE IF NOT EXISTS {$db_name} ");
		
		// ��������DB��Ȥ�
		$con->query("USE {$db_name} ");
		
		// �ơ��֥�����Ѥ�SQLʸ���ɤ߹���
		$fname = $dataDir."mblv.sql";
		$h = fopen($fname, "r");
		$lines = fread($h, filesize($fname));
		fclose($h);
		
		// ���Ԥ��֤�������
		$lines = str_replace("\n","",$lines);
		$lines = str_replace("\r","",$lines);
		
		// �ơ��֥�������Υ����Ȥ��֤�������
		$lines = preg_replace("/----(.+?)--/","",$lines);
		
		// �ơ��֥�ñ�̤Ǽ¹Ԥ���
		$sql_array = explode(';',$lines);
		foreach($sql_array as $k=>$v){
			// �ơ��֥����
			$con->query($v);
		}
		
		
		// ���ײ���DB
		// DSN�����ʬ�򤷤�DB̾���������
		$dsn_array = explode('/',$this->config->get('dsn_stats'));
		
		// DB̾
		$db_name = $dsn_array[3];
		
		// DB̾����ꤻ������³����
		$dns =  str_replace($db_name, "", $this->config->get('dsn_stats'));
		$con = DB::connect($dns);
		
		// �ƥ��ȤΤ��ᤳ������
		$db_name = "test1_stats";
		
		// DB���ʤ��ä����������
		$con->query("CREATE DATABASE IF NOT EXISTS {$db_name} ");
		
		// ��������DB��Ȥ�
		$con->query("USE {$db_name} ");
		
		// �ơ��֥�����Ѥ�SQLʸ���ɤ߹���
		$fname = $dataDir."mblv_stats.sql";
		$h = fopen($fname, "r");
		$lines = fread($h, filesize($fname));
		fclose($h);
		
		// ���Ԥ��֤�������
		$lines = str_replace("\n","",$lines);
		$lines = str_replace("\r","",$lines);
		
		// �ơ��֥�������Υ����Ȥ��֤�������
		$lines = preg_replace("/----(.+?)--/","",$lines);
		
		// �ơ��֥�ñ�̤Ǽ¹Ԥ���
		$sql_array = explode(';',$lines);
		foreach($sql_array as $k=>$v){
			// �ơ��֥����
			$con->query($v);
		}
		
		// DB��³���
		$con->disconnect();
		
		// �ǥ��쥯�ȥ��񤭹��߲�ǽ�ˤ���
		$dir_array = array(
			$this->config->get('file_path'),
			$this->config->get('file_path').'ad',
			$this->config->get('file_path').'banner',
			$this->config->get('file_path').'file',
			$this->config->get('file_path').'image',
			$this->config->get('file_path').'movie',
			$this->config->get('file_path').'avatar',
			$this->config->get('file_path').'decomail',
			$this->config->get('file_path').'game',
			$this->config->get('file_path').'sound',
			$this->config->get('file_path').'item',
			$this->config->get('file_path').'item/thumb',
			$this->config->get('file_path').'shop',
			$this->config->get('file_path').'shop/thumb',
			$this->config->get('file_path').'item_category',
			$this->config->get('file_path').'item_category/thumb',
			$this->config->get('file_path').'sample',
			$this->config->get('file_path').'sample/thumb',
		);
		foreach($dir_array as $k=>$v){
			$this->touchDir($v);
		}
		
	}
	
	/**
	 * �ǥ��쥯�ȥ��񤭹��߲�ǽ�ˤ���
	 *
	 */
	function touchDir($_dir)
	{
		// �ǥ��쥯�ȥ꤬¸�ߤ��Ƥ�����
		if(!file_exists($_dir)){
			// �ǥ��쥯�Ȥ����
			mkdir($_dir);
		}
		// �ѡ��ߥå����򥦥��֤���񤭹��߲�ǽ�Ȥ���
		chmod($_dir,0777);
	}
}
?>