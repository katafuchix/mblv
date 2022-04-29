<?php
#====================================================================================================
# $Id: postfilter.encodingToSjisFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Postfilter SJIS対応フィルタ2
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# 機能：
# EUC-JPからSJISに変換する
#====================================================================================================
# 修正履歴：
# 
# 
#====================================================================================================

/**
 * Smarty SJIS対応用フィルタ2
 * @param	string	$tpl_output		出力内容
 * @return	string					コンバート済みの出力内容
 */
function smarty_postfilter_encodingToSjisFilter($tpl_output)
{
	//文字コードを変換する(EUC-JP->SJIS)
	return mb_convert_encoding($tpl_output, 'SJIS', 'EUC-JP');
}

?>