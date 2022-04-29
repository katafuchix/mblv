<?php
#====================================================================================================
# $Id: outputfilter.imagefileExtFilter.php,v 1.2 2006/09/21 15:52:07 matsui Exp $
# KEMP Smarty-Plugin Outputfilter �摜�g���q�ϊ��t�B���^
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# �L�����A�ɍ��킹�ĉ摜�̊g���q��ϊ�����
#====================================================================================================
# �C�������F
# 
# 
#====================================================================================================

/**
 * �摜�g���q�ϊ��t�B���^
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_outputfilter_imagefileExtFilter($tpl_output)
{
	// ���[�U�G�[�W�F���g�̎擾
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (preg_match('/^DoCoMo.*/', $agent)) {
		// DoCoMo�̏ꍇ
		// �u.png�v���u.gif�v�ɒu��
		preg_match_all('/<img (.*?)src=("|\')?(.+?)\.png(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// img�^�O���������A�z��Ɋi�[
		for ($i = 0; $i < count($arr[0]); $i++) {
			// �K�v�ȕϐ����擾
			$rep_tgt = $arr[0][$i];			// �u���Ώ�
			$att_1 = $arr[1][$i];			// �^�O����1
			$quote = $arr[2][$i];			// �N�H�[�g
			$imgname = $arr[3][$i];			// �摜�t�@�C����
			$att_2 = $arr[4][$i];			// �^�O����2
			$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.gif' . $quote, $att_2);
			$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
		}
		if (preg_match('/^DoCoMo\/1\.0\/.*(501i|502i|821i|209i|651i|691i|671i|210i|F503i|SO503i|D503i|F211i|D211i).*/', $agent)) {
			// �u.jpg�v���u.gif�v�ɒu��
			preg_match_all('/<img (.*?)src=("|\')?(.+?)\.jpg(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// img�^�O���������A�z��Ɋi�[
			for ($i = 0; $i < count($arr[0]); $i++) {
				// �K�v�ȕϐ����擾
				$rep_tgt = $arr[0][$i];			// �u���Ώ�
				$att_1 = $arr[1][$i];			// �^�O����1
				$quote = $arr[2][$i];			// �N�H�[�g
				$imgname = $arr[3][$i];			// �摜�t�@�C����
				$att_2 = $arr[4][$i];			// �^�O����2
				$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.gif' . $quote, $att_2);
				$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
			}
		}
	} elseif (preg_match('/^J-PHONE.*/', $agent)) {
		// Vodafone3G�ȑO�̏ꍇ
		// �u.gif�v���u.png�v�ɒu��
		preg_match_all('/<img (.*?)src=("|\')?(.+?)\.gif(?:"|\')?( (?:.*?))?>/i', $tpl_output, $arr);		// img�^�O���������A�z��Ɋi�[
		for ($i = 0; $i < count($arr[0]); $i++) {
			// �K�v�ȕϐ����擾
			$rep_tgt = $arr[0][$i];			// �u���Ώ�
			$att_1 = $arr[1][$i];			// �^�O����1
			$quote = $arr[2][$i];			// �N�H�[�g
			$imgname = $arr[3][$i];			// �摜�t�@�C����
			$att_2 = $arr[4][$i];			// �^�O����2
			$replacement = sprintf('<img %ssrc=%s%s>', $att_1, $quote . $imgname . '.png' . $quote, $att_2);
			$tpl_output = str_replace($rep_tgt, $replacement, $tpl_output);
		}
	}
	
	// �o�͓��e��Ԃ�
	return $tpl_output;
}

?>