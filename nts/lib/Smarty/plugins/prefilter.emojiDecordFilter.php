<?php
#====================================================================================================
# $Id: prefilter.emojiDecordFilter.php,v 1.2 2006/10/14 09:39:09 matsui Exp $
# KEMP Smarty-Plugin Prefilter 絵文字SJIS→文字参照フィルタ
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# 絵文字SJIS→文字参照およびSJIS10進→Unicodeの変換を行う
#====================================================================================================
# 修正履歴：
# 2006/10/05 内部コードとしてUnicodeを使うように変更、誤変換防止のため絵文字以外の変換を行わないように修正
# 
#====================================================================================================

/**
 * 絵文字SJIS→文字参照フィルタ
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_prefilter_emojiDecordFilter($tpl_output)
{
	// SJIS形式の絵文字　→　Unicode形式　に変換
	// [参考: http://specters.net/cgipon/labo/it_emoji.html]
	$sjis  = '[\x81-\x9F\xE0-\xF7\xFA-\xFC][\x40-\x7E\x80-\xFC]|[\x00-\x7F]|[\xA1-\xDF]';
	$emoji = '[\xF8\xF9][\x40-\x7E\x80-\xFC]';
	$pattern = "/\G((?:$sjis)*)(?:($emoji))/";
	
	// 絵文字を検索
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[2]に対象絵文字が格納される
	
	// 絵文字を置換
	$converted = $tpl_output;
	mb_internal_encoding('SJIS');
	mb_regex_encoding('SJIS');
	foreach($arr[2] as $value) {
		$emoji_cd = unpack("C*", $value);
		$hex =  dechex($emoji_cd[1]) . dechex($emoji_cd[2]);
		$dec = hexdec($hex);
		if (63647 <= $dec AND $dec <= 63740) {
			// 絵文字No.1 ～ No.94
			$dec = $dec - 4705;
		} elseif (63872 <= $dec AND $dec <= 63996) {
			// 絵文字No.118 ～ No.166、拡1～拡76
			$dec = $dec - 4773;
		} elseif ((63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870)) {
			// 絵文字No.95 ～ No.117、No.167 ～ No.176
			$dec = $dec - 4772;
		} else {
			continue;
		}
		$replacement = '&#x' . strtoupper(dechex($dec)) . ';';		// Unicodeで出力
		$converted = mb_ereg_replace($value, $replacement, $converted);
	}
	
	
	// &#[10進];形式　→　Unicode形式　に変換
	$pattern = "/&#(63\d{3});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]に対象絵文字が格納される
	
	// 絵文字に置換
	$rep_arr = array();
	foreach($arr[0] as $value) {
		$dec = substr($value, 2, 5);
		if (63647 <= $dec AND $dec <= 63740) {
			// 絵文字No.1 ～ No.94
			$dec = $dec - 4705;
		} elseif (63872 <= $dec AND $dec <= 63996) {
			// 絵文字No.118 ～ No.166、拡1～拡76
			$dec = $dec - 4773;
		} elseif ((63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870)) {
			// 絵文字No.95 ～ No.117、No.167 ～ No.176
			$dec = $dec - 4772;
		} else {
			continue;
		}
		$rep_arr[$value] = '&#x' . strtoupper(dechex($dec)) . ';';		// Unicodeで出力
	}
	
	$converted = strtr($converted, $rep_arr);
	
	
	// 出力内容を返す
	return $converted;
}

?>