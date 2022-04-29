<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty plugin
 *
 * Type:	 modifier<br>
 * Name:	 replace_emoji<br>
 * Date:	 Jul 4, 2007
 * Purpose:  convert internal emojicode to emoji data
 * Input:<br>
 *		 - contents = contents to replace
 *		 - preceed_test = if true, includes preceeding break tags
 *		   in replacement
 * Example:  {$text|replace_emoji}
 * @version  1.0
 * @author   Kazuya Fujimori <fujimori at technovarth dot co dot jp>
 * @param string
 * @return string
 */
function smarty_modifier_replace_emoji($string)
{
	 if ($GLOBALS['EMOJIOBJ']->carrier == 'PC'){
		$value = preg_replace('/\[xf:(\d{4})\]/','[x:\\1]',$string);
	 }else{
$value = $string;
//		$value = $GLOBALS['EMOJIOBJ']->emoji_encode($string);
	 }
		return $value;
}

/* vim: set expandtab: */

?>
