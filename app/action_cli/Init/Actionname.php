<?php
/**
 * Actionname.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]アクション名初期化アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitActionname extends Tv_ActionClass
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		$argv = $_SERVER['argv'];
		$action = $argv[1];
		
		$dir = "/home/htdocs/mblv/app/action/" . $action;
		
		$GLOBALS['i'] = 0;
		// 関数を実行する
		$this->getList($dir);
		
		// ファイル数を出力
		print "count({$GLOBALS['i']})\n";
		
		//上記で作成したファイルを読みこんで配列のみのファイルを出力する
		$txt = 'actionname.txt';
		
		// ファイルがなければ処理を終了する
		if(!is_file($txt)){
			echo 'EXIT!';
			exit;
		}
		
		// 配列保存用のファイルを作成する
		$fp = fopen ($txt, "r");
		// バッファがある間処理を行う
		while (!feof($fp))
		{
			$line = fgets($fp, 1024);
			$line = str_replace("\n", "", $line);
			$line = str_replace("\r\n", "", $line);
			$line = str_replace("\r", "", $line);
			$line = str_replace("アクション", "", $line);
			$line = str_replace("フォーム", "", $line);
			$line = str_replace("クラス", "", $line);
			$line = str_replace("基底", "", $line);
			
			$array =explode( ",", $line );
			$file_name =   'array.txt';
			$fp2 = fopen( $file_name, "a+" );
			
			//fputs($fp2, "'".$array[0]."' => '".$array[1]."' ,");
			//fputs($fp2, "'".$array[1]."' => '".$array[0]."' ,");
			
			$key = trim($array[1]);
			$value = trim($array[0]);
			$key = str_replace("class ", "", $key);
			$key = str_replace(" * ", "", $key);
			$key = str_replace(" *", "", $key);
			$key = str_replace("* ", "", $key);
			$key = str_replace("*", "", $key);
			$key = str_replace("/", "", $key);
			if($key != "" && $value != ""){
				fputs($fp2, "'".$key."' => '".$value."' ,");
			}
			
			fputs($fp2,"\n");
			fclose($fp2);
		}
		fclose($fp);
		
		// 一時ファイルを削除する
		unlink($txt);
		
		echo '\nDONE!';
		
		exit;
	}
	
	function add($file)
	{
		// ファイルが存在する場合
		if(is_file($file)){
			$out = array();
			$fp = fopen ($file, "r");
			// ファイルの中身を解析する
			while (!feof($fp))
			{
				// 今回対象のライン
				$line = fgets($fp, 1024);
				// 日本語名を取得する
				if(
					(
	//				ereg('クラス',$line)
	//					|| ereg(mb_convert_encoding('クラス', 'SJIS', 'auto') ,$line)
	//					|| ereg(mb_convert_encoding('クラス', 'EUC-JP', 'auto') ,$line)
	//				||
	//				ereg('アクション',$line)
	//					|| ereg(mb_convert_encoding('アクション', 'SJIS', 'auto') ,$line)
	//					|| ereg(mb_convert_encoding('アクション', 'EUC-JP', 'auto') ,$line)
	//				||
					ereg('フォーム',$line)
					||
					ereg('基底',$line)
	//					|| ereg(mb_convert_encoding('フォーム', 'EUC-JP', 'auto') ,$line)
					)
						 && !(ereg('//',$line) ) 
						 && !(ereg('値定義',$line) )
						 && !(ereg('\* アクション実行',$line) )
						 && ( $line != '* アクション実行' )
				){
					$line = str_replace("\n", "", $line);
					$line = str_replace("\r\n", "", $line);
					$line = str_replace("\r", "", $line);
					$line = str_replace(" * ", "", $line);
					$line = str_replace("* ", "", $line);
					$line = str_replace(" *", "", $line);
					$line = str_replace("*", "", $line);
				    $out[] = $line;
				}
				// 英語名を取得する
				if(ereg('_Action_',$line) && ereg('class',$line) && !ereg('//',$line)){
					$line = str_replace('class ', '', $line);
					$pos2 = strpos($line, 'extends', 0);
					if($pos2){
						$d = explode(' extends ', $line);
						$line = $d[0];
					}
					
					$line = str_replace("\n", "", $line);
					$line = str_replace("\r\n", "", $line);
					$line = str_replace("\r", "", $line);
				    $out[] = $line;
				}
			}
			fclose ($fp);
			
			$file_name =   'out.txt';
			$fp = fopen( $file_name, "a+" );
			fputs($fp, implode( ",", $out ));
			fputs($fp, "\n");
			fclose ($fp);
			$GLOBALS['i']++;
		}
	}
	
	/**
	 * 引数 $pathにはディレクトリ、またはファイルの絶対パスを指定
	 *
	 */
	function getList($path)
	{
		$array = array();
		$total_size = 0;
		
		//指定したのがファイルだった場合はサイズを返して終了。
		if (is_file($path))
		{
			$this->add($path);
		}elseif (is_dir($path)){
			$basename = basename($path);
			
			//ディレクトリ内のファイル一覧を入手。
			$file_list = scandir($path);
			
			foreach ($file_list as $file){
				//ディレクトリ内の各ファイルを引数にして、自分自身を呼び出す。
				if(!in_array($file, array('.svn', '.', '..'))){
					print $path . '/' . $file . "\n";
					$total_size += $this->getList($path .'/'. $file);
				}
			}
		}
	}
}
?>