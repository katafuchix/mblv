<?php
#====================================================================================================
# $Id: prefilter.encodingToEucjpFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Prefilter SJIS�Ή��t�B���^1
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# SJIS����EUC-JP�ɕϊ�����
#====================================================================================================
# �C�������F
# 
# 
#====================================================================================================

/**
 * Smarty SJIS�Ή��p�t�B���^1
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_prefilter_encodingToEucjpFilter($tpl_output)
{
	// �����R�[�h��ϊ�����(SJIS->EUC_JP)
	return mb_convert_encoding($tpl_output, 'EUC-JP', 'SJIS');
}

?>