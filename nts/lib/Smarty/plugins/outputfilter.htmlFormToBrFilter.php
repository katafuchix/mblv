<?php
#====================================================================================================
# $Id: outputfilter.htmlFormToBrFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Outputfilter フォームタグ→改行フィルタ(Ez端末用)
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# auの場合のみフォームタグを改行タグに変換する
#====================================================================================================
# 修正履歴：
# 
# 
#====================================================================================================

/**
 * フォームタグ→改行フィルタ(Ez端末用)
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_outputfilter_htmlFormToBrFilter($tpl_output)
{
	// ユーザエージェントの取得
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/.*UP\.Browser.*/', $agent) AND !preg_match('/^J-PHONE.*/', $agent) AND !preg_match('/^Vodafone.*/', $agent)) {
		// EZwebの場合のみ処理
		$tpl_output = strtr($tpl_output, array("</form>"=>"<br></form>"));
	}
	
	// 出力内容を返す
	return $tpl_output;
}

?>