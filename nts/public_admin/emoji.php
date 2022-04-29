<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD> 
<META http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<TITLE></TITLE>
</HEAD>
<BODY>

common:PCからは[x:0001]形式で入力することで絵文字を使用できます。<br>
name:該当絵文字がない場合は[晴れ]形式の代替文字列を表示します。<br>
docomo:docomo全絵文字<br>
softbank:softbank全絵文字<br>
au:au全絵文字<br>
<br>

<?php
		// 基本DB読込み
		$emoji_file = array('emoji','docomo','softbank','au','au_mail','softbank','softbank_utf8');
		foreach($emoji_file as $v){
			if(file_exists('../data/emoji/'.$v.'.dat')){
				$data[$v] = file('../data/emoji/'.$v.'.dat');
			}
		}
		
		// 絵文字コード展開
		$docomo_image = array();
		$docomo_web_code  = array();
		$docomo_unicode = array();
		$docomo_color = array();
		
		$softbank_image = array();
		$softbank_web_code  = array();
		$softbank_mail_code = array();
		
		$au_image = array();
		$au_web_code  = array();
		$au_mail_code = array();
		
		// DOCOMO
		foreach ($data[docomo] as $edt){
			if(empty($edt)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni,$color) = explode("\t",$edt);
			$esjis10 = preg_replace('/\s/','',$esjis10);
			$docomo_image[$eno] = $efile;
			$docomo_web_code[$eno] = $esjis10;
			$docomo_unicode[$eno] = $euni;
			$docomo_color[$eno] = $color;
		}
		// SOFTBANK
		foreach ($data[softbank] as $edt){
			if(empty($edt)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni) = explode("\t",$edt);
			$esjis10 = preg_replace('/\s/','',$esjis10);
			$softbank_image[$eno] = $efile;
			$softbank_web_code[$eno]  = $eweb;
		}
		// AU
		foreach ($data[au] as $edt){
			if(empty($edt)) break;
			list($eno,$ename,$efile,$esjis16,$esjis10,$eweb,$euni) = explode("\t",$edt);
			$esjis10 = preg_replace('/\s/','',$esjis10);
			$au_image[$eno] = $efile;
			$au_web_code[$eno]  = $esjis10;
		}
		// メール用絵文字コード展開
		foreach ($data[au_mail] as $edt){
			if(empty($edt)) break;
			list($eno,$esjis16m) = explode("\t",$edt);
			$esjis16m = preg_replace('/\s/','',$esjis16m);
			$au_mail_code[$eno] = hexdec($esjis16m);
		}
		// Softbank 3G用絵文字コード展開
		foreach ($data[softbank_utf8] as $edt){
			if(empty($edt)) break;
			list($eno,$eweb,$eutf8) = explode("\t",$edt);
			$decdt = hexdec(substr($eutf8,2));
			$data[softbank_3g_n][$decdt] = $eno;
		}
		
		// 変換対応データ準備
		$trans_d2s = array();
		$trans_d2a = array();
		$trans_s2d = array();
		$trans_s2a = array();
		$trans_a2d = array();
		$trans_a2s = array();
$n = 0;
print "<table><tr><td valign='top'>";
		foreach ($data[emoji] as $edtb){
			if(empty($edtb)) break;
			list($enob,$enameb,$d_nob,$s_nob,$a_nob,$junib) = explode("\t", $edtb);
			$trans_d2s[$d_nob] = $s_nob;
			$trans_d2a[$d_nob] = $a_nob;
			$trans_s2d[$s_nob] = $d_nob;
			$trans_s2a[$s_nob] = $a_nob;
			$trans_a2d[$a_nob] = $d_nob;
			$trans_a2s[$a_nob] = $s_nob;
			if($n%50 == 0){
				if($n != 0) print "</table></td><td valign='top'>";
				print "<table><tr><th>common</th><th>name</th><th>docomo</th><th>softbank</th><th>au</th></tr>";
			}
//			print "<td>".$enob."d<img src=\"../data/emoji".$docomo_image[$d_nob]."\">s<img src=\"../data/emoji".$softbank_image[$s_nob]."\">a<img src=\"../data/emoji".$au_image[$a_nob]."\"></td>";
			print "<tr><td nowrap>[x:".$enob."]</td>";
			print "<td nowrap>$enameb</td>";
			print "<td nowrap>";
			if($d_nob){
				print "<img src=\"".$docomo_image[$d_nob]."\">";
			}else{
				print "×";
			}
			print "</td><td nowrap>";
			if($s_nob){
				print "<img src=\"".$softbank_image[$s_nob]."\">";
			}else{
				print "×";
			}
			print "</td><td nowrap>";
			if($a_nob){
				print "<img src=\"".$au_image[$a_nob]."\">";
			}else{
				print "×";
			}
			print "</td></tr>";
			$n++;
		}
		print "</table></td></tr></table>";
?>
</BODY>
</HTML>
