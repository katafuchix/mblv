<?php
#====================================================================================================
# $Id: outputfilter.htmlIstyleFilter.php,v 1.1.1.1 2006/09/21 14:10:39 matsui Exp $
# KEMP Smarty-Plugin Outputfilter ���̓��[�h�t�B���^
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# ���̓��[�h�t�B���^�iistyle�̒u�������s���j
#====================================================================================================
# �C�������F
# 
# 
#====================================================================================================

/**
 * ���̓��[�h�t�B���^
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_outputfilter_htmlIstyleFilter($tpl_output)
{
	// ���[�U�G�[�W�F���g�̎擾
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/^J-PHONE\/3\.0\/.*/', $agent) OR preg_match('/^J-PHONE\/2\.0\/.*/', $agent)) {
		// VodafoneC�^�̏ꍇ�̂݁Aistyle��mode�ɕϊ�
		$conv_arr = array('1'=>'hiragana', '2'=>'katakana', '3'=>'alphabet', '4'=>'numeric');
		foreach($conv_arr as $key => $value) {
			$pattern = sprintf('/( istyle=("|\')?%d("|\')?)/i', $key);
			$replacement = sprintf(' mode=$2%s$3', $value);
			$tpl_output = preg_replace($pattern, $replacement, $tpl_output);
		}
	}
	
	// �o�͓��e��Ԃ�
	return $tpl_output;
}

?>