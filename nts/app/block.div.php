<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {div}{/div} block plugin
 *
 * Type:	 block function<br>
 * Name:	 div<br>
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
function smarty_block_div($params, $content, &$smarty)
{
	if (is_null($content)) {
		return;
	}

	$val = "";
	foreach ($params as $k => $v) {
		$val .= $k."=\"".$v."\" ";
	}
	return "<div $val>$content</div>";

}

/* vim: set expandtab: */

?>
