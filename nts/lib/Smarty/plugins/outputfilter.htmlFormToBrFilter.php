<?php
#====================================================================================================
# $Id: outputfilter.htmlFormToBrFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Outputfilter �t�H�[���^�O�����s�t�B���^(Ez�[���p)
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# au�̏ꍇ�̂݃t�H�[���^�O�����s�^�O�ɕϊ�����
#====================================================================================================
# �C�������F
# 
# 
#====================================================================================================

/**
 * �t�H�[���^�O�����s�t�B���^(Ez�[���p)
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_outputfilter_htmlFormToBrFilter($tpl_output)
{
	// ���[�U�G�[�W�F���g�̎擾
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/.*UP\.Browser.*/', $agent) AND !preg_match('/^J-PHONE.*/', $agent) AND !preg_match('/^Vodafone.*/', $agent)) {
		// EZweb�̏ꍇ�̂ݏ���
		$tpl_output = strtr($tpl_output, array("</form>"=>"<br></form>"));
	}
	
	// �o�͓��e��Ԃ�
	return $tpl_output;
}

?>