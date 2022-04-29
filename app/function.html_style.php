<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_style<br>
 * Purpose:  display html_style
 * @author     Technovarth
 * @param array Format:
 * <pre>
 * </pre>
 * @param Smarty
 */
function smarty_function_html_style($params, &$smarty)
{
	// html
	$html = "";
	// config
	$config = $smarty->_tpl_vars[config];
	// app
	$app = $smarty->_tpl_vars[app];
	
	// スペース表示の場合
	if($params['type'] == 'space'){
		$w = $params['w'];
		$h = $params['h'];
		if(!$w) $w = 1;
		if(!$h) $h = 1;
		
//		$space_url = $config['user_url'] . 'img/space.gif';
		$space_url = 'img/space.gif';
		
		$html .= <<<EOD
<img src="$space_url" width="$w" height="$h" style="width:$w;height:$h;"/>
EOD;
	}
	// ファイル表示の場合
	elseif($params['type'] == 'file'){
		$filename = $params['filename'];
		$text = $params['text'];
		$style = $params['style'];
		$config = $smarty->_tpl_vars[config];
//		$file_url = $config['file_url'];
		$file_url = 'f.php?file=';
		$file_url = $file_url . $filename;
		// 画像の場合
		if(preg_match('/\.(gif|jpg|png)$/', $filename)){
		$html .= <<<EOD
<img src="$file_url"
EOD;
			if($style){
				$html .= " style=\"{$style}\"";
			}
			$html .= ">";
		}
		// フラッシュの場合
		elseif(preg_match('/\.swf$/', $filename)){
			// set params
			$fwidth = 100;
			$fheight = 100;
			$bgcolor = "#000000";
			if(strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')){
				$html = <<<EOD
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
EOD;
				if($fwidth) $html .= "width=\"$fwidth\" ";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= "id=\"fi1\" align=\"\">";
				$html .= <<<EOD
<param name="movie" value="$file_url">
<param name="loop" value="true">
<param name="quality" value="high">
<param name="bgcolor" value="$bgcolor">
<embed src="$file_url" loop="true" quality="high" bgcolor="$bgcolor" 
EOD;
				if($fwidth) $html .= "width=\"$fwidth\" ";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= "id=\"fi1\" align=\"\">";
				$html .= <<<EOD
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
</embed>
</object>
EOD;
			}else{
				$html =  <<<EOD
<object data="$file_url" type="application/x-shockwave-flash" 
EOD;
				if($fwidth) $html .= "width=\"$fwidth\"";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= ">";
				$html .= <<<EOD
<param name="bgcolor" value="$bgcolor">
<param name="loop" value="on">
<param name="quality" value="high">
</object>
EOD;
			}
		}
		// その他の場合
		else{
			if(!$text) $text = $filename;
			$html .= <<<EOD
<a href="$file_url" target="_blank">$text</a>
EOD;
		}
	}
	// 絵文字変換用JavaScript
	elseif($params['type'] == 'j_emoji_replace'){
		$decode = $GLOBALS['EMOJIOBJ']->input_support;
		$html1 = "";
		$html2 = "";
		$emoji_url = $config['emoji_url'];
		foreach($decode as $k => $v){
			$rex = preg_replace('/\//', '\/',quotemeta($v));
$html1 .= <<<EOD
text = text.replace(/<IMG src="*(\S[^><]*)\/{$rex}"*>/ig,'[xf:{$k}]');
EOD;
$html2 .= <<<EOD
text = text.replace(/\[xf:{$k}\]/g,'<IMG src="{$emoji_url}{$v}">');
EOD;
		}
		$html .= <<<EOD
<script type="text/javascript">
function emojiDecode(text){
{$html1}
return text;
}
function emojiEncode(text){
{$html2}
return text;
}
</script>
EOD;
	// mailto
	}elseif($params['type'] == 'mailto'){
		$account = $params['account'];
		$hash = $params['hash'];
		$html .= "mailto:" . $config['mail_account'][$account]['account'] . "_" . $hash . "@" . $config['mail_domain'] . "?subject=" . $config['mail_account'][$account]['subject'] . "&body=" . $config['mail_account'][$account]['body'];
	}
	// br
	elseif($params['type'] == 'br'){
		if($GLOBALS['MOBILETYPE'] == "softbank"){
			$html .= <<<EOD
<br clear="both" style="clear:both;" />
EOD;
		}elseif($GLOBALS['MOBILETYPE'] == "docomo"){
			$html .= <<<EOD
<div clear="both" style="clear:both;display:none;" ></div>
EOD;
		}else{
			$html .= <<<EOD
<br clear="both" style="clear:both;" />
EOD;
		}
	}else
	// line
	if($params['type'] == 'line'){
		$line = 'line4.gif';
		$color = $params['color'];
		if($color == 'pink'){
			$line = 'line4.gif';
		}elseif($color == 'green'){
			$line = 'line5.gif';
		}elseif($color == 'blue'){
			$line = 'line6.gif';
		}elseif($color == 'white'){
			$line = 'line1.gif';
		}elseif($color == 'black'){
			$line = 'line2.gif';
		}elseif($color == 'gray'){
			$line = 'line3.gif';
		}
		$line_url = $config['user_url'] . 'img/' . $line;
		if($GLOBALS['MOBILETYPE'] == "softbank"){
			$html .= <<<EOD
<br clear="all" style="clear:all;" />
EOD;
		}elseif($GLOBALS['MOBILETYPE'] == "docomo"){
			$html .= <<<EOD
<div clear="both" style="clear:both;display:none;" ></div>
EOD;
		}else{
			$html .= <<<EOD
<br clear="all" style="clear:all;display:none;" />
EOD;
		}
			$html .= <<<EOD
<div align="center" style="text-align:center;float:top center;"><img src="$line_url"/></div>
EOD;
	}
	// img_left
	elseif($params['type'] == 'img_left'){
		$src = $params['src'];
			$html .= <<<EOD
<img src="$src" align="left" style="float:left;margin:5px;" />
EOD;
	}
	// file
	elseif($params['type'] == 'file'){
		$filename = $params['filename'];
		$file_url = $config['file_url'];
		$file_url = $file_url . $filename;
		// 画像の場合
		if(preg_match('/\.(gif|jpg|png)$/', $filename)){
		$html .= <<<EOD
<img src="$file_url">
EOD;
		}
		// フラッシュの場合
		elseif(preg_match('/\.swf$/', $filename)){
			// set params
			$fwidth = 100;
			$fheight = 100;
			$bgcolor = "#000000";
			if(strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')){
				$html = <<<EOD
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
EOD;
				if($fwidth) $html .= "width=\"$fwidth\" ";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= "id=\"fi1\" align=\"\">";
				$html .= <<<EOD
<param name="movie" value="$file_url">
<param name="loop" value="true">
<param name="quality" value="high">
<param name="bgcolor" value="$bgcolor">
<embed src="$file_url" loop="true" quality="high" bgcolor="$bgcolor" 
EOD;
				if($fwidth) $html .= "width=\"$fwidth\" ";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= "id=\"fi1\" align=\"\">";
				$html .= <<<EOD
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
</embed>
</object>
EOD;
			}else{
				$html =  <<<EOD
<object data="$file_url" type="application/x-shockwave-flash" 
EOD;
				if($fwidth) $html .= "width=\"$fwidth\"";
				if($fheight) $html .= "height=\"$fheight\"";
				$html .= ">";
				$html .= <<<EOD
<param name="bgcolor" value="$bgcolor">
<param name="loop" value="on">
<param name="quality" value="high">
</object>
EOD;
			}
		}
		// その他の場合
		else{
		$html .= <<<EOD
<a href="$file_url">$filename</a>
EOD;
		}
	}
	// title
	if($params['type'] == 'title'){
		$title = $params['title'];
		$bgcolor = $params['bgcolor'];
		$fontcolor = $params['fontcolor'];
		$width = 230;
		if($GLOBALS['MOBILETYPE'] == "softbank_sharp") $width = 480;
//		if($GLOBALS['MOBILETYPE'] == "docomo"){
		$html .= <<<EOD
<div style="text-align:center; background-color:$bgcolor"><span style="color:$fontcolor;font-size:small">$title</span></div>
EOD;
//		}else{
//		$html .= <<<EOD
//<table align="center" cellpadding="4" width="$width">
//<tr>
//<td bgcolor="$bgcolor" align="center"><span style="color:$fontcolor;font-size:small">$title</span></td>
//</tr>
//</table>
//EOD;
//		}
	}
	// body
	if($params['type'] == 'body'){
		$text = $params['text'];
		$bgcolor = $params['bgcolor'];
		$link = $params['link'];
		$vlink = $params['vlink'];
		$alink = $params['alink'];
		if($GLOBALS['MOBILETYPE'] == "docomo"){
			$html .= <<<EOD
<body style="color:$text; background-color:$bgcolor">
<style type="text/css">
<![CDATA[
a:link{color:$link}
a:visited{color:$vlink}
a:active{color:$alink}
]]>
</style>
EOD;
		}else{
			$html .= <<<EOD
<body bgcolor="$bgcolor" text="$text" link="$link" vlink="$vlink" alink="$alink">
EOD;
		}
	}
	
	// out put
	if($html){
		print $html;
	}
}
?>