<?php
#====================================================================================================
# $Id: postfilter.encodingToSjisFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Postfilter SJIS�Ή��t�B���^2
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# EUC-JP����SJIS�ɕϊ�����
#====================================================================================================
# �C�������F
# 
# 
#====================================================================================================

/**
 * Smarty SJIS�Ή��p�t�B���^2
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_postfilter_encodingToSjisFilter($tpl_output)
{
	//�����R�[�h��ϊ�����(EUC-JP->SJIS)
	return mb_convert_encoding($tpl_output, 'SJIS', 'EUC-JP');
}

?>