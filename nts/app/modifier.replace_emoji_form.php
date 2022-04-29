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
 * Name:	 replace_emoji_form<br>
 * Date:	 Jul 4, 2007
 * Purpose:  convert internal emojicode to emoji data
 * Input:<br>
 *		 - contents = contents to replace
 *		 - preceed_test = if true, includes preceeding break tags
 *		   in replacement
 * Example:  {$text|replace_emoji_form}
 * @version  1.0
 * @author   Kazuya Fujimori <fujimori at technovarth dot co dot jp>
 * @param string
 * @return string
 */
function smarty_modifier_replace_emoji_form($string)
{
		$value = preg_replace('/\[x:(\d{4})\]/','[xf:\\1]',$string);
		return $value;
}

/* vim: set expandtab: */

?>
