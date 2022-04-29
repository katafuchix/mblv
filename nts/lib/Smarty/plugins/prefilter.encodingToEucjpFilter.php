<?php
#====================================================================================================
# $Id: prefilter.encodingToEucjpFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Prefilter SJIS対応フィルタ1
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# SJISからEUC-JPに変換する
#====================================================================================================
# 修正履歴：
# 
# 
#====================================================================================================

/**
 * Smarty SJIS対応用フィルタ1
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_prefilter_encodingToEucjpFilter($tpl_output)
{
	// 文字コードを変換する(SJIS->EUC_JP)
	return mb_convert_encoding($tpl_output, 'EUC-JP', 'SJIS');
}

?>