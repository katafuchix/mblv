<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {style}{/style} block plugin
 *
 * Type:	 block function<br>
 * Name:	 style<br>
 * Purpose:  format div fot Japanese mobile phone<br>
 * @param array
 * <pre>
 * Params:
 *		   anything: string or integer
 * </pre>
 * @author Kazuya Fujimori <fujimori at technovarth dot co dot jp>
 * @param string contents of the block
 * @param Smarty clever simulation of a method
 * @return string string $content re-formatted
 */
function smarty_block_style($params, $content, &$smarty)
{
	if (is_null($content)) {
		return;
	}

	$html = "";
	$bgcolor = $params['bgcolor'];
	$fontcolor = $params['fontcolor'];
	$fontsize = $params['fontsize'];
	$align = $params['align'];
	$width = 230;
	if($GLOBALS['MOBILETYPE'] == "softbank_sharp") $width = 480;
	if($GLOBALS['MOBILETYPE'] == "docomo"){
		$html .= <<<EOD
<div style="text-align:$align; background-color:$bgcolor;font-size:$fontsize;"><span style="color:$fontcolor;font-size:$fontsize;">$content</span></div>
EOD;
	}else{
		$html .= <<<EOD
<table align="center" cellpadding="4" width="$width">
<tr>
<td bgcolor="$bgcolor" align="$align"><span style="color:$fontcolor;font-size:$fontsize;">$content</span></td>
</tr>
</table>
EOD;
	}
	return $html;

}

/* vim: set expandtab: */

?>
