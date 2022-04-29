<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_image_flash} function plugin
 *
 * Type:     function<br>
 * Name:     html_image_flash<br>
 * Purpose:  display html_image_flash
 * @author     Technovarth
 * @param array Format:
 * <pre>
 * </pre>
 * @param Smarty
 */
function smarty_function_html_image_flash($params, &$smarty)
{
	// set params
	if(strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')){
		$ie = true;
	}else{
		$ie = false;
	}
	
	// get params
	$filepath = strval($params['filepath']);
	$filename = strval($params['filename']);
	$iwidth = strval($params['iwidth']);
	$iheight = strval($params['iheight']);
	$fwidth = strval($params['fwidth']);
	$fheight = strval($params['fheight']);
	$bgcolor = strval($params['bgcolor']);
	$extra = "";
	$main_keys = array('filepath','filename','iwidth','iheight','fwidth','fheight','bgcolor');
	foreach($params as $k => $v){
		if(!in_array($k,$main_keys)) $extra .= " " . $k . '="' . $v . '"';
	}
	
	$ext=strtolower(substr($filename,strrpos($filename,".")+1));
	switch($ext){
		case "gif": $type="image"; break;
		case "jpg": $type="image"; break;
		case "jpeg": $type="image"; break;
		case "png": $type="image"; break;
		case "bmp": $type="image"; break;
		case "3g2": $type="video"; break;
		case "3gp": $type="video"; break;
		case "amc": $type="video"; break;
		case "swf" : $type="flash";break;
		default : $type="image";
	}
	
	// display
	if($type == "image"){
		$html = <<<EOD
<img src="../public_file/$filepath/$filename"
EOD;
		if($iwidth) $html .= "width=\"$iwidth\"";
		if($iheight) $html .= "height=\"$iheight\"";
		if($extra) $html .= $extra;
		$html .= ">";
		print $html;
	
	}elseif($type == "flash"){
		if($ie){
			$html = <<<EOD
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
EOD;
			if($fwidth) $html .= "width=\"$fwidth\" ";
			if($fheight) $html .= "height=\"$fheight\"";
			$html .= "id=\"fi1\" align=\"\">";
			$html .= <<<EOD
<param name="movie" value="../public_file/$filepath/$filename">
<param name="loop" value="true">
<param name="quality" value="high">
<param name="bgcolor" value="$bgcolor">
<embed src="../public_file/$filepath/$filename" loop="true" quality="high" bgcolor="$bgcolor" 
EOD;
			if($fwidth) $html .= "width=\"$fwidth\" ";
			if($fheight) $html .= "height=\"$fheight\"";
			$html .= "id=\"fi1\" align=\"\">";
			$html .= <<<EOD
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
</embed>
</object>
EOD;
			print $html;
		
		}else{
			$html =  <<<EOD
<object data="../public_file/$filepath/$filename" type="application/x-shockwave-flash" 
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
			print $html;
		}
	}
}
?>