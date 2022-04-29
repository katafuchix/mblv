<?php
/**
 * Install.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]インストールアクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitInstall extends Tv_ActionClass
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// 前提として以下を満たして下さい。
		// 1. 使用するDB「メインDB」「統計解析DB」が作成されていること
		// 2. DSNの設定が行われていること
		
		
		// ※このスクリプトは現在使用されていません。
		
		// SQL文の置き場所
		// data以下にmblv.sql, mblv_stats.sql の名前でテーブルクリエイトSQLを配置
		$dataDir = BASE."/data/";
		
		
		// メインDB
		// DSN設定を分解してDB名を取得する
		$dsn_array = explode('/',$this->config->get('dsn'));
		
		// DB名
		$db_name = $dsn_array[3];
		
		// DB名を指定せずに接続する
		$dns =  str_replace($db_name, "", $this->config->get('dsn'));
		$con = DB::connect($dns);
		
		// テストのためこうする
		$db_name = "test1";
		
		// DBがなかったら作成する
		$con->query("CREATE DATABASE IF NOT EXISTS {$db_name} ");
		
		// 作成したDBを使う
		$con->query("USE {$db_name} ");
		
		// テーブル作成用のSQL文を読み込む
		$fname = $dataDir."mblv.sql";
		$h = fopen($fname, "r");
		$lines = fread($h, filesize($fname));
		fclose($h);
		
		// 改行を置き換える
		$lines = str_replace("\n","",$lines);
		$lines = str_replace("\r","",$lines);
		
		// テーブル作成時のコメントを置き換える
		$lines = preg_replace("/----(.+?)--/","",$lines);
		
		// テーブル単位で実行する
		$sql_array = explode(';',$lines);
		foreach($sql_array as $k=>$v){
			// テーブル作成
			$con->query($v);
		}
		
		
		// 統計解析DB
		// DSN設定を分解してDB名を取得する
		$dsn_array = explode('/',$this->config->get('dsn_stats'));
		
		// DB名
		$db_name = $dsn_array[3];
		
		// DB名を指定せずに接続する
		$dns =  str_replace($db_name, "", $this->config->get('dsn_stats'));
		$con = DB::connect($dns);
		
		// テストのためこうする
		$db_name = "test1_stats";
		
		// DBがなかったら作成する
		$con->query("CREATE DATABASE IF NOT EXISTS {$db_name} ");
		
		// 作成したDBを使う
		$con->query("USE {$db_name} ");
		
		// テーブル作成用のSQL文を読み込む
		$fname = $dataDir."mblv_stats.sql";
		$h = fopen($fname, "r");
		$lines = fread($h, filesize($fname));
		fclose($h);
		
		// 改行を置き換える
		$lines = str_replace("\n","",$lines);
		$lines = str_replace("\r","",$lines);
		
		// テーブル作成時のコメントを置き換える
		$lines = preg_replace("/----(.+?)--/","",$lines);
		
		// テーブル単位で実行する
		$sql_array = explode(';',$lines);
		foreach($sql_array as $k=>$v){
			// テーブル作成
			$con->query($v);
		}
		
		// DB接続解除
		$con->disconnect();
		
		// ディレクトリを書き込み可能にする
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
	 * ディレクトリを書き込み可能にする
	 *
	 */
	function touchDir($_dir)
	{
		// ディレクトリが存在している場合
		if(!file_exists($_dir)){
			// ディレクトを作成
			mkdir($_dir);
		}
		// パーミッションをウェブから書き込み可能とする
		chmod($_dir,0777);
	}
}
?>