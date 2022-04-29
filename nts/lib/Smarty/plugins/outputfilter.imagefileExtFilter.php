<?php
#====================================================================================================
# $Id: outputfilter.imagefileExtFilter.php,v 1.2 2006/09/21 15:52:07 matsui Exp $
# KEMP Smarty-Plugin Outputfilter 画像拡張子変換フィルタ
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# キャリアに合わせて画像の拡張子を変換する
#====================================================================================================
# 修正履歴：
# 
# 
#====================================================================================================

/**
 * 画像拡張子変換フィルタ
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_outputfilter_imagefileExtFilter($tpl_output)
{
	// ユーザエージェントの取得
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/^DoCoMo.*/', $agent)) {
		// DoCoMoの場合
		// 「.png」→「.gif」に置換
		preg_match_all('/<img (.*?)src=("|\')?(.+?)\.png(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// imgタグを検索し、配列に格納
		for ($i = 0; $i < count($arr[0]); $i++) {
			// 必要な変数を取得
			$rep_tgt = $arr[0][$i];			// 置換対象
			$att_1 = $arr[1][$i];			// タグ属性1
			$quote = $arr[2][$i];			// クォート
			$imgname = $arr[3][$i];			// 画像ファイル名
			$att_2 = $arr[4][$i];			// タグ属性2
			$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.gif' . $quote, $att_2);
			$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
		}
		if (preg_match('/^DoCoMo\/1\.0\/.*(501i|502i|821i|209i|651i|691i|671i|210i|F503i|SO503i|D503i|F211i|D211i).*/', $agent)) {
			// 「.jpg」→「.gif」に置換
			preg_match_all('/<img (.*?)src=("|\')?(.+?)\.jpg(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// imgタグを検索し、配列に格納
			for ($i = 0; $i < count($arr[0]); $i++) {
				// 必要な変数を取得
				$rep_tgt = $arr[0][$i];			// 置換対象
				$att_1 = $arr[1][$i];			// タグ属性1
				$quote = $arr[2][$i];			// クォート
				$imgname = $arr[3][$i];			// 画像ファイル名
				$att_2 = $arr[4][$i];			// タグ属性2
				$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.gif' . $quote, $att_2);
				$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
			}
		}
	} elseif (preg_match('/^J-PHONE.*/', $agent)) {
		// Vodafone3G以前の場合
		// 「.gif」→「.png」に置換
		preg_match_all('/<img (.*?)src=("|\')?(.+?)\.gif(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// imgタグを検索し、配列に格納
		for ($i = 0; $i < count($arr[0]); $i++) {
			// 必要な変数を取得
			$rep_tgt = $arr[0][$i];			// 置換対象
			$att_1 = $arr[1][$i];			// タグ属性1
			$quote = $arr[2][$i];			// クォート
			$imgname = $arr[3][$i];			// 画像ファイル名
			$att_2 = $arr[4][$i];			// タグ属性2
			$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.png' . $quote, $att_2);
			$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
		}
	}
	
	// 出力内容を返す
	return $tpl_output;
}

?>