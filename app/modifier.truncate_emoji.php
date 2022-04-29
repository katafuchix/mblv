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
 * Name:	 truncate_emoji<br>
 * Date:	 Jul 4, 2007
 * Purpose:
 * 			smarty_modifier_truncate_i18n の絵文字対応版です。絵文字は全角文字として扱います。
 * @version  1.0
 * @author   Technovarth
 * @param string
 * @return string
 */
function smarty_modifier_truncate_emoji($string, $len = 80, $postfix = "...")
{
	$counter = 0;
	$last	= -1;
	$_i	  = -1;
	$length  = mb_strlen($string);
	$_len	= $len - strlen($postfix);
	
	for( $i=0; $i<$length; )
	{
		$c = mb_substr($string, $i, 1);
		if( strlen($c) == 2 ) {
			$counter += 2;
			if( $last == -1 && $counter > $_len ) {
				$last = $_i;
			}
			$_i = $i;
			$i++;
		} else {
			if( $c == '[' && $i+7 < $length && 
				mb_ereg_match("\[x:\d{4}\]",mb_substr($string,$i,8))
			) {
				$counter += 2;
				if( $last == -1 && $counter > $_len ) {
					$last = $_i;
				}
				$_i = $i + 7;
				$i += 8;
			} else {
				$counter++;
				if( $last == -1 && $counter > $_len ) {
					$last = $_i;
				}
				$_i = $i;
				$i++;
			}
		}
		if( $counter > $len ) {
			return mb_substr($string, 0, $last+1) . $postfix;
		}
	}
	return $string;
}
?>