<?php
/**
 * Actionname.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]���������̾�������������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitActionname extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		$argv = $_SERVER['argv'];
		$action = $argv[1];
		
		$dir = "/home/htdocs/mblv/app/action/" . $action;
		
		$GLOBALS['i'] = 0;
		// �ؿ���¹Ԥ���
		$this->getList($dir);
		
		// �ե�����������
		print "count({$GLOBALS['i']})\n";
		
		//�嵭�Ǻ��������ե�������ɤߤ��������ΤߤΥե��������Ϥ���
		$txt = 'actionname.txt';
		
		// �ե����뤬�ʤ���н�����λ����
		if(!is_file($txt)){
			echo 'EXIT!';
			exit;
		}
		
		// ������¸�ѤΥե�������������
		$fp = fopen ($txt, "r");
		// �Хåե�������ֽ�����Ԥ�
		while (!feof($fp))
		{
			$line = fgets($fp, 1024);
			$line = str_replace("\n", "", $line);
			$line = str_replace("\r\n", "", $line);
			$line = str_replace("\r", "", $line);
			$line = str_replace("���������", "", $line);
			$line = str_replace("�ե�����", "", $line);
			$line = str_replace("���饹", "", $line);
			$line = str_replace("����", "", $line);
			
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
		
		// ����ե������������
		unlink($txt);
		
		echo '\nDONE!';
		
		exit;
	}
	
	function add($file)
	{
		// �ե����뤬¸�ߤ�����
		if(is_file($file)){
			$out = array();
			$fp = fopen ($file, "r");
			// �ե��������Ȥ���Ϥ���
			while (!feof($fp))
			{
				// �����оݤΥ饤��
				$line = fgets($fp, 1024);
				// ���ܸ�̾���������
				if(
					(
	//				ereg('���饹',$line)
	//					|| ereg(mb_convert_encoding('���饹', 'SJIS', 'auto') ,$line)
	//					|| ereg(mb_convert_encoding('���饹', 'EUC-JP', 'auto') ,$line)
	//				||
	//				ereg('���������',$line)
	//					|| ereg(mb_convert_encoding('���������', 'SJIS', 'auto') ,$line)
	//					|| ereg(mb_convert_encoding('���������', 'EUC-JP', 'auto') ,$line)
	//				||
					ereg('�ե�����',$line)
					||
					ereg('����',$line)
	//					|| ereg(mb_convert_encoding('�ե�����', 'EUC-JP', 'auto') ,$line)
					)
						 && !(ereg('//',$line) ) 
						 && !(ereg('�����',$line) )
						 && !(ereg('\* ���������¹�',$line) )
						 && ( $line != '* ���������¹�' )
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
				// �Ѹ�̾���������
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
	 * ���� $path�ˤϥǥ��쥯�ȥꡢ�ޤ��ϥե���������Хѥ������
	 *
	 */
	function getList($path)
	{
		$array = array();
		$total_size = 0;
		
		//���ꤷ���Τ��ե�������ä����ϥ��������֤��ƽ�λ��
		if (is_file($path))
		{
			$this->add($path);
		}elseif (is_dir($path)){
			$basename = basename($path);
			
			//�ǥ��쥯�ȥ���Υե�������������ꡣ
			$file_list = scandir($path);
			
			foreach ($file_list as $file){
				//�ǥ��쥯�ȥ���γƥե����������ˤ��ơ���ʬ���Ȥ�ƤӽФ���
				if(!in_array($file, array('.svn', '.', '..'))){
					print $path . '/' . $file . "\n";
					$total_size += $this->getList($path .'/'. $file);
				}
			}
		}
	}
}
?>