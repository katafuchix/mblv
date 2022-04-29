<?php
#====================================================================================================
# $Id: outputfilter.htmlIstyleFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Outputfilter 入力モードフィルタ
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# 入力モードフィルタ（istyleの置換えを行う）
#====================================================================================================
# 修正履歴：
# 
# 
#====================================================================================================

/**
 * 入力モードフィルタ
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_outputfilter_htmlIstyleFilter($tpl_output)
{
	// ユーザエージェントの取得
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/^J-PHONE\/3\.0\/.*/', $agent) OR preg_match('/^J-PHONE\/2\.0\/.*/', $agent)) {
		// VodafoneC型の場合のみ、istyleをmodeに変換
		$conv_arr = array('1'=>'hiragana', '2'=>'katakana', '3'=>'alphabet', '4'=>'numeric');
		foreach($conv_arr as $key => $value) {
			$pattern = sprintf('/( istyle=("|\')?%d("|\')?)/i', $key);
			$replacement = sprintf(' mode=$2%s$3', $value);
			$tpl_output = preg_replace($pattern, $replacement, $tpl_output);
		}
	}
	
	// 出力内容を返す
	return $tpl_output;
}

?>