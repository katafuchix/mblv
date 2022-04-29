<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty date_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     customized_date_format<br>
 * Purpose:  format datestamps via strftime<br>
 * Input:<br>
 *         - string: input date string
 *         - format: strftime format for output
 *         - default_date: default date if $string is empty
 * @link http://smarty.php.net/manual/en/language.modifier.date.format.php
 *          date_format (Smarty online manual)
 * @param string
 * @param string
 * @param string
 * @return string|void
 * @uses smarty_make_timestamp()
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
require_once BASE . '/lib/Smarty/plugins/shared.make_timestamp.php';
function smarty_modifier_jp_date_format($string, $format="%b %e, %Y", $default_date=null)
{
	// 入力が無ければ空文字列を返す
	if($string == '' || $string == '0000-00-00 00:00:00') return '';
	
	// Windows時の処理
	if (substr(PHP_OS,0,3) == 'WIN') {
		$_win_from = array ('%e',  '%T',       '%D');
		$_win_to   = array ('%#d', '%H:%M:%S', '%m/%d/%y');
		$format = str_replace($_win_from, $_win_to, $format);
	}
	
	// デフォルト日時対応
	if (isset($default_date) && $default_date != '') {
		return strftime($format, smarty_make_timestamp($default_date));
	} 
	
	// 曜日配列を用意
	$_dayArray	= array('日', '月', '火', '水', '木', '金', '土');
	
	// 曜日を日本語表記へ変換
	if(eregi('%a', $format)) {
		$_tempDay = strftime('%w', smarty_make_timestamp($string));
		$_tempDay = $_dayArray[$_tempDay];
		if(ereg('%A', $format))	$_tempDay .= '曜日';
		$format	= eregi_replace('%a', $_tempDay, $format);
	}
	
	return strftime($format, smarty_make_timestamp($string));
}

/* vim: set expandtab: */

?>
