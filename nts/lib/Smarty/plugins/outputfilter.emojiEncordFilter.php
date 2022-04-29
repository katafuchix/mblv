<?php
#====================================================================================================
# $Id: outputfilter.emojiEncordFilter.php,v 1.2 2006/10/14 09:39:09 matsui Exp $
# KEMP Smarty-Plugin Outputfilter 文字参照→SJISフィルタ
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# iモード絵文字を文字参照形式からSJIS形式に返信する
#====================================================================================================
# 修正履歴：
# 2006/10/05 Unicodeに対応、誤変換防止のため絵文字以外の変換を行わないように修正
# 
#====================================================================================================

/**
 * 文字参照→SJISフィルタ
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_outputfilter_emojiEncordFilter($tpl_output)
{
	$rep_arr = array();
	
	// iモード基本絵文字(SJIS &#[10進];)を検索
	$pattern = "/&#(63\d{3});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]に対象絵文字が格納される
	
	// 絵文字に置換
	$converted = $tpl_output;
	foreach($arr[0] as $value) {
		$dec = substr($value, 2, 5);
		if ((63647 <= $dec AND $dec <= 63740) OR (63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870) OR (63872 <= $dec AND $dec <= 63920)) {
			$rep_arr[$value] = pack('n', $dec);
		}
	}
	
	
	// iモード拡張絵文字(Unicode形式)を検索
	$pattern = "/&#x(E[67][0-9A-F]{2});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]に対象絵文字が格納される
	
	// 絵文字に置換
	foreach($arr[0] as $value) {
		$hex = substr($value, 3, 4);
		$dec = hexdec($hex);
		if (58942 <= $dec AND $dec <= 59035) {
			// 絵文字No.1 ～ No.94
			$dec = $dec + 4705;
		} elseif (59099 <= $dec AND $dec <= 59223) {
			// 絵文字No.118 ～ No.166、拡1～拡76
			$dec = $dec + 4773;
		} elseif ((59036 <= $dec AND $dec <= 59045) OR (59052 <= $dec AND $dec <= 59054) OR (59057 <= $dec AND $dec <= 59059) OR (59063 <= $dec AND $dec <= 59066) OR (59086 <= $dec AND $dec <= 59098)) {
			// 絵文字No.95 ～ No.117、No.167 ～ No.176
			$dec = $dec + 4772;
		} else {
			continue;
		}
		$rep_arr[$value] = pack('n', $dec);
	}
	
	// 置換処理
	$converted = strtr($converted, $rep_arr);
	
	// 出力内容を返す
	return $converted;
}

?>